<?php
/**
 * Template Name: Pricing
 */

get_header(); ?>

<main id="main" class="site-main">
    <!-- Pricing Hero Section -->
    <section id="pricing-hero" class="section bg-light">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h1 class="section-title mb-3" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-tag me-3" style="color: #3498db;"></i>
                    Our Pricing Plans
                </h1>
                <p class="section-subtitle lead text-muted">
                    Choose the perfect plan for your needs. All plans include our satisfaction guarantee.
                </p>
            </div>
        </div>
    </section>

    <!-- Pricing Plans Section -->
    <section id="pricing-plans" class="section">
        <div class="container">
            <div class="row g-4">
                <!-- Basic Plan -->
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card h-100 bg-white rounded-3 shadow-sm border-0 overflow-hidden">
                        <div class="card-body p-4 text-center">
                            <div class="plan-icon mb-3">
                                <i class="fas fa-home" style="font-size: 3rem; color: #3498db;"></i>
                            </div>
                            <h3 class="h4 mb-3" style="color: #2c3e50; font-weight: 600;">
                                Basic Plan
                            </h3>
                            <div class="plan-price mb-4">
                                <span class="price-amount" style="font-size: 2.5rem; font-weight: 700; color: #3498db;">$99</span>
                                <span class="price-period text-muted">/month</span>
                            </div>
                            <p class="text-muted mb-4">
                                Perfect for small businesses and homeowners with basic service needs
                            </p>
                            
                            <ul class="list-unstyled text-start mb-4">
                                <li class="mb-2">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Basic consultation included
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Email support
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Monthly service visits
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Basic maintenance included
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-times text-muted me-2"></i>
                                    <span class="text-muted">Priority support</span>
                                </li>
                            </ul>
                            
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>?plan=basic" class="btn btn-outline-primary w-100">
                                Get Started <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Professional Plan (Featured) -->
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card featured h-100 bg-white rounded-3 shadow-lg border-0 overflow-hidden position-relative">
                        <div class="position-absolute top-0 start-50 translate-middle">
                            <span class="badge bg-primary px-3 py-2">Most Popular</span>
                        </div>
                        <div class="card-body p-4 text-center" style="padding-top: 2rem !important;">
                            <div class="plan-icon mb-3">
                                <i class="fas fa-star" style="font-size: 3rem; color: #f39c12;"></i>
                            </div>
                            <h3 class="h4 mb-3" style="color: #2c3e50; font-weight: 600;">
                                Professional Plan
                            </h3>
                            <div class="plan-price mb-4">
                                <span class="price-amount" style="font-size: 2.5rem; font-weight: 700; color: #3498db;">$199</span>
                                <span class="price-period text-muted">/month</span>
                            </div>
                            <p class="text-muted mb-4">
                                Ideal for growing businesses with comprehensive service requirements
                            </p>
                            
                            <ul class="list-unstyled text-start mb-4">
                                <li class="mb-2">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Everything in Basic Plan
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Priority phone support
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Bi-weekly service visits
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Advanced maintenance package
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Emergency call-out included
                                </li>
                            </ul>
                            
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>?plan=professional" class="btn btn-primary w-100">
                                Get Started <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Enterprise Plan -->
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card h-100 bg-white rounded-3 shadow-sm border-0 overflow-hidden">
                        <div class="card-body p-4 text-center">
                            <div class="plan-icon mb-3">
                                <i class="fas fa-crown" style="font-size: 3rem; color: #9b59b6;"></i>
                            </div>
                            <h3 class="h4 mb-3" style="color: #2c3e50; font-weight: 600;">
                                Enterprise Plan
                            </h3>
                            <div class="plan-price mb-4">
                                <span class="price-amount" style="font-size: 2.5rem; font-weight: 700; color: #3498db;">$399</span>
                                <span class="price-period text-muted">/month</span>
                            </div>
                            <p class="text-muted mb-4">
                                Complete solution for large businesses with extensive service needs
                            </p>
                            
                            <ul class="list-unstyled text-start mb-4">
                                <li class="mb-2">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Everything in Professional Plan
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check text-success me-2"></i>
                                    24/7 dedicated support
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Weekly service visits
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Custom service packages
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Dedicated account manager
                                </li>
                            </ul>
                            
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>?plan=enterprise" class="btn btn-outline-primary w-100">
                                Get Started <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Add-ons Section -->
    <section id="service-addons" class="section bg-light">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h2 class="section-title mb-3" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-plus-circle me-3" style="color: #3498db;"></i>
                    Additional Services
                </h2>
                <p class="section-subtitle lead text-muted">
                    Enhance your plan with these optional add-on services
                </p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="addon-card text-center p-4 bg-white rounded-3 shadow-sm h-100">
                        <div class="addon-icon mb-3">
                            <i class="fas fa-tools" style="font-size: 2rem; color: #3498db;"></i>
                        </div>
                        <h4 class="h6 mb-2" style="color: #2c3e50; font-weight: 600;">Emergency Repairs</h4>
                        <p class="text-muted small mb-2">24/7 emergency service</p>
                        <div class="addon-price">
                            <span class="h6 text-primary">$49/call</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="addon-card text-center p-4 bg-white rounded-3 shadow-sm h-100">
                        <div class="addon-icon mb-3">
                            <i class="fas fa-broom" style="font-size: 2rem; color: #3498db;"></i>
                        </div>
                        <h4 class="h6 mb-2" style="color: #2c3e50; font-weight: 600;">Deep Cleaning</h4>
                        <p class="text-muted small mb-2">Comprehensive cleaning service</p>
                        <div class="addon-price">
                            <span class="h6 text-primary">$89/visit</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="addon-card text-center p-4 bg-white rounded-3 shadow-sm h-100">
                        <div class="addon-icon mb-3">
                            <i class="fas fa-seedling" style="font-size: 2rem; color: #3498db;"></i>
                        </div>
                        <h4 class="h6 mb-2" style="color: #2c3e50; font-weight: 600;">Garden Care</h4>
                        <p class="text-muted small mb-2">Professional landscaping</p>
                        <div class="addon-price">
                            <span class="h6 text-primary">$69/visit</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="addon-card text-center p-4 bg-white rounded-3 shadow-sm h-100">
                        <div class="addon-icon mb-3">
                            <i class="fas fa-shield-alt" style="font-size: 2rem; color: #3498db;"></i>
                        </div>
                        <h4 class="h6 mb-2" style="color: #2c3e50; font-weight: 600;">Extended Warranty</h4>
                        <p class="text-muted small mb-2">Additional coverage protection</p>
                        <div class="addon-price">
                            <span class="h6 text-primary">$29/month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="pricing-faq" class="section">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h2 class="section-title mb-3" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-question-circle me-3" style="color: #3498db;"></i>
                    Frequently Asked Questions
                </h2>
                <p class="section-subtitle lead text-muted">
                    Common questions about our pricing and services
                </p>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="pricingAccordion">
                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h3 class="accordion-header" id="faq1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                                    Can I change my plan at any time?
                                </button>
                            </h3>
                            <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#pricingAccordion">
                                <div class="accordion-body">
                                    Yes, you can upgrade or downgrade your plan at any time. Changes will take effect at the start of your next billing cycle.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h3 class="accordion-header" id="faq2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                    What's included in the maintenance services?
                                </button>
                            </h3>
                            <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#pricingAccordion">
                                <div class="accordion-body">
                                    Our maintenance services include regular inspections, preventive care, minor repairs, and system checks to ensure everything runs smoothly.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h3 class="accordion-header" id="faq3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                    Do you offer custom pricing for large projects?
                                </button>
                            </h3>
                            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#pricingAccordion">
                                <div class="accordion-body">
                                    Absolutely! For large-scale projects or custom requirements, we offer tailored pricing solutions. Contact us for a personalized quote.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h3 class="accordion-header" id="faq4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                                    Is there a contract or commitment required?
                                </button>
                            </h3>
                            <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#pricingAccordion">
                                <div class="accordion-body">
                                    We offer both monthly and annual plans. Annual plans come with a discount, but you can cancel monthly plans with 30 days notice.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section bg-primary">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="text-white mb-4" style="font-weight: 600;">Ready to Choose Your Plan?</h2>
                    <p class="text-white-50 mb-4 lead">
                        Contact us today for a free consultation and let us help you select the perfect service plan for your needs.
                    </p>
                    <div class="cta-buttons">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-light btn-lg me-3">
                            <i class="fas fa-envelope me-2"></i>
                            Get Free Consultation
                        </a>
                        <a href="tel:+1234567890" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-phone me-2"></i>
                            Call Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
/* Pricing Card Styles */
.pricing-card.featured {
    transform: scale(1.05);
    border: 2px solid #3498db !important;
}

.pricing-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.pricing-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
}

.addon-card {
    transition: transform 0.3s ease;
}

.addon-card:hover {
    transform: translateY(-3px);
}

/* Button Styles */
.btn {
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.75rem 1.5rem;
    border: 1px solid transparent;
}

.btn-primary {
    background-color: #3498db;
    border-color: #3498db;
    color: #ffffff;
}

.btn-primary:hover {
    background-color: #2980b9;
    border-color: #2980b9;
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
}

.btn-outline-primary {
    background-color: transparent;
    border-color: #3498db;
    color: #3498db;
}

.btn-outline-primary:hover {
    background-color: #3498db;
    border-color: #3498db;
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
}

.btn-light {
    background-color: #ffffff;
    border-color: #ffffff;
    color: #2c3e50;
}

.btn-light:hover {
    background-color: #f8f9fa;
    border-color: #f8f9fa;
    color: #2c3e50;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 255, 255, 0.3);
}

.btn-outline-light {
    background-color: transparent;
    border-color: #ffffff;
    color: #ffffff;
}

.btn-outline-light:hover {
    background-color: #ffffff;
    border-color: #ffffff;
    color: #2c3e50;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 255, 255, 0.3);
}

.btn-lg {
    padding: 1rem 2rem;
    font-size: 1.125rem;
}

.btn-sm {
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
}

/* CTA Buttons Specific Styling */
.cta-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    justify-content: center;
    align-items: center;
}

.cta-buttons .btn {
    min-width: 200px;
    white-space: nowrap;
}

/* Icon Spacing */
.btn i {
    display: inline-block;
}

.btn i.me-1 {
    margin-right: 0.25rem !important;
}

.btn i.me-2 {
    margin-right: 0.5rem !important;
}

.btn i.ms-1 {
    margin-left: 0.25rem !important;
}

.btn i.ms-2 {
    margin-left: 0.5rem !important;
}

/* Accordion Styles */
.accordion-button:not(.collapsed) {
    background-color: #f8f9fa;
    color: #2c3e50;
}

.accordion-button:focus {
    box-shadow: none;
    border-color: #3498db;
}

.accordion-button {
    font-weight: 500;
    border: none;
    border-radius: 8px !important;
}

.accordion-item {
    border-radius: 8px !important;
    overflow: hidden;
}

/* Responsive Design */
@media (max-width: 992px) {
    .pricing-card.featured {
        transform: none;
        margin-top: 1rem;
    }
}

@media (max-width: 768px) {
    .cta-buttons {
        flex-direction: column;
        width: 100%;
    }
    
    .cta-buttons .btn {
        width: 100%;
        min-width: auto;
    }
    
    .btn-lg {
        padding: 0.875rem 1.5rem;
        font-size: 1rem;
    }
}

/* Additional Button States */
.btn:focus,
.btn:active {
    box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
    outline: none;
}

.btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none !important;
}

/* Ensure text is readable */
.btn {
    line-height: 1.5;
    text-align: center;
}
</style>

<?php get_footer(); ?>