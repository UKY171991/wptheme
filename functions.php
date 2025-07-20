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
        'blueprint-menu' => '/css/bootstrap-menu-ml.css',
        'blueprint-responsive' => '/css/responsive-enhancements.css',
        'blueprint-theme-fixes' => '/css/theme-layout-fixes.css',
        'blueprint-header-enhanced' => '/css/enhanced-header-design.css',
        'blueprint-footer-enhanced' => '/css/enhanced-footer-design.css',
        'blueprint-about-enhanced' => '/css/enhanced-about-page.css',
        'blueprint-service-pages' => '/css/service-pages-enhanced.css',
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
                'title' => 'All Blueprints',
                'content' => 'Browse our comprehensive collection of 75 proven business blueprints.',
                'template' => 'page-services.php'
            ),
            'pricing' => array(
                'title' => 'Pricing',
                'content' => 'Affordable pricing for all business blueprints and startup guides.',
                'template' => 'page-pricing.php'
            ),
            'about' => array(
                'title' => 'About',
                'content' => 'Learn about our mission to help entrepreneurs succeed with proven business blueprints.',
                'template' => 'page-about.php'
            ),
            'contact' => array(
                'title' => 'Contact',
                'content' => 'Get in touch with us to plan your perfect business strategy.',
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
        
        update_option('blueprint_pages_created', 'yes');
    }
}
add_action('after_setup_theme', 'blueprint_create_default_pages');

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
