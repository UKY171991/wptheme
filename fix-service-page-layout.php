<?php
/**
 * Layout Fix Script for Service Page
 * This script will fix all section layout issues on the service page
 */

// Direct database connection to update the page template
function fix_service_page_template() {
    global $wpdb;
    
    // Find the services page
    $page = $wpdb->get_row("SELECT * FROM {$wpdb->posts} WHERE post_name = 'service' OR post_name = 'services' AND post_type = 'page' AND post_status = 'publish'");
    
    if ($page) {
        // Update to use modern template
        $wpdb->update(
            $wpdb->postmeta,
            array('meta_value' => 'page-services-modern.php'),
            array('post_id' => $page->ID, 'meta_key' => '_wp_page_template')
        );
        
        // If no template meta exists, insert it
        $existing_meta = $wpdb->get_var("SELECT meta_id FROM {$wpdb->postmeta} WHERE post_id = {$page->ID} AND meta_key = '_wp_page_template'");
        
        if (!$existing_meta) {
            $wpdb->insert(
                $wpdb->postmeta,
                array(
                    'post_id' => $page->ID,
                    'meta_key' => '_wp_page_template',
                    'meta_value' => 'page-services-modern.php'
                )
            );
        }
        
        echo "Service page template updated to modern version!\n";
        echo "Page ID: " . $page->ID . "\n";
        echo "Page URL: " . get_permalink($page->ID) . "\n";
    } else {
        echo "Service page not found!\n";
    }
}

// If this is run in WordPress context
if (defined('ABSPATH')) {
    fix_service_page_template();
}
?>
