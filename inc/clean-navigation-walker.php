<?php
/**
 * Enhanced Bootstrap 5 Navigation Walker
 * Custom WordPress navigation walker for Bootstrap 5 navbar with improved accessibility and functionality
 *
 * @package Services_Pro
 * @version 2.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('Enhanced_Bootstrap_Walker_Nav_Menu')) {
    class Enhanced_Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {

        private $dropdown_counter = 0;

        /**
         * Start Level - wrap sub menu in dropdown
         */
        public function start_lvl(&$output, $depth = 0, $args = null) {
            $indent = str_repeat("\t", $depth);
            $submenu_class = ($depth === 0) ? 'dropdown-menu' : 'dropdown-menu dropdown-submenu';
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

            $classes = empty($item->classes) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;

            // Clean up classes
            $classes = array_filter($classes, function($class) {
                return !empty($class) && $class !== 'menu-item';
});

            // Bootstrap classes based on depth and children
            $has_children = in_array('menu-item-has-children', $classes);

            if ($depth === 0) {
                $classes[] = 'nav-item';
                if ($has_children) {
                    $classes[] = 'dropdown';
}
} else {
                $classes[] = 'dropdown-item-wrapper';
                if ($has_children) {
                    $classes[] = 'dropdown-submenu';
                    $classes[] = 'dropend';
}
}

            // Add current item classes
            if (in_array('current-menu-item', $classes) ||
                in_array('current-menu-parent', $classes) ||
                in_array('current-menu-ancestor', $classes)) {
                $classes[] = 'active';
}

            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

            $id_attr = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
            $id_attr = $id_attr ? ' id="' . esc_attr($id_attr) . '"' : '';

            $output .= $indent . '<li' . $id_attr . $class_names .'>';

            // Build the link
            $item_output = $this->build_menu_link($item, $depth, $args, $has_children);

            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
}

        /**
         * Build menu link with proper attributes and classes
         */
        private function build_menu_link($item, $depth, $args, $has_children) {
            $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
            $attributes .= ! empty($item->target) ? ' target="' . esc_attr($item->target) .'"' : '';
            $attributes .= ! empty($item->xfn) ? ' rel="'    . esc_attr($item->xfn) .'"' : '';
            $attributes .= ! empty($item->url) ? ' href="'   . esc_attr($item->url) .'"' : '';

            // Link classes and attributes based on depth and children
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

            $link_class_attr = ' class="' . implode(' ', $link_classes) . '"';

            $item_output = isset($args->before) ? $args->before : '';
            $item_output .= '<a' . $attributes . $link_class_attr . '>';

            // Add icon if specified in menu item description
            if (!empty($item->description) && strpos($item->description, 'fa-') !== false) {
                $item_output .= '<i class="' . esc_attr($item->description) . ' me-2"></i>';
}

            $item_output .= (isset($args->link_before) ? $args->link_before : '') .
                           apply_filters('the_title', $item->title, $item->ID) .
                           (isset($args->link_after) ? $args->link_after : '');

            // Add caret for submenus
            if ($has_children) {
                if ($depth === 0) {
                    $item_output .= ' <i class="fas fa-chevron-down ms-1 dropdown-caret"></i>';
} else {
                    $item_output .= ' <i class="fas fa-chevron-right ms-auto dropdown-caret"></i>';
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

// Backwards compatibility - alias the old class name
if (!class_exists('Bootstrap_Walker_Nav_Menu')) {
    class Bootstrap_Walker_Nav_Menu extends Enhanced_Bootstrap_Walker_Nav_Menu {}
}

if (!class_exists('Clean_Walker_Nav_Menu')) {
    class Clean_Walker_Nav_Menu extends Enhanced_Bootstrap_Walker_Nav_Menu {}
}

/**
 * Enhanced navigation fallback function
 */
if (!function_exists('services_pro_navigation_fallback')) {
    function services_pro_navigation_fallback() {
        $pages = array(
            'home' => array('url' => home_url('/'), 'title' => 'Home'),
            'about' => array('url' => home_url('/about'), 'title' => 'About'),
            'services' => array('url' => home_url('/services'), 'title' => 'Services'),
            'contact' => array('url' => home_url('/contact'), 'title' => 'Contact')
        );

        echo '<ul class="navbar-nav mx-auto mb-2 mb-lg-0">';
        foreach ($pages as $page) {
            $current_class = (is_front_page() && $page['title'] === 'Home') ||
                           (is_page(sanitize_title($page['title']))) ? ' active' : '';
            printf(
                '<li class="nav-item">
                    <a class="nav-link%s" href="%s">%s</a>
                </li>',
                $current_class,
                esc_url($page['url']),
                esc_html($page['title'])
            );
}
        echo '</ul>';
}
}
/**
 * Deprecated fallback function for backwards compatibility
 */
if (!function_exists('clean_navigation_fallback')) {
    function clean_navigation_fallback() {
        services_pro_navigation_fallback();
}
}?>
