<?php
/**
 * Template for displaying service archive
 */

get_header(); ?>

<main id="main" class="site-main">
    <?php
    // Page Banner
    echo services_pro_get_banner_section(
        'Our Services',
        'Professional home services you can trust. From maintenance to repairs, we\'ve got you covered.'
    );
    ?>

    <!-- Services Grid Section -->
    <section class="section">
        <div class="container">
            <?php if (have_posts()) : ?>
                <div class="row g-4">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="card service-card h-100 shadow-sm border-0">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="card-img-top position-relative overflow-hidden">
                                        <?php the_post_thumbnail('service-thumbnail', array('class' => 'img-fluid w-100 h-100 object-fit-cover')); ?>
                                        <div class="overlay position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-25"></div>
                                    </div>
                                <?php endif; ?>
                                
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
