/**
 * 🚨 NUCLEAR SUBMENU JAVASCRIPT FIX
 * Forces submenus to work no matter what
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('🚨 NUCLEAR SUBMENU FIX LOADING...');
    
    // Add class to body for success indicator
    document.body.classList.add('submenu-nuclear-fix');
    
    function forceSubmenuFix() {
        // Find all menu items with children
        const menuItems = document.querySelectorAll('.menu-item-has-children');
        
        menuItems.forEach(item => {
            const submenu = item.querySelector('.sub-menu');
            const link = item.querySelector('a');
            
            if (submenu && link) {
                console.log('🎯 Found submenu for:', link.textContent);
                
                // Force styles on submenu
                submenu.style.zIndex = '2147483647';
                submenu.style.position = 'absolute';
                submenu.style.background = '#0b1133';
                submenu.style.boxShadow = '0 20px 60px rgba(0,0,0,0.8)';
                submenu.style.border = '3px solid #ff5f00';
                submenu.style.minWidth = '250px';
                submenu.style.borderRadius = '5px';
                
                // Force hover events
                item.addEventListener('mouseenter', function() {
                    console.log('🖱️ Hovering over:', link.textContent);
                    submenu.style.opacity = '1';
                    submenu.style.visibility = 'visible';
                    submenu.style.display = 'block';
                    submenu.style.transform = 'translateY(0)';
                    submenu.style.pointerEvents = 'auto';
                });
                
                item.addEventListener('mouseleave', function() {
                    console.log('🖱️ Left:', link.textContent);
                    submenu.style.opacity = '0';
                    submenu.style.visibility = 'hidden';
                    submenu.style.transform = 'translateY(10px)';
                });
                
                // Force submenu links styling
                const submenuLinks = submenu.querySelectorAll('a');
                submenuLinks.forEach(subLink => {
                    subLink.style.color = 'white';
                    subLink.style.padding = '15px 20px';
                    subLink.style.display = 'block';
                    subLink.style.borderBottom = '1px solid rgba(255,255,255,0.2)';
                    subLink.style.transition = 'all 0.3s ease';
                    
                    subLink.addEventListener('mouseenter', function() {
                        this.style.background = '#ff5f00';
                        this.style.color = 'white';
                        this.style.paddingLeft = '25px';
                    });
                    
                    subLink.addEventListener('mouseleave', function() {
                        this.style.background = 'transparent';
                        this.style.color = 'white';
                        this.style.paddingLeft = '20px';
                    });
                });
            }
        });
        
        console.log('✅ Nuclear submenu fix applied to', menuItems.length, 'menu items');
    }
    
    // Apply fix immediately
    forceSubmenuFix();
    
    // Apply fix again after 500ms to catch any dynamic content
    setTimeout(forceSubmenuFix, 500);
    
    // Apply fix again after 1 second for stubborn themes
    setTimeout(forceSubmenuFix, 1000);
    
    // Monitor for new menu items
    const observer = new MutationObserver(function() {
        forceSubmenuFix();
    });
    
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
    
    console.log('🚀 NUCLEAR SUBMENU FIX ACTIVATED!');
});
