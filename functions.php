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
 * INCLUDE NAVIGATION WALKERS
 */
require_once get_template_directory() . '/inc/navigation-walker.php';
require_once get_template_directory() . '/inc/navigation-walker-rebuilt.php';
require_once get_template_directory() . '/inc/clean-navigation-walker.php';
require_once get_template_directory() . '/inc/wordpress-standard-walker.php';

/**
 * INCLUDE TEMPLATE FUNCTIONS
 */
require_once get_template_directory() . '/inc/template-functions.php';

/**
 * INCLUDE CUSTOMIZER SETTINGS
 */
require_once get_template_directory() . '/inc/customizer.php';

/**
 * HEADER LAYOUT & ADMIN BAR FIXES
 */
function blueprint_folder_header_fixes() {
    // Hide admin bar for non-admin users
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
    
    // Remove any theme customizer elements that might interfere
    add_action('wp_head', function() {
        echo '<style>
        /* Emergency header fixes */
        .site-header { position: fixed !important; top: 0 !important; z-index: 9999 !important; }
        .site-header::before, .site-header::after { display: none !important; }
        body { padding-top: 70px !important; }
        .admin-bar body { padding-top: 102px !important; }
        @media (max-width: 782px) { .admin-bar body { padding-top: 116px !important; } }
        </style>';
    }, 9999);
}
add_action('after_setup_theme', 'blueprint_folder_header_fixes');

/**
 * Remove any conflicting header elements
 */
function blueprint_folder_clean_header() {
    add_action('wp_footer', function() {
        echo '<script>
        jQuery(document).ready(function($) {
            // Remove any problematic elements
            $(".site-header").find(".overlay-accent, .decorative-overlay, [style*=orange]").remove();
            
            // Ensure proper positioning
            $(".site-header").css({
                "position": "fixed",
                "top": "0",
                "z-index": "9999",
                "width": "100%"
            });
        });
        </script>';
    });
}
add_action('init', 'blueprint_folder_clean_header');

/**
 * FORCE NAVIGATION MENU DISPLAY EVEN WHEN EMPTY
 */
function blueprint_folder_force_nav_menu_display() {
    return true;
}

/**
 * NAVIGATION FALLBACK MENU (WordPress Standard)
 */
function blueprint_folder_navigation_fallback() {
    $fallback_pages = array(
        array(
            'url' => home_url('/'),
            'title' => esc_html__('Home', 'blueprint-folder'),
            'current' => is_front_page()
        ),
        array(
            'url' => home_url('/about'),
            'title' => esc_html__('About', 'blueprint-folder'),
            'current' => is_page('about')
        ),
        array(
            'url' => get_post_type_archive_link('service') ?: home_url('/services'),
            'title' => esc_html__('Services', 'blueprint-folder'),
            'current' => is_post_type_archive('service') || is_page('services')
        ),
        array(
            'url' => home_url('/portfolio'),
            'title' => esc_html__('Portfolio', 'blueprint-folder'),
            'current' => is_page('portfolio')
        ),
        array(
            'url' => home_url('/contact'),
            'title' => esc_html__('Contact', 'blueprint-folder'),
            'current' => is_page('contact')
        )
    );
    
    echo '<ul id="primary-menu" class="menu nav-menu">';
    foreach ($fallback_pages as $page) {
        $current_class = $page['current'] ? ' current-menu-item' : '';
        $aria_current = $page['current'] ? ' aria-current="page"' : '';
        
        printf(
            '<li class="menu-item%s">
                <a href="%s"%s>%s</a>
            </li>',
            esc_attr($current_class),
            esc_url($page['url']),
            $aria_current,
            esc_html($page['title'])
        );
    }
    echo '</ul>';
}

/**
 * ENHANCED BREADCRUMB NAVIGATION
 */
function blueprint_folder_breadcrumb() {
    // Return early if on front page
    if (is_front_page()) {
        return;
    }
    
    $delimiter = '<i class="fas fa-chevron-right" aria-hidden="true"></i>';
    $home_title = esc_html__('Home', 'blueprint-folder');
    
    // Start breadcrumb
    echo '<nav class="breadcrumb-navigation" aria-label="Breadcrumb">';
    echo '<ol class="breadcrumb-list">';
    
    // Home link
    echo '<li class="breadcrumb-item">';
    echo '<a href="' . esc_url(home_url('/')) . '">';
    echo '<i class="fas fa-home" aria-hidden="true"></i> ';
    echo esc_html($home_title);
    echo '</a>';
    echo '</li>';
    
    if (is_category() || is_single()) {
        echo '<li class="breadcrumb-separator">' . $delimiter . '</li>';
        
        if (is_single()) {
            $category = get_the_category();
            if (!empty($category)) {
                $cat = $category[0];
                echo '<li class="breadcrumb-item">';
                echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '">';
                echo esc_html($cat->name);
                echo '</a>';
                echo '</li>';
                echo '<li class="breadcrumb-separator">' . $delimiter . '</li>';
            }
            
            echo '<li class="breadcrumb-item breadcrumb-current" aria-current="page">';
            echo esc_html(get_the_title());
            echo '</li>';
        } else {
            echo '<li class="breadcrumb-item breadcrumb-current" aria-current="page">';
            echo esc_html(single_cat_title('', false));
            echo '</li>';
        }
        
    } elseif (is_page()) {
        $post = get_post();
        
        if ($post->post_parent) {
            $parent_pages = array();
            $parent_id = $post->post_parent;
            
            while ($parent_id) {
                $parent = get_post($parent_id);
                $parent_pages[] = $parent;
                $parent_id = $parent->post_parent;
            }
            
            $parent_pages = array_reverse($parent_pages);
            
            foreach ($parent_pages as $parent) {
                echo '<li class="breadcrumb-separator">' . $delimiter . '</li>';
                echo '<li class="breadcrumb-item">';
                echo '<a href="' . esc_url(get_permalink($parent->ID)) . '">';
                echo esc_html($parent->post_title);
                echo '</a>';
                echo '</li>';
            }
        }
        
        echo '<li class="breadcrumb-separator">' . $delimiter . '</li>';
        echo '<li class="breadcrumb-item breadcrumb-current" aria-current="page">';
        echo esc_html(get_the_title());
        echo '</li>';
        
    } elseif (is_tag()) {
        echo '<li class="breadcrumb-separator">' . $delimiter . '</li>';
        echo '<li class="breadcrumb-item breadcrumb-current" aria-current="page">';
        echo esc_html__('Tag: ', 'blueprint-folder') . esc_html(single_tag_title('', false));
        echo '</li>';
        
    } elseif (is_author()) {
        echo '<li class="breadcrumb-separator">' . $delimiter . '</li>';
        echo '<li class="breadcrumb-item breadcrumb-current" aria-current="page">';
        echo esc_html__('Author: ', 'blueprint-folder') . esc_html(get_the_author());
        echo '</li>';
        
    } elseif (is_archive()) {
        echo '<li class="breadcrumb-separator">' . $delimiter . '</li>';
        echo '<li class="breadcrumb-item breadcrumb-current" aria-current="page">';
        
        if (is_post_type_archive()) {
            echo esc_html(post_type_archive_title('', false));
        } else {
            echo esc_html__('Archive', 'blueprint-folder');
        }
        
        echo '</li>';
        
    } elseif (is_search()) {
        echo '<li class="breadcrumb-separator">' . $delimiter . '</li>';
        echo '<li class="breadcrumb-item breadcrumb-current" aria-current="page">';
        echo esc_html__('Search Results for: ', 'blueprint-folder') . esc_html(get_search_query());
        echo '</li>';
        
    } elseif (is_404()) {
        echo '<li class="breadcrumb-separator">' . $delimiter . '</li>';
        echo '<li class="breadcrumb-item breadcrumb-current" aria-current="page">';
        echo esc_html__('404 Error', 'blueprint-folder');
        echo '</li>';
    }
    
    echo '</ol>';
    echo '</nav>';
    
    // Add breadcrumb styles
    if (!wp_style_is('blueprint-breadcrumb', 'enqueued')) {
        echo '<style>
        .breadcrumb-navigation {
            margin: 1.5rem 0;
        }
        
        .breadcrumb-list {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            list-style: none;
            margin: 0;
            padding: 0;
            font-size: 0.9rem;
            gap: 0.5rem;
        }
        
        .breadcrumb-item {
            margin: 0;
        }
        
        .breadcrumb-item a {
            color: #6b7280;
            text-decoration: none;
            transition: color 0.15s ease;
        }
        
        .breadcrumb-item a:hover {
            color: #1e40af;
        }
        
        .breadcrumb-separator {
            color: #9ca3af;
            font-size: 0.75rem;
        }
        
        .breadcrumb-current {
            color: #1e40af;
            font-weight: 500;
        }
        
        @media (max-width: 767.98px) {
            .breadcrumb-list {
                font-size: 0.8rem;
            }
        }
        </style>';
    }
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
    wp_enqueue_style('blueprint-folder-style', get_stylesheet_uri(), array(), '2.1.0');
    
    // Enhanced Global Styles - HIGHEST PRIORITY for professional appearance
    wp_enqueue_style('blueprint-folder-enhanced-global', get_template_directory_uri() . '/css/enhanced-global-styles.css', array('blueprint-folder-style'), '2.2.0');
    
    // Multi-Level WordPress Menu CSS - HIGH PRIORITY for proper menu display
    wp_enqueue_style('blueprint-folder-multi-level-menu', get_template_directory_uri() . '/css/multi-level-menu.css', array('blueprint-folder-enhanced-global'), '2.1.0');
    
    // WordPress Standard Menu CSS - CRITICAL (backup)
    wp_enqueue_style('blueprint-folder-wp-menu', get_template_directory_uri() . '/css/wordpress-standard-menu.css', array('blueprint-folder-multi-level-menu'), '2.1.0');
    
    // Header Rebuilt CSS - HIGH PRIORITY
    wp_enqueue_style('blueprint-folder-header-rebuilt', get_template_directory_uri() . '/css/header-rebuilt.css', array('blueprint-folder-multi-level-menu'), '2.1.0');
    
    // Header Menu Fallback CSS - CRITICAL for menu visibility
    wp_enqueue_style('blueprint-folder-header-fallback', get_template_directory_uri() . '/css/header-menu-fallback.css', array('blueprint-folder-header-rebuilt'), '2.1.0');
    
    // Header Effects CSS - Additional animations
    wp_enqueue_style('blueprint-folder-header-effects', get_template_directory_uri() . '/css/header-effects.css', array('blueprint-folder-header-rebuilt'), '2.1.0');
    
    // Header Layout Fix CSS - HIGH PRIORITY
    wp_enqueue_style('blueprint-folder-header-fix', get_template_directory_uri() . '/css/header-layout-fix.css', array('blueprint-folder-header-rebuilt'), '2.1.0');
    
    // Interactive Elements CSS
    wp_enqueue_style('blueprint-folder-interactive', get_template_directory_uri() . '/css/interactive-elements.css', array('blueprint-folder-style'), '2.1.0');
    
    // Enhanced Homepage CSS
    if (is_front_page() || is_home()) {
        wp_enqueue_style('blueprint-folder-homepage', get_template_directory_uri() . '/css/homepage-enhanced.css', array('blueprint-folder-style'), '2.1.0');
    }
    
    // Enhanced Pricing CSS - Only load on pricing page template and only specific styles
    if (is_page_template('page-pricing-enhanced.php')) {
        // Don't load header CSS for this template
    }
    
    // Bootstrap CSS (CDN)
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0');
    
    // Font Awesome (CDN)
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap', array(), null);
    
    // jQuery (WordPress built-in)
    wp_enqueue_script('jquery');
    
    // Bootstrap JS (CDN)
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true);
    
    // Enhanced Global JavaScript - HIGHEST PRIORITY for professional functionality
    wp_enqueue_script('blueprint-folder-enhanced-global', get_template_directory_uri() . '/js/enhanced-global.js', array(), '2.2.0', true);
    
    // Multi-Level Menu JavaScript - HIGH PRIORITY for WordPress menu functionality
    wp_enqueue_script('blueprint-folder-multi-level-menu', get_template_directory_uri() . '/js/multi-level-menu.js', array('blueprint-folder-enhanced-global'), '2.2.0', true);
    
    // Header Menu Fix JavaScript - CRITICAL (backup)
    wp_enqueue_script('blueprint-folder-header-menu-fix', get_template_directory_uri() . '/js/header-menu-fix.js', array('blueprint-folder-multi-level-menu'), '2.1.0', true);
    
    // Enhanced Header JavaScript - HIGH PRIORITY
    wp_enqueue_script('blueprint-folder-header-enhanced', get_template_directory_uri() . '/js/header-enhanced.js', array('blueprint-folder-multi-level-menu'), '2.1.0', true);
    
    // Header Layout Fix JavaScript - HIGH PRIORITY  
    if (file_exists(get_template_directory() . '/js/header-layout-fix.js')) {
        wp_enqueue_script('blueprint-folder-header-fix', get_template_directory_uri() . '/js/header-layout-fix.js', array('jquery'), '2.1.0', true);
    }
    
    // Theme main script
    wp_enqueue_script('blueprint-folder-main', get_template_directory_uri() . '/js/theme-main-enhanced.js', array('jquery', 'bootstrap'), '2.1.0', true);
    
    // Enhanced Pricing JavaScript
    if (is_page_template('page-pricing.php') || is_page_template('page-pricing-enhanced.php')) {
        wp_enqueue_script('blueprint-folder-pricing', get_template_directory_uri() . '/js/pricing-enhanced.js', array('jquery', 'bootstrap'), '2.1.0', true);
    }
    
    // Localize script for AJAX and theme data
    wp_localize_script('blueprint-folder-main', 'wpData', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('blueprint_folder_nonce'),
        'homeUrl' => home_url('/'),
        'contactUrl' => get_permalink(get_page_by_path('contact')),
        'themeUrl' => get_template_directory_uri(),
        'isDebug' => defined('WP_DEBUG') && WP_DEBUG
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

/**
 * ENHANCED PERFORMANCE OPTIMIZATIONS
 */
function blueprint_folder_performance_optimizations() {
    // Remove unnecessary emoji scripts
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    
    // Remove unnecessary REST API links
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    
    // Remove unnecessary generator tags
    remove_action('wp_head', 'wp_generator');
    
    // Defer non-critical JavaScript
    add_filter('script_loader_tag', 'blueprint_folder_defer_scripts', 10, 3);
}
add_action('init', 'blueprint_folder_performance_optimizations');

/**
 * DEFER NON-CRITICAL SCRIPTS
 */
function blueprint_folder_defer_scripts($tag, $handle, $src) {
    $defer_scripts = array('blueprint-folder-pricing', 'bootstrap');
    
    if (in_array($handle, $defer_scripts)) {
        return str_replace('<script ', '<script defer ', $tag);
    }
    
    return $tag;
}

/**
 * LAZY LOAD IMAGES
 */
function blueprint_folder_lazy_load_images($content) {
    if (is_admin() || is_feed() || wp_is_mobile()) {
        return $content;
    }
    
    return preg_replace_callback('/<img([^>]+?)>/', function($matches) {
        $img = $matches[0];
        if (strpos($img, 'loading=') !== false) {
            return $img;
        }
        return str_replace('<img', '<img loading="lazy"', $img);
    }, $content);
}
add_filter('the_content', 'blueprint_folder_lazy_load_images');

/**
 * ENHANCED SECURITY HEADERS
 */
function blueprint_folder_security_headers() {
    if (!is_admin()) {
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('X-XSS-Protection: 1; mode=block');
        header('Referrer-Policy: strict-origin-when-cross-origin');
    }
}
add_action('send_headers', 'blueprint_folder_security_headers');

/**
 * ENHANCED CONTACT FORM HANDLER
 */
function blueprint_folder_handle_contact_form() {
    if (!wp_verify_nonce($_POST['contact_nonce'], 'blueprint_folder_contact')) {
        wp_die('Security check failed');
    }
    
    $name = sanitize_text_field($_POST['contact_name']);
    $email = sanitize_email($_POST['contact_email']);
    $subject = sanitize_text_field($_POST['contact_subject']);
    $message = sanitize_textarea_field($_POST['contact_message']);
    $quote = sanitize_text_field($_POST['quote_type'] ?? '');
    
    // Enhanced email content
    $email_content = sprintf(
        "New contact form submission:\n\nName: %s\nEmail: %s\nSubject: %s\n%s\nMessage:\n%s\n\n---\nSent from: %s",
        $name,
        $email,
        $subject,
        $quote ? "Interested in: {$quote}\n" : '',
        $message,
        home_url()
    );
    
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . get_option('blogname') . ' <' . get_option('admin_email') . '>',
        'Reply-To: ' . $name . ' <' . $email . '>'
    );
    
    $sent = wp_mail(
        get_option('admin_email'),
        'New Contact: ' . $subject,
        nl2br($email_content),
        $headers
    );
    
    if ($sent) {
        wp_safe_redirect(add_query_arg('contact', 'success', wp_get_referer()));
    } else {
        wp_safe_redirect(add_query_arg('contact', 'error', wp_get_referer()));
    }
    exit;
}
add_action('wp_ajax_contact_form', 'blueprint_folder_handle_contact_form');
add_action('wp_ajax_nopriv_contact_form', 'blueprint_folder_handle_contact_form');

/**
 * DYNAMIC SCHEMA MARKUP
 */
function blueprint_folder_schema_markup() {
    if (is_front_page()) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => get_bloginfo('name'),
            'url' => home_url(),
            'description' => get_bloginfo('description'),
            'sameAs' => array(
                get_theme_mod('social_facebook', ''),
                get_theme_mod('social_twitter', ''),
                get_theme_mod('social_linkedin', '')
            )
        );
        
        echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
    }
}
add_action('wp_head', 'blueprint_folder_schema_markup');

/**
 * ADMIN MENU FOR SAMPLE DATA GENERATION
 */
function blueprint_folder_admin_menu() {
    add_theme_page(
        'Sample Data Generator',
        'Sample Data',
        'manage_options',
        'blueprint-sample-data',
        'blueprint_folder_admin_page'
    );
}
add_action('admin_menu', 'blueprint_folder_admin_menu');

/**
 * ADMIN PAGE FOR SAMPLE DATA
 */
function blueprint_folder_admin_page() {
    if (isset($_POST['generate_data']) && current_user_can('manage_options')) {
        // Include and run the sample data generator
        require_once get_template_directory() . '/sample-data-generator-enhanced.php';
        blueprint_folder_generate_sample_data();
        echo '<div class="notice notice-success"><p>Sample data generated successfully!</p></div>';
    }
    
    ?>
    <div class="wrap">
        <h1>BluePrint Folder - Sample Data Generator</h1>
        <p>Generate sample content to get started with your website quickly.</p>
        
        <div class="card" style="max-width: 600px;">
            <div class="card-body">
                <h3>What will be created:</h3>
                <ul>
                    <li>5 Service Categories (Web Development, Digital Marketing, Business Consulting, Graphic Design, Technical Support)</li>
                    <li>12 Sample Services across all categories</li>
                    <li>6 Customer Testimonials</li>
                    <li>3 Pricing Plans (Starter, Professional, Enterprise)</li>
                </ul>
                
                <p><strong>After generating:</strong></p>
                <ol>
                    <li>Go to <a href="<?php echo admin_url('nav-menus.php'); ?>">Appearance → Menus</a></li>
                    <li>Add Service Categories and Services to your navigation menu</li>
                    <li>Test the multi-level dropdown functionality</li>
                </ol>
                
                <form method="post">
                    <?php wp_nonce_field('generate_sample_data'); ?>
                    <input type="submit" name="generate_data" class="button button-primary" value="Generate Sample Data">
                </form>
            </div>
        </div>
        
        <div class="card" style="max-width: 600px; margin-top: 20px;">
            <div class="card-body">
                <h3>Next Steps:</h3>
                <ol>
                    <li><strong>Customize Homepage:</strong> Go to <a href="<?php echo admin_url('customize.php'); ?>">Appearance → Customize</a></li>
                    <li><strong>Set up Menus:</strong> <a href="<?php echo admin_url('nav-menus.php'); ?>">Appearance → Menus</a></li>
                    <li><strong>Add Content:</strong> Create pages for About, Contact, etc.</li>
                    <li><strong>Upload Logo:</strong> <a href="<?php echo admin_url('customize.php?autofocus[control]=custom_logo'); ?>">Customize → Site Identity</a></li>
                </ol>
            </div>
        </div>
    </div>
    <?php
}

// That's all folks!
?>
