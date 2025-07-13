<?php get_header(); ?>

<!-- Hero Section for Single Post -->
<section class="hero-section-advanced">
    <div class="hero-background"></div>
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="hero-content">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h1 class="hero-title"><?php the_title(); ?></h1>
                <div class="hero-meta">
                    <div class="post-meta-info">
                        <span class="meta-item">
                            <i class="fas fa-calendar"></i>
                            <?php echo get_the_date(); ?>
                        </span>
                        <span class="meta-item">
                            <i class="fas fa-user"></i>
                            <?php the_author(); ?>
                        </span>
                        <?php if (get_post_type() == 'service') : ?>
                            <span class="meta-item service-badge">
                                <i class="fas fa-star"></i>
                                Service
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="content-section">
    <div class="container">
        <div class="content-wrapper">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="single-post-enhanced">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-featured-image">
                            <div class="image-container">
                                <?php the_post_thumbnail('large', array('class' => 'featured-img')); ?>
                                <div class="image-overlay"></div>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <div class="post-content-enhanced">
                        <?php the_content(); ?>
                    </div>
                    
                    <?php if (get_post_type() == 'service') : ?>
                        <div class="service-details-enhanced">
                            <h3 class="details-title">
                                <i class="fas fa-info-circle"></i>
                                Service Details
                            </h3>
                            <div class="service-meta-grid">
                                <?php 
                                $price = get_post_meta(get_the_ID(), '_service_price', true);
                                $duration = get_post_meta(get_the_ID(), '_service_duration', true);
                                $capacity = get_post_meta(get_the_ID(), '_service_capacity', true);
                                ?>
                                
                                <?php if ($price) : ?>
                                    <div class="meta-card">
                                        <div class="meta-icon">
                                            <i class="fas fa-rupee-sign"></i>
                                        </div>
                                        <div class="meta-info">
                                            <span class="meta-label">Price</span>
                                            <span class="meta-value">₹<?php echo esc_html($price); ?></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($duration) : ?>
                                    <div class="meta-card">
                                        <div class="meta-icon">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="meta-info">
                                            <span class="meta-label">Duration</span>
                                            <span class="meta-value"><?php echo esc_html($duration); ?></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($capacity) : ?>
                                    <div class="meta-card">
                                        <div class="meta-icon">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <div class="meta-info">
                                            <span class="meta-label">Capacity</span>
                                            <span class="meta-value"><?php echo esc_html($capacity); ?></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="service-cta">
                                <a href="/contact" class="cta-button-enhanced">
                                    <i class="fas fa-calendar-check"></i>
                                    Book This Service
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Post Navigation -->
                    <div class="post-navigation">
                        <div class="nav-links">
                            <?php
                            $prev_post = get_previous_post();
                            $next_post = get_next_post();
                            ?>
                            
                            <?php if ($prev_post) : ?>
                                <div class="nav-previous">
                                    <a href="<?php echo get_permalink($prev_post->ID); ?>" class="nav-link">
                                        <div class="nav-direction">
                                            <i class="fas fa-arrow-left"></i>
                                            Previous
                                        </div>
                                        <div class="nav-title"><?php echo get_the_title($prev_post->ID); ?></div>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($next_post) : ?>
                                <div class="nav-next">
                                    <a href="<?php echo get_permalink($next_post->ID); ?>" class="nav-link">
                                        <div class="nav-direction">
                                            Next
                                            <i class="fas fa-arrow-right"></i>
                                        </div>
                                        <div class="nav-title"><?php echo get_the_title($next_post->ID); ?></div>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<!-- Related Services/Posts -->
<?php if (get_post_type() == 'service') : ?>
    <section class="related-services">
        <div class="container">
            <h2 class="section-title">
                <i class="fas fa-star"></i>
                Related Services
            </h2>
            
            <div class="services-grid">
                <?php
                $related_services = get_posts(array(
                    'post_type' => 'service',
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'orderby' => 'rand'
                ));
                
                foreach ($related_services as $service) : setup_postdata($service);
                ?>
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3 class="service-title"><?php echo get_the_title($service->ID); ?></h3>
                        <p class="service-description">
                            <?php echo wp_trim_words(get_the_content($service->ID), 20); ?>
                        </p>
                        <a href="<?php echo get_permalink($service->ID); ?>" class="service-link">
                            Learn More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>
