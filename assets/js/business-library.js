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
                let visibleCount = 0;
                
                cards.forEach(card => {
                    const title = card.querySelector('.service-title').textContent.toLowerCase();
                    const description = card.querySelector('.service-description').textContent.toLowerCase();
                    const category = card.getAttribute('data-category') ? card.getAttribute('data-category').toLowerCase() : '';
                    
                    if (title.includes(searchTerm) || 
                        description.includes(searchTerm) || 
                        category.includes(searchTerm) ||
                        searchTerm === '') {
                        
                        card.parentElement.style.display = 'block';
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                        visibleCount++;
                    } else {
                        card.parentElement.style.display = 'none';
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(20px)';
                    }
                });
                
                // Show/hide no results message
                let noResultsMsg = document.getElementById('no-results-message');
                if (visibleCount === 0 && searchTerm !== '') {
                    if (!noResultsMsg) {
                        noResultsMsg = document.createElement('div');
                        noResultsMsg.id = 'no-results-message';
                        noResultsMsg.className = 'col-12 text-center mt-4';
                        noResultsMsg.innerHTML = `
                            <div class="alert alert-info">
                                <h5><i class="fas fa-search me-2"></i>No services found</h5>
                                <p class="mb-0">Try adjusting your search terms or browse our categories.</p>
                            </div>
                        `;
                        document.querySelector('.business-library-services .row').appendChild(noResultsMsg);
                    }
                    noResultsMsg.style.display = 'block';
                } else if (noResultsMsg) {
                    noResultsMsg.style.display = 'none';
                }
                
                // Reset filters when searching
                if (searchTerm !== '') {
                    const filterButtons = document.querySelectorAll('.filter-btn');
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    document.querySelector('.filter-btn[data-filter="all"]')?.classList.add('active');
                }
            });
            
            // Add search suggestions (optional)
            const suggestions = [
                'web design', 'marketing', 'consulting', 'development', 
                'business', 'digital', 'creative', 'technical'
            ];
            
            // You can implement autocomplete here if needed
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
                        const cardCategory = card.getAttribute('data-category') || '';
                        const cardColor = card.getAttribute('data-color') || '';
                        
                        // Show/hide based on filter
                        if (filter === 'all' || 
                            cardCategory.toLowerCase() === filter.toLowerCase() || 
                            cardColor === filter) {
                            
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
                    
                    // Update URL with filter (optional)
                    if (history.pushState) {
                        const newUrl = filter === 'all' ? 
                            window.location.pathname : 
                            window.location.pathname + '?filter=' + encodeURIComponent(filter);
                        history.pushState(null, null, newUrl);
                    }
                });
            });
            
            // Check for URL parameter on load
            const urlParams = new URLSearchParams(window.location.search);
            const filterParam = urlParams.get('filter');
            if (filterParam) {
                const targetButton = document.querySelector(`[data-filter="${filterParam}"]`);
                if (targetButton) {
                    targetButton.click();
                }
            }
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
