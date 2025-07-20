/**
 * Menu Verification Script
 * Run this in the browser console to verify menu functionality
 */

function verifyMenuImplementation() {
    console.log('%c Menu Verification Script ', 'background: #667eea; color: white; padding: 5px; border-radius: 5px;');
    
    // Check if required elements exist
    const checks = {
        menuExists: $('.main-navigation').length > 0,
        menuToggleExists: $('.menu-toggle').length > 0,
        navMenuExists: $('.nav-menu').length > 0,
        menuItemsWithChildrenExist: $('.menu-item-has-children').length > 0,
        submenusExist: $('.sub-menu').length > 0,
        nestedSubmenusExist: $('.sub-menu .sub-menu').length > 0,
        deepNestedSubmenusExist: $('.sub-menu .sub-menu .sub-menu').length > 0,
        overlayExists: $('.mobile-nav-overlay').length > 0,
        submenuTogglesExist: $('.submenu-toggle').length > 0
    };
    
    // Log results
    console.log('%c Element Checks ', 'background: #333; color: white; padding: 3px;');
    Object.keys(checks).forEach(key => {
        const status = checks[key] ? '✅' : '❌';
        console.log(`${status} ${key}: ${checks[key]}`);
    });
    
    // Check CSS loading
    console.log('%c CSS Checks ', 'background: #333; color: white; padding: 3px;');
    const cssFiles = [
        'enhanced-menu.css',
        'menu-fixes.css',
        'final-menu-fixes.css',
        'layout-improvements.css'
    ];
    
    cssFiles.forEach(file => {
        const isLoaded = Array.from(document.styleSheets).some(sheet => {
            try {
                return sheet.href && sheet.href.includes(file);
            } catch (e) {
                return false;
            }
        });
        
        const status = isLoaded ? '✅' : '❌';
        console.log(`${status} ${file}: ${isLoaded}`);
    });
    
    // Check JavaScript loading
    console.log('%c JavaScript Checks ', 'background: #333; color: white; padding: 3px;');
    const jsChecks = {
        enhancedMenuInitialized: typeof window.menuInitialized !== 'undefined',
        multilevelFixInitialized: typeof window.menuMultilevelInitialized !== 'undefined',
        debugFunctionAvailable: typeof window.debugMultilevelMenu === 'function'
    };
    
    Object.keys(jsChecks).forEach(key => {
        const status = jsChecks[key] ? '✅' : '❌';
        console.log(`${status} ${key}: ${jsChecks[key]}`);
    });
    
    // Check menu functionality
    console.log('%c Functionality Checks ', 'background: #333; color: white; padding: 3px;');
    
    // Check if submenus are properly hidden by default
    const submenuHidden = $('.sub-menu').css('visibility') === 'hidden' || 
                          $('.sub-menu').css('opacity') === '0' || 
                          $('.sub-menu').css('display') === 'none';
    console.log(`${submenuHidden ? '✅' : '❌'} Submenus hidden by default: ${submenuHidden}`);
    
    // Check if mobile menu toggle works
    const mobileToggleWorks = $('.menu-toggle').length > 0 && 
                             typeof $('.menu-toggle').attr('aria-expanded') !== 'undefined';
    console.log(`${mobileToggleWorks ? '✅' : '❌'} Mobile toggle has ARIA attributes: ${mobileToggleWorks}`);
    
    // Check if menu items with children have proper ARIA attributes
    const ariaAttributes = $('.menu-item-has-children > a').attr('aria-haspopup') === 'true';
    console.log(`${ariaAttributes ? '✅' : '❌'} Menu items have ARIA attributes: ${ariaAttributes}`);
    
    // Check responsive behavior
    console.log('%c Responsive Checks ', 'background: #333; color: white; padding: 3px;');
    const isMobile = window.innerWidth <= 768;
    console.log(`Current viewport width: ${window.innerWidth}px (${isMobile ? 'Mobile' : 'Desktop'} view)`);
    
    if (isMobile) {
        console.log(`✅ Menu toggle visible: ${$('.menu-toggle').is(':visible')}`);
        console.log(`✅ Desktop menu hidden: ${!$('.main-navigation:not(.mobile-active)').is(':visible')}`);
    } else {
        console.log(`✅ Menu toggle hidden: ${!$('.menu-toggle').is(':visible')}`);
        console.log(`✅ Desktop menu visible: ${$('.main-navigation').is(':visible')}`);
    }
    
    // Check for potential issues
    console.log('%c Potential Issues ', 'background: #333; color: white; padding: 3px;');
    
    // Check for z-index issues
    const menuZIndex = parseInt($('.main-navigation').css('z-index')) || 0;
    const submenuZIndex = parseInt($('.sub-menu').css('z-index')) || 0;
    
    if (menuZIndex < 100) {
        console.warn(`⚠️ Main navigation z-index is low: ${menuZIndex}`);
    } else {
        console.log(`✅ Main navigation z-index is good: ${menuZIndex}`);
    }
    
    if (submenuZIndex <= menuZIndex) {
        console.warn(`⚠️ Submenu z-index (${submenuZIndex}) should be higher than menu z-index (${menuZIndex})`);
    } else {
        console.log(`✅ Submenu z-index is properly higher: ${submenuZIndex}`);
    }
    
    // Check for CSS conflicts
    const menuDisplay = $('.main-navigation').css('display');
    if (menuDisplay === 'none' && !isMobile) {
        console.warn('⚠️ Main navigation is hidden on desktop. Check for CSS conflicts.');
    }
    
    // Check for proper submenu positioning
    const submenuPosition = $('.sub-menu').css('position');
    if (submenuPosition !== 'absolute') {
        console.warn(`⚠️ Submenus should be absolutely positioned, but found: ${submenuPosition}`);
    } else {
        console.log(`✅ Submenus are properly positioned: ${submenuPosition}`);
    }
    
    // Final summary
    console.log('%c Summary ', 'background: #667eea; color: white; padding: 5px; border-radius: 5px;');
    
    const passedChecks = Object.values(checks).filter(Boolean).length;
    const totalChecks = Object.values(checks).length;
    
    console.log(`Passed ${passedChecks} out of ${totalChecks} element checks`);
    
    if (passedChecks === totalChecks) {
        console.log('%c All menu elements are properly implemented! 🎉', 'color: green; font-weight: bold;');
    } else {
        console.log('%c Some menu elements are missing. Check the details above. ⚠️', 'color: orange; font-weight: bold;');
    }
    
    // Provide helpful tips
    console.log('%c Helpful Tips ', 'background: #333; color: white; padding: 3px;');
    console.log('1. To debug menu issues, run: debugMultilevelMenu()');
    console.log('2. To test mobile menu, resize browser to width < 768px');
    console.log('3. To test keyboard navigation, press Tab to navigate and Arrow keys to open submenus');
    console.log('4. To check accessibility, use a screen reader or the Accessibility tab in browser DevTools');
}

// Run verification
verifyMenuImplementation();