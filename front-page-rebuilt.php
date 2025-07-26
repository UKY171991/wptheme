<?php
/**
 * BluePrint Folder - Homepage Template
 * Dynamic sections with editable content
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */

get_header('rebuilt'); ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-background">
        <?php
        $hero_image = get_theme_mod('hero_background_image');
        if ($hero_image): ?>
            <img src="<?php echo esc_url($hero_image); ?>" alt="Hero Background" class="hero-bg-image">
        <?php endif; ?>
        <div class="hero-overlay"></div>
    </div>
    
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">
                <?php echo get_theme_mod('hero_title', 'Professional Services That Drive Results'); ?>
            </h1>
            <p class="hero-subtitle">
                <?php echo get_theme_mod('hero_subtitle', 'We deliver exceptional business solutions tailored to your unique needs. From consultation to implementation, we\'re your trusted partner for success.'); ?>
            </p>
            <div class="hero-actions">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-lg">
                    <i class="fas fa-rocket" aria-hidden="true"></i>
                    Get Started Today
                </a>
                <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn-outline btn-lg">
                    View Our Services
                </a>
            </div>
            
            <!-- Hero Stats -->
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Projects Completed</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">100%</span>
                    <span class="stat-label">Client Satisfaction</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Support Available</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section class="about-section section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">About BluePrint Folder</h2>
            <p class="section-subtitle">Your trusted partner for professional services</p>
        </div>
        
        <div class="about-content">
            <div class="about-text">
                <h3>Why Choose Us?</h3>
                <p>With over a decade of experience in providing professional services, BluePrint Folder has established itself as a leader in delivering quality solutions that drive real business results.</p>
                
                <div class="about-features">
                    <div class="feature-item">
                        <i class="fas fa-check-circle" aria-hidden="true"></i>
                        <span>Expert Team of Professionals</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle" aria-hidden="true"></i>
                        <span>Proven Track Record</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle" aria-hidden="true"></i>
                        <span>Customized Solutions</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle" aria-hidden="true"></i>
                        <span>24/7 Customer Support</span>
                    </div>
                </div>
                
                <a href="<?php echo esc_url(home_url('/about')); ?>" class="btn btn-outline">
                    Learn More About Us
                </a>
            </div>
            
            <div class="about-image">
                <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('hero-banner', array('alt' => 'About BluePrint Folder')); ?>
                <?php else: ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/about.jpg'); ?>" alt="About BluePrint Folder" loading="lazy">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Services Grid Section -->
<section class="services-section section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Our Services</h2>
            <p class="section-subtitle">Professional solutions for every business need</p>
        </div>
        
        <!-- Service Categories Filter -->
        <div class="services-filter">
            <button class="filter-btn active" data-filter="all">All Services</button>
            <?php
            $categories = get_terms(array(
                'taxonomy' => 'service_category',
                'hide_empty' => false,
            ));
            
            if (!empty($categories) && !is_wp_error($categories)) {
                foreach ($categories as $category) {
                    echo '<button class="filter-btn" data-filter="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</button>';
                }
            }
            ?>
        </div>
        
        <!-- Services Grid -->
        <div class="services-grid">
            <?php
            $services_query = blueprint_folder_get_services('', 6);
            
            if ($services_query->have_posts()):
                while ($services_query->have_posts()): $services_query->the_post();
                    $price_range = get_post_meta(get_the_ID(), '_service_price_range', true);
                    $duration = get_post_meta(get_the_ID(), '_service_duration', true);
                    $icon = get_post_meta(get_the_ID(), '_service_icon', true);
                    
                    // Get service categories for filtering
                    $service_categories = get_the_terms(get_the_ID(), 'service_category');
                    $category_classes = '';
                    if ($service_categories && !is_wp_error($service_categories)) {
                        $category_slugs = array_map(function($cat) { return $cat->slug; }, $service_categories);
                        $category_classes = implode(' ', $category_slugs);
                    }
                    ?>
                    <article class="service-card" data-category="<?php echo esc_attr($category_classes); ?>">
                        <?php if (has_post_thumbnail()): ?>
                            <div class="service-image">
                                <a href="<?php the_permalink(); ?>" aria-label="Read more about <?php the_title(); ?>">
                                    <?php the_post_thumbnail('service-card', array('loading' => 'lazy')); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="service-content">
                            <?php if ($icon): ?>
                                <div class="service-icon">
                                    <i class="<?php echo esc_attr($icon); ?>" aria-hidden="true"></i>
                                </div>
                            <?php endif; ?>
                            
                            <h3 class="service-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            
                            <div class="service-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <div class="service-meta">
                                <?php if ($price_range): ?>
                                    <div class="service-price">
                                        <i class="fas fa-tag" aria-hidden="true"></i>
                                        <span><?php echo esc_html($price_range); ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($duration): ?>
                                    <div class="service-duration">
                                        <i class="fas fa-clock" aria-hidden="true"></i>
                                        <span><?php echo esc_html($duration); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-sm">
                                Learn More
                                <i class="fas fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
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

<!-- Service Categories List -->
<section class="categories-section section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Service Categories</h2>
            <p class="section-subtitle">Browse our services by category</p>
        </div>
        
        <div class="categories-grid">
            <?php
            $categories = get_terms(array(
                'taxonomy' => 'service_category',
                'hide_empty' => false,
            ));
            
            if (!empty($categories) && !is_wp_error($categories)) {
                foreach ($categories as $category) {
                    $category_icon = get_term_meta($category->term_id, 'category_icon', true);
                    $services_count = $category->count;
                    ?>
                    <div class="category-card">
                        <?php if ($category_icon): ?>
                            <div class="category-icon">
                                <i class="<?php echo esc_attr($category_icon); ?>" aria-hidden="true"></i>
                            </div>
                        <?php endif; ?>
                        
                        <h3 class="category-title">
                            <a href="<?php echo esc_url(get_term_link($category)); ?>"><?php echo esc_html($category->name); ?></a>
                        </h3>
                        
                        <?php if ($category->description): ?>
                            <p class="category-description"><?php echo esc_html($category->description); ?></p>
                        <?php endif; ?>
                        
                        <div class="category-meta">
                            <span class="services-count"><?php echo $services_count; ?> Services</span>
                        </div>
                        
                        <a href="<?php echo esc_url(get_term_link($category)); ?>" class="btn btn-outline btn-sm">
                            View Services
                        </a>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>

<!-- Testimonials Carousel -->
<section class="testimonials-section section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">What Our Clients Say</h2>
            <p class="section-subtitle">Trusted by businesses nationwide</p>
        </div>
        
        <div class="testimonials-carousel">
            <?php
            $testimonials_query = blueprint_folder_get_testimonials(6);
            
            if ($testimonials_query->have_posts()):
                while ($testimonials_query->have_posts()): $testimonials_query->the_post();
                    $client_name = get_post_meta(get_the_ID(), '_testimonial_client_name', true);
                    $client_position = get_post_meta(get_the_ID(), '_testimonial_client_position', true);
                    $client_company = get_post_meta(get_the_ID(), '_testimonial_client_company', true);
                    $rating = get_post_meta(get_the_ID(), '_testimonial_rating', true);
                    ?>
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <div class="testimonial-text">
                                <?php the_content(); ?>
                            </div>
                            
                            <?php if ($rating): ?>
                                <div class="testimonial-rating">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <i class="fas fa-star <?php echo ($i <= $rating) ? 'active' : ''; ?>" aria-hidden="true"></i>
                                    <?php endfor; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="testimonial-author">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="author-avatar">
                                    <?php the_post_thumbnail('testimonial-avatar'); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="author-info">
                                <?php if ($client_name): ?>
                                    <h4 class="author-name"><?php echo esc_html($client_name); ?></h4>
                                <?php endif; ?>
                                
                                <?php if ($client_position || $client_company): ?>
                                    <p class="author-position">
                                        <?php 
                                        if ($client_position && $client_company) {
                                            echo esc_html($client_position . ' at ' . $client_company);
                                        } elseif ($client_position) {
                                            echo esc_html($client_position);
                                        } else {
                                            echo esc_html($client_company);
                                        }
                                        ?>
                                    </p>
                                <?php endif; ?>
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

<!-- Blog Snippets -->
<section class="blog-section section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Latest News & Insights</h2>
            <p class="section-subtitle">Stay updated with industry trends and tips</p>
        </div>
        
        <div class="blog-grid">
            <?php
            $blog_query = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post_status' => 'publish'
            ));
            
            if ($blog_query->have_posts()):
                while ($blog_query->have_posts()): $blog_query->the_post();
                    ?>
                    <article class="blog-card">
                        <?php if (has_post_thumbnail()): ?>
                            <div class="blog-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('blog-thumb', array('loading' => 'lazy')); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span class="blog-date"><?php echo get_the_date(); ?></span>
                                <span class="blog-category"><?php the_category(', '); ?></span>
                            </div>
                            
                            <h3 class="blog-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            
                            <div class="blog-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-sm">
                                Read More
                            </a>
                        </div>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
        
        <div class="section-footer">
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn btn-primary">
                View All Posts
            </a>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="cta-section section">
    <div class="container">
        <div class="cta-content">
            <h2 class="cta-title">Ready to Get Started?</h2>
            <p class="cta-subtitle">Let's discuss how we can help transform your business with our professional services.</p>
            
            <div class="cta-actions">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-lg">
                    <i class="fas fa-envelope" aria-hidden="true"></i>
                    Get Free Consultation
                </a>
                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_mod('company_phone', '(555) 123-4567'))); ?>" class="btn btn-outline btn-lg">
                    <i class="fas fa-phone" aria-hidden="true"></i>
                    Call Us Now
                </a>
            </div>
            
            <div class="cta-features">
                <div class="cta-feature">
                    <i class="fas fa-check" aria-hidden="true"></i>
                    <span>Free Consultation</span>
                </div>
                <div class="cta-feature">
                    <i class="fas fa-check" aria-hidden="true"></i>
                    <span>No Hidden Fees</span>
                </div>
                <div class="cta-feature">
                    <i class="fas fa-check" aria-hidden="true"></i>
                    <span>Quick Response</span>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer('rebuilt'); ?>
