<?php
/**
 * Template Name: Contact Page
 * 
 * Enhanced contact page with modern design and improved user experience
 */

get_header();
?>

<div class="contact-page-wrapper">
    <!-- Hero Section -->
    <section class="contact-hero py-5 bg-gradient-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="hero-content text-white">
                        <div class="hero-badge mb-3">
                            <span class="badge bg-white text-primary px-3 py-2 rounded-pill fs-6">
                                <i class="bi bi-envelope-heart me-2"></i>
                                <?php esc_html_e('Contact Us', 'blueprint'); ?>
                            </span>
                        </div>
                        <h1 class="display-4 fw-bold mb-4">
                            <?php esc_html_e('Get in Touch', 'blueprint'); ?>
                        </h1>
                        <p class="lead mb-4">
                            <?php esc_html_e('Have questions about our business blueprints? Need help choosing the right one for your entrepreneurial journey? Our team is here to help you succeed.', 'blueprint'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Information and Form -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Contact Information -->
                <div class="col-lg-5">
                    <div class="row g-4">
                        <!-- Phone -->
                        <div class="col-12">
                            <div class="contact-info-card text-center">
                                <div class="contact-icon">
                                    <i class="bi bi-telephone-fill"></i>
                                </div>
                                <h4 class="fw-bold mb-2"><?php esc_html_e('Phone', 'blueprint'); ?></h4>
                                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_mod('contact_phone', '+1 (555) 123-4567'))); ?>" class="text-decoration-none text-primary fw-semibold">
                                    <?php echo esc_html(get_theme_mod('contact_phone', '+1 (555) 123-4567')); ?>
                                </a>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-12">
                            <div class="contact-info-card text-center">
                                <div class="contact-icon">
                                    <i class="bi bi-envelope-fill"></i>
                                </div>
                                <h4 class="fw-bold mb-2"><?php esc_html_e('Email', 'blueprint'); ?></h4>
                                <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'info@blueprintfolder.com')); ?>" class="text-decoration-none text-primary fw-semibold">
                                    <?php echo esc_html(get_theme_mod('contact_email', 'info@blueprintfolder.com')); ?>
                                </a>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="col-12">
                            <div class="contact-info-card text-center">
                                <div class="contact-icon">
                                    <i class="bi bi-geo-alt-fill"></i>
                                </div>
                                <h4 class="fw-bold mb-2"><?php esc_html_e('Address', 'blueprint'); ?></h4>
                                <address class="mb-0 text-muted">
                                    <?php echo esc_html(get_theme_mod('contact_address', '123 Business Street, Enterprise City')); ?>
                                </address>
                            </div>
                        </div>

                        <!-- Business Hours -->
                        <div class="col-12">
                            <div class="contact-info-card text-center">
                                <div class="contact-icon">
                                    <i class="bi bi-clock-fill"></i>
                                </div>
                                <h4 class="fw-bold mb-2"><?php esc_html_e('Business Hours', 'blueprint'); ?></h4>
                                <div class="text-muted">
                                    <p class="mb-1"><?php esc_html_e('Monday - Friday: 9AM - 6PM EST', 'blueprint'); ?></p>
                                    <p class="mb-0"><?php esc_html_e('Saturday: 10AM - 2PM EST', 'blueprint'); ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- Social Connect -->
                        <div class="col-12">
                            <div class="contact-info-card text-center">
                                <h4 class="fw-bold mb-3"><?php esc_html_e('Connect With Us', 'blueprint'); ?></h4>
                                <div class="d-flex justify-content-center gap-3">
                                    <a href="#" class="btn btn-outline-primary btn-sm rounded-circle" style="width: 40px; height: 40px;" aria-label="Facebook">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-primary btn-sm rounded-circle" style="width: 40px; height: 40px;" aria-label="Instagram">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-primary btn-sm rounded-circle" style="width: 40px; height: 40px;" aria-label="Twitter">
                                        <i class="bi bi-twitter"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-primary btn-sm rounded-circle" style="width: 40px; height: 40px;" aria-label="LinkedIn">
                                        <i class="bi bi-linkedin"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-7">
                    <div class="contact-form">
                        <h2 class="h3 fw-bold mb-3"><?php esc_html_e('Send Us a Message', 'blueprint'); ?></h2>
                        <p class="text-muted mb-4"><?php esc_html_e('Fill out the form below and we\'ll get back to you as soon as possible.', 'blueprint'); ?></p>
                        
                        <form id="contact-form" class="needs-validation" method="post" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" novalidate>
                            <div class="row g-3">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label for="contact-name" class="form-label"><?php esc_html_e('Name', 'blueprint'); ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="contact-name" name="contact_name" required>
                                    <div class="invalid-feedback">
                                        <?php esc_html_e('Please provide your name.', 'blueprint'); ?>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label for="contact-email" class="form-label"><?php esc_html_e('Email', 'blueprint'); ?> <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="contact-email" name="contact_email" required>
                                    <div class="invalid-feedback">
                                        <?php esc_html_e('Please provide a valid email address.', 'blueprint'); ?>
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6">
                                    <label for="contact-phone" class="form-label"><?php esc_html_e('Phone (optional)', 'blueprint'); ?></label>
                                    <input type="tel" class="form-control" id="contact-phone" name="contact_phone">
                                </div>

                                <!-- Subject -->
                                <div class="col-md-6">
                                    <label for="contact-subject" class="form-label"><?php esc_html_e('Subject', 'blueprint'); ?> <span class="text-danger">*</span></label>
                                    <select class="form-select" id="contact-subject" name="contact_subject" required>
                                        <option value=""><?php esc_html_e('Choose a subject...', 'blueprint'); ?></option>
                                        <option value="general"><?php esc_html_e('General Inquiry', 'blueprint'); ?></option>
                                        <option value="blueprint"><?php esc_html_e('Business Blueprint Question', 'blueprint'); ?></option>
                                        <option value="support"><?php esc_html_e('Support Request', 'blueprint'); ?></option>
                                        <option value="partnership"><?php esc_html_e('Partnership Opportunity', 'blueprint'); ?></option>
                                        <option value="consultation"><?php esc_html_e('Consultation Request', 'blueprint'); ?></option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php esc_html_e('Please select a subject.', 'blueprint'); ?>
                                    </div>
                                </div>

                                <!-- Message -->
                                <div class="col-12">
                                    <label for="contact-message" class="form-label"><?php esc_html_e('Message', 'blueprint'); ?> <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="contact-message" name="contact_message" rows="6" required placeholder="<?php esc_attr_e('Please describe how we can help you...', 'blueprint'); ?>"></textarea>
                                    <div class="invalid-feedback">
                                        <?php esc_html_e('Please provide your message.', 'blueprint'); ?>
                                    </div>
                                </div>

                                <!-- Privacy Policy -->
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="privacy-check" name="privacy_check" required>
                                        <label class="form-check-label" for="privacy-check">
                                            <?php esc_html_e('I agree to the', 'blueprint'); ?> 
                                            <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" class="text-primary"><?php esc_html_e('Privacy Policy', 'blueprint'); ?></a> 
                                            <?php esc_html_e('and consent to the processing of my data.', 'blueprint'); ?>
                                        </label>
                                        <div class="invalid-feedback">
                                            <?php esc_html_e('You must agree to the privacy policy.', 'blueprint'); ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg px-4 py-2">
                                        <i class="bi bi-send me-2"></i>
                                        <?php esc_html_e('Send Message', 'blueprint'); ?>
                                    </button>
                                    <div id="form-messages" class="mt-3"></div>
                                </div>
                            </div>

                            <?php wp_nonce_field('contact_form_submit', 'contact_nonce'); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center mb-4"><?php esc_html_e('Find Us', 'blueprint'); ?></h2>
                    <div class="map-container border-radius-custom overflow-hidden shadow-custom" style="height: 400px; background: #e2e8f0;">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <div class="text-center text-muted">
                                <i class="bi bi-geo-alt display-4 mb-3"></i>
                                <h5><?php esc_html_e('Interactive Map', 'blueprint'); ?></h5>
                                <p><?php esc_html_e('Map integration coming soon', 'blueprint'); ?></p>
                            </div>
                        </div>
                        <!-- You can replace this placeholder with actual map integration -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-center mb-5"><?php esc_html_e('Frequently Asked Questions', 'blueprint'); ?></h2>
                    
                    <div class="accordion" id="contactFAQ">
                        <!-- FAQ Item 1 -->
                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h3 class="accordion-header" id="faq1">
                                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                    <?php esc_html_e('How do I choose the right business blueprint?', 'blueprint'); ?>
                                </button>
                            </h3>
                            <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="faq1" data-bs-parent="#contactFAQ">
                                <div class="accordion-body text-muted">
                                    <?php esc_html_e('We recommend starting with our business category pages to explore options that match your interests and budget. Each blueprint includes detailed information about startup costs, profit potential, and required skills. You can also schedule a consultation with our team for personalized guidance.', 'blueprint'); ?>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h3 class="accordion-header" id="faq2">
                                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                    <?php esc_html_e('What\'s included in a business blueprint?', 'blueprint'); ?>
                                </button>
                            </h3>
                            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#contactFAQ">
                                <div class="accordion-body text-muted">
                                    <?php esc_html_e('Each blueprint includes a comprehensive business plan, startup cost analysis, profit projections, step-by-step implementation guide, marketing strategies, supplier recommendations, legal requirements, and ongoing support resources.', 'blueprint'); ?>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h3 class="accordion-header" id="faq3">
                                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                    <?php esc_html_e('How long does it take to implement a blueprint?', 'blueprint'); ?>
                                </button>
                            </h3>
                            <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#contactFAQ">
                                <div class="accordion-body text-muted">
                                    <?php esc_html_e('Implementation timelines vary by business type. Simple online businesses can be launched in 2-4 weeks, while more complex operations may take 2-3 months. Each blueprint includes a detailed timeline with milestones to help you track your progress.', 'blueprint'); ?>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 4 -->
                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h3 class="accordion-header" id="faq4">
                                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                    <?php esc_html_e('Do you offer ongoing support after purchase?', 'blueprint'); ?>
                                </button>
                            </h3>
                            <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="faq4" data-bs-parent="#contactFAQ">
                                <div class="accordion-body text-muted">
                                    <?php esc_html_e('Yes! All blueprints include 30 days of email support. We also offer premium support packages for entrepreneurs who want more hands-on guidance, including monthly coaching calls and priority assistance.', 'blueprint'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Contact Form JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form validation
    const form = document.getElementById('contact-form');
    const messageDiv = document.getElementById('form-messages');
    
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        event.stopPropagation();
        
        if (form.checkValidity()) {
            // Show loading state
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Sending...';
            submitBtn.disabled = true;
            
            // Simulate form submission (replace with actual AJAX call)
            setTimeout(function() {
                messageDiv.innerHTML = '<div class="alert alert-success"><i class="bi bi-check-circle me-2"></i>Thank you! Your message has been sent successfully. We\'ll get back to you soon.</div>';
                form.reset();
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                form.classList.remove('was-validated');
            }, 2000);
        }
        
        form.classList.add('was-validated');
    });
});
</script>

<?php get_footer(); ?>
