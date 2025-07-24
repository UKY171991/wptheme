<?php
/**
 * Clean Navigation Walker
 * Simple, clean navigation walker for dropdown menus
 */

if (!class_exists('Clean_Walker_Nav_Menu')) {
    class Clean_Walker_Nav_Menu extends Walker_Nav_Menu {
    
    /**
     * Start Level - wrap sub menu in ul
     */
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }
    
    /**
     * End Level - close sub menu ul
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
        
        // Add dropdown class if item has children
        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'has-dropdown';
        }
        
        // Add current item classes
        if (in_array('current-menu-item', $classes) || in_array('current-menu-parent', $classes)) {
            $classes[] = 'current';
        }
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';
        
        $output .= $indent . '<li' . $id . $class_names .'>';
        
        // Build the link
        $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';
        
        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    /**
     * End Element - output menu item closing
     */
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
    }
}

/**
 * Fallback function if no menu is assigned
 */
if (!function_exists('clean_navigation_fallback')) {
    function clean_navigation_fallback() {
        echo '<ul class="nav-menu">';
        echo '<li class="menu-item"><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
        echo '<li class="menu-item"><a href="' . esc_url(home_url('/about')) . '">About</a></li>';
        echo '<li class="menu-item"><a href="' . esc_url(home_url('/services')) . '">Services</a></li>';
        echo '<li class="menu-item"><a href="' . esc_url(home_url('/contact')) . '">Contact</a></li>';
        echo '</ul>';
    }
}
?>