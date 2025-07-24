/**
 * Clean Header JavaScript
 * Mobile menu toggle and dropdown functionality
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Mobile menu toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('.nav-menu');
    
    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', function() {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            
            // Toggle aria-expanded
            menuToggle.setAttribute('aria-expanded', !isExpanded);
            
            // Toggle menu visibility
            navMenu.classList.toggle('show');
            
            // Toggle button state
            menuToggle.classList.toggle('active');
            
            // Prevent body scroll when menu is open
            if (navMenu.classList.contains('show')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        });
    }
    
    // Mobile dropdown functionality
    const dropdownItems = document.querySelectorAll('.menu-item.has-dropdown > a');
    
    dropdownItems.forEach(function(item) {
        item.addEventListener('click', function(e) {
            // Only handle dropdown toggle on mobile
            if (window.innerWidth <= 768) {
                e.preventDefault();
                
                const parentItem = item.closest('.menu-item');
                const isOpen = parentItem.classList.contains('show-submenu');
                
                // Close all other dropdowns
                document.querySelectorAll('.menu-item.show-submenu').forEach(function(openItem) {
                    if (openItem !== parentItem) {
                        openItem.classList.remove('show-submenu');
                    }
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
