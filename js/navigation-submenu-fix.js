/*
Navigation Submenu Enhancement Script
Improves multi-level navigation behavior and clickability
*/

jQuery(document).ready(function($) {
    
    // Enhanced submenu handling
    function initSubmenuEnhancements() {
        
        // Add delay to submenu hiding to prevent accidental closing
        var submenuTimeout;
        
        $('.nav-menu .menu-item-has-children').each(function() {
            var $menuItem = $(this);
            var $submenu = $menuItem.children('.sub-menu');
            
            // Mouse enter - show submenu
            $menuItem.on('mouseenter', function() {
                clearTimeout(submenuTimeout);
                $submenu.addClass('show-submenu');
            });
            
            // Mouse leave - hide submenu with delay
            $menuItem.on('mouseleave', function() {
                submenuTimeout = setTimeout(function() {
                    $submenu.removeClass('show-submenu');
                }, 150);
            });
            
            // Keep submenu open when hovering over it
            $submenu.on('mouseenter', function() {
                clearTimeout(submenuTimeout);
                $(this).addClass('show-submenu');
            });
            
            $submenu.on('mouseleave', function() {
                submenuTimeout = setTimeout(function() {
                    $submenu.removeClass('show-submenu');
                }, 150);
            });
        });
        
        // Handle nested submenus (third level)
        $('.nav-menu .sub-menu .menu-item-has-children').each(function() {
            var $nestedItem = $(this);
            var $nestedSubmenu = $nestedItem.children('.sub-menu');
            
            $nestedItem.on('mouseenter', function() {
                clearTimeout(submenuTimeout);
                $nestedSubmenu.addClass('show-nested-submenu');
            });
            
            $nestedItem.on('mouseleave', function() {
                submenuTimeout = setTimeout(function() {
                    $nestedSubmenu.removeClass('show-nested-submenu');
                }, 150);
            });
            
            $nestedSubmenu.on('mouseenter', function() {
                clearTimeout(submenuTimeout);
                $(this).addClass('show-nested-submenu');
            });
            
            $nestedSubmenu.on('mouseleave', function() {
                submenuTimeout = setTimeout(function() {
                    $nestedSubmenu.removeClass('show-nested-submenu');
                }, 150);
            });
        });
    }
    
    // Improve keyboard navigation
    function initKeyboardNavigation() {
        $('.nav-menu a').on('focus', function() {
            var $this = $(this);
            var $parentMenu = $this.closest('.menu-item-has-children');
            
            if ($parentMenu.length) {
                $parentMenu.addClass('keyboard-focus');
                $parentMenu.children('.sub-menu').addClass('show-submenu');
            }
        });
        
        $('.nav-menu a').on('blur', function() {
            var $this = $(this);
            var $parentMenu = $this.closest('.menu-item-has-children');
            
            setTimeout(function() {
                if (!$parentMenu.find(':focus').length) {
                    $parentMenu.removeClass('keyboard-focus');
                    $parentMenu.children('.sub-menu').removeClass('show-submenu');
                }
            }, 100);
        });
    }
    
    // Handle touch devices
    function initTouchHandling() {
        if ('ontouchstart' in window || navigator.maxTouchPoints > 0) {
            $('.nav-menu .menu-item-has-children > a').on('click', function(e) {
                var $menuItem = $(this).parent();
                var $submenu = $menuItem.children('.sub-menu');
                
                if (!$submenu.hasClass('touch-opened')) {
                    e.preventDefault();
                    
                    // Close other open submenus
                    $('.nav-menu .sub-menu').removeClass('touch-opened');
                    
                    // Open this submenu
                    $submenu.addClass('touch-opened');
                } else {
                    // Submenu is already open, allow link to work
                    return true;
                }
            });
            
            // Close submenus when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.nav-menu').length) {
                    $('.nav-menu .sub-menu').removeClass('touch-opened');
                }
            });
        }
    }
    
    // Add CSS classes for JavaScript-enhanced behavior
    function addEnhancementClasses() {
        $('body').addClass('js-navigation-enhanced');
        $('.nav-menu').addClass('enhanced-navigation');
    }
    
    // Initialize all enhancements
    function initNavigationEnhancements() {
        addEnhancementClasses();
        initSubmenuEnhancements();
        initKeyboardNavigation();
        initTouchHandling();
        
        console.log('Navigation enhancements initialized');
    }
    
    // Run initialization
    initNavigationEnhancements();
    
    // Re-initialize if navigation is dynamically loaded
    $(document).on('navigation-loaded', function() {
        initNavigationEnhancements();
    });
    
});
