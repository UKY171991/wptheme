/**
 * Global Header System JavaScript
 * Consistent header behavior across all pages
 */

(function($) {
    'use strict';

    // Initialize header functionality when DOM is ready
    $(document).ready(function() {
        initGlobalHeader();
    });

    /**
     * Initialize all global header functionality
     */
    function initGlobalHeader() {
        console.log('🚀 Global Header System: Starting initialization');
        
        // Debug menu structure
        const menuItems = $('.site-header .nav-menu .menu-item');
        const dropdownItems = $('.site-header .nav-menu .menu-item-has-children');
        const subMenus = $('.site-header .nav-menu .sub-menu');
        
        console.log('📊 Menu Debug Info:');
        console.log('- Total menu items:', menuItems.length);
        console.log('- Dropdown items:', dropdownItems.length);
        console.log('- Sub menus found:', subMenus.length);
        
        dropdownItems.each(function(index) {
            const item = $(this);
            const link = item.find('> a');
            const submenu = item.find('> .sub-menu');
            console.log(`  ${index + 1}. "${link.text().trim()}" - Has submenu: ${submenu.length > 0}`);
        });
        
        initMobileMenu();
        initScrollBehavior();
        initDropdownMenus();
        initAccessibility();
        console.log('✅ Global Header System: Initialized successfully');
    }

    /**
     * Mobile menu functionality
     */
    function initMobileMenu() {
        const menuToggle = $('.site-header .menu-toggle');
        const navMenu = $('.site-header .nav-menu');
        const body = $('body');

        // Toggle mobile menu
        menuToggle.on('click', function(e) {
            e.preventDefault();
            
            const isOpen = navMenu.hasClass('mobile-open');
            
            if (isOpen) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        });

        // Close mobile menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.site-header').length && navMenu.hasClass('mobile-open')) {
                closeMobileMenu();
            }
        });

        // Close mobile menu on window resize if desktop
        $(window).on('resize', function() {
            if ($(window).width() > 768 && navMenu.hasClass('mobile-open')) {
                closeMobileMenu();
            }
        });

        // Handle dropdown toggles in mobile
        $('.site-header .nav-menu .menu-item-has-children > a').on('click', function(e) {
            if ($(window).width() <= 768) {
                e.preventDefault();
                const parentItem = $(this).parent();
                const isOpen = parentItem.hasClass('dropdown-open');
                
                // Close all other dropdowns
                $('.site-header .nav-menu .menu-item').removeClass('dropdown-open');
                
                // Toggle current dropdown
                if (!isOpen) {
                    parentItem.addClass('dropdown-open');
                }
            }
        });

        function openMobileMenu() {
            navMenu.addClass('mobile-open');
            menuToggle.attr('aria-expanded', 'true');
            body.css('overflow', 'hidden');
            
            // Animate hamburger lines
            const lines = menuToggle.find('.hamburger-line');
            lines.eq(0).css('transform', 'rotate(45deg) translate(6px, 6px)');
            lines.eq(1).css('opacity', '0');
            lines.eq(2).css('transform', 'rotate(-45deg) translate(6px, -6px)');
        }

        function closeMobileMenu() {
            navMenu.removeClass('mobile-open');
            menuToggle.attr('aria-expanded', 'false');
            body.css('overflow', '');
            
            // Reset hamburger lines
            const lines = menuToggle.find('.hamburger-line');
            lines.css({
                'transform': '',
                'opacity': ''
            });
            
            // Close all dropdowns
            $('.site-header .nav-menu .menu-item').removeClass('dropdown-open');
        }
    }

    /**
     * Header scroll behavior
     */
    function initScrollBehavior() {
        const header = $('.site-header');
        let lastScrollTop = 0;
        let ticking = false;

        $(window).on('scroll', function() {
            if (!ticking) {
                requestAnimationFrame(updateHeader);
                ticking = true;
            }
        });

        function updateHeader() {
            const scrollTop = $(window).scrollTop();
            
            // Add scrolled class for styling
            if (scrollTop > 50) {
                header.addClass('scrolled');
            } else {
                header.removeClass('scrolled');
            }

            lastScrollTop = scrollTop;
            ticking = false;
        }
    }

    /**
     * Desktop dropdown menu functionality
     */
    function initDropdownMenus() {
        const menuItems = $('.site-header .nav-menu .menu-item-has-children');
        
        console.log('🔽 Dropdown Menu Setup:');
        console.log('Found dropdown menu items:', menuItems.length);
        
        // Force show all dropdowns for 3 seconds to test visibility
        setTimeout(function() {
            console.log('🧪 Testing dropdown visibility...');
            $('.site-header .nav-menu .sub-menu').css({
                'opacity': '1',
                'visibility': 'visible',
                'transform': 'translateY(0)',
                'display': 'block'
            });
            
            setTimeout(function() {
                $('.site-header .nav-menu .sub-menu').css({
                    'opacity': '0',
                    'visibility': 'hidden',
                    'transform': 'translateY(-10px)'
                });
            }, 3000);
        }, 2000);
        
        menuItems.each(function() {
            const item = $(this);
            const dropdown = item.children('.sub-menu');
            let hoverTimeout;

            console.log('Setting up dropdown for:', item.find('> a').text());

            // Show dropdown on hover
            item.on('mouseenter', function() {
                if ($(window).width() > 768) {
                    clearTimeout(hoverTimeout);
                    console.log('🖱️ Showing dropdown for:', item.find('> a').text());
                    
                    // Hide all other dropdowns first
                    $('.site-header .nav-menu .sub-menu').css({
                        'opacity': '0',
                        'visibility': 'hidden',
                        'transform': 'translateY(-10px)'
                    });
                    
                    // Ensure proper positioning
                    positionDropdown(item, dropdown);
                    
                    // Show current dropdown
                    dropdown.css({
                        'opacity': '1',
                        'visibility': 'visible',
                        'transform': 'translateY(0)',
                        'display': 'block'
                    });
                }
            });

            // Hide dropdown on mouse leave with delay
            item.on('mouseleave', function() {
                if ($(window).width() > 768) {
                    console.log('🖱️ Hiding dropdown for:', item.find('> a').text());
                    hoverTimeout = setTimeout(function() {
                        dropdown.css({
                            'opacity': '0',
                            'visibility': 'hidden',
                            'transform': 'translateY(-10px)'
                        });
                    }, 200);
                }
            });

            // Also handle clicks for mobile compatibility
            item.find('> a').on('click', function(e) {
                if ($(window).width() <= 768) {
                    e.preventDefault();
                    const isOpen = item.hasClass('dropdown-open');
                    
                    // Close all other dropdowns
                    $('.site-header .nav-menu .menu-item').removeClass('dropdown-open');
                    
                    // Toggle current dropdown
                    if (!isOpen) {
                        item.addClass('dropdown-open');
                    }
                }
            });
        });

        function positionDropdown(item, dropdown) {
            const itemOffset = item.offset();
            const dropdownWidth = dropdown.outerWidth();
            const windowWidth = $(window).width();
            const spaceRight = windowWidth - (itemOffset.left + dropdownWidth);
            
            // Reset position
            dropdown.css({
                'left': '0',
                'right': 'auto'
            });
            
            // Adjust if dropdown would go off-screen
            if (spaceRight < 0) {
                dropdown.css({
                    'left': 'auto',
                    'right': '0'
                });
            }
        }
    }

    /**
     * Accessibility improvements
     */
    function initAccessibility() {
        // Keyboard navigation for dropdowns
        $('.site-header .nav-menu a').on('focus', function() {
            const parentItem = $(this).closest('.menu-item-has-children');
            if (parentItem.length && $(window).width() > 768) {
                parentItem.children('.sub-menu').css({
                    'opacity': '1',
                    'visibility': 'visible',
                    'transform': 'translateY(0)'
                });
            }
        });

        $('.site-header .nav-menu a').on('blur', function() {
            const parentItem = $(this).closest('.menu-item-has-children');
            setTimeout(function() {
                if (!parentItem.find(':focus').length && $(window).width() > 768) {
                    parentItem.children('.sub-menu').css({
                        'opacity': '0',
                        'visibility': 'hidden',
                        'transform': 'translateY(-10px)'
                    });
                }
            }, 100);
        });

        // Escape key to close mobile menu
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && $('.site-header .nav-menu').hasClass('mobile-open')) {
                $('.site-header .menu-toggle').click();
            }
        });

        // ARIA attributes for menu items
        $('.site-header .nav-menu .menu-item-has-children > a').attr('aria-haspopup', 'true');
        $('.site-header .nav-menu .menu-item-has-children > a').attr('aria-expanded', 'false');
    }

    /**
     * Utility function to detect mobile devices
     */
    function isMobile() {
        return $(window).width() <= 768;
    }

    /**
     * Utility function to handle resize events efficiently
     */
    let resizeTimeout;
    $(window).on('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function() {
            // Re-initialize certain features on resize
            if (!isMobile()) {
                $('.site-header .nav-menu').removeClass('mobile-open');
                $('.site-header .menu-toggle').attr('aria-expanded', 'false');
                $('body').css('overflow', '');
            }
        }, 250);
    });

})(jQuery);
