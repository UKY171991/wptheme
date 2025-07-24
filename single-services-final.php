<?php get_header(); ?>

<main id="main" class="site-main">

<?php while (have_posts()) : the_post(); ?>

<!-- Universal Banner Section -->
<section class="universal-banner">
    <div class="container">
        <div class="banner-content">
            <div class="badge">
                <span class="badge-icon">🔧</span>
                <span class="badge-text">PROFESSIONAL SERVICE</span>
            </div>
            <h1 class="banner-title"><?php the_title(); ?></h1>
            <p class="banner-description">
                <?php echo has_excerpt() ? get_the_excerpt() : 'Professional service delivered with excellence and care'; ?>
            </p>
            <div class="banner-buttons">
                <a href="<?php echo home_url('/contact'); ?>" class="btn btn-primary">Get Quote</a>
                <a href="<?php echo get_post_type_archive_link('services'); ?>" class="btn btn-secondary">All Services</a>
            </div>
            <div class="banner-stats">
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Support</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">100%</span>
                    <span class="stat-label">Satisfaction</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Happy Clients</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Service Content Section -->
<div class="universal-page-content">
    <div class="container">
        <section class="content-section">
            <div class="service-detail-layout">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="service-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="service-content-grid">
                    <div class="service-description">
                        <div class="content">
                            <?php 
                            the_content(); 
                            
                            // Fallback content if empty
                            if (empty(trim(get_the_content()))) :
                            ?>
                                <p>This is a professional service. Contact us for more details about this service.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="service-sidebar">
                        <div class="service-info">
                            <h3>Service Details</h3>
                            
                            <?php 
                            $price = get_post_meta(get_the_ID(), '_service_price', true);
                            $duration = get_post_meta(get_the_ID(), '_service_duration', true);
                            $features = get_post_meta(get_the_ID(), '_service_features', true);
                            ?>
                            
                            <?php if ($price) : ?>
                                <div class="detail-item">
                                    <strong>Price:</strong> <?php echo esc_html($price); ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($duration) : ?>
                                <div class="detail-item">
                                    <strong>Duration:</strong> <?php echo esc_html($duration); ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($features) : ?>
                                <div class="detail-item">
                                    <strong>Features:</strong>
                                    <ul>
                                        <?php 
                                        $features_array = explode("\n", $features);
                                        foreach ($features_array as $feature) : 
                                            if (trim($feature)) :
                                        ?>
                                            <li><?php echo esc_html(trim($feature)); ?></li>
                                        <?php 
                                            endif;
                                        endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            
                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">Get a Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php endwhile; ?>

</main>

<?php get_footer(); ?>
