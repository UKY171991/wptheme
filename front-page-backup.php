<?php get_header(); ?>

<!-- Hero Section -->
<section class="hero-section-advanced">
    <div class="hero-overlay"></div>
    <div class="hero-particles"></div>
    <div class="hero-content">
        <div class="hero-badge">� Professional Home Services</div>
        <h1 class="hero-title-fancy">Your Trusted <span class="gradient-text">Home Service</span> Partner</h1>
        <p class="hero-subtitle-fancy">From cleaning and maintenance to personal errands and pet care - we handle it all so you can focus on what matters most.</p>
        <div class="hero-stats">
            <div class="stat-item">
                <div class="stat-number">1000+</div>
                <div class="stat-label">Happy Customers</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">50+</div>
                <div class="stat-label">Service Types</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">24/7</div>
                <div class="stat-label">Available Support</div>
            </div>
        </div>
        <div class="hero-buttons">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn-primary-fancy">
                <span>View All Services</span>
                <i class="arrow-right">→</i>
            </a>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-secondary-fancy">
                <span>Get Quote</span>
                <i class="phone-icon">📞</i>
            </a>
        </div>
    </div>
    <div class="hero-image">
        <div class="floating-card card-1">🧹 Cleaning</div>
        <div class="floating-card card-2">� Maintenance</div>
        <div class="floating-card card-3">�️ Errands</div>
        <div class="floating-card card-4">🐶 Pet Care</div>
    </div>
</section>

<!-- Main Service Categories -->
<section class="services-section-fancy">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Our Services</div>
            <h2 class="section-title-fancy">Complete <span class="gradient-text">Home Solutions</span></h2>
            <p class="section-subtitle-fancy">Professional services to make your life easier and your home better</p>
        </div>
        
        <div class="services-grid-fancy">
            <!-- Home & Cleaning Services -->
            <div class="service-card-fancy card-blue">
                <div class="card-glow"></div>
                <div class="service-icon-fancy">�</div>
                <h3 class="service-title-fancy">Home & Cleaning Services</h3>
                <p class="service-description-fancy">Professional cleaning and maintenance to keep your home spotless and well-maintained.</p>
                <div class="service-list">
                    <div class="service-item">• House cleaning</div>
                    <div class="service-item">• Move-in/move-out cleaning</div>
                    <div class="service-item">• Pressure washing</div>
                    <div class="service-item">• Window cleaning</div>
                    <div class="service-item">• Carpet shampooing</div>
                    <div class="service-item">• Airbnb cleaning & reset</div>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="service-link">
                    View All Services <span class="arrow">→</span>
                </a>
            </div>
            
            <!-- Home & Property Maintenance -->
            <div class="service-card-fancy card-green">
                <div class="card-glow"></div>
                <div class="service-icon-fancy">🧰</div>
                <h3 class="service-title-fancy">Home & Property Maintenance</h3>
                <p class="service-description-fancy">Expert handyman services and property maintenance to keep everything in perfect condition.</p>
                <div class="service-list">
                    <div class="service-item">• Furniture assembly</div>
                    <div class="service-item">• TV mounting</div>
                    <div class="service-item">• Handyman services</div>
                    <div class="service-item">• Light fixture installation</div>
                    <div class="service-item">• Holiday light hanging</div>
                    <div class="service-item">• Pool cleaning</div>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="service-link">
                    View All Services <span class="arrow">→</span>
                </a>
            </div>
            
            <!-- Personal Errands & Concierge -->
            <div class="service-card-fancy card-purple">
                <div class="card-glow"></div>
                <div class="service-icon-fancy">�️</div>
                <h3 class="service-title-fancy">Personal Errands & Concierge</h3>
                <p class="service-description-fancy">Personal assistant services to handle your daily tasks and errands efficiently.</p>
                <div class="service-list">
                    <div class="service-item">• Grocery shopping/delivery</div>
                    <div class="service-item">• Prescription pickup</div>
                    <div class="service-item">• Moving assistance</div>
                    <div class="service-item">• Courier/delivery services</div>
                    <div class="service-item">• Packing/unpacking service</div>
                    <div class="service-item">• Decluttering service</div>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="service-link">
                    View All Services <span class="arrow">→</span>
                </a>
            </div>
            
            <!-- Pet & Animal Services -->
            <div class="service-card-fancy card-orange">
                <div class="card-glow"></div>
                <div class="service-icon-fancy">🐶</div>
                <h3 class="service-title-fancy">Pet & Animal Services</h3>
                <p class="service-description-fancy">Loving care for your furry friends with professional pet services and care.</p>
                <div class="service-list">
                    <div class="service-item">• Dog walking</div>
                    <div class="service-item">• Pet sitting</div>
                    <div class="service-item">• Mobile pet grooming</div>
                    <div class="service-item">• Pet poop scooping</div>
                    <div class="service-item">• Pet taxi service</div>
                    <div class="service-item">• Aquarium cleaning</div>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="service-link">
                    View All Services <span class="arrow">→</span>
                </a>
            </div>
            
            <!-- Child & Family Support -->
            <div class="service-card-fancy card-pink">
                <div class="card-glow"></div>
                <div class="service-icon-fancy">👶</div>
                <h3 class="service-title-fancy">Child & Family Support</h3>
                <p class="service-description-fancy">Trusted childcare and family support services to help busy parents.</p>
                <div class="service-list">
                    <div class="service-item">• Parent helper/mother's helper</div>
                    <div class="service-item">• Babysitting services</div>
                    <div class="service-item">• Toy organization</div>
                    <div class="service-item">• Home safety baby-proofing</div>
                    <div class="service-item">• Birthday party setup</div>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="service-link">
                    View All Services <span class="arrow">→</span>
                </a>
            </div>
            
            <!-- Creative & Digital Services -->
            <div class="service-card-fancy card-yellow">
                <div class="card-glow"></div>
                <div class="service-icon-fancy">�</div>
                <h3 class="service-title-fancy">Creative & Digital Services</h3>
                <p class="service-description-fancy">Professional creative and digital solutions for your business and personal needs.</p>
                <div class="service-list">
                    <div class="service-item">• Graphic design</div>
                    <div class="service-item">• Social media management</div>
                    <div class="service-item">• Content writing/blogging</div>
                    <div class="service-item">• Photography services</div>
                    <div class="service-item">• Logo design</div>
                    <div class="service-item">• Basic website setup</div>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="service-link">
                    View All Services <span class="arrow">→</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Additional Services Preview -->
<section class="additional-services-section">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">More Services</div>
            <h2 class="section-title-fancy">Professional <span class="gradient-text">Business Solutions</span></h2>
            <p class="section-subtitle-fancy">Expand your capabilities with our coaching, admin, and specialty services</p>
        </div>
        
        <div class="additional-services-grid">
            <div class="additional-service-card">
                <div class="service-icon">🎓</div>
                <h3>Coaching & Consulting</h3>
                <div class="service-items">
                    <span>Business coaching</span>
                    <span>Life coaching</span>
                    <span>Marketing consulting</span>
                    <span>Productivity coaching</span>
                </div>
            </div>
            
            <div class="additional-service-card">
                <div class="service-icon">💼</div>
                <h3>Office & Admin Services</h3>
                <div class="service-items">
                    <span>Virtual assistant</span>
                    <span>Data entry</span>
                    <span>Bookkeeping</span>
                    <span>Customer service</span>
                </div>
            </div>
            
            <div class="additional-service-card">
                <div class="service-icon">📦</div>
                <h3>Selling, Flipping & Setup</h3>
                <div class="service-items">
                    <span>Furniture flipping</span>
                    <span>eBay/Amazon selling</span>
                    <span>Home office setup</span>
                    <span>Party rental setup</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Client Stories</div>
            <h2 class="section-title-fancy">What Our <span class="gradient-text">Clients Say</span></h2>
        </div>
        
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
                <div class="testimonial-text">"Exceptional cleaning service! They transformed our home and the attention to detail was incredible. Highly recommend!"</div>
                <div class="testimonial-author">
                    <div class="author-avatar">�</div>
                    <div class="author-info">
                        <div class="author-name">Sarah Johnson</div>
                        <div class="author-event">House Cleaning Service</div>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
                <div class="testimonial-text">"Perfect pet sitting service! Our dog was so happy and well-cared for. Professional and trustworthy team."</div>
                <div class="testimonial-author">
                    <div class="author-avatar">👨</div>
                    <div class="author-info">
                        <div class="author-name">Mike Chen</div>
                        <div class="author-event">Pet Sitting Service</div>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
                <div class="testimonial-text">"Amazing handyman service! Fixed everything quickly and professionally. Great value for money."</div>
                <div class="testimonial-author">
                    <div class="author-avatar">�‍🦳</div>
                    <div class="author-info">
                        <div class="author-name">Linda Rodriguez</div>
                        <div class="author-event">Home Maintenance</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section with Animation -->
<section class="cta-section-fancy">
    <div class="cta-background-pattern"></div>
    <div class="container">
        <div class="cta-content-fancy">
            <div class="cta-icon">�</div>
            <h2 class="cta-title-fancy">Ready to Make Life <span class="gradient-text">Easier?</span></h2>
            <p class="cta-subtitle-fancy">Let us handle your to-do list! Get a personalized quote for any service in minutes.</p>
            <div class="cta-buttons-fancy">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="cta-btn-primary">
                    <span>Get Started Today</span>
                    <div class="btn-shine"></div>
                </a>
                <a href="tel:+1234567890" class="cta-btn-secondary">
                    <span>📞 Call Now</span>
                </a>
            </div>
            <div class="cta-trust-badges">
                <div class="trust-badge">✅ Licensed & Insured</div>
                <div class="trust-badge">✅ Background Checked</div>
                <div class="trust-badge">✅ 100% Satisfaction Guarantee</div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
