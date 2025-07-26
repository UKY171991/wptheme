<?php
/**
 * BluePrint Folder - Professional WordPress Theme
 * Completely Rebuilt & Optimized for https://blueprintfolder.com/
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 * @author BluePrint Folder Team
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * THEME SETUP & CONFIGURATION
 */
function blueprint_folder_setup() {
    // Add theme support features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'
    ));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('wp-block-styles');
    
    // Custom image sizes
    add_image_size('hero-banner', 1920, 800, true);
    add_image_size('service-card', 400, 300, true);
    add_image_size('testimonial-avatar', 80, 80, true);
    add_image_size('portfolio-thumb', 500, 400, true);
    add_image_size('blog-thumb', 600, 400, true);
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Navigation', 'blueprint-folder'),
        'footer'  => esc_html__('Footer Navigation', 'blueprint-folder'),
        'services' => esc_html__('Services Menu', 'blueprint-folder'),
    ));
    
    // Text domain for translations
    load_theme_textdomain('blueprint-folder', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'blueprint_folder_setup');

/**
 * REGISTER CUSTOM POST TYPES
 */
function blueprint_folder_register_post_types() {
    // Services Post Type
    register_post_type('service', array(
        'labels' => array(
            'name'               => esc_html__('Services', 'blueprint-folder'),
            'singular_name'      => esc_html__('Service', 'blueprint-folder'),
            'menu_name'          => esc_html__('Services', 'blueprint-folder'),
            'name_admin_bar'     => esc_html__('Service', 'blueprint-folder'),
            'add_new'            => esc_html__('Add New', 'blueprint-folder'),
            'add_new_item'       => esc_html__('Add New Service', 'blueprint-folder'),
            'new_item'           => esc_html__('New Service', 'blueprint-folder'),
            'edit_item'          => esc_html__('Edit Service', 'blueprint-folder'),
            'view_item'          => esc_html__('View Service', 'blueprint-folder'),
            'all_items'          => esc_html__('All Services', 'blueprint-folder'),
            'search_items'       => esc_html__('Search Services', 'blueprint-folder'),
            'parent_item_colon'  => esc_html__('Parent Services:', 'blueprint-folder'),
            'not_found'          => esc_html__('No services found.', 'blueprint-folder'),
            'not_found_in_trash' => esc_html__('No services found in Trash.', 'blueprint-folder'),
        ),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'              => true,
        'show_in_menu'         => true,
        'show_in_nav_menus'    => true,
        'query_var'            => true,
        'rewrite'              => array('slug' => 'services'),
        'capability_type'      => 'post',
        'has_archive'          => true,
        'hierarchical'         => false,
        'menu_position'        => 20,
        'menu_icon'            => 'dashicons-admin-tools',
        'supports'             => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
        'show_in_rest'         => true,
    ));

    // Testimonials Post Type
    register_post_type('testimonial', array(
        'labels' => array(
            'name'               => esc_html__('Testimonials', 'blueprint-folder'),
            'singular_name'      => esc_html__('Testimonial', 'blueprint-folder'),
            'menu_name'          => esc_html__('Testimonials', 'blueprint-folder'),
            'add_new_item'       => esc_html__('Add New Testimonial', 'blueprint-folder'),
            'edit_item'          => esc_html__('Edit Testimonial', 'blueprint-folder'),
            'view_item'          => esc_html__('View Testimonial', 'blueprint-folder'),
            'all_items'          => esc_html__('All Testimonials', 'blueprint-folder'),
        ),
        'public'               => true,
        'show_ui'              => true,
        'show_in_menu'         => true,
        'show_in_nav_menus'    => true,
        'menu_position'        => 21,
        'menu_icon'            => 'dashicons-format-quote',
        'supports'             => array('title', 'editor', 'thumbnail'),
        'has_archive'          => true,
        'show_in_rest'         => true,
    ));

    // Pricing Plans Post Type
    register_post_type('pricing_plan', array(
        'labels' => array(
            'name'               => esc_html__('Pricing Plans', 'blueprint-folder'),
            'singular_name'      => esc_html__('Pricing Plan', 'blueprint-folder'),
            'menu_name'          => esc_html__('Pricing', 'blueprint-folder'),
            'add_new_item'       => esc_html__('Add New Plan', 'blueprint-folder'),
            'edit_item'          => esc_html__('Edit Plan', 'blueprint-folder'),
            'view_item'          => esc_html__('View Plan', 'blueprint-folder'),
            'all_items'          => esc_html__('All Plans', 'blueprint-folder'),
        ),
        'public'               => true,
        'show_ui'              => true,
        'show_in_menu'         => true,
        'menu_position'        => 22,
        'menu_icon'            => 'dashicons-money-alt',
        'supports'             => array('title', 'editor', 'custom-fields'),
        'has_archive'          => false,
        'show_in_rest'         => true,
    ));

    // Projects Post Type
    register_post_type('project', array(
        'labels' => array(
            'name'               => esc_html__('Projects', 'blueprint-folder'),
            'singular_name'      => esc_html__('Project', 'blueprint-folder'),
            'menu_name'          => esc_html__('Portfolio', 'blueprint-folder'),
            'add_new_item'       => esc_html__('Add New Project', 'blueprint-folder'),
            'edit_item'          => esc_html__('Edit Project', 'blueprint-folder'),
            'view_item'          => esc_html__('View Project', 'blueprint-folder'),
            'all_items'          => esc_html__('All Projects', 'blueprint-folder'),
        ),
        'public'               => true,
        'show_ui'              => true,
        'show_in_menu'         => true,
        'menu_position'        => 23,
        'menu_icon'            => 'dashicons-portfolio',
        'supports'             => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'has_archive'          => true,
        'show_in_rest'         => true,
    ));
}
add_action('init', 'blueprint_folder_register_post_types');

/**
 * REGISTER TAXONOMIES
 */
function blueprint_folder_register_taxonomies() {
    // Service Categories
    register_taxonomy('service_category', 'service', array(
        'labels' => array(
            'name'              => esc_html__('Service Categories', 'blueprint-folder'),
            'singular_name'     => esc_html__('Service Category', 'blueprint-folder'),
            'search_items'      => esc_html__('Search Categories', 'blueprint-folder'),
            'all_items'         => esc_html__('All Categories', 'blueprint-folder'),
            'parent_item'       => esc_html__('Parent Category', 'blueprint-folder'),
            'parent_item_colon' => esc_html__('Parent Category:', 'blueprint-folder'),
            'edit_item'         => esc_html__('Edit Category', 'blueprint-folder'),
            'update_item'       => esc_html__('Update Category', 'blueprint-folder'),
            'add_new_item'      => esc_html__('Add New Category', 'blueprint-folder'),
            'new_item_name'     => esc_html__('New Category Name', 'blueprint-folder'),
            'menu_name'         => esc_html__('Categories', 'blueprint-folder'),
        ),
        'hierarchical'         => true,
        'public'               => true,
        'show_ui'              => true,
        'show_admin_column'    => true,
        'show_in_nav_menus'    => true,
        'show_tagcloud'        => false,
        'show_in_rest'         => true,
        'rewrite'              => array('slug' => 'service-category'),
    ));
}
add_action('init', 'blueprint_folder_register_taxonomies');

/**
 * INCLUDE NAVIGATION WALKER
 */
require_once get_template_directory() . '/inc/navigation-walker.php';

/**
 * FORCE NAVIGATION MENU DISPLAY EVEN WHEN EMPTY
 */
function blueprint_folder_force_nav_menu_display() {
    return true;
}
add_filter('wp_nav_menu_args', function($args) {
    if (isset($args['theme_location']) && $args['theme_location'] === 'primary') {
        $args['fallback_cb'] = 'blueprint_folder_navigation_fallback';
    }
    return $args;
});

/**
 * ENQUEUE SCRIPTS AND STYLES
 */
function blueprint_folder_scripts() {
    // Theme stylesheet
    wp_enqueue_style('blueprint-folder-style', get_stylesheet_uri(), array(), '2.0.0');
    
    // Header CSS
    wp_enqueue_style('blueprint-folder-header', get_template_directory_uri() . '/css/header.css', array('blueprint-folder-style'), '2.0.0');
    
    // Bootstrap CSS (CDN)
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0');
    
    // Font Awesome (CDN)
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    
    // jQuery (WordPress built-in)
    wp_enqueue_script('jquery');
    
    // Bootstrap JS (CDN)
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true);
    
    // Theme main script
    wp_enqueue_script('blueprint-folder-main', get_template_directory_uri() . '/js/theme-main.js', array('jquery', 'bootstrap'), '2.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('blueprint-folder-main', 'blueprint_folder_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('blueprint_folder_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'blueprint_folder_scripts');

/**
 * REGISTER WIDGET AREAS
 */
function blueprint_folder_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Primary Sidebar', 'blueprint-folder'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'blueprint-folder'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 1', 'blueprint-folder'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Footer widget area 1', 'blueprint-folder'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 2', 'blueprint-folder'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Footer widget area 2', 'blueprint-folder'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 3', 'blueprint-folder'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Footer widget area 3', 'blueprint-folder'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'blueprint_folder_widgets_init');

/**
 * HELPER FUNCTIONS FOR CONTENT RETRIEVAL
 */
function blueprint_folder_get_services($category = '', $limit = -1) {
    $args = array(
        'post_type'      => 'service',
        'posts_per_page' => $limit,
        'post_status'    => 'publish',
        'meta_query'     => array()
    );
    
    if (!empty($category)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'service_category',
                'field'    => 'slug',
                'terms'    => $category,
            ),
        );
    }
    
    return new WP_Query($args);
}

function blueprint_folder_get_testimonials($limit = -1) {
    return new WP_Query(array(
        'post_type'      => 'testimonial',
        'posts_per_page' => $limit,
        'post_status'    => 'publish',
    ));
}

function blueprint_folder_get_pricing_plans() {
    return new WP_Query(array(
        'post_type'      => 'pricing_plan',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'meta_key'       => '_pricing_order',
        'orderby'        => 'meta_value_num',
        'order'          => 'ASC',
    ));
}

function blueprint_folder_get_projects($category = '', $limit = -1) {
    $args = array(
        'post_type'      => 'project',
        'posts_per_page' => $limit,
        'post_status'    => 'publish',
    );
    
    if (!empty($category)) {
        $args['meta_query'] = array(
            array(
                'key'     => '_project_category',
                'value'   => $category,
                'compare' => 'LIKE'
            )
        );
    }
    
    return new WP_Query($args);
}

/**
 * FLUSH REWRITE RULES ON ACTIVATION
 */
function blueprint_folder_flush_rewrites() {
    blueprint_folder_register_post_types();
    blueprint_folder_register_taxonomies();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'blueprint_folder_flush_rewrites');

/**
 * BASIC SEO META TAGS
 */
function blueprint_folder_seo_meta() {
    if (is_home() || is_front_page()) {
        echo '<meta name="description" content="Professional services provider offering quality solutions for your business needs. Trusted by clients nationwide.">' . "\n";
    } elseif (is_singular('service')) {
        $excerpt = get_the_excerpt();
        if ($excerpt) {
            echo '<meta name="description" content="' . esc_attr(wp_trim_words($excerpt, 20)) . '">' . "\n";
        }
    }
}
add_action('wp_head', 'blueprint_folder_seo_meta');

// That's all folks!
?>
