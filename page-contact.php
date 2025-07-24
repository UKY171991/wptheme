<?php
/*
Template Name: Enhanced Contact Page
*/
get_header(); ?>

<div class="enhanced-contact-page">
    <!-- Modern Hero Banner -->
    <section class="modern-hero contact-hero">
        <div class="hero-background">
            <div class="hero-overlay"></div>
            <div class="hero-particles"></div>
        </div>
        
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fas fa-comments"></i>
                    Let's Connect
                </div>
                
                <h1 class="hero-title">
                    Get in <span class="title-highlight">Touch</span>
                </h1>
                
                <p class="hero-description">
                    Ready to transform your space? Our expert team is here to help with all your home and business service needs. Let's discuss your project today.
                </p>
                
                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Support Available</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">< 2hr</div>
                        <div class="stat-label">Response Time</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">5★</div>
                        <div class="stat-label">Customer Rating</div>
                    </div>
                </div>
                
                <div class="hero-buttons">
                    <a href="#contact-form" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i>
                        Send Message
                    </a>
                    <a href="tel:+1234567890" class="btn btn-secondary">
                        <i class="fas fa-phone"></i>
                        Call Now
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Contact Section -->
    <section class="contact-main">
        <div class="container">
            <div class="contact-grid">
                <!-- Contact Form -->
                <div class="contact-form-section">
                    <div class="section-header">
                        <h2>Send Us a Message</h2>
                        <p>Ready to get started? Fill out the form below and we'll get back to you within 24 hours.</p>
                    </div>
                    
                    <form id="contactForm" class="enhanced-contact-form" method="post" action="#">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Full Name *</label>
                                <input type="text" id="name" name="name" required>
                                <span class="form-icon"><i class="fas fa-user"></i></span>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email Address *</label>
                                <input type="email" id="email" name="email" required>
                                <span class="form-icon"><i class="fas fa-envelope"></i></span>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone">
                                <span class="form-icon"><i class="fas fa-phone"></i></span>
                            </div>
                            
                            <div class="form-group">
                                <label for="service">Service Needed</label>
                                <select id="service" name="service">
                                    <option value="">Select a service...</option>
                                    <option value="house-cleaning">House Cleaning</option>
                                    <option value="pressure-washing">Pressure Washing</option>
                                    <option value="gutter-cleaning">Gutter Cleaning</option>
                                    <option value="window-cleaning">Window Cleaning</option>
                                    <option value="lawn-care">Lawn Care</option>
                                    <option value="handyman">Handyman Services</option>
                                    <option value="pet-services">Pet Services</option>
                                    <option value="moving-help">Moving Assistance</option>
                                    <option value="other">Other Services</option>
                                </select>
                                <span class="form-icon"><i class="fas fa-tools"></i></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="subject">Subject *</label>
                            <select id="subject" name="subject" required>
                                <option value="">How can we help you?</option>
                                <option value="quote">Get a Free Quote</option>
                                <option value="booking">Schedule Service</option>
                                <option value="question">Ask a Question</option>
                                <option value="partnership">Business Partnership</option>
                                <option value="complaint">Feedback/Complaint</option>
                                <option value="other">Other Inquiry</option>
                            </select>
                            <span class="form-icon"><i class="fas fa-comment-alt"></i></span>
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Tell us about your project *</label>
                            <textarea id="message" name="message" rows="6" placeholder="Please describe your project, preferred timing, property size, specific requirements, or any questions you have..." required></textarea>
                        </div>
                        
                        <div class="form-group checkbox-group">
                            <label class="checkbox-label">
                                <input type="checkbox" id="newsletter" name="newsletter">
                                <span class="checkmark"></span>
                                <span class="checkbox-text">Subscribe to our newsletter for tips and special offers</span>
                            </label>
                        </div>
                        
                        <button type="submit" class="submit-btn">
                            <span class="btn-text">Send Message</span>
                            <span class="btn-icon"><i class="fas fa-paper-plane"></i></span>
                        </button>
                        
                        <div class="form-note">
                            <i class="fas fa-shield-alt"></i>
                            Your information is secure and will never be shared with third parties.
                        </div>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="contact-info-section">
                    <div class="section-header">
                        <h2>Get In Touch</h2>
                        <p>Multiple ways to reach us. Choose what works best for you.</p>
                    </div>
                    
                    <div class="contact-methods">
                        <div class="contact-item priority">
                            <div class="contact-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="contact-content">
                                <h3>Call Us Now</h3>
                                <p><a href="tel:+1234567890">(123) 456-7890</a></p>
                                <span class="availability">Available 7 days a week</span>
                                <div class="contact-hours">
                                    <small>Mon-Fri: 7AM-8PM | Weekends: 8AM-6PM</small>
                                </div>
                            </div>
                            <div class="contact-badge">
                                <span>Fast Response</span>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-content">
                                <h3>Email Us</h3>
                                <p><a href="mailto:hello@servicesbusiness.com">hello@servicesbusiness.com</a></p>
                                <span class="availability">Response within 2 hours</span>
                                <div class="contact-hours">
                                    <small>Perfect for detailed project discussions</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-comments"></i>
                            </div>
                            <div class="contact-content">
                                <h3>Live Chat</h3>
                                <p>Chat with our team instantly</p>
                                <span class="availability">Available during business hours</span>
                                <div class="contact-hours">
                                    <small>Quick answers to simple questions</small>
                                </div>
                            </div>
                            <button class="chat-btn" onclick="openChat()">
                                <i class="fas fa-comment"></i> Start Chat
                            </button>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-content">
                                <h3>Visit Our Office</h3>
                                <p>123 Business Street<br>Suite 100<br>Your City, ST 12345</p>
                                <span class="availability">By appointment only</span>
                                <div class="contact-hours">
                                    <small>Perfect for large project consultations</small>
                                </div>
                            </div>
                            <a href="https://maps.google.com" class="directions-btn" target="_blank">
                                <i class="fas fa-directions"></i> Get Directions
                            </a>
                        </div>
                    </div>
                    
                    <!-- Emergency Contact -->
                    <div class="emergency-contact">
                        <div class="emergency-header">
                            <i class="fas fa-exclamation-triangle"></i>
                            <h3>Emergency Services</h3>
                        </div>
                        <p>Need urgent help? Call our 24/7 emergency line:</p>
                        <a href="tel:+1234567891" class="emergency-number">(123) 456-7891</a>
                        <small>Additional charges may apply for after-hours service</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Areas Map -->
    <section class="service-areas-map">
        <div class="container">
            <div class="section-header text-center">
                <h2>Service Areas</h2>
                <p>We proudly serve the greater metropolitan area and surrounding communities</p>
            </div>
            
            <div class="map-container">
                <div class="map-placeholder">
                    <div class="map-content">
                        <i class="fas fa-map-marked-alt"></i>
                        <h3>Interactive Service Area Map</h3>
                        <p>Click on any area to learn more about our services in your neighborhood</p>
                        <button class="map-btn">View Full Map</button>
                    </div>
                </div>
                
                <div class="service-areas-grid">
                    <div class="area-card">
                        <div class="area-icon">
                            <i class="fas fa-city"></i>
                        </div>
                        <h4>Downtown Core</h4>
                        <p>City center and business district</p>
                        <ul>
                            <li>Same-day service available</li>
                            <li>Premium location coverage</li>
                            <li>Extended hours available</li>
                        </ul>
                        <span class="coverage-badge">Full Coverage</span>
                    </div>
                    
                    <div class="area-card">
                        <div class="area-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h4>Residential Areas</h4>
                        <p>Suburban neighborhoods and communities</p>
                        <ul>
                            <li>Regular service schedules</li>
                            <li>Family-friendly services</li>
                            <li>Neighborhood discounts</li>
                        </ul>
                        <span class="coverage-badge">Full Coverage</span>
                    </div>
                    
                    <div class="area-card">
                        <div class="area-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <h4>Commercial Districts</h4>
                        <p>Office parks and retail centers</p>
                        <ul>
                            <li>Business hour flexibility</li>
                            <li>Corporate contracts available</li>
                            <li>Bulk service discounts</li>
                        </ul>
                        <span class="coverage-badge">Full Coverage</span>
                    </div>
                    
                    <div class="area-card">
                        <div class="area-icon">
                            <i class="fas fa-mountain"></i>
                        </div>
                        <h4>Outlying Areas</h4>
                        <p>Rural and extended metropolitan areas</p>
                        <ul>
                            <li>Special trip scheduling</li>
                            <li>Minimum service requirements</li>
                            <li>Travel fee may apply</li>
                        </ul>
                        <span class="coverage-badge limited">Limited Coverage</span>
                    </div>
                </div>
                
                <div class="coverage-note">
                    <div class="note-content">
                        <i class="fas fa-info-circle"></i>
                        <div>
                            <h4>Don't see your area?</h4>
                            <p>We're constantly expanding our service areas. <a href="tel:+1234567890">Give us a call</a> to check if we can service your location or to get on our expansion waitlist.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="section-header text-center">
                <h2>Frequently Asked Questions</h2>
                <p>Quick answers to common questions about our services</p>
            </div>
            
            <div class="faq-grid">
                <div class="faq-category">
                    <h3><i class="fas fa-clock"></i> Scheduling & Timing</h3>
                    <div class="faq-list">
                        <div class="faq-item">
                            <div class="faq-question">
                                <h4>How quickly can you start my project?</h4>
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Most projects can be scheduled within 24-48 hours. Emergency services are available same-day for urgent situations with additional fees.</p>
                            </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-question">
                                <h4>Do you work on weekends?</h4>
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Yes! We offer weekend services at no additional charge. Weekend slots fill up quickly, so we recommend booking in advance.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="faq-category">
                    <h3><i class="fas fa-dollar-sign"></i> Pricing & Payment</h3>
                    <div class="faq-list">
                        <div class="faq-item">
                            <div class="faq-question">
                                <h4>How do you calculate pricing?</h4>
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Pricing depends on service type, property size, and specific requirements. We provide free, detailed quotes for all services with no hidden fees.</p>
                            </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-question">
                                <h4>What payment methods do you accept?</h4>
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="faq-answer">
                                <p>We accept cash, check, all major credit cards, PayPal, and Venmo. Payment is due upon completion unless other arrangements are made.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="faq-category">
                    <h3><i class="fas fa-shield-alt"></i> Insurance & Safety</h3>
                    <div class="faq-list">
                        <div class="faq-item">
                            <div class="faq-question">
                                <h4>Are you licensed and insured?</h4>
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Yes, we are fully licensed, bonded, and insured. We carry comprehensive liability insurance and can provide certificates upon request.</p>
                            </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-question">
                                <h4>What if something gets damaged?</h4>
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Our insurance covers accidental damage. We'll work with you and our insurance provider to resolve any issues quickly and fairly.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <div class="section-header text-center">
                <h2>What Our Customers Say</h2>
                <p>Real reviews from satisfied customers in your community</p>
            </div>
            
            <div class="testimonials-grid">
                <div class="testimonial-card featured">
                    <div class="testimonial-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="rating-text">5.0</span>
                    </div>
                    <blockquote>
                        "Absolutely amazing service! They transformed our dirty gutters and pressure washed our entire house. The team was professional, punctual, and went above and beyond our expectations."
                    </blockquote>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <h4>Sarah Johnson</h4>
                            <p>Homeowner, Oakville</p>
                            <span class="service-type">House Cleaning & Pressure Washing</span>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="rating-text">5.0</span>
                    </div>
                    <blockquote>
                        "Quick response for our moving day. The team helped us load and unload efficiently. Highly recommend for anyone needing moving assistance!"
                    </blockquote>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <h4>Mike Chen</h4>
                            <p>Resident, Downtown</p>
                            <span class="service-type">Moving Assistance</span>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="rating-text">5.0</span>
                    </div>
                    <blockquote>
                        "Regular dog walking service has been a lifesaver. My dog loves the walker and I love the GPS tracking and photo updates!"
                    </blockquote>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <h4>Lisa Rodriguez</h4>
                            <p>Pet Owner, Suburbs</p>
                            <span class="service-type">Pet Services</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="testimonials-stats">
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Happy Customers</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">4.9</div>
                    <div class="stat-label">Average Rating</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">98%</div>
                    <div class="stat-label">Would Recommend</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">24hr</div>
                    <div class="stat-label">Avg Response Time</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="contact-cta">
        <div class="container">
            <div class="cta-content">
                <div class="cta-text">
                    <h2>Ready to Get Started?</h2>
                    <p>Join hundreds of satisfied customers who trust us with their home and business needs. Get your free quote today!</p>
                </div>
                <div class="cta-buttons">
                    <a href="tel:+1234567890" class="btn btn-primary">
                        <i class="fas fa-phone"></i>
                        Call Now
                    </a>
                    <a href="#contact-form" class="btn btn-secondary">
                        <i class="fas fa-form"></i>
                        Get Free Quote
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
// Enhanced Contact Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Form handling
    const form = document.getElementById('contactForm');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(form);
            const name = formData.get('name').trim();
            const email = formData.get('email').trim();
            const subject = formData.get('subject');
            const message = formData.get('message').trim();
            
            // Validation
            if (!name || !email || !subject || !message) {
                showNotification('Please fill in all required fields.', 'error');
                return;
            }
            
            if (!isValidEmail(email)) {
                showNotification('Please enter a valid email address.', 'error');
                return;
            }
            
            // Show loading state
            const submitBtn = form.querySelector('.submit-btn');
            const originalText = submitBtn.querySelector('.btn-text').textContent;
            
            submitBtn.classList.add('loading');
            submitBtn.querySelector('.btn-text').textContent = 'Sending...';
            submitBtn.disabled = true;
            
            // Simulate form submission
            setTimeout(function() {
                submitBtn.classList.remove('loading');
                submitBtn.classList.add('success');
                submitBtn.querySelector('.btn-text').textContent = 'Message Sent!';
                
                showNotification('Thank you! Your message has been sent successfully. We\'ll get back to you within 24 hours.', 'success');
                
                // Reset form after success
                setTimeout(function() {
                    form.reset();
                    submitBtn.classList.remove('success');
                    submitBtn.querySelector('.btn-text').textContent = originalText;
                    submitBtn.disabled = false;
                }, 3000);
            }, 2000);
        });
    }
    
    // FAQ Accordion
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        question.addEventListener('click', function() {
            const isActive = item.classList.contains('active');
            
            // Close all other FAQ items
            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                }
            });
            
            // Toggle current item
            item.classList.toggle('active', !isActive);
        });
    });
    
    // Smooth scrolling for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Form field animations
    const formGroups = document.querySelectorAll('.form-group');
    formGroups.forEach(group => {
        const input = group.querySelector('input, select, textarea');
        if (input) {
            input.addEventListener('focus', function() {
                group.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                if (!this.value) {
                    group.classList.remove('focused');
                }
            });
            
            // Check if field has value on load
            if (input.value) {
                group.classList.add('focused');
            }
        }
    });
    
    // Live chat simulation
    window.openChat = function() {
        showNotification('Chat feature coming soon! For immediate assistance, please call us at (123) 456-7890', 'info');
    };
    
    // Map interaction simulation
    const mapBtn = document.querySelector('.map-btn');
    if (mapBtn) {
        mapBtn.addEventListener('click', function() {
            showNotification('Interactive map opening... This would integrate with Google Maps or similar service.', 'info');
        });
    }
});

// Utility functions
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function showNotification(message, type = 'info') {
    // Remove existing notifications
    const existingNotifications = document.querySelectorAll('.notification');
    existingNotifications.forEach(notification => notification.remove());
    
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <div class="notification-icon">
                <i class="fas ${getNotificationIcon(type)}"></i>
            </div>
            <div class="notification-message">${message}</div>
            <button class="notification-close">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
    
    // Add to page
    document.body.appendChild(notification);
    
    // Show notification
    setTimeout(() => notification.classList.add('show'), 100);
    
    // Auto hide after 5 seconds
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => notification.remove(), 300);
    }, 5000);
    
    // Close button functionality
    notification.querySelector('.notification-close').addEventListener('click', function() {
        notification.classList.remove('show');
        setTimeout(() => notification.remove(), 300);
    });
}

function getNotificationIcon(type) {
    switch(type) {
        case 'success': return 'fa-check-circle';
        case 'error': return 'fa-exclamation-circle';
        case 'warning': return 'fa-exclamation-triangle';
        default: return 'fa-info-circle';
    }
}
</script>

<?php get_footer(); ?>
