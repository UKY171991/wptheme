<?php
/*
Template Name: Single Service - Full Width
*/

get_header(); ?>

<main class="main-content">
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Enhanced Service Hero Section -->
        <section class="single-service-hero position-relative overflow-hidden">
            <div class="hero-background">
                <div class="hero-gradient"></div>
                <div class="hero-particles"></div>
            </div>
            <div class="container position-relative z-3">
                <div class="row align-items-center min-vh-50">
                    <div class="col-lg-8">
                        <div class="service-breadcrumb mb-4">
                            <nav aria-label="Breadcrumb" class="d-flex align-items-center">
                                <a href="<?php echo home_url(); ?>" class="text-white text-decoration-none opacity-75 hover-opacity-100">
                                    <i class="bi bi-house-door me-2"></i>Home
                                </a>
                                <i class="bi bi-chevron-right text-white mx-3 opacity-50"></i>
                                <a href="<?php echo get_permalink(get_page_by_path('services')); ?>" class="text-white text-decoration-none opacity-75 hover-opacity-100">
                                    Services
                                </a>
                                <i class="bi bi-chevron-right text-white mx-3 opacity-50"></i>
                                <span class="text-white"><?php the_title(); ?></span>
                            </nav>
                        </div>
                        
                        <h1 class="display-4 fw-bold text-white mb-4 text-shadow"><?php the_title(); ?></h1>
                        
                        <div class="service-meta d-flex flex-wrap gap-3 mb-4">
                            <?php 
                            $price = get_post_meta(get_the_ID(), 'service_price', true);
                            $category = get_the_terms(get_the_ID(), 'service_category');
                            $duration = get_post_meta(get_the_ID(), 'service_duration', true);
                            ?>
                            
                            <?php if ($price): ?>
                                <div class="badge bg-white bg-opacity-20 text-white fs-6 px-3 py-2 rounded-pill">
                                    <i class="bi bi-currency-dollar me-2"></i>
                                    <?php echo esc_html($price); ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($category && !is_wp_error($category)): ?>
                                <div class="badge bg-primary bg-opacity-80 text-white fs-6 px-3 py-2 rounded-pill">
                                    <i class="bi bi-tag me-2"></i>
                                    <?php echo esc_html($category[0]->name); ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($duration): ?>
                                <div class="badge bg-success bg-opacity-80 text-white fs-6 px-3 py-2 rounded-pill">
                                    <i class="bi bi-clock me-2"></i>
                                    <?php echo esc_html($duration); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="service-excerpt lead text-white mb-4 opacity-90">
                            <?php echo get_the_excerpt(); ?>
                        </div>
                        
                        <div class="service-actions d-flex flex-wrap gap-3">
                            <a href="#contact-form" class="btn btn-light btn-lg px-4 py-3 rounded-pill">
                                <i class="bi bi-telephone me-2"></i>
                                Get Free Quote
                            </a>
                            <a href="#service-details" class="btn btn-outline-light btn-lg px-4 py-3 rounded-pill">
                                <i class="bi bi-info-circle me-2"></i>
                                Learn More
                            </a>
                        </div>
                    </div>
                    
                    <?php if (has_post_thumbnail()): ?>
                        <div class="col-lg-4">
                            <div class="service-hero-image text-center">
                                <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded-4 shadow-lg')); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- Enhanced Service Features Section -->
        <section class="service-features bg-light py-5" id="service-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center mb-5">
                        <div class="section-badge mb-3">
                            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fs-6">
                                What's Included
                            </span>
                        </div>
                        <h2 class="display-5 fw-bold mb-3">Service Features</h2>
                        <p class="lead text-muted">Everything you need for exceptional results</p>
                    </div>
                </div>
                
                <div class="row g-4 mb-5">
                    <?php 
                    $features = get_post_meta(get_the_ID(), 'service_features', true);
                    if ($features && is_array($features)):
                        foreach ($features as $feature): ?>
                            <div class="col-lg-3 col-md-6" data-aos="fade-up">
                                <div class="feature-card bg-white rounded-4 p-4 h-100 text-center shadow-sm border-0">
                                    <div class="feature-icon mb-3">
                                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-3 p-3 d-inline-flex">
                                            <i class="<?php echo esc_attr($feature['icon'] ?? 'bi bi-check-circle'); ?> text-primary fs-3"></i>
                                        </div>
                                    </div>
                                    <h5 class="fw-bold mb-3"><?php echo esc_html($feature['title']); ?></h5>
                                    <p class="text-muted"><?php echo esc_html($feature['description']); ?></p>
                                </div>
                            </div>
                        <?php endforeach;
                    else: ?>
                        <!-- Default features if none are set -->
                        <div class="col-lg-3 col-md-6" data-aos="fade-up">
                            <div class="feature-card bg-white rounded-4 p-4 h-100 text-center shadow-sm border-0">
                                <div class="feature-icon mb-3">
                                    <div class="icon-wrapper bg-primary bg-opacity-10 rounded-3 p-3 d-inline-flex">
                                        <i class="bi bi-star text-primary fs-3"></i>
                                    </div>
                                </div>
                                <h5 class="fw-bold mb-3">Premium Quality</h5>
                                <p class="text-muted">High-quality service delivery with attention to detail</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="feature-card bg-white rounded-4 p-4 h-100 text-center shadow-sm border-0">
                                <div class="feature-icon mb-3">
                                    <div class="icon-wrapper bg-success bg-opacity-10 rounded-3 p-3 d-inline-flex">
                                        <i class="bi bi-clock text-success fs-3"></i>
                                    </div>
                                </div>
                                <h5 class="fw-bold mb-3">Fast Delivery</h5>
                                <p class="text-muted">Quick turnaround time without compromising quality</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="feature-card bg-white rounded-4 p-4 h-100 text-center shadow-sm border-0">
                                <div class="feature-icon mb-3">
                                    <div class="icon-wrapper bg-info bg-opacity-10 rounded-3 p-3 d-inline-flex">
                                        <i class="bi bi-headset text-info fs-3"></i>
                                    </div>
                                </div>
                                <h5 class="fw-bold mb-3">24/7 Support</h5>
                                <p class="text-muted">Round-the-clock customer support and assistance</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="feature-card bg-white rounded-4 p-4 h-100 text-center shadow-sm border-0">
                                <div class="feature-icon mb-3">
                                    <div class="icon-wrapper bg-warning bg-opacity-10 rounded-3 p-3 d-inline-flex">
                                        <i class="bi bi-shield-check text-warning fs-3"></i>
                                    </div>
                                </div>
                                <h5 class="fw-bold mb-3">Money Back Guarantee</h5>
                                <p class="text-muted">100% satisfaction guarantee with full refund policy</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- Service Quick Info Cards -->
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="info-card bg-primary bg-opacity-10 rounded-4 p-4 text-center">
                            <div class="info-icon mb-3">
                                <i class="bi bi-currency-dollar text-primary fs-2"></i>
                            </div>
                            <h6 class="fw-bold text-primary mb-2">Starting Price</h6>
                            <p class="mb-0 text-dark fw-semibold"><?php echo $price ? esc_html($price) : 'Contact for Quote'; ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="info-card bg-success bg-opacity-10 rounded-4 p-4 text-center">
                            <div class="info-icon mb-3">
                                <i class="bi bi-clock text-success fs-2"></i>
                            </div>
                            <h6 class="fw-bold text-success mb-2">Duration</h6>
                            <p class="mb-0 text-dark fw-semibold"><?php echo $duration ? esc_html($duration) : '1-3 Days'; ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="info-card bg-info bg-opacity-10 rounded-4 p-4 text-center">
                            <div class="info-icon mb-3">
                                <i class="bi bi-arrow-repeat text-info fs-2"></i>
                            </div>
                            <h6 class="fw-bold text-info mb-2">Revisions</h6>
                            <p class="mb-0 text-dark fw-semibold">Unlimited</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="info-card bg-warning bg-opacity-10 rounded-4 p-4 text-center">
                            <div class="info-icon mb-3">
                                <i class="bi bi-shield-check text-warning fs-2"></i>
                            </div>
                            <h6 class="fw-bold text-warning mb-2">Guarantee</h6>
                            <p class="mb-0 text-dark fw-semibold">100% Satisfaction</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Full Width Service Content -->
        <section class="service-content py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="content-wrapper">
                            <div class="service-description mb-5">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Enhanced Contact Form Section -->
        <section class="service-contact-form bg-light py-5" id="contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center mb-5">
                        <div class="section-badge mb-3">
                            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fs-6">
                                Get Started
                            </span>
                        </div>
                        <h2 class="display-5 fw-bold mb-3">Ready to Begin?</h2>
                        <p class="lead text-muted">Let's discuss your project requirements and get started</p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="contact-form-wrapper bg-white rounded-4 shadow-sm p-5">
                            <form class="service-order-form" method="post" action="">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label for="client-name" class="form-label fw-semibold">Full Name *</label>
                                        <input type="text" class="form-control form-control-lg border-2 rounded-3" id="client-name" name="client_name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="client-email" class="form-label fw-semibold">Email Address *</label>
                                        <input type="email" class="form-control form-control-lg border-2 rounded-3" id="client-email" name="client_email" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="client-phone" class="form-label fw-semibold">Phone Number</label>
                                        <input type="tel" class="form-control form-control-lg border-2 rounded-3" id="client-phone" name="client_phone">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="project-budget" class="form-label fw-semibold">Budget Range</label>
                                        <select class="form-select form-select-lg border-2 rounded-3" id="project-budget" name="project_budget">
                                            <option value="">Select Budget</option>
                                            <option value="under-500">Under $500</option>
                                            <option value="500-1000">$500 - $1,000</option>
                                            <option value="1000-2500">$1,000 - $2,500</option>
                                            <option value="2500-5000">$2,500 - $5,000</option>
                                            <option value="over-5000">Over $5,000</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="project-timeline" class="form-label fw-semibold">Project Timeline</label>
                                        <select class="form-select form-select-lg border-2 rounded-3" id="project-timeline" name="project_timeline">
                                            <option value="">Select Timeline</option>
                                            <option value="asap">ASAP</option>
                                            <option value="1-week">Within 1 week</option>
                                            <option value="2-weeks">Within 2 weeks</option>
                                            <option value="1-month">Within 1 month</option>
                                            <option value="flexible">Flexible</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="project-description" class="form-label fw-semibold">Project Description *</label>
                                        <textarea class="form-control border-2 rounded-3" id="project-description" name="project_description" rows="5" placeholder="Please describe your project requirements in detail..." required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="agree-terms" name="agree_terms" required>
                                            <label class="form-check-label" for="agree-terms">
                                                I agree to the <a href="<?php echo home_url('/terms/'); ?>" class="text-primary">Terms of Service</a> and <a href="<?php echo home_url('/privacy/'); ?>" class="text-primary">Privacy Policy</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary btn-lg px-5 py-3 rounded-pill">
                                            <i class="bi bi-send me-2"></i>
                                            Submit Project Request
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Methods -->
                <div class="row mt-5">
                    <div class="col-lg-10 mx-auto">
                        <div class="row g-4">
                            <div class="col-md-4 text-center">
                                <div class="contact-method-card bg-white rounded-4 p-4 h-100 shadow-sm">
                                    <div class="contact-icon mb-3">
                                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-3 p-3 d-inline-flex">
                                            <i class="bi bi-telephone text-primary fs-3"></i>
                                        </div>
                                    </div>
                                    <h5 class="fw-bold mb-3">Call Us</h5>
                                    <p class="text-muted mb-3">Speak directly with our team</p>
                                    <a href="tel:+15551234567" class="btn btn-outline-primary rounded-pill">
                                        (555) 123-4567
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="contact-method-card bg-white rounded-4 p-4 h-100 shadow-sm">
                                    <div class="contact-icon mb-3">
                                        <div class="icon-wrapper bg-success bg-opacity-10 rounded-3 p-3 d-inline-flex">
                                            <i class="bi bi-envelope text-success fs-3"></i>
                                        </div>
                                    </div>
                                    <h5 class="fw-bold mb-3">Email Us</h5>
                                    <p class="text-muted mb-3">Get a detailed response</p>
                                    <a href="mailto:info@blueprintfolder.com" class="btn btn-outline-success rounded-pill">
                                        Send Email
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="contact-method-card bg-white rounded-4 p-4 h-100 shadow-sm">
                                    <div class="contact-icon mb-3">
                                        <div class="icon-wrapper bg-info bg-opacity-10 rounded-3 p-3 d-inline-flex">
                                            <i class="bi bi-chat-dots text-info fs-3"></i>
                                        </div>
                                    </div>
                                    <h5 class="fw-bold mb-3">Live Chat</h5>
                                    <p class="text-muted mb-3">Instant support available</p>
                                    <a href="#" class="btn btn-outline-info rounded-pill" onclick="openLiveChat()">
                                        Start Chat
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
                                        <option value="1000-5000">$1,000 - $5,000</option>
        <!-- Related Services Section -->
        <section class="related-services py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center mb-5">
                        <div class="section-badge mb-3">
                            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fs-6">
                                Explore More
                            </span>
                        </div>
                        <h2 class="display-5 fw-bold mb-3">Related Services</h2>
                        <p class="lead text-muted">Other services you might be interested in</p>
                    </div>
                </div>
                
                <div class="row g-4">
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
                            <div class="col-lg-4 col-md-6" data-aos="fade-up">
                                <div class="service-card bg-white rounded-4 shadow-hover border-0 h-100 position-relative overflow-hidden">
                                    <?php if (has_post_thumbnail()): ?>
                                        <div class="card-image-wrapper position-relative">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('medium', array('class' => 'card-img-top rounded-top-4', 'style' => 'height: 200px; object-fit: cover;')); ?>
                                                <div class="image-overlay position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-25"></div>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-bold mb-3">
                                            <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                                <?php the_title(); ?>
                                            </a>
                                        </h5>
                                        
                                        <p class="card-text text-muted mb-4">
                                            <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                        </p>
                                        
                                        <div class="d-flex justify-content-between align-items-center">
                                            <?php if ($related_price): ?>
                                                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">
                                                    <?php echo esc_html($related_price); ?>
                                                </span>
                                            <?php endif; ?>
                                            
                                            <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary btn-sm rounded-pill">
                                                <i class="bi bi-arrow-right me-1"></i>
                                                View Details
                                            </a>
                                        </div>
                                    </div>
                                    <div class="service-card-overlay"></div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    else: ?>
                        <!-- Default related services if none found -->
                        <div class="col-lg-4 col-md-6" data-aos="fade-up">
                            <div class="service-card bg-white rounded-4 shadow-hover border-0 h-100 text-center p-4">
                                <div class="service-icon mb-3">
                                    <div class="icon-wrapper bg-primary bg-opacity-10 rounded-3 p-3 d-inline-flex">
                                        <i class="bi bi-house-door text-primary fs-3"></i>
                                    </div>
                                </div>
                                <h5 class="fw-bold mb-3">House Cleaning</h5>
                                <p class="text-muted mb-4">Professional house cleaning services for your home</p>
                                <a href="<?php echo home_url('/services/house-cleaning/'); ?>" class="btn btn-outline-primary btn-sm rounded-pill">
                                    Learn More
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-card bg-white rounded-4 shadow-hover border-0 h-100 text-center p-4">
                                <div class="service-icon mb-3">
                                    <div class="icon-wrapper bg-success bg-opacity-10 rounded-3 p-3 d-inline-flex">
                                        <i class="bi bi-palette text-success fs-3"></i>
                                    </div>
                                </div>
                                <h5 class="fw-bold mb-3">Graphic Design</h5>
                                <p class="text-muted mb-4">Creative graphic design services for your business</p>
                                <a href="<?php echo home_url('/services/graphic-design/'); ?>" class="btn btn-outline-success btn-sm rounded-pill">
                                    Learn More
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="service-card bg-white rounded-4 shadow-hover border-0 h-100 text-center p-4">
                                <div class="service-icon mb-3">
                                    <div class="icon-wrapper bg-info bg-opacity-10 rounded-3 p-3 d-inline-flex">
                                        <i class="bi bi-laptop text-info fs-3"></i>
                                    </div>
                                </div>
                                <h5 class="fw-bold mb-3">Virtual Assistant</h5>
                                <p class="text-muted mb-4">Virtual assistant services to help your business grow</p>
                                <a href="<?php echo home_url('/services/virtual-assistant/'); ?>" class="btn btn-outline-info btn-sm rounded-pill">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        
    <?php endwhile; ?>
</main>

<script>
// Live chat function
function openLiveChat() {
    // Add your live chat integration here
    alert('Live chat feature will be available soon!');
}

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});

// Form submission handling
document.querySelector('.service-order-form')?.addEventListener('submit', function(e) {
    e.preventDefault();
    // Add your form submission logic here
    alert('Thank you for your inquiry! We will contact you soon.');
});
</script>

<?php get_footer(); ?>
