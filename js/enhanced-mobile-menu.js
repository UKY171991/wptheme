/**
 * Enhanced Mobile Menu and Submenu Functionality
 * Handles mobile navigation, multi-level submenus, and responsive behavior
 * Version: 2.0 - Fixed multi-level menus and mobile functionality
 */

(function($) {
    'use strict';

    // Prevent multiple initializations
    if (window.blueprintMenuInitialized) {
        return;
    }
    window.blueprintMenuInitialized = true;

    // Initialize when DOM is ready
    $(document).ready(function() {
        console.log('BluePrint Menu: Initializing...');
        initializeMobileMenu();
        initializeDesktopSubmenus();
        initializeMobileSubmenus();
        initializeAccessibility();
        handleWindowResize();
        console.log('BluePrint Menu: Initialization complete');
    });

    /**
     * Initialize mobile menu functionality
     */
    function initializeMobileMenu() {
        const $menuToggle = $('.menu-toggle');
        const $mainNav = $('.main-navigation');
        const $body = $('body');
        let $menuOverlay = $('.mobile-nav-overlay');

        console.log('Mobile menu elements found:', {
            menuToggle: $menuToggle.length,
            mainNav: $mainNav.length,
            overlay: $menuOverlay.length
        });

        // Create mobile nav overlay if it doesn't exist
        if ($menuOverlay.length === 0) {
            $menuOverlay = $('<div class="mobile-nav-overlay"></div>');
            $('body').append($menuOverlay);
            console.log('Mobile overlay created');
        }

        // Remove any existing click handlers to prevent duplicates
        $menuToggle.off('click.blueprintMenu');
        $menuOverlay.off('click.blueprintMenu');

        // Menu toggle click handler
        $menuToggle.on('click.blueprintMenu', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            console.log('Menu toggle clicked');
            
            const isActive = $mainNav.hasClass('mobile-active') && $mainNav.hasClass('active');
            
            if (isActive) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        });

        // Close menu when clicking overlay
        $menuOverlay.on('click.blueprintMenu', function() {
            console.log('Overlay clicked - closing menu');
            closeMobileMenu();
        });

        // Close menu on escape key
        $(document).off('keydown.blueprintMenu').on('keydown.blueprintMenu', function(e) {
            if (e.key === 'Escape' && $mainNav.hasClass('active')) {
                console.log('Escape key pressed - closing menu');
                closeMobileMenu();
                $menuToggle.focus(); // Return focus to toggle button
            }
        });

        // Close menu when clicking outside
        $(document).off('click.blueprintMenu').on('click.blueprintMenu', function(e) {
            if ($(window).width() <= 768) {
                const $target = $(e.target);
                if (!$target.closest('.main-navigation, .menu-toggle').length && $mainNav.hasClass('active')) {
                    console.log('Clicked outside - closing menu');
                    closeMobileMenu();
                }
            }
        });

        /**
         * Open mobile menu
         */
        function openMobileMenu() {
            console.log('Opening mobile menu');
            $mainNav.addClass('mobile-active active');
            $menuToggle.addClass('active');
            $menuOverlay.addClass('active');
            $body.addClass('mobile-menu-open');
            
            // Set ARIA attributes
            $menuToggle.attr('aria-expanded', 'true');
            $mainNav.attr('aria-hidden', 'false');
            
            // Focus management
            setTimeout(() => {
                const $firstLink = $mainNav.find('a').first();
                if ($firstLink.length) {
                    $firstLink.focus();
                }
            }, 100);
        }

        /**
         * Close mobile menu
         */
        function closeMobileMenu() {
            console.log('Closing mobile menu');
            $mainNav.removeClass('mobile-active active');
            $menuToggle.removeClass('active');
            $menuOverlay.removeClass('active');
            $body.removeClass('mobile-menu-open');
            
            // Close all open submenus
            $('.sub-menu').removeClass('open').slideUp(200);
            $('.menu-item-has-children').removeClass('open');
            
            // Set ARIA attributes
            $menuToggle.attr('aria-expanded', 'false');
            $mainNav.attr('aria-hidden', 'true');
        }
    }

    /**
     * Initialize desktop submenu functionality
     */
    function initializeDesktopSubmenus() {
        // Handle multi-level dropdown positioning
        $('.menu-item-has-children').each(function() {
            const $this = $(this);
            const $submenu = $this.find('.sub-menu').first();
            
            if ($submenu.length) {
                $this.off('mouseenter.desktop mouseleave.desktop').on('mouseenter.desktop', function() {
                    if ($(window).width() > 768) {
                        // Show submenu
                        $submenu.addClass('show');
                        adjustSubmenuPosition($submenu);
                        
                        // Handle nested submenus
                        $submenu.find('.menu-item-has-children').off('mouseenter.nested').on('mouseenter.nested', function() {
                            const $nestedSubmenu = $(this).find('.sub-menu').first();
                            if ($nestedSubmenu.length) {
                                $nestedSubmenu.addClass('show');
                                adjustNestedSubmenuPosition($nestedSubmenu);
                            }
                        });
                    }
                }).on('mouseleave.desktop', function() {
                    if ($(window).width() > 768) {
                        // Hide all submenus in this branch
                        $this.find('.sub-menu').removeClass('show');
                    }
                });
            }
        });
    }

    /**
     * Initialize mobile submenu toggle functionality
     */
    function initializeMobileSubmenus() {
        // Remove existing handlers to prevent duplicates
        $('.menu-item-has-children > a').off('click.mobile');
        
        // Handle submenu toggles on mobile
        $('.menu-item-has-children > a').on('click.mobile', function(e) {
            if ($(window).width() <= 768 && $('.main-navigation').hasClass('mobile-active')) {
                e.preventDefault();
                e.stopPropagation();
                
                const $this = $(this);
                const $parentLi = $this.parent();
                const $submenu = $parentLi.find('.sub-menu').first();
                
                console.log('Mobile submenu toggle clicked', {
                    hasSubmenu: $submenu.length > 0,
                    isOpen: $parentLi.hasClass('open')
                });
                
                if ($submenu.length) {
                    // Toggle the submenu
                    if ($parentLi.hasClass('open')) {
                        $parentLi.removeClass('open');
                        $submenu.removeClass('open').slideUp(300);
                        $this.attr('aria-expanded', 'false');
                        
                        // Close any nested submenus
                        $submenu.find('.menu-item-has-children').removeClass('open');
                        $submenu.find('.sub-menu').removeClass('open').slideUp(300);
                    } else {
                        // Close other submenus at the same level
                        $parentLi.siblings('.menu-item-has-children').removeClass('open')
                            .find('.sub-menu').removeClass('open').slideUp(300);
                        $parentLi.siblings('.menu-item-has-children').find('a').attr('aria-expanded', 'false');
                        
                        // Open this submenu
                        $parentLi.addClass('open');
                        $submenu.addClass('open').slideDown(300);
                        $this.attr('aria-expanded', 'true');
                    }
                }
            }
        });
    }

    /**
     * Adjust submenu position to prevent screen overflow
     */
    function adjustSubmenuPosition($submenu) {
        if ($(window).width() > 768) {
            const submenuWidth = $submenu.outerWidth();
            const submenuOffset = $submenu.offset();
            const windowWidth = $(window).width();
            
            // Reset positioning classes
            $submenu.removeClass('submenu-right submenu-left');
            
            // Check if submenu goes off screen to the right
            if (submenuOffset && (submenuOffset.left + submenuWidth) > windowWidth - 20) {
                $submenu.addClass('submenu-right');
            }
        }
    }

    /**
     * Adjust nested submenu position
     */
    function adjustNestedSubmenuPosition($nestedSubmenu) {
        if ($(window).width() > 768) {
            const submenuWidth = $nestedSubmenu.outerWidth();
            const parentSubmenu = $nestedSubmenu.closest('.sub-menu');
            const parentOffset = parentSubmenu.offset();
            const windowWidth = $(window).width();
            
            // Reset positioning
            $nestedSubmenu.removeClass('submenu-left');
            
            // Check if nested submenu goes off screen
            if (parentOffset && (parentOffset.left + parentSubmenu.outerWidth() + submenuWidth) > windowWidth - 20) {
                $nestedSubmenu.addClass('submenu-left');
            }
        }
    }

    /**
     * Initialize accessibility features
     */
    function initializeAccessibility() {
        // Add ARIA attributes to menu items with children
        $('.menu-item-has-children > a').each(function() {
            $(this).attr({
                'aria-expanded': 'false',
                'aria-haspopup': 'true'
            });
        });

        // Add ARIA labels to navigation
        $('.main-navigation').attr('aria-label', 'Primary Navigation');
        $('.sub-menu').attr('aria-label', 'Submenu');

        // Keyboard navigation for submenus
        $('.nav-menu a').off('keydown.accessibility').on('keydown.accessibility', function(e) {
            const $this = $(this);
            const $parentLi = $this.closest('li');
            const $submenu = $parentLi.find('.sub-menu').first();

            switch(e.key) {
                case 'ArrowDown':
                    e.preventDefault();
                    if ($submenu.length && $(window).width() > 768) {
                        $submenu.find('a').first().focus();
                    } else {
                        const $nextItem = $parentLi.next().find('a').first();
                        if ($nextItem.length) {
                            $nextItem.focus();
                        }
                    }
                    break;

                case 'ArrowUp':
                    e.preventDefault();
                    const $prevItem = $parentLi.prev().find('a').first();
                    if ($prevItem.length) {
                        $prevItem.focus();
                    }
                    break;

                case 'ArrowRight':
                    e.preventDefault();
                    if ($submenu.length && $(window).width() > 768) {
                        $submenu.addClass('show');
                        $submenu.find('a').first().focus();
                    }
                    break;

                case 'ArrowLeft':
                    e.preventDefault();
                    if ($this.closest('.sub-menu').length) {
                        const $parentMenu = $this.closest('.sub-menu');
                        $parentMenu.removeClass('show');
                        $parentMenu.siblings('a').focus();
                    }
                    break;

                case 'Escape':
                    if ($this.closest('.sub-menu').length) {
                        $this.closest('.sub-menu').removeClass('show');
                        $this.closest('.sub-menu').siblings('a').focus();
                    }
                    break;
            }
        });
    }

    /**
     * Handle window resize events
     */
    function handleWindowResize() {
        let resizeTimer;
        
        $(window).off('resize.blueprintMenu').on('resize.blueprintMenu', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                const windowWidth = $(window).width();
                
                console.log('Window resized to:', windowWidth);
                
                // Reset mobile menu when switching to desktop
                if (windowWidth > 768) {
                    $('.main-navigation').removeClass('mobile-active active');
                    $('.menu-toggle').removeClass('active');
                    $('.mobile-nav-overlay').removeClass('active');
                    $('body').removeClass('mobile-menu-open');
                    $('.sub-menu').removeClass('open show').removeAttr('style');
                    $('.menu-item-has-children').removeClass('open');
                    
                    // Reset ARIA attributes
                    $('.menu-toggle').attr('aria-expanded', 'false');
                    $('.main-navigation').attr('aria-hidden', 'false');
                    $('.menu-item-has-children > a').attr('aria-expanded', 'false');
                }
            }, 250);
        });
    }

    /**
     * Additional initialization and debugging
     */
    $(window).on('load', function() {
        console.log('BluePrint Menu: Window loaded, performing final checks');
        
        // Double-check that elements exist
        const menuToggleExists = $('.menu-toggle').length > 0;
        const mainNavExists = $('.main-navigation').length > 0;
        const navMenuExists = $('.nav-menu').length > 0;
        
        console.log('Menu elements check:', {
            menuToggle: menuToggleExists,
            mainNav: mainNavExists,
            navMenu: navMenuExists
        });
        
        // If elements are missing, try to reinitialize
        if (!menuToggleExists || !mainNavExists || !navMenuExists) {
            console.warn('BluePrint Menu: Some menu elements are missing, attempting reinitialize...');
            setTimeout(() => {
                initializeMobileMenu();
                initializeDesktopSubmenus();
                initializeMobileSubmenus();
            }, 500);
        }
        
        // Force show menu toggle on mobile
        if ($(window).width() <= 768) {
            $('.menu-toggle').css('display', 'flex');
        }
    });

    /**
     * Handle smooth scrolling for anchor links
     */
    $(document).on('click', 'a[href*="#"]:not([href="#"])', function(e) {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && 
            location.hostname === this.hostname) {
            
            const target = $(this.hash);
            const $targetElement = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            
            if ($targetElement.length) {
                e.preventDefault();
                const offsetTop = $targetElement.offset().top - 100; // Account for header
                
                $('html, body').animate({
                    scrollTop: offsetTop
                }, 800, 'swing');
                
                // Close mobile menu if open
                if ($('.main-navigation').hasClass('active')) {
                    $('.menu-toggle').trigger('click');
                }
            }
        }
    });

    /**
     * Debug function to check menu state
     */
    window.debugBlueprintMenu = function() {
        console.log('BluePrint Menu Debug Info:', {
            windowWidth: $(window).width(),
            menuToggleVisible: $('.menu-toggle').is(':visible'),
            mainNavClasses: $('.main-navigation').attr('class'),
            activeSubmenus: $('.sub-menu.open').length,
            isMobileMenuOpen: $('.main-navigation').hasClass('active'),
            bodyClasses: $('body').attr('class')
        });
    };

})(jQuery);

/**
 * Smooth scroll for anchor links
 */
$('a[href*="#"]:not([href="#"])').on('click', function() {
    if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && 
        location.hostname === this.hostname) {
    
        const target = $(this.hash);
        const $targetElement = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        
        if ($targetElement.length) {
            const offsetTop = $targetElement.offset().top - 100; // Account for fixed header
            
            $('html, body').animate({
                scrollTop: offsetTop
            }, 800, 'swing');
            
            // Close mobile menu if open
            if ($('.main-navigation').hasClass('active')) {
                $('.menu-toggle').trigger('click');
            }
            
            return false;
        }
    }
});

/**
 * Enhanced submenu positioning for desktop
 */
function adjustSubmenuPosition() {
    if ($(window).width() > 768) {
        $('.sub-menu').each(function() {
            const $submenu = $(this);
            const $parentLi = $submenu.parent();
            const submenuWidth = $submenu.outerWidth();
            const parentOffset = $parentLi.offset();
            const windowWidth = $(window).width();
            
            // Reset positioning
            $submenu.removeClass('submenu-right');
            
            // Check if submenu goes off screen
            if (parentOffset && (parentOffset.left + submenuWidth) > windowWidth) {
                $submenu.addClass('submenu-right');
            }
        });
    }
}

// Adjust submenu position on hover and resize
$('.menu-item-has-children').on('mouseenter', adjustSubmenuPosition);
$(window).on('resize', adjustSubmenuPosition);

/**
 * Add loading animation when navigating
 */
$('.nav-menu a').on('click', function() {
    const $this = $(this);
    if (!$this.attr('href').startsWith('#') && !$this.hasClass('no-loading')) {
        $this.addClass('loading');
        setTimeout(() => {
            $this.removeClass('loading');
        }, 2000);
    }
});
