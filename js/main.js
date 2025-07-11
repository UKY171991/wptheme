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
