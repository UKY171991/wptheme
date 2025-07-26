<?php
/**
 * Custom Navigation Walker for Multi-Level Dropdown Menus
 *
 * @package Blueprint_Folder_Pro
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

class Blueprint_Folder_Walker_Nav_Menu extends Walker_Nav_Menu {
    
    /**
     * Start the element output.
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        
        $indent = ($depth) ? str_repeat($t, $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Add dropdown classes
        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'has-dropdown';
        }

        // Add depth classes
        if ($depth > 0) {
            $classes[] = 'submenu-item';
            $classes[] = 'submenu-level-' . $depth;
        }

        // Current page classes
        if (in_array('current-menu-item', $classes) || 
            in_array('current-menu-parent', $classes) || 
            in_array('current-menu-ancestor', $classes)) {
            $classes[] = 'active';
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
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $item_output = $indent . '<li' . $id . $class_names .'>';

        $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';

        // Add ARIA attributes for accessibility
        if (in_array('menu-item-has-children', $classes)) {
            $attributes .= ' aria-haspopup="true" aria-expanded="false"';
        }

        $item_output .= $args->before ?? '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= ($args->link_before ?? '') . apply_filters('the_title', $item->title, $item->ID) . ($args->link_after ?? '');
        
        // Add dropdown arrow for parent items
        if (in_array('menu-item-has-children', $classes)) {
            $item_output .= ' <span class="dropdown-arrow" aria-hidden="true"></span>';
        }
        
        $item_output .= '</a>';
        $item_output .= $args->after ?? '';

        $output .= $item_output;
    }

    /**
     * End the element output.
     */
    public function end_el(&$output, $item, $depth = 0, $args = null) {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $output .= "</li>{$n}";
    }

    /**
     * Start the list before the elements are added.
     */
    public function start_lvl(&$output, $depth = 0, $args = null) {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat($t, $depth);
        
        // Different classes for different submenu levels
        $submenu_class = 'sub-menu';
        if ($depth === 0) {
            $submenu_class .= ' dropdown-menu';
        } else {
            $submenu_class .= ' sub-dropdown-menu level-' . ($depth + 1);
        }
        
        $output .= "{$n}{$indent}<ul class=\"{$submenu_class}\">{$n}";
    }

    /**
     * End the list after the elements are added.
     */
    public function end_lvl(&$output, $depth = 0, $args = null) {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat($t, $depth);
        $output .= "$indent</ul>{$n}";
    }
}

/**
 * Custom Page Walker for Fallback Menu
 */
class Blueprint_Folder_Walker_Page extends Walker_Page {
    
    /**
     * Start the element output.
     */
    public function start_el(&$output, $page, $depth = 0, $args = array(), $current_page = 0) {
        if ($depth) {
            $indent = str_repeat("\t", $depth);
        } else {
            $indent = '';
        }

        $css_class = array('page_item', 'page-item-' . $page->ID);

        if (isset($args['pages_with_children'][$page->ID])) {
            $css_class[] = 'page_item_has_children';
            $css_class[] = 'has-dropdown';
        }

        if (!empty($current_page)) {
            $_current_page = get_post($current_page);
            if ($_current_page && in_array($page->ID, $_current_page->ancestors)) {
                $css_class[] = 'current_page_ancestor';
                $css_class[] = 'active';
            }
            if ($page->ID == $current_page) {
                $css_class[] = 'current_page_item';
                $css_class[] = 'active';
            } elseif ($_current_page && $page->ID == $_current_page->post_parent) {
                $css_class[] = 'current_page_parent';
                $css_class[] = 'active';
            }
        } elseif ($page->ID == get_option('page_for_posts')) {
            $css_class[] = 'current_page_parent';
            $css_class[] = 'active';
        }

        /**
         * Filters the list of CSS classes to include with each page item in the list.
         */
        $css_classes = implode(' ', apply_filters('page_css_class', $css_class, $page, $depth, $args, $current_page));
        $css_classes = $css_classes ? ' class="' . esc_attr($css_classes) . '"' : '';

        if ('' === $page->post_title) {
            /* translators: %d: ID of a post */
            $page->post_title = sprintf(__('#%d (no title)', 'blueprint-folder'), $page->ID);
        }

        $args['link_before'] = empty($args['link_before']) ? '' : $args['link_before'];
        $args['link_after'] = empty($args['link_after']) ? '' : $args['link_after'];

        $atts = array();
        $atts['href'] = get_permalink($page->ID);
        
        // Add ARIA attributes for pages with children
        if (isset($args['pages_with_children'][$page->ID])) {
            $atts['aria-haspopup'] = 'true';
            $atts['aria-expanded'] = 'false';
        }

        /**
         * Filters the HTML attributes applied to a page menu item's anchor element.
         */
        $atts = apply_filters('page_menu_link_attributes', $atts, $page, $depth, $args, $current_page);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (is_scalar($value) && '' !== $value && false !== $value) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $output .= $indent . sprintf(
            '<li%s><a%s>%s%s%s%s</a>',
            $css_classes,
            $attributes,
            $args['link_before'],
            /** This filter is documented in wp-includes/post-template.php */
            apply_filters('the_title', $page->post_title, $page->ID),
            $args['link_after'],
            (isset($args['pages_with_children'][$page->ID]) ? ' <span class="dropdown-arrow" aria-hidden="true"></span>' : '')
        );

        if (!empty($args['show_date'])) {
            if ('modified' == $args['show_date']) {
                $time = $page->post_modified;
            } else {
                $time = $page->post_date;
            }

            $date_format = empty($args['date_format']) ? '' : $args['date_format'];
            $output .= ' ' . mysql2date($date_format, $time);
        }
    }
}
