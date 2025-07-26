<?php
/**
 * Template Name: Enhanced Contact Page
 * Professional contact page with advanced form and features
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.1.0
 */

get_header(); ?>

<main id="main" class="site-main contact-enhanced">
    <!-- Enhanced Hero Section -->
    <section class="section bg-primary-dark text-white position-relative overflow-hidden">
        <div class="contact-pattern"></div>
        <div class="container position-relative">
            <div class="row align-items-center" style="min-height: 50vh;">
                <div class="col-lg-8 mx-auto text-center">
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb bg-transparent p-0 m-0 justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-white text-decoration-none">
                                    <i class="fas fa-home me-1"></i>Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active text-accent" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                    
                    <div class="fade-in-up">
                        <div class="badge bg-accent text-white px-4 py-3 rounded-pill mb-4 fs-6">
                            <i class="fas fa-comments me-2"></i>Get In Touch
                        </div>
                        
                        <h1 class="display-3 fw-bold mb-4">
                            Let's Start Your
                            <span class="text-accent d-block">Success Story</span>
                        </h1>
                        
                        <p class="lead mb-5 fs-4" style="max-width: 600px; margin: 0 auto;">Ready to transform your business? We're here to help you achieve your goals with our expertise and dedication.</p>
                        
                        <div class="contact-cta-buttons">
                            <a href="#contact-form" class="btn btn-accent btn-rounded btn-lg px-5 py-3 me-3">
                                <i class="fas fa-paper-plane me-2"></i>Send Message
                            </a>
                            <a href="tel:<?php echo esc_attr(get_theme_mod('company_phone', '(555) 123-4567')); ?>" class="btn btn-outline-light btn-rounded btn-lg px-5 py-3">
                                <i class="fas fa-phone me-2"></i>Call Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Info Cards -->
    <section class="section py-6" style="margin-top: -50px;">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-card">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Visit Our Office</h4>
                        <p class="text-muted mb-3">
                            <?php echo wp_kses_post(get_theme_mod('company_address', '123 Business Street<br>Suite 100<br>City, State 12345')); ?>
                        </p>
                        <a href="#" class="text-accent text-decoration-none fw-semibold">
                            <i class="fas fa-directions me-1"></i>Get Directions
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-card">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Call Us</h4>
                        <p class="text-muted mb-3">
                            Phone: <a href="tel:<?php echo esc_attr(get_theme_mod('company_phone', '(555) 123-4567')); ?>" class="text-dark"><?php echo esc_html(get_theme_mod('company_phone', '(555) 123-4567')); ?></a><br>
                            Toll-Free: <a href="tel:<?php echo esc_attr(get_theme_mod('company_toll_free', '(800) 123-4567')); ?>" class="text-dark"><?php echo esc_html(get_theme_mod('company_toll_free', '(800) 123-4567')); ?></a>
                        </p>
                        <span class="text-accent fw-semibold">
                            <i class="fas fa-clock me-1"></i>Mon-Fri 9AM-6PM
                        </span>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-card">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Email Us</h4>
                        <p class="text-muted mb-3">
                            General: <a href="mailto:<?php echo esc_attr(get_theme_mod('company_email', 'info@blueprintfolder.com')); ?>" class="text-dark"><?php echo esc_html(get_theme_mod('company_email', 'info@blueprintfolder.com')); ?></a><br>
                            Support: <a href="mailto:support@blueprintfolder.com" class="text-dark">support@blueprintfolder.com</a>
                        </p>
                        <span class="text-accent fw-semibold">
                            <i class="fas fa-reply me-1"></i>24h Response
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Contact Form -->
    <section id="contact-form" class="section bg-light py-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="contact-form-wrapper">
                        <div class="text-center mb-5">
                            <h2 class="display-5 fw-bold text-primary-dark mb-4">Send Us A Message</h2>
                            <p class="lead text-muted">Fill out the form below and we'll get back to you within 24 hours</p>
                        </div>

                        <!-- Success/Error Messages -->
                        <?php if (isset($_GET['contact'])): ?>
                            <?php if ($_GET['contact'] === 'success'): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle me-2"></i>
                                    <strong>Thank you!</strong> Your message has been sent successfully. We'll get back to you soon.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            <?php elseif ($_GET['contact'] === 'error'): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <strong>Error!</strong> There was a problem sending your message. Please try again.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <form id="enhanced-contact-form" class="contact-form" method="post" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">
                            <input type="hidden" name="action" value="contact_form">
                            <?php wp_nonce_field('blueprint_folder_contact', 'contact_nonce'); ?>
                            
                            <div class="row g-4">
                                <!-- Personal Information -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="contact_first_name" name="contact_first_name" placeholder="First Name" required>
                                        <label for="contact_first_name"><i class="fas fa-user me-2"></i>First Name *</label>
                                        <div class="invalid-feedback">Please provide your first name.</div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="contact_last_name" name="contact_last_name" placeholder="Last Name" required>
                                        <label for="contact_last_name"><i class="fas fa-user me-2"></i>Last Name *</label>
                                        <div class="invalid-feedback">Please provide your last name.</div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="contact_email" name="contact_email" placeholder="Email" required>
                                        <label for="contact_email"><i class="fas fa-envelope me-2"></i>Email Address *</label>
                                        <div class="invalid-feedback">Please provide a valid email address.</div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control" id="contact_phone" name="contact_phone" placeholder="Phone">
                                        <label for="contact_phone"><i class="fas fa-phone me-2"></i>Phone Number</label>
                                    </div>
                                </div>
                                
                                <!-- Company Information -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="contact_company" name="contact_company" placeholder="Company">
                                        <label for="contact_company"><i class="fas fa-building me-2"></i>Company Name</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="contact_budget" name="contact_budget">
                                            <option value="">Select Budget Range</option>
                                            <option value="under-5k">Under $5,000</option>
                                            <option value="5k-10k">$5,000 - $10,000</option>
                                            <option value="10k-25k">$10,000 - $25,000</option>
                                            <option value="25k-50k">$25,000 - $50,000</option>
                                            <option value="50k-plus">$50,000+</option>
                                        </select>
                                        <label for="contact_budget"><i class="fas fa-dollar-sign me-2"></i>Project Budget</label>
                                    </div>
                                </div>
                                
                                <!-- Service Interest -->
                                <div class="col-12">
                                    <label class="form-label fw-semibold mb-3">
                                        <i class="fas fa-cogs me-2"></i>Services of Interest (Check all that apply)
                                    </label>
                                    <div class="service-checkboxes row g-3">
                                        <div class="col-md-6">
                                            <div class="form-check service-check">
                                                <input class="form-check-input" type="checkbox" name="services[]" value="web-development" id="service-web">
                                                <label class="form-check-label" for="service-web">
                                                    <i class="fas fa-code me-2"></i>Web Development
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check service-check">
                                                <input class="form-check-input" type="checkbox" name="services[]" value="digital-marketing" id="service-marketing">
                                                <label class="form-check-label" for="service-marketing">
                                                    <i class="fas fa-bullhorn me-2"></i>Digital Marketing
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check service-check">
                                                <input class="form-check-input" type="checkbox" name="services[]" value="consulting" id="service-consulting">
                                                <label class="form-check-label" for="service-consulting">
                                                    <i class="fas fa-chart-line me-2"></i>Business Consulting
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check service-check">
                                                <input class="form-check-input" type="checkbox" name="services[]" value="design" id="service-design">
                                                <label class="form-check-label" for="service-design">
                                                    <i class="fas fa-palette me-2"></i>Graphic Design
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Project Details -->
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="contact_subject" name="contact_subject" placeholder="Subject" required>
                                        <label for="contact_subject"><i class="fas fa-tag me-2"></i>Subject *</label>
                                        <div class="invalid-feedback">Please provide a subject.</div>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="contact_message" name="contact_message" placeholder="Message" style="height: 150px" required></textarea>
                                        <label for="contact_message"><i class="fas fa-comment me-2"></i>Project Details *</label>
                                        <div class="invalid-feedback">Please provide project details.</div>
                                    </div>
                                </div>
                                
                                <!-- Timeline -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="contact_timeline" name="contact_timeline">
                                            <option value="">Select Timeline</option>
                                            <option value="asap">ASAP</option>
                                            <option value="1-month">Within 1 Month</option>
                                            <option value="3-months">Within 3 Months</option>
                                            <option value="6-months">Within 6 Months</option>
                                            <option value="planning">Just Planning</option>
                                        </select>
                                        <label for="contact_timeline"><i class="fas fa-calendar me-2"></i>Project Timeline</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="contact_source" name="contact_source">
                                            <option value="">How did you find us?</option>
                                            <option value="google">Google Search</option>
                                            <option value="referral">Referral</option>
                                            <option value="social">Social Media</option>
                                            <option value="advertising">Online Advertising</option>
                                            <option value="other">Other</option>
                                        </select>
                                        <label for="contact_source"><i class="fas fa-search me-2"></i>How did you find us?</label>
                                    </div>
                                </div>
                                
                                <!-- Privacy Consent -->
                                <div class="col-12">
                                    <div class="form-check privacy-check">
                                        <input class="form-check-input" type="checkbox" id="privacy_consent" name="privacy_consent" required>
                                        <label class="form-check-label" for="privacy_consent">
                                            I agree to the <a href="#" class="text-accent">Privacy Policy</a> and consent to being contacted about my inquiry *
                                        </label>
                                        <div class="invalid-feedback">You must agree to the privacy policy.</div>
                                    </div>
                                </div>
                                
                                <!-- Submit Button -->
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-accent btn-rounded btn-lg px-5 py-3">
                                        <span class="btn-text">
                                            <i class="fas fa-paper-plane me-2"></i>Send Message
                                        </span>
                                        <span class="btn-loading d-none">
                                            <i class="fas fa-spinner fa-spin me-2"></i>Sending...
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section py-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="text-center mb-5">
                        <h2 class="display-5 fw-bold text-primary-dark mb-4">Frequently Asked Questions</h2>
                        <p class="lead text-muted">Quick answers to common questions</p>
                    </div>
                    
                    <div class="accordion contact-faq" id="contactFAQ">
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    How quickly do you respond to inquiries?
                                </button>
                            </h3>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#contactFAQ">
                                <div class="accordion-body">
                                    We typically respond to all inquiries within 24 hours during business days. For urgent matters, please call us directly.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Do you offer free consultations?
                                </button>
                            </h3>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#contactFAQ">
                                <div class="accordion-body">
                                    Yes! We offer a free 30-minute consultation to discuss your project and determine how we can help you achieve your goals.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    What information should I include in my message?
                                </button>
                            </h3>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#contactFAQ">
                                <div class="accordion-body">
                                    Please include details about your project goals, timeline, budget range, and any specific requirements. The more information you provide, the better we can assist you.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
