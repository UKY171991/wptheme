<?php
/**
 * Debug Template - Simple index.php for testing
 * 
 * @package ServiceBlueprint
 */

// Test if WordPress is loaded
if (!defined('ABSPATH')) {
    die('WordPress not loaded properly');
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> - Debug Mode</title>
    <?php wp_head(); ?>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; line-height: 1.6; }
        .debug-info { background: #f0f0f0; padding: 20px; margin: 20px 0; border-radius: 5px; }
        .success { color: green; }
        .error { color: red; }
        .warning { color: orange; }
    </style>
</head>
<body <?php body_class(); ?>>
    
    <h1>Service Blueprint Theme - Debug Mode</h1>
    
    <div class="debug-info">
        <h2>WordPress Status</h2>
        <p class="success">✅ WordPress is loaded</p>
        <p><strong>Site Name:</strong> <?php bloginfo('name'); ?></p>
        <p><strong>WordPress Version:</strong> <?php echo get_bloginfo('version'); ?></p>
        <p><strong>Theme Directory:</strong> <?php echo get_template_directory(); ?></p>
        <p><strong>PHP Version:</strong> <?php echo PHP_VERSION; ?></p>
    </div>
    
    <div class="debug-info">
        <h2>Theme Functions Test</h2>
        <?php if (function_exists('register_services_post_type')) : ?>
            <p class="success">✅ register_services_post_type() function exists</p>
        <?php else : ?>
            <p class="error">❌ register_services_post_type() function missing</p>
        <?php endif; ?>
        
        <?php if (function_exists('register_service_categories_taxonomy')) : ?>
            <p class="success">✅ register_service_categories_taxonomy() function exists</p>
        <?php else : ?>
            <p class="error">❌ register_service_categories_taxonomy() function missing</p>
        <?php endif; ?>
        
        <?php if (class_exists('Service_Blueprint_Nav_Walker')) : ?>
            <p class="success">✅ Service_Blueprint_Nav_Walker class loaded</p>
        <?php else : ?>
            <p class="warning">⚠️ Service_Blueprint_Nav_Walker class not loaded</p>
        <?php endif; ?>
    </div>
    
    <div class="debug-info">
        <h2>Content Test</h2>
        <?php
        // Check if services exist
        $services = get_posts(array(
            'post_type' => 'service',
            'posts_per_page' => 5,
            'post_status' => 'publish'
        ));
        
        if ($services) :
        ?>
            <p class="success">✅ Found <?php echo count($services); ?> service(s)</p>
            <ul>
                <?php foreach ($services as $service) : ?>
                    <li><?php echo esc_html($service->post_title); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p class="warning">⚠️ No services found</p>
        <?php endif; ?>
        
        <?php
        // Check service categories
        $categories = get_terms(array(
            'taxonomy' => 'service_category',
            'hide_empty' => false
        ));
        
        if ($categories && !is_wp_error($categories)) :
        ?>
            <p class="success">✅ Found <?php echo count($categories); ?> service categories</p>
            <ul>
                <?php foreach ($categories as $category) : ?>
                    <li><?php echo esc_html($category->name); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p class="warning">⚠️ No service categories found</p>
        <?php endif; ?>
    </div>
    
    <div class="debug-info">
        <h2>Quick Actions</h2>
        <p><a href="<?php echo wp_nonce_url(admin_url('admin.php?action=service_blueprint_setup'), 'service_blueprint_setup'); ?>">Setup Default Content</a></p>
        <p><a href="<?php echo admin_url('themes.php'); ?>">Back to Themes</a></p>
        <p><a href="<?php echo home_url(); ?>">View Site</a></p>
    </div>
    
    <?php wp_footer(); ?>
</body>
</html>
