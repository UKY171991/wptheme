/*
* Enhanced Header & Footer JavaScript
* Blueprint WordPress Theme
*/

(function($) {
    'use strict';

    // DOM Ready
    $(document).ready(function() {
        initializeHeader();
        initializeFooter();
        initializeAccessibility();
        initializePerformance();
    });

    // Window Load
    $(window).on('load', function() {
        initializeAnimations();
    });

    /**
     * Header Initialization
     */
    function initializeHeader() {
        // Search Toggle Functionality
        $('.search-toggle').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const $searchContainer = $('#search-container');
            const $searchField = $('.search-field');
            const isVisible = $searchContainer.is(':visible');
            
            if (isVisible) {
                hideSearch();
            } else {
                showSearch();
            }
        });

        // Search Close Button
        $('.search-close').on('click', function(e) {
            e.preventDefault();
            hideSearch();
        });

        // Close search on ESC key
        $(document).on('keydown', function(e) {
            if (e.keyCode === 27 && $('#search-container').is(':visible')) {
                hideSearch();
            }
        });

        // Close search when clicking outside
        $(document).on('click', function(e) {
            if ($('#search-container').is(':visible') && 
                !$(e.target).closest('#search-container, .search-toggle').length) {
                hideSearch();
            }
        });

        // Navbar Collapse Enhancement
        const $navbarToggler = $('.navbar-toggler');
        const $navbarCollapse = $('.navbar-collapse');

        $navbarToggler.on('click', function() {
            // Add animation class
            $navbarCollapse.toggleClass('show');
            
            // Update ARIA attributes
            const isExpanded = $navbarCollapse.hasClass('show');
            $navbarToggler.attr('aria-expanded', isExpanded);
        });

        // Multi-level Dropdown Support
        $('.dropdown-submenu a.dropdown-toggle').on('click', function(e) {
            const $submenu = $(this).next('.dropdown-menu');
            
            if ($submenu.length) {
                e.preventDefault();
                e.stopPropagation();
                
                // Close other submenus
                $('.dropdown-submenu .dropdown-menu').not($submenu).removeClass('show');
                
                // Toggle current submenu
                $submenu.toggleClass('show');
            }
        });

        // Close dropdowns when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.dropdown').length) {
                $('.dropdown-menu').removeClass('show');
            }
        });

        // Mobile Menu Enhancements
        if (window.innerWidth <= 991) {
            $('.navbar-nav .dropdown-toggle').on('click', function(e) {
                e.preventDefault();
                const $dropdown = $(this).next('.dropdown-menu');
                $dropdown.slideToggle(300);
                $(this).toggleClass('active');
            });
        }
    }

    /**
     * Footer Initialization
     */
    function initializeFooter() {
        // Back to Top Button
        const $backToTop = $('#back-to-top, .back-to-top');
        
        // Show/hide back to top button
        $(window).on('scroll', throttle(function() {
            const scrollTop = $(window).scrollTop();
            
            if (scrollTop > 300) {
                $backToTop.addClass('show');
            } else {
                $backToTop.removeClass('show');
            }
        }, 100));

        // Back to top click handler
        $backToTop.on('click', function(e) {
            e.preventDefault();
            
            $('html, body').animate({
                scrollTop: 0
            }, {
                duration: 800,
                easing: 'easeInOutCubic'
            });
        });

        // Newsletter Form Enhancement
        $('.newsletter-form').on('submit', function(e) {
            e.preventDefault();
            
            const $form = $(this);
            const $input = $form.find('input[type="email"]');
            const $button = $form.find('button[type="submit"]');
            const email = $input.val().trim();
            
            if (!isValidEmail(email)) {
                showNotification('Please enter a valid email address.', 'error');
                $input.focus();
                return;
            }
            
            // Simulate form submission
            $button.prop('disabled', true).html('<i class="bi bi-hourglass-split"></i>');
            
            setTimeout(function() {
                $button.prop('disabled', false).html('<i class="bi bi-send"></i>');
                $input.val('');
                showNotification('Thank you for subscribing!', 'success');
            }, 2000);
        });

        // Footer Link Animations
        $('.footer-menu-link').on('mouseenter', function() {
            $(this).find('i').addClass('animate-icon');
        }).on('mouseleave', function() {
            $(this).find('i').removeClass('animate-icon');
        });
    }

    /**
     * Accessibility Enhancements
     */
    function initializeAccessibility() {
        // Focus management for dropdowns
        $('.dropdown-toggle').on('keydown', function(e) {
            const $dropdown = $(this).next('.dropdown-menu');
            
            if (e.keyCode === 13 || e.keyCode === 32) { // Enter or Space
                e.preventDefault();
                $dropdown.toggleClass('show');
                
                if ($dropdown.hasClass('show')) {
                    $dropdown.find('a:first').focus();
                }
            }
        });

        // Dropdown navigation with arrow keys
        $('.dropdown-menu a').on('keydown', function(e) {
            const $items = $(this).closest('.dropdown-menu').find('a');
            const currentIndex = $items.index(this);
            
            switch(e.keyCode) {
                case 38: // Up arrow
                    e.preventDefault();
                    const prevIndex = currentIndex > 0 ? currentIndex - 1 : $items.length - 1;
                    $items.eq(prevIndex).focus();
                    break;
                    
                case 40: // Down arrow
                    e.preventDefault();
                    const nextIndex = currentIndex < $items.length - 1 ? currentIndex + 1 : 0;
                    $items.eq(nextIndex).focus();
                    break;
                    
                case 27: // Escape
                    e.preventDefault();
                    $(this).closest('.dropdown-menu').removeClass('show');
                    $(this).closest('.dropdown').find('.dropdown-toggle').focus();
                    break;
            }
        });

        // Skip link functionality
        $('.skip-link').on('focus', function() {
            $(this).css('left', '0');
        }).on('blur', function() {
            $(this).css('left', '-9999px');
        });

        // ARIA live regions for dynamic content
        if (!$('#aria-live-region').length) {
            $('body').append('<div id="aria-live-region" aria-live="polite" aria-atomic="true" class="visually-hidden"></div>');
        }
    }

    /**
     * Performance Optimizations
     */
    function initializePerformance() {
        // Lazy load images in footer
        const footerImages = document.querySelectorAll('.footer-main img');
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
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

            footerImages.forEach(function(img) {
                imageObserver.observe(img);
            });
        }

        // Preload critical fonts
        const fontPreloads = [
            'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap'
        ];

        fontPreloads.forEach(function(font) {
            const link = document.createElement('link');
            link.rel = 'preload';
            link.as = 'style';
            link.href = font;
            document.head.appendChild(link);
        });
    }

    /**
     * Animation Initialization
     */
    function initializeAnimations() {
        // Animate footer sections on scroll
        if ('IntersectionObserver' in window) {
            const animationObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            document.querySelectorAll('.footer-section').forEach(function(section) {
                animationObserver.observe(section);
            });
        }

        // Add smooth transitions to interactive elements
        $('.navbar-nav .nav-link, .social-link, .footer-menu-link').each(function() {
            $(this).css('transition', 'all 0.3s ease');
        });
    }

    /**
     * Utility Functions
     */
    function showSearch() {
        const $searchContainer = $('#search-container');
        const $searchField = $('.search-field');
        
        $searchContainer.slideDown(300, function() {
            $searchField.focus();
            $('body').addClass('search-open');
        });
        
        $('.search-toggle').attr('aria-expanded', 'true');
        announceToScreenReader('Search opened');
    }

    function hideSearch() {
        const $searchContainer = $('#search-container');
        
        $searchContainer.slideUp(300, function() {
            $('body').removeClass('search-open');
        });
        
        $('.search-toggle').attr('aria-expanded', 'false').focus();
        announceToScreenReader('Search closed');
    }

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function showNotification(message, type) {
        const notificationClass = type === 'error' ? 'alert-danger' : 'alert-success';
        const $notification = $(`
            <div class="alert ${notificationClass} alert-dismissible fade show position-fixed" 
                 style="top: 20px; right: 20px; z-index: 9999; min-width: 300px;">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `);
        
        $('body').append($notification);
        
        setTimeout(function() {
            $notification.alert('close');
        }, 5000);
        
        announceToScreenReader(message);
    }

    function announceToScreenReader(message) {
        const $liveRegion = $('#aria-live-region');
        if ($liveRegion.length) {
            $liveRegion.text(message);
            setTimeout(function() {
                $liveRegion.empty();
            }, 1000);
        }
    }

    function throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        }
    }

    // Add easing function for smooth animations
    $.easing.easeInOutCubic = function(x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t * t + b;
        return c / 2 * ((t -= 2) * t * t + 2) + b;
    };

    // Add CSS animation classes
    $('<style>')
        .prop('type', 'text/css')
        .html(`
            .animate-icon {
                transform: translateX(4px) !important;
                transition: transform 0.3s ease !important;
            }
            .animate-in {
                opacity: 1 !important;
                transform: translateY(0) !important;
            }
            .search-open {
                overflow: hidden;
            }
            @media (max-width: 991.98px) {
                .search-open {
                    overflow: auto;
                }
            }
        `)
        .appendTo('head');

})(jQuery);
