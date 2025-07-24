/* ========================================
   CLEAN HEADER MENU JAVASCRIPT
   Simple, reliable dropdown functionality
   ======================================== */

(function($) {
    'use strict';
    
    console.log('Clean Header Menu: Script loading...');
    
    // Initialize when DOM is ready
    $(document).ready(function() {
        console.log('Clean Header Menu: DOM ready, initializing...');
        initCleanHeaderMenu();
    });
    
    function initCleanHeaderMenu() {
        console.log('Clean Header Menu: Starting initialization...');
        
        // Find menu elements
        const $header = $('.site-header');
        const $nav = $('.main-navigation');
        const $menu = $('.nav-menu');
        const $menuToggle = $('.menu-toggle');
        const $dropdownItems = $('.menu-item-has-children');
        
        console.log('Clean Header Menu: Found elements:', {
            header: $header.length,
            nav: $nav.length,
            menu: $menu.length,
            toggle: $menuToggle.length,
            dropdowns: $dropdownItems.length
        });
        
        // Add menu toggle if it doesn't exist
        if ($menuToggle.length === 0) {
            console.log('Clean Header Menu: Creating menu toggle...');
            createMenuToggle();
        }
        
        // Initialize desktop dropdown functionality
        initDesktopDropdowns();
        
        // Initialize mobile menu functionality
        initMobileMenu();
        
        console.log('Clean Header Menu: Initialization complete!');
    }
    
    function createMenuToggle() {
        const toggleHTML = `
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <div class="menu-toggle-icon">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </div>
                <span class="menu-toggle-text">MENU</span>
            </button>
        `;
        
        $('.main-navigation').prepend(toggleHTML);
        console.log('Clean Header Menu: Menu toggle created');
    }
    
    function initDesktopDropdowns() {
        console.log('Clean Header Menu: Initializing desktop dropdowns...');
        
        const $dropdownItems = $('.nav-menu .menu-item-has-children');
        
        $dropdownItems.each(function() {
            const $item = $(this);
            const $submenu = $item.children('.sub-menu');
            
            if ($submenu.length > 0) {
                console.log('Clean Header Menu: Setting up dropdown for:', $item.find('> a').text());
                
                // Mouse enter - show dropdown
                $item.on('mouseenter', function() {
                    console.log('Clean Header Menu: Mouse enter on:', $item.find('> a').text());
                    showDropdown($submenu);
                    
                    // Hide sibling dropdowns
                    $item.siblings('.menu-item-has-children').each(function() {
                        hideDropdown($(this).children('.sub-menu'));
                    });
                });
                
                // Mouse leave - hide dropdown (with delay for better UX)
                $item.on('mouseleave', function() {
                    console.log('Clean Header Menu: Mouse leave on:', $item.find('> a').text());
                    setTimeout(function() {
                        if (!$item.is(':hover')) {
                            hideDropdown($submenu);
                            // Also hide any open sub-sub-menus
                            $submenu.find('.sub-menu').each(function() {
                                hideDropdown($(this));
                            });
                        }
                    }, 150);
                });
                
                // Handle multi-level dropdowns
                $submenu.find('.menu-item-has-children').each(function() {
                    const $subItem = $(this);
                    const $subSubmenu = $subItem.children('.sub-menu');
                    
                    if ($subSubmenu.length > 0) {
                        $subItem.on('mouseenter', function() {
                            showDropdown($subSubmenu);
                            // Hide sibling sub-dropdowns
                            $subItem.siblings('.menu-item-has-children').each(function() {
                                hideDropdown($(this).children('.sub-menu'));
                            });
                        });
                        
                        $subItem.on('mouseleave', function() {
                            setTimeout(function() {
                                if (!$subItem.is(':hover')) {
                                    hideDropdown($subSubmenu);
                                }
                            }, 150);
                        });
                    }
                });
                
                // Keyboard navigation
                $item.find('> a').on('focus', function() {
                    showDropdown($submenu);
                });
                
                $item.on('keydown', function(e) {
                    if (e.key === 'Escape') {
                        hideDropdown($submenu);
                        $submenu.find('.sub-menu').each(function() {
                            hideDropdown($(this));
                        });
                        $item.find('> a').focus();
                    }
                });
            }
        });
        
        // Close dropdowns when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.nav-menu').length) {
                $('.sub-menu').each(function() {
                    hideDropdown($(this));
                });
            }
        });
    }
    
    function showDropdown($submenu) {
        console.log('Clean Header Menu: Showing dropdown');
        $submenu.css({
            'opacity': '1',
            'visibility': 'visible',
            'transform': 'translateY(0)',
            'display': 'block'
        });
    }
    
    function hideDropdown($submenu) {
        console.log('Clean Header Menu: Hiding dropdown');
        $submenu.css({
            'opacity': '0',
            'visibility': 'hidden',
            'transform': 'translateY(-10px)'
        });
        
        // Hide completely after transition
        setTimeout(function() {
            if ($submenu.css('opacity') === '0') {
                $submenu.css('display', 'none');
            }
        }, 300);
    }
    
    function initMobileMenu() {
        console.log('Clean Header Menu: Initializing mobile menu...');
        
        const $menuToggle = $('.menu-toggle');
        const $menu = $('.nav-menu');
        const $dropdownItems = $('.nav-menu .menu-item-has-children');
        
        // Mobile menu toggle
        $menuToggle.on('click', function() {
            const isOpen = $menu.hasClass('mobile-open');
            
            if (isOpen) {
                console.log('Clean Header Menu: Closing mobile menu');
                $menu.removeClass('mobile-open');
                $menuToggle.attr('aria-expanded', 'false');
                
                // Close all dropdowns
                $dropdownItems.removeClass('dropdown-open');
            } else {
                console.log('Clean Header Menu: Opening mobile menu');
                $menu.addClass('mobile-open');
                $menuToggle.attr('aria-expanded', 'true');
            }
        });
        
        // Mobile dropdown toggles
        $dropdownItems.each(function() {
            const $item = $(this);
            const $link = $item.find('> a');
            const $submenu = $item.find('> .sub-menu');
            
            if ($submenu.length > 0) {
                console.log('Clean Header Menu: Setting up mobile dropdown for:', $link.text());
                
                $link.on('click', function(e) {
                    if ($(window).width() <= 768) {
                        e.preventDefault();
                        
                        const isOpen = $item.hasClass('dropdown-open');
                        
                        // Close all other dropdowns at the same level
                        $item.siblings('.menu-item-has-children').removeClass('dropdown-open');
                        $item.siblings().find('.menu-item-has-children').removeClass('dropdown-open');
                        
                        // Toggle this dropdown
                        if (isOpen) {
                            console.log('Clean Header Menu: Closing mobile dropdown');
                            $item.removeClass('dropdown-open');
                            // Close all child dropdowns
                            $item.find('.menu-item-has-children').removeClass('dropdown-open');
                        } else {
                            console.log('Clean Header Menu: Opening mobile dropdown');
                            $item.addClass('dropdown-open');
                        }
                    }
                });
                
                // Handle multi-level mobile dropdowns
                $submenu.find('.menu-item-has-children').each(function() {
                    const $subItem = $(this);
                    const $subLink = $subItem.find('> a');
                    const $subSubmenu = $subItem.find('> .sub-menu');
                    
                    if ($subSubmenu.length > 0) {
                        $subLink.on('click', function(e) {
                            if ($(window).width() <= 768) {
                                e.preventDefault();
                                
                                const isSubOpen = $subItem.hasClass('dropdown-open');
                                
                                // Close sibling sub-dropdowns
                                $subItem.siblings('.menu-item-has-children').removeClass('dropdown-open');
                                
                                // Toggle this sub-dropdown
                                if (isSubOpen) {
                                    $subItem.removeClass('dropdown-open');
                                    $subItem.find('.menu-item-has-children').removeClass('dropdown-open');
                                } else {
                                    $subItem.addClass('dropdown-open');
                                }
                            }
                        });
                    }
                });
            }
        });
        
        // Close mobile menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.main-navigation').length) {
                $menu.removeClass('mobile-open');
                $menuToggle.attr('aria-expanded', 'false');
                $dropdownItems.removeClass('dropdown-open');
            }
        });
        
        // Close mobile menu on window resize
        $(window).on('resize', function() {
            if ($(window).width() > 768) {
                $menu.removeClass('mobile-open');
                $menuToggle.attr('aria-expanded', 'false');
                $dropdownItems.removeClass('dropdown-open');
            }
        });
    }
    
    // Force show dropdown for testing (temporary)
    function testDropdown() {
        console.log('Clean Header Menu: Testing dropdown visibility...');
        const $serviceMenu = $('.nav-menu .menu-item:contains("SERVICE")').first();
        const $submenu = $serviceMenu.find('.sub-menu');
        
        if ($submenu.length > 0) {
            console.log('Clean Header Menu: Found SERVICE menu, showing dropdown for 3 seconds...');
            showDropdown($submenu);
            
            setTimeout(function() {
                console.log('Clean Header Menu: Hiding test dropdown');
                hideDropdown($submenu);
            }, 3000);
        } else {
            console.log('Clean Header Menu: No SERVICE menu found');
        }
    }
    
    // Run test after 2 seconds
    setTimeout(testDropdown, 2000);
    
})(jQuery);
