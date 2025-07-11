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
    
    // Contact form validation (basic)
    $('.contact-form').on('submit', function(e) {
        var isValid = true;
        var email = $(this).find('input[type="email"]').val();
        var phone = $(this).find('input[type="tel"]').val();
        
        // Basic email validation
        if (email && !isValidEmail(email)) {
            alert('Please enter a valid email address.');
            isValid = false;
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

// Ultra Modern Hero Animations
function initUltraHero() {
    // Counter animations
    const counters = document.querySelectorAll('.stat-number');
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-count') || counter.textContent.replace(/[^\d]/g, ''));
        let current = 0;
        const increment = target / 100;
        const updateCounter = () => {
            if (current < target) {
                current += increment;
                counter.textContent = Math.ceil(current) + (counter.textContent.includes('+') ? '+' : '');
                setTimeout(updateCounter, 30);
            } else {
                counter.textContent = target + (counter.textContent.includes('+') ? '+' : '');
            }
        };
        
        // Start counter when element is visible
        const observer = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting) {
                updateCounter();
                observer.unobserve(counter);
            }
        });
        observer.observe(counter);
    });

    // Floating elements parallax
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const floatingElements = document.querySelectorAll('.floating-card-ultra');
        
        floatingElements.forEach((element, index) => {
            const speed = 0.5 + (index * 0.1);
            element.style.transform = `translateY(${scrolled * speed}px)`;
        });

        // Parallax background shapes
        const shapes = document.querySelectorAll('.shape');
        shapes.forEach((shape, index) => {
            const speed = 0.2 + (index * 0.05);
            shape.style.transform = `translateY(${scrolled * speed}px) rotate(${scrolled * 0.1}deg)`;
        });
    });

    // Interactive button effects
    const buttons = document.querySelectorAll('.btn-primary-ultra, .btn-secondary-ultra');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            const particles = this.querySelector('.btn-particles');
            if (particles) {
                particles.style.opacity = '1';
            }
        });

        button.addEventListener('mouseleave', function() {
            const particles = this.querySelector('.btn-particles');
            if (particles) {
                particles.style.opacity = '0';
            }
        });

        // Ripple effect for secondary buttons
        button.addEventListener('click', function(e) {
            if (this.classList.contains('btn-secondary-ultra')) {
                const ripple = this.querySelector('.btn-ripple');
                if (ripple) {
                    ripple.style.width = '300px';
                    ripple.style.height = '300px';
                    
                    setTimeout(() => {
                        ripple.style.width = '0';
                        ripple.style.height = '0';
                    }, 600);
                }
            }
        });
    });

    // Stat cards hover animations
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-15px) scale(1.05)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Social proof animation
    const avatars = document.querySelectorAll('.avatar');
    avatars.forEach((avatar, index) => {
        setTimeout(() => {
            avatar.style.animation = `avatarPulse 2s ease-in-out infinite`;
            avatar.style.animationDelay = `${index * 0.2}s`;
        }, 2000 + (index * 200));
    });

    // Scroll indicator interaction
    const scrollIndicator = document.querySelector('.scroll-indicator');
    if (scrollIndicator) {
        scrollIndicator.addEventListener('click', () => {
            window.scrollTo({
                top: window.innerHeight,
                behavior: 'smooth'
            });
        });
    }

    // Dynamic gradient animation
    const heroSection = document.querySelector('.hero-section-ultra');
    if (heroSection) {
        let gradientAngle = 135;
        setInterval(() => {
            gradientAngle += 1;
            if (gradientAngle > 360) gradientAngle = 0;
            
            heroSection.style.background = `linear-gradient(${gradientAngle}deg, #667eea 0%, #764ba2 50%, #f093fb 100%)`;
        }, 100);
    }

    // Floating cards random movement
    const floatingCards = document.querySelectorAll('.floating-card-ultra');
    floatingCards.forEach((card, index) => {
        setInterval(() => {
            const randomX = (Math.random() - 0.5) * 20;
            const randomY = (Math.random() - 0.5) * 20;
            card.style.transform += ` translate(${randomX}px, ${randomY}px)`;
            
            setTimeout(() => {
                card.style.transform = card.style.transform.replace(/translate\([^)]*\)/g, '');
            }, 2000);
        }, 3000 + (index * 1000));
    });
}

// CSS animations to add dynamically
const dynamicStyles = `
@keyframes avatarPulse {
    0%, 100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(255,255,255,0.4); }
    50% { transform: scale(1.1); box-shadow: 0 0 0 10px rgba(255,255,255,0); }
}

.avatar {
    transition: all 0.3s ease;
}

.floating-card-ultra {
    transition: transform 2s ease-in-out;
}

.btn-primary-ultra .btn-particles,
.btn-secondary-ultra .btn-particles {
    transition: opacity 0.3s ease;
}
`;

// Add dynamic styles to head
const styleSheet = document.createElement('style');
styleSheet.textContent = dynamicStyles;
document.head.appendChild(styleSheet);

// Initialize ultra hero when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    initUltraHero();
});

// Also initialize if page is already loaded
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initUltraHero);
} else {
    initUltraHero();
}

// Ultra Business Categories Functionality
function initBusinessCategories() {
    // Category card hover effects
    const categoryCards = document.querySelectorAll('.blueprint-category-card-ultra');
    
    categoryCards.forEach(card => {
        // Enhanced hover animations
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-15px) scale(1.02)';
            
            // Add glow effect
            const glowEffect = this.querySelector('.card-glow-effect');
            if (glowEffect) {
                glowEffect.style.opacity = '1';
            }
            
            // Animate service tags
            const serviceTags = this.querySelectorAll('.service-tag');
            serviceTags.forEach((tag, index) => {
                setTimeout(() => {
                    tag.style.transform = 'scale(1.1)';
                    tag.style.background = 'linear-gradient(135deg, #6366f1, #8b5cf6)';
                    tag.style.color = 'white';
                }, index * 50);
            });
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            
            // Remove glow effect
            const glowEffect = this.querySelector('.card-glow-effect');
            if (glowEffect) {
                glowEffect.style.opacity = '0';
            }
            
            // Reset service tags
            const serviceTags = this.querySelectorAll('.service-tag');
            serviceTags.forEach(tag => {
                tag.style.transform = 'scale(1)';
                tag.style.background = 'rgba(99, 102, 241, 0.1)';
                tag.style.color = '#4f46e5';
            });
        });
        
        // Click animation
        card.addEventListener('click', function(e) {
            if (!e.target.closest('.category-btn-ultra')) {
                // Create ripple effect
                const ripple = document.createElement('div');
                ripple.className = 'card-click-ripple';
                
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
                    background: radial-gradient(circle, rgba(99, 102, 241, 0.3) 0%, transparent 70%);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: cardRipple 0.6s ease-out;
                    pointer-events: none;
                    z-index: 10;
                `;
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            }
        });
    });
    
    // Filter tabs functionality
    const filterTabs = document.querySelectorAll('.filter-tab');
    
    filterTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Remove active class from all tabs
            filterTabs.forEach(t => t.classList.remove('active'));
            
            // Add active class to clicked tab
            this.classList.add('active');
            
            // Get filter value
            const filterValue = this.getAttribute('data-filter');
            
            // Filter categories
            filterCategories(filterValue);
            
            // Add click animation
            this.style.transform = 'translateY(-4px) scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'translateY(-2px) scale(1)';
            }, 150);
        });
    });
    
    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const categoryObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'categorySlideUp 0.8s ease-out forwards';
                entry.target.style.opacity = '1';
            }
        });
    }, observerOptions);
    
    // Observe all category cards
    categoryCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.animationDelay = `${index * 0.1}s`;
        categoryObserver.observe(card);
    });
    
    // Section stats counter animation
    const statNumbers = document.querySelectorAll('.section-stats .stat-number');
    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateStatCounter(entry.target);
                statsObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    statNumbers.forEach(stat => {
        statsObserver.observe(stat);
    });
}

// Filter categories function
function filterCategories(filter) {
    const cards = document.querySelectorAll('.blueprint-category-card-ultra');
    
    cards.forEach(card => {
        const category = card.getAttribute('data-category');
        let shouldShow = true;
        
        switch(filter) {
            case 'low-cost':
                // Show categories with startup cost under $2K
                const lowCostCategories = ['cleaning', 'errands', 'family', 'pet'];
                shouldShow = lowCostCategories.includes(category);
                break;
            case 'high-profit':
                // Show categories with high profit potential
                const highProfitCategories = ['maintenance', 'creative', 'coaching', 'selling'];
                shouldShow = highProfitCategories.includes(category);
                break;
            case 'remote':
                // Show remote-friendly categories
                const remoteCategories = ['creative', 'coaching', 'office'];
                shouldShow = remoteCategories.includes(category);
                break;
            default:
                shouldShow = true;
        }
        
        if (shouldShow) {
            card.style.display = 'block';
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100);
        } else {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            setTimeout(() => {
                card.style.display = 'none';
            }, 300);
        }
    });
}

// Animate stat counters
function animateStatCounter(element) {
    const text = element.textContent;
    const hasPlus = text.includes('+');
    const number = parseInt(text.replace(/[^\d]/g, ''));
    
    if (isNaN(number)) return;
    
    let current = 0;
    const increment = number / 50;
    const timer = setInterval(() => {
        current += increment;
        if (current >= number) {
            element.textContent = number + (hasPlus ? '+' : '');
            clearInterval(timer);
        } else {
            element.textContent = Math.ceil(current) + (hasPlus ? '+' : '');
        }
    }, 30);
}

// Add dynamic CSS animations
const categoryAnimations = `
@keyframes categorySlideUp {
    0% {
        opacity: 0;
        transform: translateY(40px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes cardRipple {
    0% {
        transform: scale(0);
        opacity: 1;
    }
    100% {
        transform: scale(2);
        opacity: 0;
    }
}

.blueprint-category-card-ultra {
    position: relative;
    overflow: hidden;
}

.card-click-ripple {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
    z-index: 10;
}

.filter-tab {
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.service-tag {
    transition: all 0.2s ease;
}
`;

// Add animations to stylesheet
const categoryStyleSheet = document.createElement('style');
categoryStyleSheet.textContent = categoryAnimations;
document.head.appendChild(categoryStyleSheet);

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    initBusinessCategories();
});

// Also initialize if page is already loaded
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initBusinessCategories);
} else {
    initBusinessCategories();
}
