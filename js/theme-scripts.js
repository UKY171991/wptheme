/**
 * Enhanced Navigation JavaScript
 * Handles multi-level dropdown navigation and mobile menu behavior
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Multi-level dropdown handling
    const dropdownSubmenus = document.querySelectorAll('.dropdown-submenu');
    
    dropdownSubmenus.forEach(function(submenu) {
        // Handle hover events for desktop
        submenu.addEventListener('mouseenter', function() {
            if (window.innerWidth > 991) {
                const dropdown = this.querySelector('.dropdown-menu');
                if (dropdown) {
                    dropdown.style.display = 'block';
                    this.classList.add('show');
                }
            }
        });
        
        submenu.addEventListener('mouseleave', function() {
            if (window.innerWidth > 991) {
                const dropdown = this.querySelector('.dropdown-menu');
                if (dropdown) {
                    dropdown.style.display = 'none';
                    this.classList.remove('show');
                }
            }
        });
        
        // Handle click events for mobile and desktop
        const submenuToggle = submenu.querySelector('a.dropdown-toggle');
        if (submenuToggle) {
            submenuToggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const dropdown = submenu.querySelector('.dropdown-menu');
                if (dropdown) {
                    const isVisible = dropdown.classList.contains('show');
                    
                    // Close all other dropdowns at same level
                    const sameLevel = submenu.parentNode.querySelectorAll('.dropdown-submenu .dropdown-menu');
                    sameLevel.forEach(function(otherDropdown) {
                        if (otherDropdown !== dropdown) {
                            otherDropdown.classList.remove('show');
                            otherDropdown.style.display = 'none';
                        }
                    });
                    
                    // Toggle current dropdown
                    dropdown.classList.toggle('show', !isVisible);
                    dropdown.style.display = isVisible ? 'none' : 'block';
                    submenu.classList.toggle('show', !isVisible);
                }
            });
        }
    });
    
    // Enhanced mobile menu behavior
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    
    if (navbarToggler && navbarCollapse) {
        navbarToggler.addEventListener('click', function() {
            // Close all open dropdowns when menu is toggled
            const openDropdowns = navbarCollapse.querySelectorAll('.dropdown-menu.show');
            openDropdowns.forEach(function(dropdown) {
                dropdown.classList.remove('show');
                dropdown.style.display = 'none';
            });
        });
    }
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(e) {
        if (window.innerWidth <= 991) {
            const navbar = document.querySelector('.navbar');
            if (navbar && !navbar.contains(e.target)) {
                const openCollapse = document.querySelector('.navbar-collapse.show');
                if (openCollapse) {
                    const bsCollapse = new bootstrap.Collapse(openCollapse, {
                        toggle: false
                    });
                    bsCollapse.hide();
                }
            }
        }
    });
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.dropdown-submenu')) {
            dropdownSubmenus.forEach(function(submenu) {
                const dropdown = submenu.querySelector('.dropdown-menu');
                if (dropdown) {
                    dropdown.style.display = 'none';
                    submenu.classList.remove('show');
                }
            });
        }
    });
    
    // Handle window resize
    window.addEventListener('resize', function() {
        dropdownSubmenus.forEach(function(submenu) {
            const dropdown = submenu.querySelector('.dropdown-menu');
            if (dropdown) {
                if (window.innerWidth > 991) {
                    dropdown.style.display = 'none';
                    submenu.classList.remove('show');
                }
            }
        });
    });
    
    // Smooth scrolling for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                const headerHeight = document.querySelector('.site-header').offsetHeight;
                const targetPosition = target.offsetTop - headerHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Add fade-in animation on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
            }
        });
    }, observerOptions);
    
    // Observe elements with fade-in classes
    const fadeElements = document.querySelectorAll('.fade-in-up, .fade-in-left, .fade-in-right');
    fadeElements.forEach(function(element) {
        observer.observe(element);
    });
    
    // Mobile menu close on link click
    const mobileNavLinks = document.querySelectorAll('.navbar-collapse .nav-link');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    
    mobileNavLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 991 && navbarCollapse.classList.contains('show')) {
                const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                bsCollapse.hide();
            }
        });
    });
});

// Contact form handling (if present)
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.querySelector('#contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Basic form validation
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(function(field) {
                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    isValid = false;
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            
            if (isValid) {
                // Show success message (you can implement actual form submission here)
                const submitButton = this.querySelector('button[type="submit"]');
                const originalText = submitButton.innerHTML;
                
                submitButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';
                submitButton.disabled = true;
                
                setTimeout(function() {
                    submitButton.innerHTML = '<i class="fas fa-check me-2"></i>Message Sent!';
                    submitButton.classList.remove('btn-accent');
                    submitButton.classList.add('btn-success');
                    
                    setTimeout(function() {
                        submitButton.innerHTML = originalText;
                        submitButton.disabled = false;
                        submitButton.classList.remove('btn-success');
                        submitButton.classList.add('btn-accent');
                        contactForm.reset();
                    }, 2000);
                }, 1500);
            }
        });
    }
});
