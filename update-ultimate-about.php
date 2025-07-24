<?php
/**
 * Update About Page to Ultimate Template
 * Run this once by visiting: http://localhost/t/wp-content/themes/wptheme/update-ultimate-about.php
 */

// Include WordPress
require_once('../../../wp-config.php');

// Check if about page exists
$about_page = get_page_by_path('about');

if ($about_page) {
    // Update the page to use the new ultimate template
    $updated = wp_update_post(array(
        'ID' => $about_page->ID,
        'page_template' => 'page-about-ultimate.php'
    ));
    
    if ($updated) {
        echo "🚀 <strong>About page upgraded to ULTIMATE template!</strong><br><br>";
        echo "✨ <strong>NEW FEATURES ADDED:</strong><br>";
        echo "🎬 Interactive video showcase<br>";
        echo "📅 Enhanced interactive timeline<br>";
        echo "👤 Founder's personal message section<br>";
        echo "🔄 5-step process methodology<br>";
        echo "🌟 Advanced team showcase<br>";
        echo "💎 Company culture & values<br>";
        echo "💬 Rotating customer testimonials<br>";
        echo "🏆 Achievement showcase<br>";
        echo "⚡ Interactive CTA options<br>";
        echo "🎨 Advanced animations & parallax<br><br>";
        
        echo "🔗 <a href='" . get_permalink($about_page->ID) . "' target='_blank' style='background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 1rem 2rem; border-radius: 25px; text-decoration: none; font-weight: bold;'>🎉 VIEW THE ULTIMATE ABOUT PAGE</a><br><br>";
        echo "📝 Template: <strong>page-about-ultimate.php</strong><br>";
        echo "🎨 Styles: <strong>ultimate-about-styles.css</strong><br>";
        echo "⚡ JavaScript: <strong>ultimate-about.js</strong><br>";
    } else {
        echo "❌ Failed to update about page template<br>";
    }
} else {
    echo "❌ About page not found. Please create an about page first.<br>";
}

echo "<br>🔄 <a href='" . home_url() . "'>← Back to Homepage</a>";
?>
