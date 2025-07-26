/**
 * Enhanced Header System JavaScript
 * Modern, performant header functionality with improved accessibility
 * 
 * @package Services_Pro
 * @version 2.0
 */

(function() {
    'use strict';

    // Configuration
    const CONFIG = {
        scrollThreshold: 100,
        debounceDelay: 10,
        animationDuration: 300,
        breakpoints: {
            mobile: 768,
            tablet: 992,
            desktop: 1200
        }
    };

    // State management
    const state = {
        isScrolled: false,
        isMobileMenuOpen: false,
        lastScrollTop: 0,
        resizeTimeout: null,
        scrollTimeout: null
    };

    // Cache DOM elements
    const elements = {};

    /**
     * Initialize header functionality
     */
    function init() {
        cacheElements();
        
        if (!elements.header) {
            console.warn('Header element not found');
            return;
        }

        bindEvents();
        setupAccessibility();
        initializeDropdowns();
        
        // Set initial state
        handleScroll();
        
        console.log('✅ Enhanced Header System initialized');
    }

    /**
     * Cache frequently used DOM elements
     */
    function cacheElements() {
        elements.header = document.getElementById('masthead');
        elements.navbar = elements.header?.querySelector('.navbar');
        elements.toggler = elements.header?.querySelector('.navbar-toggler');
        elements.collapse = elements.header?.querySelector('.navbar-collapse');
        elements.dropdowns = elements.header?.querySelectorAll('.dropdown');
        elements.dropdownToggles = elements.header?.querySelectorAll('.dropdown-toggle');
        elements.searchToggle = elements.header?.querySelector('.search-toggle');
        elements.searchCollapse = document.getElementById('header-search');
        elements.body = document.body;
        elements.window = window;
    }

    /**
     * Bind event listeners
     */
    function bindEvents() {
        // Scroll events with debouncing
        let scrollTimeout;
        elements.window.addEventListener('scroll', () => {
            if (scrollTimeout) {
                cancelAnimationFrame(scrollTimeout);
            }
            scrollTimeout = requestAnimationFrame(handleScroll);
        }, { passive: true });

        // Resize events with debouncing
        elements.window.addEventListener('resize', debounce(handleResize, 250));

        // Mobile menu toggle
        if (elements.toggler) {
            elements.toggler.addEventListener('click', handleMobileToggle);
        }

        // Search toggle
        if (elements.searchToggle) {
            elements.searchToggle.addEventListener('click', handleSearchToggle);
        }

        // Enhanced dropdown handling
        elements.dropdowns?.forEach(dropdown => {
            setupDropdownEvents(dropdown);
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', handleOutsideClick);

        // Keyboard navigation
        document.addEventListener('keydown', handleKeyboardNavigation);

        // Close dropdowns on escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeAllDropdowns();
                closeSearch();
            }
        });
    }

    /**
     * Handle scroll effects
     */
    function handleScroll() {
        const scrollTop = elements.window.pageYOffset || document.documentElement.scrollTop;
        const shouldBeScrolled = scrollTop > CONFIG.scrollThreshold;

        if (shouldBeScrolled !== state.isScrolled) {
            state.isScrolled = shouldBeScrolled;
            updateScrollState();
        }

        state.lastScrollTop = scrollTop;
    }

    /**
     * Update header appearance based on scroll state
     */
    function updateScrollState() {
        const method = state.isScrolled ? 'add' : 'remove';
        elements.header?.classList[method]('scrolled');
        elements.navbar?.classList[method]('shadow');
        
        // Add/remove background for better visibility when scrolled
        if (state.isScrolled) {
            elements.navbar?.classList.add('bg-white');
        } else {
            elements.navbar?.classList.remove('bg-white');
        }
    }

    /**
     * Handle window resize
     */
    function handleResize() {
        const isMobile = elements.window.innerWidth < CONFIG.breakpoints.mobile;
        
        // Close mobile menu on desktop
        if (!isMobile && state.isMobileMenuOpen) {
            closeMobileMenu();
        }

        // Reset dropdown positions
        resetDropdownPositions();
    }

    /**
     * Handle mobile menu toggle
     */
    function handleMobileToggle(e) {
        e.preventDefault();
        
        if (state.isMobileMenuOpen) {
            closeMobileMenu();
        } else {
            openMobileMenu();
        }
    }

    /**
     * Open mobile menu
     */
    function openMobileMenu() {
        state.isMobileMenuOpen = true;
        elements.toggler?.setAttribute('aria-expanded', 'true');
        elements.collapse?.classList.add('show');
        elements.body?.classList.add('mobile-menu-open');
        
        // Focus first menu item
        const firstMenuItem = elements.collapse?.querySelector('.nav-link');
        if (firstMenuItem) {
            setTimeout(() => firstMenuItem.focus(), 100);
        }
    }

    /**
     * Close mobile menu
     */
    function closeMobileMenu() {
        state.isMobileMenuOpen = false;
        elements.toggler?.setAttribute('aria-expanded', 'false');
        elements.collapse?.classList.remove('show');
        elements.body?.classList.remove('mobile-menu-open');
        
        // Return focus to toggle button
        if (document.activeElement !== elements.toggler) {
            elements.toggler?.focus();
        }
    }

    /**
     * Handle search toggle
     */
    function handleSearchToggle(e) {
        e.preventDefault();
        
        if (elements.searchCollapse?.classList.contains('show')) {
            closeSearch();
        } else {
            openSearch();
        }
    }

    /**
     * Open search
     */
    function openSearch() {
        elements.searchCollapse?.classList.add('show');
        elements.searchToggle?.setAttribute('aria-expanded', 'true');
        
        // Focus search input
        const searchInput = elements.searchCollapse?.querySelector('input[type="search"]');
        if (searchInput) {
            setTimeout(() => searchInput.focus(), 100);
        }
    }

    /**
     * Close search
     */
    function closeSearch() {
        elements.searchCollapse?.classList.remove('show');
        elements.searchToggle?.setAttribute('aria-expanded', 'false');
    }

    /**
     * Setup dropdown events for better UX
     */
    function setupDropdownEvents(dropdown) {
        const toggle = dropdown.querySelector('.dropdown-toggle');
        const menu = dropdown.querySelector('.dropdown-menu');
        
        if (!toggle || !menu) return;

        // Hover events for desktop
        if (elements.window.innerWidth >= CONFIG.breakpoints.tablet) {
            dropdown.addEventListener('mouseenter', () => {
                if (!dropdown.classList.contains('show')) {
                    showDropdown(dropdown);
                }
            });

            dropdown.addEventListener('mouseleave', () => {
                hideDropdown(dropdown);
            });
        }

        // Click events
        toggle.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            
            if (dropdown.classList.contains('show')) {
                hideDropdown(dropdown);
            } else {
                closeAllDropdowns();
                showDropdown(dropdown);
            }
        });

        // Touch events for mobile
        toggle.addEventListener('touchstart', (e) => {
            e.stopPropagation();
        });
    }

    /**
     * Show dropdown
     */
    function showDropdown(dropdown) {
        const toggle = dropdown.querySelector('.dropdown-toggle');
        const menu = dropdown.querySelector('.dropdown-menu');
        
        dropdown.classList.add('show');
        menu?.classList.add('show');
        toggle?.setAttribute('aria-expanded', 'true');
        
        // Position dropdown to prevent overflow
        positionDropdown(dropdown, menu);
    }

    /**
     * Hide dropdown
     */
    function hideDropdown(dropdown) {
        const toggle = dropdown.querySelector('.dropdown-toggle');
        const menu = dropdown.querySelector('.dropdown-menu');
        
        dropdown.classList.remove('show');
        menu?.classList.remove('show');
        toggle?.setAttribute('aria-expanded', 'false');
    }

    /**
     * Close all dropdowns
     */
    function closeAllDropdowns() {
        elements.dropdowns?.forEach(dropdown => {
            hideDropdown(dropdown);
        });
    }

    /**
     * Position dropdown to prevent overflow
     */
    function positionDropdown(dropdown, menu) {
        if (!menu) return;
        
        const rect = dropdown.getBoundingClientRect();
        const menuRect = menu.getBoundingClientRect();
        const viewportWidth = elements.window.innerWidth;
        
        // Reset classes
        menu.classList.remove('dropdown-menu-end', 'dropstart');
        
        // Check if dropdown overflows right side
        if (rect.left + menuRect.width > viewportWidth - 20) {
            menu.classList.add('dropdown-menu-end');
        }
    }

    /**
     * Reset dropdown positions
     */
    function resetDropdownPositions() {
        elements.dropdowns?.forEach(dropdown => {
            const menu = dropdown.querySelector('.dropdown-menu');
            if (menu) {
                menu.classList.remove('dropdown-menu-end', 'dropstart');
            }
        });
    }

    /**
     * Handle clicks outside menu
     */
    function handleOutsideClick(e) {
        const isInsideHeader = elements.header?.contains(e.target);
        
        if (!isInsideHeader) {
            if (state.isMobileMenuOpen) {
                closeMobileMenu();
            }
            closeAllDropdowns();
            closeSearch();
        }
    }

    /**
     * Handle keyboard navigation
     */
    function handleKeyboardNavigation(e) {
        if (e.key === 'Tab') {
            handleTabNavigation(e);
        } else if (e.key === 'Enter' || e.key === ' ') {
            handleEnterSpace(e);
        } else if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
            handleArrowKeys(e);
        }
    }

    /**
     * Handle tab navigation
     */
    function handleTabNavigation(e) {
        const focusableElements = elements.header?.querySelectorAll(
            'a, button, input, select, textarea, [tabindex]:not([tabindex="-1"])'
        );
        
        if (!focusableElements?.length) return;
        
        const firstElement = focusableElements[0];
        const lastElement = focusableElements[focusableElements.length - 1];
        
        if (e.shiftKey && document.activeElement === firstElement) {
            e.preventDefault();
            lastElement.focus();
        } else if (!e.shiftKey && document.activeElement === lastElement) {
            e.preventDefault();
            firstElement.focus();
        }
    }

    /**
     * Handle enter/space key presses
     */
    function handleEnterSpace(e) {
        const target = e.target;
        
        if (target.classList.contains('dropdown-toggle')) {
            e.preventDefault();
            target.click();
        }
    }

    /**
     * Handle arrow key navigation in dropdowns
     */
    function handleArrowKeys(e) {
        const target = e.target;
        const dropdown = target.closest('.dropdown');
        
        if (!dropdown) return;
        
        const menuItems = dropdown.querySelectorAll('.dropdown-item, .nav-link');
        const currentIndex = Array.from(menuItems).indexOf(target);
        
        if (currentIndex === -1) return;
        
        e.preventDefault();
        
        let nextIndex;
        if (e.key === 'ArrowDown') {
            nextIndex = currentIndex + 1 >= menuItems.length ? 0 : currentIndex + 1;
        } else {
            nextIndex = currentIndex - 1 < 0 ? menuItems.length - 1 : currentIndex - 1;
        }
        
        menuItems[nextIndex]?.focus();
    }

    /**
     * Setup accessibility attributes
     */
    function setupAccessibility() {
        // Add ARIA labels where missing
        elements.toggler?.setAttribute('aria-label', elements.toggler.getAttribute('aria-label') || 'Toggle navigation menu');
        
        // Setup dropdown ARIA attributes
        elements.dropdownToggles?.forEach((toggle, index) => {
            const menu = toggle.parentElement?.querySelector('.dropdown-menu');
            if (menu) {
                const menuId = `dropdown-menu-${index}`;
                menu.id = menuId;
                toggle.setAttribute('aria-controls', menuId);
                toggle.setAttribute('aria-haspopup', 'true');
                toggle.setAttribute('aria-expanded', 'false');
            }
        });
    }

    /**
     * Initialize Bootstrap dropdowns
     */
    function initializeDropdowns() {
        // Only initialize if Bootstrap is available
        if (typeof bootstrap !== 'undefined' && bootstrap.Dropdown) {
            elements.dropdownToggles?.forEach(toggle => {
                new bootstrap.Dropdown(toggle, {
                    autoClose: 'outside',
                    boundary: 'viewport'
                });
            });
        }
    }

    /**
     * Debounce function for performance
     */
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    // Console message for confirmation
    console.log('🎉 Services Pro Enhanced Header System v2.0 loaded successfully!');

    // Expose public methods for external use
    window.ServicesProHeader = {
        closeMobileMenu,
        closeAllDropdowns,
        closeSearch,
        state: () => ({ ...state }), // Read-only state access
        config: CONFIG
    };

})();
