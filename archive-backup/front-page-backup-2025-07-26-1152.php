<?php
/**
 * Template Name: Front Page - Blueprint Folder Pro
 * Description: Dynamic homepage showcasing services, portfolio, and testimonials
 */

get_header(); ?>

<main id="main" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-background">
            <?php 
            $hero_image = get_theme_mod('blueprint_folder_hero_image');
            if ($hero_image): ?>
                <img src="<?php echo esc_url($hero_image); ?>" alt="<?php esc_attr_e('Hero Background', 'blueprint-folder'); ?>" class="hero-bg-image">
            <?php endif; ?>
            <div class="hero-overlay"></div>
        </div>
        
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <div class="hero-badge">
                        <i class="fas fa-star" aria-hidden="true"></i>
                        <?php echo esc_html(get_theme_mod('blueprint_folder_hero_badge', '#1 Digital Marketing Agency')); ?>
                    </div>
                    
                    <h1 class="hero-title">
                        <?php echo wp_kses_post(get_theme_mod('blueprint_folder_hero_title', 'Grow Your Business with <span class="text-accent">Digital Excellence</span>')); ?>
                    </h1>
                    
                    <p class="hero-description">
                        <?php echo esc_html(get_theme_mod('blueprint_folder_hero_description', 'We help businesses achieve their goals through strategic digital marketing, innovative web development, and data-driven growth solutions.')); ?>
                    </p>
                    
                    <div class="hero-actions">
                        <a href="<?php echo esc_url(home_url('/services')); ?>" class="btn btn-primary btn-lg">
                            <i class="fas fa-rocket" aria-hidden="true"></i>
                            <?php _e('Explore Services', 'blueprint-folder'); ?>
                        </a>
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline btn-lg">
                            <i class="fas fa-comments" aria-hidden="true"></i>
                            <?php _e('Get Free Consultation', 'blueprint-folder'); ?>
                        </a>
                    </div>
                </div>
                
                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-number"><?php echo esc_html(get_theme_mod('blueprint_folder_stat_1_number', '500+')); ?></div>
                        <div class="stat-label"><?php echo esc_html(get_theme_mod('blueprint_folder_stat_1_label', 'Projects Completed')); ?></div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number"><?php echo esc_html(get_theme_mod('blueprint_folder_stat_2_number', '98%')); ?></div>
                        <div class="stat-label"><?php echo esc_html(get_theme_mod('blueprint_folder_stat_2_label', 'Client Satisfaction')); ?></div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number"><?php echo esc_html(get_theme_mod('blueprint_folder_stat_3_number', '5+')); ?></div>
                        <div class="stat-label"><?php echo esc_html(get_theme_mod('blueprint_folder_stat_3_label', 'Years Experience')); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section py-20">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title"><?php _e('Why Choose Blueprint Folder Pro?', 'blueprint-folder'); ?></h2>
                <p class="section-description"><?php _e('We deliver results-driven solutions that help your business thrive in the digital landscape.', 'blueprint-folder'); ?></p>
            </div>
            
            <div class="features-grid grid grid-cols-3">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line" aria-hidden="true"></i>
                    </div>
                    <h3 class="feature-title"><?php _e('Data-Driven Results', 'blueprint-folder'); ?></h3>
                    <p class="feature-description"><?php _e('Every strategy is backed by comprehensive analytics and measurable outcomes.', 'blueprint-folder'); ?></p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-users" aria-hidden="true"></i>
                    </div>
                    <h3 class="feature-title"><?php _e('Expert Team', 'blueprint-folder'); ?></h3>
                    <p class="feature-description"><?php _e('Our certified professionals bring years of experience and cutting-edge expertise.', 'blueprint-folder'); ?></p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-clock" aria-hidden="true"></i>
                    </div>
                    <h3 class="feature-title"><?php _e('24/7 Support', 'blueprint-folder'); ?></h3>
                    <p class="feature-description"><?php _e('Round-the-clock support ensures your business never misses a beat.', 'blueprint-folder'); ?></p>
                </div>
            </div>
        </div>
    </section>
                                <i class="fas fa-phone me-2"></i>Get Free Quote
                            </a>
                        </div>
                        
                        <div class="row g-4">
                            <div class="col-6 col-md-3 text-center">
                                <div class="h4 fw-bold text-accent mb-1">15,000+</div>
                                <small class="text-light">Happy Customers</small>
                            </div>
                            <div class="col-6 col-md-3 text-center">
                                <div class="h4 fw-bold text-accent mb-1">20+</div>
                                <small class="text-light">Years Experience</small>
                            </div>
                            <div class="col-6 col-md-3 text-center">
                                <div class="h4 fw-bold text-accent mb-1">99%</div>
                                <small class="text-light">Satisfaction Rate</small>
                            </div>
                            <div class="col-6 col-md-3 text-center">
                                <div class="h4 fw-bold text-accent mb-1">24/7</div>
                                <small class="text-light">Emergency Support</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="fade-in-up text-center">
                        <i class="fas fa-home display-1 text-accent"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="section">
        <div class="container">
            <?php echo services_pro_get_section_heading(
                'Our Services',
                'Professional home services that exceed your expectations'
            ); ?>
            
            <?php
            // Display services from custom post type
            $services_query = new WP_Query(array('post_type' => 'service', 'posts_per_page' => 1));
            if ($services_query->have_posts()) :
                wp_reset_postdata();
                // Use dynamic services
                services_pro_display_services(6);
            else :
                // Fallback to static services if no custom posts exist
            ?>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-service card-hover h-100">
                            <div class="card-body p-4 text-center">
                                <div class="icon-circle mx-auto mb-3">
                                    <i class="fas fa-broom icon-md"></i>
                                </div>
                                <h3 class="h5 mb-3">Home Cleaning</h3>
                                <p class="mb-3">Deep cleaning services that leave your home spotless and fresh</p>
                                <ul class="list-unstyled text-start mb-4">
                                    <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Regular & deep cleaning</li>
                                    <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Move-in/move-out cleaning</li>
                                    <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Post-construction cleanup</li>
                                    <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Eco-friendly products</li>
                                </ul>
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn btn-outline-accent btn-rounded">
                                    Learn More <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-service card-hover h-100">
                            <div class="card-body p-4 text-center">
                                <div class="icon-circle mx-auto mb-3">
                                    <i class="fas fa-tools icon-md"></i>
                                </div>
                                <h3 class="h5 mb-3">Handyman Services</h3>
                                <p class="mb-3">Expert repairs and maintenance to keep your home in perfect condition</p>
                                <ul class="list-unstyled text-start mb-4">
                                    <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>General repairs</li>
                                    <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Furniture assembly</li>
                                    <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Painting & touch-ups</li>
                                    <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Minor plumbing</li>
                                </ul>
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn btn-outline-accent btn-rounded">
                                    Learn More <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-service card-hover h-100">
                            <div class="card-body p-4 text-center">
                                <div class="icon-circle mx-auto mb-3">
                                    <i class="fas fa-leaf icon-md"></i>
                                </div>
                                <h3 class="h5 mb-3">Yard Care</h3>
                                <p class="mb-3">Complete landscaping and yard maintenance services</p>
                                <ul class="list-unstyled text-start mb-4">
                                    <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Lawn mowing & care</li>
                                    <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Garden maintenance</li>
                                    <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Pressure washing</li>
                                    <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Seasonal cleanup</li>
                                </ul>
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn btn-outline-accent btn-rounded">
                                    Learn More <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            <div class="text-center mt-5">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn btn-accent btn-rounded btn-lg">
                    <i class="fas fa-th-large me-2"></i>View All Services
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h2 class="section-title">Why Choose Us</h2>
                <p class="section-subtitle">What sets us apart from the competition</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="text-center fade-in-up">
                        <div class="icon-circle mx-auto mb-3">
                            <i class="fas fa-shield-alt icon-md"></i>
                        </div>
                        <h3 class="h6 mb-2">Licensed & Insured</h3>
                        <p class="small text-muted">Fully licensed and insured for your peace of mind</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="text-center fade-in-up">
                        <div class="icon-circle mx-auto mb-3">
                            <i class="fas fa-clock icon-md"></i>
                        </div>
                        <h3 class="h6 mb-2">Always On Time</h3>
                        <p class="small text-muted">Reliable scheduling and punctual service delivery</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="text-center fade-in-up">
                        <div class="icon-circle mx-auto mb-3">
                            <i class="fas fa-star icon-md"></i>
                        </div>
                        <h3 class="h6 mb-2">Quality Guaranteed</h3>
                        <p class="small text-muted">100% satisfaction guarantee on all our services</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="text-center fade-in-up">
                        <div class="icon-circle mx-auto mb-3">
                            <i class="fas fa-dollar-sign icon-md"></i>
                        </div>
                        <h3 class="h6 mb-2">Affordable Pricing</h3>
                        <p class="small text-muted">Competitive rates with transparent pricing</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="section bg-primary-dark">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h2 class="section-title text-white">What Our Customers Say</h2>
                <p class="section-subtitle text-light">Real reviews from satisfied customers</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 h-100">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </div>
                            <p class="mb-3">"Exceptional service! They cleaned our entire house perfectly and were very professional. Highly recommend!"</p>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-accent text-white me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Sarah Johnson</h6>
                                    <small class="text-muted">Homeowner</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 h-100">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </div>
                            <p class="mb-3">"Fast, reliable, and affordable. The handyman fixed everything on my list and more. Great communication!"</p>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-accent text-white me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Mike Davis</h6>
                                    <small class="text-muted">Business Owner</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 h-100">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </div>
                            <p class="mb-3">"They transformed our yard completely! Professional, courteous, and the results exceeded our expectations."</p>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-accent text-white me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Lisa Chen</h6>
                                    <small class="text-muted">Homeowner</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="section bg-accent text-white">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold mb-4">Ready to Get Started?</h2>
                    <p class="lead mb-4">Join thousands of satisfied customers who trust us with their home service needs. Get your free quote today!</p>
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-light btn-rounded btn-lg">
                            <i class="fas fa-phone me-2"></i>Call for Free Quote
                        </a>
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn btn-outline-light btn-rounded btn-lg">
                            <i class="fas fa-list me-2"></i>Browse Services
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
