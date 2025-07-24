/**
 * Main JavaScript file for Services Pro theme
 * Enhanced with Bootstrap 5 support and multi-level dropdown functionality
 */

jQuery(document).ready(function($) {
    
    // Initialize Bootstrap components
    initializeBootstrapComponents();
    
    // Enhanced multi-level dropdown support
    initializeMultiLevelDropdowns();
    
    // Accessibility improvements
    initializeAccessibility();
    
    // Smooth scroll for anchor links
    initializeSmoothScroll();
    
    // Animation on scroll
    initializeScrollAnimations();
    
    /**
     * Initialize Bootstrap components
     */
    function initializeBootstrapComponents() {
        // Initialize all Bootstrap tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        
        // Initialize all Bootstrap popovers
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl);
        });
    }
    
    /**
     * Enhanced multi-level dropdown functionality
     */
    function initializeMultiLevelDropdowns() {
        // Handle multi-level dropdowns on desktop (hover)
        $('.dropdown-submenu').on('mouseenter', function() {
            if ($(window).width() > 991) {
                var $submenu = $(this).children('.dropdown-menu');
                $submenu.addClass('show');
                
                // Position submenu to prevent going off-screen
                positionSubmenu($submenu);
            }
        }).on('mouseleave', function() {
            if ($(window).width() > 991) {
                $(this).children('.dropdown-menu').removeClass('show');
            }
        });
        
        // Handle dropdown clicks on mobile
        $('.dropdown-submenu > a').on('click', function(e) {
            if ($(window).width() <= 991) {
                e.preventDefault();
                e.stopPropagation();
                
                var $parent = $(this).parent();
                var $submenu = $parent.children('.dropdown-menu');
                
                // Toggle current submenu
                $submenu.toggleClass('show');
                $parent.toggleClass('open');
                
                // Close other submenus at the same level
                $parent.siblings('.dropdown-submenu').children('.dropdown-menu').removeClass('show');
                $parent.siblings('.dropdown-submenu').removeClass('open');
            }
        });
        
        // Prevent dropdown from closing when clicking inside submenu
        $('.dropdown-menu').on('click', function(e) {
            e.stopPropagation();
        });
        
        // Close all dropdowns when clicking outside
        $(document).on('click', function() {
            $('.dropdown-menu').removeClass('show');
            $('.dropdown-submenu').removeClass('open');
        });
        
        // Handle window resize
        $(window).on('resize', function() {
            if ($(window).width() > 991) {
                // Reset mobile styles on desktop
                $('.dropdown-submenu').removeClass('open');
                $('.dropdown-submenu .dropdown-menu').removeClass('show');
            }
        });
    }
    
    /**
     * Position submenu to prevent going off-screen
     */
    function positionSubmenu($submenu) {
        var submenuOffset = $submenu.offset();
        var submenuWidth = $submenu.outerWidth();
        var windowWidth = $(window).width();
        
        // Check if submenu goes off right edge
        if (submenuOffset.left + submenuWidth > windowWidth) {
            $submenu.addClass('dropdown-menu-left');
        } else {
            $submenu.removeClass('dropdown-menu-left');
        }
    }
    
    /**
     * Accessibility improvements
     */
    function initializeAccessibility() {
        // Keyboard navigation for dropdowns
        $('.navbar-nav .nav-link').on('keydown', function(e) {
            var $this = $(this);
            var $parent = $this.parent();
            var $dropdown = $parent.find('.dropdown-menu');
            
            switch(e.which) {
                case 13: // Enter key
                case 32: // Space key
                    if ($parent.hasClass('dropdown')) {
                        e.preventDefault();
                        $dropdown.toggleClass('show');
                        $dropdown.find('a:first').focus();
                    }
                    break;
                case 27: // Escape key
                    $dropdown.removeClass('show');
                    $this.focus();
                    break;
                case 40: // Down arrow
                    if ($parent.hasClass('dropdown') && $dropdown.hasClass('show')) {
                        e.preventDefault();
                        $dropdown.find('a:first').focus();
                    }
                    break;
            }
        });
        
        // Keyboard navigation within dropdowns
        $('.dropdown-menu a').on('keydown', function(e) {
            var $this = $(this);
            var $items = $this.closest('.dropdown-menu').find('a');
            var currentIndex = $items.index($this);
            
            switch(e.which) {
                case 38: // Up arrow
                    e.preventDefault();
                    if (currentIndex > 0) {
                        $items.eq(currentIndex - 1).focus();
                    } else {
                        $this.closest('.dropdown').find('.nav-link').focus();
                    }
                    break;
                case 40: // Down arrow
                    e.preventDefault();
                    if (currentIndex < $items.length - 1) {
                        $items.eq(currentIndex + 1).focus();
                    }
                    break;
                case 27: // Escape key
                    e.preventDefault();
                    $this.closest('.dropdown-menu').removeClass('show');
                    $this.closest('.dropdown').find('.nav-link').focus();
                    break;
            }
        });
        
        // Focus management for screen readers
        $('.nav-link[data-bs-toggle="dropdown"]').on('click', function() {
            var $dropdown = $(this).siblings('.dropdown-menu');
            if ($dropdown.hasClass('show')) {
                setTimeout(function() {
                    $dropdown.find('a:first').focus();
                }, 100);
            }
        });
    }
    
    /**
     * Smooth scroll for anchor links
     */
    function initializeSmoothScroll() {
        $('a[href*="#"]:not([href="#"]):not([data-bs-toggle])').on('click', function(e) {
            var target = $(this.hash);
            if (target.length) {
                e.preventDefault();
                var offsetTop = target.offset().top - $('.site-header').outerHeight() - 20;
                
                $('html, body').animate({
                    scrollTop: offsetTop
                }, 800, 'swing');
            }
        });
    }
    
    /**
     * Animation on scroll
     */
    function initializeScrollAnimations() {
        // Add animation class when elements come into view
        function checkForAnimation() {
            $('.fade-in-up').each(function() {
                var elementTop = $(this).offset().top;
                var elementBottom = elementTop + $(this).outerHeight();
                var viewportTop = $(window).scrollTop();
                var viewportBottom = viewportTop + $(window).height();
                
                if (elementBottom > viewportTop && elementTop < viewportBottom) {
                    $(this).addClass('animate');
                }
            });
        }
        
        // Check on scroll and load
        $(window).on('scroll', throttle(checkForAnimation, 100));
        checkForAnimation();
    }
    
    /**
     * Throttle function for performance
     */
    function throttle(func, limit) {
        var inThrottle;
        return function() {
            var args = arguments;
            var context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(function() {
                    inThrottle = false;
                }, limit);
            }
        };
    }
    
    /**
     * Handle contact forms and other form interactions
     */
    function initializeForms() {
        // Add Bootstrap validation classes
        $('form').on('submit', function(e) {
            var $form = $(this);
            var isValid = true;
            
            // Basic validation
            $form.find('input[required], textarea[required], select[required]').each(function() {
                var $field = $(this);
                if (!$field.val().trim()) {
                    $field.addClass('is-invalid');
                    isValid = false;
                } else {
                    $field.removeClass('is-invalid').addClass('is-valid');
                }
            });
            
            // Email validation
            $form.find('input[type="email"]').each(function() {
                var $field = $(this);
                var email = $field.val();
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                
                if (email && !emailRegex.test(email)) {
                    $field.addClass('is-invalid');
                    isValid = false;
                } else if (email) {
                    $field.removeClass('is-invalid').addClass('is-valid');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                // Focus on first invalid field
                $form.find('.is-invalid:first').focus();
            }
        });
        
        // Remove validation classes on input
        $('input, textarea, select').on('input change', function() {
            $(this).removeClass('is-invalid is-valid');
        });
    }
    
    // Initialize forms
    initializeForms();
    
    /**
     * Back to top button
     */
    function initializeBackToTop() {
        // Create back to top button if it doesn't exist
        if ($('#back-to-top').length === 0) {
            $('body').append('<button id="back-to-top" class="btn btn-accent btn-floating" title="Back to Top" aria-label="Back to Top"><i class="fas fa-arrow-up"></i></button>');
        }
        
        var $backToTop = $('#back-to-top');
        
        // Show/hide button based on scroll position
        $(window).on('scroll', throttle(function() {
            if ($(window).scrollTop() > 300) {
                $backToTop.addClass('show');
            } else {
                $backToTop.removeClass('show');
            }
        }, 100));
        
        // Smooth scroll to top
        $backToTop.on('click', function() {
            $('html, body').animate({
                scrollTop: 0
            }, 800, 'swing');
        });
    }
    
    // Initialize back to top
    initializeBackToTop();
    
    /**
     * Image lazy loading fallback for older browsers
     */
    function initializeLazyLoading() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });
            
            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    }
    
    // Initialize lazy loading
    initializeLazyLoading();
});

/**
 * CSS for additional functionality
 */
jQuery(document).ready(function($) {
    // Add CSS for back to top button and other dynamic elements
    var dynamicCSS = `
        <style id="dynamic-theme-styles">
            #back-to-top {
                position: fixed;
                bottom: 20px;
                right: 20px;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 1000;
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            }
            
            #back-to-top.show {
                opacity: 1;
                visibility: visible;
            }
            
            #back-to-top:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            }
            
            .dropdown-menu-left {
                left: -100% !important;
                right: auto !important;
            }
            
            .btn-floating {
                border: none;
                font-size: 1.2rem;
            }
            
            @media (max-width: 575.98px) {
                #back-to-top {
                    bottom: 15px;
                    right: 15px;
                    width: 45px;
                    height: 45px;
                }
            }
        </style>
    `;
    
    if ($('#dynamic-theme-styles').length === 0) {
        $('head').append(dynamicCSS);
    }
});
