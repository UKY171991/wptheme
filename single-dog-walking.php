<?php
/**
 * Template Name: Dog Walking Service
 * Single Service Page: Dog Walking
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
                                <i class="bi bi-heart me-2"></i>
                                Pet & Animal Services
                            </span>
                        </div>
                        <h1 class="display-4 fw-bold mb-4">Professional Dog Walking Service</h1>
                        <p class="lead mb-4">Give your furry friend the exercise and attention they deserve with our professional dog walking services. Our experienced walkers provide safe, fun, and reliable care for your beloved pet.</p>
                        <div class="service-features d-flex flex-wrap gap-3">
                            <span class="feature-tag">
                                <i class="bi bi-check-circle me-2"></i>
                                GPS Tracking
                            </span>
                            <span class="feature-tag">
                                <i class="bi bi-camera me-2"></i>
                                Photo Updates
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
                        <h4 class="fw-bold mb-3">Book Dog Walking</h4>
                        <div class="price-display mb-3">
                            <span class="price-from">Starting from</span>
                            <span class="price-amount">$25</span>
                            <span class="price-period">per walk</span>
                        </div>
                        <ul class="service-includes list-unstyled mb-4">
                            <li><i class="bi bi-check text-success me-2"></i>30-60 minute walks</li>
                            <li><i class="bi bi-check text-success me-2"></i>GPS tracking included</li>
                            <li><i class="bi bi-check text-success me-2"></i>Photo updates</li>
                            <li><i class="bi bi-check text-success me-2"></i>Waste cleanup</li>
                        </ul>
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary w-100 mb-3">
                            <i class="bi bi-calendar-check me-2"></i>
                            Book Walk
                        </a>
                        <a href="tel:+1234567890" class="btn btn-outline-primary w-100">
                            <i class="bi bi-telephone me-2"></i>
                            Call for Info
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
                        <h2 class="section-title mb-4">What's Included in Our Dog Walking Service</h2>
                        
                        <div class="walk-features mb-5">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="feature-card p-4 border rounded">
                                        <h5 class="fw-bold">Exercise & Play</h5>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>Customized walk routes</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Appropriate exercise level</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Interactive playtime</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Mental stimulation</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-card p-4 border rounded">
                                        <h5 class="fw-bold">Safety & Care</h5>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>Professional equipment</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Safety-first approach</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Weather considerations</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Emergency protocols</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-card p-4 border rounded">
                                        <h5 class="fw-bold">Communication</h5>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>GPS walk tracking</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Photo & video updates</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Walk reports</li>
                                            <li><i class="bi bi-check text-success me-2"></i>24/7 communication</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-card p-4 border rounded">
                                        <h5 class="fw-bold">Extra Services</h5>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>Feeding (if needed)</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Fresh water refill</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Waste cleanup</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Basic grooming check</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="mb-4">Why Choose Our Dog Walking Service?</h3>
                        <div class="benefits-grid mb-5">
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="benefit-item text-center">
                                        <div class="benefit-icon">
                                            <i class="bi bi-heart fs-2 text-danger"></i>
                                        </div>
                                        <h5>Pet Lovers</h5>
                                        <p>Our walkers are genuine pet enthusiasts who treat your dog like their own.</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="benefit-item text-center">
                                        <div class="benefit-icon">
                                            <i class="bi bi-geo-alt fs-2 text-primary"></i>
                                        </div>
                                        <h5>GPS Tracking</h5>
                                        <p>Real-time GPS tracking so you can see exactly where your dog has been walking.</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="benefit-item text-center">
                                        <div class="benefit-icon">
                                            <i class="bi bi-calendar-check fs-2 text-success"></i>
                                        </div>
                                        <h5>Flexible Scheduling</h5>
                                        <p>Daily, weekly, or as-needed walks to fit your schedule and your dog's needs.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="mb-4">Service Packages & Pricing</h3>
                        <div class="pricing-table mb-5">
                            <div class="row g-4">
                                <div class="col-lg-4">
                                    <div class="pricing-card border rounded p-4">
                                        <h5 class="fw-bold">Single Walk</h5>
                                        <div class="price mb-3">
                                            <span class="amount">$25</span>
                                            <span class="period">/walk</span>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>30-minute walk</li>
                                            <li><i class="bi bi-check text-success me-2"></i>GPS tracking</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Photo updates</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Perfect for try-outs</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="pricing-card border rounded p-4 featured">
                                        <div class="popular-badge">Most Popular</div>
                                        <h5 class="fw-bold">Weekly Package</h5>
                                        <div class="price mb-3">
                                            <span class="amount">$100</span>
                                            <span class="period">/week</span>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>5 walks per week</li>
                                            <li><i class="bi bi-check text-success me-2"></i>45-minute walks</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Priority scheduling</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Save $25/week</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="pricing-card border rounded p-4">
                                        <h5 class="fw-bold">Premium Care</h5>
                                        <div class="price mb-3">
                                            <span class="amount">$180</span>
                                            <span class="period">/week</span>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>Daily walks (7 days)</li>
                                            <li><i class="bi bi-check text-success me-2"></i>60-minute walks</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Additional pet care</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Best value option</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-section">
                            <h3 class="mb-4">Frequently Asked Questions</h3>
                            <div class="accordion" id="dogwalkingFAQ">
                                <div class="accordion-item">
                                    <h4 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                            What happens if my dog doesn't get along with the walker?
                                        </button>
                                    </h4>
                                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#dogwalkingFAQ">
                                        <div class="accordion-body">
                                            We'll arrange a meet-and-greet session before the first walk. If there's not a good match, we'll assign a different walker at no extra charge.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h4 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                            Can you walk multiple dogs at once?
                                        </button>
                                    </h4>
                                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#dogwalkingFAQ">
                                        <div class="accordion-body">
                                            Yes! We offer group walks for families with multiple dogs, or we can arrange individual walks if your dog prefers one-on-one attention.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h4 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                            What if the weather is bad?
                                        </button>
                                    </h4>
                                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#dogwalkingFAQ">
                                        <div class="accordion-body">
                                            We walk in most weather conditions with appropriate gear. In extreme weather, we offer indoor play sessions or short bathroom breaks instead.
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
                            <h5 class="fw-bold mb-3">Schedule a Meet & Greet</h5>
                            <div class="contact-info">
                                <div class="contact-item mb-3">
                                    <i class="bi bi-telephone text-primary me-2"></i>
                                    <a href="tel:+1234567890">(123) 456-7890</a>
                                </div>
                                <div class="contact-item mb-3">
                                    <i class="bi bi-envelope text-primary me-2"></i>
                                    <a href="mailto:dogs@blueprint.com">dogs@blueprint.com</a>
                                </div>
                                <div class="contact-item mb-3">
                                    <i class="bi bi-clock text-primary me-2"></i>
                                    <span>Mon-Sun: 7AM-7PM</span>
                                </div>
                            </div>
                            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary w-100">
                                Book Meet & Greet
                            </a>
                        </div>

                        <!-- Related Services -->
                        <div class="related-services bg-light p-4 rounded">
                            <h5 class="fw-bold mb-3">Related Pet Services</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="<?php echo esc_url(home_url('/services/pet-sitting/')); ?>" class="text-decoration-none">
                                        <i class="bi bi-arrow-right text-primary me-2"></i>
                                        Pet Sitting
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="<?php echo esc_url(home_url('/services/mobile-pet-grooming/')); ?>" class="text-decoration-none">
                                        <i class="bi bi-arrow-right text-primary me-2"></i>
                                        Mobile Pet Grooming
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="<?php echo esc_url(home_url('/services/pet-taxi/')); ?>" class="text-decoration-none">
                                        <i class="bi bi-arrow-right text-primary me-2"></i>
                                        Pet Taxi
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="<?php echo esc_url(home_url('/services/pet-poop-scooping/')); ?>" class="text-decoration-none">
                                        <i class="bi bi-arrow-right text-primary me-2"></i>
                                        Pet Waste Cleanup
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
            <h3 class="text-center mb-5">Happy Pet Parents</h3>
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
                        <p>"Max absolutely loves his walker Sarah! She sends me the cutest photos and GPS updates. I know he's in great hands."</p>
                        <div class="customer-info">
                            <strong>Jennifer Williams</strong>
                            <div class="text-muted">Max's Mom</div>
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
                        <p>"Reliable, professional, and my dogs are always excited when they arrive. Best investment I've made for my pets' well-being."</p>
                        <div class="customer-info">
                            <strong>Robert Davis</strong>
                            <div class="text-muted">Bella & Charlie's Dad</div>
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
                        <p>"The GPS tracking is amazing! I can see exactly where Luna went and how much exercise she got. Peace of mind while I'm at work."</p>
                        <div class="customer-info">
                            <strong>Maria Garcia</strong>
                            <div class="text-muted">Luna's Mom</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="service-cta py-5 bg-primary text-white">
        <div class="container text-center">
            <h3 class="display-6 fw-bold mb-3">Your Dog Deserves the Best Care!</h3>
            <p class="lead mb-4">Schedule a meet-and-greet today and see why pet parents trust us with their furry family members.</p>
            <div class="cta-buttons">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-light btn-lg me-3">
                    <i class="bi bi-calendar-check me-2"></i>
                    Schedule Meet & Greet
                </a>
                <a href="tel:+1234567890" class="btn btn-outline-light btn-lg">
                    <i class="bi bi-telephone me-2"></i>
                    Call Now
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
                    <span class="hashtag">#DogWalking</span>
                    <span class="hashtag">#PetWalking</span>
                    <span class="hashtag">#DogWalker</span>
                    <span class="hashtag">#PetCare</span>
                    <span class="hashtag">#DogExercise</span>
                    <span class="hashtag">#PetServices</span>
                    <span class="hashtag">#DogSitting</span>
                    <span class="hashtag">#PetLover</span>
                    <span class="hashtag">#DogsOfInstagram</span>
                    <span class="hashtag">#PuppyWalk</span>
                    <span class="hashtag">#LocalPetCare</span>
                    <span class="hashtag">#TrustedPetCare</span>
                    <span class="hashtag">#DogLife</span>
                    <span class="hashtag">#HappyDogs</span>
                    <span class="hashtag">#PetHealth</span>
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
