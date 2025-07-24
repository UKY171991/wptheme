# Service Blueprint WordPress Theme

A comprehensive WordPress theme designed specifically for service-based businesses. This theme provides a complete solution for showcasing services, managing client interactions, and building a professional online presence.

## Features

### 🎨 **Modern Design**
- Clean, professional layout with responsive design
- Parallax scrolling effects and smooth animations
- Customizable color schemes and typography
- Mobile-first approach ensuring perfect display on all devices

### 🛠️ **Service Management**
- Custom "Services" post type with advanced meta fields
- 9 pre-built service category templates
- Dynamic service filtering and sorting
- Individual service pages with detailed information
- FAQ system for each service
- Process step visualization
- Pricing and duration display

### 🧭 **Navigation & User Experience**
- Multi-level navigation menu (up to 3 levels)
- Accessibility-focused design with ARIA labels
- Keyboard navigation support
- Skip links for screen readers
- Search functionality with advanced filtering

### 🎯 **Homepage Features**
- Hero section with customizable content
- Featured services grid
- Service categories showcase
- Client testimonials carousel
- Call-to-action sections
- Company statistics display

### 📧 **Contact & Conversion**
- Built-in contact forms on service pages
- AJAX form submission
- Email notifications for new inquiries
- Quote request functionality
- Social media integration

### ⚙️ **Admin Panel**
- Custom meta boxes for service management
- Theme customizer integration
- Dashboard widgets for quick overview
- Admin columns customization
- Bulk actions for service management

### 🔍 **SEO & Performance**
- SEO-optimized structure
- Fast loading times
- Optimized images and assets
- Clean, semantic HTML5 markup
- Schema.org markup for services

## Installation

1. **Download & Install**
   ```
   Download the theme files
   Upload to /wp-content/themes/service-blueprint/
   Activate through WordPress admin
   ```

2. **Automatic Setup**
   - Upon activation, you'll see a setup notice in the admin
   - Click "Setup Default Content" to create sample services and pages
   - This creates 9 service categories and 3 sample services

3. **Manual Setup**
   - Navigate to Appearance > Customize to configure theme settings
   - Create your services under Services > Add New
   - Configure menus under Appearance > Menus

## Theme Structure

```
service-blueprint/
├── style.css                 # Main stylesheet
├── functions.php             # Theme functions and setup
├── index.php                 # Homepage template
├── header.php               # Site header
├── footer.php               # Site footer
├── single-service.php       # Individual service pages
├── archive-service.php      # Services archive
├── taxonomy-service_category.php  # Service category pages
├── search.php               # Search results
├── 404.php                  # Error page
├── inc/
│   ├── nav-walker.php       # Custom navigation walker
│   ├── meta-boxes.php       # Service meta boxes
│   └── theme-init.php       # Theme initialization
└── assets/
    ├── js/
    │   └── theme.js         # Theme JavaScript
    └── css/
        └── admin.css        # Admin styles
```

## Service Categories

The theme includes 9 pre-configured service categories:

1. **Web Development** - Custom websites and web applications
2. **Digital Marketing** - SEO, social media, and online advertising
3. **Graphic Design** - Logo design, branding, and visual identity
4. **Content Creation** - Copywriting and multimedia production
5. **Business Consulting** - Strategic planning and optimization
6. **Mobile Apps** - iOS and Android development
7. **Data Analytics** - Business intelligence and reporting
8. **Cloud Solutions** - Cloud migration and DevOps
9. **Training & Support** - Technical training and documentation

## Customization

### Theme Customizer Options

Access through **Appearance > Customize**:

- **Site Identity**: Logo, site title, tagline
- **Colors**: Primary, secondary, and accent colors
- **Typography**: Google Fonts integration
- **Hero Section**: Title, subtitle, button text and URL
- **Footer**: Copyright text and contact information
- **Social Media**: Facebook, Twitter, LinkedIn, Instagram links

### Custom Post Types

**Services Post Type**
- Title and description
- Featured image
- Service category assignment
- Custom meta fields:
  - Price range
  - Duration
  - Features list
  - Process steps
  - FAQ section
  - Featured service toggle

### Custom Fields

Each service includes:
- **Price**: Service pricing information
- **Duration**: Project timeline
- **Features**: List of included features
- **Process**: Step-by-step service process
- **FAQ**: Frequently asked questions
- **Contact Form**: Integrated contact form

## Development

### Requirements
- WordPress 5.0+
- PHP 7.4+
- MySQL 5.6+

### Hooks & Filters

The theme provides several hooks for customization:

```php
// Modify service archive query
add_filter('service_blueprint_archive_query', 'custom_archive_query');

// Customize service card output
add_filter('service_blueprint_service_card', 'custom_service_card');

// Add custom meta fields
add_action('service_blueprint_meta_fields', 'add_custom_meta_fields');
```

### JavaScript Events

```javascript
// Service filter change
$(document).on('serviceFilterChanged', function(e, filter) {
    // Handle filter change
});

// Form submission
$(document).on('serviceFormSubmitted', function(e, response) {
    // Handle form response
});
```

## Browser Support

- Chrome (latest 2 versions)
- Firefox (latest 2 versions)
- Safari (latest 2 versions)
- Edge (latest 2 versions)
- Internet Explorer 11+

## Accessibility

The theme follows WCAG 2.1 AA guidelines:
- Semantic HTML5 markup
- ARIA labels and roles
- Keyboard navigation support
- Color contrast compliance
- Screen reader compatibility
- Focus indicators
- Skip links

## Performance

- Optimized CSS and JavaScript
- Lazy loading for images
- Minified assets in production
- Efficient database queries
- Caching-friendly structure

## Support

### Documentation
- Theme setup guide
- Customization tutorials
- FAQ section
- Video tutorials

### Community
- WordPress.org support forums
- GitHub repository for bug reports
- Community Discord channel

## Changelog

### Version 1.0.0
- Initial release
- Complete service management system
- 9 service category templates
- Responsive design
- Accessibility features
- Admin panel integration
- SEO optimization

## License

This theme is licensed under GPL v2 or later.

## Credits

- **Fonts**: Google Fonts (Open Sans, Playfair Display)
- **Icons**: Font Awesome 6
- **Images**: Placeholder images from placeholder.com
- **Inspiration**: Modern service business websites

## Contributing

We welcome contributions! Please:
1. Fork the repository
2. Create a feature branch
3. Submit a pull request with detailed description

---

**Service Blueprint Theme** - Transform your service business with a professional WordPress presence.
