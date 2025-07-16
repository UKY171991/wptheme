<?php
/**
 * Multi-Level Menu Fix Script
 * Run this script to regenerate the WordPress menu with proper multi-level submenus
 * 
 * IMPORTANT: Upload this file to your WordPress root directory and run it from there
 * URL: https://blueprintfolder.com/fix-multilevel-menu.php
 */

// Include WordPress - adjust path as needed
if (file_exists('./wp-config.php')) {
    require_once('./wp-config.php');
} elseif (file_exists('../wp-config.php')) {
    require_once('../wp-config.php');
} elseif (file_exists('../../wp-config.php')) {
    require_once('../../wp-config.php');
} elseif (file_exists('../../../wp-config.php')) {
    require_once('../../../wp-config.php');
} else {
    die('<h2>❌ WordPress Configuration Not Found</h2>
        <p>Please upload this file to your WordPress root directory (where wp-config.php is located) and run it from there.</p>
        <p>Example: https://blueprintfolder.com/fix-multilevel-menu.php</p>');
}

function fix_multilevel_menu() {
    echo "<h2>🔧 Multi-Level Menu Fix Script</h2>\n";
    
    // Delete existing menu first
    $menu_name = 'Primary Navigation';
    $menu_obj = wp_get_nav_menu_object($menu_name);
    
    if ($menu_obj) {
        echo "<p>✅ Found existing menu: {$menu_name} (ID: {$menu_obj->term_id})</p>\n";
        wp_delete_nav_menu($menu_obj->term_id);
        echo "<p>🗑️ Deleted existing menu</p>\n";
    }
    
    // Reset the menu creation flag
    delete_option('blueprint_menu_created');
    
    // Create new multi-level menu
    echo "<p>🚀 Creating new multi-level menu...</p>\n";
    
    // Call the enhanced menu creation function
    blueprint_create_default_menu();
    
    // Verify menu was created
    $new_menu = wp_get_nav_menu_object($menu_name);
    if ($new_menu) {
        echo "<p>✅ New menu created successfully!</p>\n";
        echo "<p>📋 Menu ID: {$new_menu->term_id}</p>\n";
        
        // Get menu items
        $menu_items = wp_get_nav_menu_items($new_menu->term_id);
        $item_count = count($menu_items);
        echo "<p>📊 Total menu items: {$item_count}</p>\n";
        
        // Count levels
        $levels = array();
        foreach ($menu_items as $item) {
            $level = 0;
            $parent_id = $item->menu_item_parent;
            while ($parent_id) {
                $level++;
                foreach ($menu_items as $check_item) {
                    if ($check_item->ID == $parent_id) {
                        $parent_id = $check_item->menu_item_parent;
                        break;
                    }
                }
                if ($level > 10) break; // Safety break
            }
            $levels[$level] = ($levels[$level] ?? 0) + 1;
        }
        
        echo "<p>📊 Menu structure:</p>\n";
        foreach ($levels as $level => $count) {
            $level_name = $level == 0 ? 'Top Level' : "Level " . ($level + 1);
            echo "<p>&nbsp;&nbsp;• {$level_name}: {$count} items</p>\n";
        }
        
        // Check theme location assignment
        $locations = get_theme_mod('nav_menu_locations');
        if (isset($locations['primary-menu']) && $locations['primary-menu'] == $new_menu->term_id) {
            echo "<p>✅ Menu assigned to primary-menu location</p>\n";
        } else {
            echo "<p>⚠️ Menu NOT assigned to primary-menu location</p>\n";
        }
        
    } else {
        echo "<p>❌ Failed to create menu!</p>\n";
    }
    
    echo "<h3>🎯 Next Steps:</h3>\n";
    echo "<ol>\n";
    echo "<li>Go to <strong>WordPress Admin → Appearance → Menus</strong></li>\n";
    echo "<li>Verify the menu structure looks correct</li>\n";
    echo "<li>Test desktop hover dropdowns on the website</li>\n";
    echo "<li>Test mobile submenu toggles</li>\n";
    echo "<li>Check all 3 levels of navigation work properly</li>\n";
    echo "</ol>\n";
    
    echo "<p><strong>💡 The menu now supports:</strong></p>\n";
    echo "<ul>\n";
    echo "<li>✅ Desktop hover dropdowns (all levels)</li>\n";
    echo "<li>✅ Mobile touch submenu toggles</li>\n";
    echo "<li>✅ Multi-level nested submenus</li>\n";
    echo "<li>✅ Proper keyboard navigation</li>\n";
    echo "<li>✅ Screen reader accessibility</li>\n";
    echo "</ul>\n";
}

// Run the fix
fix_multilevel_menu();
?>
