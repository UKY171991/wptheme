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
        initMobileOptimizations();
        initTouchOptimizations();
        initPerformanceOptimizations();
        
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
        // Ensure Bootstrap components are properly initialized
        if (typeof bootstrap !== 'undefined') {
            // Initialize dropdown components
            var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
            var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
                return new bootstrap.Dropdown(dropdownToggleEl, {
                    autoClose: 'outside'
                });
            });
        }

        // Enhanced mobile menu toggle
        $('.navbar-toggler').on('click', function(e) {
            e.preventDefault();
            var target = $($(this).data('bs-target'));
            
            if (target.hasClass('show')) {
                target.removeClass('show');
                $(this).removeClass('active').attr('aria-expanded', 'false');
            } else {
                target.addClass('show');
                $(this).addClass('active').attr('aria-expanded', 'true');
            }
        });

        // Close mobile menu when clicking on nav links (not dropdowns)
        $('.navbar-nav .nav-link:not(.dropdown-toggle)').on('click', function() {
            if ($('.navbar-collapse').hasClass('show')) {
                $('.navbar-toggler').trigger('click');
            }
        });

        // Handle dropdown toggles in mobile
        $('.navbar-nav .dropdown-toggle').on('click', function(e) {
            if ($(window).width() <= 991) {
                e.preventDefault();
                e.stopPropagation();
                
                var dropdown = $(this).next('.dropdown-menu');
                var parent = $(this).parent();
                
                // Close other dropdowns
                $('.dropdown-menu').not(dropdown).slideUp(200).removeClass('show');
                $('.dropdown').not(parent).removeClass('show');
                
                // Toggle current dropdown
                if (dropdown.hasClass('show')) {
                    dropdown.slideUp(200).removeClass('show');
                    parent.removeClass('show');
                } else {
                    dropdown.slideDown(200).addClass('show');
                    parent.addClass('show');
                }
            }
        });

        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.navbar').length && $('.navbar-collapse').hasClass('show')) {
                $('.navbar-toggler').trigger('click');
            }
        });

        // Desktop hover effects for dropdowns
        if ($(window).width() > 991) {
            $('.navbar-nav .dropdown').hover(
                function() {
                    if ($(window).width() > 991) {
                        $(this).addClass('show');
                        $(this).find('.dropdown-menu').first().addClass('show');
                    }
                },
                function() {
                    if ($(window).width() > 991) {
                        $(this).removeClass('show');
                        $(this).find('.dropdown-menu').removeClass('show');
                    }
                }
            );
        }

        // Handle window resize
        $(window).on('resize', function() {
            if ($(window).width() > 991) {
                $('.navbar-collapse').removeClass('show');
                $('.navbar-toggler').removeClass('active').attr('aria-expanded', 'false');
                $('.dropdown-menu').removeClass('show').attr('style', '');
                $('.dropdown').removeClass('show');
            }
        });

        // Fix for multi-level dropdowns
        $('.dropdown-submenu .dropdown-toggle').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            var submenu = $(this).next('.dropdown-menu');
            submenu.toggleClass('show');
            
            // Position submenu
            if ($(window).width() > 991) {
                var rect = this.getBoundingClientRect();
                var submenuWidth = submenu.outerWidth();
                var windowWidth = $(window).width();
                
                if (rect.right + submenuWidth > windowWidth) {
                    submenu.addClass('dropdown-menu-end');
                }
            }
        });
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

    /**
     * Mobile-specific optimizations
     */
    function initMobileOptimizations() {
        // Check if device is mobile
        var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
        
        if (isMobile) {
            // Add mobile class to body
            $('body').addClass('is-mobile-device');
            
            // Optimize images for mobile
            $('img[data-mobile-src]').each(function() {
                $(this).attr('src', $(this).data('mobile-src'));
            });
            
            // Disable hover effects on mobile
            $('.hover-effect').addClass('mobile-no-hover');
            
            // Add touch-friendly button spacing
            $('.btn').addClass('mobile-touch-target');
        }
        
        // Handle orientation change
        $(window).on('orientationchange', function() {
            setTimeout(function() {
                $(window).trigger('resize');
            }, 500);
        });
        
        // Prevent zoom on form inputs (iOS)
        $('input, select, textarea').attr('data-mobile-optimized', 'true');
    }

    /**
     * Touch optimizations for mobile devices
     */
    function initTouchOptimizations() {
        // Add touch-friendly classes
        $('body').on('touchstart', '.btn, .card, .nav-link', function() {
            $(this).addClass('touched');
        });
        
        $('body').on('touchend', '.btn, .card, .nav-link', function() {
            var element = $(this);
            setTimeout(function() {
                element.removeClass('touched');
            }, 150);
        });
        
        // Swipe gesture for mobile menu
        var touchStartX = 0;
        var touchEndX = 0;
        
        $(document).on('touchstart', function(e) {
            touchStartX = e.originalEvent.changedTouches[0].screenX;
        });
        
        $(document).on('touchend', function(e) {
            touchEndX = e.originalEvent.changedTouches[0].screenX;
            handleSwipe();
        });
        
        function handleSwipe() {
            var swipeThreshold = 50;
            var diff = touchEndX - touchStartX;
            
            // Swipe right to open menu
            if (diff > swipeThreshold && touchStartX < 50 && !$('.navbar-collapse').hasClass('show')) {
                $('.navbar-toggler').click();
            }
            
            // Swipe left to close menu
            if (diff < -swipeThreshold && $('.navbar-collapse').hasClass('show')) {
                $('.navbar-toggler').click();
            }
        }
        
        // Optimize touch scrolling
        if (CSS.supports('scroll-behavior', 'smooth')) {
            $('html').css('scroll-behavior', 'smooth');
        }
    }

    /**
     * Performance optimizations
     */
    function initPerformanceOptimizations() {
        // Lazy loading for images
        if ('IntersectionObserver' in window) {
            var imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy-load');
                        imageObserver.unobserve(img);
                    }
                });
            });
            
            $('.lazy-load').each(function() {
                imageObserver.observe(this);
            });
        }
        
        // Debounce scroll and resize events
        var debounce = function(func, wait, immediate) {
            var timeout;
            return function() {
                var context = this, args = arguments;
                var later = function() {
                    timeout = null;
                    if (!immediate) func.apply(context, args);
                };
                var callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) func.apply(context, args);
            };
        };
        
        // Apply debouncing to resize events
        $(window).on('resize', debounce(function() {
            // Trigger custom resize event
            $(window).trigger('debouncedResize');
        }, 250));
        
        // Optimize animations based on device capabilities
        var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
        if (prefersReducedMotion.matches) {
            $('*').css({
                'animation-duration': '0.01ms !important',
                'animation-iteration-count': '1 !important',
                'transition-duration': '0.01ms !important'
            });
        }
        
        // Preload critical resources
        var preloadLinks = [
            '/wp-content/themes/wptheme/global.css',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'
        ];
        
        preloadLinks.forEach(function(href) {
            var link = document.createElement('link');
            link.rel = 'preload';
            link.as = 'style';
            link.href = href;
            document.head.appendChild(link);
        });
    }

})(jQuery);
