<?php
/**
 * Template Name: Homepage
 * Description: Modern homepage with hero section, about, services, testimonials, and more
 * 
 * This is the template that displays the dynamic homepage for the professional services theme.
 * It includes all the main sections requested for a modern business website.
 */

get_header(); ?>

<main id="primary" class="site-main">
    Testing
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-background">
            <div class="hero-overlay"></div>
            <?php
            $hero_image = get_theme_mod('hero_background_image');
            if ($hero_image) : ?>
                <img src="<?php echo esc_url($hero_image); ?>" alt="Hero Background" class="hero-bg-image">
            <?php endif; ?>
        </div>
        
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">
                        <?php echo get_theme_mod('hero_title', 'Professional Services That Drive Results'); ?>
                    </h1>
                    <p class="hero-description">
                        <?php echo get_theme_mod('hero_description', 'We deliver exceptional business solutions tailored to your unique needs. From consultation to implementation, we\'re your trusted partner for success.'); ?>
                    </p>
                    <div class="hero-buttons">
                        <a href="<?php echo get_theme_mod('hero_primary_button_url', '#services'); ?>" class="btn btn-primary">
                            <i class="fas fa-rocket"></i>
                            <?php echo get_theme_mod('hero_primary_button_text', 'Get Started Today'); ?>
                        </a>
                        <a href="<?php echo get_theme_mod('hero_secondary_button_url', '#about'); ?>" class="btn btn-outline">
                            <i class="fas fa-info-circle"></i>
                            <?php echo get_theme_mod('hero_secondary_button_text', 'Learn More'); ?>
                        </a>
                    </div>
                </div>
                
                <?php if (get_theme_mod('hero_features_enabled', true)) : ?>
                <div class="hero-features">
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span><?php echo get_theme_mod('hero_feature_1', 'Expert Consultation'); ?></span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-clock"></i>
                        <span><?php echo get_theme_mod('hero_feature_2', '24/7 Support'); ?></span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-award"></i>
                        <span><?php echo get_theme_mod('hero_feature_3', 'Guaranteed Results'); ?></span>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2 class="section-title">
                        <?php echo get_theme_mod('about_title', 'About Our Company'); ?>
                    </h2>
                    <p class="section-subtitle">
                        <?php echo get_theme_mod('about_subtitle', 'Building Success Through Innovation and Excellence'); ?>
                    </p>
                    <div class="about-description">
                        <?php 
                        $about_content = get_theme_mod('about_content', 'With over a decade of experience in delivering professional services, we have helped hundreds of businesses achieve their goals. Our team of experts combines industry knowledge with innovative solutions to provide results that exceed expectations.');
                        echo wpautop($about_content); 
                        ?>
                    </div>
                    
                    <?php if (get_theme_mod('about_stats_enabled', true)) : ?>
                    <div class="about-stats">
                        <div class="stat-item">
                            <div class="stat-number"><?php echo get_theme_mod('stat_1_number', '500+'); ?></div>
                            <div class="stat-label"><?php echo get_theme_mod('stat_1_label', 'Projects Completed'); ?></div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number"><?php echo get_theme_mod('stat_2_number', '10+'); ?></div>
                            <div class="stat-label"><?php echo get_theme_mod('stat_2_label', 'Years Experience'); ?></div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number"><?php echo get_theme_mod('stat_3_number', '100%'); ?></div>
                            <div class="stat-label"><?php echo get_theme_mod('stat_3_label', 'Client Satisfaction'); ?></div>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="about-buttons">
                        <a href="<?php echo get_permalink(get_page_by_path('about')); ?>" class="btn btn-primary">
                            <i class="fas fa-arrow-right"></i>
                            Learn More About Us
                        </a>
                    </div>
                </div>
                
                <div class="about-image">
                    <?php
                    $about_image = get_theme_mod('about_image');
                    if ($about_image) : ?>
                        <img src="<?php echo esc_url($about_image); ?>" alt="About Us" class="responsive-image">
                    <?php else : ?>
                        <div class="placeholder-image">
                            <i class="fas fa-building"></i>
                            <span>About Image</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Our Professional Services</h2>
                <p class="section-subtitle">Comprehensive solutions designed to meet your business needs</p>
            </div>
            
            <div class="services-grid grid grid-cols-3">
                <?php
                $services = get_posts(array(
                    'post_type' => 'service',
                    'posts_per_page' => 6,
                    'post_status' => 'publish',
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                ));
                
                if ($services) :
                    foreach ($services as $service) :
                        setup_postdata($service);
                        $service_icon = get_post_meta($service->ID, '_service_icon', true);
                        $service_excerpt = get_post_meta($service->ID, '_service_excerpt', true);
                        ?>
                        <div class="service-card card">
                            <div class="service-icon">
                                <?php if ($service_icon) : ?>
                                    <i class="<?php echo esc_attr($service_icon); ?>"></i>
                                <?php else : ?>
                                    <i class="fas fa-cogs"></i>
                                <?php endif; ?>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">
                                    <a href="<?php echo get_permalink($service->ID); ?>">
                                        <?php echo get_the_title($service->ID); ?>
                                    </a>
                                </h3>
                                <p class="card-text">
                                    <?php echo $service_excerpt ? esc_html($service_excerpt) : wp_trim_words(get_the_content(), 20); ?>
                                </p>
                                <a href="<?php echo get_permalink($service->ID); ?>" class="btn btn-outline">
                                    <i class="fas fa-arrow-right"></i>
                                    Learn More
                                </a>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    wp_reset_postdata();
                else : ?>
                    <!-- Fallback content if no services are found -->
                    <div class="service-card card">
                        <div class="service-icon"><i class="fas fa-consulting"></i></div>
                        <div class="card-body">
                            <h3 class="card-title">Business Consulting</h3>
                            <p class="card-text">Strategic guidance to help your business grow and succeed in competitive markets.</p>
                            <a href="#" class="btn btn-outline">Learn More</a>
                        </div>
                    </div>
                    <div class="service-card card">
                        <div class="service-icon"><i class="fas fa-chart-line"></i></div>
                        <div class="card-body">
                            <h3 class="card-title">Performance Analytics</h3>
                            <p class="card-text">Data-driven insights to optimize your operations and maximize efficiency.</p>
                            <a href="#" class="btn btn-outline">Learn More</a>
                        </div>
                    </div>
                    <div class="service-card card">
                        <div class="service-icon"><i class="fas fa-users"></i></div>
                        <div class="card-body">
                            <h3 class="card-title">Team Development</h3>
                            <p class="card-text">Professional training and development programs for your team's success.</p>
                            <a href="#" class="btn btn-outline">Learn More</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="services-cta">
                <a href="<?php echo get_permalink(get_page_by_path('services')); ?>" class="btn btn-primary">
                    <i class="fas fa-th-large"></i>
                    View All Services
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-section">
        <div class="container">
            <div class="why-choose-content">
                <div class="why-choose-text">
                    <h2 class="section-title">Why Choose Our Services?</h2>
                    <p class="section-subtitle">We deliver results that matter to your business</p>
                    
                    <div class="benefits-list">
                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="fas fa-medal"></i>
                            </div>
                            <div class="benefit-content">
                                <h4>Proven Expertise</h4>
                                <p>Years of experience delivering successful projects across various industries.</p>
                            </div>
                        </div>
                        
                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <div class="benefit-content">
                                <h4>Dedicated Support</h4>
                                <p>Ongoing support and maintenance to ensure your continued success.</p>
                            </div>
                        </div>
                        
                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <div class="benefit-content">
                                <h4>Fast Delivery</h4>
                                <p>Efficient processes that deliver results on time and within budget.</p>
                            </div>
                        </div>
                        
                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="benefit-content">
                                <h4>Quality Guarantee</h4>
                                <p>100% satisfaction guarantee with quality assurance at every step.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="why-choose-image">
                    <?php
                    $why_choose_image = get_theme_mod('why_choose_image');
                    if ($why_choose_image) : ?>
                        <img src="<?php echo esc_url($why_choose_image); ?>" alt="Why Choose Us" class="responsive-image">
                    <?php else : ?>
                        <div class="placeholder-image">
                            <i class="fas fa-trophy"></i>
                            <span>Why Choose Us</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">What Our Clients Say</h2>
                <p class="section-subtitle">Real feedback from satisfied customers</p>
            </div>
            
            <div class="testimonials-grid grid grid-cols-3">
                <?php
                $testimonials = get_posts(array(
                    'post_type' => 'testimonial',
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                ));
                
                if ($testimonials) :
                    foreach ($testimonials as $testimonial) :
                        setup_postdata($testimonial);
                        $client_name = get_post_meta($testimonial->ID, '_client_name', true);
                        $client_position = get_post_meta($testimonial->ID, '_client_position', true);
                        $client_company = get_post_meta($testimonial->ID, '_client_company', true);
                        $rating = get_post_meta($testimonial->ID, '_testimonial_rating', true);
                        ?>
                        <div class="testimonial-card card">
                            <div class="card-body">
                                <?php if ($rating) : ?>
                                    <div class="testimonial-rating">
                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                            <i class="fas fa-star <?php echo $i <= $rating ? 'active' : ''; ?>"></i>
                                        <?php endfor; ?>
                                    </div>
                                <?php endif; ?>
                                
                                <blockquote class="testimonial-quote">
                                    "<?php echo esc_html(get_the_content()); ?>"
                                </blockquote>
                                
                                <div class="testimonial-author">
                                    <strong><?php echo esc_html($client_name); ?></strong>
                                    <?php if ($client_position || $client_company) : ?>
                                        <div class="author-details">
                                            <?php 
                                            $details = array();
                                            if ($client_position) $details[] = $client_position;
                                            if ($client_company) $details[] = $client_company;
                                            echo esc_html(implode(' at ', $details));
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    wp_reset_postdata();
                else : ?>
                    <!-- Fallback testimonials -->
                    <div class="testimonial-card card">
                        <div class="card-body">
                            <div class="testimonial-rating">
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                            </div>
                            <blockquote class="testimonial-quote">
                                "Outstanding service and exceptional results. The team exceeded our expectations in every way."
                            </blockquote>
                            <div class="testimonial-author">
                                <strong>Sarah Johnson</strong>
                                <div class="author-details">CEO at TechCorp</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="testimonial-card card">
                        <div class="card-body">
                            <div class="testimonial-rating">
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                            </div>
                            <blockquote class="testimonial-quote">
                                "Professional, reliable, and results-driven. I highly recommend their services to any business."
                            </blockquote>
                            <div class="testimonial-author">
                                <strong>Michael Chen</strong>
                                <div class="author-details">Marketing Director at InnovateNow</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="testimonial-card card">
                        <div class="card-body">
                            <div class="testimonial-rating">
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                                <i class="fas fa-star active"></i>
                            </div>
                            <blockquote class="testimonial-quote">
                                "The expertise and dedication shown by the team was remarkable. Truly a game-changer for our business."
                            </blockquote>
                            <div class="testimonial-author">
                                <strong>Emily Rodriguez</strong>
                                <div class="author-details">Founder at GrowthHub</div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Ready to Get Started?</h2>
                <p class="cta-description">
                    Let's discuss how our professional services can help your business achieve its goals. 
                    Contact us today for a free consultation.
                </p>
                <div class="cta-buttons">
                    <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="btn btn-primary">
                        <i class="fas fa-phone"></i>
                        Contact Us Today
                    </a>
                    <a href="<?php echo get_permalink(get_page_by_path('pricing')); ?>" class="btn btn-outline">
                        <i class="fas fa-dollar-sign"></i>
                        View Pricing
                    </a>
                </div>
                
                <div class="cta-features">
                    <div class="cta-feature">
                        <i class="fas fa-comments"></i>
                        <span>Free Consultation</span>
                    </div>
                    <div class="cta-feature">
                        <i class="fas fa-calendar-check"></i>
                        <span>Quick Response</span>
                    </div>
                    <div class="cta-feature">
                        <i class="fas fa-shield-check"></i>
                        <span>Guaranteed Quality</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
