<?php get_header(); ?>

<div class="content-section">
    <div class="container">
        <?php if (have_posts()) : ?>
            <h1 class="section-title"><?php single_post_title(); ?></h1>
            
            <?php while (have_posts()) : the_post(); ?>
                <article class="single-post">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>
                    
                    <?php if (get_post_type() == 'service') : ?>
                        <div class="service-details mt-4">
                            <h3>Service Details</h3>
                            <div class="service-meta">
                                <?php 
                                $price = get_post_meta(get_the_ID(), '_service_price', true);
                                $duration = get_post_meta(get_the_ID(), '_service_duration', true);
                                $capacity = get_post_meta(get_the_ID(), '_service_capacity', true);
                                ?>
                                
                                <?php if ($price) : ?>
                                    <p><strong>Price:</strong> ₹<?php echo esc_html($price); ?></p>
                                <?php endif; ?>
                                
                                <?php if ($duration) : ?>
                                    <p><strong>Duration:</strong> <?php echo esc_html($duration); ?></p>
                                <?php endif; ?>
                                
                                <?php if ($capacity) : ?>
                                    <p><strong>Capacity:</strong> <?php echo esc_html($capacity); ?></p>
                                <?php endif; ?>
                            </div>
                            
                            <div class="cta-section mt-4">
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-primary">Book This Service</a>
                                <a href="tel:<?php echo esc_attr(get_theme_mod('contact_phone', '+91 98765 43210')); ?>" class="btn btn-secondary">Call Now</a>
                            </div>
                        </div>
                    <?php endif; ?>
                </article>
            <?php endwhile; ?>
            
        <?php else : ?>
            <h1>Sorry, no content found.</h1>
            <p>It looks like nothing was found at this location.</p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
