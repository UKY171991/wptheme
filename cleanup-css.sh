#!/bin/bash

# CSS Consolidation Cleanup Script
# This script removes all individual CSS files after consolidation

echo "================================================"
echo "CSS CONSOLIDATION CLEANUP"
echo "Removing old individual CSS files..."
echo "================================================"

# Create backup directory for old files
mkdir -p css-backup

# List of CSS files to remove (keep only global-styles.css)
css_files=(
    "about-improved-styles.css"
    "about-page-styles.css"
    "anti-sticky-header-override.css"
    "clean-header-menu.css"
    "critical-banner-text-fix.css"
    "dropdown-zindex-fix.css"
    "enhanced-about-styles.css"
    "enhanced-blog-styles.css"
    "enhanced-contact-styles.css"
    "enhanced-pricing-improvements.css"
    "enhanced-pricing-styles.css"
    "front-page-styles.css"
    "global-universal-styles.css"
    "home-page-header-fix.css"
    "mobile-debug.css"
    "mobile-responsive-fixes.css"
    "modern-homepage.css"
    "outdoor-services-styles.css"
    "page-styles.css"
    "pricing-page-enhanced.css"
    "pricing-page-styles.css"
    "professional-about-styles.css"
    "remove-scrollbars.css"
    "scrollbar-fix.css"
    "service-page-aggressive-mobile-fixes.css"
    "service-page-mobile-fixes.css"
    "service-page-nuclear-mobile-fix.css"
    "services-page-styles.css"
    "simple-contact-styles.css"
    "submenu-emergency-fix.css"
    "submenu-hover-fix.css"
    "submenu-integration-patches.css"
    "submenu-zindex-fix.css"
    "taxonomy-service-category-styles.css"
    "ultra-contact-styles.css"
    "ultimate-about-styles.css"
    "universal-banner-system.css"
    "universal-hero-system.css"
    "universal-page-content.css"
    "universal-spacing-standards.css"
)

# Move old CSS files to backup
for file in "${css_files[@]}"; do
    if [ -f "css/$file" ]; then
        echo "Backing up: css/$file"
        mv "css/$file" "css-backup/"
    fi
done

echo ""
echo "================================================"
echo "CLEANUP COMPLETE!"
echo "================================================"
echo "✅ All individual CSS files have been consolidated into global-styles.css"
echo "✅ Old files backed up to css-backup/ directory"
echo "✅ functions.php updated to use single CSS file"
echo "✅ style.css updated to import global styles"
echo ""
echo "BENEFITS:"
echo "• Faster page loading (1 CSS file instead of 20+)"
echo "• Easier maintenance and updates"
echo "• Consistent styling across all pages"
echo "• Reduced HTTP requests"
echo "• Better caching performance"
echo ""
echo "To restore individual files if needed:"
echo "mv css-backup/* css/"
echo "================================================"
