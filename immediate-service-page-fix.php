<?php
/**
 * IMMEDIATE SERVICE PAGE FIX
 * This script will instantly fix the service page layout by switching to the modern template
 */

// WordPress database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "t";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<h1>🔧 IMMEDIATE SERVICE PAGE FIX</h1>";
    echo "<p>Switching service page to modern template...</p>";
    
    // Find the service page ID
    $stmt = $pdo->prepare("SELECT ID FROM wp_posts WHERE post_name = 'service' OR post_name = 'services' AND post_type = 'page' AND post_status = 'publish'");
    $stmt->execute();
    $pages = $stmt->fetchAll();
    
    if (!empty($pages)) {
        foreach ($pages as $page) {
            $page_id = $page['ID'];
            
            // Update page template to modern version
            $update_stmt = $pdo->prepare("
                INSERT INTO wp_postmeta (post_id, meta_key, meta_value) 
                VALUES (?, '_wp_page_template', 'page-services-modern.php')
                ON DUPLICATE KEY UPDATE meta_value = 'page-services-modern.php'
            ");
            $update_stmt->execute([$page_id]);
            
            echo "<p>✅ Updated page ID: $page_id to use modern template</p>";
        }
    }
    
    // Also create a simple override for immediate effect
    echo "<p>Creating emergency CSS override...</p>";
    
    // Force the service page to use clean layout immediately
    $emergency_css = "
    /* EMERGENCY SERVICE PAGE LAYOUT FIX */
    body.page-template-page-services {
        font-family: 'Segoe UI', sans-serif !important;
    }
    
    .page-template-page-services * {
        box-sizing: border-box !important;
    }
    
    /* HIDE ALL PROBLEMATIC ELEMENTS IMMEDIATELY */
    .page-template-page-services .particles-js,
    .page-template-page-services .cosmic-particles,
    .page-template-page-services .animated-badge-carousel,
    .page-template-page-services .floating-elements,
    .page-template-page-services .ultra-fancy-hero-section .particles-canvas,
    .page-template-page-services [class*='cosmic'],
    .page-template-page-services [class*='mega-fancy'],
    .page-template-page-services [class*='ultra-'] canvas {
        display: none !important;
        visibility: hidden !important;
    }
    
    /* FORCE CLEAN HERO SECTION */
    .page-template-page-services .ultra-fancy-hero-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
        min-height: 60vh !important;
        padding: 60px 20px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        text-align: center !important;
        color: white !important;
        overflow: hidden !important;
    }
    
    .page-template-page-services .hero-content h1 {
        font-size: 3rem !important;
        color: white !important;
        margin-bottom: 20px !important;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3) !important;
    }
    
    .page-template-page-services .hero-content p {
        font-size: 1.2rem !important;
        color: rgba(255,255,255,0.9) !important;
        max-width: 600px !important;
        margin: 0 auto !important;
    }
    
    /* FORCE CLEAN SERVICE GRID */
    .page-template-page-services .services-grid,
    .page-template-page-services .ultra-fancy-services-grid {
        display: grid !important;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)) !important;
        gap: 30px !important;
        padding: 60px 20px !important;
        max-width: 1200px !important;
        margin: 0 auto !important;
        background: #f8f9fa !important;
    }
    
    .page-template-page-services .service-card {
        background: white !important;
        padding: 30px !important;
        border-radius: 15px !important;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
        text-align: center !important;
        height: 350px !important;
        display: flex !important;
        flex-direction: column !important;
        justify-content: space-between !important;
    }
    
    /* MOBILE FIXES */
    @media (max-width: 768px) {
        .page-template-page-services .ultra-fancy-hero-section {
            min-height: 50vh !important;
            padding: 40px 15px !important;
        }
        
        .page-template-page-services .hero-content h1 {
            font-size: 2rem !important;
        }
        
        .page-template-page-services .services-grid {
            grid-template-columns: 1fr !important;
            padding: 40px 15px !important;
        }
        
        .page-template-page-services .service-card {
            height: auto !important;
            min-height: 250px !important;
        }
    }
    ";
    
    // Write emergency CSS file to css folder
    file_put_contents(__DIR__ . '/css/emergency-service-page-fix.css', $emergency_css);
    
    echo "<p>✅ Emergency CSS created</p>";
    echo "<p>✅ Service page layout should now be fixed!</p>";
    echo "<p><strong>🚀 <a href='http://localhost/t/service/'>CHECK SERVICE PAGE NOW</a></strong></p>";
    
} catch(PDOException $e) {
    echo "<p>❌ Database Error: " . $e->getMessage() . "</p>";
    echo "<p>Creating CSS-only emergency fix...</p>";
    
    // Create emergency CSS even if database fails
    $emergency_css = "
    /* EMERGENCY SERVICE PAGE LAYOUT FIX - CSS ONLY */
    .page-template-page-services .particles-js,
    .page-template-page-services .cosmic-particles,
    .page-template-page-services .animated-badge-carousel,
    .page-template-page-services canvas {
        display: none !important;
    }
    
    .page-template-page-services .ultra-fancy-hero-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
        min-height: 60vh !important;
        padding: 60px 20px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        color: white !important;
        text-align: center !important;
    }
    
    .page-template-page-services .services-grid {
        display: grid !important;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)) !important;
        gap: 30px !important;
        padding: 60px 20px !important;
        max-width: 1200px !important;
        margin: 0 auto !important;
        background: #f8f9fa !important;
    }
    
    @media (max-width: 768px) {
        .page-template-page-services .services-grid {
            grid-template-columns: 1fr !important;
        }
    }
    ";
    
    file_put_contents(__DIR__ . '/css/emergency-service-page-fix.css', $emergency_css);
    echo "<p>✅ Emergency CSS fix created</p>";
}
?>

<style>
body { font-family: Arial, sans-serif; padding: 20px; }
h1 { color: #28a745; }
p { margin: 10px 0; }
a { color: #007cba; text-decoration: none; font-weight: bold; }
</style>
