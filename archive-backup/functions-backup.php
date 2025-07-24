<?php
/**
 * Services Pro Theme Functions
 */

// Theme setup
function services_pro_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo');
    add_theme_support('customize-selective-refresh-widgets');

    // Register enhanced navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'services-pro'),
        'footer' => esc_html__('Footer Menu', 'services-pro'),
        'services-menu' => esc_html__('Services Menu', 'services-pro'),
        'mobile-menu' => esc_html__('Mobile Menu', 'services-pro'),
    ));

    // Add custom image sizes
    add_image_size('service-thumbnail', 300, 200, true);
    add_image_size('hero-image', 1200, 600, true);
    add_image_size('menu-icon', 50, 50, true);
}
add_action('after_setup_theme', 'services_pro_setup');

// Include clean navigation walker (check if function doesn't already exist)
if (!function_exists('clean_navigation_fallback')) {
    require_once get_template_directory() . '/inc/clean-navigation-walker.php';
}

// Theme activation hook - removed theme-init.php dependency
// add_action('after_switch_theme', 'service_blueprint_theme_activation');

/**
 * Simple theme setup function (replaced complex theme-init)
 */
function services_pro_simple_setup() {
    // Create a basic navigation menu if none exists
    $menu_name = 'Primary Menu';
    $menu_exists = wp_get_nav_menu_object($menu_name);
    
    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);
        
        if (!is_wp_error($menu_id)) {
            // Add basic menu items
            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => 'Home',
                'menu-item-url' => home_url('/'),
                'menu-item-status' => 'publish',
                'menu-item-type' => 'custom'
            ));
            
            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => 'About',
                'menu-item-url' => home_url('/about'),
                'menu-item-status' => 'publish',
                'menu-item-type' => 'custom'
            ));
            
            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => 'Services',
                'menu-item-url' => home_url('/services'),
                'menu-item-status' => 'publish',
                'menu-item-type' => 'custom'
            ));
            
            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' => 'Contact',
                'menu-item-url' => home_url('/contact'),
                'menu-item-status' => 'publish',
                'menu-item-type' => 'custom'
            ));
            
            // Assign to primary location
            $locations = get_theme_mod('nav_menu_locations');
            $locations['primary'] = $menu_id;
            set_theme_mod('nav_menu_locations', $locations);
        }
    }
}

// Run setup on theme activation
add_action('after_switch_theme', 'services_pro_simple_setup');

/**
 * Add admin menu for manual theme setup
 */
function services_pro_admin_menu() {
    add_theme_page(
        'Theme Setup',
        'Theme Setup',
        'manage_options',
        'services-pro-setup',
        'services_pro_setup_page'
    );
}
add_action('admin_menu', 'services_pro_admin_menu');

/**
 * Simple theme setup admin page
 */
function services_pro_setup_page() {
    if (isset($_POST['setup_theme']) && wp_verify_nonce($_POST['setup_nonce'], 'setup_theme_action')) {
        services_pro_simple_setup();
        echo '<div class="notice notice-success"><p>Theme setup completed successfully!</p></div>';
    }
    ?>
    <div class="wrap">
        <h1>Services Pro Theme Setup</h1>
        <p>Click the button below to set up the navigation menu.</p>
        <form method="post">
            <?php wp_nonce_field('setup_theme_action', 'setup_nonce'); ?>
            <input type="submit" name="setup_theme" class="button button-primary" value="Setup Navigation Menu">
        </form>
    </div>
    <?php
}

// Enqueue scripts and styles
function services_pro_scripts() {
    // Main theme stylesheet (loads global-styles.css via @import)
    wp_enqueue_style('services-pro-style', get_stylesheet_uri(), array(), '2.0.0');
    
    // Load Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap');
    
    // Load Font Awesome for icons
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0');
    
    // Essential JavaScript
    wp_enqueue_script('services-pro-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '2.0.0', true);
    
    // Emergency navigation fix CSS (high priority)
    wp_enqueue_style('emergency-nav-fix', get_template_directory_uri() . '/emergency-nav-fix.css', array('services-pro-style'), '1.0.0');
    
    // Load specific JavaScript for enhanced functionality
    if (is_front_page()) {
        wp_enqueue_script('home-page-header-js', get_template_directory_uri() . '/js/home-page-header.js', array('jquery'), '1.0.0', true);
    }
    
    if (is_page_template('page-pricing.php') || is_page('pricing')) {
        wp_enqueue_script('pricing-calculator-js', get_template_directory_uri() . '/js/pricing-calculator.js', array('jquery'), '1.0.0', true);
    }
}
add_action('wp_enqueue_scripts', 'services_pro_scripts');

/**
 * Add navigation-specific body classes for better styling control
 */
function services_pro_navigation_body_classes($classes) {
    // Add class if a menu is assigned to primary location
    if (has_nav_menu('primary')) {
        $classes[] = 'has-primary-menu';
    }
    
    // Add clean header class
    $classes[] = 'clean-header-menu';
    
    return $classes;
}
add_filter('body_class', 'services_pro_navigation_body_classes');

/**
 * Add structured data for navigation menu
 */
function services_pro_navigation_schema() {
    if (has_nav_menu('primary')) {
        $menu_locations = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object($menu_locations['primary']);
        
        if ($menu) {
            $menu_items = wp_get_nav_menu_items($menu->term_id);
            $schema_items = array();
            
            foreach ($menu_items as $item) {
                if ($item->menu_item_parent == 0) { // Only top-level items
                    $schema_items[] = array(
                        '@type' => 'SiteNavigationElement',
                        'name' => $item->title,
                        'url' => $item->url
                    );
                }
            }
            
            $schema = array(
                '@context' => 'https://schema.org',
                '@type' => 'SiteNavigationElement',
                'name' => 'Primary Navigation',
                'hasPart' => $schema_items
            );
            
            echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES) . '</script>';
        }
    }
}
add_action('wp_head', 'services_pro_navigation_schema');

/**
 * Enhanced menu walker registration for better WordPress integration
 */
function services_pro_register_menu_walker() {
    // The Enhanced_Walker_Nav_Menu class is now defined in header.php
    // This function ensures it's available when needed
}
add_action('init', 'services_pro_register_menu_walker');

/**
 * Create dummy blog posts for testing (admin only)
 */
function create_dummy_blog_posts() {
    if (!current_user_can('manage_options')) {
        return;
    }

    // Include the dummy posts creator
    require_once get_template_directory() . '/create-dummy-posts.php';
    
    // Define the constant to trigger post creation
    if (!defined('CREATE_DUMMY_POSTS')) {
        define('CREATE_DUMMY_POSTS', true);
    }
}

// Add admin menu item to create dummy posts
function add_dummy_posts_admin_menu() {
    add_theme_page(
        'Create Dummy Posts',
        'Create Dummy Posts',
        'manage_options',
        'create-dummy-posts',
        'dummy_posts_admin_page'
    );
}
add_action('admin_menu', 'add_dummy_posts_admin_menu');

function dummy_posts_admin_page() {
    if (isset($_POST['create_posts'])) {
        create_dummy_blog_posts();
        echo '<div class="notice notice-success"><p>Dummy posts created successfully!</p></div>';
    }
    ?>
    <div class="wrap">
        <h1>Create Dummy Blog Posts</h1>
        <p>This will create sample blog posts for testing your blog layout.</p>
        <form method="post">
            <?php wp_nonce_field('create_dummy_posts_action', 'create_dummy_posts_nonce'); ?>
            <input type="submit" name="create_posts" class="button button-primary" value="Create Dummy Posts">
        </form>
    </div>
    <?php
}

/**
 * Get service categories with detailed information for the services page
 * Updated structure to match new 9-category system
 */
function get_service_categories() {
    return array(
        '🧹 Home & Cleaning Services' => array(
            'name' => '🧹 Home & Cleaning Services',
            'slug' => 'home-cleaning',
            'description' => 'Professional cleaning solutions for every area of your home',
            'services' => array(
                'House cleaning' => array(
                    'description' => 'Our comprehensive house cleaning service provides a thorough deep clean for your entire home. We dust, vacuum, mop, sanitize bathrooms and kitchens, and ensure your living spaces are fresh and spotless.',
                    'price' => 'From $150',
                    'duration' => '2-5 hours',
                    'features' => "All rooms cleaned and sanitized\nDusting of all surfaces\nVacuuming all floors\nKitchen appliance cleaning\nBathroom disinfection\nWindow sill cleaning"
                ),
                'Move-in/move-out cleaning' => array(
                    'description' => 'Our move-in/move-out cleaning service prepares your property for new occupants or helps you leave your current residence spotless. We provide deep cleaning for all surfaces, appliances, cabinets, and fixtures to meet landlord requirements.',
                    'price' => 'From $250',
                    'duration' => '4-8 hours',
                    'features' => "Deep cleaning of all rooms\nInside cabinet cleaning\nAppliance interior/exterior cleaning\nWall spot cleaning\nBaseboard and trim dusting\nFloor deep cleaning"
                ),
                'Pressure washing' => array(
                    'description' => 'Our pressure washing service removes stubborn dirt, grime, mold, and mildew from your exterior surfaces. We use professional-grade equipment to restore the appearance of driveways, walkways, decks, patios, and siding.',
                    'price' => 'From $150',
                    'duration' => '2-4 hours',
                    'features' => "Professional-grade equipment\nSafe cleaning solutions\nDriveway and walkway cleaning\nDeck and patio restoration\nSiding cleaning\nFence cleaning"
                ),
                'Gutter cleaning' => array(
                    'description' => 'Our gutter cleaning service removes leaves, debris, and blockages from your gutter system. We clear downspouts and ensure proper water flow to prevent water damage to your home\'s foundation, walls, and landscaping.',
                    'price' => 'From $129',
                    'duration' => '1-3 hours',
                    'features' => "Complete debris removal\nDownspout clearing\nGutter flushing\nMinor adjustments\nDebris bagging and removal\nInspection for damages"
                ),
                'Window cleaning' => array(
                    'description' => 'Our professional window cleaning service leaves your windows crystal clear, inside and out. We remove dirt, smudges, and water spots using specialized tools and solutions for a streak-free finish that maximizes natural light.',
                    'price' => 'From $120',
                    'duration' => '2-5 hours',
                    'features' => "Interior and exterior cleaning\nScreen wiping\nTrack cleaning\nSill and frame wiping\nStain removal\nStreak-free finish"
                ),
                'Carpet shampooing' => array(
                    'description' => 'Our carpet shampooing service deep cleans your carpets to remove embedded dirt, stains, allergens, and odors. We use professional equipment and safe cleaning solutions to rejuvenate your carpets and extend their lifespan.',
                    'price' => 'From $0.25/sq ft',
                    'duration' => '2-4 hours',
                    'features' => "Pre-treatment of stains\nDeep soil extraction\nQuick drying process\nOdor elimination\nAllergy reduction\nNo harsh chemicals"
                ),
                'Garage/attic organization' => array(
                    'description' => 'Our garage and attic organization service transforms your cluttered spaces into functional, organized areas. We sort, categorize, and implement storage solutions that maximize your space and make items easily accessible.',
                    'price' => 'From $250',
                    'duration' => '4-8 hours',
                    'features' => "Complete item sorting\nDonation/disposal coordination\nStorage system recommendations\nSpace optimization\nLabeling systems\nMaintenance plans"
                ),
                'Trash hauling & junk removal' => array(
                    'description' => 'Our junk removal service clears unwanted items from your home, yard, or business. We handle the heavy lifting and proper disposal of furniture, appliances, yard waste, and general debris, leaving your space clean and clear.',
                    'price' => 'From $150',
                    'duration' => '1-4 hours',
                    'features' => "Heavy item removal\nResponsible disposal\nRecycling when possible\nDonation coordination\nProperty protection\nComplete area cleanup"
                ),
                'Airbnb cleaning & reset services' => array(
                    'description' => 'Our Airbnb cleaning and reset service prepares your rental property for the next guest. We provide thorough cleaning, fresh linens, restocked amenities, and property checks to ensure everything is perfect for your guests\' arrival.',
                    'price' => 'From $100',
                    'duration' => '2-4 hours',
                    'features' => "Complete sanitization\nFresh linens and towels\nAmenity restocking\nKitchen and bath deep cleaning\nTrash removal\nProperty damage inspection"
                ),
                'Lawn mowing and yard maintenance' => array(
                    'description' => 'Keep your outdoor space looking its best with our professional lawn mowing and yard maintenance service. We provide precise cutting, edging, and trimming to enhance your property\'s curb appeal, along with seasonal cleanup and maintenance.',
                    'price' => 'From $49',
                    'duration' => '1-3 hours',
                    'features' => "Professional-grade equipment\nPrecision cutting and edging\nDebris cleanup and removal\nWeed trimming\nRegular maintenance schedules available\nSeasonal services available"
                )
            )
        ),
        '🧰 Home & Property Maintenance' => array(
            'name' => '🧰 Home & Property Maintenance',
            'slug' => 'home-maintenance',
            'description' => 'Expert maintenance services to keep your property in perfect condition',
            'services' => array(
                'Furniture assembly' => array(
                    'description' => 'Our furniture assembly service takes the frustration out of putting together your new purchases. We expertly assemble items from any store, following manufacturer instructions precisely for safe, sturdy, and correct assembly.',
                    'price' => 'From $75',
                    'duration' => '1-3 hours',
                    'features' => "Assembly of any brand\nTool provision\nPackaging disposal\nPlacement assistance\nQuality inspection\nSame-day service available"
                ),
                'TV mounting' => array(
                    'description' => 'Our TV mounting service securely installs your television on the wall, hiding cables for a clean look. We ensure proper height, angle, and secure attachment to studs, with options for complex installations including component shelving.',
                    'price' => 'From $99',
                    'duration' => '1-2 hours',
                    'features' => "Secure stud mounting\nCable management\nEquipment leveling\nMultiple mounts available\nComponent setup\nMounting hardware included"
                ),
                'Handyman services (minor, non-structural repairs)' => array(
                    'description' => 'Our handyman service handles a wide range of minor home repairs and maintenance tasks. From fixing leaky faucets to patching drywall, we provide skilled solutions to keep your home in excellent condition.',
                    'price' => 'From $75/hour',
                    'duration' => 'Varies',
                    'features' => "Minor plumbing repairs\nDrywall patching\nFurniture repair\nDoor adjustment\nWeatherstripping\nFixture replacement"
                ),
                'Fence painting' => array(
                    'description' => 'Our fence painting service revitalizes your fence with thorough preparation and quality paint or stain application. We clean, sand, prime, and apply durable finishes that protect your fence from the elements and enhance your property\'s appearance.',
                    'price' => 'From $2/linear foot',
                    'duration' => '1-3 days',
                    'features' => "Surface preparation\nQuality paints and stains\nThorough coverage\nEdge detailing\nWeather-resistant finishes\nEnvironmentally safe practices"
                ),
                'Light bulb/fixture installation' => array(
                    'description' => 'Our light fixture installation service safely replaces or installs new lighting in your home. We handle everything from simple bulb replacements to complete fixture installations, ensuring proper wiring and secure mounting.',
                    'price' => 'From $50',
                    'duration' => '30-90 minutes',
                    'features' => "Safe electrical handling\nFixture assembly\nSecure mounting\nOld fixture removal\nLight bulb provision\nFunction testing"
                ),
                'Basic drywall patching' => array(
                    'description' => 'Our drywall patching service repairs holes, cracks, and dents in your walls for a smooth, seamless finish. We match textures and prepare the surface for painting, restoring your walls to like-new condition.',
                    'price' => 'From $100',
                    'duration' => '1-3 hours',
                    'features' => "Hole and crack repair\nTexture matching\nSurface preparation\nSmooth finishing\nDust containment\nPaint-ready results"
                ),
                'Mailbox installation' => array(
                    'description' => 'Our mailbox installation service replaces damaged mailboxes or installs new ones according to postal regulations. We ensure proper height, secure mounting, and correct positioning for mail carrier access and curbside appeal.',
                    'price' => 'From $85',
                    'duration' => '1-2 hours',
                    'features' => "USPS compliant installation\nSecure mounting\nLevel positioning\nNew hardware\nOld mailbox removal\nWeatherproof sealing"
                ),
                'Holiday light hanging' => array(
                    'description' => 'Create a festive display with our holiday light installation service. We safely and professionally install your holiday lights on rooflines, trees, and other exterior features, creating a beautiful display without the risk and hassle of doing it yourself.',
                    'price' => 'From $199',
                    'duration' => '2-6 hours',
                    'features' => "Safe installation practices\nCustom lighting designs\nRoofline, tree, and yard displays\nTimer installation available\nPost-season removal service\nLight testing and maintenance"
                ),
                'Lockout assistance (not locksmithing)' => array(
                    'description' => 'Our lockout assistance service helps when you\'re locked out of your home and need non-destructive entry methods. While we don\'t provide locksmithing services, we can help with accessible entry points and emergency solutions to get you back inside.',
                    'price' => 'From $79',
                    'duration' => '30-60 minutes',
                    'features' => "Quick response times\nNon-destructive entry methods\nEmergency assistance\n24/7 availability\nLocal service providers\nPreventative recommendations"
                ),
                'Pool cleaning' => array(
                    'description' => 'Keep your pool sparkling clean with our comprehensive pool cleaning service. We remove debris, vacuum the pool floor, clean skimmers and filters, test and balance water chemistry, and ensure all equipment is functioning properly.',
                    'price' => 'From $99',
                    'duration' => '1-2 hours',
                    'features' => "Surface skimming\nVacuuming\nFilter cleaning\nWater testing\nChemical balancing\nEquipment inspection"
                )
            )
        ),
        '🛍️ Personal Errands & Concierge' => array(
            'name' => '🛍️ Personal Errands & Concierge',
            'slug' => 'personal-errands',
            'description' => 'Convenient personal assistance services to save you time and effort',
            'services' => array(
                'Grocery shopping/delivery' => array(
                    'description' => 'Our grocery shopping and delivery service saves you time and hassle. We carefully select fresh produce and quality items from your preferred stores, following your detailed shopping list, and deliver everything right to your door.',
                    'price' => 'From $35',
                    'duration' => '1-2 hours',
                    'features' => "Personalized shopping from your list\nFresh produce selection\nSpecific brand preferences honored\nSame-day service available\nContactless delivery options\nReceipt and change provided"
                ),
                'Prescription pickup' => array(
                    'description' => 'Our prescription pickup service provides a convenient solution when you can\'t make it to the pharmacy. We collect your ready prescriptions and deliver them directly to your door, maintaining privacy and ensuring you have the medications you need.',
                    'price' => 'From $25',
                    'duration' => '30-60 minutes',
                    'features' => "Secure prescription handling\nConfidential service\nVerification protocols\nSame-day service available\nMultiple pharmacy pickups\nContactless delivery options"
                ),
                'Waiting-in-line service' => array(
                    'description' => 'Our waiting-in-line service saves you valuable time by having our representative wait in lines for you. Whether it\'s for concert tickets, limited releases, government offices, or popular restaurants, we\'ll hold your place so you can arrive when it matters.',
                    'price' => 'From $25/hour',
                    'duration' => 'As needed',
                    'features' => "Professional line-waiting representatives\nRegular updates while waiting\nSecure handoff protocols\nAdvance booking available\nWaiting for any service or event\nEarly morning/overnight options available"
                ),
                'Personal assistant service' => array(
                    'description' => 'Our personal assistant service provides an extra pair of hands to help with your to-do list and daily tasks. From organizing appointments to running errands, we help you manage your busy schedule and accomplish more each day.',
                    'price' => 'From $30/hour',
                    'duration' => 'As needed',
                    'features' => "Schedule management\nErrand running\nAppointment booking\nBasic organization\nEvent planning assistance\nCustomized task management"
                ),
                'Moving assistance (loading/unloading, not truck rental)' => array(
                    'description' => 'Our moving assistance service provides the extra muscle you need on moving day. We carefully load and unload your belongings, helping with furniture disassembly/assembly, and proper placement of items in your new space.',
                    'price' => 'From $35/hour per helper',
                    'duration' => '2-8 hours',
                    'features' => "Heavy lifting assistance\nCareful handling of belongings\nFurniture disassembly/assembly\nLoading and unloading\nProfessional equipment\nExperienced moving personnel"
                ),
                'Courier/delivery services' => array(
                    'description' => 'Our courier service provides reliable, prompt delivery of documents, packages, and items within your local area. We offer secure handling and timely delivery for business or personal needs when standard shipping isn\'t fast enough.',
                    'price' => 'From $20',
                    'duration' => 'Same day',
                    'features' => "Secure document/package handling\nTracking updates\nSignature confirmation\nRush delivery options\nScheduled pickups\nProfessional couriers"
                ),
                'Dog waste cleanup' => array(
                    'description' => 'Our dog waste cleanup service keeps your yard clean and sanitary. We thoroughly remove all pet waste from your property, dispose of it properly, and provide regular maintenance to keep your outdoor spaces pleasant and hygienic.',
                    'price' => 'From $15/visit',
                    'duration' => '15-30 minutes',
                    'features' => "Complete yard inspection\nThorough waste removal\nProper disposal methods\nDeodorizing treatments available\nWeekly/bi-weekly schedules\nOne-time cleanup options"
                ),
                'Packing/unpacking service' => array(
                    'description' => 'Our packing and unpacking service takes the stress out of moving. We carefully pack your belongings using proper materials and techniques, then unpack and organize items in your new home, making your transition smooth and efficient.',
                    'price' => 'From $40/hour',
                    'duration' => 'Varies',
                    'features' => "Professional packing materials\nCareful item wrapping\nBox labeling and inventory\nSystematic unpacking\nBasic organization\nPacking material removal"
                ),
                'Decluttering service' => array(
                    'description' => 'Our decluttering service transforms your overwhelming spaces into organized, functional areas. We work with you to sort items, create organizational systems, and implement solutions that maintain order and reduce stress.',
                    'price' => 'From $45/hour',
                    'duration' => '3-8 hours',
                    'features' => "Personalized organization plans\nItem sorting and categorizing\nDonation coordination\nStorage solutions\nMaintenance strategies\nClutter prevention techniques"
                ),
                'Plant watering (for traveling homeowners)' => array(
                    'description' => 'Our plant care service ensures your indoor and outdoor plants thrive while you\'re away. We provide customized watering, monitoring for pests or issues, adjusting for light conditions, and sending photo updates so you can travel with peace of mind.',
                    'price' => 'From $25/visit',
                    'duration' => '30-60 minutes per visit',
                    'features' => "Customized watering schedules\nIndoor and outdoor plant care\nPhoto updates of your plants\nBasic pruning and maintenance\nPest monitoring\nAdjusting for weather conditions"
                )
            )
        ),
        '🐶 Pet & Animal Services' => array(
            'name' => '🐶 Pet & Animal Services',
            'slug' => 'pet-services',
            'description' => 'Loving care and professional services for your beloved pets',
            'services' => array(
                'Dog walking' => array(
                    'description' => 'Our professional dog walking service provides your furry friend with exercise, stimulation, and relief while you\'re away. Our experienced walkers follow your specified routes and routines, sending updates and ensuring your dog returns home happy and tired.',
                    'price' => 'From $20/30-min walk',
                    'duration' => '30-60 minutes',
                    'features' => "GPS tracked walks\nScheduled relief breaks\nFresh water refills\nTreat giving (if permitted)\nDetailed visit reports\nFlexible scheduling options"
                ),
                'Pet sitting' => array(
                    'description' => 'Our in-home pet sitting service provides loving care for your pets in the comfort of their familiar environment while you\'re away. We follow your care instructions exactly, providing feeding, exercise, medication, playtime, and plenty of attention and affection.',
                    'price' => 'From $30/visit',
                    'duration' => '30-60 minutes per visit',
                    'features' => "In-home care in pet\'s environment\nFeeding and water refreshing\nMedication administration\nLitter box/waste cleanup\nExercise and playtime\nDaily updates and photos"
                ),
                'Mobile pet grooming (if not cutting hair professionally)' => array(
                    'description' => 'Our mobile pet grooming service brings convenience to you and comfort to your pet. We provide basic grooming services including bathing, brush-outs, nail trimming, ear cleaning, and more, all in the familiar environment of your home.',
                    'price' => 'From $60',
                    'duration' => '1-2 hours',
                    'features' => "No transportation stress for pets\nGentle handling techniques\nAll-natural products available\nBasic grooming services\nBreed-specific approaches\nComfortable home environment"
                ),
                'Pet poop scooping service' => array(
                    'description' => 'Our pet waste removal service keeps your yard clean and safe. We thoroughly clean your property, removing all pet waste, which helps prevent the spread of bacteria and parasites while keeping your outdoor spaces pleasant for everyone.',
                    'price' => 'From $15/week',
                    'duration' => '15-30 minutes',
                    'features' => "Weekly or bi-weekly service\nComplete yard inspection\nThorough waste removal\nProper disposal methods\nGate code/key security\nService regardless of weather"
                ),
                'Pet taxi (transporting pets to vet/groomer)' => array(
                    'description' => 'Our pet taxi service provides safe, reliable transportation for your pets to veterinary appointments, grooming sessions, or other destinations. We use secure carriers and provide calm, attentive care during transit.',
                    'price' => 'From $35 one-way',
                    'duration' => 'Varies',
                    'features' => "Safe, climate-controlled vehicles\nSecure carriers provided\nPick-up and drop-off service\nWaiting service available\nAppointment assistance\nPet comfort prioritized"
                ),
                'Aquarium cleaning' => array(
                    'description' => 'Our aquarium maintenance service keeps your underwater environment healthy and beautiful. We clean tanks, replace water, service filters and equipment, test water parameters, and ensure your aquatic pets have the optimal environment.',
                    'price' => 'From $50',
                    'duration' => '1-2 hours',
                    'features' => "Glass/acrylic cleaning\nGravel vacuuming\nWater testing and treatment\nFilter maintenance\nEquipment inspection\nDécor cleaning"
                ),
                'Pet yard deodorizing' => array(
                    'description' => 'Our pet yard deodorizing service eliminates unpleasant odors caused by pet waste. We apply pet-safe, environmentally friendly treatments that neutralize odors at the source rather than masking them, making your outdoor spaces fresh and enjoyable again.',
                    'price' => 'From $75',
                    'duration' => '1-2 hours',
                    'features' => "Pet-safe, eco-friendly solutions\nComprehensive yard treatment\nOdor neutralization (not masking)\nPrevents future odor buildup\nWorks on multiple surfaces\nNo harsh chemicals"
                )
            )
        ),
        '👶 Child & Family Support' => array(
            'name' => '👶 Child & Family Support',
            'slug' => 'family-support',
            'description' => 'Reliable childcare and family assistance services for busy parents',
            'services' => array(
                'Parent helper/mother\'s helper' => array(
                    'description' => 'Our parent helper service provides an extra set of hands around the house while you\'re home but need assistance. We help with light childcare, meal prep, tidying up, and other tasks, allowing you to focus on priority activities or simply get a much-needed break.',
                    'price' => 'From $25/hour',
                    'duration' => '2-4 hours',
                    'features' => "In-home assistance while parents present\nChild engagement and supervision\nLight housekeeping assistance\nMeal preparation help\nFlexible scheduling options\nRegular or occasional help available"
                ),
                'Babysitting (unlicensed, informal, often under hourly limits)' => array(
                    'description' => 'Our responsible babysitting service provides attentive care for your children in your home. Our sitters engage children in age-appropriate activities, ensure safety, follow your household rules, and maintain routines, giving you peace of mind while you\'re away.',
                    'price' => 'From $20/hour',
                    'duration' => 'As needed',
                    'features' => "Background-checked sitters\nExperienced with various age groups\nEngaging activities and games\nLight meal preparation\nHomework help available\nBedtime routine assistance"
                ),
                'Toy organization service' => array(
                    'description' => 'Our toy organization service creates functional, accessible play spaces for your children. We sort, categorize, and create storage systems that make cleanup easier, teach organizational skills, and create a more peaceful home environment.',
                    'price' => 'From $125',
                    'duration' => '2-5 hours',
                    'features' => "Complete toy inventory\nAge-appropriate sorting\nStorage solution implementation\nDonation coordination\nRotation system setup\nMaintenance plan creation"
                ),
                'Home safety baby-proofing' => array(
                    'description' => 'Our baby-proofing service makes your home safer for curious little ones. We identify potential hazards and install appropriate safety measures such as cabinet locks, outlet covers, furniture anchors, and gates to provide a secure environment for your child.',
                    'price' => 'From $150',
                    'duration' => '2-4 hours',
                    'features' => "Comprehensive safety assessment\nProfessional installation\nQuality safety products\nCustomized recommendations\nChildproofing consultation\nFollow-up adjustments"
                ),
                'Birthday party setup & hosting' => array(
                    'description' => 'Our birthday party service handles the setup, management, and cleanup of your child\'s special day. We arrange decorations, coordinate activities, serve food, manage guest needs, and handle cleanup, allowing you to fully enjoy the celebration with your child.',
                    'price' => 'From $199',
                    'duration' => '4-6 hours',
                    'features' => "Decoration setup and arrangement\nActivity coordination and management\nFood service assistance\nGuest management\nPhotography service available\nComplete cleanup afterward"
                )
            )
        ),
        '🎨 Creative & Digital Services' => array(
            'name' => '🎨 Creative & Digital Services',
            'slug' => 'creative-digital',
            'description' => 'Professional creative and digital solutions for your business and personal needs',
            'services' => array(
                'Graphic design' => array(
                    'description' => 'Our graphic design service creates visual content to communicate your message effectively. We design logos, marketing materials, social media graphics, and more with a focus on attracting your target audience and strengthening your brand identity.',
                    'price' => 'From $50/hour',
                    'duration' => 'Varies by project',
                    'features' => "Custom design creation\nMultiple revision rounds\nFile formats for all uses\nBrand consistency\nCommercial usage rights\nTechnical specification adherence"
                ),
                'Social media management' => array(
                    'description' => 'Our social media management service handles your online presence across platforms, creating engaging content, responding to followers, analyzing performance, and implementing strategies to grow your audience and enhance your brand\'s digital footprint.',
                    'price' => 'From $350/month',
                    'duration' => 'Ongoing',
                    'features' => "Content calendar creation\nRegular posting schedule\nEngagement with followers\nPerformance analytics and reporting\nHashtag and trend research\nImage and graphics creation"
                ),
                'Content writing/blogging' => array(
                    'description' => 'Our content writing service creates engaging, informative, and SEO-optimized content for your website, blog, or marketing materials. We research your industry and audience to produce compelling copy that drives engagement and conversions.',
                    'price' => 'From $0.10/word',
                    'duration' => '2-7 days',
                    'features' => "SEO optimization\nKeyword research\nCompetitor analysis\nContent strategy\nEditing and proofreading\nFormatting for digital platforms"
                ),
                'Photography (no certification required for general use)' => array(
                    'description' => 'Our photography service captures high-quality images for personal events, social media, online listings, and basic marketing needs. We provide professional-looking photos that highlight your subject in the best possible light.',
                    'price' => 'From $100/hour',
                    'duration' => '1-3 hours',
                    'features' => "Professional equipment\nBasic editing included\nDigital file delivery\nQuick turnaround time\nMultiple setting options\nEvent coverage"
                ),
                'Videography for events' => array(
                    'description' => 'Our event videography service captures the special moments of your occasion in high-quality video. We film personal events, create highlight reels, and deliver professionally edited content that preserves your memories.',
                    'price' => 'From $200/hour',
                    'duration' => 'Event length + editing',
                    'features' => "HD/4K video capture\nBasic editing included\nHighlight reel creation\nBackground music options\nDigital file delivery\nFast turnaround options"
                ),
                'Logo design' => array(
                    'description' => 'Our logo design service creates a unique visual identity for your business or project. We develop concepts based on your brand values and goals, delivering a professional, versatile logo that works across all applications.',
                    'price' => 'From $250',
                    'duration' => '1-2 weeks',
                    'features' => "Multiple concept options\nUnlimited revisions\nAll file formats provided\nBlack/white versions\nBrand color palette\nUsage guidelines"
                ),
                'Resume writing' => array(
                    'description' => 'Our resume writing service creates professional, attention-grabbing resumes tailored to your industry and career goals. We highlight your skills and achievements in a format designed to get past applicant tracking systems and impress hiring managers.',
                    'price' => 'From $125',
                    'duration' => '2-5 days',
                    'features' => "ATS-friendly formatting\nKeyword optimization\nAchievement highlighting\nCover letter option\nLinkedIn profile updating\nDigital and print formats"
                ),
                'Voiceover work' => array(
                    'description' => 'Our voiceover service provides professional-sounding narration for your videos, presentations, phone systems, or other audio needs. We deliver clear, engaging vocals that enhance your content and connect with your audience.',
                    'price' => 'From $75',
                    'duration' => '1-3 days',
                    'features' => "Professional recording equipment\nMultiple style options\nBackground noise elimination\nTiming adjustments\nRevisions included\nVarious file formats available"
                ),
                'T-shirt & merch design' => array(
                    'description' => 'Our merchandise design service creates eye-catching graphics for t-shirts, mugs, hats, and other promotional items. We develop designs that represent your brand, event, or message in a way that people will want to wear and display.',
                    'price' => 'From $150',
                    'duration' => '3-7 days',
                    'features' => "Print-ready files\nMultiple color variations\nScalable vector formats\nMock-up previews\nPrinter specifications\nApparel-specific optimization"
                ),
                'Basic website setup (Wix/Shopify)' => array(
                    'description' => 'Our website setup service creates a professional online presence using user-friendly platforms like Wix or Shopify. We design and configure your site with your branding, content, and functionality needs in mind, providing a polished result without the need for coding.',
                    'price' => 'From $500',
                    'duration' => '1-2 weeks',
                    'features' => "Mobile-responsive design\nContent uploading\nBasic SEO setup\nContact forms\nSocial media integration\nBasic training included"
                )
            )
        ),
        '🎓 Coaching & Consulting (No License Required Unless Regulated)' => array(
            'name' => '🎓 Coaching & Consulting',
            'slug' => 'coaching-consulting',
            'description' => 'Expert guidance and coaching to help you achieve your personal and professional goals',
            'services' => array(
                'Business coaching' => array(
                    'description' => 'Our business coaching service helps entrepreneurs and small business owners develop strategies for growth and success. We provide guidance on business planning, marketing, operations, and leadership to help you overcome challenges and achieve your goals.',
                    'price' => 'From $125/hour',
                    'duration' => 'Ongoing',
                    'features' => "Personalized business strategies\nAccountability systems\nGoal setting and tracking\nPerformance improvement plans\nSWOT analysis\nRegular progress reviews"
                ),
                'Life coaching' => array(
                    'description' => 'Our life coaching service helps you clarify your goals, overcome obstacles, and create positive change in your personal and professional life. We provide support, accountability, and strategies to help you reach your full potential.',
                    'price' => 'From $90/hour',
                    'duration' => 'Ongoing',
                    'features' => "Personal goal assessment\nAction plan development\nAccountability partnership\nObstacle identification\nProgress tracking\nCelebration of milestones"
                ),
                'Marketing consulting' => array(
                    'description' => 'Our marketing consulting service helps businesses develop effective strategies to reach their target audience and increase sales. We analyze your market position and create customized plans for branding, digital marketing, and customer acquisition.',
                    'price' => 'From $125/hour',
                    'duration' => 'Varies by project',
                    'features' => "Market research\nCompetitor analysis\nTarget audience identification\nCampaign development\nROI measurement\nImplementation guidance"
                ),
                'Social media consulting' => array(
                    'description' => 'Our social media consulting service provides expert guidance on leveraging social platforms for business growth. We develop customized strategies, content plans, and engagement tactics to increase your online presence and connect with your audience.',
                    'price' => 'From $90/hour',
                    'duration' => 'Varies',
                    'features' => "Platform selection guidance\nBrand voice development\nContent strategy\nEngagement tactics\nAnalytics interpretation\nTraining and support"
                ),
                'Relationship coaching' => array(
                    'description' => 'Our relationship coaching service helps individuals and couples improve communication, resolve conflicts, and build stronger connections. We provide tools and strategies for developing healthier relationship patterns and greater satisfaction.',
                    'price' => 'From $100/hour',
                    'duration' => 'Ongoing',
                    'features' => "Communication skill building\nConflict resolution techniques\nEmotional awareness development\nActive listening practice\nBoundary setting guidance\nPositive interaction patterns"
                ),
                'Productivity/time management coaching' => array(
                    'description' => 'Our productivity coaching service helps you optimize your time, energy, and focus to accomplish more with less stress. We develop personalized systems for organization, prioritization, and workflow that align with your goals and working style.',
                    'price' => 'From $85/hour',
                    'duration' => '4-8 sessions',
                    'features' => "Time audit and analysis\nPrioritization frameworks\nDistraction management\nGoal-aligned scheduling\nEnergy management\nTechnology optimization"
                ),
                'Accountability coaching' => array(
                    'description' => 'Our accountability coaching service provides the structure, motivation, and support you need to follow through on your commitments and achieve your goals. We help you clarify objectives, create action plans, and stay consistent with regular check-ins.',
                    'price' => 'From $75/hour',
                    'duration' => 'Ongoing',
                    'features' => "Goal clarification\nAction plan development\nRegular check-ins\nObstacle navigation\nProgress tracking\nAdjustment strategies"
                ),
                'Confidence or public speaking coaching' => array(
                    'description' => 'Our confidence and public speaking coaching helps you overcome anxiety and develop powerful presentation skills. We build your abilities through personalized techniques, practice sessions, and feedback to help you communicate with impact.',
                    'price' => 'From $90/hour',
                    'duration' => '4-10 sessions',
                    'features' => "Anxiety management techniques\nVoice and body language training\nSpeech structure guidance\nQ&A preparation\nPractice sessions with feedback\nPersonalized growth plan"
                )
            )
        ),
        '💼 Office & Admin Services' => array(
            'name' => '💼 Office & Admin Services',
            'slug' => 'office-admin',
            'description' => 'Professional administrative and virtual assistant services for your business',
            'services' => array(
                'Virtual assistant' => array(
                    'description' => 'Our virtual assistant service provides professional administrative support remotely. We handle email management, scheduling, data entry, customer service, and other tasks to help you focus on core business activities and increase productivity.',
                    'price' => 'From $25/hour',
                    'duration' => 'Ongoing',
                    'features' => "Email management\nCalendar scheduling\nBasic customer service\nData entry and organization\nTravel arrangements\nResearch assistance"
                ),
                'Data entry' => array(
                    'description' => 'Our data entry service accurately transfers information from various sources into your desired digital format. We maintain meticulous attention to detail while efficiently processing your data for reports, databases, spreadsheets, or other business systems.',
                    'price' => 'From $20/hour',
                    'duration' => 'Varies by volume',
                    'features' => "High accuracy standards\nFast turnaround\nMultiple format capabilities\nData verification\nConfidentiality assurance\nOrganized file delivery"
                ),
                'Email inbox management' => array(
                    'description' => 'Our email management service organizes and prioritizes your inbox to save you time and reduce stress. We sort messages, respond to routine inquiries, flag important emails, and implement systems to maintain inbox order.',
                    'price' => 'From $25/hour',
                    'duration' => 'Ongoing',
                    'features' => "Message categorization\nPriority flagging\nTemplate responses\nFollow-up management\nFilter creation\nArchiving systems"
                ),
                'Transcription services' => array(
                    'description' => 'Our transcription service converts audio and video recordings into accurate text documents. We provide clear, well-formatted transcripts of interviews, meetings, lectures, podcasts, and other content with quick turnaround times.',
                    'price' => 'From $1.25/audio minute',
                    'duration' => '24-72 hours',
                    'features' => "Verbatim or clean transcripts\nSpeaker identification\nTimestamp options\nFormatting options\nMultiple file formats\nQuick turnaround available"
                ),
                'Online research assistant' => array(
                    'description' => 'Our research assistant service gathers, organizes, and summarizes information from reliable online sources. We conduct thorough research on topics, companies, markets, or trends according to your specific requirements and deliver clear, organized results.',
                    'price' => 'From $30/hour',
                    'duration' => 'Varies by scope',
                    'features' => "Comprehensive source checking\nClear citation methods\nOrganized information delivery\nSummary creation\nData visualization options\nRegular progress updates"
                ),
                'Bookkeeping (note: CPA not required unless advertising as accountant)' => array(
                    'description' => 'Our bookkeeping service maintains accurate financial records for your small business or personal accounts. We track income and expenses, reconcile accounts, generate basic financial reports, and help you stay organized for tax preparation.',
                    'price' => 'From $35/hour',
                    'duration' => 'Ongoing',
                    'features' => "Accurate transaction recording\nMonthly reconciliation\nBasic financial reports\nExpense categorization\nInvoice tracking\nDigital record organization"
                ),
                'CRM/data organization setup' => array(
                    'description' => 'Our CRM setup service configures and organizes your customer relationship management system for optimal use. We customize fields, create workflows, import and clean data, and establish processes that help you better manage customer relationships.',
                    'price' => 'From $400',
                    'duration' => '1-3 weeks',
                    'features' => "System customization\nData migration\nWorkflow creation\nAutomation setup\nTemplate development\nBasic training"
                ),
                'Cold calling or appointment setting' => array(
                    'description' => 'Our appointment setting service connects your business with potential clients through professional, targeted phone outreach. We qualify prospects, overcome objections, and schedule appointments with decision-makers to fill your sales pipeline.',
                    'price' => 'From $25/hour',
                    'duration' => 'Ongoing',
                    'features' => "Professional call scripts\nLead qualification\nAppointment scheduling\nDetailed call notes\nCRM updating\nFollow-up coordination"
                ),
                'Customer service outsourcing' => array(
                    'description' => 'Our customer service outsourcing handles client inquiries, issues, and requests with professionalism and care. We provide responsive support via email, chat, or phone, following your company guidelines to ensure customer satisfaction.',
                    'price' => 'From $25/hour',
                    'duration' => 'Ongoing',
                    'features' => "Prompt response times\nProfessional communication\nIssue resolution tracking\nCustomer satisfaction monitoring\nEscalation protocols\nRegular performance reporting"
                ),
                'Print-on-demand order management' => array(
                    'description' => 'Our print-on-demand management service handles the operational aspects of your merchandise business. We process orders, communicate with suppliers, track fulfillment, address customer inquiries, and ensure smooth delivery of your products.',
                    'price' => 'From $400/month',
                    'duration' => 'Ongoing',
                    'features' => "Order processing\nSupplier coordination\nInventory tracking\nShipping management\nCustomer communications\nReturn handling"
                )
            )
        ),
        '📦 Selling, Flipping & Setup' => array(
            'name' => '📦 Selling, Flipping & Setup',
            'slug' => 'selling-flipping',
            'description' => 'Specialized services for furniture restoration, product selling, and custom setup solutions',
            'services' => array(
                'Furniture flipping' => array(
                    'description' => 'Our furniture flipping service transforms outdated or damaged furniture into stylish, renewed pieces. We handle pickup, repairs, refinishing, painting or staining, hardware updates, and can assist with selling the refreshed items.',
                    'price' => 'From $150 + materials',
                    'duration' => '1-3 weeks',
                    'features' => "Furniture selection assistance\nSurface preparation and repair\nProfessional painting/staining\nHardware replacement\nUpholstery recommendations\nSelling assistance available"
                ),
                'Product sourcing for others' => array(
                    'description' => 'Our product sourcing service finds the specific items you need for your business or personal use. Whether you\'re seeking unique merchandise, specific supplies, or hard-to-find products, we research options, compare prices, and facilitate purchases to save you time and effort.',
                    'price' => 'From 15% of purchase',
                    'duration' => 'Varies',
                    'features' => "Extensive vendor research\nPrice comparison and negotiation\nQuality verification\nPurchasing coordination\nImport assistance when needed\nLogistics management"
                ),
                'Drop-off eBay/Amazon seller (you sell items for others)' => array(
                    'description' => 'Our selling service handles the entire process of selling your unwanted items online. We photograph, list, manage inquiries, package, and ship your items on platforms like eBay or Amazon, maximizing your return while eliminating the hassle of online selling.',
                    'price' => 'From 30% of sale price',
                    'duration' => 'Until sold',
                    'features' => "Professional photography\nDetailed item descriptions\nCompetitive pricing research\nBuyer communication\nSecure packaging\nShipping management"
                ),
                'Home office or gaming setup installer' => array(
                    'description' => 'Our setup service creates optimal home office or gaming environments tailored to your needs. We handle assembly, cable management, equipment positioning, and system configuration to maximize productivity, comfort, and performance.',
                    'price' => 'From $200',
                    'duration' => '3-8 hours',
                    'features' => "Equipment assembly\nErgonomic positioning\nCable management\nPeripheral setup\nBasic software configuration\nWiFi optimization"
                ),
                'Party rental setup (tables, chairs, bounce houses – no operator)' => array(
                    'description' => 'Our party rental setup service handles the delivery, installation, and arrangement of your event equipment. We ensure proper placement and setup of tables, chairs, tents, bounce houses, and other party items, then return for takedown after your event.',
                    'price' => 'From $100',
                    'duration' => '1-3 hours',
                    'features' => "Delivery and setup\nProper equipment positioning\nSafety checks\nPost-event takedown\nTime-saving convenience\nExperienced setup crew"
                )
            )
        )
    );
}

/**
 * Legacy function for backward compatibility
 */
function get_service_categories_with_icons() {
    $categories = get_service_categories();
    $result = array();
    
    foreach ($categories as $key => $category) {
        $result[$key] = array(
            'icon' => isset($category['icon']) ? $category['icon'] : '🔹',
            'title' => isset($category['name']) ? $category['name'] : $key,
            'services' => isset($category['services']) ? array_keys($category['services']) : array()
        );
    }
    
    return $result;
}

// Register widget areas
function services_pro_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'services-pro'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'services-pro'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer 1', 'services-pro'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Footer widget area 1.', 'services-pro'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer 2', 'services-pro'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Footer widget area 2.', 'services-pro'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer 3', 'services-pro'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Footer widget area 3.', 'services-pro'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'services_pro_widgets_init');

// Custom post type for Services
function create_services_post_type() {
    register_post_type('services',
        array(
            'labels' => array(
                'name' => __('Services'),
                'singular_name' => __('Service'),
                'add_new' => __('Add New Service'),
                'add_new_item' => __('Add New Service'),
                'edit_item' => __('Edit Service'),
                'new_item' => __('New Service'),
                'view_item' => __('View Service'),
                'search_items' => __('Search Services'),
                'not_found' => __('No services found'),
                'not_found_in_trash' => __('No services found in Trash')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'rewrite' => array('slug' => 'services'),
            'menu_icon' => 'dashicons-hammer',
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'create_services_post_type');

// Custom taxonomy for Service Categories
function create_service_categories_taxonomy() {
    register_taxonomy(
        'service_category',
        'services',
        array(
            'label' => __('Service Categories'),
            'labels' => array(
                'name' => __('Service Categories'),
                'singular_name' => __('Service Category'),
                'menu_name' => __('Service Categories'),
                'all_items' => __('All Service Categories'),
                'edit_item' => __('Edit Service Category'),
                'view_item' => __('View Service Category'),
                'update_item' => __('Update Service Category'),
                'add_new_item' => __('Add New Service Category'),
                'new_item_name' => __('New Service Category Name'),
                'search_items' => __('Search Service Categories'),
                'popular_items' => __('Popular Service Categories'),
                'separate_items_with_commas' => __('Separate service categories with commas'),
                'add_or_remove_items' => __('Add or remove service categories'),
                'choose_from_most_used' => __('Choose from the most used service categories'),
                'not_found' => __('No service categories found'),
                'back_to_items' => __('Back to service categories'),
            ),
            'rewrite' => array('slug' => 'service-category'),
            'hierarchical' => true,
            'show_in_rest' => true,
            'show_in_nav_menus' => true,
            'show_admin_column' => true,
            'show_in_quick_edit' => true,
            'show_ui' => true,
            'query_var' => true,
            'capabilities' => array(
                'manage_terms' => 'manage_categories',
                'edit_terms' => 'manage_categories',
                'delete_terms' => 'manage_categories',
                'assign_terms' => 'edit_posts',
            ),
            'public' => true,
            'publicly_queryable' => true,
        )
    );
}
add_action('init', 'create_service_categories_taxonomy');

// Flush rewrite rules when taxonomy is created to ensure URLs work
function flush_rewrite_rules_for_services() {
    // Check if we've already flushed the rules
    if (!get_option('services_rewrite_rules_flushed')) {
        flush_rewrite_rules();
        update_option('services_rewrite_rules_flushed', true);
    }
}
add_action('init', 'flush_rewrite_rules_for_services', 25);

// Create default service categories
function create_default_service_categories() {
    $service_categories = get_service_categories();
    
    foreach($service_categories as $category_key => $category) {
        $slug = isset($category['slug']) ? $category['slug'] : sanitize_title($category['name']);
        
        // Check if term exists first
        $existing_term = term_exists($slug, 'service_category');
        
        if(!$existing_term) {
            // Create new term
            wp_insert_term(
                $category['name'], // the term name
                'service_category', // the taxonomy
                array(
                    'slug' => $slug,
                    'description' => isset($category['description']) ? $category['description'] : ''
                )
            );
        }
    }
}
add_action('after_switch_theme', 'create_default_service_categories');
// Also run this once to create the categories immediately
add_action('init', 'create_default_service_categories', 20);

/**
 * Enhanced Header Menu Functions
 */

// Add body classes for header states
function add_header_body_classes($classes) {
    // Add class if mobile menu should be sticky
    if (wp_is_mobile()) {
        $classes[] = 'mobile-device';
    }
    
    // Add class for different header layouts
    if (get_theme_mod('header_layout', 'default') === 'centered') {
        $classes[] = 'header-centered';
    }
    
    return $classes;
}
add_filter('body_class', 'add_header_body_classes');

// Enqueue additional CSS for specific pages
function enqueue_page_specific_header_styles() {
    if (is_page_template('page-services.php') || is_tax('service_category')) {
        wp_enqueue_style('header-services-enhancement', get_template_directory_uri() . '/css/header-services.css', array('enhanced-header-styles'), '1.0.0');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_page_specific_header_styles', 15);

// Add customizer options for header
function services_pro_header_customizer($wp_customize) {
    // Header Section
    $wp_customize->add_section('header_options', array(
        'title' => __('Header Options', 'services-pro'),
        'priority' => 30,
    ));
    
    // Contact Phone
    $wp_customize->add_setting('contact_phone', array(
        'default' => '(555) 123-4567',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_phone', array(
        'label' => __('Contact Phone', 'services-pro'),
        'section' => 'header_options',
        'type' => 'text',
    ));
    
    // Contact Email
    $wp_customize->add_setting('contact_email', array(
        'default' => 'info@example.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('contact_email', array(
        'label' => __('Contact Email', 'services-pro'),
        'section' => 'header_options',
        'type' => 'email',
    ));
    
    // Header Layout
    $wp_customize->add_setting('header_layout', array(
        'default' => 'default',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('header_layout', array(
        'label' => __('Header Layout', 'services-pro'),
        'section' => 'header_options',
        'type' => 'select',
        'choices' => array(
            'default' => __('Default', 'services-pro'),
            'centered' => __('Centered', 'services-pro'),
        ),
    ));
    
    // Social Media Links
    $wp_customize->add_setting('social_facebook', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('social_facebook', array(
        'label' => __('Facebook URL', 'services-pro'),
        'section' => 'header_options',
        'type' => 'url',
    ));
    
    $wp_customize->add_setting('social_instagram', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('social_instagram', array(
        'label' => __('Instagram URL', 'services-pro'),
        'section' => 'header_options',
        'type' => 'url',
    ));
    
    $wp_customize->add_setting('social_twitter', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('social_twitter', array(
        'label' => __('Twitter URL', 'services-pro'),
        'section' => 'header_options',
        'type' => 'url',
    ));
}
add_action('customize_register', 'services_pro_header_customizer');

// Add schema markup for navigation
function add_navigation_schema() {
    if (has_nav_menu('primary')) {
        echo '<script type="application/ld+json">';
        echo json_encode(array(
            '@context' => 'https://schema.org',
            '@type' => 'SiteNavigationElement',
            'name' => get_bloginfo('name') . ' Navigation',
            'url' => home_url('/'),
        ));
        echo '</script>';
    }
}
add_action('wp_head', 'add_navigation_schema');

// Make sure service categories are available in the WordPress menu editor
function register_service_categories_in_nav_menu() {
    register_taxonomy_for_object_type('service_category', 'services');
    add_filter('nav_menu_meta_box_object', 'add_service_categories_nav_menu_meta_box', 10, 1);
}
add_action('init', 'register_service_categories_in_nav_menu');

// Generate Service Posts with AI
function generate_service_posts() {
    // Check if we've already run this function
    if (get_option('service_posts_generated')) {
        return;
    }
    
    // Define all service data
    $service_data = array(
        'cleaning' => array(
            'name' => '🧹 Home & Cleaning Services',
            'services' => array(
                'House cleaning' => array(
                    'description' => 'Our professional house cleaning service transforms your home with meticulous attention to detail. From dusting and vacuuming to bathroom sanitizing and kitchen deep cleaning, our experienced team delivers spotless results that exceed expectations. Regular or one-time services available.',
                    'price' => 'From $129',
                    'duration' => '2-5 hours',
                    'features' => "All cleaning supplies included\nEnvironmentally friendly products available\nDetailed cleaning checklists\nSatisfaction guarantee\nFlexible scheduling options\nExperienced, background-checked staff"
                ),
                'Move-in/move-out cleaning' => array(
                    'description' => 'Our comprehensive move-in/move-out cleaning service ensures your property is immaculate for new tenants or to help recover your security deposit. We deep clean all surfaces, appliances, cabinets, bathrooms, and flooring to leave the space in perfect condition.',
                    'price' => 'From $199',
                    'duration' => '3-7 hours',
                    'features' => "Deep cleaning of all surfaces\nInside and outside appliance cleaning\nCabinet and drawer cleaning\nBathroom sanitizing and descaling\nFloor scrubbing and polishing\nWindow sill and track cleaning"
                ),
                'Pressure washing' => array(
                    'description' => 'Our pressure washing service removes years of dirt, grime, mold, and stains from your exterior surfaces. Using professional-grade equipment and techniques, we restore driveways, decks, siding, and patios to their original beauty without damaging the surfaces.',
                    'price' => 'From $149',
                    'duration' => '2-4 hours',
                    'features' => "Commercial-grade pressure washing equipment\nSafe for all surfaces\nEnvironmentally friendly cleaning solutions\nStain and mildew removal\nDriveway, deck, patio, and siding cleaning\nFree estimates"
                ),
                'Gutter cleaning' => array(
                    'description' => 'Keep your home protected with our thorough gutter cleaning service. We remove leaves, debris, and blockages from your gutters and downspouts to prevent water damage, foundation issues, and roof problems. Our professional team works safely and efficiently.',
                    'price' => 'From $119',
                    'duration' => '1-3 hours',
                    'features' => "Complete debris removal\nDownspout flushing\nMinor repairs and adjustments\nGutter function testing\nDebris disposal included\nRoof and foundation protection"
                ),
                'Window cleaning' => array(
                    'description' => 'Our window cleaning service delivers crystal-clear results inside and out. Using professional techniques and solutions, we remove dirt, water spots, and grime from glass, frames, screens, and sills. Enhance your view and let more natural light into your home.',
                    'price' => 'From $99',
                    'duration' => '2-4 hours',
                    'features' => "Interior and exterior window cleaning\nScreen cleaning and frame wiping\nWindow sill and track cleaning\nSpot-free finish guaranteed\nSafe access equipment for high windows\nStain removal techniques"
                ),
                'Carpet shampooing' => array(
                    'description' => 'Revitalize your carpets with our deep cleaning carpet shampooing service. We extract embedded dirt, allergens, and stains using hot water extraction and premium cleaning solutions. The result is fresher, cleaner, and longer-lasting carpets throughout your home.',
                    'price' => 'From $129',
                    'duration' => '2-5 hours',
                    'features' => "Hot water extraction method\nPet stain and odor treatment\nQuick-dry technology\nAllergy-reducing deep cleaning\nStain protection treatments available\nEco-friendly options available"
                ),
                'Garage/attic organization' => array(
                    'description' => 'Transform your cluttered garage or attic into a functional, organized space with our professional organization service. We sort, categorize, and implement storage solutions that maximize your space and make everything easily accessible.',
                    'price' => 'From $249',
                    'duration' => '4-8 hours',
                    'features' => "Custom organization plans\nSorting and categorizing assistance\nStorage solution recommendations\nDonation and disposal coordination\nLabeling systems\nFollow-up maintenance available"
                ),
                'Trash hauling & junk removal' => array(
                    'description' => 'Our junk removal service helps you reclaim your space by efficiently removing unwanted items, debris, and trash. We handle the heavy lifting, transportation, and proper disposal or recycling of your items, saving you time and effort.',
                    'price' => 'From $149',
                    'duration' => '1-4 hours',
                    'features' => "Same-day service available\nFull-service loading and hauling\nResponsible disposal and recycling\nDonation coordination for usable items\nNo hidden fees\nAll types of junk accepted"
                ),
                'Airbnb cleaning & reset services' => array(
                    'description' => 'Maximize your Airbnb ratings with our specialized cleaning and reset service. We thoroughly clean, sanitize, and prepare your rental property between guests, ensuring everything is perfect for your next booking, from fresh linens to restocked amenities.',
                    'price' => 'From $129',
                    'duration' => '2-4 hours',
                    'features' => "Thorough sanitizing of all surfaces\nLinen changing and laundry service\nAmenity restocking available\nKitchen and bathroom deep cleaning\nGuest-ready inspection\nFlexible scheduling for same-day turnovers"
                ),
                'Lawn mowing and yard maintenance' => array(
                    'description' => 'Keep your outdoor space looking its best with our professional lawn mowing and yard maintenance service. We provide precise cutting, edging, and trimming to enhance your property\'s curb appeal, along with seasonal cleanup and maintenance.',
                    'price' => 'From $49',
                    'duration' => '1-3 hours',
                    'features' => "Professional-grade equipment\nPrecision cutting and edging\nDebris cleanup and removal\nWeed trimming\nRegular maintenance schedules available\nSeasonal services available"
                )
            )
        ),
        'maintenance' => array(
            'name' => '🧰 Home & Property Maintenance',
            'services' => array(
                'Furniture assembly' => array(
                    'description' => 'Save time and frustration with our expert furniture assembly service. Our skilled technicians efficiently assemble your furniture according to manufacturer specifications, ensuring stability and proper function. From IKEA pieces to complex items, we handle it all.',
                    'price' => 'From $79',
                    'duration' => '1-3 hours',
                    'features' => "All types of furniture assembled\nFollows manufacturer instructions\nProper tools and equipment\nPackaging disposal\nFurniture placement assistance\nQuick and efficient service"
                ),
                'TV mounting' => array(
                    'description' => 'Our professional TV mounting service securely installs your television on the wall, optimizing your viewing experience while saving space. We ensure proper height, angle, and secure attachment, with optional cable management for a clean look.',
                    'price' => 'From $99',
                    'duration' => '1-2 hours',
                    'features' => "Secure mounting on any wall type\nHidden cable management available\nOptimal height and angle positioning\nSoundbar mounting available\nBracket installation included\nEquipment testing after installation"
                ),
                'Handyman services (minor, non-structural repairs)' => array(
                    'description' => 'Our versatile handyman service tackles those small to medium repairs and projects around your home. From fixing leaky faucets to patching drywall, installing fixtures, or assembling furniture, our skilled technicians provide efficient, high-quality solutions.',
                    'price' => 'From $89/hour',
                    'duration' => 'Varies by project',
                    'features' => "Multiple repairs in one visit\nExperienced, multi-skilled technicians\nReliable scheduling\nTransparent pricing\nQuality workmanship guarantee\nFree project assessment"
                ),
                'Fence painting' => array(
                    'description' => 'Revitalize your property with our fence painting service. We thoroughly prepare the surface, apply quality primers and paints, and ensure even coverage for a beautiful, long-lasting finish that enhances your outdoor space and protects your fence.',
                    'price' => 'From $2/linear foot',
                    'duration' => 'Varies by size',
                    'features' => "Surface preparation included\nQuality exterior paints and stains\nThorough coverage and finishing\nProtective coatings available\nStaining options available\nEnvironmentally friendly options"
                ),
                'Light bulb/fixture installation' => array(
                    'description' => 'Our light fixture installation service safely replaces or installs new light fixtures throughout your home. From simple bulb replacements to chandelier installation, our technicians ensure proper wiring, secure mounting, and perfect positioning.',
                    'price' => 'From $59',
                    'duration' => '30 mins - 2 hours',
                    'features' => "Safe electrical handling\nFixture assembly included\nProper mounting and installation\nOld fixture removal and disposal\nLED and energy-efficient options\nSmall electrical repairs available"
                ),
                'Basic drywall patching' => array(
                    'description' => 'Our drywall repair service seamlessly fixes holes, cracks, and damage to your walls. Using professional techniques, we patch, texture-match, and prepare surfaces for painting, restoring your walls to their original condition.',
                    'price' => 'From $129',
                    'duration' => '1-3 hours',
                    'features' => "Small to medium hole repairs\nCrack and damage patching\nTexture matching\nPrime and paint-ready finishing\nDust containment during work\nSmooth, seamless results"
                ),
                'Mailbox installation' => array(
                    'description' => 'Our mailbox installation service ensures your new mailbox is properly and securely installed according to local regulations. We handle everything from post installation to mounting the mailbox at the correct height and position.',
                    'price' => 'From $99',
                    'duration' => '1-2 hours',
                    'features' => "Post and mailbox installation\nConcrete footing for stability\nMeets postal service regulations\nOld mailbox removal available\nCustom height and positioning\nWeatherproofing and security features"
                ),
                'Holiday light hanging' => array(
                    'description' => 'Create a festive display with our holiday light installation service. We safely and professionally install your holiday lights on rooflines, trees, and other exterior features, creating a beautiful display without the risk and hassle of doing it yourself.',
                    'price' => 'From $199',
                    'duration' => '2-6 hours',
                    'features' => "Safe installation practices\nCustom lighting designs\nRoofline, tree, and yard displays\nTimer installation available\nPost-season removal service\nLight testing and maintenance"
                ),
                'Lockout assistance (not locksmithing)' => array(
                    'description' => 'Our lockout assistance service helps when you\'re locked out of your home and need non-destructive entry methods. While we don\'t provide locksmithing services, we can help with accessible entry points and emergency solutions to get you back inside.',
                    'price' => 'From $79',
                    'duration' => '30-60 minutes',
                    'features' => "Quick response times\nNon-destructive entry methods\nEmergency assistance\n24/7 availability\nLocal service providers\nPreventative recommendations"
                ),
                'Pool cleaning' => array(
                    'description' => 'Keep your pool sparkling clean with our comprehensive pool cleaning service. We remove debris, vacuum the pool floor, clean skimmers and filters, test and balance water chemistry, and ensure all equipment is functioning properly.',
                    'price' => 'From $99',
                    'duration' => '1-2 hours',
                    'features' => "Surface skimming and debris removal\nVacuuming and wall brushing\nFilter cleaning and maintenance\nWater testing and chemical balancing\nEquipment checks\nRegular maintenance plans available"
                )
            )
        ),
        'errands' => array(
            'name' => '🛍️ Personal Errands & Concierge',
            'services' => array(
                'Grocery shopping/delivery' => array(
                    'description' => 'Our personalized grocery shopping service takes the hassle out of this weekly chore. We carefully select fresh produce and products according to your detailed list, and deliver everything to your door at your preferred time, saving you valuable time and effort.',
                    'price' => 'From $35 + groceries',
                    'duration' => '1-2 hours',
                    'features' => "Personalized shopping from your list\nFresh produce selection\nSpecific brand preferences honored\nSame-day service available\nContactless delivery options\nReceipt and change provided"
                ),
                'Prescription pickup' => array(
                    'description' => 'Our prescription pickup service provides a convenient solution when you can\'t make it to the pharmacy. We collect your ready prescriptions and deliver them directly to your door, maintaining privacy and ensuring you have the medications you need.',
                    'price' => 'From $25',
                    'duration' => '30-60 minutes',
                    'features' => "Secure prescription handling\nConfidential service\nVerification protocols\nSame-day service available\nMultiple pharmacy pickups\nContactless delivery options"
                ),
                'Waiting-in-line service' => array(
                    'description' => 'Our waiting-in-line service saves you valuable time by having our representative wait in lines for you. Whether it\'s for concert tickets, limited releases, government offices, or popular restaurants, we\'ll hold your place so you can arrive when it matters.',
                    'price' => 'From $25/hour',
                    'duration' => 'As needed',
                    'features' => "Professional line-waiting representatives\nRegular updates while waiting\nSecure handoff protocols\nAdvance booking available\nWaiting for any service or event\nEarly morning/overnight options available"
                ),
                'Personal assistant service' => array(
                    'description' => 'Our personal assistant service provides flexible support for your busy lifestyle. From running errands and managing appointments to organizing tasks and handling correspondence, our assistants help you reclaim your time and reduce stress.',
                    'price' => 'From $35/hour',
                    'duration' => 'Flexible',
                    'features' => "Customized assistance plans\nErrand running and task management\nAppointment scheduling\nEvent planning support\nVirtual or in-person options\nDiscretion and confidentiality"
                ),
                'Moving assistance (loading/unloading, not truck rental)' => array(
                    'description' => 'Our moving assistance service provides the extra hands you need on moving day. Our strong, careful helpers load and unload your items, arrange furniture, and handle the heavy lifting, making your move faster and less stressful without the full cost of a moving company.',
                    'price' => 'From $45/hour per helper',
                    'duration' => '2-8 hours',
                    'features' => "Trained, strong helpers\nCareful handling of items\nEfficient loading and unloading\nFurniture arrangement assistance\nFlexible scheduling\nHourly rates with no minimum"
                ),
                'Courier/delivery services' => array(
                    'description' => 'Our reliable courier service provides prompt pickup and delivery of packages, documents, and items across town. Whether for business or personal needs, we ensure your items arrive safely and on time, with real-time tracking and confirmation.',
                    'price' => 'From $25',
                    'duration' => 'Same day',
                    'features' => "Same-day and rush options\nSecure handling protocols\nDelivery confirmation\nInsurance options available\nScheduled pickups\nDocument and package specialists"
                ),
                'Dog waste cleanup' => array(
                    'description' => 'Our dog waste cleanup service keeps your yard clean and sanitary by professionally removing all pet waste. We thoroughly inspect your property, remove all waste, and dispose of it properly, allowing you to enjoy your outdoor space without the unpleasant task.',
                    'price' => 'From $15/visit',
                    'duration' => '20-30 minutes',
                    'features' => "Weekly service plans available\nThorough yard inspection\nProper waste disposal\nDeodorizing treatments available\nGate code/access management\nService regardless of weather conditions"
                ),
                'Packing/unpacking service' => array(
                    'description' => 'Our professional packing and unpacking service takes the stress out of moving. We carefully pack your belongings using proper materials and techniques, or efficiently unpack and organize items in your new home, saving you time and preventing damage.',
                    'price' => 'From $45/hour',
                    'duration' => 'Varies',
                    'features' => "Careful packing techniques\nQuality packing materials available\nOrganized labeling system\nRoom-by-room unpacking\nEmpty box removal\nInitial organization of items"
                ),
                'Decluttering service' => array(
                    'description' => 'Transform your space with our decluttering service. Our organization experts help you sort through belongings, make decisions about what to keep, donate, or discard, and implement organizational systems that bring clarity and calm to your living areas.',
                    'price' => 'From $45/hour',
                    'duration' => '3-8 hours',
                    'features' => "Personalized decluttering plans\nSorting and categorizing assistance\nDonation and disposal coordination\nOrganizational system implementation\nSpace-maximizing techniques\nMaintenance recommendations"
                ),
                'Plant watering (for traveling homeowners)' => array(
                    'description' => 'Our plant care service ensures your indoor and outdoor plants thrive while you\'re away. We provide customized watering, monitoring for pests or issues, adjusting for light conditions, and sending photo updates so you can travel with peace of mind.',
                    'price' => 'From $25/visit',
                    'duration' => '30-60 minutes per visit',
                    'features' => "Customized watering schedules\nIndoor and outdoor plant care\nPhoto updates of your plants\nBasic pruning and maintenance\nPest monitoring\nAdjusting for weather conditions"
                )
            )
        ),
        'pets' => array(
            'name' => '🐶 Pet & Animal Services',
            'services' => array(
                'Dog walking' => array(
                    'description' => 'Our professional dog walking service provides your furry friend with exercise, stimulation, and relief while you\'re away. Our experienced walkers follow your specified routes and routines, sending updates and ensuring your dog returns home happy and tired.',
                    'price' => 'From $20/30-min walk',
                    'duration' => '30-60 minutes',
                    'features' => "GPS tracked walks\nScheduled relief breaks\nFresh water refills\nTreat giving (if permitted)\nDetailed visit reports\nFlexible scheduling options"
                ),
                'Pet sitting' => array(
                    'description' => 'Our in-home pet sitting service provides loving care for your pets in the comfort of their familiar environment while you\'re away. We follow your care instructions exactly, providing feeding, exercise, medication, playtime, and plenty of attention and affection.',
                    'price' => 'From $30/visit',
                    'duration' => '30-60 minutes per visit',
                    'features' => "In-home care in pet's environment\nFeeding and water refreshing\nMedication administration\nLitter box/waste cleanup\nExercise and playtime\nDaily updates and photos"
                ),
                'Mobile pet grooming (if not cutting hair professionally)' => array(
                    'description' => 'Our basic mobile pet grooming service brings convenience to your doorstep, offering bath, brush, nail trimming, ear cleaning, and basic hygiene services for your pet. We use gentle, pet-safe products and techniques for a stress-free experience.',
                    'price' => 'From $65',
                    'duration' => '1-2 hours',
                    'features' => "At-home service, no transportation stress\nBathing and brushing\nNail trimming\nEar cleaning\nTeeth brushing available\nDe-shedding treatments"
                ),
                'Pet poop scooping service' => array(
                    'description' => 'Our pet waste removal service keeps your yard clean and sanitary by professionally removing all pet waste. We thoroughly inspect your property, remove all waste, and dispose of it properly, allowing you to enjoy your outdoor space without the unpleasant task.',
                    'price' => 'From $15/visit',
                    'duration' => '20-30 minutes',
                    'features' => "Weekly service plans\nThorough yard inspection\nComplete waste removal\nProper disposal methods\nDeodorizing treatment available\nService regardless of weather"
                ),
                'Pet taxi (transporting pets to vet/groomer)' => array(
                    'description' => 'Our pet taxi service provides safe, reliable transportation for your pet to veterinary appointments, grooming sessions, daycare, or other destinations. We ensure a stress-free journey with proper safety equipment and a pet-friendly environment.',
                    'price' => 'From $35 one-way',
                    'duration' => 'Varies by distance',
                    'features' => "Safe pet transportation\nPet safety restraints used\nClimate controlled vehicles\nWait time at appointments available\nScheduled or on-demand service\nReturn trips available"
                ),
                'Aquarium cleaning' => array(
                    'description' => 'Our aquarium maintenance service keeps your underwater environment healthy and beautiful. We perform partial water changes, clean glass and decorations, vacuum substrate, check equipment, and ensure water parameters are optimal for your aquatic pets.',
                    'price' => 'From $65',
                    'duration' => '1-2 hours',
                    'features' => "Partial water changes\nFilter cleaning and maintenance\nGlass and decoration cleaning\nWater testing and treatment\nEquipment checks\nSubstrate vacuuming"
                ),
                'Pet yard deodorizing' => array(
                    'description' => 'Our pet yard deodorizing service eliminates unpleasant odors from your outdoor spaces. We apply pet-safe, environmentally friendly treatments that neutralize odors at their source rather than masking them, making your yard fresh and enjoyable again.',
                    'price' => 'From $79',
                    'duration' => '1-2 hours',
                    'features' => "Pet and family-safe formulas\nOdor neutralizing (not masking)\nEnvironmentally friendly products\nTargets grass, soil, and hardscapes\nPreventative treatments available\nSeasonal service plans available"
                )
            )
        ),
        'family' => array(
            'name' => '👶 Child & Family Support',
            'services' => array(
                'Parent helper/mother\'s helper' => array(
                    'description' => 'Our parent helper service provides an extra set of hands around the house while you\'re home but need assistance. We help with light childcare, meal prep, tidying up, and other tasks, allowing you to focus on priority activities or simply get a much-needed break.',
                    'price' => 'From $25/hour',
                    'duration' => '2-4 hours',
                    'features' => "In-home assistance while parents present\nChild engagement and supervision\nLight housekeeping assistance\nMeal preparation help\nFlexible scheduling options\nRegular or occasional help available"
                ),
                'Babysitting (unlicensed, informal, often under hourly limits)' => array(
                    'description' => 'Our responsible babysitting service provides attentive care for your children in your home. Our sitters engage children in age-appropriate activities, ensure safety, follow your household rules, and maintain routines, giving you peace of mind while you\'re away.',
                    'price' => 'From $20/hour',
                    'duration' => 'As needed',
                    'features' => "Background-checked sitters\nExperienced with various age groups\nEngaging activities and games\nLight meal preparation\nHomework help available\nBedtime routine assistance"
                ),
                'Toy organization service' => array(
                    'description' => 'Our toy organization service transforms chaotic play areas into orderly, functional spaces. We sort, purge (with your approval), and implement age-appropriate organization systems that make cleanup easier for children and help maintain a tidy home.',
                    'price' => 'From $129',
                    'duration' => '2-4 hours',
                    'features' => "Sorting and categorizing toys\nStorage solution recommendations\nAge-appropriate organization systems\nDonation coordination for outgrown toys\nLabel creation for easy cleanup\nMaintenance tips and strategies"
                ),
                'Home safety baby-proofing' => array(
                    'description' => 'Our baby-proofing service helps create a safer environment for your curious little one. We identify potential hazards throughout your home and install appropriate safety devices, from cabinet locks and outlet covers to furniture anchors and safety gates.',
                    'price' => 'From $149',
                    'duration' => '2-4 hours',
                    'features' => "Comprehensive safety assessment\nProfessional installation of safety devices\nCabinet and drawer latches\nFurniture anchoring\nStairway gates installation\nOutlet covers and cord management"
                ),
                'Birthday party setup & hosting' => array(
                    'description' => 'Our birthday party service handles the setup, management, and cleanup of your child\'s special day. We arrange decorations, coordinate activities, serve food, manage guest needs, and handle cleanup, allowing you to fully enjoy the celebration with your child.',
                    'price' => 'From $199',
                    'duration' => '4-6 hours',
                    'features' => "Decoration setup and arrangement\nActivity coordination and management\nFood service assistance\nGuest management\nPhotography service available\nComplete cleanup afterward"
                )
            )
        ),
        'creative' => array(
            'name' => '🎨 Creative & Digital Services',
            'services' => array(
                'Graphic design' => array(
                    'description' => 'Our graphic design service creates visually compelling materials for your business or personal needs. From logos and branding to marketing materials and social media graphics, our designers blend creativity with strategic thinking to deliver impactful designs.',
                    'price' => 'From $75/hour',
                    'duration' => 'Project-based',
                    'features' => "Custom design creation\nBranding and logo design\nPrint and digital materials\nMultiple revision rounds\nFile delivery in various formats\nBrand guidelines development"
                ),
                'Social media management' => array(
                    'description' => 'Our social media management service handles your online presence across platforms, creating engaging content, responding to followers, analyzing performance, and implementing strategies to grow your audience and enhance your brand\'s digital footprint.',
                    'price' => 'From $350/month',
                    'duration' => 'Ongoing',
                    'features' => "Content calendar creation\nRegular posting schedule\nEngagement with followers\nPerformance analytics and reporting\nHashtag and trend research\nImage and graphics creation"
                ),
                'Content writing/blogging' => array(
                    'description' => 'Our content writing service provides well-researched, engaging, and SEO-optimized content for your website, blog, or marketing materials. Our writers create clear, compelling copy that resonates with your target audience and supports your business goals.',
                    'price' => 'From $0.10/word',
                    'duration' => 'Project-based',
                    'features' => "SEO-optimized writing\nKeyword research\nEngaging, readable style\nWell-researched content\nOriginal, plagiarism-free writing\nRevisions included"
                ),
                'Photography (no certification required for general use)' => array(
                    'description' => 'Our photography service captures professional-quality images for your personal events, real estate listings, products, or business needs. We provide well-composed, properly lit photos that showcase your subject in the best possible light.',
                    'price' => 'From $150/session',
                    'duration' => '1-3 hours',
                    'features' => "Professional equipment\nExpert composition and lighting\nDigital image delivery\nBasic editing and retouching\nQuick turnaround times\nUnlimited shots during session"
                ),
                'Videography for events' => array(
                    'description' => 'Our event videography service documents your special occasions with professional-quality video. We capture key moments, create engaging footage, and deliver edited videos that tell the story of your event, preserving memories for years to come.',
                    'price' => 'From $250/event',
                    'duration' => 'Event duration',
                    'features' => "Professional equipment\nMultiple camera angles available\nAudio recording\nBasic editing included\nDigital delivery\nHighlight reels available"
                ),
                'Logo design' => array(
                    'description' => 'Our logo design service creates a distinctive visual identity for your business or project. Through careful consideration of your brand values and target audience, we develop unique, memorable logos that work across multiple applications and formats.',
                    'price' => 'From $299',
                    'duration' => '5-10 days',
                    'features' => "Multiple concept options\nUnlimited revisions\nVector file formats\nColor and black/white versions\nBrand guide included\nAll necessary file formats delivered"
                ),
                'Resume writing' => array(
                    'description' => 'Our resume writing service creates professional, attention-grabbing resumes that highlight your skills and experience. We optimize your resume for applicant tracking systems while crafting compelling content that showcases your unique value to potential employers.',
                    'price' => 'From $149',
                    'duration' => '2-5 days',
                    'features' => "ATS-optimized formatting\nProfessional writing and editing\nKeyword optimization\nAchievement-focused content\nMatching cover letter available\nDigital and print-ready files"
                ),
                'Voiceover work' => array(
                    'description' => 'Our voiceover service provides professional narration for your videos, commercials, phone systems, or other audio needs. With clear diction, appropriate tone, and high-quality recording, we deliver polished audio that enhances your projects.',
                    'price' => 'From $50/minute',
                    'duration' => '1-3 days',
                    'features' => "Professional voice talent\nHigh-quality audio recording\nMultiple style options\nFile delivery in preferred format\nRevisions included\nBackground music available"
                ),
                'T-shirt & merch design' => array(
                    'description' => 'Our merchandise design service creates eye-catching graphics for t-shirts, mugs, hats, and other promotional items. We develop designs that align with your brand or event, optimized for various printing methods and materials.',
                    'price' => 'From $199',
                    'duration' => '3-7 days',
                    'features' => "Custom illustration and typography\nPrint-ready file formats\nMultiple mockup previews\nColor separations for screen printing\nDesign optimized for various products\nRevisions included"
                ),
                'Basic website setup (Wix/Shopify)' => array(
                    'description' => 'Our website setup service creates professional, functional websites using user-friendly platforms like Wix or Shopify. We handle design customization, content organization, basic SEO setup, and ensure your site is mobile-responsive and ready to launch.',
                    'price' => 'From $499',
                    'duration' => '1-2 weeks',
                    'features' => "Platform setup and configuration\nTemplate customization\nMobile-responsive design\nBasic SEO implementation\nContact forms and maps integration\nSocial media linking"
                )
            )
        ),
        'coaching' => array(
            'name' => '🎓 Coaching & Consulting',
            'services' => array(
                'Business coaching' => array(
                    'description' => 'Our business coaching service provides personalized guidance to help you overcome challenges, identify opportunities, and achieve your business goals. Through structured sessions, we offer strategies, accountability, and support tailored to your specific situation.',
                    'price' => 'From $150/session',
                    'duration' => '60-90 minutes',
                    'features' => "Personalized coaching plans\nStrategic goal setting\nAccountability frameworks\nBusiness growth strategies\nLeadership development\nVirtual or in-person options"
                ),
                'Life coaching' => array(
                    'description' => 'Our life coaching service helps you clarify goals, overcome obstacles, and create positive change in your personal and professional life. Through supportive guidance and practical strategies, we help you bridge the gap between where you are and where you want to be.',
                    'price' => 'From $125/session',
                    'duration' => '60 minutes',
                    'features' => "Personalized coaching approach\nGoal identification and planning\nAccountability partnership\nAction-oriented strategies\nObstacle identification and solutions\nProgress tracking and celebration"
                ),
                'Marketing consulting' => array(
                    'description' => 'Our marketing consulting service provides expert guidance to enhance your marketing strategy and execution. We analyze your current approach, identify opportunities, and develop actionable recommendations to improve your marketing effectiveness and return on investment.',
                    'price' => 'From $125/hour',
                    'duration' => 'Project-based',
                    'features' => "Marketing audit and analysis\nStrategy development\nTarget audience identification\nChannel selection and optimization\nMarketing materials review\nPerformance metrics establishment"
                ),
                'Social media consulting' => array(
                    'description' => 'Our social media consulting service helps you develop and implement effective social media strategies. We assess your current presence, identify the right platforms for your goals, and provide actionable recommendations to grow engagement and achieve business objectives.',
                    'price' => 'From $99/hour',
                    'duration' => 'Project-based',
                    'features' => "Platform audit and recommendations\nContent strategy development\nAudience growth tactics\nEngagement improvement strategies\nAnalytics review and interpretation\nCompetitor analysis"
                ),
                'Relationship coaching' => array(
                    'description' => 'Our relationship coaching service helps couples and individuals improve communication, resolve conflicts, and build stronger connections. Through guided conversations and practical tools, we help you create healthier, more fulfilling relationships.',
                    'price' => 'From $125/session',
                    'duration' => '60-90 minutes',
                    'features' => "Communication skill development\nConflict resolution strategies\nIndividual or couples sessions\nPractical relationship tools\nBoundary setting guidance\nAction plans for improvement"
                ),
                'Productivity/time management coaching' => array(
                    'description' => 'Our productivity coaching service helps you overcome procrastination, optimize your workflow, and accomplish more with less stress. We provide personalized systems, time management strategies, and accountability to transform your effectiveness.',
                    'price' => 'From $99/session',
                    'duration' => '60 minutes',
                    'features' => "Personalized productivity assessment\nCustomized systems and workflows\nPrioritization strategies\nProcrastination-busting techniques\nDigital organization guidance\nProgress tracking and accountability"
                ),
                'Accountability coaching' => array(
                    'description' => 'Our accountability coaching service provides the structure, motivation, and follow-through support you need to achieve your goals. Through regular check-ins, progress tracking, and personalized strategies, we help you stay focused and committed to your objectives.',
                    'price' => 'From $99/session',
                    'duration' => '30-60 minutes',
                    'features' => "Regular accountability check-ins\nGoal breakdown and milestone setting\nObstacle identification and solutions\nProgress tracking systems\nCelebration of wins\nReminders and gentle nudging"
                ),
                'Confidence or public speaking coaching' => array(
                    'description' => 'Our confidence coaching service helps you overcome self-doubt and develop authentic self-assurance in professional and personal situations. We provide practical techniques, feedback, and support to build your confidence in public speaking and everyday interactions.',
                    'price' => 'From $125/session',
                    'duration' => '60 minutes',
                    'features' => "Confidence building exercises\nPublic speaking practice\nBody language optimization\nVoice projection techniques\nNervousness management strategies\nPersonalized feedback and guidance"
                )
            )
        ),
        'office' => array(
            'name' => '💼 Office & Admin Services',
            'services' => array(
                'Virtual assistant' => array(
                    'description' => 'Our virtual assistant service provides remote administrative support for your business or personal needs. We handle email management, scheduling, research, data entry, and other tasks, freeing your time for higher-priority activities while ensuring essential functions are completed efficiently.',
                    'price' => 'From $25/hour',
                    'duration' => 'As needed',
                    'features' => "Email management\nCalendar scheduling\nTravel arrangements\nFile organization\nPhone call handling\nCustomized task packages"
                ),
                'Data entry' => array(
                    'description' => 'Our data entry service accurately transfers information from various sources into your desired digital formats. With attention to detail and efficiency, we ensure your data is organized, validated, and ready for analysis or operational use.',
                    'price' => 'From $20/hour',
                    'duration' => 'Project-based',
                    'features' => "Accurate data transfer\nData validation and verification\nVarious format capabilities\nSpreadsheet organization\nDatabase entry\nConfidentiality guaranteed"
                ),
                'Email inbox management' => array(
                    'description' => 'Our email management service organizes, prioritizes, and processes your overwhelming inbox. We sort messages, respond to routine inquiries, flag important emails, and implement systems to maintain order, reducing your email stress and ensuring nothing important is missed.',
                    'price' => 'From $25/hour',
                    'duration' => 'Regular or one-time',
                    'features' => "Inbox organization and sorting\nPriority flagging system\nResponse drafting\nFolder structure creation\nEmail filtering setup\nRegular maintenance available"
                ),
                'Transcription services' => array(
                    'description' => 'Our transcription service accurately converts audio or video recordings into written text. Whether for interviews, meetings, podcasts, or lectures, we provide clear, well-formatted transcripts with optional timestamps and speaker identification.',
                    'price' => 'From $1.25/minute',
                    'duration' => '24-48 hours',
                    'features' => "Audio/video to text conversion\nVerbatim or clean read options\nTimestamp inclusion available\nSpeaker identification\nFast turnaround times\nVarious file format delivery"
                ),
                'Online research assistant' => array(
                    'description' => 'Our research assistance service provides thorough, accurate information gathering for your business or personal projects. We conduct comprehensive online research, verify sources, organize findings, and deliver clear, actionable results tailored to your specific needs.',
                    'price' => 'From $30/hour',
                    'duration' => 'Project-based',
                    'features' => "Comprehensive information gathering\nSource verification\nOrganized research reports\nCompetitor analysis\nTrend identification\nData visualization options"
                ),
                'Bookkeeping (note: CPA not required unless advertising as accountant)' => array(
                    'description' => 'Our basic bookkeeping service helps small businesses maintain organized financial records. We manage transaction recording, categorization, reconciliation, and basic financial reports, providing you with clear visibility into your business finances.',
                    'price' => 'From $35/hour',
                    'duration' => 'Monthly or quarterly',
                    'features' => "Transaction recording and categorization\nBank and credit card reconciliation\nBasic financial reports\nReceipt organization\nInvoice tracking\nRegular financial reviews"
                ),
                'CRM/data organization setup' => array(
                    'description' => 'Our CRM setup service implements and organizes your customer relationship management system. We configure the platform, import and clean data, create workflows, and provide basic training, ensuring you have an effective system to manage customer relationships.',
                    'price' => 'From $299',
                    'duration' => '1-2 weeks',
                    'features' => "CRM platform selection assistance\nSystem configuration\nData import and cleaning\nWorkflow and automation setup\nBasic user training\nOngoing support available"
                ),
                'Cold calling or appointment setting' => array(
                    'description' => 'Our appointment setting service connects your business with potential clients through professional outreach. We handle cold calling, qualify prospects, overcome objections, and schedule appointments with interested parties, filling your sales pipeline with quality opportunities.',
                    'price' => 'From $25/hour',
                    'duration' => 'Campaign-based',
                    'features' => "Professional call scripts\nProspect qualification\nAppointment scheduling\nCRM updating\nDetailed call reporting\nLead nurturing follow-up"
                ),
                'Customer service outsourcing' => array(
                    'description' => 'Our customer service support handles inquiries, resolves issues, and maintains positive client relationships on behalf of your business. Through phone, email, or chat, we provide professional, responsive service that reflects your company values and builds customer loyalty.',
                    'price' => 'From $25/hour',
                    'duration' => 'As needed',
                    'features' => "Inquiry response and resolution\nOrder status updates\nProduct information assistance\nComplaint handling\nCustomized service protocols\nMultiple communication channels"
                ),
                'Print-on-demand order management' => array(
                    'description' => 'Our print-on-demand management service handles the operations of your POD business. From processing orders and coordinating with suppliers to tracking shipments and managing customer inquiries, we ensure your merchandise business runs smoothly without requiring your daily attention.',
                    'price' => 'From $399/month',
                    'duration' => 'Ongoing',
                    'features' => "Order processing and verification\nSupplier coordination\nShipment tracking\nInventory monitoring\nCustomer inquiry management\nReturn/exchange handling"
                )
            )
        ),
        'selling' => array(
            'name' => '📦 Selling, Flipping & Setup',
            'services' => array(
                'Furniture flipping' => array(
                    'description' => 'Our furniture flipping service transforms outdated or damaged pieces into stylish, functional items. We handle sourcing, restoration, refinishing, and optional selling assistance, creating beautiful furniture while maximizing your investment in unwanted pieces.',
                    'price' => 'From $150 + materials',
                    'duration' => '1-3 weeks',
                    'features' => "Furniture selection assistance\nSurface preparation and repair\nProfessional painting/staining\nHardware replacement\nUpholstery recommendations\nSelling assistance available"
                ),
                'Product sourcing for others' => array(
                    'description' => 'Our product sourcing service finds the specific items you need for your business or personal use. Whether you\'re seeking unique merchandise, specific supplies, or hard-to-find products, we research options, compare prices, and facilitate purchases to save you time and effort.',
                    'price' => 'From 15% of purchase',
                    'duration' => 'Varies',
                    'features' => "Extensive vendor research\nPrice comparison and negotiation\nQuality verification\nPurchasing coordination\nImport assistance when needed\nLogistics management"
                ),
                'Drop-off eBay/Amazon seller (you sell items for others)' => array(
                    'description' => 'Our selling service handles the entire process of selling your unwanted items online. We photograph, list, manage inquiries, package, and ship your items on platforms like eBay or Amazon, maximizing your return while eliminating the hassle of online selling.',
                    'price' => 'From 30% of sale price',
                    'duration' => 'Until sold',
                    'features' => "Professional photography\nDetailed item listings\nPricing strategy\nBuyer inquiry management\nSecure packaging\nShipping coordination"
                ),
                'Home office or gaming setup installer' => array(
                    'description' => 'Our setup service creates optimal home office or gaming environments tailored to your needs. We assemble furniture, install equipment, manage cables, optimize ergonomics, and ensure everything works together seamlessly for maximum productivity and comfort.',
                    'price' => 'From $199',
                    'duration' => '2-6 hours',
                    'features' => "Equipment assembly and installation\nErgonomic arrangement\nCable management solutions\nConnectivity optimization\nSoftware setup assistance\nCustomized workspace design"
                ),
                'Party rental setup (tables, chairs, bounce houses – no operator)' => array(
                    'description' => 'Our rental setup service delivers, installs, and later removes party equipment for your event. We ensure proper placement and setup of tables, chairs, tents, bounce houses, and other rentals, allowing you to focus on hosting while we handle the heavy lifting.',
                    'price' => 'From $150',
                    'duration' => 'Setup/breakdown',
                    'features' => "Equipment delivery and transport\nProfessional setup and installation\nStrategic placement guidance\nSafety checks and securing\nPost-event breakdown\nPrompt equipment removal"
                )
            )
        )
    );
    
    // Create services posts for each category
    foreach ($service_data as $cat_slug => $category) {
        // Get the category term
        $term = get_term_by('slug', $cat_slug, 'service_category');
        
        if (!$term) {
            continue; // Skip if category doesn't exist
        }
        
        // Loop through services and create posts
        foreach ($category['services'] as $service_name => $service_details) {
            // Check if this service already exists
            $existing_posts = get_posts(array(
                'post_type' => 'services',
                'title' => $service_name,
                'posts_per_page' => 1,
                'post_status' => 'any'
            ));
            
            if (!empty($existing_posts)) {
                continue; // Skip if service already exists
            }
            
            // Create post
            $post_id = wp_insert_post(array(
                'post_title' => $service_name,
                'post_content' => $service_details['description'],
                'post_status' => 'publish',
                'post_type' => 'services',
                'post_excerpt' => wp_trim_words($service_details['description'], 25)
            ));
            
            if ($post_id) {
                // Set category
                wp_set_object_terms($post_id, $term->term_id, 'service_category');
                
                // Add meta data
                if (isset($service_details['price'])) {
                    update_post_meta($post_id, '_service_price', $service_details['price']);
                }
                
                if (isset($service_details['duration'])) {
                    update_post_meta($post_id, '_service_duration', $service_details['duration']);
                }
                
                if (isset($service_details['features'])) {
                    update_post_meta($post_id, '_service_features', $service_details['features']);
                }
            }
        }
    }
    
    // Mark as generated
    update_option('service_posts_generated', true);
}
add_action('init', 'generate_service_posts', 30); // Run after categories are created

// Add Service Categories to WordPress menu editor
function add_service_categories_nav_menu_meta_box($object) {
    if ($object->name === 'service_category') {
        $object->_default_query = array(
            'orderby' => 'name', 
            'order' => 'ASC',
            'hide_empty' => false
        );
    }
    return $object;
}

// Add Service Categories to the menu items metabox list
function add_service_category_meta_box() {
    add_meta_box(
        'service-category-metabox',
        'Service Categories',
        'service_category_meta_box_callback',
        'nav-menus',
        'side',
        'default'
    );
}
add_action('admin_init', 'add_service_category_meta_box');

// Callback for the Service Categories metabox
function service_category_meta_box_callback() {
    ?>
    <div id="taxonomy-service_category" class="categorydiv">
        <ul id="taxonomy-service_category-tabs" class="category-tabs">
            <li class="tabs"><a href="#service_category-all">View All</a></li>
        </ul>
        <div id="service_category-all" class="tabs-panel tabs-panel-view-all tabs-panel-active">
            <ul id="service_category-checklist" class="categorychecklist form-no-clear">
                <?php
                $categories = get_terms(array(
                    'taxonomy' => 'service_category',
                    'hide_empty' => false
                ));
                
                if (!empty($categories) && !is_wp_error($categories)) {
                    foreach ($categories as $category) {
                        ?>
                        <li>
                            <label class="menu-item-title">
                                <input type="checkbox" class="menu-item-checkbox" name="menu-item[<?php echo esc_attr($category->term_id); ?>][menu-item-object-id]" value="<?php echo esc_attr($category->term_id); ?>">
                                <?php echo esc_html($category->name); ?>
                            </label>
                            <input type="hidden" class="menu-item-type" name="menu-item[<?php echo esc_attr($category->term_id); ?>][menu-item-type]" value="taxonomy">
                            <input type="hidden" class="menu-item-object" name="menu-item[<?php echo esc_attr($category->term_id); ?>][menu-item-object]" value="service_category">
                            <input type="hidden" class="menu-item-title" name="menu-item[<?php echo esc_attr($category->term_id); ?>][menu-item-title]" value="<?php echo esc_html($category->name); ?>">
                            <input type="hidden" class="menu-item-url" name="menu-item[<?php echo esc_attr($category->term_id); ?>][menu-item-url]" value="<?php echo esc_url(get_term_link($category)); ?>">
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
        <p class="button-controls wp-clearfix">
            <span class="add-to-menu">
                <input type="submit" class="button-secondary submit-add-to-menu right" value="Add to Menu" name="add-taxonomy-menu-item" id="submit-taxonomy-service_category">
                <span class="spinner"></span>
            </span>
        </p>
    </div>
    <?php
}

// Add custom fields for services
function services_meta_boxes() {
    add_meta_box(
        'service_details',
        'Service Details',
        'service_details_callback',
        'services',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'services_meta_boxes');

function service_details_callback($post) {
    wp_nonce_field(basename(__FILE__), 'service_nonce');
    $service_price = get_post_meta($post->ID, '_service_price', true);
    $service_duration = get_post_meta($post->ID, '_service_duration', true);
    $service_features = get_post_meta($post->ID, '_service_features', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="service_price">Price</label></th>
            <td><input type="text" id="service_price" name="service_price" value="<?php echo esc_attr($service_price); ?>" /></td>
        </tr>
        <tr>
            <th><label for="service_duration">Duration</label></th>
            <td><input type="text" id="service_duration" name="service_duration" value="<?php echo esc_attr($service_duration); ?>" /></td>
        </tr>
        <tr>
            <th><label for="service_features">Features (one per line)</label></th>
            <td><textarea id="service_features" name="service_features" rows="5" cols="50"><?php echo esc_textarea($service_features); ?></textarea></td>
        </tr>
    </table>
    <?php
}

function save_service_details($post_id) {
    if (!isset($_POST['service_nonce']) || !wp_verify_nonce($_POST['service_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if ('services' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } else {
        if (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
    }

    $service_price = sanitize_text_field($_POST['service_price']);
    $service_duration = sanitize_text_field($_POST['service_duration']);
    $service_features = sanitize_textarea_field($_POST['service_features']);

    update_post_meta($post_id, '_service_price', $service_price);
    update_post_meta($post_id, '_service_duration', $service_duration);
    update_post_meta($post_id, '_service_features', $service_features);
}
add_action('save_post', 'save_service_details');

// Customizer settings
function services_pro_customize_register($wp_customize) {
    // Hero section
    $wp_customize->add_section('hero_section', array(
        'title' => __('Hero Section', 'services-pro'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('hero_title', array(
        'default' => 'Professional Home & Cleaning Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero Title', 'services-pro'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Reliable, professional services for your home and lifestyle needs',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Hero Subtitle', 'services-pro'),
        'section' => 'hero_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('hero_button_text', array(
        'default' => 'Get Started Today',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_button_text', array(
        'label' => __('Hero Button Text', 'services-pro'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_button_url', array(
        'default' => '#contact',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('hero_button_url', array(
        'label' => __('Hero Button URL', 'services-pro'),
        'section' => 'hero_section',
        'type' => 'url',
    ));

    // Contact information
    $wp_customize->add_section('contact_info', array(
        'title' => __('Contact Information', 'services-pro'),
        'priority' => 35,
    ));

    $wp_customize->add_setting('contact_phone', array(
        'default' => '(555) 123-4567',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_phone', array(
        'label' => __('Phone Number', 'services-pro'),
        'section' => 'contact_info',
        'type' => 'text',
    ));

    $wp_customize->add_setting('contact_email', array(
        'default' => 'info@servicespro.com',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('contact_email', array(
        'label' => __('Email Address', 'services-pro'),
        'section' => 'contact_info',
        'type' => 'email',
    ));

    $wp_customize->add_setting('contact_address', array(
        'default' => '123 Service Street, Your City, ST 12345',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('contact_address', array(
        'label' => __('Address', 'services-pro'),
        'section' => 'contact_info',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'services_pro_customize_register');

// Helper function to get service categories with icons
// We're not using this approach as it causes errors
// function add_service_categories_to_menu($items, $menu, $args) {
//     // Implementation removed due to warnings
// }
// add_filter('wp_get_nav_menu_items', 'add_service_categories_to_menu', 10, 3);

// Register service_category taxonomy for WP menu system
function register_service_category_in_menu() {
    register_nav_menu('services-menu', 'Services Menu');
    
    if (is_admin()) {
        // Make taxonomy available to menu editor
        $taxonomies = get_taxonomies(array('show_in_nav_menus' => true), 'object');
        if (!isset($taxonomies['service_category'])) {
            register_taxonomy_for_object_type('service_category', 'nav_menu_item');
            add_action('admin_head-nav-menus.php', 'add_service_category_menu_meta_box');
        }
    }
}
add_action('init', 'register_service_category_in_menu', 11);

// Create service category archive links
function service_category_archive_link($term) {
    return get_term_link($term);
}

// Add icons to service category menu items
function add_service_category_icons_to_menu($items) {
    $service_categories = get_service_categories_with_icons();
    
    foreach ($items as $key => $item) {
        // Check if this is a service category menu item
        if ($item->object === 'service_category') {
            $term = get_term($item->object_id, 'service_category');
            
            if ($term && !is_wp_error($term)) {
                // Find matching icon for this category
                $icon = '';
                
                foreach ($service_categories as $slug => $data) {
                    // Match by slug or name
                    if ($slug === $term->slug || strpos($term->name, $data['title']) !== false) {
                        $icon = $data['icon'];
                        break;
                    }
                }
                
                if ($icon) {
                    // Add the icon to the title
                    $item->title = '<span class="service-category-icon">' . $icon . '</span> ' . $item->title;
                }
            }
        }
    }
    
    return $items;
}
add_filter('wp_nav_menu_objects', 'add_service_category_icons_to_menu');

// Get icon for a service category
function get_service_category_icon($term_id_or_slug) {
    $service_categories = get_service_categories_with_icons();
    $term = null;
    
    if (is_numeric($term_id_or_slug)) {
        $term = get_term($term_id_or_slug, 'service_category');
    } else {
        $term = get_term_by('slug', $term_id_or_slug, 'service_category');
    }
    
    if ($term && !is_wp_error($term)) {
        foreach ($service_categories as $slug => $data) {
            if ($slug === $term->slug || strpos($term->name, $data['title']) !== false) {
                return $data['icon'];
            }
        }
    }
    
    // Default icon if no match is found
    return '🔧';
}

// Add icon to service category archive title
function add_icon_to_service_category_title($title) {
    if (is_tax('service_category')) {
        $term = get_queried_object();
        $icon = get_service_category_icon($term->term_id);
        
        if ($icon) {
            return '<span class="category-icon">' . $icon . '</span>' . $title;
        }
    }
    
    return $title;
}
add_filter('get_the_archive_title', 'add_icon_to_service_category_title');

// Allow HTML in menu item titles
function allow_html_in_menu_titles($title) {
    return $title;
}
add_filter('nav_menu_item_title', 'allow_html_in_menu_titles');

// Add a menu shortcode to display service categories
function service_categories_menu_shortcode() {
    $categories = get_terms(array(
        'taxonomy' => 'service_category',
        'hide_empty' => false,
    ));
    
    if (empty($categories) || is_wp_error($categories)) {
        return '';
    }
    
    $output = '<ul class="service-menu">';
    
    foreach ($categories as $category) {
        // Get icon from the array
        $icon = '';
        $category_icons = get_service_categories_with_icons();
        
        foreach ($category_icons as $key => $data) {
            if ($key === $category->slug || strpos($category->name, $data['title']) !== false) {
                $icon = $data['icon'];
                break;
            }
        }
        
        $output .= '<li>';
        $output .= '<a href="' . esc_url(get_term_link($category)) . '">';
        
        if ($icon) {
            $output .= '<span class="service-icon">' . $icon . '</span> ';
        }
        
        $output .= esc_html($category->name);
        $output .= '</a>';
        $output .= '</li>';
    }
    
    $output .= '</ul>';
    
    return $output;
}
add_shortcode('service_categories_menu', 'service_categories_menu_shortcode');

// This function has been moved to a more appropriate location in the file
// and is now using data from get_service_categories()

// Include the service content generator
require_once get_template_directory() . '/service-content-generator.php';

// Include navigation helpers
require_once get_template_directory() . '/navigation-helpers.php';

// Clean Navigation Walker Class for Standards-Compliant Header
class Clean_Walker_Nav_Menu extends Walker_Nav_Menu {
    
    // Start Level - for dropdown <ul>
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

    // End Level
    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    // Start Element - for each <li>
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $args = (object) $args;
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Add has-dropdown class for items with children
        $has_children = in_array('menu-item-has-children', $classes);
        if ($has_children) {
            $classes[] = 'has-dropdown';
        }

        // Add current/active classes
        if (in_array('current-menu-item', $classes)) {
            $classes[] = 'current';
        }
        if (in_array('current-menu-parent', $classes) || in_array('current-menu-ancestor', $classes)) {
            $classes[] = 'current-parent';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $attributes = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) .'"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="'    . esc_attr($item->xfn) .'"' : '';
        $attributes .= !empty($item->url) ? ' href="'   . esc_attr($item->url) .'"' : '';

        // Add ARIA attributes for accessibility
        if ($has_children) {
            $attributes .= ' aria-haspopup="true" aria-expanded="false"';
        }

        $item_output = $args->before ?? '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= ($args->link_before ?? '') . apply_filters('the_title', $item->title, $item->ID) . ($args->link_after ?? '');

        // Add dropdown indicator for parent items
        if ($has_children) {
            $item_output .= ' <span class="dropdown-toggle" aria-hidden="true"></span>';
        }

        $item_output .= '</a>';
        $item_output .= $args->after ?? '';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    // End Element
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}

// Clean navigation fallback function
function clean_navigation_fallback() {
    echo '<ul id="primary-menu" class="nav-menu">';
    echo '<li class="menu-item"><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    echo '<li class="menu-item"><a href="' . esc_url(home_url('/about')) . '">About</a></li>';
    
    // Services with dropdown if service categories exist
    $service_categories = get_terms(array(
        'taxonomy' => 'service_category',
        'hide_empty' => false,
    ));
    
    if (!empty($service_categories)) {
        echo '<li class="menu-item has-dropdown">';
        echo '<a href="' . esc_url(home_url('/services')) . '" aria-haspopup="true" aria-expanded="false">';
        echo 'Services <span class="dropdown-toggle" aria-hidden="true"></span>';
        echo '</a>';
        echo '<ul class="sub-menu">';
        
        foreach ($service_categories as $category) {
            echo '<li class="menu-item">';
            echo '<a href="' . esc_url(get_term_link($category)) . '">' . esc_html($category->name) . '</a>';
            echo '</li>';
        }
        
        echo '</ul>';
        echo '</li>';
    } else {
        echo '<li class="menu-item"><a href="' . esc_url(home_url('/services')) . '">Services</a></li>';
    }
    
    echo '<li class="menu-item"><a href="' . esc_url(home_url('/contact')) . '">Contact</a></li>';
    echo '</ul>';
}

// Add body classes for clean header
function clean_header_body_classes($classes) {
    // Add class if primary menu exists
    if (has_nav_menu('primary')) {
        $classes[] = 'has-navigation';
    } else {
        $classes[] = 'has-fallback-navigation';
    }
    
    // Add class for current page context
    if (is_front_page()) {
        $classes[] = 'header-home';
    } elseif (is_page()) {
        $classes[] = 'header-page';
    } elseif (is_single()) {
        $classes[] = 'header-single';
    } elseif (is_archive()) {
        $classes[] = 'header-archive';
    }
    
    return $classes;
}
add_filter('body_class', 'clean_header_body_classes');

// Modern Navigation Walker Classes for Redesigned Header
class Modern_Navigation_Walker extends Walker_Nav_Menu {
    // Start the list of links
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $class_names = ($depth === 0) ? 'dropdown-menu mega-menu' : 'sub-dropdown-menu';
        $output .= "\n$indent<ul class=\"$class_names\" role=\"menu\">\n";
    }

    // End the list of links
    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    // Start the element output
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $args = (object) $args;
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Add depth-specific classes
        if ($depth === 0) {
            $classes[] = 'nav-item';
        } else {
            $classes[] = 'dropdown-item';
        }

        // Check if menu item has children
        $has_children = in_array('menu-item-has-children', $classes);
        if ($has_children) {
            $classes[] = 'has-dropdown';
        }

        // Current page highlighting
        if (in_array('current-menu-item', $classes)) {
            $classes[] = 'active';
        }
        if (in_array('current-menu-parent', $classes)) {
            $classes[] = 'active-parent';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $attributes = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) .'"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="'    . esc_attr($item->xfn) .'"' : '';
        $attributes .= !empty($item->url) ? ' href="'   . esc_attr($item->url) .'"' : '';

        // Add accessibility attributes
        if ($has_children) {
            $attributes .= ' aria-haspopup="true" aria-expanded="false"';
        }

        $link_classes = ($depth === 0) ? 'nav-link' : 'dropdown-link';
        
        $item_output = $args->before ?? '';
        $item_output .= '<a class="' . $link_classes . '"' . $attributes . '>';
        
        // Add icon for services
        if (strpos(strtolower($item->title), 'service') !== false && $depth === 0) {
            $item_output .= '<i class="fas fa-tools nav-icon" aria-hidden="true"></i>';
        }
        
        $item_output .= ($args->link_before ?? '') . apply_filters('the_title', $item->title, $item->ID) . ($args->link_after ?? '');
        
        // Add dropdown arrow for parent items
        if ($has_children) {
            $arrow_class = ($depth === 0) ? 'dropdown-arrow' : 'sub-dropdown-arrow';
            $item_output .= '<i class="fas fa-chevron-down ' . $arrow_class . '" aria-hidden="true"></i>';
        }
        
        $item_output .= '</a>';
        $item_output .= $args->after ?? '';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    // End the element output
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}

class Modern_Mobile_Navigation_Walker extends Walker_Nav_Menu {
    // Start the list of links
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"mobile-sub-menu\">\n";
    }

    // End the list of links
    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    // Start the element output
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $args = (object) $args;
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'mobile-menu-item';
        $classes[] = 'mobile-menu-item-' . $item->ID;

        // Check if menu item has children
        $has_children = in_array('menu-item-has-children', $classes);
        if ($has_children) {
            $classes[] = 'mobile-has-sub';
        }

        // Current page highlighting
        if (in_array('current-menu-item', $classes)) {
            $classes[] = 'mobile-active';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'mobile-menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $attributes = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) .'"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="'    . esc_attr($item->xfn) .'"' : '';
        $attributes .= !empty($item->url) ? ' href="'   . esc_attr($item->url) .'"' : '';

        $item_output = $args->before ?? '';
        $item_output .= '<a class="mobile-nav-link"' . $attributes . '>';
        
        // Add service icon
        if (strpos(strtolower($item->title), 'service') !== false && $depth === 0) {
            $item_output .= '<i class="fas fa-tools mobile-nav-icon" aria-hidden="true"></i>';
        }
        
        $item_output .= ($args->link_before ?? '') . apply_filters('the_title', $item->title, $item->ID) . ($args->link_after ?? '');
        $item_output .= '</a>';
        
        // Add submenu toggle for parent items
        if ($has_children) {
            $item_output .= '<button class="mobile-sub-toggle" aria-label="Toggle submenu"><i class="fas fa-plus" aria-hidden="true"></i></button>';
        }
        
        $item_output .= $args->after ?? '';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    // End the element output
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}

// Fallback function for desktop navigation
function modern_navigation_fallback() {
    echo '<ul class="primary-nav-menu nav-fallback">';
    echo '<li class="nav-item"><a href="' . esc_url(home_url('/')) . '" class="nav-link"><i class="fas fa-home nav-icon" aria-hidden="true"></i>Home</a></li>';
    echo '<li class="nav-item"><a href="' . esc_url(home_url('/about')) . '" class="nav-link">About</a></li>';
    
    // Services dropdown
    echo '<li class="nav-item has-dropdown">';
    echo '<a href="' . esc_url(home_url('/services')) . '" class="nav-link" aria-haspopup="true" aria-expanded="false">';
    echo '<i class="fas fa-tools nav-icon" aria-hidden="true"></i>Services<i class="fas fa-chevron-down dropdown-arrow" aria-hidden="true"></i>';
    echo '</a>';
    echo '<ul class="dropdown-menu mega-menu" role="menu">';
    
    // Get service categories
    $service_categories = get_terms(array(
        'taxonomy' => 'service_category',
        'hide_empty' => false,
    ));
    
    if (!empty($service_categories)) {
        foreach ($service_categories as $category) {
            echo '<li class="dropdown-item">';
            echo '<a href="' . esc_url(get_term_link($category)) . '" class="dropdown-link">' . esc_html($category->name) . '</a>';
            echo '</li>';
        }
    }
    
    echo '</ul>';
    echo '</li>';
    
    echo '<li class="nav-item"><a href="' . esc_url(home_url('/portfolio')) . '" class="nav-link">Portfolio</a></li>';
    echo '<li class="nav-item"><a href="' . esc_url(home_url('/contact')) . '" class="nav-link">Contact</a></li>';
    echo '</ul>';
}

// Fallback function for mobile navigation
function modern_mobile_navigation_fallback() {
    echo '<ul class="mobile-nav-menu mobile-fallback">';
    echo '<li class="mobile-menu-item"><a href="' . esc_url(home_url('/')) . '" class="mobile-nav-link"><i class="fas fa-home mobile-nav-icon" aria-hidden="true"></i>Home</a></li>';
    echo '<li class="mobile-menu-item"><a href="' . esc_url(home_url('/about')) . '" class="mobile-nav-link">About</a></li>';
    
    // Services with submenu
    echo '<li class="mobile-menu-item mobile-has-sub">';
    echo '<a href="' . esc_url(home_url('/services')) . '" class="mobile-nav-link">';
    echo '<i class="fas fa-tools mobile-nav-icon" aria-hidden="true"></i>Services';
    echo '</a>';
    echo '<button class="mobile-sub-toggle" aria-label="Toggle services submenu"><i class="fas fa-plus" aria-hidden="true"></i></button>';
    echo '<ul class="mobile-sub-menu">';
    
    // Get service categories
    $service_categories = get_terms(array(
        'taxonomy' => 'service_category',
        'hide_empty' => false,
    ));
    
    if (!empty($service_categories)) {
        foreach ($service_categories as $category) {
            echo '<li class="mobile-menu-item">';
            echo '<a href="' . esc_url(get_term_link($category)) . '" class="mobile-nav-link">' . esc_html($category->name) . '</a>';
            echo '</li>';
        }
    }
    
    echo '</ul>';
    echo '</li>';
    
    echo '<li class="mobile-menu-item"><a href="' . esc_url(home_url('/portfolio')) . '" class="mobile-nav-link">Portfolio</a></li>';
    echo '<li class="mobile-menu-item"><a href="' . esc_url(home_url('/contact')) . '" class="mobile-nav-link">Contact</a></li>';
    echo '</ul>';
}
?>
