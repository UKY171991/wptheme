/**
 * Home Page Header Scroll Behavior
 * Adds scroll effects to fixed header on homepage
 */

document.addEventListener('DOMContentLoaded', function() {
    // Only run on front page
    if (!document.body.classList.contains('home') && !document.body.classList.contains('front-page')) {
        return;
    }

    const header = document.querySelector('.site-header');
    if (!header) return;

    let lastScrollTop = 0;
    let scrolled = false;

    function handleScroll() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Add/remove scrolled class based on scroll position
        if (scrollTop > 50 && !scrolled) {
            document.body.classList.add('scrolled');
            scrolled = true;
        } else if (scrollTop <= 50 && scrolled) {
            document.body.classList.remove('scrolled');
            scrolled = false;
        }

        lastScrollTop = scrollTop;
    }

    // Throttle scroll events for better performance
    let ticking = false;
    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(handleScroll);
            ticking = true;
        }
    }

    window.addEventListener('scroll', function() {
        requestTick();
        ticking = false;
    });

    // Initial check
    handleScroll();
});

/**
 * Enhanced Dropdown Positioning for Fixed Header
 */
document.addEventListener('DOMContentLoaded', function() {
    // Only run on front page
    if (!document.body.classList.contains('home') && !document.body.classList.contains('front-page')) {
        return;
    }

    const menuItems = document.querySelectorAll('.nav-menu .menu-item');
    
    menuItems.forEach(function(item) {
        const submenu = item.querySelector('.sub-menu');
        if (!submenu) return;

        item.addEventListener('mouseenter', function() {
            // Small delay to ensure proper positioning
            setTimeout(function() {
                const rect = submenu.getBoundingClientRect();
                const viewportHeight = window.innerHeight;
                
                // If dropdown would go off screen, add class for repositioning
                if (rect.bottom > viewportHeight) {
                    submenu.classList.add('dropdown-up');
                } else {
                    submenu.classList.remove('dropdown-up');
                }
            }, 10);
        });

        item.addEventListener('mouseleave', function() {
            submenu.classList.remove('dropdown-up');
        });
    });
});
