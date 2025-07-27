<?php
/**
 * Template Name: Contact Page
 * The template for displaying the contact page
 */

get_header(); ?>
<?php while (have_posts()) : the_post();?>
    <!-- Contact Content -->
    <section class="section">
        <div class="container">
            <div class="row">
                <!-- Contact Form -->
                <div class="col-lg-8 mb-5">
                    <div class="contact-form-wrapper">
                        <h3 class="mb-4">Send us a Message</h3>
                        <?php
                        // Display success/error messages
                        if (isset($_GET['contact'])) {
                            if ($_GET['contact'] === 'success') {
                                echo '<div class="form-success">Thank you! Your message has been sent successfully. We\'ll get back to you soon.</div>';
} elseif ($_GET['contact'] === 'error') {
                                echo '<div class="form-error">Sorry, there was an error sending your message. Please try again.</div>';
}
}?>
                        <form class="contact-form" action="<?php echo esc_url(admin_url('admin-ajax.php'));?>" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="contact_name" class="form-label">Name *</label>
                                        <input type="text" id="contact_name" name="contact_name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="contact_email" class="form-label">Email *</label>
                                        <input type="email" id="contact_email" name="contact_email" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="contact_phone" class="form-label">Phone</label>
                                        <input type="tel" id="contact_phone" name="contact_phone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="contact_subject" class="form-label">Subject *</label>
                                        <input type="text" id="contact_subject" name="contact_subject" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="contact_service" class="form-label">Service Interest</label>
                                <select id="contact_service" name="contact_service" class="form-control">
                                    <option value="">Select a service...</option>
                                    <option value="web-development">Web Development</option>
                                    <option value="digital-marketing">Digital Marketing</option>
                                    <option value="business-consulting">Business Consulting</option>
                                    <option value="graphic-design">Graphic Design</option>
                                    <option value="technical-support">Technical Support</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="contact_message" class="form-label">Message *</label>
                                <textarea id="contact_message" name="contact_message" class="form-control" rows="6" required
                                          placeholder="Tell us about your project, goals, and how we can help..."></textarea>
                            </div>
                            <input type="hidden" name="action" value="handle_contact_form">
                            <input type="hidden" name="contact_nonce" value="<?php echo wp_create_nonce('blueprint_folder_contact');?>">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-paper-plane me-2"></i>
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
                <!-- Contact Information -->
                <div class="col-lg-4">
                    <div class="contact-info">
                        <h3 class="mb-4">Contact Information</h3>
                        <div class="contact-item mb-4">
                            <div class="d-flex align-items-center">
                                <div class="contact-icon me-3">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Address</h6>
                                    <p class="mb-0 text-muted">123 Business Street<br>City, State 12345</p>
                                </div>
                            </div>
                        </div>
                        <div class="contact-item mb-4">
                            <div class="d-flex align-items-center">
                                <div class="contact-icon me-3">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Phone</h6>
                                    <p class="mb-0 text-muted">
                                        <a href="tel:+1234567890" class="text-decoration-none">(123) 456-7890</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="contact-item mb-4">
                            <div class="d-flex align-items-center">
                                <div class="contact-icon me-3">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Email</h6>
                                    <p class="mb-0 text-muted">
                                        <a href="mailto:info@blueprintfolder.com" class="text-decoration-none">info@blueprintfolder.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="contact-item mb-4">
                            <div class="d-flex align-items-center">
                                <div class="contact-icon me-3">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Business Hours</h6>
                                    <p class="mb-0 text-muted">Monday - Friday<br>9:00 AM - 6:00 PM EST</p>
                                </div>
                            </div>
                        </div>
                        <!-- Social Links -->
                        <div class="social-links mt-4">
                            <h6 class="mb-3">Follow Us</h6>
                            <div class="d-flex gap-3">
                                <a href="#" class="text-decoration-none">
                                    <i class="fab fa-facebook-f fa-lg"></i>
                                </a>
                                <a href="#" class="text-decoration-none">
                                    <i class="fab fa-twitter fa-lg"></i>
                                </a>
                                <a href="#" class="text-decoration-none">
                                    <i class="fab fa-linkedin-in fa-lg"></i>
                                </a>
                                <a href="#" class="text-decoration-none">
                                    <i class="fab fa-instagram fa-lg"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Additional Content -->
            <?php if (get_the_content()) :?>
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="page-content">
                            <?php the_content();?>
                        </div>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </section>
    <!-- FAQ Section -->
    <section class="section bg-light-gray">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h2>Frequently Asked Questions</h2>
                        <p>Quick answers to common questions about our services and process.</p>
                    </div>
                    <div class="accordion" id="contactFAQ">
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faq1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                                    How quickly do you respond to inquiries?
                                </button>
                            </h3>
                            <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#contactFAQ">
                                <div class="accordion-body">
                                    We typically respond to all inquiries within 2-4 business hours during our business hours. For urgent matters, please call us directly.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faq2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                    Do you offer free consultations?
                                </button>
                            </h3>
                            <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#contactFAQ">
                                <div class="accordion-body">
                                    Yes! We offer a complimentary 30-minute consultation to discuss your project needs and determine how we can best help you achieve your goals.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faq3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                    What information should I include in my message?
                                </button>
                            </h3>
                            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#contactFAQ">
                                <div class="accordion-body">
                                    Please include details about your project, timeline, budget range, and any specific requirements. The more information you provide, the better we can assist you.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endwhile;?>
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
        $('.form-success, .form-error').remove();
        $.ajax( {
            url: $form.attr('action'),
            type: 'POST',
            data: $form.serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $form.before('<div class="alert alert-success form-success"><i class="fas fa-check-circle me-2"></i>' + response.data + '</div>');
                    $form[0].reset(); // Clear form
} else {
                    $form.before('<div class="alert alert-danger form-error"><i class="fas fa-exclamation-triangle me-2"></i>' + response.data + '</div>');
}
},
            error: function() {
                $form.before('<div class="alert alert-danger form-error"><i class="fas fa-exclamation-triangle me-2"></i>Sorry, there was an error sending your message. Please try again.</div>');
},
            complete: function() {
                // Reset button
                $submitBtn.html(originalText).prop('disabled', false);
                // Scroll to message
                $('html, body').animate( {
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
.form-success, .form-error {
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 8px;
    font-weight: 500;
}
.form-success {
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    color: #155724;
}
.form-error {
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    color: #721c24;
}
.contact-form .form-control:focus {
    border-color: #3498db;
    box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
}
.contact-form .btn-primary {
    background: linear-gradient(135deg, #3498db, #2980b9);
    border: none;
    transition: all 0.3s ease;
}
.contact-form .btn-primary:hover {
    background: linear-gradient(135deg, #2980b9, #1f4e79);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
}
.contact-form .btn-primary:disabled {
    opacity: 0.7;
    transform: none;
}
</style>
<?php get_footer(); ?>
