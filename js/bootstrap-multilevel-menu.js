/**
 * Bootstrap Multilevel Menu System
 * Enhanced dropdown functionality for Bootstrap 5 with multilevel support
 */

jQuery(document).ready(function($) {
    // Initialize the multilevel menu system
    initMultilevelMenu();
    
    /**
     * Initialize the multilevel menu system
     */
    function initMultilevelMenu() {
        // Add necessary classes and attributes to menu elements
        setupMenuClasses();
        
        // Handle multilevel dropdowns
        setupMultilevelDropdowns();
        
        // Setup search functionality
        setupSearch();
        
        // Setup accessibility features
        setupAccessibility();
        
        // Handle window resize events
        handleResize();
    }
    
    /**
     * Setup menu classes and attributes
     */
    function setupMenuClasses() {
        // Add dropdown class to menu items with children
        $('.navbar-nav .menu-item-has-children').addClass('dropdown');
        
        // Add dropdown-toggle class and attributes to parent menu links
        $('.navbar-nav .menu-item-has-children > a').addClass('dropdown-toggle')
            .attr('data-bs-toggle', 'dropdown')
            .attr('aria-expanded', 'false')
            .attr('role', 'button');
        
        // Add dropdown-menu class to submenus
        $('.navbar-nav .sub-menu').addClass('dropdown-menu')
            .attr('aria-labelledby', function() {
                return 'dropdown-' + $(this).parent().attr('id');
            });
        
        // Add dropdown-item class to submenu links
        $('.navbar-nav .sub-menu .menu-item > a').addClass('dropdown-item');
        
        // Add dropdown-submenu class to nested dropdown items
        $('.navbar-nav .sub-menu .menu-item-has-children').addClass('dropdown-submenu');
        
        // Add dropdown-toggle class to nested dropdown links
        $('.navbar-nav .sub-menu .menu-item-has-children > a').removeClass('dropdown-toggle')
            .removeAttr('data-bs-toggle')
            .addClass('dropdown-item');
    }
    
    /**
     * Setup multilevel dropdown functionality
     */
    function setupMultilevelDropdowns() {
        // Handle first level dropdowns with Bootstrap's built-in dropdown
        var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
        dropdownElementList.map(function(dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl);
        });
        
        // Handle multilevel dropdowns on desktop
        if (window.innerWidth >= 992) {
            // Show submenu on hover for desktop
            $('.dropdown').on('mouseenter', function() {
                if (window.innerWidth < 992) return;
                
                const $dropdown = $(this);
                const $dropdownToggle = $dropdown.children('.dropdown-toggle');
                const $dropdownMenu = $dropdown.children('.dropdown-menu');
                
                // Clear any existing timeout
                clearTimeout($dropdown.data('timeout'));
                
                // Show dropdown
                $dropdown.addClass('show');
                $dropdownToggle.attr('aria-expanded', 'true');
                $dropdownMenu.addClass('show');
                
                // Check if dropdown goes off-screen
                checkDropdownPosition($dropdownMenu);
            }).on('mouseleave', function() {
                if (window.innerWidth < 992) return;
                
                const $dropdown = $(this);
                const $dropdownToggle = $dropdown.children('.dropdown-toggle');
                const $dropdownMenu = $dropdown.children('.dropdown-menu');
                
                // Set timeout to hide dropdown
                const timeout = setTimeout(function() {
                    $dropdown.removeClass('show');
                    $dropdownToggle.attr('aria-expanded', 'false');
                    $dropdownMenu.removeClass('show');
                }, 200);
                
                $dropdown.data('timeout', timeout);
            });
            
            // Handle nested dropdowns (submenu)
            $('.dropdown-submenu > a').on('click', function(e) {
                if (window.innerWidth < 992) return;
                
                e.preventDefault();
                e.stopPropagation();
                
                const $submenu = $(this).next('.dropdown-menu');
                const $allSubmenus = $('.dropdown-submenu .dropdown-menu');
                
                // Close all other submenus
                $allSubmenus.not($submenu).removeClass('show');
                
                // Toggle current submenu
                $submenu.toggleClass('show');
                
                // Check if submenu goes off-screen
                checkDropdownPosition($submenu);
                
                return false;
            });
            
            // Show submenu on hover for nested dropdowns
            $('.dropdown-submenu').on('mouseenter', function() {
                if (window.innerWidth < 992) return;
                
                const $submenu = $(this).children('.dropdown-menu');
                
                // Clear any existing timeout
                clearTimeout($(this).data('timeout'));
                
                // Show submenu
                $submenu.addClass('show');
                
                // Check if submenu goes off-screen
                checkDropdownPosition($submenu);
            }).on('mouseleave', function() {
                if (window.innerWidth < 992) return;
                
                const $submenu = $(this).children('.dropdown-menu');
                
                // Set timeout to hide submenu
                const timeout = setTimeout(function() {
                    $submenu.removeClass('show');
                }, 200);
                
                $(this).data('timeout', timeout);
            });
        } else {
            // Handle multilevel dropdowns on mobile
            $('.dropdown-submenu > a').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const $submenu = $(this).next('.dropdown-menu');
                
                // Toggle submenu
                $submenu.toggleClass('show');
                
                return false;
            });
        }
    }
    
    /**
     * Check if dropdown goes off-screen and adjust position
     */
    function checkDropdownPosition($dropdown) {
        if (window.innerWidth < 992) return;
        
        // Reset any previous position adjustments
        $dropdown.removeClass('dropdown-menu-end');
        
        // Get dropdown position
        const dropdownRect = $dropdown[0].getBoundingClientRect();
        const viewportWidth = window.innerWidth;
        
        // If dropdown goes off right edge, position it to the left
        if (dropdownRect.right > viewportWidth - 20) {
            $dropdown.addClass('dropdown-menu-end');
            
            // If this is a submenu, adjust the indicator arrow
            if ($dropdown.parent().hasClass('dropdown-submenu')) {
                $dropdown.parent().addClass('dropdown-menu-end');
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
            const $parentItem = $parentMenu.parent('.dropdown-submenu, .dropdown');
            
            switch (e.key) {
                case 'ArrowDown':
                    if ($item.hasClass('dropdown') || $item.hasClass('dropdown-submenu')) {
                        e.preventDefault();
                        
                        // Open dropdown
                        if ($link.hasClass('dropdown-toggle')) {
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
                    if ($item.hasClass('dropdown-submenu')) {
                        e.preventDefault();
                        
                        // Open submenu
                        $dropdown.addClass('show');
                        
                        // Focus first item in submenu
                        setTimeout(function() {
                            $dropdown.find('a').first().focus();
                        }, 10);
                    }
                    break;
                    
                case 'ArrowLeft':
                    if ($parentItem && $parentItem.hasClass('dropdown-submenu')) {
                        // Close current submenu and focus parent
                        e.preventDefault();
                        $parentMenu.removeClass('show');
                        $parentItem.find('> a').focus();
                    }
                    break;
                    
                case 'Escape':
                    if ($parentItem && $parentItem.length) {
                        // Close current dropdown and focus parent
                        e.preventDefault();
                        
                        if ($parentItem.hasClass('dropdown')) {
                            $parentItem.find('> .dropdown-toggle').dropdown('hide');
                        } else {
                            $parentMenu.removeClass('show');
                        }
                        
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
    
    /**
     * Handle window resize events
     */
    function handleResize() {
        let resizeTimer;
        
        $(window).on('resize', function() {
            clearTimeout(resizeTimer);
            
            resizeTimer = setTimeout(function() {
                if (window.innerWidth >= 992) {
                    // Desktop view
                    setupMultilevelDropdowns();
                } else {
                    // Mobile view
                    $('.dropdown-submenu .dropdown-menu').removeClass('show');
                }
                
                // Reset dropdown positioning
                $('.dropdown-menu').each(function() {
                    checkDropdownPosition($(this));
                });
            }, 250);
        });
    }
    
    /**
     * Debug function for troubleshooting
     */
    window.debugMultilevelMenu = function() {
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