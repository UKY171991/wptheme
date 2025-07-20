<?php
/**
 * Template Name: Services Page
 * 
 * The template for displaying all services with categories
 *
 * @package Blueprint
 */

get_header(); 

// Enqueue enhanced CSS files
wp_enqueue_style('page-services-enhanced', get_template_directory_uri() . '/css/page-services-enhanced.css', array(), '1.2');
wp_enqueue_style('animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '4.1.1');
?>

<div class="services-page-wrapper">
    <!-- Enhanced Hero Section -->
    <section class="services-hero position-relative overflow-hidden">
        <div class="hero-background">
            <div class="hero-particles"></div>
            <div class="hero-gradient"></div>
        </div>
        <div class="container position-relative z-3">
            <div class="row align-items-center min-vh-50">
                <div class="col-lg-10 mx-auto text-center">
                    <div class="hero-content text-white animate__animated animate__fadeInUp">
                        <div class="hero-badge mb-4">
                            <span class="badge bg-white bg-opacity-20 text-white px-4 py-3 rounded-pill fs-5 backdrop-blur">
                                <i class="bi bi-tools me-2"></i>
                                <?php esc_html_e('Professional Services', 'blueprint'); ?>
                            </span>
                        </div>
                        <h1 class="display-3 fw-bold mb-4 text-shadow">
                            <?php esc_html_e('Complete Service Solutions', 'blueprint'); ?>
                            <br>
                            <span class="text-gradient"><?php esc_html_e('for Every Need', 'blueprint'); ?></span>
                        </h1>
                        <p class="lead mb-5 fs-4 opacity-90">
                            <?php esc_html_e('From home care to digital solutions, we provide comprehensive services to enhance your lifestyle and grow your business with professional excellence.', 'blueprint'); ?>
                        </p>
                        <div class="hero-stats row g-4 mb-5">
                            <div class="col-6 col-md-3">
                                <div class="stat-item text-center">
                                    <div class="stat-number display-6 fw-bold">75+</div>
                                    <div class="stat-label text-white-50">Services</div>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="stat-item text-center">
                                    <div class="stat-number display-6 fw-bold">9</div>
                                    <div class="stat-label text-white-50">Categories</div>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="stat-item text-center">
                                    <div class="stat-number display-6 fw-bold">24/7</div>
                                    <div class="stat-label text-white-50">Support</div>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="stat-item text-center">
                                    <div class="stat-number display-6 fw-bold">1000+</div>
                                    <div class="stat-label text-white-50">Happy Clients</div>
                                </div>
                            </div>
                        </div>
                        <div class="hero-actions">
                            <a href="#services-list" class="btn btn-light btn-lg me-3 px-5 py-3 scroll-smooth">
                                <i class="bi bi-grid-3x3-gap me-2"></i>
                                <?php esc_html_e('Browse Services', 'blueprint'); ?>
                            </a>
                            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-outline-light btn-lg px-5 py-3">
                                <i class="bi bi-telephone me-2"></i>
                                <?php esc_html_e('Get Quote', 'blueprint'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Categories Filter -->
    <section class="services-filter py-4 bg-light border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="filter-tabs d-flex flex-wrap gap-2">
                        <button class="filter-btn active" data-filter="all">
                            <i class="bi bi-grid-3x3-gap me-2"></i>
                            All Services
                        </button>
                        <button class="filter-btn" data-filter="cleaning">
                            <i class="bi bi-house-heart me-2"></i>
                            Cleaning
                        </button>
                        <button class="filter-btn" data-filter="maintenance">
                            <i class="bi bi-tools me-2"></i>
                            Maintenance
                        </button>
                        <button class="filter-btn" data-filter="personal">
                            <i class="bi bi-person-check me-2"></i>
                            Personal
                        </button>
                        <button class="filter-btn" data-filter="pets">
                            <i class="bi bi-heart me-2"></i>
                            Pets
                        </button>
                        <button class="filter-btn" data-filter="digital">
                            <i class="bi bi-laptop me-2"></i>
                            Digital
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <div class="services-search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search services..." id="serviceSearch">
                            <button class="btn btn-outline-primary" type="button">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Grid Section -->
    <section class="services-grid-section py-5" id="services-list">
        <div class="container-fluid px-4">
            <div class="services-grid-wrapper">
                <!-- Services Grid Container -->
                <div class="services-grid-container" id="servicesContainer">
                    <?php
                    // Combine all services into one paginated grid
                    $all_services = array();
                    
                    // Home & Cleaning Services
                    $cleaning_services = array(
                        'house-cleaning' => array(
                            'title' => 'House Cleaning',
                            'icon' => 'house-check',
                            'description' => 'Comprehensive residential cleaning services to maintain a spotless and healthy home environment.',
                            'price' => 'Starting at $80',
                            'category' => 'cleaning',
                            'color' => 'primary'
                        ),
                        'move-in-out-cleaning' => array(
                            'title' => 'Move-in/Move-out Cleaning',
                            'icon' => 'box-arrow-in-right',
                            'description' => 'Deep cleaning services for property transitions, ensuring a fresh start in your new space.',
                            'price' => 'Starting at $150',
                            'category' => 'cleaning',
                            'color' => 'primary'
                        ),
                        'pressure-washing' => array(
                            'title' => 'Pressure Washing',
                            'icon' => 'water',
                            'description' => 'Exterior cleaning services to restore your property\'s curb appeal and remove stubborn dirt.',
                            'price' => 'Starting at $120',
                            'category' => 'cleaning',
                            'color' => 'primary'
                        ),
                        'gutter-cleaning' => array(
                            'title' => 'Gutter Cleaning',
                            'icon' => 'house-up',
                            'description' => 'Professional gutter maintenance to protect your home from water damage and debris buildup.',
                            'price' => 'Starting at $100',
                            'category' => 'cleaning',
                            'color' => 'primary'
                        ),
                        'window-cleaning' => array(
                            'title' => 'Window Cleaning',
                            'icon' => 'window',
                            'description' => 'Crystal-clear window cleaning services for enhanced natural light and property appearance.',
                            'price' => 'Starting at $60',
                            'category' => 'cleaning',
                            'color' => 'primary'
                        ),
                        'carpet-shampooing' => array(
                            'title' => 'Carpet Shampooing',
                            'icon' => 'bookmark-check',
                            'description' => 'Deep carpet cleaning and stain removal services to refresh your flooring.',
                            'price' => 'Starting at $90',
                            'category' => 'cleaning',
                            'color' => 'primary'
                        ),
                        'garage-attic-organization' => array(
                            'title' => 'Garage/Attic Organization',
                            'icon' => 'boxes',
                            'description' => 'Professional organization services to maximize storage space and improve accessibility.',
                            'price' => 'Starting at $75',
                            'category' => 'cleaning',
                            'color' => 'primary'
                        ),
                        'trash-hauling-junk-removal' => array(
                            'title' => 'Trash Hauling & Junk Removal',
                            'icon' => 'trash3',
                            'description' => 'Efficient removal of unwanted items and debris with eco-friendly disposal methods.',
                            'price' => 'Starting at $50',
                            'category' => 'cleaning',
                            'color' => 'primary'
                        ),
                        'airbnb-cleaning-reset' => array(
                            'title' => 'Airbnb Cleaning & Reset',
                            'icon' => 'house-door',
                            'description' => 'Specialized cleaning and preparation services for vacation rental properties.',
                            'price' => 'Starting at $85',
                            'category' => 'cleaning',
                            'color' => 'primary'
                        ),
                        'lawn-mowing-yard-maintenance' => array(
                            'title' => 'Lawn Mowing and Yard Maintenance',
                            'icon' => 'tree',
                            'description' => 'Complete lawn care and landscaping services to maintain your outdoor spaces.',
                            'price' => 'Starting at $45',
                            'category' => 'cleaning',
                            'color' => 'primary'
                        )
                    );
                    
                    // Maintenance Services
                    $maintenance_services = array(
                        'furniture-assembly' => array(
                            'title' => 'Furniture Assembly',
                            'icon' => 'hammer',
                            'description' => 'Professional furniture assembly services for all brands with guaranteed satisfaction.',
                            'price' => 'Starting at $45',
                            'category' => 'maintenance',
                            'color' => 'warning'
                        ),
                        'tv-mounting' => array(
                            'title' => 'TV Mounting',
                            'icon' => 'tv',
                            'description' => 'Secure and professional TV mounting with cable management and optimal viewing angles.',
                            'price' => 'Starting at $75',
                            'category' => 'maintenance',
                            'color' => 'warning'
                        ),
                        'handyman-services' => array(
                            'title' => 'Handyman Services',
                            'icon' => 'wrench-adjustable',
                            'description' => 'General handyman services for small repairs and home improvement projects.',
                            'price' => 'Starting at $60',
                            'category' => 'maintenance',
                            'color' => 'warning'
                        ),
                        'fence-painting' => array(
                            'title' => 'Fence Painting',
                            'icon' => 'paint-bucket',
                            'description' => 'Professional fence painting and staining services to protect and beautify your property.',
                            'price' => 'Starting at $200',
                            'category' => 'maintenance',
                            'color' => 'warning'
                        ),
                        'light-bulb-fixture-installation' => array(
                            'title' => 'Light Bulb/Fixture Installation',
                            'icon' => 'lightbulb',
                            'description' => 'Electrical fixture installation and lighting solutions for enhanced home ambiance.',
                            'price' => 'Starting at $35',
                            'category' => 'maintenance',
                            'color' => 'warning'
                        ),
                        'basic-drywall-patching' => array(
                            'title' => 'Basic Drywall Patching',
                            'icon' => 'patch-check',
                            'description' => 'Professional drywall repair and patching services for a smooth, seamless finish.',
                            'price' => 'Starting at $50',
                            'category' => 'maintenance',
                            'color' => 'warning'
                        ),
                        'mailbox-installation' => array(
                            'title' => 'Mailbox Installation',
                            'icon' => 'mailbox',
                            'description' => 'Mailbox installation and replacement services with proper mounting and positioning.',
                            'price' => 'Starting at $40',
                            'category' => 'maintenance',
                            'color' => 'warning'
                        ),
                        'holiday-light-hanging' => array(
                            'title' => 'Holiday Light Hanging',
                            'icon' => 'stars',
                            'description' => 'Seasonal holiday lighting installation and removal services for festive decorations.',
                            'price' => 'Starting at $85',
                            'category' => 'maintenance',
                            'color' => 'warning'
                        ),
                        'lockout-assistance' => array(
                            'title' => 'Lockout Assistance',
                            'icon' => 'key',
                            'description' => 'Emergency lockout assistance and lock-related services for home and vehicle.',
                            'price' => 'Starting at $65',
                            'category' => 'maintenance',
                            'color' => 'warning'
                        ),
                        'pool-cleaning' => array(
                            'title' => 'Pool Cleaning',
                            'icon' => 'water',
                            'description' => 'Regular pool maintenance and cleaning services for crystal clear water year-round.',
                            'price' => 'Starting at $95',
                            'category' => 'maintenance',
                            'color' => 'warning'
                        )
                    );
                    
                    // Personal Services
                    $personal_services = array(
                        'grocery-shopping-delivery' => array(
                            'title' => 'Grocery Shopping/Delivery',
                            'icon' => 'cart3',
                            'description' => 'Convenient grocery shopping and delivery services to save your time and effort.',
                            'price' => 'Starting at $25',
                            'category' => 'personal',
                            'color' => 'success'
                        ),
                        'prescription-pickup' => array(
                            'title' => 'Prescription Pickup',
                            'icon' => 'capsule',
                            'description' => 'Reliable prescription pickup and delivery services for your medical needs.',
                            'price' => 'Starting at $15',
                            'category' => 'personal',
                            'color' => 'success'
                        ),
                        'waiting-in-line-service' => array(
                            'title' => 'Waiting-in-line Service',
                            'icon' => 'clock',
                            'description' => 'Professional waiting services for DMV, appointments, and other time-consuming tasks.',
                            'price' => 'Starting at $30/hr',
                            'category' => 'personal',
                            'color' => 'success'
                        ),
                        'personal-assistant-service' => array(
                            'title' => 'Personal Assistant Service',
                            'icon' => 'person-workspace',
                            'description' => 'Comprehensive personal assistance for scheduling, organization, and daily tasks.',
                            'price' => 'Starting at $35/hr',
                            'category' => 'personal',
                            'color' => 'success'
                        ),
                        'moving-assistance' => array(
                            'title' => 'Moving Assistance',
                            'icon' => 'box-seam',
                            'description' => 'Professional moving assistance including packing, loading, and organizing services.',
                            'price' => 'Starting at $40/hr',
                            'category' => 'personal',
                            'color' => 'success'
                        ),
                        'courier-delivery-services' => array(
                            'title' => 'Courier/Delivery Services',
                            'icon' => 'truck',
                            'description' => 'Fast and reliable courier services for documents, packages, and special deliveries.',
                            'price' => 'Starting at $20',
                            'category' => 'personal',
                            'color' => 'success'
                        ),
                        'dog-waste-cleanup' => array(
                            'title' => 'Dog Waste Cleanup',
                            'icon' => 'trash',
                            'description' => 'Regular yard cleanup services to maintain a clean and healthy outdoor environment.',
                            'price' => 'Starting at $25',
                            'category' => 'personal',
                            'color' => 'success'
                        ),
                        'packing-unpacking-service' => array(
                            'title' => 'Packing/Unpacking Service',
                            'icon' => 'box',
                            'description' => 'Expert packing and unpacking services for moves, storage, and organization.',
                            'price' => 'Starting at $30/hr',
                            'category' => 'personal',
                            'color' => 'success'
                        ),
                        'decluttering-service' => array(
                            'title' => 'Decluttering Service',
                            'icon' => 'layers',
                            'description' => 'Professional decluttering and organization services to simplify your living space.',
                            'price' => 'Starting at $35/hr',
                            'category' => 'personal',
                            'color' => 'success'
                        ),
                        'plant-watering' => array(
                            'title' => 'Plant Watering',
                            'icon' => 'flower1',
                            'description' => 'Caring plant watering and maintenance services for indoor and outdoor gardens.',
                            'price' => 'Starting at $20',
                            'category' => 'personal',
                            'color' => 'success'
                        )
                    );
                    
                    // Pet Services
                    $pet_services = array(
                        'dog-walking' => array(
                            'title' => 'Dog Walking',
                            'icon' => 'person-walking',
                            'description' => 'Regular dog walking services to keep your pets healthy, happy, and well-exercised.',
                            'price' => 'Starting at $25',
                            'category' => 'pets',
                            'color' => 'danger'
                        ),
                        'pet-sitting' => array(
                            'title' => 'Pet Sitting',
                            'icon' => 'house-heart',
                            'description' => 'Reliable in-home pet sitting services providing comfort and care in familiar surroundings.',
                            'price' => 'Starting at $35/day',
                            'category' => 'pets',
                            'color' => 'danger'
                        ),
                        'mobile-pet-grooming' => array(
                            'title' => 'Mobile Pet Grooming',
                            'icon' => 'scissors',
                            'description' => 'Convenient mobile grooming services bringing professional pet care to your doorstep.',
                            'price' => 'Starting at $55',
                            'category' => 'pets',
                            'color' => 'danger'
                        ),
                        'pet-poop-scooping' => array(
                            'title' => 'Pet Poop Scooping Service',
                            'icon' => 'trash3',
                            'description' => 'Regular yard cleanup services to maintain a clean and sanitary outdoor environment.',
                            'price' => 'Starting at $20',
                            'category' => 'pets',
                            'color' => 'danger'
                        ),
                        'pet-taxi' => array(
                            'title' => 'Pet Taxi',
                            'icon' => 'truck',
                            'description' => 'Safe and comfortable pet transportation services for vet visits and appointments.',
                            'price' => 'Starting at $30',
                            'category' => 'pets',
                            'color' => 'danger'
                        ),
                        'aquarium-cleaning' => array(
                            'title' => 'Aquarium Cleaning',
                            'icon' => 'water',
                            'description' => 'Professional aquarium maintenance and cleaning services for healthy aquatic environments.',
                            'price' => 'Starting at $40',
                            'category' => 'pets',
                            'color' => 'danger'
                        ),
                        'pet-yard-deodorizing' => array(
                            'title' => 'Pet Yard Deodorizing',
                            'icon' => 'wind',
                            'description' => 'Specialized deodorizing services to eliminate pet odors and maintain fresh outdoor spaces.',
                            'price' => 'Starting at $35',
                            'category' => 'pets',
                            'color' => 'danger'
                        )
                    );
                    
                    // Digital Services
                    $digital_services = array(
                        'graphic-design' => array(
                            'title' => 'Graphic Design',
                            'icon' => 'brush',
                            'description' => 'Creative graphic design services for logos, branding, and marketing materials.',
                            'price' => 'Starting at $50',
                            'category' => 'digital',
                            'color' => 'info'
                        ),
                        'social-media-management' => array(
                            'title' => 'Social Media Management',
                            'icon' => 'share',
                            'description' => 'Professional social media management to grow your online presence and engagement.',
                            'price' => 'Starting at $200/mo',
                            'category' => 'digital',
                            'color' => 'info'
                        ),
                        'content-writing-blogging' => array(
                            'title' => 'Content Writing/Blogging',
                            'icon' => 'pen',
                            'description' => 'High-quality content writing and blogging services for your business needs.',
                            'price' => 'Starting at $75',
                            'category' => 'digital',
                            'color' => 'info'
                        ),
                        'virtual-assistant' => array(
                            'title' => 'Virtual Assistant',
                            'icon' => 'laptop',
                            'description' => 'Professional virtual assistant services for administrative tasks and business support.',
                            'price' => 'Starting at $25/hr',
                            'category' => 'digital',
                            'color' => 'info'
                        ),
                        'basic-website-setup' => array(
                            'title' => 'Basic Website Setup',
                            'icon' => 'globe',
                            'description' => 'Professional website setup and basic web development services for your business.',
                            'price' => 'Starting at $300',
                            'category' => 'digital',
                            'color' => 'info'
                        )
                    );
                    
                    // Merge all services
                    $all_services = array_merge($cleaning_services, $maintenance_services, $personal_services, $pet_services, $digital_services);
                    
                    // Pagination settings
                    $services_per_page = 12;
                    $current_page = isset($_GET['paged']) ? max(1, intval($_GET['paged'])) : 1;
                    $total_services = count($all_services);
                    $total_pages = ceil($total_services / $services_per_page);
                    $offset = ($current_page - 1) * $services_per_page;
                    
                    // Get services for current page
                    $current_services = array_slice($all_services, $offset, $services_per_page, true);
                    ?>
                    
                    <div class="services-grid row g-4" data-aos="fade-up">
                    <div class="services-grid row g-4" data-aos="fade-up">
                        <?php foreach ($current_services as $slug => $service) : ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 service-item" data-category="<?php echo esc_attr($service['category']); ?>" data-aos="fade-up" data-aos-delay="<?php echo (array_search($slug, array_keys($current_services)) % 12) * 100; ?>">
                            <div class="service-card bg-white rounded-4 shadow-hover border-0 h-100 position-relative overflow-hidden">
                                <div class="service-card-header p-4 pb-3">
                                    <div class="service-category-badge mb-2">
                                        <span class="badge bg-<?php echo esc_attr($service['color']); ?> bg-opacity-10 text-<?php echo esc_attr($service['color']); ?> px-2 py-1 small">
                                            <?php echo esc_html(ucfirst($service['category'])); ?>
                                        </span>
                                    </div>
                                    <div class="service-icon mb-3">
                                        <div class="icon-bg bg-<?php echo esc_attr($service['color']); ?> bg-opacity-10 rounded-3 p-3 d-inline-flex">
                                            <i class="bi bi-<?php echo esc_attr($service['icon']); ?> text-<?php echo esc_attr($service['color']); ?> fs-3"></i>
                                        </div>
                                    </div>
                                    <h5 class="fw-bold mb-2"><?php echo esc_html($service['title']); ?></h5>
                                    <div class="service-price mb-3">
                                        <span class="badge bg-<?php echo esc_attr($service['color']); ?> bg-opacity-10 text-<?php echo esc_attr($service['color']); ?> px-3 py-2">
                                            <?php echo esc_html($service['price']); ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="service-card-body px-4 pb-4">
                                    <p class="text-muted mb-4 small"><?php echo esc_html($service['description']); ?></p>
                                    <div class="service-actions d-grid gap-2">
                                        <a href="<?php echo esc_url(home_url('/services/' . $slug . '/')); ?>" class="btn btn-outline-<?php echo esc_attr($service['color']); ?> btn-sm">
                                            <i class="bi bi-arrow-right me-2"></i>
                                            <?php esc_html_e('Learn More', 'blueprint'); ?>
                                        </a>
                                        <a href="<?php echo esc_url(home_url('/contact/')); ?>?service=<?php echo esc_attr($slug); ?>" class="btn btn-<?php echo esc_attr($service['color']); ?> btn-sm">
                                            <i class="bi bi-telephone me-2"></i>
                                            <?php esc_html_e('Get Quote', 'blueprint'); ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="service-card-overlay"></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- Pagination -->
                    <?php if ($total_pages > 1) : ?>
                    <div class="services-pagination mt-5">
                        <nav aria-label="Services pagination">
                            <ul class="pagination pagination-lg justify-content-center">
                                <?php if ($current_page > 1) : ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo esc_url(add_query_arg('paged', $current_page - 1)); ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                
                                <?php
                                $start_page = max(1, $current_page - 2);
                                $end_page = min($total_pages, $current_page + 2);
                                
                                if ($start_page > 1) : ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo esc_url(add_query_arg('paged', 1)); ?>">1</a>
                                </li>
                                <?php if ($start_page > 2) : ?>
                                <li class="page-item disabled">
                                    <span class="page-link">...</span>
                                </li>
                                <?php endif; ?>
                                <?php endif; ?>
                                
                                <?php for ($i = $start_page; $i <= $end_page; $i++) : ?>
                                <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                                    <a class="page-link" href="<?php echo esc_url(add_query_arg('paged', $i)); ?>"><?php echo $i; ?></a>
                                </li>
                                <?php endfor; ?>
                                
                                <?php if ($end_page < $total_pages) : ?>
                                <?php if ($end_page < $total_pages - 1) : ?>
                                <li class="page-item disabled">
                                    <span class="page-link">...</span>
                                </li>
                                <?php endif; ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo esc_url(add_query_arg('paged', $total_pages)); ?>"><?php echo $total_pages; ?></a>
                                </li>
                                <?php endif; ?>
                                
                                <?php if ($current_page < $total_pages) : ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo esc_url(add_query_arg('paged', $current_page + 1)); ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                        
                        <!-- Results Info -->
                        <div class="results-info text-center mt-3">
                            <p class="text-muted">
                                <?php
                                $start_result = $offset + 1;
                                $end_result = min($offset + $services_per_page, $total_services);
                                printf(
                                    esc_html__('Showing %d-%d of %d services', 'blueprint'),
                                    $start_result,
                                    $end_result,
                                    $total_services
                                );
                                ?>
                            </p>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced CTA Section -->
    <section class="enhanced-cta-section position-relative overflow-hidden py-5">
        <div class="cta-background">
            <div class="cta-gradient"></div>
            <div class="cta-particles"></div>
        </div>
        <div class="container position-relative z-3">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="cta-content text-white">
                        <div class="cta-badge mb-3">
                            <span class="badge bg-white bg-opacity-20 text-white px-3 py-2 rounded-pill">
                                <i class="bi bi-star-fill me-2"></i>
                                Ready to Transform Your Life?
                            </span>
                        </div>
                        <h3 class="display-5 fw-bold mb-3">
                            <?php esc_html_e('Get Professional Service Solutions Today', 'blueprint'); ?>
                        </h3>
                        <p class="lead mb-4 opacity-90">
                            <?php esc_html_e('Join thousands of satisfied customers who trust us with their most important tasks. Professional, reliable, and affordable services at your fingertips.', 'blueprint'); ?>
                        </p>
                        <div class="cta-features row g-3 mb-4">
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span>24/7 Support</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span>Satisfaction Guaranteed</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span>Licensed & Insured</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="cta-actions">
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-light btn-lg px-5 py-3 mb-3 d-block">
                            <i class="bi bi-telephone me-2"></i>
                            <?php esc_html_e('Get Free Quote', 'blueprint'); ?>
                        </a>
                        <a href="tel:+15551234567" class="btn btn-outline-light btn-lg px-5 py-3 d-block">
                            <i class="bi bi-chat-dots me-2"></i>
                            <?php esc_html_e('Call Now: (555) 123-4567', 'blueprint'); ?>
                        </a>
                        <div class="trust-indicators mt-3 text-center">
                            <small class="text-white-50">
                                <i class="bi bi-shield-check me-1"></i>
                                Trusted by 1000+ customers
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="enhanced-cta-section position-relative overflow-hidden py-5">
        <div class="cta-background">
            <div class="cta-gradient"></div>
            <div class="cta-particles"></div>
        </div>
        <div class="container position-relative z-3">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="cta-content text-white">
                        <div class="cta-badge mb-3">
                            <span class="badge bg-white bg-opacity-20 text-white px-3 py-2 rounded-pill">
                                <i class="bi bi-star-fill me-2"></i>
                                Ready to Transform Your Life?
                            </span>
                        </div>
                        <h3 class="display-5 fw-bold mb-3">
                            <?php esc_html_e('Get Professional Service Solutions Today', 'blueprint'); ?>
                        </h3>
                        <p class="lead mb-4 opacity-90">
                            <?php esc_html_e('Join thousands of satisfied customers who trust us with their most important tasks. Professional, reliable, and affordable services at your fingertips.', 'blueprint'); ?>
                        </p>
                        <div class="cta-features row g-3 mb-4">
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span>24/7 Support</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span>Satisfaction Guaranteed</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span>Licensed & Insured</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="cta-actions">
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-light btn-lg px-5 py-3 mb-3 d-block">
                            <i class="bi bi-telephone me-2"></i>
                            <?php esc_html_e('Get Free Quote', 'blueprint'); ?>
                        </a>
                        <a href="tel:+15551234567" class="btn btn-outline-light btn-lg px-5 py-3 d-block">
                            <i class="bi bi-chat-dots me-2"></i>
                            <?php esc_html_e('Call Now: (555) 123-4567', 'blueprint'); ?>
                        </a>
                        <div class="trust-indicators mt-3 text-center">
                            <small class="text-white-50">
                                <i class="bi bi-shield-check me-1"></i>
                                Trusted by 1000+ customers
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Stats Section -->
    <section class="quick-stats-section py-4 bg-light">
        <div class="container">
            <div class="row text-center">
                <div class="col-6 col-md-3">
                    <div class="stat-box">
                        <div class="stat-number h4 fw-bold text-primary mb-1">75+</div>
                        <div class="stat-label text-muted small">Services Available</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-box">
                        <div class="stat-number h4 fw-bold text-success mb-1">1000+</div>
                        <div class="stat-label text-muted small">Happy Customers</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-box">
                        <div class="stat-number h4 fw-bold text-warning mb-1">24/7</div>
                        <div class="stat-label text-muted small">Support Available</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-box">
                        <div class="stat-number h4 fw-bold text-info mb-1">98%</div>
                        <div class="stat-label text-muted small">Satisfaction Rate</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
// Enhanced Services Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    const serviceCategories = document.querySelectorAll('.service-category');
    const searchInput = document.getElementById('serviceSearch');

    // Filter by category
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Show/hide categories
            serviceCategories.forEach(category => {
                if (filter === 'all' || category.getAttribute('data-category') === filter) {
                    category.style.display = 'block';
                    category.classList.add('animate__animated', 'animate__fadeInUp');
                } else {
                    category.style.display = 'none';
                }
            });
        });
    });

    // Search functionality
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const serviceCards = document.querySelectorAll('.service-card');
            
            serviceCards.forEach(card => {
                const title = card.querySelector('h5').textContent.toLowerCase();
                const description = card.querySelector('p').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    card.closest('.service-item').style.display = 'block';
                } else {
                    card.closest('.service-item').style.display = 'none';
                }
            });
        });
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Animate service cards on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate__animated', 'animate__fadeInUp');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.service-item').forEach(item => {
        observer.observe(item);
    });

    // Add hover effects for service cards
    document.querySelectorAll('.service-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
});
</script>

<?php get_footer(); ?>
