<?php
/**
 * Enhanced Bootstrap 5 Navigation Walker for BluePrint Folder Theme
 * Modern, accessible navigation walker with Bootstrap 5 support
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 * @author BluePrint Folder Team
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enhanced Bootstrap 5 Navigation Walker
 * Supports multi-level dropdowns, accessibility features, and mobile-first design
 */
if (!class_exists('Enhanced_Bootstrap_Walker_Nav_Menu')) {
    class Enhanced_Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {
        
        /**
         * Dropdown counter for unique IDs
         */
        private $dropdown_counter = 0;
        
        /**
         * Current depth tracking
         */
        private $current_depth = 0;
    
        /**
         * Start Level - wrap sub menu in dropdown
         */
        public function start_lvl(&$output, $depth = 0, $args = null) {
            $this->current_depth = $depth;
            $indent = str_repeat("\t", $depth);
            
            if ($depth === 0) {
                $submenu_class = 'dropdown-menu dropdown-menu-end';
            } else {
                $submenu_class = 'dropdown-menu dropdown-submenu';
            }
            
            $output .= "\n$indent<ul class=\"$submenu_class\" role=\"menu\">\n";
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
            $this->dropdown_counter++;
            $indent = ($depth) ? str_repeat("\t", $depth) : '';
            
            // Get and clean classes
            $classes = empty($item->classes) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;
            
            // Remove empty classes
            $classes = array_filter($classes, function($class) {
                return !empty($class) && $class !== 'menu-item';
            });
            
            // Check if item has children
            $has_children = in_array('menu-item-has-children', $classes);
            
            // Add Bootstrap classes based on depth and children
            if ($depth === 0) {
                $classes[] = 'nav-item';
                if ($has_children) {
                    $classes[] = 'dropdown';
                }
            } else {
                if ($has_children) {
                    $classes[] = 'dropdown-submenu';
                    $classes[] = 'dropend';
                }
            }
            
            // Add active classes
            if (in_array('current-menu-item', $classes) || 
                in_array('current-menu-parent', $classes) ||
                in_array('current-menu-ancestor', $classes)) {
                $classes[] = 'active';
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
         * Build menu link with proper attributes and classes
         */
        private function build_menu_link($item, $depth, $args, $has_children) {
            // Build basic attributes
            $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
            $attributes .= ! empty($item->target) ? ' target="' . esc_attr($item->target) .'"' : '';
            $attributes .= ! empty($item->xfn) ? ' rel="'    . esc_attr($item->xfn) .'"' : '';
            $attributes .= ! empty($item->url) ? ' href="'   . esc_attr($item->url) .'"' : '';
            
            // Link classes based on depth and children
            $link_classes = array();
            $dropdown_id = 'dropdown-' . $this->dropdown_counter;
            
            if ($depth === 0) {
                $link_classes[] = 'nav-link';
                if ($has_children) {
                    $link_classes[] = 'dropdown-toggle';
                    $attributes .= ' data-bs-toggle="dropdown"';
                    $attributes .= ' data-bs-auto-close="outside"';
                    $attributes .= ' aria-expanded="false"';
                    $attributes .= ' role="button"';
                    $attributes .= ' id="' . $dropdown_id . '"';
                    $attributes .= ' aria-haspopup="true"';
                }
            } else {
                $link_classes[] = 'dropdown-item';
                if ($has_children) {
                    $link_classes[] = 'dropdown-toggle';
                    $attributes .= ' data-bs-toggle="dropdown"';
                    $attributes .= ' data-bs-auto-close="outside"';
                    $attributes .= ' aria-expanded="false"';
                    $attributes .= ' role="button"';
                    $attributes .= ' aria-haspopup="true"';
                }
            }
            
            // Add ARIA current for active items
            $classes = empty($item->classes) ? array() : (array) $item->classes;
            if (in_array('current-menu-item', $classes)) {
                $attributes .= ' aria-current="page"';
            }
            
            // Build link class attribute
            $link_class_attr = ' class="' . implode(' ', $link_classes) . '"';
            
            // Start building output
            $item_output = isset($args->before) ? $args->before : '';
            $item_output .= '<a' . $attributes . $link_class_attr . '>';
            
            // Add icon if specified in menu item description
            if (!empty($item->description)) {
                // Check if description contains FontAwesome icon class
                if (strpos($item->description, 'fa-') !== false || strpos($item->description, 'fas ') !== false) {
                    $item_output .= '<i class="' . esc_attr($item->description) . ' me-2" aria-hidden="true"></i>';
                }
            }
            
            // Add link text
            $item_output .= (isset($args->link_before) ? $args->link_before : '') . 
                           apply_filters('the_title', $item->title, $item->ID) . 
                           (isset($args->link_after) ? $args->link_after : '');
            
            // Add dropdown indicator for parent items
            if ($has_children) {
                if ($depth === 0) {
                    $item_output .= ' <i class="fas fa-chevron-down ms-1 dropdown-caret" aria-hidden="true"></i>';
                } else {
                    $item_output .= ' <i class="fas fa-chevron-right ms-auto dropdown-caret" aria-hidden="true"></i>';
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

// Backwards compatibility aliases
if (!class_exists('BluePrint_Folder_Walker_Nav_Menu')) {
    class BluePrint_Folder_Walker_Nav_Menu extends Enhanced_Bootstrap_Walker_Nav_Menu {}
}

if (!class_exists('Bootstrap_Walker_Nav_Menu')) {
    class Bootstrap_Walker_Nav_Menu extends Enhanced_Bootstrap_Walker_Nav_Menu {}
}

if (!class_exists('Clean_Walker_Nav_Menu')) {
    class Clean_Walker_Nav_Menu extends Enhanced_Bootstrap_Walker_Nav_Menu {}
}

/**
 * Enhanced navigation fallback function
 * Creates a professional fallback menu when no menu is assigned
 */
if (!function_exists('blueprint_folder_navigation_fallback')) {
    function blueprint_folder_navigation_fallback() {
        $fallback_pages = array(
            array(
                'url' => home_url('/'),
                'title' => esc_html__('Home', 'blueprint-folder'),
                'icon' => 'fas fa-home',
                'current' => is_front_page()
            ),
            array(
                'url' => home_url('/about'),
                'title' => esc_html__('About', 'blueprint-folder'),
                'icon' => 'fas fa-info-circle',
                'current' => is_page('about')
            ),
            array(
                'url' => get_post_type_archive_link('service') ?: home_url('/services'),
                'title' => esc_html__('Services', 'blueprint-folder'),
                'icon' => 'fas fa-cogs',
                'current' => is_post_type_archive('service') || is_page('services')
            ),
            array(
                'url' => home_url('/portfolio'),
                'title' => esc_html__('Portfolio', 'blueprint-folder'),
                'icon' => 'fas fa-briefcase',
                'current' => is_page('portfolio')
            ),
            array(
                'url' => home_url('/contact'),
                'title' => esc_html__('Contact', 'blueprint-folder'),
                'icon' => 'fas fa-envelope',
                'current' => is_page('contact')
            )
        );
        
        echo '<ul class="navbar-nav mx-auto">';
        foreach ($fallback_pages as $page) {
            $current_class = $page['current'] ? ' active' : '';
            $aria_current = $page['current'] ? ' aria-current="page"' : '';
            
            printf(
                '<li class="nav-item">
                    <a class="nav-link%s" href="%s"%s>
                        <i class="%s me-1" aria-hidden="true"></i>
                        %s
                    </a>
                </li>',
                esc_attr($current_class),
                esc_url($page['url']),
                $aria_current,
                esc_attr($page['icon']),
                esc_html($page['title'])
            );
        }
        echo '</ul>';
    }
}

/**
 * Fallback function alias for backwards compatibility
 */
if (!function_exists('services_pro_navigation_fallback')) {
    function services_pro_navigation_fallback() {
        blueprint_folder_navigation_fallback();
    }
}

/**
 * Clean navigation fallback for backwards compatibility
 */
if (!function_exists('clean_navigation_fallback')) {
    function clean_navigation_fallback() {
        blueprint_folder_navigation_fallback();
    }
}
