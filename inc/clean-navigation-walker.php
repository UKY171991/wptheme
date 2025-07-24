<?php
/**
 * Bootstrap 5 Navigation Walker
 * Custom WordPress navigation walker for Bootstrap 5 navbar with multi-level dropdowns
 */

if (!class_exists('Bootstrap_Walker_Nav_Menu')) {
    class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {
    
        /**
         * Start Level - wrap sub menu in dropdown
         */
        function start_lvl(&$output, $depth = 0, $args = null) {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
        }
        
        /**
         * End Level - close dropdown
         */
        function end_lvl(&$output, $depth = 0, $args = null) {
            $indent = str_repeat("\t", $depth);
            $output .= "$indent</ul>\n";
        }
        
        /**
         * Start Element - output menu item opening
         */
        function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
            $indent = ($depth) ? str_repeat("\t", $depth) : '';
            
            $classes = empty($item->classes) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;
            
            // Bootstrap classes based on depth and children
            if ($depth === 0) {
                $classes[] = 'nav-item';
                if (in_array('menu-item-has-children', $classes)) {
                    $classes[] = 'dropdown';
                }
            } else {
                if (in_array('menu-item-has-children', $classes)) {
                    $classes[] = 'dropdown-submenu';
                    $classes[] = 'dropend';
                }
            }
            
            // Add current item classes
            if (in_array('current-menu-item', $classes) || in_array('current-menu-parent', $classes)) {
                $classes[] = 'active';
            }
            
            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
            
            $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
            $id = $id ? ' id="' . esc_attr($id) . '"' : '';
            
            $output .= $indent . '<li' . $id . $class_names .'>';
            
            // Build the link
            $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
            $attributes .= ! empty($item->target) ? ' target="' . esc_attr($item->target) .'"' : '';
            $attributes .= ! empty($item->xfn) ? ' rel="'    . esc_attr($item->xfn) .'"' : '';
            $attributes .= ! empty($item->url) ? ' href="'   . esc_attr($item->url) .'"' : '';
            
            // Link classes based on depth and children
            $link_classes = array();
            if ($depth === 0) {
                $link_classes[] = 'nav-link';
                if (in_array('menu-item-has-children', $classes)) {
                    $link_classes[] = 'dropdown-toggle';
                    $attributes .= ' data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" role="button"';
                }
            } else {
                $link_classes[] = 'dropdown-item';
                if (in_array('menu-item-has-children', $classes)) {
                    $link_classes[] = 'dropdown-toggle';
                    $attributes .= ' data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"';
                }
            }
            
            $link_class_attr = ' class="' . implode(' ', $link_classes) . '"';
            
            $item_output = isset($args->before) ? $args->before : '';
            $item_output .= '<a' . $attributes . $link_class_attr . '>';
            $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
            
            // Add caret for submenus
            if (in_array('menu-item-has-children', $classes)) {
                if ($depth === 0) {
                    $item_output .= ' <i class="fas fa-chevron-down ms-1"></i>';
                } else {
                    $item_output .= ' <i class="fas fa-chevron-right ms-auto"></i>';
                }
            }
            
            $item_output .= '</a>';
            $item_output .= isset($args->after) ? $args->after : '';
            
            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        }
        
        /**
         * End Element - close menu item
         */
        function end_el(&$output, $item, $depth = 0, $args = null) {
            $output .= "</li>\n";
        }
    }
}

// Backwards compatibility - alias the old class name
if (!class_exists('Clean_Walker_Nav_Menu')) {
    class Clean_Walker_Nav_Menu extends Bootstrap_Walker_Nav_Menu {}
}

/**
 * Fallback function for navigation
 */
if (!function_exists('clean_navigation_fallback')) {
    function clean_navigation_fallback() {
        echo '<ul class="navbar-nav">';
        echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(home_url('/')) . '">Home</a></li>';
        echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(home_url('/about')) . '">About</a></li>';
        echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(home_url('/services')) . '">Services</a></li>';
        echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(home_url('/contact')) . '">Contact</a></li>';
        echo '</ul>';
    }
}
