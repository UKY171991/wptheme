<?php
/**
 * Professional Bootstrap 5 Navigation Walker
 * Supports 3-level dropdown menus with clean styling
 */

class WP_Bootstrap_Navwalker extends Walker_Nav_Menu {

    /**
     * Start Level - UL wrapper for dropdown menus
     */
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);

        if ($depth === 0) {
            // First level dropdown
            $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
} else {
            // Second and third level dropdowns
            $output .= "\n$indent<ul class=\"dropdown-menu dropdown-submenu\">\n";
}
}

    /**
     * End Level - Close UL wrapper
     */
    public function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
}

    /**
     * Start Element - LI and A tags
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $has_children = in_array('menu-item-has-children', $classes);

        // Build LI classes based on depth and children
        $li_classes = array();

        if ($depth === 0) {
            $li_classes[] = 'nav-item';
            if ($has_children) {
                $li_classes[] = 'dropdown';
}
} else {
            if ($has_children) {
                $li_classes[] = 'dropend';
}
}

        // Add active states
        if (in_array('current-menu-item', $classes) || in_array('current-menu-parent', $classes)) {
            $li_classes[] = 'active';
}

        // Apply WordPress filters
        $li_classes = apply_filters('nav_menu_css_class', array_filter($li_classes), $item, $args);
        $li_class_names = $li_classes ? ' class="' . esc_attr(implode(' ', $li_classes)) . '"' : '';

        // Build ID
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        // Output LI tag
        $output .= $indent . '<li' . $id . $li_class_names . '>';

        // Build link attributes
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
                $attributes .= ' data-bs-toggle="dropdown" aria-expanded="false" role="button"';
                $attributes .= ' data-bs-auto-close="outside"';
            }
        } else {
            $link_classes[] = 'dropdown-item';
            if ($has_children) {
                $link_classes[] = 'dropdown-toggle';
                $attributes .= ' data-bs-toggle="dropdown" aria-expanded="false" role="button"';
                $attributes .= ' data-bs-auto-close="outside"';
            }
        }        // Add current page indicator
        if (in_array('current-menu-item', $classes)) {
            $attributes .= ' aria-current="page"';
}

        $link_class = ' class="' . implode(' ', $link_classes) . '"';

        // Build the link output
        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes . $link_class . '>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '');

        // Add menu item icon if it exists
        $menu_icon = get_post_meta($item->ID, '_menu_item_icon', true);
        if (!empty($menu_icon)) {
            $item_output .= '<i class="' . esc_attr($menu_icon) . ' me-2"></i>';
} else {
            // Add default icons based on menu item title/URL
            $default_icons = array(
                'home' => 'fas fa-home',
                'services' => 'fas fa-cogs',
                'about' => 'fas fa-info-circle',
                'contact' => 'fas fa-envelope',
                'blog' => 'fas fa-blog',
                'pricing' => 'fas fa-dollar-sign',
                'portfolio' => 'fas fa-briefcase',
                'team' => 'fas fa-users',
                'testimonials' => 'fas fa-quote-left'
            );

            $item_title_lower = strtolower($item->title);
            $item_url_lower = strtolower($item->url);

            foreach ($default_icons as $key => $icon) {
                if (strpos($item_title_lower, $key) !== false || strpos($item_url_lower, $key) !== false) {
                    $item_output .= '<i class="' . esc_attr($icon) . ' me-2"></i>';
                    break;
}
}
}

        $item_output .= apply_filters('the_title', $item->title, $item->ID);
        $item_output .= (isset($args->link_after) ? $args->link_after : '');

        // Add dropdown indicators
        if ($has_children) {
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
     * End Element - Close LI tag
     */
    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
}
}

