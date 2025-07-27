<?php
/**
 * Template Name: Contact Page
 * The template for displaying the contact page
 */

get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

<!-- Contact Page Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Contact Form Section -->
            <div class="col-lg-8 mb-5">
                <div class="contact-form-wrapper bg-white p-4 p-md-5 rounded shadow-sm">
                    <div class="form-header mb-4">
                        <h2 class="h3 mb-3">
                            <i class="fas fa-envelope me-3 text-primary"></i>
                            Send us a Message
                        </h2>
                        <p class="text-muted mb-0">
                            Ready to get started? Fill out the form below and we'll get back to you within 24 hours.
                        </p>
                    </div>

                    <?php
                    // Display success/error messages
                    if (isset($_GET['contact'])) {
                        if ($_GET['contact'] === 'success') {
                            echo '<div class="alert alert-success d-flex align-items-center mb-4" role="alert">
                                    <i class="fas fa-check-circle me-2"></i>
                                    <div>Thank you! Your message has been sent successfully. We\'ll get back to you soon.</div>
                                  </div>';
                        } elseif ($_GET['contact'] === 'error') {
                            echo '<div class="alert alert-danger d-flex align-items-center mb-4" role="alert">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <div>Sorry, there was an error sending your message. Please try again.</div>
                                  </div>';
                        }
                    } ?>

                    <form class="contact-form" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" method="post">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Your Name" required>
                                    <label for="contact_name">Name *</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" id="contact_email" name="contact_email" class="form-control" placeholder="Your Email" required>
                                    <label for="contact_email">Email *</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="tel" id="contact_phone" name="contact_phone" class="form-control" placeholder="Your Phone">
                                    <label for="contact_phone">Phone</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" id="contact_subject" name="contact_subject" class="form-control" placeholder="Subject" required>
                                    <label for="contact_subject">Subject *</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <select id="contact_service" name="contact_service" class="form-select">
                                <option value="">Select a service...</option>
                                <option value="house-cleaning">House Cleaning</option>
                                <option value="office-cleaning">Office Cleaning</option>
                                <option value="coaching-consulting">Coaching & Consulting</option>
                                <option value="admin-services">Office & Admin Services</option>
                                <option value="other">Other</option>
                            </select>
                            <label for="contact_service">Service Interest</label>
                        </div>
                        
                        <div class="form-floating mb-4">
                            <textarea id="contact_message" name="contact_message" class="form-control" style="height: 150px;" placeholder="Your Message" required></textarea>
                            <label for="contact_message">Message *</label>
                        </div>
                        
                        <input type="hidden" name="action" value="handle_contact_form">
                        <input type="hidden" name="contact_nonce" value="<?php echo wp_create_nonce('blueprint_folder_contact'); ?>">
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-paper-plane me-2"></i>
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Contact Information Sidebar -->
            <div class="col-lg-4">
                <div class="contact-info-wrapper">
                    <!-- Contact Details Card -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-primary text-white">
                            <h3 class="h5 mb-0">
                                <i class="fas fa-info-circle me-2"></i>
                                Contact Information
                            </h3>
                        </div>
                        <div class="card-body p-4">
                            <div class="contact-item mb-4">
                                <div class="d-flex align-items-start">
                                    <div class="contact-icon me-3 mt-1">
                                        <i class="fas fa-map-marker-alt text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Address</h6>
                                        <p class="mb-0 text-muted">
                                            123 Business Street<br>
                                            City, State 12345
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="contact-item mb-4">
                                <div class="d-flex align-items-start">
                                    <div class="contact-icon me-3 mt-1">
                                        <i class="fas fa-phone text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Phone</h6>
                                        <p class="mb-0">
                                            <a href="tel:+1234567890" class="text-decoration-none text-primary fw-semibold">
                                                (123) 456-7890
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="contact-item mb-4">
                                <div class="d-flex align-items-start">
                                    <div class="contact-icon me-3 mt-1">
                                        <i class="fas fa-envelope text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Email</h6>
                                        <p class="mb-0">
                                            <a href="mailto:info@blueprintfolder.com" class="text-decoration-none text-primary fw-semibold">
                                                info@blueprintfolder.com
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <div class="d-flex align-items-start">
                                    <div class="contact-icon me-3 mt-1">
                                        <i class="fas fa-clock text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Business Hours</h6>
                                        <p class="mb-0 text-muted">
                                            Monday - Friday<br>
                                            9:00 AM - 6:00 PM EST
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions Card -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4 text-center">
                            <h5 class="card-title mb-3">Need Immediate Help?</h5>
                            <p class="card-text text-muted mb-4">
                                For urgent matters, call us directly or schedule a consultation.
                            </p>
                            <div class="d-grid gap-2">
                                <a href="tel:+1234567890" class="btn btn-outline-primary">
                                    <i class="fas fa-phone me-2"></i>
                                    Call Now
                                </a>
                                <a href="#" class="btn btn-outline-secondary">
                                    <i class="fas fa-calendar me-2"></i>
                                    Schedule Meeting
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media Card -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <h5 class="card-title mb-3">Follow Us</h5>
                            <p class="card-text text-muted mb-4">
                                Stay connected for updates and tips
                            </p>
                            <div class="social-links d-flex justify-content-center gap-3">
                                <a href="#" class="btn btn-outline-primary btn-sm rounded-circle" style="width: 40px; height: 40px;">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="btn btn-outline-info btn-sm rounded-circle" style="width: 40px; height: 40px;">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary btn-sm rounded-circle" style="width: 40px; height: 40px;">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="btn btn-outline-danger btn-sm rounded-circle" style="width: 40px; height: 40px;">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Additional Page Content -->
<?php if (get_the_content()) : ?>
    <section class="py-4 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-content bg-white p-4 rounded shadow-sm">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- FAQ Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="text-center mb-5">
                    <h2 class="h3 mb-3">
                        <i class="fas fa-question-circle me-3 text-primary"></i>
                        Frequently Asked Questions
                    </h2>
                    <p class="text-muted lead">
                        Quick answers to common questions about our services and process
                    </p>
                </div>
                
                <div class="accordion" id="contactFAQ">
                    <div class="accordion-item border-0 mb-3 rounded shadow-sm">
                        <h3 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                How quickly do you respond to inquiries?
                            </button>
                        </h3>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#contactFAQ">
                            <div class="accordion-body">
                                We typically respond to all inquiries within 24 hours during business days. For urgent matters, please call us directly for immediate assistance.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 mb-3 rounded shadow-sm">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Do you offer free consultations?
                            </button>
                        </h3>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#contactFAQ">
                            <div class="accordion-body">
                                Yes, we offer free initial consultations to discuss your needs and how we can help. This allows us to better understand your project and provide accurate pricing.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 mb-3 rounded shadow-sm">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                What information should I include in my message?
                            </button>
                        </h3>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#contactFAQ">
                            <div class="accordion-body">
                                Please include details about your project, timeline, budget range, and any specific requirements. The more information you provide, the better we can assist you.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 mb-3 rounded shadow-sm">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                What areas do you serve?
                            </button>
                        </h3>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#contactFAQ">
                            <div class="accordion-body">
                                We serve clients locally and remotely. Many of our services can be provided virtually, while others require on-site presence. Contact us to discuss your specific location needs.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="mb-3">Ready to Get Started?</h2>
                <p class="lead mb-4">
                    Don't wait – reach out today and let's discuss how we can help you achieve your goals with our professional services.
                </p>
                <div class="d-flex flex-column flex-md-row justify-content-center gap-3">
                    <a href="tel:+1234567890" class="btn btn-light btn-lg">
                        <i class="fas fa-phone me-2"></i>
                        Call (123) 456-7890
                    </a>
                    <a href="mailto:info@blueprintfolder.com" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-envelope me-2"></i>
                        Email Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endwhile; ?>

<!-- Contact Page JavaScript and Styles -->
<script>
jQuery(document).ready(function($) {
    $('.contact-form').on('submit', function(e) {
        e.preventDefault();
        var $form = $(this);
        var $submitBtn = $form.find('button[type="submit"]');
        var originalText = $submitBtn.html();
        
        // Show loading state
        $submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Sending...').prop('disabled', true);
        
        // Remove previous messages
        $('.alert').remove();
        
        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: $form.serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $form.before('<div class="alert alert-success d-flex align-items-center mb-4" role="alert"><i class="fas fa-check-circle me-2"></i><div>' + response.data + '</div></div>');
                    $form[0].reset(); // Clear form
                } else {
                    $form.before('<div class="alert alert-danger d-flex align-items-center mb-4" role="alert"><i class="fas fa-exclamation-triangle me-2"></i><div>' + response.data + '</div></div>');
                }
            },
            error: function() {
                $form.before('<div class="alert alert-danger d-flex align-items-center mb-4" role="alert"><i class="fas fa-exclamation-triangle me-2"></i><div>Sorry, there was an error sending your message. Please try again.</div></div>');
            },
            complete: function() {
                // Reset button
                $submitBtn.html(originalText).prop('disabled', false);
                // Scroll to message
                $('html, body').animate({
                    scrollTop: $('.alert').offset().top - 100
                }, 500);
            }
        });
    });
    
    // Pre-fill service field if passed in URL
    var urlParams = new URLSearchParams(window.location.search);
    var serviceParam = urlParams.get('service');
    if (serviceParam) {
        $('#contact_subject').val('Inquiry about: ' + decodeURIComponent(serviceParam));
        $('#contact_message').val('I am interested in learning more about: ' + decodeURIComponent(serviceParam) + '\n\nPlease provide more information and a quote.\n\n');
    }
});
</script>

<style>
/* Contact Form Enhancements */
.contact-form .form-floating > .form-control:focus,
.contact-form .form-floating > .form-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}

.contact-form .btn-primary {
    background: linear-gradient(135deg, #0d6efd, #0a58ca);
    border: none;
    transition: all 0.3s ease;
    font-weight: 600;
    letter-spacing: 0.5px;
}

.contact-form .btn-primary:hover {
    background: linear-gradient(135deg, #0a58ca, #084298);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(13, 110, 253, 0.3);
}

.contact-form .btn-primary:disabled {
    opacity: 0.7;
    transform: none;
}

/* Contact Cards */
.contact-info-wrapper .card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.contact-info-wrapper .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1) !important;
}

.contact-icon i {
    font-size: 1.25rem;
}

/* Social Media Buttons */
.social-links a:hover {
    transform: translateY(-2px);
}

/* FAQ Accordion */
.accordion-button:not(.collapsed) {
    background-color: rgba(13, 110, 253, 0.1);
    border-color: rgba(13, 110, 253, 0.125);
}

.accordion-button:focus {
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}

/* Mobile Responsiveness */
@media (max-width: 768px) {
    .contact-form-wrapper {
        padding: 1.5rem !important;
    }
    
    .contact-info-wrapper .card-body {
        padding: 1.5rem !important;
    }
}
</style>

<?php get_footer(); ?>
