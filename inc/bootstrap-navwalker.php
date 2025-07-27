<?php
/**
 * Bootstrap Navigation Walker
 * Compatible with Bootstrap 5 - Standard Dropdown Menu
 */

class WP_Bootstrap_Navwalker extends Walker_Nav_Menu {
    
    /**
     * Start Level - start of UL for standard dropdown
     */
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        
        if ($depth === 0) {
            $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
        } else {
            $output .= "\n$indent<ul class=\"dropdown-submenu\">\n";
        }
    }

    /**
     * End Level - end of UL for standard dropdown
     */
    public function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    /**
     * Start Element - LI tag for standard dropdown
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        
        // Check if item has children
        $has_children = in_array('menu-item-has-children', $classes);

        // Add appropriate classes based on depth
        if ($depth === 0) {
            $classes[] = 'nav-item';
            if ($has_children) {
                $classes[] = 'dropdown';
            }
        }

        // Add current item class for active states
        if (in_array('current-menu-item', $classes) || in_array('current-menu-parent', $classes)) {
            $classes[] = 'active';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        // Add role for menu items
        $role_attr = $depth === 0 ? ' role="none"' : '';

        // Output list item
        $output .= $indent . '<li' . $id . $class_names . $role_attr . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        // Build link classes based on depth
        $link_classes = array();
        
        if ($depth === 0) {
            $link_classes[] = 'nav-link';
            if ($has_children) {
                $link_classes[] = 'dropdown-toggle';
                $attributes .= ' data-bs-toggle="dropdown" role="menuitem" aria-expanded="false" aria-haspopup="true"';
                
                // Add unique ID for aria-labelledby
                $dropdown_id = 'dropdown-' . $item->ID;
                $attributes .= ' id="' . esc_attr($dropdown_id) . '"';
            } else {
                $attributes .= ' role="menuitem"';
            }
        } else {
            $link_classes[] = 'dropdown-item';
            if ($has_children) {
                $link_classes[] = 'dropdown-toggle';
                $attributes .= ' data-bs-toggle="dropdown"';
            }
        }

        // Add current page indicator for accessibility
        if (in_array('current-menu-item', $classes)) {
            $attributes .= ' aria-current="page"';
        }

        $link_class = ' class="' . implode(' ', $link_classes) . '"';

        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes . $link_class . '>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        
        // Add dropdown icon for items with children
        if ($has_children && $depth === 0) {
            $item_output .= ' <i class="fas fa-chevron-down ms-1" aria-hidden="true"></i>';
        }
        
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    /**
     * End Element - end LI tag
     */
    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}
