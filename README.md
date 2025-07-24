# Services Pro WordPress Theme

A professional WordPress theme designed specifically for home services, cleaning, maintenance, and personal assistance businesses.

## Features

### 🎨 Design & Layout
- Modern, responsive design that works on all devices
- Beautiful gradient color scheme with professional styling
- Smooth animations and hover effects
- Clean, easy-to-read typography
- Mobile-first approach

### 🧹 Service Categories Included
- **Home & Cleaning Services** - House cleaning, pressure washing, window cleaning, etc.
- **Home & Property Maintenance** - Furniture assembly, TV mounting, handyman services, etc.
- **Personal Errands & Concierge** - Grocery shopping, delivery services, personal assistant, etc.
- **Pet & Animal Services** - Dog walking, pet sitting, grooming services, etc.
- **Child & Family Support** - Babysitting, toy organization, birthday party setup, etc.
- **Creative & Digital Services** - Graphic design, social media management, photography, etc.
- **Coaching & Consulting** - Business coaching, life coaching, marketing consulting, etc.
- **Office & Admin Services** - Virtual assistant, data entry, transcription, etc.
- **Selling, Flipping & Setup** - Furniture flipping, product sourcing, setup services, etc.

### 🛠️ WordPress Features
- Custom post type for Services
- Service categories taxonomy
- Custom fields for service pricing and details
- Theme customizer integration
- Widget-ready footer areas
- SEO-friendly structure
- Contact form integration ready

### 📱 Pages Included
- Homepage with hero section and service showcase
- Services archive page
- Individual service detail pages
- Contact page with form
- About page template
- 404 error page
- Search results page

## Installation

1. Download the theme files
2. Upload to your WordPress site's `/wp-content/themes/` directory
3. Activate the theme in WordPress Admin > Appearance > Themes
4. Configure the theme settings in Customizer

## Setup Instructions

### 1. Initial Theme Setup
1. Go to **Appearance > Customize**
2. Configure your site title and tagline
3. Upload your logo (optional)
4. Set up your contact information:
   - Phone number
   - Email address
   - Business address

### 2. Configure Hero Section
In the Customizer under "Hero Section":
- Set your main headline
- Write your subtitle/description
- Customize the call-to-action button text and link

### 3. Create Your Navigation Menu
1. Go to **Appearance > Menus**
2. Create a new menu
3. Add pages/links for:
   - Home
   - Services
   - About
   - Contact
4. Assign to "Primary Menu" location

### 4. Set Up Services
1. The theme automatically creates service categories based on your business type
2. Go to **Services > Add New** to create individual service pages
3. Add service details like pricing, duration, and features
4. Assign services to appropriate categories

### 5. Create Essential Pages
Create these important pages:
- **Services** (use Page Template: Services Page)
- **Contact** (use Page Template: Contact Page)
- **About** (regular page)

### 6. Configure Widgets
Go to **Appearance > Widgets** and set up:
- Footer widget areas
- Sidebar (if needed)

## Customization

### Colors
The theme uses a professional blue gradient color scheme. To customize:
1. Edit `style.css`
2. Look for color variables in the CSS
3. Replace with your brand colors

### Adding More Services
To add services to existing categories:
1. Edit `functions.php`
2. Find the `get_service_categories_with_icons()` function
3. Add your services to the appropriate category array

### Custom Fields
Each service can have:
- **Price** - Display pricing information
- **Duration** - How long the service takes
- **Features** - List of what's included (one per line)

## File Structure

```
wptheme/
├── style.css (main stylesheet)
├── functions.php (theme functions)
├── header.php (site header)
├── footer.php (site footer)
├── index.php (homepage)
├── page.php (default page template)
├── page-services.php (services page template)
├── page-contact.php (contact page template)
├── single.php (blog post template)
├── single-services.php (individual service template)
├── archive-services.php (services archive)
├── search.php (search results)
├── 404.php (error page)
└── js/
    └── script.js (JavaScript functionality)
```

## Support & Customization

This theme is designed to be easily customizable for your specific business needs. All service categories and content can be modified through the WordPress admin or by editing the theme files.

### Common Customizations
- Change service categories and icons
- Modify color scheme
- Add additional custom fields
- Integrate with booking/scheduling plugins
- Add payment processing
- Connect with CRM systems

## Browser Support
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## Performance
- Optimized CSS and JavaScript
- Responsive images
- Lazy loading ready
- SEO optimized structure
- Fast loading times

---

**Note**: This theme is perfect for service-based businesses looking for a professional online presence. It's designed to showcase your services effectively and convert visitors into customers.
