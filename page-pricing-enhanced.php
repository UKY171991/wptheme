<?php
/**
 * Template Name: Pricing - Enhanced
 */

get_header(); ?>

<!-- Universal Banner System -->
<section class="universal-banner">
    <div class="container">
        <div class="banner-content">
            <nav class="breadcrumb">
                <a href="<?php echo home_url(); ?>"><i class="fas fa-home"></i> Home</a>
                <span>→</span>
                <span>Pricing</span>
            </nav>
            
            <h1 class="banner-title">Our Pricing</h1>
            <p class="banner-subtitle">Transparent, fair pricing for all your home service needs</p>
            
            <div class="banner-buttons">
                <a href="#pricing-plans" class="btn btn-primary">
                    <i class="fas fa-dollar-sign"></i>
                    View Pricing
                </a>
                <a href="<?php echo home_url('/contact'); ?>" class="btn btn-secondary">
                    <i class="fas fa-calculator"></i>
                    Get Custom Quote
                </a>
            </div>
        </div>
    </div>
</section>

<div class="universal-page-content">
    <div class="container">
        <div class="content-section">
            <!-- Pricing Introduction -->
            <section class="pricing-intro">
                <div class="intro-content">
                    <h2>Simple, Transparent Pricing</h2>
                    <p>No hidden fees, no surprises. Our pricing is designed to be fair, competitive, and transparent. Choose from our popular service packages or get a custom quote for your specific needs.</p>
                    
                    <div class="pricing-features">
                        <div class="pricing-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>No Hidden Fees</span>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Upfront Pricing</span>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Satisfaction Guarantee</span>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Flexible Packages</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main Pricing Plans -->
            <section id="pricing-plans" class="pricing-plans">
                <div class="section-header">
                    <h2>Choose Your Service Package</h2>
                    <p>Select the perfect plan for your home service needs</p>
                </div>

                <div class="pricing-grid">
                    <!-- Home Cleaning Package -->
                    <div class="pricing-card">
                        <div class="pricing-header">
                            <div class="package-icon">
                                <i class="fas fa-home"></i>
                            </div>
                            <h3>Home Cleaning</h3>
                            <div class="package-badge">Most Popular</div>
                        </div>
                        
                        <div class="pricing-price">
                            <span class="price-amount">From $150</span>
                            <span class="price-period">per service</span>
                        </div>
                        
                        <div class="pricing-features">
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Regular house cleaning</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Deep cleaning services</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Move-in/out cleaning</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Eco-friendly products</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Flexible scheduling</span>
                            </div>
                        </div>
                        
                        <div class="pricing-action">
                            <a href="<?php echo home_url('/contact'); ?>" class="btn btn-primary">
                                Get Started
                            </a>
                        </div>
                    </div>

                    <!-- Home Maintenance Package -->
                    <div class="pricing-card featured">
                        <div class="pricing-header">
                            <div class="package-icon">
                                <i class="fas fa-tools"></i>
                            </div>
                            <h3>Home Maintenance</h3>
                            <div class="package-badge featured-badge">Best Value</div>
                        </div>
                        
                        <div class="pricing-price">
                            <span class="price-amount">From $75/hr</span>
                            <span class="price-period">minimum 2 hours</span>
                        </div>
                        
                        <div class="pricing-features">
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Handyman services</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Furniture assembly</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>TV mounting</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Light fixture installation</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Basic repairs</span>
                            </div>
                        </div>
                        
                        <div class="pricing-action">
                            <a href="<?php echo home_url('/contact'); ?>" class="btn btn-primary">
                                Get Started
                            </a>
                        </div>
                    </div>

                    <!-- Personal Services Package -->
                    <div class="pricing-card">
                        <div class="pricing-header">
                            <div class="package-icon">
                                <i class="fas fa-user-friends"></i>
                            </div>
                            <h3>Personal Services</h3>
                        </div>
                        
                        <div class="pricing-price">
                            <span class="price-amount">From $25</span>
                            <span class="price-period">per service</span>
                        </div>
                        
                        <div class="pricing-features">
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Grocery shopping</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Pet care</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Errands & delivery</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Personal assistance</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Flexible timing</span>
                            </div>
                        </div>
                        
                        <div class="pricing-action">
                            <a href="<?php echo home_url('/contact'); ?>" class="btn btn-primary">
                                Get Started
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Additional Services -->
            <section class="additional-services">
                <div class="section-header">
                    <h2>Additional Services</h2>
                    <p>À la carte services for specific needs</p>
                </div>

                <div class="services-grid">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fas fa-broom"></i>
                        </div>
                        <h3>One-Time Deep Clean</h3>
                        <p class="service-price">From $200</p>
                        <p class="service-description">Comprehensive deep cleaning for your entire home</p>
                    </div>

                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fas fa-dog"></i>
                        </div>
                        <h3>Pet Sitting</h3>
                        <p class="service-price">From $30/visit</p>
                        <p class="service-description">Professional pet care in your home</p>
                    </div>

                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fas fa-baby"></i>
                        </div>
                        <h3>Babysitting</h3>
                        <p class="service-price">From $20/hour</p>
                        <p class="service-description">Reliable childcare by experienced sitters</p>
                    </div>

                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <h3>Moving Help</h3>
                        <p class="service-price">From $35/hour</p>
                        <p class="service-description">Loading, unloading, and moving assistance</p>
                    </div>

                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fas fa-paint-brush"></i>
                        </div>
                        <h3>Pressure Washing</h3>
                        <p class="service-price">From $150</p>
                        <p class="service-description">Professional exterior cleaning services</p>
                    </div>

                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <h3>Grocery Delivery</h3>
                        <p class="service-price">From $35</p>
                        <p class="service-description">Personal shopping and delivery service</p>
                    </div>
                </div>
            </section>

            <!-- Pricing FAQ -->
            <section class="pricing-faq">
                <div class="section-header">
                    <h2>Frequently Asked Questions</h2>
                    <p>Common questions about our pricing and services</p>
                </div>

                <div class="faq-grid">
                    <div class="faq-item">
                        <h3>How do you calculate pricing?</h3>
                        <p>Our pricing is based on the type of service, time required, and complexity of the task. We provide upfront estimates with no hidden fees.</p>
                    </div>

                    <div class="faq-item">
                        <h3>Do you offer discounts?</h3>
                        <p>Yes! We offer discounts for regular customers, bundle services, and first-time clients. Contact us for current promotions.</p>
                    </div>

                    <div class="faq-item">
                        <h3>What's included in the price?</h3>
                        <p>All equipment, supplies, and labor are included. We bring everything needed to complete your service professionally.</p>
                    </div>

                    <div class="faq-item">
                        <h3>Can I get a custom quote?</h3>
                        <p>Absolutely! For unique or large projects, we provide customized quotes tailored to your specific needs and budget.</p>
                    </div>

                    <div class="faq-item">
                        <h3>What payment methods do you accept?</h3>
                        <p>We accept cash, credit cards, debit cards, and online payments. Payment is due upon completion of service.</p>
                    </div>

                    <div class="faq-item">
                        <h3>Is there a satisfaction guarantee?</h3>
                        <p>Yes! We guarantee your satisfaction. If you're not happy with our service, we'll make it right or provide a full refund.</p>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="pricing-cta">
                <div class="cta-content">
                    <h2>Ready to Get Started?</h2>
                    <p>Contact us today for a free consultation and personalized quote for your home service needs.</p>
                    
                    <div class="cta-buttons">
                        <a href="<?php echo home_url('/contact'); ?>" class="btn btn-primary btn-large">
                            <i class="fas fa-phone"></i>
                            Get Free Quote
                        </a>
                        <a href="<?php echo home_url('/services'); ?>" class="btn btn-secondary btn-large">
                            <i class="fas fa-list"></i>
                            View All Services
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php get_footer(); ?>
