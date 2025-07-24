<?php
/*
Template Name: Contact Page
*/
get_header(); ?>

<main id="main" class="site-main">

<?php
// Universal Banner Configuration
$badge_icon = '📞';
$badge_text = 'Get In Touch Today';
$title = 'Contact Us';
$highlight = 'Quick Response';
$description = 'Ready to get started? Contact us for a free consultation and quote. We respond quickly and provide honest, upfront pricing.';
$buttons = [
    [
        'text' => 'Call Now',
        'url' => 'tel:+1234567890',
        'type' => 'btn-primary',
        'icon' => '📞'
    ],
    [
        'text' => 'View Services',
        'url' => get_permalink(get_page_by_path('services')),
        'type' => 'btn-secondary',
        'icon' => '→'
    ]
];
$stats = [
    ['number' => '<24hr', 'label' => 'Response Time'],
    ['number' => 'Free', 'label' => 'Quotes'],
    ['number' => '7 Days', 'label' => 'Per Week'],
    ['number' => '100%', 'label' => 'Satisfaction']
];

include get_template_directory() . '/template-parts/universal-banner.php';
?>

<!-- Contact Form Section -->
<section class="contact-section">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-form">
                <h2>Get Your Free Quote</h2>
                <form method="post" action="">
                    <div class="form-row">
                        <input type="text" name="name" placeholder="Your Name" required>
                        <input type="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-row">
                        <input type="tel" name="phone" placeholder="Phone Number">
                        <select name="service" required>
                            <option value="">Select Service</option>
                            <option value="cleaning">Home Cleaning</option>
                            <option value="maintenance">Home Maintenance</option>
                            <option value="personal">Personal Services</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <textarea name="message" placeholder="Describe your needs..." rows="5" required></textarea>
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>
            
            <div class="contact-info">
                <h3>Contact Information</h3>
                <div class="info-item">
                    <strong>📞 Phone:</strong>
                    <span>(123) 456-7890</span>
                </div>
                <div class="info-item">
                    <strong>📧 Email:</strong>
                    <span>info@yourservice.com</span>
                </div>
                <div class="info-item">
                    <strong>📍 Service Area:</strong>
                    <span>Greater Metropolitan Area</span>
                </div>
                <div class="info-item">
                    <strong>🕒 Hours:</strong>
                    <span>Mon-Fri: 8AM-6PM<br>Sat-Sun: 9AM-5PM</span>
                </div>
            </div>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>

<style>
/* Contact Section Styles */
.contact-section {
    padding: 80px 0;
    background: #f8f9fa;
}

.contact-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 60px;
    max-width: 1000px;
    margin: 0 auto;
}

.contact-form {
    background: white;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.contact-form h2 {
    margin-bottom: 30px;
    color: #333;
    font-size: 1.8rem;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-bottom: 20px;
}

.contact-form input,
.contact-form select,
.contact-form textarea {
    padding: 16px;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

.contact-form input:focus,
.contact-form select:focus,
.contact-form textarea:focus {
    outline: none;
    border-color: #667eea;
}

.contact-form textarea {
    grid-column: 1 / -1;
    resize: vertical;
    min-height: 120px;
}

.submit-btn {
    background: #667eea;
    color: white;
    padding: 16px 32px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s ease;
    width: 100%;
}

.submit-btn:hover {
    background: #5a6fd8;
}

.contact-info {
    background: white;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    height: fit-content;
}

.contact-info h3 {
    margin-bottom: 30px;
    color: #333;
    font-size: 1.5rem;
}

.info-item {
    margin-bottom: 20px;
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.info-item strong {
    color: #667eea;
    font-size: 14px;
}

.info-item span {
    color: #555;
    font-size: 16px;
}

@media (max-width: 768px) {
    .contact-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .contact-form,
    .contact-info {
        padding: 30px 20px;
    }
}
</style>
