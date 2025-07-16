/**
 * Service Page Filter and Search Functionality
 */

document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const searchInput = document.getElementById('service-search');
    const serviceCards = document.querySelectorAll('.service-post-card, .post-card');
    
    // Filter functionality
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            const filter = this.getAttribute('data-filter');
            filterServices(filter);
        });
    });
    
    // Search functionality
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            searchServices(searchTerm);
        });
    }
    
    function filterServices(filter) {
        serviceCards.forEach(card => {
            const isVisible = shouldShowCard(card, filter);
            
            if (isVisible) {
                card.style.display = 'block';
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                
                // Animate in
                setTimeout(() => {
                    card.style.transition = 'all 0.3s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100);
            } else {
                card.style.transition = 'all 0.3s ease';
                card.style.opacity = '0';
                card.style.transform = 'translateY(-20px)';
                
                setTimeout(() => {
                    card.style.display = 'none';
                }, 300);
            }
        });
        
        // Update count
        updateResultCount();
    }
    
    function shouldShowCard(card, filter) {
        switch (filter) {
            case 'all':
                return true;
            case 'popular':
                return card.classList.contains('featured') || 
                       card.querySelector('.service-rating')?.textContent.includes('4.9');
            case 'recent':
                return card.getAttribute('data-recent') === 'true' ||
                       card.getAttribute('data-new') === 'true' ||
                       card.querySelector('.service-new') !== null;
            case 'featured':
                return card.classList.contains('featured');
            default:
                return true;
        }
    }
    
    function searchServices(searchTerm) {
        if (!searchTerm) {
            // If search is empty, show all cards based on current filter
            const activeFilter = document.querySelector('.filter-btn.active')?.getAttribute('data-filter') || 'all';
            filterServices(activeFilter);
            return;
        }
        
        serviceCards.forEach(card => {
            const title = card.querySelector('.post-title')?.textContent.toLowerCase() || '';
            const excerpt = card.querySelector('.post-excerpt')?.textContent.toLowerCase() || '';
            const category = card.getAttribute('data-category')?.toLowerCase() || '';
            
            const matches = title.includes(searchTerm) || 
                          excerpt.includes(searchTerm) || 
                          category.includes(searchTerm);
            
            if (matches) {
                card.style.display = 'block';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            } else {
                card.style.display = 'none';
            }
        });
        
        updateResultCount();
    }
    
    function updateResultCount() {
        const visibleCards = Array.from(serviceCards).filter(card => {
            return window.getComputedStyle(card).display !== 'none';
        });
        
        const countElement = document.querySelector('.pagination-info');
        if (countElement) {
            const total = serviceCards.length;
            const visible = visibleCards.length;
            countElement.innerHTML = `Showing <strong>${visible}</strong> of <strong>${total}</strong> services`;
        }
    }
    
    // Initialize
    updateResultCount();
    
    // Add smooth scrolling to filter section when page loads
    const filterSection = document.querySelector('.posts-filter');
    if (filterSection && window.location.hash === '#services') {
        setTimeout(() => {
            filterSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }, 500);
    }
});
