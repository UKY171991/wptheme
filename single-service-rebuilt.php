<?php
/**
 * Single Service Template
 * Detailed service page with related services
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */

get_header('rebuilt'); ?>

<?php while (have_posts()): the_post();
    $price_range = get_post_meta(get_the_ID(), '_service_price_range', true);
    $duration = get_post_meta(get_the_ID(), '_service_duration', true);
    $icon = get_post_meta(get_the_ID(), '_service_icon', true);
    $features = get_post_meta(get_the_ID(), '_service_features', true);
    
    // Get service categories
    $service_categories = get_the_terms(get_the_ID(), 'service_category');
    ?>

    <!-- Service Header -->
    <section class="service-header">
        <div class="container">
            <div class="service-header-content">
                <div class="service-info">
                    <!-- Breadcrumbs -->
                    <nav class="breadcrumbs" aria-label="Breadcrumb">
                        <ol class="breadcrumb-list">
                            <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                            <li><a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>">Services</a></li>
                            <?php if ($service_categories && !is_wp_error($service_categories)): ?>
                                <li><a href="<?php echo esc_url(get_term_link($service_categories[0])); ?>"><?php echo esc_html($service_categories[0]->name); ?></a></li>
                            <?php endif; ?>
                            <li aria-current="page"><?php the_title(); ?></li>
                        </ol>
                    </nav>
                    
                    <div class="service-meta-info">
                        <?php if ($service_categories && !is_wp_error($service_categories)): ?>
                            <div class="service-categories">
                                <?php foreach ($service_categories as $category): ?>
                                    <a href="<?php echo esc_url(get_term_link($category)); ?>" class="category-tag">
                                        <?php echo esc_html($category->name); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <h1 class="service-title">
                        <?php if ($icon): ?>
                            <i class="<?php echo esc_attr($icon); ?>" aria-hidden="true"></i>
                        <?php endif; ?>
                        <?php the_title(); ?>
                    </h1>
                    
                    <div class="service-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    
                    <div class="service-quick-info">
                        <?php if ($price_range): ?>
                            <div class="quick-info-item">
                                <i class="fas fa-tag" aria-hidden="true"></i>
                                <span class="label">Price:</span>
                                <span class="value"><?php echo esc_html($price_range); ?></span>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($duration): ?>
                            <div class="quick-info-item">
                                <i class="fas fa-clock" aria-hidden="true"></i>
                                <span class="label">Duration:</span>
                                <span class="value"><?php echo esc_html($duration); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="service-actions">
                        <a href="<?php echo esc_url(home_url('/contact')); ?>?service=<?php echo urlencode(get_the_title()); ?>" class="btn btn-primary btn-lg">
                            <i class="fas fa-envelope" aria-hidden="true"></i>
                            Get Quote Now
                        </a>
                        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_mod('company_phone', '(555) 123-4567'))); ?>" class="btn btn-outline btn-lg">
                            <i class="fas fa-phone" aria-hidden="true"></i>
                            Call Us
                        </a>
                    </div>
                </div>
                
                <?php if (has_post_thumbnail()): ?>
                    <div class="service-image">
                        <?php the_post_thumbnail('hero-banner', array('alt' => get_the_title())); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Service Content -->
    <section class="service-content-section section">
        <div class="container">
            <div class="service-content-wrapper">
                <div class="service-main-content">
                    <div class="service-description">
                        <?php the_content(); ?>
                    </div>
                    
                    <?php if ($features): ?>
                        <div class="service-features">
                            <h2>What's Included</h2>
                            <?php
                            $features_array = explode("\n", $features);
                            if (!empty($features_array)):
                                ?>
                                <ul class="features-list">
                                    <?php foreach ($features_array as $feature): ?>
                                        <li class="feature-item">
                                            <i class="fas fa-check-circle" aria-hidden="true"></i>
                                            <span><?php echo esc_html(trim($feature)); ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php
                            endif;
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- Service Sidebar -->
                <aside class="service-sidebar">
                    <!-- Quick Contact Card -->
                    <div class="contact-card">
                        <h3>Ready to Get Started?</h3>
                        <p>Contact us today for a free consultation and personalized quote.</p>
                        
                        <div class="contact-methods">
                            <?php 
                            $phone = get_theme_mod('company_phone', '(555) 123-4567');
                            $email = get_theme_mod('company_email', 'info@blueprintfolder.com');
                            ?>
                            
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="contact-method">
                                <i class="fas fa-phone" aria-hidden="true"></i>
                                <span><?php echo esc_html($phone); ?></span>
                            </a>
                            
                            <a href="mailto:<?php echo esc_attr($email); ?>" class="contact-method">
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                                <span><?php echo esc_html($email); ?></span>
                            </a>
                        </div>
                        
                        <a href="<?php echo esc_url(home_url('/contact')); ?>?service=<?php echo urlencode(get_the_title()); ?>" class="btn btn-primary btn-block">
                            Request Quote
                        </a>
                    </div>
                    
                    <!-- Service Benefits -->
                    <div class="benefits-card">
                        <h3>Why Choose Us?</h3>
                        <ul class="benefits-list">
                            <li>
                                <i class="fas fa-award" aria-hidden="true"></i>
                                <span>Expert Professionals</span>
                            </li>
                            <li>
                                <i class="fas fa-clock" aria-hidden="true"></i>
                                <span>Fast Turnaround</span>
                            </li>
                            <li>
                                <i class="fas fa-shield-alt" aria-hidden="true"></i>
                                <span>Quality Guarantee</span>
                            </li>
                            <li>
                                <i class="fas fa-headset" aria-hidden="true"></i>
                                <span>24/7 Support</span>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Related Categories -->
                    <?php if ($service_categories && !is_wp_error($service_categories)): ?>
                        <div class="related-categories-card">
                            <h3>Related Categories</h3>
                            <ul class="categories-list">
                                <?php foreach ($service_categories as $category): ?>
                                    <li>
                                        <a href="<?php echo esc_url(get_term_link($category)); ?>">
                                            <?php echo esc_html($category->name); ?>
                                            <span class="count">(<?php echo $category->count; ?>)</span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </aside>
            </div>
        </div>
    </section>

    <!-- Related Services -->
    <section class="related-services-section section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Related Services</h2>
                <p class="section-subtitle">Other services you might be interested in</p>
            </div>
            
            <div class="related-services-grid">
                <?php
                // Get related services from the same category
                $related_args = array(
                    'post_type' => 'service',
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'post_status' => 'publish'
                );
                
                if ($service_categories && !is_wp_error($service_categories)) {
                    $related_args['tax_query'] = array(
                        array(
                            'taxonomy' => 'service_category',
                            'field' => 'term_id',
                            'terms' => $service_categories[0]->term_id,
                        ),
                    );
                }
                
                $related_services = new WP_Query($related_args);
                
                if ($related_services->have_posts()):
                    while ($related_services->have_posts()): $related_services->the_post();
                        $related_price = get_post_meta(get_the_ID(), '_service_price_range', true);
                        $related_duration = get_post_meta(get_the_ID(), '_service_duration', true);
                        $related_icon = get_post_meta(get_the_ID(), '_service_icon', true);
                        ?>
                        <article class="related-service-card">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="related-service-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('service-card', array('loading' => 'lazy')); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="related-service-content">
                                <?php if ($related_icon): ?>
                                    <div class="service-icon">
                                        <i class="<?php echo esc_attr($related_icon); ?>" aria-hidden="true"></i>
                                    </div>
                                <?php endif; ?>
                                
                                <h3 class="related-service-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                
                                <div class="related-service-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                </div>
                                
                                <div class="related-service-meta">
                                    <?php if ($related_price): ?>
                                        <div class="service-price">
                                            <i class="fas fa-tag" aria-hidden="true"></i>
                                            <span><?php echo esc_html($related_price); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if ($related_duration): ?>
                                        <div class="service-duration">
                                            <i class="fas fa-clock" aria-hidden="true"></i>
                                            <span><?php echo esc_html($related_duration); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-sm">
                                    Learn More
                                </a>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                    // Fallback to random services if no related services found
                    $fallback_args = array(
                        'post_type' => 'service',
                        'posts_per_page' => 3,
                        'post__not_in' => array(get_the_ID()),
                        'orderby' => 'rand',
                        'post_status' => 'publish'
                    );
                    
                    $fallback_services = new WP_Query($fallback_args);
                    
                    if ($fallback_services->have_posts()):
                        while ($fallback_services->have_posts()): $fallback_services->the_post();
                            // Same template as above
                            $related_price = get_post_meta(get_the_ID(), '_service_price_range', true);
                            $related_duration = get_post_meta(get_the_ID(), '_service_duration', true);
                            $related_icon = get_post_meta(get_the_ID(), '_service_icon', true);
                            ?>
                            <article class="related-service-card">
                                <?php if (has_post_thumbnail()): ?>
                                    <div class="related-service-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('service-card', array('loading' => 'lazy')); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="related-service-content">
                                    <?php if ($related_icon): ?>
                                        <div class="service-icon">
                                            <i class="<?php echo esc_attr($related_icon); ?>" aria-hidden="true"></i>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <h3 class="related-service-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    
                                    <div class="related-service-excerpt">
                                        <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                    </div>
                                    
                                    <div class="related-service-meta">
                                        <?php if ($related_price): ?>
                                            <div class="service-price">
                                                <i class="fas fa-tag" aria-hidden="true"></i>
                                                <span><?php echo esc_html($related_price); ?></span>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ($related_duration): ?>
                                            <div class="service-duration">
                                                <i class="fas fa-clock" aria-hidden="true"></i>
                                                <span><?php echo esc_html($related_duration); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-sm">
                                        Learn More
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
            
            <div class="section-footer">
                <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn-primary">
                    View All Services
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="service-cta-section section">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Ready to Get Started with <?php the_title(); ?>?</h2>
                <p class="cta-subtitle">Our expert team is standing by to help you achieve your goals with our professional <?php echo strtolower(get_the_title()); ?> service.</p>
                
                <div class="cta-actions">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>?service=<?php echo urlencode(get_the_title()); ?>" class="btn btn-primary btn-lg">
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                        Get Free Quote
                    </a>
                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_mod('company_phone', '(555) 123-4567'))); ?>" class="btn btn-outline btn-lg">
                        <i class="fas fa-phone" aria-hidden="true"></i>
                        Call Now
                    </a>
                </div>
                
                <div class="cta-guarantees">
                    <div class="guarantee-item">
                        <i class="fas fa-shield-alt" aria-hidden="true"></i>
                        <span>Quality Guarantee</span>
                    </div>
                    <div class="guarantee-item">
                        <i class="fas fa-clock" aria-hidden="true"></i>
                        <span>Fast Response</span>
                    </div>
                    <div class="guarantee-item">
                        <i class="fas fa-dollar-sign" aria-hidden="true"></i>
                        <span>Fair Pricing</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endwhile; ?>

<?php get_footer('rebuilt'); ?>
