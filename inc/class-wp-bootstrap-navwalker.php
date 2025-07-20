<?php
/**
 * WP Bootstrap Navwalker
 *
 * A custom WordPress nav walker class to implement the Bootstrap 5 navigation style
 * in a custom theme using the WordPress built in menu manager.
 */

if (!class_exists('WP_Bootstrap_Navwalker')) {
    class WP_Bootstrap_Navwalker extends Walker_Nav_Menu {
        /**
         * Current item ID for aria-labelledby attribute
         */
        private $current_item_id;

        /**
         * Starts the list before the elements are added.
         *
         * @param string   $output Used to append additional content (passed by reference).
         * @param int      $depth  Depth of menu item. Used for padding.
         * @param stdClass $args   An object of wp_nav_menu() arguments.
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

            // Default class.
            $classes = array('sub-menu', 'dropdown-menu');

            /**
             * Filters the CSS class(es) applied to a menu list element.
             *
             * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
             * @param stdClass $args    An object of `wp_nav_menu()` arguments.
             * @param int      $depth   Depth of menu item. Used for padding.
             */
            $class_names = implode(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

            // Add aria-labelledby attribute to dropdown menu
            $labelledby = '';
            if (isset($this->current_item_id)) {
                $labelledby = ' aria-labelledby="dropdown-' . $this->current_item_id . '"';
            }

            $output .= "{$n}{$indent}<ul{$class_names}{$labelledby}>{$n}";
        }

        /**
         * Starts the element output.
         *
         * @param string   $output Used to append additional content (passed by reference).
         * @param WP_Post  $item   Menu item data object.
         * @param int      $depth  Depth of menu item. Used for padding.
         * @param stdClass $args   An object of wp_nav_menu() arguments.
         * @param int      $id     Current item ID.
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
            
            // Store current item ID for use in start_lvl()
            $this->current_item_id = $item->ID;
            
            // Check if item has children
            $has_children = in_array('menu-item-has-children', $classes);

            // Add .dropdown or .dropdown-submenu class to items with children
            if ($has_children) {
                if ($depth === 0) {
                    $classes[] = 'dropdown';
                } else {
                    $classes[] = 'dropdown-submenu';
                }
            }

            // Add active class if current
            if (in_array('current-menu-item', $classes) || in_array('current-menu-parent', $classes)) {
                $classes[] = 'active';
            }

            // Add nav-item class to all items
            $classes[] = 'nav-item';

            /**
             * Filters the arguments for a single nav menu item.
             *
             * @param stdClass $args  An object of wp_nav_menu() arguments.
             * @param WP_Post  $item  Menu item data object.
             * @param int      $depth Depth of menu item. Used for padding.
             */
            $args = apply_filters('nav_menu_item_args', $args, $item, $depth);

            /**
             * Filters the CSS classes applied to a menu item's list item element.
             *
             * @param string[] $classes Array of the CSS classes that are applied to the menu item's `<li>` element.
             * @param WP_Post  $item    The current menu item.
             * @param stdClass $args    An object of wp_nav_menu() arguments.
             * @param int      $depth   Depth of menu item. Used for padding.
             */
            $class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

            /**
             * Filters the ID applied to a menu item's list item element.
             *
             * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
             * @param WP_Post  $item    The current menu item.
             * @param stdClass $args    An object of wp_nav_menu() arguments.
             * @param int      $depth   Depth of menu item. Used for padding.
             */
            $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
            $id = $id ? ' id="' . esc_attr($id) . '"' : '';

            $output .= $indent . '<li' . $id . $class_names . '>';

            $atts = array();
            $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
            $atts['target'] = !empty($item->target) ? $item->target : '';
            if ('_blank' === $item->target && empty($item->xfn)) {
                $atts['rel'] = 'noopener noreferrer';
            } else {
                $atts['rel'] = $item->xfn;
            }
            $atts['href']         = !empty($item->url) ? $item->url : '#';
            $atts['aria-current'] = $item->current ? 'page' : '';

            // Add .nav-link class to all links
            $atts['class'] = 'nav-link';

            // If item has children, add dropdown toggle attributes
            if ($has_children) {
                if ($depth === 0) {
                    $atts['class'] .= ' dropdown-toggle';
                    $atts['data-bs-toggle'] = 'dropdown';
                    $atts['aria-expanded'] = 'false';
                    $atts['id'] = 'dropdown-' . $item->ID;
                    $atts['role'] = 'button';
                } else {
                    // For nested dropdowns, don't add data-bs-toggle
                    $atts['class'] = 'dropdown-item';
                }
            } else if ($depth > 0) {
                // Add .dropdown-item class to submenu items
                $atts['class'] = 'dropdown-item';
            }

            // Add active class to active items
            if (in_array('current-menu-item', $classes) || in_array('current-menu-parent', $classes)) {
                $atts['class'] .= ' active';
            }

            /**
             * Filters the HTML attributes applied to a menu item's anchor element.
             *
             * @param array $atts {
             *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
             *
             *     @type string $title        Title attribute.
             *     @type string $target       Target attribute.
             *     @type string $rel          The rel attribute.
             *     @type string $href         The href attribute.
             *     @type string $aria-current The aria-current attribute.
             * }
             * @param WP_Post  $item  The current menu item.
             * @param stdClass $args  An object of wp_nav_menu() arguments.
             * @param int      $depth Depth of menu item. Used for padding.
             */
            $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

            $attributes = '';
            foreach ($atts as $attr => $value) {
                if (is_scalar($value) && '' !== $value && false !== $value) {
                    $value       = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            /** This filter is documented in wp-includes/post-template.php */
            $title = apply_filters('the_title', $item->title, $item->ID);

            /**
             * Filters a menu item's title.
             *
             * @param string   $title The menu item's title.
             * @param WP_Post  $item  The current menu item.
             * @param stdClass $args  An object of wp_nav_menu() arguments.
             * @param int      $depth Depth of menu item. Used for padding.
             */
            $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);

            $item_output  = $args->before;
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . $title . $args->link_after;
            
            // Add dropdown indicator for items with children
            if ($has_children && $depth > 0) {
                $item_output .= ' <span class="dropdown-indicator"><i class="arrow"></i></span>';
            }
            
            $item_output .= '</a>';
            $item_output .= $args->after;

            /**
             * Filters a menu item's starting output.
             *
             * The menu item's starting output only includes `$args->before`, the opening `<a>`,
             * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
             * no filter for modifying the opening and closing `<li>` for a menu item.
             *
             * @param string   $item_output The menu item's starting HTML output.
             * @param WP_Post  $item        Menu item data object.
             * @param int      $depth       Depth of menu item. Used for padding.
             * @param stdClass $args        An object of wp_nav_menu() arguments.
             */
            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        }

        /**
         * Ends the element output, if needed.
         *
         * @param string   $output Used to append additional content (passed by reference).
         * @param WP_Post  $item   Menu item data object. Not used.
         * @param int      $depth  Depth of menu item. Not used.
         * @param stdClass $args   An object of wp_nav_menu() arguments. Not used.
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
         * Menu Fallback
         * 
         * If no menu is assigned to a theme location, this will be displayed.
         * 
         * @param array $args passed from the wp_nav_menu function.
         */
        public static function fallback($args) {
            if (current_user_can('edit_theme_options')) {
                $output = '<li class="nav-item"><a class="nav-link" href="' . esc_url(admin_url('nav-menus.php')) . '">' . esc_html__('Add a menu', 'blueprint') . '</a></li>';
                
                if (isset($args['container']) && $args['container']) {
                    $output = '<' . esc_attr($args['container']) . ' id="' . esc_attr($args['container_id']) . '" class="' . esc_attr($args['container_class']) . '">' . $output . '</' . esc_attr($args['container']) . '>';
                }
                
                echo $output;
            }
        }
    }
}