<?php get_header(); ?>

<!-- Hero Section with Video Background Effect -->
<section class="hero-section-advanced">
    <div class="hero-overlay"></div>
    <div class="hero-particles"></div>
    <div class="hero-content">
        <div class="hero-badge">🎉 Premium Party Rentals</div>
        <h1 class="hero-title-fancy">Make Every Moment <span class="gradient-text">Unforgettable</span></h1>
        <p class="hero-subtitle-fancy">Transform your special occasions with our premium party rental equipment and professional setup services. From intimate gatherings to grand celebrations.</p>
        <div class="hero-stats">
            <div class="stat-item">
                <div class="stat-number">500+</div>
                <div class="stat-label">Events Completed</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">98%</div>
                <div class="stat-label">Client Satisfaction</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">24/7</div>
                <div class="stat-label">Support Available</div>
            </div>
        </div>
        <div class="hero-buttons">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn-primary-fancy">
                <span>Explore Services</span>
                <i class="arrow-right">→</i>
            </a>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-secondary-fancy">
                <span>Get Quote</span>
                <i class="phone-icon">📞</i>
            </a>
        </div>
    </div>
    <div class="hero-image">
        <div class="floating-card card-1">🎪 Tents</div>
        <div class="floating-card card-2">🪑 Furniture</div>
        <div class="floating-card card-3">💡 Lighting</div>
        <div class="floating-card card-4">🎵 Audio</div>
    </div>
</section>

<!-- Services Grid with Card Animations -->
<section class="services-section-fancy">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Our Expertise</div>
            <h2 class="section-title-fancy">Premium <span class="gradient-text">Party Rentals</span></h2>
            <p class="section-subtitle-fancy">Everything you need to create magical moments that your guests will remember forever</p>
        </div>
        
        <div class="services-grid-fancy">
            <div class="service-card-fancy card-blue">
                <div class="card-glow"></div>
                <div class="service-icon-fancy">🪑</div>
                <h3 class="service-title-fancy">Tables & Chairs</h3>
                <p class="service-description-fancy">Elegant seating solutions for any event size. From intimate dinners to large banquets.</p>
                <div class="service-features">
                    <span class="feature-tag">Premium Quality</span>
                    <span class="feature-tag">Multiple Styles</span>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="service-link">
                    Learn More <span class="arrow">→</span>
                </a>
            </div>
            
            <div class="service-card-fancy card-pink">
                <div class="card-glow"></div>
                <div class="service-icon-fancy">🏕️</div>
                <h3 class="service-title-fancy">Tents & Canopies</h3>
                <p class="service-description-fancy">Weather-proof tents and stylish canopies for outdoor events and garden parties.</p>
                <div class="service-features">
                    <span class="feature-tag">All Weather</span>
                    <span class="feature-tag">Custom Sizes</span>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="service-link">
                    Learn More <span class="arrow">→</span>
                </a>
            </div>
            
            <div class="service-card-fancy card-yellow">
                <div class="card-glow"></div>
                <div class="service-icon-fancy">💡</div>
                <h3 class="service-title-fancy">Event Lighting</h3>
                <p class="service-description-fancy">Professional lighting solutions to create the perfect ambiance for your celebration.</p>
                <div class="service-features">
                    <span class="feature-tag">LED Technology</span>
                    <span class="feature-tag">Custom Colors</span>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="service-link">
                    Learn More <span class="arrow">→</span>
                </a>
            </div>
            
            <div class="service-card-fancy card-green">
                <div class="card-glow"></div>
                <div class="service-icon-fancy">🎵</div>
                <h3 class="service-title-fancy">Audio Systems</h3>
                <p class="service-description-fancy">Crystal clear sound systems and professional DJ equipment for entertainment.</p>
                <div class="service-features">
                    <span class="feature-tag">HD Audio</span>
                    <span class="feature-tag">Wireless Setup</span>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="service-link">
                    Learn More <span class="arrow">→</span>
                </a>
            </div>
            
            <div class="service-card-fancy card-purple">
                <div class="card-glow"></div>
                <div class="service-icon-fancy">🎊</div>
                <h3 class="service-title-fancy">Decorations</h3>
                <p class="service-description-fancy">Beautiful centerpieces, backdrops, and themed decorations to transform any space.</p>
                <div class="service-features">
                    <span class="feature-tag">Custom Themes</span>
                    <span class="feature-tag">Professional Setup</span>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="service-link">
                    Learn More <span class="arrow">→</span>
                </a>
            </div>
            
            <div class="service-card-fancy card-orange">
                <div class="card-glow"></div>
                <div class="service-icon-fancy">🏰</div>
                <h3 class="service-title-fancy">Entertainment</h3>
                <p class="service-description-fancy">Bounce houses, photo booths, and fun activities to keep guests entertained.</p>
                <div class="service-features">
                    <span class="feature-tag">Kid Friendly</span>
                    <span class="feature-tag">Safe & Clean</span>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="service-link">
                    Learn More <span class="arrow">→</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Preview Section -->
<section class="pricing-preview-section">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Transparent Pricing</div>
            <h2 class="section-title-fancy">Choose Your <span class="gradient-text">Perfect Package</span></h2>
            <p class="section-subtitle-fancy">Competitive rates with no hidden fees. Quality equipment, professional service, guaranteed satisfaction.</p>
        </div>
        
        <div class="pricing-cards-preview">
            <div class="pricing-card-preview">
                <div class="pricing-badge">Starter</div>
                <div class="pricing-amount">$500</div>
                <div class="pricing-features">
                    <div class="pricing-feature">Up to 30 guests</div>
                    <div class="pricing-feature">Basic setup included</div>
                    <div class="pricing-feature">6-hour rental</div>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('pricing'))); ?>" class="pricing-btn">View Details</a>
            </div>
            
            <div class="pricing-card-preview featured">
                <div class="pricing-badge popular">Most Popular</div>
                <div class="pricing-amount">$1,200</div>
                <div class="pricing-features">
                    <div class="pricing-feature">Up to 100 guests</div>
                    <div class="pricing-feature">Premium setup</div>
                    <div class="pricing-feature">10-hour rental</div>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('pricing'))); ?>" class="pricing-btn">View Details</a>
            </div>
            
            <div class="pricing-card-preview">
                <div class="pricing-badge">Premium</div>
                <div class="pricing-amount">$2,500</div>
                <div class="pricing-features">
                    <div class="pricing-feature">Up to 200 guests</div>
                    <div class="pricing-feature">Luxury setup</div>
                    <div class="pricing-feature">12-hour rental</div>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('pricing'))); ?>" class="pricing-btn">View Details</a>
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
                <div class="testimonial-text">"Absolutely amazing service! They made our wedding day perfect with beautiful decorations and seamless setup."</div>
                <div class="testimonial-author">
                    <div class="author-avatar">👰</div>
                    <div class="author-info">
                        <div class="author-name">Priya & Rahul</div>
                        <div class="author-event">Wedding Celebration</div>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
                <div class="testimonial-text">"Professional team, quality equipment, and excellent customer service. Highly recommended for corporate events!"</div>
                <div class="testimonial-author">
                    <div class="author-avatar">👨‍💼</div>
                    <div class="author-info">
                        <div class="author-name">Vikram Enterprises</div>
                        <div class="author-event">Corporate Event</div>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
                <div class="testimonial-text">"The kids had a blast! The bounce house was clean and safe. Great service for birthday parties."</div>
                <div class="testimonial-author">
                    <div class="author-avatar">👶</div>
                    <div class="author-info">
                        <div class="author-name">Sunita Sharma</div>
                        <div class="author-event">Birthday Party</div>
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
            <div class="cta-icon">🎉</div>
            <h2 class="cta-title-fancy">Ready to Create Something <span class="gradient-text">Amazing?</span></h2>
            <p class="cta-subtitle-fancy">Let's plan your perfect event together. Get a personalized quote in minutes!</p>
            <div class="cta-buttons-fancy">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="cta-btn-primary">
                    <span>Start Planning</span>
                    <div class="btn-shine"></div>
                </a>
                <a href="tel:+919876543210" class="cta-btn-secondary">
                    <span>📞 Call Now</span>
                </a>
            </div>
            <div class="cta-trust-badges">
                <div class="trust-badge">✅ Licensed & Insured</div>
                <div class="trust-badge">✅ 5-Star Rated</div>
                <div class="trust-badge">✅ Same Day Setup</div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
