<?php
/**
 * Template Name: Virtual Assistant Service
 * Single Service Page: Virtual Assistant
 */

get_header(); ?>

<div class="service-page-wrapper">
    <!-- Service Hero Section -->
    <section class="service-hero py-5 bg-gradient-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="service-hero-content text-white">
                        <div class="service-badge mb-3">
                            <span class="badge bg-white text-primary px-3 py-2 rounded-pill">
                                <i class="bi bi-briefcase me-2"></i>
                                Office & Admin Services
                            </span>
                        </div>
                        <h1 class="display-4 fw-bold mb-4">Professional Virtual Assistant</h1>
                        <p class="lead mb-4">Boost your productivity and focus on what matters most with our dedicated virtual assistant services. From administrative tasks to customer support, we handle the details so you can grow your business.</p>
                        <div class="service-features d-flex flex-wrap gap-3">
                            <span class="feature-tag">
                                <i class="bi bi-check-circle me-2"></i>
                                Dedicated Support
                            </span>
                            <span class="feature-tag">
                                <i class="bi bi-clock me-2"></i>
                                Flexible Hours
                            </span>
                            <span class="feature-tag">
                                <i class="bi bi-shield-check me-2"></i>
                                Confidential
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-booking-card bg-white rounded-4 p-4 shadow">
                        <h4 class="fw-bold mb-3">Get Your VA</h4>
                        <div class="price-display mb-3">
                            <span class="price-from">Starting from</span>
                            <span class="price-amount">$15</span>
                            <span class="price-period">per hour</span>
                        </div>
                        <ul class="service-includes list-unstyled mb-4">
                            <li><i class="bi bi-check text-success me-2"></i>Dedicated assistant</li>
                            <li><i class="bi bi-check text-success me-2"></i>Task management</li>
                            <li><i class="bi bi-check text-success me-2"></i>Regular reporting</li>
                            <li><i class="bi bi-check text-success me-2"></i>Secure communication</li>
                        </ul>
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary w-100 mb-3">
                            <i class="bi bi-person-plus me-2"></i>
                            Hire Assistant
                        </a>
                        <a href="tel:+1234567890" class="btn btn-outline-primary w-100">
                            <i class="bi bi-telephone me-2"></i>
                            Discuss Needs
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Details Section -->
    <section class="service-details py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="service-content">
                        <h2 class="section-title mb-4">Virtual Assistant Services We Provide</h2>
                        
                        <div class="va-services mb-5">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="service-card p-4 border rounded">
                                        <h5 class="fw-bold">Administrative Tasks</h5>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>Email management</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Calendar scheduling</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Document creation</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Data entry</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="service-card p-4 border rounded">
                                        <h5 class="fw-bold">Customer Support</h5>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>Live chat support</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Phone assistance</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Ticket management</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Follow-up communication</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="service-card p-4 border rounded">
                                        <h5 class="fw-bold">Research & Analysis</h5>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>Market research</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Lead generation</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Competitor analysis</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Data compilation</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="service-card p-4 border rounded">
                                        <h5 class="fw-bold">Digital Marketing</h5>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>Social media posting</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Content creation</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Email campaigns</li>
                                            <li><i class="bi bi-check text-success me-2"></i>SEO optimization</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="mb-4">Why Choose Our Virtual Assistant Service?</h3>
                        <div class="benefits-grid mb-5">
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="benefit-item text-center">
                                        <div class="benefit-icon">
                                            <i class="bi bi-person-workspace fs-2 text-primary"></i>
                                        </div>
                                        <h5>Skilled Professionals</h5>
                                        <p>Our VAs are experienced professionals with diverse skill sets and industry knowledge.</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="benefit-item text-center">
                                        <div class="benefit-icon">
                                            <i class="bi bi-clock-history fs-2 text-success"></i>
                                        </div>
                                        <h5>Time Zone Flexibility</h5>
                                        <p>Work with assistants in your time zone or get 24/7 coverage with our global team.</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="benefit-item text-center">
                                        <div class="benefit-icon">
                                            <i class="bi bi-graph-up fs-2 text-warning"></i>
                                        </div>
                                        <h5>Scalable Solution</h5>
                                        <p>Start with a few hours and scale up as your business grows. No long-term contracts required.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="mb-4">Service Plans & Pricing</h3>
                        <div class="pricing-table mb-5">
                            <div class="row g-4">
                                <div class="col-lg-4">
                                    <div class="pricing-card border rounded p-4">
                                        <h5 class="fw-bold">Part-Time</h5>
                                        <div class="price mb-3">
                                            <span class="amount">$15</span>
                                            <span class="period">/hour</span>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>5-20 hours/week</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Basic admin tasks</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Email support</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Weekly reports</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="pricing-card border rounded p-4 featured">
                                        <div class="popular-badge">Most Popular</div>
                                        <h5 class="fw-bold">Full-Time</h5>
                                        <div class="price mb-3">
                                            <span class="amount">$12</span>
                                            <span class="period">/hour</span>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>40 hours/week</li>
                                            <li><i class="bi bi-check text-success me-2"></i>All admin services</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Priority support</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Daily check-ins</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="pricing-card border rounded p-4">
                                        <h5 class="fw-bold">Enterprise</h5>
                                        <div class="price mb-3">
                                            <span class="amount">$10</span>
                                            <span class="period">/hour</span>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check text-success me-2"></i>Multiple assistants</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Specialized skills</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Team management</li>
                                            <li><i class="bi bi-check text-success me-2"></i>Custom solutions</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="mb-4">How It Works</h3>
                        <div class="process-steps mb-5">
                            <div class="row g-4">
                                <div class="col-md-3">
                                    <div class="process-step text-center">
                                        <div class="step-number">1</div>
                                        <h5>Consultation</h5>
                                        <p>We discuss your needs and match you with the perfect assistant.</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="process-step text-center">
                                        <div class="step-number">2</div>
                                        <h5>Onboarding</h5>
                                        <p>We set up systems and train your VA on your processes.</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="process-step text-center">
                                        <div class="step-number">3</div>
                                        <h5>Execute</h5>
                                        <p>Your VA starts working on tasks and provides regular updates.</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="process-step text-center">
                                        <div class="step-number">4</div>
                                        <h5>Scale</h5>
                                        <p>Adjust hours and services as your business grows.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-section">
                            <h3 class="mb-4">Frequently Asked Questions</h3>
                            <div class="accordion" id="virtualassistantFAQ">
                                <div class="accordion-item">
                                    <h4 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                            How do you ensure data security and confidentiality?
                                        </button>
                                    </h4>
                                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#virtualassistantFAQ">
                                        <div class="accordion-body">
                                            All our VAs sign strict NDAs and use secure communication channels. We follow industry-standard security practices and regular security training.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h4 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                            Can I work with the same assistant long-term?
                                        </button>
                                    </h4>
                                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#virtualassistantFAQ">
                                        <div class="accordion-body">
                                            Absolutely! We encourage long-term relationships. Your dedicated VA will learn your business and become an integral part of your team.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h4 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                            What if I need specialized skills?
                                        </button>
                                    </h4>
                                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#virtualassistantFAQ">
                                        <div class="accordion-body">
                                            We have VAs with specialized skills in marketing, bookkeeping, design, and more. We'll match you with someone who has the exact expertise you need.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="service-sidebar">
                        <!-- Contact Info -->
                        <div class="contact-widget bg-light p-4 rounded mb-4">
                            <h5 class="fw-bold mb-3">Get Started Today</h5>
                            <div class="contact-info">
                                <div class="contact-item mb-3">
                                    <i class="bi bi-telephone text-primary me-2"></i>
                                    <a href="tel:+1234567890">(123) 456-7890</a>
                                </div>
                                <div class="contact-item mb-3">
                                    <i class="bi bi-envelope text-primary me-2"></i>
                                    <a href="mailto:va@blueprint.com">va@blueprint.com</a>
                                </div>
                                <div class="contact-item mb-3">
                                    <i class="bi bi-clock text-primary me-2"></i>
                                    <span>Available 24/7</span>
                                </div>
                            </div>
                            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary w-100">
                                Find Your VA
                            </a>
                        </div>

                        <!-- Skills List -->
                        <div class="skills-widget bg-light p-4 rounded mb-4">
                            <h5 class="fw-bold mb-3">VA Expertise</h5>
                            <div class="skills-list">
                                <span class="skill-tag">Admin Support</span>
                                <span class="skill-tag">Customer Service</span>
                                <span class="skill-tag">Data Entry</span>
                                <span class="skill-tag">Research</span>
                                <span class="skill-tag">Social Media</span>
                                <span class="skill-tag">Email Marketing</span>
                                <span class="skill-tag">Bookkeeping</span>
                                <span class="skill-tag">Lead Generation</span>
                                <span class="skill-tag">Content Writing</span>
                                <span class="skill-tag">Project Management</span>
                            </div>
                        </div>

                        <!-- Related Services -->
                        <div class="related-services bg-light p-4 rounded">
                            <h5 class="fw-bold mb-3">Related Admin Services</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="<?php echo esc_url(home_url('/services/data-entry/')); ?>" class="text-decoration-none">
                                        <i class="bi bi-arrow-right text-primary me-2"></i>
                                        Data Entry
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="<?php echo esc_url(home_url('/services/bookkeeping/')); ?>" class="text-decoration-none">
                                        <i class="bi bi-arrow-right text-primary me-2"></i>
                                        Bookkeeping
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="<?php echo esc_url(home_url('/services/email-inbox-management/')); ?>" class="text-decoration-none">
                                        <i class="bi bi-arrow-right text-primary me-2"></i>
                                        Email Management
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="<?php echo esc_url(home_url('/services/customer-service-outsourcing/')); ?>" class="text-decoration-none">
                                        <i class="bi bi-arrow-right text-primary me-2"></i>
                                        Customer Service
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials py-5 bg-light">
        <div class="container">
            <h3 class="text-center mb-5">Success Stories</h3>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="testimonial-card bg-white p-4 rounded shadow-sm h-100">
                        <div class="stars mb-3">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                        <p>"My VA has been a game-changer for my business. She handles all my admin work so I can focus on growing my company."</p>
                        <div class="customer-info">
                            <strong>Rachel Green</strong>
                            <div class="text-muted">E-commerce Business Owner</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-card bg-white p-4 rounded shadow-sm h-100">
                        <div class="stars mb-3">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                        <p>"Professional, reliable, and incredibly skilled. Our VA manages our customer support flawlessly and our customers love the service."</p>
                        <div class="customer-info">
                            <strong>Tom Anderson</strong>
                            <div class="text-muted">SaaS Startup</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-card bg-white p-4 rounded shadow-sm h-100">
                        <div class="stars mb-3">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                        <p>"The best investment I've made. My VA handles research, data entry, and social media. It's like having a full-time employee at a fraction of the cost."</p>
                        <div class="customer-info">
                            <strong>Sarah Mitchell</strong>
                            <div class="text-muted">Marketing Consultant</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="service-cta py-5 bg-primary text-white">
        <div class="container text-center">
            <h3 class="display-6 fw-bold mb-3">Ready to Boost Your Productivity?</h3>
            <p class="lead mb-4">Get matched with a skilled virtual assistant and start focusing on what matters most to your business!</p>
            <div class="cta-buttons">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-light btn-lg me-3">
                    <i class="bi bi-person-plus me-2"></i>
                    Find My VA
                </a>
                <a href="tel:+1234567890" class="btn btn-outline-light btn-lg">
                    <i class="bi bi-telephone me-2"></i>
                    Discuss Requirements
                </a>
            </div>
        </div>
    </section>

    <!-- Hashtags Section -->
    <section class="hashtags py-4 bg-light">
        <div class="container">
            <div class="hashtags-content text-center">
                <h6 class="fw-bold mb-3">Popular Tags:</h6>
                <div class="hashtag-list">
                    <span class="hashtag">#VirtualAssistant</span>
                    <span class="hashtag">#VA</span>
                    <span class="hashtag">#AdminSupport</span>
                    <span class="hashtag">#RemoteAssistant</span>
                    <span class="hashtag">#BusinessSupport</span>
                    <span class="hashtag">#Outsourcing</span>
                    <span class="hashtag">#ProductivityBoost</span>
                    <span class="hashtag">#DataEntry</span>
                    <span class="hashtag">#CustomerService</span>
                    <span class="hashtag">#EmailManagement</span>
                    <span class="hashtag">#OnlineAssistant</span>
                    <span class="hashtag">#ExecutiveAssistant</span>
                    <span class="hashtag">#BusinessGrowth</span>
                    <span class="hashtag">#Entrepreneur</span>
                    <span class="hashtag">#SmallBusiness</span>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.hashtag {
    display: inline-block;
    background: #667eea;
    color: white;
    padding: 0.25rem 0.75rem;
    margin: 0.25rem;
    border-radius: 1rem;
    font-size: 0.875rem;
    text-decoration: none;
}

.hashtag:hover {
    background: #5a6fd8;
    color: white;
}

.skill-tag {
    display: inline-block;
    background: #f8f9fa;
    border: 1px solid #dee2e6;
    color: #495057;
    padding: 0.25rem 0.75rem;
    margin: 0.25rem;
    border-radius: 1rem;
    font-size: 0.875rem;
}

.feature-tag {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 2rem;
    font-size: 0.875rem;
}

.pricing-card.featured {
    position: relative;
    border-color: #667eea !important;
    background: linear-gradient(135deg, #f8f9ff 0%, #fff 100%);
}

.popular-badge {
    position: absolute;
    top: -10px;
    left: 50%;
    transform: translateX(-50%);
    background: #667eea;
    color: white;
    padding: 0.25rem 1rem;
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: bold;
}

.service-booking-card {
    position: sticky;
    top: 2rem;
}

.price-amount {
    font-size: 2.5rem;
    font-weight: bold;
    color: #667eea;
}

.price-from, .price-period {
    font-size: 0.875rem;
    color: #6c757d;
}

.process-step .step-number {
    width: 60px;
    height: 60px;
    background: #667eea;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: bold;
    margin: 0 auto 1rem;
}
</style>

<?php get_footer(); ?>
