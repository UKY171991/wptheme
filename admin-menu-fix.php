<?php
/**
 * Add this code to your theme's functions.php file, then visit:
 * https://blueprintfolder.com/wp-admin/admin.php?page=fix-menu
 */

// Add admin menu page for fixing multi-level menus
function blueprint_add_menu_fix_page() {
    add_theme_page(
        'Fix Multi-Level Menu',
        'Fix Menu',
        'manage_options',
        'fix-menu',
        'blueprint_menu_fix_page'
    );
}
add_action('admin_menu', 'blueprint_add_menu_fix_page');

// Admin page callback
function blueprint_menu_fix_page() {
    if (isset($_POST['fix_menu'])) {
        blueprint_fix_multilevel_menu_admin();
    }
    ?>
    <div class="wrap">
        <h1>🔧 Fix Multi-Level Menu</h1>
        <p>This tool will recreate your navigation menu with proper multi-level submenu support.</p>
        
        <div class="notice notice-info">
            <p><strong>What this will do:</strong></p>
            <ul>
                <li>Delete the existing "Primary Navigation" menu</li>
                <li>Create a new menu with 3-level structure</li>
                <li>Add proper business blueprint categories</li>
                <li>Assign the menu to the primary location</li>
            </ul>
        </div>
        
        <form method="post" action="">
            <?php wp_nonce_field('fix_menu_action', 'fix_menu_nonce'); ?>
            <p>
                <input type="submit" name="fix_menu" class="button button-primary" value="Fix Multi-Level Menu" onclick="return confirm('This will replace your existing menu. Continue?');">
            </p>
        </form>
        
        <h3>Current Menu Status</h3>
        <?php
        $menu_name = 'Primary Navigation';
        $menu_obj = wp_get_nav_menu_object($menu_name);
        
        if ($menu_obj) {
            $menu_items = wp_get_nav_menu_items($menu_obj->term_id);
            $item_count = count($menu_items);
            
            echo "<p>✅ Menu exists: <strong>{$menu_name}</strong> (ID: {$menu_obj->term_id})</p>";
            echo "<p>📊 Total items: <strong>{$item_count}</strong></p>";
            
            // Check levels
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
                    if ($level > 10) break;
                }
                $levels[$level] = ($levels[$level] ?? 0) + 1;
            }
            
            echo "<p><strong>Menu Structure:</strong></p><ul>";
            foreach ($levels as $level => $count) {
                $level_name = $level == 0 ? 'Top Level' : "Level " . ($level + 1);
                echo "<li>{$level_name}: {$count} items</li>";
            }
            echo "</ul>";
            
            $max_level = max(array_keys($levels));
            if ($max_level >= 2) {
                echo "<p>✅ Multi-level menu detected (3+ levels)</p>";
            } else {
                echo "<p>⚠️ Only " . ($max_level + 1) . " levels detected. You may need multi-level support.</p>";
            }
            
        } else {
            echo "<p>❌ No menu found with name: <strong>{$menu_name}</strong></p>";
        }
        
        // Check theme location
        $locations = get_theme_mod('nav_menu_locations');
        if (isset($locations['primary-menu'])) {
            echo "<p>✅ Primary menu location assigned</p>";
        } else {
            echo "<p>⚠️ Primary menu location not assigned</p>";
        }
        ?>
    </div>
    <?php
}

function blueprint_fix_multilevel_menu_admin() {
    // Security check
    if (!wp_verify_nonce($_POST['fix_menu_nonce'], 'fix_menu_action')) {
        wp_die('Security check failed');
    }
    
    if (!current_user_can('manage_options')) {
        wp_die('You do not have permission to perform this action');
    }
    
    echo '<div class="notice notice-success"><p>';
    
    // Delete existing menu
    $menu_name = 'Primary Navigation';
    $menu_obj = wp_get_nav_menu_object($menu_name);
    
    if ($menu_obj) {
        wp_delete_nav_menu($menu_obj->term_id);
        echo "🗑️ Deleted existing menu<br>";
    }
    
    // Reset creation flag
    delete_option('blueprint_menu_created');
    
    // Create new menu
    echo "🚀 Creating multi-level menu...<br>";
    blueprint_create_default_menu();
    
    // Verify
    $new_menu = wp_get_nav_menu_object($menu_name);
    if ($new_menu) {
        $menu_items = wp_get_nav_menu_items($new_menu->term_id);
        $item_count = count($menu_items);
        echo "✅ New menu created with {$item_count} items<br>";
        echo "🎯 Multi-level navigation is now active!";
    } else {
        echo "❌ Failed to create menu";
    }
    
    echo '</p></div>';
}
?>
