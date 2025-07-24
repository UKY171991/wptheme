<?php
/**
 * Template Name: FAQ Page
 */

get_header(); ?>

<main id="main" class="site-main">
    <?php
    // Page Banner
    echo services_pro_get_banner_section(
        'Frequently Asked Questions',
        'Find answers to common questions about our services, booking process, pricing, and policies.'
    );
    ?>

    <!-- FAQ Content -->
    <section class="section">
        <div class="container">
            <?php echo services_pro_get_section_heading(
                'Get Your Questions Answered',
                'Browse through our comprehensive FAQ section organized by topic'
            ); ?>
            
            <div class="faq-content">
                <?php services_pro_display_faqs(); ?>
            </div>
        </div>
    </section>

    <!-- Contact CTA -->
    <?php echo services_pro_get_cta_section(
        'Still Have Questions?',
        'Can\'t find what you\'re looking for? Contact us directly and we\'ll be happy to help.',
        'Contact Us',
        get_permalink(get_page_by_path('contact'))
    ); ?>
</main>

<?php get_footer(); ?>
                            <div class="col-lg-10 mx-auto">
                                <?php services_pro_display_faqs(-1, $category->slug); ?>
                            </div>
                        </div>
                    </div>
                <?php
                        endif;
                        wp_reset_postdata();
                    endforeach;
                else :
                    // Display all FAQs without categories
                ?>
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <?php echo services_pro_get_section_heading(
                                'All Questions',
                                'Browse through our comprehensive FAQ collection'
                            ); ?>
                            
                            <?php services_pro_display_faqs(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php else : ?>
                <!-- No FAQs found - show default content -->
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <div class="bg-light p-5 rounded">
                            <i class="fas fa-question-circle fa-4x text-muted mb-4"></i>
                            <h3 class="h4 mb-3">FAQs Coming Soon</h3>
                            <p class="text-muted mb-4">We're preparing comprehensive answers to help you. In the meantime, feel free to contact us directly with any questions.</p>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-accent">
                                <i class="fas fa-envelope me-2"></i>Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Contact Section for Additional Help -->
    <section class="section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="h3 mb-3">Still Have Questions?</h2>
                    <p class="text-muted mb-4">Can't find the answer you're looking for? Our friendly customer support team is here to help.</p>
                    
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="contact-method p-4 bg-white rounded shadow-sm">
                                <i class="fas fa-phone fa-2x text-accent mb-3"></i>
                                <h4 class="h6 mb-2">Call Us</h4>
                                <p class="text-muted small mb-2">Monday - Friday, 9am - 6pm</p>
                                <a href="tel:+1234567890" class="btn btn-sm btn-accent">Call Now</a>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="contact-method p-4 bg-white rounded shadow-sm">
                                <i class="fas fa-envelope fa-2x text-accent mb-3"></i>
                                <h4 class="h6 mb-2">Email Us</h4>
                                <p class="text-muted small mb-2">We'll respond within 24 hours</p>
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-sm btn-accent">Send Email</a>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="contact-method p-4 bg-white rounded shadow-sm">
                                <i class="fas fa-comments fa-2x text-accent mb-3"></i>
                                <h4 class="h6 mb-2">Live Chat</h4>
                                <p class="text-muted small mb-2">Available during business hours</p>
                                <button class="btn btn-sm btn-accent" onclick="alert('Live chat feature coming soon!')">Start Chat</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
                        </span>
                        <input type="text" class="form-control border-start-0 ps-0" id="faqSearch" 
                               placeholder="Search for questions...">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Categories -->
    <section class="section bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Category Filter -->
                    <div class="d-flex flex-wrap gap-2 justify-content-center mb-5">
                        <button class="btn btn-accent btn-rounded active" data-category="all">
                            <i class="fas fa-th me-1"></i>All Questions
                        </button>
                        <button class="btn btn-outline-accent btn-rounded" data-category="services">
                            <i class="fas fa-tools me-1"></i>Services
                        </button>
                        <button class="btn btn-outline-accent btn-rounded" data-category="booking">
                            <i class="fas fa-calendar me-1"></i>Booking
                        </button>
                        <button class="btn btn-outline-accent btn-rounded" data-category="pricing">
                            <i class="fas fa-dollar-sign me-1"></i>Pricing
                        </button>
                        <button class="btn btn-outline-accent btn-rounded" data-category="payment">
                            <i class="fas fa-credit-card me-1"></i>Payment
                        </button>
                        <button class="btn btn-outline-accent btn-rounded" data-category="policy">
                            <i class="fas fa-shield-alt me-1"></i>Policies
                        </button>
                    </div>

                    <!-- FAQ Accordion -->
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="accordion" id="faqAccordion">
                                <!-- Services FAQ Group -->
                                <div class="faq-group mb-4" data-category="services">
                                    <h3 class="text-primary-dark mb-3 border-bottom border-accent pb-2">
                                        <i class="fas fa-tools me-2 text-accent"></i>About Our Services
                                    </h3>
                                    
                                    <!-- FAQ Item 1 -->
                                    <div class="accordion-item border-0 shadow-sm mb-3 rounded-3">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed rounded-3" type="button" 
                                                    data-bs-toggle="collapse" data-bs-target="#faq1">
                                                <i class="fas fa-question-circle text-accent me-2"></i>
                                                What services do you offer?
                                            </button>
                                        </h2>
                                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body text-muted">
                                                <p>We offer a comprehensive range of home and lifestyle services including:</p>
                                                <ul>
                                                    <li>House Cleaning (residential and commercial)</li>
                                                    <li>Handyman and Home Repair Services</li>
                                                    <li>Pet Care and Dog Walking</li>
                                                    <li>Lawn Care and Landscaping</li>
                                                    <li>Personal Shopping and Errand Services</li>
                                                    <li>Elderly Care and Companionship</li>
                                                    <li>Moving and Relocation Assistance</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- FAQ Item 2 -->
                                    <div class="accordion-item border-0 shadow-sm mb-3 rounded-3">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed rounded-3" type="button" 
                                                    data-bs-toggle="collapse" data-bs-target="#faq2">
                                                <i class="fas fa-question-circle text-accent me-2"></i>
                                                Do you provide all cleaning supplies?
                                            </button>
                                        </h2>
                                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body text-muted">
                                                Yes, we provide all necessary cleaning supplies and equipment. We use eco-friendly, professional-grade products that are safe for your family and pets. If you have specific product preferences or allergies, please let us know and we'll accommodate your needs.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Booking FAQ Group -->
                                <div class="faq-group mb-4" data-category="booking">
                                    <h3 class="text-primary-dark mb-3 border-bottom border-accent pb-2">
                                        <i class="fas fa-calendar me-2 text-accent"></i>Booking Process
                                    </h3>
                                    
                                    <!-- FAQ Item 3 -->
                                    <div class="accordion-item border-0 shadow-sm mb-3 rounded-3">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed rounded-3" type="button" 
                                                    data-bs-toggle="collapse" data-bs-target="#faq3">
                                                <i class="fas fa-question-circle text-accent me-2"></i>
                                                How do I book a service?
                                            </button>
                                        </h2>
                                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body text-muted">
                                                Booking is easy! You can book online through our website, call us directly, or send an email. Simply choose your service, select your preferred date and time, provide your address and any special instructions, and we'll confirm your appointment within 24 hours.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- FAQ Item 4 -->
                                    <div class="accordion-item border-0 shadow-sm mb-3 rounded-3">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed rounded-3" type="button" 
                                                    data-bs-toggle="collapse" data-bs-target="#faq4">
                                                <i class="fas fa-question-circle text-accent me-2"></i>
                                                How far in advance should I book?
                                            </button>
                                        </h2>
                                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body text-muted">
                                                We recommend booking at least 48-72 hours in advance to ensure availability. However, we often have same-day or next-day availability depending on the service and our schedule. Emergency services may be available with additional fees.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pricing FAQ Group -->
                                <div class="faq-group mb-4" data-category="pricing">
                                    <h3 class="text-primary-dark mb-3 border-bottom border-accent pb-2">
                                        <i class="fas fa-dollar-sign me-2 text-accent"></i>Pricing Information
                                    </h3>
                                    
                                    <!-- FAQ Item 5 -->
                                    <div class="accordion-item border-0 shadow-sm mb-3 rounded-3">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed rounded-3" type="button" 
                                                    data-bs-toggle="collapse" data-bs-target="#faq5">
                                                <i class="fas fa-question-circle text-accent me-2"></i>
                                                How much do your services cost?
                                            </button>
                                        </h2>
                                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body text-muted">
                                                Our pricing varies by service type, frequency, and scope of work. We offer competitive rates starting from $25/hour for basic services. Visit our pricing page for detailed information, or contact us for a free, personalized quote based on your specific needs.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- FAQ Item 6 -->
                                    <div class="accordion-item border-0 shadow-sm mb-3 rounded-3">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed rounded-3" type="button" 
                                                    data-bs-toggle="collapse" data-bs-target="#faq6">
                                                <i class="fas fa-question-circle text-accent me-2"></i>
                                                Do you offer discounts for regular services?
                                            </button>
                                        </h2>
                                        <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body text-muted">
                                                Yes! We offer discounts for recurring services. Weekly services receive a 15% discount, bi-weekly services get 10% off, and monthly services receive 5% off regular pricing. We also offer package deals for multiple services and senior citizen discounts.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Payment FAQ Group -->
                                <div class="faq-group mb-4" data-category="payment">
                                    <h3 class="text-primary-dark mb-3 border-bottom border-accent pb-2">
                                        <i class="fas fa-credit-card me-2 text-accent"></i>Payment Options
                                    </h3>
                                    
                                    <!-- FAQ Item 7 -->
                                    <div class="accordion-item border-0 shadow-sm mb-3 rounded-3">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed rounded-3" type="button" 
                                                    data-bs-toggle="collapse" data-bs-target="#faq7">
                                                <i class="fas fa-question-circle text-accent me-2"></i>
                                                What payment methods do you accept?
                                            </button>
                                        </h2>
                                        <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body text-muted">
                                                We accept cash, check, all major credit cards (Visa, MasterCard, American Express, Discover), PayPal, and digital payment apps like Venmo and Zelle. Payment is due upon completion of service unless other arrangements have been made.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Policy FAQ Group -->
                                <div class="faq-group mb-4" data-category="policy">
                                    <h3 class="text-primary-dark mb-3 border-bottom border-accent pb-2">
                                        <i class="fas fa-shield-alt me-2 text-accent"></i>Policies & Insurance
                                    </h3>
                                    
                                    <!-- FAQ Item 8 -->
                                    <div class="accordion-item border-0 shadow-sm mb-3 rounded-3">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed rounded-3" type="button" 
                                                    data-bs-toggle="collapse" data-bs-target="#faq8">
                                                <i class="fas fa-question-circle text-accent me-2"></i>
                                                Are you insured and bonded?
                                            </button>
                                        </h2>
                                        <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body text-muted">
                                                Yes, we are fully insured and bonded. We carry comprehensive liability insurance and all our employees are background-checked and bonded for your peace of mind. Our insurance covers any accidental damage that might occur during service.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- FAQ Item 9 -->
                                    <div class="accordion-item border-0 shadow-sm mb-3 rounded-3">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed rounded-3" type="button" 
                                                    data-bs-toggle="collapse" data-bs-target="#faq9">
                                                <i class="fas fa-question-circle text-accent me-2"></i>
                                                What is your cancellation policy?
                                            </button>
                                        </h2>
                                        <div id="faq9" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body text-muted">
                                                We require 24-hour notice for cancellations to avoid a cancellation fee. Same-day cancellations are subject to a 50% service fee. We understand emergencies happen, so please contact us as soon as possible if you need to reschedule.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact CTA -->
    <section class="section bg-accent text-white">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold mb-4">Still Have Questions?</h2>
                    <p class="lead mb-4">Can't find the answer you're looking for? Our friendly customer service team is here to help.</p>
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-light btn-rounded btn-lg">
                            <i class="fas fa-envelope me-2"></i>Contact Us
                        </a>
                        <a href="tel:+1234567890" class="btn btn-outline-light btn-rounded btn-lg">
                            <i class="fas fa-phone me-2"></i>Call Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- FAQ Search and Filter Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('faqSearch');
    const categoryButtons = document.querySelectorAll('[data-category]');
    const faqGroups = document.querySelectorAll('.faq-group');
    const accordionItems = document.querySelectorAll('.accordion-item');

    // Search functionality
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        accordionItems.forEach(item => {
            const question = item.querySelector('.accordion-button').textContent.toLowerCase();
            const answer = item.querySelector('.accordion-body').textContent.toLowerCase();
            
            if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });

    // Category filter functionality
    categoryButtons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.dataset.category;
            
            // Update button states
            categoryButtons.forEach(btn => btn.classList.remove('active', 'btn-accent'));
            categoryButtons.forEach(btn => btn.classList.add('btn-outline-accent'));
            this.classList.add('active', 'btn-accent');
            this.classList.remove('btn-outline-accent');
            
            // Show/hide FAQ groups
            faqGroups.forEach(group => {
                if (category === 'all' || group.dataset.category === category) {
                    group.style.display = 'block';
                } else {
                    group.style.display = 'none';
                }
            });
        });
    });
});
</script>

<?php get_footer(); ?>
