// Simple Dropdown Fix
document.addEventListener('DOMContentLoaded', function() {
    // Desktop hover behavior
    if (window.innerWidth >= 992) {
        const dropdowns = document.querySelectorAll('.dropdown');
        
        dropdowns.forEach(function(dropdown) {
            const menu = dropdown.querySelector('.dropdown-menu');
            
            if (menu) {
                dropdown.addEventListener('mouseenter', function() {
                    menu.classList.add('show');
                });
                
                dropdown.addEventListener('mouseleave', function() {
                    menu.classList.remove('show');
                });
            }
        });
        
        // Submenu hover behavior
        const submenus = document.querySelectorAll('.dropdown-submenu');
        
        submenus.forEach(function(submenu) {
            const menu = submenu.querySelector('.dropdown-menu');
            
            if (menu) {
                submenu.addEventListener('mouseenter', function() {
                    menu.classList.add('show');
                });
                
                submenu.addEventListener('mouseleave', function() {
                    menu.classList.remove('show');
                });
            }
        });
    }
    
    // Mobile click behavior
    const mobileToggles = document.querySelectorAll('.dropdown-toggle');
    
    mobileToggles.forEach(function(toggle) {
        toggle.addEventListener('click', function(e) {
            if (window.innerWidth < 992) {
                e.preventDefault();
                
                const menu = this.nextElementSibling;
                if (menu && menu.classList.contains('dropdown-menu')) {
                    menu.classList.toggle('show');
                }
            }
        });
    });
});