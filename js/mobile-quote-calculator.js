/**
 * Mobile-Optimized Quote Calculator
 * Enhanced mobile functionality for service page quote calculator
 */
jQuery(document).ready(function($) {
    console.log('🔧 Mobile Quote Calculator Enhancement Loaded');
    
    // Mobile-specific enhancements
    if (window.innerWidth <= 768) {
        initMobileQuoteCalculator();
    }
    
    function initMobileQuoteCalculator() {
        console.log('📱 Initializing mobile quote calculator');
        
        // Ensure proper touch interactions
        $('.service-option').off('click.mobile').on('click.mobile', function() {
            // Remove active state from all options
            $('.service-option').removeClass('selected active');
            
            // Add active state to clicked option
            $(this).addClass('selected active');
            
            // Store selected service
            const selectedService = $(this).data('service');
            sessionStorage.setItem('selectedService', selectedService);
            
            // Provide feedback
            $(this).css('transform', 'scale(0.95)');
            setTimeout(() => {
                $(this).css('transform', '');
            }, 150);
            
            // Enable next button if exists
            $('.nav-btn.next').prop('disabled', false);
            
            console.log('✅ Service selected:', selectedService);
        });
        
        // Enhanced form inputs for mobile
        $('.detail-group input, .detail-group select').each(function() {
            const $input = $(this);
            
            // Prevent zoom on iOS
            if ($input.attr('type') !== 'date') {
                $input.css('font-size', '16px');
            }
            
            // Add touch-friendly styling
            $input.on('focus', function() {
                $(this).closest('.detail-group').addClass('focused');
            }).on('blur', function() {
                $(this).closest('.detail-group').removeClass('focused');
            });
        });
        
        // Calculator navigation
        $('.nav-btn').off('click.mobile').on('click.mobile', function() {
            const isNext = $(this).hasClass('next');
            const isPrev = $(this).hasClass('prev');
            const currentStep = $('.step.active').data('step');
            
            if (isNext && currentStep < 3) {
                goToStep(currentStep + 1);
            } else if (isPrev && currentStep > 1) {
                goToStep(currentStep - 1);
            }
        });
        
        // Property size auto-calculation helper
        $('#property-size').on('input', function() {
            const size = parseInt($(this).val());
            if (size) {
                updatePriceEstimate(size);
            }
        });
        
        // ZIP code validation
        $('#zip-code').on('input', function() {
            const zip = $(this).val().replace(/\D/g, '');
            $(this).val(zip);
            
            if (zip.length === 5) {
                validateZipCode(zip);
            }
        });
        
        // Mobile-specific booking form enhancements
        $('#smart-booking-form input, #smart-booking-form select').each(function() {
            $(this).css('font-size', '16px'); // Prevent zoom
        });
        
        // Add loading states for buttons
        $('.quote-btn, .booking-submit, .nav-btn').on('click', function() {
            const $btn = $(this);
            const originalText = $btn.text();
            
            $btn.prop('disabled', true).text('Loading...');
            
            setTimeout(() => {
                $btn.prop('disabled', false).text(originalText);
            }, 2000);
        });
    }
    
    function goToStep(stepNumber) {
        console.log('📋 Going to step:', stepNumber);
        
        // Update step indicators
        $('.step').removeClass('active');
        $(`.step[data-step="${stepNumber}"]`).addClass('active');
        
        // Update step content
        $('.step-content').removeClass('active');
        $(`.step-content[data-step="${stepNumber}"]`).addClass('active');
        
        // Update navigation buttons
        $('.nav-btn.prev').prop('disabled', stepNumber === 1);
        $('.nav-btn.next').prop('disabled', stepNumber === 3);
        
        // Scroll to top of calculator on mobile
        if (window.innerWidth <= 768) {
            $('html, body').animate({
                scrollTop: $('.quote-calculator').offset().top - 20
            }, 300);
        }
        
        // Auto-focus first input in new step
        setTimeout(() => {
            $(`.step-content[data-step="${stepNumber}"] input:first, .step-content[data-step="${stepNumber}"] select:first`).focus();
        }, 300);
    }
    
    function updatePriceEstimate(size) {
        const selectedService = sessionStorage.getItem('selectedService') || 'cleaning';
        
        // Basic pricing calculation
        const basePrices = {
            'cleaning': 0.15,
            'pressure-washing': 0.08,
            'handyman': 0.25,
            'lawn-care': 0.05
        };
        
        const basePrice = basePrices[selectedService] || 0.15;
        const estimate = Math.round(size * basePrice);
        
        // Update quote display
        $('.quote-amount').text(`$${estimate}`);
        $('.quote-details').text(`Estimated cost for ${size} sq ft ${selectedService.replace('-', ' ')}`);
        
        console.log('💰 Price updated:', estimate);
    }
    
    function validateZipCode(zip) {
        console.log('📍 Validating ZIP:', zip);
        
        // Basic ZIP validation (you can enhance this with actual API)
        const validZips = ['12345', '90210', '10001', '94102']; // Example valid ZIPs
        const isValid = validZips.includes(zip) || zip.length === 5;
        
        const $zipInput = $('#zip-code');
        
        if (isValid) {
            $zipInput.css('border-color', '#28a745');
            showServiceAvailability(true);
        } else {
            $zipInput.css('border-color', '#dc3545');
            showServiceAvailability(false);
        }
    }
    
    function showServiceAvailability(available) {
        let message = available ? 
            '✅ Service available in your area!' : 
            '⚠️ Please check service availability';
        
        // Remove existing message
        $('.availability-message').remove();
        
        // Add new message
        const $message = $(`<div class="availability-message" style="
            margin-top: 0.5rem;
            padding: 0.5rem;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 600;
            color: ${available ? '#28a745' : '#dc3545'};
            background: ${available ? '#d4edda' : '#f8d7da'};
        ">${message}</div>`);
        
        $('#zip-code').parent().append($message);
    }
    
    // Smooth scrolling for mobile anchor links
    $('a[href^="#"]').off('click.mobile').on('click.mobile', function(e) {
        e.preventDefault();
        const target = $($(this).attr('href'));
        
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - 80
            }, 600);
        }
    });
    
    // Enhanced mobile menu for service pages
    $('.mobile-menu-toggle').off('click.service').on('click.service', function() {
        $('.mobile-menu').toggleClass('active');
        $(this).toggleClass('active');
        
        // Prevent body scroll when menu is open
        if ($('.mobile-menu').hasClass('active')) {
            $('body').css('overflow', 'hidden');
        } else {
            $('body').css('overflow', '');
        }
    });
    
    // Auto-hide mobile menu when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.mobile-menu, .mobile-menu-toggle').length) {
            $('.mobile-menu').removeClass('active');
            $('.mobile-menu-toggle').removeClass('active');
            $('body').css('overflow', '');
        }
    });
    
    // Resize handler
    $(window).on('resize', function() {
        if (window.innerWidth > 768) {
            // Reset mobile-specific states
            $('.mobile-menu').removeClass('active');
            $('.mobile-menu-toggle').removeClass('active');
            $('body').css('overflow', '');
        }
    });
    
    console.log('✅ Mobile quote calculator enhancement complete');
});
