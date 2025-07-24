<?php
/**
 * Services Pro Theme Functions
 * Version: 3.0 - Clean WordPress standards implementation
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup
 */
function services_pro_setup() {
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
    add_theme_support('custom-logo');
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('align-wide');
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');

    // Add editor color palette
    add_theme_support('editor-color-palette', array(
        array(
            'name' => esc_html__('Primary Dark', 'services-pro'),
            'slug' => 'primary-dark',
            'color' => '#0b1133',
        ),
        array(
            'name' => esc_html__('Accent Orange', 'services-pro'),
            'slug' => 'accent',
            'color' => '#ff5f00',
        ),
        array(
            'name' => esc_html__('Light Gray', 'services-pro'),
            'slug' => 'light-gray',
            'color' => '#f8f9fa',
        ),
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'services-pro'),
        'footer' => esc_html__('Footer Menu', 'services-pro'),
        'mobile' => esc_html__('Mobile Menu', 'services-pro'),
    ));

    // Add custom image sizes
    add_image_size('service-thumbnail', 300, 200, true);
    add_image_size('hero-image', 1200, 600, true);
    add_image_size('team-member', 400, 400, true);
    add_image_size('portfolio-item', 600, 400, true);
}
add_action('after_setup_theme', 'services_pro_setup');

/**
 * Register Custom Post Types
 */
function services_pro_register_custom_post_types() {
    // Services Custom Post Type
    register_post_type('service', array(
        'labels' => array(
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
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-hammer',
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'service'),
        'capability_type' => 'post',
        'hierarchical' => false,
        'taxonomies' => array('service_category', 'service_tag')
    ));

    // FAQs Custom Post Type
    register_post_type('faq', array(
        'labels' => array(
            'name' => 'FAQs',
            'singular_name' => 'FAQ',
            'menu_name' => 'FAQs',
            'add_new' => 'Add New FAQ',
            'add_new_item' => 'Add New FAQ',
            'edit_item' => 'Edit FAQ',
            'new_item' => 'New FAQ',
            'view_item' => 'View FAQ',
            'search_items' => 'Search FAQs',
            'not_found' => 'No FAQs found',
            'not_found_in_trash' => 'No FAQs found in trash'
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-editor-help',
        'menu_position' => 6,
        'supports' => array('title', 'editor', 'custom-fields'),
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'faq'),
        'capability_type' => 'post',
        'hierarchical' => false,
        'taxonomies' => array('faq_category')
    ));

    // Menu Items Custom Post Type (for restaurant/food service menu)
    register_post_type('menu_item', array(
        'labels' => array(
            'name' => 'Menu Items',
            'singular_name' => 'Menu Item',
            'menu_name' => 'Menu Items',
            'add_new' => 'Add New Menu Item',
            'add_new_item' => 'Add New Menu Item',
            'edit_item' => 'Edit Menu Item',
            'new_item' => 'New Menu Item',
            'view_item' => 'View Menu Item',
            'search_items' => 'Search Menu Items',
            'not_found' => 'No menu items found',
            'not_found_in_trash' => 'No menu items found in trash'
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-food',
        'menu_position' => 7,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'menu-item'),
        'capability_type' => 'post',
        'hierarchical' => false,
        'taxonomies' => array('menu_category')
    ));
}
add_action('init', 'services_pro_register_custom_post_types');

/**
 * Register Custom Taxonomies
 */
function services_pro_register_taxonomies() {
    // Service Categories
    register_taxonomy('service_category', 'service', array(
        'labels' => array(
            'name' => 'Service Categories',
            'singular_name' => 'Service Category',
            'menu_name' => 'Categories',
            'add_new_item' => 'Add New Category',
            'edit_item' => 'Edit Category'
        ),
        'hierarchical' => true,
        'public' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'service-category')
    ));

    // Service Tags
    register_taxonomy('service_tag', 'service', array(
        'labels' => array(
            'name' => 'Service Tags',
            'singular_name' => 'Service Tag',
            'menu_name' => 'Tags',
            'add_new_item' => 'Add New Tag',
            'edit_item' => 'Edit Tag'
        ),
        'hierarchical' => false,
        'public' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'service-tag')
    ));

    // FAQ Categories
    register_taxonomy('faq_category', 'faq', array(
        'labels' => array(
            'name' => 'FAQ Categories',
            'singular_name' => 'FAQ Category',
            'menu_name' => 'Categories',
            'add_new_item' => 'Add New Category',
            'edit_item' => 'Edit Category'
        ),
        'hierarchical' => true,
        'public' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'faq-category')
    ));

    // Menu Categories
    register_taxonomy('menu_category', 'menu_item', array(
        'labels' => array(
            'name' => 'Menu Categories',
            'singular_name' => 'Menu Category',
            'menu_name' => 'Categories',
            'add_new_item' => 'Add New Category',
            'edit_item' => 'Edit Category'
        ),
        'hierarchical' => true,
        'public' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'menu-category')
    ));
}
add_action('init', 'services_pro_register_taxonomies');

/**
 * Add custom meta boxes for custom post types
 */
function services_pro_add_meta_boxes() {
    // Service meta boxes
    add_meta_box(
        'service_details',
        'Service Details',
        'services_pro_service_details_callback',
        'service',
        'normal',
        'high'
    );
    
    // Menu item meta boxes
    add_meta_box(
        'menu_item_details',
        'Menu Item Details',
        'services_pro_menu_item_details_callback',
        'menu_item',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'services_pro_add_meta_boxes');

/**
 * Service details meta box callback
 */
function services_pro_service_details_callback($post) {
    wp_nonce_field('services_pro_service_details', 'services_pro_service_details_nonce');
    
    $price_range = get_post_meta($post->ID, 'service_price_range', true);
    $duration = get_post_meta($post->ID, 'service_duration', true);
    $includes = get_post_meta($post->ID, 'service_includes', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="service_price_range">Price Range</label></th>
            <td><input type="text" id="service_price_range" name="service_price_range" value="<?php echo esc_attr($price_range); ?>" class="regular-text" placeholder="e.g., $100 - $500" /></td>
        </tr>
        <tr>
            <th><label for="service_duration">Duration</label></th>
            <td><input type="text" id="service_duration" name="service_duration" value="<?php echo esc_attr($duration); ?>" class="regular-text" placeholder="e.g., 2-4 hours" /></td>
        </tr>
        <tr>
            <th><label for="service_includes">What's Included</label></th>
            <td><textarea id="service_includes" name="service_includes" rows="3" cols="50" class="large-text"><?php echo esc_textarea($includes); ?></textarea></td>
        </tr>
    </table>
    <?php
}

/**
 * Menu item details meta box callback
 */
function services_pro_menu_item_details_callback($post) {
    wp_nonce_field('services_pro_menu_item_details', 'services_pro_menu_item_details_nonce');
    
    $price = get_post_meta($post->ID, 'menu_item_price', true);
    $ingredients = get_post_meta($post->ID, 'ingredients', true);
    $allergens = get_post_meta($post->ID, 'allergens', true);
    $dietary_info = get_post_meta($post->ID, 'dietary_info', true);
    $calories = get_post_meta($post->ID, 'calories', true);
    $prep_time = get_post_meta($post->ID, 'prep_time', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="menu_item_price">Price</label></th>
            <td><input type="number" id="menu_item_price" name="menu_item_price" value="<?php echo esc_attr($price); ?>" step="0.01" min="0" placeholder="0.00" /></td>
        </tr>
        <tr>
            <th><label for="ingredients">Ingredients</label></th>
            <td><textarea id="ingredients" name="ingredients" rows="3" cols="50" class="large-text" placeholder="List main ingredients..."><?php echo esc_textarea($ingredients); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="allergens">Allergens</label></th>
            <td><input type="text" id="allergens" name="allergens" value="<?php echo esc_attr($allergens); ?>" class="regular-text" placeholder="e.g., Contains nuts, dairy" /></td>
        </tr>
        <tr>
            <th><label for="dietary_info">Dietary Information</label></th>
            <td><input type="text" id="dietary_info" name="dietary_info" value="<?php echo esc_attr($dietary_info); ?>" class="regular-text" placeholder="e.g., vegetarian, vegan, gluten-free, spicy" /></td>
        </tr>
        <tr>
            <th><label for="calories">Calories</label></th>
            <td><input type="number" id="calories" name="calories" value="<?php echo esc_attr($calories); ?>" min="0" placeholder="0" /></td>
        </tr>
        <tr>
            <th><label for="prep_time">Prep Time</label></th>
            <td><input type="text" id="prep_time" name="prep_time" value="<?php echo esc_attr($prep_time); ?>" class="regular-text" placeholder="e.g., 15 minutes" /></td>
        </tr>
    </table>
    <?php
}

/**
 * Save custom meta box data
 */
function services_pro_save_meta_boxes($post_id) {
    // Service details
    if (isset($_POST['services_pro_service_details_nonce']) && wp_verify_nonce($_POST['services_pro_service_details_nonce'], 'services_pro_service_details')) {
        if (isset($_POST['service_price_range'])) {
            update_post_meta($post_id, 'service_price_range', sanitize_text_field($_POST['service_price_range']));
        }
        if (isset($_POST['service_duration'])) {
            update_post_meta($post_id, 'service_duration', sanitize_text_field($_POST['service_duration']));
        }
        if (isset($_POST['service_includes'])) {
            update_post_meta($post_id, 'service_includes', sanitize_textarea_field($_POST['service_includes']));
        }
    }
    
    // Menu item details
    if (isset($_POST['services_pro_menu_item_details_nonce']) && wp_verify_nonce($_POST['services_pro_menu_item_details_nonce'], 'services_pro_menu_item_details')) {
        if (isset($_POST['menu_item_price'])) {
            update_post_meta($post_id, 'menu_item_price', sanitize_text_field($_POST['menu_item_price']));
        }
        if (isset($_POST['ingredients'])) {
            update_post_meta($post_id, 'ingredients', sanitize_textarea_field($_POST['ingredients']));
        }
        if (isset($_POST['allergens'])) {
            update_post_meta($post_id, 'allergens', sanitize_text_field($_POST['allergens']));
        }
        if (isset($_POST['dietary_info'])) {
            update_post_meta($post_id, 'dietary_info', sanitize_text_field($_POST['dietary_info']));
        }
        if (isset($_POST['calories'])) {
            update_post_meta($post_id, 'calories', intval($_POST['calories']));
        }
        if (isset($_POST['prep_time'])) {
            update_post_meta($post_id, 'prep_time', sanitize_text_field($_POST['prep_time']));
        }
    }
}
add_action('save_post', 'services_pro_save_meta_boxes');

/**
 * Display services grid
 */
function services_pro_display_services($limit = 6, $category = '') {
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
    
    $services = new WP_Query($args);
    
    if ($services->have_posts()) :
        ?>
        <div class="row g-4">
            <?php while ($services->have_posts()) : $services->the_post(); ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card service-card h-100 shadow-sm border-0">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="card-img-top position-relative overflow-hidden">
                                <?php the_post_thumbnail('service-thumbnail', array('class' => 'img-fluid w-100', 'style' => 'height: 200px; object-fit: cover;')); ?>
                                <div class="overlay position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-25"></div>
                            </div>
                        <?php endif; ?>
                        
                        <div class="card-body p-4">
                            <h3 class="card-title h5 mb-3">
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            
                            <p class="card-text text-muted mb-4"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                            
                            <a href="<?php the_permalink(); ?>" class="btn btn-accent btn-sm">
                                Learn More <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php
    endif;
    wp_reset_postdata();
}

/**
 * Display FAQ accordion
 */
function services_pro_display_faqs($limit = -1, $category = '') {
    $args = array(
        'post_type' => 'faq',
        'posts_per_page' => $limit,
        'post_status' => 'publish'
    );
    
    if (!empty($category)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'faq_category',
                'field'    => 'slug',
                'terms'    => $category,
            ),
        );
    }
    
    $faqs = new WP_Query($args);
    
    if ($faqs->have_posts()) :
        ?>
        <div class="accordion" id="faqAccordion">
            <?php
            $counter = 0;
            while ($faqs->have_posts()) : $faqs->the_post();
                $counter++;
                $collapse_id = 'faq_' . $counter;
            ?>
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h3 class="accordion-header" id="heading<?php echo esc_attr($collapse_id); ?>">
                        <button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($collapse_id); ?>" aria-expanded="false" aria-controls="<?php echo esc_attr($collapse_id); ?>">
                            <i class="fas fa-question-circle text-accent me-3"></i>
                            <?php the_title(); ?>
                        </button>
                    </h3>
                    <div id="<?php echo esc_attr($collapse_id); ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo esc_attr($collapse_id); ?>" data-bs-parent="#faqAccordion">
                        <div class="accordion-body bg-white">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php
    endif;
    wp_reset_postdata();
}

/**
 * Enqueue scripts and styles
 */
function services_pro_scripts() {
    // Main stylesheet
    wp_enqueue_style('services-pro-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
    
    // Global utilities CSS
    wp_enqueue_style('services-pro-global', get_template_directory_uri() . '/global.css', array('services-pro-style'), wp_get_theme()->get('Version'));
    
    // Bootstrap CSS
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0');
    
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    
    // Bootstrap JS
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true);
    
    // Theme JS
    wp_enqueue_script('services-pro-scripts', get_template_directory_uri() . '/js/theme.js', array('jquery', 'bootstrap'), wp_get_theme()->get('Version'), true);
    
    // Localize script for AJAX
    wp_localize_script('services-pro-scripts', 'servicesPro', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('services_pro_nonce'),
    ));
    
    // Comment reply
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'services_pro_scripts');

/**
 * Include required files
 */
$template_files = array(
    '/inc/clean-navigation-walker.php',
    '/inc/customizer.php',
    '/inc/template-functions.php'
);

foreach ($template_files as $file) {
    $file_path = get_template_directory() . $file;
    if (file_exists($file_path)) {
        require_once $file_path;
    }
}

/**
 * Register widget areas
 */
function services_pro_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Main Sidebar', 'services-pro'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'services-pro'),
        'before_widget' => '<section id="%1$s" class="widget %2$s mb-4">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title h5 mb-3">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer Widgets', 'services-pro'),
        'id'            => 'footer-widgets',
        'description'   => esc_html__('Footer widget area.', 'services-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s col-lg-3 mb-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title h6 mb-3 text-white">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'services_pro_widgets_init');

/**
 * Navigation fallback function
 */
function clean_navigation_fallback() {
    echo '<ul class="navbar-nav ms-auto">';
    echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(home_url('/')) . '">Home</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(home_url('/about/')) . '">About</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(home_url('/services/')) . '">Services</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(home_url('/contact/')) . '">Contact</a></li>';
    echo '</ul>';
}

/**
 * Add custom CSS to head based on customizer settings
 */
function services_pro_customize_css() {
    $primary_color = get_theme_mod('primary_color', '#0b1133');
    $accent_color = get_theme_mod('accent_color', '#ff5f00');
    
    if ($primary_color !== '#0b1133' || $accent_color !== '#ff5f00') {
        ?>
        <style type="text/css">
            :root {
                --primary-dark: <?php echo esc_html($primary_color); ?>;
                --accent: <?php echo esc_html($accent_color); ?>;
            }
        </style>
        <?php
    }
}
add_action('wp_head', 'services_pro_customize_css');

/**
 * Simple theme setup function for creating default menus
 */
function services_pro_simple_setup() {
    // Create a basic navigation menu if none exists
    $menu_name = 'Primary Menu';
    $menu_exists = wp_get_nav_menu_object($menu_name);
    
    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);
        
        // Add menu items
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Home',
            'menu-item-url' => home_url('/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom'
        ));
        
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'About',
            'menu-item-url' => home_url('/about'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom'
        ));
        
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Services',
            'menu-item-url' => home_url('/services'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom'
        ));
        
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Menu',
            'menu-item-url' => home_url('/menu'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom'
        ));
        
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Blog',
            'menu-item-url' => home_url('/blog'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom'
        ));
        
        // Add our custom post type archives
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'FAQ',
            'menu-item-url' => get_post_type_archive_link('faq'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom'
        ));
        
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Contact',
            'menu-item-url' => home_url('/contact'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom'
        ));
        
        // Assign to primary location
        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}
add_action('after_switch_theme', 'services_pro_simple_setup');

/**
 * Add custom admin menu for easy management
 */
function services_pro_admin_menu() {
    add_menu_page(
        'Theme Manager',
        'Theme Manager',
        'manage_options',
        'services-pro-theme',
        'services_pro_admin_page',
        'dashicons-admin-home',
        30
    );
}
add_action('admin_menu', 'services_pro_admin_menu');

/**
 * Admin page content
 */
function services_pro_admin_page() {
    ?>
    <div class="wrap">
        <h1>Services Pro Theme Manager</h1>
        
        <div class="card">
            <h2>Quick Links</h2>
            <p>Manage your content and settings:</p>
            <ul>
                <li><a href="<?php echo admin_url('edit.php?post_type=service'); ?>">Manage Services</a> - Add, edit, and organize your services</li>
                <li><a href="<?php echo admin_url('edit.php?post_type=faq'); ?>">Manage FAQs</a> - Create and categorize frequently asked questions</li>
                <li><a href="<?php echo admin_url('edit.php?post_type=menu_item'); ?>">Manage Menu Items</a> - Add food items with pricing and categories</li>
                <li><a href="<?php echo admin_url('edit-tags.php?taxonomy=service_category&post_type=service'); ?>">Service Categories</a> - Organize services by type</li>
                <li><a href="<?php echo admin_url('edit-tags.php?taxonomy=menu_category&post_type=menu_item'); ?>">Menu Categories</a> - Group menu items (e.g., Appetizers, Main Course)</li>
                <li><a href="<?php echo admin_url('nav-menus.php'); ?>">Manage Navigation Menus</a> - Customize site navigation</li>
                <li><a href="<?php echo admin_url('customize.php'); ?>">Customize Theme</a> - Colors, fonts, and layout</li>
            </ul>
        </div>
        
        <div class="card">
            <h2>Content Status</h2>
            <?php
            $services_count = wp_count_posts('service')->publish;
            $faqs_count = wp_count_posts('faq')->publish;
            $menu_items_count = wp_count_posts('menu_item')->publish;
            $posts_count = wp_count_posts('post')->publish;
            ?>
            <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <th>Content Type</th>
                        <th>Published Items</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Services</td>
                        <td><?php echo esc_html($services_count); ?> published</td>
                        <td><a href="<?php echo admin_url('post-new.php?post_type=service'); ?>" class="button">Add New Service</a></td>
                    </tr>
                    <tr>
                        <td>FAQs</td>
                        <td><?php echo esc_html($faqs_count); ?> published</td>
                        <td><a href="<?php echo admin_url('post-new.php?post_type=faq'); ?>" class="button">Add New FAQ</a></td>
                    </tr>
                    <tr>
                        <td>Menu Items</td>
                        <td><?php echo esc_html($menu_items_count); ?> published</td>
                        <td><a href="<?php echo admin_url('post-new.php?post_type=menu_item'); ?>" class="button">Add New Menu Item</a></td>
                    </tr>
                    <tr>
                        <td>Blog Posts</td>
                        <td><?php echo esc_html($posts_count); ?> published</td>
                        <td><a href="<?php echo admin_url('post-new.php'); ?>" class="button">Add New Post</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="card">
            <h2>Sample Data</h2>
            <p>Need some content to get started?</p>
            <a href="<?php echo get_template_directory_uri(); ?>/sample-data-generator.php" class="button button-secondary" target="_blank">
                Generate Sample Content
            </a>
            <p><em>This will create sample services, FAQs, and menu items to help you get started.</em></p>
        </div>
        
        <div class="card">
            <h2>Frontend Pages</h2>
            <p>View your website pages:</p>
            <ul>
                <li><a href="<?php echo home_url('/'); ?>" target="_blank">Home Page</a></li>
                <li><a href="<?php echo home_url('/about/'); ?>" target="_blank">About Page</a></li>
                <li><a href="<?php echo home_url('/services/'); ?>" target="_blank">Services Page</a></li>
                <li><a href="<?php echo home_url('/menu/'); ?>" target="_blank">Menu Page</a></li>
                <li><a href="<?php echo home_url('/blog/'); ?>" target="_blank">Blog Page</a></li>
                <li><a href="<?php echo get_post_type_archive_link('service'); ?>" target="_blank">Services Archive</a></li>
                <li><a href="<?php echo get_post_type_archive_link('faq'); ?>" target="_blank">FAQ Archive</a></li>
                <li><a href="<?php echo get_post_type_archive_link('menu_item'); ?>" target="_blank">Menu Archive</a></li>
            </ul>
        </div>
        
        <div class="card">
            <h2>Theme Features</h2>
            <ul>
                <li>✅ Custom Post Types: Services, FAQs, Menu Items</li>
                <li>✅ Category Organization for all content types</li>
                <li>✅ Non-sticky header with tight spacing</li>
                <li>✅ Bootstrap 5 responsive design</li>
                <li>✅ Color-consistent design system</li>
                <li>✅ WordPress coding standards compliant</li>
                <li>✅ Mobile-friendly navigation</li>
                <li>✅ Menu page with category filtering</li>
            </ul>
        </div>
    </div>
    
    <style>
    .card {
        background: #fff;
        border: 1px solid #ccd0d4;
        border-radius: 4px;
        margin-bottom: 20px;
        padding: 20px;
    }
    .card h2 {
        margin-top: 0;
        color: #23282d;
    }
    </style>
    <?php
}

/**
 * Admin notices for theme setup
 */
function services_pro_admin_notice() {
    if (is_admin() && !get_option('services_pro_setup_complete')) {
        echo '<div class="notice notice-info is-dismissible">';
        echo '<p><strong>Services Pro Theme:</strong> Welcome! Your theme is ready to use. ';
        echo '<a href="' . admin_url('customize.php') . '">Customize your site</a> or ';
        echo '<a href="' . admin_url('nav-menus.php') . '">set up your menus</a>.</p>';
        echo '</div>';
    }
}
add_action('admin_notices', 'services_pro_admin_notice');

/**
 * Mark setup as complete when customizer is saved
 */
function services_pro_mark_setup_complete() {
    update_option('services_pro_setup_complete', true);
}
add_action('customize_save_after', 'services_pro_mark_setup_complete');
