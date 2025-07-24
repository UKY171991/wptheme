<?php
/**
 * Service Blueprint Theme Functions
 * 
 * @package ServiceBlueprint
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Theme version and debug info
define('SERVICE_BLUEPRINT_VERSION', '1.0.0');
define('SERVICE_BLUEPRINT_DEBUG', true);

// Debug function
function service_blueprint_debug_log($message) {
    if (SERVICE_BLUEPRINT_DEBUG && function_exists('error_log')) {
        error_log('Service Blueprint Theme: ' . $message);
    }
}

// Include required files with error handling
$include_files = array(
    get_template_directory() . '/inc/nav-walker.php',
    get_template_directory() . '/inc/meta-boxes.php',
    get_template_directory() . '/inc/theme-init.php'
);

foreach ($include_files as $file) {
    if (file_exists($file)) {
        require_once $file;
    } else {
        error_log('Service Blueprint Theme: Missing file - ' . $file);
    }
}

/**
 * Theme Setup
 */
function service_blueprint_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('responsive-embeds');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'service-blueprint'),
        'footer' => esc_html__('Footer Menu', 'service-blueprint'),
    ));
    
    // Add image sizes
    add_image_size('service-thumbnail', 400, 300, true);
    add_image_size('service-banner', 1200, 400, true);
    add_image_size('category-icon', 100, 100, true);
}
add_action('after_setup_theme', 'service_blueprint_setup');

/**
 * Fallback menu function
 */
function service_blueprint_fallback_menu() {
    echo '<ul id="primary-menu" class="nav-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'service-blueprint') . '</a></li>';
    if (get_post_type_archive_link('service')) {
        echo '<li><a href="' . esc_url(get_post_type_archive_link('service')) . '">' . esc_html__('Services', 'service-blueprint') . '</a></li>';
    }
    echo '<li><a href="' . esc_url(home_url('/about/')) . '">' . esc_html__('About', 'service-blueprint') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact/')) . '">' . esc_html__('Contact', 'service-blueprint') . '</a></li>';
    echo '</ul>';
}

/**
 * Register widget areas
 */
function service_blueprint_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'service-blueprint'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'service-blueprint'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 1', 'service-blueprint'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here for the first footer column.', 'service-blueprint'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 2', 'service-blueprint'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Add widgets here for the second footer column.', 'service-blueprint'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 3', 'service-blueprint'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Add widgets here for the third footer column.', 'service-blueprint'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'service_blueprint_widgets_init');

/**
 * Enqueue Scripts and Styles
 */
function service_blueprint_scripts() {
    // Main stylesheet
    wp_enqueue_style('service-blueprint-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), null);
    
    // Main JavaScript
    wp_enqueue_script('service-blueprint-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
    
    // Conditional scripts
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    
    // Localize script for AJAX
    wp_localize_script('service-blueprint-main', 'serviceBlueprint', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('service_blueprint_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'service_blueprint_scripts');

/**
 * Register Custom Post Type: Services
 */
function register_services_post_type() {
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
        'has_archive' => true,
        'menu_icon' => 'dashicons-admin-tools',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'rewrite' => array('slug' => 'services'),
        'show_in_rest' => true,
    );

    register_post_type('service', $args);
}
add_action('init', 'register_services_post_type');

/**
 * Register Custom Taxonomy: Service Categories
 */
function register_service_categories_taxonomy() {
    $labels = array(
        'name' => 'Service Categories',
        'singular_name' => 'Service Category',
        'search_items' => 'Search Categories',
        'all_items' => 'All Categories',
        'parent_item' => 'Parent Category',
        'parent_item_colon' => 'Parent Category:',
        'edit_item' => 'Edit Category',
        'update_item' => 'Update Category',
        'add_new_item' => 'Add New Category',
        'new_item_name' => 'New Category Name',
        'menu_name' => 'Categories',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'service-category'),
        'show_in_rest' => true,
    );

    register_taxonomy('service_category', array('service'), $args);
}
add_action('init', 'register_service_categories_taxonomy');

// Service categories are created in theme-init.php

/**
 * Add Custom Fields to Service Categories
 */
function add_service_category_fields($tag) {
    $icon = get_term_meta($tag->term_id, 'category_icon', true);
    $banner_image = get_term_meta($tag->term_id, 'banner_image', true);
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="category_icon">Category Icon</label></th>
        <td>
            <input type="text" name="category_icon" id="category_icon" value="<?php echo esc_attr($icon); ?>" />
            <p class="description">Enter an emoji or icon for this category</p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="banner_image">Banner Image URL</label></th>
        <td>
            <input type="url" name="banner_image" id="banner_image" value="<?php echo esc_url($banner_image); ?>" size="50" />
            <p class="description">Enter the URL for the category banner image</p>
        </td>
    </tr>
    <?php
}
add_action('service_category_edit_form_fields', 'add_service_category_fields');

/**
 * Save Custom Fields for Service Categories
 */
function save_service_category_fields($term_id) {
    if (isset($_POST['category_icon'])) {
        update_term_meta($term_id, 'category_icon', sanitize_text_field($_POST['category_icon']));
    }
    if (isset($_POST['banner_image'])) {
        update_term_meta($term_id, 'banner_image', esc_url_raw($_POST['banner_image']));
    }
}
add_action('edited_service_category', 'save_service_category_fields');

/**
 * Get Services by Category
 */
function get_services_by_category($category_slug, $limit = -1) {
    $args = array(
        'post_type' => 'service',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'service_category',
                'field' => 'slug',
                'terms' => $category_slug
            )
        )
    );
    
    return new WP_Query($args);
}

/**
 * Get Related Services
 */
function get_related_services($post_id, $limit = 3) {
    $categories = wp_get_post_terms($post_id, 'service_category', array('fields' => 'ids'));
    
    if (empty($categories)) {
        return new WP_Query();
    }
    
    $args = array(
        'post_type' => 'service',
        'posts_per_page' => $limit,
        'post__not_in' => array($post_id),
        'tax_query' => array(
            array(
                'taxonomy' => 'service_category',
                'field' => 'term_id',
                'terms' => $categories
            )
        )
    );
    
    return new WP_Query($args);
}

/**
 * Customizer Settings
 */
function service_blueprint_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title' => 'Hero Section',
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Welcome to Our Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label' => 'Hero Title',
        'section' => 'hero_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Discover our comprehensive range of professional services',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label' => 'Hero Subtitle',
        'section' => 'hero_section',
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting('hero_cta_text', array(
        'default' => 'Explore Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_cta_text', array(
        'label' => 'CTA Button Text',
        'section' => 'hero_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_cta_url', array(
        'default' => '#services',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('hero_cta_url', array(
        'label' => 'CTA Button URL',
        'section' => 'hero_section',
        'type' => 'url',
    ));
    
    // Theme Options
    $wp_customize->add_section('theme_options', array(
        'title' => 'Theme Options',
        'priority' => 35,
    ));
    
    $wp_customize->add_setting('show_category_icons', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    
    $wp_customize->add_control('show_category_icons', array(
        'label' => 'Show Category Icons',
        'section' => 'theme_options',
        'type' => 'checkbox',
    ));
    
    $wp_customize->add_setting('enable_parallax', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    
    $wp_customize->add_control('enable_parallax', array(
        'label' => 'Enable Parallax Effects',
        'section' => 'theme_options',
        'type' => 'checkbox',
    ));
}
add_action('customize_register', 'service_blueprint_customize_register');

/**
 * Add Custom Body Classes
 */
function service_blueprint_body_classes($classes) {
    if (get_theme_mod('enable_parallax', true)) {
        $classes[] = 'parallax-enabled';
    }
    
    if (is_post_type_archive('service') || is_tax('service_category')) {
        $classes[] = 'service-archive';
    }
    
    if (is_singular('service')) {
        $classes[] = 'single-service';
    }
    
    return $classes;
}
add_filter('body_class', 'service_blueprint_body_classes');

/**
 * Custom Excerpt Length
 */
function service_blueprint_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'service_blueprint_excerpt_length');

/**
 * Custom Excerpt More
 */
function service_blueprint_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'service_blueprint_excerpt_more');

/**
 * Simplified Customizer Setup
 */
function service_blueprint_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('service_blueprint_hero', array(
        'title' => __('Hero Section', 'service-blueprint'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('service_blueprint_hero_title', array(
        'default' => 'Transform Your Business with Expert Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('service_blueprint_hero_title', array(
        'label' => __('Hero Title', 'service-blueprint'),
        'section' => 'service_blueprint_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('service_blueprint_hero_subtitle', array(
        'default' => 'We provide comprehensive digital solutions to help your business grow and succeed.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('service_blueprint_hero_subtitle', array(
        'label' => __('Hero Subtitle', 'service-blueprint'),
        'section' => 'service_blueprint_hero',
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting('service_blueprint_hero_button_text', array(
        'default' => 'Explore Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('service_blueprint_hero_button_text', array(
        'label' => __('Hero Button Text', 'service-blueprint'),
        'section' => 'service_blueprint_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('service_blueprint_hero_button_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('service_blueprint_hero_button_url', array(
        'label' => __('Hero Button URL', 'service-blueprint'),
        'section' => 'service_blueprint_hero',
        'type' => 'url',
    ));
}
add_action('customize_register', 'service_blueprint_customize_register');

/**
 * Add Admin Styles
 */
function service_blueprint_admin_styles() {
    wp_enqueue_style('service-blueprint-admin', get_template_directory_uri() . '/admin/admin-style.css');
}
add_action('admin_enqueue_scripts', 'service_blueprint_admin_styles');

/**
 * Flush Rewrite Rules on Theme Activation
 */
function service_blueprint_flush_rewrites() {
    // Ensure post types and taxonomies are registered
    if (function_exists('register_services_post_type')) {
        register_services_post_type();
    }
    if (function_exists('register_service_categories_taxonomy')) {
        register_service_categories_taxonomy();
    }
    
    // Only create default content if functions exist
    if (function_exists('create_default_service_categories')) {
        create_default_service_categories();
    }
    if (function_exists('service_blueprint_create_default_menu')) {
        service_blueprint_create_default_menu();
    }
    
    // Flush rewrite rules
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'service_blueprint_flush_rewrites');

/**
 * Handle contact form submission
 */
function handle_contact_form() {
    // Check nonce
    if (!wp_verify_nonce($_POST['contact_nonce'], 'contact_form_nonce')) {
        wp_send_json_error('Security check failed.');
        return;
    }
    
    // Sanitize form data
    $name = sanitize_text_field($_POST['contact_name']);
    $email = sanitize_email($_POST['contact_email']);
    $phone = sanitize_text_field($_POST['contact_phone']);
    $company = sanitize_text_field($_POST['contact_company']);
    $service = sanitize_text_field($_POST['contact_service']);
    $budget = sanitize_text_field($_POST['contact_budget']);
    $message = sanitize_textarea_field($_POST['contact_message']);
    
    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error('Please fill in all required fields.');
        return;
    }
    
    if (!is_email($email)) {
        wp_send_json_error('Please enter a valid email address.');
        return;
    }
    
    // Prepare email
    $to = get_option('admin_email');
    $subject = 'New Contact Form Submission from ' . get_bloginfo('name');
    
    $email_content = "New contact form submission:\n\n";
    $email_content .= "Name: " . $name . "\n";
    $email_content .= "Email: " . $email . "\n";
    $email_content .= "Phone: " . $phone . "\n";
    $email_content .= "Company: " . $company . "\n";
    $email_content .= "Service: " . $service . "\n";
    $email_content .= "Budget: " . $budget . "\n";
    $email_content .= "Message:\n" . $message . "\n\n";
    $email_content .= "Submitted from: " . home_url() . "\n";
    $email_content .= "Date: " . current_time('mysql') . "\n";
    
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . $name . ' <' . $email . '>',
        'Reply-To: ' . $email
    );
    
    // Send email
    if (wp_mail($to, $subject, $email_content, $headers)) {
        wp_send_json_success('Thank you for your message! We\'ll get back to you soon.');
    } else {
        wp_send_json_error('Sorry, there was a problem sending your message. Please try again.');
    }
}
add_action('wp_ajax_handle_contact_form', 'handle_contact_form');
add_action('wp_ajax_nopriv_handle_contact_form', 'handle_contact_form');

/**
 * Handle AJAX form submissions
 */
function service_blueprint_handle_contact_form() {
    check_ajax_referer('service_blueprint_nonce', 'nonce');
    
    // Process contact form data here
    $name = sanitize_text_field($_POST['client_name']);
    $email = sanitize_email($_POST['client_email']);
    $phone = sanitize_text_field($_POST['client_phone']);
    $message = sanitize_textarea_field($_POST['service_message']);
    $service_id = intval($_POST['service_id']);
    
    // Send email notification
    $to = get_option('admin_email');
    $subject = 'New Service Quote Request';
    $body = "Name: $name\nEmail: $email\nPhone: $phone\nService: " . get_the_title($service_id) . "\nMessage: $message";
    
    if (wp_mail($to, $subject, $body)) {
        wp_send_json_success('Message sent successfully');
    } else {
        wp_send_json_error('Failed to send message');
    }
}
add_action('wp_ajax_submit_contact_form', 'service_blueprint_handle_contact_form');
add_action('wp_ajax_nopriv_submit_contact_form', 'service_blueprint_handle_contact_form');

/**
 * Add theme support for Block Editor
 */
function service_blueprint_block_editor_setup() {
    // Add support for editor styles
    add_theme_support('editor-styles');
    
    // Add custom color palette
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => __('Primary Blue', 'service-blueprint'),
            'slug'  => 'primary-blue',
            'color' => '#2563eb',
        ),
        array(
            'name'  => __('Secondary Purple', 'service-blueprint'),
            'slug'  => 'secondary-purple',
            'color' => '#7c3aed',
        ),
        array(
            'name'  => __('Success Green', 'service-blueprint'),
            'slug'  => 'success-green',
            'color' => '#10b981',
        ),
        array(
            'name'  => __('Warning Orange', 'service-blueprint'),
            'slug'  => 'warning-orange',
            'color' => '#f59e0b',
        ),
        array(
            'name'  => __('Dark Gray', 'service-blueprint'),
            'slug'  => 'dark-gray',
            'color' => '#1f2937',
        ),
        array(
            'name'  => __('Light Gray', 'service-blueprint'),
            'slug'  => 'light-gray',
            'color' => '#f9fafb',
        ),
    ));
    
    // Add support for custom font sizes
    add_theme_support('editor-font-sizes', array(
        array(
            'name' => __('Small', 'service-blueprint'),
            'size' => 14,
            'slug' => 'small'
        ),
        array(
            'name' => __('Regular', 'service-blueprint'),
            'size' => 16,
            'slug' => 'normal'
        ),
        array(
            'name' => __('Large', 'service-blueprint'),
            'size' => 20,
            'slug' => 'large'
        ),
        array(
            'name' => __('Extra Large', 'service-blueprint'),
            'size' => 24,
            'slug' => 'extra-large'
        ),
    ));
}
add_action('after_setup_theme', 'service_blueprint_block_editor_setup');
?>
