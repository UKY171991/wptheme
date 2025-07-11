<?php get_header(); ?>

<!-- Hero Section -->
<section class="hero-section-advanced">
    <div class="hero-overlay"></div>
    <div class="hero-particles"></div>
    <div class="hero-content">
        <div class="hero-badge">🎉 PartyPro Rentals</div>
        <h1 class="hero-title-fancy">Make Your Event <span class="gradient-text">Unforgettable</span></h1>
        <p class="hero-subtitle-fancy">Premium party rental equipment and professional setup services for weddings, birthdays, corporate events, and special celebrations. We bring your vision to life!</p>
        <div class="hero-stats">
            <div class="stat-item">
                <div class="stat-number">5000+</div>
                <div class="stat-label">Events Served</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">24/7</div>
                <div class="stat-label">Support Available</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">100%</div>
                <div class="stat-label">Satisfaction Guaranteed</div>
            </div>
        </div>
        <div class="hero-buttons">
            <a href="#services" class="btn-primary-fancy">
                <span>Browse Rentals</span>
                <i class="arrow-right">→</i>
            </a>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-secondary-fancy">
                <span>Get Free Quote</span>
                <i class="phone-icon">📞</i>
            </a>
        </div>
    </div>
    <div class="hero-image">
        <div class="floating-card card-1">🎪 Tents</div>
        <div class="floating-card card-2">🪑 Tables & Chairs</div>
        <div class="floating-card card-3">🎂 Party Supplies</div>
        <div class="floating-card card-4">� Lighting</div>
    </div>
</section>

<!-- Featured Services Categories -->
<section class="services-section-fancy" id="services">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Our Services</div>
            <h2 class="section-title-fancy">Everything You Need for <span class="gradient-text">Perfect Events</span></h2>
            <p class="section-subtitle-fancy">From intimate gatherings to grand celebrations, we have the equipment and expertise to make your event spectacular</p>
        </div>
        
        <div class="blueprints-grid">
            <!-- Tables & Chairs -->
            <div class="blueprint-category-card">
                <div class="category-icon">🪑</div>
                <h3>Tables & Chairs</h3>
                <p>Round, rectangular, cocktail tables with matching chairs</p>
                <div class="blueprint-count">25+ Options</div>
                <div class="startup-range">$8 - $15 per set</div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>#tables-chairs" class="category-btn">View Options</a>
            </div>
            
            <!-- Tents & Canopies -->
            <div class="blueprint-category-card featured">
                <div class="popular-badge">Most Popular</div>
                <div class="category-icon">🎪</div>
                <h3>Tents & Canopies</h3>
                <p>Weather protection for outdoor events, all sizes available</p>
                <div class="blueprint-count">15+ Sizes</div>
                <div class="startup-range">$150 - $800</div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>#tents" class="category-btn">View Options</a>
            </div>
            
            <!-- Wedding Packages -->
            <div class="blueprint-category-card">
                <div class="category-icon">�</div>
                <h3>Wedding Packages</h3>
                <p>Complete wedding rental packages with elegant décor</p>
                <div class="blueprint-count">5 Packages</div>
                <div class="startup-range">$500 - $2000</div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>#wedding" class="category-btn">View Options</a>
            </div>
            
            <!-- Party Entertainment -->
            <div class="blueprint-category-card">
                <div class="category-icon">�</div>
                <h3>Party Entertainment</h3>
                <p>Bounce houses, games, and interactive entertainment</p>
                <div class="blueprint-count">20+ Activities</div>
                <div class="startup-range">$200 - $500</div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>#entertainment" class="category-btn">View Options</a>
            </div>
            
            <!-- Event Lighting -->
            <div class="blueprint-category-card">
                <div class="category-icon">💡</div>
                <h3>Event Lighting</h3>
                <p>String lights, uplighting, and decorative illumination</p>
                <div class="blueprint-count">12+ Styles</div>
                <div class="startup-range">$75 - $300</div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>#lighting" class="category-btn">View Options</a>
            </div>
            
            <!-- Audio Visual -->
            <div class="blueprint-category-card">
                <div class="category-icon">�</div>
                <h3>Audio Visual</h3>
                <p>Sound systems, microphones, and projection equipment</p>
                <div class="blueprint-count">8+ Systems</div>
                <div class="startup-range">$100 - $400</div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>#audio-visual" class="category-btn">View Options</a>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="how-it-works-section">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">How It Works</div>
            <h2 class="section-title-fancy">Simple <span class="gradient-text">Rental Process</span></h2>
            <p class="section-subtitle-fancy">From booking to pickup, we handle everything so you can focus on enjoying your event</p>
        </div>
        
        <div class="steps-timeline">
            <div class="step-item">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h4>� Request Quote</h4>
                    <p>Contact us with your event details, date, and guest count for a personalized quote</p>
                </div>
            </div>
            
            <div class="step-item">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h4>� Plan Together</h4>
                    <p>We'll help you select the perfect items and create a custom package for your event</p>
                </div>
            </div>
            
            <div class="step-item">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h4>� Setup & Delivery</h4>
                    <p>Our professional team delivers and sets up everything before your event starts</p>
                </div>
            </div>
            
            <div class="step-item">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h4>🎉 Enjoy Your Event</h4>
                    <p>Relax and celebrate while we handle the logistics. We'll pick up everything afterward</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Packages Showcase -->
<section class="featured-blueprints-section">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Popular Packages</div>
            <h2 class="section-title-fancy">Ready-to-Go <span class="gradient-text">Event Packages</span></h2>
        </div>
        
        <div class="featured-blueprints-grid">
            <div class="featured-blueprint-card">
                <div class="blueprint-badge">🎂 Birthday</div>
                <h3>Birthday Bash Package</h3>
                <div class="profit-metrics">
                    <div class="metric">
                        <span class="metric-label">Package Price</span>
                        <span class="metric-value">$350</span>
                    </div>
                    <div class="metric">
                        <span class="metric-label">Serves</span>
                        <span class="metric-value">25-30 guests</span>
                    </div>
                </div>
                <p>Complete birthday setup with bounce house, tables, chairs, and party decorations.</p>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('pricing'))); ?>" class="blueprint-link">View Details →</a>
            </div>
            
            <div class="featured-blueprint-card popular">
                <div class="blueprint-badge popular">� Wedding</div>
                <h3>Elegant Wedding Package</h3>
                <div class="profit-metrics">
                    <div class="metric">
                        <span class="metric-label">Package Price</span>
                        <span class="metric-value">$1,200</span>
                    </div>
                    <div class="metric">
                        <span class="metric-label">Serves</span>
                        <span class="metric-value">100+ guests</span>
                    </div>
                </div>
                <p>Complete wedding reception setup with elegant linens, lighting, and dance floor.</p>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('pricing'))); ?>" class="blueprint-link">View Details →</a>
            </div>
            
            <div class="featured-blueprint-card">
                <div class="blueprint-badge">🏢 Corporate</div>
                <h3>Corporate Event Package</h3>
                <div class="profit-metrics">
                    <div class="metric">
                        <span class="metric-label">Package Price</span>
                        <span class="metric-value">$800</span>
                    </div>
                    <div class="metric">
                        <span class="metric-label">Serves</span>
                        <span class="metric-value">50-75 guests</span>
                    </div>
                </div>
                <p>Professional setup with presentation equipment, networking tables, and catering support.</p>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('pricing'))); ?>" class="blueprint-link">View Details →</a>
            </div>
        </div>
    </div>
</section>

<!-- Success Stories -->
<section class="testimonials-section">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Success Stories</div>
            <h2 class="section-title-fancy">What Our <span class="gradient-text">Customers Say</span></h2>
        </div>
        
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
                <div class="testimonial-text">"PartyPro made our wedding absolutely perfect! The setup was flawless and the team was incredibly professional. Our guests are still talking about how beautiful everything looked."</div>
                <div class="testimonial-author">
                    <div class="author-avatar">�</div>
                    <div class="author-info">
                        <div class="author-name">Sarah & Mike Johnson</div>
                        <div class="author-business">Wedding Celebration</div>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
                <div class="testimonial-text">"Amazing service for our daughter's 10th birthday! The bounce house was a huge hit and the setup was done quickly and professionally. Will definitely use again!"</div>
                <div class="testimonial-author">
                    <div class="author-avatar">👨‍👩‍�</div>
                    <div class="author-info">
                        <div class="author-name">Rodriguez Family</div>
                        <div class="author-business">Birthday Party</div>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
                <div class="testimonial-text">"Our corporate event was a huge success thanks to PartyPro. The tent saved us from unexpected rain and the AV equipment worked perfectly for our presentations."</div>
                <div class="testimonial-author">
                    <div class="author-avatar">�</div>
                    <div class="author-info">
                        <div class="author-name">David Chen</div>
                        <div class="author-business">TechStart Corp</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section-fancy">
    <div class="cta-background-pattern"></div>
    <div class="container">
        <div class="cta-content-fancy">
            <div class="cta-icon">🎉</div>
            <h2 class="cta-title-fancy">Ready to Plan Your <span class="gradient-text">Perfect Event?</span></h2>
            <p class="cta-subtitle-fancy">Get a free quote today and let us help you create an unforgettable celebration!</p>
            <div class="cta-buttons-fancy">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="cta-btn-primary">
                    <span>Get Free Quote</span>
                    <div class="btn-shine"></div>
                </a>
                <a href="tel:<?php echo esc_attr(str_replace([' ', '-', '(', ')'], '', get_theme_mod('contact_phone', '+919876543210'))); ?>" class="cta-btn-secondary">
                    <span>� Call Now</span>
                </a>
            </div>
            <div class="cta-trust-badges">
                <div class="trust-badge">✅ Licensed & Insured</div>
                <div class="trust-badge">✅ Professional Setup</div>
                <div class="trust-badge">✅ 5-Star Service</div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
