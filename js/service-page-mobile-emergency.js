/**
 * Service Page Mobile Emergency Fixes
 * JavaScript fixes to ensure proper mobile rendering
 */
jQuery(document).ready(function($) {
    console.log('🚑 Service Page Mobile Emergency Fixes Loading...');
    
    // Only run on mobile devices
    if (window.innerWidth <= 768) {
        emergencyMobileFixes();
    }
    
    // Run fixes on window resize
    $(window).on('resize', function() {
        if (window.innerWidth <= 768) {
            emergencyMobileFixes();
        }
    });
    
    function emergencyMobileFixes() {
        console.log('📱 Applying emergency mobile fixes...');
        
        // Force hide all problematic elements
        hideProblematicElements();
        
        // Fix container widths
        fixContainerWidths();
        
        // Simplify hero section
        simplifyHeroSection();
        
        // Fix stats section
        fixStatsSection();
        
        // Ensure proper viewport
        ensureProperViewport();
        
        // Fix overflow issues
        fixOverflowIssues();
        
        console.log('✅ Emergency mobile fixes applied');
    }
    
    function hideProblematicElements() {
        // Force hide all animated/decorative elements
        const problematicSelectors = [
            '.hero-mega-particles',
            '.hero-animated-waves',
            '.hero-floating-elements',
            '.hero-background-gradient-ultra',
            '.hero-overlay-premium',
            '.hero-spotlight-effect',
            '#hero-interactive-canvas',
            '.floating-service-icons',
            '.stats-background-effects',
            '.stats-particle-field',
            '.stats-energy-waves',
            '.hero-interactive-elements',
            '[class*="particle"]',
            '[class*="wave"]',
            '[class*="float"]',
            '[class*="morph"]',
            '[class*="glow"]',
            'canvas'
        ];
        
        problematicSelectors.forEach(selector => {
            $(selector).hide().css({
                'display': 'none',
                'visibility': 'hidden',
                'opacity': '0',
                'width': '0',
                'height': '0',
                'overflow': 'hidden'
            });
        });
    }
    
    function fixContainerWidths() {
        // Force proper container widths
        $('.services-hero-ultra-fancy, .hero-content-ultra-fancy, .container').css({
            'width': '100%',
            'max-width': '100%',
            'overflow-x': 'hidden',
            'box-sizing': 'border-box'
        });
        
        $('.container').css({
            'padding': '0 15px',
            'margin': '0 auto'
        });
    }
    
    function simplifyHeroSection() {
        // Simplify hero section styling
        $('.services-hero-ultra-fancy').css({
            'position': 'relative',
            'width': '100%',
            'max-width': '100%',
            'height': 'auto',
            'min-height': '50vh',
            'padding': '3rem 0',
            'margin': '0',
            'overflow': 'hidden',
            'background': 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
            'animation': 'none',
            'transform': 'none'
        });
        
        $('.hero-content-ultra-fancy').css({
            'position': 'relative',
            'z-index': '10',
            'text-align': 'center',
            'color': 'white',
            'padding': '0 15px'
        });
        
        // Fix badges
        $('.badge-track').css({
            'display': 'flex',
            'flex-direction': 'column',
            'gap': '0.75rem',
            'animation': 'none',
            'transform': 'none'
        });
        
        $('.hero-badge-fancy').css({
            'background': 'rgba(255,255,255,0.95)',
            'color': '#333',
            'padding': '0.75rem 1.5rem',
            'border-radius': '25px',
            'font-size': '0.875rem',
            'font-weight': '600',
            'text-align': 'center',
            'animation': 'none',
            'transform': 'none',
            'max-width': '300px',
            'margin': '0 auto'
        });
        
        // Fix title
        $('.hero-title-ultra-fancy').css({
            'font-size': '2.25rem',
            'line-height': '1.2',
            'margin': '2rem 0 1.5rem 0',
            'text-align': 'center'
        });
        
        $('.title-line-1, .title-line-2, .title-line-3').css({
            'animation': 'none',
            'transform': 'none',
            'opacity': '1'
        });
        
        // Fix subtitle
        $('.hero-subtitle-ultra-fancy').css({
            'font-size': '1.1rem',
            'line-height': '1.6',
            'margin': '0 0 2rem 0',
            'padding': '0 1rem',
            'animation': 'none',
            'transform': 'none'
        });
    }
    
    function fixStatsSection() {
        $('.stats-container-ultra-fancy').css({
            'display': 'grid',
            'grid-template-columns': 'repeat(2, 1fr)',
            'gap': '1rem',
            'padding': '0 15px',
            'width': '100%',
            'max-width': '100%'
        });
        
        $('.stat-item-ultra').css({
            'background': 'rgba(255,255,255,0.95)',
            'padding': '1.25rem 1rem',
            'border-radius': '12px',
            'text-align': 'center',
            'animation': 'none',
            'transform': 'none',
            'width': '100%',
            'box-sizing': 'border-box'
        });
    }
    
    function ensureProperViewport() {
        // Ensure viewport meta tag is correct
        let viewport = $('meta[name="viewport"]');
        if (viewport.length === 0) {
            $('head').append('<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">');
        } else {
            viewport.attr('content', 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no');
        }
    }
    
    function fixOverflowIssues() {
        // Force fix overflow issues
        $('body, html').css({
            'overflow-x': 'hidden',
            'width': '100%',
            'max-width': '100%'
        });
        
        $('#main, .site-main').css({
            'width': '100%',
            'max-width': '100%',
            'overflow-x': 'hidden',
            'padding': '0',
            'margin': '0'
        });
        
        // Find and fix any wide elements
        $('*').each(function() {
            const $el = $(this);
            if ($el.outerWidth() > $(window).width()) {
                $el.css({
                    'max-width': '100%',
                    'width': '100%',
                    'overflow-x': 'hidden',
                    'box-sizing': 'border-box'
                });
            }
        });
    }
    
    // Monitor for dynamic content changes
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'childList' && window.innerWidth <= 768) {
                setTimeout(emergencyMobileFixes, 100);
            }
        });
    });
    
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
    
    // Fix any quote calculator issues
    setTimeout(function() {
        $('.instant-quote-section, .quote-calculator').css({
            'width': '100%',
            'max-width': '100%',
            'overflow-x': 'hidden',
            'padding': '2rem 15px'
        });
        
        $('.service-options').css({
            'display': 'grid',
            'grid-template-columns': '1fr',
            'gap': '1rem'
        });
        
        $('.service-option').css({
            'width': '100%',
            'padding': '1rem',
            'border': '2px solid #e9ecef',
            'border-radius': '8px',
            'background': 'white'
        });
    }, 1000);
    
    console.log('✅ Service Page Mobile Emergency Fixes Complete');
});
