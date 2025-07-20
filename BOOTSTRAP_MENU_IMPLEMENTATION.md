# Bootstrap Menu Implementation Guide

## Overview
This guide explains how the Bootstrap-based menu system has been implemented in the Blueprint WordPress theme, with a focus on multilevel dropdown functionality, accessibility, and responsive behavior.

## Key Features

### 1. Bootstrap Integration
- **Bootstrap 5.3.0**: Latest version of Bootstrap for modern, responsive design
- **Bootstrap Navbar**: Fully responsive navigation header with support for branding, navigation, and more
- **Bootstrap Dropdown**: Enhanced dropdown menus with multilevel support
- **Bootstrap Bundle JS**: Includes all required JavaScript components for dropdowns, collapse, etc.

### 2. Multilevel Menu Support
- **Unlimited Nesting**: Support for unlimited menu depth
- **Dropdown Submenu**: Custom implementation for nested dropdowns beyond Bootstrap's default
- **Auto-positioning**: Detects screen edges and repositions dropdowns to prevent overflow
- **Visual Indicators**: Arrow indicators for parent menu items

### 3. Mobile Responsiveness
- **Collapsible Menu**: Hamburger toggle for mobile view
- **Accordion Style**: Expandable submenus on mobile
- **Touch-Friendly**: Proper touch targets (44px minimum)
- **Smooth Animations**: Transitions for menu opening/closing

### 4. Accessibility Features
- **ARIA Attributes**: Proper aria-haspopup, aria-expanded, aria-labelledby
- **Keyboard Navigation**: Full support for arrow keys, Enter, Escape
- **Focus Management**: Visible focus indicators and proper focus trapping
- **Screen Reader Support**: Proper labeling for screen readers

## Implementation Files

### PHP Files
1. **inc/class-wp-bootstrap-navwalker.php**: Custom Walker class for Bootstrap menu structure
   - Converts WordPress menu classes to Bootstrap classes
   - Adds necessary attributes for dropdowns
   - Handles multilevel menu structure

### CSS Files
1. **css/bootstrap-menu.css**: Custom styling for Bootstrap navbar
   - Enhances Bootstrap's default styling
   - Adds multilevel dropdown support
   - Improves accessibility with focus styles
   - Customizes mobile menu appearance

### JavaScript Files
1. **js/bootstrap-menu.js**: Enhances Bootstrap's menu functionality
   - Adds multilevel dropdown support
   - Handles keyboard navigation
   - Manages screen edge detection
   - Improves accessibility

## WordPress Integration

### Menu Setup in WordPress Admin
1. Go to **Appearance → Menus**
2. Create a menu with the desired structure
3. Add top-level items and nested items as needed
4. Assign the menu to the "Primary Menu" location

### Menu Structure Example
```
Home
Services ▼
  ├── Web Design ▶
  │     ├── WordPress
  │     ├── E-commerce
  │     └── Custom Development
  ├── Graphic Design
  └── Marketing
About
Contact
```

### Technical Implementation

#### Header Template
The header.php file includes a Bootstrap navbar with the WordPress menu:
```php
<nav class="navbar navbar-expand-lg navbar-light navbar-blueprint">
    <div class="container">
        <!-- Brand/Logo -->
        <div class="navbar-brand">
            <?php the_custom_logo(); ?>
        </div>
        
        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarMain" aria-controls="navbarMain" 
                aria-expanded="false" aria-label="Toggle Navigation">
            <span class="navbar-toggler-icon"><span></span></span>
        </button>
        
        <!-- Navigation Menu -->
        <div class="collapse navbar-collapse" id="navbarMain">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary-menu',
                'depth'          => 0, // Unlimited depth
                'container'      => false,
                'menu_class'     => 'navbar-nav me-auto mb-2 mb-lg-0',
                'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
                'walker'         => new WP_Bootstrap_Navwalker(),
            ));
            ?>
        </div>
    </div>
</nav>
```

#### Custom Walker Class
The WP_Bootstrap_Navwalker class converts WordPress menu structure to Bootstrap:
- Adds Bootstrap classes to menu items
- Adds dropdown toggle attributes
- Handles multilevel menu structure

#### JavaScript Enhancements
The bootstrap-menu.js file adds functionality beyond Bootstrap's defaults:
- Multilevel dropdown support
- Keyboard navigation
- Screen edge detection
- Accessibility improvements

## Customization Options

### Menu Colors
Edit the following variables in bootstrap-menu.css:
```css
.navbar-blueprint {
    background: #fff; /* Navbar background */
}

.navbar-nav .nav-link {
    color: #333; /* Menu item color */
}

.dropdown-menu {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); /* Dropdown background */
}

.dropdown-item {
    color: #fff; /* Dropdown item color */
}
```

### Menu Behavior
Adjust the following settings in bootstrap-menu.js:
```javascript
// Change dropdown hover behavior
$('.dropdown-submenu > a').on('click', function(e) {
    e.preventDefault();
    e.stopPropagation();
    
    const $submenu = $(this).next('.dropdown-menu');
    $submenu.toggleClass('show');
});

// Change mobile breakpoint
// Default is 992px (Bootstrap's lg breakpoint)
if (window.innerWidth >= 992) {
    // Desktop behavior
} else {
    // Mobile behavior
}
```

## Troubleshooting

### Common Issues

#### Dropdowns Not Working
- Check if Bootstrap JS is properly loaded
- Verify that data-bs-toggle attributes are present
- Check for JavaScript errors in console

#### Multilevel Dropdowns Not Working
- Verify the custom JavaScript is loaded
- Check if dropdown-submenu classes are applied
- Inspect element to ensure proper nesting

#### Mobile Menu Not Collapsing
- Check if navbar-collapse class is present
- Verify that data-bs-target matches the collapse ID
- Check if Bootstrap JS is properly loaded

## Best Practices

1. **Menu Depth**: Keep menu depth to 3 levels maximum for best user experience
2. **Menu Items**: Use short, descriptive text for menu items
3. **Mobile Optimization**: Test thoroughly on mobile devices
4. **Accessibility**: Ensure keyboard navigation works properly
5. **Performance**: Minimize DOM manipulations for smooth animations

This implementation provides a robust, accessible, and responsive menu system that works across all devices and screen sizes while following WordPress and Bootstrap best practices.