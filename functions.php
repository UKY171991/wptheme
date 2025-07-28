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
        'primary'   => esc_html__('Primary Navigation', 'blueprint-folder'),
        'footer'    => esc_html__('Footer Navigation', 'blueprint-folder'),
        'services'  => esc_html__('Services Menu', 'blueprint-folder'),
        'mobile'    => esc_html__('Mobile Navigation', 'blueprint-folder'),
        'top-bar'   => esc_html__('Top Bar Navigation', 'blueprint-folder'),
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
 * CUSTOM REWRITE RULES FOR SERVICE URLS
 */
function blueprint_folder_add_rewrite_rules() {
    // Add rewrite rule for /service/ to redirect to /services/ archive
    add_rewrite_rule('^service/?$', 'index.php?post_type=service', 'top');
    
    // Add rewrite rule for /service/page/number
    add_rewrite_rule('^service/page/([0-9]+)/?$', 'index.php?post_type=service&paged=$matches[1]', 'top');
}
add_action('init', 'blueprint_folder_add_rewrite_rules');

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
        'show_in_nav_menus'    => false, // Disable to avoid duplicate with custom metabox
        'show_tagcloud'        => false,
        'show_in_rest'         => true,
        'rewrite'              => array('slug' => 'service-category'),
    ));
}
add_action('init', 'blueprint_folder_register_taxonomies');

// Force immediate flush of rewrite rules
add_action('after_switch_theme', function() {
    flush_rewrite_rules();
});

// Also flush on theme activation - simplified
add_action('init', function() {
    if (!get_option('blueprint_folder_rewrite_rules_flushed_v3')) {
        flush_rewrite_rules();
        update_option('blueprint_folder_rewrite_rules_flushed_v3', 1);
    }
}, 999);

/**
 * INCLUDE NAVIGATION WALKERS AND CORE FILES
 */
require_once get_template_directory() . '/inc/bootstrap-navwalker.php';
require_once get_template_directory() . '/inc/template-functions.php';
require_once get_template_directory() . '/inc/customizer.php';

/**
 * BASIC HEADER SETUP
 */
function blueprint_folder_header_setup() {
    // Hide admin bar for non-admin users
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
}
}
add_action('after_setup_theme', 'blueprint_folder_header_setup');

/**
 * FORCE NAVIGATION MENU DISPLAY EVEN WHEN EMPTY
 */
function blueprint_folder_force_nav_menu_display() {
    return true;
}

/**
 * NAVIGATION FALLBACK MENU - Professional 3-Level Structure
 */
function blueprint_folder_navigation_fallback() {
    $fallback_pages = array(
        array(
            'url' => home_url('/'),
            'title' => esc_html__('Home', 'blueprint-folder'),
            'current' => is_front_page(),
            'children' => array()
        ),
        array(
            'url' => home_url('/about'),
            'title' => esc_html__('About', 'blueprint-folder'),
            'current' => is_page('about'),
            'children' => array()
        ),
        array(
            'url' => home_url('/services'),
            'title' => esc_html__('Services', 'blueprint-folder'),
            'current' => is_page('services'),
            'children' => array(
                array(
                    'url' => home_url('/services/web-design'),
                    'title' => esc_html__('Web Design', 'blueprint-folder'),
                    'current' => false,
                    'children' => array(
                        array(
                            'url' => home_url('/services/web-design/wordpress'),
                            'title' => esc_html__('WordPress Development', 'blueprint-folder'),
                            'current' => false,
                        ),
                        array(
                            'url' => home_url('/services/web-design/ecommerce'),
                            'title' => esc_html__('E-commerce Sites', 'blueprint-folder'),
                            'current' => false,
                        ),
                        array(
                            'url' => home_url('/services/web-design/custom'),
                            'title' => esc_html__('Custom Development', 'blueprint-folder'),
                            'current' => false,
                        ),
                    )
                ),
                array(
                    'url' => home_url('/services/digital-marketing'),
                    'title' => esc_html__('Digital Marketing', 'blueprint-folder'),
                    'current' => false,
                    'children' => array(
                        array(
                            'url' => home_url('/services/digital-marketing/seo'),
                            'title' => esc_html__('SEO Services', 'blueprint-folder'),
                            'current' => false,
                        ),
                        array(
                            'url' => home_url('/services/digital-marketing/ppc'),
                            'title' => esc_html__('PPC Advertising', 'blueprint-folder'),
                            'current' => false,
                        ),
                        array(
                            'url' => home_url('/services/digital-marketing/social'),
                            'title' => esc_html__('Social Media', 'blueprint-folder'),
                            'current' => false,
                        ),
                    )
                ),
                array(
                    'url' => home_url('/services/consulting'),
                    'title' => esc_html__('Consulting', 'blueprint-folder'),
                    'current' => false,
                    'children' => array()
                ),
            )
        ),
        array(
            'url' => home_url('/portfolio'),
            'title' => esc_html__('Portfolio', 'blueprint-folder'),
            'current' => is_page('portfolio'),
            'children' => array()
        ),
        array(
            'url' => home_url('/contact'),
            'title' => esc_html__('Contact', 'blueprint-folder'),
            'current' => is_page('contact'),
            'children' => array()
        )
    );

    echo '<ul id="primary-menu" class="navbar-nav ms-auto me-3">';
    foreach ($fallback_pages as $page) {
        $current_class = $page['current'] ? ' active' : '';
        $has_children = !empty($page['children']);
        $dropdown_class = $has_children ? ' dropdown' : '';

        echo '<li class="nav-item' . esc_attr($dropdown_class . $current_class) . '">';

        if ($has_children) {
            echo '<a href="' . esc_url($page['url']) . '" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">';
            echo esc_html($page['title']);
            echo ' <i class="fas fa-chevron-down ms-1"></i>';
            echo '</a>';

            echo '<ul class="dropdown-menu">';
            foreach ($page['children'] as $child) {
                $child_has_children = !empty($child['children']);
                $child_dropdown_class = $child_has_children ? ' dropend' : '';

                echo '<li class="' . esc_attr($child_dropdown_class) . '">';

                if ($child_has_children) {
                    echo '<a href="' . esc_url($child['url']) . '" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">';
                    echo esc_html($child['title']);
                    echo ' <i class="fas fa-chevron-right ms-auto"></i>';
                    echo '</a>';

                    echo '<ul class="dropdown-menu dropdown-submenu">';
                    foreach ($child['children'] as $grandchild) {
                        echo '<li><a href="' . esc_url($grandchild['url']) . '" class="dropdown-item">' . esc_html($grandchild['title']) . '</a></li>';
}
                    echo '</ul>';
} else {
                    echo '<a href="' . esc_url($child['url']) . '" class="dropdown-item">' . esc_html($child['title']) . '</a>';
}

                echo '</li>';
}
            echo '</ul>';
} else {
            echo '<a href="' . esc_url($page['url']) . '" class="nav-link">' . esc_html($page['title']) . '</a>';
}

        echo '</li>';
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
 * ADD CUSTOM POST TYPES TO MENU ADMIN
 * Makes Services and Service Categories available in Appearance > Menus
 */
function blueprint_folder_add_cpt_to_menu() {
    // Add Services to menu
    add_meta_box(
        'add-services-nav-menu',
        __('Services', 'blueprint-folder'),
        'blueprint_folder_services_nav_menu_metabox',
        'nav-menus',
        'side',
        'default'
    );

    // Add Service Categories to menu
    add_meta_box(
        'add-service-categories-nav-menu',
        __('Service Categories', 'blueprint-folder'),
        'blueprint_folder_service_categories_nav_menu_metabox',
        'nav-menus',
        'side',
        'default'
    );
}
add_action('admin_head-nav-menus.php', 'blueprint_folder_add_cpt_to_menu');

/**
 * Services menu metabox
 */
function blueprint_folder_services_nav_menu_metabox() {
    $services = get_posts(array(
        'post_type' => 'service',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'ASC',
    ));

    echo '<div id="posttype-services" class="posttypediv">';
    echo '<div id="tabs-panel-services" class="tabs-panel tabs-panel-active">';
    echo '<ul id="services-checklist" class="categorychecklist form-no-clear">';

    if (!empty($services)) {
        foreach ($services as $service) {
            echo '<li>';
            echo '<label class="menu-item-title">';
            echo '<input type="checkbox" class="menu-item-checkbox" name="menu-item[-1][menu-item-object-id]" value="' . $service->ID . '"> ';
            echo esc_html($service->post_title);
            echo '</label>';
            echo '<input type="hidden" class="menu-item-type" name="menu-item[-1][menu-item-type]" value="post_type">';
            echo '<input type="hidden" class="menu-item-object" name="menu-item[-1][menu-item-object]" value="service">';
            echo '</li>';
}
} else {
        echo '<li><p>' . __('No services found.', 'blueprint-folder') . '</p></li>';
}

    echo '</ul>';
    echo '</div>';
    echo '<p class="button-controls">';
    echo '<span class="add-to-menu">';
    echo '<input type="submit" class="button-secondary submit-add-to-menu right" value="' . __('Add to Menu', 'blueprint-folder') . '" name="add-post-type-menu-item" id="submit-posttype-services">';
    echo '<span class="spinner"></span>';
    echo '</span>';
    echo '</p>';
    echo '</div>';
}

/**
 * Service Categories menu metabox
 */
function blueprint_folder_service_categories_nav_menu_metabox() {
    $categories = get_terms(array(
        'taxonomy' => 'service_category',
        'hide_empty' => false,
        'orderby' => 'name',
        'order' => 'ASC',
    ));

    echo '<div id="taxonomy-service_category" class="taxonomydiv">';
    echo '<div id="tabs-panel-service_category" class="tabs-panel tabs-panel-active">';
    echo '<ul id="service_category-checklist" class="categorychecklist form-no-clear">';

    if (!empty($categories) && !is_wp_error($categories)) {
        foreach ($categories as $category) {
            echo '<li>';
            echo '<label class="menu-item-title">';
            echo '<input type="checkbox" class="menu-item-checkbox" name="menu-item[-1][menu-item-object-id]" value="' . $category->term_id . '"> ';
            echo esc_html($category->name);
            echo '</label>';
            echo '<input type="hidden" class="menu-item-type" name="menu-item[-1][menu-item-type]" value="taxonomy">';
            echo '<input type="hidden" class="menu-item-object" name="menu-item[-1][menu-item-object]" value="service_category">';
            echo '</li>';
}
} else {
        echo '<li><p>' . __('No categories found.', 'blueprint-folder') . '</p></li>';
}

    echo '</ul>';
    echo '</div>';
    echo '<p class="button-controls">';
    echo '<span class="add-to-menu">';
    echo '<input type="submit" class="button-secondary submit-add-to-menu right" value="' . __('Add to Menu', 'blueprint-folder') . '" name="add-taxonomy-menu-item" id="submit-taxonomy-service_category">';
    echo '<span class="spinner"></span>';
    echo '</span>';
    echo '</p>';
    echo '</div>';
}

/**
 * ENQUEUE SCRIPTS AND STYLES
 */
function blueprint_folder_scripts() {
    // Bootstrap CSS (CDN) - Load first
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0');

    // Font Awesome (CDN)
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');

    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap', array(), null);

    // Single Global CSS - Contains all theme styles
    wp_enqueue_style('blueprint-folder-global', get_template_directory_uri() . '/assets/css/global.css', array('bootstrap', 'font-awesome'), '3.0.0');

    // Dropdown menu fix
    wp_enqueue_style('blueprint-folder-dropdown-fix', get_template_directory_uri() . '/assets/css/dropdown-fix.css', array('blueprint-folder-global'), '1.0.0');

    // Banner section styles
    wp_enqueue_style('blueprint-folder-banner', get_template_directory_uri() . '/assets/css/banner-section.css', array('blueprint-folder-global'), '1.0.0');

    // Homepage sections styles
    wp_enqueue_style('blueprint-folder-homepage', get_template_directory_uri() . '/assets/css/homepage-sections.css', array('blueprint-folder-global'), '1.0.0');

    // Page templates styles
    wp_enqueue_style('blueprint-folder-pages', get_template_directory_uri() . '/assets/css/page-templates.css', array('blueprint-folder-global'), '1.0.0');

    // Portfolio styles
    wp_enqueue_style('blueprint-folder-portfolio', get_template_directory_uri() . '/assets/css/portfolio.css', array('blueprint-folder-global'), '1.0.0');

    // Business Library styles
    wp_enqueue_style('blueprint-folder-business-library', get_template_directory_uri() . '/assets/css/business-library.css', array('blueprint-folder-global'), '1.0.0');

    // Bootstrap JS (CDN)
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), '5.3.0', true);

    // Single Global JavaScript - Contains all theme functionality
    wp_enqueue_script('blueprint-folder-global', get_template_directory_uri() . '/assets/js/global.js', array('bootstrap'), '3.0.0', true);

    // Dropdown menu fix
    wp_enqueue_script('blueprint-folder-dropdown-fix', get_template_directory_uri() . '/assets/js/dropdown-fix.js', array('blueprint-folder-global'), '1.0.0', true);

    // Banner section functionality
    wp_enqueue_script('blueprint-folder-banner', get_template_directory_uri() . '/assets/js/banner-section.js', array('blueprint-folder-global'), '1.0.0', true);

    // Business Library functionality
    wp_enqueue_script('blueprint-folder-business-library', get_template_directory_uri() . '/assets/js/business-library.js', array('blueprint-folder-global'), '1.0.0', true);

    // Localize script for AJAX and theme data
    wp_localize_script('blueprint-folder-global', 'wpAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('blueprint_folder_nonce'),
        'homeUrl' => home_url('/'),
        'contactUrl' => get_permalink(get_page_by_path('contact')),
        'themeUrl' => get_template_directory_uri(),
        'isDebug' => defined('WP_DEBUG') && WP_DEBUG
    ));
}
add_action('wp_enqueue_scripts', 'blueprint_folder_scripts');

// Removed duplicate function - using consolidated version below

/**
 * HELPER FUNCTIONS FOR CONTENT RETRIEVAL
 */
// Removed duplicate function - using newer version below

// Removed duplicate function - using newer version below

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

// Removed duplicate function - using newer version below

/**
 * FLUSH REWRITE RULES ON ACTIVATION - simplified to avoid double registration
 */
function blueprint_folder_flush_rewrites() {
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'blueprint_folder_flush_rewrites');

/**
 * Force flush rewrite rules if needed
 */
function blueprint_folder_maybe_flush_rewrites() {
    if (get_option('blueprint_folder_flush_rewrites_flag')) {
        flush_rewrite_rules();
        delete_option('blueprint_folder_flush_rewrites_flag');
}
}
add_action('init', 'blueprint_folder_maybe_flush_rewrites', 999);

/**
 * Set flag to flush rewrite rules on next page load
 */
function blueprint_folder_set_flush_rewrites_flag() {
    update_option('blueprint_folder_flush_rewrites_flag', 1);
}

// Flush rewrites when custom post types are registered - removed duplicate calls
// The post types and taxonomies are already registered via the init hooks above

/**
 * Add admin notice for flushing permalinks
 */
function blueprint_folder_admin_notice_flush_permalinks() {
    if (current_user_can('manage_options') && !get_option('blueprint_folder_permalinks_flushed')) {?>
        <div class="notice notice-warning is-dismissible">
            <p>
                <strong>BluePrint Theme:</strong> Please go to
                <a href="<?php echo admin_url('options-permalink.php');?>">Settings > Permalinks</a>
                and click "Save Changes" to flush permalink rules for custom post types.
            </p>
        </div>
        <?php
}
}
add_action('admin_notices', 'blueprint_folder_admin_notice_flush_permalinks');

/**
 * Mark permalinks as flushed when permalink settings are saved
 */
function blueprint_folder_mark_permalinks_flushed() {
    update_option('blueprint_folder_permalinks_flushed', 1);
}
add_action('load-options-permalink.php', 'blueprint_folder_mark_permalinks_flushed');

/**
 * Enhanced Pagination Function
 */
function blueprint_folder_pagination($args = array()) {
    $defaults = array(
        'prev_text' => '<i class="fas fa-chevron-left me-2"></i>Previous',
        'next_text' => 'Next<i class="fas fa-chevron-right ms-2"></i>',
        'mid_size' => 2,
        'end_size' => 1,
        'show_all' => false,
        'type' => 'array',
        'class' => 'pagination',
        'container_class' => 'blueprint-pagination'
    );

    $args = wp_parse_args($args, $defaults);
    $class = $args['class'];
    $container_class = $args['container_class'];
    unset($args['class'], $args['container_class']);

    $pagination = paginate_links($args);

    if (!$pagination) {
        return;
}

    echo '<div class="' . esc_attr($container_class) . ' mt-5">';
    echo '<nav aria-label="Pagination Navigation" class="d-flex justify-content-center">';
    echo '<ul class="' . esc_attr($class) . '">';

    foreach ($pagination as $page) {
        if (strpos($page, 'current') !== false) {
            echo '<li class="page-item active">';
            echo str_replace('page-numbers', 'page-link', $page);
            echo '</li>';
} elseif (strpos($page, 'dots') !== false) {
            echo '<li class="page-item disabled">';
            echo '<span class="page-link dots">...</span>';
            echo '</li>';
} elseif (strpos($page, 'prev') !== false) {
            echo '<li class="page-item">';
            echo str_replace(array('page-numbers', 'class="'), array('page-link prev', 'class="page-link prev '), $page);
            echo '</li>';
} elseif (strpos($page, 'next') !== false) {
            echo '<li class="page-item">';
            echo str_replace(array('page-numbers', 'class="'), array('page-link next', 'class="page-link next '), $page);
            echo '</li>';
} else {
            echo '<li class="page-item">';
            echo str_replace('page-numbers', 'page-link', $page);
            echo '</li>';
}
}

    echo '</ul>';
    echo '</nav>';
    echo '</div>';
}

/**
 * Improve WordPress default pagination styling
 */
function blueprint_folder_pagination_wrapper($links) {
    if (empty($links)) {
        return $links;
}

    return '<div class="blueprint-pagination-wrapper d-flex justify-content-center mt-4 mb-4">' . $links . '</div>';
}
add_filter('the_posts_pagination', 'blueprint_folder_pagination_wrapper');

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
}?>
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
                    <li>Go to <a href="<?php echo admin_url('nav-menus.php');?>">Appearance → Menus</a></li>
                    <li>Add Service Categories and Services to your navigation menu</li>
                    <li>Test the multi-level dropdown functionality</li>
                </ol>
                <form method="post">
                    <?php wp_nonce_field('generate_sample_data');?>
                    <input type="submit" name="generate_data" class="button button-primary" value="Generate Sample Data">
                </form>
            </div>
        </div>
        <div class="card" style="max-width: 600px; margin-top: 20px;">
            <div class="card-body">
                <h3>Next Steps:</h3>
                <ol>
                    <li><strong>Customize Homepage:</strong> Go to <a href="<?php echo admin_url('customize.php');?>">Appearance → Customize</a></li>
                    <li><strong>Set up Menus:</strong> <a href="<?php echo admin_url('nav-menus.php');?>">Appearance → Menus</a></li>
                    <li><strong>Add Content:</strong> Create pages for About, Contact, etc.</li>
                    <li><strong>Upload Logo:</strong> <a href="<?php echo admin_url('customize.php?autofocus[control]=custom_logo');?>">Customize → Site Identity</a></li>
                </ol>
            </div>
        </div>
    </div>
/**
 * AJAX HANDLERS FOR ENHANCED FUNCTIONALITY
 */
// AJAX handler for loading category services
function load_category_services() {
    // Verify nonce for security
    if (!wp_verify_nonce($_POST['nonce'], 'blueprint_folder_nonce')) {
        wp_die('Security check failed');
}
    $category_slug = sanitize_text_field($_POST['category']);
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $args = array(
        'post_type' => 'service',
        'posts_per_page' => 9,
        'paged' => $paged,
        'post_status' => 'publish',
    );
    if ($category_slug && $category_slug !== 'all') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'service_category',
                'field'    => 'slug',
                'terms'    => $category_slug,
            ),
        );
}
    $services_query = new WP_Query($args);
    ob_start();
    if ($services_query->have_posts()) {
        while ($services_query->have_posts()) {
            $services_query->the_post();
            get_template_part('template-parts/service-card');
}
} else {
        echo '<div class="no-services"><p>No services found in this category.</p></div>';
}
    $output = ob_get_clean();
    wp_reset_postdata();
    wp_send_json_success($output);
}
add_action('wp_ajax_load_category_services', 'load_category_services');
add_action('wp_ajax_nopriv_load_category_services', 'load_category_services');
// AJAX handler for loading more services (infinite scroll)
function load_more_services() {
    // Verify nonce for security
    if (!wp_verify_nonce($_POST['nonce'], 'blueprint_folder_nonce')) {
        wp_die('Security check failed');
}
    $paged = intval($_POST['page']);
    $args = array(
        'post_type' => 'service',
        'posts_per_page' => 6,
        'paged' => $paged,
        'post_status' => 'publish',
    );
    $services_query = new WP_Query($args);
    ob_start();
    if ($services_query->have_posts()) {
        while ($services_query->have_posts()) {
            $services_query->the_post();
            get_template_part('template-parts/service-card');
}
}
    $output = ob_get_clean();
    wp_reset_postdata();
    if (!empty($output)) {
        wp_send_json_success($output);
} else {
        wp_send_json_error('No more services');
}
}
add_action('wp_ajax_load_more_services', 'load_more_services');
add_action('wp_ajax_nopriv_load_more_services', 'load_more_services');
// AJAX handler for contact form submission
function handle_contact_form() {
    // Verify nonce for security
    if (!wp_verify_nonce($_POST['contact_nonce'], 'blueprint_folder_contact')) {
        wp_send_json_error('Security check failed');
        wp_die();
}
    $name = sanitize_text_field($_POST['contact_name']);
    $email = sanitize_email($_POST['contact_email']);
    $phone = sanitize_text_field($_POST['contact_phone']);
    $subject = sanitize_text_field($_POST['contact_subject']);
    $service = sanitize_text_field($_POST['contact_service']);
    $message = sanitize_textarea_field($_POST['contact_message']);
    // Validate required fields
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        wp_send_json_error('Please fill in all required fields.');
        wp_die();
}
    if (!is_email($email)) {
        wp_send_json_error('Please enter a valid email address.');
        wp_die();
}
    // Prepare email
    $to = get_option('admin_email');
    $email_subject = 'New Contact Form Submission: ' . $subject;
    $email_message = "You have received a new contact form submission:\n\n";
    $email_message .= "Name: $name\n";
    $email_message .= "Email: $email\n";
    if (!empty($phone)) {
        $email_message .= "Phone: $phone\n";
}
    $email_message .= "Subject: $subject\n";
    if (!empty($service)) {
        $email_message .= "Service Interest: $service\n";
}
    $email_message .= "\nMessage:\n$message\n\n";
    $email_message .= "This message was sent from the contact form on " . get_bloginfo('name') . " (" . home_url() . ")";
    $headers = array(
        'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>',
        'Reply-To: ' . $name . ' <' . $email . '>',
        'Content-Type: text/plain; charset=UTF-8'
    );
    // Send email
    if (wp_mail($to, $email_subject, $email_message, $headers)) {
        wp_send_json_success('Thank you! Your message has been sent successfully. We\'ll get back to you soon.');
} else {
        wp_send_json_error('Sorry, there was an error sending your message. Please try again or contact us directly.');
}
    wp_die();
}
add_action('wp_ajax_handle_contact_form', 'handle_contact_form');
add_action('wp_ajax_nopriv_handle_contact_form', 'handle_contact_form');
/**
 * THEME CUSTOMIZER SETTINGS
 */
function blueprint_folder_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title'    => __('Hero Section', 'blueprint-folder'),
        'priority' => 30,
    ));
    // Hero Title
    $wp_customize->add_setting('hero_title', array(
        'default'           => 'Professional Digital Solutions',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title', array(
        'label'   => __('Hero Title', 'blueprint-folder'),
        'section' => 'hero_section',
        'type'    => 'text',
    ));
    // Hero Subtitle
    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => 'We create exceptional digital experiences that drive business growth and success.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_subtitle', array(
        'label'   => __('Hero Subtitle', 'blueprint-folder'),
        'section' => 'hero_section',
        'type'    => 'textarea',
    ));
    // Hero Background Image
    $wp_customize->add_setting('hero_background_image', array(
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_image', array(
        'label'   => __('Hero Background Image', 'blueprint-folder'),
        'section' => 'hero_section',
    )));
    // Hero Buttons
    $wp_customize->add_setting('hero_primary_button_text', array(
        'default'           => 'Our Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_primary_button_text', array(
        'label'   => __('Primary Button Text', 'blueprint-folder'),
        'section' => 'hero_section',
        'type'    => 'text',
    ));
    $wp_customize->add_setting('hero_primary_button_url', array(
        'default'           => '#services',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('hero_primary_button_url', array(
        'label'   => __('Primary Button URL', 'blueprint-folder'),
        'section' => 'hero_section',
        'type'    => 'url',
    ));
    // Hero Statistics
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("hero_stat_{$i}_number", array(
            'default'           => $i == 1 ? '100+' : ($i == 2 ? '50+' : '5+'),
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("hero_stat_{$i}_number", array(
            'label'   => sprintf(__('Stat %d Number', 'blueprint-folder'), $i),
            'section' => 'hero_section',
            'type'    => 'text',
        ));
        $wp_customize->add_setting("hero_stat_{$i}_label", array(
            'default'           => $i == 1 ? 'Projects Completed' : ($i == 2 ? 'Happy Clients' : 'Years Experience'),
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("hero_stat_{$i}_label", array(
            'label'   => sprintf(__('Stat %d Label', 'blueprint-folder'), $i),
            'section' => 'hero_section',
            'type'    => 'text',
        ));
}
    // About Section
    $wp_customize->add_section('about_section', array(
        'title'    => __('About Section', 'blueprint-folder'),
        'priority' => 31,
    ));
    $wp_customize->add_setting('about_title', array(
        'default'           => 'About Blueprint Folder',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_title', array(
        'label'   => __('About Title', 'blueprint-folder'),
        'section' => 'about_section',
        'type'    => 'text',
    ));
    $wp_customize->add_setting('about_content', array(
        'default'           => 'We are a team of passionate professionals dedicated to delivering exceptional digital solutions. Our expertise spans web development, design, and digital strategy to help businesses succeed online.',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('about_content', array(
        'label'   => __('About Content', 'blueprint-folder'),
        'section' => 'about_section',
        'type'    => 'textarea',
        'input_attrs' => array(
            'rows' => 5,
        ),
    ));
    $wp_customize->add_setting('about_image', array(
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image', array(
        'label'   => __('About Image', 'blueprint-folder'),
        'section' => 'about_section',
    )));
    // About Features
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("about_feature_{$i}", array(
            'default'           => $i == 1 ? 'Expert Team' : ($i == 2 ? 'Quality Results' : '24/7 Support'),
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("about_feature_{$i}", array(
            'label'   => sprintf(__('Feature %d', 'blueprint-folder'), $i),
            'section' => 'about_section',
            'type'    => 'text',
        ));
}
    // Services Section
    $wp_customize->add_section('services_section', array(
        'title'    => __('Services Section', 'blueprint-folder'),
        'priority' => 32,
    ));
    $wp_customize->add_setting('services_title', array(
        'default'           => 'Our Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('services_title', array(
        'label'   => __('Services Title', 'blueprint-folder'),
        'section' => 'services_section',
        'type'    => 'text',
    ));
    $wp_customize->add_setting('services_subtitle', array(
        'default'           => 'Comprehensive digital solutions tailored to your business needs',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('services_subtitle', array(
        'label'   => __('Services Subtitle', 'blueprint-folder'),
        'section' => 'services_section',
        'type'    => 'text',
    ));
    // Testimonials Section
    $wp_customize->add_section('testimonials_section', array(
        'title'    => __('Testimonials Section', 'blueprint-folder'),
        'priority' => 33,
    ));
    $wp_customize->add_setting('testimonials_title', array(
        'default'           => 'What Our Clients Say',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('testimonials_title', array(
        'label'   => __('Testimonials Title', 'blueprint-folder'),
        'section' => 'testimonials_section',
        'type'    => 'text',
    ));
    $wp_customize->add_setting('testimonials_subtitle', array(
        'default'           => 'Hear from our satisfied clients about their experience working with us',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('testimonials_subtitle', array(
        'label'   => __('Testimonials Subtitle', 'blueprint-folder'),
        'section' => 'testimonials_section',
        'type'    => 'text',
    ));
    // Blog Section
    $wp_customize->add_section('blog_section', array(
        'title'    => __('Blog Section', 'blueprint-folder'),
        'priority' => 34,
    ));
    $wp_customize->add_setting('blog_title', array(
        'default'           => 'Latest News & Insights',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('blog_title', array(
        'label'   => __('Blog Title', 'blueprint-folder'),
        'section' => 'blog_section',
        'type'    => 'text',
    ));
    $wp_customize->add_setting('blog_subtitle', array(
        'default'           => 'Stay updated with our latest articles and industry insights',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('blog_subtitle', array(
        'label'   => __('Blog Subtitle', 'blueprint-folder'),
        'section' => 'blog_section',
        'type'    => 'text',
    ));
    // CTA Section
    $wp_customize->add_section('cta_section', array(
        'title'    => __('Call to Action Section', 'blueprint-folder'),
        'priority' => 35,
    ));
    $wp_customize->add_setting('cta_title', array(
        'default'           => 'Ready to Get Started?',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_title', array(
        'label'   => __('CTA Title', 'blueprint-folder'),
        'section' => 'cta_section',
        'type'    => 'text',
    ));
    $wp_customize->add_setting('cta_text', array(
        'default'           => 'Let\'s discuss your project and see how we can help you achieve your goals.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_text', array(
        'label'   => __('CTA Text', 'blueprint-folder'),
        'section' => 'cta_section',
        'type'    => 'textarea',
    ));
    $wp_customize->add_setting('cta_primary_button_text', array(
        'default'           => 'Get In Touch',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_primary_button_text', array(
        'label'   => __('Primary Button Text', 'blueprint-folder'),
        'section' => 'cta_section',
        'type'    => 'text',
    ));
    $wp_customize->add_setting('cta_primary_button_url', array(
        'default'           => '/contact',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('cta_primary_button_url', array(
        'label'   => __('Primary Button URL', 'blueprint-folder'),
        'section' => 'cta_section',
        'type'    => 'url',
    ));
    $wp_customize->add_setting('cta_secondary_button_text', array(
        'default'           => 'View Pricing',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_secondary_button_text', array(
        'label'   => __('Secondary Button Text', 'blueprint-folder'),
        'section' => 'cta_section',
        'type'    => 'text',
    ));
    $wp_customize->add_setting('cta_secondary_button_url', array(
        'default'           => '/pricing',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('cta_secondary_button_url', array(
        'label'   => __('Secondary Button URL', 'blueprint-folder'),
        'section' => 'cta_section',
        'type'    => 'url',
    ));
}
add_action('customize_register', 'blueprint_folder_customize_register');
    <?php
}

// That's all folks!

/**
 * ENHANCED MENU CUSTOMIZATION SUPPORT
 */
function blueprint_folder_customize_menu_support() {
    // Add support for menu customization
    add_theme_support('customize-selective-refresh-widgets');

    // Register additional menu locations for enhanced navigation
    register_nav_menus(array(
        'header-utility' => esc_html__('Header Utility Menu', 'blueprint-folder'),
        'mega-menu' => esc_html__('Mega Menu', 'blueprint-folder'),
    ));
}
add_action('after_setup_theme', 'blueprint_folder_customize_menu_support');

/**
 * DYNAMIC MENU CACHE BUSTING
 */
function blueprint_folder_menu_cache_buster() {
    // Clear menu cache when menus are updated
    wp_cache_delete('blueprint_folder_nav_menu', 'theme_mods');
}
add_action('wp_update_nav_menu', 'blueprint_folder_menu_cache_buster');

/**
 * ENHANCED MENU WALKER SUPPORT
 */
function blueprint_folder_menu_walker_enhancements($args) {
    // Ensure our custom walker is used for primary navigation
    if (isset($args['theme_location']) && $args['theme_location'] === 'primary') {
        $args['walker'] = new WP_Bootstrap_Navwalker();
        $args['fallback_cb'] = 'blueprint_folder_navigation_fallback';
}

    return $args;
}
add_filter('wp_nav_menu_args', 'blueprint_folder_menu_walker_enhancements');

/**
 * CUSTOMIZER INTEGRATION FOR HEADER
 */
function blueprint_folder_header_customizer($wp_customize) {
    // Add header section
    $wp_customize->add_section('blueprint_folder_header', array(
        'title' => __('Header Settings', 'blueprint-folder'),
        'priority' => 30,
    ));

    // CTA Button Text
    $wp_customize->add_setting('header_cta_text', array(
        'default' => 'Get Quote',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('header_cta_text', array(
        'label' => __('CTA Button Text', 'blueprint-folder'),
        'section' => 'blueprint_folder_header',
        'type' => 'text',
    ));

    // CTA Button URL
    $wp_customize->add_setting('header_cta_url', array(
        'default' => '/contact',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('header_cta_url', array(
        'label' => __('CTA Button URL', 'blueprint-folder'),
        'section' => 'blueprint_folder_header',
        'type' => 'url',
    ));

    // Mobile Menu Style
    $wp_customize->add_setting('mobile_menu_style', array(
        'default' => 'slide',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('mobile_menu_style', array(
        'label' => __('Mobile Menu Style', 'blueprint-folder'),
        'section' => 'blueprint_folder_header',
        'type' => 'select',
        'choices' => array(
            'slide' => __('Slide In', 'blueprint-folder'),
            'overlay' => __('Full Overlay', 'blueprint-folder'),
            'dropdown' => __('Dropdown', 'blueprint-folder'),
        ),
    ));
}
add_action('customize_register', 'blueprint_folder_header_customizer');

/**
 * GET CUSTOMIZER VALUES FOR HEADER AND BANNER
 */
function blueprint_folder_get_header_cta_text() {
    return get_theme_mod('header_cta_text', 'Get Quote');
}

function blueprint_folder_get_header_cta_url() {
    $url = get_theme_mod('header_cta_url', '/contact');
    if (strpos($url, '/') === 0) {
        return home_url($url);
}
    return $url;
}

/**
 * ADD BANNER CUSTOMIZER OPTIONS
 */
function blueprint_folder_banner_customizer($wp_customize) {
    // Banner Section
    $wp_customize->add_section('banner_section', array(
        'title' => __('Banner Section', 'blueprint-folder'),
        'priority' => 30,
    ));

    // Hero Title
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Professional Services That Drive Results',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero Title', 'blueprint-folder'),
        'section' => 'banner_section',
        'type' => 'text',
    ));

    // Hero Subtitle
    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Excellence in Every Project',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Hero Subtitle', 'blueprint-folder'),
        'section' => 'banner_section',
        'type' => 'text',
    ));

    // Hero Description
    $wp_customize->add_setting('hero_description', array(
        'default' => 'We deliver exceptional business solutions tailored to your unique needs. From consultation to implementation, we\'re your trusted partner for success.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_description', array(
        'label' => __('Hero Description', 'blueprint-folder'),
        'section' => 'banner_section',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'blueprint_folder_banner_customizer');

/**
 * HELPER FUNCTIONS FOR DYNAMIC CONTENT
 */

// Get services with optional category filter
function blueprint_folder_get_services($category = '', $posts_per_page = -1) {
    $args = array(
        'post_type' => 'service',
        'posts_per_page' => $posts_per_page,
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'order' => 'ASC'
    );

    if (!empty($category)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'service_category',
                'field' => 'slug',
                'terms' => $category
            )
        );
}

    return new WP_Query($args);
}

// Get testimonials
function blueprint_folder_get_testimonials($posts_per_page = -1) {
    $args = array(
        'post_type' => 'testimonial',
        'posts_per_page' => $posts_per_page,
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'order' => 'ASC'
    );

    return new WP_Query($args);
}

// Get recent blog posts
function blueprint_folder_get_blog_posts($posts_per_page = 3) {
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $posts_per_page,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    );

    return new WP_Query($args);
}

// Get projects/portfolio
function blueprint_folder_get_projects($posts_per_page = -1) {
    $args = array(
        'post_type' => 'project',
        'posts_per_page' => $posts_per_page,
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'order' => 'ASC'
    );

    return new WP_Query($args);
}

/**
 * REGISTER SIDEBAR - Updated to include all widget areas
 */
function blueprint_folder_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Primary Sidebar', 'blueprint-folder'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'blueprint-folder'),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-4">',
        'after_widget'  => '</div>',
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
 * MENU ITEM CUSTOM FIELDS SUPPORT
 */
function blueprint_folder_menu_item_custom_fields() {
    add_action('wp_nav_menu_item_custom_fields', 'blueprint_folder_menu_custom_fields', 10, 4);
    add_action('wp_update_nav_menu_item', 'blueprint_folder_save_menu_custom_fields', 10, 3);
}
add_action('init', 'blueprint_folder_menu_item_custom_fields');

function blueprint_folder_menu_custom_fields($item_id, $item, $depth, $args) {
    $icon_class = get_post_meta($item_id, '_menu_item_icon', true);
    $description = get_post_meta($item_id, '_menu_item_description', true);?>
    <p class="field-icon description description-wide">
        <label for="edit-menu-item-icon-<?php echo $item_id;?>">
            <?php _e('Icon Class', 'blueprint-folder');?><br />
            <input type="text" id="edit-menu-item-icon-<?php echo $item_id;?>" class="widefat code edit-menu-item-icon" name="menu-item-icon[<?php echo $item_id;?>]" value="<?php echo esc_attr($icon_class);?>" />
            <span class="description"><?php _e('Font Awesome icon class (e.g., fas fa-home)', 'blueprint-folder');?></span>
        </label>
    </p>
    <p class="field-description description description-wide">
        <label for="edit-menu-item-description-<?php echo $item_id;?>">
            <?php _e('Description', 'blueprint-folder');?><br />
            <textarea id="edit-menu-item-description-<?php echo $item_id;?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id;?>]"><?php echo esc_html($description);?></textarea>
            <span class="description"><?php _e('Description for mega menu or tooltip', 'blueprint-folder');?></span>
        </label>
    </p>
    <?php
}

function blueprint_folder_save_menu_custom_fields($menu_id, $menu_item_db_id, $args) {
    if (isset($_POST['menu-item-icon'][$menu_item_db_id])) {
        update_post_meta($menu_item_db_id, '_menu_item_icon', sanitize_text_field($_POST['menu-item-icon'][$menu_item_db_id]));
}
    if (isset($_POST['menu-item-description'][$menu_item_db_id])) {
        update_post_meta($menu_item_db_id, '_menu_item_description', sanitize_textarea_field($_POST['menu-item-description'][$menu_item_db_id]));
}
}

/**
 * Footer Menu Fallback
 */
function blueprint_folder_footer_fallback_menu() {
    $fallback_links = array(
        array(
            'url' => home_url('/about'),
            'title' => 'About Us'
        ),
        array(
            'url' => home_url('/services'),
            'title' => 'Services'
        ),
        array(
            'url' => home_url('/portfolio'),
            'title' => 'Portfolio'
        ),
        array(
            'url' => home_url('/contact'),
            'title' => 'Contact'
        ),
        array(
            'url' => home_url('/blog'),
            'title' => 'Blog'
        )
    );

    echo '<ul class="footer-menu list-unstyled">';
    foreach ($fallback_links as $link) {
        echo '<li class="mb-2">';
        echo '<a href="' . esc_url($link['url']) . '" class="text-light text-decoration-none">';
        echo '<i class="fas fa-arrow-right me-2 text-primary"></i>';
        echo esc_html($link['title']);
        echo '</a>';
        echo '</li>';
}
    echo '</ul>';
}

