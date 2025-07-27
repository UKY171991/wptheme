<?php
/**
 * WordPress Standard Navigation Walker
 * Supports unlimited menu depth with proper WordPress menu structure
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * WordPress Standard Navigation Walker
 * Properly handles multi-level WordPress menus
 */
if (!class_exists('WordPress_Standard_Walker_Nav_Menu')) {
    class WordPress_Standard_Walker_Nav_Menu extends Walker_Nav_Menu {
        
        /**
         * Start Level - wrap sub menu in dropdown
         */
        public function start_lvl(&$output, $depth = 0, $args = null) {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<ul class=\"sub-menu\">\n";
        }
        
        /**
         * End Level - close dropdown
         */
        public function end_lvl(&$output, $depth = 0, $args = null) {
            $indent = str_repeat("\t", $depth);
            $output .= "$indent</ul>\n";
        }
        
        /**
         * Start Element - output menu item opening
         */
        public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
            $indent = ($depth) ? str_repeat("\t", $depth) : '';
            
            // Get and clean classes
            $classes = empty($item->classes) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;
            
            // Remove empty classes and duplicates
            $classes = array_filter($classes, function($class) {
                return !empty($class) && $class !== 'menu-item';
            });
            $classes = array_unique($classes);
            
            // Check if item has children
            $has_children = in_array('menu-item-has-children', $classes);
            
            // Add current item classes
            if (in_array('current-menu-item', $classes) || 
                in_array('current-menu-parent', $classes) ||
                in_array('current-menu-ancestor', $classes)) {
                $classes[] = 'current';
            }
            
            // Apply filters and build class string
            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
            
            // Build ID attribute
            $id_attr = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
            $id_attr = $id_attr ? ' id="' . esc_attr($id_attr) . '"' : '';
            
            // Output list item opening
            $output .= $indent . '<li' . $id_attr . $class_names .'>';
            
            // Build the link
            $item_output = $this->build_menu_link($item, $depth, $args, $has_children);
            
            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        }
        
        /**
         * Build menu link with proper attributes
         */
        private function build_menu_link($item, $depth, $args, $has_children) {
            // Build basic attributes
            $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
            $attributes .= ! empty($item->target) ? ' target="' . esc_attr($item->target) .'"' : '';
            $attributes .= ! empty($item->xfn) ? ' rel="'    . esc_attr($item->xfn) .'"' : '';
            $attributes .= ! empty($item->url) ? ' href="'   . esc_attr($item->url) .'"' : '';
            
            // Add dropdown attributes for parent items
            if ($has_children) {
                $attributes .= ' class="menu-link"';
                $attributes .= ' aria-haspopup="true"';
                $attributes .= ' aria-expanded="false"';
            } else {
                $attributes .= ' class="menu-link"';
            }
            
            // Add ARIA current for active items
            $classes = empty($item->classes) ? array() : (array) $item->classes;
            if (in_array('current-menu-item', $classes)) {
                $attributes .= ' aria-current="page"';
            }
            
            // Start building output
            $item_output = isset($args->before) ? $args->before : '';
            $item_output .= '<a' . $attributes . '>';
            
            // Add icon if specified in menu item description
            if (!empty($item->description)) {
                // Check if description contains FontAwesome icon class
                if (strpos($item->description, 'fa-') !== false || strpos($item->description, 'fas ') !== false) {
                    $item_output .= '<i class="' . esc_attr($item->description) . ' menu-icon" aria-hidden="true"></i>';
                }
            }
            
            // Add link text
            $item_output .= (isset($args->link_before) ? $args->link_before : '') . 
                           apply_filters('the_title', $item->title, $item->ID) . 
                           (isset($args->link_after) ? $args->link_after : '');
            
            // Add dropdown indicator for parent items
            if ($has_children) {
                if ($depth === 0) {
                    $item_output .= ' <span class="dropdown-toggle" aria-hidden="true"></span>';
                } else {
                    $item_output .= ' <span class="dropdown-toggle submenu-toggle" aria-hidden="true"></span>';
                }
            }
            
            $item_output .= '</a>';
            $item_output .= isset($args->after) ? $args->after : '';
            
            return $item_output;
        }
        
        /**
         * End Element - close menu item
         */
        public function end_el(&$output, $item, $depth = 0, $args = null) {
            $output .= "</li>\n";
        }
    }
}

/**
 * Backwards compatibility aliases
 */
if (!class_exists('Enhanced_Bootstrap_Walker_Nav_Menu')) {
    class Enhanced_Bootstrap_Walker_Nav_Menu extends WordPress_Standard_Walker_Nav_Menu {}
}

if (!class_exists('BluePrint_Folder_Walker_Nav_Menu')) {
    class BluePrint_Folder_Walker_Nav_Menu extends WordPress_Standard_Walker_Nav_Menu {}
}
