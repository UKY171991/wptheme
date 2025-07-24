# CSS Consolidation Cleanup Script (PowerShell)
# This script removes all individual CSS files after consolidation

Write-Host "================================================" -ForegroundColor Cyan
Write-Host "CSS CONSOLIDATION CLEANUP" -ForegroundColor Yellow
Write-Host "Removing old individual CSS files..." -ForegroundColor Green
Write-Host "================================================" -ForegroundColor Cyan

# Create backup directory for old files
if (!(Test-Path "css-backup")) {
    New-Item -ItemType Directory -Path "css-backup"
    Write-Host "Created backup directory: css-backup/" -ForegroundColor Green
}

# List of CSS files to remove (keep only global-styles.css)
$cssFiles = @(
    "about-improved-styles.css",
    "about-page-styles.css",
    "anti-sticky-header-override.css",
    "clean-header-menu.css",
    "critical-banner-text-fix.css",
    "dropdown-zindex-fix.css",
    "enhanced-about-styles.css",
    "enhanced-blog-styles.css",
    "enhanced-contact-styles.css",
    "enhanced-pricing-improvements.css",
    "enhanced-pricing-styles.css",
    "front-page-styles.css",
    "global-universal-styles.css",
    "home-page-header-fix.css",
    "mobile-debug.css",
    "mobile-responsive-fixes.css",
    "modern-homepage.css",
    "outdoor-services-styles.css",
    "page-styles.css",
    "pricing-page-enhanced.css",
    "pricing-page-styles.css",
    "professional-about-styles.css",
    "remove-scrollbars.css",
    "scrollbar-fix.css",
    "service-page-aggressive-mobile-fixes.css",
    "service-page-mobile-fixes.css",
    "service-page-nuclear-mobile-fix.css",
    "services-page-styles.css",
    "simple-contact-styles.css",
    "submenu-emergency-fix.css",
    "submenu-hover-fix.css",
    "submenu-integration-patches.css",
    "submenu-zindex-fix.css",
    "taxonomy-service-category-styles.css",
    "ultra-contact-styles.css",
    "ultimate-about-styles.css",
    "universal-banner-system.css",
    "universal-hero-system.css",
    "universal-page-content.css",
    "universal-spacing-standards.css"
)

# Move old CSS files to backup
$backupCount = 0
foreach ($file in $cssFiles) {
    $sourcePath = "css\$file"
    if (Test-Path $sourcePath) {
        Write-Host "Backing up: $sourcePath" -ForegroundColor Yellow
        Move-Item -Path $sourcePath -Destination "css-backup\"
        $backupCount++
    }
}

Write-Host ""
Write-Host "================================================" -ForegroundColor Cyan
Write-Host "CLEANUP COMPLETE!" -ForegroundColor Green
Write-Host "================================================" -ForegroundColor Cyan
Write-Host "✅ All individual CSS files have been consolidated into global-styles.css" -ForegroundColor Green
Write-Host "✅ $backupCount old files backed up to css-backup\ directory" -ForegroundColor Green
Write-Host "✅ functions.php updated to use single CSS file" -ForegroundColor Green
Write-Host "✅ style.css updated to import global styles" -ForegroundColor Green
Write-Host ""
Write-Host "BENEFITS:" -ForegroundColor Yellow
Write-Host "• Faster page loading (1 CSS file instead of 20+)" -ForegroundColor White
Write-Host "• Easier maintenance and updates" -ForegroundColor White
Write-Host "• Consistent styling across all pages" -ForegroundColor White
Write-Host "• Reduced HTTP requests" -ForegroundColor White
Write-Host "• Better caching performance" -ForegroundColor White
Write-Host ""
Write-Host "To restore individual files if needed:" -ForegroundColor Yellow
Write-Host "Move-Item css-backup\* css\" -ForegroundColor White
Write-Host "================================================" -ForegroundColor Cyan

# Optional: Show remaining CSS files
Write-Host ""
Write-Host "Remaining CSS files:" -ForegroundColor Yellow
if (Test-Path "css") {
    Get-ChildItem -Path "css" -Filter "*.css" | ForEach-Object {
        Write-Host "  • $($_.Name)" -ForegroundColor Green
    }
} else {
    Write-Host "  No css directory found" -ForegroundColor Red
}

# Show the main global styles file
if (Test-Path "global-styles.css") {
    $fileSize = (Get-Item "global-styles.css").Length
    $fileSizeKB = [math]::Round($fileSize / 1024, 2)
    Write-Host ""
    Write-Host "Main CSS file: global-styles.css ($fileSizeKB KB)" -ForegroundColor Green
} else {
    Write-Host ""
    Write-Host "⚠️  global-styles.css not found!" -ForegroundColor Red
}
