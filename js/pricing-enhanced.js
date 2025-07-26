/**
 * Enhanced Pricing Page JavaScript
 * Advanced interactions and animations for pricing components
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.1.0
 */

(function($) {
    'use strict';

    // Enhanced Pricing Page Object
    const EnhancedPricing = {
        
        // Initialize all pricing features
        init() {
            this.setupBillingToggle();
            this.setupPricingAnimations();
            this.setupComparisonTable();
            this.setupFAQAccordion();
            this.setupScrollAnimations();
            this.setupPlanComparison();
            this.trackAnalytics();
        },

        // Enhanced Billing Toggle with Smooth Animations
        setupBillingToggle() {
            const toggle = $('#billingToggle');
            const monthlyPrices = $('.monthly-price');
            const annualPrices = $('.annual-price');
            const monthlyPeriods = $('.monthly-period');
            const annualPeriods = $('.annual-period');

            toggle.on('change', function() {
                const isAnnual = $(this).is(':checked');
                
                // Add transition class
                $('.price').addClass('price-transition');
                
                // Animate price change
                setTimeout(() => {
                    if (isAnnual) {
                        monthlyPrices.addClass('d-none');
                        annualPrices.removeClass('d-none');
                        monthlyPeriods.addClass('d-none');
                        annualPeriods.removeClass('d-none');
                    } else {
                        monthlyPrices.removeClass('d-none');
                        annualPrices.addClass('d-none');
                        monthlyPeriods.removeClass('d-none');
                        annualPeriods.addClass('d-none');
                    }
                }, 150);

                // Remove transition class
                setTimeout(() => {
                    $('.price').removeClass('price-transition');
                }, 450);

                // Track billing preference
                this.trackEvent('billing_toggle', isAnnual ? 'annual' : 'monthly');
            }.bind(this));
        },

        // Setup pricing card animations
        setupPricingAnimations() {
            const cards = $('.pricing-card');
            
            // Stagger animation on load
            cards.each(function(index) {
                $(this).css({
                    'animation-delay': (index * 0.1) + 's'
                }).addClass('fade-in-up');
            });

            // Enhanced hover effects
            cards.on('mouseenter', function() {
                const card = $(this);
                if (!card.hasClass('featured')) {
                    card.addClass('hover-highlight');
                }
            });

            cards.on('mouseleave', function() {
                $(this).removeClass('hover-highlight');
            });

            // Button click animation
            $('.pricing-card .btn').on('click', function(e) {
                const button = $(this);
                const card = button.closest('.pricing-card');
                
                // Add loading state
                card.addClass('loading');
                button.prop('disabled', true);
                
                // Track plan selection
                const planName = card.find('.plan-name').text();
                this.trackEvent('plan_selected', planName);
                
                // Remove loading after short delay (for demo purposes)
                setTimeout(() => {
                    card.removeClass('loading');
                    button.prop('disabled', false);
                }, 1500);
            }.bind(this));
        },

        // Enhanced comparison table interactions
        setupComparisonTable() {
            const table = $('.comparison-table');
            const rows = table.find('tbody tr');

            // Highlight column on hover
            table.find('th, td').on('mouseenter', function() {
                const index = $(this).index();
                table.find('tr').each(function() {
                    $(this).find('td, th').eq(index).addClass('column-highlight');
                });
            });

            table.find('th, td').on('mouseleave', function() {
                table.find('.column-highlight').removeClass('column-highlight');
            });

            // Click to compare features
            rows.on('click', function() {
                $(this).toggleClass('row-selected');
                const featureName = $(this).find('td:first').text();
                this.trackEvent('feature_compared', featureName);
            }.bind(this));
        },

        // Enhanced FAQ accordion
        setupFAQAccordion() {
            const accordion = $('.pricing-faq');
            
            accordion.on('show.bs.collapse', function(e) {
                const question = $(e.target).prev().find('button').text();
                this.trackEvent('faq_opened', question);
            }.bind(this));

            // Auto-expand first FAQ
            setTimeout(() => {
                accordion.find('.accordion-collapse:first').addClass('show');
            }, 1000);
        },

        // Advanced scroll animations
        setupScrollAnimations() {
            // Intersection Observer for scroll animations
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const element = $(entry.target);
                            
                            if (element.hasClass('pricing-card')) {
                                element.addClass('animate-in');
                            } else if (element.hasClass('comparison-table')) {
                                this.animateTableRows(element);
                            } else if (element.hasClass('section')) {
                                element.find('.fade-in-up').addClass('animate-in');
                            }
                        }
                    });
                }, {
                    threshold: 0.1,
                    rootMargin: '0px 0px -50px 0px'
                });

                // Observe pricing elements
                $('.pricing-card, .comparison-table, .section').each(function() {
                    observer.observe(this);
                });
            }
        },

        // Animate table rows sequentially
        animateTableRows(table) {
            const rows = table.find('tbody tr');
            rows.each(function(index) {
                setTimeout(() => {
                    $(this).addClass('animate-in');
                }, index * 100);
            });
        },

        // Plan comparison functionality
        setupPlanComparison() {
            let selectedPlans = [];

            $('.pricing-card').on('click', '.compare-btn', function(e) {
                e.preventDefault();
                const card = $(this).closest('.pricing-card');
                const planName = card.find('.plan-name').text();

                if (selectedPlans.includes(planName)) {
                    selectedPlans = selectedPlans.filter(plan => plan !== planName);
                    card.removeClass('selected-for-comparison');
                } else if (selectedPlans.length < 3) {
                    selectedPlans.push(planName);
                    card.addClass('selected-for-comparison');
                }

                this.updateComparisonUI();
            }.bind(this));
        },

        // Update comparison UI
        updateComparisonUI() {
            const compareButton = $('#compareSelected');
            if (selectedPlans.length >= 2) {
                compareButton.removeClass('d-none').text(`Compare ${selectedPlans.length} Plans`);
            } else {
                compareButton.addClass('d-none');
            }
        },

        // Analytics tracking
        trackEvent(action, label) {
            // Google Analytics 4
            if (typeof gtag !== 'undefined') {
                gtag('event', action, {
                    'event_category': 'pricing',
                    'event_label': label
                });
            }

            // Facebook Pixel
            if (typeof fbq !== 'undefined') {
                fbq('track', 'CustomEvent', {
                    action: action,
                    label: label
                });
            }

            // Console log for development
            console.log('Event tracked:', action, label);
        },

        // Track user interactions
        trackAnalytics() {
            // Track page view
            this.trackEvent('pricing_page_view', 'page_loaded');

            // Track scroll depth
            let maxScroll = 0;
            $(window).on('scroll', () => {
                const scrollPercent = Math.round(($(window).scrollTop() / ($(document).height() - $(window).height())) * 100);
                if (scrollPercent > maxScroll && scrollPercent % 25 === 0) {
                    maxScroll = scrollPercent;
                    this.trackEvent('scroll_depth', `${scrollPercent}%`);
                }
            });

            // Track time on page
            let timeOnPage = 0;
            const timeTracker = setInterval(() => {
                timeOnPage += 30;
                if (timeOnPage % 60 === 0) {
                    this.trackEvent('time_on_page', `${timeOnPage}s`);
                }
            }, 30000);

            // Track page exit
            $(window).on('beforeunload', () => {
                clearInterval(timeTracker);
                this.trackEvent('page_exit', `${timeOnPage}s`);
            });
        }
    };

    // Advanced Pricing Calculator
    const PricingCalculator = {
        
        init() {
            this.setupCalculator();
            this.setupCustomQuote();
        },

        setupCalculator() {
            // Create dynamic pricing calculator modal
            const calculatorHTML = `
                <div class="modal fade" id="pricingCalculator" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Custom Quote Calculator</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form id="calculatorForm">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Project Type</label>
                                            <select class="form-select" name="project_type" required>
                                                <option value="">Select project type</option>
                                                <option value="website" data-base="2500">Website Design</option>
                                                <option value="ecommerce" data-base="5000">E-commerce Store</option>
                                                <option value="webapp" data-base="10000">Web Application</option>
                                                <option value="marketing" data-base="1500">Marketing Campaign</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Timeline</label>
                                            <select class="form-select" name="timeline" required>
                                                <option value="">Select timeline</option>
                                                <option value="rush" data-multiplier="1.5">Rush (2-4 weeks)</option>
                                                <option value="standard" data-multiplier="1">Standard (4-8 weeks)</option>
                                                <option value="flexible" data-multiplier="0.8">Flexible (8+ weeks)</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Additional Features</label>
                                            <div class="feature-checkboxes">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="features" value="seo" data-cost="500">
                                                    <label class="form-check-label">SEO Optimization (+$500)</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="features" value="analytics" data-cost="300">
                                                    <label class="form-check-label">Analytics Setup (+$300)</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="features" value="maintenance" data-cost="200">
                                                    <label class="form-check-label">Monthly Maintenance (+$200/month)</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 p-3 bg-light rounded">
                                        <h6>Estimated Total:</h6>
                                        <div class="price-breakdown">
                                            <div class="estimated-price h4 text-primary">$0</div>
                                            <small class="text-muted">*Final price may vary based on specific requirements</small>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-accent" id="requestQuote">Request Detailed Quote</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            $('body').append(calculatorHTML);
            this.setupCalculatorLogic();
        },

        setupCalculatorLogic() {
            const form = $('#calculatorForm');
            const priceDisplay = $('.estimated-price');

            form.on('change', 'select, input[type="checkbox"]', function() {
                const projectType = form.find('select[name="project_type"]');
                const timeline = form.find('select[name="timeline"]');
                const features = form.find('input[name="features"]:checked');

                let basePrice = parseInt(projectType.find(':selected').data('base') || 0);
                let multiplier = parseFloat(timeline.find(':selected').data('multiplier') || 1);
                let additionalCosts = 0;

                features.each(function() {
                    additionalCosts += parseInt($(this).data('cost') || 0);
                });

                const totalPrice = (basePrice * multiplier) + additionalCosts;
                priceDisplay.text('$' + totalPrice.toLocaleString());

                // Track calculator usage
                EnhancedPricing.trackEvent('calculator_updated', totalPrice.toString());
            });

            $('#requestQuote').on('click', function() {
                const formData = new FormData(form[0]);
                const totalPrice = priceDisplay.text();
                
                // Redirect to contact page with quote data
                const contactUrl = `${wpData.contactUrl}?quote=${encodeURIComponent(totalPrice)}&project=${encodeURIComponent(formData.get('project_type'))}`;
                window.location.href = contactUrl;
            });
        },

        setupCustomQuote() {
            // Add calculator trigger buttons
            $('.btn[href*="contact"]').each(function() {
                if ($(this).text().includes('Quote') || $(this).text().includes('Calculator')) {
                    $(this).attr('data-bs-toggle', 'modal')
                           .attr('data-bs-target', '#pricingCalculator')
                           .attr('href', '#');
                }
            });
        }
    };

    // Mobile Enhancements
    const MobilePricingEnhancements = {
        
        init() {
            if (window.innerWidth <= 768) {
                this.setupMobileOptimizations();
                this.setupSwipeGestures();
            }
        },

        setupMobileOptimizations() {
            // Stack pricing cards on mobile
            $('.pricing-card.featured').removeClass('scale-105');
            
            // Simplify comparison table for mobile
            $('.comparison-table-wrapper').addClass('mobile-scroll');
            
            // Add mobile-specific CTA
            $('.pricing-card .btn').addClass('btn-block w-100');
        },

        setupSwipeGestures() {
            let startX = 0;
            let currentCard = 0;
            const cards = $('.pricing-card');

            $('.pricing-plans').on('touchstart', function(e) {
                startX = e.touches[0].clientX;
            });

            $('.pricing-plans').on('touchend', function(e) {
                const endX = e.changedTouches[0].clientX;
                const diff = startX - endX;

                if (Math.abs(diff) > 50) {
                    if (diff > 0 && currentCard < cards.length - 1) {
                        currentCard++;
                    } else if (diff < 0 && currentCard > 0) {
                        currentCard--;
                    }
                    
                    cards.eq(currentCard)[0].scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }
            });
        }
    };

    // Initialize everything when document is ready
    $(document).ready(function() {
        EnhancedPricing.init();
        PricingCalculator.init();
        MobilePricingEnhancements.init();
    });

    // Export for external use
    window.EnhancedPricing = EnhancedPricing;

})(jQuery);
