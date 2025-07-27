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