// Contact Page Enhancements
document.addEventListener('DOMContentLoaded', function() {
    initContactForm();
    initContactPageAnimations();
});

function initContactForm() {
    const form = document.getElementById('contact-form');
    if (!form) return;
    
    let currentStep = 1;
    const totalSteps = 4;
    
    // Update progress bar
    function updateProgressBar() {
        const progressFill = document.querySelector('.progress-fill');
        const progressSteps = document.querySelectorAll('.progress-step');
        
        if (progressFill) {
            const progressPercent = ((currentStep - 1) / (totalSteps - 1)) * 100;
            progressFill.style.width = progressPercent + '%';
        }
        
        progressSteps.forEach((step, index) => {
            if (index + 1 <= currentStep) {
                step.classList.add('active');
            } else {
                step.classList.remove('active');
            }
        });
    }
    
    // Show specific step
    function showStep(stepNumber) {
        const formSteps = document.querySelectorAll('.form-step');
        formSteps.forEach(step => {
            step.classList.remove('active');
        });
        
        const targetStep = document.querySelector(`.form-step[data-step="${stepNumber}"]`);
        if (targetStep) {
            targetStep.classList.add('active');
        }
        
        currentStep = stepNumber;
        updateProgressBar();
    }
    
    // Next button handlers
    const nextButtons = document.querySelectorAll('.btn-next');
    nextButtons.forEach(button => {
        button.addEventListener('click', function() {
            const nextStep = parseInt(this.getAttribute('data-next'));
            if (validateCurrentStep()) {
                showStep(nextStep);
            }
        });
    });
    
    // Previous button handlers
    const prevButtons = document.querySelectorAll('.btn-prev');
    prevButtons.forEach(button => {
        button.addEventListener('click', function() {
            const prevStep = parseInt(this.getAttribute('data-prev'));
            showStep(prevStep);
        });
    });
    
    // Form validation
    function validateCurrentStep() {
        const currentFormStep = document.querySelector(`.form-step[data-step="${currentStep}"]`);
        if (!currentFormStep) return true;
        
        const requiredFields = currentFormStep.querySelectorAll('[required]');
        let isValid = true;
        
        requiredFields.forEach(field => {
            const wrapper = field.closest('.input-wrapper');
            
            if (!field.value.trim()) {
                wrapper.classList.add('error');
                showFieldError(field, 'This field is required');
                isValid = false;
            } else {
                wrapper.classList.remove('error');
                hideFieldError(field);
                
                // Additional validation
                if (field.type === 'email' && !isValidEmail(field.value)) {
                    wrapper.classList.add('error');
                    showFieldError(field, 'Please enter a valid email address');
                    isValid = false;
                }
            }
        });
        
        return isValid;
    }
    
    function showFieldError(field, message) {
        const wrapper = field.closest('.input-wrapper');
        let errorElement = wrapper.querySelector('.error-message');
        
        if (!errorElement) {
            errorElement = document.createElement('div');
            errorElement.className = 'error-message';
            wrapper.appendChild(errorElement);
        }
        
        errorElement.textContent = message;
    }
    
    function hideFieldError(field) {
        const wrapper = field.closest('.input-wrapper');
        const errorElement = wrapper.querySelector('.error-message');
        if (errorElement) {
            errorElement.remove();
        }
    }
    
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    // Service category selection
    const serviceCategories = document.querySelectorAll('.service-category-option');
    serviceCategories.forEach(option => {
        option.addEventListener('click', function() {
            serviceCategories.forEach(opt => opt.classList.remove('selected'));
            this.classList.add('selected');
            
            const categorySelect = document.getElementById('service_category');
            if (categorySelect) {
                categorySelect.value = this.getAttribute('data-value');
            }
        });
    });
    
    // Auto-advance date field
    const dateField = document.getElementById('preferred_date');
    if (dateField) {
        // Set minimum date to today
        const today = new Date();
        const todayString = today.toISOString().split('T')[0];
        dateField.setAttribute('min', todayString);
    }
    
    // Initialize first step
    updateProgressBar();
}

function initContactPageAnimations() {
    // Animate stats counter
    const statNumbers = document.querySelectorAll('.stat-number[data-count]');
    
    const animateCounter = (element) => {
        const target = parseInt(element.getAttribute('data-count'));
        const duration = 2000; // 2 seconds
        const increment = target / (duration / 16); // 60fps
        let current = 0;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                element.textContent = target;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current);
            }
        }, 16);
    };
    
    // Intersection Observer for stats animation
    if (statNumbers.length > 0) {
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
                    entry.target.classList.add('animated');
                    animateCounter(entry.target);
                }
            });
        });
        
        statNumbers.forEach(stat => {
            statsObserver.observe(stat);
        });
    }
    
    // Smooth hover effects for contact method cards
    const methodCards = document.querySelectorAll('.contact-method-card');
    methodCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
    
    // Typing animation for form placeholders
    const inputs = document.querySelectorAll('input[placeholder], textarea[placeholder]');
    inputs.forEach(input => {
        const originalPlaceholder = input.getAttribute('placeholder');
        
        input.addEventListener('focus', function() {
            if (this.value === '') {
                this.setAttribute('placeholder', '');
                typeWriterEffect(this, originalPlaceholder);
            }
        });
        
        input.addEventListener('blur', function() {
            this.setAttribute('placeholder', originalPlaceholder);
        });
    });
}

function typeWriterEffect(element, text) {
    let i = 0;
    const timer = setInterval(() => {
        if (i < text.length) {
            element.setAttribute('placeholder', text.slice(0, i + 1));
            i++;
        } else {
            clearInterval(timer);
        }
    }, 50);
}

// Phone number formatting
document.addEventListener('input', function(e) {
    if (e.target.type === 'tel') {
        let value = e.target.value.replace(/\D/g, '');
        
        if (value.length >= 10) {
            value = value.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3');
        } else if (value.length >= 6) {
            value = value.replace(/(\d{3})(\d{3})/, '($1) $2-');
        } else if (value.length >= 3) {
            value = value.replace(/(\d{3})/, '($1) ');
        }
        
        e.target.value = value;
    }
});

// Real-time validation
document.addEventListener('input', function(e) {
    const wrapper = e.target.closest('.input-wrapper');
    if (wrapper && wrapper.classList.contains('error')) {
        if (e.target.value.trim()) {
            wrapper.classList.remove('error');
            const errorElement = wrapper.querySelector('.error-message');
            if (errorElement) {
                errorElement.remove();
            }
        }
    }
});

// Contact method quick actions
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('contact-value') && e.target.getAttribute('href')) {
        // Add click tracking or analytics here if needed
        console.log('Contact method clicked:', e.target.getAttribute('href'));
    }
});
