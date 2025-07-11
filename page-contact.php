<?php
/*
Template Name: Contact Page
*/
get_header(); ?>

<!-- Contact Hero Section -->
<section class="contact-hero-section">
    <div class="container">
        <div class="contact-hero-content">
            <div class="contact-hero-badge">
                <span class="badge-icon">💬</span>
                <span class="badge-text">Let's Connect</span>
            </div>
            <h1 class="contact-hero-title">
                Ready to Create 
                <span class="gradient-text">Something Amazing?</span>
            </h1>
            <p class="contact-hero-subtitle">Let's turn your vision into an unforgettable celebration. Our expert team is here to make your event dreams come true!</p>
            
            <div class="contact-hero-stats">
                <div class="contact-stat-card">
                    <div class="stat-icon">🏆</div>
                    <div class="stat-content">
                        <div class="stat-number">500+</div>
                        <div class="stat-text">Events Completed</div>
                    </div>
                </div>
                <div class="contact-stat-card">
                    <div class="stat-icon">⚡</div>
                    <div class="stat-content">
                        <div class="stat-number">&lt; 2hrs</div>
                        <div class="stat-text">Average Response</div>
                    </div>
                </div>
                <div class="contact-stat-card">
                    <div class="stat-icon">⭐</div>
                    <div class="stat-content">
                        <div class="stat-number">5 Star</div>
                        <div class="stat-text">Service Rating</div>
                    </div>
                </div>
            </div>
            
            <!-- Quick Action Buttons -->
            <div class="hero-quick-actions">
                <a href="#contact-form" class="quick-action-btn primary">
                    <span class="btn-icon">📝</span>
                    <span class="btn-text">Get Quote</span>
                </a>
                <a href="tel:<?php echo esc_attr(get_theme_mod('contact_phone', '+1 555 123-4567')); ?>" class="quick-action-btn secondary">
                    <span class="btn-icon">📞</span>
                    <span class="btn-text">Call Now</span>
                </a>
                <a href="https://wa.me/15551234567" class="quick-action-btn whatsapp">
                    <span class="btn-icon">💬</span>
                    <span class="btn-text">WhatsApp</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form & Info Section -->
<section class="contact-main-section" id="contact-form">
    <div class="container">
        <div class="contact-grid">
            <!-- Contact Form -->
            <div class="contact-form-container">
                <div class="form-header">
                    <div class="form-icon">📝</div>
                    <h2 class="form-title">Tell Us About Your Event</h2>
                    <p class="form-subtitle">Fill out the form below and we'll get back to you within 24 hours with a customized quote!</p>
                </div>
                
                <form class="contact-form single-line-form" method="post" action="">
                    <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                    
                    <div class="single-field-container">
                        <div class="field-wrapper">
                            <span class="field-icon">💬</span>
                            <input type="text" 
                                   id="quick_message" 
                                   name="quick_message" 
                                   placeholder="Tell us about your event - include your name, contact, and party details..." 
                                   class="single-field-input"
                                   required>
                            <button type="submit" class="single-field-submit">
                                <span class="submit-icon">🚀</span>
                                <span class="submit-text">Send</span>
                            </button>
                        </div>
                        <div class="field-hint">
                            <span class="hint-icon">💡</span>
                            <span class="hint-text">Example: "Hi! I'm Sarah, planning a birthday party for 50 guests on July 20th. Need tables, chairs, and a bounce house. Call me at (555) 123-4567"</span>
                        </div>
                    </div>
                </form>
            </div>
            
            <!-- Contact Information -->
            <div class="contact-info-container">
                <!-- Main Contact Card -->
                <div class="contact-card-main">
                    <div class="contact-card-header">
                        <div class="header-icon">🏢</div>
                        <h3>Get In Touch</h3>
                        <p>Multiple ways to reach our team</p>
                    </div>
                    
                    <div class="contact-methods">
                        <div class="contact-method">
                            <div class="method-icon">📞</div>
                            <div class="method-content">
                                <h4>Call Us</h4>
                                <p class="method-value"><?php echo esc_html(get_theme_mod('contact_phone', '(555) 123-4567')); ?></p>
                                <p class="method-description">Speak directly with our team</p>
                                <a href="tel:<?php echo esc_attr(get_theme_mod('contact_phone', '+15551234567')); ?>" class="method-action-btn">
                                    Call Now
                                </a>
                            </div>
                        </div>
                        
                        <div class="contact-method">
                            <div class="method-icon">📧</div>
                            <div class="method-content">
                                <h4>Email Us</h4>
                                <p class="method-value"><?php echo esc_html(get_theme_mod('contact_email', 'hello@partyrentals.com')); ?></p>
                                <p class="method-description">Send us your questions</p>
                                <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'hello@partyrentals.com')); ?>" class="method-action-btn">
                                    Send Email
                                </a>
                            </div>
                        </div>
                        
                        <div class="contact-method">
                            <div class="method-icon">💬</div>
                            <div class="method-content">
                                <h4>WhatsApp</h4>
                                <p class="method-value"><?php echo esc_html(get_theme_mod('whatsapp_number', '+1 (555) 123-4567')); ?></p>
                                <p class="method-description">Quick responses guaranteed</p>
                                <a href="https://wa.me/<?php echo esc_attr(str_replace(['+', ' ', '(', ')', '-'], '', get_theme_mod('whatsapp_number', '15551234567'))); ?>" class="method-action-btn">
                                    Chat Now
                                </a>
                            </div>
                        </div>
                        
                        <div class="contact-method">
                            <div class="method-icon">📍</div>
                            <div class="method-content">
                                <h4>Visit Us</h4>
                                <p class="method-value"><?php echo esc_html(get_theme_mod('business_address', '123 Party Street')); ?></p>
                                <p class="method-description"><?php echo esc_html(get_theme_mod('business_city', 'Event City, EC 12345')); ?></p>
                                <a href="https://maps.google.com/?q=<?php echo urlencode(get_theme_mod('business_address', '123 Party Street') . ' ' . get_theme_mod('business_city', 'Event City')); ?>" class="method-action-btn">
                                    Get Directions
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Response Promise Card -->
                <div class="response-promise">
                    <div class="promise-icon">⚡</div>
                    <div class="promise-content">
                        <h4>Lightning Fast Response</h4>
                        <p>We respond to all inquiries within 24 hours. Urgent requests get priority treatment!</p>
                        <div class="response-stats">
                            <div class="response-stat">
                                <span class="stat-number">&lt; 2hrs</span>
                                <span class="stat-label">Average Response</span>
                            </div>
                            <div class="response-stat">
                                <span class="stat-number">24/7</span>
                                <span class="stat-label">Emergency Line</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Business Hours Card -->
                <div class="business-hours">
                    <div class="hours-header">
                        <div class="hours-icon">🕒</div>
                        <h4>Business Hours</h4>
                    </div>
                    
                    <div class="hours-list">
                        <div class="hours-item">
                            <span class="day">Monday - Friday</span>
                            <span class="time">8:00 AM - 8:00 PM</span>
                        </div>
                        <div class="hours-item">
                            <span class="day">Saturday</span>
                            <span class="time">9:00 AM - 6:00 PM</span>
                        </div>
                        <div class="hours-item">
                            <span class="day">Sunday</span>
                            <span class="time">10:00 AM - 4:00 PM</span>
                        </div>
                        <div class="hours-item emergency">
                            <span class="day">24/7 Emergency</span>
                            <span class="time"><?php echo esc_html(get_theme_mod('emergency_phone', '(555) 999-HELP')); ?></span>
                        </div>
                    </div>
                    
                    <div class="current-status">
                        <div class="status-indicator"></div>
                        <span class="status-text" id="business-status">Checking hours...</span>
                    </div>
                </div>
                
                <!-- Testimonial Card -->
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <h4>🌟 What Our Clients Say</h4>
                    </div>
                    <div class="testimonial-content">
                        <div class="testimonial-stars">⭐⭐⭐⭐⭐</div>
                        <p>"Absolutely incredible service! They made our wedding perfect."</p>
                        <div class="testimonial-author">- Sarah & Mike</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="contact-faq-section">
    <div class="container">
        <div class="faq-header">
            <h2>💡 Frequently Asked Questions</h2>
            <p>Quick answers to common questions</p>
        </div>
        
        <div class="faq-grid">
            <div class="faq-item">
                <div class="faq-question">How far in advance should I book?</div>
                <div class="faq-answer">We recommend booking 2-4 weeks in advance, especially for weekend events. Popular dates fill up quickly!</div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">Do you deliver and set up?</div>
                <div class="faq-answer">Yes! All our packages include professional delivery, setup, and breakdown. You just focus on enjoying your event.</div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">What's your service area?</div>
                <div class="faq-answer">We serve within a 50-mile radius. Extended delivery is available for an additional fee.</div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">Do you have backup equipment?</div>
                <div class="faq-answer">Absolutely! We always bring backup equipment to ensure your event goes smoothly, no matter what.</div>
            </div>
        </div>
    </div>
</section>

<script>
// Fancy Contact Form JavaScript
document.addEventListener('DOMContentLoaded', function() {
    
    let currentSection = 1;
    const totalSections = 4;
    
    // Initialize form
    initializeFancyForm();
    
    function initializeFancyForm() {
        updateProgressBar();
        setupFormValidation();
        setupStepNavigation();
        setupFancyInputs();
        setupBudgetSlider();
        setupServiceCards();
        setupFormSubmission();
    }
    
    // Progress Bar Management
    function updateProgressBar() {
        const progressFill = document.querySelector('.progress-fill');
        const steps = document.querySelectorAll('.progress-steps .step');
        const progress = (currentSection / totalSections) * 100;
        
        progressFill.style.width = progress + '%';
        
        steps.forEach((step, index) => {
            const stepNumber = index + 1;
            if (stepNumber <= currentSection) {
                step.classList.add('active');
                step.classList.add('completed');
            } else {
                step.classList.remove('active', 'completed');
            }
        });
    }
    
    // Step Navigation
    function setupStepNavigation() {
        document.querySelectorAll('.btn-next').forEach(btn => {
            btn.addEventListener('click', function() {
                const nextSection = parseInt(this.dataset.next);
                if (validateCurrentSection() && nextSection <= totalSections) {
                    showSection(nextSection);
                }
            });
        });
        
        document.querySelectorAll('.btn-prev').forEach(btn => {
            btn.addEventListener('click', function() {
                const prevSection = parseInt(this.dataset.prev);
                if (prevSection >= 1) {
                    showSection(prevSection);
                }
            });
        });
    }
    
    function showSection(sectionNumber) {
        // Hide current section
        document.querySelectorAll('.form-section').forEach(section => {
            section.classList.remove('active');
            section.style.opacity = '0';
            section.style.transform = 'translateX(-30px)';
        });
        
        setTimeout(() => {
            currentSection = sectionNumber;
            updateProgressBar();
            
            // Show new section
            const targetSection = document.querySelector(`[data-section="${sectionNumber}"]`);
            if (targetSection) {
                targetSection.classList.add('active');
                targetSection.style.opacity = '1';
                targetSection.style.transform = 'translateX(0)';
                
                // Animate section elements
                const elements = targetSection.querySelectorAll('.form-group, .section-title');
                elements.forEach((el, index) => {
                    setTimeout(() => {
                        el.style.animation = 'slideInUp 0.6s ease forwards';
                    }, index * 100);
                });
            }
        }, 300);
    }
    
    // Fancy Input Animations
    function setupFancyInputs() {
        // Handle input focus/blur
        document.querySelectorAll('.fancy-input input, .fancy-select select, .fancy-textarea textarea').forEach(input => {
            input.addEventListener('focus', function() {
                this.closest('.input-container, .select-container, .textarea-container').classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                const container = this.closest('.input-container, .select-container, .textarea-container');
                if (!this.value.trim()) {
                    container.classList.remove('focused');
                }
                container.classList.remove('error');
            });
            
            // Check if input has value on load
            if (input.value.trim()) {
                input.closest('.input-container, .select-container, .textarea-container').classList.add('focused');
            }
        });
        
        // Button ripple effect
        document.querySelectorAll('.fancy-btn, .fancy-submit').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const ripple = this.querySelector('.btn-ripple');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('active');
                
                setTimeout(() => ripple.classList.remove('active'), 600);
            });
        });
    }
    
    // Budget Slider Enhancement
    function setupBudgetSlider() {
        const slider = document.getElementById('budget_range');
        const valueDisplay = document.getElementById('budget_value');
        const sliderFill = document.querySelector('.slider-fill');
        const sliderThumb = document.querySelector('.slider-thumb');
        
        if (slider && valueDisplay) {
            function updateSlider() {
                const value = parseInt(slider.value);
                const min = parseInt(slider.min);
                const max = parseInt(slider.max);
                const percentage = ((value - min) / (max - min)) * 100;
                
                valueDisplay.textContent = '$' + value.toLocaleString();
                
                if (sliderFill) {
                    sliderFill.style.width = percentage + '%';
                }
                
                if (sliderThumb) {
                    sliderThumb.style.left = percentage + '%';
                }
                
                // Add pulse animation on change
                valueDisplay.style.animation = 'pulse 0.3s ease';
                setTimeout(() => {
                    valueDisplay.style.animation = '';
                }, 300);
            }
            
            slider.addEventListener('input', updateSlider);
            updateSlider(); // Initialize
        }
    }
    
    // Service Cards Animation
    function setupServiceCards() {
        document.querySelectorAll('.service-card').forEach(card => {
            card.addEventListener('click', function() {
                const checkbox = this.querySelector('input[type="checkbox"]');
                const isChecked = !checkbox.checked;
                checkbox.checked = isChecked;
                
                if (isChecked) {
                    this.classList.add('selected');
                    this.style.transform = 'scale(1.05)';
                    setTimeout(() => {
                        this.style.transform = 'scale(1)';
                    }, 200);
                } else {
                    this.classList.remove('selected');
                }
                
                // Trigger selection animation
                const checkIndicator = this.querySelector('.check-indicator');
                if (checkIndicator) {
                    checkIndicator.style.animation = isChecked ? 'checkPop 0.4s ease' : '';
                }
            });
        });
    }
    
    // Form Validation
    function setupFormValidation() {
        // Real-time validation
        document.querySelectorAll('input[required], select[required]').forEach(field => {
            field.addEventListener('input', () => validateField(field));
            field.addEventListener('blur', () => validateField(field));
        });
        
        // Phone formatting
        const phoneInput = document.getElementById('contact_phone');
        if (phoneInput) {
            phoneInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                let formatted = '';
                
                if (value.length > 0) {
                    formatted = '(' + value.substring(0, 3);
                }
                if (value.length >= 4) {
                    formatted += ') ' + value.substring(3, 6);
                }
                if (value.length >= 7) {
                    formatted += '-' + value.substring(6, 10);
                }
                
                e.target.value = formatted;
            });
        }
        
        // Character counter
        const textarea = document.getElementById('special_requests');
        const charCount = document.getElementById('char_count');
        
        if (textarea && charCount) {
            textarea.addEventListener('input', function() {
                const count = this.value.length;
                charCount.textContent = count;
                
                const container = this.closest('.textarea-container');
                if (count > 450) {
                    container.classList.add('warning');
                } else {
                    container.classList.remove('warning');
                }
            });
        }
    }
    
    function validateField(field) {
        const container = field.closest('.input-container, .select-container');
        const validation = container?.parentElement.querySelector('.field-validation');
        
        container?.classList.remove('error', 'success');
        
        if (field.hasAttribute('required') && !field.value.trim()) {
            container?.classList.add('error');
            if (validation) {
                validation.querySelector('.validation-message').textContent = 'This field is required';
            }
            return false;
        }
        
        // Email validation
        if (field.type === 'email' && field.value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(field.value)) {
                container?.classList.add('error');
                if (validation) {
                    validation.querySelector('.validation-message').textContent = 'Please enter a valid email';
                }
                return false;
            }
        }
        
        if (field.value.trim()) {
            container?.classList.add('success');
            if (validation) {
                validation.querySelector('.validation-message').textContent = '';
            }
        }
        
        return true;
    }
    
    function validateCurrentSection() {
        const currentSectionEl = document.querySelector(`[data-section="${currentSection}"]`);
        const requiredFields = currentSectionEl.querySelectorAll('input[required], select[required]');
        let isValid = true;
        
        requiredFields.forEach(field => {
            if (!validateField(field)) {
                isValid = false;
            }
        });
        
        if (!isValid) {
            // Shake animation for errors
            currentSectionEl.style.animation = 'shake 0.5s ease';
            setTimeout(() => {
                currentSectionEl.style.animation = '';
            }, 500);
        }
        
        return isValid;
    }
    
    // Form Submission
    function setupFormSubmission() {
        const form = document.querySelector('.fancy-form');
        const submitBtn = document.querySelector('.fancy-submit');
        
        if (form && submitBtn) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                if (!validateCurrentSection()) {
                    return;
                }
                
                // Show loading state
                submitBtn.classList.add('loading');
                submitBtn.querySelector('.btn-text').textContent = 'Sending...';
                
                // Simulate form submission
                setTimeout(() => {
                    submitBtn.classList.remove('loading');
                    submitBtn.classList.add('success');
                    submitBtn.querySelector('.btn-text').textContent = '✓ Request Sent!';
                    
                    // Show success animation
                    showSuccessAnimation();
                    
                    // Reset form after delay
                    setTimeout(() => {
                        resetForm();
                    }, 3000);
                }, 2000);
            });
        }
    }
    
    function showSuccessAnimation() {
        const successOverlay = document.createElement('div');
        successOverlay.className = 'success-overlay';
        successOverlay.innerHTML = `
            <div class="success-content">
                <div class="success-icon">🎉</div>
                <h3>Thank You!</h3>
                <p>We've received your request and will get back to you within 24 hours with a customized quote!</p>
            </div>
        `;
        
        document.body.appendChild(successOverlay);
        
        setTimeout(() => {
            successOverlay.classList.add('show');
        }, 100);
        
        setTimeout(() => {
            successOverlay.classList.remove('show');
            setTimeout(() => {
                document.body.removeChild(successOverlay);
            }, 300);
        }, 2500);
    }
    
    function resetForm() {
        const form = document.querySelector('.fancy-form');
        const submitBtn = document.querySelector('.fancy-submit');
        
        form.reset();
        currentSection = 1;
        showSection(1);
        
        submitBtn.classList.remove('success');
        submitBtn.querySelector('.btn-text').textContent = 'Send My Request';
        
        // Reset all form states
        document.querySelectorAll('.input-container, .select-container, .textarea-container').forEach(container => {
            container.classList.remove('focused', 'error', 'success');
        });
        
        document.querySelectorAll('.service-card').forEach(card => {
            card.classList.remove('selected');
        });
        
        // Reset budget slider
        const budgetSlider = document.getElementById('budget_range');
        if (budgetSlider) {
            budgetSlider.value = 2000;
            budgetSlider.dispatchEvent(new Event('input'));
        }
    }
    
    // Smooth scroll for quick action buttons
    document.querySelectorAll('.quick-action-btn[href^="#"]').forEach(btn => {
        btn.addEventListener('click', function(e) {
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
    
    // Business hours status (keeping from original)
    function updateBusinessStatus() {
        const now = new Date();
        const hour = now.getHours();
        const day = now.getDay();
        const statusIndicator = document.querySelector('.status-indicator');
        const statusText = document.getElementById('business-status');
        
        if (statusIndicator && statusText) {
            let isOpen = false;
            
            if (day >= 1 && day <= 5) {
                isOpen = hour >= 8 && hour < 20;
            } else if (day === 6) {
                isOpen = hour >= 9 && hour < 18;
            } else if (day === 0) {
                isOpen = hour >= 10 && hour < 16;
            }
            
            if (isOpen) {
                statusIndicator.classList.add('open');
                statusIndicator.classList.remove('closed');
                statusText.textContent = "We're Open Now!";
            } else {
                statusIndicator.classList.add('closed');
                statusIndicator.classList.remove('open');
                statusText.textContent = "Currently Closed";
            }
        }
    }
    
    updateBusinessStatus();
    setInterval(updateBusinessStatus, 60000);
});
</script>

<?php get_footer(); ?>
