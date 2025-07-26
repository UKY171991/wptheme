/**
 * BluePrint Folder Theme - Main JavaScript
 * Handles navigation, mobile menu, and interactive elements
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */

(function($) {
    'use strict';

    // Theme namespace
    const BluePrintFolder = {
        
        // Initialize all functions
        init: function() {
            this.mobileMenu();
            this.servicesFilter();
            this.backToTop();
            this.testimonialsCarousel();
            this.smoothScroll();
            this.lazyLoading();
            this.contactForm();
            this.headerScroll();
            this.dropdownMenus();
        },

        // Header scroll effects
        headerScroll: function() {
            const $header = $('.site-header');
            const $window = $(window);
            let lastScrollTop = 0;
            
            $window.on('scroll', function() {
                const scrollTop = $window.scrollTop();
                
                // Add scrolled class when scrolling down
                if (scrollTop > 100) {
                    $header.addClass('header-scrolled');
                } else {
                    $header.removeClass('header-scrolled');
                }
                
                lastScrollTop = scrollTop;
            });
        },

        // Enhanced dropdown menu functionality
        dropdownMenus: function() {
            const $dropdowns = $('.dropdown');
            const $navItems = $('.navbar-nav .nav-item');
            
            // Handle desktop hover for dropdowns
            $dropdowns.on('mouseenter', function() {
                if ($(window).width() > 1023) {
                    $(this).addClass('dropdown-open');
                    $(this).find('.dropdown-menu').stop(true, true).fadeIn(200);
                }
            });
            
            $dropdowns.on('mouseleave', function() {
                if ($(window).width() > 1023) {
                    $(this).removeClass('dropdown-open');
                    $(this).find('.dropdown-menu').stop(true, true).fadeOut(200);
                }
            });
            
            // Handle keyboard navigation
            $dropdowns.find('.dropdown-toggle').on('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    $(this).parent().toggleClass('dropdown-open');
                    const $menu = $(this).parent().find('.dropdown-menu');
                    if ($(this).parent().hasClass('dropdown-open')) {
                        $menu.fadeIn(200);
                    } else {
                        $menu.fadeOut(200);
                    }
                } else if (e.key === 'Escape') {
                    $(this).parent().removeClass('dropdown-open');
                    $(this).parent().find('.dropdown-menu').fadeOut(200);
                    $(this).focus();
                }
            });
            
            // Handle click outside to close
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.dropdown').length) {
                    $dropdowns.removeClass('dropdown-open');
                    $dropdowns.find('.dropdown-menu').fadeOut(200);
                }
            });
            
            // Handle touch devices
            if ('ontouchstart' in window) {
                $dropdowns.find('.dropdown-toggle').on('touchstart', function(e) {
                    if ($(window).width() > 1023) {
                        e.preventDefault();
                        const $parent = $(this).parent();
                        const isOpen = $parent.hasClass('dropdown-open');
                        
                        // Close all other dropdowns
                        $dropdowns.removeClass('dropdown-open');
                        $dropdowns.find('.dropdown-menu').fadeOut(200);
                        
                        // Toggle current dropdown
                        if (!isOpen) {
                            $parent.addClass('dropdown-open');
                            $parent.find('.dropdown-menu').fadeIn(200);
                        }
                    }
                });
            }
            
            // Handle navigation item active states
            $navItems.find('a').on('click', function() {
                // Remove active class from all items
                $navItems.removeClass('current-menu-item');
                // Add active class to clicked item
                $(this).closest('.nav-item').addClass('current-menu-item');
            });
        },

        // Mobile menu functionality
        mobileMenu: function() {
            const $menuToggle = $('.menu-toggle');
            const $navWrapper = $('.nav-menu-wrapper');
            const $overlay = $('.mobile-nav-overlay');
            const $body = $('body');

            // Toggle mobile menu
            $menuToggle.on('click', function(e) {
                e.preventDefault();
                
                const isOpen = $(this).hasClass('active');
                
                if (isOpen) {
                    // Close menu
                    $(this).removeClass('active').attr('aria-expanded', 'false');
                    $navWrapper.removeClass('mobile-menu-open');
                    $overlay.removeClass('active');
                    $body.removeClass('menu-open');
                } else {
                    // Open menu
                    $(this).addClass('active').attr('aria-expanded', 'true');
                    $navWrapper.addClass('mobile-menu-open');
                    $overlay.addClass('active');
                    $body.addClass('menu-open');
                }
            });

            // Close menu when overlay is clicked
            $overlay.on('click', function() {
                $menuToggle.removeClass('active').attr('aria-expanded', 'false');
                $navWrapper.removeClass('mobile-menu-open');
                $(this).removeClass('active');
                $body.removeClass('menu-open');
            });

            // Handle dropdown menus on mobile
            $('.navbar-nav .dropdown > .nav-link').on('click', function(e) {
                if ($(window).width() <= 1023) {
                    e.preventDefault();
                    
                    const $dropdown = $(this).closest('.dropdown');
                    const $submenu = $dropdown.find('> .dropdown-menu');
                    
                    $dropdown.toggleClass('show');
                    $submenu.slideToggle(300);
                }
            });

            // Close mobile menu on window resize
            $(window).on('resize', function() {
                if ($(window).width() > 1023) {
                    $menuToggle.removeClass('active').attr('aria-expanded', 'false');
                    $navWrapper.removeClass('mobile-menu-open');
                    $overlay.removeClass('active');
                    $body.removeClass('menu-open');
                    $('.navbar-nav .dropdown').removeClass('show');
                    $('.dropdown-menu').removeAttr('style');
                }
            });

            // Handle keyboard navigation
            $menuToggle.on('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    $(this).click();
                }
            });
        },

        // Services filter functionality
        servicesFilter: function() {
            $('.filter-btn').on('click', function() {
                const filter = $(this).data('filter');
                
                // Update active button
                $('.filter-btn').removeClass('active');
                $(this).addClass('active');
                
                // Filter services
                if (filter === 'all') {
                    $('.service-card').fadeIn(300);
                } else {
                    $('.service-card').each(function() {
                        const categories = $(this).data('category');
                        if (categories && categories.includes(filter)) {
                            $(this).fadeIn(300);
                        } else {
                            $(this).fadeOut(300);
                        }
                    });
                }
            });
        },

        // Back to top functionality
        backToTop: function() {
            const $backToTop = $('.back-to-top');
            
            // Show/hide button based on scroll position
            $(window).on('scroll', function() {
                if ($(this).scrollTop() > 500) {
                    $backToTop.fadeIn(300);
                } else {
                    $backToTop.fadeOut(300);
                }
            });
            
            // Smooth scroll to top
            $backToTop.on('click', function(e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: 0
                }, 600);
            });
        },

        // Testimonials carousel
        testimonialsCarousel: function() {
            if ($('.testimonials-carousel').length) {
                let currentSlide = 0;
                const $slides = $('.testimonial-card');
                const totalSlides = $slides.length;
                
                if (totalSlides > 1) {
                    // Add navigation buttons
                    $('.testimonials-carousel').append(
                        '<button class="carousel-btn prev-btn" aria-label="Previous testimonial"><i class="fas fa-chevron-left"></i></button>' +
                        '<button class="carousel-btn next-btn" aria-label="Next testimonial"><i class="fas fa-chevron-right"></i></button>'
                    );
                    
                    // Show only first slide initially
                    $slides.hide().eq(0).show();
                    
                    // Next button
                    $('.next-btn').on('click', function() {
                        $slides.eq(currentSlide).fadeOut(300);
                        currentSlide = (currentSlide + 1) % totalSlides;
                        $slides.eq(currentSlide).fadeIn(300);
                    });
                    
                    // Previous button
                    $('.prev-btn').on('click', function() {
                        $slides.eq(currentSlide).fadeOut(300);
                        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                        $slides.eq(currentSlide).fadeIn(300);
                    });
                    
                    // Auto-play carousel
                    setInterval(function() {
                        if (!$('.testimonials-carousel:hover').length) {
                            $('.next-btn').click();
                        }
                    }, 5000);
                }
            }
        },

        // Smooth scrolling for anchor links
        smoothScroll: function() {
            $('a[href^="#"]').on('click', function(e) {
                const target = $(this.getAttribute('href'));
                
                if (target.length) {
                    e.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 800);
                }
            });
        },

        // Lazy loading for images
        lazyLoading: function() {
            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            if (img.dataset.src) {
                                img.src = img.dataset.src;
                                img.removeAttribute('data-src');
                            }
                            observer.unobserve(img);
                        }
                    });
                });

                $('img[data-src]').each(function() {
                    imageObserver.observe(this);
                });
            }
        },

        // Enhanced contact form handling
        contactForm: function() {
            $('.contact-form, .newsletter-form').on('submit', function(e) {
                e.preventDefault();
                
                const $form = $(this);
                const $submitBtn = $form.find('[type="submit"]');
                const originalText = $submitBtn.html();
                
                // Show loading state
                $submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Sending...').prop('disabled', true);
                
                // Simulate form submission (replace with actual AJAX call)
                setTimeout(function() {
                    $submitBtn.html('<i class="fas fa-check"></i> Sent!').removeClass('btn-primary').addClass('btn-success');
                    
                    setTimeout(function() {
                        $submitBtn.html(originalText).prop('disabled', false).removeClass('btn-success').addClass('btn-primary');
                        $form[0].reset();
                    }, 2000);
                }, 1500);
            });
        }
    };

    // Additional utility functions
    const Utils = {
        
        // Debounce function for performance
        debounce: function(func, wait, immediate) {
            let timeout;
            return function() {
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
        },

        // Check if element is in viewport
        isInViewport: function(element) {
            const rect = element.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }
    };

    // Animations on scroll
    const AnimateOnScroll = {
        init: function() {
            this.animateElements();
            $(window).on('scroll', Utils.debounce(this.animateElements, 100));
        },

        animateElements: function() {
            $('.section').each(function() {
                if (Utils.isInViewport(this) && !$(this).hasClass('animated')) {
                    $(this).addClass('animated fadeInUp');
                }
            });
        }
    };

    // Header scroll effects
    const HeaderEffects = {
        init: function() {
            $(window).on('scroll', Utils.debounce(this.handleScroll, 100));
        },

        handleScroll: function() {
            const $header = $('.site-header');
            const scrollTop = $(window).scrollTop();
            
            if (scrollTop > 100) {
                $header.addClass('scrolled');
            } else {
                $header.removeClass('scrolled');
            }
        }
    };

    // Performance optimizations
    const Performance = {
        init: function() {
            this.preloadCriticalImages();
            this.optimizeAnimations();
        },

        preloadCriticalImages: function() {
            const criticalImages = [
                '/images/hero-bg.jpg',
                '/images/about.jpg'
            ];
            
            criticalImages.forEach(src => {
                const img = new Image();
                img.src = src;
            });
        },

        optimizeAnimations: function() {
            // Disable animations for users who prefer reduced motion
            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                $('*').css({
                    'animation-duration': '0.01ms !important',
                    'animation-iteration-count': '1 !important',
                    'transition-duration': '0.01ms !important'
                });
            }
        }
    };

    // Initialize everything when document is ready
    $(document).ready(function() {
        BluePrintFolder.init();
        AnimateOnScroll.init();
        HeaderEffects.init();
        Performance.init();
        
        // Add loaded class to body for CSS transitions
        $('body').addClass('loaded');
    });

    // Handle window load
    $(window).on('load', function() {
        // Hide loading screen if exists
        $('.loading-screen').fadeOut(500);
        
        // Trigger any load-dependent animations
        $('.hero-section').addClass('loaded');
    });

})(jQuery);
