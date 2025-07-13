/**
 * Enhanced Pages JavaScript
 * Modern interactions and animations for all pages
 */

(function($) {
    'use strict';

    // Initialize when DOM is ready
    $(document).ready(function() {
        
        // Initialize all enhanced features
        initEnhancedFeatures();
        initAnimations();
        initFormEnhancements();
        initInteractiveElements();
        
    });

    // Enhanced Features Initialization
    function initEnhancedFeatures() {
        
        // Animate numbers on scroll
        animateNumbersOnScroll();
        
        // Initialize smooth scrolling
        initSmoothScrolling();
        
        // Initialize intersection observers
        initIntersectionObservers();
        
        // Initialize hover effects
        initHoverEffects();
        
    }

    // Animate numbers when they come into view
    function animateNumbersOnScroll() {
        const statNumbers = document.querySelectorAll('.stat-number[data-count]');
        
        const animateNumbers = () => {
            statNumbers.forEach(stat => {
                const target = parseInt(stat.getAttribute('data-count'));
                const current = parseInt(stat.textContent);
                const increment = target / 100;
                
                if (current < target) {
                    stat.textContent = Math.ceil(current + increment);
                    setTimeout(animateNumbers, 20);
                } else {
                    stat.textContent = target;
                }
            });
        };
        
        // Trigger animation when stats are visible
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateNumbers();
                    observer.unobserve(entry.target);
                }
            });
        });
        
        const statsSection = document.querySelector('.hero-stats');
        if (statsSection) {
            observer.observe(statsSection);
        }
    }

    // Smooth scrolling for anchor links
    function initSmoothScrolling() {
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    }

    // Initialize intersection observers for animations
    function initIntersectionObservers() {
        
        // Timeline animation
        const timelineItems = document.querySelectorAll('.timeline-item');
        const timelineObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                }
            });
        });
        
        timelineItems.forEach(item => {
            timelineObserver.observe(item);
        });
        
        // Award cards animation
        const awardCards = document.querySelectorAll('.award-card');
        const awardObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                }
            });
        });
        
        awardCards.forEach(card => {
            awardObserver.observe(card);
        });
        
        // Scroll animate elements
        const scrollElements = document.querySelectorAll('.service-item-enhanced, .step-card, .team-member-card');
        const scrollObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('scroll-animate', 'animate');
                }
            });
        });
        
        scrollElements.forEach(el => {
            scrollObserver.observe(el);
        });
    }

    // Initialize hover effects
    function initHoverEffects() {
        
        // Team member cards hover effect
        const teamCards = document.querySelectorAll('.team-member-card');
        teamCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px)';
                this.style.boxShadow = '0 20px 40px rgba(102, 126, 234, 0.2)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 10px 30px rgba(0, 0, 0, 0.1)';
            });
        });
        
        // Award cards hover effect
        const awardCards = document.querySelectorAll('.award-card');
        awardCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
                this.style.boxShadow = '0 15px 35px rgba(102, 126, 234, 0.15)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 10px 30px rgba(0, 0, 0, 0.1)';
            });
        });
        
        // Category cards hover effect
        const categoryCards = document.querySelectorAll('.category-card');
        categoryCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    }

    // Initialize animations
    function initAnimations() {
        
        // Add loading animation to buttons
        $('.btn-primary-fancy, .btn-secondary-fancy').on('click', function() {
            const $btn = $(this);
            const originalText = $btn.html();
            
            $btn.addClass('loading');
            $btn.html('<span>Loading...</span>');
            
            setTimeout(() => {
                $btn.removeClass('loading');
                $btn.html(originalText);
            }, 2000);
        });
        
        // Add click effects to value cards
        $('.value-card').on('click', function() {
            const $card = $(this);
            $card.css('transform', 'scale(0.98)');
            
            setTimeout(() => {
                $card.css('transform', 'scale(1)');
            }, 150);
        });
        
        // Parallax effect for hero sections
        $(window).on('scroll', function() {
            const scrolled = $(window).scrollTop();
            const parallaxElements = $('.hero-particles');
            
            parallaxElements.css('transform', `translateY(${scrolled * 0.5}px)`);
        });
    }

    // Initialize form enhancements
    function initFormEnhancements() {
        
        // Multi-step form functionality
        if ($('.form-step').length) {
            initMultiStepForm();
        }
        
        // Form validation
        initFormValidation();
        
        // Live chat functionality
        initLiveChat();
    }

    // Multi-step form functionality
    function initMultiStepForm() {
        const formSteps = document.querySelectorAll('.form-step');
        const progressSteps = document.querySelectorAll('.progress-step');
        const progressFill = document.querySelector('.progress-fill');
        
        function showStep(stepNumber) {
            formSteps.forEach(step => step.classList.remove('active'));
            progressSteps.forEach(step => step.classList.remove('active'));
            
            document.querySelector(`[data-step="${stepNumber}"]`).classList.add('active');
            progressSteps[stepNumber - 1].classList.add('active');
            
            // Update progress bar
            const progress = ((stepNumber - 1) / (progressSteps.length - 1)) * 100;
            if (progressFill) {
                progressFill.style.width = progress + '%';
            }
        }
        
        // Next button functionality
        $('.btn-next').on('click', function() {
            const currentStep = parseInt($(this).closest('.form-step').data('step'));
            const nextStep = parseInt($(this).data('next'));
            
            if (validateStep(currentStep)) {
                showStep(nextStep);
            }
        });
        
        // Previous button functionality
        $('.btn-prev').on('click', function() {
            const currentStep = parseInt($(this).closest('.form-step').data('step'));
            const prevStep = parseInt($(this).data('prev'));
            showStep(prevStep);
        });
        
        // Form submission
        $('#contact-form').on('submit', function(e) {
            e.preventDefault();
            
            const $submitBtn = $('.btn-submit');
            const originalText = $submitBtn.html();
            
            $submitBtn.html('<span>Sending...</span><span class="btn-icon">⏳</span>');
            $submitBtn.prop('disabled', true);
            
            // Simulate form submission
            setTimeout(() => {
                $('.contact-form-card').html(`
                    <div class="form-success">
                        <div class="success-icon">✅</div>
                        <h3>Message Sent Successfully!</h3>
                        <p>Thank you for contacting us. We'll get back to you within 2 hours.</p>
                        <button onclick="location.reload()" class="btn-primary-fancy">Send Another Message</button>
                    </div>
                `);
            }, 2000);
        });
    }

    // Form validation
    function initFormValidation() {
        function validateStep(step) {
            const currentStepElement = document.querySelector(`[data-step="${step}"]`);
            const requiredFields = currentStepElement.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('error');
                    isValid = false;
                } else {
                    field.classList.remove('error');
                }
            });
            
            return isValid;
        }
        
        // Real-time validation
        $('input, select, textarea').on('blur', function() {
            const $field = $(this);
            if ($field.prop('required') && !$field.val().trim()) {
                $field.addClass('error');
            } else {
                $field.removeClass('error');
            }
        });
    }

    // Live chat functionality
    function initLiveChat() {
        const chatToggle = document.getElementById('chatToggle');
        const chatWindow = document.getElementById('chatWindow');
        const chatClose = document.getElementById('chatClose');
        
        if (chatToggle && chatWindow) {
            chatToggle.addEventListener('click', function() {
                chatWindow.classList.toggle('active');
                document.getElementById('chatNotification').style.display = 'none';
            });
        }
        
        if (chatClose) {
            chatClose.addEventListener('click', function() {
                chatWindow.classList.remove('active');
            });
        }
        
        // Quick options in chat
        $('.quick-option').on('click', function() {
            const message = $(this).data('message');
            addMessage(message, 'user');
            
            // Simulate auto-response
            setTimeout(() => {
                addMessage('Thanks for your interest! I\'ll connect you with the right team member.', 'agent');
            }, 1000);
        });
    }

    // Add message to chat
    function addMessage(text, sender) {
        const messagesContainer = document.getElementById('chatMessages');
        if (!messagesContainer) return;
        
        const messageDiv = document.createElement('div');
        messageDiv.className = `chat-message ${sender}-message`;
        
        messageDiv.innerHTML = `
            <div class="message-avatar">${sender === 'agent' ? '👨‍💼' : '👤'}</div>
            <div class="message-content">
                <div class="message-text">${text}</div>
                <div class="message-time">${new Date().toLocaleTimeString()}</div>
            </div>
        `;
        
        messagesContainer.appendChild(messageDiv);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }

    // Initialize interactive elements
    function initInteractiveElements() {
        
        // FAQ accordion functionality
        $('.faq-question').on('click', function() {
            const $faqItem = $(this).closest('.faq-item');
            const $toggle = $(this).find('.faq-toggle');
            const isActive = $faqItem.hasClass('active');
            
            // Close all other items
            $('.faq-item').removeClass('active');
            $('.faq-toggle').text('+');
            
            // Toggle current item
            if (!isActive) {
                $faqItem.addClass('active');
                $toggle.text('-');
            }
        });
        
        // Copy buttons
        $('.copy-btn').on('click', function() {
            const textToCopy = $(this).data('copy');
            navigator.clipboard.writeText(textToCopy).then(() => {
                $(this).addClass('copied');
                $(this).text('Copied!');
                
                setTimeout(() => {
                    $(this).removeClass('copied');
                    $(this).text('📋 Copy');
                }, 2000);
            });
        });
        
        // Social media hover effects
        $('.social-link-fancy').on('mouseenter', function() {
            $(this).find('.social-tooltip').show();
        }).on('mouseleave', function() {
            $(this).find('.social-tooltip').hide();
        });
    }

    // Utility functions
    function debounce(func, wait, immediate) {
        let timeout;
        return function executedFunction() {
            const context = this;
            const args = arguments;
            const later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            const callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
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
        };
    }

    // Expose functions globally for use in templates
    window.PartyProEnhanced = {
        addMessage: addMessage,
        animateNumbers: animateNumbersOnScroll,
        initFormValidation: initFormValidation
    };

})(jQuery);
