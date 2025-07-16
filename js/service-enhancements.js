/**
 * Service Filter and Search Functionality
 */
(function($) {
    'use strict';
    
    $(document).ready(function() {
        // Initialize filter functionality
        initServiceFilters();
        initServiceSearch();
        initServiceAnimations();
    });
    
    function initServiceFilters() {
        $('.filter-btn').on('click', function() {
            const filterValue = $(this).data('filter');
            
            // Update active button
            $('.filter-btn').removeClass('active');
            $(this).addClass('active');
            
            // Filter services
            filterServices(filterValue);
        });
    }
    
    function initServiceSearch() {
        let searchTimeout;
        
        $('#service-search').on('input', function() {
            clearTimeout(searchTimeout);
            const searchTerm = $(this).val().toLowerCase();
            
            searchTimeout = setTimeout(function() {
                searchServices(searchTerm);
            }, 300);
        });
        
        // Clear search on escape key
        $('#service-search').on('keydown', function(e) {
            if (e.keyCode === 27) { // Escape key
                $(this).val('');
                searchServices('');
            }
        });
    }
    
    function filterServices(filter) {
        const $cards = $('.post-card');
        let visibleCount = 0;
        
        $cards.each(function() {
            const $card = $(this);
            let shouldShow = false;
            
            switch(filter) {
                case 'all':
                    shouldShow = true;
                    break;
                case 'popular':
                    // Show cards with high ratings or featured
                    shouldShow = $card.find('.stat').text().includes('4.') || 
                               $card.hasClass('featured');
                    break;
                case 'recent':
                    // Show recent/new services
                    shouldShow = $card.data('recent') === true || 
                               $card.data('new') === true ||
                               $card.find('.latest-badge').length > 0 ||
                               $card.find('.service-new').length > 0;
                    break;
                case 'featured':
                    // Show featured services
                    shouldShow = $card.hasClass('featured') || 
                               $card.find('.latest-badge').length > 0;
                    break;
            }
            
            if (shouldShow) {
                $card.fadeIn(300);
                visibleCount++;
            } else {
                $card.fadeOut(300);
            }
        });
        
        // Show no results message if needed
        showNoResultsMessage(visibleCount, 'filter');
    }
    
    function searchServices(searchTerm) {
        const $cards = $('.post-card');
        let visibleCount = 0;
        
        if (searchTerm === '') {
            // Show all cards if search is empty
            $cards.fadeIn(300);
            hideNoResultsMessage();
            return;
        }
        
        $cards.each(function() {
            const $card = $(this);
            const title = $card.find('.post-title a').text().toLowerCase();
            const excerpt = $card.find('.post-excerpt').text().toLowerCase();
            const category = $card.data('category') ? $card.data('category').toLowerCase() : '';
            
            const matches = title.includes(searchTerm) || 
                          excerpt.includes(searchTerm) || 
                          category.includes(searchTerm);
            
            if (matches) {
                $card.fadeIn(300);
                visibleCount++;
                // Highlight search terms
                highlightSearchTerm($card, searchTerm);
            } else {
                $card.fadeOut(300);
            }
        });
        
        showNoResultsMessage(visibleCount, 'search');
    }
    
    function highlightSearchTerm($card, term) {
        // Simple highlighting (you can enhance this)
        const $title = $card.find('.post-title a');
        const originalTitle = $title.data('original-title') || $title.text();
        
        if (!$title.data('original-title')) {
            $title.data('original-title', originalTitle);
        }
        
        if (term && term.length > 0) {
            const highlightedTitle = originalTitle.replace(
                new RegExp(term, 'gi'), 
                '<mark>$&</mark>'
            );
            $title.html(highlightedTitle);
        } else {
            $title.text(originalTitle);
        }
    }
    
    function showNoResultsMessage(count, type) {
        const $container = $('#services-posts-container');
        const $noResults = $('.no-results-message');
        
        if (count === 0) {
            if ($noResults.length === 0) {
                const message = type === 'search' ? 
                    'No services found matching your search.' : 
                    'No services found in this category.';
                
                $container.append(`
                    <div class="no-results-message">
                        <div class="no-results-icon">🔍</div>
                        <h3>No Results Found</h3>
                        <p>${message}</p>
                        <button class="btn-clear-filters">Clear Filters</button>
                    </div>
                `);
                
                // Add clear filters functionality
                $('.btn-clear-filters').on('click', function() {
                    $('#service-search').val('');
                    $('.filter-btn[data-filter="all"]').click();
                });
            }
        } else {
            hideNoResultsMessage();
        }
    }
    
    function hideNoResultsMessage() {
        $('.no-results-message').remove();
    }
    
    function initServiceAnimations() {
        // Animate cards on page load
        $('.post-card').each(function(index) {
            $(this).css({
                'opacity': '0',
                'transform': 'translateY(30px)'
            }).delay(index * 100).animate({
                'opacity': '1'
            }, 600, function() {
                $(this).css('transform', 'translateY(0)');
            });
        });
        
        // Animate filter buttons
        $('.filter-btn').hover(
            function() {
                $(this).addClass('hovered');
            },
            function() {
                $(this).removeClass('hovered');
            }
        );
        
        // Add loading state for search
        $('#service-search').on('input', function() {
            $(this).addClass('searching');
            setTimeout(() => {
                $(this).removeClass('searching');
            }, 500);
        });
    }
    
    // Utility function to debounce search
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
    
    // Add smooth scrolling to filtered results
    function scrollToResults() {
        $('html, body').animate({
            scrollTop: $('#services-posts-container').offset().top - 100
        }, 500);
    }
    
})(jQuery);
