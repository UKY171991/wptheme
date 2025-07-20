<?php
/**
 * BluePrint WordPress Theme Functions
 * 
 * This file contains all the theme setup and functionality
 */

// Security check
if (!defined('ABSPATH')) {
    exit;
}

// Include custom Bootstrap Nav Walker class for enhanced menu
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Theme setup
 */
function blueprint_theme_setup() {
    // Make theme available for translation
    load_theme_textdomain('blueprint', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Add custom logo support
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Switch default core markup for search form, comment form, and comments to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Add support for editor styles
    add_theme_support('editor-styles');

    // Add support for wp-block-styles
    add_theme_support('wp-block-styles');

    // Add support for align-wide
    add_theme_support('align-wide');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'blueprint'),
        'footer'  => __('Footer Menu', 'blueprint'),
        'footer-primary' => __('Footer Primary Links', 'blueprint'),
        'footer-services' => __('Footer Services Menu', 'blueprint'),
        'footer-legal' => __('Footer Legal Menu', 'blueprint'),
        'footer-secondary' => __('Footer Secondary Menu', 'blueprint'),
    ));
    
    // Add custom image sizes
    add_image_size('blueprint-thumbnail', 300, 200, true);
    add_image_size('blueprint-featured', 800, 450, true);
    add_image_size('hero-image', 1920, 1080, true);
    
    // Set content width
    if (!isset($content_width)) {
        $content_width = 1200;
    }
}
add_action('after_setup_theme', 'blueprint_theme_setup');

/**
 * Enqueue scripts and styles
 */
function blueprint_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style(
        'blueprint-fonts', 
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap', 
        array(), 
        null
    );
    
    // Enqueue Bootstrap CSS
    wp_enqueue_style(
        'bootstrap', 
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', 
        array(), 
        '5.3.0'
    );
    
    // Enqueue Bootstrap Icons
    wp_enqueue_style(
        'bootstrap-icons', 
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css', 
        array(), 
        '1.10.0'
    );
    
    // Enqueue main stylesheet
    wp_enqueue_style(
        'blueprint-style', 
        get_stylesheet_uri(), 
        array('bootstrap'), 
        filemtime(get_template_directory() . '/style.css')
    );
    
    // Enqueue theme-specific CSS files (only essential ones)
    $css_files = array(
        'blueprint-layout' => '/css/layout-improvements.css',
        'blueprint-enhanced-layouts' => '/css/enhanced-layouts.css',
        'blueprint-menu' => '/css/bootstrap-menu-ml.css',
        'blueprint-responsive' => '/css/responsive-enhancements.css',
        'blueprint-theme-fixes' => '/css/theme-layout-fixes.css',
        'blueprint-header-enhanced' => '/css/enhanced-header-design.css',
        'blueprint-footer-enhanced' => '/css/enhanced-footer-design.css',
        'blueprint-about-enhanced' => '/css/enhanced-about-page.css',
        'blueprint-service-pages' => '/css/service-pages-enhanced.css',
        'blueprint-services-page' => '/css/page-services-enhanced.css',
        'blueprint-single-service' => '/css/single-service-enhanced.css',
    );
    
    foreach ($css_files as $handle => $file) {
        $full_path = get_template_directory() . $file;
        if (file_exists($full_path)) {
            wp_enqueue_style(
                $handle, 
                get_template_directory_uri() . $file, 
                array('blueprint-style'), 
                filemtime($full_path)
            );
        }
    }
    
    // Enqueue JavaScript
    wp_enqueue_script(
        'bootstrap-bundle', 
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', 
        array(), 
        '5.3.0', 
        true
    );
    
    $js_files = array(
        'blueprint-main' => '/js/main.js',
        'blueprint-menu' => '/js/bootstrap-menu.js',
        'blueprint-header-footer' => '/js/enhanced-header-footer.js',
    );
    
    foreach ($js_files as $handle => $file) {
        $full_path = get_template_directory() . $file;
        if (file_exists($full_path)) {
            wp_enqueue_script(
                $handle, 
                get_template_directory_uri() . $file, 
                array('jquery', 'bootstrap-bundle'), 
                filemtime($full_path), 
                true
            );
        }
    }
    
    // Conditional scripts for specific pages
    if (is_page('services')) {
        $services_js = get_template_directory() . '/js/service-filter.js';
        if (file_exists($services_js)) {
            wp_enqueue_script(
                'blueprint-services', 
                get_template_directory_uri() . '/js/service-filter.js', 
                array('jquery'), 
                filemtime($services_js), 
                true
            );
        }
    }
    
    // Localize script for AJAX
    wp_localize_script('blueprint-main', 'blueprint_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('blueprint_nonce'),
        'site_url' => home_url('/'),
    ));
    
    // Load comment reply script for threaded comments
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'blueprint_scripts');

/**
 * Register widget areas
 */
function blueprint_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'blueprint'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'blueprint'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer 1', 'blueprint'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in your footer.', 'blueprint'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer 2', 'blueprint'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in your footer.', 'blueprint'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer 3', 'blueprint'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in your footer.', 'blueprint'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'blueprint_widgets_init');

/**
 * Customizer additions
 */
function blueprint_customize_register($wp_customize) {
    // Add Hero Section
    $wp_customize->add_section('blueprint_hero', array(
        'title'    => __('Hero Section', 'blueprint'),
        'priority' => 30,
    ));
    
    // Hero Title
    $wp_customize->add_setting('hero_title', array(
        'default'           => '75 Proven Business Blueprints',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label'   => __('Hero Title', 'blueprint'),
        'section' => 'blueprint_hero',
        'type'    => 'text',
    ));
    
    // Hero Subtitle
    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => 'Discover profitable business opportunities with detailed startup guides, cost analysis, and step-by-step implementation plans.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label'   => __('Hero Subtitle', 'blueprint'),
        'section' => 'blueprint_hero',
        'type'    => 'textarea',
    ));
    
    // Hero Image
    $wp_customize->add_setting('hero_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', array(
        'label'   => __('Hero Image', 'blueprint'),
        'section' => 'blueprint_hero',
    )));
    
    // Add contact information section
    $wp_customize->add_section('blueprint_contact', array(
        'title'    => __('Contact Information', 'blueprint'),
        'priority' => 35,
    ));
    
    // Contact Phone
    $wp_customize->add_setting('contact_phone', array(
        'default'           => '+1 (555) 123-4567',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_phone', array(
        'label'   => __('Phone Number', 'blueprint'),
        'section' => 'blueprint_contact',
        'type'    => 'text',
    ));
    
    // Contact Email
    $wp_customize->add_setting('contact_email', array(
        'default'           => 'info@blueprintfolder.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label'   => __('Email Address', 'blueprint'),
        'section' => 'blueprint_contact',
        'type'    => 'email',
    ));
    
    // Contact Address
    $wp_customize->add_setting('contact_address', array(
        'default'           => '123 Business Street, Enterprise City',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_address', array(
        'label'   => __('Address', 'blueprint'),
        'section' => 'blueprint_contact',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'blueprint_customize_register');

/**
 * Fallback menu for primary navigation
 */
function blueprint_fallback_menu() {
    echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0">';
    echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(home_url('/')) . '">' . __('Home', 'blueprint') . '</a></li>';
    
    $pages = array('services', 'pricing', 'about', 'contact');
    foreach ($pages as $page_slug) {
        $page = get_page_by_path($page_slug);
        if ($page) {
            echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(get_permalink($page)) . '">' . esc_html(get_the_title($page)) . '</a></li>';
        }
    }
    echo '</ul>';
}

/**
 * Create default pages on theme activation
 */
function blueprint_create_default_pages() {
    if (get_option('blueprint_pages_created') !== 'yes') {
        $pages = array(
            'services' => array(
                'title' => 'All Services',
                'content' => 'Browse our comprehensive collection of professional services designed to make your life easier.',
                'template' => 'page-services.php'
            ),
            'service' => array(
                'title' => 'Service Redirect',
                'content' => 'This page handles service redirects.',
                'template' => 'page-service.php'
            ),
            'pricing' => array(
                'title' => 'Pricing',
                'content' => 'Affordable pricing for all services with transparent costs and no hidden fees.',
                'template' => 'page-pricing.php'
            ),
            'about' => array(
                'title' => 'About',
                'content' => 'Learn about our mission to provide exceptional services and customer satisfaction.',
                'template' => 'page-about.php'
            ),
            'contact' => array(
                'title' => 'Contact',
                'content' => 'Get in touch with us to discuss your service needs and request a quote.',
                'template' => 'page-contact.php'
            ),
        );
        
        foreach ($pages as $slug => $page_data) {
            if (!get_page_by_path($slug)) {
                $page_id = wp_insert_post(array(
                    'post_title'   => $page_data['title'],
                    'post_content' => $page_data['content'],
                    'post_status'  => 'publish',
                    'post_type'    => 'page',
                    'post_name'    => $slug
                ));
                
                if ($page_id && !empty($page_data['template'])) {
                    update_post_meta($page_id, '_wp_page_template', $page_data['template']);
                }
            }
        }
        
        // Create some sample service posts
        blueprint_create_sample_services();
        
        update_option('blueprint_pages_created', 'yes');
    }
}
add_action('after_setup_theme', 'blueprint_create_default_pages');

/**
 * Create sample service posts
 */
function blueprint_create_sample_services() {
    $sample_services = array(
        'house-cleaning' => array(
            'title' => 'House Cleaning',
            'content' => 'Professional house cleaning services to keep your home spotless and organized.',
            'price' => '$80-150',
            'duration' => '2-4 hours',
            'category' => 'cleaning'
        ),
        'dog-walking' => array(
            'title' => 'Dog Walking',
            'content' => 'Reliable dog walking services to keep your furry friends happy and healthy.',
            'price' => '$25-40',
            'duration' => '30-60 minutes',
            'category' => 'pets'
        ),
        'virtual-assistant' => array(
            'title' => 'Virtual Assistant',
            'content' => 'Professional virtual assistant services for administrative tasks and business support.',
            'price' => '$25-50/hour',
            'duration' => 'Flexible',
            'category' => 'digital'
        ),
        'graphic-design' => array(
            'title' => 'Graphic Design',
            'content' => 'Creative graphic design services for logos, branding, and marketing materials.',
            'price' => '$50-200',
            'duration' => '1-7 days',
            'category' => 'digital'
        )
    );
    
    foreach ($sample_services as $slug => $service_data) {
        if (!get_page_by_path($slug, OBJECT, 'service')) {
            $post_id = wp_insert_post(array(
                'post_title'   => $service_data['title'],
                'post_content' => $service_data['content'],
                'post_status'  => 'publish',
                'post_type'    => 'service',
                'post_name'    => $slug
            ));
            
            if ($post_id) {
                update_post_meta($post_id, 'service_price', $service_data['price']);
                update_post_meta($post_id, 'service_duration', $service_data['duration']);
                update_post_meta($post_id, 'service_category', $service_data['category']);
            }
        }
    }
}
add_action('after_setup_theme', 'blueprint_create_default_pages');

/**
 * Register Service Custom Post Type
 */
function blueprint_register_service_post_type() {
    $labels = array(
        'name'                  => 'Services',
        'singular_name'         => 'Service',
        'menu_name'             => 'Services',
        'name_admin_bar'        => 'Service',
        'archives'              => 'Service Archives',
        'attributes'            => 'Service Attributes',
        'parent_item_colon'     => 'Parent Service:',
        'all_items'             => 'All Services',
        'add_new_item'          => 'Add New Service',
        'add_new'               => 'Add New',
        'new_item'              => 'New Service',
        'edit_item'             => 'Edit Service',
        'update_item'           => 'Update Service',
        'view_item'             => 'View Service',
        'view_items'            => 'View Services',
        'search_items'          => 'Search Services',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
    );
    
    $args = array(
        'label'                 => 'Service',
        'description'           => 'Service pages for the website',
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-admin-tools',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => array(
            'slug'                  => 'services',
            'with_front'            => false,
        ),
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    
    register_post_type('service', $args);
}
add_action('init', 'blueprint_register_service_post_type', 0);

/**
 * Add custom rewrite rules for service pages
 */
function blueprint_custom_rewrite_rules() {
    add_rewrite_rule('^service/([^/]*)/.*$', 'index.php?service=$matches[1]', 'top');
    add_rewrite_rule('^service/([^/]*)/?$', 'index.php?service=$matches[1]', 'top');
}
add_action('init', 'blueprint_custom_rewrite_rules');

/**
 * Add query vars for custom post types
 */
function blueprint_query_vars($vars) {
    $vars[] = 'service';
    return $vars;
}
add_filter('query_vars', 'blueprint_query_vars');

/**
 * Custom template redirect for service pages
 */
function blueprint_template_redirect() {
    global $wp_query;
    
    if (get_query_var('service')) {
        $service_slug = get_query_var('service');
        
        // Check if it's a custom service page template
        $template_file = get_template_directory() . '/single-' . $service_slug . '.php';
        if (file_exists($template_file)) {
            include($template_file);
            exit;
        }
        
        // Check if it's a service post
        $service_post = get_page_by_path($service_slug, OBJECT, 'service');
        if ($service_post) {
            global $post;
            $post = $service_post;
            setup_postdata($post);
            
            // Load single-service.php if it exists, otherwise single.php
            $template = locate_template(array('single-service.php', 'single.php'));
            if ($template) {
                include($template);
                exit;
            }
        }
        
        // If no template found, show 404
        global $wp_query;
        $wp_query->set_404();
        status_header(404);
        include(get_404_template());
        exit;
    }
}
add_action('template_redirect', 'blueprint_template_redirect');

/**
 * Flush rewrite rules on theme activation
 */
function blueprint_flush_rewrite_rules() {
    blueprint_register_service_post_type();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'blueprint_flush_rewrite_rules');

/**
 * Add theme support for editor color palette
 */
function blueprint_editor_color_palette() {
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => __('Primary Blue', 'blueprint'),
            'slug'  => 'primary-blue',
            'color' => '#667eea',
        ),
        array(
            'name'  => __('Secondary Purple', 'blueprint'),
            'slug'  => 'secondary-purple',
            'color' => '#764ba2',
        ),
        array(
            'name'  => __('Success Green', 'blueprint'),
            'slug'  => 'success-green',
            'color' => '#198754',
        ),
        array(
            'name'  => __('Warning Yellow', 'blueprint'),
            'slug'  => 'warning-yellow',
            'color' => '#ffc107',
        ),
        array(
            'name'  => __('Danger Red', 'blueprint'),
            'slug'  => 'danger-red',
            'color' => '#dc3545',
        ),
        array(
            'name'  => __('Dark Gray', 'blueprint'),
            'slug'  => 'dark-gray',
            'color' => '#1e293b',
        ),
        array(
            'name'  => __('Light Gray', 'blueprint'),
            'slug'  => 'light-gray',
            'color' => '#f8fafc',
        ),
    ));
}
add_action('after_setup_theme', 'blueprint_editor_color_palette');

/**
 * Add custom meta boxes for service posts
 */
function blueprint_add_service_meta_boxes() {
    add_meta_box(
        'service-details',
        'Service Details',
        'blueprint_service_details_callback',
        'service',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'blueprint_add_service_meta_boxes');

/**
 * Service details meta box callback
 */
function blueprint_service_details_callback($post) {
    wp_nonce_field('blueprint_service_meta', 'blueprint_service_meta_nonce');
    
    $price = get_post_meta($post->ID, 'service_price', true);
    $duration = get_post_meta($post->ID, 'service_duration', true);
    $category = get_post_meta($post->ID, 'service_category', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="service_price">Service Price</label></th>
            <td><input type="text" id="service_price" name="service_price" value="<?php echo esc_attr($price); ?>" class="regular-text" placeholder="e.g., $50-100 or $25/hour" /></td>
        </tr>
        <tr>
            <th><label for="service_duration">Duration</label></th>
            <td><input type="text" id="service_duration" name="service_duration" value="<?php echo esc_attr($duration); ?>" class="regular-text" placeholder="e.g., 2-3 hours or 1 day" /></td>
        </tr>
        <tr>
            <th><label for="service_category">Category</label></th>
            <td>
                <select id="service_category" name="service_category">
                    <option value="">Select Category</option>
                    <option value="cleaning" <?php selected($category, 'cleaning'); ?>>Cleaning</option>
                    <option value="maintenance" <?php selected($category, 'maintenance'); ?>>Maintenance</option>
                    <option value="personal" <?php selected($category, 'personal'); ?>>Personal</option>
                    <option value="pets" <?php selected($category, 'pets'); ?>>Pets</option>
                    <option value="family" <?php selected($category, 'family'); ?>>Family</option>
                    <option value="digital" <?php selected($category, 'digital'); ?>>Digital</option>
                    <option value="coaching" <?php selected($category, 'coaching'); ?>>Coaching</option>
                    <option value="admin" <?php selected($category, 'admin'); ?>>Admin</option>
                    <option value="selling" <?php selected($category, 'selling'); ?>>Selling</option>
                </select>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Save service meta data
 */
function blueprint_save_service_meta($post_id) {
    if (!isset($_POST['blueprint_service_meta_nonce']) || 
        !wp_verify_nonce($_POST['blueprint_service_meta_nonce'], 'blueprint_service_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['service_price'])) {
        update_post_meta($post_id, 'service_price', sanitize_text_field($_POST['service_price']));
    }

    if (isset($_POST['service_duration'])) {
        update_post_meta($post_id, 'service_duration', sanitize_text_field($_POST['service_duration']));
    }

    if (isset($_POST['service_category'])) {
        update_post_meta($post_id, 'service_category', sanitize_text_field($_POST['service_category']));
    }
}
add_action('save_post', 'blueprint_save_service_meta');

/**
 * Security enhancements
 */
function blueprint_security_headers() {
    // Remove WordPress version from head
    remove_action('wp_head', 'wp_generator');
    
    // Hide WordPress version from RSS feeds
    add_filter('the_generator', '__return_empty_string');
}
add_action('init', 'blueprint_security_headers');

/**
 * Performance optimizations
 */
function blueprint_performance_optimizations() {
    // Remove emoji scripts and styles
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
    
    // Remove unnecessary meta tags
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
}
add_action('init', 'blueprint_performance_optimizations');

/**
 * Custom excerpt length
 */
function blueprint_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'blueprint_excerpt_length');

/**
 * Custom excerpt more text
 */
function blueprint_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'blueprint_excerpt_more');

/**
 * Register FAQ Custom Post Type
 */
function blueprint_register_faq_post_type() {
    $labels = array(
        'name'                  => 'General FAQs',
        'singular_name'         => 'FAQ',
        'menu_name'             => 'General FAQs',
        'name_admin_bar'        => 'FAQ',
        'archives'              => 'FAQ Archives',
        'attributes'            => 'FAQ Attributes',
        'parent_item_colon'     => 'Parent FAQ:',
        'all_items'             => 'All FAQs',
        'add_new_item'          => 'Add New FAQ',
        'add_new'               => 'Add New',
        'new_item'              => 'New FAQ',
        'edit_item'             => 'Edit FAQ',
        'update_item'           => 'Update FAQ',
        'view_item'             => 'View FAQ',
        'view_items'            => 'View FAQs',
        'search_items'          => 'Search FAQs',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
    );
    
    $args = array(
        'label'                 => 'FAQ',
        'description'           => 'General FAQ items for contact page',
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'page-attributes'),
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 25,
        'menu_icon'             => 'dashicons-editor-help',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    
    register_post_type('faq', $args);
}
add_action('init', 'blueprint_register_faq_post_type', 0);

/**
 * Register Pricing FAQ Custom Post Type
 */
function blueprint_register_pricing_faq_post_type() {
    $labels = array(
        'name'                  => 'Pricing FAQs',
        'singular_name'         => 'Pricing FAQ',
        'menu_name'             => 'Pricing FAQs',
        'name_admin_bar'        => 'Pricing FAQ',
        'archives'              => 'Pricing FAQ Archives',
        'attributes'            => 'Pricing FAQ Attributes',
        'parent_item_colon'     => 'Parent Pricing FAQ:',
        'all_items'             => 'All Pricing FAQs',
        'add_new_item'          => 'Add New Pricing FAQ',
        'add_new'               => 'Add New',
        'new_item'              => 'New Pricing FAQ',
        'edit_item'             => 'Edit Pricing FAQ',
        'update_item'           => 'Update Pricing FAQ',
        'view_item'             => 'View Pricing FAQ',
        'view_items'            => 'View Pricing FAQs',
        'search_items'          => 'Search Pricing FAQs',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
    );
    
    $args = array(
        'label'                 => 'Pricing FAQ',
        'description'           => 'Pricing FAQ items for pricing page',
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'page-attributes'),
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 26,
        'menu_icon'             => 'dashicons-money-alt',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    
    register_post_type('pricing_faq', $args);
}
add_action('init', 'blueprint_register_pricing_faq_post_type', 0);

/**
 * Create sample FAQ posts
 */
function blueprint_create_sample_faqs() {
    if (get_option('blueprint_faqs_created') !== 'yes') {
        // General FAQs
        $general_faqs = array(
            array(
                'title' => 'How do I get started?',
                'content' => 'Getting started is easy! Simply browse our services, select what you need, and contact us for a free consultation. We\'ll discuss your requirements and provide a detailed quote.'
            ),
            array(
                'title' => 'Are your services insured?',
                'content' => 'Yes, all our services are fully insured and bonded. We maintain comprehensive liability insurance to protect both our clients and service providers.'
            ),
            array(
                'title' => 'What areas do you serve?',
                'content' => 'We currently serve the greater metropolitan area and surrounding suburbs. Contact us to confirm service availability in your specific location.'
            ),
            array(
                'title' => 'Can I schedule recurring services?',
                'content' => 'Absolutely! Many of our services can be scheduled on a recurring basis - weekly, bi-weekly, monthly, or custom schedules to fit your needs.'
            ),
            array(
                'title' => 'What if I\'m not satisfied?',
                'content' => 'We offer a 100% satisfaction guarantee. If you\'re not completely happy with our service, we\'ll make it right or provide a full refund.'
            )
        );
        
        foreach ($general_faqs as $faq) {
            wp_insert_post(array(
                'post_title'   => $faq['title'],
                'post_content' => $faq['content'],
                'post_status'  => 'publish',
                'post_type'    => 'faq',
                'menu_order'   => 0
            ));
        }
        
        // Pricing FAQs
        $pricing_faqs = array(
            array(
                'title' => 'How is pricing determined?',
                'content' => 'Our pricing is based on the type of service, duration, complexity, and any special requirements. We provide transparent, upfront pricing with no hidden fees.'
            ),
            array(
                'title' => 'Do you offer package deals?',
                'content' => 'Yes! We offer discounted package deals for multiple services and recurring customers. Contact us to learn about current promotions and bundle options.'
            ),
            array(
                'title' => 'What payment methods do you accept?',
                'content' => 'We accept all major credit cards, debit cards, bank transfers, and cash payments. Payment is typically due upon completion of service.'
            ),
            array(
                'title' => 'Are there any additional fees?',
                'content' => 'Our quoted prices include everything needed to complete the service. Any additional fees (such as rush service or special materials) will be discussed and approved before work begins.'
            ),
            array(
                'title' => 'Can I get a custom quote?',
                'content' => 'Absolutely! Every project is unique, and we\'re happy to provide custom quotes based on your specific needs and requirements. Contact us for a free consultation.'
            )
        );
        
        foreach ($pricing_faqs as $faq) {
            wp_insert_post(array(
                'post_title'   => $faq['title'],
                'post_content' => $faq['content'],
                'post_status'  => 'publish',
                'post_type'    => 'pricing_faq',
                'menu_order'   => 0
            ));
        }
        
        update_option('blueprint_faqs_created', 'yes');
    }
}
add_action('after_setup_theme', 'blueprint_create_sample_faqs');

/**
 * Add CSS for clickable category cards
 */
function blueprint_add_category_card_styles() {
    ?>
    <style>
    .category-card-hover {
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }
    
    .category-card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
    }
    
    .category-card-hover .category-arrow {
        transition: transform 0.3s ease;
    }
    
    .category-card-hover:hover .category-arrow {
        transform: translateX(5px);
    }
    
    .category-card-hover::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
        transition: left 0.5s;
        z-index: 1;
    }
    
    .category-card-hover:hover::before {
        left: 100%;
    }
    
    .social-links a:hover {
        color: #667eea !important;
        transform: translateY(-2px);
        transition: all 0.3s ease;
    }
    </style>
    <?php
}
add_action('wp_head', 'blueprint_add_category_card_styles');
