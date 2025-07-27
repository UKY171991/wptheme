<?php 
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 */

get_header(); ?>

<?php if (is_home() && is_front_page()) : ?>
    <!-- Homepage Content -->
    
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="hero-title">
                            <?php echo get_theme_mod('hero_title', 'Professional Digital Solutions'); ?>
                        </h1>
                        <p class="hero-subtitle">
                            <?php echo get_theme_mod('hero_subtitle', 'We create exceptional digital experiences that drive business growth and success.'); ?>
                        </p>
                        <div class="hero-buttons">
                            <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn-primary btn-lg me-3">
                                <i class="fas fa-rocket me-2"></i>
                                <?php echo get_theme_mod('hero_primary_button_text', 'Our Services'); ?>
                            </a>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-outline-primary btn-lg">
                                <i class="fas fa-phone me-2"></i>
                                Get Quote
                            </a>
                        </div>
                        
                        <!-- Hero Statistics -->
                        <div class="hero-stats">
                            <div class="row">
                                <div class="col-4">
                                    <div class="hero-stat">
                                        <span class="stat-number counter" data-target="100">0</span>+
                                        <span class="stat-label">Projects Completed</span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="hero-stat">
                                        <span class="stat-number counter" data-target="50">0</span>+
                                        <span class="stat-label">Happy Clients</span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="hero-stat">
                                        <span class="stat-number counter" data-target="5">0</span>+
                                        <span class="stat-label">Years Experience</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image text-center">
                        <i class="fas fa-laptop-code" style="font-size: 20rem; color: rgba(255,255,255,0.1);"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section bg-light-gray">
        <div class="container">
            <div class="section-title">
                <h2>Our Services</h2>
                <p>We offer comprehensive digital solutions to help your business thrive in the modern digital landscape.</p>
            </div>
            
            <div class="row g-4">
                <?php
                $services = get_posts(array(
                    'post_type' => 'service',
                    'posts_per_page' => 6,
                    'post_status' => 'publish'
                ));
                
                if ($services) :
                    foreach ($services as $service) : ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="card service-card h-100">
                                <?php if (has_post_thumbnail($service->ID)) : ?>
                                    <img src="<?php echo get_the_post_thumbnail_url($service->ID, 'service-card'); ?>" 
                                         alt="<?php echo esc_attr($service->post_title); ?>" 
                                         class="card-img-top">
                                <?php endif; ?>
                                <div class="card-body">
                                    <div class="service-icon">
                                        <i class="fas fa-cog"></i>
                                    </div>
                                    <h3 class="card-title"><?php echo esc_html($service->post_title); ?></h3>
                                    <p class="card-text"><?php echo esc_html(get_the_excerpt($service->ID)); ?></p>
                                    <a href="<?php echo esc_url(get_permalink($service->ID)); ?>" class="btn btn-outline-primary">
                                        Learn More <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;
                else : ?>
                    <!-- Default services when none exist -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card service-card h-100">
                            <div class="card-body">
                                <div class="service-icon">
                                    <i class="fas fa-code"></i>
                                </div>
                                <h3 class="card-title">Web Development</h3>
                                <p class="card-text">Custom websites and web applications built with modern technologies.</p>
                                <a href="#" class="btn btn-outline-primary">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card service-card h-100">
                            <div class="card-body">
                                <div class="service-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <h3 class="card-title">Digital Marketing</h3>
                                <p class="card-text">Comprehensive digital marketing strategies to grow your online presence.</p>
                                <a href="#" class="btn btn-outline-primary">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card service-card h-100">
                            <div class="card-body">
                                <div class="service-icon">
                                    <i class="fas fa-handshake"></i>
                                </div>
                                <h3 class="card-title">Business Consulting</h3>
                                <p class="card-text">Strategic business consulting to optimize your operations and growth.</p>
                                <a href="#" class="btn btn-outline-primary">Learn More <i class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="text-center mt-5">
                <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn-primary btn-lg">
                    View All Services <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-content">
                        <h2>About BluePrint Folder</h2>
                        <p class="lead">We are a team of passionate professionals dedicated to delivering exceptional digital solutions.</p>
                        <p>Our expertise spans web development, design, and digital strategy to help businesses succeed online. With years of experience and a commitment to excellence, we've helped numerous clients achieve their digital goals.</p>
                        
                        <div class="row mt-4">
                            <div class="col-6">
                                <div class="feature-item">
                                    <i class="fas fa-check-circle text-accent me-2"></i>
                                    <span>Expert Team</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="feature-item">
                                    <i class="fas fa-check-circle text-accent me-2"></i>
                                    <span>Quality Delivery</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="feature-item">
                                    <i class="fas fa-check-circle text-accent me-2"></i>
                                    <span>24/7 Support</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="feature-item">
                                    <i class="fas fa-check-circle text-accent me-2"></i>
                                    <span>Proven Results</span>
                                </div>
                            </div>
                        </div>
                        
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>" class="btn btn-primary mt-4">
                            Learn More About Us <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-image text-center">
                        <i class="fas fa-users" style="font-size: 15rem; color: var(--accent-light);"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="section bg-light-gray">
        <div class="container">
            <div class="section-title">
                <h2>What Our Clients Say</h2>
                <p>Don't just take our word for it. Here's what our satisfied clients have to say about our services.</p>
            </div>
            
            <div class="row g-4">
                <?php
                $testimonials = get_posts(array(
                    'post_type' => 'testimonial',
                    'posts_per_page' => 3,
                    'post_status' => 'publish'
                ));
                
                if ($testimonials) :
                    foreach ($testimonials as $testimonial) : ?>
                        <div class="col-lg-4">
                            <div class="card testimonial-card h-100">
                                <div class="card-body">
                                    <div class="testimonial-rating mb-3">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="card-text"><?php echo esc_html($testimonial->post_content); ?></p>
                                </div>
                                <div class="card-footer bg-transparent border-0">
                                    <?php if (has_post_thumbnail($testimonial->ID)) : ?>
                                        <img src="<?php echo get_the_post_thumbnail_url($testimonial->ID, 'testimonial-avatar'); ?>" 
                                             alt="<?php echo esc_attr($testimonial->post_title); ?>" 
                                             class="testimonial-avatar">
                                    <?php endif; ?>
                                    <h6 class="mb-0"><?php echo esc_html($testimonial->post_title); ?></h6>
                                    <small class="text-muted"><?php echo esc_html(get_post_meta($testimonial->ID, '_testimonial_company', true)); ?></small>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;
                else : ?>
                    <!-- Default testimonials -->
                    <div class="col-lg-4">
                        <div class="card testimonial-card h-100">
                            <div class="card-body">
                                <div class="testimonial-rating mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="card-text">"BluePrint Folder delivered exceptional results for our web development project. Their team was professional, responsive, and delivered on time."</p>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <h6 class="mb-0">John Smith</h6>
                                <small class="text-muted">CEO, Tech Solutions Inc.</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card testimonial-card h-100">
                            <div class="card-body">
                                <div class="testimonial-rating mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="card-text">"Outstanding digital marketing services that significantly improved our online presence and lead generation. Highly recommended!"</p>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <h6 class="mb-0">Sarah Johnson</h6>
                                <small class="text-muted">Marketing Director, Growth Co.</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card testimonial-card h-100">
                            <div class="card-body">
                                <div class="testimonial-rating mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="card-text">"Their business consulting services helped us optimize our operations and achieve significant cost savings. Great expertise!"</p>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <h6 class="mb-0">Michael Brown</h6>
                                <small class="text-muted">Operations Manager, Efficiency Ltd.</small>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section bg-primary">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="text-white mb-4">Ready to Get Started?</h2>
                    <p class="text-white-50 mb-4 lead">Let's discuss your project and see how we can help you achieve your digital goals.</p>
                    <div class="cta-buttons">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-light btn-lg me-3">
                            <i class="fas fa-envelope me-2"></i>
                            Get Free Quote
                        </a>
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('portfolio'))); ?>" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-eye me-2"></i>
                            View Portfolio
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php elseif (is_home()) : ?>
    <!-- Blog Index Page -->
    <section class="section">
        <div class="container">
            <div class="section-title">
                <h1>Our Blog</h1>
                <p>Stay updated with our latest insights, tips, and industry news.</p>
            </div>
            
            <div class="row">
                <div class="col-lg-8">
                    <?php if (have_posts()) : ?>
                        <div class="row g-4">
                            <?php while (have_posts()) : the_post(); ?>
                                <div class="col-md-6">
                                    <article id="post-<?php the_ID(); ?>" <?php post_class('card post-card h-100'); ?>>
                                        <?php if (has_post_thumbnail()) : ?>
                                            <img src="<?php echo get_the_post_thumbnail_url(null, 'blog-thumb'); ?>" 
                                                 alt="<?php the_title_attribute(); ?>" 
                                                 class="card-img-top">
                                        <?php endif; ?>
                                        
                                        <div class="card-body">
                                            <div class="post-meta mb-3">
                                                <span class="text-muted">
                                                    <i class="fas fa-calendar me-1"></i>
                                                    <?php echo get_the_date(); ?>
                                                </span>
                                                <?php 
                                                $categories = get_the_category();
                                                if (!empty($categories)) : ?>
                                                    <span class="badge bg-primary ms-2">
                                                        <?php echo esc_html($categories[0]->name); ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            
                                            <h2 class="card-title h5">
                                                <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h2>
                                            
                                            <p class="card-text post-excerpt">
                                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                            </p>
                                            
                                            <a href="<?php the_permalink(); ?>" class="read-more">
                                                Read More <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </article>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="mt-5">
                            <?php the_posts_pagination(array(
                                'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                                'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
                                'class' => 'pagination justify-content-center'
                            )); ?>
                        </div>
                    <?php else : ?>
                        <div class="text-center">
                            <h3>No posts found</h3>
                            <p>There are no blog posts to display at this time.</p>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="col-lg-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>

<?php else : ?>
    <!-- Default Archive/Index -->
    <section class="section">
        <div class="container">
            <?php if (have_posts()) : ?>
                <div class="row">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <article id="post-<?php the_ID(); ?>" <?php post_class('card h-100'); ?>>
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" 
                                         alt="<?php the_title_attribute(); ?>" 
                                         class="card-img-top">
                                <?php endif; ?>
                                
                                <div class="card-body">
                                    <h2 class="card-title h5">
                                        <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    <p class="card-text">
                                        <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                    </p>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary">
                                        Read More
                                    </a>
                                </div>
                            </article>
                        </div>
                    <?php endwhile; ?>
                </div>
                
                <!-- Pagination -->
                <div class="mt-5">
                    <?php the_posts_pagination(); ?>
                </div>
            <?php else : ?>
                <div class="text-center">
                    <h1>Nothing Found</h1>
                    <p>Sorry, no content was found for your request.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>
