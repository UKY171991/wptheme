<?php
/*
Template Name: Pricing Page
*/
get_header(); ?>

<!-- Pricing Hero Section -->
<section class="pricing-hero-section">
    <div class="pricing-hero-bg"></div>
    <div class="container">
        <div class="pricing-hero-content">
            <div class="pricing-hero-badge">💰 Event Pricing</div>
            <h1 class="pricing-hero-title">Transparent <span class="gradient-text">Event Pricing</span></h1>
            <p class="pricing-hero-subtitle">Professional party rental equipment at affordable prices. No hidden fees, no surprises - just honest pricing for unforgettable events.</p>
            <div class="pricing-hero-features">
                <div class="pricing-feature">
                    <div class="feature-icon">✅</div>
                    <div class="feature-text">No Hidden Fees</div>
                </div>
                <div class="pricing-feature">
                    <div class="feature-icon">🚚</div>
                    <div class="feature-text">Setup Included</div>
                </div>
                <div class="pricing-feature">
                    <div class="feature-icon">💬</div>
                    <div class="feature-text">Free Consultation</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Event Packages -->
<section class="packages-section">
    <div class="container">
        <div class="packages-header">
            <div class="section-badge">🎉 Popular Packages</div>
            <h2 class="section-title-fancy">Complete <span class="gradient-text">Event Packages</span></h2>
            <p class="section-subtitle-fancy">Everything you need for your event in one convenient package</p>
        </div>
        
        <div class="packages-grid">
            <div class="package-card basic">
                <div class="package-header">
                    <h3>🎂 Birthday Bash</h3>
                    <div class="package-price">
                        <span class="currency">$</span>
                        <span class="amount">350</span>
                    </div>
                    <div class="package-guests">Perfect for 25-30 guests</div>
                </div>
                <ul class="package-features">
                    <li>✅ 4 round tables (60")</li>
                    <li>✅ 30 chiavari chairs</li>
                    <li>✅ Table linens (color choice)</li>
                    <li>✅ 1 bounce house</li>
                    <li>✅ Basic party decorations</li>
                    <li>✅ Setup & breakdown</li>
                    <li>✅ 6-hour rental</li>
                </ul>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="package-btn">Book This Package</a>
            </div>

            <div class="package-card premium popular">
                <div class="popularity-badge">Most Popular</div>
                <div class="package-header">
                    <h3>💍 Elegant Wedding</h3>
                    <div class="package-price">
                        <span class="currency">$</span>
                        <span class="amount">1,200</span>
                    </div>
                    <div class="package-guests">Perfect for 100+ guests</div>
                </div>
                <ul class="package-features">
                    <li>✅ 12 round tables (72")</li>
                    <li>✅ 120 chiavari chairs</li>
                    <li>✅ Premium linens & runners</li>
                    <li>✅ Wedding arch setup</li>
                    <li>✅ String lights package</li>
                    <li>✅ Dance floor (16x16)</li>
                    <li>✅ Bridal lounge area</li>
                    <li>✅ Professional coordination</li>
                    <li>✅ Full day rental</li>
                </ul>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="package-btn">Book This Package</a>
            </div>

            <div class="package-card enterprise">
                <div class="package-header">
                    <h3>🏢 Corporate Event</h3>
                    <div class="package-price">
                        <span class="currency">$</span>
                        <span class="amount">800</span>
                    </div>
                    <div class="package-guests">Perfect for 50-75 guests</div>
                </div>
                <ul class="package-features">
                    <li>✅ 8 rectangular tables</li>
                    <li>✅ 80 folding chairs</li>
                    <li>✅ Professional linens</li>
                    <li>✅ 20x30 tent</li>
                    <li>✅ PA system & microphones</li>
                    <li>✅ Projection screen</li>
                    <li>✅ Professional lighting</li>
                    <li>✅ Networking setup</li>
                    <li>✅ 8-hour rental</li>
                </ul>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="package-btn">Book This Package</a>
            </div>
        </div>
    </div>
</section>

<!-- Individual Item Pricing -->
<section class="individual-pricing-section">
    <div class="container">
        <div class="pricing-category-tabs">
            <button class="tab-btn active" data-category="tables-chairs">🪑 Tables & Chairs</button>
            <button class="tab-btn" data-category="tents">🎪 Tents</button>
            <button class="tab-btn" data-category="entertainment">🎠 Entertainment</button>
            <button class="tab-btn" data-category="lighting">💡 Lighting</button>
            <button class="tab-btn" data-category="audio-visual">🎵 A/V Equipment</button>
            <button class="tab-btn" data-category="decor">🎨 Décor</button>
        </div>

        <!-- Tables & Chairs Pricing -->
        <div class="pricing-category-content active" id="tables-chairs">
            <div class="category-header">
                <h2>🪑 Tables & Chairs</h2>
                <p>Professional seating and dining solutions for any event</p>
            </div>
            
            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Round Tables</h3>
                        <div class="price">$8-15</div>
                        <div class="price-unit">per table</div>
                    </div>
                    <ul class="pricing-features">
                        <li>48" (seats 6) - $8</li>
                        <li>60" (seats 8) - $12</li>
                        <li>72" (seats 10) - $15</li>
                        <li>Clean and professional</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Rectangular Tables</h3>
                        <div class="price">$10-14</div>
                        <div class="price-unit">per table</div>
                    </div>
                    <ul class="pricing-features">
                        <li>6ft (seats 6) - $10</li>
                        <li>8ft (seats 8) - $14</li>
                        <li>Perfect for buffets</li>
                        <li>Sturdy construction</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Cocktail Tables</h3>
                        <div class="price">$12-18</div>
                        <div class="price-unit">per table</div>
                    </div>
                    <ul class="pricing-features">
                        <li>30" high - $12</li>
                        <li>36" high - $15</li>
                        <li>42" high - $18</li>
                        <li>Great for networking</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Chiavari Chairs</h3>
                        <div class="price">$4-6</div>
                        <div class="price-unit">per chair</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Gold finish - $6</li>
                        <li>Silver finish - $5</li>
                        <li>White finish - $4</li>
                        <li>Elegant design</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Folding Chairs</h3>
                        <div class="price">$2-3</div>
                        <div class="price-unit">per chair</div>
                    </div>
                    <ul class="pricing-features">
                        <li>White padded - $3</li>
                        <li>Black padded - $3</li>
                        <li>Basic white - $2</li>
                        <li>Comfortable seating</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Table Linens</h3>
                        <div class="price">$8-15</div>
                        <div class="price-unit">per linen</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Basic colors - $8</li>
                        <li>Premium colors - $12</li>
                        <li>Specialty linens - $15</li>
                        <li>Many colors available</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Tents Pricing -->
        <div class="pricing-category-content" id="tents">
            <div class="category-header">
                <h2>🎪 Tents & Canopies</h2>
                <p>Weather protection for outdoor events of all sizes</p>
            </div>
            
            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Pop-up Canopies</h3>
                        <div class="price">$75-120</div>
                        <div class="price-unit">per day</div>
                    </div>
                    <ul class="pricing-features">
                        <li>10x10 - $75</li>
                        <li>10x20 - $120</li>
                        <li>Quick setup</li>
                        <li>Great for small events</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Frame Tents</h3>
                        <div class="price">$150-600</div>
                        <div class="price-unit">per day</div>
                    </div>
                    <ul class="pricing-features">
                        <li>20x20 - $150</li>
                        <li>20x30 - $220</li>
                        <li>30x40 - $400</li>
                        <li>40x60 - $600</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Pole Tents</h3>
                        <div class="price">$200-500</div>
                        <div class="price-unit">per day</div>
                    </div>
                    <ul class="pricing-features">
                        <li>20x30 - $200</li>
                        <li>30x45 - $350</li>
                        <li>30x60 - $500</li>
                        <li>Classic elegant look</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Sidewalls</h3>
                        <div class="price">$25-40</div>
                        <div class="price-unit">per panel</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Solid panels - $25</li>
                        <li>Window panels - $35</li>
                        <li>French door - $40</li>
                        <li>Weather protection</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Entertainment Pricing -->
        <div class="pricing-category-content" id="entertainment">
            <div class="category-header">
                <h2>🎠 Entertainment & Activities</h2>
                <p>Fun activities and entertainment for all ages</p>
            </div>
            
            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Bounce Houses</h3>
                        <div class="price">$200-350</div>
                        <div class="price-unit">per day</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Standard size - $200</li>
                        <li>Large size - $280</li>
                        <li>Themed designs - $350</li>
                        <li>Safety mats included</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Water Slides</h3>
                        <div class="price">$400-650</div>
                        <div class="price-unit">per day</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Medium slide - $400</li>
                        <li>Large slide - $550</li>
                        <li>Dual lane - $650</li>
                        <li>Summer fun!</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Photo Booths</h3>
                        <div class="price">$300-500</div>
                        <div class="price-unit">per event</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Basic setup - $300</li>
                        <li>Premium setup - $500</li>
                        <li>Props included</li>
                        <li>Instant prints</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Giant Games</h3>
                        <div class="price">$50-85</div>
                        <div class="price-unit">per game</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Giant Jenga - $50</li>
                        <li>Connect Four - $65</li>
                        <li>Cornhole set - $75</li>
                        <li>Ring toss - $85</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Lighting Pricing -->
        <div class="pricing-category-content" id="lighting">
            <div class="category-header">
                <h2>💡 Event Lighting</h2>
                <p>Create the perfect ambiance for your celebration</p>
            </div>
            
            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>String Light Package</h3>
                        <div class="price">$150-300</div>
                        <div class="price-unit">per package</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Café lights - $150</li>
                        <li>Edison bulbs - $200</li>
                        <li>Fairy lights - $250</li>
                        <li>Custom design - $300</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Uplighting</h3>
                        <div class="price">$25-35</div>
                        <div class="price-unit">per light</div>
                    </div>
                    <ul class="pricing-features">
                        <li>LED color changing</li>
                        <li>Wireless control</li>
                        <li>12+ color options</li>
                        <li>Professional setup</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Chandeliers</h3>
                        <div class="price">$85-200</div>
                        <div class="price-unit">per chandelier</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Crystal style - $85</li>
                        <li>Rustic style - $120</li>
                        <li>Premium style - $200</li>
                        <li>Elegant focal point</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Spotlights</h3>
                        <div class="price">$40-65</div>
                        <div class="price-unit">per light</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Pin spotlights - $40</li>
                        <li>Wash lights - $55</li>
                        <li>Gobo projectors - $65</li>
                        <li>Highlight features</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Audio Visual Pricing -->
        <div class="pricing-category-content" id="audio-visual">
            <div class="category-header">
                <h2>🎵 Audio Visual Equipment</h2>
                <p>Professional sound and presentation equipment</p>
            </div>
            
            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>PA System</h3>
                        <div class="price">$150-350</div>
                        <div class="price-unit">per day</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Basic setup - $150</li>
                        <li>Premium setup - $250</li>
                        <li>Large venue - $350</li>
                        <li>Microphones included</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Wireless Microphones</h3>
                        <div class="price">$40-60</div>
                        <div class="price-unit">per mic</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Handheld - $40</li>
                        <li>Lapel/headset - $50</li>
                        <li>Premium wireless - $60</li>
                        <li>Crystal clear audio</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Projector & Screen</h3>
                        <div class="price">$200-400</div>
                        <div class="price-unit">per day</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Basic projector - $200</li>
                        <li>HD projector - $300</li>
                        <li>4K projector - $400</li>
                        <li>Screen included</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>DJ Equipment</h3>
                        <div class="price">$250-500</div>
                        <div class="price-unit">per day</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Basic setup - $250</li>
                        <li>Professional - $400</li>
                        <li>Premium setup - $500</li>
                        <li>Mixing board included</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Decor Pricing -->
        <div class="pricing-category-content" id="decor">
            <div class="category-header">
                <h2>🎨 Décor & Accessories</h2>
                <p>Beautiful decorative elements to enhance your event</p>
            </div>
            
            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Wedding Arch</h3>
                        <div class="price">$150-350</div>
                        <div class="price-unit">per arch</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Basic arch - $150</li>
                        <li>Decorated arch - $250</li>
                        <li>Premium floral - $350</li>
                        <li>Setup included</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Centerpieces</h3>
                        <div class="price">$25-75</div>
                        <div class="price-unit">per piece</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Simple design - $25</li>
                        <li>Medium design - $45</li>
                        <li>Elaborate design - $75</li>
                        <li>Custom options</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Backdrop</h3>
                        <div class="price">$125-300</div>
                        <div class="price-unit">per backdrop</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Fabric backdrop - $125</li>
                        <li>Floral wall - $250</li>
                        <li>Custom design - $300</li>
                        <li>Photo-ready</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Dance Floor</h3>
                        <div class="price">$200-500</div>
                        <div class="price-unit">per floor</div>
                    </div>
                    <ul class="pricing-features">
                        <li>12x12 - $200</li>
                        <li>16x16 - $350</li>
                        <li>20x20 - $500</li>
                        <li>Professional grade</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional Services -->
<section class="additional-services-section">
    <div class="container">
        <div class="services-header">
            <div class="section-badge">🚚 Additional Services</div>
            <h2 class="section-title-fancy">Complete <span class="gradient-text">Event Support</span></h2>
        </div>
        
        <div class="additional-services-grid">
            <div class="service-item">
                <div class="service-icon">🚚</div>
                <h4>Delivery & Setup</h4>
                <p class="service-price">$75-150</p>
                <p>Professional delivery, setup, and breakdown services</p>
            </div>
            
            <div class="service-item">
                <div class="service-icon">📋</div>
                <h4>Event Coordination</h4>
                <p class="service-price">$200-500</p>
                <p>Full event planning and day-of coordination</p>
            </div>
            
            <div class="service-item">
                <div class="service-icon">🛡️</div>
                <h4>Event Insurance</h4>
                <p class="service-price">$50-100</p>
                <p>Additional coverage for larger events</p>
            </div>
            
            <div class="service-item">
                <div class="service-icon">🕐</div>
                <h4>Emergency Support</h4>
                <p class="service-price">Included</p>
                <p>24/7 emergency contact during your event</p>
            </div>
        </div>
    </div>
</section>

<!-- Pricing CTA -->
<section class="pricing-cta-section">
    <div class="container">
        <div class="pricing-cta-content">
            <h2>Ready to Plan Your <span class="gradient-text">Perfect Event?</span></h2>
            <p>Get a custom quote tailored to your specific event needs and budget</p>
            <div class="pricing-cta-buttons">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="cta-btn primary">
                    <span>Get Custom Quote</span>
                    <div class="btn-glow"></div>
                </a>
                <a href="tel:<?php echo esc_attr(str_replace([' ', '-', '(', ')'], '', get_theme_mod('contact_phone', '+919876543210'))); ?>" class="cta-btn secondary">
                    <span>📞 Call for Pricing</span>
                </a>
            </div>
            
            <div class="pricing-guarantee">
                <div class="guarantee-item">
                    <span class="guarantee-icon">💰</span>
                    <span>Best Price Guarantee</span>
                </div>
                <div class="guarantee-item">
                    <span class="guarantee-icon">🛡️</span>
                    <span>Licensed & Insured</span>
                </div>
                <div class="guarantee-item">
                    <span class="guarantee-icon">⭐</span>
                    <span>5-Star Service</span>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.pricing-hero-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 4rem 0;
    color: white;
    text-align: center;
    position: relative;
}

.pricing-hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="pricing" patternUnits="userSpaceOnUse" width="20" height="20"><circle cx="10" cy="10" r="2" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23pricing)"/></svg>');
}

.pricing-hero-content {
    position: relative;
    z-index: 2;
}

.pricing-hero-badge {
    display: inline-block;
    background: rgba(255,255,255,0.2);
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-size: 0.9rem;
    margin-bottom: 1rem;
}

.pricing-hero-title {
    font-size: 3rem;
    font-weight: bold;
    margin-bottom: 1rem;
}

.pricing-hero-subtitle {
    font-size: 1.2rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto 2rem;
}

.pricing-hero-features {
    display: flex;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
}

.pricing-feature {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255,255,255,0.1);
    padding: 0.5rem 1rem;
    border-radius: 25px;
}

.packages-section {
    padding: 4rem 0;
    background: #f8f9fa;
}

.packages-header {
    text-align: center;
    margin-bottom: 3rem;
}

.packages-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    max-width: 1200px;
    margin: 0 auto;
}

.package-card {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    position: relative;
    transition: transform 0.3s ease;
}

.package-card:hover {
    transform: translateY(-5px);
}

.package-card.popular {
    border: 3px solid #f1c40f;
    transform: scale(1.05);
}

.popularity-badge {
    position: absolute;
    top: -10px;
    left: 50%;
    transform: translateX(-50%);
    background: #f1c40f;
    color: #333;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-weight: bold;
    font-size: 0.8rem;
}

.package-header {
    text-align: center;
    margin-bottom: 2rem;
}

.package-header h3 {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    color: #333;
}

.package-price {
    display: flex;
    align-items: baseline;
    justify-content: center;
    gap: 0.2rem;
}

.currency {
    font-size: 1.5rem;
    color: #667eea;
}

.amount {
    font-size: 3rem;
    font-weight: bold;
    color: #333;
}

.package-guests {
    color: #666;
    margin-top: 0.5rem;
}

.package-features {
    list-style: none;
    padding: 0;
    margin-bottom: 2rem;
}

.package-features li {
    padding: 0.5rem 0;
    border-bottom: 1px solid #eee;
}

.package-btn {
    display: block;
    width: 100%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    text-align: center;
    padding: 1rem;
    border-radius: 25px;
    text-decoration: none;
    font-weight: bold;
    transition: transform 0.3s ease;
}

.package-btn:hover {
    transform: translateY(-2px);
}

.individual-pricing-section {
    padding: 4rem 0;
}

.pricing-category-tabs {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 3rem;
    flex-wrap: wrap;
}

.tab-btn {
    background: #f8f9fa;
    border: 2px solid #e1e5e9;
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.3s ease;
}

.tab-btn.active,
.tab-btn:hover {
    background: #667eea;
    color: white;
    border-color: #667eea;
}

.pricing-category-content {
    display: none;
}

.pricing-category-content.active {
    display: block;
}

.category-header {
    text-align: center;
    margin-bottom: 3rem;
}

.pricing-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.pricing-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.pricing-card:hover {
    transform: translateY(-5px);
}

.pricing-header {
    text-align: center;
    margin-bottom: 1.5rem;
}

.pricing-header h3 {
    font-size: 1.3rem;
    margin-bottom: 1rem;
    color: #333;
}

.price {
    font-size: 2rem;
    font-weight: bold;
    color: #667eea;
}

.price-unit {
    color: #666;
    font-size: 0.9rem;
}

.pricing-features {
    list-style: none;
    padding: 0;
}

.pricing-features li {
    padding: 0.5rem 0;
    color: #666;
}

.additional-services-section {
    padding: 4rem 0;
    background: #f8f9fa;
}

.additional-services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.service-item {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.service-icon {
    font-size: 2rem;
    margin-bottom: 1rem;
}

.service-price {
    font-size: 1.2rem;
    font-weight: bold;
    color: #667eea;
    margin: 0.5rem 0;
}

.pricing-cta-section {
    padding: 4rem 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    text-align: center;
}

.pricing-cta-content h2 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.pricing-cta-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    margin: 2rem 0;
    flex-wrap: wrap;
}

.cta-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem 2rem;
    border-radius: 25px;
    text-decoration: none;
    font-weight: bold;
    transition: transform 0.3s ease;
    position: relative;
}

.cta-btn.primary {
    background: #f1c40f;
    color: #333;
}

.cta-btn.secondary {
    background: rgba(255,255,255,0.2);
    color: white;
    border: 2px solid white;
}

.cta-btn:hover {
    transform: translateY(-2px);
}

.pricing-guarantee {
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin-top: 2rem;
    flex-wrap: wrap;
}

.guarantee-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255,255,255,0.1);
    padding: 0.5rem 1rem;
    border-radius: 25px;
}

@media (max-width: 768px) {
    .pricing-hero-title {
        font-size: 2rem;
    }
    
    .pricing-hero-features {
        gap: 1rem;
    }
    
    .packages-grid {
        grid-template-columns: 1fr;
    }
    
    .package-card.popular {
        transform: none;
    }
    
    .pricing-category-tabs {
        gap: 0.5rem;
    }
    
    .tab-btn {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
    }
    
    .pricing-cta-content h2 {
        font-size: 2rem;
    }
    
    .pricing-cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .guarantee-item {
        font-size: 0.9rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.tab-btn');
    const contents = document.querySelectorAll('.pricing-category-content');
    
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const category = this.dataset.category;
            
            // Remove active class from all tabs and contents
            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(c => c.classList.remove('active'));
            
            // Add active class to clicked tab and corresponding content
            this.classList.add('active');
            document.getElementById(category).classList.add('active');
        });
    });
});
</script>

<?php get_footer(); ?>
