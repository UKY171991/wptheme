<?php
/**
 * Template Name: Pricing
 */

get_header(); ?>

<main id="main" class="site-main">
    <!-- Hero Section -->
    <section class="section bg-primary-dark text-white">
        <div class="overlay-accent"></div>
        <div class="container">
            <div class="row align-items-center" style="min-height: 40vh;">
                <div class="col-lg-8 section-content">
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb bg-transparent p-0 m-0">
                            <li class="breadcrumb-item">
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-white text-decoration-none">
                                    <i class="fas fa-home me-1"></i>Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active text-accent" aria-current="page">Pricing</li>
                        </ol>
                    </nav>
                    
                    <div class="fade-in-up">
                        <div class="badge bg-accent text-white px-3 py-2 rounded-pill mb-4">
                            <i class="fas fa-dollar-sign me-2"></i>Transparent Pricing
                        </div>
                        
                        <h1 class="display-4 fw-bold mb-4">
                            Our Pricing
                            <span class="text-accent">Fair & Transparent</span>
                        </h1>
                        
                        <p class="lead mb-4">Clear, honest pricing with no hidden fees. Choose the service level that fits your needs and budget.</p>
                        
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#pricing-plans" class="btn btn-accent btn-rounded btn-lg">
                                <i class="fas fa-tags me-2"></i>View Plans
                            </a>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-outline-light btn-rounded btn-lg">
                                <i class="fas fa-calculator me-2"></i>Get Quote
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Plans Section -->
    <section id="pricing-plans" class="section bg-light">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h2 class="section-title">Service Packages</h2>
                <p class="section-subtitle">Choose the perfect plan for your needs</p>
            </div>
            
            <div class="row g-4 justify-content-center">
                <!-- Basic Plan -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-hover border-0 shadow h-100">
                        <div class="card-header text-center bg-light border-0 py-4">
                            <h3 class="h5 mb-0">Basic</h3>
                            <p class="text-muted mb-0">Perfect for occasional help</p>
                        </div>
                        <div class="card-body text-center">
                            <div class="mb-4">
                                <span class="display-4 fw-bold text-accent">$89</span>
                                <span class="text-muted">/visit</span>
                            </div>
                            
                            <ul class="list-unstyled mb-4">
                                <li class="mb-3">
                                    <i class="fas fa-check text-accent me-2"></i>
                                    <strong>2-3 hours</strong> of service
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check text-accent me-2"></i>
                                    <strong>1 service type</strong> per visit
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check text-accent me-2"></i>
                                    <strong>Basic cleaning</strong> supplies included
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check text-accent me-2"></i>
                                    <strong>Flexible</strong> scheduling
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check text-accent me-2"></i>
                                    <strong>Email</strong> support
                                </li>
                                <li class="mb-3 text-muted">
                                    <i class="fas fa-times me-2"></i>
                                    Priority booking
                                </li>
                                <li class="mb-3 text-muted">
                                    <i class="fas fa-times me-2"></i>
                                    Package discounts
                                </li>
                            </ul>
                            
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" 
                               class="btn btn-outline-accent btn-rounded w-100">
                                Choose Basic
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Premium Plan -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-hover border-0 shadow h-100 position-relative">
                        <div class="badge bg-accent text-white position-absolute top-0 start-50 translate-middle px-3 py-2">
                            Most Popular
                        </div>
                        <div class="card-header text-center bg-accent text-white border-0 py-4">
                            <h3 class="h5 mb-0">Premium</h3>
                            <p class="mb-0 opacity-75">Best value for regular service</p>
                        </div>
                        <div class="card-body text-center">
                            <div class="mb-4">
                                <span class="display-4 fw-bold text-accent">$159</span>
                                <span class="text-muted">/visit</span>
                            </div>
                            
                            <ul class="list-unstyled mb-4">
                                <li class="mb-3">
                                    <i class="fas fa-check text-accent me-2"></i>
                                    <strong>4-5 hours</strong> of service
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check text-accent me-2"></i>
                                    <strong>2-3 service types</strong> per visit
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check text-accent me-2"></i>
                                    <strong>Premium supplies</strong> included
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check text-accent me-2"></i>
                                    <strong>Priority</strong> scheduling
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check text-accent me-2"></i>
                                    <strong>Phone & email</strong> support
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check text-accent me-2"></i>
                                    <strong>10% discount</strong> on packages
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check text-accent me-2"></i>
                                    <strong>Same-day</strong> booking available
                                </li>
                            </ul>
                            
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" 
                               class="btn btn-accent btn-rounded w-100">
                                Choose Premium
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Luxury Plan -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-hover border-0 shadow h-100">
                        <div class="card-header text-center bg-dark text-white border-0 py-4">
                            <h3 class="h5 mb-0">Luxury</h3>
                            <p class="mb-0 opacity-75">Complete home care solution</p>
                        </div>
                        <div class="card-body text-center">
                            <div class="mb-4">
                                <span class="display-4 fw-bold text-accent">$249</span>
                                <span class="text-muted">/visit</span>
                            </div>
                            
                            <ul class="list-unstyled mb-4">
                                <li class="mb-3">
                                    <i class="fas fa-check text-accent me-2"></i>
                                    <strong>6+ hours</strong> of service
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check text-accent me-2"></i>
                                    <strong>All service types</strong> available
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check text-accent me-2"></i>
                                    <strong>Luxury supplies</strong> & equipment
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check text-accent me-2"></i>
                                    <strong>VIP scheduling</strong> & support
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check text-accent me-2"></i>
                                    <strong>24/7 phone</strong> support
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check text-accent me-2"></i>
                                    <strong>20% discount</strong> on packages
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check text-accent me-2"></i>
                                    <strong>Personal account</strong> manager
                                </li>
                            </ul>
                            
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" 
                               class="btn btn-dark btn-rounded w-100">
                                Choose Luxury
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Individual Services Pricing -->
    <section class="section bg-white">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h2 class="section-title">Individual Service Rates</h2>
                <p class="section-subtitle">À la carte pricing for specific needs</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-0">
                            <h3 class="h5 mb-0">
                                <i class="fas fa-broom text-accent me-2"></i>Cleaning Services
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Regular House Cleaning</span>
                                <strong class="text-accent">$89 - $129</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Deep Cleaning</span>
                                <strong class="text-accent">$149 - $199</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Move-in/Move-out</span>
                                <strong class="text-accent">$179 - $249</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Post-Construction</span>
                                <strong class="text-accent">$199 - $299</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Window Cleaning</span>
                                <strong class="text-accent">$69 - $99</strong>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-0">
                            <h3 class="h5 mb-0">
                                <i class="fas fa-tools text-accent me-2"></i>Maintenance Services
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Handyman Services</span>
                                <strong class="text-accent">$75 - $95/hr</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Lawn Care</span>
                                <strong class="text-accent">$60 - $89</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Garden Maintenance</span>
                                <strong class="text-accent">$45 - $65/hr</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Pressure Washing</span>
                                <strong class="text-accent">$89 - $149</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Gutter Cleaning</span>
                                <strong class="text-accent">$99 - $149</strong>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-0">
                            <h3 class="h5 mb-0">
                                <i class="fas fa-shopping-bag text-accent me-2"></i>Personal Services
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Personal Shopping</span>
                                <strong class="text-accent">$25 - $35/hr</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Grocery Shopping</span>
                                <strong class="text-accent">$20 - $30/hr</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Errand Running</span>
                                <strong class="text-accent">$25 - $35/hr</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Delivery Services</span>
                                <strong class="text-accent">$15 - $25</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Gift Wrapping</span>
                                <strong class="text-accent">$5 - $15/item</strong>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-0">
                            <h3 class="h5 mb-0">
                                <i class="fas fa-heart text-accent me-2"></i>Care Services
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Pet Care</span>
                                <strong class="text-accent">$30 - $45/visit</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Dog Walking</span>
                                <strong class="text-accent">$20 - $30/walk</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Elderly Assistance</span>
                                <strong class="text-accent">$20 - $35/hr</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>Companionship</span>
                                <strong class="text-accent">$18 - $25/hr</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Child Care</span>
                                <strong class="text-accent">$15 - $25/hr</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Features -->
    <section class="section bg-light">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h2 class="section-title">What's Included</h2>
                <p class="section-subtitle">Transparent pricing with no hidden fees</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="text-center fade-in-up">
                        <div class="rounded-circle bg-accent text-white mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-shield-alt h3 mb-0"></i>
                        </div>
                        <h3 class="h5 mb-3">Fully Insured</h3>
                        <p class="text-muted">Complete insurance coverage for your peace of mind</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="text-center fade-in-up">
                        <div class="rounded-circle bg-accent text-white mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-leaf h3 mb-0"></i>
                        </div>
                        <h3 class="h5 mb-3">Eco-Friendly</h3>
                        <p class="text-muted">Safe, green products for your family and environment</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="text-center fade-in-up">
                        <div class="rounded-circle bg-accent text-white mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-tools h3 mb-0"></i>
                        </div>
                        <h3 class="h5 mb-3">All Supplies</h3>
                        <p class="text-muted">We bring everything needed to complete the job</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="text-center fade-in-up">
                        <div class="rounded-circle bg-accent text-white mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-thumbs-up h3 mb-0"></i>
                        </div>
                        <h3 class="h5 mb-3">Satisfaction</h3>
                        <p class="text-muted">100% satisfaction guarantee or we'll make it right</p>
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
                    <p class="lead mb-4">Contact us today for a personalized quote based on your specific needs.</p>
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-light btn-rounded btn-lg">
                            <i class="fas fa-calculator me-2"></i>Get Free Quote
                        </a>
                        <a href="tel:+1234567890" class="btn btn-outline-light btn-rounded btn-lg">
                            <i class="fas fa-phone me-2"></i>Call for Pricing
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
