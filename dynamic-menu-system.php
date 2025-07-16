<?php
/**
 * Dynamic Menu System for BluePrint Theme
 * Automatically generates navigation based on content structure
 */

// Hook into WordPress to create dynamic menus
add_action('wp_update_nav_menu', 'blueprint_sync_dynamic_menu');
add_action('save_post', 'blueprint_sync_dynamic_menu');
add_action('delete_post', 'blueprint_sync_dynamic_menu');

/**
 * Create dynamic navigation menu based on content structure
 */
function blueprint_create_truly_dynamic_menu() {
    $menu_name = 'Primary Navigation';
    $menu_exists = wp_get_nav_menu_object($menu_name);
    
    // Delete existing menu to recreate
    if ($menu_exists) {
        wp_delete_nav_menu($menu_exists->term_id);
    }
    
    $menu_id = wp_create_nav_menu($menu_name);
    
    if (!is_wp_error($menu_id)) {
        $menu_order = 1;
        
        // 1. Add Home
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Home',
            'menu-item-url' => home_url('/'),
            'menu-item-status' => 'publish',
            'menu-item-position' => $menu_order++
        ));
        
        // 2. Add Services/Blueprints with dynamic categories
        $services_page = get_page_by_path('services');
        if ($services_page) {
            $services_item = wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => 'All Blueprints',
                'menu-item-object-id' => $services_page->ID,
                'menu-item-object' => 'page',
                'menu-item-type' => 'post_type',
                'menu-item-status' => 'publish',
                'menu-item-position' => $menu_order++
            ));
            
            // Add dynamic categories based on custom taxonomies or post meta
            blueprint_add_dynamic_categories($menu_id, $services_item);
        }
        
        // 3. Add other pages dynamically
        $pages_to_include = array('pricing', 'about', 'blog', 'contact');
        foreach ($pages_to_include as $page_slug) {
            $page = get_page_by_path($page_slug);
            if ($page) {
                $menu_item = wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => $page->post_title,
                    'menu-item-object-id' => $page->ID,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type',
                    'menu-item-status' => 'publish',
                    'menu-item-position' => $menu_order++
                ));
                
                // Add dynamic submenus for specific pages
                if ($page_slug === 'pricing') {
                    blueprint_add_pricing_submenu($menu_id, $menu_item);
                }
            }
        }
        
        // Assign to primary location
        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary-menu'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
    
    return $menu_id;
}

/**
 * Add dynamic categories to services menu
 */
function blueprint_add_dynamic_categories($menu_id, $parent_item) {
    // Check if you have custom post types or taxonomies for blueprints
    $categories = array();
    
    // Option 1: Get from custom taxonomy
    if (taxonomy_exists('blueprint_category')) {
        $terms = get_terms(array(
            'taxonomy' => 'blueprint_category',
            'hide_empty' => false,
            'parent' => 0
        ));
        
        foreach ($terms as $term) {
            $categories[$term->name] = array(
                'url' => get_term_link($term),
                'term_id' => $term->term_id
            );
        }
    }
    
    // Option 2: Get from post categories if using regular posts
    if (empty($categories)) {
        $post_categories = get_categories(array(
            'hide_empty' => false,
            'parent' => 0
        ));
        
        foreach ($post_categories as $category) {
            $categories[$category->name] = array(
                'url' => get_category_link($category->term_id),
                'term_id' => $category->term_id
            );
        }
    }
    
    // Option 3: Fallback to predefined categories with dynamic URLs
    if (empty($categories)) {
        $services_url = get_permalink(get_page_by_path('services'));
        $categories = array(
            'Online & Digital' => array('url' => $services_url . '#online-digital'),
            'Service-Based' => array('url' => $services_url . '#service-based'),
            'E-commerce & Retail' => array('url' => $services_url . '#ecommerce-retail'),
            'Food & Beverage' => array('url' => $services_url . '#food-beverage'),
            'Health & Wellness' => array('url' => $services_url . '#health-wellness'),
            'Creative & Entertainment' => array('url' => $services_url . '#creative-entertainment')
        );
    }
    
    // Add categories as submenu items
    foreach ($categories as $cat_name => $cat_data) {
        $category_item = wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => $cat_name,
            'menu-item-url' => $cat_data['url'],
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $parent_item
        ));
        
        // Add subcategories if they exist
        if (isset($cat_data['term_id'])) {
            blueprint_add_subcategories($menu_id, $category_item, $cat_data['term_id']);
        }
    }
}

/**
 * Add subcategories dynamically
 */
function blueprint_add_subcategories($menu_id, $parent_item, $parent_term_id) {
    $subcategories = array();
    
    // Get child terms if using taxonomies
    if (taxonomy_exists('blueprint_category')) {
        $child_terms = get_terms(array(
            'taxonomy' => 'blueprint_category',
            'hide_empty' => false,
            'parent' => $parent_term_id
        ));
        
        foreach ($child_terms as $term) {
            $subcategories[$term->name] = get_term_link($term);
        }
    }
    
    // Get child categories if using regular categories
    if (empty($subcategories)) {
        $child_categories = get_categories(array(
            'hide_empty' => false,
            'parent' => $parent_term_id
        ));
        
        foreach ($child_categories as $category) {
            $subcategories[$category->name] = get_category_link($category->term_id);
        }
    }
    
    // Add subcategories as menu items
    foreach ($subcategories as $subcat_name => $subcat_url) {
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => $subcat_name,
            'menu-item-url' => $subcat_url,
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $parent_item
        ));
    }
}

/**
 * Add dynamic pricing submenu
 */
function blueprint_add_pricing_submenu($menu_id, $parent_item) {
    $pricing_url = get_permalink(get_page_by_path('pricing'));
    
    $pricing_sections = array(
        'Starter Plans' => $pricing_url . '#starter',
        'Premium Plans' => $pricing_url . '#premium',
        'Enterprise Plans' => $pricing_url . '#enterprise',
        'Custom Solutions' => $pricing_url . '#custom'
    );
    
    foreach ($pricing_sections as $section_name => $section_url) {
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => $section_name,
            'menu-item-url' => $section_url,
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $parent_item
        ));
    }
}

/**
 * Sync menu when content changes
 */
function blueprint_sync_dynamic_menu() {
    // Only sync if auto-sync is enabled
    if (get_option('blueprint_auto_sync_menu', 'yes') === 'yes') {
        blueprint_create_truly_dynamic_menu();
    }
}

/**
 * Add admin option to control auto-sync
 */
function blueprint_add_menu_sync_options() {
    add_theme_page(
        'Dynamic Menu Settings',
        'Menu Settings',
        'manage_options',
        'blueprint-menu-settings',
        'blueprint_menu_settings_page'
    );
}
add_action('admin_menu', 'blueprint_add_menu_sync_options');

function blueprint_menu_settings_page() {
    if (isset($_POST['update_settings'])) {
        update_option('blueprint_auto_sync_menu', $_POST['auto_sync'] ?? 'no');
        echo '<div class="notice notice-success"><p>Settings updated!</p></div>';
    }
    
    if (isset($_POST['regenerate_menu'])) {
        blueprint_create_truly_dynamic_menu();
        echo '<div class="notice notice-success"><p>Menu regenerated successfully!</p></div>';
    }
    
    $auto_sync = get_option('blueprint_auto_sync_menu', 'yes');
    ?>
    <div class="wrap">
        <h1>🔄 Dynamic Menu Settings</h1>
        
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <th scope="row">Auto-Sync Menu</th>
                    <td>
                        <label>
                            <input type="checkbox" name="auto_sync" value="yes" <?php checked($auto_sync, 'yes'); ?>>
                            Automatically update menu when content changes
                        </label>
                        <p class="description">When enabled, the menu will automatically rebuild when you add/edit pages or categories.</p>
                    </td>
                </tr>
            </table>
            
            <p class="submit">
                <input type="submit" name="update_settings" class="button-primary" value="Save Settings">
                <input type="submit" name="regenerate_menu" class="button" value="Regenerate Menu Now">
            </p>
        </form>
        
        <h2>🎯 How Dynamic Menus Work</h2>
        <ul>
            <li><strong>Automatic Detection:</strong> Scans your pages and categories</li>
            <li><strong>Smart Hierarchy:</strong> Creates logical parent-child relationships</li>
            <li><strong>Content-Based:</strong> Menu items link to actual content</li>
            <li><strong>Multi-Level Support:</strong> Unlimited depth for categories/subcategories</li>
        </ul>
        
        <h2>📊 Current Menu Structure</h2>
        <?php
        $menu = wp_get_nav_menu_object('Primary Navigation');
        if ($menu) {
            $menu_items = wp_get_nav_menu_items($menu->term_id);
            echo '<ul>';
            blueprint_display_menu_tree($menu_items, 0);
            echo '</ul>';
        } else {
            echo '<p>No menu found.</p>';
        }
        ?>
    </div>
    <?php
}

function blueprint_display_menu_tree($menu_items, $parent_id, $level = 0) {
    foreach ($menu_items as $item) {
        if ($item->menu_item_parent == $parent_id) {
            $indent = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $level);
            echo '<li>' . $indent . esc_html($item->title) . ' <em>(' . esc_html($item->url) . ')</em>';
            
            // Check for children
            $has_children = false;
            foreach ($menu_items as $check_item) {
                if ($check_item->menu_item_parent == $item->ID) {
                    $has_children = true;
                    break;
                }
            }
            
            if ($has_children) {
                echo '<ul>';
                blueprint_display_menu_tree($menu_items, $item->ID, $level + 1);
                echo '</ul>';
            }
            
            echo '</li>';
        }
    }
}

// Initialize on theme activation
function blueprint_init_dynamic_menu() {
    blueprint_create_truly_dynamic_menu();
    
    // Set auto-sync to enabled by default
    if (get_option('blueprint_auto_sync_menu') === false) {
        update_option('blueprint_auto_sync_menu', 'yes');
    }
}
register_activation_hook(__FILE__, 'blueprint_init_dynamic_menu');
?>
