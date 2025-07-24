// Professional About Page Interactions

document.addEventListener('DOMContentLoaded', function() {
    
    // Animate metric counters
    function animateCounters() {
        const counters = document.querySelectorAll('.metric-number[data-count]');
        
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseFloat(counter.getAttribute('data-count'));
                    const duration = 2000; // 2 seconds
                    const increment = target / (duration / 16); // 60fps
                    let current = 0;
                    
                    const updateCounter = () => {
                        if (current < target) {
                            current += increment;
                            if (current > target) current = target;
                            
                            // Format the number based on the target
                            if (target >= 1000) {
                                counter.textContent = Math.floor(current).toLocaleString() + '+';
                            } else if (target % 1 !== 0) {
                                counter.textContent = current.toFixed(1) + '%';
                            } else {
                                counter.textContent = Math.floor(current);
                            }
                            
                            requestAnimationFrame(updateCounter);
                        } else {
                            // Final formatting
                            if (target >= 1000) {
                                counter.textContent = target.toLocaleString() + '+';
                            } else if (target % 1 !== 0) {
                                counter.textContent = target + '%';
                            } else {
                                counter.textContent = target;
                            }
                        }
                    };
                    
                    updateCounter();
                    observer.unobserve(counter);
                }
            });
        }, observerOptions);
        
        counters.forEach(counter => observer.observe(counter));
    }
    
    // Animate cards on scroll
    function animateCards() {
        const cards = document.querySelectorAll('.feature-card, .leader-card, .value-card, .metric-item');
        
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 100);
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    }
    
    // Smooth scroll for anchor links
    function setupSmoothScroll() {
        const links = document.querySelectorAll('a[href^="#"]');
        
        links.forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                const target = document.querySelector(href);
                
                if (target) {
                    e.preventDefault();
                    const offsetTop = target.offsetTop - 100; // Account for header
                    
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }
    
    // Parallax effect for section backgrounds
    function setupParallax() {
        const sections = document.querySelectorAll('.company-story, .achievement-metrics');
        
        if (window.innerWidth > 768) { // Only on desktop
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const rate = scrolled * -0.5;
                
                sections.forEach(section => {
                    if (section.offsetTop < scrolled + window.innerHeight && 
                        section.offsetTop + section.offsetHeight > scrolled) {
                        section.style.transform = `translateY(${rate}px)`;
                    }
                });
            });
        }
    }
    
    // Add hover effects to timeline items
    function enhanceTimeline() {
        const timelineItems = document.querySelectorAll('.timeline-item');
        
        timelineItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.querySelector('.timeline-year').style.transform = 'scale(1.1)';
                this.querySelector('.timeline-content').style.transform = 'translateX(10px)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.querySelector('.timeline-year').style.transform = 'scale(1)';
                this.querySelector('.timeline-content').style.transform = 'translateX(0)';
            });
        });
    }
    
    // Add floating animation to badges
    function animateBadges() {
        const badges = document.querySelectorAll('.floating-badge, .section-badge');
        
        badges.forEach((badge, index) => {
            badge.style.animation = `float 3s ease-in-out infinite ${index * 0.5}s`;
        });
    }
    
    // Initialize all animations and interactions
    animateCounters();
    animateCards();
    setupSmoothScroll();
    setupParallax();
    enhanceTimeline();
    animateBadges();
    
    // Add CSS for floating animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .timeline-year, .timeline-content {
            transition: transform 0.3s ease;
        }
        
        .feature-card:hover .feature-icon {
            transform: scale(1.1);
            transition: transform 0.3s ease;
        }
        
        .leader-card:hover .avatar {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }
        
        .value-card:hover .value-icon {
            transform: scale(1.1) rotate(5deg);
            transition: all 0.3s ease;
        }
    `;
    document.head.appendChild(style);
    
});

// Add loading animation for the page
window.addEventListener('load', function() {
    document.body.classList.add('page-loaded');
    
    // Add CSS for page load animation
    const style = document.createElement('style');
    style.textContent = `
        .about-professional {
            opacity: 0;
            animation: fadeInUp 1s ease-out forwards;
        }
        
        .page-loaded .about-professional {
            opacity: 1;
        }
        
        @keyframes fadeInUp {
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
});
