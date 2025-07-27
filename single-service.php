<?php
/**
 * Template for displaying single Service posts
 */

get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

<!-- Service Header -->
<section class="section-sm bg-light-gray">
    <div class="container">
        <?php blueprint_folder_breadcrumb(); ?>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="service-header-content">
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'service_category');
                    if ($terms && !is_wp_error($terms)) : ?>
                        <div class="service-category mb-3">
                            <span class="badge bg-primary fs-6">
                                <i class="fas fa-tag me-2"></i>
                                <?php echo esc_html($terms[0]->name); ?>
                            </span>
                        </div>
                    <?php endif; ?>
                    
                    <h1 class="service-title mb-4"><?php the_title(); ?></h1>
                    
                    <?php if (has_excerpt()) : ?>
                        <p class="lead text-muted"><?php the_excerpt(); ?></p>
                    <?php endif; ?>
                    
                    <?php
                    $price = get_post_meta(get_the_ID(), '_service_price', true);
                    $duration = get_post_meta(get_the_ID(), '_service_duration', true);
                    ?>
                    
                    <div class="service-meta d-flex flex-wrap gap-4 mb-4">
                        <?php if ($price) : ?>
                            <div class="meta-item">
                                <strong class="text-primary d-block">Starting at</strong>
                                <span class="h4 text-dark mb-0"><?php echo esc_html($price); ?></span>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($duration) : ?>
                            <div class="meta-item">
                                <strong class="text-primary d-block">Timeline</strong>
                                <span class="h6 text-dark mb-0"><?php echo esc_html($duration); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="service-cta">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>?service=<?php echo urlencode(get_the_title()); ?>" class="btn btn-primary btn-lg me-3">
                            <i class="fas fa-envelope me-2"></i>
                            Get Started
                        </a>
                        <a href="#service-details" class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-info-circle me-2"></i>
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="service-featured-image">
                        <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded shadow')); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Service Details -->
<section id="service-details" class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="service-content">
                    <?php the_content(); ?>
                    
                    <?php
                    $features = get_post_meta(get_the_ID(), '_service_features', true);
                    if ($features) : ?>
                        <div class="service-features mt-5">
                            <h3>What's Included</h3>
                            <div class="row g-3">
                                <?php 
                                $features_array = explode("\n", $features);
                                foreach ($features_array as $feature) : 
                                    if (trim($feature)) : ?>
                                        <div class="col-md-6">
                                            <div class="feature-item d-flex align-items-start">
                                                <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                                                <span><?php echo esc_html(trim($feature)); ?></span>
                                            </div>
                                        </div>
                                    <?php endif;
                                endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="service-sidebar">
                    <!-- Contact Card -->
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <h5 class="card-title">Ready to Get Started?</h5>
                            <p class="card-text">Contact us today to discuss your project.</p>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>?service=<?php echo urlencode(get_the_title()); ?>" class="btn btn-primary w-100">
                                <i class="fas fa-envelope me-2"></i>
                                Get Quote
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Service Categories Section -->
<section class="service-categories-section bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header text-center mb-5">
                    <h2 class="h3 mb-3" style="color: #2c3e50; font-weight: 600;">
                        <i class="fas fa-layer-group me-3" style="color: #3498db;"></i>
                        Browse All Service Categories
                    </h2>
                    <p class="text-muted lead">Explore our complete range of professional services organized by category</p>
                </div>
                
                <!-- Enhanced Categories Grid -->
                <div class="categories-grid">
                    <div class="row g-4">
                        <!-- All Services Card -->
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="category-card h-100">
                                <a href="<?php echo get_post_type_archive_link('service'); ?>" class="category-card-link">
                                    <div class="category-card-inner p-4 text-center bg-white rounded-3 shadow-sm border-0 h-100">
                                        <div class="category-icon mb-3">
                                            <i class="fas fa-th-large" style="font-size: 2.5rem; color: #3498db;"></i>
                                        </div>
                                        <h3 class="category-title h5 mb-2" style="color: #2c3e50; font-weight: 600;">
                                            All Services
                                        </h3>
                                        <p class="category-description text-muted small mb-3">
                                            View our complete service portfolio
                                        </p>
                                        <div class="category-count">
                                            <span class="badge bg-primary">
                                                <?php echo wp_count_posts('service')->publish; ?> Services
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                        <?php
                        // Get all service categories
                        $service_categories = get_terms(array(
                            'taxonomy' => 'service_category',
                            'hide_empty' => true,
                            'orderby' => 'name',
                            'order' => 'ASC'
                        ));
                        
                        if ($service_categories && !is_wp_error($service_categories)) :
                            foreach ($service_categories as $category) :
                                // Get category icon (if stored as meta)
                                $category_icon = get_term_meta($category->term_id, 'category_icon', true);
                                $category_icon = $category_icon ?: 'fas fa-tag';
                                
                                // Get category color (if stored as meta)
                                $category_color = get_term_meta($category->term_id, 'category_color', true);
                                $category_color = $category_color ?: '#3498db';
                        ?>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="category-card h-100">
                                    <a href="<?php echo get_term_link($category); ?>" class="category-card-link">
                                        <div class="category-card-inner p-4 text-center bg-white rounded-3 shadow-sm border-0 h-100">
                                            <div class="category-icon mb-3">
                                                <i class="<?php echo esc_attr($category_icon); ?>" 
                                                   style="font-size: 2.5rem; color: <?php echo esc_attr($category_color); ?>;"></i>
                                            </div>
                                            <h3 class="category-title h5 mb-2" style="color: #2c3e50; font-weight: 600;">
                                                <?php echo esc_html($category->name); ?>
                                            </h3>
                                            <?php if ($category->description) : ?>
                                                <p class="category-description text-muted small mb-3">
                                                    <?php echo esc_html(wp_trim_words($category->description, 12)); ?>
                                                </p>
                                            <?php else : ?>
                                                <p class="category-description text-muted small mb-3">
                                                    Professional <?php echo strtolower($category->name); ?> services
                                                </p>
                                            <?php endif; ?>
                                            <div class="category-count">
                                                <span class="badge" style="background-color: <?php echo esc_attr($category_color); ?>;">
                                                    <?php echo $category->count; ?> Service<?php echo $category->count != 1 ? 's' : ''; ?>
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php 
                            endforeach;
                        endif; 
                        ?>
                    </div>
                </div>
                
                <!-- Quick Navigation -->
                <div class="quick-navigation mt-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="navigation-wrapper bg-white rounded-3 p-4 shadow-sm">
                                <h4 class="h6 mb-3 text-center" style="color: #2c3e50; font-weight: 600;">
                                    <i class="fas fa-compass me-2" style="color: #3498db;"></i>
                                    Quick Navigation
                                </h4>
                                <div class="nav-links d-flex flex-wrap justify-content-center gap-3">
                                    <a href="<?php echo get_post_type_archive_link('service'); ?>" 
                                       class="nav-link-btn btn btn-outline-primary btn-sm">
                                        <i class="fas fa-list me-2"></i>All Services
                                    </a>
                                    <a href="<?php echo home_url('/contact'); ?>" 
                                       class="nav-link-btn btn btn-outline-success btn-sm">
                                        <i class="fas fa-envelope me-2"></i>Get Quote
                                    </a>
                                    <a href="<?php echo home_url('/about'); ?>" 
                                       class="nav-link-btn btn btn-outline-info btn-sm">
                                        <i class="fas fa-info-circle me-2"></i>About Us
                                    </a>
                                    <a href="<?php echo home_url('/portfolio'); ?>" 
                                       class="nav-link-btn btn btn-outline-warning btn-sm">
                                        <i class="fas fa-briefcase me-2"></i>Portfolio
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
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
                <h2 class="text-white mb-4">Ready to Transform Your Business?</h2>
                <p class="text-white-50 mb-4 lead">
                    Let's discuss how <?php the_title(); ?> can help achieve your goals.
                </p>
                <div class="cta-buttons">
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>?service=<?php echo urlencode(get_the_title()); ?>" class="btn btn-light btn-lg me-3">
                        <i class="fas fa-rocket me-2"></i>
                        Start Your Project
                    </a>
                    <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-arrow-left me-2"></i>
                        View All Services
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>