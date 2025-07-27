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
            this.animations.init();
            this.forms.init();
            this.utils.init();
            this.performance.init();
        },

        // Enhanced Navigation functionality
        navigation: {
            init: function() {
                this.setupEnhancedMobileMenu();
                this.setupEnhancedDropdowns();
                this.setupActiveStates();
                this.setupKeyboardNavigation();
                this.setupSmoothScroll();
                this.setupFocusManagement();
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
                        // Desktop hover behavior
                        if (window.innerWidth >= 992) {
                            dropdown.addEventListener('mouseenter', function() {
                                toggle.setAttribute('aria-expanded', 'true');
                                menu.classList.add('show');
                            });

                            dropdown.addEventListener('mouseleave', function() {
                                toggle.setAttribute('aria-expanded', 'false');
                                menu.classList.remove('show');
                            });
                        }

                        // Click behavior for all devices
                        toggle.addEventListener('click', function(e) {
                            e.preventDefault();
                            const isExpanded = this.getAttribute('aria-expanded') === 'true';
                            
                            // Close other dropdowns
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
                                
                                // Focus first menu item
                                const firstItem = menu.querySelector('.dropdown-item');
                                if (firstItem && window.innerWidth < 992) {
                                    setTimeout(() => firstItem.focus(), 100);
                                }
                            }
                        });

                        // Close dropdown when clicking outside
                        document.addEventListener('click', function(e) {
                            if (!dropdown.contains(e.target)) {
                                toggle.setAttribute('aria-expanded', 'false');
                                menu.classList.remove('show');
                            }
                        });
                    }
                });
            },

            setupKeyboardNavigation: function() {
                // Handle keyboard navigation for dropdowns
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

            setupSmoothScroll: function() {
                // Smooth scroll for anchor links
                const anchorLinks = document.querySelectorAll('a[href^="#"]');
                
                anchorLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        const targetId = this.getAttribute('href');
                        const targetElement = document.querySelector(targetId);
                        
                        if (targetElement) {
                            e.preventDefault();
                            targetElement.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    });
                });
            }
        },
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

            setupSmoothScroll: function() {
                // Smooth scroll for anchor links
                const anchorLinks = document.querySelectorAll('a[href^="#"]');
                
                anchorLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        const targetId = this.getAttribute('href');
                        const targetElement = document.querySelector(targetId);
                        
                        if (targetElement) {
                            e.preventDefault();
                            targetElement.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    });
                });
            }
        },

        // Animation and scroll effects
        animations: {
            init: function() {
                this.setupScrollAnimations();
                this.setupParallax();
                this.setupCounters();
            },

            setupScrollAnimations: function() {
                // Intersection Observer for scroll animations
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animate-fade-in-up');
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.1,
                    rootMargin: '0px 0px -50px 0px'
                });

                // Observe elements with animation classes
                const animateElements = document.querySelectorAll('.animate-on-scroll');
                animateElements.forEach(el => observer.observe(el));

                // Auto-observe cards and sections
                const cards = document.querySelectorAll('.card, .service-card, .testimonial-card, .pricing-card');
                cards.forEach(card => {
                    card.classList.add('animate-on-scroll');
                    observer.observe(card);
                });
            },

            setupParallax: function() {
                // Simple parallax effect for hero sections
                const parallaxElements = document.querySelectorAll('.parallax');
                
                if (parallaxElements.length > 0) {
                    window.addEventListener('scroll', () => {
                        const scrolled = window.pageYOffset;
                        parallaxElements.forEach(element => {
                            const rate = scrolled * -0.5;
                            element.style.transform = `translateY(${rate}px)`;
                        });
                    });
                }
            },

            setupCounters: function() {
                // Animated counters for statistics
                const counters = document.querySelectorAll('.counter');
                
                const countObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const counter = entry.target;
                            const target = parseInt(counter.dataset.target);
                            const duration = 2000; // 2 seconds
                            const start = performance.now();

                            const animate = (currentTime) => {
                                const elapsed = currentTime - start;
                                const progress = Math.min(elapsed / duration, 1);
                                
                                // Easing function
                                const easeOut = 1 - Math.pow(1 - progress, 3);
                                const current = Math.floor(target * easeOut);
                                
                                counter.textContent = current.toLocaleString();

                                if (progress < 1) {
                                    requestAnimationFrame(animate);
                                } else {
                                    counter.textContent = target.toLocaleString();
                                }
                            };

                            requestAnimationFrame(animate);
                            countObserver.unobserve(counter);
                        }
                    });
                }, { threshold: 0.5 });

                counters.forEach(counter => countObserver.observe(counter));
            }
        },

        // Form handling
        forms: {
            init: function() {
                this.setupContactForm();
                this.setupFormValidation();
                this.setupFileUploads();
            },

            setupContactForm: function() {
                const contactForms = document.querySelectorAll('.contact-form, .quote-form');
                
                contactForms.forEach(form => {
                    form.addEventListener('submit', async function(e) {
                        e.preventDefault();
                        
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;
                        const formData = new FormData(form);
                        
                        // Show loading state
                        submitBtn.disabled = true;
                        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
                        
                        try {
                            const response = await fetch(form.action || '/wp-admin/admin-ajax.php', {
                                method: 'POST',
                                body: formData
                            });
                            
                            const result = await response.json();
                            
                            if (result.success) {
                                BlueprintFolder.utils.showNotification('Thank you! Your message has been sent successfully.', 'success');
                                form.reset();
                            } else {
                                BlueprintFolder.utils.showNotification(result.data || 'Something went wrong. Please try again.', 'error');
                            }
                        } catch (error) {
                            console.error('Form submission error:', error);
                            BlueprintFolder.utils.showNotification('Network error. Please check your connection and try again.', 'error');
                        } finally {
                            // Restore button state
                            submitBtn.disabled = false;
                            submitBtn.textContent = originalText;
                        }
                    });
                });
            },

            setupFormValidation: function() {
                // Real-time form validation
                const inputs = document.querySelectorAll('.form-control');
                
                inputs.forEach(input => {
                    input.addEventListener('blur', function() {
                        this.classList.remove('is-invalid', 'is-valid');
                        
                        if (this.checkValidity()) {
                            this.classList.add('is-valid');
                        } else {
                            this.classList.add('is-invalid');
                        }
                    });
                });
            },

            setupFileUploads: function() {
                // Enhanced file upload handling
                const fileInputs = document.querySelectorAll('input[type="file"]');
                
                fileInputs.forEach(input => {
                    input.addEventListener('change', function() {
                        const files = Array.from(this.files);
                        const maxSize = 5 * 1024 * 1024; // 5MB
                        const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'];
                        
                        files.forEach(file => {
                            if (file.size > maxSize) {
                                BlueprintFolder.utils.showNotification(`File ${file.name} is too large. Maximum size is 5MB.`, 'error');
                                this.value = '';
                                return;
                            }
                            
                            if (!allowedTypes.includes(file.type)) {
                                BlueprintFolder.utils.showNotification(`File ${file.name} is not a supported format.`, 'error');
                                this.value = '';
                                return;
                            }
                        });
                    });
                });
            }
        },

        // Utility functions
        utils: {
            init: function() {
                this.setupLazyLoading();
                this.setupTooltips();
                this.setupModals();
            },

            showNotification: function(message, type = 'info') {
                // Create and show notification
                const notification = document.createElement('div');
                notification.className = `alert alert-${type === 'error' ? 'danger' : type} alert-dismissible fade show position-fixed`;
                notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; max-width: 400px;';
                notification.innerHTML = `
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                `;
                
                document.body.appendChild(notification);
                
                // Auto-remove after 5 seconds
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.remove();
                    }
                }, 5000);
            },

            setupLazyLoading: function() {
                // Lazy load images
                const images = document.querySelectorAll('img[data-src]');
                
                const imageObserver = new IntersectionObserver((entries) => {
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
            },

            setupTooltips: function() {
                // Initialize Bootstrap tooltips
                const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
                tooltipTriggerList.forEach(tooltipTriggerEl => {
                    new bootstrap.Tooltip(tooltipTriggerEl);
                });
            },

            setupModals: function() {
                // Enhanced modal behavior
                const modals = document.querySelectorAll('.modal');
                
                modals.forEach(modal => {
                    modal.addEventListener('shown.bs.modal', function() {
                        const firstInput = this.querySelector('input, textarea, select');
                        if (firstInput) {
                            firstInput.focus();
                        }
                    });
                });
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
        },

        // Performance optimizations
        performance: {
            init: function() {
                this.optimizeScrollEvents();
                this.setupResizeObserver();
                this.preloadCriticalResources();
            },

            optimizeScrollEvents: function() {
                // Throttled scroll events for better performance
                let isScrolling = false;
                
                const optimizedScroll = BlueprintFolder.utils.throttle(() => {
                    // Your scroll-based logic here
                    isScrolling = true;
                    requestAnimationFrame(() => {
                        isScrolling = false;
                    });
                }, 16); // ~60fps

                window.addEventListener('scroll', optimizedScroll, { passive: true });
            },

            setupResizeObserver: function() {
                // Optimize layout recalculations
                if ('ResizeObserver' in window) {
                    const resizeObserver = new ResizeObserver(entries => {
                        entries.forEach(entry => {
                            // Handle responsive adjustments
                            const element = entry.target;
                            if (element.classList.contains('responsive-element')) {
                                // Your responsive logic here
                            }
                        });
                    });

                    document.querySelectorAll('.responsive-element').forEach(el => {
                        resizeObserver.observe(el);
                    });
                }
            },

            preloadCriticalResources: function() {
                // Preload critical images and fonts
                const criticalImages = document.querySelectorAll('img[data-preload]');
                
                criticalImages.forEach(img => {
                    const link = document.createElement('link');
                    link.rel = 'preload';
                    link.as = 'image';
                    link.href = img.src || img.dataset.src;
                    document.head.appendChild(link);
                });
            }
        }
    };

    // Service-specific functionality
    window.BlueprintFolder.services = {
        init: function() {
            this.setupServiceFilters();
            this.setupServiceSearch();
            this.setupLoadMore();
        },

        setupServiceFilters: function() {
            const filterButtons = document.querySelectorAll('.service-filter');
            const serviceCards = document.querySelectorAll('.service-card');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filter = this.dataset.filter;
                    
                    // Update active button
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Filter services
                    serviceCards.forEach(card => {
                        if (filter === 'all' || card.dataset.category === filter) {
                            card.style.display = 'block';
                            card.classList.add('animate-fade-in');
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        },

        setupServiceSearch: function() {
            const searchInput = document.querySelector('.service-search');
            const serviceCards = document.querySelectorAll('.service-card');

            if (searchInput) {
                const debouncedSearch = BlueprintFolder.utils.debounce((query) => {
                    serviceCards.forEach(card => {
                        const title = card.querySelector('.card-title').textContent.toLowerCase();
                        const content = card.querySelector('.card-text').textContent.toLowerCase();
                        
                        if (title.includes(query) || content.includes(query)) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                }, 300);

                searchInput.addEventListener('input', function() {
                    debouncedSearch(this.value.toLowerCase());
                });
            }
        },

        setupLoadMore: function() {
            const loadMoreBtn = document.querySelector('.load-more-services');
            
            if (loadMoreBtn) {
                loadMoreBtn.addEventListener('click', async function() {
                    const page = parseInt(this.dataset.page) + 1;
                    this.disabled = true;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';

                    try {
                        const response = await fetch(`${wpAjax.ajaxurl}?action=load_more_services&page=${page}&nonce=${wpAjax.nonce}`);
                        const result = await response.json();

                        if (result.success) {
                            const container = document.querySelector('.services-container');
                            container.insertAdjacentHTML('beforeend', result.data);
                            this.dataset.page = page;
                            this.innerHTML = 'Load More Services';
                            this.disabled = false;
                        } else {
                            this.style.display = 'none';
                        }
                    } catch (error) {
                        console.error('Load more error:', error);
                        this.innerHTML = 'Error loading services';
                    }
                });
            }
        }
    };

    // Pricing page functionality
    window.BlueprintFolder.pricing = {
        init: function() {
            this.setupPricingToggle();
            this.setupPricingCalculator();
        },

        setupPricingToggle: function() {
            const toggles = document.querySelectorAll('.pricing-toggle');
            const prices = document.querySelectorAll('.pricing-price');

            toggles.forEach(toggle => {
                toggle.addEventListener('change', function() {
                    const isAnnual = this.checked;
                    
                    prices.forEach(price => {
                        const monthly = price.dataset.monthly;
                        const annual = price.dataset.annual;
                        
                        if (isAnnual && annual) {
                            price.textContent = annual;
                        } else if (monthly) {
                            price.textContent = monthly;
                        }
                    });
                });
            });
        },

        setupPricingCalculator: function() {
            const calculator = document.querySelector('.pricing-calculator');
            
            if (calculator) {
                const inputs = calculator.querySelectorAll('input, select');
                const result = calculator.querySelector('.calculator-result');

                inputs.forEach(input => {
                    input.addEventListener('change', function() {
                        // Your pricing calculation logic here
                        const total = Array.from(inputs).reduce((sum, input) => {
                            const value = parseFloat(input.value) || 0;
                            return sum + value;
                        }, 0);

                        if (result) {
                            result.textContent = `$${total.toFixed(2)}`;
                        }
                    });
                });
            }
        }
    };

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            BlueprintFolder.init();
            BlueprintFolder.services.init();
            BlueprintFolder.pricing.init();
        });
    } else {
        BlueprintFolder.init();
        BlueprintFolder.services.init();
        BlueprintFolder.pricing.init();
    }

    // Handle window resize
    window.addEventListener('resize', BlueprintFolder.utils.debounce(function() {
        // Reinitialize components that depend on window size
        BlueprintFolder.navigation.setupDropdowns();
    }, 250));

    // Error handling
    window.addEventListener('error', function(e) {
        console.error('BlueprintFolder Theme Error:', e.error);
    });

})();
