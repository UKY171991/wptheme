// Standard Bootstrap Menu Functionality
document.addEventListener('DOMContentLoaded', function() {
    
    // Mobile menu toggle functionality
    const mobileToggle = document.querySelector('.navbar-toggler');
    const mobileMenu = document.querySelector('.navbar-collapse');
    
    if (mobileToggle && mobileMenu) {
        mobileToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('show');
            const isExpanded = mobileMenu.classList.contains('show');
            mobileToggle.setAttribute('aria-expanded', isExpanded);
        });
    }
    
    // Dropdown functionality
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    
    dropdownToggles.forEach(function(toggle) {
        toggle.addEventListener('click', function(e) {
            // Only prevent default on mobile
            if (window.innerWidth < 992) {
                e.preventDefault();
                
                const dropdown = this.closest('.dropdown');
                const menu = dropdown.querySelector('.dropdown-menu');
                
                if (menu) {
                    // Close other dropdowns
                    document.querySelectorAll('.dropdown-menu.show').forEach(function(openMenu) {
                        if (openMenu !== menu) {
                            openMenu.classList.remove('show');
                        }
                    });
                    
                    // Toggle current dropdown
                    menu.classList.toggle('show');
                    this.setAttribute('aria-expanded', menu.classList.contains('show'));
                }
            }
        });
    });
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.dropdown')) {
            document.querySelectorAll('.dropdown-menu.show').forEach(function(menu) {
                menu.classList.remove('show');
                const toggle = menu.previousElementSibling;
                if (toggle && toggle.classList.contains('dropdown-toggle')) {
                    toggle.setAttribute('aria-expanded', 'false');
                }
            });
        }
    });
    
    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 992) {
            // Close mobile menu on desktop
            if (mobileMenu) {
                mobileMenu.classList.remove('show');
            }
            if (mobileToggle) {
                mobileToggle.setAttribute('aria-expanded', 'false');
            }
            
            // Reset dropdown states
            document.querySelectorAll('.dropdown-menu.show').forEach(function(menu) {
                menu.classList.remove('show');
            });
        }
    });
});