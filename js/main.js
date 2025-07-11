/**
 * PartyPro Theme JavaScript
 */

jQuery(document).ready(function($) {
    
    // Smooth scrolling for anchor links
    $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 100
            }, 800);
        }
    });
    
    // Mobile menu toggle (if you add mobile menu later)
    $('.mobile-menu-toggle').on('click', function() {
        $('.main-navigation').toggleClass('active');
    });
    
    // Add animation to service cards on scroll
    function animateOnScroll() {
        $('.service-card, .pricing-card').each(function() {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();
            
            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                $(this).addClass('animate-in');
            }
        });
    }
    
    // Run animation on scroll
    $(window).on('scroll', animateOnScroll);
    animateOnScroll(); // Run once on load
});

// Single Line Contact Form
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.single-line-form');
    const input = document.querySelector('.single-field-input');
    const submitBtn = document.querySelector('.single-field-submit');
    const fieldWrapper = document.querySelector('.field-wrapper');
    
    if (!form || !input || !submitBtn) return;
    
    // Input focus effects
    input.addEventListener('focus', function() {
        fieldWrapper.classList.add('focused');
    });
    
    input.addEventListener('blur', function() {
        fieldWrapper.classList.remove('focused');
    });
    
    // Form validation
    function validateInput() {
        const value = input.value.trim();
        
        if (value.length < 10) {
            return {
                valid: false,
                message: 'Please provide more details about your event'
            };
        }
        
        // Check if it contains contact info
        const hasPhone = /\d{3}.*\d{3}.*\d{4}/.test(value);
        const hasEmail = /@/.test(value);
        const hasName = /\b[A-Z][a-z]+\b/.test(value);
        
        if (!hasPhone && !hasEmail) {
            return {
                valid: false,
                message: 'Please include your phone number or email'
            };
        }
        
        if (!hasName) {
            return {
                valid: false,
                message: 'Please include your name'
            };
        }
        
        return { valid: true };
    }
    
    // Real-time validation
    input.addEventListener('input', function() {
        const validation = validateInput();
        
        if (input.value.length > 0) {
            if (validation.valid) {
                fieldWrapper.classList.add('success');
                fieldWrapper.classList.remove('error');
            } else if (input.value.length > 5) {
                fieldWrapper.classList.add('error');
                fieldWrapper.classList.remove('success');
            }
        } else {
            fieldWrapper.classList.remove('success', 'error');
        }
    });
    
    // Form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const validation = validateInput();
        
        if (!validation.valid) {
            // Show error animation
            fieldWrapper.classList.add('error');
            input.focus();
            
            // Create temporary error message
            let errorMsg = document.querySelector('.temp-error');
            if (!errorMsg) {
                errorMsg = document.createElement('div');
                errorMsg.className = 'temp-error';
                errorMsg.style.cssText = `
                    color: #e74c3c;
                    font-size: 0.9rem;
                    margin-top: 0.5rem;
                    padding: 0.5rem;
                    background: rgba(231, 76, 60, 0.1);
                    border-radius: 8px;
                    animation: slideInUp 0.3s ease;
                `;
                fieldWrapper.parentNode.appendChild(errorMsg);
            }
            
            errorMsg.textContent = validation.message;
            
            // Remove error message after 3 seconds
            setTimeout(() => {
                if (errorMsg) {
                    errorMsg.remove();
                }
                fieldWrapper.classList.remove('error');
            }, 3000);
            
            return;
        }
        
        // Show loading state
        submitBtn.classList.add('loading');
        submitBtn.disabled = true;
        
        // Simulate form submission
        setTimeout(() => {
            // Show success state
            fieldWrapper.classList.add('success');
            submitBtn.classList.remove('loading');
            submitBtn.innerHTML = `
                <span class="submit-icon">✅</span>
                <span class="submit-text">Sent!</span>
            `;
            
            // Show success message
            const successMsg = document.createElement('div');
            successMsg.className = 'success-message';
            successMsg.style.cssText = `
                background: rgba(39, 174, 96, 0.1);
                color: #27ae60;
                padding: 1rem;
                border-radius: 12px;
                margin-top: 1rem;
                text-align: center;
                font-weight: 600;
                border: 1px solid rgba(39, 174, 96, 0.2);
                animation: slideInUp 0.3s ease;
            `;
            successMsg.innerHTML = `
                <span style="font-size: 1.2rem; margin-right: 0.5rem;">🎉</span>
                Thank you! We've received your message and will contact you within 24 hours.
            `;
            
            form.appendChild(successMsg);
            
            // Reset form after 3 seconds
            setTimeout(() => {
                input.value = '';
                fieldWrapper.classList.remove('success');
                submitBtn.disabled = false;
                submitBtn.innerHTML = `
                    <span class="submit-icon">🚀</span>
                    <span class="submit-text">Send</span>
                `;
                if (successMsg) {
                    successMsg.remove();
                }
            }, 3000);
            
        }, 1500);
    });
    
    // Add ripple effect to submit button
    submitBtn.addEventListener('click', function(e) {
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
            pointer-events: none;
            animation: ripple 0.6s ease-out;
        `;
        
        this.appendChild(ripple);
        
        setTimeout(() => {
            ripple.remove();
        }, 600);
    });
    
    // Add character counter
    const maxLength = 500;
    input.addEventListener('input', function() {
        const length = this.value.length;
        
        // Add visual feedback for length
        if (length > maxLength * 0.8) {
            this.style.color = '#f39c12';
        } else {
            this.style.color = '#333';
        }
        
        if (length > maxLength) {
            this.value = this.value.substring(0, maxLength);
        }
    });
});

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes ripple {
        0% {
            transform: scale(0);
            opacity: 1;
        }
        100% {
            transform: scale(2);
            opacity: 0;
        }
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    .field-wrapper.error {
        border-color: #e74c3c !important;
        box-shadow: 0 0 0 4px rgba(231, 76, 60, 0.1) !important;
        animation: shake 0.5s ease-in-out;
    }
    
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
        20%, 40%, 60%, 80% { transform: translateX(5px); }
    }
`;
document.head.appendChild(style);
        }
        
        // Basic phone validation (Indian format)
        if (phone && !isValidPhone(phone)) {
            alert('Please enter a valid phone number.');
            isValid = false;
        }
        
        if (!isValid) {
            e.preventDefault();
        }
    });
    
    // Email validation function
    function isValidEmail(email) {
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }
    
    // Phone validation function (Indian format)
    function isValidPhone(phone) {
        var regex = /^[\+]?[0-9]{10,15}$/;
        return regex.test(phone.replace(/[\s\-\(\)]/g, ''));
    }
    
    // Add loading state to buttons
    $('.btn').on('click', function() {
        var $btn = $(this);
        if (!$btn.hasClass('loading')) {
            $btn.addClass('loading');
            setTimeout(function() {
                $btn.removeClass('loading');
            }, 2000);
        }
    });
    
    // Testimonial slider (if you add testimonials)
    if ($('.testimonial-slider').length) {
        $('.testimonial-slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true,
            autoplay: true,
            autoplaySpeed: 5000
        });
    }
    
    // Price calculator (basic)
    $('.price-calculator').on('change', 'input, select', function() {
        calculatePrice();
    });
    
    function calculatePrice() {
        var basePrice = 15000;
        var guests = parseInt($('#guest-count').val()) || 50;
        var hours = parseInt($('#event-hours').val()) || 8;
        var extras = 0;
        
        $('.price-extras:checked').each(function() {
            extras += parseInt($(this).val()) || 0;
        });
        
        var guestMultiplier = guests > 50 ? Math.ceil(guests / 50) : 1;
        var hourMultiplier = hours > 8 ? 1 + ((hours - 8) * 0.1) : 1;
        
        var totalPrice = (basePrice * guestMultiplier * hourMultiplier) + extras;
        
        $('#calculated-price').text('₹' + totalPrice.toLocaleString('en-IN'));
    }
});

// Add CSS for animations
var animationCSS = `
<style>
.service-card, .pricing-card {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.6s ease;
}

.service-card.animate-in, .pricing-card.animate-in {
    opacity: 1;
    transform: translateY(0);
}

.btn.loading {
    position: relative;
    color: transparent;
}

.btn.loading:after {
    content: "";
    position: absolute;
    width: 16px;
    height: 16px;
    top: 50%;
    left: 50%;
    margin-left: -8px;
    margin-top: -8px;
    border-radius: 50%;
    border: 2px solid transparent;
    border-color: transparent #fff transparent #fff;
    animation: loading 1.5s linear infinite;
}

@keyframes loading {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

.social-links {
    display: flex;
    gap: 1rem;
}

.social-link {
    display: inline-block;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #667eea;
    color: white;
    text-align: center;
    line-height: 40px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-link:hover {
    background: #f1c40f;
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .services-grid, .pricing-grid {
        grid-template-columns: 1fr;
    }
    
    .header-container {
        flex-direction: column;
        text-align: center;
    }
    
    .main-navigation ul {
        flex-direction: column;
        gap: 1rem;
    }
}
</style>
`;

// Inject CSS
document.head.insertAdjacentHTML('beforeend', animationCSS);
