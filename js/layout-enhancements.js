/**
 * Blueprint Theme - Enhanced Mobile and Layout Interactions
 * Improved mobile navigation, responsive behaviors, and user experience
 */

document.addEventListener('DOMContentLoaded', function() {
    initMobileNavigation();
    initResponsiveBehaviors();
    initSmoothScrolling();
    initAnimations();
    initFormEnhancements();
    initChatWidget();
});

/**
 * Enhanced Mobile Navigation
 */
function initMobileNavigation() {
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('.nav-menu');
    const body = document.body;
    
    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', function() {
            const isActive = navMenu.classList.contains('active');
            
            if (isActive) {
                // Close menu
                navMenu.classList.remove('active');
                menuToggle.classList.remove('active');
                body.classList.remove('nav-open');
            } else {
                // Open menu
                navMenu.classList.add('active');
                menuToggle.classList.add('active');
                body.classList.add('nav-open');
            }
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!menuToggle.contains(event.target) && !navMenu.contains(event.target)) {
                navMenu.classList.remove('active');
                menuToggle.classList.remove('active');
                body.classList.remove('nav-open');
            }
        });
        
        // Close menu when clicking on nav links
        const navLinks = navMenu.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navMenu.classList.remove('active');
                menuToggle.classList.remove('active');
                body.classList.remove('nav-open');
            });
        });
    }
}

/**
 * Responsive Behaviors
 */
function initResponsiveBehaviors() {
    // Handle window resize
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            handleResponsiveChanges();
        }, 250);
    });
    
    // Initial setup
    handleResponsiveChanges();
}

function handleResponsiveChanges() {
    const isMobile = window.innerWidth <= 768;
    const isTablet = window.innerWidth > 768 && window.innerWidth <= 1024;
    
    // Update hero stats layout on mobile
    const heroStats = document.querySelector('.hero-stats');
    if (heroStats) {
        if (isMobile) {
            heroStats.style.flexDirection = 'column';
            heroStats.style.gap = '15px';
        } else {
            heroStats.style.flexDirection = 'row';
            heroStats.style.gap = '40px';
        }
    }
    
    // Update blueprint grid layout
    const blueprintsGrid = document.querySelector('.blueprints-grid');
    if (blueprintsGrid) {
        if (isMobile) {
            blueprintsGrid.style.gridTemplateColumns = '1fr';
            blueprintsGrid.style.gap = '20px';
        } else if (isTablet) {
            blueprintsGrid.style.gridTemplateColumns = 'repeat(2, 1fr)';
            blueprintsGrid.style.gap = '25px';
        } else {
            blueprintsGrid.style.gridTemplateColumns = 'repeat(auto-fit, minmax(320px, 1fr))';
            blueprintsGrid.style.gap = '30px';
        }
    }
    
    // Update summary stats layout
    const summaryStats = document.querySelectorAll('.summary-stats');
    summaryStats.forEach(stats => {
        if (isMobile) {
            stats.style.flexDirection = 'column';
            stats.style.gap = '15px';
        } else {
            stats.style.flexDirection = 'row';
            stats.style.gap = '20px';
        }
    });
}

/**
 * Smooth Scrolling
 */
function initSmoothScrolling() {
    // Smooth scrolling for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            if (href === '#') return;
            
            e.preventDefault();
            
            const target = document.querySelector(href);
            if (target) {
                const headerHeight = document.querySelector('.site-header')?.offsetHeight || 80;
                const targetPosition = target.offsetTop - headerHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

/**
 * Enhanced Animations
 */
function initAnimations() {
    // Intersection Observer for fade-in animations
    if ('IntersectionObserver' in window) {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        // Observe elements for animation
        const animateElements = document.querySelectorAll(
            '.blueprint-category-card, .hero-content, .section-header-fancy, .summary-item'
        );
        
        animateElements.forEach(el => {
            el.classList.add('animate-ready');
            observer.observe(el);
        });
    }
    
    // Add animation CSS if not already present
    if (!document.querySelector('#animation-styles')) {
        const animationCSS = `
            <style id="animation-styles">
                .animate-ready {
                    opacity: 0;
                    transform: translateY(30px);
                    transition: all 0.6s ease;
                }
                
                .animate-in {
                    opacity: 1;
                    transform: translateY(0);
                }
                
                .blueprint-category-card.animate-ready {
                    transform: translateY(30px) scale(0.95);
                }
                
                .blueprint-category-card.animate-in {
                    transform: translateY(0) scale(1);
                }
                
                .hero-content.animate-ready {
                    opacity: 0;
                    transform: translateY(50px);
                }
                
                .hero-content.animate-in {
                    opacity: 1;
                    transform: translateY(0);
                    transition-duration: 1s;
                }
                
                .summary-item:nth-child(1) { transition-delay: 0.1s; }
                .summary-item:nth-child(2) { transition-delay: 0.2s; }
                .summary-item:nth-child(3) { transition-delay: 0.3s; }
                .summary-item:nth-child(4) { transition-delay: 0.4s; }
            </style>
        `;
        document.head.insertAdjacentHTML('beforeend', animationCSS);
    }
}

/**
 * Form Enhancements
 */
function initFormEnhancements() {
    // Enhanced form validation and styling
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        const inputs = form.querySelectorAll('input, textarea, select');
        
        inputs.forEach(input => {
            // Add focus/blur effects
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
                if (this.value) {
                    this.parentElement.classList.add('filled');
                } else {
                    this.parentElement.classList.remove('filled');
                }
            });
            
            // Initial state check
            if (input.value) {
                input.parentElement.classList.add('filled');
            }
        });
        
        // Form submission enhancement
        form.addEventListener('submit', function(e) {
            const submitBtn = form.querySelector('button[type="submit"], input[type="submit"]');
            if (submitBtn) {
                submitBtn.classList.add('loading');
                submitBtn.disabled = true;
                
                // Re-enable after 3 seconds (adjust based on your needs)
                setTimeout(() => {
                    submitBtn.classList.remove('loading');
                    submitBtn.disabled = false;
                }, 3000);
            }
        });
    });
    
    // Add form styling CSS
    if (!document.querySelector('#form-styles')) {
        const formCSS = `
            <style id="form-styles">
                .form-group {
                    position: relative;
                    margin-bottom: 25px;
                }
                
                .form-group.focused .form-control {
                    border-color: #667eea;
                    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
                }
                
                .form-group.filled .form-control {
                    background-color: #f8fafc;
                }
                
                .loading {
                    position: relative;
                    pointer-events: none;
                }
                
                .loading::after {
                    content: '';
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    width: 20px;
                    height: 20px;
                    margin: -10px 0 0 -10px;
                    border: 2px solid transparent;
                    border-top: 2px solid currentColor;
                    border-radius: 50%;
                    animation: spin 1s linear infinite;
                }
                
                @keyframes spin {
                    0% { transform: rotate(0deg); }
                    100% { transform: rotate(360deg); }
                }
            </style>
        `;
        document.head.insertAdjacentHTML('beforeend', formCSS);
    }
}

/**
 * Chat Widget Enhancement
 */
function initChatWidget() {
    const chatWidget = document.querySelector('.chat-widget');
    if (!chatWidget) return;
    
    const chatBubble = chatWidget.querySelector('.chat-bubble');
    const chatPanel = chatWidget.querySelector('.chat-panel');
    
    if (chatBubble) {
        chatBubble.addEventListener('click', function() {
            if (chatPanel) {
                chatPanel.classList.toggle('active');
            }
        });
    }
    
    // Close chat when clicking outside
    document.addEventListener('click', function(event) {
        if (chatWidget && !chatWidget.contains(event.target)) {
            if (chatPanel) {
                chatPanel.classList.remove('active');
            }
        }
    });
    
    // Chat input handling
    const chatInput = chatWidget.querySelector('.chat-input input');
    const chatSendBtn = chatWidget.querySelector('.chat-input button');
    const chatMessages = chatWidget.querySelector('.chat-messages');
    
    if (chatInput && chatSendBtn && chatMessages) {
        function sendMessage() {
            const message = chatInput.value.trim();
            if (message) {
                // Add user message
                const messageEl = document.createElement('div');
                messageEl.className = 'chat-message user-message';
                messageEl.textContent = message;
                chatMessages.appendChild(messageEl);
                
                chatInput.value = '';
                chatMessages.scrollTop = chatMessages.scrollHeight;
                
                // Simulate response (replace with actual chat integration)
                setTimeout(() => {
                    const responseEl = document.createElement('div');
                    responseEl.className = 'chat-message bot-message';
                    responseEl.textContent = 'Thanks for your message! Our team will get back to you soon.';
                    chatMessages.appendChild(responseEl);
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }, 1000);
            }
        }
        
        chatSendBtn.addEventListener('click', sendMessage);
        chatInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });
    }
}

/**
 * Header Scroll Effect
 */
window.addEventListener('scroll', function() {
    const header = document.querySelector('.site-header');
    if (header) {
        if (window.scrollY > 100) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }
});

/**
 * Performance Optimization
 */
function optimizeImages() {
    const images = document.querySelectorAll('img[data-src]');
    
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver(function(entries) {
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
    } else {
        // Fallback for browsers without IntersectionObserver
        images.forEach(img => {
            img.src = img.dataset.src;
            img.classList.remove('lazy');
        });
    }
}

// Initialize image optimization
optimizeImages();

/**
 * Touch Gestures for Mobile
 */
function initTouchGestures() {
    let touchStartX = 0;
    let touchStartY = 0;
    
    document.addEventListener('touchstart', function(e) {
        touchStartX = e.touches[0].clientX;
        touchStartY = e.touches[0].clientY;
    });
    
    document.addEventListener('touchmove', function(e) {
        if (!touchStartX || !touchStartY) return;
        
        const touchEndX = e.touches[0].clientX;
        const touchEndY = e.touches[0].clientY;
        
        const diffX = touchStartX - touchEndX;
        const diffY = touchStartY - touchEndY;
        
        // Horizontal swipe
        if (Math.abs(diffX) > Math.abs(diffY)) {
            if (diffX > 50) {
                // Swipe left
                handleSwipeLeft();
            } else if (diffX < -50) {
                // Swipe right
                handleSwipeRight();
            }
        }
        
        touchStartX = 0;
        touchStartY = 0;
    });
}

function handleSwipeLeft() {
    // Close mobile menu if open
    const navMenu = document.querySelector('.nav-menu');
    const menuToggle = document.querySelector('.menu-toggle');
    
    if (navMenu && navMenu.classList.contains('active')) {
        navMenu.classList.remove('active');
        menuToggle.classList.remove('active');
        document.body.classList.remove('nav-open');
    }
}

function handleSwipeRight() {
    // Could implement swipe to open menu or other features
}

// Initialize touch gestures
initTouchGestures();
