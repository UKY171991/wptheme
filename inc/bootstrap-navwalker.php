<?php
/**
 * Bootstrap Navigation Walker
 * Compatible with Bootstrap 5
 */

class WP_Bootstrap_Navwalker extends Walker_Nav_Menu {
    
    /**
     * Start Level - start of UL with mega menu support
     */
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        
        if ($depth === 0) {
            // Check if this is a services menu for mega menu
            $current_item = $this->current_item ?? null;
            $is_services = false;
            
            if ($current_item) {
                $title = strtolower($current_item->title ?? '');
                $is_services = (strpos($title, 'service') !== false);
            }
            
            if ($is_services) {
                $output .= "\n$indent<div class=\"dropdown-menu services-mega-menu\">\n";
                $output .= "$indent\t<div class=\"mega-menu\">\n";
                $output .= "$indent\t\t<div class=\"mega-menu-section\">\n";
                $output .= "$indent\t\t\t<h4 class=\"mega-menu-title\">Our Services</h4>\n";
                $output .= "$indent\t\t\t<ul class=\"mega-menu-list\">\n";
            } else {
                $output .= "\n$indent<div class=\"dropdown-menu\">\n";
                $output .= "$indent\t<div class=\"mega-menu\">\n";
                $output .= "$indent\t\t<div class=\"mega-menu-section\">\n";
                $output .= "$indent\t\t\t<ul class=\"mega-menu-list\">\n";
            }
        } else {
            $output .= "\n$indent<ul class=\"dropdown-submenu\" role=\"menu\">\n";
        }
    }

    /**
     * End Level - end of UL with mega menu support
     */
    public function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        
        if ($depth === 0) {
            // Check if this is a services menu for mega menu
            $current_item = $this->current_item ?? null;
            $is_services = false;
            
            if ($current_item) {
                $title = strtolower($current_item->title ?? '');
                $is_services = (strpos($title, 'service') !== false);
            }
            
            if ($is_services) {
                $output .= "$indent\t\t\t</ul>\n";
                $output .= "$indent\t\t</div>\n";
                $output .= "$indent\t\t<div class=\"mega-menu-section\">\n";
                $output .= "$indent\t\t\t<h4 class=\"mega-menu-title\">Popular Services</h4>\n";
                $output .= "$indent\t\t\t<ul class=\"mega-menu-list\">\n";
                $output .= "$indent\t\t\t\t<li class=\"mega-menu-item mega-menu-featured\">\n";
                $output .= "$indent\t\t\t\t\t<a href=\"" . home_url('/services/house-cleaning') . "\" class=\"mega-menu-link\">\n";
                $output .= "$indent\t\t\t\t\t\tHouse Cleaning\n";
                $output .= "$indent\t\t\t\t\t\t<div class=\"mega-menu-description\">Professional home cleaning services</div>\n";
                $output .= "$indent\t\t\t\t\t</a>\n";
                $output .= "$indent\t\t\t\t</li>\n";
                $output .= "$indent\t\t\t\t<li class=\"mega-menu-item\">\n";
                $output .= "$indent\t\t\t\t\t<a href=\"" . home_url('/services/maintenance') . "\" class=\"mega-menu-link\">\n";
                $output .= "$indent\t\t\t\t\t\tMaintenance\n";
                $output .= "$indent\t\t\t\t\t\t<div class=\"mega-menu-description\">Property maintenance solutions</div>\n";
                $output .= "$indent\t\t\t\t\t</a>\n";
                $output .= "$indent\t\t\t\t</li>\n";
                $output .= "$indent\t\t\t</ul>\n";
                $output .= "$indent\t\t</div>\n";
                $output .= "$indent\t\t<div class=\"mega-menu-cta\">\n";
                $output .= "$indent\t\t\t<h4>Need Help?</h4>\n";
                $output .= "$indent\t\t\t<p>Get a free consultation and personalized quote for your service needs.</p>\n";
                $output .= "$indent\t\t\t<a href=\"" . home_url('/contact') . "\" class=\"btn\">Get Free Quote</a>\n";
                $output .= "$indent\t\t</div>\n";
                $output .= "$indent\t</div>\n";
                $output .= "$indent</div>\n";
            } else {
                $output .= "$indent\t\t\t</ul>\n";
                $output .= "$indent\t\t</div>\n";
                $output .= "$indent\t</div>\n";
                $output .= "$indent</div>\n";
            }
        } else {
            $output .= "$indent</ul>\n";
        }
    }

    /**
     * Start Element - LI tag with mega menu support
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        // Store current item for mega menu detection
        $this->current_item = $item;

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'nav-item';

        // Check if item has children
        $has_children = in_array('menu-item-has-children', $classes);
        
        if ($has_children && $depth === 0) {
            $classes[] = 'dropdown';
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

        if ($depth === 0) {
            $output .= $indent . '<li' . $id . $class_names . $role_attr . '>';
        } elseif ($depth === 1) {
            // Mega menu item
            $output .= $indent . '<li class="mega-menu-item">';
        }

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        // Build link classes
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
        } elseif ($depth === 1) {
            $link_classes[] = 'mega-menu-link';
        } else {
            $link_classes[] = 'dropdown-item';
        }

        // Add current page indicator for accessibility
        if (in_array('current-menu-item', $classes)) {
            $attributes .= ' aria-current="page"';
        }

        $link_class = ' class="' . implode(' ', $link_classes) . '"';

        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes . $link_class . '>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        
        if ($has_children && $depth === 0) {
            $item_output .= ' <i class="fas fa-chevron-down ms-1" aria-hidden="true"></i>';
        }
        
        // Add description for mega menu items
        if ($depth === 1 && !empty($item->description)) {
            $item_output .= '<div class="mega-menu-description">' . esc_html($item->description) . '</div>';
        }
        
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    /**
     * End Element - end LI tag
     */
    public function end_el(&$output, $item, $depth = 0, $args = null) {
        if ($depth === 0 || $depth === 1) {
            $output .= "</li>\n";
        }
    }
}
