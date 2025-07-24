/**
 * Ultra-Fancy Services Page JavaScript - Enhanced Version
 * Revolutionary Interactive Features & Advanced Animations
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize all components
    initAnimatedCounters();
    initParticleCanvas();
    initServiceFilters();
    initSmartBookingForm();
    initSmoothScrolling();
    initButtonEffects();
    initQuoteCalculator();
    initSuccessStories();
    initAdvancedFeatures();
    
    // ========================================
    // ANIMATED COUNTERS WITH INTERSECTION OBSERVER
    // ========================================
    function initAnimatedCounters() {
        const counters = document.querySelectorAll('.stat-number, .metric-value, .stat-number-animated[data-count]');
        
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    counterObserver.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        counters.forEach(counter => {
            counterObserver.observe(counter);
        });
    }
    
    function animateCounter(element) {
        let target;
        
        // Check if element has data-count attribute
        if (element.hasAttribute('data-count')) {
            target = parseInt(element.getAttribute('data-count'));
        } else {
            target = parseInt(element.textContent.replace(/[^\d]/g, ''));
        }
        
        const suffix = element.textContent.replace(/[\d]/g, '');
        let current = 0;
        const increment = target / 100;
        const duration = 2000;
        const stepTime = duration / 100;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                if (target >= 1000) {
                    element.textContent = target.toLocaleString() + '+';
                } else {
                    element.textContent = target + suffix;
                }
                clearInterval(timer);
                element.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    element.style.transform = 'scale(1)';
                }, 200);
            } else {
                if (target >= 1000) {
                    element.textContent = Math.floor(current).toLocaleString() + '+';
                } else {
                    element.textContent = Math.floor(current) + suffix;
                }
            }
        }, stepTime);
    }
    
    // ========================================
    // INTERACTIVE PARTICLE CANVAS
    // ========================================
    function initParticleCanvas() {
        const heroSection = document.querySelector('.services-hero-cosmic');
        if (!heroSection) return;
        
        const canvas = document.createElement('canvas');
        canvas.style.position = 'absolute';
        canvas.style.top = '0';
        canvas.style.left = '0';
        canvas.style.width = '100%';
        canvas.style.height = '100%';
        canvas.style.pointerEvents = 'none';
        canvas.style.zIndex = '1';
        
        heroSection.appendChild(canvas);
        
        const ctx = canvas.getContext('2d');
        let particles = [];
        let mouse = { x: 0, y: 0 };
        
        function resizeCanvas() {
            canvas.width = heroSection.offsetWidth;
            canvas.height = heroSection.offsetHeight;
        }
        
        resizeCanvas();
        window.addEventListener('resize', resizeCanvas);
        
        heroSection.addEventListener('mousemove', (e) => {
            const rect = heroSection.getBoundingClientRect();
            mouse.x = e.clientX - rect.left;
            mouse.y = e.clientY - rect.top;
        });
        
        class Particle {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.vx = (Math.random() - 0.5) * 2;
                this.vy = (Math.random() - 0.5) * 2;
                this.size = Math.random() * 3 + 1;
                this.life = Math.random() * 100 + 50;
                this.maxLife = this.life;
            }
            
            update() {
                this.x += this.vx;
                this.y += this.vy;
                this.life--;
                
                // Mouse interaction
                const dx = mouse.x - this.x;
                const dy = mouse.y - this.y;
                const distance = Math.sqrt(dx * dx + dy * dy);
                
                if (distance < 100) {
                    this.vx += (dx / distance) * 0.1;
                    this.vy += (dy / distance) * 0.1;
                }
                
                // Boundaries
                if (this.x < 0 || this.x > canvas.width) this.vx *= -1;
                if (this.y < 0 || this.y > canvas.height) this.vy *= -1;
            }
            
            draw() {
                const opacity = this.life / this.maxLife;
                ctx.globalAlpha = opacity;
                ctx.fillStyle = '#ffd700';
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }
        
        // Create particles
        for (let i = 0; i < 50; i++) {
            particles.push(new Particle());
        }
        
        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            
            particles.forEach((particle, index) => {
                particle.update();
                particle.draw();
                
                if (particle.life <= 0) {
                    particles[index] = new Particle();
                }
            });
            
            requestAnimationFrame(animate);
        }
        
        animate();
    }
    
    // ========================================
    // SERVICE FILTERING SYSTEM
    // ========================================
    function initServiceFilters() {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const serviceCards = document.querySelectorAll('.service-card-cosmic');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Update active filter
                filterButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                
                const filter = button.dataset.filter;
                
                // Filter cards with animation
                serviceCards.forEach((card, index) => {
                    setTimeout(() => {
                        if (filter === 'all' || card.dataset.category === filter) {
                            card.style.display = 'block';
                            setTimeout(() => {
                                card.style.opacity = '1';
                                card.style.transform = 'translateY(0)';
                            }, 10);
                        } else {
                            card.style.opacity = '0';
                            card.style.transform = 'translateY(20px)';
                            setTimeout(() => {
                                card.style.display = 'none';
                            }, 300);
                        }
                    }, index * 100);
                });
            });
        });
    }
    
    // ========================================
    // SMART BOOKING FORM WIZARD
    // ========================================
    function initSmartBookingForm() {
        const form = document.getElementById('smart-booking-form');
        if (!form) return;
        
        const steps = form.querySelectorAll('.form-step');
        const nextBtns = form.querySelectorAll('.nav-btn.next');
        const prevBtns = form.querySelectorAll('.nav-btn.prev');
        const submitBtn = form.querySelector('.nav-btn.submit');
        
        let currentStep = 0;
        
        function showStep(stepIndex) {
            steps.forEach((step, index) => {
                step.classList.toggle('active', index === stepIndex);
            });
        }
        
        function validateStep(stepIndex) {
            const currentStepElement = steps[stepIndex];
            const requiredFields = currentStepElement.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.style.borderColor = '#ff4757';
                    isValid = false;
                } else {
                    field.style.borderColor = 'rgba(255, 255, 255, 0.2)';
                }
            });
            
            return isValid;
        }
        
        nextBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                if (validateStep(currentStep)) {
                    currentStep++;
                    showStep(currentStep);
                    
                    // Add loading animation
                    btn.classList.add('loading');
                    setTimeout(() => {
                        btn.classList.remove('loading');
                    }, 500);
                } else {
                    // Shake animation for invalid form
                    form.style.animation = 'shake 0.5s ease-in-out';
                    setTimeout(() => {
                        form.style.animation = '';
                    }, 500);
                }
            });
        });
        
        prevBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                currentStep--;
                showStep(currentStep);
            });
        });
        
        if (submitBtn) {
            submitBtn.addEventListener('click', (e) => {
                e.preventDefault();
                
                if (validateStep(currentStep)) {
                    submitBtn.classList.add('loading');
                    
                    // Simulate form submission
                    setTimeout(() => {
                        submitBtn.classList.remove('loading');
                        showSuccessMessage();
                    }, 2000);
                }
            });
        }
        
        function showSuccessMessage() {
            const successDiv = document.createElement('div');
            successDiv.className = 'booking-success';
            successDiv.innerHTML = `
                <div class="success-content">
                    <i class="fas fa-check-circle"></i>
                    <h3>Booking Confirmed!</h3>
                    <p>We'll contact you within 24 hours to confirm your appointment.</p>
                </div>
            `;
            
            form.parentNode.replaceChild(successDiv, form);
            
            // Add success animation
            successDiv.style.opacity = '0';
            successDiv.style.transform = 'scale(0.8)';
            setTimeout(() => {
                successDiv.style.transition = 'all 0.5s ease';
                successDiv.style.opacity = '1';
                successDiv.style.transform = 'scale(1)';
            }, 100);
        }
        
        // Initialize first step
        showStep(0);
    }
    
    // ========================================
    // SMOOTH SCROLLING WITH EASING
    // ========================================
    function initSmoothScrolling() {
        const scrollLinks = document.querySelectorAll('a[href^="#"]');
        
        scrollLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                
                const targetId = link.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    const targetPosition = targetElement.offsetTop - 100;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }
    
    // ========================================
    // BUTTON RIPPLE EFFECTS
    // ========================================
    function initButtonEffects() {
        const buttons = document.querySelectorAll('.btn-cosmic, .btn-advanced-final, .nav-btn, .mega-btn');
        
        buttons.forEach(button => {
            button.addEventListener('click', function(e) {
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
        });
    }
    
    // ========================================
    // INSTANT QUOTE CALCULATOR
    // ========================================
    function initQuoteCalculator() {
        const serviceSelect = document.getElementById('service-type');
        const projectSize = document.getElementById('project-size');
        const urgency = document.getElementById('urgency');
        const quoteDisplay = document.querySelector('.quote-display');
        
        if (!serviceSelect || !quoteDisplay) return;
        
        const basePrices = {
            'web-design': 1500,
            'web-development': 2500,
            'e-commerce': 3500,
            'seo': 800,
            'digital-marketing': 1200,
            'branding': 2000
        };
        
        const sizeMultipliers = {
            'small': 1,
            'medium': 1.5,
            'large': 2.5,
            'enterprise': 4
        };
        
        const urgencyMultipliers = {
            'flexible': 1,
            'standard': 1.2,
            'urgent': 1.8,
            'rush': 2.5
        };
        
        function calculateQuote() {
            const service = serviceSelect.value;
            const size = projectSize ? projectSize.value : 'medium';
            const rush = urgency ? urgency.value : 'standard';
            
            if (!service) return;
            
            const basePrice = basePrices[service] || 1000;
            const sizeMultiplier = sizeMultipliers[size] || 1;
            const urgencyMultiplier = urgencyMultipliers[rush] || 1;
            
            const total = Math.round(basePrice * sizeMultiplier * urgencyMultiplier);
            
            quoteDisplay.innerHTML = `
                <div class="quote-amount">$${total.toLocaleString()}</div>
                <div class="quote-details">
                    <span>Base: $${basePrice.toLocaleString()}</span>
                    <span>Size: x${sizeMultiplier}</span>
                    <span>Timeline: x${urgencyMultiplier}</span>
                </div>
            `;
            
            // Animate the quote update
            quoteDisplay.style.transform = 'scale(1.05)';
            setTimeout(() => {
                quoteDisplay.style.transform = 'scale(1)';
            }, 200);
        }
        
        [serviceSelect, projectSize, urgency].forEach(element => {
            if (element) {
                element.addEventListener('change', calculateQuote);
            }
        });
        
        // Initial calculation
        calculateQuote();
    }
    
    // ========================================
    // SUCCESS STORIES CAROUSEL
    // ========================================
    function initSuccessStories() {
        const stories = document.querySelectorAll('.story-card');
        if (stories.length === 0) return;
        
        let currentStory = 0;
        
        function showStory(index) {
            stories.forEach((story, i) => {
                story.style.display = i === index ? 'block' : 'none';
                if (i === index) {
                    story.style.opacity = '0';
                    story.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        story.style.transition = 'all 0.5s ease';
                        story.style.opacity = '1';
                        story.style.transform = 'translateY(0)';
                    }, 100);
                }
            });
        }
        
        function nextStory() {
            currentStory = (currentStory + 1) % stories.length;
            showStory(currentStory);
        }
        
        // Auto-rotate stories
        setInterval(nextStory, 5000);
        
        // Initialize first story
        showStory(0);
    }
    
    // ========================================
    // ADVANCED FEATURES
    // ========================================
    function initAdvancedFeatures() {
        // Parallax scrolling for hero elements
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallaxElements = document.querySelectorAll('.parallax-element');
            
            parallaxElements.forEach((element, index) => {
                const speed = 0.5 + (index * 0.1);
                element.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });
        
        // Intersection Observer for fade-in animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, observerOptions);
        
        // Observe all animatable elements
        const animatableElements = document.querySelectorAll(
            '.service-card-cosmic, .stat-container, .feature-item, .offer-item'
        );
        
        animatableElements.forEach(element => {
            element.classList.add('animate-target');
            observer.observe(element);
        });
        
        // Loading progress bar
        const progressBar = document.createElement('div');
        progressBar.className = 'loading-progress';
        progressBar.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: linear-gradient(90deg, #ffd700, #4facfe);
            z-index: 9999;
            transition: width 0.3s ease;
        `;
        document.body.appendChild(progressBar);
        
        window.addEventListener('scroll', () => {
            const scrollPercent = (window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100;
            progressBar.style.width = scrollPercent + '%';
        });
        
        // Auto-hide navigation on scroll down
        let lastScrollTop = 0;
        const navigation = document.querySelector('.main-navigation');
        
        if (navigation) {
            window.addEventListener('scroll', () => {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                if (scrollTop > lastScrollTop && scrollTop > 100) {
                    navigation.style.transform = 'translateY(-100%)';
                } else {
                    navigation.style.transform = 'translateY(0)';
                }
                
                lastScrollTop = scrollTop;
            });
        }
    }
    
    // ========================================
    // LEGACY COMPATIBILITY
    // ========================================
    
    // Legacy animation function for existing counters
    function animateStatsObserver() {
        const statsSection = document.querySelector('.cosmic-stats-showcase');
        if (!statsSection) return;
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        observer.observe(statsSection);
    }
    
    // Initialize legacy compatibility
    animateStatsObserver();
    
    // ========================================
    // CSS ANIMATIONS FOR JAVASCRIPT
    // ========================================
    const style = document.createElement('style');
    style.textContent = `
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: scale(0);
            animation: ripple-animation 0.6s ease-out;
            pointer-events: none;
        }
        
        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        
        .animate-target {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }
        
        .animate-in {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }
        
        .booking-success {
            text-align: center;
            padding: 4rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 25px;
            backdrop-filter: blur(20px);
        }
        
        .booking-success i {
            font-size: 4rem;
            color: #27ae60;
            margin-bottom: 1rem;
        }
        
        .booking-success h3 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: white;
        }
        
        .booking-success p {
            font-size: 1.1rem;
            opacity: 0.9;
            color: white;
        }
        
        .quote-display {
            text-align: center;
            padding: 2rem;
            background: rgba(255, 215, 0, 0.1);
            border-radius: 15px;
            margin-top: 1rem;
            transition: all 0.3s ease;
        }
        
        .quote-amount {
            font-size: 2.5rem;
            font-weight: 900;
            color: #ffd700;
            margin-bottom: 0.5rem;
        }
        
        .quote-details {
            display: flex;
            justify-content: center;
            gap: 1rem;
            font-size: 0.9rem;
            opacity: 0.8;
        }
        
        .main-navigation {
            transition: transform 0.3s ease;
        }
        
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
    `;
    document.head.appendChild(style);
});

// ========================================
// UTILITY FUNCTIONS
// ========================================

// Debounce function for performance
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Throttle function for scroll events
function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    }
}

// Global utilities
window.UltraFancyServices = {
    // Trigger confetti effect
    triggerConfetti: function() {
        console.log('🎉 Confetti triggered!');
    },
    
    // Show notification
    showNotification: function(message, type = 'success') {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.textContent = message;
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem 2rem;
            background: ${type === 'success' ? '#27ae60' : '#e74c3c'};
            color: white;
            border-radius: 10px;
            z-index: 10000;
            animation: slideInRight 0.3s ease;
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.animation = 'slideOutRight 0.3s ease';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }
};
