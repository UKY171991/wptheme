<?php
/**
 * Custom Navigation Walker for Multi-Level Menus
 * Supports proper dropdown display for Service Categories and individual Services
 */

class Professional_Services_Walker_Nav_Menu extends Walker_Nav_Menu {
    
    /**
     * Start Level - Start the list before the elements are added
     */
    function start_lvl(&$output, $depth = 0, $args = null) {
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
    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    /**
     * Start Element - Start the element output
     */
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
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

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';

        // Add dropdown attributes for items with children
        if ($has_children) {
            $attributes .= ' class="dropdown-toggle"';
            $attributes .= ' data-toggle="dropdown"';
            $attributes .= ' aria-haspopup="true"';
            $attributes .= ' aria-expanded="false"';
        }

        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes .'>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        
        // Add dropdown arrow for parent items
        if ($has_children) {
            $item_output .= ' <i class="fas fa-chevron-down dropdown-arrow" aria-hidden="true"></i>';
        }
        
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    /**
     * End Element - End the element output
     */
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}

/**
 * Navigation Fallback Function
 */
function professional_services_navigation_fallback() {
    echo '<ul class="navbar-nav">';
    echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(home_url('/')) . '">Home</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(home_url('/about')) . '">About</a></li>';
    
    // Services dropdown with categories
    echo '<li class="nav-item dropdown">';
    echo '<a class="nav-link dropdown-toggle" href="' . esc_url(home_url('/services')) . '" data-toggle="dropdown">Services <i class="fas fa-chevron-down dropdown-arrow"></i></a>';
    echo '<ul class="dropdown-menu">';
    
    // Get service categories
    $service_categories = get_terms(array(
        'taxonomy' => 'service_category',
        'hide_empty' => false,
    ));
    
    if (!empty($service_categories) && !is_wp_error($service_categories)) {
        foreach ($service_categories as $category) {
            echo '<li class="dropdown-submenu">';
            echo '<a class="dropdown-item dropdown-toggle" href="' . esc_url(get_term_link($category)) . '">' . esc_html($category->name) . ' <i class="fas fa-chevron-right dropdown-arrow"></i></a>';
            
            // Get services in this category
            $services = get_posts(array(
                'post_type' => 'service',
                'posts_per_page' => 10,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'service_category',
                        'field'    => 'term_id',
                        'terms'    => $category->term_id,
                    ),
                ),
            ));
            
            if (!empty($services)) {
                echo '<ul class="dropdown-menu dropdown-submenu">';
                foreach ($services as $service) {
                    echo '<li><a class="dropdown-item" href="' . esc_url(get_permalink($service->ID)) . '">' . esc_html($service->post_title) . '</a></li>';
                }
                echo '</ul>';
            }
            echo '</li>';
        }
    } else {
        // Fallback services if no categories exist
        echo '<li><a class="dropdown-item" href="#">Web Design</a></li>';
        echo '<li><a class="dropdown-item" href="#">SEO Services</a></li>';
        echo '<li><a class="dropdown-item" href="#">Digital Marketing</a></li>';
    }
    
    echo '</ul>';
    echo '</li>';
    
    echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(home_url('/pricing')) . '">Pricing</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(home_url('/projects')) . '">Projects</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(home_url('/contact')) . '">Contact</a></li>';
    echo '</ul>';
}
