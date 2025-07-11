<?php
/**
 * PartyPro WordPress Theme Functions
 * 
 * This file contains all the theme setup and functionality
 */

// Theme setup
function partypro_theme_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'partypro'),
        'footer' => __('Footer Menu', 'partypro'),
    ));
    
    // Add custom image sizes
    add_image_size('service-thumbnail', 300, 200, true);
    add_image_size('hero-image', 1920, 1080, true);
}
add_action('after_setup_theme', 'partypro_theme_setup');

// Enqueue styles and scripts
function partypro_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('partypro-style', get_stylesheet_uri(), array(), '1.0');
    
    // Enqueue custom JavaScript
    wp_enqueue_script('partypro-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0', true);
    
    // Add smooth scrolling for anchor links
    wp_add_inline_script('partypro-script', '
        jQuery(document).ready(function($) {
            $("a[href^=\'#\']").on("click", function(e) {
                e.preventDefault();
                var target = this.hash;
                var $target = $(target);
                if ($target.length) {
                    $("html, body").animate({
                        scrollTop: $target.offset().top - 100
                    }, 800, "swing");
                }
            });
        });
    ');
}
add_action('wp_enqueue_scripts', 'partypro_scripts');

// Register widget areas
function partypro_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'partypro'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'partypro'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area', 'partypro'),
        'id'            => 'footer-widgets',
        'description'   => __('Widgets in this area will be shown in the footer.', 'partypro'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'partypro_widgets_init');

// Custom post type for Services
function partypro_create_services_post_type() {
    $labels = array(
        'name' => 'Services',
        'singular_name' => 'Service',
        'menu_name' => 'Services',
        'add_new' => 'Add New Service',
        'add_new_item' => 'Add New Service',
        'edit_item' => 'Edit Service',
        'new_item' => 'New Service',
        'view_item' => 'View Service',
        'search_items' => 'Search Services',
        'not_found' => 'No services found',
        'not_found_in_trash' => 'No services found in trash'
    );
    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'services'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    );
    
    register_post_type('service', $args);
}
add_action('init', 'partypro_create_services_post_type');

// Custom post type for Testimonials
function partypro_create_testimonials_post_type() {
    $labels = array(
        'name' => 'Testimonials',
        'singular_name' => 'Testimonial',
        'menu_name' => 'Testimonials',
        'add_new' => 'Add New Testimonial',
        'add_new_item' => 'Add New Testimonial',
        'edit_item' => 'Edit Testimonial',
    );
    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-testimonial',
        'supports' => array('title', 'editor', 'thumbnail'),
    );
    
    register_post_type('testimonial', $args);
}
add_action('init', 'partypro_create_testimonials_post_type');

// Add custom meta boxes for services
function partypro_add_service_meta_boxes() {
    add_meta_box(
        'service-details',
        'Service Details',
        'partypro_service_details_callback',
        'service',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'partypro_add_service_meta_boxes');

function partypro_service_details_callback($post) {
    wp_nonce_field('partypro_save_service_details', 'partypro_service_details_nonce');
    
    $price = get_post_meta($post->ID, '_service_price', true);
    $duration = get_post_meta($post->ID, '_service_duration', true);
    $capacity = get_post_meta($post->ID, '_service_capacity', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="service_price">Price (₹)</label></th>';
    echo '<td><input type="number" id="service_price" name="service_price" value="' . esc_attr($price) . '" /></td></tr>';
    
    echo '<tr><th><label for="service_duration">Duration</label></th>';
    echo '<td><input type="text" id="service_duration" name="service_duration" value="' . esc_attr($duration) . '" placeholder="e.g., 8 hours" /></td></tr>';
    
    echo '<tr><th><label for="service_capacity">Capacity</label></th>';
    echo '<td><input type="text" id="service_capacity" name="service_capacity" value="' . esc_attr($capacity) . '" placeholder="e.g., 50 guests" /></td></tr>';
    echo '</table>';
}

// Save service meta data
function partypro_save_service_details($post_id) {
    if (!isset($_POST['partypro_service_details_nonce']) || 
        !wp_verify_nonce($_POST['partypro_service_details_nonce'], 'partypro_save_service_details')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['service_price'])) {
        update_post_meta($post_id, '_service_price', sanitize_text_field($_POST['service_price']));
    }
    
    if (isset($_POST['service_duration'])) {
        update_post_meta($post_id, '_service_duration', sanitize_text_field($_POST['service_duration']));
    }
    
    if (isset($_POST['service_capacity'])) {
        update_post_meta($post_id, '_service_capacity', sanitize_text_field($_POST['service_capacity']));
    }
}
add_action('save_post', 'partypro_save_service_details');

// Customizer settings
function partypro_customize_register($wp_customize) {
    // Hero section
    $wp_customize->add_section('partypro_hero', array(
        'title' => 'Hero Section',
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Make Every Event Unforgettable',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label' => 'Hero Title',
        'section' => 'partypro_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Premium party rentals with professional setup services.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label' => 'Hero Subtitle',
        'section' => 'partypro_hero',
        'type' => 'textarea',
    ));
    
    // Contact info
    $wp_customize->add_section('partypro_contact', array(
        'title' => 'Contact Information',
        'priority' => 35,
    ));
    
    $wp_customize->add_setting('contact_phone', array(
        'default' => '+91 98765 43210',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_phone', array(
        'label' => 'Phone Number',
        'section' => 'partypro_contact',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('contact_email', array(
        'default' => 'info@partyprorentals.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label' => 'Email Address',
        'section' => 'partypro_contact',
        'type' => 'email',
    ));
    
    $wp_customize->add_setting('contact_address', array(
        'default' => '123 Party Street, Your City',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('contact_address', array(
        'label' => 'Address',
        'section' => 'partypro_contact',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'partypro_customize_register');

// Add excerpt support to pages
function partypro_add_excerpts_to_pages() {
    add_post_type_support('page', 'excerpt');
}
add_action('init', 'partypro_add_excerpts_to_pages');

// Custom excerpt length
function partypro_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'partypro_excerpt_length');

// Custom excerpt more text
function partypro_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'partypro_excerpt_more');

// Add custom CSS for admin area
function partypro_admin_styles() {
    echo '<style>
        .post-type-service .dashicons-calendar-alt:before {
            content: "\f508";
        }
        .post-type-testimonial .dashicons-testimonial:before {
            content: "\f205";
        }
    </style>';
}
add_action('admin_head', 'partypro_admin_styles');

?>
