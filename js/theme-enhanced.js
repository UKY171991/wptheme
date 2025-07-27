/*!
 * Blueprint Folder Theme - Enhanced JavaScript
 * Complete interactive functionality for menus, services, and pricing
 * Version: 2.0.0
 */

(function($) {
    'use strict';

    // =========================================================================
    // ENHANCED MOBILE MENU FUNCTIONALITY
    // =========================================================================
    
    class MobileMenu {
        constructor() {
            this.menuToggle = $('.menu-toggle');
            this.menuWrapper = $('.menu-wrapper');
            this.body = $('body');
            this.isOpen = false;
            
            this.init();
        }
        
        init() {
            this.bindEvents();
            this.setupSubMenus();
        }
        
        bindEvents() {
            // Toggle menu on button click
            this.menuToggle.on('click', (e) => {
                e.preventDefault();
                this.toggleMenu();
            });
            
            // Close menu on escape key
            $(document).on('keydown', (e) => {
                if (e.keyCode === 27 && this.isOpen) {
                    this.closeMenu();
                }
            });
            
            // Close menu when clicking outside
            $(document).on('click', (e) => {
                if (this.isOpen && !$(e.target).closest('.menu-wrapper, .menu-toggle').length) {
                    this.closeMenu();
                }
            });
            
            // Handle window resize
            $(window).on('resize', () => {
                if (window.innerWidth > 991 && this.isOpen) {
                    this.closeMenu();
                }
            });
        }
        
        setupSubMenus() {
            // Add toggle buttons for sub-menus on mobile
            $('.menu-item-has-children > a').each(function() {
                const $this = $(this);
                const $subMenu = $this.siblings('.sub-menu');
                
                if ($subMenu.length) {
                    $this.append('<i class="sub-menu-toggle fas fa-chevron-down"></i>');
                }
            });
            
            // Handle sub-menu toggles
            $('.sub-menu-toggle').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const $toggle = $(this);
                const $subMenu = $toggle.closest('a').siblings('.sub-menu');
                
                $subMenu.slideToggle(300);
                $toggle.toggleClass('rotated');
            });
        }
        
        toggleMenu() {
            if (this.isOpen) {
                this.closeMenu();
            } else {
                this.openMenu();
            }
        }
        
        openMenu() {
            this.menuWrapper.addClass('show');
            this.menuToggle.addClass('active');
            this.body.addClass('menu-open');
            this.isOpen = true;
            
            // Prevent body scroll
            this.body.css('overflow', 'hidden');
        }
        
        closeMenu() {
            this.menuWrapper.removeClass('show');
            this.menuToggle.removeClass('active');
            this.body.removeClass('menu-open');
            this.isOpen = false;
            
            // Restore body scroll
            this.body.css('overflow', '');
            
            // Close all sub-menus
            $('.sub-menu').slideUp(300);
            $('.sub-menu-toggle').removeClass('rotated');
        }
    }

    // =========================================================================
    // SERVICE FILTERING AND INTERACTIONS
    // =========================================================================
    
    class ServiceFiltering {
        constructor() {
            this.categoryTabs = $('.category-tabs .tab-link');
            this.serviceGrid = $('.services-container');
            this.filterButtons = $('.filter-buttons .filter-btn');
            
            this.init();
        }
        
        init() {
            this.bindEvents();
            this.setupInfiniteScroll();
        }
        
        bindEvents() {
            // Category tab switching
            this.categoryTabs.on('click', (e) => {
                e.preventDefault();
                const $tab = $(e.currentTarget);
                this.switchCategory($tab);
            });
            
            // Filter button interactions
            this.filterButtons.on('click', (e) => {
                e.preventDefault();
                const $button = $(e.currentTarget);
                this.applyFilter($button);
            });
            
            // Service card hover effects
            this.setupServiceCardEffects();
        }
        
        switchCategory($tab) {
            // Update active tab
            this.categoryTabs.removeClass('active');
            $tab.addClass('active');
            
            // Load category content via AJAX
            const categorySlug = $tab.data('category');
            this.loadCategoryServices(categorySlug);
        }
        
        loadCategoryServices(categorySlug) {
            // Show loading state
            this.serviceGrid.addClass('loading');
            
            // AJAX request to load services
            $.ajax({
                url: wpAjax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'load_category_services',
                    category: categorySlug,
                    nonce: wpAjax.nonce
                },
                success: (response) => {
                    if (response.success) {
                        this.serviceGrid.html(response.data);
                        this.setupServiceCardEffects();
                    }
                },
                complete: () => {
                    this.serviceGrid.removeClass('loading');
                }
            });
        }
        
        applyFilter($button) {
            // Update active filter
            this.filterButtons.removeClass('active');
            $button.addClass('active');
            
            const filter = $button.data('filter');
            const $services = $('.service-card');
            
            if (filter === 'all') {
                $services.show();
            } else {
                $services.each(function() {
                    const $service = $(this);
                    const categories = $service.data('categories') || '';
                    
                    if (categories.includes(filter)) {
                        $service.show();
                    } else {
                        $service.hide();
                    }
                });
            }
        }
        
        setupServiceCardEffects() {
            // Animate service cards on scroll
            if (typeof IntersectionObserver !== 'undefined') {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            $(entry.target).addClass('animate-in');
                        }
                    });
                }, {
                    threshold: 0.1
                });
                
                $('.service-card').each(function() {
                    observer.observe(this);
                });
            }
        }
        
        setupInfiniteScroll() {
            // Implement infinite scroll for large service lists
            let loading = false;
            let page = 2;
            
            $(window).on('scroll', () => {
                if (loading) return;
                
                const scrollTop = $(window).scrollTop();
                const windowHeight = $(window).height();
                const documentHeight = $(document).height();
                
                if (scrollTop + windowHeight >= documentHeight - 1000) {
                    loading = true;
                    
                    $.ajax({
                        url: wpAjax.ajaxurl,
                        type: 'POST',
                        data: {
                            action: 'load_more_services',
                            page: page,
                            nonce: wpAjax.nonce
                        },
                        success: (response) => {
                            if (response.success && response.data) {
                                this.serviceGrid.append(response.data);
                                this.setupServiceCardEffects();
                                page++;
                            }
                        },
                        complete: () => {
                            loading = false;
                        }
                    });
                }
            });
        }
    }

    // =========================================================================
    // PRICING PAGE INTERACTIONS
    // =========================================================================
    
    class PricingPage {
        constructor() {
            this.pricingCards = $('.pricing-card');
            this.planButtons = $('.btn-plan');
            
            this.init();
        }
        
        init() {
            this.bindEvents();
            this.setupAnimations();
            this.setupPlanComparison();
        }
        
        bindEvents() {
            // Plan selection tracking
            this.planButtons.on('click', (e) => {
                const $button = $(e.currentTarget);
                const planName = $button.closest('.pricing-card').find('.plan-name').text();
                
                // Track plan selection (Google Analytics, etc.)
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'select_plan', {
                        'event_category': 'Pricing',
                        'event_label': planName
                    });
                }
            });
            
            // Hover effects for feature comparison
            $('.feature-item').on('mouseenter', function() {
                const featureText = $(this).text();
                $('.feature-item').each(function() {
                    if ($(this).text() === featureText) {
                        $(this).addClass('highlight');
                    }
                });
            }).on('mouseleave', function() {
                $('.feature-item').removeClass('highlight');
            });
        }
        
        setupAnimations() {
            // Animate pricing cards on scroll
            if (typeof IntersectionObserver !== 'undefined') {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry, index) => {
                        if (entry.isIntersecting) {
                            setTimeout(() => {
                                $(entry.target).addClass('animate-in');
                            }, index * 100);
                        }
                    });
                }, {
                    threshold: 0.2
                });
                
                this.pricingCards.each(function() {
                    observer.observe(this);
                });
            }
        }
        
        setupPlanComparison() {
            // Add plan comparison functionality
            const $compareButton = $('<button class="btn btn-outline compare-plans">Compare Plans</button>');
            $('.pricing-plans').after($compareButton);
            
            $compareButton.on('click', () => {
                this.showComparison();
            });
        }
        
        showComparison() {
            // Create comparison modal/table
            const features = this.extractFeatures();
            const modal = this.createComparisonModal(features);
            
            $('body').append(modal);
            modal.addClass('show');
        }
        
        extractFeatures() {
            const features = [];
            const allFeatures = new Set();
            
            // Collect all unique features
            this.pricingCards.each(function() {
                const planFeatures = [];
                $(this).find('.feature-item').each(function() {
                    const feature = $(this).text().trim();
                    planFeatures.push(feature);
                    allFeatures.add(feature);
                });
                features.push({
                    name: $(this).find('.plan-name').text(),
                    features: planFeatures
                });
            });
            
            return {
                plans: features,
                allFeatures: Array.from(allFeatures)
            };
        }
        
        createComparisonModal(data) {
            let table = '<table class="comparison-table"><thead><tr><th>Features</th>';
            
            data.plans.forEach(plan => {
                table += `<th>${plan.name}</th>`;
            });
            
            table += '</tr></thead><tbody>';
            
            data.allFeatures.forEach(feature => {
                table += `<tr><td>${feature}</td>`;
                
                data.plans.forEach(plan => {
                    const hasFeature = plan.features.includes(feature);
                    table += `<td class="text-center">${hasFeature ? '<i class="fas fa-check text-green"></i>' : '<i class="fas fa-times text-gray"></i>'}</td>`;
                });
                
                table += '</tr>';
            });
            
            table += '</tbody></table>';
            
            return $(`
                <div class="comparison-modal">
                    <div class="modal-backdrop"></div>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Plan Comparison</h3>
                            <button class="modal-close">&times;</button>
                        </div>
                        <div class="modal-body">
                            ${table}
                        </div>
                    </div>
                </div>
            `);
        }
    }

    // =========================================================================
    // SMOOTH SCROLLING AND NAVIGATION
    // =========================================================================
    
    class SmoothScrolling {
        constructor() {
            this.init();
        }
        
        init() {
            // Smooth scroll for anchor links
            $('a[href^="#"]').on('click', function(e) {
                const target = $(this.getAttribute('href'));
                
                if (target.length) {
                    e.preventDefault();
                    
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 800, 'easeInOutQuart');
                }
            });
            
            // Back to top button
            this.setupBackToTop();
        }
        
        setupBackToTop() {
            const $backToTop = $('<button class="back-to-top" aria-label="Back to top"><i class="fas fa-chevron-up"></i></button>');
            $('body').append($backToTop);
            
            $(window).on('scroll', () => {
                if ($(window).scrollTop() > 500) {
                    $backToTop.addClass('show');
                } else {
                    $backToTop.removeClass('show');
                }
            });
            
            $backToTop.on('click', () => {
                $('html, body').animate({
                    scrollTop: 0
                }, 800, 'easeInOutQuart');
            });
        }
    }

    // =========================================================================
    // FORM ENHANCEMENTS
    // =========================================================================
    
    class FormEnhancements {
        constructor() {
            this.init();
        }
        
        init() {
            this.setupFloatingLabels();
            this.setupFormValidation();
            this.setupContactForms();
        }
        
        setupFloatingLabels() {
            // Add floating label effect to form inputs
            $('.form-field input, .form-field textarea').on('focus blur', function(e) {
                const $field = $(this);
                const $label = $field.siblings('label');
                
                if (e.type === 'focus' || $field.val() !== '') {
                    $label.addClass('floating');
                } else {
                    $label.removeClass('floating');
                }
            });
        }
        
        setupFormValidation() {
            // Real-time form validation
            $('form input[required], form textarea[required]').on('blur', function() {
                const $field = $(this);
                const value = $field.val().trim();
                
                if (value === '') {
                    $field.addClass('error');
                    $field.siblings('.error-message').remove();
                    $field.after('<span class="error-message">This field is required</span>');
                } else {
                    $field.removeClass('error');
                    $field.siblings('.error-message').remove();
                }
            });
        }
        
        setupContactForms() {
            // Enhanced contact form submission
            $('.contact-form').on('submit', function(e) {
                e.preventDefault();
                
                const $form = $(this);
                const $submitBtn = $form.find('button[type="submit"]');
                const originalText = $submitBtn.text();
                
                // Show loading state
                $submitBtn.text('Sending...').prop('disabled', true);
                
                // Submit via AJAX
                $.ajax({
                    url: $form.attr('action') || wpAjax.ajaxurl,
                    type: 'POST',
                    data: $form.serialize(),
                    success: (response) => {
                        if (response.success) {
                            $form.trigger('reset');
                            this.showSuccessMessage('Thank you! Your message has been sent.');
                        } else {
                            this.showErrorMessage('Sorry, there was an error sending your message.');
                        }
                    },
                    error: () => {
                        this.showErrorMessage('Sorry, there was an error sending your message.');
                    },
                    complete: () => {
                        $submitBtn.text(originalText).prop('disabled', false);
                    }
                });
            });
        }
        
        showSuccessMessage(message) {
            this.showMessage(message, 'success');
        }
        
        showErrorMessage(message) {
            this.showMessage(message, 'error');
        }
        
        showMessage(message, type) {
            const $message = $(`<div class="form-message ${type}">${message}</div>`);
            
            $('body').append($message);
            
            setTimeout(() => {
                $message.addClass('show');
            }, 100);
            
            setTimeout(() => {
                $message.removeClass('show');
                setTimeout(() => $message.remove(), 300);
            }, 5000);
        }
    }

    // =========================================================================
    // PERFORMANCE OPTIMIZATION
    // =========================================================================
    
    class PerformanceOptimization {
        constructor() {
            this.init();
        }
        
        init() {
            this.setupLazyLoading();
            this.setupImageOptimization();
            this.setupPreloading();
        }
        
        setupLazyLoading() {
            // Lazy load images
            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.src = img.dataset.src;
                            img.classList.remove('lazy');
                            imageObserver.unobserve(img);
                        }
                    });
                });
                
                document.querySelectorAll('img[data-src]').forEach(img => {
                    imageObserver.observe(img);
                });
            }
        }
        
        setupImageOptimization() {
            // Add loading attributes to images
            $('img').each(function() {
                if (!$(this).attr('loading')) {
                    $(this).attr('loading', 'lazy');
                }
            });
        }
        
        setupPreloading() {
            // Preload critical resources
            const criticalImages = [
                // Add critical image paths here
            ];
            
            criticalImages.forEach(src => {
                const link = document.createElement('link');
                link.rel = 'preload';
                link.as = 'image';
                link.href = src;
                document.head.appendChild(link);
            });
        }
    }

    // =========================================================================
    // INITIALIZE ALL MODULES
    // =========================================================================
    
    $(document).ready(function() {
        // Initialize all modules
        new MobileMenu();
        new ServiceFiltering();
        new PricingPage();
        new SmoothScrolling();
        new FormEnhancements();
        new PerformanceOptimization();
        
        // Add CSS animations
        $('<style>')
            .text(`
                @keyframes fadeInUp {
                    from {
                        opacity: 0;
                        transform: translateY(30px);
                    }
                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }
                
                .animate-in {
                    animation: fadeInUp 0.6s ease forwards;
                }
                
                .sub-menu-toggle {
                    margin-left: 0.5rem;
                    transition: transform 0.3s ease;
                }
                
                .sub-menu-toggle.rotated {
                    transform: rotate(180deg);
                }
                
                .back-to-top {
                    position: fixed;
                    bottom: 2rem;
                    right: 2rem;
                    width: 50px;
                    height: 50px;
                    background: #1e40af;
                    color: white;
                    border: none;
                    border-radius: 50%;
                    cursor: pointer;
                    opacity: 0;
                    visibility: hidden;
                    transition: all 0.3s ease;
                    z-index: 1000;
                }
                
                .back-to-top.show {
                    opacity: 1;
                    visibility: visible;
                }
                
                .back-to-top:hover {
                    background: #1d4ed8;
                    transform: translateY(-2px);
                }
            `)
            .appendTo('head');
        
        console.log('Blueprint Folder Theme JavaScript loaded successfully');
    });

})(jQuery);

// =========================================================================
// ADDITIONAL UTILITY FUNCTIONS
// =========================================================================

// Debounce function for performance
function debounce(func, wait, immediate) {
    let timeout;
    return function executedFunction() {
        const context = this;
        const args = arguments;
        const later = function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        const callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
}

// Throttle function for scroll events
function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}
