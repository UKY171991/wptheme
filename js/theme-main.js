/**
 * Professional Services Theme - Main JavaScript
 * Handles navigation, mobile menu, interactions, and homepage functionality
 */

(function($) {
    'use strict';

    // DOM Ready
    $(document).ready(function() {
        initNavigation();
        initMobileMenu();
        initSmoothScrolling();
        initBackToTop();
        initAnimations();
        initHomepageFeatures();
    });

    // Window Load
    $(window).on('load', function() {
        initPreloader();
    });

    // Window Scroll
    $(window).on('scroll', function() {
        handleScroll();
    });

    /**
     * Initialize Navigation
     */
    function initNavigation() {
        // Handle dropdown menus on desktop
        $('.dropdown').on('mouseenter', function() {
            $(this).addClass('show');
            $(this).find('.dropdown-menu').addClass('show');
        }).on('mouseleave', function() {
            $(this).removeClass('show');
            $(this).find('.dropdown-menu').removeClass('show');
        });

        // Handle dropdown clicks on mobile
        $('.dropdown-toggle').on('click', function(e) {
            if ($(window).width() <= 1023) {
                e.preventDefault();
                const $dropdown = $(this).parent('.dropdown');
                const $menu = $dropdown.find('.dropdown-menu');
                
                $dropdown.toggleClass('show');
                $menu.slideToggle(300);
            }
        });

        // Handle submenu hovers
        $('.dropdown-submenu').on('mouseenter', function() {
            $(this).find('> .dropdown-menu').addClass('show');
        }).on('mouseleave', function() {
            $(this).find('> .dropdown-menu').removeClass('show');
        });

        // Add active class to current menu item
        const currentUrl = window.location.pathname;
        $('.navbar-nav a').each(function() {
            const linkUrl = $(this).attr('href');
            if (linkUrl && currentUrl.includes(linkUrl) && linkUrl !== '/') {
                $(this).closest('.nav-item').addClass('active');
            }
        });
    }

    /**
     * Initialize Mobile Menu
     */
    function initMobileMenu() {
        const $menuToggle = $('.menu-toggle');
        const $navWrapper = $('.nav-menu-wrapper');
        const $overlay = $('.mobile-nav-overlay');
        
        // Create overlay if it doesn't exist
        if ($overlay.length === 0) {
            $('body').append('<div class="mobile-nav-overlay"></div>');
        }

        // Toggle mobile menu
        $menuToggle.on('click', function() {
            const isOpen = $navWrapper.hasClass('mobile-menu-open');
            
            if (isOpen) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        });

        // Close menu when clicking overlay
        $(document).on('click', '.mobile-nav-overlay', function() {
            closeMobileMenu();
        });

        // Close menu when clicking a link (except dropdowns)
        $('.navbar-nav a:not(.dropdown-toggle)').on('click', function() {
            if ($(window).width() <= 1023) {
                closeMobileMenu();
            }
        });

        // Handle escape key
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && $navWrapper.hasClass('mobile-menu-open')) {
                closeMobileMenu();
            }
        });

        function openMobileMenu() {
            $menuToggle.addClass('active');
            $navWrapper.addClass('mobile-menu-open');
            $('.mobile-nav-overlay').addClass('active');
            $('body').addClass('mobile-menu-active');
        }

        function closeMobileMenu() {
            $menuToggle.removeClass('active');
            $navWrapper.removeClass('mobile-menu-open');
            $('.mobile-nav-overlay').removeClass('active');
            $('body').removeClass('mobile-menu-active');
            
            // Close all dropdown menus
            $('.dropdown').removeClass('show');
            $('.dropdown-menu').hide();
        }
    }

    /**
     * Initialize Smooth Scrolling
     */
    function initSmoothScrolling() {
        $('a[href*="#"]:not([href="#"])').on('click', function() {
            const target = $(this.hash);
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'easeInOutCubic');
                return false;
            }
        });
    }

    /**
     * Initialize Back to Top Button
     */
    function initBackToTop() {
        // Create back to top button if it doesn't exist
        if ($('.back-to-top').length === 0) {
            $('body').append('<button class="back-to-top" title="Back to Top"><i class="fas fa-arrow-up"></i></button>');
        }

        const $backToTop = $('.back-to-top');

        $backToTop.on('click', function() {
            $('html, body').animate({
                scrollTop: 0
            }, 800, 'easeInOutCubic');
        });

        // Show/hide based on scroll position
        handleBackToTopVisibility();
    }

    /**
     * Handle Scroll Events
     */
    function handleScroll() {
        handleBackToTopVisibility();
        handleStickyHeader();
        handleScrollAnimations();
    }

    /**
     * Handle Back to Top Button Visibility
     */
    function handleBackToTopVisibility() {
        const $backToTop = $('.back-to-top');
        if ($(window).scrollTop() > 300) {
            $backToTop.addClass('visible');
        } else {
            $backToTop.removeClass('visible');
        }
    }

    /**
     * Handle Sticky Header
     */
    function handleStickyHeader() {
        const $header = $('.site-header');
        if ($(window).scrollTop() > 100) {
            $header.addClass('scrolled');
        } else {
            $header.removeClass('scrolled');
        }
    }

    /**
     * Initialize Animations
     */
    function initAnimations() {
        // Add custom easing
        if ($.easing) {
            $.easing.easeInOutCubic = function(x, t, b, c, d) {
                if ((t /= d / 2) < 1) return c / 2 * t * t * t + b;
                return c / 2 * ((t -= 2) * t * t + 2) + b;
            };
        }

        // Initialize scroll animations
        initScrollAnimations();
    }

    /**
     * Initialize Scroll Animations
     */
    function initScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        $(entry.target).addClass('animate-in');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observe elements for animation
            $('.service-card, .testimonial-card, .benefit-item, .stat-item').each(function() {
                observer.observe(this);
            });
        }
    }

    /**
     * Handle Scroll Animations
     */
    function handleScrollAnimations() {
        // Counter animation for stats
        $('.stat-number').each(function() {
            const $this = $(this);
            if (!$this.hasClass('animated') && isElementInViewport($this[0])) {
                $this.addClass('animated');
                animateCounter($this);
            }
        });
    }

    /**
     * Animate Counter
     */
    function animateCounter($element) {
        const target = parseInt($element.text().replace(/[^\d]/g, ''));
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;
        const suffix = $element.text().replace(/[\d]/g, '');

        const timer = setInterval(function() {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            $element.text(Math.floor(current) + suffix);
        }, 16);
    }

    /**
     * Check if element is in viewport
     */
    function isElementInViewport(el) {
        const rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    /**
     * Initialize Homepage Features
     */
    function initHomepageFeatures() {
        initHeroAnimations();
        initServiceCardHovers();
        initTestimonialSlider();
    }

    /**
     * Initialize Hero Animations
     */
    function initHeroAnimations() {
        if ($('.hero-section').length > 0) {
            // Animate hero content on load
            setTimeout(function() {
                $('.hero-title').addClass('animate-in');
            }, 300);

            setTimeout(function() {
                $('.hero-description').addClass('animate-in');
            }, 600);

            setTimeout(function() {
                $('.hero-buttons').addClass('animate-in');
            }, 900);

            setTimeout(function() {
                $('.hero-features').addClass('animate-in');
            }, 1200);
        }
    }

    /**
     * Initialize Service Card Hovers
     */
    function initServiceCardHovers() {
        $('.service-card').on('mouseenter', function() {
            $(this).find('.service-icon').addClass('hover-effect');
        }).on('mouseleave', function() {
            $(this).find('.service-icon').removeClass('hover-effect');
        });
    }

    /**
     * Initialize Testimonial Slider (if needed)
     */
    function initTestimonialSlider() {
        // If there are more than 3 testimonials, initialize slider
        if ($('.testimonial-card').length > 3) {
            // This could be extended to include a carousel/slider functionality
            // For now, we'll keep the grid layout
        }
    }

    /**
     * Initialize Preloader
     */
    function initPreloader() {
        if ($('.preloader').length > 0) {
            $('.preloader').fadeOut(500);
        }
    }

    /**
     * Form Enhancements
     */
    function initFormEnhancements() {
        // Newsletter form
        $('.newsletter-form').on('submit', function(e) {
            e.preventDefault();
            const $form = $(this);
            const $input = $form.find('input[type="email"]');
            const $button = $form.find('button');
            const email = $input.val();

            if (validateEmail(email)) {
                $button.text('Subscribing...');
                
                // Simulate AJAX submission
                setTimeout(function() {
                    $button.text('Subscribed!');
                    $input.val('');
                    
                    setTimeout(function() {
                        $button.html('<i class="fas fa-paper-plane"></i>');
                    }, 2000);
                }, 1000);
            } else {
                showNotification('Please enter a valid email address', 'error');
            }
        });
    }

    /**
     * Validate Email
     */
    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    /**
     * Show Notification
     */
    function showNotification(message, type = 'info') {
        const $notification = $('<div class="notification notification-' + type + '">' + message + '</div>');
        $('body').append($notification);
        
        setTimeout(function() {
            $notification.addClass('show');
        }, 100);

        setTimeout(function() {
            $notification.removeClass('show');
            setTimeout(function() {
                $notification.remove();
            }, 300);
        }, 3000);
    }

    /**
     * Initialize Search Functionality
     */
    function initSearch() {
        const $searchToggle = $('.search-toggle');
        const $searchForm = $('.search-form');
        const $searchInput = $('.search-form input');

        $searchToggle.on('click', function(e) {
            e.preventDefault();
            $searchForm.toggleClass('active');
            if ($searchForm.hasClass('active')) {
                $searchInput.focus();
            }
        });

        // Close search when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.search-form, .search-toggle').length) {
                $searchForm.removeClass('active');
            }
        });

        // Handle escape key
        $searchInput.on('keydown', function(e) {
            if (e.key === 'Escape') {
                $searchForm.removeClass('active');
            }
        });
    }

    /**
     * Initialize Loading States
     */
    function initLoadingStates() {
        // Add loading state to buttons on click
        $('.btn').on('click', function() {
            const $btn = $(this);
            if (!$btn.hasClass('loading')) {
                $btn.addClass('loading');
                const originalText = $btn.html();
                $btn.html('<i class="fas fa-spinner fa-spin"></i> Loading...');
                
                // Remove loading state after navigation
                setTimeout(function() {
                    $btn.removeClass('loading').html(originalText);
                }, 2000);
            }
        });
    }

    // Initialize additional features
    $(document).ready(function() {
        initFormEnhancements();
        initSearch();
        initLoadingStates();
    });

    // Expose functions for external use
    window.ProfessionalServices = {
        showNotification: showNotification,
        validateEmail: validateEmail,
        closeMobileMenu: function() {
            $('.menu-toggle').removeClass('active');
            $('.nav-menu-wrapper').removeClass('mobile-menu-open');
            $('.mobile-nav-overlay').removeClass('active');
            $('body').removeClass('mobile-menu-active');
        }
    };

})(jQuery);

/**
 * Vanilla JavaScript fallback for non-jQuery environments
 */
if (typeof jQuery === 'undefined') {
    document.addEventListener('DOMContentLoaded', function() {
        console.warn('jQuery not loaded. Some features may not work properly.');
        
        // Basic mobile menu functionality
        const menuToggle = document.querySelector('.menu-toggle');
        const navWrapper = document.querySelector('.nav-menu-wrapper');
        
        if (menuToggle && navWrapper) {
            menuToggle.addEventListener('click', function() {
                menuToggle.classList.toggle('active');
                navWrapper.classList.toggle('mobile-menu-open');
                document.body.classList.toggle('mobile-menu-active');
            });
        }

        // Basic smooth scrolling
        document.querySelectorAll('a[href*="#"]').forEach(function(link) {
            link.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    e.preventDefault();
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Basic back to top
        const backToTop = document.querySelector('.back-to-top');
        if (backToTop) {
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTop.classList.add('visible');
                } else {
                    backToTop.classList.remove('visible');
                }
            });

            backToTop.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
    });
}
