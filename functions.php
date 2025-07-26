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
 * CUSTOM POST TYPES REGISTRATION
 */
function blueprint_folder_register_post_types() {
    
    // SERVICES POST TYPE
    register_post_type('service', array(
        'labels' => array(
            'name' => __('Services', 'blueprint-folder'),
            'singular_name' => __('Service', 'blueprint-folder'),
            'menu_name' => __('Services', 'blueprint-folder'),
            'add_new' => __('Add New Service', 'blueprint-folder'),
            'add_new_item' => __('Add New Service', 'blueprint-folder'),
            'edit_item' => __('Edit Service', 'blueprint-folder'),
            'new_item' => __('New Service', 'blueprint-folder'),
            'view_item' => __('View Service', 'blueprint-folder'),
            'search_items' => __('Search Services', 'blueprint-folder'),
            'not_found' => __('No services found', 'blueprint-folder'),
            'not_found_in_trash' => __('No services found in trash', 'blueprint-folder'),
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'query_var' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-admin-tools',
        'menu_position' => 20,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes'),
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'services', 'with_front' => false),
        'capability_type' => 'post',
        'hierarchical' => false,
    ));

    // TESTIMONIALS POST TYPE
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => __('Testimonials', 'blueprint-folder'),
            'singular_name' => __('Testimonial', 'blueprint-folder'),
            'menu_name' => __('Testimonials', 'blueprint-folder'),
            'add_new' => __('Add New Testimonial', 'blueprint-folder'),
            'add_new_item' => __('Add New Testimonial', 'blueprint-folder'),
            'edit_item' => __('Edit Testimonial', 'blueprint-folder'),
            'new_item' => __('New Testimonial', 'blueprint-folder'),
            'view_item' => __('View Testimonial', 'blueprint-folder'),
            'search_items' => __('Search Testimonials', 'blueprint-folder'),
            'not_found' => __('No testimonials found', 'blueprint-folder'),
            'not_found_in_trash' => __('No testimonials found in trash', 'blueprint-folder'),
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'show_in_admin_bar' => true,
        'query_var' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-testimonial',
        'menu_position' => 21,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes'),
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'testimonials'),
        'capability_type' => 'post',
        'hierarchical' => false,
    ));

    // PRICING PLANS POST TYPE
    register_post_type('pricing_plan', array(
        'labels' => array(
            'name' => __('Pricing Plans', 'blueprint-folder'),
            'singular_name' => __('Pricing Plan', 'blueprint-folder'),
            'menu_name' => __('Pricing Plans', 'blueprint-folder'),
            'add_new' => __('Add New Plan', 'blueprint-folder'),
            'add_new_item' => __('Add New Pricing Plan', 'blueprint-folder'),
            'edit_item' => __('Edit Pricing Plan', 'blueprint-folder'),
            'new_item' => __('New Pricing Plan', 'blueprint-folder'),
            'view_item' => __('View Pricing Plan', 'blueprint-folder'),
            'search_items' => __('Search Pricing Plans', 'blueprint-folder'),
            'not_found' => __('No pricing plans found', 'blueprint-folder'),
            'not_found_in_trash' => __('No pricing plans found in trash', 'blueprint-folder'),
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'show_in_admin_bar' => true,
        'query_var' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-money-alt',
        'menu_position' => 22,
        'supports' => array('title', 'editor', 'custom-fields', 'page-attributes'),
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'pricing'),
        'capability_type' => 'post',
        'hierarchical' => false,
    ));

    // PROJECTS POST TYPE (Optional)
    register_post_type('project', array(
        'labels' => array(
            'name' => __('Projects', 'blueprint-folder'),
            'singular_name' => __('Project', 'blueprint-folder'),
            'menu_name' => __('Projects', 'blueprint-folder'),
            'add_new' => __('Add New Project', 'blueprint-folder'),
            'add_new_item' => __('Add New Project', 'blueprint-folder'),
            'edit_item' => __('Edit Project', 'blueprint-folder'),
            'new_item' => __('New Project', 'blueprint-folder'),
            'view_item' => __('View Project', 'blueprint-folder'),
            'search_items' => __('Search Projects', 'blueprint-folder'),
            'not_found' => __('No projects found', 'blueprint-folder'),
            'not_found_in_trash' => __('No projects found in trash', 'blueprint-folder'),
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'query_var' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-portfolio',
        'menu_position' => 23,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes'),
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'projects'),
        'capability_type' => 'post',
        'hierarchical' => false,
    ));
}
add_action('init', 'blueprint_folder_register_post_types');

/**
 * CUSTOM TAXONOMIES REGISTRATION
 */
function blueprint_folder_register_taxonomies() {
    
    // SERVICE CATEGORIES TAXONOMY
    register_taxonomy('service_category', 'service', array(
        'labels' => array(
            'name' => __('Service Categories', 'blueprint-folder'),
            'singular_name' => __('Service Category', 'blueprint-folder'),
            'menu_name' => __('Service Categories', 'blueprint-folder'),
            'all_items' => __('All Categories', 'blueprint-folder'),
            'edit_item' => __('Edit Category', 'blueprint-folder'),
            'view_item' => __('View Category', 'blueprint-folder'),
            'update_item' => __('Update Category', 'blueprint-folder'),
            'add_new_item' => __('Add New Category', 'blueprint-folder'),
            'new_item_name' => __('New Category Name', 'blueprint-folder'),
            'search_items' => __('Search Categories', 'blueprint-folder'),
            'popular_items' => __('Popular Categories', 'blueprint-folder'),
            'separate_items_with_commas' => __('Separate categories with commas', 'blueprint-folder'),
            'add_or_remove_items' => __('Add or remove categories', 'blueprint-folder'),
            'choose_from_most_used' => __('Choose from most used categories', 'blueprint-folder'),
            'not_found' => __('No categories found', 'blueprint-folder'),
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'service-category', 'with_front' => false),
        'query_var' => true,
        'show_in_rest' => true,
        'capabilities' => array(
            'manage_terms' => 'manage_categories',
            'edit_terms'   => 'manage_categories',
            'delete_terms' => 'manage_categories',
            'assign_terms' => 'edit_posts',
        ),
    ));

    // PROJECT CATEGORIES TAXONOMY
    register_taxonomy('project_category', 'project', array(
        'labels' => array(
            'name' => __('Project Categories', 'blueprint-folder'),
            'singular_name' => __('Project Category', 'blueprint-folder'),
            'menu_name' => __('Project Categories', 'blueprint-folder'),
            'all_items' => __('All Categories', 'blueprint-folder'),
            'edit_item' => __('Edit Category', 'blueprint-folder'),
            'view_item' => __('View Category', 'blueprint-folder'),
            'update_item' => __('Update Category', 'blueprint-folder'),
            'add_new_item' => __('Add New Category', 'blueprint-folder'),
            'new_item_name' => __('New Category Name', 'blueprint-folder'),
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
add_action('init', 'blueprint_folder_register_taxonomies');

/**
 * FORCE CUSTOM POST TYPES & TAXONOMIES IN NAV MENUS
 */
function blueprint_folder_force_nav_menu_display() {
    // Ensure services show in nav menus
    $service_post_type = get_post_type_object('service');
    if ($service_post_type) {
        $service_post_type->show_in_nav_menus = true;
    }
    
    // Ensure service categories show in nav menus
    $service_taxonomy = get_taxonomy('service_category');
    if ($service_taxonomy) {
        $service_taxonomy->show_in_nav_menus = true;
    }
    
    // Ensure projects show in nav menus
    $project_post_type = get_post_type_object('project');
    if ($project_post_type) {
        $project_post_type->show_in_nav_menus = true;
    }
}
add_action('init', 'blueprint_folder_force_nav_menu_display', 99);

/**
 * ADD CUSTOM META BOXES
 */
function blueprint_folder_add_meta_boxes() {
    
    // Service Details Meta Box
    add_meta_box(
        'service_details',
        __('Service Details', 'blueprint-folder'),
        'blueprint_folder_service_meta_box',
        'service',
        'normal',
        'high'
    );

    // Testimonial Details Meta Box
    add_meta_box(
        'testimonial_details',
        __('Testimonial Details', 'blueprint-folder'),
        'blueprint_folder_testimonial_meta_box',
        'testimonial',
        'normal',
        'high'
    );

    // Pricing Plan Details Meta Box
    add_meta_box(
        'pricing_details',
        __('Pricing Details', 'blueprint-folder'),
        'blueprint_folder_pricing_meta_box',
        'pricing_plan',
        'normal',
        'high'
    );

    // Project Details Meta Box
    add_meta_box(
        'project_details',
        __('Project Details', 'blueprint-folder'),
        'blueprint_folder_project_meta_box',
        'project',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'blueprint_folder_add_meta_boxes');

/**
 * SERVICE META BOX CALLBACK
 */
function blueprint_folder_service_meta_box($post) {
    wp_nonce_field('blueprint_folder_service_meta', 'blueprint_folder_service_meta_nonce');
    
    $price_range = get_post_meta($post->ID, '_service_price_range', true);
    $duration = get_post_meta($post->ID, '_service_duration', true);
    $features = get_post_meta($post->ID, '_service_features', true);
    $icon = get_post_meta($post->ID, '_service_icon', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="service_price_range"><?php _e('Price Range', 'blueprint-folder'); ?></label></th>
            <td><input type="text" id="service_price_range" name="service_price_range" value="<?php echo esc_attr($price_range); ?>" class="regular-text" placeholder="e.g., $100 - $500" /></td>
        </tr>
        <tr>
            <th><label for="service_duration"><?php _e('Duration', 'blueprint-folder'); ?></label></th>
            <td><input type="text" id="service_duration" name="service_duration" value="<?php echo esc_attr($duration); ?>" class="regular-text" placeholder="e.g., 2-4 hours" /></td>
        </tr>
        <tr>
            <th><label for="service_icon"><?php _e('Service Icon', 'blueprint-folder'); ?></label></th>
            <td><input type="text" id="service_icon" name="service_icon" value="<?php echo esc_attr($icon); ?>" class="regular-text" placeholder="e.g., fas fa-wrench (Font Awesome class)" /></td>
        </tr>
        <tr>
            <th><label for="service_features"><?php _e('Key Features', 'blueprint-folder'); ?></label></th>
            <td><textarea id="service_features" name="service_features" rows="5" cols="50" class="large-text" placeholder="One feature per line"><?php echo esc_textarea($features); ?></textarea></td>
        </tr>
    </table>
    <?php
}

/**
 * TESTIMONIAL META BOX CALLBACK
 */
function blueprint_folder_testimonial_meta_box($post) {
    wp_nonce_field('blueprint_folder_testimonial_meta', 'blueprint_folder_testimonial_meta_nonce');
    
    $client_name = get_post_meta($post->ID, '_testimonial_client_name', true);
    $client_position = get_post_meta($post->ID, '_testimonial_client_position', true);
    $client_company = get_post_meta($post->ID, '_testimonial_client_company', true);
    $rating = get_post_meta($post->ID, '_testimonial_rating', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="testimonial_client_name"><?php _e('Client Name', 'blueprint-folder'); ?></label></th>
            <td><input type="text" id="testimonial_client_name" name="testimonial_client_name" value="<?php echo esc_attr($client_name); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="testimonial_client_position"><?php _e('Client Position', 'blueprint-folder'); ?></label></th>
            <td><input type="text" id="testimonial_client_position" name="testimonial_client_position" value="<?php echo esc_attr($client_position); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="testimonial_client_company"><?php _e('Client Company', 'blueprint-folder'); ?></label></th>
            <td><input type="text" id="testimonial_client_company" name="testimonial_client_company" value="<?php echo esc_attr($client_company); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="testimonial_rating"><?php _e('Rating (1-5)', 'blueprint-folder'); ?></label></th>
            <td>
                <select id="testimonial_rating" name="testimonial_rating">
                    <option value=""><?php _e('Select Rating', 'blueprint-folder'); ?></option>
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <option value="<?php echo $i; ?>" <?php selected($rating, $i); ?>><?php echo $i; ?> <?php echo ($i == 1) ? __('Star', 'blueprint-folder') : __('Stars', 'blueprint-folder'); ?></option>
                    <?php endfor; ?>
                </select>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * PRICING PLAN META BOX CALLBACK
 */
function blueprint_folder_pricing_meta_box($post) {
    wp_nonce_field('blueprint_folder_pricing_meta', 'blueprint_folder_pricing_meta_nonce');
    
    $price = get_post_meta($post->ID, '_pricing_price', true);
    $period = get_post_meta($post->ID, '_pricing_period', true);
    $features = get_post_meta($post->ID, '_pricing_features', true);
    $featured = get_post_meta($post->ID, '_pricing_featured', true);
    $button_text = get_post_meta($post->ID, '_pricing_button_text', true);
    $button_url = get_post_meta($post->ID, '_pricing_button_url', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="pricing_price"><?php _e('Price', 'blueprint-folder'); ?></label></th>
            <td><input type="text" id="pricing_price" name="pricing_price" value="<?php echo esc_attr($price); ?>" class="regular-text" placeholder="e.g., $99" /></td>
        </tr>
        <tr>
            <th><label for="pricing_period"><?php _e('Period', 'blueprint-folder'); ?></label></th>
            <td><input type="text" id="pricing_period" name="pricing_period" value="<?php echo esc_attr($period); ?>" class="regular-text" placeholder="e.g., /month" /></td>
        </tr>
        <tr>
            <th><label for="pricing_features"><?php _e('Features List', 'blueprint-folder'); ?></label></th>
            <td><textarea id="pricing_features" name="pricing_features" rows="8" cols="50" class="large-text" placeholder="One feature per line"><?php echo esc_textarea($features); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="pricing_button_text"><?php _e('Button Text', 'blueprint-folder'); ?></label></th>
            <td><input type="text" id="pricing_button_text" name="pricing_button_text" value="<?php echo esc_attr($button_text); ?>" class="regular-text" placeholder="e.g., Get Started" /></td>
        </tr>
        <tr>
            <th><label for="pricing_button_url"><?php _e('Button URL', 'blueprint-folder'); ?></label></th>
            <td><input type="url" id="pricing_button_url" name="pricing_button_url" value="<?php echo esc_attr($button_url); ?>" class="regular-text" placeholder="e.g., /contact" /></td>
        </tr>
        <tr>
            <th><label for="pricing_featured"><?php _e('Featured Plan', 'blueprint-folder'); ?></label></th>
            <td><input type="checkbox" id="pricing_featured" name="pricing_featured" value="1" <?php checked($featured, 1); ?> /> <?php _e('Mark as featured plan', 'blueprint-folder'); ?></td>
        </tr>
    </table>
    <?php
}

/**
 * PROJECT META BOX CALLBACK
 */
function blueprint_folder_project_meta_box($post) {
    wp_nonce_field('blueprint_folder_project_meta', 'blueprint_folder_project_meta_nonce');
    
    $client = get_post_meta($post->ID, '_project_client', true);
    $completion_date = get_post_meta($post->ID, '_project_completion_date', true);
    $project_url = get_post_meta($post->ID, '_project_url', true);
    $technologies = get_post_meta($post->ID, '_project_technologies', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="project_client"><?php _e('Client Name', 'blueprint-folder'); ?></label></th>
            <td><input type="text" id="project_client" name="project_client" value="<?php echo esc_attr($client); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="project_completion_date"><?php _e('Completion Date', 'blueprint-folder'); ?></label></th>
            <td><input type="date" id="project_completion_date" name="project_completion_date" value="<?php echo esc_attr($completion_date); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="project_url"><?php _e('Project URL', 'blueprint-folder'); ?></label></th>
            <td><input type="url" id="project_url" name="project_url" value="<?php echo esc_attr($project_url); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="project_technologies"><?php _e('Technologies Used', 'blueprint-folder'); ?></label></th>
            <td><textarea id="project_technologies" name="project_technologies" rows="3" cols="50" class="large-text"><?php echo esc_textarea($technologies); ?></textarea></td>
        </tr>
    </table>
    <?php
}

/**
 * SAVE META BOX DATA
 */
function blueprint_folder_save_meta_boxes($post_id) {
    // Security checks
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    // Save service meta
    if (isset($_POST['blueprint_folder_service_meta_nonce']) && 
        wp_verify_nonce($_POST['blueprint_folder_service_meta_nonce'], 'blueprint_folder_service_meta')) {
        
        $fields = array('service_price_range', 'service_duration', 'service_features', 'service_icon');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
            }
        }
    }

    // Save testimonial meta
    if (isset($_POST['blueprint_folder_testimonial_meta_nonce']) && 
        wp_verify_nonce($_POST['blueprint_folder_testimonial_meta_nonce'], 'blueprint_folder_testimonial_meta')) {
        
        $fields = array('testimonial_client_name', 'testimonial_client_position', 'testimonial_client_company', 'testimonial_rating');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
            }
        }
    }

    // Save pricing meta
    if (isset($_POST['blueprint_folder_pricing_meta_nonce']) && 
        wp_verify_nonce($_POST['blueprint_folder_pricing_meta_nonce'], 'blueprint_folder_pricing_meta')) {
        
        $fields = array('pricing_price', 'pricing_period', 'pricing_features', 'pricing_button_text', 'pricing_button_url');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
            }
        }
        
        // Handle featured checkbox
        if (isset($_POST['pricing_featured'])) {
            update_post_meta($post_id, '_pricing_featured', 1);
        } else {
            delete_post_meta($post_id, '_pricing_featured');
        }
    }

    // Save project meta
    if (isset($_POST['blueprint_folder_project_meta_nonce']) && 
        wp_verify_nonce($_POST['blueprint_folder_project_meta_nonce'], 'blueprint_folder_project_meta')) {
        
        $fields = array('project_client', 'project_completion_date', 'project_url', 'project_technologies');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
            }
        }
    }
}
add_action('save_post', 'blueprint_folder_save_meta_boxes');

/**
 * ENQUEUE SCRIPTS AND STYLES
 */
function blueprint_folder_scripts() {
    // Main stylesheet
    wp_enqueue_style('blueprint-folder-style', get_stylesheet_uri(), array(), '2.0.0');
    
    // Header improvements CSS
    wp_enqueue_style('blueprint-folder-header', get_template_directory_uri() . '/css/header-improvements.css', array('blueprint-folder-style'), '2.0.0');
    
    // Font Awesome for icons
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0');
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), null);
    
    // Main JavaScript
    wp_enqueue_script('blueprint-folder-script', get_template_directory_uri() . '/js/theme-main.js', array('jquery'), '2.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('blueprint-folder-script', 'blueprint_folder_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('blueprint_folder_nonce')
    ));
    
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'blueprint_folder_scripts');

/**
 * WIDGET AREAS
 */
function blueprint_folder_widgets_init() {
    // Main sidebar
    register_sidebar(array(
        'name'          => esc_html__('Main Sidebar', 'blueprint-folder'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'blueprint-folder'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    // Footer widgets
    for ($i = 1; $i <= 4; $i++) {
        register_sidebar(array(
            'name'          => sprintf(esc_html__('Footer Widget %d', 'blueprint-folder'), $i),
            'id'            => "footer-{$i}",
            'description'   => esc_html__('Add widgets here.', 'blueprint-folder'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ));
    }
}
add_action('widgets_init', 'blueprint_folder_widgets_init');

/**
 * HELPER FUNCTIONS FOR FRONTEND DISPLAY
 */

// Get services by category
function blueprint_folder_get_services($category = '', $limit = -1) {
    $args = array(
        'post_type' => 'service',
        'posts_per_page' => $limit,
        'post_status' => 'publish'
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

// Get testimonials
function blueprint_folder_get_testimonials($limit = -1) {
    return new WP_Query(array(
        'post_type' => 'testimonial',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    ));
}

// Get pricing plans
function blueprint_folder_get_pricing_plans() {
    return new WP_Query(array(
        'post_type' => 'pricing_plan',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'order' => 'ASC'
    ));
}

// Get projects
function blueprint_folder_get_projects($category = '', $limit = -1) {
    $args = array(
        'post_type' => 'project',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    );
    
    if (!empty($category)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'project_category',
                'field'    => 'slug',
                'terms'    => $category,
            ),
        );
    }
    
    return new WP_Query($args);
}

/**
 * CUSTOMIZER SETTINGS
 */
function blueprint_folder_customize_register($wp_customize) {
    
    // Company Information Section
    $wp_customize->add_section('company_info', array(
        'title'    => __('Company Information', 'blueprint-folder'),
        'priority' => 30,
    ));

    // Company Phone
    $wp_customize->add_setting('company_phone', array(
        'default' => '(555) 123-4567',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('company_phone', array(
        'label'   => __('Phone Number', 'blueprint-folder'),
        'section' => 'company_info',
        'type'    => 'text',
    ));

    // Company Email
    $wp_customize->add_setting('company_email', array(
        'default' => 'info@blueprintfolder.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('company_email', array(
        'label'   => __('Email Address', 'blueprint-folder'),
        'section' => 'company_info',
        'type'    => 'email',
    ));

    // Company Address
    $wp_customize->add_setting('company_address', array(
        'default' => '123 Business St, City, State 12345',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('company_address', array(
        'label'   => __('Address', 'blueprint-folder'),
        'section' => 'company_info',
        'type'    => 'textarea',
    ));

    // Social Links Section
    $wp_customize->add_section('social_links', array(
        'title'    => __('Social Links', 'blueprint-folder'),
        'priority' => 35,
    ));

    $social_networks = array(
        'facebook' => 'Facebook',
        'twitter' => 'Twitter',
        'linkedin' => 'LinkedIn',
        'instagram' => 'Instagram',
        'youtube' => 'YouTube'
    );

    foreach ($social_networks as $network => $label) {
        $wp_customize->add_setting("social_{$network}", array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control("social_{$network}", array(
            'label'   => $label . ' ' . __('URL', 'blueprint-folder'),
            'section' => 'social_links',
            'type'    => 'url',
        ));
    }
}
add_action('customize_register', 'blueprint_folder_customize_register');

/**
 * ADMIN BAR QUICK LINKS
 */
function blueprint_folder_admin_bar_menu($wp_admin_bar) {
    if (!is_admin() || !current_user_can('manage_options')) {
        return;
    }

    $wp_admin_bar->add_menu(array(
        'id'     => 'blueprint-folder-admin',
        'title'  => 'BluePrint Folder',
        'href'   => admin_url('edit.php?post_type=service'),
    ));

    $wp_admin_bar->add_menu(array(
        'id'     => 'manage-services',
        'parent' => 'blueprint-folder-admin',
        'title'  => 'Services',
        'href'   => admin_url('edit.php?post_type=service'),
    ));

    $wp_admin_bar->add_menu(array(
        'id'     => 'manage-categories',
        'parent' => 'blueprint-folder-admin',
        'title'  => 'Service Categories',
        'href'   => admin_url('edit-tags.php?taxonomy=service_category&post_type=service'),
    ));

    $wp_admin_bar->add_menu(array(
        'id'     => 'manage-testimonials',
        'parent' => 'blueprint-folder-admin',
        'title'  => 'Testimonials',
        'href'   => admin_url('edit.php?post_type=testimonial'),
    ));

    $wp_admin_bar->add_menu(array(
        'id'     => 'manage-pricing',
        'parent' => 'blueprint-folder-admin',
        'title'  => 'Pricing Plans',
        'href'   => admin_url('edit.php?post_type=pricing_plan'),
    ));

    $wp_admin_bar->add_menu(array(
        'id'     => 'manage-menus',
        'parent' => 'blueprint-folder-admin',
        'title'  => 'Manage Menus',
        'href'   => admin_url('nav-menus.php'),
    ));
}
add_action('admin_bar_menu', 'blueprint_folder_admin_bar_menu', 999);

/**
 * NAVIGATION FALLBACK
 */
function blueprint_folder_navigation_fallback() {
    echo '<ul class="navbar-nav">';
    echo '<li class="nav-item"><a href="' . esc_url(home_url('/')) . '" class="nav-link">Home</a></li>';
    echo '<li class="nav-item"><a href="' . esc_url(home_url('/about')) . '" class="nav-link">About</a></li>';
    echo '<li class="nav-item"><a href="' . esc_url(get_post_type_archive_link('service')) . '" class="nav-link">Services</a></li>';
    echo '<li class="nav-item"><a href="' . esc_url(home_url('/contact')) . '" class="nav-link">Contact</a></li>';
    echo '</ul>';
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
 * PERFORMANCE OPTIMIZATIONS
 */

// Remove unnecessary scripts and styles
function blueprint_folder_remove_wp_scripts() {
    if (!is_admin()) {
        wp_deregister_script('wp-embed');
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wp_shortlink_wp_head');
    }
}
add_action('init', 'blueprint_folder_remove_wp_scripts');

// Optimize images lazy loading
function blueprint_folder_add_lazy_loading($content) {
    if (is_admin() || is_feed() || is_preview()) {
        return $content;
    }
    
    $content = str_replace('<img ', '<img loading="lazy" ', $content);
    return $content;
}
add_filter('the_content', 'blueprint_folder_add_lazy_loading');

// Disable WordPress emoji scripts
function blueprint_folder_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles'); 
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji'); 
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'blueprint_folder_disable_emojis');

/**
 * INCLUDE NAVIGATION WALKER
 */
require_once get_template_directory() . '/inc/navigation-walker.php';

/**
 * SEO OPTIMIZATIONS
 */
function blueprint_folder_seo_meta() {
    if (is_front_page()) {
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
