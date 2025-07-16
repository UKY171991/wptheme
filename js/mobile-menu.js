document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const mainNav = document.querySelector('.main-navigation');
    const menuOverlay = document.querySelector('.menu-overlay');
    const subMenuParents = document.querySelectorAll('.menu-item-has-children');
    
    // Function to close menu
    function closeMenu() {
        if (mainNav && menuToggle && menuOverlay) {
            mainNav.classList.remove('active');
            menuToggle.classList.remove('active');
            menuOverlay.classList.remove('active');
            menuToggle.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
        }
    }
    
    // Function to open menu
    function openMenu() {
        if (mainNav && menuToggle && menuOverlay) {
            mainNav.classList.add('active');
            menuToggle.classList.add('active');
            menuOverlay.classList.add('active');
            menuToggle.setAttribute('aria-expanded', 'true');
            document.body.style.overflow = 'hidden';
        }
    }
    
    if (menuToggle && mainNav && menuOverlay) {
        // Toggle menu on button click
        menuToggle.addEventListener('click', function(e) {
            e.preventDefault();
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
        
        // Handle submenu toggles on mobile - simplified without arrows
        if (window.innerWidth <= 768) {
            subMenuParents.forEach(function(parent) {
                const link = parent.querySelector('a');
                const submenu = parent.querySelector('.sub-menu, .submenu');
                
                if (link && submenu) {
                    // Create a simple toggle indicator
                    const toggleIndicator = document.createElement('span');
                    toggleIndicator.className = 'submenu-toggle';
                    toggleIndicator.textContent = '+';
                    toggleIndicator.style.cssText = `
                        position: absolute;
                        right: 15px;
                        top: 50%;
                        transform: translateY(-50%);
                        font-weight: bold;
                        font-size: 1.2rem;
                        cursor: pointer;
                        transition: transform 0.3s ease;
                    `;
                    
                    // Add position relative to parent link
                    link.style.position = 'relative';
                    link.appendChild(toggleIndicator);
                    
                    toggleIndicator.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        
                        const isOpen = submenu.style.display === 'block';
                        
                        // Close all other submenus
                        subMenuParents.forEach(function(otherParent) {
                            const otherSubmenu = otherParent.querySelector('.sub-menu, .submenu');
                            const otherToggle = otherParent.querySelector('.submenu-toggle');
                            if (otherSubmenu && otherSubmenu !== submenu) {
                                otherSubmenu.style.display = 'none';
                                if (otherToggle) {
                                    otherToggle.textContent = '+';
                                    otherToggle.style.transform = 'translateY(-50%) rotate(0deg)';
                                }
                            }
                        });
                        
                        // Toggle current submenu
                        if (isOpen) {
                            submenu.style.display = 'none';
                            toggleIndicator.textContent = '+';
                            toggleIndicator.style.transform = 'translateY(-50%) rotate(0deg)';
                        } else {
                            submenu.style.display = 'block';
                            toggleIndicator.textContent = '−';
                            toggleIndicator.style.transform = 'translateY(-50%) rotate(180deg)';
                        }
                        
                        console.log('Submenu toggled:', isOpen ? 'closed' : 'opened');
                    });
                    
                    // Prevent link navigation on touch devices when submenu exists
                    link.addEventListener('click', function(e) {
                        if (window.innerWidth <= 768) {
                            e.preventDefault();
                        }
                    });
                }
            });
        }
        
        // Handle window resize
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                if (window.innerWidth > 768) {
                    closeMenu();
                    // Reset submenu displays
                    document.querySelectorAll('.submenu').forEach(function(submenu) {
                        submenu.style.display = '';
                    });
                }
            }, 250);
        });
    }
});
