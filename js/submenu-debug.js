/**
 * Submenu Debug and Testing Script
 * Helps identify and fix multi-level dropdown issues
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        
        // Add debug information to console
        console.log('🔧 Submenu Debug Script Loaded');
        
        // Check for nested menu structure
        const nestedMenus = $('.nav-menu .sub-menu .sub-menu');
        console.log('📊 Found ' + nestedMenus.length + ' nested submenus');
        
        // Add visual indicators for debugging
        if (window.location.search.includes('debug=submenu')) {
            addDebugClasses();
        }
        
        // Force submenu visibility on click for testing
        $('.nav-menu .menu-item-has-children > a').on('click', function(e) {
            if (e.ctrlKey || e.metaKey) { // Ctrl/Cmd + Click
                e.preventDefault();
                const $menuItem = $(this).parent();
                $menuItem.toggleClass('force-show-submenu');
                console.log('🎯 Toggled submenu for:', $(this).text());
            }
        });
        
        // Enhanced hover handling for nested menus
        $('.nav-menu .menu-item-has-children').each(function() {
            const $menuItem = $(this);
            const level = getMenuLevel($menuItem);
            
            $menuItem.on('mouseenter', function() {
                console.log('🖱️ Hover on level ' + level + ':', $menuItem.find('> a').text());
                forceShowSubmenu($menuItem);
            });
            
            $menuItem.on('mouseleave', function() {
                setTimeout(function() {
                    if (!$menuItem.is(':hover')) {
                        hideSubmenu($menuItem);
                    }
                }, 100);
            });
        });
        
        // Report menu structure
        reportMenuStructure();
    });

    function addDebugClasses() {
        $('body').addClass('debug-submenus');
        $('.nav-menu .sub-menu').each(function(index) {
            $(this).addClass('debug-submenu-' + index);
            $(this).prepend('<div class="debug-label">Submenu ' + index + '</div>');
        });
        
        $('.nav-menu .sub-menu .sub-menu').each(function(index) {
            $(this).addClass('debug-nested-' + index);
        });
    }

    function getMenuLevel($menuItem) {
        let level = 1;
        let $parent = $menuItem.parent();
        
        while ($parent.hasClass('sub-menu')) {
            level++;
            $parent = $parent.parent().parent();
        }
        
        return level;
    }

    function forceShowSubmenu($menuItem) {
        const $submenu = $menuItem.find('> .sub-menu');
        if ($submenu.length) {
            $submenu.css({
                'opacity': '1',
                'visibility': 'visible',
                'transform': 'translateX(0) translateY(0)',
                'display': 'block'
            });
        }
    }

    function hideSubmenu($menuItem) {
        const $submenu = $menuItem.find('> .sub-menu');
        if ($submenu.length) {
            $submenu.css({
                'opacity': '0',
                'visibility': 'hidden'
            });
        }
    }

    function reportMenuStructure() {
        console.log('📋 Menu Structure Report:');
        
        $('.nav-menu > .menu-item').each(function(index) {
            const text = $(this).find('> a').text().trim();
            const hasSubmenu = $(this).hasClass('menu-item-has-children');
            
            console.log(`${index + 1}. ${text} ${hasSubmenu ? '(has submenu)' : ''}`);
            
            if (hasSubmenu) {
                $(this).find('> .sub-menu > .menu-item').each(function(subIndex) {
                    const subText = $(this).find('> a').text().trim();
                    const hasNestedSubmenu = $(this).hasClass('menu-item-has-children');
                    
                    console.log(`   ${subIndex + 1}. ${subText} ${hasNestedSubmenu ? '(has nested submenu)' : ''}`);
                    
                    if (hasNestedSubmenu) {
                        $(this).find('> .sub-menu > .menu-item').each(function(nestedIndex) {
                            const nestedText = $(this).find('> a').text().trim();
                            console.log(`      ${nestedIndex + 1}. ${nestedText}`);
                        });
                    }
                });
            }
        });
    }

    // Add CSS for forced submenu visibility
    $('<style>')
        .prop('type', 'text/css')
        .html(`
            .force-show-submenu > .sub-menu {
                opacity: 1 !important;
                visibility: visible !important;
                transform: translateX(0) translateY(0) !important;
                display: block !important;
            }
            
            .debug-label {
                background: red;
                color: white;
                padding: 2px 5px;
                font-size: 10px;
                position: absolute;
                top: -20px;
                left: 0;
                z-index: 999999999;
            }
            
            body.debug-submenus .sub-menu {
                border: 2px solid red !important;
            }
            
            body.debug-submenus .sub-menu .sub-menu {
                border: 2px solid blue !important;
            }
            
            body.debug-submenus .sub-menu .sub-menu .sub-menu {
                border: 2px solid green !important;
            }
        `)
        .appendTo('head');

})(jQuery);

// Add URL parameter helper
console.log('🔍 Debug Submenu Tips:');
console.log('1. Add ?debug=submenu to URL for visual debugging');
console.log('2. Ctrl/Cmd + Click on menu items to force toggle submenus');
console.log('3. Check console for menu structure report');
