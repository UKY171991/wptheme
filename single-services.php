<?php
/**
 * Single Service Template
 * Displays individual service details
 */

get_header();

while (have_posts()): the_post();
    $starting_price = get_post_meta(get_the_ID(), '_service_starting_price', true);
    $duration = get_post_meta(get_the_ID(), '_service_duration', true);
    $availability = get_post_meta(get_the_ID(), '_service_availability', true);
    $categories = get_the_terms(get_the_ID(), 'service_categories');
?>

<main id="main" class="site-main single-service" role="main">
    <!-- Service Header -->
    <section class="service-header-section">
        <div class="container">
            <div class="service-header-content">
                <!-- Breadcrumb -->
                <nav class="breadcrumb" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                    <span class="separator" aria-hidden="true">›</span>
                    <a href="<?php echo esc_url(get_post_type_archive_link('services')); ?>">Services</a>
                    <?php if ($categories && !is_wp_error($categories)): ?>
                        <span class="separator" aria-hidden="true">›</span>
                        <a href="<?php echo esc_url(get_term_link($categories[0])); ?>"><?php echo esc_html($categories[0]->name); ?></a>
                    <?php endif; ?>
                    <span class="separator" aria-hidden="true">›</span>
                    <span class="current" aria-current="page"><?php the_title(); ?></span>
                </nav>
                
                <div class="service-header-grid">
                    <div class="service-header-text">
                        <?php if ($categories && !is_wp_error($categories)): ?>
                            <div class="service-category">
                                <a href="<?php echo esc_url(get_term_link($categories[0])); ?>" class="category-tag">
                                    <?php echo esc_html($categories[0]->name); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <h1 class="service-title"><?php the_title(); ?></h1>
                        
                        <div class="service-excerpt">
                            <?php if (has_excerpt()): ?>
                                <?php the_excerpt(); ?>
                            <?php else: ?>
                                <p><?php echo wp_trim_words(get_the_content(), 25); ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="service-quick-info">
                            <?php if ($starting_price): ?>
                                <div class="quick-info-item">
                                    <span class="info-label">Starting Price:</span>
                                    <span class="info-value price"><?php echo esc_html($starting_price); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($duration): ?>
                                <div class="quick-info-item">
                                    <span class="info-label">Duration:</span>
                                    <span class="info-value"><?php echo esc_html($duration); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($availability): ?>
                                <div class="quick-info-item">
                                    <span class="info-label">Availability:</span>
                                    <span class="info-value"><?php echo esc_html($availability); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="service-actions">
                            <a href="<?php echo esc_url(home_url('/contact')); ?>?service=<?php echo urlencode(get_the_title()); ?>" 
                               class="btn btn-primary btn-lg">
                                Get Quote
                            </a>
                            <a href="tel:+1234567890" class="btn btn-outline btn-lg">
                                Call Now
                            </a>
                        </div>
                    </div>
                    
                    <?php if (has_post_thumbnail()): ?>
                        <div class="service-header-image">
                            <div class="service-image-container">
                                <?php the_post_thumbnail('large', array('loading' => 'eager')); ?>
                                <div class="image-overlay">
                                    <div class="overlay-content">
                                        <span class="overlay-badge">Professional Service</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Details -->
    <section class="service-details section">
        <div class="container">
            <div class="service-details-grid">
                <div class="service-content-main">
                    <div class="service-description">
                        <h2>Service Details</h2>
                        <div class="content-area">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    
                    <!-- Service Features -->
                    <div class="service-features">
                        <h3>What's Included</h3>
                        <div class="features-list">
                            <div class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span>Professional service delivery</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span>Quality guarantee</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span>Customer support</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span>Satisfaction guarantee</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Service Sidebar -->
                <div class="service-sidebar">
                    <div class="service-booking-card">
                        <h3>Book This Service</h3>
                        <div class="booking-info">
                            <?php if ($starting_price): ?>
                                <div class="booking-price">
                                    <span class="price-label">Starting at</span>
                                    <span class="price-value"><?php echo esc_html($starting_price); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <div class="booking-details">
                                <?php if ($duration): ?>
                                    <div class="detail-item">
                                        <span class="detail-icon">⏱️</span>
                                        <span class="detail-text"><?php echo esc_html($duration); ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($availability): ?>
                                    <div class="detail-item">
                                        <span class="detail-icon">📅</span>
                                        <span class="detail-text"><?php echo esc_html($availability); ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="detail-item">
                                    <span class="detail-icon">🔒</span>
                                    <span class="detail-text">Satisfaction Guaranteed</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="booking-actions">
                            <a href="<?php echo esc_url(home_url('/contact')); ?>?service=<?php echo urlencode(get_the_title()); ?>" 
                               class="btn btn-primary btn-block">
                                Request Quote
                            </a>
                            <a href="tel:+1234567890" class="btn btn-outline btn-block">
                                Call for Immediate Service
                            </a>
                        </div>
                        
                        <div class="contact-note">
                            <p><small>Free consultation available. No obligation quote.</small></p>
                        </div>
                    </div>
                    
                    <!-- Service Category Info -->
                    <?php if ($categories && !is_wp_error($categories)): ?>
                        <div class="category-info-card">
                            <h4>Service Category</h4>
                            <div class="category-details">
                                <a href="<?php echo esc_url(get_term_link($categories[0])); ?>" class="category-link">
                                    <span class="category-name"><?php echo esc_html($categories[0]->name); ?></span>
                                    <span class="category-count"><?php echo esc_html($categories[0]->count); ?> services</span>
                                </a>
                                <?php if ($categories[0]->description): ?>
                                    <p class="category-description"><?php echo esc_html($categories[0]->description); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Services -->
    <section class="related-services section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Related Services</h2>
                <p class="section-subtitle">Other services you might be interested in</p>
            </div>
            
            <div class="related-services-grid">
                <?php
                // Get related services from the same category
                $related_args = array(
                    'post_type' => 'services',
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'orderby' => 'rand'
                );
                
                if ($categories && !is_wp_error($categories)) {
                    $related_args['tax_query'] = array(
                        array(
                            'taxonomy' => 'service_categories',
                            'field' => 'term_id',
                            'terms' => $categories[0]->term_id,
                        ),
                    );
                }
                
                $related_services = new WP_Query($related_args);
                
                if ($related_services->have_posts()):
                    while ($related_services->have_posts()): $related_services->the_post();
                        $related_price = get_post_meta(get_the_ID(), '_service_starting_price', true);
                        $related_duration = get_post_meta(get_the_ID(), '_service_duration', true);
                ?>
                    <article class="related-service-card">
                        <?php if (has_post_thumbnail()): ?>
                            <div class="related-service-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('service-thumb', array('loading' => 'lazy')); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="related-service-content">
                            <h3 class="related-service-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            
                            <div class="related-service-excerpt">
                                <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                            </div>
                            
                            <div class="related-service-meta">
                                <?php if ($related_price): ?>
                                    <span class="related-price"><?php echo esc_html($related_price); ?></span>
                                <?php endif; ?>
                                
                                <?php if ($related_duration): ?>
                                    <span class="related-duration"><?php echo esc_html($related_duration); ?></span>
                                <?php endif; ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline">
                                View Details
                            </a>
                        </div>
                    </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                    // Fallback: show random services if no related services found
                    $fallback_args = array(
                        'post_type' => 'services',
                        'posts_per_page' => 3,
                        'post__not_in' => array(get_the_ID()),
                        'orderby' => 'rand'
                    );
                    
                    $fallback_services = new WP_Query($fallback_args);
                    
                    if ($fallback_services->have_posts()):
                        while ($fallback_services->have_posts()): $fallback_services->the_post();
                            $fallback_price = get_post_meta(get_the_ID(), '_service_starting_price', true);
                ?>
                        <article class="related-service-card">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="related-service-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('service-thumb', array('loading' => 'lazy')); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="related-service-content">
                                <h3 class="related-service-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                
                                <div class="related-service-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                </div>
                                
                                <?php if ($fallback_price): ?>
                                    <div class="related-service-meta">
                                        <span class="related-price"><?php echo esc_html($fallback_price); ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline">
                                    View Details
                                </a>
                            </div>
                        </article>
                <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="service-cta section">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Get Started?</h2>
                <p>Get a free quote for <?php the_title(); ?> service today. No obligation, just honest pricing.</p>
                <div class="cta-buttons">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>?service=<?php echo urlencode(get_the_title()); ?>" 
                       class="btn btn-primary btn-lg">
                        Get Free Quote
                    </a>
                    <a href="<?php echo esc_url(get_post_type_archive_link('services')); ?>" 
                       class="btn btn-outline btn-lg">
                        Browse All Services
                    </a>
                </div>
                
                <div class="cta-features">
                    <div class="cta-feature">
                        <span class="cta-check">✓</span>
                        <span>Free Consultation</span>
                    </div>
                    <div class="cta-feature">
                        <span class="cta-check">✓</span>
                        <span>Professional Service</span>
                    </div>
                    <div class="cta-feature">
                        <span class="cta-check">✓</span>
                        <span>Satisfaction Guaranteed</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
endwhile;
get_footer();
?>
