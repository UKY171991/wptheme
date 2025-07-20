/**
 * Blueprint Theme Main JavaScript
 * 
 * Contains all the main functionality for the theme
 */

(function($) {
    'use strict';

    // DOM Ready
    $(document).ready(function() {
        initializeTheme();
    });

    /**
     * Initialize theme functionality
     */
    function initializeTheme() {
        initSearchToggle();
        initBackToTop();
        initMobileMenu();
        initSkipLinks();
        initAccessibility();
    }

    /**
     * Initialize search toggle functionality
     */
    function initSearchToggle() {
        const searchToggle = $('.search-toggle');
        const searchContainer = $('#search-container');
        const searchClose = $('.search-close');

        if (searchToggle.length && searchContainer.length) {
            searchToggle.on('click', function(e) {
                e.preventDefault();
                const isExpanded = $(this).attr('aria-expanded') === 'true';
                
                $(this).attr('aria-expanded', !isExpanded);
                
                if (!isExpanded) {
                    searchContainer.slideDown(300).css('display', 'block');
                    setTimeout(() => {
                        searchContainer.find('.search-field').focus();
                    }, 350);
                } else {
                    searchContainer.slideUp(300);
                }
            });

            // Close search on close button click
            searchClose.on('click', function(e) {
                e.preventDefault();
                searchToggle.attr('aria-expanded', 'false');
                searchContainer.slideUp(300);
            });

            // Close search on escape key
            $(document).on('keydown', function(e) {
                if (e.key === 'Escape' && searchContainer.is(':visible')) {
                    searchToggle.attr('aria-expanded', 'false');
                    searchContainer.slideUp(300);
                    searchToggle.focus();
                }
            });
        }
    }

    /**
     * Initialize back to top button
     */
    function initBackToTop() {
        const backToTop = $('#back-to-top');

        if (backToTop.length) {
            // Show/hide button based on scroll position
            $(window).on('scroll', function() {
                if ($(window).scrollTop() > 300) {
                    backToTop.fadeIn();
                } else {
                    backToTop.fadeOut();
                }
            });

            // Smooth scroll to top
            backToTop.on('click', function(e) {
                e.preventDefault();
                $('html, body').animate({ scrollTop: 0 }, 600);
            });
        }
    }

    /**
     * Initialize mobile menu enhancements
     */
    function initMobileMenu() {
        const navbarToggler = $('.navbar-toggler');
        const navbarCollapse = $('.navbar-collapse');

        if (navbarToggler.length && navbarCollapse.length) {
            // Close menu when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.navbar').length && navbarCollapse.hasClass('show')) {
                    navbarToggler.click();
                }
            });

            // Close menu when escape is pressed
            $(document).on('keydown', function(e) {
                if (e.key === 'Escape' && navbarCollapse.hasClass('show')) {
                    navbarToggler.click();
                    navbarToggler.focus();
                }
            });

            // Handle dropdown menu accessibility
            $('.navbar-nav .dropdown-toggle').on('click', function(e) {
                // On mobile, prevent default and toggle dropdown
                if ($(window).width() < 992) {
                    e.preventDefault();
                    const dropdownMenu = $(this).next('.dropdown-menu');
                    dropdownMenu.toggleClass('show');
                    $(this).attr('aria-expanded', dropdownMenu.hasClass('show'));
                }
            });
        }
    }

    /**
     * Initialize skip links for accessibility
     */
    function initSkipLinks() {
        $('.skip-link').on('click', function(e) {
            const target = $($(this).attr('href'));
            if (target.length) {
                target.attr('tabindex', '-1').focus();
            }
        });
    }

    /**
     * Initialize accessibility features
     */
    function initAccessibility() {
        // Add focus indicators for keyboard navigation
        $('a, button, input, select, textarea').on('focus', function() {
            $(this).addClass('focus-visible');
        }).on('blur', function() {
            $(this).removeClass('focus-visible');
        });

        // Improve form accessibility
        $('input[required], select[required], textarea[required]').attr('aria-required', 'true');

        // Add ARIA labels to social links
        $('.social-link').each(function() {
            const ariaLabel = $(this).attr('aria-label');
            if (!ariaLabel) {
                const title = $(this).attr('title') || 'Social media link';
                $(this).attr('aria-label', title);
            }
        });
    }

    // Window resize handler
    $(window).on('resize', debounce(function() {
        // Handle responsive adjustments
        if ($(window).width() >= 992) {
            // Close mobile search if open
            $('#search-container').hide();
            $('.search-toggle').attr('aria-expanded', 'false');
            
            // Reset dropdown menus on desktop
            $('.dropdown-menu').removeClass('show');
            $('.dropdown-toggle').attr('aria-expanded', 'false');
        }
    }, 250));

    // Smooth scrolling for anchor links
    $('a[href*="#"]:not([href="#"])').on('click', function(e) {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
            let target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 100 // Account for fixed header
                }, 600);
            }
        }
    });

    // Newsletter form handling (basic)
    $('.newsletter-subscribe-form').on('submit', function(e) {
        e.preventDefault();
        const email = $(this).find('input[type="email"]').val();
        
        if (email) {
            // Here you would typically send the email to your backend
            alert('Thank you for subscribing! (This is a demo message)');
            $(this).find('input[type="email"]').val('');
        }
    });

    // Contact form enhancements
    $('form input, form textarea, form select').on('invalid', function() {
        $(this).addClass('is-invalid');
    }).on('input change', function() {
        if (this.validity.valid) {
            $(this).removeClass('is-invalid').addClass('is-valid');
        }
    });

    /**
     * Utility: Debounce function
     */
    function debounce(func, wait, immediate) {
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
    }

})(jQuery);
