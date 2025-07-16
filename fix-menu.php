<?php
/**
 * One-time menu fix script for BluePrint theme
 * This file creates the proper navigation menu with dropdowns
 */

// Include WordPress
require_once('../../../wp-config.php');

// Force menu creation
function create_blueprint_menu_now() {
    // Delete any existing primary menu
    $existing_menu = wp_get_nav_menu_object('Primary Navigation');
    if ($existing_menu) {
        wp_delete_nav_menu($existing_menu->term_id);
    }
    
    // Create new menu
    $menu_name = 'Primary Navigation';
    $menu_id = wp_create_nav_menu($menu_name);
    
    if (!is_wp_error($menu_id)) {
        echo "✅ Created menu ID: $menu_id\n";
        
        // Add Home
        $home_item = wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Home',
            'menu-item-url' => home_url('/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom'
        ));
        echo "✅ Added Home menu item\n";
        
        // Add All Blueprints parent item
        $blueprints_item = wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'All Blueprints',
            'menu-item-url' => home_url('/services/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom'
        ));
        echo "✅ Added All Blueprints menu item\n";
        
        // Add blueprint categories as submenu items
        $categories = array(
            'Online & Digital' => '#online-digital',
            'Service-Based' => '#service-based', 
            'E-commerce & Retail' => '#ecommerce-retail',
            'Food & Beverage' => '#food-beverage',
            'Health & Wellness' => '#health-wellness',
            'Creative & Entertainment' => '#creative-entertainment'
        );
        
        foreach ($categories as $cat_name => $cat_anchor) {
            $cat_item = wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => $cat_name,
                'menu-item-url' => home_url('/services/') . $cat_anchor,
                'menu-item-status' => 'publish',
                'menu-item-type' => 'custom',
                'menu-item-parent-id' => $blueprints_item
            ));
            echo "✅ Added category: $cat_name\n";
        }
        
        // Add Pricing
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Pricing',
            'menu-item-url' => home_url('/pricing/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom'
        ));
        echo "✅ Added Pricing menu item\n";
        
        // Add About
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'About',
            'menu-item-url' => home_url('/about/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom'
        ));
        echo "✅ Added About menu item\n";
        
        // Add Contact
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Contact',
            'menu-item-url' => home_url('/contact/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom'
        ));
        echo "✅ Added Contact menu item\n";
        
        // Set this menu to primary location
        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary-menu'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
        
        echo "✅ Menu assigned to primary location\n";
        echo "🎉 Menu creation completed successfully!\n";
        
        return true;
    } else {
        echo "❌ Error creating menu: " . $menu_id->get_error_message() . "\n";
        return false;
    }
}

// Run the menu creation
echo "🚀 Starting BluePrint menu creation...\n";
$result = create_blueprint_menu_now();

if ($result) {
    echo "\n📋 Menu Structure Created:\n";
    echo "├── Home\n";
    echo "├── All Blueprints\n";
    echo "│   ├── Online & Digital\n";
    echo "│   ├── Service-Based\n";
    echo "│   ├── E-commerce & Retail\n";
    echo "│   ├── Food & Beverage\n";
    echo "│   ├── Health & Wellness\n";
    echo "│   └── Creative & Entertainment\n";
    echo "├── Pricing\n";
    echo "├── About\n";
    echo "└── Contact\n";
    echo "\n✨ Your menu is now ready with dropdown functionality!\n";
} else {
    echo "\n❌ Menu creation failed. Please check WordPress configuration.\n";
}
?>
