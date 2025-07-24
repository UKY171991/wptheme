/**
 * Services Pro Theme JavaScript
 * Version: 3.0
 */

(function($) {
    'use strict';

    // Wait for DOM to be ready
    $(document).ready(function() {
        
        // Initialize all components
        initSmoothScrolling();
        initHeaderScroll();
        initMobileMenu();
        initFormValidation();
        initAnimations();
        initTooltips();
        
    });

    /**
     * Smooth scrolling for anchor links
     */
    function initSmoothScrolling() {
        $('a[href*="#"]:not([href="#"])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 1000);
                    return false;
                }
            }
        });
    }

    /**
     * Header scroll effects
     */
    function initHeaderScroll() {
        var header = $('.site-header');
        var scrollPosition = 0;
        
        $(window).scroll(function() {
            scrollPosition = $(this).scrollTop();
            
            if (scrollPosition > 100) {
                header.addClass('scrolled').css('background-color', 'rgba(255, 255, 255, 0.95)');
            } else {
                header.removeClass('scrolled').css('background-color', 'rgba(255, 255, 255, 1)');
            }
        });
    }

    /**
     * Mobile menu enhancements
     */
    function initMobileMenu() {
        // Close mobile menu when clicking on links
        $('.navbar-nav a').on('click', function() {
            if ($('.navbar-collapse').hasClass('show')) {
                $('.navbar-toggler').click();
            }
        });

        // Dropdown hover effects for desktop
        if ($(window).width() > 992) {
            $('.dropdown').hover(
                function() {
                    $(this).addClass('show');
                    $(this).find('.dropdown-menu').addClass('show');
                },
                function() {
                    $(this).removeClass('show');
                    $(this).find('.dropdown-menu').removeClass('show');
                }
            );
        }
    }

    /**
     * Form validation
     */
    function initFormValidation() {
        // Contact form validation
        $('#contact-form').on('submit', function(e) {
            var isValid = true;
            var form = $(this);
            
            // Remove previous error messages
            form.find('.error-message').remove();
            form.find('.is-invalid').removeClass('is-invalid');
            
            // Validate required fields
            form.find('[required]').each(function() {
                var field = $(this);
                var value = field.val().trim();
                
                if (value === '') {
                    field.addClass('is-invalid');
                    field.after('<div class="error-message text-danger small mt-1">This field is required.</div>');
                    isValid = false;
                }
            });
            
            // Validate email
            var email = form.find('input[type="email"]');
            if (email.length && email.val()) {
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email.val())) {
                    email.addClass('is-invalid');
                    email.after('<div class="error-message text-danger small mt-1">Please enter a valid email address.</div>');
                    isValid = false;
                }
            }
            
            // Validate phone
            var phone = form.find('input[type="tel"]');
            if (phone.length && phone.val()) {
                var phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
                if (!phoneRegex.test(phone.val().replace(/\s/g, ''))) {
                    phone.addClass('is-invalid');
                    phone.after('<div class="error-message text-danger small mt-1">Please enter a valid phone number.</div>');
                    isValid = false;
                }
            }
            
            if (!isValid) {
                e.preventDefault();
                // Scroll to first error
                $('html, body').animate({
                    scrollTop: form.find('.is-invalid').first().offset().top - 100
                }, 500);
            }
        });
    }

    /**
     * Scroll animations
     */
    function initAnimations() {
        // Fade in elements on scroll
        var animatedElements = $('.fade-in-up, .card-hover');
        
        function checkAnimations() {
            var windowTop = $(window).scrollTop();
            var windowHeight = $(window).height();
            
            animatedElements.each(function() {
                var element = $(this);
                var elementTop = element.offset().top;
                
                if (elementTop < windowTop + windowHeight - 100 && !element.hasClass('animated')) {
                    element.addClass('animated');
                    
                    // Add staggered animation for cards
                    if (element.hasClass('card-hover')) {
                        var delay = element.index() * 100;
                        setTimeout(function() {
                            element.css('opacity', '1').css('transform', 'translateY(0)');
                        }, delay);
                    }
                }
            });
        }
        
        // Initialize animations
        checkAnimations();
        $(window).scroll(checkAnimations);
    }

    /**
     * Initialize Bootstrap tooltips
     */
    function initTooltips() {
        if (typeof bootstrap !== 'undefined') {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        }
    }

    /**
     * Service filtering (for services page)
     */
    function initServiceFiltering() {
        $('.service-filter').on('click', function(e) {
            e.preventDefault();
            
            var filter = $(this).data('filter');
            var services = $('.service-item');
            
            // Update active button
            $('.service-filter').removeClass('active');
            $(this).addClass('active');
            
            // Filter services
            if (filter === 'all') {
                services.fadeIn();
            } else {
                services.each(function() {
                    if ($(this).hasClass(filter)) {
                        $(this).fadeIn();
                    } else {
                        $(this).fadeOut();
                    }
                });
            }
        });
    }

    /**
     * FAQ accordion functionality
     */
    function initFAQ() {
        $('.faq-question').on('click', function() {
            var question = $(this);
            var answer = question.next('.faq-answer');
            var icon = question.find('.faq-icon');
            
            // Close other open FAQs
            $('.faq-answer').not(answer).slideUp();
            $('.faq-icon').not(icon).removeClass('fa-minus').addClass('fa-plus');
            
            // Toggle current FAQ
            answer.slideToggle();
            icon.toggleClass('fa-plus fa-minus');
        });
    }

    /**
     * Counter animation
     */
    function initCounters() {
        $('.counter').each(function() {
            var counter = $(this);
            var target = parseInt(counter.text());
            var current = 0;
            var increment = target / 100;
            var timer = setInterval(function() {
                current += increment;
                if (current >= target) {
                    counter.text(target);
                    clearInterval(timer);
                } else {
                    counter.text(Math.floor(current));
                }
            }, 20);
        });
    }

    // Initialize service-specific functions based on page
    if ($('body').hasClass('page-template-page-services')) {
        initServiceFiltering();
    }
    
    if ($('body').hasClass('page-template-page-faq')) {
        initFAQ();
    }

})(jQuery);
