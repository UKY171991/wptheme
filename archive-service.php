<?php
/**
 * The template for displaying service archive pages
 */

get_header(); ?>

<main id="main" class="site-main">
    <?php
    // Page Banner
    echo services_pro_get_banner_section(
        'Our Services',
        'Professional services designed to meet all your needs. Quality work, reliable results.'
    );
    ?>

    <!-- Services Archive Section -->
    <section id="services-archive" class="section">
        <div class="container">
            <?php if (have_posts()) : ?>
                
                <?php echo services_pro_get_section_heading(
                    'All Services',
                    'Browse our complete range of professional services'
                ); ?>
                
                <div class="row g-4">
                    <?php while (have_posts()) : the_post(); 
                        $service_icon = get_post_meta(get_the_ID(), '_service_icon', true) ?: 'fas fa-home';
                        $service_price = get_post_meta(get_the_ID(), '_service_price', true);
                        $service_featured = get_post_meta(get_the_ID(), '_service_featured', true);
                    ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="service-card h-100 bg-white rounded-3 shadow-sm border-0 overflow-hidden <?php echo $service_featured ? 'featured' : ''; ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="service-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium', array('class' => 'w-100', 'style' => 'height: 200px; object-fit: cover;')); ?>
                                        </a>
                                    </div>
                                <?php else : ?>
                                    <div class="service-icon-header bg-light p-4 text-center">
                                        <i class="<?php echo esc_attr($service_icon); ?> text-primary" style="font-size: 3rem;"></i>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="card-body p-4">
                                    <h3 class="h5 mb-3">
                                        <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    
                                    <?php if (has_excerpt()) : ?>
                                        <p class="card-text text-muted mb-4"><?php the_excerpt(); ?></p>
                                    <?php else : ?>
                                        <p class="card-text text-muted mb-4"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                                    <?php endif; ?>
                                    
                                    <?php if ($service_price) : ?>
                                        <div class="service-price mb-3">
                                            <span class="h6 text-primary fw-bold">Starting at $<?php echo esc_html($service_price); ?></span>
                                        </div>
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
                                    
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">
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
                        <nav aria-label="Services pagination">
                            <?php
                            echo paginate_links(array(
                                'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                                'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
                                'type' => 'list',
                                'class' => 'pagination justify-content-center'
                            ));
                            ?>
                        </nav>
                    </div>
                </div>
                
            <?php else : ?>
                
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center py-5">
                        <div class="no-services-found">
                            <i class="fas fa-search fa-3x text-muted mb-4"></i>
                            <h3 class="h4 mb-3">No Services Found</h3>
                            <p class="text-muted mb-4">We don't have any services to display at the moment. Please check back later or contact us for more information.</p>
                            <div class="d-flex gap-3 justify-content-center">
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                                    <i class="fas fa-home me-2"></i>Go Home
                                </a>
                                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline-primary">
                                    <i class="fas fa-envelope me-2"></i>Contact Us
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
            <?php endif; ?>
        </div>
    </section>

    <!-- CTA Section -->
    <?php echo services_pro_get_cta_section(); ?>

</main>

<?php get_footer(); ?>
