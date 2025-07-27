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
                // Simple dropdown functionality that works with CSS hover
                const dropdowns = document.querySelectorAll('.dropdown');

                dropdowns.forEach(dropdown => {
                    const toggle = dropdown.querySelector('.dropdown-toggle');
                    const menu = dropdown.querySelector('.dropdown-menu');

                    if (toggle && menu) {
                        // Click behavior for mobile and accessibility
                        toggle.addEventListener('click', function(e) {
                            // Only prevent default on mobile
                            if (window.innerWidth < 992) {
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
                                }
                            }
                        });

                        // Desktop hover behavior is handled by CSS
                        // Just update aria-expanded for accessibility
                        if (window.innerWidth >= 992) {
                            dropdown.addEventListener('mouseenter', function() {
                                toggle.setAttribute('aria-expanded', 'true');
                            });

                            dropdown.addEventListener('mouseleave', function() {
                                toggle.setAttribute('aria-expanded', 'false');
                            });
                        }

                        // Close dropdown when clicking outside (mobile)
                        document.addEventListener('click', function(e) {
                            if (!dropdown.contains(e.target) && window.innerWidth < 992) {
                                toggle.setAttribute('aria-expanded', 'false');
                                menu.classList.remove('show');
                            }
                        });

                        // Close dropdown on escape key
                        document.addEventListener('keydown', function(e) {
                            if (e.key === 'Escape') {
                                toggle.setAttribute('aria-expanded', 'false');
                                menu.classList.remove('show');
                                toggle.focus();
                            }
                        });
                    }
                });

                // Handle submenu interactions
                const submenus = document.querySelectorAll('.dropdown-submenu');
                submenus.forEach(submenu => {
                    const toggle = submenu.querySelector('.dropdown-toggle');
                    const menu = submenu.querySelector('.dropdown-menu');

                    if (toggle && menu) {
                        // Mobile click behavior for submenus
                        toggle.addEventListener('click', function(e) {
                            if (window.innerWidth < 992) {
                                e.preventDefault();
                                e.stopPropagation();

                                const isExpanded = this.getAttribute('aria-expanded') === 'true';

                                if (isExpanded) {
                                    this.setAttribute('aria-expanded', 'false');
                                    menu.classList.remove('show');
                                } else {
                                    this.setAttribute('aria-expanded', 'true');
                                    menu.classList.add('show');
                                }
                            }
                        });
                    }
                });

                // Handle window resize to reset dropdown behavior
                window.addEventListener('resize', function() {
                    if (window.innerWidth >= 992) {
                        // Reset mobile states on desktop
                        dropdowns.forEach(dropdown => {
                            const toggle = dropdown.querySelector('.dropdown-toggle');
                            const menu = dropdown.querySelector('.dropdown-menu');
                            if (toggle && menu) {
                                toggle.setAttribute('aria-expanded', 'false');
                                menu.classList.remove('show');
                            }
                        });
                    }
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
                // Handle keyboard navigation for standard dropdowns
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

                            const firstItem = menu.querySelector('.dropdown-item');
                            if (firstItem) {
                                firstItem.focus();
                            }
                        }
                    }

                    // Handle dropdown item navigation
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
                const submenuToggles = document.querySelectorAll('.dropdown-toggle');

                submenuToggles.forEach(toggle => {
                    toggle.addEventListener('click', function(e) {
                        if (window.innerWidth < 992) {
                            const parentItem = this.closest('.dropdown');
                            const submenu = parentItem.querySelector('.dropdown-menu');

                            if (submenu) {
                                const isExpanded = this.getAttribute('aria-expanded') === 'true';

                                if (isExpanded) {
                                    this.setAttribute('aria-expanded', 'false');
                                    submenu.classList.remove('show');
                                } else {
                                    this.setAttribute('aria-expanded', 'true');
                                    submenu.classList.add('show');
                                }
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
                // No special header spacing needed for static header
                return;
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
                // No scroll effects needed for static header
                return;
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
                this.setupScrollToTop();
                this.setupLazyLoading();
            },

            setupScrollToTop: function() {
                // Add scroll to top functionality
                const scrollBtn = document.createElement('button');
                scrollBtn.innerHTML = '<i class="fas fa-chevron-up"></i>';
                scrollBtn.className = 'scroll-to-top';
                scrollBtn.setAttribute('aria-label', 'Scroll to top');
                document.body.appendChild(scrollBtn);

                window.addEventListener('scroll', function() {
                    if (window.pageYOffset > 300) {
                        scrollBtn.classList.add('show');
                    } else {
                        scrollBtn.classList.remove('show');
                    }
                });

                scrollBtn.addEventListener('click', function() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            },

            setupLazyLoading: function() {
                // Simple lazy loading for images
                const images = document.querySelectorAll('img[data-src]');

                if ('IntersectionObserver' in window) {
                    const imageObserver = new IntersectionObserver((entries, observer) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                const img = entry.target;
                                img.src = img.dataset.src;
                                img.classList.remove('lazy');
                                imageObserver.unobserve(img);
                            }
                        });
                    });

                    images.forEach(img => imageObserver.observe(img));
                }
            }rd: function() {
                // Enhanced keyboard navigation for mega menu
                document.addEventListener('keydown', function(e) {
                    const activeElement = document.activeElement;

                    if (activeElement.classList.contains('mega-menu-link')) {
                        const megaMenu = activeElement.closest('.services-mega-menu');
                        if (!megaMenu) return;

                        const allLinks = Array.from(megaMenu.querySelectorAll('.mega-menu-link'));
                        const currentIndex = allLinks.indexOf(activeElement);

                        if (e.key === 'Tab' && !e.shiftKey) {
                            // Tab forward through mega menu
                            e.preventDefault();
                            const nextIndex = (currentIndex + 1) % allLinks.length;
                            allLinks[nextIndex].focus();
                        } else if (e.key === 'Tab' && e.shiftKey) {
                            // Tab backward through mega menu
                            e.preventDefault();
                            const prevIndex = currentIndex === 0 ? allLinks.length - 1 : currentIndex - 1;
                            allLinks[prevIndex].focus();
                        }
                    }
                });
            },

            optimizeMegaMenuPerformance: function() {
                // Use Intersection Observer for better performance
                if ('IntersectionObserver' in window) {
                    const megaMenus = document.querySelectorAll('.services-mega-menu');

                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                entry.target.classList.add('in-viewport');
                            } else {
                                entry.target.classList.remove('in-viewport');
                            }
                        });
                    }, {
                        rootMargin: '50px'
                    });

                    megaMenus.forEach(menu => {
                        observer.observe(menu);
                    });
                }
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

