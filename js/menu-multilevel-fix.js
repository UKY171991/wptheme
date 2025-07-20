/**
 * Menu Multilevel Fix - Final Implementation
 * Ensures proper functionality for all menu levels on both desktop and mobile
 */

jQuery(document).ready(function($) {
    // Initialize only if not already initialized
    if (window.menuMultilevelInitialized) return;
    window.menuMultilevelInitialized = true;
    
    // Cache DOM elements
    const $menuToggle = $('.menu-toggle');
    const $mainNav = $('.main-navigation');
    const $navMenu = $('.nav-menu');
    const $menuItems = $('.nav-menu .menu-item-has-children');
    const $overlay = $('.mobile-nav-overlay');
    const $body = $('body');
    
    // Initialize menu system
    function initMenuSystem() {
        setupMobileMenu();
        setupDesktopMenu();
        setupAccessibility();
        handleResize();
        fixMenuPositioning();
    }
    
    // Fix menu positioning issues
    function fixMenuPositioning() {
        // Fix submenu positioning for all levels
        $menuItems.each(function() {
            const $item = $(this);
            const $submenu = $item.children('.sub-menu');
            
            // Add proper positioning class
            if ($item.parent().hasClass('sub-menu')) {
                $item.addClass('has-nested-submenu');
            }
            
            // Check if submenu exists
            if ($submenu.length) {
                // Add submenu toggle for mobile
                if (!$item.children('.submenu-toggle').length) {
                    $item.append('<button class="submenu-toggle" aria-expanded="false"><span class="screen-reader-text">Toggle Submenu</span></button>');
                }
                
                // Check if this is a deep submenu (level 3+)
                const depth = $item.parents('.sub-menu').length;
                if (depth >= 2) {
                    $item.addClass('deep-submenu');
                }
            }
        });
    }
    
    // Mobile menu setup
    function setupMobileMenu() {
        // Toggle mobile menu
        $menuToggle.on('click', function(e) {
            e.preventDefault();
            toggleMobileMenu();
        });
        
        // Close menu when clicking overlay
        $overlay.on('click', function() {
            closeMobileMenu();
        });
        
        // Handle submenu toggle clicks
        $(document).on('click', '.submenu-toggle', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const $toggle = $(this);
            const $item = $toggle.parent('.menu-item-has-children');
            const $submenu = $item.children('.sub-menu');
            const isExpanded = $toggle.attr('aria-expanded') === 'true';
            
            // Close other submenus at same level
            $item.siblings('.menu-item-has-children').each(function() {
                const $sibling = $(this);
                $sibling.removeClass('submenu-open');
                $sibling.children('.submenu-toggle').attr('aria-expanded', 'false');
                $sibling.children('.sub-menu').slideUp(200);
            });
            
            // Toggle current submenu
            if (isExpanded) {
                $toggle.attr('aria-expanded', 'false');
                $item.removeClass('submenu-open');
                $submenu.slideUp(200);
                
                // Close all child submenus
                $submenu.find('.menu-item-has-children').each(function() {
                    const $childItem = $(this);
                    $childItem.removeClass('submenu-open');
                    $childItem.children('.submenu-toggle').attr('aria-expanded', 'false');
                    $childItem.children('.sub-menu').slideUp(200);
                });
            } else {
                $toggle.attr('aria-expanded', 'true');
                $item.addClass('submenu-open');
                $submenu.slideDown(200);
            }
        });
        
        // Close menu on escape key
        $(document).on('keyup', function(e) {
            if (e.key === 'Escape') {
                closeMobileMenu();
            }
        });
    }
    
    // Desktop menu setup
    function setupDesktopMenu() {
        // Handle hover events for desktop
        if (window.innerWidth > 768) {
            $menuItems.on('mouseenter', function() {
                if (window.innerWidth <= 768) return;
                
                const $item = $(this);
                const $submenu = $item.children('.sub-menu');
                
                // Clear any existing timeout
                clearTimeout($item.data('timeoutId'));
                
                // Show submenu
                $item.addClass('submenu-hover');
                $submenu.addClass('show');
                
                // Check if submenu goes off-screen
                checkSubmenuPosition($submenu);
            }).on('mouseleave', function() {
                if (window.innerWidth <= 768) return;
                
                const $item = $(this);
                
                // Set timeout to hide submenu
                const timeoutId = setTimeout(function() {
                    $item.removeClass('submenu-hover');
                    $item.find('.sub-menu').removeClass('show');
                }, 200);
                
                $item.data('timeoutId', timeoutId);
            });
            
            // Handle focus events for keyboard navigation
            $menuItems.find('> a').on('focus', function() {
                if (window.innerWidth <= 768) return;
                
                const $link = $(this);
                const $item = $link.parent();
                const $submenu = $item.children('.sub-menu');
                
                // Close all other submenus
                $menuItems.not($item).removeClass('submenu-hover');
                $menuItems.not($item).find('.sub-menu').removeClass('show');
                
                // Show current submenu
                $item.addClass('submenu-hover');
                $submenu.addClass('show');
                
                // Check if submenu goes off-screen
                checkSubmenuPosition($submenu);
            });
        }
    }
    
    // Check if submenu goes off-screen and adjust position
    function checkSubmenuPosition($submenu) {
        if (window.innerWidth <= 768) return;
        
        // Reset any previous position adjustments
        $submenu.removeClass('submenu-left');
        
        // Get submenu position
        const submenuRect = $submenu[0].getBoundingClientRect();
        const viewportWidth = window.innerWidth;
        
        // If submenu goes off right edge, position it to the left
        if (submenuRect.right > viewportWidth - 20) {
            $submenu.addClass('submenu-left');
        }
        
        // Handle nested submenus
        $submenu.find('.sub-menu').each(function() {
            const $nestedSubmenu = $(this);
            const nestedRect = $nestedSubmenu[0].getBoundingClientRect();
            
            if (nestedRect.right > viewportWidth - 20) {
                $nestedSubmenu.addClass('submenu-left');
            } else {
                $nestedSubmenu.removeClass('submenu-left');
            }
        });
    }
    
    // Setup accessibility features
    function setupAccessibility() {
        // Add ARIA attributes
        $menuItems.each(function() {
            const $item = $(this);
            const $link = $item.children('a');
            
            $link.attr('aria-haspopup', 'true');
            $link.attr('aria-expanded', 'false');
        });
        
        // Keyboard navigation
        $navMenu.find('a').on('keydown', function(e) {
            const $link = $(this);
            const $item = $link.parent();
            const $submenu = $item.children('.sub-menu');
            const $parentMenu = $item.parent('.sub-menu');
            const $parentItem = $parentMenu.parent('.menu-item-has-children');
            
            switch (e.key) {
                case 'ArrowDown':
                    e.preventDefault();
                    
                    if ($item.hasClass('menu-item-has-children') && !$submenu.hasClass('show')) {
                        // Open submenu
                        $item.addClass('submenu-hover');
                        $submenu.addClass('show');
                        $link.attr('aria-expanded', 'true');
                        
                        // Focus first item in submenu
                        $submenu.find('a').first().focus();
                    } else {
                        // Move to next item
                        const $nextItem = $item.next('.menu-item');
                        if ($nextItem.length) {
                            $nextItem.find('a').first().focus();
                        }
                    }
                    break;
                    
                case 'ArrowUp':
                    e.preventDefault();
                    
                    // Move to previous item
                    const $prevItem = $item.prev('.menu-item');
                    if ($prevItem.length) {
                        $prevItem.find('a').first().focus();
                    } else if ($parentItem && $parentItem.length) {
                        // Move to parent item
                        $parentItem.find('> a').focus();
                    }
                    break;
                    
                case 'ArrowRight':
                    if ($item.hasClass('menu-item-has-children')) {
                        e.preventDefault();
                        
                        // Open submenu
                        $item.addClass('submenu-hover');
                        $submenu.addClass('show');
                        $link.attr('aria-expanded', 'true');
                        
                        // Focus first item in submenu
                        $submenu.find('a').first().focus();
                    }
                    break;
                    
                case 'ArrowLeft':
                    if ($parentItem && $parentItem.length) {
                        e.preventDefault();
                        
                        // Close current submenu
                        $parentItem.removeClass('submenu-hover');
                        $parentMenu.removeClass('show');
                        $parentItem.find('> a').attr('aria-expanded', 'false');
                        
                        // Focus parent item
                        $parentItem.find('> a').focus();
                    }
                    break;
                    
                case 'Escape':
                    if ($parentItem && $parentItem.length) {
                        e.preventDefault();
                        
                        // Close current submenu
                        $parentItem.removeClass('submenu-hover');
                        $parentMenu.removeClass('show');
                        $parentItem.find('> a').attr('aria-expanded', 'false');
                        
                        // Focus parent item
                        $parentItem.find('> a').focus();
                    } else {
                        // Close mobile menu
                        closeMobileMenu();
                    }
                    break;
            }
        });
    }
    
    // Toggle mobile menu
    function toggleMobileMenu() {
        const isOpen = $menuToggle.hasClass('active');
        
        if (isOpen) {
            closeMobileMenu();
        } else {
            openMobileMenu();
        }
    }
    
    // Open mobile menu
    function openMobileMenu() {
        $menuToggle.addClass('active');
        $mainNav.addClass('mobile-active active');
        $overlay.addClass('active');
        $body.addClass('mobile-menu-open');
        
        // Set focus to first menu item
        setTimeout(function() {
            $navMenu.find('a').first().focus();
        }, 200);
    }
    
    // Close mobile menu
    function closeMobileMenu() {
        $menuToggle.removeClass('active');
        $mainNav.removeClass('active');
        $overlay.removeClass('active');
        $body.removeClass('mobile-menu-open');
        
        // Close all submenus
        $menuItems.removeClass('submenu-open');
        $('.submenu-toggle').attr('aria-expanded', 'false');
        $('.sub-menu').slideUp(0);
        
        // Return focus to menu toggle
        setTimeout(function() {
            $menuToggle.focus();
            
            // Fully remove mobile-active class after animation completes
            setTimeout(function() {
                $mainNav.removeClass('mobile-active');
            }, 400);
        }, 200);
    }
    
    // Handle window resize
    function handleResize() {
        let resizeTimer;
        
        $(window).on('resize', function() {
            clearTimeout(resizeTimer);
            
            resizeTimer = setTimeout(function() {
                const isMobile = window.innerWidth <= 768;
                
                if (isMobile) {
                    // Mobile view
                    $mainNav.removeClass('desktop-active');
                    $menuItems.off('mouseenter mouseleave');
                    
                    // Reset desktop-specific classes
                    $menuItems.removeClass('submenu-hover');
                    $('.sub-menu').removeClass('show');
                } else {
                    // Desktop view
                    closeMobileMenu();
                    $mainNav.addClass('desktop-active');
                    
                    // Re-initialize desktop menu
                    setupDesktopMenu();
                }
            }, 250);
        });
        
        // Initial check
        if (window.innerWidth > 768) {
            $mainNav.addClass('desktop-active');
        }
    }
    
    // Debug function
    window.debugMultilevelMenu = function() {
        console.log({
            menuToggleExists: $menuToggle.length > 0,
            mainNavExists: $mainNav.length > 0,
            menuItemsCount: $menuItems.length,
            windowWidth: window.innerWidth,
            isMobileView: window.innerWidth <= 768,
            menuActive: $mainNav.hasClass('active'),
            mobileActive: $mainNav.hasClass('mobile-active'),
            desktopActive: $mainNav.hasClass('desktop-active'),
            submenuItems: $('.sub-menu').length,
            nestedSubmenuItems: $('.sub-menu .sub-menu').length,
            deepNestedSubmenuItems: $('.sub-menu .sub-menu .sub-menu').length
        });
        
        // Check for potential issues
        if ($menuItems.length === 0) {
            console.warn('No menu items with children found. Check your menu structure.');
        }
        
        if ($('.sub-menu').length === 0) {
            console.warn('No submenus found. Check your menu structure.');
        }
        
        // Check for CSS conflicts
        const menuStyles = window.getComputedStyle($mainNav[0]);
        if (menuStyles.display === 'none' && window.innerWidth > 768) {
            console.warn('Main navigation is hidden on desktop. Check for CSS conflicts.');
        }
        
        // Check for z-index issues
        const zIndex = parseInt(menuStyles.zIndex);
        if (zIndex < 100) {
            console.warn('Main navigation z-index is too low: ' + zIndex);
        }
    };
    
    // Initialize menu system
    initMenuSystem();
});