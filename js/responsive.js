/**
 * Responsive JavaScript for WordPress Theme
 * Handles dynamic responsive behaviors and mobile interactions
 */

(function($) {
    'use strict';

    // Responsive breakpoints
    const breakpoints = {
        xs: 576,
        sm: 768,
        md: 992,
        lg: 1200,
        xl: 1400
    };

    // Current screen size
    let currentBreakpoint = getCurrentBreakpoint();

    /**
     * Get current breakpoint
     */
    function getCurrentBreakpoint() {
        const width = window.innerWidth;
        if (width < breakpoints.xs) return 'xs';
        if (width < breakpoints.sm) return 'sm';
        if (width < breakpoints.md) return 'md';
        if (width < breakpoints.lg) return 'lg';
        if (width < breakpoints.xl) return 'xl';
        return 'xxl';
    }

    /**
     * Mobile menu toggle
     */
    function initMobileMenu() {
        // Create mobile menu toggle if it doesn't exist
        if (!$('.mobile-menu-toggle').length) {
            const toggleButton = $('<button class="mobile-menu-toggle" aria-label="Toggle mobile menu"><span></span></button>');
            $('.site-header .container, .header-container').append(toggleButton);
        }

        // Handle mobile menu toggle
        $(document).on('click', '.mobile-menu-toggle', function(e) {
            e.preventDefault();
            const $this = $(this);
            const $nav = $('.main-navigation');
            
            $this.toggleClass('active');
            $nav.toggleClass('active');
            
            // Update aria attributes
            const isExpanded = $nav.hasClass('active');
            $this.attr('aria-expanded', isExpanded);
            
            // Prevent body scroll when menu is open
            if (isExpanded) {
                $('body').addClass('menu-open');
            } else {
                $('body').removeClass('menu-open');
            }
        });

        // Close mobile menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.main-navigation, .mobile-menu-toggle').length) {
                $('.mobile-menu-toggle').removeClass('active');
                $('.main-navigation').removeClass('active');
                $('body').removeClass('menu-open');
            }
        });

        // Close mobile menu on window resize
        $(window).on('resize', function() {
            if (window.innerWidth > breakpoints.md) {
                $('.mobile-menu-toggle').removeClass('active');
                $('.main-navigation').removeClass('active');
                $('body').removeClass('menu-open');
            }
        });
    }

    /**
     * Responsive images
     */
    function initResponsiveImages() {
        // Add responsive classes to images
        $('img').each(function() {
            const $img = $(this);
            if (!$img.hasClass('responsive-img')) {
                $img.addClass('responsive-img');
            }
        });

        // Lazy loading for images
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

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    }

    /**
     * Responsive tables
     */
    function initResponsiveTables() {
        $('table').each(function() {
            const $table = $(this);
            if (!$table.parent('.table-responsive').length) {
                $table.wrap('<div class="table-responsive"></div>');
            }
        });
    }

    /**
     * Touch gestures for mobile
     */
    function initTouchGestures() {
        // Add touch class for touch devices
        if ('ontouchstart' in window) {
            $('html').addClass('touch-device');
        }

        // Swipe navigation for image galleries
        let startX = null;
        let startY = null;

        $(document).on('touchstart', '.post-thumbnail, .hero-image', function(e) {
            startX = e.originalEvent.touches[0].clientX;
            startY = e.originalEvent.touches[0].clientY;
        });

        $(document).on('touchmove', '.post-thumbnail, .hero-image', function(e) {
            if (!startX || !startY) return;

            const xDiff = startX - e.originalEvent.touches[0].clientX;
            const yDiff = startY - e.originalEvent.touches[0].clientY;

            if (Math.abs(xDiff) > Math.abs(yDiff)) {
                if (xDiff > 0) {
                    // Swipe left
                    $(this).addClass('swipe-left');
                } else {
                    // Swipe right
                    $(this).addClass('swipe-right');
                }
            }

            startX = null;
            startY = null;
        });
    }

    /**
     * Responsive font sizing
     */
    function initResponsiveFonts() {
        function adjustFontSizes() {
            const width = window.innerWidth;
            const baseSize = width < breakpoints.sm ? 14 : 16;
            
            document.documentElement.style.setProperty('--base-font-size', baseSize + 'px');
            
            // Adjust heading sizes
            $('.hero-title-fancy').each(function() {
                const $this = $(this);
                if (width < breakpoints.xs) {
                    $this.css('font-size', 'clamp(1.8rem, 6vw, 2.5rem)');
                } else if (width < breakpoints.sm) {
                    $this.css('font-size', 'clamp(2rem, 6vw, 3rem)');
                } else {
                    $this.css('font-size', '');
                }
            });
        }

        adjustFontSizes();
        $(window).on('resize', adjustFontSizes);
    }

    /**
     * Adaptive loading
     */
    function initAdaptiveLoading() {
        // Reduce animations on slower connections
        if (navigator.connection && navigator.connection.effectiveType === 'slow-2g') {
            $('html').addClass('slow-connection');
        }

        // Reduce motion for users who prefer it
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            $('html').addClass('reduced-motion');
        }
    }

    /**
     * Responsive grid adjustments
     */
    function initResponsiveGrids() {
        function adjustGrids() {
            const width = window.innerWidth;
            
            $('.posts-grid, .services-grid-enhanced').each(function() {
                const $grid = $(this);
                
                if (width < breakpoints.sm) {
                    $grid.attr('data-columns', '1');
                } else if (width < breakpoints.md) {
                    $grid.attr('data-columns', '2');
                } else if (width < breakpoints.lg) {
                    $grid.attr('data-columns', '3');
                } else {
                    $grid.attr('data-columns', '4');
                }
            });
        }

        adjustGrids();
        $(window).on('resize', adjustGrids);
    }

    /**
     * Breakpoint change handler
     */
    function handleBreakpointChange() {
        $(window).on('resize', function() {
            const newBreakpoint = getCurrentBreakpoint();
            
            if (newBreakpoint !== currentBreakpoint) {
                // Trigger custom event
                $(window).trigger('breakpointChange', [newBreakpoint, currentBreakpoint]);
                currentBreakpoint = newBreakpoint;
                
                // Add breakpoint class to body
                $('body').removeClass('bp-xs bp-sm bp-md bp-lg bp-xl bp-xxl')
                        .addClass('bp-' + currentBreakpoint);
            }
        });

        // Set initial breakpoint class
        $('body').addClass('bp-' + currentBreakpoint);
    }

    /**
     * Performance optimizations
     */
    function initPerformanceOptimizations() {
        // Debounce resize events
        let resizeTimeout;
        $(window).on('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(function() {
                $(window).trigger('debouncedResize');
            }, 250);
        });

        // Throttle scroll events
        let scrollTimeout;
        $(window).on('scroll', function() {
            if (!scrollTimeout) {
                scrollTimeout = setTimeout(function() {
                    $(window).trigger('throttledScroll');
                    scrollTimeout = null;
                }, 16); // ~60fps
            }
        });
    }

    /**
     * Accessibility improvements for mobile
     */
    function initAccessibility() {
        // Enhance touch targets
        $('.btn, button, a, input, select, textarea').each(function() {
            const $el = $(this);
            if ($el.outerHeight() < 44 || $el.outerWidth() < 44) {
                $el.addClass('touch-target-small');
            }
        });

        // Improve focus management
        $(document).on('keydown', function(e) {
            if (e.key === 'Tab') {
                $('body').addClass('keyboard-navigation');
            }
        });

        $(document).on('mousedown', function() {
            $('body').removeClass('keyboard-navigation');
        });
    }

    /**
     * Initialize all responsive features
     */
    function init() {
        initMobileMenu();
        initResponsiveImages();
        initResponsiveTables();
        initTouchGestures();
        initResponsiveFonts();
        initAdaptiveLoading();
        initResponsiveGrids();
        handleBreakpointChange();
        initPerformanceOptimizations();
        initAccessibility();

        // Mark as initialized
        $('body').addClass('responsive-initialized');
    }

    // Initialize when DOM is ready
    $(document).ready(init);

    // Re-initialize on AJAX complete (for dynamic content)
    $(document).ajaxComplete(function() {
        setTimeout(function() {
            initResponsiveImages();
            initResponsiveTables();
        }, 100);
    });

})(jQuery);
