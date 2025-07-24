/**
 * Mobile Menu and Navigation Functionality
 * Clean, working implementation with jQuery
 */
jQuery(document).ready(function($) {
    console.log('Menu script loaded');
    
    // Mobile menu toggle functionality
    function initializeMobileMenu() {
        const $menuToggle = $('.menu-toggle');
        const $mobileMenu = $('.mobile-menu-container');
        
        console.log('Menu toggle found:', $menuToggle.length);
        console.log('Mobile menu found:', $mobileMenu.length);
        
        if ($menuToggle.length && $mobileMenu.length) {
            // Main menu toggle
            $menuToggle.off('click').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                console.log('Menu toggle clicked');
                
                const isActive = $mobileMenu.hasClass('active');
                const $icon = $(this).find('i');
                
                if (isActive) {
                    // Close menu
                    $mobileMenu.removeClass('active');
                    $icon.removeClass('fa-times').addClass('fa-bars');
                    $(this).attr('aria-expanded', 'false');
                    console.log('Menu closed');
                } else {
                    // Open menu
                    $mobileMenu.addClass('active');
                    $icon.removeClass('fa-bars').addClass('fa-times');
                    $(this).attr('aria-expanded', 'true');
                    console.log('Menu opened');
                }
            });
            
            // Enhanced submenu handling with touch support
            $('.nav-menu-mobile').off('click').on('click', 'a', function(e) {
                const $link = $(this);
                const $parentLi = $link.parent('li');
                const hasChildren = $parentLi.hasClass('menu-item-has-children');
                const $submenu = $parentLi.children('.sub-menu');
                const isDirectParent = $link.is($parentLi.children('a').first());
                
                console.log('Menu link clicked:', $link.text().trim());
                console.log('Has children:', hasChildren);
                console.log('Is direct parent:', isDirectParent);
                console.log('Has submenu:', $submenu.length > 0);
                
                if (hasChildren && isDirectParent && $submenu.length) {
                    // Always prevent default for parent menu items with children
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const isActive = $submenu.hasClass('active');
                    
                    if (isActive) {
                        // Close current submenu and all nested
                        $submenu.removeClass('active');
                        $parentLi.removeClass('active');
                        $submenu.find('.sub-menu').removeClass('active');
                        $submenu.find('.menu-item-has-children').removeClass('active');
                        console.log('Submenu closed:', $link.text().trim());
                    } else {
                        // Close sibling submenus at same level
                        $parentLi.siblings('.menu-item-has-children').each(function() {
                            $(this).removeClass('active');
                            $(this).children('.sub-menu').removeClass('active');
                            $(this).find('.sub-menu').removeClass('active');
                            $(this).find('.menu-item-has-children').removeClass('active');
                        });
                        
                        // Open current submenu
                        $submenu.addClass('active');
                        $parentLi.addClass('active');
                        console.log('Submenu opened:', $link.text().trim());
                    }
                } else {
                    // Regular menu item or submenu item - allow normal navigation
                    console.log('Regular navigation to:', $link.attr('href'));
                    // Close mobile menu if navigating to a page
                    if (!$link.attr('href').startsWith('#')) {
                        $mobileMenu.removeClass('active');
                        $menuToggle.find('i').removeClass('fa-times').addClass('fa-bars');
                        $menuToggle.attr('aria-expanded', 'false');
                    }
                }
            });
            
            // Close menu when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.mobile-menu-container, .menu-toggle').length) {
                    if ($mobileMenu.hasClass('active')) {
                        $mobileMenu.removeClass('active');
                        $menuToggle.find('i').removeClass('fa-times').addClass('fa-bars');
                        $menuToggle.attr('aria-expanded', 'false');
                        console.log('Menu closed by outside click');
                    }
                }
            });
            
            console.log('Mobile menu initialization complete');
        } else {
            console.log('Mobile menu elements not found');
        }
    }
    
    // Initialize menu immediately and after short delay for dynamic content
    initializeMobileMenu();
    setTimeout(initializeMobileMenu, 100);
    
    // Smooth scrolling for anchor links
    $('a[href^="#"]').on('click', function(e) {
        const href = $(this).attr('href');
        if (href !== '#' && href.length > 1) {
            const target = $(href);
            if (target.length) {
                e.preventDefault();
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
                }
            }
        }
    });
    
    // Desktop menu hover effects (if applicable)
    $('.main-navigation .menu-item-has-children').hover(
        function() {
            $(this).addClass('hover');
        },
        function() {
            $(this).removeClass('hover');
        }
    );
    
    // Add visual feedback for menu interactions
    $('.nav-menu-mobile a').on('touchstart click', function() {
        $(this).addClass('touched');
        setTimeout(function() {
            $('.nav-menu-mobile a').removeClass('touched');
        }, 200);
    });
    
    console.log('All menu functionality initialized');
    
    // Contact form animations (if form exists)
    if ($('#quoteForm').length) {
        $('#quoteForm input, #quoteForm select, #quoteForm textarea').on('focus', function() {
            $(this).parent().addClass('input-focused');
        }).on('blur', function() {
            if ($(this).val() === '') {
                $(this).parent().removeClass('input-focused');
            }
        });
    }
    
    // Services page filter functionality (if filter buttons exist)
    if ($('.filter-btn').length) {
        $('.filter-btn').on('click', function() {
            var category = $(this).data('category');
            
            // Update active button
            $('.filter-btn').removeClass('active');
            $(this).addClass('active');
            
            // Filter service cards
            if (category === 'all') {
                $('.service-card').removeClass('filtered-out');
            } else {
                $('.service-card').each(function() {
                    var cardCategory = $(this).data('category');
                    if (cardCategory === category) {
                        $(this).removeClass('filtered-out');
                    } else {
                        $(this).addClass('filtered-out');
                    }
                });
            }
        });
    }
});
