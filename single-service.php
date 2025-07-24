<?php
/**
 * Template for displaying single service
 */

get_header(); ?>

<main id="main" class="site-main">
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Hero Section -->
        <section class="hero-section bg-primary-dark text-white py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <nav aria-label="breadcrumb" class="mb-3">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" class="text-white-50">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="text-white-50">Services</a>
                                </li>
                                <li class="breadcrumb-item active text-white" aria-current="page"><?php the_title(); ?></li>
                            </ol>
                        </nav>
                        <h1 class="display-4 fw-bold mb-3"><?php the_title(); ?></h1>
                        <?php if (has_excerpt()) : ?>
                            <p class="lead text-white-75"><?php the_excerpt(); ?></p>
                        <?php endif; ?>
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
