<?php
/**
 * Template Name: Services Page
 * 
 * The template for displaying all services with categories
 *
 * @package Blueprint
 */

get_header(); 

// Enqueue page-services-inline CSS
wp_enqueue_style('page-services-inline', get_template_directory_uri() . '/css/page-services-inline.css', array(), '1.0');
?>

<div class="services-page-wrapper">
    <!-- Hero Section -->
    <section class="services-hero py-5 bg-gradient-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="hero-content text-white">
                        <div class="hero-badge mb-3">
                            <span class="badge bg-white text-primary px-3 py-2 rounded-pill fs-6">
                                <i class="bi bi-tools me-2"></i>
                                <?php esc_html_e('Our Services', 'blueprint'); ?>
                            </span>
                        </div>
                        <h1 class="display-4 fw-bold mb-4">
                            <?php esc_html_e('Professional Services for Every Need', 'blueprint'); ?>
                        </h1>
                        <p class="lead mb-4">
                            <?php esc_html_e('From home cleaning to digital services, we provide comprehensive solutions to make your life easier and your business more successful.', 'blueprint'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Categories -->
    <section class="services-categories py-5">
        <div class="container">
            <!-- Home & Cleaning Services -->
            <div class="service-category mb-5">
                <div class="category-header text-center mb-4">
                    <h2 class="display-5 fw-bold mb-3">
                        <i class="bi bi-house-heart text-primary me-3"></i>
                        <?php esc_html_e('🧹 Home & Cleaning Services', 'blueprint'); ?>
                    </h2>
                    <p class="lead text-muted">
                        <?php esc_html_e('Professional cleaning and home maintenance services', 'blueprint'); ?>
                    </p>
                </div>
                <div class="row g-4">
                    <?php 
                    $cleaning_services = array(
                        'house-cleaning' => 'House Cleaning',
                        'move-in-out-cleaning' => 'Move-in/Move-out Cleaning',
                        'pressure-washing' => 'Pressure Washing',
                        'gutter-cleaning' => 'Gutter Cleaning',
                        'window-cleaning' => 'Window Cleaning',
                        'carpet-shampooing' => 'Carpet Shampooing',
                        'garage-attic-organization' => 'Garage/Attic Organization',
                        'trash-hauling-junk-removal' => 'Trash Hauling & Junk Removal',
                        'airbnb-cleaning-reset' => 'Airbnb Cleaning & Reset Services',
                        'lawn-mowing-yard-maintenance' => 'Lawn Mowing and Yard Maintenance'
                    );
                    
                    foreach ($cleaning_services as $slug => $title) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-card bg-white rounded-4 shadow-sm p-4 h-100">
                            <div class="service-icon mb-3">
                                <i class="bi bi-house-check text-primary fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-3"><?php echo esc_html($title); ?></h5>
                            <p class="text-muted mb-4">Professional <?php echo strtolower($title); ?> services to keep your home spotless and organized.</p>
                            <a href="<?php echo esc_url(home_url('/services/' . $slug . '/')); ?>" class="btn btn-outline-primary">
                                <?php esc_html_e('Learn More', 'blueprint'); ?>
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Home & Property Maintenance -->
            <div class="service-category mb-5">
                <div class="category-header text-center mb-4">
                    <h2 class="display-5 fw-bold mb-3">
                        <i class="bi bi-tools text-warning me-3"></i>
                        <?php esc_html_e('🧰 Home & Property Maintenance', 'blueprint'); ?>
                    </h2>
                    <p class="lead text-muted">
                        <?php esc_html_e('Expert maintenance and repair services for your property', 'blueprint'); ?>
                    </p>
                </div>
                <div class="row g-4">
                    <?php 
                    $maintenance_services = array(
                        'furniture-assembly' => 'Furniture Assembly',
                        'tv-mounting' => 'TV Mounting',
                        'handyman-services' => 'Handyman Services',
                        'fence-painting' => 'Fence Painting',
                        'light-bulb-fixture-installation' => 'Light Bulb/Fixture Installation',
                        'basic-drywall-patching' => 'Basic Drywall Patching',
                        'mailbox-installation' => 'Mailbox Installation',
                        'holiday-light-hanging' => 'Holiday Light Hanging',
                        'lockout-assistance' => 'Lockout Assistance',
                        'pool-cleaning' => 'Pool Cleaning'
                    );
                    
                    foreach ($maintenance_services as $slug => $title) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-card bg-white rounded-4 shadow-sm p-4 h-100">
                            <div class="service-icon mb-3">
                                <i class="bi bi-wrench text-warning fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-3"><?php echo esc_html($title); ?></h5>
                            <p class="text-muted mb-4">Professional <?php echo strtolower($title); ?> services for your home and property needs.</p>
                            <a href="<?php echo esc_url(home_url('/services/' . $slug . '/')); ?>" class="btn btn-outline-warning">
                                <?php esc_html_e('Learn More', 'blueprint'); ?>
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Personal Errands & Concierge -->
            <div class="service-category mb-5">
                <div class="category-header text-center mb-4">
                    <h2 class="display-5 fw-bold mb-3">
                        <i class="bi bi-bag-check text-success me-3"></i>
                        <?php esc_html_e('🛍️ Personal Errands & Concierge', 'blueprint'); ?>
                    </h2>
                    <p class="lead text-muted">
                        <?php esc_html_e('Personal assistance and concierge services to save you time', 'blueprint'); ?>
                    </p>
                </div>
                <div class="row g-4">
                    <?php 
                    $errand_services = array(
                        'grocery-shopping-delivery' => 'Grocery Shopping/Delivery',
                        'prescription-pickup' => 'Prescription Pickup',
                        'waiting-in-line-service' => 'Waiting-in-line Service',
                        'personal-assistant-service' => 'Personal Assistant Service',
                        'moving-assistance' => 'Moving Assistance',
                        'courier-delivery-services' => 'Courier/Delivery Services',
                        'dog-waste-cleanup' => 'Dog Waste Cleanup',
                        'packing-unpacking-service' => 'Packing/Unpacking Service',
                        'decluttering-service' => 'Decluttering Service',
                        'plant-watering' => 'Plant Watering'
                    );
                    
                    foreach ($errand_services as $slug => $title) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-card bg-white rounded-4 shadow-sm p-4 h-100">
                            <div class="service-icon mb-3">
                                <i class="bi bi-person-check text-success fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-3"><?php echo esc_html($title); ?></h5>
                            <p class="text-muted mb-4">Reliable <?php echo strtolower($title); ?> services to help manage your daily tasks.</p>
                            <a href="<?php echo esc_url(home_url('/services/' . $slug . '/')); ?>" class="btn btn-outline-success">
                                <?php esc_html_e('Learn More', 'blueprint'); ?>
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Pet & Animal Services -->
            <div class="service-category mb-5">
                <div class="category-header text-center mb-4">
                    <h2 class="display-5 fw-bold mb-3">
                        <i class="bi bi-heart text-danger me-3"></i>
                        <?php esc_html_e('🐶 Pet & Animal Services', 'blueprint'); ?>
                    </h2>
                    <p class="lead text-muted">
                        <?php esc_html_e('Caring and professional pet services for your furry friends', 'blueprint'); ?>
                    </p>
                </div>
                <div class="row g-4">
                    <?php 
                    $pet_services = array(
                        'dog-walking' => 'Dog Walking',
                        'pet-sitting' => 'Pet Sitting',
                        'mobile-pet-grooming' => 'Mobile Pet Grooming',
                        'pet-poop-scooping' => 'Pet Poop Scooping Service',
                        'pet-taxi' => 'Pet Taxi',
                        'aquarium-cleaning' => 'Aquarium Cleaning',
                        'pet-yard-deodorizing' => 'Pet Yard Deodorizing'
                    );
                    
                    foreach ($pet_services as $slug => $title) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-card bg-white rounded-4 shadow-sm p-4 h-100">
                            <div class="service-icon mb-3">
                                <i class="bi bi-heart-fill text-danger fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-3"><?php echo esc_html($title); ?></h5>
                            <p class="text-muted mb-4">Professional <?php echo strtolower($title); ?> services with care and attention to your pets.</p>
                            <a href="<?php echo esc_url(home_url('/services/' . $slug . '/')); ?>" class="btn btn-outline-danger">
                                <?php esc_html_e('Learn More', 'blueprint'); ?>
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Child & Family Support -->
            <div class="service-category mb-5">
                <div class="category-header text-center mb-4">
                    <h2 class="display-5 fw-bold mb-3">
                        <i class="bi bi-people text-info me-3"></i>
                        <?php esc_html_e('👶 Child & Family Support', 'blueprint'); ?>
                    </h2>
                    <p class="lead text-muted">
                        <?php esc_html_e('Supporting families with childcare and family assistance services', 'blueprint'); ?>
                    </p>
                </div>
                <div class="row g-4">
                    <?php 
                    $family_services = array(
                        'parent-helper-mothers-helper' => 'Parent Helper/Mother\'s Helper',
                        'babysitting' => 'Babysitting',
                        'toy-organization' => 'Toy Organization Service',
                        'home-safety-baby-proofing' => 'Home Safety Baby-proofing',
                        'birthday-party-setup' => 'Birthday Party Setup & Hosting'
                    );
                    
                    foreach ($family_services as $slug => $title) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-card bg-white rounded-4 shadow-sm p-4 h-100">
                            <div class="service-icon mb-3">
                                <i class="bi bi-people-fill text-info fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-3"><?php echo esc_html($title); ?></h5>
                            <p class="text-muted mb-4">Trusted <?php echo strtolower($title); ?> services to support your family needs.</p>
                            <a href="<?php echo esc_url(home_url('/services/' . $slug . '/')); ?>" class="btn btn-outline-info">
                                <?php esc_html_e('Learn More', 'blueprint'); ?>
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Creative & Digital Services -->
            <div class="service-category mb-5">
                <div class="category-header text-center mb-4">
                    <h2 class="display-5 fw-bold mb-3">
                        <i class="bi bi-palette text-purple me-3"></i>
                        <?php esc_html_e('🎨 Creative & Digital Services', 'blueprint'); ?>
                    </h2>
                    <p class="lead text-muted">
                        <?php esc_html_e('Creative and digital solutions for your business and personal needs', 'blueprint'); ?>
                    </p>
                </div>
                <div class="row g-4">
                    <?php 
                    $creative_services = array(
                        'graphic-design' => 'Graphic Design',
                        'social-media-management' => 'Social Media Management',
                        'content-writing-blogging' => 'Content Writing/Blogging',
                        'photography' => 'Photography',
                        'videography-events' => 'Videography for Events',
                        'logo-design' => 'Logo Design',
                        'resume-writing' => 'Resume Writing',
                        'voiceover-work' => 'Voiceover Work',
                        'tshirt-merch-design' => 'T-shirt & Merch Design',
                        'basic-website-setup' => 'Basic Website Setup'
                    );
                    
                    foreach ($creative_services as $slug => $title) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-card bg-white rounded-4 shadow-sm p-4 h-100">
                            <div class="service-icon mb-3">
                                <i class="bi bi-brush text-purple fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-3"><?php echo esc_html($title); ?></h5>
                            <p class="text-muted mb-4">Creative <?php echo strtolower($title); ?> services to bring your vision to life.</p>
                            <a href="<?php echo esc_url(home_url('/services/' . $slug . '/')); ?>" class="btn btn-outline-dark">
                                <?php esc_html_e('Learn More', 'blueprint'); ?>
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Coaching & Consulting -->
            <div class="service-category mb-5">
                <div class="category-header text-center mb-4">
                    <h2 class="display-5 fw-bold mb-3">
                        <i class="bi bi-mortarboard text-secondary me-3"></i>
                        <?php esc_html_e('🎓 Coaching & Consulting', 'blueprint'); ?>
                    </h2>
                    <p class="lead text-muted">
                        <?php esc_html_e('Professional coaching and consulting services for personal and business growth', 'blueprint'); ?>
                    </p>
                </div>
                <div class="row g-4">
                    <?php 
                    $coaching_services = array(
                        'business-coaching' => 'Business Coaching',
                        'life-coaching' => 'Life Coaching',
                        'marketing-consulting' => 'Marketing Consulting',
                        'social-media-consulting' => 'Social Media Consulting',
                        'relationship-coaching' => 'Relationship Coaching',
                        'productivity-time-management' => 'Productivity/Time Management Coaching',
                        'accountability-coaching' => 'Accountability Coaching',
                        'confidence-public-speaking' => 'Confidence or Public Speaking Coaching'
                    );
                    
                    foreach ($coaching_services as $slug => $title) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-card bg-white rounded-4 shadow-sm p-4 h-100">
                            <div class="service-icon mb-3">
                                <i class="bi bi-person-workspace text-secondary fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-3"><?php echo esc_html($title); ?></h5>
                            <p class="text-muted mb-4">Expert <?php echo strtolower($title); ?> services to help you achieve your goals.</p>
                            <a href="<?php echo esc_url(home_url('/services/' . $slug . '/')); ?>" class="btn btn-outline-secondary">
                                <?php esc_html_e('Learn More', 'blueprint'); ?>
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Office & Admin Services -->
            <div class="service-category mb-5">
                <div class="category-header text-center mb-4">
                    <h2 class="display-5 fw-bold mb-3">
                        <i class="bi bi-briefcase text-primary me-3"></i>
                        <?php esc_html_e('💼 Office & Admin Services', 'blueprint'); ?>
                    </h2>
                    <p class="lead text-muted">
                        <?php esc_html_e('Administrative and office support services for your business', 'blueprint'); ?>
                    </p>
                </div>
                <div class="row g-4">
                    <?php 
                    $admin_services = array(
                        'virtual-assistant' => 'Virtual Assistant',
                        'data-entry' => 'Data Entry',
                        'email-inbox-management' => 'Email Inbox Management',
                        'transcription-services' => 'Transcription Services',
                        'online-research-assistant' => 'Online Research Assistant',
                        'bookkeeping' => 'Bookkeeping',
                        'crm-data-organization' => 'CRM/Data Organization Setup',
                        'cold-calling-appointment-setting' => 'Cold Calling or Appointment Setting',
                        'customer-service-outsourcing' => 'Customer Service Outsourcing',
                        'print-on-demand-order-management' => 'Print-on-demand Order Management'
                    );
                    
                    foreach ($admin_services as $slug => $title) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-card bg-white rounded-4 shadow-sm p-4 h-100">
                            <div class="service-icon mb-3">
                                <i class="bi bi-laptop text-primary fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-3"><?php echo esc_html($title); ?></h5>
                            <p class="text-muted mb-4">Professional <?php echo strtolower($title); ?> services for your business operations.</p>
                            <a href="<?php echo esc_url(home_url('/services/' . $slug . '/')); ?>" class="btn btn-outline-primary">
                                <?php esc_html_e('Learn More', 'blueprint'); ?>
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Selling, Flipping & Setup -->
            <div class="service-category mb-5">
                <div class="category-header text-center mb-4">
                    <h2 class="display-5 fw-bold mb-3">
                        <i class="bi bi-box text-warning me-3"></i>
                        <?php esc_html_e('📦 Selling, Flipping & Setup', 'blueprint'); ?>
                    </h2>
                    <p class="lead text-muted">
                        <?php esc_html_e('Product sourcing, selling, and setup services for entrepreneurs', 'blueprint'); ?>
                    </p>
                </div>
                <div class="row g-4">
                    <?php 
                    $selling_services = array(
                        'furniture-flipping' => 'Furniture Flipping',
                        'product-sourcing' => 'Product Sourcing for Others',
                        'drop-off-ebay-amazon-seller' => 'Drop-off eBay/Amazon Seller',
                        'home-office-gaming-setup' => 'Home Office or Gaming Setup Installer',
                        'party-rental-setup' => 'Party Rental Setup'
                    );
                    
                    foreach ($selling_services as $slug => $title) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-card bg-white rounded-4 shadow-sm p-4 h-100">
                            <div class="service-icon mb-3">
                                <i class="bi bi-cart text-warning fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-3"><?php echo esc_html($title); ?></h5>
                            <p class="text-muted mb-4">Professional <?php echo strtolower($title); ?> services for your selling and setup needs.</p>
                            <a href="<?php echo esc_url(home_url('/services/' . $slug . '/')); ?>" class="btn btn-outline-warning">
                                <?php esc_html_e('Learn More', 'blueprint'); ?>
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="display-6 fw-bold mb-3">
                        <?php esc_html_e('Ready to Get Started?', 'blueprint'); ?>
                    </h3>
                    <p class="lead mb-0">
                        <?php esc_html_e('Contact us today to discuss your service needs and get a customized solution.', 'blueprint'); ?>
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-light btn-lg px-4">
                        <i class="bi bi-telephone me-2"></i>
                        <?php esc_html_e('Contact Us Today', 'blueprint'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
