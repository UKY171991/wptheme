<?php
/**
 * Template Name: Service Redirect Page
 * 
 * This page redirects /service/ to /services/ and handles individual service URLs
 */

// Get the current URL path
$current_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// If it's just /service/ redirect to /services/
if ($current_path === 'service') {
    wp_redirect(home_url('/services/'), 301);
    exit;
}

// If it's a specific service, try to find a matching single-service template
if (strpos($current_path, 'service/') === 0) {
    $service_slug = str_replace('service/', '', $current_path);
    $service_slug = trim($service_slug, '/');
    
    // Check if we have a specific template for this service
    $template_file = get_template_directory() . '/single-' . $service_slug . '.php';
    if (file_exists($template_file)) {
        include($template_file);
        exit;
    }
    
    // Otherwise redirect to services page with anchor
    wp_redirect(home_url('/services/#' . $service_slug), 301);
    exit;
}

// Default redirect to services
wp_redirect(home_url('/services/'), 301);
exit;
?>
