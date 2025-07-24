<?php
/**
 * Service Content Generator
 * 
 * This file contains functions to automatically generate service posts
 * and pages with demo content for the new service structure.
 * 
 * Usage: Include this file and call generate_all_service_content() once
 * to populate the site with demo content.
 */

/**
 * Generate all service posts and pages with demo content
 */
function generate_all_service_content() {
    // Check if already generated
    if (get_option('service_content_generated_v2')) {
        return 'Service content already generated.';
    }
    
    $service_categories = get_service_categories();
    $generated_count = 0;
    
    foreach ($service_categories as $category_name => $category_data) {
        // Create category if it doesn't exist
        $category_slug = $category_data['slug'];
        $term = term_exists($category_slug, 'service_category');
        
        if (!$term) {
            $term = wp_insert_term(
                $category_name,
                'service_category',
                array(
                    'slug' => $category_slug,
                    'description' => $category_data['description']
                )
            );
        }
        
        $term_id = is_array($term) ? $term['term_id'] : $term;
        
        // Generate individual service posts for each service in this category
        foreach ($category_data['services'] as $service_name => $service_info) {
            $post_title = $service_name;
            $post_slug = sanitize_title($service_name);
            
            // Check if post already exists
            $existing_post = get_page_by_path($post_slug, OBJECT, 'services');
            
            if (!$existing_post) {
                // Generate comprehensive service content
                $post_content = generate_service_post_content($service_name, $service_info, $category_name);
                
                // Create the service post
                $post_id = wp_insert_post(array(
                    'post_title' => $post_title,
                    'post_name' => $post_slug,
                    'post_content' => $post_content,
                    'post_status' => 'publish',
                    'post_type' => 'services',
                    'post_author' => 1
                ));
                
                if ($post_id && !is_wp_error($post_id)) {
                    // Assign to category
                    wp_set_object_terms($post_id, $term_id, 'service_category');
                    
                    // Add custom fields
                    update_post_meta($post_id, 'service_price', $service_info['price']);
                    update_post_meta($post_id, 'service_duration', $service_info['duration']);
                    update_post_meta($post_id, 'service_features', $service_info['features']);
                    
                    $generated_count++;
                }
            }
        }
    }
    
    // Mark as generated
    update_option('service_content_generated_v2', true);
    
    return "Generated {$generated_count} service posts with demo content.";
}

/**
 * Generate comprehensive content for a single service post
 */
function generate_service_post_content($service_name, $service_info, $category_name) {
    $features_list = explode("\n", $service_info['features']);
    $features_html = '';
    
    foreach ($features_list as $feature) {
        $feature = trim($feature);
        if (!empty($feature)) {
            $features_html .= '<li><i class="fas fa-check-circle" style="color: #28a745; margin-right: 0.5rem;"></i>' . esc_html($feature) . '</li>';
        }
    }
    
    $content = '
    <!-- Service Hero Section -->
    <div class="service-hero" style="background: linear-gradient(135deg, rgba(255,95,0,0.9), rgba(255,140,0,0.8)); padding: 4rem 0; color: white; text-align: center; margin-bottom: 3rem;">
        <div class="container">
            <h1 style="font-size: 3rem; margin-bottom: 1rem; font-weight: 700;">' . esc_html($service_name) . '</h1>
            <p style="font-size: 1.2rem; opacity: 0.9; max-width: 600px; margin: 0 auto;">' . esc_html($service_info['description']) . '</p>
            
            <div style="display: flex; justify-content: center; gap: 2rem; margin-top: 2rem; flex-wrap: wrap;">
                <div style="text-align: center;">
                    <div style="font-size: 1.5rem; font-weight: 700;">' . esc_html($service_info['price']) . '</div>
                    <div style="font-size: 0.9rem; opacity: 0.8;">Starting Price</div>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 1.5rem; font-weight: 700;">' . esc_html($service_info['duration']) . '</div>
                    <div style="font-size: 0.9rem; opacity: 0.8;">Duration</div>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 1.5rem; font-weight: 700;">100%</div>
                    <div style="font-size: 0.9rem; opacity: 0.8;">Satisfaction</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service Content -->
    <div class="service-content" style="max-width: 1200px; margin: 0 auto; padding: 0 2rem;">
        
        <!-- Service Overview -->
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 3rem; margin-bottom: 3rem;">
            <div>
                <h2 style="color: #333; margin-bottom: 1.5rem;">Service Overview</h2>
                <p style="color: #666; line-height: 1.7; font-size: 1.1rem; margin-bottom: 2rem;">' . esc_html($service_info['description']) . '</p>
                
                <h3 style="color: #333; margin-bottom: 1rem;">What\'s Included</h3>
                <ul style="list-style: none; padding: 0;">
                    ' . $features_html . '
                </ul>
            </div>
            
            <div style="background: #f8f9fa; padding: 2rem; border-radius: 15px; height: fit-content;">
                <h3 style="color: #333; margin-bottom: 1.5rem; text-align: center;">Quick Quote</h3>
                <div style="text-align: center; margin-bottom: 2rem;">
                    <div style="font-size: 2rem; font-weight: 700; color: #ff5f00; margin-bottom: 0.5rem;">' . esc_html($service_info['price']) . '</div>
                    <div style="color: #666; font-size: 0.9rem;">Typical Duration: ' . esc_html($service_info['duration']) . '</div>
                </div>
                
                <div style="margin-bottom: 2rem;">
                    <a href="/contact" style="display: block; background: #ff5f00; color: white; padding: 1rem; text-align: center; border-radius: 8px; text-decoration: none; font-weight: 600; margin-bottom: 1rem; transition: all 0.3s ease;">
                        Book This Service
                    </a>
                    <a href="/contact?service=' . urlencode($service_name) . '" style="display: block; background: transparent; color: #ff5f00; padding: 1rem; text-align: center; border-radius: 8px; text-decoration: none; font-weight: 600; border: 2px solid #ff5f00; transition: all 0.3s ease;">
                        Get Custom Quote
                    </a>
                </div>
                
                <div style="font-size: 0.9rem; color: #666; text-align: center;">
                    <p><i class="fas fa-shield-alt" style="color: #28a745; margin-right: 0.5rem;"></i>100% Satisfaction Guaranteed</p>
                    <p><i class="fas fa-clock" style="color: #17a2b8; margin-right: 0.5rem;"></i>Flexible Scheduling</p>
                </div>
            </div>
        </div>

        <!-- Process Section -->
        <div style="background: white; padding: 3rem; border-radius: 15px; margin-bottom: 3rem; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            <h2 style="color: #333; text-align: center; margin-bottom: 2rem;">How It Works</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; text-align: center;">
                <div>
                    <div style="width: 50px; height: 50px; background: #ff5f00; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; margin: 0 auto 1rem;">1</div>
                    <h4 style="color: #333; margin-bottom: 0.5rem;">Contact Us</h4>
                    <p style="color: #666; font-size: 0.9rem;">Get in touch to discuss your needs and schedule a consultation.</p>
                </div>
                <div>
                    <div style="width: 50px; height: 50px; background: #ff5f00; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; margin: 0 auto 1rem;">2</div>
                    <h4 style="color: #333; margin-bottom: 0.5rem;">Assessment</h4>
                    <p style="color: #666; font-size: 0.9rem;">We evaluate your specific requirements and provide a detailed quote.</p>
                </div>
                <div>
                    <div style="width: 50px; height: 50px; background: #ff5f00; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; margin: 0 auto 1rem;">3</div>
                    <h4 style="color: #333; margin-bottom: 0.5rem;">Service Delivery</h4>
                    <p style="color: #666; font-size: 0.9rem;">Our professionals complete the work to your satisfaction.</p>
                </div>
                <div>
                    <div style="width: 50px; height: 50px; background: #ff5f00; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; margin: 0 auto 1rem;">4</div>
                    <h4 style="color: #333; margin-bottom: 0.5rem;">Follow-up</h4>
                    <p style="color: #666; font-size: 0.9rem;">We ensure your complete satisfaction with our service.</p>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div style="margin-bottom: 3rem;">
            <h2 style="color: #333; margin-bottom: 2rem;">Frequently Asked Questions</h2>
            ' . generate_service_faqs($service_name, $category_name) . '
        </div>

        <!-- Related Services -->
        <div style="background: #f8f9fa; padding: 3rem; border-radius: 15px; margin-bottom: 3rem;">
            <h2 style="color: #333; text-align: center; margin-bottom: 2rem;">Related Services</h2>
            <p style="text-align: center; color: #666; margin-bottom: 2rem;">You might also be interested in these services from our ' . esc_html($category_name) . ' category:</p>
            <div style="text-align: center;">
                <a href="/services/" style="background: #ff5f00; color: white; padding: 1rem 2rem; border-radius: 8px; text-decoration: none; font-weight: 600; display: inline-block;">
                    View All ' . esc_html($category_name) . ' Services
                </a>
            </div>
        </div>

    </div>

    <!-- CTA Section -->
    <div style="background: linear-gradient(135deg, #ff5f00, #ff8c00); color: white; padding: 4rem 0; text-align: center; margin-top: 3rem;">
        <div class="container">
            <h2 style="font-size: 2.5rem; margin-bottom: 1rem;">Ready to Get Started?</h2>
            <p style="font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.9;">Contact us today for a free consultation and personalized quote.</p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="/contact" style="background: white; color: #ff5f00; padding: 1rem 2rem; border-radius: 50px; text-decoration: none; font-weight: 600; font-size: 1.1rem;">Get Free Quote</a>
                <a href="tel:+1234567890" style="background: rgba(255,255,255,0.1); color: white; padding: 1rem 2rem; border-radius: 50px; text-decoration: none; font-weight: 600; font-size: 1.1rem; border: 2px solid white;">Call Now</a>
            </div>
        </div>
    </div>
    ';
    
    return $content;
}

/**
 * Generate FAQ content for a service
 */
function generate_service_faqs($service_name, $category_name) {
    $faqs = array(
        array(
            'question' => 'How much does ' . $service_name . ' cost?',
            'answer' => 'Our pricing varies based on your specific needs and requirements. Contact us for a personalized quote that fits your budget.'
        ),
        array(
            'question' => 'How long does ' . $service_name . ' take?',
            'answer' => 'The duration depends on the scope of work. We\'ll provide an estimated timeline during our initial consultation.'
        ),
        array(
            'question' => 'Do you guarantee your work?',
            'answer' => 'Yes, we stand behind all our services with a 100% satisfaction guarantee. If you\'re not completely satisfied, we\'ll make it right.'
        ),
        array(
            'question' => 'Are you licensed and insured?',
            'answer' => 'Absolutely. We are fully licensed and carry comprehensive insurance to protect you and your property.'
        ),
        array(
            'question' => 'How do I schedule ' . $service_name . '?',
            'answer' => 'Simply contact us via phone, email, or our online form. We\'ll work with you to find a convenient time that fits your schedule.'
        )
    );
    
    $faq_html = '<div style="max-width: 800px;">';
    
    foreach ($faqs as $index => $faq) {
        $faq_html .= '
        <div style="border: 1px solid #e9ecef; border-radius: 8px; margin-bottom: 1rem; overflow: hidden;">
            <div style="background: #f8f9fa; padding: 1.5rem; cursor: pointer; border-bottom: 1px solid #e9ecef;" onclick="toggleFaq(' . $index . ')">
                <h4 style="color: #333; margin: 0; display: flex; justify-content: space-between; align-items: center;">
                    ' . esc_html($faq['question']) . '
                    <span style="font-size: 1.2rem; color: #ff5f00;">+</span>
                </h4>
            </div>
            <div id="faq-' . $index . '" style="padding: 1.5rem; display: none;">
                <p style="color: #666; margin: 0; line-height: 1.6;">' . esc_html($faq['answer']) . '</p>
            </div>
        </div>';
    }
    
    $faq_html .= '</div>
    
    <script>
    function toggleFaq(index) {
        var faqAnswer = document.getElementById("faq-" + index);
        var isVisible = faqAnswer.style.display !== "none";
        
        if (isVisible) {
            faqAnswer.style.display = "none";
        } else {
            faqAnswer.style.display = "block";
        }
    }
    </script>';
    
    return $faq_html;
}

/**
 * Generate WordPress pages for each service category
 */
function create_service_category_pages() {
    $service_categories = get_service_categories();
    $created_pages = array();
    
    foreach ($service_categories as $category_name => $category_data) {
        $page_title = $category_data['name'];
        $page_slug = $category_data['slug'];
        
        // Check if page already exists
        $existing_page = get_page_by_path($page_slug);
        
        if (!$existing_page) {
            $page_content = generate_category_page_content($category_name, $category_data);
            
            $page_id = wp_insert_post(array(
                'post_title' => $page_title,
                'post_name' => $page_slug,
                'post_content' => $page_content,
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_author' => 1,
                'page_template' => 'page-service-category.php'
            ));
            
            if ($page_id && !is_wp_error($page_id)) {
                $created_pages[] = $page_title;
            }
        }
    }
    
    return $created_pages;
}

/**
 * Generate content for category pages
 */
function generate_category_page_content($category_name, $category_data) {
    return '<!-- This page content is automatically generated. Customize as needed. -->
    
    <div class="category-page-intro" style="padding: 2rem 0; text-align: center; background: #f8f9fa;">
        <h1>' . esc_html($category_name) . '</h1>
        <p style="font-size: 1.2rem; color: #666; max-width: 600px; margin: 0 auto;">' . esc_html($category_data['description']) . '</p>
    </div>
    
    <div class="category-services-showcase" style="padding: 3rem 0;">
        <!-- Services will be automatically populated from the taxonomy template -->
        <p style="text-align: center;">
            <a href="/contact" style="background: #ff5f00; color: white; padding: 1rem 2rem; border-radius: 8px; text-decoration: none; font-weight: 600;">
                Get Quote for ' . esc_html($category_name) . '
            </a>
        </p>
    </div>';
}

// Add admin notice to run the generator
function service_content_generator_admin_notice() {
    if (!get_option('service_content_generated_v2')) {
        echo '<div class="notice notice-info is-dismissible">
            <p><strong>Service Content Generator:</strong> 
            <a href="' . admin_url('admin.php?page=generate-service-content') . '">Click here to generate demo service content</a> 
            for your new service structure.</p>
        </div>';
    }
}
add_action('admin_notices', 'service_content_generator_admin_notice');

// Add admin menu item
function add_service_content_generator_menu() {
    add_management_page(
        'Generate Service Content',
        'Generate Service Content',
        'manage_options',
        'generate-service-content',
        'service_content_generator_page'
    );
}
add_action('admin_menu', 'add_service_content_generator_menu');

// Admin page callback
function service_content_generator_page() {
    if (isset($_POST['generate_content'])) {
        $result = generate_all_service_content();
        echo '<div class="notice notice-success"><p>' . esc_html($result) . '</p></div>';
    }
    
    if (isset($_POST['create_pages'])) {
        $created_pages = create_service_category_pages();
        if (!empty($created_pages)) {
            echo '<div class="notice notice-success"><p>Created pages: ' . implode(', ', $created_pages) . '</p></div>';
        } else {
            echo '<div class="notice notice-info"><p>All category pages already exist.</p></div>';
        }
    }
    
    echo '<div class="wrap">
        <h1>Service Content Generator</h1>
        <p>Generate demo content for your service structure.</p>
        
        <form method="post">
            <table class="form-table">
                <tr>
                    <th scope="row">Generate Service Posts</th>
                    <td>
                        <input type="submit" name="generate_content" class="button button-primary" value="Generate Service Posts" />
                        <p class="description">Creates individual service posts with demo content for each service.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Create Category Pages</th>
                    <td>
                        <input type="submit" name="create_pages" class="button button-secondary" value="Create Category Pages" />
                        <p class="description">Creates WordPress pages for each service category.</p>
                    </td>
                </tr>
            </table>
        </form>
        
        <h2>Current Service Structure</h2>
        <ul>';
    
    $service_categories = get_service_categories();
    foreach ($service_categories as $category_name => $category_data) {
        echo '<li><strong>' . esc_html($category_name) . '</strong> (' . count($category_data['services']) . ' services)</li>';
    }
    
    echo '</ul>
    </div>';
}

?>
