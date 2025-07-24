<?php get_header(); 

// Get current taxonomy term
$queried_object = get_queried_object();
$term_id = $queried_object->term_id;
$term_name = $queried_object->name;
$term_description = $queried_object->description;
$term_slug = $queried_object->slug;

// Count services in this category
$services_count = 0;
if (have_posts()) {
    global $wp_query;
    $services_count = $wp_query->found_posts;
}
?>

<main id="main" class="site-main">
    <?php
    // Page Banner with category name
    echo services_pro_get_banner_section(
        esc_html($term_name),
        !empty($term_description) ? esc_html($term_description) : 'Professional services in ' . esc_html($term_name) . ' category'
    );
    ?>

    <!-- Services in Category Section -->
    <section class="section">
        <div class="container">
            <?php if (have_posts()): ?>
                <?php echo services_pro_get_section_heading(
                    'Available Services',
                    'Professional ' . esc_html($term_name) . ' services'
                ); ?>
                
                <div class="row g-4">
                    <?php while (have_posts()): the_post(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="service-card h-100 bg-white rounded-3 shadow-sm border-0 overflow-hidden">
                                <?php if (has_post_thumbnail()): ?>
                                    <div class="service-image">
                                        <?php the_post_thumbnail('medium', array('class' => 'w-100', 'style' => 'height: 200px; object-fit: cover;')); ?>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="card-body p-4">
                                    <h3 class="h5 mb-3 text-primary-dark">
                                        <a href="<?php the_permalink(); ?>" class="text-decoration-none text-primary-dark">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    
                                    <p class="text-muted mb-3"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                    
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="<?php the_permalink(); ?>" class="btn btn-outline-accent btn-sm">
                                            Learn More <i class="fas fa-arrow-right ms-1"></i>
                                        </a>
                                        <?php
                                        // Get service price if available
                                        $price = get_post_meta(get_the_ID(), 'service_price', true);
                                        if ($price):
                                        ?>
                                            <span class="fw-bold text-accent">From $<?php echo esc_html($price); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                
                <!-- Pagination -->
                <div class="mt-5">
                    <?php
                    the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text' => '<i class="fas fa-chevron-left me-1"></i>Previous',
                        'next_text' => 'Next<i class="fas fa-chevron-right ms-1"></i>',
                        'class' => 'pagination justify-content-center'
                    ));
                    ?>
                </div>
                
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="fas fa-search text-muted mb-3" style="font-size: 3rem;"></i>
                    <h3 class="h4 mb-3">No Services Found</h3>
                    <p class="text-muted mb-4">No services are currently available in this category.</p>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn btn-accent">
                        <i class="fas fa-arrow-left me-2"></i>Browse All Services
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Related Categories Section -->
    <section class="section bg-light">
        <div class="container">
            <?php echo services_pro_get_section_heading(
                'Other Service Categories',
                'Explore more of our professional services'
            ); ?>
            
            <?php
            // Get other service categories
            $other_categories = get_terms(array(
                'taxonomy' => 'service_category',
                'hide_empty' => true,
                'exclude' => array($queried_object->term_id),
                'number' => 6
            ));
            
            if (!empty($other_categories) && !is_wp_error($other_categories)):
            ?>
                <div class="row g-4">
                    <?php foreach ($other_categories as $category): ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="service-category-card h-100 bg-white rounded-3 shadow-sm border-0 overflow-hidden position-relative">
                                <div class="category-icon-header bg-accent-light p-4 text-center">
                                    <i class="fas fa-home text-accent" style="font-size: 2.5rem;"></i>
                                </div>
                                
                                <div class="card-body p-4">
                                    <h4 class="h6 mb-2">
                                        <a href="<?php echo esc_url(get_term_link($category)); ?>" class="text-decoration-none text-primary-dark stretched-link">
                                            <?php echo esc_html($category->name); ?>
                                        </a>
                                    </h4>
                                    
                                    <span class="text-accent small">
                                        <?php echo esc_html($category->count); ?> 
                                        <?php echo _n('Service', 'Services', $category->count, 'services-pro'); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
            </p>
            <div class="banner-buttons">
                <a href="<?php echo get_post_type_archive_link('services'); ?>" class="btn btn-primary">Browse All Services</a>
                <a href="<?php echo home_url('/contact'); ?>" class="btn btn-secondary">Get Quote</a>
            </div>
            <div class="banner-stats">
                <div class="stat-item">
                    <span class="stat-number"><?php echo $services_count; ?></span>
                    <span class="stat-label">Available Services</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Support</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">100%</span>
                    <span class="stat-label">Satisfaction</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Content Section -->
<div class="universal-page-content">
    <div class="container">
        <section class="content-section">
            <h2>Services in <?php echo esc_html($term_name); ?> Category</h2>
            
            <?php if (have_posts()) : ?>
                <div class="services-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="service-card">
                            <div class="service-card-content">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="service-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="service-info">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="service-excerpt">
                                        <?php 
                                        if (has_excerpt()) {
                                            echo wp_trim_words(get_the_excerpt(), 20);
                                        } else {
                                            echo wp_trim_words(get_the_content(), 20);
                                        }
                                        ?>
                                    </div>
                                    
                                    <?php 
                                    $price = get_post_meta(get_the_ID(), '_service_price', true);
                                    if ($price) : ?>
                                        <div class="service-price"><?php echo esc_html($price); ?></div>
                                    <?php endif; ?>
                                    
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                
                <?php
                // Pagination
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('← Previous', 'services-pro'),
                    'next_text' => __('Next →', 'services-pro'),
                ));
                ?>
                
            <?php else : ?>
                <div class="text-center py-5">
                    <i class="fas fa-search text-muted mb-3" style="font-size: 3rem;"></i>
                    <h3 class="h4 mb-3">No Services Found</h3>
                    <p class="text-muted mb-4">No services are currently available in the "<?php echo esc_html($term_name); ?>" category.</p>
                    <p class="text-muted mb-4">We're constantly adding new services. Check back soon or contact us for custom solutions.</p>
                    <div class="d-flex gap-3 justify-content-center">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-accent">
                            <i class="fas fa-phone me-2"></i>Contact Us
                        </a>
                        <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn-outline-accent">
                            <i class="fas fa-list me-2"></i>All Services
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="section bg-accent text-white">
        <div class="container text-center">
            <h2 class="h3 mb-3">Need Help with <?php echo esc_html($term_name); ?>?</h2>
            <p class="mb-4">Contact us for personalized solutions and professional service.</p>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-light btn-lg">
                <i class="fas fa-phone me-2"></i>Get Custom Quote
            </a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
