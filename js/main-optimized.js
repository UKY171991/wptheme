/**
 * Blueprint Folder Pro - Main JavaScript
 * Modern ES6+ JavaScript for theme functionality
 * 
 * @package Blueprint_Folder_Pro
 * @version 1.0.0
 */

(function() {
    'use strict';

    /**
     * DOM Ready State
     */
    const domReady = (callback) => {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', callback);
        } else {
            callback();
        }
    };

    /**
     * Utility Functions
     */
    const utils = {
        // Debounce function for performance
        debounce: (func, wait, immediate) => {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    timeout = null;
                    if (!immediate) func(...args);
                };
                const callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) func(...args);
            };
        },

        // Throttle function for scroll events
        throttle: (func, limit) => {
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
        },

        // Smooth scroll to element
        smoothScrollTo: (target, duration = 1000) => {
            const targetElement = typeof target === 'string' ? document.querySelector(target) : target;
            if (!targetElement) return;

            const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
            const startPosition = window.pageYOffset;
            const distance = targetPosition - startPosition - 80; // Account for fixed header
            let startTime = null;

            const animation = (currentTime) => {
                if (startTime === null) startTime = currentTime;
                const timeElapsed = currentTime - startTime;
                const run = ease(timeElapsed, startPosition, distance, duration);
                window.scrollTo(0, run);
                if (timeElapsed < duration) requestAnimationFrame(animation);
            };

            const ease = (t, b, c, d) => {
                t /= d / 2;
                if (t < 1) return c / 2 * t * t + b;
                t--;
                return -c / 2 * (t * (t - 2) - 1) + b;
            };

            requestAnimationFrame(animation);
        },

        // Get element height including margins
        getElementHeight: (element) => {
            const style = window.getComputedStyle(element);
            return element.offsetHeight + parseInt(style.marginTop) + parseInt(style.marginBottom);
        },

        // Check if element is in viewport
        isInViewport: (element, offset = 0) => {
            const rect = element.getBoundingClientRect();
            return (
                rect.top >= 0 - offset &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) + offset &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }
    };

    /**
     * Header Navigation Module
     */
    const Navigation = {
        init() {
            this.header = document.getElementById('header');
            this.navigation = document.getElementById('site-navigation');
            this.menuToggle = document.querySelector('.menu-toggle');
            this.mobileOverlay = document.querySelector('.mobile-nav-overlay');
            this.navMenu = document.querySelector('.nav-menu');
            this.dropdownItems = document.querySelectorAll('.has-dropdown');
            
            if (!this.navigation) return;

            this.bindEvents();
            this.setupAccessibility();
            this.handleStickyHeader();
        },

        bindEvents() {
            // Mobile menu toggle
            if (this.menuToggle) {
                this.menuToggle.addEventListener('click', (e) => {
                    e.preventDefault();
                    this.toggleMobileMenu();
                });
            }

            // Mobile overlay click
            if (this.mobileOverlay) {
                this.mobileOverlay.addEventListener('click', () => {
                    this.closeMobileMenu();
                });
            }

            // Dropdown menu interactions
            this.dropdownItems.forEach(item => {
                const link = item.querySelector('a');
                const submenu = item.querySelector('.sub-menu');

                if (!link || !submenu) return;

                // Desktop hover
                if (window.innerWidth > 768) {
                    item.addEventListener('mouseenter', () => {
                        this.openDropdown(item);
                    });

                    item.addEventListener('mouseleave', () => {
                        this.closeDropdown(item);
                    });
                }

                // Mobile/tablet touch
                link.addEventListener('click', (e) => {
                    if (window.innerWidth <= 768) {
                        e.preventDefault();
                        this.toggleDropdown(item);
                    }
                });

                // Keyboard navigation
                link.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        this.toggleDropdown(item);
                    }
                });
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', (e) => {
                if (!this.navigation.contains(e.target)) {
                    this.closeAllDropdowns();
                }
            });

            // Handle window resize
            window.addEventListener('resize', utils.debounce(() => {
                this.handleResize();
            }, 250));

            // Scroll events for sticky header
            window.addEventListener('scroll', utils.throttle(() => {
                this.handleScroll();
            }, 10));
        },

        setupAccessibility() {
            // Add ARIA labels and roles
            if (this.navMenu) {
                this.navMenu.setAttribute('role', 'menubar');
            }

            this.dropdownItems.forEach(item => {
                const link = item.querySelector('a');
                const submenu = item.querySelector('.sub-menu');
                
                if (link && submenu) {
                    const submenuId = `submenu-${Math.random().toString(36).substr(2, 9)}`;
                    submenu.setAttribute('id', submenuId);
                    submenu.setAttribute('role', 'menu');
                    link.setAttribute('aria-controls', submenuId);
                    link.setAttribute('aria-haspopup', 'true');
                    link.setAttribute('aria-expanded', 'false');
                }
            });
        },

        toggleMobileMenu() {
            const isOpen = this.navigation.classList.contains('menu-open');
            
            if (isOpen) {
                this.closeMobileMenu();
            } else {
                this.openMobileMenu();
            }
        },

        openMobileMenu() {
            this.navigation.classList.add('menu-open');
            this.menuToggle.setAttribute('aria-expanded', 'true');
            this.mobileOverlay.style.display = 'block';
            document.body.style.overflow = 'hidden';
            
            // Focus first menu item
            const firstMenuItem = this.navMenu.querySelector('a');
            if (firstMenuItem) {
                firstMenuItem.focus();
            }
        },

        closeMobileMenu() {
            this.navigation.classList.remove('menu-open');
            this.menuToggle.setAttribute('aria-expanded', 'false');
            this.mobileOverlay.style.display = 'none';
            document.body.style.overflow = '';
            this.closeAllDropdowns();
        },

        openDropdown(item) {
            const link = item.querySelector('a');
            const submenu = item.querySelector('.sub-menu');
            
            item.classList.add('dropdown-open');
            if (link) link.setAttribute('aria-expanded', 'true');
            if (submenu) submenu.style.display = 'block';
        },

        closeDropdown(item) {
            const link = item.querySelector('a');
            const submenu = item.querySelector('.sub-menu');
            
            item.classList.remove('dropdown-open');
            if (link) link.setAttribute('aria-expanded', 'false');
            if (submenu) submenu.style.display = 'none';
        },

        toggleDropdown(item) {
            if (item.classList.contains('dropdown-open')) {
                this.closeDropdown(item);
            } else {
                this.closeAllDropdowns();
                this.openDropdown(item);
            }
        },

        closeAllDropdowns() {
            this.dropdownItems.forEach(item => {
                this.closeDropdown(item);
            });
        },

        handleResize() {
            // Close mobile menu on resize to desktop
            if (window.innerWidth > 768 && this.navigation.classList.contains('menu-open')) {
                this.closeMobileMenu();
            }

            // Reset dropdown behavior based on screen size
            this.closeAllDropdowns();
        },

        handleStickyHeader() {
            if (!this.header) return;

            let lastScrollTop = 0;
            const headerHeight = utils.getElementHeight(this.header);

            this.handleScroll = () => {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                // Add/remove sticky class
                if (scrollTop > headerHeight) {
                    this.header.classList.add('sticky');
                } else {
                    this.header.classList.remove('sticky');
                }

                // Hide/show header on scroll (optional)
                if (scrollTop > lastScrollTop && scrollTop > headerHeight * 2) {
                    this.header.classList.add('header-hidden');
                } else {
                    this.header.classList.remove('header-hidden');
                }

                lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
            };
        }
    };

    /**
     * Smooth Scrolling for Anchor Links
     */
    const SmoothScroll = {
        init() {
            const anchorLinks = document.querySelectorAll('a[href^="#"]');
            
            anchorLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    const href = link.getAttribute('href');
                    if (href === '#') return;

                    const target = document.querySelector(href);
                    if (target) {
                        e.preventDefault();
                        utils.smoothScrollTo(target);
                        
                        // Update URL hash
                        history.pushState(null, null, href);
                    }
                });
            });
        }
    };

    /**
     * Animation on Scroll
     */
    const ScrollAnimations = {
        init() {
            this.elements = document.querySelectorAll('[data-aos]');
            if (this.elements.length === 0) return;

            this.bindEvents();
            this.checkElements();
        },

        bindEvents() {
            window.addEventListener('scroll', utils.throttle(() => {
                this.checkElements();
            }, 16));

            window.addEventListener('resize', utils.debounce(() => {
                this.checkElements();
            }, 250));
        },

        checkElements() {
            this.elements.forEach(element => {
                if (utils.isInViewport(element, 100) && !element.classList.contains('aos-animate')) {
                    element.classList.add('aos-animate');
                }
            });
        }
    };

    /**
     * Form Enhancements
     */
    const Forms = {
        init() {
            this.forms = document.querySelectorAll('form');
            if (this.forms.length === 0) return;

            this.enhanceForms();
        },

        enhanceForms() {
            this.forms.forEach(form => {
                // Add floating labels
                const inputs = form.querySelectorAll('input, textarea, select');
                inputs.forEach(input => {
                    this.addFloatingLabel(input);
                });

                // Form validation
                form.addEventListener('submit', (e) => {
                    if (!this.validateForm(form)) {
                        e.preventDefault();
                    }
                });
            });
        },

        addFloatingLabel(input) {
            const wrapper = input.parentElement;
            const label = wrapper.querySelector('label');
            
            if (!label || wrapper.classList.contains('floating-label')) return;

            wrapper.classList.add('floating-label');

            // Check if input has value on load
            if (input.value) {
                wrapper.classList.add('has-value');
            }

            // Monitor input changes
            input.addEventListener('blur', () => {
                if (input.value) {
                    wrapper.classList.add('has-value');
                } else {
                    wrapper.classList.remove('has-value');
                }
            });

            input.addEventListener('focus', () => {
                wrapper.classList.add('is-focused');
            });

            input.addEventListener('blur', () => {
                wrapper.classList.remove('is-focused');
            });
        },

        validateForm(form) {
            let isValid = true;
            const requiredFields = form.querySelectorAll('[required]');

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    this.showFieldError(field, 'This field is required');
                    isValid = false;
                } else {
                    this.clearFieldError(field);
                }

                // Email validation
                if (field.type === 'email' && field.value) {
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailPattern.test(field.value)) {
                        this.showFieldError(field, 'Please enter a valid email address');
                        isValid = false;
                    }
                }
            });

            return isValid;
        },

        showFieldError(field, message) {
            const wrapper = field.parentElement;
            let errorElement = wrapper.querySelector('.field-error');

            if (!errorElement) {
                errorElement = document.createElement('span');
                errorElement.className = 'field-error';
                wrapper.appendChild(errorElement);
            }

            errorElement.textContent = message;
            wrapper.classList.add('has-error');
            field.setAttribute('aria-invalid', 'true');
        },

        clearFieldError(field) {
            const wrapper = field.parentElement;
            const errorElement = wrapper.querySelector('.field-error');

            if (errorElement) {
                errorElement.remove();
            }

            wrapper.classList.remove('has-error');
            field.removeAttribute('aria-invalid');
        }
    };

    /**
     * Pricing Calculator (if needed)
     */
    const PricingCalculator = {
        init() {
            this.calculator = document.querySelector('.pricing-calculator');
            if (!this.calculator) return;

            this.bindEvents();
        },

        bindEvents() {
            const inputs = this.calculator.querySelectorAll('input, select');
            inputs.forEach(input => {
                input.addEventListener('change', () => {
                    this.calculatePrice();
                });
            });
        },

        calculatePrice() {
            // Basic calculation logic - customize as needed
            const basePrice = parseFloat(this.calculator.dataset.basePrice) || 100;
            let totalPrice = basePrice;

            // Add logic for different service options
            const checkboxes = this.calculator.querySelectorAll('input[type="checkbox"]:checked');
            checkboxes.forEach(checkbox => {
                const addPrice = parseFloat(checkbox.dataset.price) || 0;
                totalPrice += addPrice;
            });

            // Update display
            const priceDisplay = this.calculator.querySelector('.calculated-price');
            if (priceDisplay) {
                priceDisplay.textContent = `$${totalPrice.toFixed(2)}`;
            }
        }
    };

    /**
     * Image Lazy Loading (if not using native loading="lazy")
     */
    const LazyLoading = {
        init() {
            this.images = document.querySelectorAll('img[data-src]');
            if (this.images.length === 0) return;

            this.observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this.loadImage(entry.target);
                    }
                });
            }, {
                root: null,
                rootMargin: '50px',
                threshold: 0.1
            });

            this.images.forEach(img => {
                this.observer.observe(img);
            });
        },

        loadImage(img) {
            img.src = img.dataset.src;
            img.classList.add('loaded');
            this.observer.unobserve(img);
        }
    };

    /**
     * Back to Top Button
     */
    const BackToTop = {
        init() {
            this.button = document.querySelector('.back-to-top');
            if (!this.button) {
                this.createButton();
            }

            this.bindEvents();
        },

        createButton() {
            this.button = document.createElement('button');
            this.button.className = 'back-to-top';
            this.button.innerHTML = '<i class="fas fa-arrow-up" aria-hidden="true"></i>';
            this.button.setAttribute('aria-label', 'Back to top');
            this.button.setAttribute('title', 'Back to top');
            document.body.appendChild(this.button);
        },

        bindEvents() {
            this.button.addEventListener('click', () => {
                utils.smoothScrollTo(document.body);
            });

            window.addEventListener('scroll', utils.throttle(() => {
                if (window.pageYOffset > 500) {
                    this.button.classList.add('visible');
                } else {
                    this.button.classList.remove('visible');
                }
            }, 100));
        }
    };

    /**
     * Initialize All Modules
     */
    domReady(() => {
        Navigation.init();
        SmoothScroll.init();
        ScrollAnimations.init();
        Forms.init();
        PricingCalculator.init();
        LazyLoading.init();
        BackToTop.init();

        // Trigger custom event when all modules are loaded
        const event = new CustomEvent('blueprintFolderReady');
        document.dispatchEvent(event);
    });

    // Expose utilities and modules globally if needed
    window.BlueprintFolder = {
        utils,
        Navigation,
        SmoothScroll,
        ScrollAnimations,
        Forms,
        PricingCalculator,
        LazyLoading,
        BackToTop
    };

})();
