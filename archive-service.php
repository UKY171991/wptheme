<?php
/**
 * Template for displaying service archive
 */

get_header(); ?>

<main id="main" class="site-main">
    <?php
    // Page Banner
    echo services_pro_get_banner_section(
        'All Services',
        'Comprehensive list of our professional home services. Browse by category or explore all available services.'
    );
    ?>

    <!-- Service Categories Filter Section -->
    <section class="section-sm bg-light">
        <div class="container">
            <div class="text-center mb-4">
                <h3 class="h5 mb-3">Filter by Category</h3>
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn-outline-accent btn-sm">
                        All Services
                    </a>
                    <?php
                    $categories = get_terms(array(
                        'taxonomy' => 'service_category',
                        'hide_empty' => true,
                    ));
                    
                    if (!empty($categories) && !is_wp_error($categories)):
                        foreach ($categories as $category):
                    ?>
                        <a href="<?php echo esc_url(get_term_link($category)); ?>" class="btn btn-outline-secondary btn-sm">
                            <?php echo esc_html($category->name); ?>
                            <span class="badge bg-accent text-white ms-1"><?php echo esc_html($category->count); ?></span>
                        </a>
                    <?php 
                        endforeach;
                    endif; 
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Grid Section -->
    <section class="section">
        <div class="container">
            <?php if (have_posts()) : ?>
                <?php echo services_pro_get_section_heading(
                    'Our Professional Services',
                    'Choose from our comprehensive range of home services'
                ); ?>
                
                <div class="row g-4">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="service-card h-100 bg-white rounded-3 shadow-sm border-0 overflow-hidden">
                                <?php if (has_post_thumbnail()) : ?>
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
                                    
                                    <?php
                                    // Display service categories
                                    $service_categories = get_the_terms(get_the_ID(), 'service_category');
                                    if ($service_categories && !is_wp_error($service_categories)):
                                    ?>
                                        <div class="mb-2">
                                            <?php foreach ($service_categories as $cat): ?>
                                                <span class="badge bg-accent-light text-accent small me-1">
                                                    <?php echo esc_html($cat->name); ?>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    
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
                    <p class="text-muted mb-4">No services are currently available.</p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-accent">
                        <i class="fas fa-home me-2"></i>Back to Home
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="section bg-accent text-white">
        <div class="container text-center">
            <h2 class="h3 mb-3">Need a Custom Service?</h2>
            <p class="mb-4">Can't find what you're looking for? Contact us for custom service solutions.</p>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-light btn-lg">
                <i class="fas fa-phone me-2"></i>Get Custom Quote
            </a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
                                
                                <div class="card-body p-4">
                                    <h3 class="card-title h5 mb-3">
                                        <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    
                                    <?php if (has_excerpt()) : ?>
                                        <p class="card-text text-muted mb-4"><?php the_excerpt(); ?></p>
                                    <?php else : ?>
                                        <p class="card-text text-muted mb-4"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                                    <?php endif; ?>
                                    
                                    <?php
                                    // Display service categories
                                    $categories = get_the_terms(get_the_ID(), 'service_category');
                                    if ($categories && !is_wp_error($categories)) :
                                        ?>
                                        <div class="mb-3">
                                            <?php foreach ($categories as $category) : ?>
                                                <span class="badge bg-light text-dark me-1"><?php echo esc_html($category->name); ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <a href="<?php the_permalink(); ?>" class="btn btn-accent btn-sm">
                                        Learn More <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

                <!-- Pagination -->
                <div class="row mt-5">
                    <div class="col-12">
                        <?php
                        the_posts_pagination(array(
                            'mid_size' => 2,
                            'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                            'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
                            'class' => 'pagination justify-content-center'
                        ));
                        ?>
                    </div>
                </div>
            <?php else : ?>
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>No services found</h3>
                        <p class="text-muted">Check back soon for new services!</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- CTA Section -->
    <?php echo services_pro_get_cta_section(); ?>
</main>

<?php get_footer(); ?>
