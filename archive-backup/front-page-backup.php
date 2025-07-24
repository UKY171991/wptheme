<?php
/*
Template Name: Front Page
*/
get_header(); ?>

<!-- Hero Section -->
<section class="hero-section" style="background-image: url('<?php echo esc_url(get_theme_mod('hero_background', get_template_directory_uri() . '/images/hero-bg.jpg')); ?>');">
    <div class="container">
        <div class="hero-content">
            <h1><?php echo esc_html(get_theme_mod('hero_title', 'Professional Home & Lifestyle Services')); ?></h1>
            <p><?php echo esc_html(get_theme_mod('hero_subtitle', 'Reliable, professional services for your home and lifestyle needs. From cleaning to maintenance, errands to pet care - we\'ve got you covered!')); ?></p>
            <div class="hero-buttons">
                <a href="<?php echo esc_url(get_theme_mod('hero_primary_button_url', '#services')); ?>" class="cta-button"><?php echo esc_html(get_theme_mod('hero_primary_button_text', 'Our Services')); ?></a>
                <a href="<?php echo esc_url(get_theme_mod('hero_secondary_button_url', '#contact')); ?>" class="btn btn-secondary"><?php echo esc_html(get_theme_mod('hero_secondary_button_text', 'Contact Us')); ?></a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Services Section -->
<section class="featured-services">
    <div class="container">
        <header class="section-header">
            <h2>Our Featured Services</h2>
            <p>Discover our most popular professional services designed to make your life easier</p>
        </header>

        <div class="services-grid">
            <?php 
            $service_categories = get_service_categories_with_icons();
            $count = 0;
            
            foreach ($service_categories as $category_key => $category) : 
                if ($count < 3) : // Only show 3 categories
            ?>
                <div class="service-category">
                    <div class="service-category-header">
                        <span class="service-category-icon"><?php echo $category['icon']; ?></span>
                        <h3><?php echo esc_html($category['title']); ?></h3>
                    </div>
                    <p><?php echo esc_html($category['description'] ?? 'Professional services tailored to your specific needs with exceptional quality.'); ?></p>
                    <ul class="service-list">
                        <?php 
                        $service_count = 0;
                        foreach ($category['services'] as $service) : 
                            if ($service_count < 4) : // Show only 4 services per category
                        ?>
                            <li>
                                <span class="service-check">✓</span>
                                <?php echo esc_html($service); ?>
                            </li>
                        <?php 
                            endif;
                            $service_count++;
                        endforeach; 
                        ?>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn">Learn More</a>
                </div>
            <?php 
                endif;
                $count++;
            endforeach; 
            ?>
        </div>
        
        <div class="text-center">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="cta-button">View All Services</a>
        </div>
    </div>
</section>

<!-- About Us Section - Professional Services You Can Trust -->
<section class="about-section ultra-fancy-services-section">
    
    <!-- Advanced Animated Background Elements -->
    <div class="advanced-bg-decoration">
        <!-- Primary floating orbs -->
        <div class="bg-orb-1"></div>
        <div class="bg-orb-2"></div>
        <div class="bg-orb-3"></div>
        
        <!-- Secondary geometric shapes -->
        <div class="bg-shape-1"></div>
        <div class="bg-shape-2"></div>
        
        <!-- Particle system -->
        <div class="bg-particle-1"></div>
        <div class="bg-particle-2"></div>
        <div class="bg-particle-3"></div>
        
        <!-- Mesh gradient overlay -->
        <div class="bg-mesh-overlay"></div>
    </div>

    <div class="container">
        <div class="about-grid ultra-fancy-grid">
            
            <!-- Ultra-Enhanced Image Section -->
            <div class="about-image-wrapper ultra-3d-wrapper">
                
                <!-- Main Image Container with Advanced 3D Effects -->
                <div class="image-container ultra-3d-container">
                    
                    <!-- Image with advanced effects -->
                    <div class="about-image-bg" style="background-image: url('<?php echo esc_url(get_theme_mod('about_image', get_template_directory_uri() . '/images/about.jpg')); ?>'); background-size: cover; background-position: center; width: 100%; height: 400px; border-radius: 20px;"></div>
                    
                    <!-- Multi-layered overlays -->
                    <div class="image-overlay"></div>
                    
                    <!-- Shine effect overlay -->
                    <div class="image-shine"></div>
                    
                    <!-- Frame effect -->
                    <div class="image-frame"></div>
                </div>
                
                <!-- Ultra-Enhanced Experience Badge -->
                <div class="experience-badge ultra-badge">
                    
                    <!-- Badge content -->
                    <div class="badge-content">
                        <?php echo esc_html(get_theme_mod('about_years_experience', '15+')); ?>
                        <span class="badge-subtitle">Years Experience</span>
                    </div>
                    
                    <!-- Badge animations -->
                    <div class="badge-anim-1"></div>
                    <div class="badge-anim-2"></div>
                    <div class="badge-anim-3"></div>
                    
                    <!-- Badge background pattern -->
                    <div class="badge-pattern"></div>
                    
                    <!-- Rotating ring -->
                    <div class="badge-ring"></div>
                </div>
                
                <!-- Enhanced Floating Trust Elements -->
                <div class="trust-indicator">
                    <div class="indicator-content">
                        <div class="indicator-dot"></div>
                        <span class="indicator-text">Trusted by 500+ Clients</span>
                    </div>
                    <!-- Trust indicator glow -->
                    <div class="trust-indicator-glow"></div>
                </div>
                
                <!-- Additional floating stats -->
                <div class="stats-indicator">
                    <div class="stats-content">
                        <div class="stats-number">4.9★</div>
                        <div class="stats-label">Average Rating</div>
                    </div>
                </div>
                
                <!-- Decorative corner elements -->
                <div class="corner-decoration-tl"></div>
                <div class="corner-decoration-br"></div>
            </div>
            
            <!-- Ultra-Enhanced Content Section -->
            <div class="about-content ultra-content">
                
                <!-- Advanced Section Indicator -->
                <div class="section-indicator ultra-indicator">
                    <div class="indicator-line">
                        <!-- Animated shine effect -->
                        <div class="indicator-shine"></div>
                    </div>
                    <h6 class="indicator-title">
                        About Us
                        <!-- Text glow effect -->
                        <span class="indicator-title-glow">About Us</span>
                    </h6>
                    <!-- Decorative dot -->
                    <div class="indicator-dot"></div>
                </div>
                
                <!-- Ultra-Enhanced Title with Advanced Typography -->
                <h2 class="ultra-title">
                    <?php echo esc_html(get_theme_mod('about_title', 'Professional Services You Can Trust')); ?>
                    
                    <!-- Enhanced decorative underline with animation -->
                    <div class="title-underline"></div>
                    
                    <!-- Text shadow recreation for depth -->
                    <span class="title-shadow"><?php echo esc_html(get_theme_mod('about_title', 'Professional Services You Can Trust')); ?></span>
                </h2>
                
                <!-- Enhanced Description with Better Typography -->
                <div class="description-wrapper">
                    <p class="description-text">
                        <!-- Enhanced accent bar -->
                        <span class="description-accent"></span>
                        
                        <?php echo esc_html(get_theme_mod('about_description', 'We\'re dedicated to providing exceptional home and lifestyle services with professionalism and care. Our team of experienced professionals takes pride in delivering high-quality services that meet your specific needs and exceed your expectations.')); ?>
                    </p>
                    
                    <!-- Quote decoration -->
                    <div class="description-quote">"</div>
                </div>
                
                <!-- Ultra-Premium Features Grid with Advanced Cards -->
                <div class="about-features ultra-premium-features">
                    
                    <!-- Feature Card 1 -->
                    <div class="feature ultra-premium-feature">
                        <!-- Top accent with animation -->
                        <div class="feature-accent feature-accent-1"></div>
                        
                        <!-- Enhanced icon -->
                        <div class="feature-icon">
                            ✓
                            <!-- Icon glow -->
                            <div class="feature-icon-glow"></div>
                        </div>
                        
                        <div class="feature-content">
                            <span class="feature-title">Licensed & Insured</span>
                            <p class="feature-description">Fully certified professionals with comprehensive coverage</p>
                        </div>
                        
                        <!-- Hover effect background -->
                        <div class="feature-hover-bg"></div>
                    </div>
                    
                    <!-- Feature Card 2 -->
                    <div class="feature ultra-premium-feature">
                        <div class="feature-accent feature-accent-2"></div>
                        
                        <div class="feature-icon">
                            ✓
                            <div class="feature-icon-glow"></div>
                        </div>
                        
                        <div class="feature-content">
                            <span class="feature-title">Quality Guaranteed</span>
                            <p class="feature-description">100% satisfaction promise with quality assurance</p>
                        </div>
                        
                        <div class="feature-hover-bg"></div>
                    </div>
                    
                    <!-- Feature Card 3 -->
                    <div class="feature ultra-premium-feature">
                        <div class="feature-accent feature-accent-3"></div>
                        
                        <div class="feature-icon">
                            ✓
                            <div class="feature-icon-glow"></div>
                        </div>
                        
                        <div class="feature-content">
                            <span class="feature-title">Professional Staff</span>
                            <p class="feature-description">Trained & experienced team with proven expertise</p>
                        </div>
                        
                        <div class="feature-hover-bg"></div>
                    </div>
                    
                    <!-- Feature Card 4 -->
                    <div class="feature ultra-premium-feature">
                        <div class="feature-accent feature-accent-4"></div>
                        
                        <div class="feature-icon">
                            ✓
                            <div class="feature-icon-glow"></div>
                        </div>
                        
                        <div class="feature-content">
                            <span class="feature-title">Fair Pricing</span>
                            <p class="feature-description">Transparent & competitive rates with no hidden fees</p>
                        </div>
                        
                        <div class="feature-hover-bg"></div>
                    </div>
                </div>
                
                <!-- Ultra-Enhanced CTA Button -->
                <div>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>" class="cta-button ultra-enhanced-cta">
                        
                        <!-- Button content -->
                        <span class="cta-text">Learn More About Us</span>
                        
                        <!-- Animated arrow -->
                        <svg class="cta-arrow" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        
                        <!-- Multiple button effects -->
                        <span class="btn-shine-ultra"></span>
                        
                        <span class="btn-glow"></span>
                        
                        <!-- Animated border -->
                        <span class="btn-border-glow"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Counter Section -->
<section class="counter-section" style="background-image: url('<?php echo esc_url(get_theme_mod('counter_background', get_template_directory_uri() . '/images/counter-bg.jpg')); ?>');">
    <div class="container">
        <div class="counter-grid">
            <div class="counter-item">
                <div class="counter-icon"><i class="fas fa-users"></i></div>
                <div class="counter-number"><?php echo esc_html(get_theme_mod('counter_clients', '500+')); ?></div>
                <div class="counter-text">Happy Clients</div>
            </div>
            
            <div class="counter-item">
                <div class="counter-icon"><i class="fas fa-briefcase"></i></div>
                <div class="counter-number"><?php echo esc_html(get_theme_mod('counter_projects', '1,000+')); ?></div>
                <div class="counter-text">Projects Completed</div>
            </div>
            
            <div class="counter-item">
                <div class="counter-icon"><i class="fas fa-star"></i></div>
                <div class="counter-number"><?php echo esc_html(get_theme_mod('counter_reviews', '4.9')); ?></div>
                <div class="counter-text">Average Rating</div>
            </div>
            
            <div class="counter-item">
                <div class="counter-icon"><i class="fas fa-certificate"></i></div>
                <div class="counter-number"><?php echo esc_html(get_theme_mod('counter_years', '15+')); ?></div>
                <div class="counter-text">Years Experience</div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials">
    <div class="container">
        <header class="section-header">
            <h2>What Our Customers Say</h2>
            <p>Hear from our satisfied customers about their experience with our services</p>
        </header>

        <div class="testimonial-grid">
            <div class="testimonial">
                <div class="quote">"</div>
                <p><?php echo esc_html(get_theme_mod('testimonial1_content', 'The house cleaning service exceeded all my expectations! The team was professional, thorough, and friendly. My home has never looked better.')); ?></p>
                <div class="testimonial-author">
                    <div class="author-info">
                        <h4><?php echo esc_html(get_theme_mod('testimonial1_author', 'Sarah Johnson')); ?></h4>
                        <p><?php echo esc_html(get_theme_mod('testimonial1_role', 'Home Cleaning Customer')); ?></p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial">
                <div class="quote">"</div>
                <p><?php echo esc_html(get_theme_mod('testimonial2_content', 'I\'ve used their handyman services multiple times now. Always on time, fairly priced, and the work is excellent. They\'ve become my go-to for all home repairs.')); ?></p>
                <div class="testimonial-author">
                    <div class="author-info">
                        <h4><?php echo esc_html(get_theme_mod('testimonial2_author', 'Michael Chen')); ?></h4>
                        <p><?php echo esc_html(get_theme_mod('testimonial2_role', 'Handyman Services Customer')); ?></p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial">
                <div class="quote">"</div>
                <p><?php echo esc_html(get_theme_mod('testimonial3_content', 'Their pet sitting service gave me peace of mind during my vacation. They sent daily updates with photos, and my cats were happy and healthy when I returned home.')); ?></p>
                <div class="testimonial-author">
                    <div class="author-info">
                        <h4><?php echo esc_html(get_theme_mod('testimonial3_author', 'Emily Rodriguez')); ?></h4>
                        <p><?php echo esc_html(get_theme_mod('testimonial3_role', 'Pet Services Customer')); ?></p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('testimonials'))); ?>" class="btn">View All Testimonials</a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2><?php echo esc_html(get_theme_mod('cta_title', 'Ready to Experience Our Quality Service?')); ?></h2>
        <p><?php echo esc_html(get_theme_mod('cta_description', 'Contact us today to schedule your service or request a free quote. Our friendly team is ready to assist you.')); ?></p>
        <div class="cta-buttons">
            <a href="<?php echo esc_url(get_theme_mod('cta_primary_button_url', get_permalink(get_page_by_path('contact')))); ?>" class="btn btn-white"><?php echo esc_html(get_theme_mod('cta_primary_button_text', 'Contact Us')); ?></a>
            <a href="<?php echo esc_url(get_theme_mod('cta_secondary_button_url', 'tel:' . preg_replace('/[^0-9]/', '', get_theme_mod('contact_phone', '(800) 555-1234')))); ?>" class="btn btn-outline"><?php echo esc_html(get_theme_mod('cta_secondary_button_text', 'Call Now')); ?></a>
        </div>
    </div>
</section>

<!-- Latest Blog Posts -->
<section class="blog-section">
    <div class="container">
        <header class="section-header">
            <h2>Latest News & Tips</h2>
            <p>Stay updated with our latest news, service updates, and helpful household tips</p>
        </header>
        
        <div class="posts-grid">
            <?php
            $recent_posts = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'ignore_sticky_posts' => 1
            ));
            
            if ($recent_posts->have_posts()) :
                while ($recent_posts->have_posts()) : $recent_posts->the_post();
            ?>
                <div class="blog-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="blog-image">
                            <?php the_post_thumbnail('medium_large'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span><i class="far fa-calendar-alt"></i> <?php echo get_the_date(); ?></span>
                            <span><i class="far fa-user"></i> <?php the_author(); ?></span>
                        </div>
                        
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        
                        <div class="blog-excerpt">
                            <?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?>
                        </div>
                        
                        <a href="<?php the_permalink(); ?>" class="read-more">
                            Read More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="no-posts">
                    <p>No posts found. Check back soon for updates!</p>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="text-center">
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn">View All Posts</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
