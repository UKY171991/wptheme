/**
 * Enhanced Submenu Functionality
 * This script improves submenu and nested submenu behavior
 */

document.addEventListener('DOMContentLoaded', function() {
    initEnhancedSubmenus();
});

/**
 * Initialize enhanced submenu functionality
 */
function initEnhancedSubmenus() {
    // Handle all menu items with children
    const menuItemsWithChildren = document.querySelectorAll('.menu-item-has-children');
    
    menuItemsWithChildren.forEach(function(item) {
        const link = item.querySelector('a');
        const submenu = item.querySelector('.sub-menu');
        
        if (!link || !submenu) return;
        
        // Add aria attributes for accessibility
        link.setAttribute('aria-haspopup', 'true');
        link.setAttribute('aria-expanded', 'false');
        
        // Add unique ID to submenu
        const submenuId = 'submenu-' + Math.random().toString(36).substr(2, 9);
        submenu.setAttribute('id', submenuId);
        link.setAttribute('aria-controls', submenuId);
        
        // Create submenu toggle button for mobile
        const submenuToggle = document.createElement('button');
        submenuToggle.className = 'submenu-toggle';
        submenuToggle.setAttribute('aria-expanded', 'false');
        submenuToggle.setAttribute('aria-label', 'Toggle submenu');
        
        // Insert toggle button after the link
        item.appendChild(submenuToggle);
        
        // Handle desktop hover events
        if (window.innerWidth > 992) {
            // Mouse enter event
            item.addEventListener('mouseenter', function() {
                openSubmenu(item, link, submenu);
            });
            
            // Mouse leave event
            item.addEventListener('mouseleave', function() {
                closeSubmenu(item, link, submenu);
            });
            
            // Focus events for keyboard navigation
            link.addEventListener('focus', function() {
                // Close all other open submenus
                menuItemsWithChildren.forEach(function(otherItem) {
                    if (otherItem !== item && otherItem.contains(document.activeElement) === false) {
                        const otherLink = otherItem.querySelector('a');
                        const otherSubmenu = otherItem.querySelector('.sub-menu');
                        closeSubmenu(otherItem, otherLink, otherSubmenu);
                    }
                });
                
                openSubmenu(item, link, submenu);
            });
        }
        
        // Handle mobile click events
        submenuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            
            if (isExpanded) {
                closeSubmenu(item, link, submenu);
            } else {
                // Close sibling submenus if any
                const siblings = Array.from(item.parentNode.children).filter(child => 
                    child.classList.contains('menu-item-has-children') && child !== item
                );
                
                siblings.forEach(function(sibling) {
                    const siblingLink = sibling.querySelector('a');
                    const siblingSubmenu = sibling.querySelector('.sub-menu');
                    const siblingToggle = sibling.querySelector('.submenu-toggle');
                    
                    if (siblingToggle) {
                        siblingToggle.setAttribute('aria-expanded', 'false');
                    }
                    
                    closeSubmenu(sibling, siblingLink, siblingSubmenu);
                });
                
                openSubmenu(item, link, submenu);
            }
        });
        
        // Handle keyboard navigation
        link.addEventListener('keydown', function(e) {
            // Enter or Space key
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                
                const isExpanded = link.getAttribute('aria-expanded') === 'true';
                
                if (isExpanded) {
                    closeSubmenu(item, link, submenu);
                } else {
                    openSubmenu(item, link, submenu);
                    
                    // Focus first item in submenu
                    const firstSubmenuLink = submenu.querySelector('a');
                    if (firstSubmenuLink) {
                        setTimeout(() => {
                            firstSubmenuLink.focus();
                        }, 100);
                    }
                }
            }
            
            // Arrow down key
            if (e.key === 'ArrowDown' && item.classList.contains('menu-item-has-children')) {
                e.preventDefault();
                
                openSubmenu(item, link, submenu);
                
                // Focus first item in submenu
                const firstSubmenuLink = submenu.querySelector('a');
                if (firstSubmenuLink) {
                    firstSubmenuLink.focus();
                }
            }
            
            // Arrow right key (for nested submenus)
            if (e.key === 'ArrowRight' && item.parentNode.classList.contains('sub-menu') && item.classList.contains('menu-item-has-children')) {
                e.preventDefault();
                
                openSubmenu(item, link, submenu);
                
                // Focus first item in submenu
                const firstSubmenuLink = submenu.querySelector('a');
                if (firstSubmenuLink) {
                    firstSubmenuLink.focus();
                }
            }
            
            // Arrow left key (to go back to parent menu)
            if (e.key === 'ArrowLeft' && item.parentNode.classList.contains('sub-menu')) {
                e.preventDefault();
                
                // Find parent menu item
                const parentMenuItem = item.parentNode.closest('.menu-item-has-children');
                if (parentMenuItem) {
                    const parentLink = parentMenuItem.querySelector('a');
                    parentLink.focus();
                }
            }
        });
        
        // Add keyboard navigation for submenu items
        const submenuLinks = submenu.querySelectorAll('a');
        submenuLinks.forEach(function(submenuLink, index) {
            submenuLink.addEventListener('keydown', function(e) {
                // Escape key closes current submenu and focuses parent link
                if (e.key === 'Escape') {
                    e.preventDefault();
                    closeSubmenu(item, link, submenu);
                    link.focus();
                }
                
                // Arrow up key
                if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    
                    // Focus previous item or parent link
                    if (index > 0) {
                        submenuLinks[index - 1].focus();
                    } else {
                        link.focus();
                    }
                }
                
                // Arrow down key
                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    
                    // Focus next item if available
                    if (index < submenuLinks.length - 1) {
                        submenuLinks[index + 1].focus();
                    }
                }
            });
        });
    });
    
    // Close submenus when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.menu-item-has-children')) {
            menuItemsWithChildren.forEach(function(item) {
                const link = item.querySelector('a');
                const submenu = item.querySelector('.sub-menu');
                closeSubmenu(item, link, submenu);
            });
        }
    });
    
    // Handle window resize
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            const isMobile = window.innerWidth <= 992;
            
            menuItemsWithChildren.forEach(function(item) {
                const link = item.querySelector('a');
                const submenu = item.querySelector('.sub-menu');
                
                // Reset all menus on resize
                closeSubmenu(item, link, submenu);
                
                // Reset submenu styles
                if (isMobile) {
                    submenu.style.display = '';
                    submenu.style.opacity = '';
                    submenu.style.transform = '';
                } else {
                    submenu.style.maxHeight = '';
                }
            });
        }, 250);
    });
}

/**
 * Open submenu
 * @param {HTMLElement} item - Menu item
 * @param {HTMLElement} link - Menu link
 * @param {HTMLElement} submenu - Submenu element
 */
function openSubmenu(item, link, submenu) {
    const isMobile = window.innerWidth <= 992;
    const submenuToggle = item.querySelector('.submenu-toggle');
    
    item.classList.add('active');
    link.setAttribute('aria-expanded', 'true');
    
    if (submenuToggle) {
        submenuToggle.setAttribute('aria-expanded', 'true');
    }
    
    if (isMobile) {
        // Mobile animation
        submenu.style.display = 'block';
        const height = submenu.scrollHeight;
        submenu.style.maxHeight = height + 'px';
    } else {
        // Desktop animation
        submenu.classList.add('active');
    }
}

/**
 * Close submenu
 * @param {HTMLElement} item - Menu item
 * @param {HTMLElement} link - Menu link
 * @param {HTMLElement} submenu - Submenu element
 */
function closeSubmenu(item, link, submenu) {
    if (!item || !link || !submenu) return;
    
    const isMobile = window.innerWidth <= 992;
    const submenuToggle = item.querySelector('.submenu-toggle');
    
    item.classList.remove('active');
    link.setAttribute('aria-expanded', 'false');
    
    if (submenuToggle) {
        submenuToggle.setAttribute('aria-expanded', 'false');
    }
    
    if (isMobile) {
        // Mobile animation
        submenu.style.maxHeight = '0';
    } else {
        // Desktop animation
        submenu.classList.remove('active');
    }
    
    // Also close any nested submenus
    const nestedItems = submenu.querySelectorAll('.menu-item-has-children');
    nestedItems.forEach(function(nestedItem) {
        const nestedLink = nestedItem.querySelector('a');
        const nestedSubmenu = nestedItem.querySelector('.sub-menu');
        closeSubmenu(nestedItem, nestedLink, nestedSubmenu);
    });
}