<?php
/**
 * Template Name: House Cleaning Service
 * Single Service Page: House Cleaning
 */

get_header(); ?>

<div class="service-page-wrapper">
    <!-- Service Hero Section -->
    <section class="service-hero py-5 bg-gradient-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="service-hero-content text-white">
                        <div class="service-badge mb-3">
                            <span class="badge bg-white text-primary px-3 py-2 rounded-pill">
                                <i class="bi bi-house-heart me-2"></i>
                                Home & Cleaning Services
                            </span>
                        </div>
                        <h1 class="display-4 fw-bold mb-4">Professional House Cleaning</h1>
                        <p class="lead mb-4">Transform your home with our comprehensive house cleaning services. We provide thorough, reliable, and eco-friendly cleaning solutions that give you more time to focus on what matters most.</p>
                        <div class="service-features d-flex flex-wrap gap-3">
                            <span class="feature-tag">
                                <i class="bi bi-check-circle me-2"></i>
                                Eco-Friendly Products
                            </span>
                            <span class="feature-tag">
                                <i class="bi bi-clock me-2"></i>
                                Same-Day Service
                            </span>
                            <span class="feature-tag">
                                <i class="bi bi-shield-check me-2"></i>
                                Fully Insured
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-booking-card bg-white rounded-4 p-4 shadow">
                        <h4 class="fw-bold mb-3">Book Your Cleaning</h4>
                        <div class="price-display mb-3">
                            <span class="price-from">Starting from</span>
                            <span class="price-amount">$89</span>
                            <span class="price-period">per session</span>
                        </div>
                        <ul class="service-includes list-unstyled mb-4">
                            <li><i class="bi bi-check text-success me-2"></i>All rooms cleaned</li>
                            <li><i class="bi bi-check text-success me-2"></i>Kitchen & bathrooms</li>
                            <li><i class="bi bi-check text-success me-2"></i>Dusting & vacuuming</li>
                            <li><i class="bi bi-check text-success me-2"></i>Supplies included</li>
                        </ul>
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary w-100 mb-3">
                            <i class="bi bi-calendar-check me-2"></i>
                            Book Now
                        </a>
                        <a href="tel:+1234567890" class="btn btn-outline-primary w-100">
                            <i class="bi bi-telephone me-2"></i>
                            Call for Quote
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Details Section -->
    <section class="service-details py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="service-content">
                        <h2 class="section-title mb-4">What's Included in Our House Cleaning Service</h2>
                        
                        <div class="cleaning-areas mb-5">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="area-card p-4 border rounded">
                                        <h5 class="fw-bold">Kitchen Cleaning</h5>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>Countertops & appliances</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Sink & faucet cleaning</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Stovetop & microwave</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Floor mopping</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="area-card p-4 border rounded">
                                        <h5 class="fw-bold">Bathroom Cleaning</h5>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>Toilet & shower cleaning</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Mirror & fixtures</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Tile & grout cleaning</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Floor sanitization</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="area-card p-4 border rounded">
                                        <h5 class="fw-bold">Living Areas</h5>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>Dusting all surfaces</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Vacuuming carpets</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Mopping hard floors</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Emptying trash bins</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="area-card p-4 border rounded">
                                        <h5 class="fw-bold">Bedrooms</h5>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>Bed making (optional)</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Dusting furniture</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Vacuuming floors</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Organizing surfaces</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="mb-4">Why Choose Our House Cleaning Service?</h3>
                        <div class="benefits-grid mb-5">
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="benefit-item text-center">
                                        <div class="benefit-icon">
                                            <i class="bi bi-people fs-2 text-primary"></i>
                                        </div>
                                        <h5>Trained Professionals</h5>
                                        <p>Our team is thoroughly vetted, trained, and insured for your peace of mind.</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="benefit-item text-center">
                                        <div class="benefit-icon">
                                            <i class="bi bi-leaf fs-2 text-success"></i>
                                        </div>
                                        <h5>Eco-Friendly</h5>
                                        <p>We use only environmentally safe cleaning products that are safe for your family and pets.</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="benefit-item text-center">
                                        <div class="benefit-icon">
                                            <i class="bi bi-clock fs-2 text-warning"></i>
                                        </div>
                                        <h5>Flexible Scheduling</h5>
                                        <p>Book weekly, bi-weekly, monthly, or one-time cleaning services that fit your schedule.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="mb-4">Pricing & Packages</h3>
                        <div class="pricing-table mb-5">
                            <div class="row g-4">
                                <div class="col-lg-4">
                                    <div class="pricing-card border rounded p-4">
                                        <h5 class="fw-bold">Basic Clean</h5>
                                        <div class="price mb-3">
                                            <span class="amount">$89</span>
                                            <span class="period">/session</span>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>Up to 1,500 sq ft</li>
                                            <li><i class="bi bi-check text-success me-2"></i>2-3 bedrooms</li>
                                            <li><i class="bi bi-check text-success me-2"></i>2 bathrooms</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Kitchen & living areas</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="pricing-card border rounded p-4 featured">
                                        <div class="popular-badge">Most Popular</div>
                                        <h5 class="fw-bold">Standard Clean</h5>
                                        <div class="price mb-3">
                                            <span class="amount">$129</span>
                                            <span class="period">/session</span>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>Up to 2,500 sq ft</li>
                                            <li><i class="bi bi-check text-success me-2"></i>3-4 bedrooms</li>
                                            <li><i class="bi bi-check text-success me-2"></i>3 bathrooms</li>
                                            <li><i class="bi bi-check text-success me-2"></i>All common areas</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="pricing-card border rounded p-4">
                                        <h5 class="fw-bold">Premium Clean</h5>
                                        <div class="price mb-3">
                                            <span class="amount">$179</span>
                                            <span class="period">/session</span>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>3,000+ sq ft</li>
                                            <li><i class="bi bi-check text-success me-2"></i>4+ bedrooms</li>
                                            <li><i class="bi bi-check text-success me-2"></i>4+ bathrooms</li>
                                            <li><i class="bi bi-check text-success me-2"></i>All areas included</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-section">
                            <h3 class="mb-4">Frequently Asked Questions</h3>
                            <div class="accordion" id="housecleaningFAQ">
                                <div class="accordion-item">
                                    <h4 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                            Do I need to provide cleaning supplies?
                                        </button>
                                    </h4>
                                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#housecleaningFAQ">
                                        <div class="accordion-body">
                                            No, we bring all necessary cleaning supplies and equipment. We use eco-friendly, professional-grade products that are safe for your family and pets.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h4 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                            How long does a typical cleaning take?
                                        </button>
                                    </h4>
                                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#housecleaningFAQ">
                                        <div class="accordion-body">
                                            Cleaning time depends on the size of your home and package selected. Typically, it takes 2-4 hours for a thorough cleaning session.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h4 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                            Are you insured and bonded?
                                        </button>
                                    </h4>
                                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#housecleaningFAQ">
                                        <div class="accordion-body">
                                            Yes, we are fully insured and bonded for your protection. All our cleaners undergo background checks and professional training.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="service-sidebar">
                        <!-- Contact Info -->
                        <div class="contact-widget bg-light p-4 rounded mb-4">
                            <h5 class="fw-bold mb-3">Get a Free Quote</h5>
                            <div class="contact-info">
                                <div class="contact-item mb-3">
                                    <i class="bi bi-telephone text-primary me-2"></i>
                                    <a href="tel:+1234567890">(123) 456-7890</a>
                                </div>
                                <div class="contact-item mb-3">
                                    <i class="bi bi-envelope text-primary me-2"></i>
                                    <a href="mailto:info@blueprint.com">info@blueprint.com</a>
                                </div>
                                <div class="contact-item mb-3">
                                    <i class="bi bi-clock text-primary me-2"></i>
                                    <span>Mon-Sat: 8AM-6PM</span>
                                </div>
                            </div>
                            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary w-100">
                                Request Quote
                            </a>
                        </div>

                        <!-- Related Services -->
                        <div class="related-services bg-light p-4 rounded">
                            <h5 class="fw-bold mb-3">Related Services</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="<?php echo esc_url(home_url('/services/move-in-out-cleaning/')); ?>" class="text-decoration-none">
                                        <i class="bi bi-arrow-right text-primary me-2"></i>
                                        Move-in/Move-out Cleaning
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="<?php echo esc_url(home_url('/services/carpet-shampooing/')); ?>" class="text-decoration-none">
                                        <i class="bi bi-arrow-right text-primary me-2"></i>
                                        Carpet Shampooing
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="<?php echo esc_url(home_url('/services/window-cleaning/')); ?>" class="text-decoration-none">
                                        <i class="bi bi-arrow-right text-primary me-2"></i>
                                        Window Cleaning
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="<?php echo esc_url(home_url('/services/pressure-washing/')); ?>" class="text-decoration-none">
                                        <i class="bi bi-arrow-right text-primary me-2"></i>
                                        Pressure Washing
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials py-5 bg-light">
        <div class="container">
            <h3 class="text-center mb-5">What Our Customers Say</h3>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="testimonial-card bg-white p-4 rounded shadow-sm h-100">
                        <div class="stars mb-3">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                        <p>"Absolutely fantastic service! They transformed my home and saved me hours of work. The team was professional and thorough."</p>
                        <div class="customer-info">
                            <strong>Sarah Johnson</strong>
                            <div class="text-muted">Verified Customer</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-card bg-white p-4 rounded shadow-sm h-100">
                        <div class="stars mb-3">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                        <p>"I love that they use eco-friendly products. My house smells amazing and I feel good about what I'm exposing my family to."</p>
                        <div class="customer-info">
                            <strong>Mike Chen</strong>
                            <div class="text-muted">Verified Customer</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-card bg-white p-4 rounded shadow-sm h-100">
                        <div class="stars mb-3">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                        <p>"Reliable, trustworthy, and always on time. I've been using their service for over a year and couldn't be happier."</p>
                        <div class="customer-info">
                            <strong>Emily Rodriguez</strong>
                            <div class="text-muted">Verified Customer</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="service-cta py-5 bg-primary text-white">
        <div class="container text-center">
            <h3 class="display-6 fw-bold mb-3">Ready for a Spotless Home?</h3>
            <p class="lead mb-4">Book your professional house cleaning service today and enjoy more free time!</p>
            <div class="cta-buttons">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-light btn-lg me-3">
                    <i class="bi bi-calendar-check me-2"></i>
                    Book Now
                </a>
                <a href="tel:+1234567890" class="btn btn-outline-light btn-lg">
                    <i class="bi bi-telephone me-2"></i>
                    Call Today
                </a>
            </div>
        </div>
    </section>

    <!-- Hashtags Section -->
    <section class="hashtags py-4 bg-light">
        <div class="container">
            <div class="hashtags-content text-center">
                <h6 class="fw-bold mb-3">Popular Tags:</h6>
                <div class="hashtag-list">
                    <span class="hashtag">#HouseCleaning</span>
                    <span class="hashtag">#ProfessionalCleaning</span>
                    <span class="hashtag">#EcoFriendlyCleaning</span>
                    <span class="hashtag">#HomeCleaning</span>
                    <span class="hashtag">#CleaningService</span>
                    <span class="hashtag">#ResidentialCleaning</span>
                    <span class="hashtag">#MaidService</span>
                    <span class="hashtag">#CleanHome</span>
                    <span class="hashtag">#HousekeepingService</span>
                    <span class="hashtag">#WeeklyCleaning</span>
                    <span class="hashtag">#TrustedCleaners</span>
                    <span class="hashtag">#InsuredCleaners</span>
                    <span class="hashtag">#LocalCleaningService</span>
                    <span class="hashtag">#AffordableCleaning</span>
                    <span class="hashtag">#QualityCleaning</span>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.hashtag {
    display: inline-block;
    background: #667eea;
    color: white;
    padding: 0.25rem 0.75rem;
    margin: 0.25rem;
    border-radius: 1rem;
    font-size: 0.875rem;
    text-decoration: none;
}

.hashtag:hover {
    background: #5a6fd8;
    color: white;
}

.feature-tag {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 2rem;
    font-size: 0.875rem;
}

.pricing-card.featured {
    position: relative;
    border-color: #667eea !important;
    background: linear-gradient(135deg, #f8f9ff 0%, #fff 100%);
}

.popular-badge {
    position: absolute;
    top: -10px;
    left: 50%;
    transform: translateX(-50%);
    background: #667eea;
    color: white;
    padding: 0.25rem 1rem;
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: bold;
}

.service-booking-card {
    position: sticky;
    top: 2rem;
}

.price-amount {
    font-size: 2.5rem;
    font-weight: bold;
    color: #667eea;
}

.price-from, .price-period {
    font-size: 0.875rem;
    color: #6c757d;
}
</style>

<?php get_footer(); ?>
