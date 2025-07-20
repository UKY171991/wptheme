/**
 * Bootstrap Menu - Final Implementation
 * Comprehensive solution for multilevel dropdown menus in Bootstrap 5
 */

jQuery(document).ready(function($) {
    'use strict';
    
    // Initialize the menu system
    initBootstrapMenu();
    
    /**
     * Initialize the Bootstrap menu system
     */
    function initBootstrapMenu() {
        // Add necessary classes to menu elements
        setupMenuClasses();
        
        // Setup multilevel dropdown functionality
        setupMultilevelDropdowns();
        
        // Setup search functionality
        setupSearch();
        
        // Handle window resize events
        handleResize();
    }
    
    /**
     * Setup menu classes and attributes
     */
    function setupMenuClasses() {
        // Add dropdown-submenu class to nested dropdown items
        $('.dropdown-menu .menu-item-has-children').addClass('dropdown-submenu');
        
        // Add dropdown-toggle class to nested dropdown links
        $('.dropdown-submenu > a').addClass('dropdown-item dropdown-toggle');
        
        // Add dropdown-item class to all submenu links
        $('.dropdown-menu .menu-item > a').addClass('dropdown-item');
    }
    
    /**
     * Setup multilevel dropdown functionality
     */
    function setupMultilevelDropdowns() {
        // Initialize Bootstrap dropdowns
        var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
        dropdownElementList.map(function(dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl);
        });
        
        // Handle hover for desktop
        if (window.innerWidth >= 992) {
            // Show dropdown on hover
            $('.dropdown').hover(
                function() {
                    $(this).find('.dropdown-menu').first().addClass('show');
                    $(this).find('> .dropdown-toggle').attr('aria-expanded', 'true');
                },
                function() {
                    $(this).find('.dropdown-menu').first().removeClass('show');
                    $(this).find('> .dropdown-toggle').attr('aria-expanded', 'false');
                }
            );
            
            // Show submenu on hover
            $('.dropdown-submenu').hover(
                function() {
                    $(this).find('.dropdown-menu').first().addClass('show');
                    
                    // Check if submenu goes off-screen
                    checkSubmenuPosition($(this).find('.dropdown-menu').first());
                },
                function() {
                    $(this).find('.dropdown-menu').first().removeClass('show');
                }
            );
        }
        
        // Handle click for mobile and desktop
        $('.dropdown-submenu > a.dropdown-toggle').on('click', function(e) {
            // Prevent default link behavior
            e.preventDefault();
            e.stopPropagation();
            
            // Toggle submenu
            var $submenu = $(this).next('.dropdown-menu');
            $submenu.toggleClass('show');
            
            // Check if submenu goes off-screen
            checkSubmenuPosition($submenu);
            
            // Close other submenus at the same level
            $(this).parents('.dropdown-menu').first().find('.show').not($submenu).removeClass('show');
            
            return false;
        });
        
        // Close all dropdowns when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.dropdown-menu').length && !$(e.target).closest('.dropdown-toggle').length) {
                $('.dropdown-menu.show').removeClass('show');
                $('.dropdown-toggle[aria-expanded="true"]').attr('aria-expanded', 'false');
            }
        });
    }
    
    /**
     * Check if submenu goes off-screen and adjust position
     */
    function checkSubmenuPosition($submenu) {
        // Reset position
        $submenu.removeClass('dropdown-menu-end');
        
        // Check if submenu goes off-screen
        if (window.innerWidth >= 992) {
            var submenuOffset = $submenu.offset();
            if (submenuOffset) {
                var submenuWidth = $submenu.outerWidth();
                var submenuRight = submenuOffset.left + submenuWidth;
                
                if (submenuRight > window.innerWidth - 20) {
                    $submenu.addClass('dropdown-menu-end');
                }
            }
        }
    }
    
    /**
     * Setup search functionality
     */
    function setupSearch() {
        // Toggle search container
        $('.search-toggle').on('click', function(e) {
            e.preventDefault();
            
            $('#search-container').slideToggle(200);
            
            var isExpanded = $(this).attr('aria-expanded') === 'true';
            $(this).attr('aria-expanded', !isExpanded);
            
            if (!isExpanded) {
                $('#search-container').find('.search-field').focus();
            }
        });
        
        // Close search on button click
        $('.search-close').on('click', function() {
            $('#search-container').slideUp(200);
            $('.search-toggle').attr('aria-expanded', 'false');
        });
        
        // Close search on escape key
        $(document).on('keyup', function(e) {
            if (e.key === 'Escape' && $('#search-container').is(':visible')) {
                $('#search-container').slideUp(200);
                $('.search-toggle').attr('aria-expanded', 'false').focus();
            }
        });
    }
    
    /**
     * Handle window resize events
     */
    function handleResize() {
        var resizeTimer;
        
        $(window).on('resize', function() {
            clearTimeout(resizeTimer);
            
            resizeTimer = setTimeout(function() {
                // Reset dropdown positioning
                $('.dropdown-menu').each(function() {
                    checkSubmenuPosition($(this));
                });
                
                // Reset hover behavior based on screen size
                if (window.innerWidth >= 992) {
                    // Desktop behavior
                    setupMultilevelDropdowns();
                } else {
                    // Mobile behavior
                    $('.dropdown-menu.show').removeClass('show');
                }
            }, 250);
        });
    }
    
    /**
     * Debug function for troubleshooting
     */
    window.debugBootstrapMenu = function() {
        console.log({
            dropdowns: $('.dropdown').length,
            dropdownToggles: $('.dropdown-toggle').length,
            dropdownMenus: $('.dropdown-menu').length,
            dropdownItems: $('.dropdown-item').length,
            dropdownSubmenus: $('.dropdown-submenu').length,
            windowWidth: window.innerWidth
        });
    };
});