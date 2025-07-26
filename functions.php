<?php
/**
 * WordPress Theme Functions - Completely Rebuilt
 * Modern, Clean, Professional Theme for Business Services
 * 
 * @package Professional_Services_Theme
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Include the navigation walker
require_once get_template_directory() . '/inc/navigation-walker-new.php';

/**
 * Theme Setup
 */
function professional_services_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Add default image sizes
    add_image_size('hero-large', 1920, 800, true);
    add_image_size('service-thumb', 400, 300, true);
    add_image_size('portfolio-thumb', 500, 400, true);
    add_image_size('team-member', 300, 300, true);
    add_image_size('testimonial-thumb', 150, 150, true);

    // Switch default core markup for search form, comment form, and comments
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for editor styles
    add_theme_support('editor-styles');

    // Add support for responsive embedded content
    add_theme_support('responsive-embeds');

    // Add support for wide and full alignment
    add_theme_support('align-wide');

    // Navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Navigation', 'professional-services'),
        'footer'  => esc_html__('Footer Navigation', 'professional-services'),
        'services' => esc_html__('Services Menu', 'professional-services'),
    ));
}
add_action('after_setup_theme', 'professional_services_setup');

/**
 * Register Custom Post Types
 */
function professional_services_register_post_types() {
    
    // Services Post Type
    register_post_type('service', array(
        'labels' => array(
            'name' => 'Services',
            'singular_name' => 'Service',
            'menu_name' => 'Services',
            'add_new' => 'Add Service',
            'add_new_item' => 'Add New Service',
            'edit_item' => 'Edit Service',
            'new_item' => 'New Service',
            'view_item' => 'View Service',
            'search_items' => 'Search Services',
            'not_found' => 'No services found',
            'not_found_in_trash' => 'No services found in trash'
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'services'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-hammer',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest' => true,
    ));

    // Testimonials Post Type
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => 'Testimonials',
            'singular_name' => 'Testimonial',
            'menu_name' => 'Testimonials',
            'add_new' => 'Add Testimonial',
            'add_new_item' => 'Add New Testimonial',
            'edit_item' => 'Edit Testimonial',
            'new_item' => 'New Testimonial',
            'view_item' => 'View Testimonial',
            'search_items' => 'Search Testimonials',
            'not_found' => 'No testimonials found',
            'not_found_in_trash' => 'No testimonials found in trash'
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'testimonials'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 21,
        'menu_icon' => 'dashicons-testimonial',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest' => true,
    ));

    // Pricing Plans Post Type
    register_post_type('pricing_plan', array(
        'labels' => array(
            'name' => 'Pricing Plans',
            'singular_name' => 'Pricing Plan',
            'menu_name' => 'Pricing Plans',
            'add_new' => 'Add Plan',
            'add_new_item' => 'Add New Plan',
            'edit_item' => 'Edit Plan',
            'new_item' => 'New Plan',
            'view_item' => 'View Plan',
            'search_items' => 'Search Plans',
            'not_found' => 'No plans found',
            'not_found_in_trash' => 'No plans found in trash'
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'pricing'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 22,
        'menu_icon' => 'dashicons-cart',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest' => true,
    ));

    // Projects Post Type
    register_post_type('project', array(
        'labels' => array(
            'name' => 'Projects',
            'singular_name' => 'Project',
            'menu_name' => 'Projects',
            'add_new' => 'Add Project',
            'add_new_item' => 'Add New Project',
            'edit_item' => 'Edit Project',
            'new_item' => 'New Project',
            'view_item' => 'View Project',
            'search_items' => 'Search Projects',
            'not_found' => 'No projects found',
            'not_found_in_trash' => 'No projects found in trash'
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'projects'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 23,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'professional_services_register_post_types');

/**
 * Register Custom Taxonomies
 */
function professional_services_register_taxonomies() {
    
    // Service Categories
    register_taxonomy('service_category', 'service', array(
        'labels' => array(
            'name' => 'Service Categories',
            'singular_name' => 'Service Category',
            'menu_name' => 'Service Categories',
            'all_items' => 'All Categories',
            'edit_item' => 'Edit Category',
            'view_item' => 'View Category',
            'update_item' => 'Update Category',
            'add_new_item' => 'Add New Category',
            'new_item_name' => 'New Category Name',
            'search_items' => 'Search Categories',
            'popular_items' => 'Popular Categories',
            'separate_items_with_commas' => 'Separate categories with commas',
            'add_or_remove_items' => 'Add or remove categories',
            'choose_from_most_used' => 'Choose from most used categories',
            'not_found' => 'No categories found'
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'service-category'),
        'query_var' => true,
        'show_in_rest' => true,
    ));

    // Project Categories
    register_taxonomy('project_category', 'project', array(
        'labels' => array(
            'name' => 'Project Categories',
            'singular_name' => 'Project Category',
            'menu_name' => 'Project Categories',
            'all_items' => 'All Categories',
            'edit_item' => 'Edit Category',
            'view_item' => 'View Category',
            'update_item' => 'Update Category',
            'add_new_item' => 'Add New Category',
            'new_item_name' => 'New Category Name',
            'search_items' => 'Search Categories',
            'popular_items' => 'Popular Categories',
            'separate_items_with_commas' => 'Separate categories with commas',
            'add_or_remove_items' => 'Add or remove categories',
            'choose_from_most_used' => 'Choose from most used categories',
            'not_found' => 'No categories found'
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'project-category'),
        'query_var' => true,
        'show_in_rest' => true,
    ));
}
add_action('init', 'professional_services_register_taxonomies');

/**
 * Add Meta Boxes for Custom Post Types
 */
function professional_services_add_meta_boxes() {
    
    // Service Meta Box
    add_meta_box(
        'service_details',
        'Service Details',
        'professional_services_service_meta_box',
        'service',
        'normal',
        'default'
    );

    // Testimonial Meta Box
    add_meta_box(
        'testimonial_details',
        'Testimonial Details',
        'professional_services_testimonial_meta_box',
        'testimonial',
        'normal',
        'default'
    );

    // Pricing Plan Meta Box
    add_meta_box(
        'pricing_details',
        'Pricing Details',
        'professional_services_pricing_meta_box',
        'pricing_plan',
        'normal',
        'default'
    );

    // Project Meta Box
    add_meta_box(
        'project_details',
        'Project Details',
        'professional_services_project_meta_box',
        'project',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'professional_services_add_meta_boxes');

/**
 * Service Meta Box Content
 */
function professional_services_service_meta_box($post) {
    wp_nonce_field('service_meta_box', 'service_meta_box_nonce');
    
    $price_range = get_post_meta($post->ID, '_service_price_range', true);
    $duration = get_post_meta($post->ID, '_service_duration', true);
    $icon = get_post_meta($post->ID, '_service_icon', true);
    $features = get_post_meta($post->ID, '_service_features', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="service_price_range">Price Range</label></th>';
    echo '<td><input type="text" id="service_price_range" name="service_price_range" value="' . esc_attr($price_range) . '" class="regular-text" placeholder="e.g., $100-$500" /></td></tr>';
    
    echo '<tr><th><label for="service_duration">Duration</label></th>';
    echo '<td><input type="text" id="service_duration" name="service_duration" value="' . esc_attr($duration) . '" class="regular-text" placeholder="e.g., 2-4 hours" /></td></tr>';
    
    echo '<tr><th><label for="service_icon">Font Awesome Icon</label></th>';
    echo '<td><input type="text" id="service_icon" name="service_icon" value="' . esc_attr($icon) . '" class="regular-text" placeholder="e.g., fas fa-wrench" /></td></tr>';
    
    echo '<tr><th><label for="service_features">Features (one per line)</label></th>';
    echo '<td><textarea id="service_features" name="service_features" rows="5" class="large-text">' . esc_textarea($features) . '</textarea></td></tr>';
    
    $excerpt = get_post_meta($post->ID, '_service_excerpt', true);
    echo '<tr><th><label for="service_excerpt">Short Description</label></th>';
    echo '<td><textarea id="service_excerpt" name="service_excerpt" rows="3" class="large-text" placeholder="Brief description for service cards">' . esc_textarea($excerpt) . '</textarea></td></tr>';
    
    echo '</table>';
}

/**
 * Testimonial Meta Box Content
 */
function professional_services_testimonial_meta_box($post) {
    wp_nonce_field('testimonial_meta_box', 'testimonial_meta_box_nonce');
    
    $client_name = get_post_meta($post->ID, '_client_name', true);
    $client_company = get_post_meta($post->ID, '_client_company', true);
    $client_position = get_post_meta($post->ID, '_client_position', true);
    $rating = get_post_meta($post->ID, '_testimonial_rating', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="client_name">Client Name</label></th>';
    echo '<td><input type="text" id="client_name" name="client_name" value="' . esc_attr($client_name) . '" class="regular-text" /></td></tr>';
    
    echo '<tr><th><label for="client_company">Company</label></th>';
    echo '<td><input type="text" id="client_company" name="client_company" value="' . esc_attr($client_company) . '" class="regular-text" /></td></tr>';
    
    echo '<tr><th><label for="client_position">Position</label></th>';
    echo '<td><input type="text" id="client_position" name="client_position" value="' . esc_attr($client_position) . '" class="regular-text" /></td></tr>';
    
    echo '<tr><th><label for="testimonial_rating">Rating (1-5)</label></th>';
    echo '<td><select id="testimonial_rating" name="testimonial_rating">';
    for ($i = 1; $i <= 5; $i++) {
        echo '<option value="' . $i . '"' . selected($rating, $i, false) . '>' . $i . ' Star' . ($i > 1 ? 's' : '') . '</option>';
    }
    echo '</select></td></tr>';
    echo '</table>';
}

/**
 * Pricing Plan Meta Box Content
 */
function professional_services_pricing_meta_box($post) {
    wp_nonce_field('pricing_meta_box', 'pricing_meta_box_nonce');
    
    $price = get_post_meta($post->ID, '_plan_price', true);
    $period = get_post_meta($post->ID, '_plan_period', true);
    $features = get_post_meta($post->ID, '_plan_features', true);
    $featured = get_post_meta($post->ID, '_plan_featured', true);
    $button_text = get_post_meta($post->ID, '_plan_button_text', true);
    $button_url = get_post_meta($post->ID, '_plan_button_url', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="plan_price">Price</label></th>';
    echo '<td><input type="text" id="plan_price" name="plan_price" value="' . esc_attr($price) . '" class="regular-text" placeholder="e.g., $99" /></td></tr>';
    
    echo '<tr><th><label for="plan_period">Billing Period</label></th>';
    echo '<td><input type="text" id="plan_period" name="plan_period" value="' . esc_attr($period) . '" class="regular-text" placeholder="e.g., per month" /></td></tr>';
    
    echo '<tr><th><label for="plan_features">Features (one per line)</label></th>';
    echo '<td><textarea id="plan_features" name="plan_features" rows="8" class="large-text">' . esc_textarea($features) . '</textarea></td></tr>';
    
    echo '<tr><th><label for="plan_featured">Featured Plan</label></th>';
    echo '<td><input type="checkbox" id="plan_featured" name="plan_featured" value="1"' . checked($featured, 1, false) . ' /> Mark as featured</td></tr>';
    
    echo '<tr><th><label for="plan_button_text">Button Text</label></th>';
    echo '<td><input type="text" id="plan_button_text" name="plan_button_text" value="' . esc_attr($button_text) . '" class="regular-text" placeholder="e.g., Get Started" /></td></tr>';
    
    echo '<tr><th><label for="plan_button_url">Button URL</label></th>';
    echo '<td><input type="url" id="plan_button_url" name="plan_button_url" value="' . esc_attr($button_url) . '" class="regular-text" /></td></tr>';
    echo '</table>';
}

/**
 * Project Meta Box Content
 */
function professional_services_project_meta_box($post) {
    wp_nonce_field('project_meta_box', 'project_meta_box_nonce');
    
    $client = get_post_meta($post->ID, '_project_client', true);
    $date = get_post_meta($post->ID, '_project_date', true);
    $url = get_post_meta($post->ID, '_project_url', true);
    $technologies = get_post_meta($post->ID, '_project_technologies', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="project_client">Client</label></th>';
    echo '<td><input type="text" id="project_client" name="project_client" value="' . esc_attr($client) . '" class="regular-text" /></td></tr>';
    
    echo '<tr><th><label for="project_date">Project Date</label></th>';
    echo '<td><input type="date" id="project_date" name="project_date" value="' . esc_attr($date) . '" class="regular-text" /></td></tr>';
    
    echo '<tr><th><label for="project_url">Project URL</label></th>';
    echo '<td><input type="url" id="project_url" name="project_url" value="' . esc_attr($url) . '" class="regular-text" /></td></tr>';
    
    echo '<tr><th><label for="project_technologies">Technologies Used</label></th>';
    echo '<td><textarea id="project_technologies" name="project_technologies" rows="3" class="large-text">' . esc_textarea($technologies) . '</textarea></td></tr>';
    echo '</table>';
}

/**
 * Save Meta Box Data
 */
function professional_services_save_meta_boxes($post_id) {
    // Check if nonce is valid
    if (!isset($_POST['service_meta_box_nonce']) && !isset($_POST['testimonial_meta_box_nonce']) && 
        !isset($_POST['pricing_meta_box_nonce']) && !isset($_POST['project_meta_box_nonce'])) {
        return;
    }

    // Check if user has permissions
    if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return;
        }
    } else {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }

    // If this is an autosave, our form has not been submitted
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Service meta
    if (isset($_POST['service_meta_box_nonce']) && wp_verify_nonce($_POST['service_meta_box_nonce'], 'service_meta_box')) {
        if (isset($_POST['service_price_range'])) {
            update_post_meta($post_id, '_service_price_range', sanitize_text_field($_POST['service_price_range']));
        }
        if (isset($_POST['service_duration'])) {
            update_post_meta($post_id, '_service_duration', sanitize_text_field($_POST['service_duration']));
        }
        if (isset($_POST['service_icon'])) {
            update_post_meta($post_id, '_service_icon', sanitize_text_field($_POST['service_icon']));
        }
        if (isset($_POST['service_features'])) {
            update_post_meta($post_id, '_service_features', sanitize_textarea_field($_POST['service_features']));
        }
        if (isset($_POST['service_excerpt'])) {
            update_post_meta($post_id, '_service_excerpt', sanitize_textarea_field($_POST['service_excerpt']));
        }
    }

    // Testimonial meta
    if (isset($_POST['testimonial_meta_box_nonce']) && wp_verify_nonce($_POST['testimonial_meta_box_nonce'], 'testimonial_meta_box')) {
        if (isset($_POST['client_name'])) {
            update_post_meta($post_id, '_client_name', sanitize_text_field($_POST['client_name']));
        }
        if (isset($_POST['client_company'])) {
            update_post_meta($post_id, '_client_company', sanitize_text_field($_POST['client_company']));
        }
        if (isset($_POST['client_position'])) {
            update_post_meta($post_id, '_client_position', sanitize_text_field($_POST['client_position']));
        }
        if (isset($_POST['testimonial_rating'])) {
            update_post_meta($post_id, '_testimonial_rating', intval($_POST['testimonial_rating']));
        }
    }

    // Pricing meta
    if (isset($_POST['pricing_meta_box_nonce']) && wp_verify_nonce($_POST['pricing_meta_box_nonce'], 'pricing_meta_box')) {
        if (isset($_POST['plan_price'])) {
            update_post_meta($post_id, '_plan_price', sanitize_text_field($_POST['plan_price']));
        }
        if (isset($_POST['plan_period'])) {
            update_post_meta($post_id, '_plan_period', sanitize_text_field($_POST['plan_period']));
        }
        if (isset($_POST['plan_features'])) {
            update_post_meta($post_id, '_plan_features', sanitize_textarea_field($_POST['plan_features']));
        }
        if (isset($_POST['plan_featured'])) {
            update_post_meta($post_id, '_plan_featured', 1);
        } else {
            delete_post_meta($post_id, '_plan_featured');
        }
        if (isset($_POST['plan_button_text'])) {
            update_post_meta($post_id, '_plan_button_text', sanitize_text_field($_POST['plan_button_text']));
        }
        if (isset($_POST['plan_button_url'])) {
            update_post_meta($post_id, '_plan_button_url', esc_url_raw($_POST['plan_button_url']));
        }
    }

    // Project meta
    if (isset($_POST['project_meta_box_nonce']) && wp_verify_nonce($_POST['project_meta_box_nonce'], 'project_meta_box')) {
        if (isset($_POST['project_client'])) {
            update_post_meta($post_id, '_project_client', sanitize_text_field($_POST['project_client']));
        }
        if (isset($_POST['project_date'])) {
            update_post_meta($post_id, '_project_date', sanitize_text_field($_POST['project_date']));
        }
        if (isset($_POST['project_url'])) {
            update_post_meta($post_id, '_project_url', esc_url_raw($_POST['project_url']));
        }
        if (isset($_POST['project_technologies'])) {
            update_post_meta($post_id, '_project_technologies', sanitize_textarea_field($_POST['project_technologies']));
        }
    }
}
add_action('save_post', 'professional_services_save_meta_boxes');

/**
 * Enqueue Scripts and Styles
 */
function professional_services_scripts() {
    // Main stylesheet - using the new clean stylesheet
    wp_enqueue_style('professional-services-style', get_template_directory_uri() . '/style-new.css', array(), '1.0.0');
    
    // Homepage specific styles
    wp_enqueue_style('homepage-styles', get_template_directory_uri() . '/css/homepage-styles.css', array('professional-services-style'), '1.0.0');
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), null);
    
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0');
    
    // jQuery (WordPress includes this by default, but ensure it's loaded)
    wp_enqueue_script('jquery');
    
    // Main JavaScript
    wp_enqueue_script('professional-services-main', get_template_directory_uri() . '/js/theme-main.js', array('jquery'), '1.0.0', true);
    
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'professional_services_scripts');

/**
 * Register Widget Areas
 */
function professional_services_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Main Sidebar', 'professional-services'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'professional-services'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 1', 'professional-services'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here.', 'professional-services'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 2', 'professional-services'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Add widgets here.', 'professional-services'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 3', 'professional-services'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Add widgets here.', 'professional-services'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'professional_services_widgets_init');

/**
 * Helper Functions for Frontend Display
 */

/**
 * Get Services by Category
 */
function get_services_by_category($category_slug = '', $limit = -1) {
    $args = array(
        'post_type' => 'service',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
    );
    
    if (!empty($category_slug)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'service_category',
                'field'    => 'slug',
                'terms'    => $category_slug,
            ),
        );
    }
    
    return new WP_Query($args);
}

/**
 * Get Testimonials
 */
function get_testimonials($limit = -1) {
    $args = array(
        'post_type' => 'testimonial',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'order' => 'ASC',
    );
    
    return new WP_Query($args);
}

/**
 * Get Pricing Plans
 */
function get_pricing_plans($limit = -1) {
    $args = array(
        'post_type' => 'pricing_plan',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'order' => 'ASC',
    );
    
    return new WP_Query($args);
}

/**
 * Get Projects
 */
function get_projects($category_slug = '', $limit = -1) {
    $args = array(
        'post_type' => 'project',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    );
    
    if (!empty($category_slug)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'project_category',
                'field'    => 'slug',
                'terms'    => $category_slug,
            ),
        );
    }
    
    return new WP_Query($args);
}

/**
 * Add Menu Navigation to Admin Bar for Easy Access
 */
function professional_services_admin_bar_menu($wp_admin_bar) {
    if (!current_user_can('edit_theme_options')) {
        return;
    }

    $wp_admin_bar->add_menu(array(
        'id'    => 'theme-services',
        'title' => 'Theme Services',
        'href'  => admin_url('edit.php?post_type=service'),
    ));

    $wp_admin_bar->add_menu(array(
        'id'     => 'services',
        'parent' => 'theme-services',
        'title'  => 'All Services',
        'href'   => admin_url('edit.php?post_type=service'),
    ));

    $wp_admin_bar->add_menu(array(
        'id'     => 'service-categories',
        'parent' => 'theme-services',
        'title'  => 'Service Categories',
        'href'   => admin_url('edit-tags.php?taxonomy=service_category&post_type=service'),
    ));

    $wp_admin_bar->add_menu(array(
        'id'     => 'testimonials',
        'parent' => 'theme-services',
        'title'  => 'Testimonials',
        'href'   => admin_url('edit.php?post_type=testimonial'),
    ));

    $wp_admin_bar->add_menu(array(
        'id'     => 'pricing-plans',
        'parent' => 'theme-services',
        'title'  => 'Pricing Plans',
        'href'   => admin_url('edit.php?post_type=pricing_plan'),
    ));

    $wp_admin_bar->add_menu(array(
        'id'     => 'projects',
        'parent' => 'theme-services',
        'title'  => 'Projects',
        'href'   => admin_url('edit.php?post_type=project'),
    ));

    $wp_admin_bar->add_menu(array(
        'id'     => 'menus',
        'parent' => 'theme-services',
        'title'  => 'Manage Menus',
        'href'   => admin_url('nav-menus.php'),
    ));
}
add_action('admin_bar_menu', 'professional_services_admin_bar_menu', 999);

/**
 * Flush rewrite rules on theme activation
 */
function professional_services_flush_rewrites() {
    professional_services_register_post_types();
    professional_services_register_taxonomies();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'professional_services_flush_rewrites');
