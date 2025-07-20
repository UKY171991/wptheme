/**
 * Layout Improvements for Blueprint Theme
 * Enhances overall layout and fixes common issues
 */

jQuery(document).ready(function($) {
    // Initialize layout improvements
    function initLayoutImprovements() {
        fixContentSpacing();
        enhanceResponsiveness();
        improveAccessibility();
        optimizePerformance();
    }
    
    // Fix content spacing issues
    function fixContentSpacing() {
        // Add proper spacing to content sections
        $('.site-main > section').each(function() {
            const $section = $(this);
            if (!$section.hasClass('spacing-fixed')) {
                $section.addClass('spacing-fixed');
            }
        });
        
        // Fix inconsistent margins
        $('.entry-content > *:first-child').css('margin-top', 0);
        $('.entry-content > *:last-child').css('margin-bottom', 0);
    }
    
    // Enhance responsive behavior
    function enhanceResponsiveness() {
        // Fix table responsiveness
        $('table').each(function() {
            if (!$(this).parent().hasClass('table-responsive')) {
                $(this).wrap('<div class="table-responsive"></div>');
            }
        });
        
        // Fix image responsiveness
        $('.entry-content img').each(function() {
            $(this).addClass('img-fluid');
        });
        
        // Fix iframe responsiveness (videos, maps)
        $('.entry-content iframe').each(function() {
            if (!$(this).parent().hasClass('iframe-responsive')) {
                $(this).wrap('<div class="iframe-responsive"></div>');
            }
        });
    }
    
    // Improve accessibility
    function improveAccessibility() {
        // Add missing alt text to images
        $('img:not([alt])').attr('alt', '');
        
        // Add proper roles to elements
        $('.site-header').attr('role', 'banner');
        $('.site-footer').attr('role', 'contentinfo');
        $('.site-main').attr('role', 'main');
        
        // Ensure proper heading hierarchy
        fixHeadingHierarchy();
    }
    
    // Fix heading hierarchy
    function fixHeadingHierarchy() {
        // Check if page has h1
        const hasH1 = $('h1').length > 0;
        
        // If no h1, convert first h2 to h1
        if (!hasH1 && $('h2').length > 0) {
            $('h2').first().replaceWith(function() {
                return $('<h1>').addClass($(this).attr('class')).html($(this).html());
            });
        }
    }
    
    // Optimize performance
    function optimizePerformance() {
        // Lazy load images
        if ('loading' in HTMLImageElement.prototype) {
            // Browser supports native lazy loading
            $('img').attr('loading', 'lazy');
        }
        
        // Debounce scroll events
        let scrollTimer;
        $(window).on('scroll', function() {
            clearTimeout(scrollTimer);
            scrollTimer = setTimeout(function() {
                // Handle scroll-based functionality
                checkVisibleElements();
            }, 100);
        });
    }
    
    // Check for elements entering viewport
    function checkVisibleElements() {
        $('.animate-on-scroll:not(.animated)').each(function() {
            const $element = $(this);
            const elementTop = $element.offset().top;
            const elementBottom = elementTop + $element.outerHeight();
            const viewportTop = $(window).scrollTop();
            const viewportBottom = viewportTop + $(window).height();
            
            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                $element.addClass('animated');
            }
        });
    }
    
    // Initialize on document ready
    initLayoutImprovements();
    
    // Re-check on window resize
    let resizeTimer;
    $(window).on('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            enhanceResponsiveness();
        }, 250);
    });
});