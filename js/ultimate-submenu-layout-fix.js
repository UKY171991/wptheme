/**
 * Ultimate Submenu Layout Fix - JavaScript
 * Handles dropdown positioning, mobile behavior, and accessibility
 * Version: 2.0
 */

(function($) {
    'use strict';

    // Wait for DOM to be ready
    $(document).ready(function() {
        initSubmenuFix();
    });

    function initSubmenuFix() {
        // Cache selectors
        const $navigation = $('.main-navigation');
        const $navMenu = $('.nav-menu');
        const $menuItems = $('.nav-menu .menu-item');
        const $menuItemsWithDropdown = $('.nav-menu .menu-item-has-children');

        // Add dropdown indicators
        addDropdownIndicators();
        
        // Handle dropdown positioning
        handleDropdownPositioning();
        
        // Handle mobile menu behavior
        handleMobileMenuBehavior();
        
        // Handle keyboard navigation
        handleKeyboardNavigation();
        
        // Handle click outside to close
        handleClickOutside();
        
        // Handle window resize
        handleWindowResize();
    }

    function addDropdownIndicators() {
        // Add has-dropdown class to items with submenus
        $('.nav-menu .menu-item-has-children').addClass('has-dropdown');
        
        // Add dropdown-toggle spans for better control
        $('.nav-menu .menu-item-has-children > a').each(function() {
            if (!$(this).find('.dropdown-toggle').length) {
                $(this).append('<span class="dropdown-toggle" aria-hidden="true"></span>');
            }
        });
    }

    function handleDropdownPositioning() {
        $('.nav-menu .menu-item-has-children').each(function() {
            const $menuItem = $(this);
            const $dropdown = $menuItem.find('.sub-menu').first();
            
            if ($dropdown.length) {
                // Check if dropdown would go off-screen
                $menuItem.on('mouseenter focus', function() {
                    setTimeout(function() {
                        checkDropdownPosition($menuItem, $dropdown);
                        // Also check nested dropdowns
                        checkAllNestedDropdowns($dropdown);
                    }, 10);
                });
            }
        });
        
        // Handle nested menu items specifically
        $('.sub-menu .menu-item-has-children').each(function() {
            const $nestedItem = $(this);
            const $nestedDropdown = $nestedItem.find('.sub-menu').first();
            
            if ($nestedDropdown.length) {
                $nestedItem.on('mouseenter focus', function() {
                    setTimeout(function() {
                        checkDropdownPosition($nestedItem, $nestedDropdown);
                        // Recursively check deeper levels
                        checkAllNestedDropdowns($nestedDropdown);
                    }, 10);
                });
            }
        });
    }

    function checkAllNestedDropdowns($parentDropdown) {
        $parentDropdown.find('.menu-item-has-children').each(function() {
            const $nestedItem = $(this);
            const $nestedDropdown = $nestedItem.find('.sub-menu').first();
            
            if ($nestedDropdown.length) {
                checkDropdownPosition($nestedItem, $nestedDropdown);
                // Continue checking deeper levels
                checkAllNestedDropdowns($nestedDropdown);
            }
        });
    }

    function checkDropdownPosition($menuItem, $dropdown) {
        // Reset position classes
        $menuItem.removeClass('dropdown-right dropdown-left');
        
        // Get positions
        const menuItemOffset = $menuItem.offset();
        const dropdownWidth = $dropdown.outerWidth();
        const windowWidth = $(window).width();
        const rightEdge = menuItemOffset.left + dropdownWidth;
        
        // If dropdown would go off right edge, align it to the right
        if (rightEdge > windowWidth - 20) {
            $menuItem.addClass('dropdown-right');
        }
        
        // Handle nested dropdowns with improved edge detection
        $dropdown.find('.menu-item-has-children').each(function() {
            const $nestedItem = $(this);
            const $nestedDropdown = $nestedItem.find('.sub-menu').first();
            
            if ($nestedDropdown.length) {
                const nestedOffset = $nestedItem.offset();
                const nestedWidth = $nestedDropdown.outerWidth();
                const parentWidth = $nestedItem.outerWidth();
                
                // Check if nested dropdown would go off right edge
                const nestedRightEdge = nestedOffset.left + parentWidth + nestedWidth;
                const nestedLeftEdge = nestedOffset.left - nestedWidth;
                
                // If it would go off right edge, position it to the left
                if (nestedRightEdge > windowWidth - 20) {
                    $nestedItem.addClass('dropdown-right');
                }
                // If positioning left would go off left edge, keep it right
                else if (nestedLeftEdge < 20 && !$nestedItem.hasClass('dropdown-right')) {
                    $nestedItem.removeClass('dropdown-right');
                }
                
                // Recursively check deeper levels
                checkNestedDropdowns($nestedDropdown);
            }
        });
    }

    function checkNestedDropdowns($parentDropdown) {
        $parentDropdown.find('.menu-item-has-children').each(function() {
            const $nestedItem = $(this);
            const $nestedDropdown = $nestedItem.find('.sub-menu').first();
            
            if ($nestedDropdown.length) {
                const nestedOffset = $nestedItem.offset();
                const nestedWidth = $nestedDropdown.outerWidth();
                const parentWidth = $nestedItem.outerWidth();
                const windowWidth = $(window).width();
                
                const nestedRightEdge = nestedOffset.left + parentWidth + nestedWidth;
                const nestedLeftEdge = nestedOffset.left - nestedWidth;
                
                if (nestedRightEdge > windowWidth - 20 && nestedLeftEdge > 20) {
                    $nestedItem.addClass('dropdown-right');
                }
                
                // Continue checking deeper levels
                checkNestedDropdowns($nestedDropdown);
            }
        });
    }

    function handleMobileMenuBehavior() {
        // Check if we're on mobile
        function isMobile() {
            return window.innerWidth <= 768;
        }

        // Handle mobile dropdown toggles
        $('.nav-menu .menu-item-has-children > a').on('click', function(e) {
            if (isMobile()) {
                e.preventDefault();
                
                const $menuItem = $(this).parent();
                const $dropdown = $menuItem.find('.sub-menu').first();
                
                // Toggle dropdown
                $menuItem.toggleClass('dropdown-open');
                
                // Slide toggle for smooth animation
                $dropdown.slideToggle(300);
                
                // Close other dropdowns at the same level
                $menuItem.siblings('.menu-item-has-children').removeClass('dropdown-open')
                    .find('.sub-menu').slideUp(300);
            }
        });

        // Handle window resize - close mobile menus when switching to desktop
        $(window).on('resize', function() {
            if (!isMobile()) {
                $('.nav-menu .menu-item').removeClass('dropdown-open');
                $('.nav-menu .sub-menu').removeAttr('style');
            }
        });
    }

    function handleKeyboardNavigation() {
        // Handle Enter and Space keys for dropdown toggles
        $('.nav-menu .menu-item-has-children > a').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                const $menuItem = $(this).parent();
                
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    $menuItem.toggleClass('dropdown-open');
                    $menuItem.find('.sub-menu').first().slideToggle(300);
                } else {
                    // On desktop, just focus the first submenu item
                    const $firstSubmenuItem = $menuItem.find('.sub-menu > .menu-item > a').first();
                    if ($firstSubmenuItem.length) {
                        e.preventDefault();
                        $menuItem.addClass('dropdown-open');
                        setTimeout(function() {
                            $firstSubmenuItem.focus();
                        }, 100);
                    }
                }
            }
        });

        // Handle Escape key to close dropdowns
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape') {
                $('.nav-menu .menu-item').removeClass('dropdown-open');
                $('.nav-menu .sub-menu').slideUp(300);
            }
        });

        // Handle arrow keys for navigation
        $('.nav-menu a').on('keydown', function(e) {
            const $currentLink = $(this);
            const $currentItem = $currentLink.parent();
            let $targetLink;

            switch(e.key) {
                case 'ArrowRight':
                    // If current item has submenu, open it and focus first item
                    if ($currentItem.hasClass('menu-item-has-children') && window.innerWidth > 768) {
                        e.preventDefault();
                        $currentItem.addClass('dropdown-open');
                        $targetLink = $currentItem.find('.sub-menu > .menu-item > a').first();
                        if ($targetLink.length) {
                            setTimeout(function() {
                                $targetLink.focus();
                            }, 100);
                        }
                    } else {
                        // Move to next sibling
                        $targetLink = $currentItem.next().find('> a');
                        if ($targetLink.length) {
                            e.preventDefault();
                            $targetLink.focus();
                        }
                    }
                    break;

                case 'ArrowLeft':
                    // If in submenu, go back to parent
                    if ($currentItem.closest('.sub-menu').length) {
                        e.preventDefault();
                        $targetLink = $currentItem.closest('.menu-item-has-children').find('> a');
                        $targetLink.focus();
                        $currentItem.closest('.menu-item-has-children').removeClass('dropdown-open');
                    } else {
                        // Move to previous sibling
                        $targetLink = $currentItem.prev().find('> a');
                        if ($targetLink.length) {
                            e.preventDefault();
                            $targetLink.focus();
                        }
                    }
                    break;

                case 'ArrowDown':
                    // Move to next item in submenu or open submenu
                    if ($currentItem.hasClass('menu-item-has-children') && window.innerWidth > 768) {
                        e.preventDefault();
                        $currentItem.addClass('dropdown-open');
                        $targetLink = $currentItem.find('.sub-menu > .menu-item > a').first();
                        if ($targetLink.length) {
                            setTimeout(function() {
                                $targetLink.focus();
                            }, 100);
                        }
                    } else {
                        $targetLink = $currentItem.next().find('> a');
                        if ($targetLink.length) {
                            e.preventDefault();
                            $targetLink.focus();
                        }
                    }
                    break;

                case 'ArrowUp':
                    // Move to previous item in submenu
                    $targetLink = $currentItem.prev().find('> a');
                    if ($targetLink.length) {
                        e.preventDefault();
                        $targetLink.focus();
                    }
                    break;
            }
        });
    }

    function handleClickOutside() {
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.main-navigation').length) {
                $('.nav-menu .menu-item').removeClass('dropdown-open');
                if (window.innerWidth <= 768) {
                    $('.nav-menu .sub-menu').slideUp(300);
                }
            }
        });
    }

    function handleWindowResize() {
        let resizeTimer;
        $(window).on('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                // Re-check dropdown positions
                $('.nav-menu .menu-item-has-children').each(function() {
                    const $menuItem = $(this);
                    const $dropdown = $menuItem.find('.sub-menu').first();
                    
                    if ($dropdown.length && $menuItem.is(':hover')) {
                        checkDropdownPosition($menuItem, $dropdown);
                    }
                });
            }, 250);
        });
    }

    // Utility function to detect if element is in viewport
    function isInViewport($element) {
        const elementTop = $element.offset().top;
        const elementBottom = elementTop + $element.outerHeight();
        const viewportTop = $(window).scrollTop();
        const viewportBottom = viewportTop + $(window).height();
        
        return elementBottom > viewportTop && elementTop < viewportBottom;
    }

    // Auto-initialize when script loads
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initSubmenuFix);
    } else {
        initSubmenuFix();
    }

})(jQuery);
