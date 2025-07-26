<?php
/**
 * Sample Data Generator for BluePrint Folder Theme
 * Creates sample services, categories, testimonials, and pricing plans
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Generate Sample Service Categories
 */
function blueprint_folder_create_sample_categories() {
    $categories = array(
        'web-development' => array(
            'name' => 'Web Development',
            'description' => 'Custom websites and web applications built with modern technologies',
            'icon' => 'fas fa-code'
        ),
        'digital-marketing' => array(
            'name' => 'Digital Marketing',
            'description' => 'Comprehensive digital marketing strategies to grow your online presence',
            'icon' => 'fas fa-bullhorn'
        ),
        'business-consulting' => array(
            'name' => 'Business Consulting',
            'description' => 'Expert business consulting to optimize your operations and strategy',
            'icon' => 'fas fa-chart-line'
        ),
        'graphic-design' => array(
            'name' => 'Graphic Design',
            'description' => 'Professional graphic design services for brand identity and marketing materials',
            'icon' => 'fas fa-paint-brush'
        ),
        'technical-support' => array(
            'name' => 'Technical Support',
            'description' => 'Reliable technical support and IT solutions for your business',
            'icon' => 'fas fa-tools'
        )
    );

    foreach ($categories as $slug => $category) {
        $term = wp_insert_term(
            $category['name'],
            'service_category',
            array(
                'description' => $category['description'],
                'slug' => $slug
            )
        );
        
        if (!is_wp_error($term)) {
            // Add custom meta for icon
            update_term_meta($term['term_id'], 'category_icon', $category['icon']);
        }
    }
}

/**
 * Generate Sample Services
 */
function blueprint_folder_create_sample_services() {
    $services = array(
        // Web Development Services
        array(
            'title' => 'Custom Website Development',
            'content' => 'We create custom websites tailored to your business needs using the latest web technologies. Our websites are responsive, fast, and optimized for search engines.',
            'excerpt' => 'Professional custom website development with modern design and functionality.',
            'category' => 'web-development',
            'price_range' => '$2,500 - $10,000',
            'duration' => '4-8 weeks',
            'icon' => 'fas fa-laptop-code'
        ),
        array(
            'title' => 'E-commerce Solutions',
            'content' => 'Complete e-commerce solutions including online stores, payment integration, inventory management, and customer support systems.',
            'excerpt' => 'Full-featured e-commerce websites to sell your products online.',
            'category' => 'web-development',
            'price_range' => '$5,000 - $25,000',
            'duration' => '6-12 weeks',
            'icon' => 'fas fa-shopping-cart'
        ),
        array(
            'title' => 'Web Application Development',
            'content' => 'Custom web applications built with modern frameworks like React, Vue.js, and Laravel to solve your business challenges.',
            'excerpt' => 'Custom web applications to streamline your business processes.',
            'category' => 'web-development',
            'price_range' => '$10,000 - $50,000',
            'duration' => '8-16 weeks',
            'icon' => 'fas fa-cogs'
        ),
        
        // Digital Marketing Services
        array(
            'title' => 'Search Engine Optimization',
            'content' => 'Improve your website\'s visibility in search results with our comprehensive SEO strategies including keyword research, on-page optimization, and link building.',
            'excerpt' => 'Boost your search rankings and organic traffic with professional SEO.',
            'category' => 'digital-marketing',
            'price_range' => '$1,000 - $5,000/month',
            'duration' => 'Ongoing',
            'icon' => 'fas fa-search'
        ),
        array(
            'title' => 'Social Media Management',
            'content' => 'Complete social media management including content creation, posting schedules, community management, and performance analytics.',
            'excerpt' => 'Professional social media management to grow your online presence.',
            'category' => 'digital-marketing',
            'price_range' => '$800 - $3,000/month',
            'duration' => 'Ongoing',
            'icon' => 'fas fa-thumbs-up'
        ),
        array(
            'title' => 'Pay-Per-Click Advertising',
            'content' => 'Strategic PPC campaigns on Google Ads, Facebook, and other platforms to drive targeted traffic and conversions.',
            'excerpt' => 'Targeted advertising campaigns to maximize your ROI.',
            'category' => 'digital-marketing',
            'price_range' => '$500 - $2,000/month + ad spend',
            'duration' => 'Ongoing',
            'icon' => 'fas fa-mouse-pointer'
        ),
        
        // Business Consulting Services
        array(
            'title' => 'Business Strategy Consulting',
            'content' => 'Comprehensive business strategy development including market analysis, competitive research, and growth planning.',
            'excerpt' => 'Strategic consulting to guide your business growth and success.',
            'category' => 'business-consulting',
            'price_range' => '$150 - $300/hour',
            'duration' => '2-6 weeks',
            'icon' => 'fas fa-chess'
        ),
        array(
            'title' => 'Process Optimization',
            'content' => 'Analyze and optimize your business processes to improve efficiency, reduce costs, and enhance productivity.',
            'excerpt' => 'Streamline your operations for maximum efficiency.',
            'category' => 'business-consulting',
            'price_range' => '$2,000 - $8,000',
            'duration' => '3-8 weeks',
            'icon' => 'fas fa-tasks'
        ),
        
        // Graphic Design Services
        array(
            'title' => 'Brand Identity Design',
            'content' => 'Complete brand identity packages including logo design, color schemes, typography, and brand guidelines.',
            'excerpt' => 'Professional brand identity design to establish your market presence.',
            'category' => 'graphic-design',
            'price_range' => '$1,500 - $5,000',
            'duration' => '2-4 weeks',
            'icon' => 'fas fa-palette'
        ),
        array(
            'title' => 'Marketing Collateral Design',
            'content' => 'Design of marketing materials including brochures, flyers, business cards, banners, and digital graphics.',
            'excerpt' => 'Eye-catching marketing materials to promote your business.',
            'category' => 'graphic-design',
            'price_range' => '$300 - $1,500',
            'duration' => '1-2 weeks',
            'icon' => 'fas fa-file-image'
        ),
        
        // Technical Support Services
        array(
            'title' => 'IT Support & Maintenance',
            'content' => 'Comprehensive IT support including system maintenance, troubleshooting, security updates, and technical assistance.',
            'excerpt' => 'Reliable IT support to keep your systems running smoothly.',
            'category' => 'technical-support',
            'price_range' => '$100 - $200/hour',
            'duration' => 'As needed',
            'icon' => 'fas fa-headset'
        ),
        array(
            'title' => 'Website Maintenance',
            'content' => 'Regular website maintenance including updates, backups, security monitoring, and performance optimization.',
            'excerpt' => 'Keep your website secure, updated, and performing optimally.',
            'category' => 'technical-support',
            'price_range' => '$200 - $800/month',
            'duration' => 'Ongoing',
            'icon' => 'fas fa-wrench'
        )
    );

    foreach ($services as $service) {
        // Create the service post
        $post_id = wp_insert_post(array(
            'post_title' => $service['title'],
            'post_content' => $service['content'],
            'post_excerpt' => $service['excerpt'],
            'post_status' => 'publish',
            'post_type' => 'service',
            'meta_input' => array(
                '_service_price_range' => $service['price_range'],
                '_service_duration' => $service['duration'],
                '_service_icon' => $service['icon']
            )
        ));

        if (!is_wp_error($post_id)) {
            // Assign to category
            $term = get_term_by('slug', $service['category'], 'service_category');
            if ($term) {
                wp_set_post_terms($post_id, array($term->term_id), 'service_category');
            }
        }
    }
}

/**
 * Generate Sample Testimonials
 */
function blueprint_folder_create_sample_testimonials() {
    $testimonials = array(
        array(
            'title' => 'Exceptional Web Development',
            'content' => 'BluePrint Folder delivered an outstanding website that exceeded all our expectations. Their attention to detail and professional approach made the entire process smooth and enjoyable.',
            'client_name' => 'Sarah Johnson',
            'client_position' => 'CEO',
            'client_company' => 'Tech Innovations Inc.',
            'rating' => 5
        ),
        array(
            'title' => 'Outstanding Digital Marketing Results',
            'content' => 'Our online presence has dramatically improved since working with BluePrint Folder. Their digital marketing strategies have increased our leads by 300% in just six months.',
            'client_name' => 'Michael Chen',
            'client_position' => 'Marketing Director',
            'client_company' => 'Growth Solutions LLC',
            'rating' => 5
        ),
        array(
            'title' => 'Professional Business Consulting',
            'content' => 'The business consulting services provided by BluePrint Folder helped us streamline our operations and increase efficiency by 40%. Highly recommended!',
            'client_name' => 'Emily Rodriguez',
            'client_position' => 'Operations Manager',
            'client_company' => 'Efficient Systems Corp',
            'rating' => 5
        ),
        array(
            'title' => 'Creative Design Solutions',
            'content' => 'Their graphic design team created a brand identity that perfectly captures our company vision. The logo and marketing materials are simply perfect.',
            'client_name' => 'David Thompson',
            'client_position' => 'Founder',
            'client_company' => 'Creative Ventures',
            'rating' => 5
        ),
        array(
            'title' => 'Reliable Technical Support',
            'content' => 'BluePrint Folder\'s technical support team is always responsive and knowledgeable. They keep our systems running smoothly 24/7.',
            'client_name' => 'Lisa Wang',
            'client_position' => 'IT Manager',
            'client_company' => 'Reliable Tech Solutions',
            'rating' => 5
        ),
        array(
            'title' => 'Comprehensive E-commerce Solution',
            'content' => 'Our online store has been a huge success thanks to BluePrint Folder\'s e-commerce development. Sales have increased by 250% since launch.',
            'client_name' => 'Robert Anderson',
            'client_position' => 'Store Owner',
            'client_company' => 'Anderson Electronics',
            'rating' => 5
        )
    );

    foreach ($testimonials as $testimonial) {
        wp_insert_post(array(
            'post_title' => $testimonial['title'],
            'post_content' => $testimonial['content'],
            'post_status' => 'publish',
            'post_type' => 'testimonial',
            'meta_input' => array(
                '_testimonial_client_name' => $testimonial['client_name'],
                '_testimonial_client_position' => $testimonial['client_position'],
                '_testimonial_client_company' => $testimonial['client_company'],
                '_testimonial_rating' => $testimonial['rating']
            )
        ));
    }
}

/**
 * Generate Sample Pricing Plans
 */
function blueprint_folder_create_sample_pricing_plans() {
    $plans = array(
        array(
            'title' => 'Starter',
            'content' => 'Perfect for small businesses just getting started with professional services.',
            'price' => '299',
            'currency' => '$',
            'period' => 'month',
            'features' => "Basic website design\n1 round of revisions\nMobile responsive\nBasic SEO setup\nEmail support",
            'button_text' => 'Get Started',
            'button_url' => '/contact',
            'featured' => false,
            'order' => 1
        ),
        array(
            'title' => 'Professional',
            'content' => 'Ideal for growing businesses that need comprehensive solutions.',
            'price' => '599',
            'currency' => '$',
            'period' => 'month',
            'features' => "Custom website development\n3 rounds of revisions\nMobile responsive\nAdvanced SEO\nContent management system\nPriority email support\nBasic analytics",
            'button_text' => 'Most Popular',
            'button_url' => '/contact',
            'featured' => true,
            'ribbon_text' => 'Most Popular',
            'order' => 2
        ),
        array(
            'title' => 'Enterprise',
            'content' => 'Comprehensive solutions for large businesses and organizations.',
            'price' => '1199',
            'currency' => '$',
            'period' => 'month',
            'features' => "Full custom development\nUnlimited revisions\nMultiple integrations\nAdvanced SEO & analytics\nCustom CMS\n24/7 phone support\nDedicated account manager\nMonthly strategy calls",
            'button_text' => 'Contact Sales',
            'button_url' => '/contact',
            'featured' => false,
            'order' => 3
        )
    );

    foreach ($plans as $plan) {
        wp_insert_post(array(
            'post_title' => $plan['title'],
            'post_content' => $plan['content'],
            'post_status' => 'publish',
            'post_type' => 'pricing_plan',
            'meta_input' => array(
                '_plan_price' => $plan['price'],
                '_plan_currency' => $plan['currency'],
                '_plan_period' => $plan['period'],
                '_plan_features' => $plan['features'],
                '_plan_button_text' => $plan['button_text'],
                '_plan_button_url' => home_url($plan['button_url']),
                '_plan_featured' => $plan['featured'],
                '_plan_ribbon_text' => isset($plan['ribbon_text']) ? $plan['ribbon_text'] : '',
                '_pricing_order' => $plan['order']
            )
        ));
    }
}

/**
 * Main function to create all sample data
 */
function blueprint_folder_generate_sample_data() {
    // Create categories first
    blueprint_folder_create_sample_categories();
    
    // Then create services (they need categories)
    blueprint_folder_create_sample_services();
    
    // Create testimonials
    blueprint_folder_create_sample_testimonials();
    
    // Create pricing plans
    blueprint_folder_create_sample_pricing_plans();
    
    // Flush rewrite rules
    flush_rewrite_rules();
}

// Run this function only if called directly or via admin
if (current_user_can('manage_options') && isset($_GET['generate_sample_data']) && $_GET['generate_sample_data'] === 'true') {
    blueprint_folder_generate_sample_data();
    echo '<div style="padding: 20px; background: #d4edda; color: #155724; border: 1px solid #c3e6cb; margin: 20px;">
        <h3>Sample Data Generated Successfully!</h3>
        <p>The following sample data has been created:</p>
        <ul>
            <li>5 Service Categories</li>
            <li>12 Services across all categories</li>
            <li>6 Customer Testimonials</li>
            <li>3 Pricing Plans</li>
        </ul>
        <p><strong>Next Steps:</strong></p>
        <ol>
            <li>Go to <a href="' . admin_url('nav-menus.php') . '">Appearance → Menus</a></li>
            <li>Add Service Categories and Services to your navigation menu</li>
            <li>Test the multi-level dropdown functionality</li>
        </ol>
    </div>';
}
?>
