<?php
/**
 * Template Name: Services
 */

get_header(); ?>
<main id="main" class="site-main">
    <!-- Services Categories Section -->
    <section id="services-categories" class="section">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h2 class="section-title mb-3" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-layer-group me-3" style="color: #3498db;"></i>
                    Service Categories
                </h2>
                <p class="section-subtitle lead text-muted">
                    Explore our comprehensive range of professional services organized by category
                </p>
            </div>
            <!-- Service Categories Display -->
            <div class="service-categories-content">
                <div class="row g-4">
                    <!-- All Services Card -->
                    <div class="col-lg-4 col-md-6">
                        <div class="service-category-card h-100 bg-white rounded-3 shadow-sm border-0 overflow-hidden">
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
                                        <?php echo wp_count_posts('service')->publish;?> Services
                                    </span>
                                </div>
                                <a href="<?php echo get_post_type_archive_link('service');?>" class="btn btn-outline-primary btn-sm">
                                    View All Services <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                    // Get service categories
                    $service_categories = get_terms(array(
                        'taxonomy' => 'service_category',
                        'hide_empty' => true,
                        'orderby' => 'name',
                        'order' => 'ASC'
                    ));

                    if ($service_categories && !is_wp_error($service_categories)) :
                        foreach ($service_categories as $category) :
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
                                'support' => 'fas fa-headset'
                            );

                            $icon = 'fas fa-tag'; // default
                            foreach ($category_icons as $key => $icon_class) {
                                if (strpos(strtolower($category->slug), $key) !== false) {
                                    $icon = $icon_class;
                                    break;
}
}?>
                        <div class="col-lg-4 col-md-6">
                            <div class="service-category-card h-100 bg-white rounded-3 shadow-sm border-0 overflow-hidden">
                                <div class="card-body p-4 text-center">
                                    <div class="category-icon mb-3">
                                        <i class="<?php echo esc_attr($icon);?>" style="font-size: 3rem; color: #3498db;"></i>
                                    </div>
                                    <h3 class="h5 mb-3" style="color: #2c3e50; font-weight: 600;">
                                        <?php echo esc_html($category->name);?>
                                    </h3>
                                    <?php if ($category->description) :?>
                                        <p class="text-muted mb-3">
                                            <?php echo esc_html(wp_trim_words($category->description, 15));?>
                                        </p>
                                    <?php else :?>
                                        <p class="text-muted mb-3">
                                            Professional <?php echo strtolower($category->name);?> services
                                        </p>
                                    <?php endif;?>
                                    <div class="category-count mb-3">
                                        <span class="badge bg-primary">
                                            <?php echo $category->count;?> Service<?php echo $category->count != 1 ? 's' : '';?>
                                        </span>
                                    </div>
                                    <a href="<?php echo get_term_link($category);?>" class="btn btn-outline-primary btn-sm">
                                        View Services <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                        endforeach;
                    else :?>
                        <div class="col-12">
                            <div class="text-center py-5">
                                <div class="bg-light p-5 rounded-3">
                                    <i class="fas fa-exclamation-triangle text-warning mb-3" style="font-size: 3rem;"></i>
                                    <h3 class="h5 mb-3">No Service Categories Found</h3>
                                    <p class="text-muted">Service categories will appear here once they are created.</p>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section>
    <!-- Individual Services Section -->
    <section id="services-grid" class="section bg-light">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h2 class="section-title mb-3" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-star me-3" style="color: #3498db;"></i>
                    Featured Services
                </h2>
                <p class="section-subtitle lead text-muted">
                    Our most popular and trusted professional services
                </p>
            </div>
            <!-- Services Display -->
            <div class="services-content">
                <?php
                // Get featured services
                $featured_services = new WP_Query(array(
                    'post_type' => 'service',
                    'posts_per_page' => 6,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));

                if ($featured_services->have_posts()) :?>
                    <div class="row g-4">
                        <?php while ($featured_services->have_posts()) : $featured_services->the_post();
                            $service_icon = get_post_meta(get_the_ID(), '_service_icon', true) ?: 'fas fa-home';
                            $service_price = get_post_meta(get_the_ID(), '_service_price', true);
                            $service_featured = get_post_meta(get_the_ID(), '_service_featured', true);?>
                            <div class="col-lg-4 col-md-6">
                                <div class="service-card h-100 bg-white rounded-3 shadow-sm border-0 overflow-hidden <?php echo $service_featured ? 'featured' : '';?>">
                                    <?php if (has_post_thumbnail()) :?>
                                        <div class="service-image">
                                            <a href="<?php the_permalink();?>">
                                                <?php the_post_thumbnail('medium', array('class' => 'w-100', 'style' => 'height: 200px; object-fit: cover;'));?>
                                            </a>
                                        </div>
                                    <?php else :?>
                                        <div class="service-icon-header bg-light p-4 text-center">
                                            <i class="<?php echo esc_attr($service_icon);?> text-primary" style="font-size: 3rem;"></i>
                                        </div>
                                    <?php endif;?>
                                    <div class="card-body p-4">
                                        <h3 class="h5 mb-3">
                                            <a href="<?php the_permalink();?>" class="text-decoration-none text-dark">
                                                <?php the_title();?>
                                            </a>
                                        </h3>
                                        <p class="text-muted mb-3">
                                            <?php echo wp_trim_words(get_the_excerpt() ?: get_the_content(), 20);?>
                                        </p>
                                        <?php
                                        // Display service categories
                                        $categories = get_the_terms(get_the_ID(), 'service_category');
                                        if ($categories && !is_wp_error($categories)) :?>
                                            <div class="service-categories mb-3">
                                                <?php foreach ($categories as $category) :?>
                                                    <span class="badge bg-light text-dark me-1"><?php echo esc_html($category->name);?></span>
                                                <?php endforeach;?>
                                            </div>
                                        <?php endif;?>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <?php if ($service_price) :?>
                                                <div class="service-price">
                                                    <span class="h6 text-primary mb-0"><?php echo esc_html($service_price);?></span>
                                                </div>
                                            <?php endif;?>
                                            <a href="<?php the_permalink();?>" class="btn btn-outline-primary btn-sm">
                                                Learn More <i class="fas fa-arrow-right ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;?>
                    </div>
                    <?php wp_reset_postdata();?>
                <?php else :?>
                    <div class="text-center py-5">
                        <div class="bg-white p-5 rounded-3 shadow-sm">
                            <i class="fas fa-exclamation-triangle text-warning mb-3" style="font-size: 3rem;"></i>
                            <h3 class="h5 mb-3">No Services Found</h3>
                            <p class="text-muted">Services will appear here once they are created.</p>
                            <a href="<?php echo admin_url('post-new.php?post_type=service');?>" class="btn btn-primary">
                                Add Your First Service
                            </a>
                        </div>
                    </div>
                <?php endif;?>
            </div>
            <div class="text-center mt-5">
                <a href="<?php echo esc_url(get_post_type_archive_link('service'));?>" class="btn btn-primary btn-lg px-5">
                    <i class="fas fa-list me-2"></i>View All Services
                </a>
            </div>
        </div>
    </section>
    <!-- Why Choose Us Section -->
    <section class="section">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h2 class="section-title mb-3" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-award me-3" style="color: #3498db;"></i>
                    Why Choose Our Services
                </h2>
                <p class="section-subtitle lead text-muted">
                    We are committed to providing exceptional service quality and customer satisfaction
                </p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card text-center p-4 bg-white rounded-3 shadow-sm h-100">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-shield-alt" style="font-size: 3rem; color: #3498db;"></i>
                        </div>
                        <h4 class="h5 mb-3" style="color: #2c3e50; font-weight: 600;">Licensed & Insured</h4>
                        <p class="text-muted">Fully licensed and insured for your peace of mind and protection. We meet all industry standards and regulations.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card text-center p-4 bg-white rounded-3 shadow-sm h-100">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-clock" style="font-size: 3rem; color: #3498db;"></i>
                        </div>
                        <h4 class="h5 mb-3" style="color: #2c3e50; font-weight: 600;">24/7 Availability</h4>
                        <p class="text-muted">Emergency services available around the clock for urgent needs. We're here when you need us most.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card text-center p-4 bg-white rounded-3 shadow-sm h-100">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-thumbs-up" style="font-size: 3rem; color: #3498db;"></i>
                        </div>
                        <h4 class="h5 mb-3" style="color: #2c3e50; font-weight: 600;">Satisfaction Guarantee</h4>
                        <p class="text-muted">100% satisfaction guarantee on all our services and workmanship. Your happiness is our priority.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card text-center p-4 bg-white rounded-3 shadow-sm h-100">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-users" style="font-size: 3rem; color: #3498db;"></i>
                        </div>
                        <h4 class="h5 mb-3" style="color: #2c3e50; font-weight: 600;">Expert Team</h4>
                        <p class="text-muted">Experienced professionals with years of industry expertise and continuous training to deliver the best results.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card text-center p-4 bg-white rounded-3 shadow-sm h-100">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-dollar-sign" style="font-size: 3rem; color: #3498db;"></i>
                        </div>
                        <h4 class="h5 mb-3" style="color: #2c3e50; font-weight: 600;">Competitive Pricing</h4>
                        <p class="text-muted">Fair and transparent pricing with no hidden fees. Get the best value for professional quality services.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card text-center p-4 bg-white rounded-3 shadow-sm h-100">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-tools" style="font-size: 3rem; color: #3498db;"></i>
                        </div>
                        <h4 class="h5 mb-3" style="color: #2c3e50; font-weight: 600;">Modern Equipment</h4>
                        <p class="text-muted">State-of-the-art tools and equipment to ensure efficient and high-quality service delivery every time.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA Section -->
    <section class="section bg-primary">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="text-white mb-4" style="font-weight: 600;">Ready to Get Started?</h2>
                    <p class="text-white-50 mb-4 lead">
                        Contact us today for a free consultation and personalized quote for your service needs. Let us help transform your vision into reality.
                    </p>
                    <div class="cta-buttons">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact')));?>" class="btn btn-light btn-lg me-3">
                            <i class="fas fa-envelope me-2"></i>
                            Get Free Quote
                        </a>
                        <a href="tel:+1234567890" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-phone me-2"></i>
                            Call Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
