/**
 * Bootstrap Menu System with Multilevel Dropdown Support
 * Enhances Bootstrap's navbar with multilevel dropdown functionality
 */

jQuery(document).ready(function($) {
    // Initialize Bootstrap components
    initBootstrapComponents();
    
    // Setup multilevel dropdown functionality
    setupMultilevelDropdowns();
    
    // Setup search functionality
    setupSearch();
    
    // Setup accessibility features
    setupAccessibility();
    
    /**
     * Initialize Bootstrap components
     */
    function initBootstrapComponents() {
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        
        // Initialize popovers
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl);
        });
    }
    
    /**
     * Setup multilevel dropdown functionality
     */
    function setupMultilevelDropdowns() {
        // Add dropdown-submenu class to menu items with children
        $('.dropdown-menu .menu-item-has-children').addClass('dropdown-submenu');
        
        // Convert WordPress menu classes to Bootstrap classes
        $('.navbar-nav .menu-item-has-children').addClass('dropdown');
        $('.navbar-nav .menu-item-has-children > a').addClass('dropdown-toggle').attr('data-bs-toggle', 'dropdown').attr('aria-expanded', 'false');
        $('.navbar-nav .sub-menu').addClass('dropdown-menu');
        $('.navbar-nav .sub-menu .menu-item > a').addClass('dropdown-item');
        
        // Handle multilevel dropdowns on desktop
        if (window.innerWidth >= 992) {
            $('.dropdown-submenu > a').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const $submenu = $(this).next('.dropdown-menu');
                const $allSubmenus = $('.dropdown-submenu .dropdown-menu');
                
                // Close all other submenus
                $allSubmenus.not($submenu).removeClass('show');
                
                // Toggle current submenu
                $submenu.toggleClass('show');
                
                // Check if submenu goes off-screen
                checkSubmenuPosition($submenu);
                
                return false;
            });
        }
        
        // Handle multilevel dropdowns on mobile
        $('.navbar-collapse').on('show.bs.collapse', function() {
            $('body').addClass('navbar-open');
        });
        
        $('.navbar-collapse').on('hide.bs.collapse', function() {
            $('body').removeClass('navbar-open');
        });
    }
    
    /**
     * Check if submenu goes off-screen and adjust position
     */
    function checkSubmenuPosition($submenu) {
        if (window.innerWidth < 992) return;
        
        // Reset any previous position adjustments
        $submenu.removeClass('dropdown-menu-end');
        
        // Get submenu position
        const submenuRect = $submenu[0].getBoundingClientRect();
        const viewportWidth = window.innerWidth;
        
        // If submenu goes off right edge, position it to the left
        if (submenuRect.right > viewportWidth - 20) {
            $submenu.addClass('dropdown-menu-end');
        }
    }
    
    /**
     * Setup search functionality
     */
    function setupSearch() {
        // Toggle search container
        $('.search-toggle').on('click', function(e) {
            e.preventDefault();
            
            const $searchContainer = $('#search-container');
            const isExpanded = $(this).attr('aria-expanded') === 'true';
            
            if (isExpanded) {
                $searchContainer.removeClass('active');
                $(this).attr('aria-expanded', 'false');
            } else {
                $searchContainer.addClass('active');
                $(this).attr('aria-expanded', 'true');
                $searchContainer.find('.search-field').focus();
            }
        });
        
        // Close search on button click
        $('.search-close').on('click', function() {
            $('#search-container').removeClass('active');
            $('.search-toggle').attr('aria-expanded', 'false');
        });
        
        // Close search on escape key
        $(document).on('keyup', function(e) {
            if (e.key === 'Escape' && $('#search-container').hasClass('active')) {
                $('#search-container').removeClass('active');
                $('.search-toggle').attr('aria-expanded', 'false').focus();
            }
        });
    }
    
    /**
     * Setup accessibility features
     */
    function setupAccessibility() {
        // Add aria attributes to dropdowns
        $('.dropdown-toggle').attr('aria-haspopup', 'true');
        
        // Handle keyboard navigation
        $('.navbar-nav a').on('keydown', function(e) {
            const $link = $(this);
            const $item = $link.parent();
            const $dropdown = $link.next('.dropdown-menu');
            const $parentMenu = $item.parent('.dropdown-menu');
            const $parentItem = $parentMenu.parent('.dropdown-submenu');
            
            switch (e.key) {
                case 'ArrowDown':
                    if ($item.hasClass('dropdown') || $item.hasClass('dropdown-submenu')) {
                        e.preventDefault();
                        
                        // Open dropdown
                        if ($link.attr('data-bs-toggle') === 'dropdown') {
                            $link.dropdown('show');
                        } else {
                            $dropdown.addClass('show');
                        }
                        
                        // Focus first item in dropdown
                        setTimeout(function() {
                            $dropdown.find('a').first().focus();
                        }, 10);
                    } else if ($item.next().length) {
                        // Move to next item
                        e.preventDefault();
                        $item.next().find('a').first().focus();
                    }
                    break;
                    
                case 'ArrowUp':
                    if ($item.prev().length) {
                        // Move to previous item
                        e.preventDefault();
                        $item.prev().find('a').first().focus();
                    } else if ($parentItem && $parentItem.length) {
                        // Move to parent item
                        e.preventDefault();
                        $parentItem.find('> a').focus();
                    }
                    break;
                    
                case 'ArrowRight':
                    if ($item.hasClass('dropdown') || $item.hasClass('dropdown-submenu')) {
                        e.preventDefault();
                        
                        // Open dropdown
                        if ($link.attr('data-bs-toggle') === 'dropdown') {
                            $link.dropdown('show');
                        } else {
                            $dropdown.addClass('show');
                        }
                        
                        // Focus first item in dropdown
                        setTimeout(function() {
                            $dropdown.find('a').first().focus();
                        }, 10);
                    }
                    break;
                    
                case 'ArrowLeft':
                    if ($parentItem && $parentItem.length) {
                        // Close current dropdown and focus parent
                        e.preventDefault();
                        $parentMenu.removeClass('show');
                        $parentItem.find('> a').focus();
                    }
                    break;
                    
                case 'Escape':
                    if ($parentItem && $parentItem.length) {
                        // Close current dropdown and focus parent
                        e.preventDefault();
                        $parentMenu.removeClass('show');
                        $parentItem.find('> a').focus();
                    } else if ($item.hasClass('dropdown')) {
                        // Close dropdown
                        e.preventDefault();
                        $link.dropdown('hide');
                        $link.focus();
                    }
                    break;
            }
        });
        
        // Close dropdowns when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.dropdown-submenu').length) {
                $('.dropdown-submenu .dropdown-menu.show').removeClass('show');
            }
        });
    }
    
    // Handle window resize
    $(window).on('resize', function() {
        // Reset dropdown positioning on window resize
        $('.dropdown-submenu .dropdown-menu').each(function() {
            checkSubmenuPosition($(this));
        });
    });
});