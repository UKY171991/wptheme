<?php
/**
 * Template Name: Business Blueprint Library - Dynamic
 * Description: A service page that integrates with WordPress posts/services
 */

get_header(); ?>

<main id="main" class="site-main business-library-page">
    <!-- Hero Section -->
    <section class="business-library-hero py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3" style="color: #2c3e50; font-family: 'Arial', sans-serif;">
                        Business Blueprint Library
                    </h1>
                    <p class="lead mb-4" style="color: #6c757d; font-size: 1.1rem;">
                        Your All-in-One Collection of Ready-to-Launch<br>
                        Digital Business Guides
                    </p>
                    
                    <!-- Search Box -->
                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-6">
                            <div class="search-box">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="fas fa-search text-muted"></i>
                                    </span>
                                    <input type="text" 
                                           class="form-control border-start-0 shadow-sm" 
                                           id="business-search" 
                                           placeholder="Search services..."
                                           style="border-left: none;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <?php
    $total_services = wp_count_posts('service')->publish;
    $total_categories = wp_count_terms('service_category');
    ?>
    <section class="stats-section py-4" style="background: #007bff;">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-md-4">
                    <div class="stat-item">
                        <h3 class="display-6 fw-bold mb-1"><?php echo $total_services; ?></h3>
                        <p class="mb-0">Professional Services</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-item">
                        <h3 class="display-6 fw-bold mb-1"><?php echo $total_categories; ?></h3>
                        <p class="mb-0">Service Categories</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-item">
                        <h3 class="display-6 fw-bold mb-1">24/7</h3>
                        <p class="mb-0">Support Available</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Grid Section -->
    <section class="business-library-services py-5">
        <div class="container">
            <div class="row g-4">
                <?php
                // Get all services from WordPress
                $services_query = new WP_Query(array(
                    'post_type' => 'service',
                    'posts_per_page' => -1, // Get all services
                    'post_status' => 'publish',
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                ));

                // Get gradient colors for each service type
                $color_gradients = array(
                    'blue' => 'linear-gradient(135deg, #4285f4, #1a73e8)',
                    'pink' => 'linear-gradient(135deg, #ea4335, #d33b2c)', 
                    'yellow' => 'linear-gradient(135deg, #fbbc04, #f9ab00)',
                    'green' => 'linear-gradient(135deg, #34a853, #137333)',
                    'purple' => 'linear-gradient(135deg, #9c27b0, #673ab7)',
                    'orange' => 'linear-gradient(135deg, #ff9800, #f57c00)',
                    'teal' => 'linear-gradient(135deg, #009688, #00695c)',
                    'indigo' => 'linear-gradient(135deg, #3f51b5, #303f9f)'
                );

                $colors = array('blue', 'pink', 'yellow', 'green', 'purple', 'orange', 'teal', 'indigo');
                $color_index = 0;

                if ($services_query->have_posts()) :
                    while ($services_query->have_posts()) : 
                        $services_query->the_post();
                        
                        // Get service categories
                        $service_categories = get_the_terms(get_the_ID(), 'service_category');
                        $category_name = '';
                        if ($service_categories && !is_wp_error($service_categories)) {
                            $category_name = $service_categories[0]->name;
                        }
                        
                        // Get service meta data
                        $price = get_post_meta(get_the_ID(), '_service_price', true);
                        $duration = get_post_meta(get_the_ID(), '_service_duration', true);
                        
                        // Assign color
                        $current_color = $colors[$color_index % count($colors)];
                        $gradient = $color_gradients[$current_color];
                        $color_index++;
                        
                        // Get description
                        $description = has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 15, '...');
                        
                        // Format title for book display
                        $book_title = wp_trim_words(get_the_title(), 3, '');
                        $book_title_formatted = str_replace(' ', '<br>', $book_title);
                        
                        // Create subtitle from description or category
                        $subtitle_text = $description;
                        if (strlen($subtitle_text) > 60) {
                            $subtitle_text = wp_trim_words($subtitle_text, 8, '...');
                        }
                        $subtitle_formatted = str_replace(' ', '<br>', $subtitle_text);
                ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="business-card h-100" data-color="<?php echo esc_attr($current_color); ?>" data-category="<?php echo esc_attr($category_name); ?>">
                            <div class="business-book">
                                <div class="book-spine" style="background: <?php echo esc_attr($gradient); ?>;">
                                    <div class="book-title">
                                        <h3><?php echo $book_title_formatted; ?></h3>
                                        <p class="book-subtitle"><?php echo $subtitle_formatted; ?></p>
                                        
                                        <?php if ($price || $duration) : ?>
                                            <div class="book-meta mt-2">
                                                <?php if ($price) : ?>
                                                    <div class="price-badge">
                                                        <small style="opacity: 0.9; font-size: 0.7rem;">Starting from</small><br>
                                                        <strong style="font-size: 0.9rem;"><?php echo esc_html($price); ?></strong>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="business-info">
                                <h4 class="service-title"><?php the_title(); ?></h4>
                                
                                <?php if ($category_name) : ?>
                                    <div class="service-category mb-2">
                                        <span class="badge bg-secondary"><?php echo esc_html($category_name); ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                <p class="service-description"><?php echo esc_html($description); ?></p>
                                
                                <?php if ($duration) : ?>
                                    <div class="service-duration mb-2">
                                        <small class="text-muted">
                                            <i class="fas fa-clock me-1"></i>
                                            Duration: <?php echo esc_html($duration); ?>
                                        </small>
                                    </div>
                                <?php endif; ?>
                                
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-rounded">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    </div>
                <?php 
                    endwhile;
                    wp_reset_postdata();
                else : ?>
                    <!-- No services found - Show fallback content -->
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            <h4><i class="fas fa-info-circle me-2"></i>No Services Found</h4>
                            <p>We're currently updating our service offerings. Please check back soon!</p>
                            <a href="<?php echo esc_url(site_url('/contact')); ?>" class="btn btn-primary">
                                Contact Us for Custom Services
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Service Categories Section -->
    <?php
    // Get all service categories
    $service_categories = get_terms(array(
        'taxonomy' => 'service_category',
        'hide_empty' => true,
        'orderby' => 'name',
        'order' => 'ASC'
    ));

    if ($service_categories && !is_wp_error($service_categories)) : ?>
        <section class="service-categories-section py-5" style="background: #f8f9fa;">
            <div class="container">
                <div class="row justify-content-center text-center mb-5">
                    <div class="col-lg-8">
                        <h2 class="h1 fw-bold mb-3" style="color: #2c3e50;">
                            <i class="fas fa-layer-group me-3" style="color: #3498db;"></i>
                            Service Categories
                        </h2>
                        <p class="lead text-muted">
                            Explore our services organized by category to find exactly what you need
                        </p>
                    </div>
                </div>
                
                <!-- Category Filter Buttons -->
                <div class="category-filters text-center mb-5">
                    <button class="btn btn-outline-primary btn-rounded filter-btn active me-2 mb-2" data-filter="all">
                        <i class="fas fa-th-large me-2"></i>All Services
                    </button>
                    <?php foreach ($service_categories as $category) : ?>
                        <button class="btn btn-outline-primary btn-rounded filter-btn me-2 mb-2" data-filter="<?php echo esc_attr($category->name); ?>">
                            <i class="fas fa-tag me-2"></i><?php echo esc_html($category->name); ?>
                            <span class="badge bg-primary ms-2"><?php echo $category->count; ?></span>
                        </button>
                    <?php endforeach; ?>
                </div>
                
                <!-- Category Cards -->
                <div class="row g-4">
                    <!-- All Services Card -->
                    <div class="col-lg-4 col-md-6">
                        <a href="<?php echo get_post_type_archive_link('service'); ?>" class="text-decoration-none">
                            <div class="category-card h-100 bg-white rounded-3 shadow-sm border-0 overflow-hidden hover-lift">
                                <div class="card-body p-4 text-center">
                                    <div class="category-icon mb-3">
                                        <i class="fas fa-th-large" style="font-size: 3rem; color: #3498db;"></i>
                                    </div>
                                    <h3 class="h5 mb-3" style="color: #2c3e50; font-weight: 600;">
                                        All Services
                                    </h3>
                                    <p class="text-muted mb-3">
                                        Browse our complete portfolio of professional services
                                    </p>
                                    <div class="category-count mb-3">
                                        <span class="badge bg-primary">
                                            <?php echo wp_count_posts('service')->publish; ?> Services
                                        </span>
                                    </div>
                                    <span class="btn btn-outline-primary btn-sm">
                                        View All Services <i class="fas fa-arrow-right ms-1"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                    <?php foreach ($service_categories as $category) : 
                        // Default icons for different categories
                        $category_icons = array(
                            'cleaning' => 'fas fa-broom',
                            'maintenance' => 'fas fa-tools',
                            'plumbing' => 'fas fa-wrench',
                            'electrical' => 'fas fa-bolt',
                            'gardening' => 'fas fa-seedling',
                            'painting' => 'fas fa-paint-roller',
                            'repair' => 'fas fa-hammer',
                            'installation' => 'fas fa-cogs',
                            'consulting' => 'fas fa-lightbulb',
                            'design' => 'fas fa-palette',
                            'marketing' => 'fas fa-bullhorn',
                            'development' => 'fas fa-code',
                            'support' => 'fas fa-headset',
                            'business' => 'fas fa-briefcase',
                            'digital' => 'fas fa-laptop',
                            'creative' => 'fas fa-palette',
                            'technical' => 'fas fa-cogs'
                        );

                        $icon = 'fas fa-tag'; // default
                        foreach ($category_icons as $key => $icon_class) {
                            if (strpos(strtolower($category->slug), $key) !== false) {
                                $icon = $icon_class;
                                break;
                            }
                        }
                    ?>
                        <div class="col-lg-4 col-md-6">
                            <a href="<?php echo esc_url(get_term_link($category)); ?>" class="text-decoration-none">
                                <div class="category-card h-100 bg-white rounded-3 shadow-sm border-0 overflow-hidden hover-lift">
                                    <div class="card-body p-4 text-center">
                                        <div class="category-icon mb-3">
                                            <i class="<?php echo esc_attr($icon); ?>" style="font-size: 3rem; color: #3498db;"></i>
                                        </div>
                                        <h3 class="h5 mb-3" style="color: #2c3e50; font-weight: 600;">
                                            <?php echo esc_html($category->name); ?>
                                        </h3>
                                        <?php if ($category->description) : ?>
                                            <p class="text-muted mb-3">
                                                <?php echo esc_html(wp_trim_words($category->description, 15)); ?>
                                            </p>
                                        <?php else : ?>
                                            <p class="text-muted mb-3">
                                                Professional <?php echo strtolower($category->name); ?> services
                                            </p>
                                        <?php endif; ?>
                                        <div class="category-count mb-3">
                                            <span class="badge bg-primary">
                                                <?php echo $category->count; ?> Service<?php echo $category->count !== 1 ? 's' : ''; ?>
                                            </span>
                                        </div>
                                        <span class="btn btn-outline-primary btn-sm">
                                            View Services <i class="fas fa-arrow-right ms-1"></i>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Call to Action Section -->
    <section class="business-library-cta py-5" style="background: linear-gradient(135deg, #007bff, #0056b3);">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="h1 fw-bold mb-3 text-white">
                        Ready to Start Your Business Journey?
                    </h2>
                    <p class="lead mb-4 text-white opacity-75">
                        Choose the blueprint that matches your goals and start building your successful business today.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="<?php echo esc_url(site_url('/contact')); ?>" class="btn btn-light btn-lg btn-rounded px-4">
                            <i class="fas fa-envelope me-2"></i>
                            Get Started Today
                        </a>
                        <a href="<?php echo esc_url(site_url('/services')); ?>" class="btn btn-outline-light btn-lg btn-rounded px-4">
                            <i class="fas fa-th-large me-2"></i>
                            View All Services
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <section class="business-library-footer py-4" style="background: #2c3e50; color: white;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-2" style="font-size: 0.9rem;">
                        © <?php echo date('Y'); ?> Business Blueprint Library. All rights reserved.
                    </p>
                    <div class="footer-links">
                        <a href="<?php echo esc_url(site_url('/privacy-policy')); ?>" class="text-white-50 me-3" style="text-decoration: none;">Privacy Policy</a>
                        <a href="<?php echo esc_url(site_url('/terms-of-use')); ?>" class="text-white-50 me-3" style="text-decoration: none;">Terms of Use</a>
                        <a href="<?php echo esc_url(site_url('/contact')); ?>" class="text-white-50" style="text-decoration: none;">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
