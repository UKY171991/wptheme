// Ultimate About Page Interactive Features

document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize all features
    initScrollAnimations();
    initTimelineAnimations();
    initCounterAnimations();
    initVideoPlaceholder();
    initParallaxEffects();
    initTestimonialRotator();
    initInteractiveElements();
    initProgressiveLoading();
    
    // Scroll-triggered animations
    function initScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('animate-in');
                    }, index * 100);
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        // Add animation classes to elements
        const animateElements = document.querySelectorAll(`
            .trust-badge, .process-step, .value-item, .team-member,
            .testimonial-card, .achievement-card, .cta-option
        `);
        
        animateElements.forEach(element => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(30px)';
            element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(element);
        });
    }
    
    // Timeline interactive animations
    function initTimelineAnimations() {
        const milestones = document.querySelectorAll('.timeline-milestone');
        
        milestones.forEach((milestone, index) => {
            milestone.addEventListener('mouseenter', function() {
                // Highlight effect
                this.style.transform = 'scale(1.02)';
                this.style.zIndex = '10';
                
                // Animate milestone marker
                const marker = this.querySelector('.milestone-year');
                if (marker) {
                    marker.style.transform = 'scale(1.2)';
                    marker.style.boxShadow = '0 8px 30px rgba(102, 126, 234, 0.4)';
                }
                
                // Animate content
                const content = this.querySelector('.milestone-content');
                if (content) {
                    content.style.transform = 'translateY(-8px)';
                    content.style.boxShadow = '0 20px 50px rgba(0, 0, 0, 0.15)';
                }
            });
            
            milestone.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
                this.style.zIndex = '1';
                
                const marker = this.querySelector('.milestone-year');
                if (marker) {
                    marker.style.transform = 'scale(1)';
                    marker.style.boxShadow = '0 6px 20px rgba(102, 126, 234, 0.3)';
                }
                
                const content = this.querySelector('.milestone-content');
                if (content) {
                    content.style.transform = 'translateY(0)';
                    content.style.boxShadow = '0 8px 25px rgba(0, 0, 0, 0.08)';
                }
            });
            
            // Sequential reveal animation
            setTimeout(() => {
                milestone.style.opacity = '1';
                milestone.style.transform = 'translateX(0)';
            }, index * 200);
        });
        
        // Initial setup
        milestones.forEach(milestone => {
            milestone.style.opacity = '0';
            milestone.style.transform = 'translateX(-50px)';
            milestone.style.transition = 'all 0.6s ease';
        });
    }
    
    // Enhanced counter animations with easing
    function initCounterAnimations() {
        const counters = document.querySelectorAll('.stat-number[data-count]');
        
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px'
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
        
        function animateCounter(counter) {
            const target = parseFloat(counter.getAttribute('data-count'));
            const duration = 2500;
            const startTime = performance.now();
            
            function updateCounter(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                
                // Easing function (ease-out)
                const easeOut = 1 - Math.pow(1 - progress, 3);
                const current = target * easeOut;
                
                // Format based on number type
                if (target >= 1000) {
                    counter.textContent = Math.floor(current).toLocaleString() + '+';
                } else if (target % 1 !== 0) {
                    counter.textContent = current.toFixed(1) + '%';
                } else {
                    counter.textContent = Math.floor(current);
                }
                
                if (progress < 1) {
                    requestAnimationFrame(updateCounter);
                } else {
                    // Final value
                    if (target >= 1000) {
                        counter.textContent = target.toLocaleString() + '+';
                    } else if (target % 1 !== 0) {
                        counter.textContent = target + '%';
                    } else {
                        counter.textContent = target;
                    }
                }
            }
            
            requestAnimationFrame(updateCounter);
        }
    }
    
    // Video placeholder interaction
    function initVideoPlaceholder() {
        const videoPlaceholder = document.querySelector('.video-placeholder');
        
        if (videoPlaceholder) {
            videoPlaceholder.addEventListener('click', function() {
                // Create video overlay
                const overlay = document.createElement('div');
                overlay.className = 'video-modal-overlay';
                overlay.innerHTML = `
                    <div class="video-modal">
                        <div class="video-content">
                            <button class="close-video">&times;</button>
                            <div class="video-placeholder-modal">
                                <div class="play-button-large">
                                    <i class="fas fa-play"></i>
                                </div>
                                <p>Video player would be embedded here</p>
                            </div>
                        </div>
                    </div>
                `;
                
                document.body.appendChild(overlay);
                document.body.style.overflow = 'hidden';
                
                // Close functionality
                overlay.addEventListener('click', function(e) {
                    if (e.target === overlay || e.target.classList.contains('close-video')) {
                        document.body.removeChild(overlay);
                        document.body.style.overflow = 'auto';
                    }
                });
            });
        }
    }
    
    // Parallax effects for enhanced visual depth
    function initParallaxEffects() {
        if (window.innerWidth > 768) {
            const parallaxElements = document.querySelectorAll(`
                .founders-message, .achievement-showcase, .interactive-cta
            `);
            
            let ticking = false;
            
            window.addEventListener('scroll', () => {
                if (!ticking) {
                    requestAnimationFrame(updateParallax);
                    ticking = true;
                }
            });
            
            function updateParallax() {
                const scrolled = window.pageYOffset;
                
                parallaxElements.forEach(element => {
                    const rect = element.getBoundingClientRect();
                    const speed = 0.5;
                    
                    if (rect.bottom >= 0 && rect.top <= window.innerHeight) {
                        const yPos = -(scrolled * speed);
                        element.style.transform = `translateY(${yPos}px)`;
                    }
                });
                
                ticking = false;
            }
        }
    }
    
    // Testimonial rotator for featured testimonial
    function initTestimonialRotator() {
        const testimonials = [
            {
                name: "Sarah & Michael Thompson",
                role: "Homeowners • Customer since 2021",
                avatar: "ST",
                rating: 5,
                text: "We've tried several service providers over the years, but none compare to this team. They've maintained our home for over 3 years now, and every single interaction has been professional, reliable, and excellent. They're not just service providers – they're trusted partners who truly care about our home and family.",
                services: "House Cleaning, Lawn Care, Handyman"
            },
            {
                name: "Jennifer Rodriguez",
                role: "Business Owner • Customer since 2020",
                avatar: "JR",
                rating: 5,
                text: "Exceptional service quality and attention to detail. They transformed our commercial space and continue to maintain it perfectly. Their team is professional, reliable, and always goes above and beyond expectations.",
                services: "Commercial Cleaning, Maintenance"
            },
            {
                name: "David & Lisa Chen",
                role: "New Homeowners • Customer since 2024",
                avatar: "DC",
                rating: 5,
                text: "As new homeowners, we were overwhelmed with maintenance needs. This team guided us through everything and now handles all our home services. We couldn't be happier with their expertise and care.",
                services: "Move-in Cleaning, Landscaping, Repairs"
            }
        ];
        
        let currentTestimonial = 0;
        const featuredCard = document.querySelector('.testimonial-card.featured');
        
        if (featuredCard && testimonials.length > 1) {
            setInterval(() => {
                currentTestimonial = (currentTestimonial + 1) % testimonials.length;
                updateTestimonial(featuredCard, testimonials[currentTestimonial]);
            }, 8000);
        }
        
        function updateTestimonial(card, testimonial) {
            card.style.opacity = '0.7';
            card.style.transform = 'scale(0.98)';
            
            setTimeout(() => {
                // Update content
                const avatar = card.querySelector('.customer-avatar');
                const name = card.querySelector('.customer-details h4');
                const role = card.querySelector('.customer-details p');
                const stars = card.querySelector('.stars');
                const quote = card.querySelector('blockquote');
                const serviceUsed = card.querySelector('.service-used');
                
                if (avatar) avatar.textContent = testimonial.avatar;
                if (name) name.textContent = testimonial.name;
                if (role) role.textContent = testimonial.role;
                if (stars) stars.textContent = '★'.repeat(testimonial.rating);
                if (quote) quote.textContent = `"${testimonial.text}"`;
                if (serviceUsed) serviceUsed.textContent = `Services: ${testimonial.services}`;
                
                // Animate back
                card.style.opacity = '1';
                card.style.transform = 'scale(1)';
            }, 300);
        }
    }
    
    // Interactive elements enhancement
    function initInteractiveElements() {
        // Process step interactions
        const processSteps = document.querySelectorAll('.process-step');
        processSteps.forEach((step, index) => {
            step.addEventListener('mouseenter', function() {
                // Highlight current step
                this.style.transform = 'translateY(-15px) scale(1.02)';
                this.style.zIndex = '10';
                
                // Dim other steps
                processSteps.forEach((otherStep, otherIndex) => {
                    if (otherIndex !== index) {
                        otherStep.style.opacity = '0.7';
                    }
                });
            });
            
            step.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
                this.style.zIndex = '1';
                
                processSteps.forEach(otherStep => {
                    otherStep.style.opacity = '1';
                });
            });
        });
        
        // Team member card interactions
        const teamCards = document.querySelectorAll('.team-member .member-card');
        teamCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                const avatar = this.querySelector('.member-avatar');
                if (avatar) {
                    avatar.style.transform = 'scale(1.1) rotate(5deg)';
                }
            });
            
            card.addEventListener('mouseleave', function() {
                const avatar = this.querySelector('.member-avatar');
                if (avatar) {
                    avatar.style.transform = 'scale(1) rotate(0deg)';
                }
            });
        });
        
        // Value item interactions
        const valueItems = document.querySelectorAll('.value-item');
        valueItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                const icon = this.querySelector('.value-icon');
                if (icon) {
                    icon.style.transform = 'scale(1.1) rotate(10deg)';
                    icon.style.boxShadow = '0 8px 25px rgba(102, 126, 234, 0.3)';
                }
            });
            
            item.addEventListener('mouseleave', function() {
                const icon = this.querySelector('.value-icon');
                if (icon) {
                    icon.style.transform = 'scale(1) rotate(0deg)';
                    icon.style.boxShadow = 'none';
                }
            });
        });
    }
    
    // Progressive loading for better performance
    function initProgressiveLoading() {
        // Lazy load heavy elements
        const heavyElements = document.querySelectorAll(`
            .testimonial-card, .achievement-card, .culture-stat
        `);
        
        const loadObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('loaded');
                    loadObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        
        heavyElements.forEach(element => {
            element.classList.add('loading');
            loadObserver.observe(element);
        });
    }
    
    // Add CSS for animations
    const style = document.createElement('style');
    style.textContent = `
        .animate-in {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }
        
        .loading {
            opacity: 0.5;
            transition: opacity 0.5s ease;
        }
        
        .loaded {
            opacity: 1;
        }
        
        .video-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            animation: fadeIn 0.3s ease;
        }
        
        .video-modal {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            max-width: 800px;
            width: 90%;
            position: relative;
        }
        
        .close-video {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: none;
            border: none;
            font-size: 2rem;
            cursor: pointer;
            color: #666;
        }
        
        .video-placeholder-modal {
            aspect-ratio: 16/9;
            background: #f0f0f0;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }
        
        .play-button-large {
            width: 100px;
            height: 100px;
            background: #667eea;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .member-avatar, .value-icon {
            transition: all 0.3s ease;
        }
        
        .process-step {
            transition: all 0.3s ease;
        }
        
        .testimonial-card.featured {
            transition: all 0.3s ease;
        }
    `;
    document.head.appendChild(style);
});

// Page load optimization
window.addEventListener('load', function() {
    document.body.classList.add('page-loaded');
    
    // Trigger initial animations
    setTimeout(() => {
        const heroElements = document.querySelectorAll('.trust-badge');
        heroElements.forEach((element, index) => {
            setTimeout(() => {
                element.style.opacity = '1';
                element.style.transform = 'translateY(0)';
            }, index * 100);
        });
    }, 500);
});
