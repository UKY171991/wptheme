<?php
/*
Template Name: Front Page
*/
get_header(); ?>

<main id="main" class="site-main">
    <!-- Hero Section -->
    <section class="section full-height bg-primary-dark text-white d-flex align-items-center">
        <div class="overlay-accent"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 section-content">
                    <div class="fade-in-up">
                        <div class="badge bg-accent text-white px-3 py-2 rounded-pill mb-4">
                            <i class="fas fa-star me-2"></i>#1 Rated Home Services in Your Area
                        </div>
                        
                        <h1 class="display-3 fw-bold mb-4">
                            Professional Home Services 
                            <span class="text-accent">You Can Trust</span>
                        </h1>
                        
                        <p class="lead mb-4">From deep cleaning to handyman repairs, we provide reliable, high-quality services that make your life easier. Licensed, insured, and dedicated to your satisfaction.</p>
                        
                        <div class="d-flex flex-wrap gap-3 mb-5">
                            <a href="#services" class="btn btn-accent btn-rounded btn-lg">
                                <i class="fas fa-tools me-2"></i>Explore Services
                            </a>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-outline-light btn-rounded btn-lg">
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
