<?php
/**
 * Custom Navigation Walker for Multi-Level Menus
 * 
 * @package ServiceBlueprint
 */

class Service_Blueprint_Nav_Walker extends Walker_Nav_Menu {
    
    /**
     * Starts the list before the elements are added.
     */
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $class_names = $depth === 0 ? 'sub-menu' : 'sub-menu sub-sub-menu';
        $output .= "\n$indent<ul class=\"$class_names\" role=\"menu\">\n";
    }
    
    /**
     * Ends the list after the elements are added.
     */
    public function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
    
    /**
     * Starts the element output.
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        // Add dropdown class if item has children
        $has_children = in_array('menu-item-has-children', $classes);
        
        /**
         * Filters the CSS class(es) applied to a menu item's list item element.
         */
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';
        
        $output .= $indent . '<li' . $id . $class_names . '>';
        
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        
        // Add ARIA attributes for accessibility
        if ($has_children) {
            $attributes .= ' aria-haspopup="true" aria-expanded="false"';
        }
        
        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        
        // Add icon if specified in menu item
        $icon = get_post_meta($item->ID, '_menu_item_icon', true);
        if ($icon) {
            $item_output .= ' <span class="menu-icon">' . esc_html($icon) . '</span>';
        }
        
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    /**
     * Ends the element output.
     */
    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}

/**
 * Fallback menu when no menu is assigned
 */
function service_blueprint_fallback_menu() {
    echo '<ul id="primary-menu" class="menu">';
    echo '<li class="menu-item"><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'service-blueprint') . '</a></li>';
    
    // Add service categories as menu items
    $categories = get_terms(array(
        'taxonomy' => 'service_category',
        'hide_empty' => true,
        'number' => 8
    ));
    
    if (!is_wp_error($categories) && !empty($categories)) {
        echo '<li class="menu-item menu-item-has-children">';
        echo '<a href="' . esc_url(get_post_type_archive_link('service')) . '">' . esc_html__('Services', 'service-blueprint') . '</a>';
        echo '<ul class="sub-menu">';
        
        foreach ($categories as $category) {
            echo '<li class="menu-item">';
            echo '<a href="' . esc_url(get_term_link($category)) . '">' . esc_html($category->name) . '</a>';
            echo '</li>';
        }
        
        echo '</ul>';
        echo '</li>';
    }
    
    // Add blog link if exists
    if (get_option('page_for_posts')) {
        echo '<li class="menu-item"><a href="' . esc_url(get_permalink(get_option('page_for_posts'))) . '">' . esc_html__('Blog', 'service-blueprint') . '</a></li>';
    }
    
    // Add contact page if exists
    $contact_page = get_page_by_title('Contact');
    if ($contact_page) {
        echo '<li class="menu-item"><a href="' . esc_url(get_permalink($contact_page)) . '">' . esc_html__('Contact', 'service-blueprint') . '</a></li>';
    }
    
    echo '</ul>';
}

/**
 * Add custom fields to menu items for icons
 */
function service_blueprint_nav_menu_item_custom_fields($item_id, $item, $depth, $args) {
    wp_nonce_field('custom_menu_meta_nonce', 'custom_menu_meta_nonce_name');
    ?>
    <div class="field-custom-menu-meta description-wide">
        <label for="edit-menu-item-icon-<?php echo $item_id; ?>">
            <?php esc_html_e('Menu Icon (emoji or text)', 'service-blueprint'); ?><br>
            <input type="text" id="edit-menu-item-icon-<?php echo $item_id; ?>" 
                   class="widefat code edit-menu-item-icon" 
                   name="menu-item-icon[<?php echo $item_id; ?>]" 
                   value="<?php echo esc_attr(get_post_meta($item_id, '_menu_item_icon', true)); ?>">
        </label>
        <p class="description"><?php esc_html_e('Add an emoji or icon character to display next to the menu item.', 'service-blueprint'); ?></p>
    </div>
    <?php
}
add_action('wp_nav_menu_item_custom_fields', 'service_blueprint_nav_menu_item_custom_fields', 10, 4);

/**
 * Save custom menu item fields
 */
function service_blueprint_update_nav_menu_item($menu_id, $menu_item_db_id, $args) {
    if (!isset($_POST['custom_menu_meta_nonce_name']) || !wp_verify_nonce($_POST['custom_menu_meta_nonce_name'], 'custom_menu_meta_nonce')) {
        return $menu_id;
    }
    
    if (isset($_POST['menu-item-icon'][$menu_item_db_id])) {
        $icon_value = sanitize_text_field($_POST['menu-item-icon'][$menu_item_db_id]);
        update_post_meta($menu_item_db_id, '_menu_item_icon', $icon_value);
    } else {
        delete_post_meta($menu_item_db_id, '_menu_item_icon');
    }
}
add_action('wp_update_nav_menu_item', 'service_blueprint_update_nav_menu_item', 10, 3);

/**
 * Add menu management styles
 */
function service_blueprint_admin_menu_styles() {
    ?>
    <style>
    .field-custom-menu-meta {
        margin: 10px 0;
    }
    .field-custom-menu-meta label {
        display: block;
        margin-bottom: 5px;
        font-weight: 600;
    }
    .field-custom-menu-meta input {
        width: 100%;
        padding: 5px;
    }
    .field-custom-menu-meta .description {
        font-style: italic;
        color: #666;
        margin-top: 5px;
    }
    </style>
    <?php
}
add_action('admin_head-nav-menus.php', 'service_blueprint_admin_menu_styles');

/**
 * Create default navigation menu on theme activation
 */
function service_blueprint_create_default_menu() {
    // Check if menu already exists
    $menu_exists = wp_get_nav_menu_object('Main Menu');
    
    if (!$menu_exists) {
        // Create menu
        $menu_id = wp_create_nav_menu('Main Menu');
        
        if (!is_wp_error($menu_id)) {
            // Add Home
            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => 'Home',
                'menu-item-url' => home_url('/'),
                'menu-item-status' => 'publish',
                'menu-item-type' => 'custom'
            ));
            
            // Add Services parent menu
            $services_item_id = wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => 'Services',
                'menu-item-url' => get_post_type_archive_link('service'),
                'menu-item-status' => 'publish',
                'menu-item-type' => 'custom'
            ));
            
            // Add service categories as submenus
            $categories = get_terms(array(
                'taxonomy' => 'service_category',
                'hide_empty' => false,
                'number' => 9
            ));
            
            if (!is_wp_error($categories) && !empty($categories)) {
                foreach ($categories as $category) {
                    $category_item_id = wp_update_nav_menu_item($menu_id, 0, array(
                        'menu-item-title' => $category->name,
                        'menu-item-url' => get_term_link($category),
                        'menu-item-status' => 'publish',
                        'menu-item-type' => 'taxonomy',
                        'menu-item-object' => 'service_category',
                        'menu-item-object-id' => $category->term_id,
                        'menu-item-parent-id' => $services_item_id
                    ));
                    
                    // Add icon to category menu item
                    $icon = get_term_meta($category->term_id, 'category_icon', true);
                    if ($icon) {
                        update_post_meta($category_item_id, '_menu_item_icon', $icon);
                    }
                }
            }
            
            // Add About page if it exists
            $about_page = get_page_by_title('About');
            if ($about_page) {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => 'About',
                    'menu-item-url' => get_permalink($about_page),
                    'menu-item-status' => 'publish',
                    'menu-item-type' => 'post_type',
                    'menu-item-object' => 'page',
                    'menu-item-object-id' => $about_page->ID
                ));
            }
            
            // Add Contact page if it exists
            $contact_page = get_page_by_title('Contact');
            if ($contact_page) {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => 'Contact',
                    'menu-item-url' => get_permalink($contact_page),
                    'menu-item-status' => 'publish',
                    'menu-item-type' => 'post_type',
                    'menu-item-object' => 'page',
                    'menu-item-object-id' => $contact_page->ID
                ));
            }
            
            // Set as primary menu
            $locations = get_theme_mod('nav_menu_locations');
            $locations['primary'] = $menu_id;
            set_theme_mod('nav_menu_locations', $locations);
        }
    }
}

/**
 * Enhanced menu accessibility features
 */
function service_blueprint_menu_accessibility_script() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuItems = document.querySelectorAll('.main-navigation .menu-item-has-children');
        
        menuItems.forEach(item => {
            const link = item.querySelector('a');
            const submenu = item.querySelector('.sub-menu');
            
            if (link && submenu) {
                // Keyboard navigation
                link.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        const isExpanded = this.getAttribute('aria-expanded') === 'true';
                        this.setAttribute('aria-expanded', !isExpanded);
                        submenu.classList.toggle('show');
                    }
                    
                    if (e.key === 'Escape') {
                        this.setAttribute('aria-expanded', 'false');
                        submenu.classList.remove('show');
                        this.focus();
                    }
                    
                    if (e.key === 'ArrowDown') {
                        e.preventDefault();
                        const firstSubmenuLink = submenu.querySelector('a');
                        if (firstSubmenuLink) {
                            firstSubmenuLink.focus();
                        }
                    }
                });
                
                // Mouse interactions
                item.addEventListener('mouseenter', function() {
                    link.setAttribute('aria-expanded', 'true');
                    submenu.classList.add('show');
                });
                
                item.addEventListener('mouseleave', function() {
                    link.setAttribute('aria-expanded', 'false');
                    submenu.classList.remove('show');
                });
                
                // Focus management for submenu items
                const submenuLinks = submenu.querySelectorAll('a');
                submenuLinks.forEach((submenuLink, index) => {
                    submenuLink.addEventListener('keydown', function(e) {
                        if (e.key === 'ArrowUp') {
                            e.preventDefault();
                            if (index === 0) {
                                link.focus();
                            } else {
                                submenuLinks[index - 1].focus();
                            }
                        }
                        
                        if (e.key === 'ArrowDown') {
                            e.preventDefault();
                            if (index < submenuLinks.length - 1) {
                                submenuLinks[index + 1].focus();
                            }
                        }
                        
                        if (e.key === 'Escape') {
                            link.setAttribute('aria-expanded', 'false');
                            submenu.classList.remove('show');
                            link.focus();
                        }
                    });
                });
            }
        });
        
        // Close menus when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.main-navigation')) {
                const expandedMenus = document.querySelectorAll('.main-navigation [aria-expanded="true"]');
                expandedMenus.forEach(menu => {
                    menu.setAttribute('aria-expanded', 'false');
                    const submenu = menu.nextElementSibling;
                    if (submenu) {
                        submenu.classList.remove('show');
                    }
                });
            }
        });
    });
    </script>
    
    <style>
    /* Enhanced menu styles */
    .main-navigation .sub-menu.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
    
    .main-navigation .menu-item-has-children:focus-within .sub-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
    
    /* Improved focus styles */
    .main-navigation a:focus {
        outline: 2px solid #2563eb;
        outline-offset: 2px;
        background-color: #f3f4f6;
    }
    
    /* Menu icon styles */
    .menu-icon {
        margin-left: 5px;
        font-size: 0.9em;
    }
    
    /* Enhanced dropdown arrows */
    .main-navigation .menu-item-has-children > a::after {
        content: '▼';
        font-size: 0.7em;
        margin-left: 8px;
        transition: transform 0.3s ease;
        display: inline-block;
    }
    
    .main-navigation .sub-menu .menu-item-has-children > a::after {
        content: '▶';
        float: right;
        margin-left: 0;
        margin-top: 2px;
    }
    
    .main-navigation .menu-item-has-children:hover > a::after,
    .main-navigation .menu-item-has-children:focus-within > a::after {
        transform: rotate(180deg);
    }
    
    .main-navigation .sub-menu .menu-item-has-children:hover > a::after,
    .main-navigation .sub-menu .menu-item-has-children:focus-within > a::after {
        transform: rotate(0deg);
    }
    
    /* Third level menu positioning */
    .main-navigation .sub-menu .sub-menu {
        top: 0;
        left: 100%;
        margin-top: 0;
    }
    
    /* RTL support */
    .rtl .main-navigation .sub-menu .sub-menu {
        left: auto;
        right: 100%;
    }
    
    .rtl .main-navigation .sub-menu .menu-item-has-children > a::after {
        content: '◀';
        float: left;
    }
    </style>
    <?php
}
add_action('wp_footer', 'service_blueprint_menu_accessibility_script');
?>
