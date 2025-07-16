/**
 * BluePrint Theme Menu System
 * Handles desktop dropdown menus, mobile menu toggle, and submenu interactions
 */

(function($) {
    'use strict';

    class BluePrintMenuSystem {
        constructor() {
            this.menuToggle = $('.menu-toggle');
            this.mainNav = $('.main-navigation');
            this.navMenu = $('.nav-menu');
            this.body = $('body');
            this.overlay = null;
            this.isInitialized = false;
            this.isMobile = false;

            this.init();
        }

        init() {
            if (this.isInitialized) return;

            this.createMobileOverlay();
            this.setupMenuStructure();
            this.bindEvents();
            // this.bindKeyboardEvents(); // Temporarily disabled for debugging
            // this.bindDesktopEvents(); // Temporarily disabled for pure CSS testing
            this.checkViewport();
            this.isInitialized = true;

            console.log('BluePrint Menu System initialized for pure CSS testing');
        }

        createMobileOverlay() {
            if (!$('.mobile-nav-overlay').length) {
                this.overlay = $('<div class="mobile-nav-overlay"></div>');
                this.body.append(this.overlay);
            } else {
                this.overlay = $('.mobile-nav-overlay');
            }
        }

        setupMenuStructure() {
            // Add dropdown indicators to menu items with children
            $('.menu-item-has-children > a').each(function() {
                const $link = $(this);
                if (!$link.find('.dropdown-indicator').length) {
                    const depth = $link.parents('.sub-menu').length;
                    if (depth === 0) {
                        $link.append('<span class="dropdown-indicator"><i class="arrow">▼</i></span>');
                    } else {
                        $link.append('<span class="dropdown-indicator nested"><i class="arrow">▶</i></span>');
                    }
                }
            });

            // Add depth classes for styling
            $('.nav-menu .menu-item-has-children').each(function() {
                const depth = $(this).parents('.sub-menu').length;
                $(this).addClass('menu-depth-' + depth);
            });
        }

        bindEvents() {
            // Mobile menu toggle
            this.menuToggle.on('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                this.toggleMobileMenu();
            });

            // Desktop dropdown hover (only on desktop)
            if (window.innerWidth > 768) {
                this.bindDesktopEvents();
            }

            // Mobile submenu toggle (handle all levels)
            $(document).on('click', '.menu-item-has-children > a', (e) => {
                if (this.isMobile || window.innerWidth <= 768) {
                    e.preventDefault();
                    e.stopPropagation();
                    this.toggleMobileSubmenu($(e.currentTarget).parent());
                }
            });

            // Handle nested submenu clicks specifically
            $(document).on('click', '.sub-menu .menu-item-has-children > a', (e) => {
                if (this.isMobile || window.innerWidth <= 768) {
                    e.preventDefault();
                    e.stopPropagation();
                    this.toggleMobileSubmenu($(e.currentTarget).parent());
                }
            });

            // Overlay click to close mobile menu
            this.overlay.on('click', () => {
                this.closeMobileMenu();
            });

            // Close menu on escape key
            $(document).on('keydown', (e) => {
                if (e.key === 'Escape' || e.keyCode === 27) {
                    this.closeMobileMenu();
                }
            });

            // Handle window resize
            let resizeTimeout;
            $(window).on('resize', () => {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(() => {
                    this.checkViewport();
                    if (window.innerWidth > 768) {
                        this.closeMobileMenu();
                        this.bindDesktopEvents();
                    }
                }, 150);
            });

            // Close menu when clicking outside
            $(document).on('click', (e) => {
                if (!this.mainNav.is(e.target) && 
                    !this.menuToggle.is(e.target) && 
                    this.mainNav.has(e.target).length === 0 && 
                    this.menuToggle.has(e.target).length === 0) {
                    this.closeAllMenus();
                }
            });

            // Enhanced keyboard navigation support
            this.bindKeyboardEvents();
        }

        bindDesktopEvents() {
            // Remove existing hover events to avoid duplicates
            $('.menu-item-has-children').off('mouseenter mouseleave');

            // Enhanced multi-level dropdown handling
            $('.menu-item-has-children').on('mouseenter', function() {
                if (window.innerWidth > 768) {
                    const $menuItem = $(this);
                    const $submenu = $menuItem.children('.sub-menu');
                    
                    if ($submenu.length > 0) {
                        // Clear any hide timeout
                        clearTimeout($menuItem.data('hideTimeout'));
                        
                        $menuItem.addClass('dropdown-open');
                        
                        // Handle positioning for nested submenus
                        const depth = $menuItem.parents('.sub-menu').length;
                        
                        if (depth > 0) {
                            // This is a nested submenu (2nd level or deeper)
                            const menuRect = $menuItem[0].getBoundingClientRect();
                            const windowWidth = window.innerWidth;
                            const submenuWidth = 220; // Default submenu width
                            
                            // Reset any previous positioning
                            $submenu.removeClass('position-left');
                            
                            // Check if submenu would go off-screen on the right
                            setTimeout(() => {
                                const currentRect = $submenu[0].getBoundingClientRect();
                                if (currentRect.right > windowWidth - 20) {
                                    $submenu.addClass('position-left');
                                }
                            }, 10);
                        }
                        
                        // Show submenu with animation
                        $submenu.stop(true, true).fadeIn(200);
                    }
                }
            }).on('mouseleave', function() {
                if (window.innerWidth > 768) {
                    const $menuItem = $(this);
                    const $submenu = $menuItem.children('.sub-menu');
                    
                    // Set a timeout to allow moving to submenu
                    const hideTimeout = setTimeout(() => {
                        $menuItem.removeClass('dropdown-open');
                        $submenu.stop(true, true).fadeOut(200);
                        
                        // Close any nested submenus recursively
                        $submenu.find('.menu-item-has-children').removeClass('dropdown-open');
                        $submenu.find('.sub-menu').stop(true, true).fadeOut(200);
                    }, 150);
                    
                    $menuItem.data('hideTimeout', hideTimeout);
                }
            });
            
            // Prevent submenu from hiding when hovering over it
            $('.sub-menu').on('mouseenter', function() {
                const $submenu = $(this);
                const $parentItem = $submenu.parent('.menu-item-has-children');
                clearTimeout($parentItem.data('hideTimeout'));
            });
        }

        // Enhanced keyboard navigation support
        bindKeyboardEvents() {
            $('.nav-menu a').on('keydown', (e) => {
                const $link = $(e.currentTarget);
                const $menuItem = $link.parent('.menu-item-has-children');
                
                switch (e.key) {
                    case 'ArrowDown':
                        e.preventDefault();
                        if ($menuItem.length) {
                            // Open submenu if it exists
                            const $submenu = $menuItem.children('.sub-menu');
                            if ($submenu.length) {
                                if (window.innerWidth > 768) {
                                    $menuItem.addClass('dropdown-open');
                                } else {
                                    this.toggleMobileSubmenu($menuItem);
                                }
                                // Focus first submenu item
                                setTimeout(() => {
                                    $submenu.find('a').first().focus();
                                }, 100);
                            }
                        } else {
                            // Move to next menu item
                            const $nextItem = $menuItem.length ? $menuItem.next() : $link.parent().next();
                            if ($nextItem.length) {
                                $nextItem.find('> a').focus();
                            }
                        }
                        break;
                        
                    case 'ArrowUp':
                        e.preventDefault();
                        const $prevItem = $menuItem.length ? $menuItem.prev() : $link.parent().prev();
                        if ($prevItem.length) {
                            $prevItem.find('> a').focus();
                        }
                        break;
                        
                    case 'ArrowRight':
                        e.preventDefault();
                        if ($menuItem.length) {
                            const $submenu = $menuItem.children('.sub-menu');
                            if ($submenu.length) {
                                if (window.innerWidth > 768) {
                                    $menuItem.addClass('dropdown-open');
                                }
                                $submenu.find('a').first().focus();
                            }
                        }
                        break;
                        
                    case 'ArrowLeft':
                        e.preventDefault();
                        // Close current submenu and focus parent
                        const $parentSubmenu = $link.closest('.sub-menu');
                        if ($parentSubmenu.length) {
                            const $parentItem = $parentSubmenu.parent('.menu-item-has-children');
                            if ($parentItem.length) {
                                if (window.innerWidth > 768) {
                                    $parentItem.removeClass('dropdown-open');
                                } else {
                                    $parentItem.removeClass('submenu-open');
                                    $parentSubmenu.slideUp(200);
                                }
                                $parentItem.find('> a').focus();
                            }
                        }
                        break;
                        
                    case 'Escape':
                        e.preventDefault();
                        this.closeAllMenus();
                        break;
                }
            });
        }

        // Add edge detection and repositioning for nested submenus
        handleSubmenuPositioning($submenu) {
            if (!$submenu.length) return;

            const windowWidth = $(window).width();
            const submenuWidth = $submenu.outerWidth();
            const submenuOffset = $submenu.offset();
            
            if (submenuOffset && submenuOffset.left + submenuWidth > windowWidth) {
                // Position to the left of parent instead
                $submenu.addClass('position-left');
            } else {
                $submenu.removeClass('position-left');
            }

            // Handle nested submenus recursively
            $submenu.find('.sub-menu').each((index, nestedSubmenu) => {
                this.handleSubmenuPositioning($(nestedSubmenu));
            });
        }

        checkViewport() {
            this.isMobile = window.innerWidth <= 768;
            
            if (this.isMobile) {
                this.body.addClass('is-mobile');
            } else {
                this.body.removeClass('is-mobile');
                // Close any open mobile submenus
                $('.menu-item-has-children').removeClass('submenu-open');
                $('.sub-menu').removeAttr('style');
            }
        }

        toggleMobileMenu() {
            const isOpen = this.body.hasClass('mobile-menu-open');
            
            if (isOpen) {
                this.closeMobileMenu();
            } else {
                this.openMobileMenu();
            }
        }

        openMobileMenu() {
            this.body.addClass('mobile-menu-open');
            this.menuToggle.addClass('active').attr('aria-expanded', 'true');
            this.mainNav.addClass('mobile-active');
            this.overlay.addClass('active');
            
            // Prevent body scroll
            this.body.css('overflow', 'hidden');
            
            console.log('Mobile menu opened');
        }

        closeMobileMenu() {
            this.body.removeClass('mobile-menu-open');
            this.menuToggle.removeClass('active').attr('aria-expanded', 'false');
            this.mainNav.removeClass('mobile-active');
            this.overlay.removeClass('active');
            
            // Restore body scroll
            this.body.css('overflow', '');
            
            // Close all submenus
            $('.menu-item-has-children').removeClass('submenu-open');
            $('.sub-menu').slideUp(200);
            
            console.log('Mobile menu closed');
        }

        toggleMobileSubmenu($menuItem) {
            if (!this.isMobile && window.innerWidth > 768) return;

            const $submenu = $menuItem.children('.sub-menu');
            const isOpen = $menuItem.hasClass('submenu-open');
            
            if (!$submenu.length) return; // No submenu found
            
            if (isOpen) {
                // Close this submenu and any nested submenus recursively
                $menuItem.removeClass('submenu-open');
                $submenu.slideUp(200);
                
                // Close all nested submenus
                $submenu.find('.menu-item-has-children').removeClass('submenu-open');
                $submenu.find('.sub-menu').slideUp(200);
            } else {
                // Close sibling submenus at the same level only
                const $parent = $menuItem.parent();
                const $siblings = $parent.children('.menu-item-has-children').not($menuItem);
                
                $siblings.removeClass('submenu-open');
                $siblings.children('.sub-menu').slideUp(200);
                
                // Close nested submenus in siblings recursively
                $siblings.find('.menu-item-has-children').removeClass('submenu-open');
                $siblings.find('.sub-menu').slideUp(200);
                
                // Open current submenu
                $menuItem.addClass('submenu-open');
                $submenu.slideDown(200);
            }
        }

        closeAllMenus() {
            this.closeMobileMenu();
            
            if (window.innerWidth > 768) {
                $('.menu-item-has-children').removeClass('dropdown-open');
                $('.sub-menu, .sub-menu').stop(true, true).slideUp(200);
            }
        }
    }

    // Initialize when DOM is ready
    $(document).ready(function() {
        // Wait a bit to ensure all elements are rendered
        setTimeout(() => {
            window.blueprintMenu = new BluePrintMenuSystem();
        }, 100);
    });

    // Also initialize on window load as backup
    $(window).on('load', function() {
        if (!window.blueprintMenu) {
            window.blueprintMenu = new BluePrintMenuSystem();
        }
    });

})(jQuery);
