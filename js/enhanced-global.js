/**
 * Enhanced Global JavaScript - Improved Header & Page Functionality
 * Professional interactions for all pages with focus on header menu and sections
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // Initialize all enhanced features
    initEnhancedHeader();
    initSmoothScrolling();
    initPageAnimations();
    initPerformanceOptimizations();
    initAccessibilityEnhancements();
    
    console.log('Enhanced Global JavaScript initialized');

    /**
     * Enhanced Header Functionality
     */
    function initEnhancedHeader() {
        const header = document.querySelector('.site-header');
        const menuToggle = document.querySelector('.menu-toggle');
        const menuWrapper = document.querySelector('.menu-wrapper');
        const menuOverlay = document.querySelector('.menu-overlay');
        
        if (!header) return;

        // Enhanced scroll behavior
        let lastScrollY = window.scrollY;
        let isScrolling = false;

        function updateHeaderOnScroll() {
            const currentScrollY = window.scrollY;
            
            // Add scrolled class for styling
            if (currentScrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }

            // Auto-hide header on scroll down (mobile only)
            if (window.innerWidth <= 991) {
                if (currentScrollY > lastScrollY && currentScrollY > 100) {
                    header.style.transform = 'translateY(-100%)';
                } else {
                    header.style.transform = 'translateY(0)';
                }
            }

            lastScrollY = currentScrollY;
            isScrolling = false;
        }

        // Optimized scroll listener
        window.addEventListener('scroll', function() {
            if (!isScrolling) {
                window.requestAnimationFrame(updateHeaderOnScroll);
                isScrolling = true;
            }
        }, { passive: true });

        // Enhanced mobile menu
        if (menuToggle && menuWrapper) {
            menuToggle.addEventListener('click', function(e) {
                e.preventDefault();
                toggleEnhancedMobileMenu();
            });

            // Close menu on overlay click
            if (menuOverlay) {
                menuOverlay.addEventListener('click', closeEnhancedMobileMenu);
            }

            // Close menu on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && menuWrapper.classList.contains('active')) {
                    closeEnhancedMobileMenu();
                    menuToggle.focus();
                }
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.main-navigation') && menuWrapper.classList.contains('active')) {
                    closeEnhancedMobileMenu();
                }
            });
        }

        function toggleEnhancedMobileMenu() {
            const isOpen = menuWrapper.classList.contains('active');
            
            if (isOpen) {
                closeEnhancedMobileMenu();
            } else {
                openEnhancedMobileMenu();
            }
        }

        function openEnhancedMobileMenu() {
            menuWrapper.classList.add('active');
            if (menuOverlay) menuOverlay.classList.add('active');
            menuToggle.setAttribute('aria-expanded', 'true');
            document.body.style.overflow = 'hidden';
            
            // Focus first menu item
            const firstMenuItem = menuWrapper.querySelector('.menu-item a');
            if (firstMenuItem) {
                setTimeout(() => firstMenuItem.focus(), 150);
            }

            // Add entrance animation
            menuWrapper.style.animation = 'slideInRight 0.3s ease-out forwards';
        }

        function closeEnhancedMobileMenu() {
            menuWrapper.classList.remove('active');
            if (menuOverlay) menuOverlay.classList.remove('active');
            menuToggle.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
            
            // Add exit animation
            menuWrapper.style.animation = 'slideOutRight 0.3s ease-in forwards';
        }
    }

    /**
     * Enhanced Smooth Scrolling
     */
    function initSmoothScrolling() {
        // Smooth scroll for anchor links
        const anchorLinks = document.querySelectorAll('a[href^="#"]');
        
        anchorLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                
                // Skip if href is just "#"
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
                    
                    // Update URL without triggering scroll
                    history.pushState(null, null, href);
                    
                    // Focus target for accessibility
                    target.focus({ preventScroll: true });
                }
            });
        });
    }

    /**
     * Enhanced Page Animations
     */
    function initPageAnimations() {
        // Intersection Observer for scroll animations
        const animatedElements = document.querySelectorAll('.content-section, .page-header, .entry-header');
        
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                    
                    // Animate child elements with stagger
                    const children = entry.target.querySelectorAll('.section-title, .section-subtitle, .page-title, .page-description');
                    children.forEach((child, index) => {
                        setTimeout(() => {
                            child.classList.add('animate-in');
                        }, index * 100);
                    });
                }
            });
        }, observerOptions);

        animatedElements.forEach(el => {
            observer.observe(el);
        });

        // Add CSS animation classes
        addAnimationStyles();
    }

    /**
     * Add Animation Styles
     */
    function addAnimationStyles() {
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }

            @keyframes slideOutRight {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(100%);
                    opacity: 0;
                }
            }

            @keyframes fadeInUp {
                from {
                    transform: translateY(30px);
                    opacity: 0;
                }
                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }

            @keyframes fadeInDown {
                from {
                    transform: translateY(-30px);
                    opacity: 0;
                }
                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }

            .content-section,
            .page-header,
            .entry-header {
                opacity: 0;
                transform: translateY(30px);
                transition: all 0.6s ease;
            }

            .content-section.animate-in,
            .page-header.animate-in,
            .entry-header.animate-in {
                opacity: 1;
                transform: translateY(0);
            }

            .section-title,
            .section-subtitle,
            .page-title,
            .page-description {
                opacity: 0;
                transform: translateY(20px);
                transition: all 0.5s ease;
            }

            .section-title.animate-in,
            .section-subtitle.animate-in,
            .page-title.animate-in,
            .page-description.animate-in {
                opacity: 1;
                transform: translateY(0);
            }

            @media (prefers-reduced-motion: reduce) {
                .content-section,
                .page-header,
                .entry-header,
                .section-title,
                .section-subtitle,
                .page-title,
                .page-description {
                    transition: none;
                    opacity: 1;
                    transform: none;
                }
            }
        `;
        document.head.appendChild(style);
    }

    /**
     * Performance Optimizations
     */
    function initPerformanceOptimizations() {
        // Lazy load images
        const images = document.querySelectorAll('img[data-src]');
        
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        observer.unobserve(img);
                    }
                });
            });

            images.forEach(img => imageObserver.observe(img));
        } else {
            // Fallback for older browsers
            images.forEach(img => {
                img.src = img.dataset.src;
                img.classList.remove('lazy');
            });
        }

        // Debounced resize handler
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                // Handle responsive changes
                handleResponsiveChanges();
            }, 250);
        });

        function handleResponsiveChanges() {
            const isMobile = window.innerWidth <= 991;
            const header = document.querySelector('.site-header');
            
            if (!isMobile && header) {
                header.style.transform = 'translateY(0)';
            }
            
            // Update menu behavior
            const menuWrapper = document.querySelector('.menu-wrapper');
            if (menuWrapper && !isMobile) {
                menuWrapper.classList.remove('active');
                menuWrapper.style.animation = '';
                document.body.style.overflow = '';
            }
        }
    }

    /**
     * Enhanced Accessibility Features
     */
    function initAccessibilityEnhancements() {
        // Enhanced keyboard navigation
        const focusableElements = document.querySelectorAll(
            'a, button, input, textarea, select, details, [tabindex]:not([tabindex="-1"])'
        );

        // Add focus indicators
        focusableElements.forEach(element => {
            element.addEventListener('focus', function() {
                this.classList.add('focus-visible');
            });

            element.addEventListener('blur', function() {
                this.classList.remove('focus-visible');
            });
        });

        // Enhanced skip link
        const skipLink = document.querySelector('.skip-link');
        if (skipLink) {
            skipLink.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.focus();
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        }

        // Announce page changes to screen readers
        let pageTitle = document.title;
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'childList' && mutation.target.tagName === 'TITLE') {
                    const newTitle = document.title;
                    if (newTitle !== pageTitle) {
                        pageTitle = newTitle;
                        announceToScreenReader('Page updated: ' + newTitle);
                    }
                }
            });
        });

        observer.observe(document.head, {
            childList: true,
            subtree: true
        });

        function announceToScreenReader(message) {
            const announcement = document.createElement('div');
            announcement.setAttribute('aria-live', 'polite');
            announcement.setAttribute('aria-atomic', 'true');
            announcement.className = 'sr-only';
            announcement.textContent = message;
            
            document.body.appendChild(announcement);
            
            setTimeout(() => {
                document.body.removeChild(announcement);
            }, 1000);
        }

        // Enhanced menu keyboard navigation
        const menuItems = document.querySelectorAll('.menu-item a');
        
        menuItems.forEach((item, index) => {
            item.addEventListener('keydown', function(e) {
                switch(e.key) {
                    case 'ArrowDown':
                    case 'ArrowRight':
                        e.preventDefault();
                        const nextIndex = (index + 1) % menuItems.length;
                        menuItems[nextIndex].focus();
                        break;
                        
                    case 'ArrowUp':
                    case 'ArrowLeft':
                        e.preventDefault();
                        const prevIndex = index === 0 ? menuItems.length - 1 : index - 1;
                        menuItems[prevIndex].focus();
                        break;
                        
                    case 'Home':
                        e.preventDefault();
                        menuItems[0].focus();
                        break;
                        
                    case 'End':
                        e.preventDefault();
                        menuItems[menuItems.length - 1].focus();
                        break;
                }
            });
        });
    }

    /**
     * Enhanced Header CTA Button Effects
     */
    function initCTAEffects() {
        const ctaButton = document.querySelector('.header-cta-btn');
        
        if (ctaButton) {
            // Add ripple effect
            ctaButton.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });

            // Add ripple CSS
            const rippleStyle = document.createElement('style');
            rippleStyle.textContent = `
                .header-cta-btn {
                    position: relative;
                    overflow: hidden;
                }
                
                .ripple {
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.4);
                    transform: scale(0);
                    animation: ripple-animation 0.6s linear;
                    pointer-events: none;
                }
                
                @keyframes ripple-animation {
                    to {
                        transform: scale(4);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(rippleStyle);
        }
    }

    // Initialize CTA effects
    initCTAEffects();

    /**
     * Add screen reader only class
     */
    const srOnlyStyle = document.createElement('style');
    srOnlyStyle.textContent = `
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }
        
        .focus-visible {
            outline: 2px solid #1e40af;
            outline-offset: 2px;
        }
    `;
    document.head.appendChild(srOnlyStyle);

    // Expose public API for debugging
    window.EnhancedGlobal = {
        version: '2.0.0',
        initEnhancedHeader,
        initSmoothScrolling,
        initPageAnimations,
        initPerformanceOptimizations,
        initAccessibilityEnhancements
    };
});
