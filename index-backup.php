<?php get_header(); ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title">🎉 Make Every Event Unforgettable</h1>
        <p class="hero-subtitle">Premium party rentals with professional setup services. From intimate gatherings to grand celebrations, we've got everything you need!</p>
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="cta-button">Explore Our Services</a>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="content-section">
    <div class="container">
        <h2 class="section-title">Our Party Rental Services</h2>
        <p class="section-subtitle">We provide everything you need to create magical moments that your guests will remember forever</p>
        
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">🪑</div>
                <h3 class="service-title">Tables & Chairs</h3>
                <p class="service-description">Elegant tables and comfortable chairs for any event size. From intimate dinners to large banquets, we have the perfect seating solutions.</p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">🏕️</div>
                <h3 class="service-title">Tents & Canopies</h3>
                <p class="service-description">Weather-proof tents and stylish canopies to keep your guests comfortable. Perfect for outdoor weddings and garden parties.</p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">🏰</div>
                <h3 class="service-title">Bounce Houses</h3>
                <p class="service-description">Fun and safe bounce houses that will keep kids entertained for hours. Various themes and sizes available for birthday parties.</p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">💡</div>
                <h3 class="service-title">Event Lighting</h3>
                <p class="service-description">Create the perfect ambiance with our professional lighting solutions. String lights, spotlights, and decorative lighting options.</p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">🎊</div>
                <h3 class="service-title">Decorations</h3>
                <p class="service-description">Beautiful centerpieces, backdrops, and themed decorations to transform any space into a celebration venue.</p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">🔧</div>
                <h3 class="service-title">Setup & Cleanup</h3>
                <p class="service-description">Professional setup and breakdown services. We handle everything so you can focus on enjoying your special day.</p>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="content-section pricing-section">
    <div class="container">
        <h2 class="section-title">Affordable Pricing Packages</h2>
        <p class="section-subtitle">Choose the perfect package for your event size and budget</p>
        
        <div class="pricing-grid">
            <div class="pricing-card">
                <h3 class="pricing-title">Basic Package</h3>
                <div class="pricing-price">₹15,000</div>
                <ul class="pricing-features">
                    <li>✓ Tables for 50 guests</li>
                    <li>✓ Chairs (50 pieces)</li>
                    <li>✓ Basic tablecloths</li>
                    <li>✓ Setup & cleanup</li>
                    <li>✓ 8-hour rental</li>
                </ul>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-primary">Book Now</a>
            </div>
            
            <div class="pricing-card featured">
                <div class="pricing-badge">Most Popular</div>
                <h3 class="pricing-title">Premium Package</h3>
                <div class="pricing-price">₹35,000</div>
                <ul class="pricing-features">
                    <li>✓ Tables for 100 guests</li>
                    <li>✓ Elegant chairs (100 pieces)</li>
                    <li>✓ Premium linens</li>
                    <li>✓ Tent/canopy setup</li>
                    <li>✓ Basic lighting</li>
                    <li>✓ Setup & cleanup</li>
                    <li>✓ 12-hour rental</li>
                </ul>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-secondary">Book Now</a>
            </div>
            
            <div class="pricing-card">
                <h3 class="pricing-title">Deluxe Package</h3>
                <div class="pricing-price">₹60,000</div>
                <ul class="pricing-features">
                    <li>✓ Tables for 150+ guests</li>
                    <li>✓ Premium furniture</li>
                    <li>✓ Luxury linens & decorations</li>
                    <li>✓ Large tent setup</li>
                    <li>✓ Professional lighting</li>
                    <li>✓ Bounce house (optional)</li>
                    <li>✓ Full-day rental</li>
                    <li>✓ Dedicated coordinator</li>
                </ul>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-primary">Book Now</a>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="content-section">
    <div class="container">
        <h2 class="section-title">Why Choose PartyPro?</h2>
        
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">⚡</div>
                <h3 class="service-title">Quick Setup</h3>
                <p class="service-description">Professional team ensures fast and efficient setup, so your event starts on time.</p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">💎</div>
                <h3 class="service-title">Quality Equipment</h3>
                <p class="service-description">Well-maintained, clean, and modern equipment that enhances your event's appearance.</p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">💰</div>
                <h3 class="service-title">Affordable Prices</h3>
                <p class="service-description">Competitive pricing with transparent costs. No hidden fees or surprise charges.</p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">🤝</div>
                <h3 class="service-title">Reliable Service</h3>
                <p class="service-description">On-time delivery and pickup with professional customer service throughout.</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="content-section bg-primary text-white">
    <div class="container text-center">
        <h2 class="section-title" style="color: white;">Ready to Plan Your Event?</h2>
        <p class="section-subtitle" style="color: rgba(255,255,255,0.9);">Get in touch with us today for a free quote and let's make your celebration amazing!</p>
        
        <div style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap; margin-top: 2rem;">
            <a href="tel:<?php echo esc_attr(get_theme_mod('contact_phone', '+919876543210')); ?>" class="btn btn-secondary">
                <i class="fas fa-phone"></i> Call Now: <?php echo esc_html(get_theme_mod('contact_phone', '+91 98765 43210')); ?>
            </a>
            <a href="https://wa.me/<?php echo esc_attr(str_replace(['+', ' ', '-'], '', get_theme_mod('contact_phone', '919876543210'))); ?>" class="btn btn-secondary">
                <i class="fab fa-whatsapp"></i> WhatsApp Us
            </a>
            <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'info@partyprorentals.com')); ?>" class="btn btn-secondary">
                <i class="fas fa-envelope"></i> Email Quote
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
