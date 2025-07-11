<?php get_header(); ?>

<div class="content-section">
    <div class="container">
        <h1 class="section-title">Contact Us</h1>
        <p class="section-subtitle">Ready to make your event unforgettable? Get in touch with us today!</p>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; margin-top: 3rem;">
            
            <!-- Contact Form -->
            <div class="contact-form-section">
                <h3>Send Us a Message</h3>
                <form class="contact-form" method="post" action="">
                    <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                    
                    <div class="form-group">
                        <label for="contact_name">Your Name *</label>
                        <input type="text" id="contact_name" name="contact_name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="contact_email">Email Address *</label>
                        <input type="email" id="contact_email" name="contact_email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="contact_phone">Phone Number *</label>
                        <input type="tel" id="contact_phone" name="contact_phone" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="event_date">Event Date</label>
                        <input type="date" id="event_date" name="event_date">
                    </div>
                    
                    <div class="form-group">
                        <label for="event_type">Event Type</label>
                        <select id="event_type" name="event_type">
                            <option value="">Select Event Type</option>
                            <option value="wedding">Wedding</option>
                            <option value="birthday">Birthday Party</option>
                            <option value="corporate">Corporate Event</option>
                            <option value="anniversary">Anniversary</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="guest_count">Number of Guests</label>
                        <input type="number" id="guest_count" name="guest_count" min="10" max="500">
                    </div>
                    
                    <div class="form-group">
                        <label for="contact_message">Message</label>
                        <textarea id="contact_message" name="contact_message" rows="5" placeholder="Tell us about your event requirements..."></textarea>
                    </div>
                    
                    <button type="submit" name="submit_contact" class="btn btn-primary">Send Message</button>
                </form>
                
                <?php
                // Handle form submission
                if (isset($_POST['submit_contact']) && wp_verify_nonce($_POST['contact_nonce'], 'contact_form_nonce')) {
                    $name = sanitize_text_field($_POST['contact_name']);
                    $email = sanitize_email($_POST['contact_email']);
                    $phone = sanitize_text_field($_POST['contact_phone']);
                    $event_date = sanitize_text_field($_POST['event_date']);
                    $event_type = sanitize_text_field($_POST['event_type']);
                    $guest_count = sanitize_text_field($_POST['guest_count']);
                    $message = sanitize_textarea_field($_POST['contact_message']);
                    
                    $to = get_option('admin_email');
                    $subject = 'New Contact Form Submission - ' . get_bloginfo('name');
                    $body = "Name: $name\n";
                    $body .= "Email: $email\n";
                    $body .= "Phone: $phone\n";
                    $body .= "Event Date: $event_date\n";
                    $body .= "Event Type: $event_type\n";
                    $body .= "Guest Count: $guest_count\n";
                    $body .= "Message: $message\n";
                    
                    $headers = array('Content-Type: text/html; charset=UTF-8');
                    
                    if (wp_mail($to, $subject, nl2br($body), $headers)) {
                        echo '<div class="success-message">Thank you! Your message has been sent successfully. We\'ll get back to you soon!</div>';
                    } else {
                        echo '<div class="error-message">Sorry, there was an error sending your message. Please try again or call us directly.</div>';
                    }
                }
                ?>
            </div>
            
            <!-- Contact Information -->
            <div class="contact-info-section">
                <h3>Get in Touch</h3>
                
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h4>Phone</h4>
                            <p><?php echo esc_html(get_theme_mod('contact_phone', '+91 98765 43210')); ?></p>
                            <a href="tel:<?php echo esc_attr(get_theme_mod('contact_phone', '+91 98765 43210')); ?>" class="btn btn-secondary">Call Now</a>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fab fa-whatsapp"></i>
                        <div>
                            <h4>WhatsApp</h4>
                            <p>Quick responses on WhatsApp</p>
                            <a href="https://wa.me/<?php echo esc_attr(str_replace(['+', ' ', '-'], '', get_theme_mod('contact_phone', '919876543210'))); ?>" class="btn btn-secondary">WhatsApp Us</a>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>Email</h4>
                            <p><?php echo esc_html(get_theme_mod('contact_email', 'info@partyprorentals.com')); ?></p>
                            <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'info@partyprorentals.com')); ?>" class="btn btn-secondary">Send Email</a>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>Address</h4>
                            <p><?php echo esc_html(get_theme_mod('contact_address', '123 Party Street, Your City')); ?></p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h4>Business Hours</h4>
                            <p>Monday - Sunday<br>8:00 AM - 8:00 PM</p>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Price Calculator -->
                <div class="price-calculator mt-4">
                    <h4>Quick Price Estimate</h4>
                    <p>Get a rough estimate for your event:</p>
                    
                    <div class="calculator-form">
                        <div class="form-group">
                            <label for="calc_guests">Number of Guests:</label>
                            <input type="number" id="calc_guests" min="10" max="500" value="50">
                        </div>
                        
                        <div class="form-group">
                            <label for="calc_hours">Event Duration (hours):</label>
                            <input type="number" id="calc_hours" min="4" max="24" value="8">
                        </div>
                        
                        <div class="form-group">
                            <label>Additional Services:</label>
                            <label><input type="checkbox" class="price-extras" value="5000"> Bounce House (+₹5,000)</label>
                            <label><input type="checkbox" class="price-extras" value="3000"> Premium Lighting (+₹3,000)</label>
                            <label><input type="checkbox" class="price-extras" value="4000"> Decorations (+₹4,000)</label>
                        </div>
                        
                        <div class="estimated-price">
                            <h4>Estimated Price: <span id="calculated-price">₹15,000</span></h4>
                            <p><em>*This is a rough estimate. Final pricing may vary based on specific requirements.</em></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.contact-form-section, .contact-info-section {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: bold;
    color: #333;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 12px;
    border: 2px solid #ddd;
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #667eea;
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.contact-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
}

.contact-item i {
    font-size: 1.5rem;
    color: #667eea;
    margin-top: 0.5rem;
}

.contact-item h4 {
    margin-bottom: 0.5rem;
    color: #333;
}

.contact-item p {
    color: #666;
    margin-bottom: 1rem;
}

.success-message {
    background: #d4edda;
    color: #155724;
    padding: 1rem;
    border-radius: 8px;
    margin-top: 1rem;
    border: 1px solid #c3e6cb;
}

.error-message {
    background: #f8d7da;
    color: #721c24;
    padding: 1rem;
    border-radius: 8px;
    margin-top: 1rem;
    border: 1px solid #f5c6cb;
}

.price-calculator {
    background: #f8f9fa;
    padding: 1.5rem;
    border-radius: 10px;
    margin-top: 2rem;
}

.calculator-form .form-group {
    margin-bottom: 1rem;
}

.price-extras {
    width: auto;
    margin-right: 0.5rem;
}

.estimated-price {
    background: #667eea;
    color: white;
    padding: 1rem;
    border-radius: 8px;
    text-align: center;
    margin-top: 1rem;
}

.estimated-price h4 {
    margin-bottom: 0.5rem;
}

.estimated-price em {
    font-size: 0.9rem;
    opacity: 0.9;
}

@media (max-width: 768px) {
    .container > div:first-child {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
}
</style>

<script>
jQuery(document).ready(function($) {
    // Price calculator
    $('#calc_guests, #calc_hours, .price-extras').on('change input', function() {
        var guests = parseInt($('#calc_guests').val()) || 50;
        var hours = parseInt($('#calc_hours').val()) || 8;
        var basePrice = 15000;
        var extras = 0;
        
        $('.price-extras:checked').each(function() {
            extras += parseInt($(this).val()) || 0;
        });
        
        var guestMultiplier = Math.ceil(guests / 50);
        var hourMultiplier = hours > 8 ? 1 + ((hours - 8) * 0.15) : 1;
        
        var totalPrice = (basePrice * guestMultiplier * hourMultiplier) + extras;
        
        $('#calculated-price').text('₹' + totalPrice.toLocaleString('en-IN'));
    });
});
</script>

<?php get_footer(); ?>
