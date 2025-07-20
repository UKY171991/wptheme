/**
 * Bootstrap Menu Fix - Final Implementation
 * Fixes multilevel dropdown menu functionality in Bootstrap 5
 */

jQuery(document).ready(function($) {
    'use strict';
    
    // Initialize the menu system
    initBootstrapMenu();
    
    /**
     * Initialize the Bootstrap menu system
     */
    function initBootstrapMenu() {
        // Setup multilevel dropdown functionality
        setupMultilevelDropdowns();
        
        // Setup search functionality
        setupSearch();
        
        // Handle window resize events
        handleResize();
    }
    
    /**
     * Setup multilevel dropdown functionality
     */
    function setupMultilevelDropdowns() {
        // Handle hover for desktop
        if (window.innerWidth >= 992) {
            // Show dropdown on hover for top level items
            $('.navbar-nav > .nav-item.dropdown').hover(
                function() {
                    $(this).find('.dropdown-menu').first().addClass('show');
                    $(this).find('> .dropdown-toggle').attr('aria-expanded', 'true');
                },
                function() {
                    $(this).find('.dropdown-menu').first().removeClass('show');
                    $(this).find('> .dropdown-toggle').attr('aria-expanded', 'false');
                }
            );
            
            // Show submenu on hover for nested dropdowns
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
});