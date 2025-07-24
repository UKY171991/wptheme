/**
 * Enhanced Header Menu JavaScript
 * Handles mobile navigation, dropdowns, and interactive features
 */

(function($) {
    'use strict';

    // Wait for DOM to be ready
    $(document).ready(function() {
        // CRITICAL: Force dropdown z-index immediately
        forceDropdownZIndex();
        initEnhancedHeader();
        
        // Re-apply z-index fixes every second for maximum reliability
        setInterval(forceDropdownZIndex, 1000);
    });

    /**
     * Force dropdown z-index values to ensure visibility above all content
     */
    function forceDropdownZIndex() {
        // Apply maximum z-index values with !important via JavaScript
        const style = `
            .site-header { z-index: 999998 !important; position: relative !important; }
            .main-navigation { z-index: 999998 !important; position: relative !important; }
            .nav-menu { z-index: 999998 !important; position: relative !important; }
            .nav-menu .menu-item { z-index: 999998 !important; position: relative !important; }
            .dropdown-menu, .mega-menu-wrapper, .sub-menu { z-index: 9999999 !important; position: absolute !important; }
            .hero-section, .banner-section, .front-page-hero, .modern-hero, .page-header { z-index: 1 !important; position: relative !important; }
            .page-content, main, .site-main, section { z-index: 1 !important; position: relative !important; }
        `;
        
        // Remove existing emergency style if it exists
        $('#js-dropdown-emergency-fix').remove();
        
        // Add new style element
        $('<style id="js-dropdown-emergency-fix">' + style + '</style>').appendTo('head');
        
        // Also apply directly to elements for maximum effectiveness
        $('.site-header').css({'z-index': '999998', 'position': 'relative'});
        $('.main-navigation').css({'z-index': '999998', 'position': 'relative'});
        $('.nav-menu').css({'z-index': '999998', 'position': 'relative'});
        $('.nav-menu .menu-item').css({'z-index': '999998', 'position': 'relative'});
        $('.dropdown-menu, .mega-menu-wrapper, .sub-menu').css({'z-index': '9999999', 'position': 'absolute'});
        $('.hero-section, .banner-section, .front-page-hero, .modern-hero, .page-header, .page-content, main, .site-main, section').css({'z-index': '1', 'position': 'relative'});
    }

    function initEnhancedHeader() {
        handleMobileNavigation();
        handleDropdownMenus();
        handleSmoothScrolling();
        handleHeaderShrink();
        handleKeyboardNavigation();
        handleSearchFunctionality();
    }

    /**
     * Mobile Navigation Handler
     */
    function handleMobileNavigation() {
        const $mobileToggle = $('.mobile-menu-toggle');
        const $mobileNav = $('.mobile-navigation');
        const $mobileClose = $('.mobile-nav-close');
        const $mobileOverlay = $('.mobile-nav-overlay');
        const $submenuToggles = $('.submenu-toggle');
        const $body = $('body');

        // Toggle mobile menu
        $mobileToggle.on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const isActive = $mobileNav.hasClass('active');
            
            if (isActive) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        });

        // Close mobile menu
        $mobileClose.on('click', closeMobileMenu);
        $mobileOverlay.on('click', closeMobileMenu);

        // Handle submenu toggles
        $submenuToggles.on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const $toggle = $(this);
            const $menuItem = $toggle.closest('.menu-item-has-children');
            const $submenu = $menuItem.find('> .sub-menu');
            const isActive = $submenu.hasClass('active');
            
            // Close all other submenus
            $('.sub-menu.active').not($submenu).removeClass('active');
            $('.submenu-toggle.active').not($toggle).removeClass('active');
            
            // Toggle current submenu
            $submenu.toggleClass('active', !isActive);
            $toggle.toggleClass('active', !isActive);
            
            // Update aria-expanded
            $toggle.attr('aria-expanded', !isActive);
        });

        // Close menu on escape key
        $(document).on('keydown', function(e) {
            if (e.keyCode === 27 && $mobileNav.hasClass('active')) {
                closeMobileMenu();
            }
        });

        // Close menu on window resize if screen becomes large
        $(window).on('resize', function() {
            if ($(window).width() > 768 && $mobileNav.hasClass('active')) {
                closeMobileMenu();
            }
        });

        function openMobileMenu() {
            $mobileNav.addClass('active');
            $mobileToggle.addClass('active');
            $body.addClass('mobile-menu-open');
            
            // Focus management
            setTimeout(function() {
                $mobileClose.focus();
            }, 300);
            
            // Trap focus within mobile menu
            trapFocus($mobileNav);
        }

        function closeMobileMenu() {
            $mobileNav.removeClass('active');
            $mobileToggle.removeClass('active');
            $body.removeClass('mobile-menu-open');
            
            // Close all submenus
            $('.sub-menu.active').removeClass('active');
            $('.submenu-toggle.active').removeClass('active');
            
            // Return focus to toggle button
            $mobileToggle.focus();
            
            // Remove focus trap
            removeFocusTrap();
        }
    }

    /**
     * Desktop Dropdown Menu Handler with Enhanced Accessibility
     */
    function handleDropdownMenus() {
        const $menuItems = $('.nav-menu .menu-item-has-children, .nav-menu .mega-menu-item');
        let hideTimeout;

        $menuItems.each(function() {
            const $menuItem = $(this);
            const $dropdown = $menuItem.find('.dropdown-menu, .mega-menu-wrapper');
            const $link = $menuItem.find('> a');

            // Mouse events
            $menuItem.on('mouseenter', function() {
                clearTimeout(hideTimeout);
                
                // CRITICAL: Force z-index before showing dropdown
                forceDropdownZIndex();
                
                // Close other dropdowns first
                $('.nav-menu .dropdown-menu, .nav-menu .mega-menu-wrapper')
                    .not($dropdown)
                    .removeClass('show')
                    .css({
                        'opacity': '0',
                        'visibility': 'hidden',
                        'z-index': '9999999'
                    });
                
                // Update aria-expanded
                $link.attr('aria-expanded', 'true');
                
                // Show current dropdown with delay and maximum z-index
                setTimeout(function() {
                    $dropdown.addClass('show').css({
                        'opacity': '1',
                        'visibility': 'visible',
                        'z-index': '9999999',
                        'position': 'absolute',
                        'top': '100%',
                        'left': '0'
                    });
                    
                    // Force z-index again after showing
                    forceDropdownZIndex();
                }, 100);
            });

            $menuItem.on('mouseleave', function() {
                hideTimeout = setTimeout(function() {
                    $dropdown.removeClass('show').css({
                        'opacity': '0',
                        'visibility': 'hidden'
                    });
                    $link.attr('aria-expanded', 'false');
                }, 200);
            });

            // Keep dropdown open when hovering over it
            $dropdown.on('mouseenter', function() {
                clearTimeout(hideTimeout);
                // Force z-index while hovering
                forceDropdownZIndex();
            });

            $dropdown.on('mouseleave', function() {
                hideTimeout = setTimeout(function() {
                    $dropdown.removeClass('show').css({
                        'opacity': '0',
                        'visibility': 'hidden'
                    });
                    $link.attr('aria-expanded', 'false');
                }, 200);
            });

            // Keyboard navigation
            $link.on('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    
                    if ($dropdown.hasClass('show')) {
                        $dropdown.removeClass('show').css({
                            'opacity': '0',
                            'visibility': 'hidden'
                        });
                        $link.attr('aria-expanded', 'false');
                    } else {
                        // Close other dropdowns
                        $('.nav-menu .dropdown-menu, .nav-menu .mega-menu-wrapper')
                            .removeClass('show')
                            .css({
                                'opacity': '0',
                                'visibility': 'hidden'
                            });
                        $('.nav-menu .menu-item-has-children > a, .nav-menu .mega-menu-item > a')
                            .attr('aria-expanded', 'false');
                        
                        // Show current dropdown
                        forceDropdownZIndex();
                        $dropdown.addClass('show').css({
                            'opacity': '1',
                            'visibility': 'visible',
                            'z-index': '9999999'
                        });
                        $link.attr('aria-expanded', 'true');
                    }
                }
                
                if (e.key === 'Escape') {
                    $dropdown.removeClass('show').css({
                        'opacity': '0',
                        'visibility': 'hidden'
                    });
                    $link.attr('aria-expanded', 'false').focus();
                }
            });
        });

        // Close dropdowns when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.nav-menu').length) {
                $('.nav-menu .dropdown-menu, .nav-menu .mega-menu-wrapper')
                    .removeClass('show')
                    .css({
                        'opacity': '0',
                        'visibility': 'hidden'
                    });
                $('.nav-menu .menu-item-has-children > a, .nav-menu .mega-menu-item > a')
                    .attr('aria-expanded', 'false');
            }
        });
    }
                $(this).css({
                    'opacity': '1',
                    'visibility': 'visible',
                    'z-index': '99999'
                });
            });

            $dropdown.on('mouseleave', function() {
                hideTimeout = setTimeout(function() {
                    $dropdown.removeClass('show').css({
                        'opacity': '0',
                        'visibility': 'hidden'
                    });
                    $link.attr('aria-expanded', 'false');
                }, 200);
            });

            // Keyboard navigation
            $link.on('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    
                    if ($dropdown.hasClass('show')) {
                        $dropdown.removeClass('show').css({
                            'opacity': '0',
                            'visibility': 'hidden'
                        });
                        $link.attr('aria-expanded', 'false');
                    } else {
                        // Close other dropdowns
                        $('.nav-menu .dropdown-menu, .nav-menu .mega-menu-wrapper')
                            .removeClass('show')
                            .css({
                                'opacity': '0',
                                'visibility': 'hidden'
                            });
                        $('.nav-menu .menu-item-has-children > a, .nav-menu .mega-menu-item > a')
                            .attr('aria-expanded', 'false');
                        
                        // Show current dropdown
                        forceDropdownZIndex();
                        $dropdown.addClass('show').css({
                            'opacity': '1',
                            'visibility': 'visible',
                            'z-index': '9999999'
                        });
                        $link.attr('aria-expanded', 'true');
                    }
                }
                
                if (e.key === 'Escape') {
                    $dropdown.removeClass('show').css({
                        'opacity': '0',
                        'visibility': 'hidden'
                    });
                    $link.attr('aria-expanded', 'false').focus();
                }
            });
        });

        // Close dropdowns when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.nav-menu').length) {
                $('.nav-menu .dropdown-menu, .nav-menu .mega-menu-wrapper')
                    .removeClass('show')
                    .css({
                        'opacity': '0',
                        'visibility': 'hidden'
                    });
                $('.nav-menu .menu-item-has-children > a, .nav-menu .mega-menu-item > a')
                    .attr('aria-expanded', 'false');
            }
        });
    }

    /**
     * Smooth Scrolling for Anchor Links
     */
    function handleSmoothScrolling() {
        $('a[href*="#"]:not([href="#"])').on('click', function(e) {
            const href = $(this).attr('href');
            const target = href.includes('#') ? href.split('#')[1] : '';
            
            if (target && $('#' + target).length) {
                e.preventDefault();
                
                const $target = $('#' + target);
                const offset = $('.site-header').outerHeight() + 20;
                
                $('html, body').animate({
                    scrollTop: $target.offset().top - offset
                }, 800, 'easeInOutCubic');
                
                // Close mobile menu if open
                if ($('.mobile-navigation').hasClass('active')) {
                    $('.mobile-nav-close').click();
                }
            }
        });
    }

    /**
     * Header Shrink Effect on Scroll
     */
    function handleHeaderShrink() {
        const $header = $('.site-header');
        const $topBar = $('.header-top-bar');
        let lastScrollTop = 0;
        let isScrolling = false;

        $(window).on('scroll', function() {
            if (!isScrolling) {
                requestAnimationFrame(function() {
                    const scrollTop = $(window).scrollTop();
                    
                    if (scrollTop > 100) {
                        $header.addClass('header-scrolled');
                        $topBar.addClass('hidden');
                    } else {
                        $header.removeClass('header-scrolled');
                        $topBar.removeClass('hidden');
                    }
                    
                    // Hide/show header on scroll direction
                    if (scrollTop > lastScrollTop && scrollTop > 200) {
                        $header.addClass('header-hidden');
                    } else {
                        $header.removeClass('header-hidden');
                    }
                    
                    lastScrollTop = scrollTop;
                    isScrolling = false;
                });
                isScrolling = true;
            }
        });
    }

    /**
     * Keyboard Navigation Support
     */
    function handleKeyboardNavigation() {
        const $menuItems = $('.nav-menu .menu-item');
        
        $menuItems.find('a').on('keydown', function(e) {
            const $this = $(this);
            const $menuItem = $this.closest('.menu-item');
            const $dropdown = $menuItem.find('.dropdown-menu, .mega-menu-wrapper');
            
            switch(e.keyCode) {
                case 13: // Enter
                case 32: // Space
                    if ($menuItem.hasClass('menu-item-has-children')) {
                        e.preventDefault();
                        $dropdown.toggleClass('show');
                    }
                    break;
                    
                case 27: // Escape
                    $dropdown.removeClass('show');
                    $this.blur();
                    break;
                    
                case 37: // Left Arrow
                    e.preventDefault();
                    navigateToSibling($menuItem, 'prev');
                    break;
                    
                case 39: // Right Arrow
                    e.preventDefault();
                    navigateToSibling($menuItem, 'next');
                    break;
                    
                case 40: // Down Arrow
                    if ($menuItem.hasClass('menu-item-has-children')) {
                        e.preventDefault();
                        $dropdown.addClass('show');
                        $dropdown.find('a:first').focus();
                    }
                    break;
            }
        });
        
        function navigateToSibling($current, direction) {
            const $sibling = direction === 'next' ? 
                $current.next('.menu-item') : 
                $current.prev('.menu-item');
                
            if ($sibling.length) {
                $sibling.find('a:first').focus();
            }
        }
    }

    /**
     * Search Functionality (if search is added)
     */
    function handleSearchFunctionality() {
        const $searchToggle = $('.search-toggle');
        const $searchForm = $('.header-search');
        const $searchInput = $('.search-input');
        
        $searchToggle.on('click', function(e) {
            e.preventDefault();
            $searchForm.toggleClass('active');
            
            if ($searchForm.hasClass('active')) {
                setTimeout(function() {
                    $searchInput.focus();
                }, 300);
            }
        });
        
        // Close search on escape
        $searchInput.on('keydown', function(e) {
            if (e.keyCode === 27) {
                $searchForm.removeClass('active');
                $searchToggle.focus();
            }
        });
        
        // Close search when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.header-search, .search-toggle').length) {
                $searchForm.removeClass('active');
            }
        });
    }

    /**
     * Focus Trap for Accessibility
     */
    function trapFocus($container) {
        const $focusableElements = $container.find('a, button, input, textarea, select, [tabindex]:not([tabindex="-1"])');
        const $firstElement = $focusableElements.first();
        const $lastElement = $focusableElements.last();
        
        $container.on('keydown.focustrap', function(e) {
            if (e.keyCode === 9) { // Tab key
                if (e.shiftKey) {
                    if (document.activeElement === $firstElement[0]) {
                        e.preventDefault();
                        $lastElement.focus();
                    }
                } else {
                    if (document.activeElement === $lastElement[0]) {
                        e.preventDefault();
                        $firstElement.focus();
                    }
                }
            }
        });
    }

    function removeFocusTrap() {
        $('.mobile-navigation').off('keydown.focustrap');
    }

    /**
     * Add loading states for CTA buttons
     */
    function addCTALoadingStates() {
        $('.btn-header-cta, .btn-mobile-cta, .btn-quote').on('click', function() {
            const $btn = $(this);
            const originalText = $btn.html();
            
            $btn.addClass('loading').html('<i class="fas fa-spinner fa-spin"></i> Loading...');
            
            // Restore original text after navigation (in case of SPA)
            setTimeout(function() {
                $btn.removeClass('loading').html(originalText);
            }, 3000);
        });
    }

    /**
     * Add intersection observer for header animations
     */
    function addHeaderAnimations() {
        if ('IntersectionObserver' in window) {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            };
            
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                    }
                });
            }, observerOptions);
            
            // Observe header elements
            document.querySelectorAll('.nav-menu .menu-item').forEach(function(el) {
                observer.observe(el);
            });
        }
    }

    // Add easing function for smooth scrolling
    $.easing.easeInOutCubic = function(x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t * t + b;
        return c / 2 * ((t -= 2) * t * t + 2) + b;
    };

    // Initialize additional features
    addCTALoadingStates();
    addHeaderAnimations();

    // Add CSS for additional animations
    const additionalCSS = `
        <style>
        .header-scrolled {
            padding: 0.5rem 0 !important;
            box-shadow: 0 2px 20px rgba(0,0,0,0.15) !important;
        }
        
        .header-hidden {
            transform: translateY(-100%) !important;
        }
        
        .header-top-bar.hidden {
            transform: translateY(-100%);
            transition: transform 0.3s ease;
        }
        
        .btn-header-cta.loading,
        .btn-mobile-cta.loading,
        .btn-quote.loading {
            pointer-events: none;
            opacity: 0.7;
        }
        
        .nav-menu .menu-item {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease;
        }
        
        .nav-menu .menu-item.animate-in {
            opacity: 1;
            transform: translateY(0);
        }
        
        .nav-menu .menu-item:nth-child(1) { transition-delay: 0.1s; }
        .nav-menu .menu-item:nth-child(2) { transition-delay: 0.2s; }
        .nav-menu .menu-item:nth-child(3) { transition-delay: 0.3s; }
        .nav-menu .menu-item:nth-child(4) { transition-delay: 0.4s; }
        .nav-menu .menu-item:nth-child(5) { transition-delay: 0.5s; }
        
        /* CRITICAL DROPDOWN Z-INDEX FIXES */
        .nav-menu .dropdown-menu.show,
        .nav-menu .mega-menu-wrapper.show {
            opacity: 1 !important;
            visibility: visible !important;
            transform: translateY(0) !important;
            z-index: 99999 !important;
            position: absolute !important;
        }
        
        .nav-menu .mega-menu-wrapper.show {
            transform: translateX(-50%) translateY(0) !important;
        }
        
        /* Ensure dropdowns appear above everything */
        .main-navigation,
        .main-navigation .nav-menu,
        .main-navigation .nav-menu .menu-item {
            position: relative;
            z-index: 9998;
        }
        
        .dropdown-menu,
        .mega-menu-wrapper {
            z-index: 99999 !important;
        }
        
        /* Override any theme conflicts */
        .site-header .dropdown-menu,
        .site-header .mega-menu-wrapper {
            z-index: 99999 !important;
            position: absolute !important;
        }
        
        /* Fix for banner/hero section conflicts */
        .hero-section,
        .banner-section,
        .front-page-hero,
        .page-header {
            z-index: 1 !important;
            position: relative !important;
        }
        
        @media (max-width: 768px) {
            body.mobile-menu-open {
                overflow: hidden;
            }
        }
        </style>
    `;
    
    $('head').append(additionalCSS);

})(jQuery);
