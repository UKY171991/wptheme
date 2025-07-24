/**
 * 🚀 ULTIMATE RESPONSIVE MENU FIX - JAVASCRIPT
 * Comprehensive mobile menu functionality and submenu fixes
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // ===========================================
    // NUCLEAR SUBMENU Z-INDEX ENFORCEMENT
    // ===========================================
    
    function enforceSubmenuZIndex() {
        const submenus = document.querySelectorAll('.nav-menu .sub-menu');
        submenus.forEach(function(submenu) {
            submenu.style.zIndex = '2147483647';
            submenu.style.position = 'absolute';
            submenu.style.background = '#0b1133';
            submenu.style.border = '3px solid #ff5f00';
            submenu.style.boxShadow = '0 20px 60px rgba(0,0,0,0.8)';
            submenu.style.minWidth = '280px';
        });
    }
    
    // ===========================================
    // MOBILE MENU TOGGLE FUNCTIONALITY
    // ===========================================
    
    function createMobileMenuToggle() {
        const headerContent = document.querySelector('.header-content');
        const navigation = document.querySelector('.main-navigation');
        
        if (!headerContent || !navigation) return;
        
        // Create mobile menu toggle button if it doesn't exist
        let mobileToggle = document.querySelector('.mobile-menu-toggle');
        if (!mobileToggle) {
            mobileToggle = document.createElement('button');
            mobileToggle.className = 'mobile-menu-toggle';
            mobileToggle.innerHTML = '<i class="fas fa-bars"></i>';
            mobileToggle.setAttribute('aria-label', 'Toggle mobile menu');
            headerContent.appendChild(mobileToggle);
        }
        
        // Toggle mobile menu
        mobileToggle.addEventListener('click', function() {
            navigation.classList.toggle('active');
            const icon = mobileToggle.querySelector('i');
            if (navigation.classList.contains('active')) {
                icon.className = 'fas fa-times';
                mobileToggle.setAttribute('aria-expanded', 'true');
            } else {
                icon.className = 'fas fa-bars';
                mobileToggle.setAttribute('aria-expanded', 'false');
            }
        });
    }
    
    // ===========================================
    // MOBILE SUBMENU FUNCTIONALITY
    // ===========================================
    
    function setupMobileSubmenus() {
        const menuItems = document.querySelectorAll('.nav-menu .menu-item-has-children');
        
        menuItems.forEach(function(item) {
            const link = item.querySelector('> a');
            if (!link) return;
            
            // Add click handler for mobile submenu toggle
            link.addEventListener('click', function(e) {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    item.classList.toggle('active');
                    
                    // Close other open submenus
                    menuItems.forEach(function(otherItem) {
                        if (otherItem !== item) {
                            otherItem.classList.remove('active');
                        }
                    });
                }
            });
        });
    }
    
    // ===========================================
    // DESKTOP SUBMENU HOVER FIXES
    // ===========================================
    
    function setupDesktopSubmenus() {
        const menuItems = document.querySelectorAll('.nav-menu .menu-item-has-children');
        
        menuItems.forEach(function(item) {
            const submenu = item.querySelector('.sub-menu');
            if (!submenu) return;
            
            // Force submenu visibility on hover
            item.addEventListener('mouseenter', function() {
                if (window.innerWidth > 768) {
                    submenu.style.opacity = '1';
                    submenu.style.visibility = 'visible';
                    submenu.style.display = 'block';
                    submenu.style.zIndex = '2147483647';
                    submenu.style.transform = 'translateY(0)';
                }
            });
            
            item.addEventListener('mouseleave', function() {
                if (window.innerWidth > 768) {
                    submenu.style.opacity = '0';
                    submenu.style.visibility = 'hidden';
                    submenu.style.transform = 'translateY(10px)';
                }
            });
        });
    }
    
    // ===========================================
    // RESPONSIVE HANDLER
    // ===========================================
    
    function handleResize() {
        const navigation = document.querySelector('.main-navigation');
        const mobileToggle = document.querySelector('.mobile-menu-toggle');
        
        if (window.innerWidth > 768) {
            // Desktop mode
            if (navigation) {
                navigation.classList.remove('active');
                navigation.style.display = '';
            }
            if (mobileToggle) {
                const icon = mobileToggle.querySelector('i');
                if (icon) icon.className = 'fas fa-bars';
                mobileToggle.setAttribute('aria-expanded', 'false');
            }
            
            // Remove mobile submenu active states
            const menuItems = document.querySelectorAll('.nav-menu .menu-item-has-children');
            menuItems.forEach(function(item) {
                item.classList.remove('active');
            });
        }
        
        // Re-enforce submenu z-index
        enforceSubmenuZIndex();
    }
    
    // ===========================================
    // SMOOTH SCROLLING FIX
    // ===========================================
    
    function fixSmoothScrolling() {
        const links = document.querySelectorAll('a[href^="#"]');
        links.forEach(function(link) {
            link.addEventListener('click', function(e) {
                const href = link.getAttribute('href');
                if (href === '#') return;
                
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    const headerHeight = document.querySelector('.site-header').offsetHeight;
                    const targetPosition = target.offsetTop - headerHeight - 20;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    const navigation = document.querySelector('.main-navigation');
                    const mobileToggle = document.querySelector('.mobile-menu-toggle');
                    if (navigation && navigation.classList.contains('active')) {
                        navigation.classList.remove('active');
                        if (mobileToggle) {
                            const icon = mobileToggle.querySelector('i');
                            if (icon) icon.className = 'fas fa-bars';
                            mobileToggle.setAttribute('aria-expanded', 'false');
                        }
                    }
                }
            });
        });
    }
    
    // ===========================================
    // INITIALIZE ALL FUNCTIONALITY
    // ===========================================
    
    function init() {
        enforceSubmenuZIndex();
        createMobileMenuToggle();
        setupMobileSubmenus();
        setupDesktopSubmenus();
        fixSmoothScrolling();
        
        // Handle window resize
        window.addEventListener('resize', handleResize);
        
        // Re-run enforcement periodically to handle dynamic content
        setInterval(enforceSubmenuZIndex, 2000);
    }
    
    // Initialize everything
    init();
    
    // Re-initialize after WordPress loads
    window.addEventListener('load', function() {
        setTimeout(init, 100);
    });
    
    // ===========================================
    // ACCESSIBILITY IMPROVEMENTS
    // ===========================================
    
    // Keyboard navigation for menus
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            // Close mobile menu on escape
            const navigation = document.querySelector('.main-navigation');
            const mobileToggle = document.querySelector('.mobile-menu-toggle');
            if (navigation && navigation.classList.contains('active')) {
                navigation.classList.remove('active');
                if (mobileToggle) {
                    const icon = mobileToggle.querySelector('i');
                    if (icon) icon.className = 'fas fa-bars';
                    mobileToggle.setAttribute('aria-expanded', 'false');
                    mobileToggle.focus();
                }
            }
            
            // Close any open submenus
            const menuItems = document.querySelectorAll('.nav-menu .menu-item-has-children');
            menuItems.forEach(function(item) {
                item.classList.remove('active');
            });
        }
    });
    
    // Focus management for submenus
    const submenuLinks = document.querySelectorAll('.nav-menu .sub-menu a');
    submenuLinks.forEach(function(link) {
        link.addEventListener('focus', function() {
            const submenu = link.closest('.sub-menu');
            const parentItem = submenu.closest('.menu-item-has-children');
            if (parentItem && window.innerWidth > 768) {
                submenu.style.opacity = '1';
                submenu.style.visibility = 'visible';
                submenu.style.display = 'block';
                submenu.style.zIndex = '2147483647';
            }
        });
    });
    
    console.log('🚀 Ultimate Responsive Menu Fix loaded successfully!');
});
