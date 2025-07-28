/**
 * Business Library Interactive Effects
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Add smooth scroll effect for internal links
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

    // Add hover sound effect (optional)
    const businessCards = document.querySelectorAll('.business-card');
    
    businessCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            // Add subtle scale animation
            this.style.transform = 'translateY(-10px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            // Reset transform
            this.style.transform = 'translateY(0) scale(1)';
        });
        
        // Add click analytics (you can integrate with Google Analytics)
        card.addEventListener('click', function() {
            const serviceTitle = this.querySelector('.service-title').textContent;
            
            // Example: Track click event
            if (typeof gtag !== 'undefined') {
                gtag('event', 'service_click', {
                    'service_name': serviceTitle,
                    'page_location': window.location.href
                });
            }
            
            console.log('Service clicked:', serviceTitle);
        });
    });

    // Add loading animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    // Observe all business cards for scroll animations
    businessCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });

    // Add parallax effect to hero section
    const hero = document.querySelector('.business-library-hero');
    if (hero) {
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            hero.style.transform = `translateY(${rate}px)`;
        });
    }

    // Add search functionality (if you want to add search)
    function addSearchFunctionality() {
        const searchInput = document.getElementById('business-search');
        if (searchInput) {
            searchInput.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();
                const cards = document.querySelectorAll('.business-card');
                
                cards.forEach(card => {
                    const title = card.querySelector('.service-title').textContent.toLowerCase();
                    const description = card.querySelector('.service-description').textContent.toLowerCase();
                    
                    if (title.includes(searchTerm) || description.includes(searchTerm)) {
                        card.style.display = 'block';
                        card.parentElement.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                        card.parentElement.style.display = 'none';
                    }
                });
            });
        }
    }

    // Initialize search if search input exists
    addSearchFunctionality();

    // Add filter functionality by color/category
    function addFilterFunctionality() {
        const filterButtons = document.querySelectorAll('.filter-btn');
        if (filterButtons.length > 0) {
            filterButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const filter = this.getAttribute('data-filter');
                    const cards = document.querySelectorAll('.business-card');
                    
                    // Remove active class from all buttons
                    filterButtons.forEach(b => b.classList.remove('active'));
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    cards.forEach(card => {
                        if (filter === 'all' || card.getAttribute('data-color') === filter) {
                            card.parentElement.style.display = 'block';
                            setTimeout(() => {
                                card.style.opacity = '1';
                                card.style.transform = 'translateY(0)';
                            }, 100);
                        } else {
                            card.style.opacity = '0';
                            card.style.transform = 'translateY(20px)';
                            setTimeout(() => {
                                card.parentElement.style.display = 'none';
                            }, 300);
                        }
                    });
                });
            });
        }
    }

    // Initialize filters if filter buttons exist
    addFilterFunctionality();

    // Add book flip animation on click
    businessCards.forEach(card => {
        const bookElement = card.querySelector('.business-book');
        if (bookElement) {
            card.addEventListener('click', function(e) {
                // Don't trigger if clicking the button
                if (!e.target.closest('.btn')) {
                    bookElement.style.transform = 'rotateY(180deg)';
                    setTimeout(() => {
                        bookElement.style.transform = 'rotateY(0deg)';
                    }, 600);
                }
            });
        }
    });

    // Add responsive touch events for mobile
    if ('ontouchstart' in window) {
        businessCards.forEach(card => {
            card.addEventListener('touchstart', function() {
                this.classList.add('touch-active');
            });
            
            card.addEventListener('touchend', function() {
                setTimeout(() => {
                    this.classList.remove('touch-active');
                }, 300);
            });
        });
    }

    // Console log for debugging
    console.log('Business Library JavaScript loaded successfully!');
    console.log('Found', businessCards.length, 'business cards');
});
