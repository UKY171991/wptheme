/**
 * Advanced Submenu Management System
 * Handles dropdown positioning, viewport edge detection, and touch interactions
 */

class AdvancedSubmenuManager {
    constructor() {
        this.menuItems = document.querySelectorAll('.nav-menu .menu-item');
        this.viewportWidth = window.innerWidth;
        this.isTouchDevice = 'ontouchstart' in window;
        this.activeDropdowns = new Set();
        
        this.init();
    }
    
    init() {
        this.setupMenuItems();
        this.bindEvents();
        this.detectEdgeItems();
        
        // Initialize viewport monitoring
        this.monitorViewport();
        
        // Handle initial load
        this.handleInitialState();
    }
    
    setupMenuItems() {
        this.menuItems.forEach(item => {
            const hasSubmenu = item.querySelector('.sub-menu');
            const link = item.querySelector('a');
            
            if (hasSubmenu) {
                // Add dropdown class
                item.classList.add('has-dropdown');
                
                // Add ARIA attributes
                if (link) {
                    link.setAttribute('aria-haspopup', 'true');
                    link.setAttribute('aria-expanded', 'false');
                    
                    // Add dropdown indicator
                    if (!link.querySelector('.dropdown-toggle')) {
                        const indicator = document.createElement('span');
                        indicator.className = 'dropdown-toggle';
                        indicator.setAttribute('aria-hidden', 'true');
                        link.appendChild(indicator);
                    }
                }
                
                // Set submenu ARIA attributes
                hasSubmenu.setAttribute('role', 'menu');
                hasSubmenu.setAttribute('aria-hidden', 'true');
                
                // Setup submenu items
                const submenuItems = hasSubmenu.querySelectorAll('.menu-item');
                submenuItems.forEach(subItem => {
                    const subLink = subItem.querySelector('a');
                    if (subLink) {
                        subLink.setAttribute('role', 'menuitem');
                        subLink.setAttribute('tabindex', '-1');
                    }
                });
            }
        });
    }
    
    bindEvents() {
        this.menuItems.forEach(item => {
            const hasSubmenu = item.querySelector('.sub-menu');
            const link = item.querySelector('a');
            
            if (hasSubmenu) {
                if (this.isTouchDevice) {
                    this.bindTouchEvents(item, link, hasSubmenu);
                } else {
                    this.bindMouseEvents(item, link, hasSubmenu);
                }
                
                this.bindKeyboardEvents(item, link, hasSubmenu);
            }
        });
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.nav-menu')) {
                this.closeAllDropdowns();
            }
        });
        
        // Handle escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                this.closeAllDropdowns();
            }
        });
    }
    
    bindMouseEvents(item, link, submenu) {
        let hoverTimeout;
        
        // Mouse enter
        item.addEventListener('mouseenter', () => {
            clearTimeout(hoverTimeout);
            this.openDropdown(item, submenu);
        });
        
        // Mouse leave with delay
        item.addEventListener('mouseleave', () => {
            hoverTimeout = setTimeout(() => {
                this.closeDropdown(item, submenu);
            }, 300);
        });
        
        // Prevent closing when moving over submenu
        submenu.addEventListener('mouseenter', () => {
            clearTimeout(hoverTimeout);
        });
    }
    
    bindTouchEvents(item, link, submenu) {
        let touchTimeout;
        
        link.addEventListener('click', (e) => {
            if (item.classList.contains('touch-open')) {
                // Second tap - follow link
                return true;
            } else {
                // First tap - open dropdown
                e.preventDefault();
                this.closeAllDropdowns();
                this.openDropdown(item, submenu);
                item.classList.add('touch-open');
            }
        });
        
        // Close on touch outside with delay
        document.addEventListener('touchstart', (e) => {
            if (!item.contains(e.target)) {
                touchTimeout = setTimeout(() => {
                    this.closeDropdown(item, submenu);
                    item.classList.remove('touch-open');
                }, 100);
            }
        });
    }
    
    bindKeyboardEvents(item, link, submenu) {
        link.addEventListener('keydown', (e) => {
            switch (e.key) {
                case 'ArrowDown':
                    e.preventDefault();
                    this.openDropdown(item, submenu);
                    this.focusFirstSubmenuItem(submenu);
                    break;
                    
                case 'ArrowUp':
                    e.preventDefault();
                    this.openDropdown(item, submenu);
                    this.focusLastSubmenuItem(submenu);
                    break;
                    
                case 'ArrowRight':
                    if (item.closest('.sub-menu')) {
                        e.preventDefault();
                        this.openDropdown(item, submenu);
                        this.focusFirstSubmenuItem(submenu);
                    }
                    break;
                    
                case 'Enter':
                case ' ':
                    if (submenu) {
                        e.preventDefault();
                        this.toggleDropdown(item, submenu);
                    }
                    break;
            }
        });
        
        // Handle submenu keyboard navigation
        const submenuItems = submenu.querySelectorAll('.menu-item > a');
        submenuItems.forEach((subLink, index) => {
            subLink.addEventListener('keydown', (e) => {
                switch (e.key) {
                    case 'ArrowDown':
                        e.preventDefault();
                        this.focusNextSubmenuItem(submenuItems, index);
                        break;
                        
                    case 'ArrowUp':
                        e.preventDefault();
                        this.focusPreviousSubmenuItem(submenuItems, index);
                        break;
                        
                    case 'ArrowLeft':
                        e.preventDefault();
                        this.closeDropdown(item, submenu);
                        link.focus();
                        break;
                        
                    case 'Escape':
                        e.preventDefault();
                        this.closeDropdown(item, submenu);
                        link.focus();
                        break;
                }
            });
        });
    }
    
    openDropdown(item, submenu) {
        // Close other dropdowns at same level
        const parentMenu = item.parentElement;
        const siblings = parentMenu.querySelectorAll(':scope > .menu-item.dropdown-open');
        siblings.forEach(sibling => {
            if (sibling !== item) {
                this.closeDropdown(sibling, sibling.querySelector('.sub-menu'));
            }
        });
        
        // Position submenu
        this.positionSubmenu(item, submenu);
        
        // Open current dropdown
        item.classList.add('dropdown-open');
        submenu.setAttribute('aria-hidden', 'false');
        
        const link = item.querySelector('a');
        if (link) {
            link.setAttribute('aria-expanded', 'true');
        }
        
        this.activeDropdowns.add(item);
        
        // Enable focus for submenu items
        const submenuItems = submenu.querySelectorAll('.menu-item > a');
        submenuItems.forEach(subLink => {
            subLink.setAttribute('tabindex', '0');
        });
    }
    
    closeDropdown(item, submenu) {
        item.classList.remove('dropdown-open');
        submenu.setAttribute('aria-hidden', 'true');
        
        const link = item.querySelector('a');
        if (link) {
            link.setAttribute('aria-expanded', 'false');
        }
        
        this.activeDropdowns.delete(item);
        
        // Disable focus for submenu items
        const submenuItems = submenu.querySelectorAll('.menu-item > a');
        submenuItems.forEach(subLink => {
            subLink.setAttribute('tabindex', '-1');
        });
        
        // Close child dropdowns
        const childDropdowns = submenu.querySelectorAll('.menu-item.dropdown-open');
        childDropdowns.forEach(child => {
            const childSubmenu = child.querySelector('.sub-menu');
            if (childSubmenu) {
                this.closeDropdown(child, childSubmenu);
            }
        });
    }
    
    toggleDropdown(item, submenu) {
        if (item.classList.contains('dropdown-open')) {
            this.closeDropdown(item, submenu);
        } else {
            this.openDropdown(item, submenu);
        }
    }
    
    closeAllDropdowns() {
        this.activeDropdowns.forEach(item => {
            const submenu = item.querySelector('.sub-menu');
            if (submenu) {
                this.closeDropdown(item, submenu);
            }
        });
        
        // Remove touch classes
        const touchItems = document.querySelectorAll('.menu-item.touch-open');
        touchItems.forEach(item => {
            item.classList.remove('touch-open');
        });
    }
    
    positionSubmenu(item, submenu) {
        // Reset positioning classes
        item.classList.remove('dropdown-right', 'dropdown-up');
        
        // Get viewport dimensions
        const viewport = {
            width: window.innerWidth,
            height: window.innerHeight
        };
        
        // Get item position
        const itemRect = item.getBoundingClientRect();
        const submenuRect = submenu.getBoundingClientRect();
        
        // Check horizontal overflow
        const rightEdge = itemRect.left + submenuRect.width;
        if (rightEdge > viewport.width - 20) {
            item.classList.add('dropdown-right');
        }
        
        // Check vertical overflow
        const bottomEdge = itemRect.bottom + submenuRect.height;
        if (bottomEdge > viewport.height - 20) {
            item.classList.add('dropdown-up');
        }
        
        // Position multi-level submenus
        const isMultiLevel = item.closest('.sub-menu');
        if (isMultiLevel) {
            this.positionMultiLevelSubmenu(item, submenu, viewport);
        }
    }
    
    positionMultiLevelSubmenu(item, submenu, viewport) {
        const itemRect = item.getBoundingClientRect();
        const submenuRect = submenu.getBoundingClientRect();
        
        // Check if submenu would overflow on the right
        const rightEdge = itemRect.right + submenuRect.width;
        if (rightEdge > viewport.width - 20) {
            item.classList.add('dropdown-left');
        }
        
        // Adjust vertical position if needed
        const bottomEdge = itemRect.top + submenuRect.height;
        if (bottomEdge > viewport.height - 20) {
            const adjustedTop = viewport.height - submenuRect.height - 20;
            submenu.style.top = `${adjustedTop - itemRect.top}px`;
        }
    }
    
    detectEdgeItems() {
        const menuRect = document.querySelector('.nav-menu').getBoundingClientRect();
        const threshold = menuRect.width * 0.7;
        
        this.menuItems.forEach(item => {
            const itemRect = item.getBoundingClientRect();
            if (itemRect.left > threshold) {
                item.classList.add('edge-item');
            }
        });
    }
    
    focusFirstSubmenuItem(submenu) {
        const firstItem = submenu.querySelector('.menu-item > a');
        if (firstItem) {
            firstItem.focus();
        }
    }
    
    focusLastSubmenuItem(submenu) {
        const items = submenu.querySelectorAll('.menu-item > a');
        const lastItem = items[items.length - 1];
        if (lastItem) {
            lastItem.focus();
        }
    }
    
    focusNextSubmenuItem(items, currentIndex) {
        const nextIndex = (currentIndex + 1) % items.length;
        items[nextIndex].focus();
    }
    
    focusPreviousSubmenuItem(items, currentIndex) {
        const prevIndex = currentIndex === 0 ? items.length - 1 : currentIndex - 1;
        items[prevIndex].focus();
    }
    
    monitorViewport() {
        let resizeTimeout;
        
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                this.viewportWidth = window.innerWidth;
                this.detectEdgeItems();
                this.closeAllDropdowns();
            }, 250);
        });
        
        // Monitor orientation changes
        window.addEventListener('orientationchange', () => {
            setTimeout(() => {
                this.viewportWidth = window.innerWidth;
                this.detectEdgeItems();
                this.closeAllDropdowns();
            }, 500);
        });
    }
    
    handleInitialState() {
        // Handle page load with hash fragments
        if (window.location.hash) {
            const targetElement = document.querySelector(window.location.hash);
            if (targetElement) {
                // Check if target is in a submenu
                const parentMenuItem = targetElement.closest('.menu-item');
                if (parentMenuItem) {
                    const parentSubmenu = parentMenuItem.closest('.sub-menu');
                    if (parentSubmenu) {
                        const grandParentItem = parentSubmenu.closest('.menu-item');
                        if (grandParentItem) {
                            this.openDropdown(grandParentItem, parentSubmenu);
                        }
                    }
                }
            }
        }
    }
    
    // Public API methods
    refreshPositioning() {
        this.detectEdgeItems();
        this.activeDropdowns.forEach(item => {
            const submenu = item.querySelector('.sub-menu');
            if (submenu) {
                this.positionSubmenu(item, submenu);
            }
        });
    }
    
    destroy() {
        this.closeAllDropdowns();
        
        // Remove event listeners and classes
        this.menuItems.forEach(item => {
            item.classList.remove('has-dropdown', 'dropdown-open', 'dropdown-right', 'dropdown-up', 'edge-item', 'touch-open');
            
            const submenu = item.querySelector('.sub-menu');
            if (submenu) {
                submenu.removeAttribute('aria-hidden');
                submenu.removeAttribute('role');
            }
            
            const link = item.querySelector('a');
            if (link) {
                link.removeAttribute('aria-haspopup');
                link.removeAttribute('aria-expanded');
            }
        });
    }
}

// Mobile Menu Integration
class MobileMenuManager {
    constructor() {
        this.menuToggle = document.querySelector('.menu-toggle');
        this.navigation = document.querySelector('.main-navigation');
        this.navMenu = document.querySelector('.nav-menu');
        this.isOpen = false;
        
        this.init();
    }
    
    init() {
        if (!this.menuToggle || !this.navigation) return;
        
        this.bindEvents();
        this.setupSubmenuToggles();
    }
    
    bindEvents() {
        this.menuToggle.addEventListener('click', (e) => {
            e.preventDefault();
            this.toggleMenu();
        });
        
        // Close menu on outside click
        document.addEventListener('click', (e) => {
            if (this.isOpen && !this.navigation.contains(e.target)) {
                this.closeMenu();
            }
        });
        
        // Handle escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.isOpen) {
                this.closeMenu();
                this.menuToggle.focus();
            }
        });
    }
    
    setupSubmenuToggles() {
        const submenuItems = this.navMenu.querySelectorAll('.menu-item-has-children');
        
        submenuItems.forEach(item => {
            const link = item.querySelector('a');
            const submenu = item.querySelector('.sub-menu');
            
            if (link && submenu) {
                // Create toggle button for mobile
                const toggleBtn = document.createElement('button');
                toggleBtn.className = 'submenu-toggle';
                toggleBtn.setAttribute('aria-expanded', 'false');
                toggleBtn.setAttribute('aria-label', 'Toggle submenu');
                toggleBtn.innerHTML = '<span class="screen-reader-text">Toggle submenu</span>';
                
                item.appendChild(toggleBtn);
                
                toggleBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    this.toggleSubmenu(item, submenu, toggleBtn);
                });
            }
        });
    }
    
    toggleMenu() {
        if (this.isOpen) {
            this.closeMenu();
        } else {
            this.openMenu();
        }
    }
    
    openMenu() {
        this.navigation.classList.add('mobile-menu-open');
        this.menuToggle.classList.add('active');
        this.menuToggle.setAttribute('aria-expanded', 'true');
        this.isOpen = true;
        
        // Set focus to first menu item
        const firstMenuItem = this.navMenu.querySelector('.menu-item a');
        if (firstMenuItem) {
            firstMenuItem.focus();
        }
        
        // Prevent body scroll
        document.body.style.overflow = 'hidden';
    }
    
    closeMenu() {
        this.navigation.classList.remove('mobile-menu-open');
        this.menuToggle.classList.remove('active');
        this.menuToggle.setAttribute('aria-expanded', 'false');
        this.isOpen = false;
        
        // Close all submenus
        const openSubmenus = this.navMenu.querySelectorAll('.menu-item.mobile-open');
        openSubmenus.forEach(item => {
            const submenu = item.querySelector('.sub-menu');
            const toggle = item.querySelector('.submenu-toggle');
            if (submenu && toggle) {
                this.closeSubmenu(item, submenu, toggle);
            }
        });
        
        // Restore body scroll
        document.body.style.overflow = '';
    }
    
    toggleSubmenu(item, submenu, toggleBtn) {
        if (item.classList.contains('mobile-open')) {
            this.closeSubmenu(item, submenu, toggleBtn);
        } else {
            this.openSubmenu(item, submenu, toggleBtn);
        }
    }
    
    openSubmenu(item, submenu, toggleBtn) {
        item.classList.add('mobile-open');
        toggleBtn.setAttribute('aria-expanded', 'true');
        submenu.style.maxHeight = submenu.scrollHeight + 'px';
    }
    
    closeSubmenu(item, submenu, toggleBtn) {
        item.classList.remove('mobile-open');
        toggleBtn.setAttribute('aria-expanded', 'false');
        submenu.style.maxHeight = '';
        
        // Close nested submenus
        const nestedItems = submenu.querySelectorAll('.menu-item.mobile-open');
        nestedItems.forEach(nestedItem => {
            const nestedSubmenu = nestedItem.querySelector('.sub-menu');
            const nestedToggle = nestedItem.querySelector('.submenu-toggle');
            if (nestedSubmenu && nestedToggle) {
                this.closeSubmenu(nestedItem, nestedSubmenu, nestedToggle);
            }
        });
    }
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    // Initialize submenu manager for desktop
    if (window.innerWidth > 768) {
        window.submenuManager = new AdvancedSubmenuManager();
    }
    
    // Initialize mobile menu manager
    window.mobileMenuManager = new MobileMenuManager();
    
    // Reinitialize on viewport changes
    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            if (window.innerWidth > 768) {
                if (!window.submenuManager) {
                    window.submenuManager = new AdvancedSubmenuManager();
                }
            } else {
                if (window.submenuManager) {
                    window.submenuManager.destroy();
                    window.submenuManager = null;
                }
            }
        }, 250);
    });
});

// Export for potential external use
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { AdvancedSubmenuManager, MobileMenuManager };
}
