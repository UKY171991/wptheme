/*!
========================================
BLUEPRINTFOLDER THEME - GLOBAL JAVASCRIPT
Professional WordPress Theme for BlueprintFolder.com
Bootstrap 5 Compatible | Vanilla JS
========================================
*/

(function() {
    'use strict';

    // Global theme object
    window.BlueprintFolder = {
        init: function() {
            this.navigation.init();
            this.layout.init();
            this.utils.init();
        },

        // Enhanced Navigation functionality
        navigation: {
            init: function() {
                this.setupEnhancedMobileMenu();
                this.setupEnhancedDropdowns();
                this.setupSubmenuInteractions();
                this.setupActiveStates();
                this.setupKeyboardNavigation();
                this.setupSmoothScroll();
                this.setupFocusManagement();
                this.setupCTAButton();
            },

            setupEnhancedMobileMenu: function() {
                const toggler = document.querySelector('[data-mobile-menu-trigger]');
                const menuPanel = document.querySelector('[data-mobile-menu-panel]');
                const backdrop = document.querySelector('[data-mobile-menu-backdrop]');
                const closeBtn = document.querySelector('[data-mobile-menu-close]');
                const body = document.body;

                if (toggler && menuPanel) {
                    // Toggle mobile menu
                    toggler.addEventListener('click', function(e) {
                        e.preventDefault();
                        const isExpanded = this.getAttribute('aria-expanded') === 'true';
                        
                        if (isExpanded) {
                            this.closeMobileMenu();
                        } else {
                            this.openMobileMenu();
                        }
                    }.bind(this));

                    // Close button functionality
                    if (closeBtn) {
                        closeBtn.addEventListener('click', this.closeMobileMenu.bind(this));
                    }

                    // Backdrop click to close
                    if (backdrop) {
                        backdrop.addEventListener('click', this.closeMobileMenu.bind(this));
                    }

                    // Close on escape key
                    document.addEventListener('keydown', function(e) {
                        if (e.key === 'Escape' && menuPanel.classList.contains('show')) {
                            this.closeMobileMenu();
                        }
                    }.bind(this));

                    // Close mobile menu when clicking on a link
                    const navLinks = menuPanel.querySelectorAll('.nav-link');
                    navLinks.forEach(link => {
                        link.addEventListener('click', function() {
                            if (window.innerWidth < 992 && !link.classList.contains('dropdown-toggle')) {
                                setTimeout(() => {
                                    this.closeMobileMenu();
                                }, 150);
                            }
                        }.bind(this));
                    });

                    // Handle window resize
                    window.addEventListener('resize', function() {
                        if (window.innerWidth >= 992 && menuPanel.classList.contains('show')) {
                            this.closeMobileMenu();
                        }
                    }.bind(this));
                }
            },

            openMobileMenu: function() {
                const toggler = document.querySelector('[data-mobile-menu-trigger]');
                const menuPanel = document.querySelector('[data-mobile-menu-panel]');
                const backdrop = document.querySelector('[data-mobile-menu-backdrop]');
                const body = document.body;

                if (toggler && menuPanel) {
                    toggler.setAttribute('aria-expanded', 'true');
                    menuPanel.classList.add('show');
                    body.classList.add('mobile-menu-open');
                    
                    if (backdrop) {
                        backdrop.classList.add('show');
                    }

                    // Focus management
                    const firstFocusable = menuPanel.querySelector('a, button, [tabindex]:not([tabindex="-1"])');
                    if (firstFocusable) {
                        setTimeout(() => firstFocusable.focus(), 300);
                    }
                }
            },

            closeMobileMenu: function() {
                const toggler = document.querySelector('[data-mobile-menu-trigger]');
                const menuPanel = document.querySelector('[data-mobile-menu-panel]');
                const backdrop = document.querySelector('[data-mobile-menu-backdrop]');
                const body = document.body;

                if (toggler && menuPanel) {
                    toggler.setAttribute('aria-expanded', 'false');
                    menuPanel.classList.remove('show');
                    body.classList.remove('mobile-menu-open');
                    
                    if (backdrop) {
                        backdrop.classList.remove('show');
                    }

                    // Return focus to toggle button
                    toggler.focus();
                }
            },

            setupEnhancedDropdowns: function() {
                const dropdowns = document.querySelectorAll('.dropdown');
                
                dropdowns.forEach(dropdown => {
                    const toggle = dropdown.querySelector('.dropdown-toggle');
                    const menu = dropdown.querySelector('.dropdown-menu');
                    
                    if (toggle && menu) {
                        let hoverTimeout;
                        
                        // Desktop hover behavior with delay
                        if (window.innerWidth >= 992) {
                            dropdown.addEventListener('mouseenter', function() {
                                clearTimeout(hoverTimeout);
                                
                                // Close other dropdowns first
                                dropdowns.forEach(otherDropdown => {
                                    if (otherDropdown !== dropdown) {
                                        const otherToggle = otherDropdown.querySelector('.dropdown-toggle');
                                        const otherMenu = otherDropdown.querySelector('.dropdown-menu');
                                        if (otherToggle && otherMenu) {
                                            otherToggle.setAttribute('aria-expanded', 'false');
                                            otherMenu.classList.remove('show');
                                        }
                                    }
                                });
                                
                                toggle.setAttribute('aria-expanded', 'true');
                                menu.classList.add('show');
                                
                                // Add staggered animation for mega menu items
                                const megaItems = menu.querySelectorAll('.mega-menu-item');
                                megaItems.forEach((item, index) => {
                                    item.style.animationDelay = (index * 0.1) + 's';
                                });
                            });

                            dropdown.addEventListener('mouseleave', function() {
                                hoverTimeout = setTimeout(() => {
                                    toggle.setAttribute('aria-expanded', 'false');
                                    menu.classList.remove('show');
                                }, 150); // Small delay to prevent accidental closes
                            });
                            
                            // Cancel close if mouse re-enters
                            menu.addEventListener('mouseenter', function() {
                                clearTimeout(hoverTimeout);
                            });
                        }

                        // Click behavior for all devices
                        toggle.addEventListener('click', function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            
                            const isExpanded = this.getAttribute('aria-expanded') === 'true';
                            
                            // Close all other dropdowns
                            dropdowns.forEach(otherDropdown => {
                                if (otherDropdown !== dropdown) {
                                    const otherToggle = otherDropdown.querySelector('.dropdown-toggle');
                                    const otherMenu = otherDropdown.querySelector('.dropdown-menu');
                                    if (otherToggle && otherMenu) {
                                        otherToggle.setAttribute('aria-expanded', 'false');
                                        otherMenu.classList.remove('show');
                                    }
                                }
                            });

                            // Toggle current dropdown
                            if (isExpanded) {
                                this.setAttribute('aria-expanded', 'false');
                                menu.classList.remove('show');
                            } else {
                                this.setAttribute('aria-expanded', 'true');
                                menu.classList.add('show');
                                
                                // Focus first menu item on mobile
                                if (window.innerWidth < 992) {
                                    const firstItem = menu.querySelector('.mega-menu-link, .dropdown-item');
                                    if (firstItem) {
                                        setTimeout(() => firstItem.focus(), 100);
                                    }
                                }
                            }
                        });

                        // Close dropdown when clicking outside
                        document.addEventListener('click', function(e) {
                            if (!dropdown.contains(e.target)) {
                                clearTimeout(hoverTimeout);
                                toggle.setAttribute('aria-expanded', 'false');
                                menu.classList.remove('show');
                            }
                        });
                        
                        // Close dropdown on escape key
                        document.addEventListener('keydown', function(e) {
                            if (e.key === 'Escape') {
                                clearTimeout(hoverTimeout);
                                toggle.setAttribute('aria-expanded', 'false');
                                menu.classList.remove('show');
                                toggle.focus();
                            }
                        });
                    }
                });
                
                // Handle window resize to reset dropdown behavior
                window.addEventListener('resize', function() {
                    dropdowns.forEach(dropdown => {
                        const toggle = dropdown.querySelector('.dropdown-toggle');
                        const menu = dropdown.querySelector('.dropdown-menu');
                        if (toggle && menu) {
                            toggle.setAttribute('aria-expanded', 'false');
                            menu.classList.remove('show');
                        }
                    });
                });
            },

            setupActiveStates: function() {
                // Set active states based on current page
                const currentUrl = window.location.pathname;
                const navLinks = document.querySelectorAll('.nav-link');
                
                navLinks.forEach(link => {
                    const linkUrl = new URL(link.href).pathname;
                    if (linkUrl === currentUrl || (linkUrl !== '/' && currentUrl.includes(linkUrl))) {
                        link.classList.add('active');
                        link.closest('.nav-item').classList.add('active');
                    }
                });
            },

            setupKeyboardNavigation: function() {
                // Handle keyboard navigation for dropdowns and mega menus
                document.addEventListener('keydown', function(e) {
                    const activeElement = document.activeElement;
                    
                    // Handle dropdown navigation
                    if (activeElement.classList.contains('dropdown-toggle')) {
                        const dropdown = activeElement.closest('.dropdown');
                        const menu = dropdown.querySelector('.dropdown-menu');
                        
                        if (e.key === 'ArrowDown' || e.key === 'Enter' || e.key === ' ') {
                            e.preventDefault();
                            activeElement.setAttribute('aria-expanded', 'true');
                            menu.classList.add('show');
                            
                            const firstItem = menu.querySelector('.mega-menu-link, .dropdown-item');
                            if (firstItem) {
                                firstItem.focus();
                            }
                        }
                    }
                    
                    // Handle mega menu navigation
                    if (activeElement.classList.contains('mega-menu-link')) {
                        const menu = activeElement.closest('.dropdown-menu');
                        const items = Array.from(menu.querySelectorAll('.mega-menu-link'));
                        const currentIndex = items.indexOf(activeElement);
                        
                        if (e.key === 'ArrowDown') {
                            e.preventDefault();
                            const nextIndex = (currentIndex + 1) % items.length;
                            items[nextIndex].focus();
                        } else if (e.key === 'ArrowUp') {
                            e.preventDefault();
                            const prevIndex = currentIndex === 0 ? items.length - 1 : currentIndex - 1;
                            items[prevIndex].focus();
                        } else if (e.key === 'ArrowRight') {
                            e.preventDefault();
                            // Move to next column in mega menu
                            const currentSection = activeElement.closest('.mega-menu-section');
                            const nextSection = currentSection.nextElementSibling;
                            if (nextSection) {
                                const nextSectionFirstItem = nextSection.querySelector('.mega-menu-link');
                                if (nextSectionFirstItem) {
                                    nextSectionFirstItem.focus();
                                }
                            }
                        } else if (e.key === 'ArrowLeft') {
                            e.preventDefault();
                            // Move to previous column in mega menu
                            const currentSection = activeElement.closest('.mega-menu-section');
                            const prevSection = currentSection.previousElementSibling;
                            if (prevSection) {
                                const prevSectionFirstItem = prevSection.querySelector('.mega-menu-link');
                                if (prevSectionFirstItem) {
                                    prevSectionFirstItem.focus();
                                }
                            }
                        } else if (e.key === 'Escape') {
                            e.preventDefault();
                            const dropdown = menu.closest('.dropdown');
                            const toggle = dropdown.querySelector('.dropdown-toggle');
                            toggle.setAttribute('aria-expanded', 'false');
                            menu.classList.remove('show');
                            toggle.focus();
                        }
                    }
                    
                    // Handle regular dropdown item navigation
                    if (activeElement.classList.contains('dropdown-item')) {
                        const menu = activeElement.closest('.dropdown-menu');
                        const items = Array.from(menu.querySelectorAll('.dropdown-item'));
                        const currentIndex = items.indexOf(activeElement);
                        
                        if (e.key === 'ArrowDown') {
                            e.preventDefault();
                            const nextIndex = (currentIndex + 1) % items.length;
                            items[nextIndex].focus();
                        } else if (e.key === 'ArrowUp') {
                            e.preventDefault();
                            const prevIndex = currentIndex === 0 ? items.length - 1 : currentIndex - 1;
                            items[prevIndex].focus();
                        } else if (e.key === 'Escape') {
                            e.preventDefault();
                            const dropdown = menu.closest('.dropdown');
                            const toggle = dropdown.querySelector('.dropdown-toggle');
                            toggle.setAttribute('aria-expanded', 'false');
                            menu.classList.remove('show');
                            toggle.focus();
                        }
                    }
                });
            },

            setupSmoothScroll: function() {
                // Smooth scroll for anchor links
                const anchorLinks = document.querySelectorAll('a[href^="#"]');
                
                anchorLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        const targetId = this.getAttribute('href');
                        const targetElement = document.querySelector(targetId);
                        
                        if (targetElement) {
                            e.preventDefault();
                            
                            const header = document.querySelector('.site-header');
                            const headerHeight = header ? header.offsetHeight : 0;
                            const targetPosition = targetElement.offsetTop - headerHeight - 20;
                            
                            window.scrollTo({
                                top: targetPosition,
                                behavior: 'smooth'
                            });
                        }
                    });
                });
            },

            setupFocusManagement: function() {
                // Trap focus in mobile menu when open
                const menuPanel = document.querySelector('[data-mobile-menu-panel]');
                
                if (menuPanel) {
                    menuPanel.addEventListener('keydown', function(e) {
                        if (e.key === 'Tab' && this.classList.contains('show')) {
                            const focusableElements = this.querySelectorAll(
                                'a, button, [tabindex]:not([tabindex="-1"])'
                            );
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
            },

            setupCTAButton: function() {
                // Enhanced CTA button functionality
                const ctaButtons = document.querySelectorAll('.enhanced-cta-btn');
                
                ctaButtons.forEach(button => {
                    // Add ripple effect on click
                    button.addEventListener('click', function(e) {
                        const ripple = document.createElement('span');
                        const rect = this.getBoundingClientRect();
                        const size = Math.max(rect.width, rect.height);
                        const x = e.clientX - rect.left - size / 2;
                        const y = e.clientY - rect.top - size / 2;
                        
                        ripple.style.cssText = `
                            position: absolute;
                            width: ${size}px;
                            height: ${size}px;
                            left: ${x}px;
                            top: ${y}px;
                            background: rgba(255, 255, 255, 0.3);
                            border-radius: 50%;
                            transform: scale(0);
                            animation: ripple 0.6s linear;
                            pointer-events: none;
                        `;
                        
                        this.appendChild(ripple);
                        
                        setTimeout(() => {
                            ripple.remove();
                        }, 600);
                    });
                });
            },

            setupSubmenuInteractions: function() {
                // Handle submenu interactions on mobile
                const submenuToggles = document.querySelectorAll('.has-submenu > a');
                
                submenuToggles.forEach(toggle => {
                    toggle.addEventListener('click', function(e) {
                        if (window.innerWidth < 992) {
                            e.preventDefault();
                            
                            const parentItem = this.closest('.has-submenu');
                            const submenu = parentItem.querySelector('.mega-menu-submenu, .dropdown-submenu');
                            
                            if (submenu) {
                                parentItem.classList.toggle('active');
                                
                                // Close other submenus at the same level
                                const siblings = parentItem.parentElement.querySelectorAll('.has-submenu');
                                siblings.forEach(sibling => {
                                    if (sibling !== parentItem) {
                                        sibling.classList.remove('active');
                                    }
                                });
                            }
                        }
                    });
                });
            }
        },

        // Layout and UI fixes
        layout: {
            init: function() {
                this.fixHeaderSpacing();
                this.handleServiceFilters();
                this.setupScrollEffects();
                this.fixMobileLayout();
            },

            fixHeaderSpacing: function() {
                // Ensure proper spacing for fixed header
                const header = document.querySelector('.site-header');
                const body = document.body;
                
                if (header) {
                    const headerHeight = header.offsetHeight;
                    body.style.paddingTop = (headerHeight + 10) + 'px';
                    
                    // Adjust for admin bar
                    if (body.classList.contains('admin-bar')) {
                        const adminBar = document.getElementById('wpadminbar');
                        if (adminBar) {
                            const adminBarHeight = adminBar.offsetHeight;
                            body.style.paddingTop = (headerHeight + adminBarHeight + 10) + 'px';
                        }
                    }
                }
                
                // Fix hero section overlap
                const heroSection = document.querySelector('.hero-section');
                if (heroSection && header) {
                    const headerHeight = header.offsetHeight;
                    heroSection.style.marginTop = '0';
                    heroSection.style.paddingTop = (headerHeight + 40) + 'px';
                }
            },

            handleServiceFilters: function() {
                // Service filter functionality
                const filterButtons = document.querySelectorAll('.filter-btn');
                const serviceCards = document.querySelectorAll('.service-card');
                
                filterButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const filter = this.getAttribute('data-filter');
                        
                        // Update active button
                        filterButtons.forEach(btn => btn.classList.remove('active'));
                        this.classList.add('active');
                        
                        // Filter service cards
                        serviceCards.forEach(card => {
                            const categories = card.getAttribute('data-category');
                            
                            if (filter === 'all' || (categories && categories.includes(filter))) {
                                card.style.display = 'block';
                                card.style.animation = 'fadeInUp 0.5s ease';
                            } else {
                                card.style.display = 'none';
                            }
                        });
                    });
                });
            },

            setupScrollEffects: function() {
                // Add scroll-based header effects
                let lastScrollTop = 0;
                const header = document.querySelector('.site-header');
                
                window.addEventListener('scroll', function() {
                    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                    
                    if (header) {
                        if (scrollTop > 100) {
                            header.classList.add('scrolled');
                        } else {
                            header.classList.remove('scrolled');
                        }
                    }
                    
                    lastScrollTop = scrollTop;
                }, { passive: true });
            },

            fixMobileLayout: function() {
                // Fix mobile layout issues
                const handleResize = () => {
                    const viewport = window.innerWidth;
                    
                    // Fix mobile menu positioning
                    if (viewport < 992) {
                        const mobileMenu = document.querySelector('.navbar-collapse');
                        if (mobileMenu) {
                            mobileMenu.style.maxHeight = (window.innerHeight - 100) + 'px';
                            mobileMenu.style.overflowY = 'auto';
                        }
                    }
                    
                    // Fix grid layouts on small screens
                    const grids = document.querySelectorAll('.services-grid, .categories-grid, .blog-grid');
                    grids.forEach(grid => {
                        if (viewport < 576) {
                            grid.style.gridTemplateColumns = '1fr';
                        }
                    });
                };
                
                window.addEventListener('resize', handleResize);
                handleResize(); // Run on load
            }
        },

        // Utility functions
        utils: {
            init: function() {
                // Initialize utility functions
            },

            showNotification: function(message, type = 'info') {
                // Create and show notification
                const notification = document.createElement('div');
                notification.className = `notification notification-${type}`;
                notification.textContent = message;
                
                document.body.appendChild(notification);
                
                setTimeout(() => {
                    notification.remove();
                }, 3000);
            },

            debounce: function(func, wait) {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            },

            throttle: function(func, limit) {
                let inThrottle;
                return function() {
                    const args = arguments;
                    const context = this;
                    if (!inThrottle) {
                        func.apply(context, args);
                        inThrottle = true;
                        setTimeout(() => inThrottle = false, limit);
                    }
                };
            }
        }
    };

    // Error handling
    window.addEventListener('error', function(e) {
        console.error('BlueprintFolder Theme Error:', e.error);
    });

    // Initialize the theme when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            BlueprintFolder.init();
        });
    } else {
        BlueprintFolder.init();
    }

    // Handle page visibility changes for performance
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            // Pause animations when page is not visible
            document.body.classList.add('page-hidden');
        } else {
            // Resume animations when page becomes visible
            document.body.classList.remove('page-hidden');
        }
    });

    // Handle online/offline states
    window.addEventListener('online', function() {
        document.body.classList.remove('offline');
        if (typeof BlueprintFolder !== 'undefined' && BlueprintFolder.utils && BlueprintFolder.utils.showNotification) {
            BlueprintFolder.utils.showNotification('Connection restored', 'success');
        }
    });

    window.addEventListener('offline', function() {
        document.body.classList.add('offline');
        if (typeof BlueprintFolder !== 'undefined' && BlueprintFolder.utils && BlueprintFolder.utils.showNotification) {
            BlueprintFolder.utils.showNotification('Connection lost', 'warning');
        }
    });

    // Expose BlueprintFolder globally for debugging
    window.BlueprintFolder = BlueprintFolder;

})();