/**
 * Mobile Menu and Navigation Functionality
 * FINAL COMPREHENSIVE VERSION - All submenu levels working
 */
jQuery(document).ready(function($) {
    console.log('🚀 FINAL Mobile Menu Script Loaded');
    
    // Global variables for better state management
    let mobileMenuInitialized = false;
    
    // Wait for DOM to be fully ready
    setTimeout(function() {
        initializeMobileMenu();
    }, 200);
    
    function initializeMobileMenu() {
        const $menuToggle = $('.menu-toggle');
        const $mobileMenu = $('.mobile-menu-container');
        const $mobileNavItems = $('.nav-menu-mobile');
        
        console.log('🔍 Final initialization check:');
        console.log('  Menu toggle found:', $menuToggle.length);
        console.log('  Mobile menu found:', $mobileMenu.length);
        console.log('  Nav items found:', $mobileNavItems.length);
        
        if ($menuToggle.length === 0 || $mobileMenu.length === 0) {
            console.log('❌ Required mobile menu elements not found - retrying in 500ms...');
            setTimeout(initializeMobileMenu, 500);
            return;
        }
        
        if (mobileMenuInitialized) {
            console.log('✅ Mobile menu already initialized');
            return;
        }
        
        // Mark as initialized
        mobileMenuInitialized = true;
        console.log('🔧 Starting mobile menu initialization...');
        
        // 1. MAIN MENU TOGGLE
        $menuToggle.off('click.mobilemenu').on('click.mobilemenu', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            console.log('🍔 Main menu toggle clicked');
            
            const isActive = $mobileMenu.hasClass('active');
            const $icon = $(this).find('i');
            
            if (isActive) {
                // Close menu
                $mobileMenu.removeClass('active');
                $icon.removeClass('fa-times').addClass('fa-bars');
                $(this).attr('aria-expanded', 'false');
                
                // Reset ALL submenu states
                $('.nav-menu-mobile .sub-menu').removeClass('active').hide();
                $('.nav-menu-mobile .menu-item-has-children').removeClass('active');
                
                console.log('🚪 Main menu CLOSED');
            } else {
                // Open menu
                $mobileMenu.addClass('active');
                $icon.removeClass('fa-bars').addClass('fa-times');
                $(this).attr('aria-expanded', 'true');
                console.log('📱 Main menu OPENED');
            }
        });
        
        // 2. SUBMENU TOGGLE (ALL LEVELS)
        $('.nav-menu-mobile').off('click.submenu').on('click.submenu', '.menu-item-has-children > a', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const $clickedLink = $(this);
            const $parentLi = $clickedLink.parent('.menu-item-has-children');
            const $submenu = $parentLi.children('.sub-menu');
            const linkText = $clickedLink.text().trim();
            const level = $parentLi.parents('.sub-menu').length + 1;
            
            console.log(`🎯 Level ${level} submenu clicked: "${linkText}"`);
            console.log('  Parent LI:', $parentLi[0]);
            console.log('  Submenu found:', $submenu.length > 0);
            
            if ($submenu.length === 0) {
                console.log('❌ No submenu found - this should not happen');
                return;
            }
            
            const isCurrentlyActive = $submenu.hasClass('active');
            console.log(`  Current state: ${isCurrentlyActive ? 'OPEN' : 'CLOSED'}`);
            
            if (isCurrentlyActive) {
                // Close this submenu and ALL its children
                console.log(`🔽 Closing "${linkText}" and all children`);
                $submenu.removeClass('active').slideUp(200);
                $parentLi.removeClass('active');
                
                // Close all nested submenus
                $submenu.find('.sub-menu').removeClass('active').hide();
                $submenu.find('.menu-item-has-children').removeClass('active');
                
            } else {
                // Close sibling menus at the same level
                $parentLi.siblings('.menu-item-has-children').each(function() {
                    const $sibling = $(this);
                    const siblingText = $sibling.children('a').text().trim();
                    console.log(`  🔄 Closing sibling: "${siblingText}"`);
                    
                    $sibling.removeClass('active');
                    $sibling.children('.sub-menu').removeClass('active').slideUp(200);
                    $sibling.find('.sub-menu').removeClass('active').hide();
                    $sibling.find('.menu-item-has-children').removeClass('active');
                });
                
                // Open this submenu
                console.log(`🔼 Opening "${linkText}"`);
                $submenu.addClass('active').slideDown(300);
                $parentLi.addClass('active');
            }
        });
        
        // 3. REGULAR MENU LINKS (no children)
        $('.nav-menu-mobile').off('click.regularlink').on('click.regularlink', 'a:not(.menu-item-has-children > a)', function(e) {
            const $link = $(this);
            const href = $link.attr('href');
            const linkText = $link.text().trim();
            
            console.log(`🔗 Regular link clicked: "${linkText}" (${href})`);
            
            // Close mobile menu for navigation (but not for anchors)
            if (href && !href.startsWith('#')) {
                $mobileMenu.removeClass('active');
                $menuToggle.find('i').removeClass('fa-times').addClass('fa-bars');
                $menuToggle.attr('aria-expanded', 'false');
                console.log('🚪 Menu closed for navigation');
            }
        });
        
        // 4. CLOSE MENU ON OUTSIDE CLICK
        $(document).off('click.mobilemenu').on('click.mobilemenu', function(e) {
            if (!$(e.target).closest('.mobile-menu-container, .menu-toggle').length) {
                if ($mobileMenu.hasClass('active')) {
                    $mobileMenu.removeClass('active');
                    $menuToggle.find('i').removeClass('fa-times').addClass('fa-bars');
                    $menuToggle.attr('aria-expanded', 'false');
                    
                    // Reset all submenus
                    $('.nav-menu-mobile .sub-menu').removeClass('active').hide();
                    $('.nav-menu-mobile .menu-item-has-children').removeClass('active');
                    
                    console.log('🚪 Menu closed by outside click');
                }
            }
        });
        
        // 5. ENHANCED TOUCH SUPPORT
        $('.nav-menu-mobile a').off('touchstart.mobilemenu').on('touchstart.mobilemenu', function() {
            $(this).addClass('touched');
        }).off('touchend.mobilemenu').on('touchend.mobilemenu', function() {
            const self = this;
            setTimeout(function() {
                $(self).removeClass('touched');
            }, 150);
        });
        
        console.log('✅ Mobile menu initialization COMPLETE');
        console.log('📊 Final stats:');
        console.log('  - Total menu items with children:', $('.nav-menu-mobile .menu-item-has-children').length);
        console.log('  - Total submenus:', $('.nav-menu-mobile .sub-menu').length);
        console.log('  - Nested submenus:', $('.nav-menu-mobile .sub-menu .sub-menu').length);
        
        // Test function for debugging
        window.debugMobileMenu = function() {
            console.log('🧪 DEBUG: Mobile Menu State Check');
            console.log('Menu active:', $mobileMenu.hasClass('active'));
            console.log('Active submenus:', $('.nav-menu-mobile .sub-menu.active').length);
            console.log('Active parent items:', $('.nav-menu-mobile .menu-item-has-children.active').length);
            
            $('.nav-menu-mobile .menu-item-has-children').each(function(index) {
                const $item = $(this);
                const text = $item.children('a').text().trim();
                const isActive = $item.hasClass('active');
                const hasSubmenu = $item.children('.sub-menu').length > 0;
                console.log(`  ${index + 1}. "${text}" - Active: ${isActive}, Has submenu: ${hasSubmenu}`);
            });
        };
    }
    
    // SMOOTH SCROLLING FOR ANCHOR LINKS
    $('a[href^="#"]').off('click.smoothscroll').on('click.smoothscroll', function(e) {
        const href = $(this).attr('href');
        if (href !== '#' && href.length > 1) {
            const target = $(href);
            if (target.length) {
                e.preventDefault();
                console.log(`🔄 Smooth scrolling to: ${href}`);
                
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 800);
                
                // Close mobile menu if open
                const $mobileMenu = $('.mobile-menu-container');
                const $menuToggle = $('.menu-toggle');
                if ($mobileMenu.hasClass('active')) {
                    $mobileMenu.removeClass('active');
                    $menuToggle.find('i').removeClass('fa-times').addClass('fa-bars');
                    $menuToggle.attr('aria-expanded', 'false');
                    
                    // Reset submenus
                    $('.nav-menu-mobile .sub-menu').removeClass('active').hide();
                    $('.nav-menu-mobile .menu-item-has-children').removeClass('active');
                    
                    console.log('🚪 Menu closed for anchor navigation');
                }
            }
        }
    });
    
    console.log('🎉 ALL mobile menu functionality loaded and ready!');
    console.log('💡 Use window.debugMobileMenu() in console to check menu state');
});
