<?php
/**
 * WordPress Admin - Create Modern Services Page
 * Run this in WordPress admin or via WP-CLI to create the modern services page
 */

// Create the modern services page
function create_modern_services_page() {
    // Check if page already exists
    $existing_page = get_page_by_path('services-modern');
    
    if (!$existing_page) {
        $page_data = array(
            'post_title'    => 'Modern Services',
            'post_content'  => '[modern_services_content]',
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'post_name'     => 'services-modern',
            'page_template' => 'page-services-modern.php'
        );
        
        $page_id = wp_insert_post($page_data);
        
        if ($page_id) {
            // Set the page template
            update_post_meta($page_id, '_wp_page_template', 'page-services-modern.php');
            
            echo "Modern Services page created successfully! ID: " . $page_id . "\n";
            echo "URL: " . get_permalink($page_id) . "\n";
        } else {
            echo "Failed to create Modern Services page.\n";
        }
    } else {
        echo "Modern Services page already exists.\n";
        echo "URL: " . get_permalink($existing_page->ID) . "\n";
    }
}

// Update existing services page to use modern template
function update_services_page_template() {
    $services_page = get_page_by_path('services');
    
    if ($services_page) {
        // Update to use modern template
        update_post_meta($services_page->ID, '_wp_page_template', 'page-services-modern.php');
        echo "Updated services page to use modern template.\n";
        echo "URL: " . get_permalink($services_page->ID) . "\n";
    } else {
        echo "Services page not found. Creating new one...\n";
        
        $page_data = array(
            'post_title'    => 'Services',
            'post_content'  => 'Our professional home services designed to make your life easier.',
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'post_name'     => 'services',
            'page_template' => 'page-services-modern.php'
        );
        
        $page_id = wp_insert_post($page_data);
        
        if ($page_id) {
            update_post_meta($page_id, '_wp_page_template', 'page-services-modern.php');
            echo "Services page created with modern template! ID: " . $page_id . "\n";
            echo "URL: " . get_permalink($page_id) . "\n";
        }
    }
}

// If running in WordPress admin context
if (defined('ABSPATH')) {
    add_action('admin_init', function() {
        if (isset($_GET['create_modern_services']) && current_user_can('manage_options')) {
            create_modern_services_page();
            update_services_page_template();
            
            // Add success notice
            add_action('admin_notices', function() {
                echo '<div class="notice notice-success is-dismissible">';
                echo '<p><strong>Modern Services Page Setup Complete!</strong></p>';
                echo '<p>The services page has been updated to use the new modern template.</p>';
                echo '<p><a href="' . home_url('/services/') . '" target="_blank">View Modern Services Page</a></p>';
                echo '</div>';
            });
        }
    });
}

// CLI commands for WP-CLI
if (defined('WP_CLI') && WP_CLI) {
    WP_CLI::add_command('create-modern-services', function() {
        create_modern_services_page();
        update_services_page_template();
        WP_CLI::success('Modern services page setup complete!');
    });
}
?>
