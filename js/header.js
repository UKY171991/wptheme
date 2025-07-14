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
        if (subMenuParents) {
            subMenuParents.forEach(function(parent) {
                const link = parent.querySelector('a');
                if (link) {
                    link.addEventListener('click', function(e) {
                        if (window.innerWidth <= 768) {
                            e.preventDefault();
                            parent.classList.toggle('show-submenu');
                        }
                    });
                }
            });
        }
    }
});
        });
    
    if (menuToggle && mainNav) {
        // Toggle menu on button click
        menuToggle.addEventListener('click', function() {
            if (mainNav.classList.contains('active')) {
                closeMenu();
            } else {
                openMenu();
            }
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.main-navigation') && navMenu.classList.contains('active')) {
                navMenu.classList.remove('active');
                menuToggle.setAttribute('aria-expanded', 'false');
            }
        });

        // Close menu when clicking overlay
        menuOverlay.addEventListener('click', closeMenu);

        // Handle submenu toggles on mobile
        subMenuParents.forEach(parent => {
            if (window.innerWidth <= 768) {
                const link = parent.querySelector('a');
                const submenu = parent.querySelector('.submenu');
                
                if (link && submenu) {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        submenu.style.display = 
                            submenu.style.display === 'block' ? 'none' : 'block';
                    });
                }
            }
        });

        // Close menu on escape key
        document.addEventListener('keyup', function(e) {
            if (e.key === 'Escape' && mainNav.classList.contains('active')) {
                closeMenu();
            }
        });

        // Handle window resize
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                if (window.innerWidth > 768) {
                    closeMenu();
                    // Reset any submenu displays
                    document.querySelectorAll('.submenu').forEach(submenu => {
                        submenu.style.display = '';
                    });
                }
            }, 250);
        });
    }

    // Add smooth scroll offset for sticky header
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const headerHeight = document.querySelector('.site-header').offsetHeight;
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset;
                window.scrollTo({
                    top: targetPosition - headerHeight,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Add touch support for submenus on mobile
    if ('ontouchstart' in window) {
        document.querySelectorAll('.menu-item-has-children > a').forEach(link => {
            link.addEventListener('touchstart', function(e) {
                const parent = this.parentNode;
                if (window.innerWidth <= 768) {
                    if (!parent.classList.contains('touch-active')) {
                        e.preventDefault();
                        document.querySelectorAll('.touch-active').forEach(item => {
                            if (item !== parent) {
                                item.classList.remove('touch-active');
                            }
                        });
                        parent.classList.add('touch-active');
                    }
                }
            });
        });
    }
});
