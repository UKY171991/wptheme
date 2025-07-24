/**
 * Service Blueprint Theme JavaScript
 * 
 * @package ServiceBlueprint
 * @version 1.0.0
 */

(function($) {
    'use strict';

    // Theme object
    const ServiceBlueprint = {
        
        // Initialize all functions
        init: function() {
            this.mobileNavigation();
            this.testimonialCarousel();
            this.parallaxEffects();
            this.lazyLoading();
            this.backToTop();
            this.smoothScrolling();
            this.accessibilityFeatures();
            this.animateOnScroll();
        },

        // Mobile Navigation
        mobileNavigation: function() {
            const $toggle = $('.mobile-menu-toggle');
            const $nav = $('.main-navigation');
            
            $toggle.on('click', function(e) {
                e.preventDefault();
                const isExpanded = $(this).attr('aria-expanded') === 'true';
                
                $(this).attr('aria-expanded', !isExpanded);
                $nav.toggleClass('mobile-open');
                
                // Toggle hamburger/close icon
                $(this).find('.hamburger').toggle();
                $(this).find('.close').toggle();
            });

            // Close menu when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.main-navigation, .mobile-menu-toggle').length) {
                    $nav.removeClass('mobile-open');
                    $toggle.attr('aria-expanded', 'false');
                    $toggle.find('.hamburger').show();
                    $toggle.find('.close').hide();
                }
            });

            // Handle dropdown menus on mobile
            $('.menu-item-has-children > a').on('click', function(e) {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    $(this).next('.sub-menu').slideToggle();
                    $(this).parent().toggleClass('open');
                }
            });

            // Keyboard navigation for dropdowns
            $('.main-navigation a').on('focus', function() {
                $(this).parents('.sub-menu').addClass('focus-within');
            }).on('blur', function() {
                setTimeout(() => {
                    if (!$(this).parents('.menu-item').find(':focus').length) {
                        $(this).parents('.sub-menu').removeClass('focus-within');
                    }
                }, 100);
            });
        },

        // Testimonial Carousel
        testimonialCarousel: function() {
            const $carousel = $('.testimonials-carousel');
            const $testimonials = $('.testimonial');
            const $dots = $('.testimonial-dot');
            let currentSlide = 0;
            let autoplayInterval;

            if ($testimonials.length <= 1) return;

            // Auto-advance testimonials
            function startAutoplay() {
                const delay = $carousel.data('delay') || 5000;
                autoplayInterval = setInterval(() => {
                    nextSlide();
                }, delay);
            }

            function stopAutoplay() {
                clearInterval(autoplayInterval);
            }

            function showSlide(index) {
                $testimonials.hide().eq(index).fadeIn(500);
                $dots.removeClass('active').eq(index).addClass('active');
                currentSlide = index;
            }

            function nextSlide() {
                const next = (currentSlide + 1) % $testimonials.length;
                showSlide(next);
            }

            function prevSlide() {
                const prev = (currentSlide - 1 + $testimonials.length) % $testimonials.length;
                showSlide(prev);
            }

            // Dot navigation
            $dots.on('click', function() {
                const index = $(this).data('slide');
                showSlide(index);
                stopAutoplay();
                startAutoplay();
            });

            // Keyboard navigation
            $carousel.on('keydown', function(e) {
                if (e.which === 37) { // Left arrow
                    prevSlide();
                    stopAutoplay();
                    startAutoplay();
                } else if (e.which === 39) { // Right arrow
                    nextSlide();
                    stopAutoplay();
                    startAutoplay();
                }
            });

            // Pause on hover
            $carousel.on('mouseenter', stopAutoplay).on('mouseleave', startAutoplay);

            // Start autoplay if enabled
            if ($carousel.data('autoplay')) {
                startAutoplay();
            }
        },

        // Parallax Effects
        parallaxEffects: function() {
            if (!$('body').hasClass('parallax-enabled')) return;

            const $parallaxElements = $('.parallax-banner');
            
            if ($parallaxElements.length === 0) return;

            function updateParallax() {
                const scrollTop = $(window).scrollTop();
                
                $parallaxElements.each(function() {
                    const $element = $(this);
                    const elementTop = $element.offset().top;
                    const elementHeight = $element.outerHeight();
                    const windowHeight = $(window).height();
                    
                    // Only apply parallax if element is in viewport
                    if (elementTop < scrollTop + windowHeight && elementTop + elementHeight > scrollTop) {
                        const yPos = -(scrollTop - elementTop) * 0.5;
                        $element.css('background-position', `center ${yPos}px`);
                    }
                });
            }

            // Throttled scroll handler
            let ticking = false;
            $(window).on('scroll', function() {
                if (!ticking) {
                    requestAnimationFrame(function() {
                        updateParallax();
                        ticking = false;
                    });
                    ticking = true;
                }
            });
        },

        // Lazy Loading for Images
        lazyLoading: function() {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.add('loaded');
                        observer.unobserve(img);
                    }
                });
            });

            $('img[data-src]').each(function() {
                imageObserver.observe(this);
            });
        },

        // Back to Top Button
        backToTop: function() {
            const $backToTop = $('#back-to-top');
            
            if ($backToTop.length === 0) return;

            $(window).on('scroll', function() {
                if ($(this).scrollTop() > 300) {
                    $backToTop.fadeIn();
                } else {
                    $backToTop.fadeOut();
                }
            });

            $backToTop.on('click', function(e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: 0
                }, 600);
            });
        },

        // Smooth Scrolling for Anchor Links
        smoothScrolling: function() {
            $('a[href*="#"]:not([href="#"])').on('click', function(e) {
                const target = $(this.hash);
                
                if (target.length) {
                    e.preventDefault();
                    
                    $('html, body').animate({
                        scrollTop: target.offset().top - 80 // Account for fixed header
                    }, 800);
                }
            });
        },

        // Accessibility Features
        accessibilityFeatures: function() {
            // Focus management for modals and dropdowns
            $(document).on('keydown', function(e) {
                if (e.which === 27) { // Escape key
                    // Close mobile menu
                    $('.main-navigation').removeClass('mobile-open');
                    $('.mobile-menu-toggle').attr('aria-expanded', 'false');
                }
            });

            // Skip links
            $('.skip-link').on('click', function(e) {
                e.preventDefault();
                const target = $($(this).attr('href'));
                target.attr('tabindex', '-1').focus();
            });

            // Focus visible for keyboard users
            $(document).on('keydown', function(e) {
                if (e.which === 9) { // Tab key
                    $('body').addClass('keyboard-nav');
                }
            });

            $(document).on('mousedown', function() {
                $('body').removeClass('keyboard-nav');
            });
        },

        // Animate Elements on Scroll
        animateOnScroll: function() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                    }
                });
            }, observerOptions);

            // Elements to animate
            $('.service-card, .featured-service-card, .testimonial').each(function() {
                observer.observe(this);
            });
        }
    };

    // Contact Form Handler (if contact form exists)
    function handleContactForm() {
        const $form = $('#contact-form');
        
        if ($form.length === 0) return;

        $form.on('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            formData.append('action', 'submit_contact_form');
            formData.append('nonce', serviceBlueprint.nonce);

            $.ajax({
                url: serviceBlueprint.ajaxurl,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $form.find('.submit-btn').prop('disabled', true).text('Sending...');
                },
                success: function(response) {
                    if (response.success) {
                        $form[0].reset();
                        showMessage('Thank you! Your message has been sent.', 'success');
                    } else {
                        showMessage(response.data || 'An error occurred. Please try again.', 'error');
                    }
                },
                error: function() {
                    showMessage('An error occurred. Please try again.', 'error');
                },
                complete: function() {
                    $form.find('.submit-btn').prop('disabled', false).text('Send Message');
                }
            });
        });
    }

    // Show notification messages
    function showMessage(message, type) {
        const $notification = $(`<div class="notification notification-${type}">${message}</div>`);
        $('body').append($notification);
        
        setTimeout(() => {
            $notification.addClass('show');
        }, 100);
        
        setTimeout(() => {
            $notification.removeClass('show');
            setTimeout(() => {
                $notification.remove();
            }, 300);
        }, 5000);
    }

    // Service Card Interactions
    function enhanceServiceCards() {
        $('.service-card').on('mouseenter', function() {
            $(this).find('.service-icon').addClass('bounce');
        }).on('mouseleave', function() {
            $(this).find('.service-icon').removeClass('bounce');
        });
    }

    // Initialize when document is ready
    $(document).ready(function() {
        ServiceBlueprint.init();
        handleContactForm();
        enhanceServiceCards();
    });

    // Handle window resize
    $(window).on('resize', function() {
        // Close mobile menu on desktop
        if ($(window).width() > 768) {
            $('.main-navigation').removeClass('mobile-open');
            $('.mobile-menu-toggle').attr('aria-expanded', 'false');
        }
    });

})(jQuery);

// Additional CSS animations and styles
const additionalStyles = `
<style>
/* Animation classes */
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

@keyframes bounce {
    0%, 20%, 53%, 80%, 100% {
        transform: translate3d(0,0,0);
    }
    40%, 43% {
        transform: translate3d(0, -10px, 0);
    }
    70% {
        transform: translate3d(0, -5px, 0);
    }
    90% {
        transform: translate3d(0, -2px, 0);
    }
}

.service-icon.bounce {
    animation: bounce 1s ease;
}

.animate-in {
    animation: fadeInUp 0.8s ease forwards;
}

.service-card,
.featured-service-card {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.8s ease, transform 0.8s ease;
}

.service-card.animate-in,
.featured-service-card.animate-in {
    opacity: 1;
    transform: translateY(0);
}

/* Focus styles for keyboard navigation */
.keyboard-nav *:focus {
    outline: 2px solid #2563eb !important;
    outline-offset: 2px !important;
}

/* Back to top button styles */
.back-to-top {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 50px;
    height: 50px;
    background: #2563eb;
    color: white;
    border: none;
    border-radius: 50%;
    font-size: 1.2rem;
    cursor: pointer;
    transition: all 0.3s ease;
    z-index: 1000;
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
}

.back-to-top:hover {
    background: #1d4ed8;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
}

/* Notification styles */
.notification {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 15px 20px;
    border-radius: 8px;
    color: white;
    font-weight: 500;
    z-index: 10000;
    transform: translateX(400px);
    transition: transform 0.3s ease;
    max-width: 300px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.notification.show {
    transform: translateX(0);
}

.notification-success {
    background: #10b981;
}

.notification-error {
    background: #ef4444;
}

/* Mobile hamburger menu styles */
.mobile-menu-toggle .close {
    display: none;
}

.mobile-menu-toggle[aria-expanded="true"] .hamburger {
    display: none;
}

.mobile-menu-toggle[aria-expanded="true"] .close {
    display: inline;
}

/* Improved focus styles for dropdowns */
.main-navigation .sub-menu.focus-within {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

/* Print styles */
@media print {
    .back-to-top,
    .mobile-menu-toggle,
    .notification {
        display: none !important;
    }
}

/* Reduced motion for accessibility */
@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
    
    .parallax-banner {
        background-attachment: scroll !important;
    }
}
</style>
`;

// Inject additional styles
document.head.insertAdjacentHTML('beforeend', additionalStyles);
