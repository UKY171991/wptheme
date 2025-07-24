<?php
/**
 * Template Name: Contact Us
 */

get_header(); ?>

<main id="main" class="site-main">
    <!-- Hero Section -->
    <section class="section bg-primary-dark text-white">
        <div class="overlay-accent"></div>
        <div class="container">
            <div class="row align-items-center min-vh-50">
                <div class="col-lg-8 section-content">
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb bg-transparent p-0 m-0">
                            <li class="breadcrumb-item">
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-white text-decoration-none">
                                    <i class="fas fa-home me-1"></i>Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active text-accent" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                    
                    <div class="fade-in-up">
                        <h1 class="display-4 fw-bold mb-4">
                            Get in Touch
                            <span class="text-accent">We're Here to Help</span>
                        </h1>
                        <p class="lead mb-4">Ready to transform your space? Our expert team is here to help with all your home and business service needs.</p>
                        
                        <div class="row g-4 mb-5">
                            <div class="col-md-4 text-center">
                                <div class="h4 fw-bold text-accent mb-1">24/7</div>
                                <small class="text-light">Support Available</small>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="h4 fw-bold text-accent mb-1">&lt; 2hr</div>
                                <small class="text-light">Response Time</small>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="h4 fw-bold text-accent mb-1">5★</div>
                                <small class="text-light">Customer Rating</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="contact-info-card text-center h-100">
                        <div class="contact-icon mb-4">
                            <i class="fas fa-phone fa-3x text-accent"></i>
                        </div>
                        <h3 class="h4 mb-3">Call Us</h3>
                        <p class="text-muted mb-3">Ready to help 24/7</p>
                        <a href="tel:+1234567890" class="btn btn-outline-accent btn-rounded">
                            <i class="fas fa-phone me-2"></i>(123) 456-7890
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="contact-info-card text-center h-100">
                        <div class="contact-icon mb-4">
                            <i class="fas fa-envelope fa-3x text-accent"></i>
                        </div>
                        <h3 class="h4 mb-3">Email Us</h3>
                        <p class="text-muted mb-3">We'll respond within 24 hours</p>
                        <a href="mailto:hello@servicespro.com" class="btn btn-outline-accent btn-rounded">
                            <i class="fas fa-envelope me-2"></i>hello@servicespro.com
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="contact-info-card text-center h-100">
                        <div class="contact-icon mb-4">
                            <i class="fas fa-map-marker-alt fa-3x text-accent"></i>
                        </div>
                        <h3 class="h4 mb-3">Visit Us</h3>
                        <p class="text-muted mb-3">Stop by our office</p>
                        <address class="mb-3">
                            123 Service Street<br>
                            Business District<br>
                            City, State 12345
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="section bg-primary-dark text-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-heading text-center mb-5">
                        <h2 class="section-title text-white">Send Us a Message</h2>
                        <p class="section-subtitle text-light">We'll get back to you within 24 hours</p>
                    </div>
                    
                    <form class="contact-form" action="#" method="POST">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label text-white">Full Name *</label>
                                    <input type="text" class="form-control form-control-lg" id="name" name="name" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label text-white">Email Address *</label>
                                    <input type="email" class="form-control form-control-lg" id="email" name="email" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label text-white">Phone Number</label>
                                    <input type="tel" class="form-control form-control-lg" id="phone" name="phone">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="service" class="form-label text-white">Service Type</label>
                                    <select class="form-control form-control-lg" id="service" name="service">
                                        <option value="">Select a service</option>
                                        <option value="cleaning">House Cleaning</option>
                                        <option value="maintenance">Home Maintenance</option>
                                        <option value="landscaping">Landscaping</option>
                                        <option value="handyman">Handyman Services</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="message" class="form-label text-white">Message *</label>
                                    <textarea class="form-control form-control-lg" id="message" name="message" rows="5" required placeholder="Tell us about your project..."></textarea>
                                </div>
                            </div>
                            
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-accent btn-rounded btn-lg px-5">
                                    <i class="fas fa-paper-plane me-2"></i>Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="section p-0">
        <div class="map-container" style="height: 400px; background: #f8f9fa;">
            <div class="d-flex align-items-center justify-content-center h-100">
                <div class="text-center">
                    <i class="fas fa-map-marked-alt fa-4x text-accent mb-3"></i>
                    <h4 class="mb-2">Service Area Map</h4>
                    <p class="text-muted">We serve the entire metropolitan area</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-heading text-center mb-5">
                        <h2 class="section-title">Frequently Asked Questions</h2>
                        <p class="section-subtitle">Quick answers to common questions</p>
                    </div>
                    
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faq1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                                    How quickly can you respond to service requests?
                                </button>
                            </h3>
                            <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We typically respond to all inquiries within 2 hours during business hours. For emergency services, we're available 24/7 with immediate response.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faq2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                    Are you licensed and insured?
                                </button>
                            </h3>
                            <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, we are fully licensed and insured. All our technicians are bonded and covered by comprehensive liability insurance for your peace of mind.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faq3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                    Do you offer free estimates?
                                </button>
                            </h3>
                            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Absolutely! We provide free, no-obligation estimates for all our services. Contact us today to schedule your free consultation.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php echo services_pro_get_cta_section(); ?>
</main>

<?php get_footer(); ?>
