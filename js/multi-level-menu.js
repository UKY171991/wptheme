/**
 * WordPress Multi-Level Menu JavaScript
 * Enhanced functionality for unlimited depth WordPress menus
 * Supports keyboard navigation, touch devices, and accessibility
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // Configuration
    const config = {
        mobileBreakpoint: 992,
        submenuDelay: 100,
        animationDuration: 300,
        touchDelay: 150
    };

    // Cache DOM elements
    const elements = {
        menuToggle: document.querySelector('.menu-toggle'),
        menuWrapper: document.querySelector('.menu-wrapper'),
        menuOverlay: document.querySelector('.menu-overlay'),
        mainNav: document.querySelector('.main-navigation'),
        menuItems: document.querySelectorAll('.menu-item'),
        hasChildrenItems: document.querySelectorAll('.menu-item-has-children'),
        body: document.body
    };

    // State management
    let state = {
        isMobile: window.innerWidth < config.mobileBreakpoint,
        menuOpen: false,
        activeDropdowns: new Set(),
        touchDevice: 'ontouchstart' in window
    };

    /**
     * Initialize the menu system
     */
    function init() {
        setupMobileMenu();
        setupDropdownMenus();
        setupKeyboardNavigation();
        setupTouchSupport();
        setupResizeHandler();
        setupAccessibility();
        
        console.log('WordPress Multi-Level Menu initialized');
    }

    /**
     * Mobile Menu Functionality
     */
    function setupMobileMenu() {
        if (!elements.menuToggle || !elements.menuWrapper) return;

        // Mobile menu toggle
        elements.menuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            toggleMobileMenu();
        });

        // Overlay click to close
        if (elements.menuOverlay) {
            elements.menuOverlay.addEventListener('click', closeMobileMenu);
        }

        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && state.menuOpen) {
                closeMobileMenu();
                elements.menuToggle.focus();
            }
        });
    }

    /**
     * Toggle mobile menu
     */
    function toggleMobileMenu() {
        state.menuOpen = !state.menuOpen;
        
        elements.menuToggle.setAttribute('aria-expanded', state.menuOpen);
        
        if (state.menuOpen) {
            openMobileMenu();
        } else {
            closeMobileMenu();
        }
    }

    /**
     * Open mobile menu
     */
    function openMobileMenu() {
        elements.menuWrapper.classList.add('active');
        if (elements.menuOverlay) {
            elements.menuOverlay.classList.add('active');
        }
        elements.body.style.overflow = 'hidden';
        
        // Focus first menu item
        const firstMenuItem = elements.menuWrapper.querySelector('.menu-item a');
        if (firstMenuItem) {
            setTimeout(() => firstMenuItem.focus(), 100);
        }
    }

    /**
     * Close mobile menu
     */
    function closeMobileMenu() {
        state.menuOpen = false;
        elements.menuToggle.setAttribute('aria-expanded', false);
        
        elements.menuWrapper.classList.remove('active');
        if (elements.menuOverlay) {
            elements.menuOverlay.classList.remove('active');
        }
        elements.body.style.overflow = '';
        
        // Close all mobile dropdowns
        closeAllMobileDropdowns();
    }

    /**
     * Setup dropdown menu functionality
     */
    function setupDropdownMenus() {
        elements.hasChildrenItems.forEach(function(item) {
            const link = item.querySelector('a');
            const submenu = item.querySelector('.sub-menu');
            
            if (!link || !submenu) return;

            // Desktop hover behavior
            if (!state.touchDevice) {
                setupDesktopDropdown(item, submenu);
            }

            // Mobile click behavior
            setupMobileDropdown(item, link, submenu);
        });
    }

    /**
     * Setup desktop dropdown behavior
     */
    function setupDesktopDropdown(item, submenu) {
        let hoverTimer;

        item.addEventListener('mouseenter', function() {
            if (state.isMobile) return;
            
            clearTimeout(hoverTimer);
            hoverTimer = setTimeout(() => {
                openDropdown(item, submenu);
            }, config.submenuDelay);
        });

        item.addEventListener('mouseleave', function() {
            if (state.isMobile) return;
            
            clearTimeout(hoverTimer);
            hoverTimer = setTimeout(() => {
                closeDropdown(item, submenu);
            }, config.submenuDelay);
        });
    }

    /**
     * Setup mobile dropdown behavior
     */
    function setupMobileDropdown(item, link, submenu) {
        // Add click handler for mobile
        link.addEventListener('click', function(e) {
            if (!state.isMobile) return;
            
            e.preventDefault();
            toggleMobileDropdown(item, submenu);
        });

        // Add dropdown toggle button for mobile
        if (state.isMobile) {
            addMobileDropdownToggle(item, submenu);
        }
    }

    /**
     * Add mobile dropdown toggle button
     */
    function addMobileDropdownToggle(item, submenu) {
        const link = item.querySelector('a');
        const toggleBtn = document.createElement('button');
        
        toggleBtn.className = 'mobile-dropdown-toggle';
        toggleBtn.setAttribute('aria-expanded', 'false');
        toggleBtn.setAttribute('aria-label', 'Toggle submenu');
        toggleBtn.innerHTML = '<span class="toggle-icon"></span>';
        
        toggleBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            toggleMobileDropdown(item, submenu);
        });
        
        link.parentNode.insertBefore(toggleBtn, link.nextSibling);
    }

    /**
     * Toggle mobile dropdown
     */
    function toggleMobileDropdown(item, submenu) {
        const isOpen = item.classList.contains('open');
        
        if (isOpen) {
            closeMobileDropdown(item, submenu);
        } else {
            openMobileDropdown(item, submenu);
        }
    }

    /**
     * Open mobile dropdown
     */
    function openMobileDropdown(item, submenu) {
        item.classList.add('open');
        const toggleBtn = item.querySelector('.mobile-dropdown-toggle');
        if (toggleBtn) {
            toggleBtn.setAttribute('aria-expanded', 'true');
        }
        
        // Calculate and set max-height for animation
        const scrollHeight = submenu.scrollHeight;
        submenu.style.maxHeight = scrollHeight + 'px';
    }

    /**
     * Close mobile dropdown
     */
    function closeMobileDropdown(item, submenu) {
        item.classList.remove('open');
        const toggleBtn = item.querySelector('.mobile-dropdown-toggle');
        if (toggleBtn) {
            toggleBtn.setAttribute('aria-expanded', 'false');
        }
        
        submenu.style.maxHeight = '0';
        
        // Close all nested dropdowns
        const nestedItems = submenu.querySelectorAll('.menu-item.open');
        nestedItems.forEach(nestedItem => {
            const nestedSubmenu = nestedItem.querySelector('.sub-menu');
            if (nestedSubmenu) {
                closeMobileDropdown(nestedItem, nestedSubmenu);
            }
        });
    }

    /**
     * Close all mobile dropdowns
     */
    function closeAllMobileDropdowns() {
        const openItems = document.querySelectorAll('.menu-item.open');
        openItems.forEach(item => {
            const submenu = item.querySelector('.sub-menu');
            if (submenu) {
                closeMobileDropdown(item, submenu);
            }
        });
    }

    /**
     * Open dropdown (desktop)
     */
    function openDropdown(item, submenu) {
        submenu.style.display = 'block';
        submenu.style.opacity = '0';
        submenu.style.visibility = 'visible';
        
        // Position submenu
        positionSubmenu(submenu);
        
        // Animate in
        setTimeout(() => {
            submenu.style.opacity = '1';
            submenu.style.transform = 'translateY(0)';
        }, 10);
        
        state.activeDropdowns.add(submenu);
    }

    /**
     * Close dropdown (desktop)
     */
    function closeDropdown(item, submenu) {
        submenu.style.opacity = '0';
        submenu.style.transform = 'translateY(-10px)';
        
        setTimeout(() => {
            if (submenu.style.opacity === '0') {
                submenu.style.display = 'none';
                submenu.style.visibility = 'hidden';
            }
        }, config.animationDuration);
        
        state.activeDropdowns.delete(submenu);
    }

    /**
     * Position submenu to stay within viewport
     */
    function positionSubmenu(submenu) {
        const rect = submenu.getBoundingClientRect();
        const viewport = {
            width: window.innerWidth,
            height: window.innerHeight
        };
        
        // Reset positioning
        submenu.style.left = '';
        submenu.style.right = '';
        submenu.style.transform = '';
        
        // Check if submenu goes off-screen
        if (rect.right > viewport.width) {
            submenu.style.left = 'auto';
            submenu.style.right = '0';
        }
        
        if (rect.left < 0) {
            submenu.style.left = '0';
            submenu.style.right = 'auto';
        }
    }

    /**
     * Setup keyboard navigation
     */
    function setupKeyboardNavigation() {
        elements.menuItems.forEach(function(item) {
            const link = item.querySelector('a');
            if (!link) return;

            link.addEventListener('keydown', function(e) {
                handleKeyboardNavigation(e, item, link);
            });
        });
    }

    /**
     * Handle keyboard navigation
     */
    function handleKeyboardNavigation(e, item, link) {
        const submenu = item.querySelector('.sub-menu');
        const hasSubmenu = submenu !== null;
        
        switch(e.key) {
            case 'ArrowDown':
                e.preventDefault();
                if (hasSubmenu && !state.isMobile) {
                    openDropdown(item, submenu);
                    const firstSubmenuLink = submenu.querySelector('a');
                    if (firstSubmenuLink) firstSubmenuLink.focus();
                } else {
                    focusNextMenuItem(link);
                }
                break;
                
            case 'ArrowUp':
                e.preventDefault();
                focusPreviousMenuItem(link);
                break;
                
            case 'ArrowRight':
                e.preventDefault();
                if (hasSubmenu && !state.isMobile) {
                    openDropdown(item, submenu);
                    const firstSubmenuLink = submenu.querySelector('a');
                    if (firstSubmenuLink) firstSubmenuLink.focus();
                } else {
                    focusNextMenuItem(link);
                }
                break;
                
            case 'ArrowLeft':
                e.preventDefault();
                const parentItem = link.closest('.sub-menu');
                if (parentItem) {
                    const parentLink = parentItem.parentElement.querySelector('a');
                    if (parentLink) parentLink.focus();
                } else {
                    focusPreviousMenuItem(link);
                }
                break;
                
            case 'Escape':
                e.preventDefault();
                if (hasSubmenu && state.activeDropdowns.has(submenu)) {
                    closeDropdown(item, submenu);
                    link.focus();
                }
                break;
                
            case 'Enter':
            case ' ':
                if (hasSubmenu && state.isMobile) {
                    e.preventDefault();
                    toggleMobileDropdown(item, submenu);
                }
                break;
        }
    }

    /**
     * Focus next menu item
     */
    function focusNextMenuItem(currentLink) {
        const allLinks = Array.from(document.querySelectorAll('.menu-item a'));
        const currentIndex = allLinks.indexOf(currentLink);
        const nextIndex = (currentIndex + 1) % allLinks.length;
        allLinks[nextIndex].focus();
    }

    /**
     * Focus previous menu item
     */
    function focusPreviousMenuItem(currentLink) {
        const allLinks = Array.from(document.querySelectorAll('.menu-item a'));
        const currentIndex = allLinks.indexOf(currentLink);
        const prevIndex = currentIndex === 0 ? allLinks.length - 1 : currentIndex - 1;
        allLinks[prevIndex].focus();
    }

    /**
     * Setup touch support
     */
    function setupTouchSupport() {
        if (!state.touchDevice) return;

        elements.hasChildrenItems.forEach(function(item) {
            const link = item.querySelector('a');
            const submenu = item.querySelector('.sub-menu');
            
            if (!link || !submenu) return;

            let touchTimer;
            
            link.addEventListener('touchstart', function(e) {
                if (state.isMobile) return;
                
                touchTimer = setTimeout(() => {
                    e.preventDefault();
                    if (state.activeDropdowns.has(submenu)) {
                        closeDropdown(item, submenu);
                    } else {
                        // Close other dropdowns first
                        state.activeDropdowns.forEach(activeSubmenu => {
                            if (activeSubmenu !== submenu) {
                                closeDropdown(activeSubmenu.parentElement, activeSubmenu);
                            }
                        });
                        openDropdown(item, submenu);
                    }
                }, config.touchDelay);
            });
            
            link.addEventListener('touchend', function() {
                clearTimeout(touchTimer);
            });
        });
    }

    /**
     * Setup accessibility features
     */
    function setupAccessibility() {
        // Add ARIA attributes
        elements.hasChildrenItems.forEach(function(item) {
            const link = item.querySelector('a');
            const submenu = item.querySelector('.sub-menu');
            
            if (link && submenu) {
                link.setAttribute('aria-haspopup', 'true');
                link.setAttribute('aria-expanded', 'false');
                submenu.setAttribute('aria-label', 'Submenu');
            }
        });
        
        // Update ARIA states on interaction
        document.addEventListener('click', function(e) {
            const menuItem = e.target.closest('.menu-item-has-children');
            if (menuItem) {
                const link = menuItem.querySelector('a');
                const submenu = menuItem.querySelector('.sub-menu');
                const isOpen = state.activeDropdowns.has(submenu) || menuItem.classList.contains('open');
                
                if (link) {
                    link.setAttribute('aria-expanded', isOpen);
                }
            }
        });
    }

    /**
     * Setup resize handler
     */
    function setupResizeHandler() {
        let resizeTimer;
        
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                const wasMobile = state.isMobile;
                state.isMobile = window.innerWidth < config.mobileBreakpoint;
                
                if (wasMobile !== state.isMobile) {
                    handleBreakpointChange();
                }
            }, 250);
        });
    }

    /**
     * Handle breakpoint changes
     */
    function handleBreakpointChange() {
        if (!state.isMobile) {
            // Switched to desktop
            closeMobileMenu();
            closeAllMobileDropdowns();
            
            // Remove mobile-specific elements
            const mobileToggles = document.querySelectorAll('.mobile-dropdown-toggle');
            mobileToggles.forEach(toggle => toggle.remove());
        } else {
            // Switched to mobile
            state.activeDropdowns.forEach(submenu => {
                closeDropdown(submenu.parentElement, submenu);
            });
            
            // Add mobile dropdown toggles
            elements.hasChildrenItems.forEach(item => {
                const submenu = item.querySelector('.sub-menu');
                if (submenu && !item.querySelector('.mobile-dropdown-toggle')) {
                    addMobileDropdownToggle(item, submenu);
                }
            });
        }
    }

    /**
     * Close dropdowns when clicking outside
     */
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.main-navigation')) {
            state.activeDropdowns.forEach(submenu => {
                closeDropdown(submenu.parentElement, submenu);
            });
        }
    });

    // Initialize the menu system
    init();

    // Expose public API for debugging
    window.WordPressMenu = {
        state: state,
        config: config,
        elements: elements,
        toggleMobileMenu: toggleMobileMenu,
        closeMobileMenu: closeMobileMenu
    };
});
