<?php
/**
 * Template Name: Contact Page
 * 
 * A modern, responsive contact page template with form validation and map integration.
 */

get_header();
?>

<div class="page-header">
    <div class="container">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <div class="breadcrumbs">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> <span class="separator">/</span> <span class="current"><?php the_title(); ?></span>
        </div>
    </div>
</div>

<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-info-card">
                    <h2>Get in Touch</h2>
                    <p class="contact-intro">Have questions about our business blueprints? Need help choosing the right one for your entrepreneurial journey? Our team is here to help you succeed.</p>
                    
                    <div class="contact-info-list">
                        <div class="contact-info-item">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                            </div>
                            <div class="content">
                                <h4>Phone</h4>
                                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_mod('contact_phone', '+1 (555) 123-4567'))); ?>">
                                    <?php echo esc_html(get_theme_mod('contact_phone', '+1 (555) 123-4567')); ?>
                                </a>
                            </div>
                        </div>
                        
                        <div class="contact-info-item">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            </div>
                            <div class="content">
                                <h4>Email</h4>
                                <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'info@blueprintfolder.com')); ?>">
                                    <?php echo esc_html(get_theme_mod('contact_email', 'info@blueprintfolder.com')); ?>
                                </a>
                            </div>
                        </div>
                        
                        <div class="contact-info-item">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            </div>
                            <div class="content">
                                <h4>Address</h4>
                                <address><?php echo esc_html(get_theme_mod('contact_address', '123 Business Street, Enterprise City')); ?></address>
                            </div>
                        </div>
                        
                        <div class="contact-info-item">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            </div>
                            <div class="content">
                                <h4>Business Hours</h4>
                                <p>Monday - Friday: 9AM - 6PM EST<br>Saturday: 10AM - 2PM EST</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="social-connect">
                        <h4>Connect With Us</h4>
                        <div class="social-links">
                            <a href="#" class="social-link" aria-label="Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                            </a>
                            <a href="#" class="social-link" aria-label="Instagram">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </a>
                            <a href="#" class="social-link" aria-label="Twitter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                            </a>
                            <a href="#" class="social-link" aria-label="LinkedIn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="contact-form-card">
                    <h2>Send Us a Message</h2>
                    <p>Fill out the form below and we'll get back to you as soon as possible.</p>
                    
                    <form id="contact-form" class="contact-form" method="post">
                        <div class="form-group">
                            <label for="name" class="required-field">Name</label>
                            <input type="text" id="name" name="name" required aria-required="true">
                            <div class="form-error" id="name-error"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="required-field">Email</label>
                            <input type="email" id="email" name="email" required aria-required="true">
                            <div class="form-error" id="email-error"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Phone (optional)</label>
                            <input type="tel" id="phone" name="phone">
                            <div class="form-error" id="phone-error"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="subject" class="required-field">Subject</label>
                            <select id="subject" name="subject" required aria-required="true">
                                <option value="">Select a subject</option>
                                <option value="General Inquiry">General Inquiry</option>
                                <option value="Blueprint Question">Blueprint Question</option>
                                <option value="Pricing Information">Pricing Information</option>
                                <option value="Support Request">Support Request</option>
                                <option value="Partnership Opportunity">Partnership Opportunity</option>
                            </select>
                            <div class="form-error" id="subject-error"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="message" class="required-field">Message</label>
                            <textarea id="message" name="message" rows="5" required aria-required="true"></textarea>
                            <div class="form-error" id="message-error"></div>
                        </div>
                        
                        <div class="form-group form-checkbox">
                            <input type="checkbox" id="privacy" name="privacy" required aria-required="true">
                            <label for="privacy" class="required-field">I agree to the <a href="#">Privacy Policy</a> and consent to the processing of my data.</label>
                            <div class="form-error" id="privacy-error"></div>
                        </div>
                        
                        <div class="form-submit">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                            <div class="form-status"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="map-section">
    <div class="container">
        <h2 class="section-title">Find Us</h2>
        <div class="map-container">
            <!-- Replace with your Google Maps API key and location -->
            <div class="google-map" id="google-map" data-lat="40.7128" data-lng="-74.0060" data-zoom="14"></div>
        </div>
    </div>
</section>

<section class="faq-section">
    <div class="container">
        <h2 class="section-title">Frequently Asked Questions</h2>
        <div class="faq-grid">
            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <h4>How do I choose the right business blueprint?</h4>
                    <span class="faq-toggle">+</span>
                </button>
                <div class="faq-answer">
                    <p>We recommend starting with our business category pages to explore options that match your interests and budget. Each blueprint includes detailed information about startup costs, profit potential, and required skills. You can also schedule a consultation with our team for personalized guidance.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <h4>What's included in a business blueprint?</h4>
                    <span class="faq-toggle">+</span>
                </button>
                <div class="faq-answer">
                    <p>Each blueprint includes a comprehensive business plan, startup cost analysis, profit projections, step-by-step implementation guide, marketing strategies, supplier recommendations, legal requirements, and ongoing support resources.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <h4>How long does it take to implement a blueprint?</h4>
                    <span class="faq-toggle">+</span>
                </button>
                <div class="faq-answer">
                    <p>Implementation timelines vary by business type. Simple online businesses can be launched in 2-4 weeks, while more complex operations may take 2-3 months. Each blueprint includes a detailed timeline with milestones to help you track your progress.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <h4>Do you offer ongoing support after purchase?</h4>
                    <span class="faq-toggle">+</span>
                </button>
                <div class="faq-answer">
                    <p>Yes! All blueprints include 30 days of email support. We also offer premium support packages for entrepreneurs who want more hands-on guidance, including monthly coaching calls and priority assistance.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form validation
    const contactForm = document.getElementById('contact-form');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Reset errors
            const errorElements = document.querySelectorAll('.form-error');
            errorElements.forEach(element => {
                element.textContent = '';
            });
            
            // Validate fields
            let isValid = true;
            
            // Name validation
            const nameInput = document.getElementById('name');
            if (!nameInput.value.trim()) {
                document.getElementById('name-error').textContent = 'Please enter your name';
                isValid = false;
            }
            
            // Email validation
            const emailInput = document.getElementById('email');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailInput.value.trim()) {
                document.getElementById('email-error').textContent = 'Please enter your email';
                isValid = false;
            } else if (!emailRegex.test(emailInput.value.trim())) {
                document.getElementById('email-error').textContent = 'Please enter a valid email address';
                isValid = false;
            }
            
            // Phone validation (optional)
            const phoneInput = document.getElementById('phone');
            if (phoneInput.value.trim()) {
                const phoneRegex = /^[+]?[(]?[0-9]{3}[)]?[-\s.]?[0-9]{3}[-\s.]?[0-9]{4,6}$/;
                if (!phoneRegex.test(phoneInput.value.trim())) {
                    document.getElementById('phone-error').textContent = 'Please enter a valid phone number';
                    isValid = false;
                }
            }
            
            // Subject validation
            const subjectInput = document.getElementById('subject');
            if (!subjectInput.value) {
                document.getElementById('subject-error').textContent = 'Please select a subject';
                isValid = false;
            }
            
            // Message validation
            const messageInput = document.getElementById('message');
            if (!messageInput.value.trim()) {
                document.getElementById('message-error').textContent = 'Please enter your message';
                isValid = false;
            } else if (messageInput.value.trim().length < 10) {
                document.getElementById('message-error').textContent = 'Your message is too short';
                isValid = false;
            }
            
            // Privacy checkbox validation
            const privacyInput = document.getElementById('privacy');
            if (!privacyInput.checked) {
                document.getElementById('privacy-error').textContent = 'You must agree to the privacy policy';
                isValid = false;
            }
            
            // If form is valid, submit it
            if (isValid) {
                const formStatus = contactForm.querySelector('.form-status');
                formStatus.textContent = 'Sending your message...';
                formStatus.classList.add('sending');
                
                // Simulate form submission (replace with actual AJAX submission)
                setTimeout(function() {
                    formStatus.textContent = 'Your message has been sent successfully!';
                    formStatus.classList.remove('sending');
                    formStatus.classList.add('success');
                    contactForm.reset();
                    
                    // Reset success message after 5 seconds
                    setTimeout(function() {
                        formStatus.textContent = '';
                        formStatus.classList.remove('success');
                    }, 5000);
                }, 1500);
                
                // Uncomment for actual form submission
                /*
                const formData = new FormData(contactForm);
                
                fetch(contactForm.action, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        formStatus.textContent = 'Your message has been sent successfully!';
                        formStatus.classList.remove('sending');
                        formStatus.classList.add('success');
                        contactForm.reset();
                    } else {
                        formStatus.textContent = data.message || 'There was an error sending your message. Please try again.';
                        formStatus.classList.remove('sending');
                        formStatus.classList.add('error');
                    }
                })
                .catch(error => {
                    formStatus.textContent = 'There was an error sending your message. Please try again.';
                    formStatus.classList.remove('sending');
                    formStatus.classList.add('error');
                    console.error('Error:', error);
                });
                */
            }
        });
    }
    
    // FAQ accordion
    const faqQuestions = document.querySelectorAll('.faq-question');
    
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const faqItem = this.parentElement;
            const answer = this.nextElementSibling;
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            
            // Close all other FAQs
            faqQuestions.forEach(q => {
                if (q !== this) {
                    q.setAttribute('aria-expanded', 'false');
                    q.nextElementSibling.style.maxHeight = '0';
                    q.parentElement.classList.remove('active');
                }
            });
            
            // Toggle current FAQ
            this.setAttribute('aria-expanded', !isExpanded);
            
            if (!isExpanded) {
                answer.style.maxHeight = answer.scrollHeight + 'px';
                faqItem.classList.add('active');
            } else {
                answer.style.maxHeight = '0';
                faqItem.classList.remove('active');
            }
        });
    });
    
    // Initialize Google Map
    function initMap() {
        const mapElement = document.getElementById('google-map');
        
        if (mapElement) {
            const lat = parseFloat(mapElement.dataset.lat);
            const lng = parseFloat(mapElement.dataset.lng);
            const zoom = parseInt(mapElement.dataset.zoom);
            
            // Check if Google Maps API is loaded
            if (typeof google !== 'undefined' && typeof google.maps !== 'undefined') {
                const mapOptions = {
                    center: { lat: lat, lng: lng },
                    zoom: zoom,
                    styles: [
                        {
                            "featureType": "administrative",
                            "elementType": "labels.text.fill",
                            "stylers": [{"color": "#444444"}]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "all",
                            "stylers": [{"color": "#f2f2f2"}]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "all",
                            "stylers": [{"visibility": "off"}]
                        },
                        {
                            "featureType": "road",
                            "elementType": "all",
                            "stylers": [{"saturation": -100}, {"lightness": 45}]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "all",
                            "stylers": [{"visibility": "simplified"}]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "labels.icon",
                            "stylers": [{"visibility": "off"}]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "all",
                            "stylers": [{"visibility": "off"}]
                        },
                        {
                            "featureType": "water",
                            "elementType": "all",
                            "stylers": [{"color": "#4361ee"}, {"visibility": "on"}]
                        }
                    ]
                };
                
                const map = new google.maps.Map(mapElement, mapOptions);
                
                const marker = new google.maps.Marker({
                    position: { lat: lat, lng: lng },
                    map: map,
                    title: 'Our Location',
                    animation: google.maps.Animation.DROP
                });
                
                const infoWindow = new google.maps.InfoWindow({
                    content: '<div class="map-info-window"><h4>Blueprint Headquarters</h4><p><?php echo esc_html(get_theme_mod('contact_address', '123 Business Street, Enterprise City')); ?></p></div>'
                });
                
                marker.addListener('click', function() {
                    infoWindow.open(map, marker);
                });
            } else {
                // Fallback if Google Maps API is not loaded
                mapElement.innerHTML = '<div class="map-fallback"><p>Map loading failed. Please refresh the page or try again later.</p></div>';
            }
        }
    }
    
    // Load Google Maps API
    function loadGoogleMapsAPI() {
        const mapElement = document.getElementById('google-map');
        
        if (mapElement && typeof google === 'undefined') {
            const script = document.createElement('script');
            script.src = 'https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap';
            script.async = true;
            script.defer = true;
            
            // Add callback to window object
            window.initMap = initMap;
            
            document.head.appendChild(script);
        } else if (mapElement && typeof google !== 'undefined') {
            // If API is already loaded
            initMap();
        }
    }
    
    // Load map when user scrolls near it (lazy loading)
    const mapObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                loadGoogleMapsAPI();
                mapObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    
    const mapSection = document.querySelector('.map-section');
    if (mapSection) {
        mapObserver.observe(mapSection);
    }
});
</script>

<style>
/* Contact page specific styles */
.page-header {
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    color: white;
    padding: 3rem 0;
    text-align: center;
    margin-bottom: 3rem;
}

.page-title {
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.breadcrumbs {
    color: rgba(255, 255, 255, 0.8);
}

.breadcrumbs a {
    color: white;
    text-decoration: none;
}

.breadcrumbs .separator {
    margin: 0 0.5rem;
}

.contact-section {
    padding: 3rem 0;
}

.contact-info-card,
.contact-form-card {
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
    padding: 2rem;
    height: 100%;
}

.contact-info-card h2,
.contact-form-card h2 {
    margin-bottom: 1rem;
    color: var(--gray-900);
}

.contact-intro {
    margin-bottom: 2rem;
    color: var(--gray-700);
}

.contact-info-list {
    margin-bottom: 2rem;
}

.contact-info-item {
    display: flex;
    margin-bottom: 1.5rem;
}

.contact-info-item .icon {
    flex-shrink: 0;
    width: 40px;
    height: 40px;
    background: rgba(67, 97, 238, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary);
    margin-right: 1rem;
}

.contact-info-item .content h4 {
    margin: 0 0 0.25rem;
    font-size: 1.1rem;
    color: var(--gray-800);
}

.contact-info-item .content a,
.contact-info-item .content address,
.contact-info-item .content p {
    margin: 0;
    color: var(--gray-600);
    font-style: normal;
    text-decoration: none;
    transition: color var(--transition-fast);
}

.contact-info-item .content a:hover {
    color: var(--primary);
}

.social-connect h4 {
    margin-bottom: 1rem;
    font-size: 1.1rem;
}

.social-links {
    display: flex;
    gap: 1rem;
}

.social-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: var(--gray-100);
    border-radius: 50%;
    color: var(--gray-700);
    transition: all var(--transition-normal);
}

.social-link:hover {
    background: var(--primary);
    color: white;
    transform: translateY(-3px);
}

.contact-form {
    margin-top: 1.5rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: var(--gray-800);
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid var(--gray-300);
    border-radius: var(--radius-md);
    background-color: white;
    transition: border-color var(--transition-fast), box-shadow var(--transition-fast);
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
    outline: none;
}

.form-checkbox {
    display: flex;
    align-items: flex-start;
}

.form-checkbox input {
    width: auto;
    margin-top: 0.25rem;
    margin-right: 0.75rem;
}

.form-checkbox label {
    margin-bottom: 0;
    font-weight: normal;
}

.form-error {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.form-submit {
    margin-top: 2rem;
}

.form-status {
    margin-top: 1rem;
    padding: 0.75rem;
    border-radius: var(--radius-md);
    text-align: center;
    display: none;
}

.form-status.sending {
    display: block;
    background-color: var(--gray-100);
    color: var(--gray-700);
}

.form-status.success {
    display: block;
    background-color: #d4edda;
    color: #155724;
}

.form-status.error {
    display: block;
    background-color: #f8d7da;
    color: #721c24;
}

.map-section {
    padding: 3rem 0;
    background-color: var(--gray-100);
}

.section-title {
    text-align: center;
    margin-bottom: 2rem;
}

.map-container {
    height: 400px;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
}

.google-map {
    width: 100%;
    height: 100%;
}

.map-fallback {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: var(--gray-200);
    color: var(--gray-700);
    text-align: center;
    padding: 2rem;
}

.map-info-window {
    padding: 0.5rem;
}

.map-info-window h4 {
    margin: 0 0 0.5rem;
    font-size: 1rem;
}

.map-info-window p {
    margin: 0;
    font-size: 0.9rem;
}

.faq-section {
    padding: 3rem 0;
}

.faq-grid {
    max-width: 800px;
    margin: 0 auto;
}

.faq-item {
    margin-bottom: 1rem;
    border-radius: var(--radius-md);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    background-color: white;
}

.faq-question {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.25rem;
    background: none;
    border: none;
    text-align: left;
    cursor: pointer;
    transition: background-color var(--transition-fast);
}

.faq-question:hover {
    background-color: var(--gray-100);
}

.faq-question h4 {
    margin: 0;
    font-size: 1.1rem;
    color: var(--gray-800);
}

.faq-toggle {
    font-size: 1.5rem;
    color: var(--primary);
    transition: transform var(--transition-normal);
}

.faq-item.active .faq-toggle {
    transform: rotate(45deg);
}

.faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height var(--transition-normal);
}

.faq-answer p {
    padding: 0 1.25rem 1.25rem;
    margin: 0;
    color: var(--gray-700);
}

@media (max-width: 992px) {
    .contact-form-card {
        margin-top: 2rem;
    }
}

@media (max-width: 768px) {
    .page-header {
        padding: 2rem 0;
    }
    
    .page-title {
        font-size: 2rem;
    }
    
    .contact-section {
        padding: 2rem 0;
    }
    
    .map-container {
        height: 300px;
    }
}

@media (max-width: 576px) {
    .page-title {
        font-size: 1.75rem;
    }
    
    .contact-info-card,
    .contact-form-card {
        padding: 1.5rem;
    }
    
    .map-container {
        height: 250px;
    }
    
    .faq-question h4 {
        font-size: 1rem;
    }
}
</style>

<?php get_footer(); ?>