/**
 * Header Layout Fix JavaScript
 * Handles mobile menu, scroll effects, and layout adjustments
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    // Initialize when document is ready
    $(document).ready(function() {
        initHeaderFixes();
        initMobileMenu();
        initScrollEffects();
        initHeaderResizing();
    });

    /**
     * Initialize header layout fixes
     */
    function initHeaderFixes() {
        // Remove any interfering overlay elements
        $('.site-header').find('.overlay-accent, .decorative-overlay, [style*="orange"]').remove();
        
        // Ensure header has correct positioning
        $('.site-header').css({
            'position': 'fixed',
            'top': '0',
            'left': '0',
            'right': '0',
            'z-index': '9999'
        });
        
        // Adjust body padding for fixed header
        adjustBodyPadding();
        
        // Handle admin bar if present
        if ($('body').hasClass('admin-bar')) {
            handleAdminBar();
        }
    }

    /**
     * Initialize mobile menu functionality
     */
    function initMobileMenu() {
        const $menuToggle = $('.menu-toggle');
        const $navMenu = $('.nav-menu');
        const $body = $('body');
        
        // Handle menu toggle
        $menuToggle.on('click', function(e) {
            e.preventDefault();
            
            $(this).toggleClass('active');
            $navMenu.toggleClass('active');
            $body.toggleClass('mobile-menu-open');
            
            // Update aria attributes for accessibility
            const expanded = $(this).hasClass('active');
            $(this).attr('aria-expanded', expanded);
        });
        
        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.main-navigation').length) {
                $menuToggle.removeClass('active');
                $navMenu.removeClass('active');
                $body.removeClass('mobile-menu-open');
                $menuToggle.attr('aria-expanded', 'false');
            }
        });
        
        // Close menu on escape key
        $(document).on('keyup', function(e) {
            if (e.keyCode === 27 && $navMenu.hasClass('active')) {
                $menuToggle.removeClass('active');
                $navMenu.removeClass('active');
                $body.removeClass('mobile-menu-open');
                $menuToggle.attr('aria-expanded', 'false');
            }
        });
        
        // Handle window resize
        $(window).on('resize', function() {
            if ($(window).width() > 768) {
                $menuToggle.removeClass('active');
                $navMenu.removeClass('active');
                $body.removeClass('mobile-menu-open');
                $menuToggle.attr('aria-expanded', 'false');
            }
        });
    }

    /**
     * Initialize scroll effects
     */
    function initScrollEffects() {
        const $header = $('.site-header');
        let lastScrollTop = 0;
        
        $(window).on('scroll', throttle(function() {
            const scrollTop = $(window).scrollTop();
            
            // Add scrolled class for styling
            if (scrollTop > 50) {
                $header.addClass('header-scrolled');
            } else {
                $header.removeClass('header-scrolled');
            }
            
            lastScrollTop = scrollTop;
        }, 16)); // ~60fps
    }

    /**
     * Handle window resizing
     */
    function initHeaderResizing() {
        $(window).on('resize', throttle(function() {
            adjustBodyPadding();
        }, 100));
    }

    /**
     * Adjust body padding based on header height
     */
    function adjustBodyPadding() {
        const headerHeight = $('.site-header').outerHeight() || 70;
        let adminBarHeight = 0;
        
        if ($('body').hasClass('admin-bar')) {
            adminBarHeight = $(window).width() > 782 ? 32 : 46;
        }
        
        $('body').css('padding-top', headerHeight + adminBarHeight + 'px');
    }

    /**
     * Handle admin bar adjustments
     */
    function handleAdminBar() {
        const adminBarHeight = $(window).width() > 782 ? 32 : 46;
        $('.site-header').css('top', adminBarHeight + 'px');
    }

    /**
     * Throttle function for performance
     */
    function throttle(func, wait) {
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

    /**
     * Smooth scrolling for anchor links
     */
    function initSmoothScrolling() {
        $('a[href^="#"]').on('click', function(e) {
            const target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                const headerHeight = $('.site-header').outerHeight();
                const adminBarHeight = $('body').hasClass('admin-bar') ? 
                    ($(window).width() > 782 ? 32 : 46) : 0;
                
                $('html, body').animate({
                    scrollTop: target.offset().top - headerHeight - adminBarHeight - 20
                }, 500);
            }
        });
    }

    // Initialize smooth scrolling
    initSmoothScrolling();

    /**
     * Fix any layout issues on window load
     */
    $(window).on('load', function() {
        // Final adjustments after everything loads
        setTimeout(function() {
            adjustBodyPadding();
            
            // Remove any remaining problematic elements
            $('.site-header').find('[style*="position: absolute"]').remove();
            $('.site-header').find('.orange-element, .decorative-shape').remove();
        }, 100);
    });

})(jQuery);
