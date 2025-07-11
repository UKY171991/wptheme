<?php
/**
 * Template Name: Contact Page
 * Description: Contact page template for PartyPro Rentals with event booking form
 */

get_header(); ?>

<!-- Contact Hero Section -->
<section class="contact-hero-section">
    <div class="contact-hero-bg"></div>
    <div class="container">
        <div class="contact-hero-content">
            <div class="contact-hero-badge">📞 Contact Us</div>
            <h1 class="contact-hero-title">Let's Plan Your <span class="gradient-text">Perfect Event</span></h1>
            <p class="contact-hero-subtitle">Get a free quote today! Our party rental experts are ready to help you create an unforgettable celebration.</p>
        </div>
    </div>
</section>

<main id="main" class="site-main">
    <div class="container">
        <div class="contact-section">
            <div class="contact-row">
                <div class="contact-form-column">
                    <div class="form-header">
                        <h2>🎉 Get Your Free Event Quote</h2>
                        <p>Tell us about your event and we'll provide a custom quote within 24 hours</p>
                    </div>
                    
                    <form id="contact-form" class="contact-form enhanced-form" method="post" action="">
                        <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                        
                        <div class="form-row">
                            <div class="form-group half">
                                <label for="contact-name">Full Name *</label>
                                <input type="text" id="contact-name" name="contact_name" required>
                            </div>
                            
                            <div class="form-group half">
                                <label for="contact-email">Email Address *</label>
                                <input type="email" id="contact-email" name="contact_email" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group half">
                                <label for="contact-phone">Phone Number *</label>
                                <input type="tel" id="contact-phone" name="contact_phone" required>
                            </div>
                            
                            <div class="form-group half">
                                <label for="event-date">Event Date</label>
                                <input type="date" id="event-date" name="event_date">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group half">
                                <label for="event-type">Event Type *</label>
                                <select id="event-type" name="event_type" required>
                                    <option value="">Select Event Type</option>
                                    <option value="wedding">Wedding</option>
                                    <option value="birthday">Birthday Party</option>
                                    <option value="corporate">Corporate Event</option>
                                    <option value="graduation">Graduation Party</option>
                                    <option value="anniversary">Anniversary</option>
                                    <option value="baby-shower">Baby Shower</option>
                                    <option value="quinceañera">Quinceañera</option>
                                    <option value="family-reunion">Family Reunion</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            
                            <div class="form-group half">
                                <label for="guest-count">Expected Guests</label>
                                <select id="guest-count" name="guest_count">
                                    <option value="">Select Guest Count</option>
                                    <option value="1-25">1-25 guests</option>
                                    <option value="26-50">26-50 guests</option>
                                    <option value="51-100">51-100 guests</option>
                                    <option value="101-150">101-150 guests</option>
                                    <option value="151-200">151-200 guests</option>
                                    <option value="200+">200+ guests</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="services-needed">Services/Items Needed</label>
                                <div class="checkbox-group">
                                    <label class="checkbox-item">
                                        <input type="checkbox" name="services[]" value="tables-chairs">
                                        <span class="checkmark"></span>
                                        Tables & Chairs
                                    </label>
                                    <label class="checkbox-item">
                                        <input type="checkbox" name="services[]" value="tents">
                                        <span class="checkmark"></span>
                                        Tents & Canopies
                                    </label>
                                    <label class="checkbox-item">
                                        <input type="checkbox" name="services[]" value="entertainment">
                                        <span class="checkmark"></span>
                                        Entertainment
                                    </label>
                                    <label class="checkbox-item">
                                        <input type="checkbox" name="services[]" value="lighting">
                                        <span class="checkmark"></span>
                                        Event Lighting
                                    </label>
                                    <label class="checkbox-item">
                                        <input type="checkbox" name="services[]" value="audio-visual">
                                        <span class="checkmark"></span>
                                        Audio/Visual
                                    </label>
                                    <label class="checkbox-item">
                                        <input type="checkbox" name="services[]" value="setup-breakdown">
                                        <span class="checkmark"></span>
                                        Setup & Breakdown
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-message">Event Details & Special Requests</label>
                            <textarea id="contact-message" name="contact_message" rows="6" placeholder="Tell us about your event vision, venue details, special requirements, or any questions you have..."></textarea>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" name="submit_contact" class="btn btn-primary enhanced-btn">
                                <span>Get My Free Quote</span>
                                <i class="btn-icon">🎉</i>
                            </button>
                        </div>
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
                        $services = isset($_POST['services']) ? array_map('sanitize_text_field', $_POST['services']) : array();
                        $message = sanitize_textarea_field($_POST['contact_message']);
                        
                        $to = get_option('admin_email');
                        $email_subject = 'New Event Quote Request - ' . $event_type;
                        $email_message = "New event quote request:\n\n";
                        $email_message .= "Name: $name\n";
                        $email_message .= "Email: $email\n";
                        $email_message .= "Phone: $phone\n";
                        $email_message .= "Event Date: $event_date\n";
                        $email_message .= "Event Type: $event_type\n";
                        $email_message .= "Guest Count: $guest_count\n";
                        $email_message .= "Services Needed: " . implode(', ', $services) . "\n\n";
                        $email_message .= "Event Details:\n$message";
                        
                        $headers = array('Content-Type: text/html; charset=UTF-8');
                        
                        if (wp_mail($to, $email_subject, $email_message, $headers)) {
                            echo '<div class="success-message">🎉 Thank you! Your quote request has been sent. We\'ll contact you within 24 hours with a custom quote for your event.</div>';
                        } else {
                            echo '<div class="error-message">Sorry, there was an error sending your request. Please try calling us directly or try again.</div>';
                        }
                    }
                    ?>
                </div>
                
                <div class="contact-info-column">
                    <div class="contact-info-card">
                        <h2>🎪 PartyPro Rentals</h2>
                        <p class="company-tagline">Making your special events unforgettable since 2010</p>
                        
                        <div class="contact-info">
                            <div class="contact-item">
                                <div class="contact-icon">📍</div>
                                <div class="contact-details">
                                    <h4>Visit Our Showroom</h4>
                                    <p>
                                        <?php echo esc_html(get_theme_mod('contact_address', '123 Party Street, Event City, EC 12345')); ?>
                                    </p>
                                    <a href="#" class="map-link">Get Directions →</a>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <div class="contact-icon">📞</div>
                                <div class="contact-details">
                                    <h4>Call or Text</h4>
                                    <p><a href="tel:<?php echo esc_attr(str_replace([' ', '-', '(', ')'], '', get_theme_mod('contact_phone', '+919876543210'))); ?>"><?php echo esc_html(get_theme_mod('contact_phone', '+91 98765 43210')); ?></a></p>
                                    <a href="https://wa.me/<?php echo esc_attr(str_replace(['+', ' ', '-', '(', ')'], '', get_theme_mod('contact_phone', '919876543210'))); ?>" class="whatsapp-link">💬 WhatsApp Us</a>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <div class="contact-icon">✉️</div>
                                <div class="contact-details">
                                    <h4>Email Us</h4>
                                    <p><a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'info@partyprorentals.com')); ?>"><?php echo esc_html(get_theme_mod('contact_email', 'info@partyprorentals.com')); ?></a></p>
                                    <small>We respond within 4 hours</small>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <div class="contact-icon">🕐</div>
                                <div class="contact-details">
                                    <h4>Business Hours</h4>
                                    <div class="hours-list">
                                        <div class="hours-row">
                                            <span>Monday - Friday</span>
                                            <span>8:00 AM - 8:00 PM</span>
                                        </div>
                                        <div class="hours-row">
                                            <span>Saturday</span>
                                            <span>9:00 AM - 6:00 PM</span>
                                        </div>
                                        <div class="hours-row">
                                            <span>Sunday</span>
                                            <span>10:00 AM - 4:00 PM</span>
                                        </div>
                                    </div>
                                    <small class="emergency-note">Emergency support available 24/7</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="quick-actions">
                            <h3>Quick Actions</h3>
                            <div class="action-buttons">
                                <a href="tel:<?php echo esc_attr(str_replace([' ', '-', '(', ')'], '', get_theme_mod('contact_phone', '+919876543210'))); ?>" class="action-btn call-btn">
                                    📞 Call Now
                                </a>
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="action-btn services-btn">
                                    🎪 Browse Rentals
                                </a>
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('pricing'))); ?>" class="action-btn pricing-btn">
                                    💰 View Packages
                                </a>
                            </div>
                        </div>
                        
                        <div class="social-links">
                            <h3>Follow Our Events</h3>
                            <div class="social-icons">
                                <a href="#" class="social-link facebook" aria-label="Facebook">📘 Facebook</a>
                                <a href="#" class="social-link instagram" aria-label="Instagram">📷 Instagram</a>
                                <a href="#" class="social-link google" aria-label="Google Reviews">⭐ Reviews</a>
                            </div>
                        </div>
                        
                        <div class="trust-indicators">
                            <div class="trust-item">
                                <span class="trust-icon">🛡️</span>
                                <span>Licensed & Insured</span>
                            </div>
                            <div class="trust-item">
                                <span class="trust-icon">⭐</span>
                                <span>5-Star Rated Service</span>
                            </div>
                            <div class="trust-item">
                                <span class="trust-icon">📋</span>
                                <span>Free Event Planning</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
.contact-hero-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 4rem 0 2rem;
    color: white;
    text-align: center;
    position: relative;
}

.contact-hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="party" patternUnits="userSpaceOnUse" width="20" height="20"><circle cx="10" cy="10" r="2" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23party)"/></svg>');
}

.contact-hero-content {
    position: relative;
    z-index: 2;
}

.contact-hero-badge {
    display: inline-block;
    background: rgba(255,255,255,0.2);
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-size: 0.9rem;
    margin-bottom: 1rem;
}

.contact-hero-title {
    font-size: 3rem;
    font-weight: bold;
    margin-bottom: 1rem;
}

.contact-hero-subtitle {
    font-size: 1.2rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
}

.contact-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    margin-top: 4rem;
}

.contact-form-column {
    background: white;
    padding: 3rem;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.form-header {
    text-align: center;
    margin-bottom: 2rem;
}

.form-header h2 {
    color: #333;
    margin-bottom: 0.5rem;
}

.enhanced-form .form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
    margin-bottom: 1rem;
}

.enhanced-form .form-group {
    margin-bottom: 1.5rem;
}

.enhanced-form .form-group.half {
    margin-bottom: 0;
}

.enhanced-form label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: #333;
}

.enhanced-form input,
.enhanced-form select,
.enhanced-form textarea {
    width: 100%;
    padding: 12px;
    border: 2px solid #e1e5e9;
    border-radius: 10px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

.enhanced-form input:focus,
.enhanced-form select:focus,
.enhanced-form textarea:focus {
    outline: none;
    border-color: #667eea;
}

.checkbox-group {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 0.5rem;
}

.checkbox-item {
    display: flex;
    align-items: center;
    padding: 0.5rem;
    cursor: pointer;
}

.checkbox-item input[type="checkbox"] {
    width: auto;
    margin-right: 0.5rem;
}

.enhanced-btn {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    padding: 1rem 2rem;
    border-radius: 50px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: transform 0.3s ease;
    width: 100%;
}

.enhanced-btn:hover {
    transform: translateY(-2px);
}

.contact-info-card {
    background: #f8f9fa;
    padding: 3rem;
    border-radius: 20px;
    height: fit-content;
}

.contact-info-card h2 {
    color: #333;
    margin-bottom: 0.5rem;
}

.company-tagline {
    color: #666;
    margin-bottom: 2rem;
    font-style: italic;
}

.contact-item {
    display: flex;
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid #e1e5e9;
}

.contact-icon {
    font-size: 1.5rem;
    margin-right: 1rem;
    flex-shrink: 0;
}

.contact-details h4 {
    margin-bottom: 0.5rem;
    color: #333;
}

.hours-list {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.hours-row {
    display: flex;
    justify-content: space-between;
    font-size: 0.9rem;
}

.emergency-note {
    color: #667eea;
    font-weight: 600;
    margin-top: 0.5rem;
}

.quick-actions {
    margin: 2rem 0;
}

.action-buttons {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.action-btn {
    display: block;
    padding: 0.75rem;
    text-align: center;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.call-btn {
    background: #25d366;
    color: white;
}

.services-btn {
    background: #667eea;
    color: white;
}

.pricing-btn {
    background: #f1c40f;
    color: #333;
}

.action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.social-icons {
    display: flex;
    gap: 1rem;
}

.social-link {
    display: block;
    padding: 0.5rem 1rem;
    background: white;
    border-radius: 25px;
    text-decoration: none;
    color: #333;
    font-size: 0.9rem;
    transition: transform 0.3s ease;
}

.social-link:hover {
    transform: translateY(-2px);
}

.trust-indicators {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 1px solid #e1e5e9;
}

.trust-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9rem;
    color: #666;
}

.success-message {
    background: #d4edda;
    color: #155724;
    padding: 1rem;
    border-radius: 10px;
    margin: 1rem 0;
    border: 1px solid #c3e6cb;
}

.error-message {
    background: #f8d7da;
    color: #721c24;
    padding: 1rem;
    border-radius: 10px;
    margin: 1rem 0;
    border: 1px solid #f5c6cb;
}

@media (max-width: 768px) {
    .contact-row {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .enhanced-form .form-row {
        grid-template-columns: 1fr;
    }
    
    .contact-hero-title {
        font-size: 2rem;
    }
    
    .checkbox-group {
        grid-template-columns: 1fr;
    }
}
</style>

<?php get_footer(); ?>