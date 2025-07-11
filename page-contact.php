<?php
/**
 * Template Name: Contact Page
 * Description: Contact page template with contact form and information
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>

                <div class="entry-content">
                    <?php the_content(); ?>
                    
                    <div class="contact-section">
                        <div class="contact-row">
                            <div class="contact-form-column">
                                <h2>Send us a Message</h2>
                                <form id="contact-form" class="contact-form" method="post" action="">
                                    <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                                    
                                    <div class="form-group">
                                        <label for="contact-name">Full Name *</label>
                                        <input type="text" id="contact-name" name="contact_name" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="contact-email">Email Address *</label>
                                        <input type="email" id="contact-email" name="contact_email" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="contact-phone">Phone Number</label>
                                        <input type="tel" id="contact-phone" name="contact_phone">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="contact-subject">Subject *</label>
                                        <input type="text" id="contact-subject" name="contact_subject" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="contact-message">Message *</label>
                                        <textarea id="contact-message" name="contact_message" rows="6" required></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <button type="submit" name="submit_contact" class="btn btn-primary">Send Message</button>
                                    </div>
                                </form>
                                
                                <?php
                                // Handle form submission
                                if (isset($_POST['submit_contact']) && wp_verify_nonce($_POST['contact_nonce'], 'contact_form_nonce')) {
                                    $name = sanitize_text_field($_POST['contact_name']);
                                    $email = sanitize_email($_POST['contact_email']);
                                    $phone = sanitize_text_field($_POST['contact_phone']);
                                    $subject = sanitize_text_field($_POST['contact_subject']);
                                    $message = sanitize_textarea_field($_POST['contact_message']);
                                    
                                    $to = get_option('admin_email');
                                    $email_subject = 'Contact Form: ' . $subject;
                                    $email_message = "Name: $name\n";
                                    $email_message .= "Email: $email\n";
                                    $email_message .= "Phone: $phone\n\n";
                                    $email_message .= "Message:\n$message";
                                    
                                    $headers = array('Content-Type: text/html; charset=UTF-8');
                                    
                                    if (wp_mail($to, $email_subject, $email_message, $headers)) {
                                        echo '<div class="success-message">Thank you! Your message has been sent successfully.</div>';
                                    } else {
                                        echo '<div class="error-message">Sorry, there was an error sending your message. Please try again.</div>';
                                    }
                                }
                                ?>
                            </div>
                            
                            <div class="contact-info-column">
                                <h2>Get in Touch</h2>
                                
                                <div class="contact-info">
                                    <div class="contact-item">
                                        <h3>Address</h3>
                                        <p>
                                            123 Business Street<br>
                                            City, State 12345<br>
                                            United States
                                        </p>
                                    </div>
                                    
                                    <div class="contact-item">
                                        <h3>Phone</h3>
                                        <p><a href="tel:+1234567890">(123) 456-7890</a></p>
                                    </div>
                                    
                                    <div class="contact-item">
                                        <h3>Email</h3>
                                        <p><a href="mailto:info@yourwebsite.com">info@yourwebsite.com</a></p>
                                    </div>
                                    
                                    <div class="contact-item">
                                        <h3>Business Hours</h3>
                                        <p>
                                            Monday - Friday: 9:00 AM - 6:00 PM<br>
                                            Saturday: 10:00 AM - 4:00 PM<br>
                                            Sunday: Closed
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="social-links">
                                    <h3>Follow Us</h3>
                                    <div class="social-icons">
                                        <a href="#" class="social-link" aria-label="Facebook">📘</a>
                                        <a href="#" class="social-link" aria-label="Twitter">🐦</a>
                                        <a href="#" class="social-link" aria-label="LinkedIn">💼</a>
                                        <a href="#" class="social-link" aria-label="Instagram">📷</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>