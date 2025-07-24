/**
 * Ultra-Fancy Services Page JavaScript
 * Interactive Features & Animations
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // ========================================
    // ANIMATED COUNTERS
    // ========================================
    function animateCounters() {
        const counters = document.querySelectorAll('.stat-number-animated[data-count]');
        
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-count'));
            const duration = 2000;
            const start = performance.now();
            
            function updateCounter(currentTime) {
                const elapsed = currentTime - start;
                const progress = Math.min(elapsed / duration, 1);
                
                // Easing function for smooth animation
                const easeOutCubic = 1 - Math.pow(1 - progress, 3);
                const current = Math.floor(target * easeOutCubic);
                
                if (target >= 1000) {
                    counter.textContent = current.toLocaleString() + '+';
                } else {
                    counter.textContent = current;
                }
                
                if (progress < 1) {
                    requestAnimationFrame(updateCounter);
                }
            }
            
            requestAnimationFrame(updateCounter);
        });
    }
    
    // ========================================
    // INTERSECTION OBSERVER FOR ANIMATIONS
    // ========================================
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                if (entry.target.classList.contains('stats-container-3d')) {
                    animateCounters();
                }
                
                // Add visible class for CSS animations
                entry.target.classList.add('animated-in');
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    document.querySelectorAll('.stats-container-3d, .benefit-card-ultra-fancy, .service-card-advanced').forEach(el => {
        observer.observe(el);
    });
    
    // ========================================
    // INTERACTIVE CANVAS PARTICLES
    // ========================================
    const canvas = document.getElementById('hero-interactive-canvas');
    if (canvas) {
        const ctx = canvas.getContext('2d');
        let particles = [];
        
        function resizeCanvas() {
            canvas.width = canvas.offsetWidth;
            canvas.height = canvas.offsetHeight;
        }
        
        function createParticle(x, y) {
            return {
                x: x || Math.random() * canvas.width,
                y: y || Math.random() * canvas.height,
                vx: (Math.random() - 0.5) * 2,
                vy: (Math.random() - 0.5) * 2,
                life: 1,
                decay: Math.random() * 0.01 + 0.005,
                size: Math.random() * 3 + 1,
                color: `hsl(${Math.random() * 60 + 200}, 100%, ${Math.random() * 50 + 50}%)`
            };
        }
        
        function updateParticles() {
            particles = particles.filter(particle => {
                particle.x += particle.vx;
                particle.y += particle.vy;
                particle.life -= particle.decay;
                return particle.life > 0;
            });
            
            // Add new particles randomly
            if (Math.random() < 0.1) {
                particles.push(createParticle());
            }
        }
        
        function drawParticles() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            
            particles.forEach(particle => {
                ctx.save();
                ctx.globalAlpha = particle.life;
                ctx.fillStyle = particle.color;
                ctx.beginPath();
                ctx.arc(particle.x, particle.y, particle.size, 0, Math.PI * 2);
                ctx.fill();
                ctx.restore();
            });
        }
        
        function animate() {
            updateParticles();
            drawParticles();
            requestAnimationFrame(animate);
        }
        
        // Mouse interaction
        canvas.addEventListener('mousemove', (e) => {
            const rect = canvas.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            for (let i = 0; i < 3; i++) {
                particles.push(createParticle(x + Math.random() * 20 - 10, y + Math.random() * 20 - 10));
            }
        });
        
        resizeCanvas();
        window.addEventListener('resize', resizeCanvas);
        animate();
    }
    
    // ========================================
    // SERVICE FILTER FUNCTIONALITY
    // ========================================
    const filterTabs = document.querySelectorAll('.filter-tab-mega-fancy');
    const serviceCards = document.querySelectorAll('.service-card-advanced');
    
    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const category = tab.getAttribute('data-category');
            
            // Update active tab
            filterTabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            
            // Filter service cards
            serviceCards.forEach(card => {
                if (category === 'all' || card.getAttribute('data-category') === category) {
                    card.style.display = 'block';
                    card.classList.add('filter-show');
                } else {
                    card.style.display = 'none';
                    card.classList.remove('filter-show');
                }
            });
        });
    });
    
    // ========================================
    // SEARCH FUNCTIONALITY
    // ========================================
    const searchInput = document.getElementById('service-search-cosmic');
    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            
            serviceCards.forEach(card => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const description = card.querySelector('.service-description').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    card.style.display = 'block';
                    card.classList.add('search-match');
                } else {
                    card.style.display = 'none';
                    card.classList.remove('search-match');
                }
            });
        });
    }
    
    // ========================================
    // INSTANT QUOTE CALCULATOR
    // ========================================
    const quoteSteps = document.querySelectorAll('.calculator-steps .step');
    const stepContents = document.querySelectorAll('.step-content');
    const navButtons = document.querySelectorAll('.calculator-navigation .nav-btn');
    let currentStep = 1;
    
    function updateQuoteStep(step) {
        // Update step indicators
        quoteSteps.forEach((s, index) => {
            if (index + 1 <= step) {
                s.classList.add('active');
            } else {
                s.classList.remove('active');
            }
        });
        
        // Update step content
        stepContents.forEach((content, index) => {
            if (index + 1 === step) {
                content.classList.add('active');
            } else {
                content.classList.remove('active');
            }
        });
        
        // Update navigation buttons
        const prevBtn = document.querySelector('.nav-btn.prev');
        const nextBtn = document.querySelector('.nav-btn.next');
        
        if (prevBtn) prevBtn.disabled = step === 1;
        if (nextBtn) nextBtn.style.display = step === 3 ? 'none' : 'block';
        
        currentStep = step;
    }
    
    // Quote calculator navigation
    navButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            if (btn.classList.contains('prev') && currentStep > 1) {
                updateQuoteStep(currentStep - 1);
            } else if (btn.classList.contains('next') && currentStep < 3) {
                updateQuoteStep(currentStep + 1);
            }
        });
    });
    
    // Service option selection
    const serviceOptions = document.querySelectorAll('.service-option');
    serviceOptions.forEach(option => {
        option.addEventListener('click', () => {
            serviceOptions.forEach(opt => opt.classList.remove('selected'));
            option.classList.add('selected');
            
            // Auto-advance to next step
            setTimeout(() => {
                if (currentStep === 1) {
                    updateQuoteStep(2);
                }
            }, 500);
        });
    });
    
    // ========================================
    // SMOOTH SCROLLING
    // ========================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // ========================================
    // BUTTON RIPPLE EFFECT
    // ========================================
    document.querySelectorAll('.btn-ultra-fancy').forEach(button => {
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
                animation: ripple 0.6s ease-out;
                pointer-events: none;
            `;
            
            this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
        });
    });
    
    // ========================================
    // LOAD MORE SERVICES
    // ========================================
    const loadMoreBtn = document.getElementById('load-more-services');
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', () => {
            // Simulate loading more services
            loadMoreBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
            
            setTimeout(() => {
                loadMoreBtn.innerHTML = '<span>All Services Loaded</span> <i class="fas fa-check"></i>';
                loadMoreBtn.disabled = true;
            }, 1500);
        });
    }
    
    // ========================================
    // PARALLAX EFFECT
    // ========================================
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.hero-mega-particles, .hero-floating-elements');
        
        parallaxElements.forEach(element => {
            const speed = 0.5;
            element.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });
    
    // ========================================
    // BOOKING FORM STEPS
    // ========================================
    const bookingSteps = document.querySelectorAll('#smart-booking-form .form-step');
    const bookingNavBtns = document.querySelectorAll('#smart-booking-form .nav-btn');
    let currentBookingStep = 1;
    
    function updateBookingStep(step) {
        bookingSteps.forEach((s, index) => {
            if (index + 1 === step) {
                s.classList.add('active');
            } else {
                s.classList.remove('active');
            }
        });
        
        const prevBtn = document.querySelector('#smart-booking-form .nav-btn.prev');
        const nextBtn = document.querySelector('#smart-booking-form .nav-btn.next');
        const submitBtn = document.querySelector('#smart-booking-form .nav-btn.submit');
        
        if (prevBtn) prevBtn.style.display = step === 1 ? 'none' : 'block';
        if (nextBtn) nextBtn.style.display = step === 3 ? 'none' : 'block';
        if (submitBtn) submitBtn.style.display = step === 3 ? 'block' : 'none';
        
        currentBookingStep = step;
    }
    
    bookingNavBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            if (btn.classList.contains('prev') && currentBookingStep > 1) {
                updateBookingStep(currentBookingStep - 1);
            } else if (btn.classList.contains('next') && currentBookingStep < 3) {
                updateBookingStep(currentBookingStep + 1);
            }
        });
    });
    
    // ========================================
    // FORM VALIDATION
    // ========================================
    const contactForm = document.getElementById('serviceQuoteForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Simple validation
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.style.borderColor = '#ff6b6b';
                    isValid = false;
                } else {
                    field.style.borderColor = '#4caf50';
                }
            });
            
            if (isValid) {
                // Show success message
                const submitBtn = this.querySelector('.submit-btn');
                const originalText = submitBtn.innerHTML;
                
                submitBtn.innerHTML = '<i class="fas fa-check"></i> <span>Quote Sent Successfully!</span>';
                submitBtn.style.background = '#4caf50';
                
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.style.background = '';
                    this.reset();
                }, 3000);
            }
        });
    }
    
    // ========================================
    // ADD CSS FOR RIPPLE ANIMATION
    // ========================================
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ripple {
            to {
                transform: scale(2);
                opacity: 0;
            }
        }
        
        .filter-show {
            animation: fadeInUp 0.5s ease-out;
        }
        
        .search-match {
            animation: highlight 0.3s ease-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes highlight {
            0% { background-color: rgba(255, 215, 0, 0.2); }
            100% { background-color: transparent; }
        }
        
        .service-option.selected {
            background: var(--cosmic-gold) !important;
            color: var(--cosmic-dark) !important;
            transform: scale(1.05);
        }
        
        .animated-in {
            animation: slideInUp 0.8s ease-out;
        }
        
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    `;
    document.head.appendChild(style);
    
    // ========================================
    // INITIALIZE EVERYTHING
    // ========================================
    console.log('🚀 Ultra-Fancy Services Page Loaded!');
});

// ========================================
// ADVANCED FEATURES
// ========================================

// Real-time clock for booking
function updateLiveTime() {
    const timeElements = document.querySelectorAll('.live-time');
    const now = new Date();
    const timeString = now.toLocaleTimeString();
    
    timeElements.forEach(el => {
        el.textContent = timeString;
    });
}

setInterval(updateLiveTime, 1000);

// Weather widget (simulated)
function updateWeatherWidget() {
    const weatherWidget = document.querySelector('.weather-widget .weather-info span');
    if (weatherWidget) {
        const conditions = ['Perfect weather for outdoor services!', 'Great day for home improvements!', 'Ideal conditions for pressure washing!'];
        const randomCondition = conditions[Math.floor(Math.random() * conditions.length)];
        weatherWidget.textContent = randomCondition;
    }
}

updateWeatherWidget();
setInterval(updateWeatherWidget, 30000); // Update every 30 seconds
