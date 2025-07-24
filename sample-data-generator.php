<?php
/**
 * Sample Data Generator for Custom Post Types
 * Run this once to populate the site with sample content
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
    require_once(ABSPATH . 'wp-config.php');
}

function services_pro_create_sample_data() {
    // Sample Services
    $services = array(
        array(
            'title' => 'Home Cleaning Services',
            'content' => 'Professional deep cleaning services for your home. Our experienced team uses eco-friendly products and modern equipment to ensure your home is spotless and healthy.',
            'excerpt' => 'Deep cleaning services that leave your home spotless and fresh',
            'category' => 'Cleaning',
            'price_range' => '$80 - $200',
            'duration' => '2-4 hours',
            'includes' => 'All rooms, bathrooms, kitchen deep clean, window cleaning'
        ),
        array(
            'title' => 'Handyman Services',
            'content' => 'Complete handyman services for all your home repair and maintenance needs. From minor repairs to major renovations, our skilled professionals handle it all.',
            'excerpt' => 'Expert repairs and maintenance to keep your home in perfect condition',
            'category' => 'Maintenance',
            'price_range' => '$50 - $150 per hour',
            'duration' => '1-8 hours',
            'includes' => 'Basic tools, materials assessment, cleanup'
        ),
        array(
            'title' => 'Yard Care & Landscaping',
            'content' => 'Transform your outdoor space with our comprehensive yard care and landscaping services. We handle everything from regular maintenance to complete landscape design.',
            'excerpt' => 'Complete landscaping and yard maintenance services',
            'category' => 'Outdoor',
            'price_range' => '$60 - $300',
            'duration' => '2-6 hours',
            'includes' => 'Mowing, trimming, cleanup, basic tools'
        )
    );

    // Sample FAQs
    $faqs = array(
        array(
            'title' => 'What areas do you serve?',
            'content' => 'We proudly serve the greater metropolitan area within a 25-mile radius of downtown. This includes all major suburbs and surrounding communities. Contact us to confirm if we service your specific location.',
            'category' => 'Service Area'
        ),
        array(
            'title' => 'Are you licensed and insured?',
            'content' => 'Yes, we are fully licensed and insured. All our technicians carry comprehensive liability insurance and are bonded for your protection. We can provide proof of insurance upon request.',
            'category' => 'Credentials'
        ),
        array(
            'title' => 'How do I get a quote?',
            'content' => 'Getting a quote is easy! You can call us directly, fill out our online contact form, or request a quote through our website. We typically respond within 24 hours with a detailed estimate.',
            'category' => 'Pricing'
        ),
        array(
            'title' => 'Do you offer emergency services?',
            'content' => 'Yes, we offer emergency services for urgent repairs and situations. Emergency services are available 24/7 and include plumbing leaks, electrical issues, and security concerns.',
            'category' => 'Emergency'
        )
    );

    // Sample Menu Items (if running a restaurant/food service)
    $menu_items = array(
        array(
            'title' => 'Classic Burger',
            'content' => 'Our signature beef burger with lettuce, tomato, onion, pickles, and our special sauce on a toasted bun.',
            'excerpt' => 'Juicy beef patty with fresh toppings and special sauce',
            'category' => 'Burgers',
            'price' => '12.99',
            'ingredients' => '1/3 lb beef patty, lettuce, tomato, onion, pickles, special sauce, sesame bun',
            'calories' => '650',
            'prep_time' => '8-10 minutes'
        ),
        array(
            'title' => 'Caesar Salad',
            'content' => 'Fresh romaine lettuce with parmesan cheese, croutons, and our homemade Caesar dressing.',
            'excerpt' => 'Crisp romaine with parmesan and Caesar dressing',
            'category' => 'Salads',
            'price' => '9.99',
            'ingredients' => 'Romaine lettuce, parmesan cheese, croutons, Caesar dressing',
            'dietary_info' => 'vegetarian',
            'calories' => '320',
            'prep_time' => '5 minutes'
        )
    );

    echo "<h2>Creating Sample Data...</h2>";

    // Create Service Categories
    $service_categories = array('Cleaning', 'Maintenance', 'Outdoor');
    foreach ($service_categories as $cat_name) {
        $term = wp_insert_term($cat_name, 'service_category');
        if (!is_wp_error($term)) {
            echo "<p>✓ Created service category: {$cat_name}</p>";
        }
    }

    // Create Services
    foreach ($services as $service) {
        $post_id = wp_insert_post(array(
            'post_title' => $service['title'],
            'post_content' => $service['content'],
            'post_excerpt' => $service['excerpt'],
            'post_status' => 'publish',
            'post_type' => 'service'
        ));

        if ($post_id) {
            // Add to category
            wp_set_post_terms($post_id, $service['category'], 'service_category');
            
            // Add custom fields
            update_post_meta($post_id, 'service_price_range', $service['price_range']);
            update_post_meta($post_id, 'service_duration', $service['duration']);
            update_post_meta($post_id, 'service_includes', $service['includes']);
            
            echo "<p>✓ Created service: {$service['title']}</p>";
        }
    }

    // Create FAQ Categories
    $faq_categories = array('Service Area', 'Credentials', 'Pricing', 'Emergency');
    foreach ($faq_categories as $cat_name) {
        $term = wp_insert_term($cat_name, 'faq_category');
        if (!is_wp_error($term)) {
            echo "<p>✓ Created FAQ category: {$cat_name}</p>";
        }
    }

    // Create FAQs
    foreach ($faqs as $faq) {
        $post_id = wp_insert_post(array(
            'post_title' => $faq['title'],
            'post_content' => $faq['content'],
            'post_status' => 'publish',
            'post_type' => 'faq'
        ));

        if ($post_id) {
            wp_set_post_terms($post_id, $faq['category'], 'faq_category');
            echo "<p>✓ Created FAQ: {$faq['title']}</p>";
        }
    }

    // Create Menu Categories (optional - for food service businesses)
    $menu_categories = array('Burgers', 'Salads');
    foreach ($menu_categories as $cat_name) {
        $term = wp_insert_term($cat_name, 'menu_category');
        if (!is_wp_error($term)) {
            echo "<p>✓ Created menu category: {$cat_name}</p>";
        }
    }

    // Create Menu Items (optional)
    foreach ($menu_items as $item) {
        $post_id = wp_insert_post(array(
            'post_title' => $item['title'],
            'post_content' => $item['content'],
            'post_excerpt' => $item['excerpt'],
            'post_status' => 'publish',
            'post_type' => 'menu_item'
        ));

        if ($post_id) {
            wp_set_post_terms($post_id, $item['category'], 'menu_category');
            
            // Add custom fields
            update_post_meta($post_id, 'menu_item_price', $item['price']);
            update_post_meta($post_id, 'ingredients', $item['ingredients']);
            if (isset($item['dietary_info'])) {
                update_post_meta($post_id, 'dietary_info', $item['dietary_info']);
            }
            update_post_meta($post_id, 'calories', $item['calories']);
            update_post_meta($post_id, 'prep_time', $item['prep_time']);
            
            echo "<p>✓ Created menu item: {$item['title']}</p>";
        }
    }

    echo "<h3>Sample data creation completed!</h3>";
    echo "<p>You can now:</p>";
    echo "<ul>";
    echo "<li>View Services: <a href='" . get_post_type_archive_link('service') . "'>Services Archive</a></li>";
    echo "<li>View FAQs: <a href='" . get_post_type_archive_link('faq') . "'>FAQ Archive</a></li>";
    echo "<li>View Menu: <a href='" . get_post_type_archive_link('menu_item') . "'>Menu Archive</a></li>";
    echo "<li>Add more content in: <a href='" . admin_url('edit.php?post_type=service') . "'>WordPress Admin</a></li>";
    echo "</ul>";
}

// Run the function if accessed directly
if (isset($_GET['create_sample_data']) && $_GET['create_sample_data'] === 'yes') {
    services_pro_create_sample_data();
} else {
    echo "<h2>Sample Data Generator</h2>";
    echo "<p>This script will create sample services, FAQs, and menu items for your website.</p>";
    echo "<p><a href='?create_sample_data=yes' style='background: #0073aa; color: white; padding: 10px 20px; text-decoration: none; border-radius: 3px;'>Create Sample Data</a></p>";
    echo "<p><em>Note: Run this only once to avoid duplicates.</em></p>";
}
?>
