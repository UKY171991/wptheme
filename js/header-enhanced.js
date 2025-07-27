/**
 * Enhanced Header Navigation Scripts
 * Modern, accessible mobile menu functionality
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */

(function() {
    'use strict';
    
    /**
     * Enhanced Mobile Menu Handler
     */
    class EnhancedMobileMenu {
        constructor() {
            this.init();
        }
        
        init() {
            this.setupElements();
            this.bindEvents();
            this.setupAccessibility();
        }
        
        setupElements() {
            this.menuToggle = document.querySelector('.menu-toggle');
            this.mobileMenu = document.querySelector('#primary-menu');
            this.menuOverlay = document.querySelector('.menu-overlay');
            this.body = document.body;
            this.header = document.querySelector('.site-header');
            
            // Create overlay if it doesn't exist
            if (!this.menuOverlay && this.mobileMenu) {
                this.menuOverlay = document.createElement('div');
                this.menuOverlay.className = 'menu-overlay';
                this.menuOverlay.setAttribute('aria-hidden', 'true');
                document.body.appendChild(this.menuOverlay);
            }
        }
        
        bindEvents() {
            if (!this.menuToggle || !this.mobileMenu) return;
            
            // Menu toggle click
            this.menuToggle.addEventListener('click', (e) => {
                e.preventDefault();
                this.toggleMenu();
            });
            
            // Overlay click to close menu
            if (this.menuOverlay) {
                this.menuOverlay.addEventListener('click', () => {
                    this.closeMenu();
                });
            }
            
            // Keyboard navigation
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && this.isMenuOpen()) {
                    this.closeMenu();
                    this.menuToggle.focus();
                }
            });
            
            // Close menu on resize to desktop
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 992 && this.isMenuOpen()) {
                    this.closeMenu();
                }
            });
            
            // Handle dropdown toggles
            this.setupDropdowns();
        }
        
        setupDropdowns() {
            const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
            
            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', (e) => {
                    if (window.innerWidth < 992) {
                        e.preventDefault();
                        this.toggleDropdown(toggle);
                    }
                });
                
                // Keyboard support for dropdowns
                toggle.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' || e.key === ' ') {
                        if (window.innerWidth < 992) {
                            e.preventDefault();
                            this.toggleDropdown(toggle);
                        }
                    }
                });
            });
        }
        
        toggleDropdown(toggle) {
            const dropdownMenu = toggle.nextElementSibling;
            const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
            
            if (dropdownMenu && dropdownMenu.classList.contains('dropdown-menu')) {
                toggle.setAttribute('aria-expanded', !isExpanded);
                
                if (isExpanded) {
                    dropdownMenu.style.display = 'none';
                    toggle.classList.remove('show');
                } else {
                    dropdownMenu.style.display = 'block';
                    toggle.classList.add('show');
                }
            }
        }
        
        toggleMenu() {
            if (this.isMenuOpen()) {
                this.closeMenu();
            } else {
                this.openMenu();
            }
        }
        
        openMenu() {
            this.mobileMenu.classList.add('show');
            this.menuToggle.setAttribute('aria-expanded', 'true');
            this.menuToggle.setAttribute('aria-label', 'Close main menu');
            
            if (this.menuOverlay) {
                this.menuOverlay.classList.add('show');
            }
            
            this.body.style.overflow = 'hidden';
            this.trapFocus();
        }
        
        closeMenu() {
            this.mobileMenu.classList.remove('show');
            this.menuToggle.setAttribute('aria-expanded', 'false');
            this.menuToggle.setAttribute('aria-label', 'Open main menu');
            
            if (this.menuOverlay) {
                this.menuOverlay.classList.remove('show');
            }
            
            this.body.style.overflow = '';
            
            // Close any open dropdowns
            const openDropdowns = this.mobileMenu.querySelectorAll('.dropdown-toggle[aria-expanded="true"]');
            openDropdowns.forEach(dropdown => {
                dropdown.setAttribute('aria-expanded', 'false');
                dropdown.classList.remove('show');
                const menu = dropdown.nextElementSibling;
                if (menu) {
                    menu.style.display = 'none';
                }
            });
        }
        
        isMenuOpen() {
            return this.mobileMenu.classList.contains('show');
        }
        
        trapFocus() {
            const focusableElements = this.mobileMenu.querySelectorAll(
                'a[href], button, textarea, input[type="text"], input[type="radio"], input[type="checkbox"], select'
            );
            
            if (focusableElements.length === 0) return;
            
            const firstElement = focusableElements[0];
            const lastElement = focusableElements[focusableElements.length - 1];
            
            // Focus first element
            setTimeout(() => firstElement.focus(), 100);
            
            this.mobileMenu.addEventListener('keydown', (e) => {
                if (e.key === 'Tab') {
                    if (e.shiftKey) {
                        if (document.activeElement === firstElement) {
                            e.preventDefault();
                            lastElement.focus();
                        }
                    } else {
                        if (document.activeElement === lastElement) {
                            e.preventDefault();
                            firstElement.focus();
                        }
                    }
                }
            });
        }
        
        setupAccessibility() {
            // Ensure proper ARIA attributes
            if (this.menuToggle) {
                this.menuToggle.setAttribute('aria-controls', 'primary-menu');
                this.menuToggle.setAttribute('aria-expanded', 'false');
            }
            
            if (this.mobileMenu) {
                this.mobileMenu.setAttribute('aria-hidden', 'true');
            }
        }
    }
    
    /**
     * Header Scroll Effects
     */
    class HeaderScrollEffects {
        constructor() {
            this.header = document.querySelector('.site-header');
            this.lastScrollY = window.scrollY;
            this.init();
        }
        
        init() {
            if (!this.header) return;
            
            window.addEventListener('scroll', () => {
                this.handleScroll();
            });
        }
        
        handleScroll() {
            const currentScrollY = window.scrollY;
            
            // Add scrolled class for styling
            if (currentScrollY > 50) {
                this.header.classList.add('scrolled');
            } else {
                this.header.classList.remove('scrolled');
            }
            
            this.lastScrollY = currentScrollY;
        }
    }
    
    /**
     * Enhanced Dropdown Behavior
     */
    class EnhancedDropdowns {
        constructor() {
            this.init();
        }
        
        init() {
            // Only for desktop
            if (window.innerWidth >= 992) {
                this.setupDesktopDropdowns();
            }
            
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 992) {
                    this.setupDesktopDropdowns();
                } else {
                    this.removeDesktopDropdowns();
                }
            });
        }
        
        setupDesktopDropdowns() {
            const dropdowns = document.querySelectorAll('.dropdown');
            
            dropdowns.forEach(dropdown => {
                const toggle = dropdown.querySelector('.dropdown-toggle');
                const menu = dropdown.querySelector('.dropdown-menu');
                
                if (!toggle || !menu) return;
                
                // Show dropdown on hover
                dropdown.addEventListener('mouseenter', () => {
                    this.showDropdown(toggle, menu);
                });
                
                // Hide dropdown on mouse leave
                dropdown.addEventListener('mouseleave', () => {
                    this.hideDropdown(toggle, menu);
                });
                
                // Keyboard support
                toggle.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        if (toggle.getAttribute('aria-expanded') === 'true') {
                            this.hideDropdown(toggle, menu);
                        } else {
                            this.showDropdown(toggle, menu);
                        }
                    }
                });
            });
        }
        
        showDropdown(toggle, menu) {
            toggle.setAttribute('aria-expanded', 'true');
            menu.classList.add('show');
        }
        
        hideDropdown(toggle, menu) {
            toggle.setAttribute('aria-expanded', 'false');
            menu.classList.remove('show');
        }
        
        removeDesktopDropdowns() {
            const dropdownMenus = document.querySelectorAll('.dropdown-menu');
            dropdownMenus.forEach(menu => {
                menu.classList.remove('show');
            });
        }
    }
    
    /**
     * Initialize everything when DOM is ready
     */
    function initializeHeader() {
        new EnhancedMobileMenu();
        new HeaderScrollEffects();
        new EnhancedDropdowns();
        
        // Add loaded class for CSS animations
        document.body.classList.add('header-loaded');
    }
    
    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeHeader);
    } else {
        initializeHeader();
    }
    
})();
