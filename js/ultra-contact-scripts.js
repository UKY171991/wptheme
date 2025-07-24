/**
 * Ultra-Fancy Contact Page JavaScript
 * Advanced Interactive Features & Form Handling
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize all components
    initMultiStepForm();
    initAnimatedCounters();
    initParticleEffects();
    initScrollAnimations();
    initContactInteractions();
    initQuoteCalculator();
    initFormValidation();
    initSuccessEffects();
    
    // ========================================
    // MULTI-STEP FORM HANDLER
    // ========================================
    function initMultiStepForm() {
        const form = document.getElementById('ultra-contact-form');
        if (!form) return;
        
        const steps = form.querySelectorAll('.form-step');
        const stepIndicators = document.querySelectorAll('.step-indicator');
        const progressBar = document.getElementById('progressBar');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');
        
        let currentStep = 0;
        const totalSteps = steps.length;
        
        // Form data storage
        let formData = {
            service: '',
            budget: '',
            timeline: '',
            description: '',
            name: '',
            company: '',
            email: '',
            phone: '',
            contactMethod: 'email'
        };
        
        function updateProgress() {
            const progress = ((currentStep + 1) / totalSteps) * 100;
            progressBar.style.width = progress + '%';
            
            // Update step indicators
            stepIndicators.forEach((indicator, index) => {
                indicator.classList.remove('active', 'completed');
                if (index < currentStep) {
                    indicator.classList.add('completed');
                } else if (index === currentStep) {
                    indicator.classList.add('active');
                }
            });
        }
        
        function showStep(stepIndex) {
            steps.forEach((step, index) => {
                step.classList.toggle('active', index === stepIndex);
            });
            
            // Update navigation buttons
            prevBtn.style.display = stepIndex === 0 ? 'none' : 'flex';
            nextBtn.style.display = stepIndex === totalSteps - 1 ? 'none' : 'flex';
            submitBtn.style.display = stepIndex === totalSteps - 1 ? 'flex' : 'none';
            
            updateProgress();
            updateReviewSummary();
        }
        
        function validateStep(stepIndex) {
            const currentStepElement = steps[stepIndex];
            let isValid = true;
            
            switch(stepIndex) {
                case 0: // Service selection
                    const selectedService = document.querySelector('.service-option.selected');
                    if (!selectedService) {
                        showNotification('Please select a service', 'error');
                        isValid = false;
                    } else {
                        formData.service = selectedService.dataset.value;
                    }
                    break;
                    
                case 1: // Project details
                    const budget = document.getElementById('project-budget').value;
                    const timeline = document.getElementById('project-timeline').value;
                    
                    if (!budget || !timeline) {
                        showNotification('Please complete all required fields', 'error');
                        isValid = false;
                    } else {
                        formData.budget = budget;
                        formData.timeline = timeline;
                        formData.description = document.getElementById('project-description').value;
                    }
                    break;
                    
                case 2: // Contact information
                    const name = document.getElementById('contact-name').value;
                    const email = document.getElementById('contact-email').value;
                    const phone = document.getElementById('contact-phone').value;
                    
                    if (!name || !email || !phone) {
                        showNotification('Please complete all required contact fields', 'error');
                        isValid = false;
                    } else if (!isValidEmail(email)) {
                        showNotification('Please enter a valid email address', 'error');
                        isValid = false;
                    } else {
                        formData.name = name;
                        formData.email = email;
                        formData.phone = phone;
                        formData.company = document.getElementById('contact-company').value;
                        formData.contactMethod = document.querySelector('input[name="contact_method"]:checked').value;
                    }
                    break;
                    
                case 3: // Review
                    const agreeTerms = document.getElementById('agree-terms').checked;
                    if (!agreeTerms) {
                        showNotification('Please agree to the terms and conditions', 'error');
                        isValid = false;
                    }
                    break;
            }
            
            return isValid;
        }
        
        function updateReviewSummary() {
            if (currentStep === 3) { // Review step
                document.getElementById('review-service').textContent = getServiceName(formData.service) || 'Not selected';
                document.getElementById('review-budget').textContent = getBudgetLabel(formData.budget) || 'Not selected';
                document.getElementById('review-timeline').textContent = getTimelineLabel(formData.timeline) || 'Not selected';
                document.getElementById('review-contact').textContent = formData.name ? `${formData.name} (${formData.email})` : 'Not provided';
                
                calculateEstimate();
            }
        }
        
        // Service selection handlers
        document.querySelectorAll('.service-option').forEach(option => {
            option.addEventListener('click', () => {
                document.querySelectorAll('.service-option').forEach(opt => opt.classList.remove('selected'));
                option.classList.add('selected');
                
                // Add animation
                option.style.transform = 'scale(1.05)';
                setTimeout(() => {
                    option.style.transform = '';
                }, 200);
            });
        });
        
        // Navigation event listeners
        nextBtn.addEventListener('click', () => {
            if (validateStep(currentStep)) {
                currentStep++;
                showStep(currentStep);
                
                // Add loading effect
                nextBtn.classList.add('loading');
                setTimeout(() => {
                    nextBtn.classList.remove('loading');
                }, 300);
            }
        });
        
        prevBtn.addEventListener('click', () => {
            currentStep--;
            showStep(currentStep);
        });
        
        submitBtn.addEventListener('click', (e) => {
            e.preventDefault();
            
            if (validateStep(currentStep)) {
                submitForm();
            }
        });
        
        // Initialize first step
        showStep(0);
    }
    
    // ========================================
    // FORM SUBMISSION
    // ========================================
    function submitForm() {
        const submitBtn = document.getElementById('submitBtn');
        submitBtn.classList.add('loading');
        
        // Simulate form submission
        setTimeout(() => {
            submitBtn.classList.remove('loading');
            showSuccessMessage();
            triggerConfetti();
        }, 2000);
    }
    
    function showSuccessMessage() {
        const formWrapper = document.querySelector('.contact-form-wrapper');
        
        const successHTML = `
            <div class="success-message">
                <div class="success-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3>Thank You!</h3>
                <p>Your request has been submitted successfully. We'll get back to you within 24 hours.</p>
                <div class="success-actions">
                    <button class="cta-btn primary" onclick="location.reload()">
                        <i class="fas fa-plus"></i>
                        Submit Another Request
                    </button>
                    <a href="/" class="cta-btn secondary">
                        <i class="fas fa-home"></i>
                        Back to Home
                    </a>
                </div>
            </div>
        `;
        
        formWrapper.innerHTML = successHTML;
        
        // Add success animation
        const successMessage = formWrapper.querySelector('.success-message');
        successMessage.style.opacity = '0';
        successMessage.style.transform = 'scale(0.8)';
        
        setTimeout(() => {
            successMessage.style.transition = 'all 0.5s ease';
            successMessage.style.opacity = '1';
            successMessage.style.transform = 'scale(1)';
        }, 100);
    }
    
    // ========================================
    // ANIMATED COUNTERS
    // ========================================
    function initAnimatedCounters() {
        const counters = document.querySelectorAll('[data-count]');
        
        const observerOptions = {
            threshold: 0.7,
            rootMargin: '0px 0px -100px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        counters.forEach(counter => observer.observe(counter));
    }
    
    function animateCounter(element) {
        const target = parseInt(element.dataset.count);
        const duration = 2000;
        const start = performance.now();
        
        function updateCounter(currentTime) {
            const elapsed = currentTime - start;
            const progress = Math.min(elapsed / duration, 1);
            
            const easeOutCubic = 1 - Math.pow(1 - progress, 3);
            const current = Math.floor(target * easeOutCubic);
            
            element.textContent = current;
            
            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            } else {
                // Add completion effect
                element.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    element.style.transform = 'scale(1)';
                }, 200);
            }
        }
        
        requestAnimationFrame(updateCounter);
    }
    
    // ========================================
    // PARTICLE EFFECTS
    // ========================================
    function initParticleEffects() {
        const heroSection = document.querySelector('.contact-hero-cosmic');
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
                this.vx = (Math.random() - 0.5) * 1;
                this.vy = (Math.random() - 0.5) * 1;
                this.size = Math.random() * 2 + 1;
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
                
                if (distance < 80) {
                    this.vx += (dx / distance) * 0.05;
                    this.vy += (dy / distance) * 0.05;
                }
                
                // Boundaries
                if (this.x < 0 || this.x > canvas.width) this.vx *= -1;
                if (this.y < 0 || this.y > canvas.height) this.vy *= -1;
            }
            
            draw() {
                const opacity = this.life / this.maxLife;
                ctx.globalAlpha = opacity * 0.6;
                ctx.fillStyle = '#ffd700';
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }
        
        // Create particles
        for (let i = 0; i < 30; i++) {
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
    // SCROLL ANIMATIONS
    // ========================================
    function initScrollAnimations() {
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
        
        // Observe elements for animation
        const animateElements = document.querySelectorAll(
            '.contact-method, .trust-item, .faq-item, .testimonial-card'
        );
        
        animateElements.forEach(element => {
            element.classList.add('animate-target');
            observer.observe(element);
        });
    }
    
    // ========================================
    // CONTACT INTERACTIONS
    // ========================================
    function initContactInteractions() {
        // Phone number click tracking
        document.querySelectorAll('a[href^="tel:"]').forEach(link => {
            link.addEventListener('click', () => {
                showNotification('Initiating call...', 'success');
            });
        });
        
        // Email click tracking
        document.querySelectorAll('a[href^="mailto:"]').forEach(link => {
            link.addEventListener('click', () => {
                showNotification('Opening email client...', 'success');
            });
        });
        
        // FAQ interactions
        document.querySelectorAll('.faq-item').forEach(item => {
            item.addEventListener('click', () => {
                const answer = item.querySelector('.faq-answer');
                const isVisible = answer.style.display === 'block';
                
                // Close all other answers
                document.querySelectorAll('.faq-answer').forEach(ans => {
                    ans.style.display = 'none';
                });
                
                // Toggle current answer
                answer.style.display = isVisible ? 'none' : 'block';
                
                if (!isVisible) {
                    answer.style.opacity = '0';
                    setTimeout(() => {
                        answer.style.transition = 'opacity 0.3s ease';
                        answer.style.opacity = '1';
                    }, 10);
                }
            });
        });
    }
    
    // ========================================
    // QUOTE CALCULATOR
    // ========================================
    function initQuoteCalculator() {
        // This will be called from the form validation
    }
    
    function calculateEstimate() {
        const service = formData.service;
        const budget = formData.budget;
        const timeline = formData.timeline;
        
        const basePrices = {
            'web-design': { min: 3000, max: 8000 },
            'web-development': { min: 5000, max: 15000 },
            'e-commerce': { min: 8000, max: 25000 },
            'digital-marketing': { min: 2000, max: 8000 },
            'branding': { min: 3000, max: 12000 },
            'consulting': { min: 2000, max: 10000 }
        };
        
        const timelineMultipliers = {
            'asap': 1.5,
            '1-month': 1.2,
            '2-3-months': 1,
            '3-6-months': 0.9,
            '6-plus-months': 0.8
        };
        
        let basePrice = basePrices[service] || { min: 3000, max: 10000 };
        const multiplier = timelineMultipliers[timeline] || 1;
        
        const minPrice = Math.round(basePrice.min * multiplier);
        const maxPrice = Math.round(basePrice.max * multiplier);
        
        document.getElementById('quote-min').textContent = minPrice.toLocaleString();
        document.getElementById('quote-max').textContent = maxPrice.toLocaleString();
        
        // Animate quote update
        const quoteDisplay = document.querySelector('.quote-display');
        quoteDisplay.style.transform = 'scale(1.05)';
        setTimeout(() => {
            quoteDisplay.style.transform = 'scale(1)';
        }, 300);
    }
    
    // ========================================
    // FORM VALIDATION
    // ========================================
    function initFormValidation() {
        // Real-time validation for inputs
        document.querySelectorAll('input, select, textarea').forEach(input => {
            input.addEventListener('blur', () => {
                validateField(input);
            });
            
            input.addEventListener('focus', () => {
                clearFieldError(input);
            });
        });
    }
    
    function validateField(field) {
        const value = field.value.trim();
        let isValid = true;
        let message = '';
        
        if (field.hasAttribute('required') && !value) {
            isValid = false;
            message = 'This field is required';
        } else if (field.type === 'email' && value && !isValidEmail(value)) {
            isValid = false;
            message = 'Please enter a valid email address';
        } else if (field.type === 'tel' && value && !isValidPhone(value)) {
            isValid = false;
            message = 'Please enter a valid phone number';
        }
        
        if (!isValid) {
            showFieldError(field, message);
        } else {
            clearFieldError(field);
        }
        
        return isValid;
    }
    
    function showFieldError(field, message) {
        field.style.borderColor = '#e74c3c';
        field.style.background = 'rgba(231, 76, 60, 0.05)';
        
        // Remove existing error message
        const existingError = field.parentNode.querySelector('.field-error');
        if (existingError) {
            existingError.remove();
        }
        
        // Add new error message
        const errorDiv = document.createElement('div');
        errorDiv.className = 'field-error';
        errorDiv.textContent = message;
        errorDiv.style.cssText = `
            color: #e74c3c;
            font-size: 0.8rem;
            margin-top: 0.5rem;
            animation: fadeIn 0.3s ease;
        `;
        
        field.parentNode.appendChild(errorDiv);
    }
    
    function clearFieldError(field) {
        field.style.borderColor = '';
        field.style.background = '';
        
        const errorDiv = field.parentNode.querySelector('.field-error');
        if (errorDiv) {
            errorDiv.remove();
        }
    }
    
    // ========================================
    // SUCCESS EFFECTS
    // ========================================
    function initSuccessEffects() {
        // Initialize confetti and other success animations
    }
    
    function triggerConfetti() {
        // Create confetti effect
        for (let i = 0; i < 50; i++) {
            createConfettiPiece();
        }
    }
    
    function createConfettiPiece() {
        const confetti = document.createElement('div');
        confetti.style.cssText = `
            position: fixed;
            width: 10px;
            height: 10px;
            background: ${['#ffd700', '#667eea', '#f093fb', '#27ae60'][Math.floor(Math.random() * 4)]};
            left: ${Math.random() * 100}vw;
            top: -10px;
            border-radius: 50%;
            pointer-events: none;
            z-index: 10000;
            animation: confetti-fall 3s linear forwards;
        `;
        
        document.body.appendChild(confetti);
        
        setTimeout(() => {
            confetti.remove();
        }, 3000);
    }
    
    // ========================================
    // UTILITY FUNCTIONS
    // ========================================
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    function isValidPhone(phone) {
        const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
        return phoneRegex.test(phone.replace(/\D/g, ''));
    }
    
    function getServiceName(value) {
        const serviceNames = {
            'web-design': 'Web Design',
            'web-development': 'Web Development',
            'e-commerce': 'E-Commerce',
            'digital-marketing': 'Digital Marketing',
            'branding': 'Branding',
            'consulting': 'Consulting'
        };
        return serviceNames[value];
    }
    
    function getBudgetLabel(value) {
        const budgetLabels = {
            'under-5k': 'Under $5,000',
            '5k-10k': '$5,000 - $10,000',
            '10k-25k': '$10,000 - $25,000',
            '25k-50k': '$25,000 - $50,000',
            '50k-plus': '$50,000+'
        };
        return budgetLabels[value];
    }
    
    function getTimelineLabel(value) {
        const timelineLabels = {
            'asap': 'ASAP (Rush job)',
            '1-month': 'Within 1 month',
            '2-3-months': '2-3 months',
            '3-6-months': '3-6 months',
            '6-plus-months': '6+ months'
        };
        return timelineLabels[value];
    }
    
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.textContent = message;
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem 2rem;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            z-index: 10000;
            animation: slideInRight 0.3s ease;
            background: ${type === 'success' ? '#27ae60' : type === 'error' ? '#e74c3c' : '#667eea'};
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.animation = 'slideOutRight 0.3s ease';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }
    
    // ========================================
    // GLOBAL FUNCTIONS
    // ========================================
    window.scrollToForm = function() {
        document.querySelector('.smart-contact-section').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    };
    
    window.scheduleCall = function() {
        // Implement call scheduling logic
        showNotification('Call scheduling feature coming soon!', 'info');
    };
    
    // Store form data globally
    window.formData = {};
});

// ========================================
// CSS ANIMATIONS (Added via JavaScript)
// ========================================
const additionalStyles = `
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes slideInRight {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    
    @keyframes slideOutRight {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
    
    @keyframes confetti-fall {
        0% { transform: translateY(-10px) rotate(0deg); opacity: 1; }
        100% { transform: translateY(100vh) rotate(360deg); opacity: 0; }
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
    
    .success-message {
        text-align: center;
        padding: 4rem 2rem;
    }
    
    .success-icon {
        font-size: 4rem;
        color: #27ae60;
        margin-bottom: 2rem;
    }
    
    .success-message h3 {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--cosmic-dark);
        margin-bottom: 1rem;
    }
    
    .success-message p {
        font-size: 1.2rem;
        color: #666;
        margin-bottom: 3rem;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .success-actions {
        display: flex;
        gap: 2rem;
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .field-error {
        animation: fadeIn 0.3s ease;
    }
`;

// Inject additional styles
const styleSheet = document.createElement('style');
styleSheet.textContent = additionalStyles;
document.head.appendChild(styleSheet);
