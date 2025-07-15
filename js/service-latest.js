// Service Latest Enhancement JavaScript
document.addEventListener('DOMContentLoaded', function() {
    
    // Filter functionality for latest services
    const filterButtons = document.querySelectorAll('.filter-btn');
    const serviceCards = document.querySelectorAll('.service-post-card');
    const searchInput = document.getElementById('service-search');
    
    // Filter button functionality
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            const filterValue = this.getAttribute('data-filter');
            
            serviceCards.forEach(card => {
                const isVisible = shouldShowCard(card, filterValue, searchInput.value);
                card.style.display = isVisible ? 'block' : 'none';
                
                if (isVisible) {
                    card.style.animation = 'fadeInUp 0.5s ease forwards';
                }
            });
        });
    });
    
    // Search functionality
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const activeFilter = document.querySelector('.filter-btn.active').getAttribute('data-filter');
            
            serviceCards.forEach(card => {
                const isVisible = shouldShowCard(card, activeFilter, searchTerm);
                card.style.display = isVisible ? 'block' : 'none';
                
                if (isVisible) {
                    card.style.animation = 'fadeInUp 0.5s ease forwards';
                }
            });
        });
    }
    
    // Function to determine if card should be shown
    function shouldShowCard(card, filter, searchTerm) {
        const title = card.querySelector('.post-title a').textContent.toLowerCase();
        const excerpt = card.querySelector('.post-excerpt').textContent.toLowerCase();
        const matchesSearch = !searchTerm || title.includes(searchTerm) || excerpt.includes(searchTerm);
        
        if (!matchesSearch) return false;
        
        switch (filter) {
            case 'all':
                return true;
            case 'popular':
                // Show cards with high ratings or popular indicators
                return card.querySelector('.service-rating') || 
                       title.includes('popular') || 
                       excerpt.includes('popular');
            case 'recent':
                // Show cards with "Latest" badge or "New Service" label
                return card.querySelector('.latest-badge') || 
                       card.querySelector('.service-new') ||
                       isRecentPost(card);
            case 'featured':
                // Show featured services
                return card.classList.contains('featured') ||
                       title.includes('featured') ||
                       excerpt.includes('featured');
            default:
                return true;
        }
    }
    
    // Check if post is recent (within last 30 days)
    function isRecentPost(card) {
        const postElement = card.querySelector('[data-post-date]');
        if (!postElement) return false;
        
        const postDate = new Date(postElement.getAttribute('data-post-date'));
        const now = new Date();
        const daysDiff = (now - postDate) / (1000 * 60 * 60 * 24);
        
        return daysDiff <= 30;
    }
    
    // Animate latest badges on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const badge = entry.target.querySelector('.latest-badge');
                if (badge) {
                    badge.style.animation = 'pulse-badge 2s infinite';
                }
                
                const newLabel = entry.target.querySelector('.service-new');
                if (newLabel) {
                    newLabel.style.animation = 'slideInRight 0.8s ease forwards';
                }
            }
        });
    }, observerOptions);
    
    // Observe all service cards
    serviceCards.forEach(card => {
        observer.observe(card);
    });
    
    // Add loading animation for service grid
    const serviceGrid = document.getElementById('services-posts-container');
    if (serviceGrid) {
        serviceGrid.style.opacity = '0';
        setTimeout(() => {
            serviceGrid.style.transition = 'opacity 0.8s ease';
            serviceGrid.style.opacity = '1';
        }, 100);
    }
    
    // Enhanced hover effects for service cards
    serviceCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            const badge = this.querySelector('.latest-badge');
            if (badge) {
                badge.style.transform = 'scale(1.1) rotate(5deg)';
            }
        });
        
        card.addEventListener('mouseleave', function() {
            const badge = this.querySelector('.latest-badge');
            if (badge) {
                badge.style.transform = 'scale(1) rotate(0deg)';
            }
        });
    });
});

// CSS animations
const style = document.createElement('style');
style.textContent = `
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
    
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    .service-post-card {
        transition: all 0.3s ease;
    }
    
    .latest-badge {
        transition: all 0.3s ease;
    }
`;
document.head.appendChild(style);
