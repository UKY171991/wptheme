/**
 * Simple Header Menu Fix
 * Ensures navigation menu is always visible
 */

(function() {
    'use strict';
    
    function ensureMenuVisibility() {
        const menu = document.querySelector('#primary-menu');
        const menuToggle = document.querySelector('.menu-toggle');
        
        if (!menu) {
            console.warn('Primary menu not found');
            return;
        }
        
        // Force menu visibility on desktop
        function updateMenuVisibility() {
            if (window.innerWidth >= 992) {
                menu.style.display = 'flex';
                menu.classList.add('show');
                if (menuToggle) {
                    menuToggle.style.display = 'none';
                }
            } else {
                menu.style.display = '';
                menu.classList.remove('show');
                if (menuToggle) {
                    menuToggle.style.display = 'flex';
                }
            }
        }
        
        // Initial check
        updateMenuVisibility();
        
        // Check on resize
        window.addEventListener('resize', updateMenuVisibility);
        
        // Mobile menu toggle
        if (menuToggle) {
            menuToggle.addEventListener('click', function(e) {
                e.preventDefault();
                if (window.innerWidth < 992) {
                    menu.classList.toggle('show');
                    const isExpanded = menu.classList.contains('show');
                    menuToggle.setAttribute('aria-expanded', isExpanded);
                }
            });
        }
        
        console.log('Header menu initialized successfully');
    }
    
    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', ensureMenuVisibility);
    } else {
        ensureMenuVisibility();
    }
    
})();
