<?php
/**
 * Template Name: Graphic Design Service
 * Single Service Page: Graphic Design
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
                                <i class="bi bi-palette me-2"></i>
                                Creative & Digital Services
                            </span>
                        </div>
                        <h1 class="display-4 fw-bold mb-4">Professional Graphic Design</h1>
                        <p class="lead mb-4">Bring your brand vision to life with stunning graphic design that captures attention and communicates your message effectively. From logos to marketing materials, we create designs that make an impact.</p>
                        <div class="service-features d-flex flex-wrap gap-3">
                            <span class="feature-tag">
                                <i class="bi bi-check-circle me-2"></i>
                                Custom Designs
                            </span>
                            <span class="feature-tag">
                                <i class="bi bi-layers me-2"></i>
                                Multiple Concepts
                            </span>
                            <span class="feature-tag">
                                <i class="bi bi-arrow-repeat me-2"></i>
                                Unlimited Revisions
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-booking-card bg-white rounded-4 p-4 shadow">
                        <h4 class="fw-bold mb-3">Start Your Project</h4>
                        <div class="price-display mb-3">
                            <span class="price-from">Starting from</span>
                            <span class="price-amount">$199</span>
                            <span class="price-period">per project</span>
                        </div>
                        <ul class="service-includes list-unstyled mb-4">
                            <li><i class="bi bi-check text-success me-2"></i>Initial consultation</li>
                            <li><i class="bi bi-check text-success me-2"></i>3 design concepts</li>
                            <li><i class="bi bi-check text-success me-2"></i>Unlimited revisions</li>
                            <li><i class="bi bi-check text-success me-2"></i>Final files & formats</li>
                        </ul>
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary w-100 mb-3">
                            <i class="bi bi-brush me-2"></i>
                            Start Project
                        </a>
                        <a href="tel:+1234567890" class="btn btn-outline-primary w-100">
                            <i class="bi bi-telephone me-2"></i>
                            Discuss Ideas
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
                        <h2 class="section-title mb-4">Our Graphic Design Services</h2>
                        
                        <div class="design-services mb-5">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="service-card p-4 border rounded">
                                        <h5 class="fw-bold">Logo Design</h5>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>Brand identity creation</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Multiple logo variations</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Vector & raster formats</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Brand guidelines</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="service-card p-4 border rounded">
                                        <h5 class="fw-bold">Marketing Materials</h5>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>Brochures & flyers</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Business cards</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Posters & banners</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Print-ready files</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="service-card p-4 border rounded">
                                        <h5 class="fw-bold">Digital Graphics</h5>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>Social media graphics</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Web banners & ads</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Email templates</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Presentation slides</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="service-card p-4 border rounded">
                                        <h5 class="fw-bold">Brand Assets</h5>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>Color palettes</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Typography systems</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Icon libraries</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Style guides</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="mb-4">Our Design Process</h3>
                        <div class="process-steps mb-5">
                            <div class="row g-4">
                                <div class="col-md-3">
                                    <div class="process-step text-center">
                                        <div class="step-number">1</div>
                                        <h5>Discovery</h5>
                                        <p>We discuss your vision, goals, and brand requirements in detail.</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="process-step text-center">
                                        <div class="step-number">2</div>
                                        <h5>Concept</h5>
                                        <p>We create initial design concepts based on your brief and feedback.</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="process-step text-center">
                                        <div class="step-number">3</div>
                                        <h5>Refine</h5>
                                        <p>We refine the chosen concept with your input and make revisions.</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="process-step text-center">
                                        <div class="step-number">4</div>
                                        <h5>Deliver</h5>
                                        <p>We provide final files in all necessary formats for your use.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="mb-4">Package Options & Pricing</h3>
                        <div class="pricing-table mb-5">
                            <div class="row g-4">
                                <div class="col-lg-4">
                                    <div class="pricing-card border rounded p-4">
                                        <h5 class="fw-bold">Starter Package</h5>
                                        <div class="price mb-3">
                                            <span class="amount">$199</span>
                                            <span class="period">/project</span>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>Logo design</li>
                                            <li><i class="bi bi-check text-success me-2"></i>2 initial concepts</li>
                                            <li><i class="bi bi-check text-success me-2"></i>3 revision rounds</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Basic file formats</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="pricing-card border rounded p-4 featured">
                                        <div class="popular-badge">Most Popular</div>
                                        <h5 class="fw-bold">Professional Package</h5>
                                        <div class="price mb-3">
                                            <span class="amount">$399</span>
                                            <span class="period">/project</span>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>Complete brand identity</li>
                                            <li><i class="bi bi-check text-success me-2"></i>3 initial concepts</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Unlimited revisions</li>
                                            <li><i class="bi bi-check text-success me-2"></i>All file formats</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="pricing-card border rounded p-4">
                                        <h5 class="fw-bold">Enterprise Package</h5>
                                        <div class="price mb-3">
                                            <span class="amount">$799</span>
                                            <span class="period">/project</span>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>Full brand system</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Marketing materials</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Style guide included</li>
                                            <li><i class="bi bi-check text-success me-2"></i>3 months support</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-section">
                            <h3 class="mb-4">Frequently Asked Questions</h3>
                            <div class="accordion" id="graphicdesignFAQ">
                                <div class="accordion-item">
                                    <h4 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                            How long does a typical design project take?
                                        </button>
                                    </h4>
                                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#graphicdesignFAQ">
                                        <div class="accordion-body">
                                            Most design projects are completed within 5-10 business days, depending on complexity and revision rounds. Rush orders are available for an additional fee.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h4 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                            What file formats will I receive?
                                        </button>
                                    </h4>
                                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#graphicdesignFAQ">
                                        <div class="accordion-body">
                                            You'll receive your designs in various formats including PNG, JPG, PDF, and vector files (AI/EPS) suitable for both print and digital use.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h4 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                            Do I own the rights to my design?
                                        </button>
                                    </h4>
                                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#graphicdesignFAQ">
                                        <div class="accordion-body">
                                            Yes! Once the project is completed and payment is received, you own full rights to use your design for any purpose.
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
                            <h5 class="fw-bold mb-3">Start Your Design Project</h5>
                            <div class="contact-info">
                                <div class="contact-item mb-3">
                                    <i class="bi bi-telephone text-primary me-2"></i>
                                    <a href="tel:+1234567890">(123) 456-7890</a>
                                </div>
                                <div class="contact-item mb-3">
                                    <i class="bi bi-envelope text-primary me-2"></i>
                                    <a href="mailto:design@blueprint.com">design@blueprint.com</a>
                                </div>
                                <div class="contact-item mb-3">
                                    <i class="bi bi-clock text-primary me-2"></i>
                                    <span>Mon-Fri: 9AM-6PM</span>
                                </div>
                            </div>
                            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary w-100">
                                Get Free Consultation
                            </a>
                        </div>

                        <!-- Portfolio Showcase -->
                        <div class="portfolio-widget bg-light p-4 rounded mb-4">
                            <h5 class="fw-bold mb-3">Recent Work</h5>
                            <div class="portfolio-grid">
                                <div class="row g-2">
                                    <div class="col-6">
                                        <div class="portfolio-item">
                                            <div class="placeholder-image bg-primary rounded" style="height: 100px; display: flex; align-items: center; justify-content: center; color: white;">
                                                <i class="bi bi-image fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="portfolio-item">
                                            <div class="placeholder-image bg-success rounded" style="height: 100px; display: flex; align-items: center; justify-content: center; color: white;">
                                                <i class="bi bi-palette fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="portfolio-item">
                                            <div class="placeholder-image bg-warning rounded" style="height: 100px; display: flex; align-items: center; justify-content: center; color: white;">
                                                <i class="bi bi-brush fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="portfolio-item">
                                            <div class="placeholder-image bg-info rounded" style="height: 100px; display: flex; align-items: center; justify-content: center; color: white;">
                                                <i class="bi bi-vector-pen fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="btn btn-outline-primary w-100 mt-3">View Full Portfolio</a>
                        </div>

                        <!-- Related Services -->
                        <div class="related-services bg-light p-4 rounded">
                            <h5 class="fw-bold mb-3">Related Creative Services</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="<?php echo esc_url(home_url('/services/logo-design/')); ?>" class="text-decoration-none">
                                        <i class="bi bi-arrow-right text-primary me-2"></i>
                                        Logo Design
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="<?php echo esc_url(home_url('/services/social-media-management/')); ?>" class="text-decoration-none">
                                        <i class="bi bi-arrow-right text-primary me-2"></i>
                                        Social Media Management
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="<?php echo esc_url(home_url('/services/basic-website-setup/')); ?>" class="text-decoration-none">
                                        <i class="bi bi-arrow-right text-primary me-2"></i>
                                        Website Setup
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="<?php echo esc_url(home_url('/services/tshirt-merch-design/')); ?>" class="text-decoration-none">
                                        <i class="bi bi-arrow-right text-primary me-2"></i>
                                        T-shirt & Merch Design
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
            <h3 class="text-center mb-5">What Our Clients Say</h3>
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
                        <p>"The logo design exceeded my expectations! Professional, creative, and they really understood my brand vision."</p>
                        <div class="customer-info">
                            <strong>Alex Thompson</strong>
                            <div class="text-muted">Tech Startup Founder</div>
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
                        <p>"Amazing work on our marketing materials! The designs are eye-catching and have really improved our brand presence."</p>
                        <div class="customer-info">
                            <strong>Lisa Martinez</strong>
                            <div class="text-muted">Restaurant Owner</div>
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
                        <p>"Fast turnaround, unlimited revisions, and excellent communication throughout the project. Highly recommend!"</p>
                        <div class="customer-info">
                            <strong>David Park</strong>
                            <div class="text-muted">Consulting Firm</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="service-cta py-5 bg-primary text-white">
        <div class="container text-center">
            <h3 class="display-6 fw-bold mb-3">Ready to Elevate Your Brand?</h3>
            <p class="lead mb-4">Let's create stunning designs that tell your story and captivate your audience!</p>
            <div class="cta-buttons">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-light btn-lg me-3">
                    <i class="bi bi-brush me-2"></i>
                    Start Your Project
                </a>
                <a href="tel:+1234567890" class="btn btn-outline-light btn-lg">
                    <i class="bi bi-telephone me-2"></i>
                    Discuss Your Ideas
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
                    <span class="hashtag">#GraphicDesign</span>
                    <span class="hashtag">#LogoDesign</span>
                    <span class="hashtag">#BrandDesign</span>
                    <span class="hashtag">#VisualIdentity</span>
                    <span class="hashtag">#CreativeDesign</span>
                    <span class="hashtag">#DigitalDesign</span>
                    <span class="hashtag">#PrintDesign</span>
                    <span class="hashtag">#MarketingDesign</span>
                    <span class="hashtag">#CustomDesign</span>
                    <span class="hashtag">#ProfessionalDesign</span>
                    <span class="hashtag">#DesignStudio</span>
                    <span class="hashtag">#BrandingDesign</span>
                    <span class="hashtag">#BusinessDesign</span>
                    <span class="hashtag">#StartupDesign</span>
                    <span class="hashtag">#AffordableDesign</span>
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

.process-step .step-number {
    width: 60px;
    height: 60px;
    background: #667eea;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: bold;
    margin: 0 auto 1rem;
}
</style>

<?php get_footer(); ?>
