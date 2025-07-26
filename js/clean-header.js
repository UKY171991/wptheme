/**
 * Clean Header JavaScript
 * Simple, lightweight header functionality
 */

(function() {
    'use strict';

    // Cache DOM elements
    let header, mobileToggle, mobileNav, body;

    /**
     * Initialize header functionality
     */
    function init() {
        cacheElements();
        if (!header) return;
        
        bindEvents();
        handleScroll(); // Set initial state
    }

    /**
     * Cache DOM elements
     */
    function cacheElements() {
        header = document.querySelector('.site-header');
        mobileToggle = document.querySelector('.mobile-menu-toggle');
        mobileNav = document.querySelector('.mobile-navigation');
        body = document.body;
    }

    /**
     * Bind event listeners
     */
    function bindEvents() {
        // Scroll events
        let scrollTimeout;
        window.addEventListener('scroll', function() {
            if (scrollTimeout) {
                cancelAnimationFrame(scrollTimeout);
            }
            scrollTimeout = requestAnimationFrame(handleScroll);
        }, { passive: true });

        // Mobile menu toggle
        if (mobileToggle) {
            mobileToggle.addEventListener('click', toggleMobileMenu);
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            if (mobileNav && mobileNav.classList.contains('active')) {
                if (!header.contains(e.target)) {
                    closeMobileMenu();
                }
            }
        });

        // Handle escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mobileNav && mobileNav.classList.contains('active')) {
                closeMobileMenu();
            }
        });

        // Close mobile menu on window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 992 && mobileNav && mobileNav.classList.contains('active')) {
                closeMobileMenu();
            }
        });
    }

    /**
     * Handle scroll effects
     */
    function handleScroll() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const shouldBeScrolled = scrollTop > 50;

        if (shouldBeScrolled) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }

    /**
     * Toggle mobile menu
     */
    function toggleMobileMenu() {
        if (mobileNav.classList.contains('active')) {
            closeMobileMenu();
        } else {
            openMobileMenu();
        }
    }

    /**
     * Open mobile menu
     */
    function openMobileMenu() {
        mobileToggle.classList.add('active');
        mobileNav.classList.add('active');
        body.classList.add('mobile-menu-open');
        mobileToggle.setAttribute('aria-expanded', 'true');
    }

    /**
     * Close mobile menu
     */
    function closeMobileMenu() {
        mobileToggle.classList.remove('active');
        mobileNav.classList.remove('active');
        body.classList.remove('mobile-menu-open');
        mobileToggle.setAttribute('aria-expanded', 'false');
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    // Expose public methods
    window.CleanHeader = {
        closeMobileMenu: closeMobileMenu
    };

})();
                });
                
                // Toggle current dropdown
                parentItem.classList.toggle('show-submenu');
                
                // Update aria-expanded
                const isNowOpen = parentItem.classList.contains('show-submenu');
                item.setAttribute('aria-expanded', isNowOpen);
            }
        });
    });
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(e) {
        if (navMenu && navMenu.classList.contains('show')) {
            if (!navMenu.contains(e.target) && !menuToggle.contains(e.target)) {
                navMenu.classList.remove('show');
                menuToggle.classList.remove('active');
                menuToggle.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            }
        }
    });
    
    // Close mobile menu on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && navMenu && navMenu.classList.contains('show')) {
            navMenu.classList.remove('show');
            menuToggle.classList.remove('active');
            menuToggle.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
            menuToggle.focus();
        }
    });
    
    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            // Reset mobile menu state on desktop
            if (navMenu) {
                navMenu.classList.remove('show');
            }
            if (menuToggle) {
                menuToggle.classList.remove('active');
                menuToggle.setAttribute('aria-expanded', 'false');
            }
            document.body.style.overflow = '';
            
            // Close all mobile dropdowns
            document.querySelectorAll('.menu-item.show-submenu').forEach(function(item) {
                item.classList.remove('show-submenu');
            });
        }
    });
    
    // Enhance desktop dropdown accessibility
    const desktopDropdowns = document.querySelectorAll('.menu-item.has-dropdown');
    
    desktopDropdowns.forEach(function(dropdown) {
        const link = dropdown.querySelector('a');
        const submenu = dropdown.querySelector('.sub-menu');
        
        if (link && submenu) {
            // Handle keyboard navigation
            link.addEventListener('keydown', function(e) {
                if (window.innerWidth > 768) {
                    if (e.key === 'ArrowDown') {
                        e.preventDefault();
                        const firstSubmenuLink = submenu.querySelector('a');
                        if (firstSubmenuLink) {
                            firstSubmenuLink.focus();
                        }
                    }
                }
            });
            
            // Handle submenu keyboard navigation
            const submenuLinks = submenu.querySelectorAll('a');
            submenuLinks.forEach(function(submenuLink, index) {
                submenuLink.addEventListener('keydown', function(e) {
                    if (window.innerWidth > 768) {
                        if (e.key === 'ArrowDown') {
                            e.preventDefault();
                            const nextLink = submenuLinks[index + 1];
                            if (nextLink) {
                                nextLink.focus();
                            }
                        } else if (e.key === 'ArrowUp') {
                            e.preventDefault();
                            if (index === 0) {
                                link.focus();
                            } else {
                                const prevLink = submenuLinks[index - 1];
                                if (prevLink) {
                                    prevLink.focus();
                                }
                            }
                        } else if (e.key === 'Escape') {
                            e.preventDefault();
                            link.focus();
                        }
                    }
                });
            });
        }
    });
    
    // Current page highlighting enhancement
    function highlightCurrentPage() {
        const currentPath = window.location.pathname;
        const menuLinks = document.querySelectorAll('.nav-menu a');
        
        menuLinks.forEach(function(link) {
            const linkPath = new URL(link.href, window.location.origin).pathname;
            
            if (linkPath === currentPath) {
                link.closest('.menu-item').classList.add('current');
            }
        });
    }
    
    // Initialize current page highlighting
    highlightCurrentPage();
    
});

// Fallback for older browsers without addEventListener
if (!Element.prototype.addEventListener) {
    console.warn('Clean Header: This browser requires a polyfill for addEventListener');
}
