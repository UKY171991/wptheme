<?php 
/**
 * Template for displaying service category archive pages
 */

get_header(); 

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
                    'Professional ' . esc_html($term_name) . ' services (' . $services_count . ' found)'
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
