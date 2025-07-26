<?php
/**
 * Custom Navigation Walker for BluePrint Folder Theme
 * Handles multi-level dropdown menus w/**
 * Fallback function for when no menu is assigned
 * Creates a basic navigation structure
 */
function blueprint_folder_navigation_fallback() {
    echo '<ul class="nav-menu primary-nav">';
    echo '<li class="menu-item"><a class="nav-link" href="' . esc_url(home_url('/')) . '">Home</a></li>';
    echo '<li class="menu-item"><a class="nav-link" href="' . esc_url(home_url('/about')) . '">About</a></li>';
    
    // Services dropdown
    echo '<li class="menu-item dropdown">';
    echo '<a class="nav-link dropdown-toggle" href="' . esc_url(get_post_type_archive_link('service')) . '">Services <i class="fas fa-chevron-down dropdown-arrow"></i></a>';
    echo '<ul class="dropdown-menu">';
    
    // Add service categories if they exist
    $categories = get_terms(array(
        'taxonomy' => 'service_category',
        'hide_empty' => false,
        'number' => 5
    ));
    
    if (!empty($categories) && !is_wp_error($categories)) {
        foreach ($categories as $category) {
            echo '<li class="menu-item"><a class="nav-link" href="' . esc_url(get_term_link($category)) . '">' . esc_html($category->name) . '</a></li>';
        }
        echo '<li class="menu-item menu-divider"><hr></li>';
    }
    
    echo '<li class="menu-item"><a class="nav-link" href="' . esc_url(get_post_type_archive_link('service')) . '">All Services</a></li>';
    echo '</ul>';
    echo '</li>';
    
    echo '<li class="menu-item"><a class="nav-link" href="' . esc_url(home_url('/pricing')) . '">Pricing</a></li>';
    echo '<li class="menu-item"><a class="nav-link" href="' . esc_url(home_url('/contact')) . '">Contact</a></li>';
    echo '</ul>';
}

/**
 * 
 * @package BluePrint_Folder_Theme
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Custom Walker for Navigation Menus
 * Extends WordPress Walker_Nav_Menu to create clean dropdown menus
 */
class BluePrint_Folder_Walker_Nav_Menu extends Walker_Nav_Menu {
    
    /**
     * Starts the list before the elements are added.
     */
    public function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }

    /**
     * Ends the list after the elements are added.
     */
    public function end_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    /**
     * Starts the element output.
     */
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Check if item has children
        $has_children = in_array('menu-item-has-children', $classes);
        
        if ($has_children && $depth === 0) {
            $classes[] = 'dropdown';
        }
        
        if ($has_children && $depth > 0) {
            $classes[] = 'dropdown-submenu';
        }

        /**
         * Filters the arguments for a single nav menu item.
         */
        $args = apply_filters('nav_menu_item_args', $args, $item, $depth);

        /**
         * Filters the CSS class(es) applied to a menu item's list item element.
         */
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        /**
         * Filters the ID applied to a menu item's list item element.
         */
        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';

        // Add dropdown attributes for parent items
        if ($has_children && $depth === 0) {
            $attributes .= ' class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"';
        }

        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        
        // Add dropdown arrow for parent items
        if ($has_children && $depth === 0) {
            $item_output .= ' <i class="fas fa-chevron-down dropdown-arrow" aria-hidden="true"></i>';
        }
        
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    /**
     * Ends the element output.
     */
    public function end_el(&$output, $item, $depth = 0, $args = array()) {
        $output .= "</li>\n";
    }
}

/**
 * Fallback function for when no menu is assigned
 * Creates a basic navigation structure
 */
function blueprint_folder_nav_fallback() {
    echo '<ul class="navbar-nav">';
    echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(home_url('/')) . '">Home</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(home_url('/about')) . '">About</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(get_post_type_archive_link('service')) . '">Services</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(home_url('/contact')) . '">Contact</a></li>';
    echo '</ul>';
}
