/**
 * 🎯 MENU SCROLLING FIX JAVASCRIPT
 * Optimizes menu behavior and scrolling performance
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('🎯 Menu Scrolling Fix Loaded');
    
    // Variables
    const header = document.querySelector('.site-header');
    const menuToggle = document.querySelector('.menu-toggle');
    const mobileMenu = document.querySelector('.mobile-menu-container');
    const body = document.body;
    let isScrolling = false;
    let scrollTimer = null;
    
    // 1. OPTIMIZE HEADER SCROLL BEHAVIOR - DISABLED
    function handleHeaderScroll() {
        // Header scroll behavior disabled per user request
        return;
        
        if (isScrolling) return;
        
        isScrolling = true;
        requestAnimationFrame(() => {
            const scrollY = window.pageYOffset;
            
            if (header) {
                if (scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            }
            
            isScrolling = false;
        });
    }

    // Scroll listener disabled
    // window.addEventListener('scroll', function() {
    //     if (scrollTimer) {
    //         clearTimeout(scrollTimer);
    //     }
    //     scrollTimer = setTimeout(handleHeaderScroll, 10);
    // }, { passive: true });
    
    // 2. SMOOTH SCROLL FOR ANCHOR LINKS - DISABLED
    function initSmoothScrolling() {
        // Smooth scrolling disabled per user request
        console.log('📍 Smooth scrolling disabled');
        return;
        
        const anchorLinks = document.querySelectorAll('a[href^="#"]');
        
        anchorLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                
                // Skip empty anchors
                if (href === '#' || href === '#!') return;
                
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    
                    // Calculate header height for offset
                    const headerHeight = header ? header.offsetHeight : 80;
                    const targetPosition = target.offsetTop - headerHeight;
                    
                    // Smooth scroll to target
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    if (mobileMenu && mobileMenu.classList.contains('active')) {
                        closeMobileMenu();
                    }
                }
            });
        });
    }
    
    // 3. MOBILE MENU SCROLL FIXES
    function handleMobileMenuToggle() {
        if (!menuToggle || !mobileMenu) return;
        
        menuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            
            const isActive = mobileMenu.classList.contains('active');
            
            if (isActive) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        });
    }
    
    function openMobileMenu() {
        if (!mobileMenu) return;
        
        // Store current scroll position
        const scrollY = window.pageYOffset;
        body.style.top = `-${scrollY}px`;
        
        // Add classes
        mobileMenu.classList.add('active');
        body.classList.add('mobile-menu-open');
        
        // Update toggle icon
        const icon = menuToggle.querySelector('i');
        if (icon) {
            icon.className = 'fas fa-times';
        }
        
        console.log('📱 Mobile menu opened');
    }
    
    function closeMobileMenu() {
        if (!mobileMenu) return;
        
        // Remove classes
        mobileMenu.classList.remove('active');
        body.classList.remove('mobile-menu-open');
        
        // Restore scroll position
        const scrollY = body.style.top;
        body.style.top = '';
        if (scrollY) {
            window.scrollTo(0, parseInt(scrollY || '0') * -1);
        }
        
        // Update toggle icon
        const icon = menuToggle.querySelector('i');
        if (icon) {
            icon.className = 'fas fa-bars';
        }
        
        console.log('📱 Mobile menu closed');
    }
    
    // 4. SUBMENU SCROLL OPTIMIZATION
    function optimizeSubmenus() {
        const submenus = document.querySelectorAll('.sub-menu');
        
        submenus.forEach(submenu => {
            const parentItem = submenu.closest('.menu-item-has-children');
            
            if (parentItem) {
                parentItem.addEventListener('mouseenter', function() {
                    submenu.style.willChange = 'opacity, transform';
                });
                
                parentItem.addEventListener('mouseleave', function() {
                    submenu.style.willChange = 'auto';
                });
            }
        });
    }
    
    // 5. KEYBOARD NAVIGATION
    function handleKeyboardNavigation() {
        document.addEventListener('keydown', function(e) {
            // ESC key closes mobile menu
            if (e.key === 'Escape' && mobileMenu && mobileMenu.classList.contains('active')) {
                closeMobileMenu();
            }
            
            // Tab navigation within mobile menu
            if (e.key === 'Tab' && mobileMenu && mobileMenu.classList.contains('active')) {
                const focusableElements = mobileMenu.querySelectorAll('a, button, [tabindex]:not([tabindex="-1"])');
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
        });
    }
    
    // 6. RESIZE HANDLER
    function handleResize() {
        let resizeTimer;
        
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                // Close mobile menu on resize to desktop
                if (window.innerWidth > 768 && mobileMenu && mobileMenu.classList.contains('active')) {
                    closeMobileMenu();
                }
                
                // Recalculate header height variable
                if (header) {
                    document.documentElement.style.setProperty('--header-height', `${header.offsetHeight}px`);
                }
            }, 250);
        });
    }
    
    // 7. INTERSECTION OBSERVER FOR PERFORMANCE
    function initIntersectionObserver() {
        const sections = document.querySelectorAll('section[id]');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Add active class to corresponding nav item
                    const navLink = document.querySelector(`a[href="#${entry.target.id}"]`);
                    if (navLink) {
                        // Remove active from all nav links
                        document.querySelectorAll('.nav-menu a').forEach(link => {
                            link.classList.remove('active');
                        });
                        // Add active to current nav link
                        navLink.classList.add('active');
                    }
                }
            });
        }, {
            rootMargin: '-80px 0px -50% 0px'
        });
        
        sections.forEach(section => {
            observer.observe(section);
        });
    }
    
    // 8. INITIALIZE ALL FUNCTIONS
    function init() {
        try {
            initSmoothScrolling();
            handleMobileMenuToggle();
            optimizeSubmenus();
            handleKeyboardNavigation();
            handleResize();
            initIntersectionObserver();
            
            // Set initial header height variable
            if (header) {
                document.documentElement.style.setProperty('--header-height', `${header.offsetHeight}px`);
            }
            
            console.log('✅ Menu scrolling fix initialized successfully');
        } catch (error) {
            console.error('❌ Error initializing menu scrolling fix:', error);
        }
    }
    
    // Initialize with delay to ensure DOM is ready
    setTimeout(init, 100);
    
    // 9. GLOBAL FUNCTIONS FOR EXTERNAL ACCESS
    window.MenuScrollFix = {
        openMobileMenu: openMobileMenu,
        closeMobileMenu: closeMobileMenu,
        scrollToSection: function(sectionId) {
            const target = document.querySelector(sectionId);
            if (target && header) {
                const targetPosition = target.offsetTop - header.offsetHeight;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        }
    };
});

// 10. CRITICAL CSS LOADING
document.addEventListener('DOMContentLoaded', function() {
    // Add critical CSS classes immediately
    document.documentElement.classList.add('menu-scroll-ready');
    
    // Preload menu elements for better performance
    const menuElements = document.querySelectorAll('.nav-menu, .sub-menu, .mobile-menu-container');
    menuElements.forEach(element => {
        element.style.willChange = 'auto';
    });
});
