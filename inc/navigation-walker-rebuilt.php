<?php
/**
 * Custom Navigation Walker for BluePrint Folder Theme
 * Handles multi-level dropdown menus with proper Bootstrap classes
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */

class BluePrint_Folder_Walker_Nav_Menu extends Walker_Nav_Menu {
    
    /**
     * Start Level - Start the list before the elements are added
     */
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $classes = array('dropdown-menu');
        
        if ($depth >= 1) {
            $classes[] = 'dropdown-submenu';
        }
        
        $class_names = implode(' ', $classes);
        $output .= "\n$indent<ul class=\"$class_names\">\n";
    }

    /**
     * End Level - End the list after the elements are added
     */
    public function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    /**
     * Start Element - Start the element output
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Check if this item has children
        $has_children = in_array('menu-item-has-children', $classes);
        
        if ($has_children) {
            if ($depth === 0) {
                $classes[] = 'dropdown';
            } else {
                $classes[] = 'dropdown-submenu';
            }
        }

        if ($depth === 0) {
            $classes[] = 'nav-item';
        }

        /**
         * Filter the CSS class(es) applied to a menu item's list item element.
         */
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        /**
         * Filter the ID applied to a menu item's list item element.
         */
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';

        // Add nav-link class for depth 0
        if ($depth === 0) {
            $atts['class'] = 'nav-link';
            if ($has_children) {
                $atts['class'] .= ' dropdown-toggle';
                $atts['data-bs-toggle'] = 'dropdown';
                $atts['role'] = 'button';
                $atts['aria-expanded'] = 'false';
            }
        } else {
            $atts['class'] = 'dropdown-item';
            if ($has_children) {
                $atts['class'] .= ' dropdown-toggle';
            }
        }

        /**
         * Filter the HTML attributes applied to a menu item's anchor element.
         */
        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        
        // Add dropdown arrow for items with children
        if ($has_children) {
            if ($depth === 0) {
                $item_output .= ' <i class="fas fa-chevron-down dropdown-arrow" aria-hidden="true"></i>';
            } else {
                $item_output .= ' <i class="fas fa-chevron-right dropdown-arrow" aria-hidden="true"></i>';
            }
        }
        
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';

        /**
         * Filter a menu item's starting output.
         */
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    /**
     * End Element - End the element output
     */
    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}

/**
 * Navigation fallback function
 */
function blueprint_folder_navigation_fallback() {
    echo '<ul class="navbar-nav">';
    echo '<li class="nav-item"><a href="' . esc_url(home_url('/')) . '" class="nav-link">Home</a></li>';
    echo '<li class="nav-item"><a href="' . esc_url(home_url('/about')) . '" class="nav-link">About</a></li>';
    
    // Services dropdown
    echo '<li class="nav-item dropdown">';
    echo '<a href="' . esc_url(get_post_type_archive_link('service')) . '" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">Services <i class="fas fa-chevron-down dropdown-arrow" aria-hidden="true"></i></a>';
    echo '<ul class="dropdown-menu">';
    
    // Get service categories
    $categories = get_terms(array(
        'taxonomy' => 'service_category',
        'hide_empty' => false,
    ));
    
    if (!empty($categories) && !is_wp_error($categories)) {
        foreach ($categories as $category) {
            echo '<li><a href="' . esc_url(get_term_link($category)) . '" class="dropdown-item">' . esc_html($category->name) . '</a></li>';
        }
        echo '<li><hr class="dropdown-divider"></li>';
    }
    
    echo '<li><a href="' . esc_url(get_post_type_archive_link('service')) . '" class="dropdown-item">All Services</a></li>';
    echo '</ul>';
    echo '</li>';
    
    echo '<li class="nav-item"><a href="' . esc_url(home_url('/pricing')) . '" class="nav-link">Pricing</a></li>';
    echo '<li class="nav-item"><a href="' . esc_url(home_url('/about')) . '" class="nav-link">About</a></li>';
    echo '<li class="nav-item"><a href="' . esc_url(home_url('/contact')) . '" class="nav-link">Contact</a></li>';
    echo '</ul>';
}
?>
