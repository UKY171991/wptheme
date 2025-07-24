<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    <!-- Service Detail Banner Section -->
    <section class="page-banner services-banner">
        <div class="container">
            <div class="banner-content">
                <div class="breadcrumb">
                    <a href="<?php echo home_url(); ?>"><i class="fas fa-home"></i> Home</a> 
                    <span class="breadcrumb-separator">→</span> 
                    <a href="<?php echo get_post_type_archive_link('services'); ?>">Services</a>
                    <span class="breadcrumb-separator">→</span> 
                    <span><?php the_title(); ?></span>
                </div>
                <h1 class="banner-title"><?php the_title(); ?></h1>
                <?php if (has_excerpt()) : ?>
                    <p class="banner-subtitle"><?php the_excerpt(); ?></p>
                <?php else : ?>
                    <p class="banner-subtitle">Professional service delivered with excellence and care</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <div class="single-service" style="padding: 4rem 0; background: #f8f9fa;">
        <div class="container">
            <article class="service-detail">

                <div class="service-content" style="display: grid; grid-template-columns: 2fr 1fr; gap: 3rem; align-items: start;">
                    <div class="service-description">
                        <div class="content" style="font-size: 1.1rem; line-height: 1.8; color: #333;">
                            <?php the_content(); ?>
                        </div>
                    </div>

                    <div class="service-sidebar">
                        <div class="service-info" style="background: #f8f9fa; padding: 2rem; border-radius: 15px; margin-bottom: 2rem;">
                            <h3 style="margin-bottom: 1.5rem; color: #333;">Service Details</h3>
                            
                            <?php 
                            $price = get_post_meta(get_the_ID(), '_service_price', true);
                            $duration = get_post_meta(get_the_ID(), '_service_duration', true);
                            $features = get_post_meta(get_the_ID(), '_service_features', true);
                            ?>
                            
                            <?php if ($price) : ?>
                                <div class="price-info" style="margin-bottom: 1rem;">
                                    <strong>Price:</strong> <?php echo esc_html($price); ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($duration) : ?>
                                <div class="duration-info" style="margin-bottom: 1rem;">
                                    <strong>Duration:</strong> <?php echo esc_html($duration); ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($features) : ?>
                                <div class="features-info">
                                    <strong>Features:</strong>
                                    <ul style="margin-top: 0.5rem; padding-left: 1.5rem;">
                                        <?php 
                                        $features_array = explode("\n", $features);
                                        foreach ($features_array as $feature) :
                                            if (trim($feature)) :
                                        ?>
                                            <li><?php echo esc_html(trim($feature)); ?></li>
                                        <?php 
                                            endif;
                                        endforeach; 
                                        ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="service-contact" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 2rem; border-radius: 15px; text-align: center; color: white;">
                            <h3 style="margin-bottom: 1rem;">Ready to Book?</h3>
                            <p style="margin-bottom: 2rem;">Get started with this service today</p>
                            <a href="#contact" class="cta-button">Book Now</a>
                        </div>
                    </div>
                </div>

                <div class="service-categories" style="margin-top: 3rem;">
                    <?php 
                    $terms = get_the_terms(get_the_ID(), 'service_category');
                    if ($terms && !is_wp_error($terms)) :
                    ?>
                        <div class="categories" style="text-align: center;">
                            <h4>Service Category:</h4>
                            <?php foreach ($terms as $term) : ?>
                                <a href="<?php echo esc_url(get_term_link($term)); ?>" class="btn btn-secondary" style="margin: 0.25rem;">
                                    <?php echo esc_html($term->name); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </article>
        <?php endwhile; ?>

        <!-- Related Services -->
        <?php
        $related_services = new WP_Query(array(
            'post_type' => 'services',
            'posts_per_page' => 3,
            'post__not_in' => array(get_the_ID()),
        ));

        if ($related_services->have_posts()) :
        ?>
            <section class="related-services" style="margin-top: 4rem; padding: 3rem 0; background: #f8f9fa; border-radius: 15px;">
                <div class="container">
                    <h2 style="text-align: center; margin-bottom: 3rem;">Other Services You Might Like</h2>
                    <div class="services-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                        <?php while ($related_services->have_posts()) : $related_services->the_post(); ?>
                            <div class="service-card" style="background: white; padding: 2rem; border-radius: 15px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="service-thumbnail" style="margin-bottom: 1rem;">
                                        <?php the_post_thumbnail('service-thumbnail', array('style' => 'width: 100%; height: 150px; object-fit: cover; border-radius: 10px;')); ?>
                                    </div>
                                <?php endif; ?>
                                <h3 style="margin-bottom: 1rem;"><a href="<?php the_permalink(); ?>" style="color: #333; text-decoration: none;"><?php the_title(); ?></a></h3>
                                <p style="color: #666; margin-bottom: 1.5rem;"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn">Learn More</a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>
        <?php 
        wp_reset_postdata();
        endif; 
        ?>
            </article>
        </div>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>
