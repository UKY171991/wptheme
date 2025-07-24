<?php
/**
 * Navigation Menu Helper Functions
 * 
 * Functions to enhance menu functionality with service categories
 */

/**
 * Generate a hierarchical service menu structure
 */
function generate_service_menu_html() {
    $service_categories = get_service_categories();
    $output = '<ul class="service-menu">';
    
    foreach ($service_categories as $category_name => $category_data) {
        $category_icon = '';
        preg_match('/[\x{1F000}-\x{1F9FF}]|[\x{2600}-\x{26FF}]|[\x{2700}-\x{27BF}]/u', $category_name, $matches);
        if (isset($matches[0])) {
            $category_icon = $matches[0];
        }
        
        $clean_name = preg_replace('/[\x{1F000}-\x{1F9FF}]|[\x{2600}-\x{26FF}]|[\x{2700}-\x{27BF}]/u', '', $category_name);
        $category_slug = $category_data['slug'];
        
        $output .= '<li class="menu-item-has-children">';
        $output .= '<a href="' . home_url('/' . $category_slug . '/') . '">';
        if ($category_icon) {
            $output .= '<span class="menu-icon">' . $category_icon . '</span> ';
        }
        $output .= esc_html(trim($clean_name)) . '</a>';
        
        // Add submenu for individual services
        $output .= '<ul class="sub-menu">';
        $service_count = 0;
        foreach ($category_data['services'] as $service_name => $service_info) {
            if ($service_count < 6) { // Limit to 6 services in menu
                $service_slug = sanitize_title($service_name);
                $output .= '<li><a href="' . home_url('/services/' . $service_slug . '/') . '">' . esc_html($service_name) . '</a></li>';
            }
            $service_count++;
        }
        
        if (count($category_data['services']) > 6) {
            $output .= '<li><a href="' . home_url('/' . $category_slug . '/') . '" class="view-all-services">View All (' . count($category_data['services']) . ' services)</a></li>';
        }
        
        $output .= '</ul>';
        $output .= '</li>';
    }
    
    $output .= '</ul>';
    return $output;
}

/**
 * Add service categories to WordPress menu system
 */
function add_service_categories_to_menu_admin() {
    add_meta_box(
        'service-categories-menu-metabox',
        'Service Categories',
        'service_categories_menu_metabox',
        'nav-menus',
        'side',
        'default'
    );
}
add_action('admin_init', 'add_service_categories_to_menu_admin');

function service_categories_menu_metabox() {
    $service_categories = get_service_categories();
    ?>
    <div id="service-categories-div">
        <div id="tabs-panel-service-categories" class="tabs-panel tabs-panel-active">
            <ul id="service-categories-checklist" class="categorychecklist form-no-clear">
                <?php foreach ($service_categories as $category_name => $category_data) : 
                    $category_id = sanitize_title($category_name);
                ?>
                <li>
                    <label class="menu-item-title">
                        <input type="checkbox" class="menu-item-checkbox" 
                               name="menu-item[<?php echo esc_attr($category_id); ?>][menu-item-object-id]" 
                               value="<?php echo esc_attr($category_id); ?>">
                        <?php echo esc_html($category_name); ?>
                    </label>
                    <input type="hidden" class="menu-item-type" 
                           name="menu-item[<?php echo esc_attr($category_id); ?>][menu-item-type]" 
                           value="custom">
                    <input type="hidden" class="menu-item-title" 
                           name="menu-item[<?php echo esc_attr($category_id); ?>][menu-item-title]" 
                           value="<?php echo esc_attr($category_name); ?>">
                    <input type="hidden" class="menu-item-url" 
                           name="menu-item[<?php echo esc_attr($category_id); ?>][menu-item-url]" 
                           value="<?php echo esc_url(home_url('/' . $category_data['slug'] . '/')); ?>">
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <p class="button-controls">
            <span class="add-to-menu">
                <input type="submit" class="button-secondary submit-add-to-menu right" 
                       value="Add to Menu" name="add-service-categories-menu-item" 
                       id="submit-service-categories">
                <span class="spinner"></span>
            </span>
        </p>
    </div>
    <?php
}

/**
 * Mobile menu enhancement for service categories
 */
function enhance_mobile_menu_for_services() {
    ?>
    <style>
    /* Enhanced Mobile Menu Styles for Service Categories */
    .mobile-menu-container .menu-icon {
        font-size: 1.1em;
        margin-right: 0.5rem;
    }
    
    .mobile-menu-container .sub-menu {
        padding-left: 1rem;
        background: rgba(255,255,255,0.05);
        border-radius: 8px;
        margin: 0.5rem 0;
    }
    
    .mobile-menu-container .sub-menu a {
        padding: 0.8rem 1rem;
        font-size: 0.9rem;
        color: rgba(255,255,255,0.8);
        border-left: 2px solid transparent;
        transition: all 0.3s ease;
    }
    
    .mobile-menu-container .sub-menu a:hover {
        color: white;
        border-left-color: #ff5f00;
        background: rgba(255,95,0,0.1);
    }
    
    .mobile-menu-container .view-all-services {
        font-weight: 600;
        color: #ff5f00 !important;
        border: 1px solid rgba(255,95,0,0.3);
        border-radius: 6px;
        margin: 0.5rem;
        text-align: center;
    }
    
    .mobile-menu-container .view-all-services:hover {
        background: rgba(255,95,0,0.2) !important;
    }
    
    /* Desktop Menu Enhancements */
    .nav-menu .menu-icon {
        margin-right: 0.5rem;
        font-size: 1.1em;
    }
    
    .nav-menu .sub-menu {
        min-width: 280px;
    }
    
    .nav-menu .sub-menu .view-all-services {
        background: #ff5f00;
        color: white !important;
        font-weight: 600;
        text-align: center;
        margin: 0.5rem;
        border-radius: 6px;
    }
    
    .nav-menu .sub-menu .view-all-services:hover {
        background: #e55100 !important;
    }
    </style>
    <?php
}
add_action('wp_head', 'enhance_mobile_menu_for_services');

/**
 * Generate breadcrumb navigation for service pages
 */
function generate_service_breadcrumbs() {
    if (is_singular('services') || is_tax('service_category')) {
        $breadcrumbs = array();
        $breadcrumbs[] = '<a href="' . home_url('/') . '">Home</a>';
        $breadcrumbs[] = '<a href="' . home_url('/services/') . '">Services</a>';
        
        if (is_tax('service_category')) {
            $term = get_queried_object();
            $breadcrumbs[] = '<span>' . esc_html($term->name) . '</span>';
        } elseif (is_singular('services')) {
            $terms = get_the_terms(get_the_ID(), 'service_category');
            if ($terms && !is_wp_error($terms)) {
                $term = array_shift($terms);
                $breadcrumbs[] = '<a href="' . get_term_link($term) . '">' . esc_html($term->name) . '</a>';
            }
            $breadcrumbs[] = '<span>' . get_the_title() . '</span>';
        }
        
        echo '<nav class="service-breadcrumbs" style="padding: 1rem 0; color: #666; font-size: 0.9rem;">';
        echo '<div class="container">' . implode(' › ', $breadcrumbs) . '</div>';
        echo '</nav>';
    }
}

/**
 * Add schema markup for service pages
 */
function add_service_schema_markup() {
    if (is_singular('services')) {
        $service_data = array();
        $terms = get_the_terms(get_the_ID(), 'service_category');
        
        if ($terms && !is_wp_error($terms)) {
            $term = array_shift($terms);
            $category_name = $term->name;
            
            // Get service details from our data structure
            $service_categories = get_service_categories();
            foreach ($service_categories as $cat_name => $cat_data) {
                if (strpos($cat_name, $category_name) !== false) {
                    foreach ($cat_data['services'] as $service_name => $service_info) {
                        if (sanitize_title($service_name) === get_post_field('post_name')) {
                            $service_data = $service_info;
                            break 2;
                        }
                    }
                }
            }
        }
        
        if (!empty($service_data)) {
            $schema = array(
                '@context' => 'https://schema.org',
                '@type' => 'Service',
                'name' => get_the_title(),
                'description' => $service_data['description'],
                'provider' => array(
                    '@type' => 'Organization',
                    'name' => get_bloginfo('name'),
                    'url' => home_url('/')
                ),
                'areaServed' => 'Local Area',
                'serviceType' => get_the_title()
            );
            
            echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
        }
    }
}
add_action('wp_head', 'add_service_schema_markup');

?>
