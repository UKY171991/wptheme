<?php
/**
 * Sample Data Generator for Blueprint Folder Pro Theme
 * 
 * Run this once to populate your site with sample content
 * Access via: yoursite.com/?generate_sample_data=1&key=blueprint2024
 * 
 * @package Blueprint_Folder_Pro
 * @version 1.0.0
 */

// Security check
if (!defined('ABSPATH')) {
    exit;
}

// Only run if the specific parameters are set
if (!isset($_GET['generate_sample_data']) || $_GET['generate_sample_data'] !== '1' || 
    !isset($_GET['key']) || $_GET['key'] !== 'blueprint2024') {
    return;
}

// Check if user has admin capabilities
if (!current_user_can('manage_options')) {
    wp_die('Unauthorized access');
}

/**
 * Generate Sample Data
 */
function blueprint_folder_generate_sample_data() {
    echo '<h1>Generating Sample Data for Blueprint Folder Pro</h1>';
    echo '<div style="font-family: Arial, sans-serif; max-width: 800px; margin: 20px auto; padding: 20px;">';

    // Create Service Categories
    echo '<h2>Creating Service Categories...</h2>';
    $service_categories = array(
        'Residential Construction' => 'Home building and residential projects',
        'Commercial Construction' => 'Office buildings and commercial spaces',
        'Remodeling & Renovation' => 'Home improvements and renovations',
        'Electrical Services' => 'Professional electrical work',
        'Plumbing Services' => 'Plumbing installation and repair',
        'Roofing Services' => 'Roof installation and maintenance'
    );

    $created_categories = array();
    foreach ($service_categories as $name => $description) {
        $term = wp_insert_term($name, 'service_category', array(
            'description' => $description,
            'slug' => sanitize_title($name)
        ));
        
        if (!is_wp_error($term)) {
            $created_categories[$name] = $term['term_id'];
            echo "<p>✓ Created category: {$name}</p>";
        } else {
            echo "<p>⚠ Category already exists: {$name}</p>";
            $existing_term = get_term_by('slug', sanitize_title($name), 'service_category');
            if ($existing_term) {
                $created_categories[$name] = $existing_term->term_id;
            }
        }
    }

    // Create Project Categories
    echo '<h2>Creating Project Categories...</h2>';
    $project_categories = array(
        'Residential Projects' => 'Home construction and renovation projects',
        'Commercial Projects' => 'Business and commercial building projects',
        'Industrial Projects' => 'Industrial and warehouse construction',
        'Renovation Projects' => 'Remodeling and renovation work'
    );

    $created_project_categories = array();
    foreach ($project_categories as $name => $description) {
        $term = wp_insert_term($name, 'project_category', array(
            'description' => $description,
            'slug' => sanitize_title($name)
        ));
        
        if (!is_wp_error($term)) {
            $created_project_categories[$name] = $term['term_id'];
            echo "<p>✓ Created project category: {$name}</p>";
        } else {
            echo "<p>⚠ Project category already exists: {$name}</p>";
            $existing_term = get_term_by('slug', sanitize_title($name), 'project_category');
            if ($existing_term) {
                $created_project_categories[$name] = $existing_term->term_id;
            }
        }
    }

    // Create Services
    echo '<h2>Creating Services...</h2>';
    $services = array(
        array(
            'title' => 'Custom Home Construction',
            'content' => 'Build your dream home with our experienced team. We handle everything from foundation to finish, ensuring quality construction that meets your vision and budget.',
            'category' => 'Residential Construction',
            'price_range' => '$200,000 - $800,000',
            'duration' => '6-18 months',
            'icon' => 'fas fa-home',
            'features' => "Custom architectural design\nHigh-quality materials\nExperienced craftsmen\nProject management\nWarranty included"
        ),
        array(
            'title' => 'Kitchen Remodeling',
            'content' => 'Transform your kitchen into a modern, functional space. From cabinets to countertops, we handle every aspect of your kitchen renovation.',
            'category' => 'Remodeling & Renovation',
            'price_range' => '$15,000 - $75,000',
            'duration' => '4-8 weeks',
            'icon' => 'fas fa-utensils',
            'features' => "Custom cabinetry\nCountertop installation\nModern appliances\nLighting design\nFloor installation"
        ),
        array(
            'title' => 'Bathroom Renovation',
            'content' => 'Create a spa-like bathroom retreat with our comprehensive renovation services. Modern fixtures, quality materials, and expert installation.',
            'category' => 'Remodeling & Renovation',
            'price_range' => '$8,000 - $35,000',
            'duration' => '2-6 weeks',
            'icon' => 'fas fa-bath',
            'features' => "Modern fixtures\nTile installation\nCustom vanities\nWaterproofing\nProfessional plumbing"
        ),
        array(
            'title' => 'Commercial Office Build-Out',
            'content' => 'Professional office construction and renovation services. Create productive workspaces that reflect your brand and meet your business needs.',
            'category' => 'Commercial Construction',
            'price_range' => '$50,000 - $500,000',
            'duration' => '2-6 months',
            'icon' => 'fas fa-building',
            'features' => "Space planning\nModular construction\nElectrical systems\nHVAC installation\nSecurity systems"
        ),
        array(
            'title' => 'Electrical Installation & Repair',
            'content' => 'Licensed electricians providing safe, reliable electrical services for residential and commercial properties.',
            'category' => 'Electrical Services',
            'price_range' => '$150 - $5,000',
            'duration' => '1 day - 2 weeks',
            'icon' => 'fas fa-bolt',
            'features' => "Licensed electricians\nCode compliance\nSafety inspections\nEmergency service\n24/7 availability"
        ),
        array(
            'title' => 'Plumbing Services',
            'content' => 'Expert plumbing installation, repair, and maintenance services. From leaky faucets to complete system installations.',
            'category' => 'Plumbing Services',
            'price_range' => '$100 - $8,000',
            'duration' => '2 hours - 1 week',
            'icon' => 'fas fa-wrench',
            'features' => "Emergency repairs\nPipe installation\nFixture replacement\nDrain cleaning\nWater heater service"
        ),
        array(
            'title' => 'Roofing Installation & Repair',
            'content' => 'Protect your property with quality roofing services. New installations, repairs, and maintenance from experienced roofers.',
            'category' => 'Roofing Services',
            'price_range' => '$5,000 - $25,000',
            'duration' => '1-3 weeks',
            'icon' => 'fas fa-hammer',
            'features' => "Quality materials\nWeather protection\nInsulation services\nGutter installation\nWarranty coverage"
        ),
        array(
            'title' => 'Deck & Patio Construction',
            'content' => 'Extend your living space outdoors with custom decks and patios. Quality construction using durable materials.',
            'category' => 'Residential Construction',
            'price_range' => '$3,000 - $20,000',
            'duration' => '1-3 weeks',
            'icon' => 'fas fa-tree',
            'features' => "Custom designs\nDurable materials\nProper drainage\nRailing installation\nWeatherproofing"
        )
    );

    foreach ($services as $service_data) {
        $post_id = wp_insert_post(array(
            'post_title' => $service_data['title'],
            'post_content' => $service_data['content'],
            'post_status' => 'publish',
            'post_type' => 'service',
            'post_author' => 1
        ));

        if ($post_id) {
            // Add to category
            if (isset($created_categories[$service_data['category']])) {
                wp_set_post_terms($post_id, array($created_categories[$service_data['category']]), 'service_category');
            }

            // Add meta data
            update_post_meta($post_id, '_service_price_range', $service_data['price_range']);
            update_post_meta($post_id, '_service_duration', $service_data['duration']);
            update_post_meta($post_id, '_service_icon', $service_data['icon']);
            update_post_meta($post_id, '_service_features', $service_data['features']);

            echo "<p>✓ Created service: {$service_data['title']}</p>";
        }
    }

    // Create Testimonials
    echo '<h2>Creating Testimonials...</h2>';
    $testimonials = array(
        array(
            'title' => 'Outstanding Kitchen Renovation',
            'content' => 'The team at Blueprint Folder exceeded our expectations with our kitchen renovation. The attention to detail and quality of work was exceptional. Our new kitchen is exactly what we dreamed of!',
            'client_name' => 'Sarah Johnson',
            'client_position' => 'Homeowner',
            'client_company' => 'Residential Client',
            'rating' => '5'
        ),
        array(
            'title' => 'Professional Commercial Build-Out',
            'content' => 'Working with Blueprint Folder on our office renovation was a great experience. They completed the project on time and within budget. The quality of work speaks for itself.',
            'client_name' => 'Michael Chen',
            'client_position' => 'CEO',
            'client_company' => 'Tech Solutions Inc.',
            'rating' => '5'
        ),
        array(
            'title' => 'Reliable Electrical Service',
            'content' => 'Quick response time and professional service. They diagnosed and fixed our electrical issues efficiently. Will definitely use their services again.',
            'client_name' => 'David Rodriguez',
            'client_position' => 'Property Manager',
            'client_company' => 'Downtown Properties',
            'rating' => '4'
        ),
        array(
            'title' => 'Beautiful Custom Home',
            'content' => 'Our custom home construction was handled with great care and attention to detail. The team was professional throughout the entire process.',
            'client_name' => 'Emily Williams',
            'client_position' => 'Homeowner',
            'client_company' => 'Residential Client',
            'rating' => '5'
        )
    );

    foreach ($testimonials as $testimonial_data) {
        $post_id = wp_insert_post(array(
            'post_title' => $testimonial_data['title'],
            'post_content' => $testimonial_data['content'],
            'post_status' => 'publish',
            'post_type' => 'testimonial',
            'post_author' => 1
        ));

        if ($post_id) {
            update_post_meta($post_id, '_testimonial_client_name', $testimonial_data['client_name']);
            update_post_meta($post_id, '_testimonial_client_position', $testimonial_data['client_position']);
            update_post_meta($post_id, '_testimonial_client_company', $testimonial_data['client_company']);
            update_post_meta($post_id, '_testimonial_rating', $testimonial_data['rating']);

            echo "<p>✓ Created testimonial: {$testimonial_data['title']}</p>";
        }
    }

    // Create Pricing Plans
    echo '<h2>Creating Pricing Plans...</h2>';
    $pricing_plans = array(
        array(
            'title' => 'Basic Consultation',
            'content' => 'Perfect for small projects and initial planning. Get expert advice and project estimates.',
            'price' => '$99',
            'billing_period' => 'per consultation',
            'features' => "Site visit and assessment\nProject consultation\nBasic cost estimate\nInitial design concepts\nTimeline planning",
            'button_text' => 'Book Consultation',
            'button_url' => '/contact',
            'is_featured' => false
        ),
        array(
            'title' => 'Standard Project',
            'content' => 'Ideal for medium-sized renovations and construction projects with comprehensive service.',
            'price' => '$2,500',
            'billing_period' => 'project start fee',
            'features' => "Complete project planning\nDetailed cost estimates\nProject management\nQuality materials\nProgress reports\n6-month warranty",
            'button_text' => 'Get Started',
            'button_url' => '/contact',
            'is_featured' => true
        ),
        array(
            'title' => 'Premium Package',
            'content' => 'For large construction projects requiring full-service management and premium materials.',
            'price' => '$5,000',
            'billing_period' => 'project start fee',
            'features' => "Full-service project management\nPremium materials\nCustom design services\nDedicated project manager\nWeekly progress reports\n2-year warranty\nPost-completion support",
            'button_text' => 'Contact Us',
            'button_url' => '/contact',
            'is_featured' => false
        )
    );

    foreach ($pricing_plans as $index => $plan_data) {
        $post_id = wp_insert_post(array(
            'post_title' => $plan_data['title'],
            'post_content' => $plan_data['content'],
            'post_status' => 'publish',
            'post_type' => 'pricing_plan',
            'post_author' => 1,
            'menu_order' => $index + 1
        ));

        if ($post_id) {
            update_post_meta($post_id, '_pricing_price', $plan_data['price']);
            update_post_meta($post_id, '_pricing_billing_period', $plan_data['billing_period']);
            update_post_meta($post_id, '_pricing_features', $plan_data['features']);
            update_post_meta($post_id, '_pricing_button_text', $plan_data['button_text']);
            update_post_meta($post_id, '_pricing_button_url', $plan_data['button_url']);
            update_post_meta($post_id, '_pricing_is_featured', $plan_data['is_featured'] ? 1 : 0);

            echo "<p>✓ Created pricing plan: {$plan_data['title']}</p>";
        }
    }

    // Create Sample Projects
    echo '<h2>Creating Sample Projects...</h2>';
    $projects = array(
        array(
            'title' => 'Modern Family Home',
            'content' => 'A beautiful 3,500 sq ft modern family home featuring open floor plans, high-end finishes, and energy-efficient systems.',
            'category' => 'Residential Projects',
            'client' => 'The Johnson Family',
            'completion_date' => '2024-03-15',
            'project_url' => '',
            'technologies' => 'Smart home systems, Energy-efficient HVAC, Solar panels, High-performance windows'
        ),
        array(
            'title' => 'Downtown Office Complex',
            'content' => 'A 50,000 sq ft office complex featuring modern amenities, flexible workspaces, and sustainable building practices.',
            'category' => 'Commercial Projects',
            'client' => 'Metro Business Group',
            'completion_date' => '2024-01-20',
            'project_url' => '',
            'technologies' => 'Advanced security systems, Smart building automation, LED lighting, High-speed networking'
        ),
        array(
            'title' => 'Historic Home Renovation',
            'content' => 'Complete renovation of a 1920s historic home, preserving original character while adding modern conveniences.',
            'category' => 'Renovation Projects',
            'client' => 'Heritage Properties LLC',
            'completion_date' => '2023-11-30',
            'project_url' => '',
            'technologies' => 'Historical restoration techniques, Modern electrical systems, Updated plumbing, Insulation upgrade'
        ),
        array(
            'title' => 'Manufacturing Facility',
            'content' => 'Construction of a 75,000 sq ft manufacturing facility with specialized equipment areas and office space.',
            'category' => 'Industrial Projects',
            'client' => 'Industrial Solutions Corp',
            'completion_date' => '2023-09-10',
            'project_url' => '',
            'technologies' => 'Heavy-duty electrical systems, Industrial HVAC, Specialized flooring, Safety systems'
        )
    );

    foreach ($projects as $project_data) {
        $post_id = wp_insert_post(array(
            'post_title' => $project_data['title'],
            'post_content' => $project_data['content'],
            'post_status' => 'publish',
            'post_type' => 'project',
            'post_author' => 1
        ));

        if ($post_id) {
            // Add to category
            if (isset($created_project_categories[$project_data['category']])) {
                wp_set_post_terms($post_id, array($created_project_categories[$project_data['category']]), 'project_category');
            }

            update_post_meta($post_id, '_project_client', $project_data['client']);
            update_post_meta($post_id, '_project_completion_date', $project_data['completion_date']);
            update_post_meta($post_id, '_project_url', $project_data['project_url']);
            update_post_meta($post_id, '_project_technologies', $project_data['technologies']);

            echo "<p>✓ Created project: {$project_data['title']}</p>";
        }
    }

    // Create Team Members
    echo '<h2>Creating Team Members...</h2>';
    $team_members = array(
        array(
            'title' => 'John Smith',
            'content' => 'With over 20 years of experience in construction management, John leads our team with expertise in both residential and commercial projects.',
            'position' => 'Project Manager',
            'email' => 'john@blueprintfolder.com',
            'phone' => '(555) 123-4567',
            'linkedin' => 'https://linkedin.com/in/johnsmith',
            'twitter' => ''
        ),
        array(
            'title' => 'Sarah Davis',
            'content' => 'Licensed electrician with 15 years of experience. Sarah ensures all electrical work meets the highest safety standards.',
            'position' => 'Master Electrician',
            'email' => 'sarah@blueprintfolder.com',
            'phone' => '(555) 123-4568',
            'linkedin' => 'https://linkedin.com/in/sarahdavis',
            'twitter' => ''
        ),
        array(
            'title' => 'Mike Wilson',
            'content' => 'Expert carpenter and project foreman with a passion for quality craftsmanship and attention to detail.',
            'position' => 'Lead Carpenter',
            'email' => 'mike@blueprintfolder.com',
            'phone' => '(555) 123-4569',
            'linkedin' => '',
            'twitter' => ''
        )
    );

    foreach ($team_members as $member_data) {
        $post_id = wp_insert_post(array(
            'post_title' => $member_data['title'],
            'post_content' => $member_data['content'],
            'post_status' => 'publish',
            'post_type' => 'team_member',
            'post_author' => 1
        ));

        if ($post_id) {
            update_post_meta($post_id, '_team_member_position', $member_data['position']);
            update_post_meta($post_id, '_team_member_email', $member_data['email']);
            update_post_meta($post_id, '_team_member_phone', $member_data['phone']);
            update_post_meta($post_id, '_team_member_linkedin', $member_data['linkedin']);
            update_post_meta($post_id, '_team_member_twitter', $member_data['twitter']);

            echo "<p>✓ Created team member: {$member_data['title']}</p>";
        }
    }

    // Flush rewrite rules
    flush_rewrite_rules();

    echo '<h2 style="color: green;">✓ Sample Data Generation Complete!</h2>';
    echo '<p>All sample content has been created successfully. You can now view your:</p>';
    echo '<ul>';
    echo '<li><a href="' . admin_url('edit.php?post_type=service') . '">Services</a></li>';
    echo '<li><a href="' . admin_url('edit.php?post_type=testimonial') . '">Testimonials</a></li>';
    echo '<li><a href="' . admin_url('edit.php?post_type=pricing_plan') . '">Pricing Plans</a></li>';
    echo '<li><a href="' . admin_url('edit.php?post_type=project') . '">Projects</a></li>';
    echo '<li><a href="' . admin_url('edit.php?post_type=team_member') . '">Team Members</a></li>';
    echo '<li><a href="' . admin_url('edit-tags.php?taxonomy=service_category&post_type=service') . '">Service Categories</a></li>';
    echo '<li><a href="' . admin_url('edit-tags.php?taxonomy=project_category&post_type=project') . '">Project Categories</a></li>';
    echo '</ul>';

    echo '</div>';
}

// Run the sample data generation
blueprint_folder_generate_sample_data();
