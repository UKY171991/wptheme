<?php get_header(); ?>

<main id="main" class="site-main">

<?php while (have_posts()) : the_post(); ?>

<?php
// Set variables for universal banner template
$badge_icon = '🔧';
$badge_text = 'PROFESSIONAL SERVICE';
$title = get_the_title();
$description = has_excerpt() ? get_the_excerpt() : 'Professional service delivered with excellence and care';
$buttons = array(
    array(
        'text' => 'Get Quote',
        'url' => home_url('/contact'),
        'type' => 'primary'
    ),
    array(
        'text' => 'All Services',
        'url' => get_post_type_archive_link('services'),
        'type' => 'secondary'
    )
);
$stats = array(
    array('number' => '24/7', 'label' => 'Support'),
    array('number' => '100%', 'label' => 'Satisfaction'),
    array('number' => '500+', 'label' => 'Happy Clients')
);

// Include universal banner
include get_template_directory() . '/template-parts/universal-banner.php';
?>

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
                                
                                <div style="margin-top: 20px; padding: 15px; background: #f8f9fa; border-radius: 8px; font-size: 0.9rem; color: #666;">
                                    <strong>Service ID:</strong> <?php echo get_the_ID(); ?><br>
                                    <strong>Post Type:</strong> <?php echo get_post_type(); ?><br>
                                    <strong>Status:</strong> <?php echo get_post_status(); ?>
                                </div>
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
