<?php
/*
Template Name: Single Service
*/

get_header(); ?>

<main class="main-content">
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Service Hero Section -->
        <section class="single-service-hero">
            <div class="container">
                <div class="hero-content">
                    <div class="service-breadcrumb">
                        <nav aria-label="Breadcrumb">
                            <a href="<?php echo home_url(); ?>">Home</a>
                            <span class="separator">→</span>
                            <a href="<?php echo get_permalink(get_page_by_path('services')); ?>">Services</a>
                            <span class="separator">→</span>
                            <span class="current"><?php the_title(); ?></span>
                        </nav>
                    </div>
                    
                    <h1 class="service-title"><?php the_title(); ?></h1>
                    
                    <div class="service-meta">
                        <?php 
                        $price = get_post_meta(get_the_ID(), 'service_price', true);
                        $category = get_the_terms(get_the_ID(), 'service_category');
                        $duration = get_post_meta(get_the_ID(), 'service_duration', true);
                        ?>
                        
                        <?php if ($price): ?>
                            <div class="service-price-badge">
                                <span class="price-label">Starting at</span>
                                <span class="price-value"><?php echo esc_html($price); ?></span>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($category && !is_wp_error($category)): ?>
                            <div class="service-category-badge">
                                <i class="fas fa-tag"></i>
                                <?php echo esc_html($category[0]->name); ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($duration): ?>
                            <div class="service-duration-badge">
                                <i class="fas fa-clock"></i>
                                <?php echo esc_html($duration); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="service-excerpt">
                        <?php echo get_the_excerpt(); ?>
                    </div>
                    
                    <div class="service-actions">
                        <a href="#contact-form" class="btn btn-primary btn-large">
                            <i class="fas fa-rocket"></i>
                            Get Started Now
                        </a>
                        <a href="#service-details" class="btn btn-secondary btn-large">
                            <i class="fas fa-info-circle"></i>
                            Learn More
                        </a>
                    </div>
                </div>
                
                <?php if (has_post_thumbnail()): ?>
                    <div class="service-hero-image">
                        <?php the_post_thumbnail('large', array('class' => 'hero-img')); ?>
                        <div class="image-overlay"></div>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- Service Features Section -->
        <section class="service-features" id="service-details">
            <div class="container">
                <div class="section-header-fancy">
                    <span class="section-badge">What's Included</span>
                    <h2 class="section-title-fancy">Service Features</h2>
                    <p class="section-subtitle-fancy">Everything you need to succeed</p>
                </div>
                
                <div class="features-grid">
                    <?php 
                    $features = get_post_meta(get_the_ID(), 'service_features', true);
                    if ($features && is_array($features)):
                        foreach ($features as $feature): ?>
                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="<?php echo esc_attr($feature['icon'] ?? 'fas fa-check'); ?>"></i>
                                </div>
                                <div class="feature-content">
                                    <h3><?php echo esc_html($feature['title']); ?></h3>
                                    <p><?php echo esc_html($feature['description']); ?></p>
                                </div>
                            </div>
                        <?php endforeach;
                    else: ?>
                        <!-- Default features if none are set -->
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="feature-content">
                                <h3>Premium Quality</h3>
                                <p>High-quality service delivery with attention to detail</p>
                            </div>
                        </div>
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="feature-content">
                                <h3>Fast Delivery</h3>
                                <p>Quick turnaround time without compromising quality</p>
                            </div>
                        </div>
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div class="feature-content">
                                <h3>24/7 Support</h3>
                                <p>Round-the-clock customer support and assistance</p>
                            </div>
                        </div>
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="feature-content">
                                <h3>Money Back Guarantee</h3>
                                <p>100% satisfaction guarantee with full refund policy</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- Service Content -->
        <section class="service-content">
            <div class="container">
                <div class="content-grid">
                    <div class="main-content">
                        <div class="content-wrapper">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    
                    <div class="sidebar-content">
                        <!-- Service Quick Info -->
                        <div class="service-info-card">
                            <h3>Service Information</h3>
                            <div class="info-list">
                                <?php if ($price): ?>
                                    <div class="info-item">
                                        <span class="label">Price:</span>
                                        <span class="value"><?php echo esc_html($price); ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($duration): ?>
                                    <div class="info-item">
                                        <span class="label">Duration:</span>
                                        <span class="value"><?php echo esc_html($duration); ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="info-item">
                                    <span class="label">Delivery:</span>
                                    <span class="value">Digital</span>
                                </div>
                                
                                <div class="info-item">
                                    <span class="label">Revisions:</span>
                                    <span class="value">Unlimited</span>
                                </div>
                            </div>
                            
                            <a href="#contact-form" class="btn btn-primary btn-full">
                                <i class="fas fa-shopping-cart"></i>
                                Order Now
                            </a>
                        </div>
                        
                        <!-- Contact Info -->
                        <div class="contact-info-card">
                            <h3>Need Help?</h3>
                            <p>Have questions about this service? We're here to help!</p>
                            <div class="contact-methods">
                                <a href="tel:+1234567890" class="contact-method">
                                    <i class="fas fa-phone"></i>
                                    <span>Call Us</span>
                                </a>
                                <a href="mailto:info@blueprintfolder.com" class="contact-method">
                                    <i class="fas fa-envelope"></i>
                                    <span>Email Us</span>
                                </a>
                                <a href="#" class="contact-method">
                                    <i class="fas fa-comments"></i>
                                    <span>Live Chat</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Form Section -->
        <section class="service-contact-form" id="contact-form">
            <div class="container">
                <div class="section-header-fancy">
                    <span class="section-badge">Get Started</span>
                    <h2 class="section-title-fancy">Ready to Begin?</h2>
                    <p class="section-subtitle-fancy">Let's discuss your project requirements</p>
                </div>
                
                <div class="form-grid">
                    <div class="form-content">
                        <form class="service-order-form" method="post" action="">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="client-name">Full Name *</label>
                                    <input type="text" id="client-name" name="client_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="client-email">Email Address *</label>
                                    <input type="email" id="client-email" name="client_email" required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="client-phone">Phone Number</label>
                                    <input type="tel" id="client-phone" name="client_phone">
                                </div>
                                <div class="form-group">
                                    <label for="project-budget">Budget Range</label>
                                    <select id="project-budget" name="project_budget">
                                        <option value="">Select Budget</option>
                                        <option value="under-1000">Under $1,000</option>
                                        <option value="1000-5000">$1,000 - $5,000</option>
                                        <option value="5000-10000">$5,000 - $10,000</option>
                                        <option value="10000-plus">$10,000+</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="project-description">Project Details *</label>
                                <textarea id="project-description" name="project_description" rows="6" placeholder="Tell us about your project requirements..." required></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="project-timeline">Expected Timeline</label>
                                <select id="project-timeline" name="project_timeline">
                                    <option value="">Select Timeline</option>
                                    <option value="asap">ASAP</option>
                                    <option value="1-week">Within 1 week</option>
                                    <option value="2-weeks">Within 2 weeks</option>
                                    <option value="1-month">Within 1 month</option>
                                    <option value="flexible">Flexible</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-large btn-full">
                                <i class="fas fa-paper-plane"></i>
                                Send Project Request
                            </button>
                        </form>
                    </div>
                    
                    <div class="form-benefits">
                        <h3>Why Choose Us?</h3>
                        <div class="benefits-list">
                            <div class="benefit-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Free consultation and quote</span>
                            </div>
                            <div class="benefit-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Professional team of experts</span>
                            </div>
                            <div class="benefit-item">
                                <i class="fas fa-check-circle"></i>
                                <span>On-time delivery guarantee</span>
                            </div>
                            <div class="benefit-item">
                                <i class="fas fa-check-circle"></i>
                                <span>24/7 customer support</span>
                            </div>
                            <div class="benefit-item">
                                <i class="fas fa-check-circle"></i>
                                <span>100% satisfaction guarantee</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Related Services -->
        <section class="related-services">
            <div class="container">
                <div class="section-header-fancy">
                    <span class="section-badge">Explore More</span>
                    <h2 class="section-title-fancy">Related Services</h2>
                    <p class="section-subtitle-fancy">Other services you might be interested in</p>
                </div>
                
                <div class="related-services-grid">
                    <?php
                    $related_args = array(
                        'post_type' => 'service',
                        'posts_per_page' => 3,
                        'post__not_in' => array(get_the_ID()),
                        'orderby' => 'rand'
                    );
                    
                    if ($category && !is_wp_error($category)) {
                        $related_args['tax_query'] = array(
                            array(
                                'taxonomy' => 'service_category',
                                'field' => 'slug',
                                'terms' => $category[0]->slug
                            )
                        );
                    }
                    
                    $related_query = new WP_Query($related_args);
                    
                    if ($related_query->have_posts()) :
                        while ($related_query->have_posts()) : $related_query->the_post();
                            $related_price = get_post_meta(get_the_ID(), 'service_price', true);
                            ?>
                            <div class="related-service-card">
                                <?php if (has_post_thumbnail()): ?>
                                    <div class="related-service-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium', array('class' => 'service-img')); ?>
                                            <div class="image-overlay"></div>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="related-service-content">
                                    <h3 class="related-service-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    
                                    <p class="related-service-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                    
                                    <div class="related-service-footer">
                                        <?php if ($related_price): ?>
                                            <span class="related-service-price"><?php echo esc_html($related_price); ?></span>
                                        <?php endif; ?>
                                        
                                        <a href="<?php the_permalink(); ?>" class="related-service-btn">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </section>
        
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
