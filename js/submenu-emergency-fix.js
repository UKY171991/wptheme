/**
 * Submenu Diagnostic & Emergency JavaScript
 * Ensures submenu functionality works immediately
 */

(function() {
    'use strict';
    
    // Wait for DOM to be ready
    function ready(callback) {
        if (document.readyState !== 'loading') {
            callback();
        } else {
            document.addEventListener('DOMContentLoaded', callback);
        }
    }
    
    // Emergency submenu fix
    function emergencySubmenuFix() {
        const menuItems = document.querySelectorAll('.nav-menu .menu-item');
        
        menuItems.forEach(function(item) {
            const submenu = item.querySelector('.sub-menu');
            const link = item.querySelector('a');
            
            if (submenu && link) {
                // Add necessary classes
                item.classList.add('has-dropdown');
                
                // Add ARIA attributes
                link.setAttribute('aria-haspopup', 'true');
                link.setAttribute('aria-expanded', 'false');
                
                // Add dropdown indicator if missing
                if (!link.querySelector('.dropdown-toggle')) {
                    const indicator = document.createElement('span');
                    indicator.className = 'dropdown-toggle';
                    indicator.setAttribute('aria-hidden', 'true');
                    link.appendChild(indicator);
                }
                
                // Set submenu attributes
                submenu.setAttribute('role', 'menu');
                submenu.setAttribute('aria-hidden', 'true');
                
                // Mouse events
                item.addEventListener('mouseenter', function() {
                    openDropdown(item, submenu, link);
                });
                
                item.addEventListener('mouseleave', function() {
                    setTimeout(function() {
                        closeDropdown(item, submenu, link);
                    }, 300);
                });
                
                // Touch events for mobile
                if ('ontouchstart' in window) {
                    link.addEventListener('click', function(e) {
                        if (item.classList.contains('dropdown-open')) {
                            // Second tap - follow link
                            return true;
                        } else {
                            // First tap - open dropdown
                            e.preventDefault();
                            closeAllDropdowns();
                            openDropdown(item, submenu, link);
                        }
                    });
                }
                
                // Keyboard events
                link.addEventListener('keydown', function(e) {
                    if (e.key === 'ArrowDown') {
                        e.preventDefault();
                        openDropdown(item, submenu, link);
                        focusFirstSubmenuItem(submenu);
                    } else if (e.key === 'Enter' || e.key === ' ') {
                        if (submenu) {
                            e.preventDefault();
                            toggleDropdown(item, submenu, link);
                        }
                    }
                });
            }
        });
        
        // Close dropdowns on outside click
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.nav-menu')) {
                closeAllDropdowns();
            }
        });
        
        // Close on escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeAllDropdowns();
            }
        });
    }
    
    function openDropdown(item, submenu, link) {
        // Close siblings
        const parent = item.parentElement;
        const siblings = parent.querySelectorAll(':scope > .menu-item.dropdown-open');
        siblings.forEach(function(sibling) {
            if (sibling !== item) {
                closeDropdown(sibling, sibling.querySelector('.sub-menu'), sibling.querySelector('a'));
            }
        });
        
        // Position submenu
        positionSubmenu(item, submenu);
        
        // Open dropdown
        item.classList.add('dropdown-open');
        submenu.setAttribute('aria-hidden', 'false');
        link.setAttribute('aria-expanded', 'true');
        
        // Enable focus for submenu items
        const submenuLinks = submenu.querySelectorAll('.menu-item > a');
        submenuLinks.forEach(function(subLink) {
            subLink.setAttribute('tabindex', '0');
        });
    }
    
    function closeDropdown(item, submenu, link) {
        item.classList.remove('dropdown-open');
        submenu.setAttribute('aria-hidden', 'true');
        link.setAttribute('aria-expanded', 'false');
        
        // Disable focus for submenu items
        const submenuLinks = submenu.querySelectorAll('.menu-item > a');
        submenuLinks.forEach(function(subLink) {
            subLink.setAttribute('tabindex', '-1');
        });
    }
    
    function toggleDropdown(item, submenu, link) {
        if (item.classList.contains('dropdown-open')) {
            closeDropdown(item, submenu, link);
        } else {
            openDropdown(item, submenu, link);
        }
    }
    
    function closeAllDropdowns() {
        const openDropdowns = document.querySelectorAll('.nav-menu .menu-item.dropdown-open');
        openDropdowns.forEach(function(item) {
            const submenu = item.querySelector('.sub-menu');
            const link = item.querySelector('a');
            if (submenu && link) {
                closeDropdown(item, submenu, link);
            }
        });
    }
    
    function positionSubmenu(item, submenu) {
        // Reset positioning classes
        item.classList.remove('dropdown-right', 'dropdown-up');
        
        // Get viewport width
        const viewportWidth = window.innerWidth;
        
        // Check if submenu would overflow on right
        setTimeout(function() {
            const itemRect = item.getBoundingClientRect();
            const submenuRect = submenu.getBoundingClientRect();
            
            if (itemRect.left + submenuRect.width > viewportWidth - 20) {
                item.classList.add('dropdown-right');
            }
        }, 10);
    }
    
    function focusFirstSubmenuItem(submenu) {
        const firstItem = submenu.querySelector('.menu-item > a');
        if (firstItem) {
            firstItem.focus();
        }
    }
    
    // Mobile menu handling
    function setupMobileMenu() {
        const menuToggle = document.querySelector('.menu-toggle');
        const navigation = document.querySelector('.main-navigation');
        
        if (menuToggle && navigation) {
            menuToggle.addEventListener('click', function(e) {
                e.preventDefault();
                navigation.classList.toggle('mobile-menu-open');
                
                const isOpen = navigation.classList.contains('mobile-menu-open');
                menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
                
                if (isOpen) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = '';
                    closeAllDropdowns();
                }
            });
        }
        
        // Setup mobile submenu toggles
        const submenuItems = document.querySelectorAll('.nav-menu .menu-item-has-children, .nav-menu .has-dropdown');
        submenuItems.forEach(function(item) {
            const link = item.querySelector('a');
            const submenu = item.querySelector('.sub-menu');
            
            if (link && submenu && window.innerWidth <= 768) {
                // Create mobile toggle
                if (!item.querySelector('.submenu-toggle')) {
                    const toggle = document.createElement('button');
                    toggle.className = 'submenu-toggle';
                    toggle.setAttribute('aria-expanded', 'false');
                    toggle.innerHTML = '<span class="screen-reader-text">Toggle submenu</span>';
                    item.appendChild(toggle);
                    
                    toggle.addEventListener('click', function(e) {
                        e.preventDefault();
                        const isOpen = item.classList.contains('mobile-open');
                        
                        if (isOpen) {
                            item.classList.remove('mobile-open');
                            toggle.setAttribute('aria-expanded', 'false');
                            submenu.style.maxHeight = '';
                        } else {
                            item.classList.add('mobile-open');
                            toggle.setAttribute('aria-expanded', 'true');
                            submenu.style.maxHeight = submenu.scrollHeight + 'px';
                        }
                    });
                }
            }
        });
    }
    
    // Viewport monitoring
    function monitorViewport() {
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(function() {
                closeAllDropdowns();
                if (window.innerWidth <= 768) {
                    setupMobileMenu();
                }
            }, 250);
        });
    }
    
    // Initialize everything
    ready(function() {
        emergencySubmenuFix();
        setupMobileMenu();
        monitorViewport();
        
        // Console log for debugging
        console.log('Emergency Submenu Fix: Initialized');
        console.log('Menu items found:', document.querySelectorAll('.nav-menu .menu-item').length);
        console.log('Submenu items found:', document.querySelectorAll('.nav-menu .sub-menu').length);
    });
    
})();
