/**
 * Enhanced Pricing Page Interactions
 * Interactive elements and animations for improved user experience
 */

(function($) {
    'use strict';

    // Initialize when DOM is ready
    $(document).ready(function() {
        initPricingToggle();
        initFAQAccordion();
        initPricingCardAnimations();
        initScrollAnimations();
        initPricingCalculator();
        initSmoothScrolling();
    });

    /**
     * Enhanced Pricing Toggle Functionality
     */
    function initPricingToggle() {
        const toggle = $('#pricing-toggle');
        const priceElements = $('.price-amount');
        const savingsElements = $('.price-savings');
        const toggleLabels = $('.toggle-label');

        toggle.on('change', function() {
            const isMonthly = $(this).is(':checked');
            
            // Update pricing display
            priceElements.each(function() {
                const $element = $(this);
                const oneTimePrice = $element.data('onetime');
                const recurringPrice = $element.data('recurring');
                
                if (isMonthly && recurringPrice) {
                    $element.text('$' + recurringPrice);
                    $element.addClass('pricing-transition');
                } else if (oneTimePrice) {
                    $element.text('$' + oneTimePrice);
                    $element.addClass('pricing-transition');
                }
                
                // Remove transition class after animation
                setTimeout(() => {
                    $element.removeClass('pricing-transition');
                }, 300);
            });

            // Show/hide savings badges
            if (isMonthly) {
                savingsElements.fadeIn(300);
                toggleLabels.last().addClass('toggle-active');
                toggleLabels.first().removeClass('toggle-active');
            } else {
                savingsElements.fadeOut(300);
                toggleLabels.first().addClass('toggle-active');
                toggleLabels.last().removeClass('toggle-active');
            }

            // Add visual feedback
            $('.pricing-card').addClass('price-update-animation');
            setTimeout(() => {
                $('.pricing-card').removeClass('price-update-animation');
            }, 600);
        });
    }

    /**
     * Enhanced FAQ Accordion
     */
    function initFAQAccordion() {
        $('.faq-question').on('click', function() {
            const $faqItem = $(this).closest('.faq-item');
            const $answer = $faqItem.find('.faq-answer');
            const $icon = $(this).find('.faq-icon');

            // Close other open FAQs
            $('.faq-item').not($faqItem).removeClass('active').find('.faq-answer').slideUp(300);
            $('.faq-icon').not($icon).removeClass('rotated');

            // Toggle current FAQ
            if ($faqItem.hasClass('active')) {
                $faqItem.removeClass('active');
                $answer.slideUp(300);
                $icon.removeClass('rotated');
            } else {
                $faqItem.addClass('active');
                $answer.slideDown(300);
                $icon.addClass('rotated');
            }
        });
    }

    /**
     * Enhanced Pricing Card Animations
     */
    function initPricingCardAnimations() {
        // Hover effects for pricing cards
        $('.pricing-card').hover(
            function() {
                $(this).find('.plan-icon').addClass('icon-hover-effect');
                $(this).find('.btn-plan').addClass('button-hover-ready');
            },
            function() {
                $(this).find('.plan-icon').removeClass('icon-hover-effect');
                $(this).find('.btn-plan').removeClass('button-hover-ready');
            }
        );

        // Click analytics tracking
        $('.btn-plan').on('click', function(e) {
            const planName = $(this).closest('.pricing-card').find('h3').text();
            console.log('Plan selected:', planName);
            
            // Add visual feedback
            $(this).addClass('button-clicked');
            setTimeout(() => {
                $(this).removeClass('button-clicked');
            }, 300);
        });

        // Feature item hover effects
        $('.feature-item').hover(
            function() {
                $(this).find('.feature-check, .feature-cross').addClass('icon-bounce');
            },
            function() {
                $(this).find('.feature-check, .feature-cross').removeClass('icon-bounce');
            }
        );
    }

    /**
     * Scroll-triggered Animations
     */
    function initScrollAnimations() {
        // Intersection Observer for scroll animations
        if ('IntersectionObserver' in window) {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const $element = $(entry.target);
                        
                        if ($element.hasClass('pricing-card')) {
                            $element.addClass('animate-slide-up');
                        }
                        
                        if ($element.hasClass('value-item')) {
                            $element.addClass('animate-fade-in-up');
                        }
                        
                        if ($element.hasClass('testimonial-card')) {
                            $element.addClass('animate-scale-in');
                        }
                        
                        if ($element.hasClass('trust-item')) {
                            $element.addClass('animate-bounce-in');
                        }
                        
                        // Animate counters
                        if ($element.hasClass('stat-number') && !$element.hasClass('counted')) {
                            animateCounter($element);
                        }
                    }
                });
            }, observerOptions);

            // Observe elements
            $('.pricing-card, .value-item, .testimonial-card, .trust-item, .stat-number').each(function() {
                observer.observe(this);
            });
        }
    }

    /**
     * Animate Counter Numbers
     */
    function animateCounter($element) {
        $element.addClass('counted');
        const targetNumber = parseInt($element.data('count')) || parseInt($element.text());
        const duration = 2000;
        const increment = targetNumber / (duration / 16);
        let current = 0;

        const timer = setInterval(function() {
            current += increment;
            if (current >= targetNumber) {
                current = targetNumber;
                clearInterval(timer);
            }
            $element.text(Math.floor(current));
        }, 16);
    }

    /**
     * Enhanced Pricing Calculator
     */
    function initPricingCalculator() {
        // Service selection
        $('.service-option').on('click', function() {
            $(this).toggleClass('selected');
            updateCalculatorTotal();
        });

        // Property size slider
        $('#property-size').on('input', function() {
            const size = $(this).val();
            $('#size-display').text(size + ' sq ft');
            updateCalculatorTotal();
        });

        // Frequency selection
        $('input[name="frequency"]').on('change', function() {
            updateCalculatorTotal();
        });

        function updateCalculatorTotal() {
            let total = 0;
            let basePrice = 100;

            // Calculate based on selected services
            $('.service-option.selected').each(function() {
                total += parseFloat($(this).data('price')) || 0;
            });

            // Calculate based on property size
            const size = parseInt($('#property-size').val()) || 1000;
            const sizeMultiplier = Math.max(1, size / 1000);
            total = (total + basePrice) * sizeMultiplier;

            // Apply frequency discount
            const frequency = $('input[name="frequency"]:checked').val();
            if (frequency === 'weekly') {
                total *= 0.85; // 15% discount
            } else if (frequency === 'monthly') {
                total *= 0.9; // 10% discount
            }

            // Update display
            $('#calculator-total').text('$' + Math.round(total));
            
            // Add animation
            $('#calculator-total').addClass('total-update');
            setTimeout(() => {
                $('#calculator-total').removeClass('total-update');
            }, 300);
        }
    }

    /**
     * Smooth Scrolling for Anchor Links
     */
    function initSmoothScrolling() {
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            const target = $($(this).attr('href'));
            
            if (target.length) {
                const offset = $('.site-header').outerHeight() || 80;
                $('html, body').animate({
                    scrollTop: target.offset().top - offset
                }, 800, 'easeInOutCubic');
            }
        });
    }

})(jQuery);

/**
 * Enhanced CSS Classes for JavaScript Animations
 */
const enhancedAnimationStyles = `
<style>
.pricing-transition {
    animation: priceChange 0.3s ease-in-out !important;
}

@keyframes priceChange {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); color: #ff5f00; }
    100% { transform: scale(1); }
}

.price-update-animation {
    animation: cardPulse 0.6s ease-in-out !important;
}

@keyframes cardPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.02); }
}

.icon-hover-effect {
    animation: iconPulse 0.6s ease-in-out infinite !important;
}

@keyframes iconPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

.button-hover-ready {
    animation: buttonReady 0.3s ease-in-out !important;
}

@keyframes buttonReady {
    0% { transform: translateY(0); }
    100% { transform: translateY(-2px); }
}

.button-clicked {
    animation: buttonClick 0.3s ease-in-out !important;
}

@keyframes buttonClick {
    0% { transform: scale(1); }
    50% { transform: scale(0.95); }
    100% { transform: scale(1); }
}

.icon-bounce {
    animation: iconBounce 0.6s ease-in-out !important;
}

@keyframes iconBounce {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.2); }
}

.animate-slide-up {
    animation: slideUpFade 0.8s ease-out forwards !important;
}

@keyframes slideUpFade {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-up {
    animation: fadeInUp 0.6s ease-out forwards !important;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-scale-in {
    animation: scaleIn 0.6s ease-out forwards !important;
}

@keyframes scaleIn {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.animate-bounce-in {
    animation: bounceIn 0.8s ease-out forwards !important;
}

@keyframes bounceIn {
    0% {
        opacity: 0;
        transform: scale(0.3);
    }
    50% {
        transform: scale(1.05);
    }
    70% {
        transform: scale(0.9);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

.toggle-active {
    color: #667eea !important;
    font-weight: 700 !important;
}

.faq-icon.rotated {
    transform: rotate(180deg) !important;
}

.total-update {
    animation: totalUpdate 0.3s ease-in-out !important;
}

@keyframes totalUpdate {
    0% { transform: scale(1); color: inherit; }
    50% { transform: scale(1.1); color: #ff5f00; }
    100% { transform: scale(1); color: inherit; }
}

.service-option {
    cursor: pointer !important;
    transition: all 0.3s ease !important;
}

.service-option.selected {
    background: rgba(102, 126, 234, 0.1) !important;
    border-color: #667eea !important;
    transform: scale(1.02) !important;
}
</style>
`;

// Inject enhanced animation styles
document.head.insertAdjacentHTML('beforeend', enhancedAnimationStyles);
