<?php
/**
 * Custom Walker Class for Navigation Menu
 */
class Blueprint_Walker_Nav_Menu extends Walker_Nav_Menu {
    /**
     * Starts the list before the elements are added.
     */
    public function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $role = ($depth === 0) ? ' role="menu"' : ' role="menu"';
        $output .= "\n$indent<ul class=\"sub-menu\"$role>\n";
    }

    /**
     * Starts the element output.
     */
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Add has-children class if the item has children
        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'has-children';
            if ($depth > 0) {
                $classes[] = 'has-nested-children';
            }
        }

        // Add depth class for styling
        $classes[] = 'menu-depth-' . $depth;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before ?? '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= ($args->link_before ?? '') . apply_filters('the_title', $item->title, $item->ID) . ($args->link_after ?? '');
        
        // Add dropdown indicator for items with children
        if (in_array('menu-item-has-children', $classes)) {
            // Add ARIA attributes for accessibility
            $item_output = str_replace('<a' . $attributes . '>', '<a' . $attributes . ' aria-haspopup="true" aria-expanded="false">', $item_output);
            
            if ($depth === 0) {
                $item_output .= '<span class="dropdown-indicator" aria-hidden="true"><i class="arrow">▼</i></span>';
            } else {
                $item_output .= '<span class="dropdown-indicator nested" aria-hidden="true"><i class="arrow">▶</i></span>';
            }
        }
        
        $item_output .= '</a>';
        $item_output .= $args->after ?? '';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
