<?php
/**
 * Quick script to update about page template
 * Run this once by visiting: http://localhost/t/wp-content/themes/wptheme/update-about-template.php
 */

// Include WordPress
require_once('../../../wp-config.php');

// Check if about page exists
$about_page = get_page_by_path('about');

if ($about_page) {
    // Update the page to use the new professional template
    $updated = wp_update_post(array(
        'ID' => $about_page->ID,
        'page_template' => 'page-about-professional.php'
    ));
    
    if ($updated) {
        echo "✅ About page updated successfully to use Professional template!<br>";
        echo "🔗 <a href='" . get_permalink($about_page->ID) . "' target='_blank'>View the new About page</a><br>";
        echo "📝 Template: page-about-professional.php<br>";
    } else {
        echo "❌ Failed to update about page template<br>";
    }
} else {
    // Create new about page with professional template
    $page_data = array(
        'post_title'     => 'About Us',
        'post_name'      => 'about',
        'post_content'   => '', // Content comes from template
        'post_status'    => 'publish',
        'post_type'      => 'page',
        'page_template'  => 'page-about-professional.php'
    );
    
    $page_id = wp_insert_post($page_data);
    
    if ($page_id) {
        echo "✅ About page created successfully with Professional template!<br>";
        echo "🔗 <a href='" . get_permalink($page_id) . "' target='_blank'>View the new About page</a><br>";
        echo "📝 Template: page-about-professional.php<br>";
    } else {
        echo "❌ Failed to create about page<br>";
    }
}

echo "<br>🔄 <a href='" . home_url() . "'>← Back to Homepage</a>";
?>
