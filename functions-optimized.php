<?php
/**
 * Blueprint Folder Pro Theme Functions
 *
 * @package Blueprint_Folder_Pro
 * @version 4.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function blueprint_folder_setup() {
    // Theme support
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
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_theme_support('responsive-embeds');

    // Navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Navigation', 'blueprint-folder'),
        'footer' => __('Footer Navigation', 'blueprint-folder'),
        'services' => __('Services Navigation', 'blueprint-folder'),
    ));

    // Image sizes
    add_image_size('hero-banner', 1920, 800, true);
    add_image_size('service-thumbnail', 400, 300, true);
    add_image_size('team-member', 300, 300, true);
    add_image_size('project-thumbnail', 600, 400, true);

    // Content width
    $GLOBALS['content_width'] = 1200;
}
add_action('after_setup_theme', 'blueprint_folder_setup');

/**
 * Include Required Files
 */
require_once get_template_directory() . '/inc/navigation-walker.php';

/**
 * Enqueue Scripts and Styles
 */
function blueprint_folder_scripts() {
    // Main stylesheet
    wp_enqueue_style(
        'blueprint-folder-style',
        get_template_directory_uri() . '/style-optimized.css',
        array(),
        wp_get_theme()->get('Version')
    );

    // Google Fonts
    wp_enqueue_style(
        'blueprint-folder-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    // Main JavaScript
    wp_enqueue_script(
        'blueprint-folder-main',
        get_template_directory_uri() . '/js/main-optimized.js',
        array(),
        wp_get_theme()->get('Version'),
        true
    );

    // Localize script
    wp_localize_script('blueprint-folder-main', 'blueprintFolder', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('blueprint_folder_nonce'),
        'homeUrl' => home_url('/'),
        'themeUrl' => get_template_directory_uri(),
    ));

    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'blueprint_folder_scripts');

/**
 * Register Custom Post Types
 */
function blueprint_folder_register_post_types() {
    // Services Post Type
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
            'view_items' => __('View Services', 'blueprint-folder'),
            'search_items' => __('Search Services', 'blueprint-folder'),
            'not_found' => __('No services found', 'blueprint-folder'),
            'not_found_in_trash' => __('No services found in trash', 'blueprint-folder'),
            'all_items' => __('All Services', 'blueprint-folder'),
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
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'services'),
        'capability_type' => 'post',
        'hierarchical' => false,
    ));

    // Testimonials Post Type
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
            'all_items' => __('All Testimonials', 'blueprint-folder'),
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'show_in_admin_bar' => true,
        'query_var' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-format-quote',
        'menu_position' => 21,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'testimonials'),
        'capability_type' => 'post',
        'hierarchical' => false,
    ));

    // Pricing Plans Post Type
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
            'all_items' => __('All Pricing Plans', 'blueprint-folder'),
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
        'supports' => array('title', 'editor', 'custom-fields'),
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'pricing'),
        'capability_type' => 'post',
        'hierarchical' => false,
    ));

    // Projects/Portfolio Post Type
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
            'all_items' => __('All Projects', 'blueprint-folder'),
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
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'projects'),
        'capability_type' => 'post',
        'hierarchical' => false,
    ));

    // Team Members Post Type
    register_post_type('team_member', array(
        'labels' => array(
            'name' => __('Team Members', 'blueprint-folder'),
            'singular_name' => __('Team Member', 'blueprint-folder'),
            'menu_name' => __('Team', 'blueprint-folder'),
            'add_new' => __('Add Team Member', 'blueprint-folder'),
            'add_new_item' => __('Add New Team Member', 'blueprint-folder'),
            'edit_item' => __('Edit Team Member', 'blueprint-folder'),
            'new_item' => __('New Team Member', 'blueprint-folder'),
            'view_item' => __('View Team Member', 'blueprint-folder'),
            'search_items' => __('Search Team Members', 'blueprint-folder'),
            'not_found' => __('No team members found', 'blueprint-folder'),
            'not_found_in_trash' => __('No team members found in trash', 'blueprint-folder'),
            'all_items' => __('All Team Members', 'blueprint-folder'),
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'show_in_admin_bar' => true,
        'query_var' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-groups',
        'menu_position' => 24,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'team'),
        'capability_type' => 'post',
        'hierarchical' => false,
    ));
}
add_action('init', 'blueprint_folder_register_post_types', 0);

/**
 * Register Custom Taxonomies
 */
function blueprint_folder_register_taxonomies() {
    // Service Categories
    register_taxonomy('service_category', 'service', array(
        'labels' => array(
            'name' => __('Service Categories', 'blueprint-folder'),
            'singular_name' => __('Service Category', 'blueprint-folder'),
            'menu_name' => __('Service Categories', 'blueprint-folder'),
            'all_items' => __('All Service Categories', 'blueprint-folder'),
            'edit_item' => __('Edit Service Category', 'blueprint-folder'),
            'view_item' => __('View Service Category', 'blueprint-folder'),
            'update_item' => __('Update Service Category', 'blueprint-folder'),
            'add_new_item' => __('Add New Service Category', 'blueprint-folder'),
            'new_item_name' => __('New Service Category Name', 'blueprint-folder'),
            'parent_item' => __('Parent Service Category', 'blueprint-folder'),
            'parent_item_colon' => __('Parent Service Category:', 'blueprint-folder'),
            'search_items' => __('Search Service Categories', 'blueprint-folder'),
            'not_found' => __('No service categories found', 'blueprint-folder'),
        ),
        'hierarchical' => true,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'show_tagcloud' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'service-category'),
    ));

    // Project Categories
    register_taxonomy('project_category', 'project', array(
        'labels' => array(
            'name' => __('Project Categories', 'blueprint-folder'),
            'singular_name' => __('Project Category', 'blueprint-folder'),
            'menu_name' => __('Project Categories', 'blueprint-folder'),
            'all_items' => __('All Project Categories', 'blueprint-folder'),
            'edit_item' => __('Edit Project Category', 'blueprint-folder'),
            'view_item' => __('View Project Category', 'blueprint-folder'),
            'update_item' => __('Update Project Category', 'blueprint-folder'),
            'add_new_item' => __('Add New Project Category', 'blueprint-folder'),
            'new_item_name' => __('New Project Category Name', 'blueprint-folder'),
            'search_items' => __('Search Project Categories', 'blueprint-folder'),
            'not_found' => __('No project categories found', 'blueprint-folder'),
        ),
        'hierarchical' => true,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'show_tagcloud' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'project-category'),
    ));

    // Service Tags
    register_taxonomy('service_tag', 'service', array(
        'labels' => array(
            'name' => __('Service Tags', 'blueprint-folder'),
            'singular_name' => __('Service Tag', 'blueprint-folder'),
            'menu_name' => __('Service Tags', 'blueprint-folder'),
            'all_items' => __('All Service Tags', 'blueprint-folder'),
            'edit_item' => __('Edit Service Tag', 'blueprint-folder'),
            'view_item' => __('View Service Tag', 'blueprint-folder'),
            'update_item' => __('Update Service Tag', 'blueprint-folder'),
            'add_new_item' => __('Add New Service Tag', 'blueprint-folder'),
            'new_item_name' => __('New Service Tag Name', 'blueprint-folder'),
            'search_items' => __('Search Service Tags', 'blueprint-folder'),
            'not_found' => __('No service tags found', 'blueprint-folder'),
        ),
        'hierarchical' => false,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'show_tagcloud' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'service-tag'),
    ));
}
add_action('init', 'blueprint_folder_register_taxonomies', 0);

/**
 * Add Custom Meta Boxes
 */
function blueprint_folder_add_meta_boxes() {
    // Service meta box
    add_meta_box(
        'service_details',
        __('Service Details', 'blueprint-folder'),
        'blueprint_folder_service_meta_box',
        'service',
        'normal',
        'high'
    );

    // Testimonial meta box
    add_meta_box(
        'testimonial_details',
        __('Testimonial Details', 'blueprint-folder'),
        'blueprint_folder_testimonial_meta_box',
        'testimonial',
        'normal',
        'high'
    );

    // Pricing plan meta box
    add_meta_box(
        'pricing_details',
        __('Pricing Details', 'blueprint-folder'),
        'blueprint_folder_pricing_meta_box',
        'pricing_plan',
        'normal',
        'high'
    );

    // Team member meta box
    add_meta_box(
        'team_member_details',
        __('Team Member Details', 'blueprint-folder'),
        'blueprint_folder_team_member_meta_box',
        'team_member',
        'normal',
        'high'
    );

    // Project meta box
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
 * Service Meta Box Callback
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
 * Testimonial Meta Box Callback
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
 * Pricing Plan Meta Box Callback
 */
function blueprint_folder_pricing_meta_box($post) {
    wp_nonce_field('blueprint_folder_pricing_meta', 'blueprint_folder_pricing_meta_nonce');
    
    $price = get_post_meta($post->ID, '_pricing_price', true);
    $billing_period = get_post_meta($post->ID, '_pricing_billing_period', true);
    $features = get_post_meta($post->ID, '_pricing_features', true);
    $is_featured = get_post_meta($post->ID, '_pricing_is_featured', true);
    $button_text = get_post_meta($post->ID, '_pricing_button_text', true);
    $button_url = get_post_meta($post->ID, '_pricing_button_url', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="pricing_price"><?php _e('Price', 'blueprint-folder'); ?></label></th>
            <td><input type="text" id="pricing_price" name="pricing_price" value="<?php echo esc_attr($price); ?>" class="regular-text" placeholder="e.g., $99" /></td>
        </tr>
        <tr>
            <th><label for="pricing_billing_period"><?php _e('Billing Period', 'blueprint-folder'); ?></label></th>
            <td><input type="text" id="pricing_billing_period" name="pricing_billing_period" value="<?php echo esc_attr($billing_period); ?>" class="regular-text" placeholder="e.g., per month" /></td>
        </tr>
        <tr>
            <th><label for="pricing_features"><?php _e('Features', 'blueprint-folder'); ?></label></th>
            <td><textarea id="pricing_features" name="pricing_features" rows="5" cols="50" class="large-text" placeholder="One feature per line"><?php echo esc_textarea($features); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="pricing_button_text"><?php _e('Button Text', 'blueprint-folder'); ?></label></th>
            <td><input type="text" id="pricing_button_text" name="pricing_button_text" value="<?php echo esc_attr($button_text); ?>" class="regular-text" placeholder="e.g., Get Started" /></td>
        </tr>
        <tr>
            <th><label for="pricing_button_url"><?php _e('Button URL', 'blueprint-folder'); ?></label></th>
            <td><input type="url" id="pricing_button_url" name="pricing_button_url" value="<?php echo esc_attr($button_url); ?>" class="regular-text" placeholder="https://" /></td>
        </tr>
        <tr>
            <th><label for="pricing_is_featured"><?php _e('Featured Plan', 'blueprint-folder'); ?></label></th>
            <td><input type="checkbox" id="pricing_is_featured" name="pricing_is_featured" value="1" <?php checked($is_featured, 1); ?> /> <?php _e('Mark as featured plan', 'blueprint-folder'); ?></td>
        </tr>
    </table>
    <?php
}

/**
 * Team Member Meta Box Callback
 */
function blueprint_folder_team_member_meta_box($post) {
    wp_nonce_field('blueprint_folder_team_member_meta', 'blueprint_folder_team_member_meta_nonce');
    
    $position = get_post_meta($post->ID, '_team_member_position', true);
    $email = get_post_meta($post->ID, '_team_member_email', true);
    $phone = get_post_meta($post->ID, '_team_member_phone', true);
    $linkedin = get_post_meta($post->ID, '_team_member_linkedin', true);
    $twitter = get_post_meta($post->ID, '_team_member_twitter', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="team_member_position"><?php _e('Position/Title', 'blueprint-folder'); ?></label></th>
            <td><input type="text" id="team_member_position" name="team_member_position" value="<?php echo esc_attr($position); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="team_member_email"><?php _e('Email', 'blueprint-folder'); ?></label></th>
            <td><input type="email" id="team_member_email" name="team_member_email" value="<?php echo esc_attr($email); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="team_member_phone"><?php _e('Phone', 'blueprint-folder'); ?></label></th>
            <td><input type="tel" id="team_member_phone" name="team_member_phone" value="<?php echo esc_attr($phone); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="team_member_linkedin"><?php _e('LinkedIn URL', 'blueprint-folder'); ?></label></th>
            <td><input type="url" id="team_member_linkedin" name="team_member_linkedin" value="<?php echo esc_attr($linkedin); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="team_member_twitter"><?php _e('Twitter URL', 'blueprint-folder'); ?></label></th>
            <td><input type="url" id="team_member_twitter" name="team_member_twitter" value="<?php echo esc_attr($twitter); ?>" class="regular-text" /></td>
        </tr>
    </table>
    <?php
}

/**
 * Project Meta Box Callback
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
            <th><label for="project_client"><?php _e('Client', 'blueprint-folder'); ?></label></th>
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
            <td><textarea id="project_technologies" name="project_technologies" rows="3" cols="50" class="large-text" placeholder="e.g., WordPress, PHP, JavaScript"><?php echo esc_textarea($technologies); ?></textarea></td>
        </tr>
    </table>
    <?php
}

/**
 * Save Meta Box Data
 */
function blueprint_folder_save_meta_boxes($post_id) {
    // Verify nonce and check permissions
    if (!isset($_POST['blueprint_folder_service_meta_nonce']) && 
        !isset($_POST['blueprint_folder_testimonial_meta_nonce']) && 
        !isset($_POST['blueprint_folder_pricing_meta_nonce']) && 
        !isset($_POST['blueprint_folder_team_member_meta_nonce']) && 
        !isset($_POST['blueprint_folder_project_meta_nonce'])) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

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
        
        $fields = array('pricing_price', 'pricing_billing_period', 'pricing_features', 'pricing_button_text', 'pricing_button_url');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
            }
        }
        
        // Handle checkbox
        $is_featured = isset($_POST['pricing_is_featured']) ? 1 : 0;
        update_post_meta($post_id, '_pricing_is_featured', $is_featured);
    }

    // Save team member meta
    if (isset($_POST['blueprint_folder_team_member_meta_nonce']) && 
        wp_verify_nonce($_POST['blueprint_folder_team_member_meta_nonce'], 'blueprint_folder_team_member_meta')) {
        
        $fields = array('team_member_position', 'team_member_email', 'team_member_phone', 'team_member_linkedin', 'team_member_twitter');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
            }
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
 * Helper Functions
 */

// Get services by category
function blueprint_folder_get_services_by_category($category = '', $limit = -1) {
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

// Get team members
function blueprint_folder_get_team_members($limit = -1) {
    return new WP_Query(array(
        'post_type' => 'team_member',
        'posts_per_page' => $limit,
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
 * Navigation Fallback
 */
function blueprint_folder_navigation_fallback() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . __('Home', 'blueprint-folder') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/about')) . '">' . __('About', 'blueprint-folder') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/services')) . '">' . __('Services', 'blueprint-folder') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/projects')) . '">' . __('Projects', 'blueprint-folder') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/pricing')) . '">' . __('Pricing', 'blueprint-folder') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact')) . '">' . __('Contact', 'blueprint-folder') . '</a></li>';
    echo '</ul>';
}

/**
 * Flush rewrite rules on theme activation
 */
function blueprint_folder_flush_rewrite_rules() {
    blueprint_folder_register_post_types();
    blueprint_folder_register_taxonomies();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'blueprint_folder_flush_rewrite_rules');

/**
 * Widget Areas
 */
function blueprint_folder_widgets_init() {
    register_sidebar(array(
        'name' => __('Footer Widget 1', 'blueprint-folder'),
        'id' => 'footer-1',
        'description' => __('Add widgets here to appear in the first footer column.', 'blueprint-folder'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer Widget 2', 'blueprint-folder'),
        'id' => 'footer-2',
        'description' => __('Add widgets here to appear in the second footer column.', 'blueprint-folder'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer Widget 3', 'blueprint-folder'),
        'id' => 'footer-3',
        'description' => __('Add widgets here to appear in the third footer column.', 'blueprint-folder'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer Widget 4', 'blueprint-folder'),
        'id' => 'footer-4',
        'description' => __('Add widgets here to appear in the fourth footer column.', 'blueprint-folder'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'blueprint_folder_widgets_init');

/**
 * Customizer Support
 */
function blueprint_folder_customize_register($wp_customize) {
    // Theme Options Panel
    $wp_customize->add_panel('blueprint_folder_theme_options', array(
        'title' => __('Blueprint Folder Options', 'blueprint-folder'),
        'description' => __('Customize your Blueprint Folder theme settings.', 'blueprint-folder'),
        'priority' => 30,
    ));

    // Header Section
    $wp_customize->add_section('blueprint_folder_header', array(
        'title' => __('Header Settings', 'blueprint-folder'),
        'panel' => 'blueprint_folder_theme_options',
        'priority' => 10,
    ));

    // Logo
    $wp_customize->add_setting('blueprint_folder_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'blueprint_folder_logo', array(
        'label' => __('Upload Logo', 'blueprint-folder'),
        'section' => 'blueprint_folder_header',
        'settings' => 'blueprint_folder_logo',
    )));

    // Contact Information
    $wp_customize->add_section('blueprint_folder_contact', array(
        'title' => __('Contact Information', 'blueprint-folder'),
        'panel' => 'blueprint_folder_theme_options',
        'priority' => 20,
    ));

    $wp_customize->add_setting('blueprint_folder_phone', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('blueprint_folder_phone', array(
        'label' => __('Phone Number', 'blueprint-folder'),
        'section' => 'blueprint_folder_contact',
        'type' => 'text',
    ));

    $wp_customize->add_setting('blueprint_folder_email', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('blueprint_folder_email', array(
        'label' => __('Email Address', 'blueprint-folder'),
        'section' => 'blueprint_folder_contact',
        'type' => 'email',
    ));

    $wp_customize->add_setting('blueprint_folder_address', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('blueprint_folder_address', array(
        'label' => __('Address', 'blueprint-folder'),
        'section' => 'blueprint_folder_contact',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'blueprint_folder_customize_register');

/**
 * SEO and Performance Optimizations
 */

// Remove unnecessary WordPress features
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head');

// Optimize jQuery loading
function blueprint_folder_optimize_jquery() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', false, '3.6.0', true);
        wp_enqueue_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'blueprint_folder_optimize_jquery');

// Add structured data for services
function blueprint_folder_add_service_schema($post_id) {
    if (get_post_type($post_id) !== 'service') return;
    
    $service = get_post($post_id);
    $price_range = get_post_meta($post_id, '_service_price_range', true);
    
    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => $service->post_title,
        'description' => wp_strip_all_tags($service->post_content),
        'provider' => array(
            '@type' => 'Organization',
            'name' => get_bloginfo('name'),
            'url' => home_url()
        )
    );
    
    if ($price_range) {
        $schema['offers'] = array(
            '@type' => 'Offer',
            'price' => $price_range,
            'priceCurrency' => 'USD'
        );
    }
    
    echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
}

// Add to single service pages
function blueprint_folder_single_service_schema() {
    if (is_singular('service')) {
        blueprint_folder_add_service_schema(get_the_ID());
    }
}
add_action('wp_head', 'blueprint_folder_single_service_schema');
