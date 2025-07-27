/**
 * WordPress Standard Menu JavaScript
 * Handles navigation menu functionality following WordPress conventions
 */

(function() {
    'use strict';
    
    function initWordPressMenu() {
        const menu = document.querySelector('#primary-menu, .menu-wrapper');
        const menuToggle = document.querySelector('.menu-toggle');
        const menuOverlay = document.querySelector('.menu-overlay');
        const body = document.body;
        
        if (!menu || !menuToggle) {
            console.warn('Required menu elements not found');
            return;
        }
        
        // Ensure menu visibility on desktop
        function updateMenuVisibility() {
            if (window.innerWidth >= 992) {
                menu.style.display = 'flex';
                menu.classList.remove('show');
                menuToggle.setAttribute('aria-expanded', 'false');
                body.style.overflow = '';
                if (menuOverlay) {
                    menuOverlay.classList.remove('show');
                }
            } else {
                menu.style.display = '';
            }
        }
        
        // Mobile menu toggle
        menuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            
            if (window.innerWidth < 992) {
                const isOpen = menu.classList.contains('show');
                
                if (isOpen) {
                    // Close menu
                    menu.classList.remove('show');
                    menuToggle.setAttribute('aria-expanded', 'false');
                    menuToggle.setAttribute('aria-label', 'Open main menu');
                    body.style.overflow = '';
                    if (menuOverlay) {
                        menuOverlay.classList.remove('show');
                    }
                } else {
                    // Open menu
                    menu.classList.add('show');
                    menuToggle.setAttribute('aria-expanded', 'true');
                    menuToggle.setAttribute('aria-label', 'Close main menu');
                    body.style.overflow = 'hidden';
                    if (menuOverlay) {
                        menuOverlay.classList.add('show');
                    }
                    
                    // Focus first menu item
                    setTimeout(() => {
                        const firstLink = menu.querySelector('a');
                        if (firstLink) {
                            firstLink.focus();
                        }
                    }, 100);
                }
            }
        });
        
        // Close menu when overlay is clicked
        if (menuOverlay) {
            menuOverlay.addEventListener('click', function() {
                menu.classList.remove('show');
                menuToggle.setAttribute('aria-expanded', 'false');
                menuToggle.setAttribute('aria-label', 'Open main menu');
                body.style.overflow = '';
                menuOverlay.classList.remove('show');
            });
        }
        
        // Handle mobile dropdown toggles
        const menuItemsWithChildren = document.querySelectorAll('.menu-item-has-children');
        
        menuItemsWithChildren.forEach(function(item) {
            const link = item.querySelector('a');
            const submenu = item.querySelector('.sub-menu');
            
            if (link && submenu) {
                // Clone the link for mobile toggle
                const toggleLink = link.cloneNode(true);
                toggleLink.setAttribute('href', '#');
                toggleLink.setAttribute('role', 'button');
                toggleLink.setAttribute('aria-expanded', 'false');
                
                toggleLink.addEventListener('click', function(e) {
                    if (window.innerWidth < 992) {
                        e.preventDefault();
                        
                        const isOpen = item.classList.contains('open');
                        
                        // Close all other open submenus at the same level
                        const siblings = item.parentNode.children;
                        for (let i = 0; i < siblings.length; i++) {
                            if (siblings[i] !== item && siblings[i].classList.contains('open')) {
                                siblings[i].classList.remove('open');
                                const siblingLink = siblings[i].querySelector('a');
                                if (siblingLink) {
                                    siblingLink.setAttribute('aria-expanded', 'false');
                                }
                            }
                        }
                        
                        // Toggle current submenu
                        if (isOpen) {
                            item.classList.remove('open');
                            toggleLink.setAttribute('aria-expanded', 'false');
                        } else {
                            item.classList.add('open');
                            toggleLink.setAttribute('aria-expanded', 'true');
                        }
                    }
                });
                
                // Replace original link with toggle link on mobile
                if (window.innerWidth < 992) {
                    link.parentNode.replaceChild(toggleLink, link);
                }
            }
        });
        
        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && menu.classList.contains('show')) {
                menu.classList.remove('show');
                menuToggle.setAttribute('aria-expanded', 'false');
                menuToggle.setAttribute('aria-label', 'Open main menu');
                body.style.overflow = '';
                if (menuOverlay) {
                    menuOverlay.classList.remove('show');
                }
                menuToggle.focus();
            }
        });
        
        // Handle window resize
        window.addEventListener('resize', function() {
            updateMenuVisibility();
            
            // Close mobile menu if resizing to desktop
            if (window.innerWidth >= 992 && menu.classList.contains('show')) {
                menu.classList.remove('show');
                menuToggle.setAttribute('aria-expanded', 'false');
                body.style.overflow = '';
                if (menuOverlay) {
                    menuOverlay.classList.remove('show');
                }
            }
        });
        
        // Initial setup
        updateMenuVisibility();
        
        console.log('WordPress standard menu initialized successfully');
    }
    
    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initWordPressMenu);
    } else {
        initWordPressMenu();
    }
    
})();
