document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const mainNav = document.querySelector('.main-navigation');
    const menuOverlay = document.querySelector('.menu-overlay');
    const subMenuParents = document.querySelectorAll('.menu-item-has-children');
    
    // Function to close menu
    function closeMenu() {
        mainNav.classList.remove('active');
        menuToggle.classList.remove('active');
        menuOverlay.classList.remove('active');
        menuToggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    }
    
    // Function to open menu
    function openMenu() {
        mainNav.classList.add('active');
        menuToggle.classList.add('active');
        menuOverlay.classList.add('active');
        menuToggle.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    }
    
    if (menuToggle && mainNav && menuOverlay) {
        // Toggle menu on button click
        menuToggle.addEventListener('click', function() {
            if (mainNav.classList.contains('active')) {
                closeMenu();
            } else {
                openMenu();
            }
        });
        
        // Close menu when clicking overlay
        menuOverlay.addEventListener('click', closeMenu);
        
        // Close menu on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mainNav.classList.contains('active')) {
                closeMenu();
            }
        });

        // Handle submenu toggles on mobile
        if (window.innerWidth <= 768) {
            subMenuParents.forEach(function(parent) {
                const link = parent.querySelector('a');
                if (link) {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        const submenu = this.nextElementSibling;
                        if (submenu) {
                            if (submenu.style.display === 'block') {
                                submenu.style.display = 'none';
                            } else {
                                // Close other open submenus
                                subMenuParents.forEach(function(otherParent) {
                                    if (otherParent !== parent) {
                                        const otherSubmenu = otherParent.querySelector('.submenu');
                                        if (otherSubmenu) {
                                            otherSubmenu.style.display = 'none';
                                        }
                                    }
                                });
                                submenu.style.display = 'block';
                            }
                        }
                    });
                }
            });
        }
    }

    // Handle window resize
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            if (window.innerWidth > 768) {
                closeMenu();
                document.body.style.overflow = '';
                // Reset submenu displays
                document.querySelectorAll('.submenu').forEach(function(submenu) {
                    submenu.style.display = '';
                });
            }
        }, 250);
    });
});
