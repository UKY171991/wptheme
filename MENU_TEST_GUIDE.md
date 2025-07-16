# Menu Functionality Test Guide

## Quick Test Instructions

### Mobile Menu Test (Screen width ≤ 768px)
1. **Open website on mobile device or resize browser window to mobile size**
2. **Look for hamburger menu (3 lines) in top right** - Should be visible with golden background
3. **Click hamburger menu** - Should open full-screen menu with purple gradient
4. **Test submenu** - Click on "Services" (has dropdown arrow) - Should expand with + changing to -
5. **Test nested submenu** - If any submenu items have arrows, click them for third level
6. **Close menu** - Click hamburger again or click background overlay

### Desktop Submenu Test (Screen width > 768px)
1. **Hover over "Services" menu item** - Should show dropdown with purple gradient background
2. **Hover over submenu items with arrows** - Should show nested submenus to the right
3. **Test edge positioning** - Hover items near screen edge - Submenus should auto-position to stay visible
4. **Test keyboard navigation** - Use Tab and Arrow keys to navigate menus

### Debug Console Commands
Open browser console (F12) and run:
```javascript
// Check if menu is properly initialized
debugBlueprintMenu()

// Force reinitialize if needed
window.blueprintMenuInitialized = false;
location.reload();
```

## Expected Behaviors

### Mobile Menu (≤768px)
- ✅ Hamburger button visible and clickable
- ✅ Full-screen menu overlay opens smoothly
- ✅ Menu items stack vertically
- ✅ Submenu items expand/collapse with + and - indicators
- ✅ Nested submenus (third level) work properly
- ✅ Menu closes when clicking outside or pressing Escape
- ✅ Body scroll locked when menu is open

### Desktop Menu (>768px)
- ✅ Horizontal navigation bar
- ✅ Dropdown submenus appear on hover
- ✅ Multi-level nested submenus work
- ✅ Auto-positioning prevents screen overflow
- ✅ Smooth animations and transitions
- ✅ Keyboard navigation support

### Common Issues & Solutions

**Issue: Mobile menu button not visible**
- Check CSS is loaded properly
- Verify screen width detection
- Run `debugBlueprintMenu()` in console

**Issue: Submenus not opening**
- Check for JavaScript errors in console
- Verify jQuery is loaded
- Test with `$('.menu-item-has-children').length` in console

**Issue: Menu conflicts**
- Old menu-toggle.js is disabled in functions.php
- Enhanced version has priority with version 1.1
- Clear browser cache and reload

## File Locations
- CSS: `/submenu-responsive-fixes.css`
- JavaScript: `/js/enhanced-mobile-menu.js`
- PHP: Updated `functions.php` enqueue order

## Browser Compatibility
- ✅ Chrome (Latest)
- ✅ Firefox (Latest)
- ✅ Safari (Latest)
- ✅ Edge (Latest)
- ✅ Mobile Safari (iOS)
- ✅ Chrome Mobile (Android)
