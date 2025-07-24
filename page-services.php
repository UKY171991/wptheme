<?php
/**
 * Template Name: Services
 */

get_header(); ?>

<main id="main" class="site-main">
    <?php
    // Page Banner
    echo services_pro_get_banner_section(
        'Our Services',
        'Professional home services designed to make your life easier. From cleaning to maintenance, we provide reliable solutions you can trust.'
    );
    ?>

    <!-- Services Categories Section -->
    <section id="services-categories" class="section">
        <div class="container">
            <?php echo services_pro_get_section_heading(
                'Service Categories',
                'Explore our comprehensive range of professional home services'
            ); ?>
            
            <!-- Service Categories Display -->
            <div class="service-categories-content">
                <?php services_pro_display_service_categories(); ?>
            </div>
        </div>
    </section>

    <!-- Individual Services Section -->
    <section id="services-grid" class="section bg-light">
        <div class="container">
            <?php echo services_pro_get_section_heading(
                'Featured Services',
                'Our most popular professional services'
            ); ?>
            
            <!-- Services Display -->
            <div class="services-content">
                <?php services_pro_display_services(6); ?>
            </div>
            
            <div class="text-center mt-5">
                <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn-accent btn-lg px-5">
                    <i class="fas fa-list me-2"></i>View All Services
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="section bg-light">
        <div class="container">
            <?php echo services_pro_get_section_heading(
                'Why Choose Our Services',
                'We are committed to providing exceptional service quality'
            ); ?>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-shield-alt text-accent" style="font-size: 3rem;"></i>
                        </div>
                        <h4 class="h5 mb-3">Licensed & Insured</h4>
                        <p class="text-muted">Fully licensed and insured for your peace of mind and protection.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-clock text-accent" style="font-size: 3rem;"></i>
                        </div>
                        <h4 class="h5 mb-3">24/7 Availability</h4>
                        <p class="text-muted">Emergency services available around the clock for urgent needs.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-thumbs-up text-accent" style="font-size: 3rem;"></i>
                        </div>
                        <h4 class="h5 mb-3">Satisfaction Guarantee</h4>
                        <p class="text-muted">100% satisfaction guarantee on all our services and workmanship.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <?php echo services_pro_get_cta_section(
        'Ready to Get Started?',
        'Contact us today for a free consultation and personalized quote for your service needs.',
        'Get Free Quote',
        get_permalink(get_page_by_path('contact'))
    ); ?>
</main>

<?php get_footer(); ?>
                'Explore our services by category'
            ); ?>
            
            <div class="row g-4">
                <?php foreach ($service_categories as $category) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card category-card h-100 shadow-sm border-0 text-center">
                            <div class="card-body p-4">
                                <div class="category-icon mb-3">
                                    <i class="fas fa-tools fa-3x text-accent"></i>
                                </div>
                                <h3 class="h5 mb-3"><?php echo esc_html($category->name); ?></h3>
                                <?php if ($category->description) : ?>
                                    <p class="text-muted mb-4"><?php echo esc_html($category->description); ?></p>
                                <?php endif; ?>
                                <span class="badge bg-light text-dark mb-3"><?php echo esc_html($category->count); ?> Services</span>
                                <div>
                                    <a href="<?php echo esc_url(get_term_link($category)); ?>" class="btn btn-accent btn-sm">
                                        View Services <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="section">
        <div class="container">
            <?php echo services_pro_get_section_heading(
                'Our Process',
                'Simple steps to get the service you need'
            ); ?>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="process-step text-center">
                        <div class="step-icon bg-accent text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <span class="h4 mb-0">1</span>
                        </div>
                        <h4 class="h5 mb-3">Contact Us</h4>
                        <p class="text-muted">Get in touch with our team to discuss your service needs and get a free quote.</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="process-step text-center">
                        <div class="step-icon bg-accent text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <span class="h4 mb-0">2</span>
                        </div>
                        <h4 class="h5 mb-3">Schedule Service</h4>
                        <p class="text-muted">We'll work with your schedule to find the perfect time for your service appointment.</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="process-step text-center">
                        <div class="step-icon bg-accent text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <span class="h4 mb-0">3</span>
                        </div>
                        <h4 class="h5 mb-3">Professional Service</h4>
                        <p class="text-muted">Our experienced technicians will complete your service with precision and care.</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="process-step text-center">
                        <div class="step-icon bg-accent text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <span class="h4 mb-0">4</span>
                        </div>
                        <h4 class="h5 mb-3">Follow-up</h4>
                        <p class="text-muted">We ensure your complete satisfaction and are available for any follow-up needs.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <?php
    $service_faqs = new WP_Query(array(
        'post_type' => 'faq',
        'posts_per_page' => 5,
        'tax_query' => array(
            array(
                'taxonomy' => 'faq_category',
                'field'    => 'slug',
                'terms'    => 'services',
            ),
        ),
    ));
    
    if ($service_faqs->have_posts()) :
    ?>
    <section class="section bg-light">
        <div class="container">
            <?php echo services_pro_get_section_heading(
                'Frequently Asked Questions',
                'Common questions about our services'
            ); ?>
            
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <?php services_pro_display_faqs(5, 'services'); ?>
                    
                    <div class="text-center mt-4">
                        <a href="<?php echo esc_url(get_post_type_archive_link('faq')); ?>" class="btn btn-outline-accent">
                            View All FAQs <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; wp_reset_postdata(); ?>

    <!-- CTA Section -->
    <?php echo services_pro_get_cta_section(); ?>
</main>

<?php get_footer(); ?>

    <!-- Services Grid Section -->
    <section id="services-grid" class="section">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h2 class="section-title">All Services</h2>
                <p class="section-subtitle">Professional solutions for every home need</p>
            </div>
            
            <div class="row g-4">
                <!-- House Cleaning -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-service card-hover h-100">
                        <div class="card-header text-center">
                            <i class="fas fa-broom icon-lg"></i>
                            <h3 class="h5 mb-0">House Cleaning</h3>
                        </div>
                        <div class="card-body">
                            <p class="mb-3">Professional cleaning services to keep your home spotless and healthy.</p>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Regular weekly/bi-weekly cleaning</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Deep cleaning services</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Move-in/move-out cleaning</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Post-construction cleanup</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Eco-friendly products</li>
                            </ul>
                            <div class="text-center">
                                <div class="service-price mb-3">Starting at $89</div>
                                <a href="#" class="btn btn-outline-accent btn-rounded">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Handyman Services -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-service card-hover h-100">
                        <div class="card-header text-center">
                            <i class="fas fa-tools icon-lg"></i>
                            <h3 class="h5 mb-0">Handyman Services</h3>
                        </div>
                        <div class="card-body">
                            <p class="mb-3">Expert repairs and maintenance to keep your home in perfect condition.</p>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>General home repairs</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Furniture assembly</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Painting & touch-ups</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Minor plumbing fixes</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Electrical work</li>
                            </ul>
                            <div class="text-center">
                                <div class="service-price mb-3">Starting at $75/hr</div>
                                <a href="#" class="btn btn-outline-accent btn-rounded">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Lawn & Garden Care -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-service card-hover h-100">
                        <div class="card-header text-center">
                            <i class="fas fa-leaf icon-lg"></i>
                            <h3 class="h5 mb-0">Lawn & Garden Care</h3>
                        </div>
                        <div class="card-body">
                            <p class="mb-3">Complete landscaping and garden maintenance services.</p>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Lawn mowing & edging</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Garden maintenance</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Seasonal cleanup</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Mulching & fertilizing</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Pressure washing</li>
                            </ul>
                            <div class="text-center">
                                <div class="service-price mb-3">Starting at $60</div>
                                <a href="#" class="btn btn-outline-accent btn-rounded">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Personal Shopping -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-service card-hover h-100">
                        <div class="card-header text-center">
                            <i class="fas fa-shopping-bag icon-lg"></i>
                            <h3 class="h5 mb-0">Personal Shopping</h3>
                        </div>
                        <div class="card-body">
                            <p class="mb-3">Convenient shopping and errand services to save you time.</p>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Grocery shopping</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Gift purchasing</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Prescription pickup</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Delivery services</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>General errands</li>
                            </ul>
                            <div class="text-center">
                                <div class="service-price mb-3">Starting at $25/hr</div>
                                <a href="#" class="btn btn-outline-accent btn-rounded">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pet Care -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-service card-hover h-100">
                        <div class="card-header text-center">
                            <i class="fas fa-paw icon-lg"></i>
                            <h3 class="h5 mb-0">Pet Care</h3>
                        </div>
                        <div class="card-body">
                            <p class="mb-3">Reliable pet care services when you can't be there.</p>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Dog walking</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Pet sitting</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Feeding & care</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Exercise & playtime</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Basic grooming</li>
                            </ul>
                            <div class="text-center">
                                <div class="service-price mb-3">Starting at $30</div>
                                <a href="#" class="btn btn-outline-accent btn-rounded">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Elderly Care -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-service card-hover h-100">
                        <div class="card-header text-center">
                            <i class="fas fa-heart icon-lg"></i>
                            <h3 class="h5 mb-0">Elderly Care</h3>
                        </div>
                        <div class="card-body">
                            <p class="mb-3">Compassionate assistance for seniors to maintain independence.</p>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Companionship</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Light housekeeping</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Meal preparation</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Transportation</li>
                                <li class="mb-2"><i class="fas fa-check text-accent me-2"></i>Medication reminders</li>
                            </ul>
                            <div class="text-center">
                                <div class="service-price mb-3">Starting at $20/hr</div>
                                <a href="#" class="btn btn-outline-accent btn-rounded">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="section bg-white">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h2 class="section-title">How It Works</h2>
                <p class="section-subtitle">Simple steps to get the help you need</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="text-center fade-in-up">
                        <div class="rounded-circle bg-accent text-white mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <span class="h3 mb-0">1</span>
                        </div>
                        <h3 class="h5 mb-3">Choose Service</h3>
                        <p class="text-muted">Select the service you need from our comprehensive list</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="text-center fade-in-up">
                        <div class="rounded-circle bg-accent text-white mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <span class="h3 mb-0">2</span>
                        </div>
                        <h3 class="h5 mb-3">Schedule</h3>
                        <p class="text-muted">Pick a convenient time that works with your schedule</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="text-center fade-in-up">
                        <div class="rounded-circle bg-accent text-white mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <span class="h3 mb-0">3</span>
                        </div>
                        <h3 class="h5 mb-3">We Arrive</h3>
                        <p class="text-muted">Our professional team arrives on time and ready to work</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="text-center fade-in-up">
                        <div class="rounded-circle bg-accent text-white mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <span class="h3 mb-0">4</span>
                        </div>
                        <h3 class="h5 mb-3">Relax</h3>
                        <p class="text-muted">Sit back and enjoy your free time while we handle the work</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Areas -->
    <section class="section bg-primary-dark text-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-heading text-center mb-5">
                        <h2 class="section-title text-white">Service Areas</h2>
                        <p class="section-subtitle text-light">We proudly serve the following areas</p>
                    </div>
                    
                    <div class="row g-3 text-center">
                        <div class="col-md-4">
                            <div class="card border-0 bg-light">
                                <div class="card-body py-3">
                                    <h6 class="mb-0">Downtown</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 bg-light">
                                <div class="card-body py-3">
                                    <h6 class="mb-0">Suburbs</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 bg-light">
                                <div class="card-body py-3">
                                    <h6 class="mb-0">Westside</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 bg-light">
                                <div class="card-body py-3">
                                    <h6 class="mb-0">Eastside</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 bg-light">
                                <div class="card-body py-3">
                                    <h6 class="mb-0">North Valley</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 bg-light">
                                <div class="card-body py-3">
                                    <h6 class="mb-0">South Hills</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <p class="text-muted">Don't see your area listed? <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="text-decoration-none">Contact us</a> to check availability.</p>
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
                    <p class="lead mb-4">Let us take care of your to-do list while you focus on what matters most to you.</p>
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-light btn-rounded btn-lg">
                            <i class="fas fa-calendar me-2"></i>Schedule Service
                        </a>
                        <a href="tel:+1234567890" class="btn btn-outline-light btn-rounded btn-lg">
                            <i class="fas fa-phone me-2"></i>Call Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
