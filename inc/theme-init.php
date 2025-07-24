<?php
/**
 * Theme Initialization Functions
 *
 * @package ServiceBlueprint
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Create default service categories on theme activation
 */
function create_default_service_categories() {
    // Ensure we're in WordPress environment
    if (!function_exists('get_terms') || !function_exists('wp_insert_term')) {
        return;
    }
    
    // Check if categories already exist
    $existing_terms = get_terms(array(
        'taxonomy' => 'service_category',
        'hide_empty' => false,
        'count' => true
    ));
    
    if (!empty($existing_terms) && !is_wp_error($existing_terms)) {
        return; // Categories already exist
    }
    
    $default_categories = array(
        array(
            'name' => 'Web Development',
            'slug' => 'web-development',
            'description' => 'Custom websites, web applications, and e-commerce solutions',
            'meta' => array(
                'category_icon' => 'fas fa-code',
                'category_color' => '#2563eb',
                'featured_category' => true
            )
        ),
        array(
            'name' => 'Digital Marketing',
            'slug' => 'digital-marketing',
            'description' => 'SEO, social media marketing, and online advertising',
            'meta' => array(
                'category_icon' => 'fas fa-chart-line',
                'category_color' => '#7c3aed',
                'featured_category' => true
            )
        ),
        array(
            'name' => 'Graphic Design',
            'slug' => 'graphic-design',
            'description' => 'Logo design, branding, and visual identity solutions',
            'meta' => array(
                'category_icon' => 'fas fa-palette',
                'category_color' => '#10b981',
                'featured_category' => true
            )
        ),
        array(
            'name' => 'Content Creation',
            'slug' => 'content-creation',
            'description' => 'Copywriting, content strategy, and multimedia production',
            'meta' => array(
                'category_icon' => 'fas fa-pen-fancy',
                'category_color' => '#f59e0b',
                'featured_category' => true
            )
        ),
        array(
            'name' => 'Business Consulting',
            'slug' => 'business-consulting',
            'description' => 'Strategic planning, process optimization, and growth strategies',
            'meta' => array(
                'category_icon' => 'fas fa-briefcase',
                'category_color' => '#ef4444',
                'featured_category' => true
            )
        ),
        array(
            'name' => 'Mobile Apps',
            'slug' => 'mobile-apps',
            'description' => 'iOS and Android application development',
            'meta' => array(
                'category_icon' => 'fas fa-mobile-alt',
                'category_color' => '#8b5cf6',
                'featured_category' => true
            )
        ),
        array(
            'name' => 'Data Analytics',
            'slug' => 'data-analytics',
            'description' => 'Business intelligence, data visualization, and reporting',
            'meta' => array(
                'category_icon' => 'fas fa-chart-bar',
                'category_color' => '#06b6d4',
                'featured_category' => true
            )
        ),
        array(
            'name' => 'Cloud Solutions',
            'slug' => 'cloud-solutions',
            'description' => 'Cloud migration, infrastructure, and DevOps services',
            'meta' => array(
                'category_icon' => 'fas fa-cloud',
                'category_color' => '#84cc16',
                'featured_category' => true
            )
        ),
        array(
            'name' => 'Training & Support',
            'slug' => 'training-support',
            'description' => 'Technical training, documentation, and ongoing support',
            'meta' => array(
                'category_icon' => 'fas fa-graduation-cap',
                'category_color' => '#f97316',
                'featured_category' => true
            )
        )
    );
    
    foreach ($default_categories as $category) {
        $term_result = wp_insert_term(
            $category['name'],
            'service_category',
            array(
                'slug' => $category['slug'],
                'description' => $category['description']
            )
        );
        
        if (!is_wp_error($term_result)) {
            $term_id = $term_result['term_id'];
            
            // Add category meta
            foreach ($category['meta'] as $meta_key => $meta_value) {
                update_term_meta($term_id, $meta_key, $meta_value);
            }
        }
    }
}

/**
 * Create default navigation menu
 */
function service_blueprint_create_default_menu() {
    // Check if menu already exists
    $menu_name = 'Main Navigation';
    $menu_exists = wp_get_nav_menu_object($menu_name);
    
    if ($menu_exists) {
        return; // Menu already exists
    }
    
    // Create the menu
    $menu_id = wp_create_nav_menu($menu_name);
    
    if (is_wp_error($menu_id)) {
        return;
    }
    
    // Add menu items
    $menu_items = array(
        array(
            'title' => 'Home',
            'url' => home_url('/'),
            'menu_order' => 1
        ),
        array(
            'title' => 'Services',
            'url' => get_post_type_archive_link('service'),
            'menu_order' => 2
        ),
        array(
            'title' => 'About',
            'url' => home_url('/about/'),
            'menu_order' => 3
        ),
        array(
            'title' => 'Contact',
            'url' => home_url('/contact/'),
            'menu_order' => 4
        )
    );
    
    foreach ($menu_items as $item) {
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => $item['title'],
            'menu-item-url' => $item['url'],
            'menu-item-status' => 'publish',
            'menu-item-position' => $item['menu_order']
        ));
    }
    
    // Assign menu to theme location
    $locations = get_theme_mod('nav_menu_locations');
    $locations['primary'] = $menu_id;
    set_theme_mod('nav_menu_locations', $locations);
}

/**
 * Create sample service posts
 */
function create_sample_services() {
    // Check if services already exist
    $existing_services = get_posts(array(
        'post_type' => 'service',
        'posts_per_page' => 1,
        'post_status' => 'publish'
    ));
    
    if (!empty($existing_services)) {
        return; // Services already exist
    }
    
    $sample_services = array(
        array(
            'title' => 'Custom WordPress Development',
            'content' => 'Professional WordPress development services including custom themes, plugins, and complete website solutions tailored to your business needs.',
            'category' => 'web-development',
            'meta' => array(
                'service_price' => '$2,500 - $10,000',
                'service_duration' => '4-8 weeks',
                'service_features' => array(
                    'Custom WordPress theme development',
                    'Plugin customization and development',
                    'Responsive design implementation',
                    'SEO optimization',
                    'Performance optimization',
                    'Security implementation'
                ),
                'service_process' => array(
                    array(
                        'step_title' => 'Discovery & Planning',
                        'step_description' => 'We analyze your requirements and create a detailed project plan.'
                    ),
                    array(
                        'step_title' => 'Design & Development',
                        'step_description' => 'Our team creates custom designs and develops your WordPress solution.'
                    ),
                    array(
                        'step_title' => 'Testing & Optimization',
                        'step_description' => 'Thorough testing and performance optimization of your website.'
                    ),
                    array(
                        'step_title' => 'Launch & Support',
                        'step_description' => 'Website launch with ongoing support and maintenance.'
                    )
                ),
                'service_faqs' => array(
                    array(
                        'question' => 'What is included in WordPress development?',
                        'answer' => 'Our WordPress development includes custom theme creation, plugin development, responsive design, SEO optimization, and performance enhancements.'
                    ),
                    array(
                        'question' => 'How long does development take?',
                        'answer' => 'Most WordPress projects take 4-8 weeks depending on complexity and requirements.'
                    ),
                    array(
                        'question' => 'Do you provide ongoing support?',
                        'answer' => 'Yes, we offer maintenance packages and ongoing support for all WordPress websites we develop.'
                    )
                ),
                'featured_service' => true
            )
        ),
        array(
            'title' => 'SEO Optimization Services',
            'content' => 'Comprehensive SEO services to improve your website\'s search engine rankings and drive organic traffic to your business.',
            'category' => 'digital-marketing',
            'meta' => array(
                'service_price' => '$1,500 - $5,000/month',
                'service_duration' => 'Ongoing',
                'service_features' => array(
                    'Keyword research and analysis',
                    'On-page SEO optimization',
                    'Technical SEO audit',
                    'Content optimization',
                    'Link building strategies',
                    'Monthly reporting and analysis'
                ),
                'service_process' => array(
                    array(
                        'step_title' => 'SEO Audit',
                        'step_description' => 'Comprehensive analysis of your current SEO performance and opportunities.'
                    ),
                    array(
                        'step_title' => 'Strategy Development',
                        'step_description' => 'Create a customized SEO strategy based on your business goals.'
                    ),
                    array(
                        'step_title' => 'Implementation',
                        'step_description' => 'Execute SEO improvements and optimizations across your website.'
                    ),
                    array(
                        'step_title' => 'Monitoring & Reporting',
                        'step_description' => 'Ongoing monitoring and monthly reports on SEO performance.'
                    )
                ),
                'service_faqs' => array(
                    array(
                        'question' => 'How long does SEO take to show results?',
                        'answer' => 'SEO typically takes 3-6 months to show significant results, depending on competition and current website status.'
                    ),
                    array(
                        'question' => 'What SEO services do you provide?',
                        'answer' => 'We provide comprehensive SEO including keyword research, on-page optimization, technical SEO, content optimization, and link building.'
                    )
                ),
                'featured_service' => true
            )
        ),
        array(
            'title' => 'Brand Identity Design',
            'content' => 'Complete brand identity design services including logo design, color schemes, typography, and brand guidelines.',
            'category' => 'graphic-design',
            'meta' => array(
                'service_price' => '$1,200 - $3,500',
                'service_duration' => '2-4 weeks',
                'service_features' => array(
                    'Logo design and variations',
                    'Color palette development',
                    'Typography selection',
                    'Brand guidelines document',
                    'Business card design',
                    'Social media assets'
                ),
                'service_process' => array(
                    array(
                        'step_title' => 'Brand Discovery',
                        'step_description' => 'Understanding your business, values, and target audience.'
                    ),
                    array(
                        'step_title' => 'Concept Development',
                        'step_description' => 'Creating initial design concepts and mood boards.'
                    ),
                    array(
                        'step_title' => 'Design Refinement',
                        'step_description' => 'Refining chosen concepts based on your feedback.'
                    ),
                    array(
                        'step_title' => 'Final Delivery',
                        'step_description' => 'Delivering final brand assets and guidelines.'
                    )
                ),
                'service_faqs' => array(
                    array(
                        'question' => 'What files will I receive?',
                        'answer' => 'You\'ll receive logo files in various formats (AI, EPS, PNG, JPG), brand guidelines, and additional brand assets.'
                    ),
                    array(
                        'question' => 'How many revisions are included?',
                        'answer' => 'We include 3 rounds of revisions in our brand identity packages.'
                    )
                ),
                'featured_service' => false
            )
        )
    );
    
    foreach ($sample_services as $service) {
        // Create the post
        $post_id = wp_insert_post(array(
            'post_title' => $service['title'],
            'post_content' => $service['content'],
            'post_status' => 'publish',
            'post_type' => 'service',
            'post_author' => 1
        ));
        
        if (!is_wp_error($post_id)) {
            // Assign category
            $term = get_term_by('slug', $service['category'], 'service_category');
            if ($term) {
                wp_set_post_terms($post_id, array($term->term_id), 'service_category');
            }
            
            // Add meta data
            foreach ($service['meta'] as $meta_key => $meta_value) {
                update_post_meta($post_id, $meta_key, $meta_value);
            }
            
            // Set featured image placeholder (only if media functions are available)
            if (function_exists('media_sideload_image')) {
                require_once(ABSPATH . 'wp-admin/includes/media.php');
                require_once(ABSPATH . 'wp-admin/includes/file.php');
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                
                $image_url = 'https://via.placeholder.com/800x600/2563eb/ffffff?text=' . urlencode($service['title']);
                $image_id = media_sideload_image($image_url, $post_id, $service['title'], 'id');
                if (!is_wp_error($image_id)) {
                    set_post_thumbnail($post_id, $image_id);
                }
            }
        }
    }
}

/**
 * Setup default theme options
 */
function service_blueprint_setup_defaults() {
    // Set default customizer values
    $defaults = array(
        'service_blueprint_hero_title' => 'Transform Your Business with Expert Services',
        'service_blueprint_hero_subtitle' => 'We provide comprehensive digital solutions to help your business grow and succeed in the modern marketplace.',
        'service_blueprint_hero_button_text' => 'Explore Services',
        'service_blueprint_hero_button_url' => get_post_type_archive_link('service'),
        'service_blueprint_primary_color' => '#2563eb',
        'service_blueprint_secondary_color' => '#7c3aed',
        'service_blueprint_accent_color' => '#10b981',
        'service_blueprint_footer_text' => 'Building digital excellence since 2020. Your success is our mission.',
        'service_blueprint_contact_email' => get_option('admin_email'),
        'service_blueprint_contact_phone' => '+1 (555) 123-4567',
        'service_blueprint_social_facebook' => '',
        'service_blueprint_social_twitter' => '',
        'service_blueprint_social_linkedin' => '',
        'service_blueprint_social_instagram' => ''
    );
    
    foreach ($defaults as $option => $value) {
        if (!get_theme_mod($option)) {
            set_theme_mod($option, $value);
        }
    }
}

/**
 * Create required pages
 */
function create_default_pages() {
    $pages = array(
        array(
            'title' => 'About Us',
            'slug' => 'about',
            'content' => '<h2>About Our Company</h2><p>We are a leading digital services company dedicated to helping businesses transform and grow through innovative technology solutions.</p>'
        ),
        array(
            'title' => 'Contact Us',
            'slug' => 'contact',
            'content' => '<h2>Get In Touch</h2><p>Ready to start your project? Contact us today to discuss your requirements and get a personalized quote.</p>'
        ),
        array(
            'title' => 'Privacy Policy',
            'slug' => 'privacy-policy',
            'content' => '<h2>Privacy Policy</h2><p>Your privacy is important to us. This privacy policy explains how we collect, use, and protect your information.</p>'
        ),
        array(
            'title' => 'Terms of Service',
            'slug' => 'terms-of-service',
            'content' => '<h2>Terms of Service</h2><p>These terms govern your use of our website and services. Please read them carefully.</p>'
        )
    );
    
    foreach ($pages as $page) {
        // Check if page already exists
        $existing_page = get_page_by_path($page['slug']);
        
        if (!$existing_page) {
            wp_insert_post(array(
                'post_title' => $page['title'],
                'post_content' => $page['content'],
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_name' => $page['slug'],
                'post_author' => 1
            ));
        }
    }
}

/**
 * Initialize theme on activation
 */
function service_blueprint_theme_activation() {
    // Create default content
    create_default_service_categories();
    create_sample_services();
    create_default_pages();
    
    // Setup theme defaults
    service_blueprint_setup_defaults();
    
    // Create navigation menu
    service_blueprint_create_default_menu();
    
    // Flush rewrite rules
    flush_rewrite_rules();
    
    // Set default options
    update_option('service_blueprint_activated', true);
    update_option('service_blueprint_activation_date', current_time('mysql'));
}

/**
 * Check if theme has been properly activated
 */
function service_blueprint_check_activation() {
    if (!get_option('service_blueprint_activated') && current_user_can('manage_options')) {
        add_action('admin_notices', 'service_blueprint_activation_notice');
    }
}
add_action('admin_init', 'service_blueprint_check_activation');

/**
 * Display activation notice
 */
function service_blueprint_activation_notice() {
    ?>
    <div class="notice notice-info is-dismissible">
        <p>
            <strong>Service Blueprint Theme:</strong> 
            Welcome! Would you like to set up default content and sample services? 
            <a href="<?php echo wp_nonce_url(admin_url('admin.php?action=service_blueprint_setup'), 'service_blueprint_setup'); ?>" class="button button-primary">
                Setup Default Content
            </a>
        </p>
    </div>
    <?php
}

/**
 * Handle theme setup action
 */
function service_blueprint_handle_setup() {
    if (!current_user_can('manage_options') || !wp_verify_nonce($_GET['_wpnonce'], 'service_blueprint_setup')) {
        wp_die('Unauthorized access');
    }
    
    service_blueprint_theme_activation();
    
    wp_redirect(admin_url('themes.php?service_blueprint_setup=complete'));
    exit;
}
add_action('admin_action_service_blueprint_setup', 'service_blueprint_handle_setup');

/**
 * Display setup complete notice
 */
function service_blueprint_setup_complete_notice() {
    if (isset($_GET['service_blueprint_setup']) && $_GET['service_blueprint_setup'] === 'complete') {
        ?>
        <div class="notice notice-success is-dismissible">
            <p><strong>Service Blueprint Theme:</strong> Default content has been successfully created!</p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'service_blueprint_setup_complete_notice');
