/**
 * BluePrint Folder Theme - Main JavaScript
 * Handles navigation, animations, and interactive features
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */

(function($) {
    'use strict';

    // Theme object
    const BluePrintFolder = {
        
        /**
         * Initialize all theme functionality
         */
        init: function() {
            this.mobileMenu();
            this.stickyHeader();
            this.smoothScrolling();
            this.servicesFilter();
            this.animateOnScroll();
            this.lazyLoadImages();
            this.testimonialCarousel();
            this.statsCounter();
            this.dropdownMenus();
            this.backToTop();
        },

        /**
         * Mobile Menu Toggle
         */
        mobileMenu: function() {
            const menuToggle = $('.menu-toggle');
            const navMenu = $('.nav-menu-wrapper');
            const body = $('body');
            
            menuToggle.on('click', function(e) {
                e.preventDefault();
                
                $(this).toggleClass('active');
                navMenu.toggleClass('active');
                body.toggleClass('menu-open');
                
                // Update aria-expanded
                const isExpanded = $(this).attr('aria-expanded') === 'true';
                $(this).attr('aria-expanded', !isExpanded);
            });
            
            // Close menu when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.main-navigation').length) {
                    menuToggle.removeClass('active');
                    navMenu.removeClass('active');
                    body.removeClass('menu-open');
                    menuToggle.attr('aria-expanded', 'false');
                }
            });
            
            // Close menu on escape key
            $(document).on('keydown', function(e) {
                if (e.keyCode === 27) { // Escape key
                    menuToggle.removeClass('active');
                    navMenu.removeClass('active');
                    body.removeClass('menu-open');
                    menuToggle.attr('aria-expanded', 'false');
                }
            });
        },

        /**
         * Sticky Header
         */
        stickyHeader: function() {
            const header = $('.site-header');
            const scrollThreshold = 100;
            
            $(window).on('scroll', function() {
                const scrollTop = $(this).scrollTop();
                
                if (scrollTop > scrollThreshold) {
                    header.addClass('scrolled');
                } else {
                    header.removeClass('scrolled');
                }
            });
        },

        /**
         * Smooth Scrolling for Anchor Links
         */
        smoothScrolling: function() {
            $('a[href*="#"]:not([href="#"])').on('click', function(e) {
                const target = $(this.hash);
                
                if (target.length) {
                    e.preventDefault();
                    
                    const headerHeight = $('.site-header').outerHeight();
                    const targetOffset = target.offset().top - headerHeight - 20;
                    
                    $('html, body').animate({
                        scrollTop: targetOffset
                    }, 800, 'easeInOutCubic');
                }
            });
        },

        /**
         * Services Filter Functionality
         */
        servicesFilter: function() {
            const filterButtons = $('.filter-btn');
            const serviceCards = $('.service-card');
            
            filterButtons.on('click', function(e) {
                e.preventDefault();
                
                const filter = $(this).data('filter');
                
                // Update active button
                filterButtons.removeClass('active');
                $(this).addClass('active');
                
                // Filter services
                if (filter === 'all') {
                    serviceCards.fadeIn(400);
                } else {
                    serviceCards.each(function() {
                        const categories = $(this).data('category');
                        
                        if (categories && categories.includes(filter)) {
                            $(this).fadeIn(400);
                        } else {
                            $(this).fadeOut(400);
                        }
                    });
                }
            });
        },

        /**
         * Animate Elements on Scroll
         */
        animateOnScroll: function() {
            const animatedElements = $('.fade-in-up, .service-card, .category-card, .testimonial-card, .blog-card');
            
            function checkVisibility() {
                const windowHeight = $(window).height();
                const scrollTop = $(window).scrollTop();
                
                animatedElements.each(function() {
                    const elementTop = $(this).offset().top;
                    const elementHeight = $(this).outerHeight();
                    
                    if (scrollTop + windowHeight > elementTop + 100) {
                        $(this).addClass('animated');
                    }
                });
            }
            
            // Check on scroll
            $(window).on('scroll', checkVisibility);
            
            // Check on load
            checkVisibility();
        },

        /**
         * Lazy Load Images
         */
        lazyLoadImages: function() {
            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.src = img.dataset.src;
                            img.classList.remove('lazy');
                            imageObserver.unobserve(img);
                        }
                    });
                });
                
                const lazyImages = document.querySelectorAll('img[data-src]');
                lazyImages.forEach(img => imageObserver.observe(img));
            }
        },

        /**
         * Testimonial Carousel (if needed)
         */
        testimonialCarousel: function() {
            const carousel = $('.testimonials-carousel');
            
            if (carousel.length && carousel.children().length > 3) {
                // Auto-scroll testimonials
                let currentIndex = 0;
                const testimonials = carousel.children();
                const totalTestimonials = testimonials.length;
                
                setInterval(function() {
                    testimonials.eq(currentIndex).fadeOut(400);
                    currentIndex = (currentIndex + 1) % totalTestimonials;
                    testimonials.eq(currentIndex).fadeIn(400);
                }, 5000);
            }
        },

        /**
         * Animated Stats Counter
         */
        statsCounter: function() {
            const statsNumbers = $('.stat-number');
            let animated = false;
            
            function animateStats() {
                if (animated) return;
                animated = true;
                
                statsNumbers.each(function() {
                    const $this = $(this);
                    const target = parseInt($this.text().replace(/[^0-9]/g, ''));
                    const suffix = $this.text().replace(/[0-9]/g, '');
                    
                    $({count: 0}).animate({count: target}, {
                        duration: 2000,
                        easing: 'swing',
                        step: function() {
                            $this.text(Math.floor(this.count) + suffix);
                        },
                        complete: function() {
                            $this.text(target + suffix);
                        }
                    });
                });
            }
            
            // Trigger animation when stats section is visible
            $(window).on('scroll', function() {
                const statsSection = $('.hero-stats');
                if (statsSection.length) {
                    const sectionTop = statsSection.offset().top;
                    const sectionHeight = statsSection.outerHeight();
                    const windowHeight = $(window).height();
                    const scrollTop = $(window).scrollTop();
                    
                    if (scrollTop + windowHeight > sectionTop + sectionHeight / 2) {
                        animateStats();
                    }
                }
            });
        },

        /**
         * Dropdown Menu Functionality
         */
        dropdownMenus: function() {
            const dropdownItems = $('.nav-menu .dropdown');
            
            // Handle mouse hover for desktop
            dropdownItems.on('mouseenter', function() {
                $(this).addClass('show');
                $(this).find('.dropdown-menu').fadeIn(200);
            });
            
            dropdownItems.on('mouseleave', function() {
                $(this).removeClass('show');
                $(this).find('.dropdown-menu').fadeOut(200);
            });
            
            // Handle click for mobile
            dropdownItems.find('.dropdown-toggle').on('click', function(e) {
                if ($(window).width() <= 991) {
                    e.preventDefault();
                    const parent = $(this).parent();
                    const menu = parent.find('.dropdown-menu');
                    
                    parent.toggleClass('show');
                    menu.slideToggle(300);
                }
            });
            
            // Close dropdowns when window is resized
            $(window).on('resize', function() {
                if ($(window).width() > 991) {
                    dropdownItems.removeClass('show');
                    dropdownItems.find('.dropdown-menu').removeAttr('style');
                }
            });
        },

        /**
         * Back to Top Button
         */
        backToTop: function() {
            // Create back to top button if it doesn't exist
            if (!$('.back-to-top').length) {
                $('body').append('<button class="back-to-top" aria-label="Back to top"><i class="fas fa-arrow-up"></i></button>');
            }
            
            const backToTopBtn = $('.back-to-top');
            
            // Show/hide button based on scroll position
            $(window).on('scroll', function() {
                if ($(this).scrollTop() > 300) {
                    backToTopBtn.addClass('show');
                } else {
                    backToTopBtn.removeClass('show');
                }
            });
            
            // Scroll to top when clicked
            backToTopBtn.on('click', function(e) {
                e.preventDefault();
                $('html, body').animate({scrollTop: 0}, 800);
            });
        }
    };

    // Initialize theme when document is ready
    $(document).ready(function() {
        BluePrintFolder.init();
    });

    // Additional initialization after window load
    $(window).on('load', function() {
        // Trigger any post-load animations
        $('body').addClass('loaded');
    });

})(jQuery);

/**
 * Vanilla JavaScript for non-jQuery dependent features
 */
document.addEventListener('DOMContentLoaded', function() {
    
    /**
     * Add loading state management
     */
    document.body.classList.add('js-loaded');
    
    /**
     * Keyboard navigation for accessibility
     */
    document.addEventListener('keydown', function(e) {
        // Handle keyboard navigation for dropdowns
        if (e.key === 'Enter' || e.key === ' ') {
            const target = e.target;
            if (target.classList.contains('dropdown-toggle')) {
                e.preventDefault();
                target.click();
            }
        }
    });
    
    /**
     * Performance optimization: Debounce scroll events
     */
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
    
    // Apply debouncing to scroll events
    const debouncedScroll = debounce(function() {
        // Trigger custom scroll event for better performance
        document.dispatchEvent(new CustomEvent('optimizedScroll'));
    }, 10);
    
    window.addEventListener('scroll', debouncedScroll);
});
