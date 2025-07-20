/**
 * Bootstrap Multilevel Dropdown
 * Adds support for multilevel dropdown menus in Bootstrap 5
 */

(function($) {
    'use strict';
    
    // Add Bootstrap 5 specific dropdown initialization
    const dropdownElementList = document.querySelectorAll('.dropdown-toggle');
    const dropdownList = [...dropdownElementList].map(dropdownToggleEl => {
        return new bootstrap.Dropdown(dropdownToggleEl);
    });
    
    // Add multilevel dropdown functionality
    $(document).ready(function() {
        // Add dropdown-toggle class and attributes to submenu items
        $('.dropdown-menu .menu-item-has-children > a').addClass('dropdown-item dropdown-toggle');
        
        // Add dropdown-submenu class to submenu items with children
        $('.dropdown-menu .menu-item-has-children').addClass('dropdown-submenu');
        
        // Handle click on dropdown-toggle links
        $('.dropdown-submenu > a.dropdown-toggle').on('click', function(e) {
            if (!$(this).next().hasClass('show')) {
                // Close all open submenus
                $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
            }
            
            // Toggle current submenu
            const $subMenu = $(this).next('.dropdown-menu');
            $subMenu.toggleClass('show');
            
            // Check if submenu is off-screen
            setTimeout(function() {
                const $subMenu = $('.dropdown-submenu > .dropdown-menu.show');
                const windowWidth = $(window).width();
                const subMenuOffset = $subMenu.offset();
                const subMenuWidth = $subMenu.width();
                const isOffScreen = subMenuOffset && (subMenuOffset.left + subMenuWidth > windowWidth);
                
                if (isOffScreen) {
                    $subMenu.addClass('dropdown-menu-end');
                }
            }, 50);
            
            // Don't follow the link
            e.stopPropagation();
            e.preventDefault();
        });
        
        // Close submenus when clicking outside
        $(document).on('click', function(e) {
            $('.dropdown-submenu .show').removeClass('show');
        });
        
        // Handle search toggle
        $('.search-toggle').on('click', function() {
            $('#search-container').slideToggle(200);
            $(this).attr('aria-expanded', $('#search-container').is(':visible'));
        });
        
        $('.search-close').on('click', function() {
            $('#search-container').slideUp(200);
            $('.search-toggle').attr('aria-expanded', 'false');
        });
        
        // Close search on escape key
        $(document).on('keyup', function(e) {
            if (e.key === 'Escape' && $('#search-container').is(':visible')) {
                $('#search-container').slideUp(200);
                $('.search-toggle').attr('aria-expanded', 'false');
            }
        });
    });
})(jQuery);