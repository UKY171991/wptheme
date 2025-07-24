/**
 * Modern Header Redesign JavaScript
 * Enhanced navigation functionality with smooth animations and accessibility
 */

(function($) {
    'use strict';

    class ModernHeaderNavigation {
        constructor() {
            this.header = $('.modern-header');
            this.mobileToggle = $('.mobile-nav-toggle');
            this.mobileOverlay = $('.mobile-navigation-overlay');
            this.mobilePanel = $('.mobile-nav-panel');
            this.mobileBackdrop = $('.mobile-nav-backdrop');
            this.mobileClose = $('.mobile-nav-close');
            this.mobileSubToggles = $('.mobile-sub-toggle');
            this.dropdownItems = $('.nav-item.has-dropdown');
            
            this.isScrolled = false;
            this.isMobileOpen = false;
            this.activeDropdown = null;
            
            this.init();
        }

        init() {
            this.bindEvents();
            this.setupAccessibility();
            this.handleScrollEffects();
            this.preloadAnimations();
        }

        bindEvents() {
            // Mobile navigation toggle
            this.mobileToggle.on('click', (e) => {
                e.preventDefault();
                this.toggleMobileNav();
            });

            // Mobile navigation close
            this.mobileClose.on('click', (e) => {
                e.preventDefault();
                this.closeMobileNav();
            });

            // Mobile backdrop click
            this.mobileBackdrop.on('click', (e) => {
                e.preventDefault();
                this.closeMobileNav();
            });

            // Mobile submenu toggles
            this.mobileSubToggles.on('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                this.toggleMobileSubmenu($(e.currentTarget));
            });

            // Desktop dropdown hover effects
            this.dropdownItems.on('mouseenter', (e) => {
                this.showDropdown($(e.currentTarget));
            });

            this.dropdownItems.on('mouseleave', (e) => {
                this.hideDropdown($(e.currentTarget));
            });

            // Scroll effects
            $(window).on('scroll', () => {
                this.handleScrollEffects();
            });

            // Resize handling
            $(window).on('resize', () => {
                this.handleResize();
            });

            // Escape key to close mobile nav
            $(document).on('keydown', (e) => {
                if (e.key === 'Escape' && this.isMobileOpen) {
                    this.closeMobileNav();
                }
            });

            // Focus trap for mobile navigation
            this.mobilePanel.on('keydown', (e) => {
                this.handleFocusTrap(e);
            });

            // Current page highlighting
            this.highlightCurrentPage();
        }

        setupAccessibility() {
            // Add ARIA labels and states
            this.mobileToggle.attr({
                'aria-label': 'Toggle navigation menu',
                'aria-expanded': 'false',
                'aria-controls': 'mobile-navigation'
            });

            this.mobileOverlay.attr({
                'role': 'dialog',
                'aria-modal': 'true',
                'aria-label': 'Navigation menu'
            });

            // Setup dropdown ARIA states
            this.dropdownItems.each((index, item) => {
                const $item = $(item);
                const $link = $item.find('.nav-link').first();
                const $dropdown = $item.find('.dropdown-menu').first();
                
                if ($dropdown.length) {
                    const dropdownId = `dropdown-${index}`;
                    $dropdown.attr('id', dropdownId);
                    $link.attr({
                        'aria-haspopup': 'true',
                        'aria-expanded': 'false',
                        'aria-controls': dropdownId
                    });
                }
            });

            // Setup mobile submenu accessibility
            this.mobileSubToggles.each((index, toggle) => {
                const $toggle = $(toggle);
                const $submenu = $toggle.siblings('.mobile-sub-menu');
                
                if ($submenu.length) {
                    const submenuId = `mobile-submenu-${index}`;
                    $submenu.attr('id', submenuId);
                    $toggle.attr({
                        'aria-expanded': 'false',
                        'aria-controls': submenuId
                    });
                }
            });
        }

        toggleMobileNav() {
            if (this.isMobileOpen) {
                this.closeMobileNav();
            } else {
                this.openMobileNav();
            }
        }

        openMobileNav() {
            this.isMobileOpen = true;
            this.mobileOverlay.addClass('active');
            this.mobileToggle.addClass('active').attr('aria-expanded', 'true');
            $('body').addClass('mobile-nav-open').css('overflow', 'hidden');
            
            // Focus management
            setTimeout(() => {
                this.mobileClose.focus();
            }, 300);

            // Animate menu items
            this.animateMobileMenuItems();
        }

        closeMobileNav() {
            this.isMobileOpen = false;
            this.mobileOverlay.removeClass('active');
            this.mobileToggle.removeClass('active').attr('aria-expanded', 'false');
            $('body').removeClass('mobile-nav-open').css('overflow', '');
            
            // Close all open submenus
            $('.mobile-has-sub.active').removeClass('active');
            $('.mobile-sub-toggle.active').removeClass('active').attr('aria-expanded', 'false');
            
            // Return focus to toggle button
            this.mobileToggle.focus();
        }

        toggleMobileSubmenu($toggle) {
            const $parentItem = $toggle.closest('.mobile-menu-item');
            const $submenu = $toggle.siblings('.mobile-sub-menu');
            const isActive = $parentItem.hasClass('active');

            // Close other open submenus
            $('.mobile-has-sub.active').not($parentItem).removeClass('active');
            $('.mobile-sub-toggle.active').not($toggle).removeClass('active').attr('aria-expanded', 'false');

            // Toggle current submenu
            if (isActive) {
                $parentItem.removeClass('active');
                $toggle.removeClass('active').attr('aria-expanded', 'false');
            } else {
                $parentItem.addClass('active');
                $toggle.addClass('active').attr('aria-expanded', 'true');
            }
        }

        showDropdown($item) {
            if (this.activeDropdown && this.activeDropdown[0] !== $item[0]) {
                this.hideDropdown(this.activeDropdown);
            }

            this.activeDropdown = $item;
            const $dropdown = $item.find('.dropdown-menu');
            const $link = $item.find('.nav-link').first();

            $dropdown.addClass('show');
            $link.attr('aria-expanded', 'true');
            $item.addClass('dropdown-active');

            // Position dropdown if needed
            this.positionDropdown($dropdown);
        }

        hideDropdown($item) {
            const $dropdown = $item.find('.dropdown-menu');
            const $link = $item.find('.nav-link').first();

            $dropdown.removeClass('show');
            $link.attr('aria-expanded', 'false');
            $item.removeClass('dropdown-active');

            if (this.activeDropdown && this.activeDropdown[0] === $item[0]) {
                this.activeDropdown = null;
            }
        }

        positionDropdown($dropdown) {
            const dropdownRect = $dropdown[0].getBoundingClientRect();
            const viewportWidth = window.innerWidth;

            // Check if dropdown goes off-screen
            if (dropdownRect.right > viewportWidth) {
                $dropdown.addClass('dropdown-right');
            } else {
                $dropdown.removeClass('dropdown-right');
            }
        }

        handleScrollEffects() {
            const scrollTop = $(window).scrollTop();
            const scrollThreshold = 100;

            if (scrollTop > scrollThreshold && !this.isScrolled) {
                this.isScrolled = true;
                this.header.addClass('scrolled');
            } else if (scrollTop <= scrollThreshold && this.isScrolled) {
                this.isScrolled = false;
                this.header.removeClass('scrolled');
            }
        }

        handleResize() {
            const windowWidth = $(window).width();

            // Close mobile nav on desktop resize
            if (windowWidth > 768 && this.isMobileOpen) {
                this.closeMobileNav();
            }

            // Reposition dropdowns
            if (this.activeDropdown) {
                const $dropdown = this.activeDropdown.find('.dropdown-menu');
                this.positionDropdown($dropdown);
            }
        }

        handleFocusTrap(e) {
            if (e.key !== 'Tab') return;

            const focusableElements = this.mobilePanel.find(
                'a, button, input, select, textarea, [tabindex]:not([tabindex="-1"])'
            ).filter(':visible');

            const firstFocusable = focusableElements.first();
            const lastFocusable = focusableElements.last();

            if (e.shiftKey) {
                if (document.activeElement === firstFocusable[0]) {
                    e.preventDefault();
                    lastFocusable.focus();
                }
            } else {
                if (document.activeElement === lastFocusable[0]) {
                    e.preventDefault();
                    firstFocusable.focus();
                }
            }
        }

        highlightCurrentPage() {
            const currentPath = window.location.pathname;
            const currentHash = window.location.hash;

            $('.nav-link, .mobile-nav-link').each((index, link) => {
                const $link = $(link);
                const href = $link.attr('href');
                
                if (href) {
                    const linkPath = new URL(href, window.location.origin).pathname;
                    
                    if (linkPath === currentPath || 
                        (currentPath === '/' && href.includes('#')) ||
                        (currentHash && href.includes(currentHash))) {
                        
                        $link.closest('.nav-item, .mobile-menu-item').addClass('active');
                    }
                }
            });
        }

        animateMobileMenuItems() {
            const $menuItems = $('.mobile-menu-item');
            
            $menuItems.each((index, item) => {
                setTimeout(() => {
                    $(item).addClass('animate-in');
                }, index * 50);
            });
        }

        preloadAnimations() {
            // Preload hover animations
            this.dropdownItems.each((index, item) => {
                const $dropdown = $(item).find('.dropdown-menu');
                $dropdown.addClass('preload');
                
                setTimeout(() => {
                    $dropdown.removeClass('preload');
                }, 100);
            });
        }

        // Public methods for external access
        refresh() {
            this.highlightCurrentPage();
        }

        closeAllDropdowns() {
            this.dropdownItems.each((index, item) => {
                this.hideDropdown($(item));
            });
        }
    }

    // Smart search functionality
    class SmartSearch {
        constructor() {
            this.searchTrigger = $('.search-trigger');
            this.searchOverlay = $('.search-overlay');
            this.searchInput = $('.search-input');
            
            if (this.searchTrigger.length) {
                this.init();
            }
        }

        init() {
            this.searchTrigger.on('click', () => {
                this.openSearch();
            });

            $(document).on('keydown', (e) => {
                if (e.key === 'Escape') {
                    this.closeSearch();
                }
                
                // Quick search with Ctrl+K or Cmd+K
                if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                    e.preventDefault();
                    this.openSearch();
                }
            });
        }

        openSearch() {
            this.searchOverlay.addClass('active');
            $('body').addClass('search-open');
            setTimeout(() => {
                this.searchInput.focus();
            }, 300);
        }

        closeSearch() {
            this.searchOverlay.removeClass('active');
            $('body').removeClass('search-open');
        }
    }

    // Initialize when DOM is ready
    $(document).ready(() => {
        // Initialize navigation
        const navigation = new ModernHeaderNavigation();
        
        // Initialize search
        const search = new SmartSearch();

        // Smooth scroll for anchor links
        $('a[href^="#"]').on('click', function(e) {
            const target = $(this.getAttribute('href'));
            
            if (target.length) {
                e.preventDefault();
                
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 600, 'easeInOutCubic');
            }
        });

        // Enhanced loading states
        $('.btn-primary, .btn-secondary').on('click', function() {
            const $btn = $(this);
            const originalText = $btn.text();
            
            $btn.addClass('loading').text('Loading...');
            
            // Simulate loading (remove this in production)
            setTimeout(() => {
                $btn.removeClass('loading').text(originalText);
            }, 2000);
        });

        // Progressive enhancement for animations
        if (window.matchMedia('(prefers-reduced-motion: no-preference)').matches) {
            // Add scroll-triggered animations
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                    }
                });
            }, observerOptions);

            // Observe elements for animation
            $('.nav-item, .brand-section, .header-actions').each((index, element) => {
                observer.observe(element);
            });
        }

        // Expose navigation instance globally for debugging/external access
        window.modernNavigation = navigation;
    });

    // jQuery easing extension for smooth animations
    $.extend($.easing, {
        easeInOutCubic: function(x, t, b, c, d) {
            if ((t /= d / 2) < 1) return c / 2 * t * t * t + b;
            return c / 2 * ((t -= 2) * t * t + 2) + b;
        }
    });

})(jQuery);

// Vanilla JS fallback for critical functionality
document.addEventListener('DOMContentLoaded', function() {
    // Critical mobile nav functionality without jQuery
    const mobileToggle = document.querySelector('.mobile-nav-toggle');
    const mobileOverlay = document.querySelector('.mobile-navigation-overlay');
    
    if (mobileToggle && mobileOverlay) {
        mobileToggle.addEventListener('click', function() {
            const isOpen = mobileOverlay.classList.contains('active');
            
            if (isOpen) {
                mobileOverlay.classList.remove('active');
                document.body.style.overflow = '';
            } else {
                mobileOverlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        });
    }
});
