<?php
/**
 * Template for displaying single service
 */

get_header(); ?>

<main id="main" class="site-main">
    <?php while (have_posts()) : the_post(); ?>
        
        <?php
        // Page Banner with service title
        echo services_pro_get_banner_section(
            get_the_title(),
            has_excerpt() ? get_the_excerpt() : 'Professional service details and booking information'
        );
        ?>

        <!-- Service Details Section -->
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Service Content -->
                        <div class="service-content">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="service-featured-image mb-4">
                                    <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded-3 w-100')); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="content-wrapper">
                                <?php the_content(); ?>
                            </div>
                            
                            <?php
                            // Service Categories
                            $service_categories = get_the_terms(get_the_ID(), 'service_category');
                            if ($service_categories && !is_wp_error($service_categories)):
                            ?>
                                <div class="service-categories mt-4 pt-4 border-top">
                                    <h4 class="h6 mb-3">Service Categories:</h4>
                                    <div class="d-flex flex-wrap gap-2">
                                        <?php foreach ($service_categories as $category): ?>
                                            <a href="<?php echo esc_url(get_term_link($category)); ?>" class="badge bg-accent-light text-accent text-decoration-none fs-6 px-3 py-2">
                                                <?php echo esc_html($category->name); ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <!-- Service Sidebar -->
                        <div class="service-sidebar">
                            <!-- Service Info Card -->
                            <div class="card bg-accent-light border-0 mb-4">
                                <div class="card-body p-4">
                                    <h3 class="h5 mb-3 text-accent">Service Information</h3>
                                    
                                    <?php
                                    // Get service price
                                    $price = get_post_meta(get_the_ID(), 'service_price', true);
                                    if ($price):
                                    ?>
                                        <div class="service-price mb-3">
                                            <span class="text-muted small">Starting from</span>
                                            <div class="h4 text-accent mb-0">$<?php echo esc_html($price); ?></div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php
                                    // Get service duration
                                    $duration = get_post_meta(get_the_ID(), 'service_duration', true);
                                    if ($duration):
                                    ?>
                                        <div class="service-duration mb-3">
                                            <i class="fas fa-clock text-accent me-2"></i>
                                            <strong>Duration:</strong> <?php echo esc_html($duration); ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-accent w-100 mb-2">
                                        <i class="fas fa-calendar-check me-2"></i>Book Service
                                    </a>
                                    <a href="tel:+1234567890" class="btn btn-outline-accent w-100">
                                        <i class="fas fa-phone me-2"></i>Call Now
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Service Features -->
                            <div class="card border-0 mb-4">
                                <div class="card-body p-4">
                                    <h4 class="h6 mb-3">What's Included:</h4>
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Professional service</li>
                                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Quality guarantee</li>
                                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Licensed & insured</li>
                                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Free consultation</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Related Services Section -->
        <section class="section bg-light">
            <div class="container">
                <?php echo services_pro_get_section_heading(
                    'Related Services',
                    'Other services you might be interested in'
                ); ?>
                
                <?php
                // Get related services from same categories
                $current_categories = wp_get_post_terms(get_the_ID(), 'service_category', array('fields' => 'ids'));
                
                if (!empty($current_categories)):
                    $related_services = new WP_Query(array(
                        'post_type' => 'service',
                        'posts_per_page' => 3,
                        'post__not_in' => array(get_the_ID()),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'service_category',
                                'field' => 'term_id',
                                'terms' => $current_categories,
                            ),
                        ),
                    ));
                    
                    if ($related_services->have_posts()):
                ?>
                    <div class="row g-4">
                        <?php while ($related_services->have_posts()): $related_services->the_post(); ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="service-card h-100 bg-white rounded-3 shadow-sm border-0 overflow-hidden">
                                    <?php if (has_post_thumbnail()): ?>
                                        <div class="service-image">
                                            <?php the_post_thumbnail('medium', array('class' => 'w-100', 'style' => 'height: 180px; object-fit: cover;')); ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="card-body p-4">
                                        <h4 class="h6 mb-2">
                                            <a href="<?php the_permalink(); ?>" class="text-decoration-none text-primary-dark">
                                                <?php the_title(); ?>
                                            </a>
                                        </h4>
                                        <p class="text-muted small mb-3"><?php echo wp_trim_words(get_the_excerpt(), 10); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="btn btn-outline-accent btn-sm">
                                            Learn More <i class="fas fa-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php 
                    endif;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </section>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
                    </div>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="col-lg-4">
                            <div class="text-center">
                                <?php the_post_thumbnail('medium_large', array('class' => 'img-fluid rounded shadow')); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- Service Content -->
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="service-content">
                            <?php the_content(); ?>
                            
                            <?php
                            // Custom fields for service details
                            $price_range = get_post_meta(get_the_ID(), 'service_price_range', true);
                            $duration = get_post_meta(get_the_ID(), 'service_duration', true);
                            $includes = get_post_meta(get_the_ID(), 'service_includes', true);
                            
                            if ($price_range || $duration || $includes) :
                            ?>
                                <div class="service-details bg-light p-4 rounded mt-4">
                                    <h3 class="h5 mb-3">Service Details</h3>
                                    <div class="row">
                                        <?php if ($price_range) : ?>
                                            <div class="col-md-4 mb-3">
                                                <h6 class="text-accent mb-2"><i class="fas fa-dollar-sign me-2"></i>Price Range</h6>
                                                <p class="mb-0"><?php echo esc_html($price_range); ?></p>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ($duration) : ?>
                                            <div class="col-md-4 mb-3">
                                                <h6 class="text-accent mb-2"><i class="fas fa-clock me-2"></i>Duration</h6>
                                                <p class="mb-0"><?php echo esc_html($duration); ?></p>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ($includes) : ?>
                                            <div class="col-md-4 mb-3">
                                                <h6 class="text-accent mb-2"><i class="fas fa-check-circle me-2"></i>Includes</h6>
                                                <p class="mb-0"><?php echo esc_html($includes); ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="service-sidebar">
                            <!-- Service Categories -->
                            <?php
                            $categories = get_the_terms(get_the_ID(), 'service_category');
                            if ($categories && !is_wp_error($categories)) :
                            ?>
                                <div class="sidebar-widget mb-4">
                                    <h4 class="widget-title h6 mb-3">Service Categories</h4>
                                    <div class="categories-list">
                                        <?php foreach ($categories as $category) : ?>
                                            <a href="<?php echo esc_url(get_term_link($category)); ?>" class="badge bg-accent text-white me-1 mb-1 text-decoration-none">
                                                <?php echo esc_html($category->name); ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Service Tags -->
                            <?php
                            $tags = get_the_terms(get_the_ID(), 'service_tag');
                            if ($tags && !is_wp_error($tags)) :
                            ?>
                                <div class="sidebar-widget mb-4">
                                    <h4 class="widget-title h6 mb-3">Tags</h4>
                                    <div class="tags-list">
                                        <?php foreach ($tags as $tag) : ?>
                                            <a href="<?php echo esc_url(get_term_link($tag)); ?>" class="badge bg-light text-dark me-1 mb-1 text-decoration-none">
                                                <?php echo esc_html($tag->name); ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Contact CTA -->
                            <div class="sidebar-widget bg-accent text-white p-4 rounded">
                                <h4 class="h5 mb-3">Need This Service?</h4>
                                <p class="mb-3">Get a free quote today and let our experts take care of your needs.</p>
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-light btn-sm w-100">
                                    <i class="fas fa-phone me-2"></i>Get Free Quote
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Related Services -->
        <?php
        $related_services = new WP_Query(array(
            'post_type' => 'service',
            'posts_per_page' => 3,
            'post__not_in' => array(get_the_ID()),
            'orderby' => 'rand'
        ));
        
        if ($related_services->have_posts()) :
        ?>
            <section class="section bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center mb-5">
                            <h2 class="section-title">Related Services</h2>
                            <p class="text-muted">You might also be interested in these services</p>
                        </div>
                    </div>
                    <div class="row g-4">
                        <?php while ($related_services->have_posts()) : $related_services->the_post(); ?>
                            <div class="col-lg-4">
                                <div class="card service-card h-100 shadow-sm border-0">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="card-img-top position-relative overflow-hidden">
                                            <?php the_post_thumbnail('service-thumbnail', array('class' => 'img-fluid w-100 h-100 object-fit-cover')); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="card-body p-4">
                                        <h5 class="card-title">
                                            <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                                <?php the_title(); ?>
                                            </a>
                                        </h5>
                                        <p class="card-text text-muted"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="btn btn-accent btn-sm">
                                            Learn More <i class="fas fa-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>
        <?php
        endif;
        wp_reset_postdata();
        ?>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
