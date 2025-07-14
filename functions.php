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
        'primary' => __('Main Menu', 'partypro'),
        'footer' => __('Footer Menu', 'partypro'),
    ));
    
    // Add custom image sizes
    add_image_size('service-thumbnail', 300, 200, true);
    add_image_size('hero-image', 1920, 1080, true);
    
    // Set default pages on theme activation
    if (get_option('partypro_pages_created') !== 'yes') {
        partypro_create_default_pages();
        update_option('partypro_pages_created', 'yes');
    }
}
add_action('after_setup_theme', 'partypro_theme_setup');

// Create default pages
function partypro_create_default_pages() {
    // Only create pages if they don't exist
    if (!get_page_by_path('home')) {
        $home_page = array(
            'post_title'    => 'Home',
            'post_content'  => 'Welcome to our party rental business!',
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'post_name'     => 'home'
        );
        $home_id = wp_insert_post($home_page);
        
        // Set Home as front page
        if ($home_id) {
            update_option('page_on_front', $home_id);
            update_option('show_on_front', 'page');
        }
    }
    
    // Create Services page
    if (!get_page_by_path('services')) {
        $services_page = array(
            'post_title'    => 'Services',
            'post_content'  => 'Our comprehensive party rental services to make your event perfect.',
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'post_name'     => 'services'
        );
        $services_id = wp_insert_post($services_page);
        if ($services_id) {
            update_post_meta($services_id, '_wp_page_template', 'page-services.php');
        }
    }
    
    // Create Pricing page
    if (!get_page_by_path('pricing')) {
        $pricing_page = array(
            'post_title'    => 'Pricing',
            'post_content'  => 'Our competitive pricing packages for all event sizes.',
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'post_name'     => 'pricing'
        );
        $pricing_id = wp_insert_post($pricing_page);
        if ($pricing_id) {
            update_post_meta($pricing_id, '_wp_page_template', 'page-pricing.php');
        }
    }
    
    // Create About page
    if (!get_page_by_path('about')) {
        $about_page = array(
            'post_title'    => 'About',
            'post_content'  => 'Learn more about our party rental business and our commitment to excellence.',
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'post_name'     => 'about'
        );
        $about_id = wp_insert_post($about_page);
        if ($about_id) {
            update_post_meta($about_id, '_wp_page_template', 'page-about.php');
        }
    }
    
    // Create Contact page
    if (!get_page_by_path('contact')) {
        $contact_page = array(
            'post_title'    => 'Contact',
            'post_content'  => 'Get in touch with us to plan your perfect event.',
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'post_name'     => 'contact'
        );
        $contact_id = wp_insert_post($contact_page);
        if ($contact_id) {
            update_post_meta($contact_id, '_wp_page_template', 'page-contact.php');
        }
    }
}

// Assign the correct page templates
function partypro_assign_page_templates($page_id, $template) {
    update_post_meta($page_id, '_wp_page_template', $template);
}

// Force custom page templates to load
function partypro_force_template_redirect() {
    global $post;
    
    if (is_page()) {
        $page_slug = $post->post_name;
        $template_file = '';
        
        switch ($page_slug) {
            case 'services':
                $template_file = 'page-services.php';
                break;
            case 'pricing':
                $template_file = 'page-pricing.php';
                break;
            case 'contact':
                $template_file = 'page-contact.php';
                break;
            case 'about':
                $template_file = 'page-about.php';
                break;
        }
        
        if ($template_file) {
            $template_path = get_template_directory() . '/' . $template_file;
            if (file_exists($template_path)) {
                // Set global variables that templates might need
                global $wp_query;
                
                // Load the template
                load_template($template_path);
                exit;
            }
        }
    }
}
add_action('template_redirect', 'partypro_force_template_redirect', 5);

// Better page template selection
function partypro_page_template($template) {
    if (is_page()) {
        global $post;
        $page_slug = $post->post_name;
        
        // Check for specific page templates
        $custom_templates = array(
            'services' => 'page-services.php',
            'pricing' => 'page-pricing.php',
            'contact' => 'page-contact.php',
            'about' => 'page-about.php'
        );
        
        if (isset($custom_templates[$page_slug])) {
            $custom_template = get_template_directory() . '/' . $custom_templates[$page_slug];
            if (file_exists($custom_template)) {
                return $custom_template;
            }
        }
    }
    
    return $template;
}
add_filter('page_template', 'partypro_page_template');

// Alternative template include filter
function partypro_template_include($template) {
    if (is_page()) {
        global $post;
        $page_slug = $post->post_name;
        
        $custom_templates = array(
            'services' => 'page-services.php',
            'pricing' => 'page-pricing.php',
            'contact' => 'page-contact.php',
            'about' => 'page-about.php'
        );
        
        if (isset($custom_templates[$page_slug])) {
            $custom_template = get_template_directory() . '/' . $custom_templates[$page_slug];
            if (file_exists($custom_template)) {
                return $custom_template;
            }
        }
    }
    
    return $template;
}
add_filter('template_include', 'partypro_template_include', 99);

// Enqueue scripts and styles
function partypro_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('partypro-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue enhanced pages CSS
    wp_enqueue_style('partypro-enhanced-pages', get_template_directory_uri() . '/enhanced-pages.css', array(), '1.0.0');
    
    // Enqueue main JavaScript
    wp_enqueue_script('partypro-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
    
    // Enqueue enhanced pages JavaScript
    wp_enqueue_script('partypro-enhanced-pages', get_template_directory_uri() . '/js/enhanced-pages.js', array('jquery'), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('partypro-main', 'partypro_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('partypro_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'partypro_scripts');

// Enqueue theme styles and scripts
function partypro_enqueue_styles() {
    // Main stylesheet
    wp_enqueue_style('partypro-style', get_stylesheet_uri());
    
    // Responsive styles
    wp_enqueue_style('partypro-responsive', get_template_directory_uri() . '/responsive.css', array(), '1.0');
    
    // Responsive utilities
    wp_enqueue_style('partypro-responsive-utilities', get_template_directory_uri() . '/responsive-utilities.css', array(), '1.0');
    
    // Enhanced pages styles
    wp_enqueue_style('partypro-enhanced-pages', get_template_directory_uri() . '/enhanced-pages.css', array(), '1.0');
    
    // Blog details styles
    wp_enqueue_style('partypro-blog-details', get_template_directory_uri() . '/blog-details-styles.css', array(), '1.0');
    
    // Single post styles
    wp_enqueue_style('partypro-single-post', get_template_directory_uri() . '/single-post-styles.css', array(), '1.0');
    
    // Pricing styles
    wp_enqueue_style('partypro-pricing', get_template_directory_uri() . '/pricing-styles.css', array(), '1.0');
}
add_action('wp_enqueue_scripts', 'partypro_enqueue_styles');

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

// Helper function to get page URL by slug
function partypro_get_page_url($slug) {
    $page = get_page_by_path($slug);
    if ($page) {
        return get_permalink($page->ID);
    }
    return home_url('/' . $slug . '/');
}

// Helper function to get dynamic contact information
function partypro_get_contact_phone($format = 'display') {
    $phone = get_theme_mod('contact_phone', '+91 98765 43210');
    
    if ($format === 'tel') {
        return str_replace([' ', '-', '(', ')'], '', $phone);
    } elseif ($format === 'whatsapp') {
        return str_replace(['+', ' ', '-', '(', ')'], '', $phone);
    }
    
    return $phone;
}

// Helper function to get contact email
function partypro_get_contact_email() {
    return get_theme_mod('contact_email', 'info@partyprorentals.com');
}

// Helper function to get contact address
function partypro_get_contact_address() {
    return get_theme_mod('contact_address', '123 Party Street, Your City');
}

// Shortcode for contact button
function partypro_contact_button_shortcode($atts) {
    $atts = shortcode_atts(array(
        'type' => 'contact',
        'text' => 'Contact Us',
        'class' => 'btn btn-primary'
    ), $atts);
    
    $url = '';
    switch ($atts['type']) {
        case 'phone':
            $url = 'tel:' . partypro_get_contact_phone('tel');
            break;
        case 'whatsapp':
            $url = 'https://wa.me/' . partypro_get_contact_phone('whatsapp');
            break;
        case 'email':
            $url = 'mailto:' . partypro_get_contact_email();
            break;
        default:
            $url = partypro_get_page_url('contact');
    }
    
    return '<a href="' . esc_url($url) . '" class="' . esc_attr($atts['class']) . '">' . esc_html($atts['text']) . '</a>';
}
add_shortcode('contact_button', 'partypro_contact_button_shortcode');

// Debug function to check template loading
function partypro_debug_template() {
    if (is_admin() || !current_user_can('manage_options')) {
        return;
    }
    
    global $template;
    if (WP_DEBUG) {
        echo '<!-- Template: ' . basename($template) . ' -->';
        if (is_page()) {
            global $post;
            echo '<!-- Page slug: ' . $post->post_name . ' -->';
        }
    }
}
add_action('wp_footer', 'partypro_debug_template');

// Force page template assignment
function partypro_force_page_templates() {
    // Get all pages
    $pages = get_pages();
    
    foreach ($pages as $page) {
        $slug = $page->post_name;
        
        // Assign custom templates based on slug
        switch ($slug) {
            case 'services':
                update_post_meta($page->ID, '_wp_page_template', 'page-services.php');
                break;
            case 'pricing':
                update_post_meta($page->ID, '_wp_page_template', 'page-pricing.php');
                break;
            case 'contact':
                update_post_meta($page->ID, '_wp_page_template', 'page-contact.php');
                break;
            case 'about':
                update_post_meta($page->ID, '_wp_page_template', 'page-about.php');
                break;
        }
    }
}

// Run this on theme activation
add_action('after_switch_theme', 'partypro_force_page_templates');
add_action('after_switch_theme', 'partypro_create_default_pages');
add_action('after_switch_theme', 'partypro_flush_rewrite_rules');

// Also run on admin init to ensure pages exist
add_action('admin_init', 'partypro_ensure_pages_exist');

function partypro_ensure_pages_exist() {
    // Check if our pages exist, if not create them
    $required_pages = array('services', 'pricing', 'contact', 'about');
    
    foreach ($required_pages as $page_slug) {
        if (!get_page_by_path($page_slug)) {
            partypro_create_default_pages();
            break;
        }
    }
}

// Flush rewrite rules to ensure proper page loading
function partypro_flush_rewrite_rules() {
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'partypro_flush_rewrite_rules');

// Emergency page content injection
function partypro_emergency_page_content($content) {
    if (is_page()) {
        global $post;
        $page_slug = $post->post_name;
        
        // If content is empty, inject our custom content
        if (empty(trim($content))) {
            switch ($page_slug) {
                case 'services':
                    return partypro_get_services_content();
                case 'pricing':
                    return partypro_get_pricing_content();
                case 'contact':
                    return partypro_get_contact_content();
                case 'about':
                    return partypro_get_about_content();
            }
        }
    }
    return $content;
}
add_filter('the_content', 'partypro_emergency_page_content');

function partypro_get_services_content() {
    return '
    <div class="services-grid">
        <div class="service-card">
            <h3>🎪 Tent Rentals</h3>
            <p>Weather protection for outdoor events with various sizes available.</p>
        </div>
        <div class="service-card">
            <h3>🪑 Tables & Chairs</h3>
            <p>Complete seating solutions for your guests with high-quality furniture.</p>
        </div>
        <div class="service-card">
            <h3>🍽️ Dinnerware & Linens</h3>
            <p>Elegant table settings and premium linens to enhance your event.</p>
        </div>
        <div class="service-card">
            <h3>💡 Lighting & Decor</h3>
            <p>Create the perfect ambiance with professional lighting.</p>
        </div>
        <div class="service-card">
            <h3>🎵 Audio & Entertainment</h3>
            <p>Professional sound systems and entertainment equipment.</p>
        </div>
        <div class="service-card">
            <h3>🎂 Specialty Items</h3>
            <p>Unique rental items to make your event extra special.</p>
        </div>
    </div>';
}

function partypro_get_pricing_content() {
    return '
    <div class="pricing-grid">
        <div class="pricing-card">
            <h3>Starter Package</h3>
            <div class="price">₹15,000</div>
            <p>Perfect for small gatherings (up to 30 guests)</p>
        </div>
        <div class="pricing-card featured">
            <h3>Standard Package</h3>
            <div class="price">₹35,000</div>
            <p>Ideal for weddings (up to 100 guests)</p>
        </div>
        <div class="pricing-card">
            <h3>Premium Package</h3>
            <div class="price">₹65,000</div>
            <p>Luxury experience (up to 200 guests)</p>
        </div>
    </div>';
}

function partypro_get_contact_content() {
    return '
    <div class="contact-info">
        <h3>Get in Touch</h3>
        <p><strong>Phone:</strong> +91 98765 43210</p>
        <p><strong>Email:</strong> info@partyrentals.com</p>
        <p><strong>Address:</strong> 123 Event Street, Party District</p>
        <p><strong>Hours:</strong> Monday - Friday: 9:00 AM - 6:00 PM</p>
    </div>';
}

function partypro_get_about_content() {
    return '
    <div class="about-content">
        <h3>About Our Party Rentals</h3>
        <p>We are a premier party rental company dedicated to making your special events unforgettable. With years of experience in the industry, we provide high-quality equipment and professional service.</p>
        <p>Our mission is to help you create magical moments that your guests will remember forever.</p>
    </div>';
}

// Blog helper functions
function get_post_views($post_id) {
    $views = get_post_meta($post_id, '_post_views', true);
    return $views ? $views : rand(100, 1000); // Fallback to random number for demo
}

function set_post_views($post_id) {
    $views = get_post_meta($post_id, '_post_views', true);
    $views = $views ? $views + 1 : 1;
    update_post_meta($post_id, '_post_views', $views);
}

// Track post views on single post pages
function partypro_track_post_views() {
    if (is_single()) {
        set_post_views(get_the_ID());
    }
}
add_action('wp_head', 'partypro_track_post_views');

// Add blog page template to the custom templates list
function partypro_add_blog_template($templates) {
    $templates['page-blog.php'] = 'Blog Page';
    return $templates;
}
add_filter('theme_page_templates', 'partypro_add_blog_template');

// Create Blog page if it doesn't exist
function partypro_create_blog_page() {
    if (!get_page_by_path('blog')) {
        $blog_page = array(
            'post_title'    => 'Blog',
            'post_content'  => 'Our latest articles, tips, and insights.',
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'post_name'     => 'blog'
        );
        $blog_id = wp_insert_post($blog_page);
        if ($blog_id) {
            update_post_meta($blog_id, '_wp_page_template', 'page-blog.php');
        }
    }
}
add_action('after_setup_theme', 'partypro_create_blog_page');

// Enqueue scripts in the header
function partypro_enqueue_scripts() {
    // Header scripts
    wp_enqueue_script('partypro-header', get_template_directory_uri() . '/js/header.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'partypro_enqueue_scripts');
