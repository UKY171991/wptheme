<?php
/*
Template Name: Services Page
*/
get_header(); ?>

<!-- Services Hero Section -->
<section class="services-hero-section">
    <div class="services-hero-bg"></div>
    <div class="container">
        <div class="services-hero-content">
            <div class="services-hero-badge">� Our Services</div>
            <h1 class="services-hero-title">Complete <span class="gradient-text">Home & Lifestyle Services</span></h1>
            <p class="services-hero-subtitle">From cleaning and maintenance to personal errands and business support - we handle it all with professionalism and care.</p>
            <div class="services-hero-stats">
                <div class="services-stat">
                    <div class="stat-icon">🧹</div>
                    <div class="stat-text">50+ Services</div>
                </div>
                <div class="services-stat">
                    <div class="stat-icon">✅</div>
                    <div class="stat-text">Licensed & Insured</div>
                </div>
                <div class="services-stat">
                    <div class="stat-icon">⭐</div>
                    <div class="stat-text">5-Star Rated</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section class="services-showcase-section">
    <div class="container">
        <div class="services-showcase-grid">
            <!-- Home & Cleaning Services -->
            <div class="service-card-enhanced cleaning-service">
                <div class="service-card-header">
                    <div class="service-icon-large">🧹</div>
                    <h3 class="service-title">Home & Cleaning Services</h3>
                    <p class="service-subtitle">Professional cleaning & maintenance solutions</p>
                </div>
                
                <div class="service-features">
                    <div class="feature-highlight">
                        <span class="feature-icon">✨</span>
                        <span>Spotless results guaranteed</span>
                    </div>
                    <div class="feature-list">
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>House cleaning (weekly, bi-weekly, monthly)</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Move-in/move-out cleaning</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Pressure washing (driveways, decks, siding)</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Gutter cleaning & maintenance</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Window cleaning (interior & exterior)</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Carpet shampooing & deep cleaning</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Garage/attic organization</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Trash hauling & junk removal</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Airbnb cleaning & reset services</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Lawn mowing and yard maintenance</span>
                        </div>
                    </div>
                </div>
                
                <div class="service-card-footer">
                    <div class="pricing-info">Starting at $75/visit</div>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-btn">Get Quote</a>
                </div>
            </div>
            
            <!-- Home & Property Maintenance -->
            <div class="service-card-enhanced maintenance-service">
                <div class="service-card-header">
                    <div class="service-icon-large">🧰</div>
                    <h3 class="service-title">Home & Property Maintenance</h3>
                    <p class="service-subtitle">Expert handyman & maintenance services</p>
                </div>
                
                <div class="service-features">
                    <div class="feature-highlight">
                        <span class="feature-icon">🔧</span>
                        <span>Professional craftsmanship</span>
                    </div>
                    <div class="feature-list">
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Furniture assembly</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>TV mounting</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Handyman services (minor repairs)</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Fence painting</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Light bulb/fixture installation</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Basic drywall patching</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Mailbox installation</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Holiday light hanging</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Lockout assistance</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Pool cleaning</span>
                        </div>
                    </div>
                </div>
                
                <div class="service-card-footer">
                    <div class="pricing-info">Starting at $65/hour</div>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-btn">Get Quote</a>
                </div>
            </div>
            
            <!-- Personal Errands & Concierge -->
            <div class="service-card-enhanced concierge-service">
                <div class="service-card-header">
                    <div class="service-icon-large">🛍️</div>
                    <h3 class="service-title">Personal Errands & Concierge</h3>
                    <p class="service-subtitle">Your personal assistant for daily tasks</p>
                </div>
                
                <div class="service-features">
                    <div class="feature-highlight">
                        <span class="feature-icon">⭐</span>
                        <span>Save time, live better</span>
                    </div>
                    <div class="feature-list">
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Grocery shopping/delivery</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Prescription pickup</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Waiting-in-line service</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Personal assistant service</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Moving assistance (loading/unloading)</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Courier/delivery services</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Dog waste cleanup</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Packing/unpacking service</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Decluttering service</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Plant watering (for traveling homeowners)</span>
                        </div>
                    </div>
                </div>
                
                <div class="service-card-footer">
                    <div class="pricing-info">Starting at $35/hour</div>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-btn">Get Quote</a>
                </div>
            </div>
            
            <!-- Pet & Animal Services -->
            <div class="service-card-enhanced pet-service">
                <div class="service-card-header">
                    <div class="service-icon-large">🐶</div>
                    <h3 class="service-title">Pet & Animal Services</h3>
                    <p class="service-subtitle">Loving care for your furry friends</p>
                </div>
                
                <div class="service-features">
                    <div class="feature-highlight">
                        <span class="feature-icon">❤️</span>
                        <span>Trusted pet care specialists</span>
                    </div>
                    <div class="feature-list">
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Dog walking</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Pet sitting</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Mobile pet grooming</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Pet poop scooping service</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Pet taxi (transporting pets to vet/groomer)</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Aquarium cleaning</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Pet yard deodorizing</span>
                        </div>
                    </div>
                </div>
                
                <div class="service-card-footer">
                    <div class="pricing-info">Starting at $25/visit</div>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-btn">Get Quote</a>
                </div>
            </div>
            
            <!-- Child & Family Support -->
            <div class="service-card-enhanced family-service">
                <div class="service-card-header">
                    <div class="service-icon-large">👶</div>
                    <h3 class="service-title">Child & Family Support</h3>
                    <p class="service-subtitle">Helping families with childcare needs</p>
                </div>
                
                <div class="service-features">
                    <div class="feature-highlight">
                        <span class="feature-icon">🏠</span>
                        <span>Safe & trusted family support</span>
                    </div>
                    <div class="feature-list">
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Parent helper/mother's helper</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Babysitting (unlicensed, informal)</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Toy organization service</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Home safety baby-proofing</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Birthday party setup & hosting</span>
                        </div>
                    </div>
                </div>
                
                <div class="service-card-footer">
                    <div class="pricing-info">Starting at $20/hour</div>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-btn">Get Quote</a>
                </div>
            </div>
            
            <!-- Creative & Digital Services -->
            <div class="service-card-enhanced creative-service">
                <div class="service-card-header">
                    <div class="service-icon-large">🎨</div>
                    <h3 class="service-title">Creative & Digital Services</h3>
                    <p class="service-subtitle">Professional design & digital solutions</p>
                </div>
                
                <div class="service-features">
                    <div class="feature-highlight">
                        <span class="feature-icon">🚀</span>
                        <span>Creative excellence delivered</span>
                    </div>
                    <div class="feature-list">
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Graphic design</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Social media management</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Content writing/blogging</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Photography services</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Videography for events</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Logo design</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Resume writing</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Voiceover work</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>T-shirt & merch design</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Basic website setup (Wix/Shopify)</span>
                        </div>
                    </div>
                </div>
                
                <div class="service-card-footer">
                    <div class="pricing-info">Starting at $85/project</div>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-btn">Get Quote</a>
                </div>
            </div>
            
            <!-- Coaching & Consulting -->
            <div class="service-card-enhanced coaching-service">
                <div class="service-card-header">
                    <div class="service-icon-large">🎓</div>
                    <h3 class="service-title">Coaching & Consulting</h3>
                    <p class="service-subtitle">Personal & professional development</p>
                </div>
                
                <div class="service-features">
                    <div class="feature-highlight">
                        <span class="feature-icon">💪</span>
                        <span>Unlock your potential</span>
                    </div>
                    <div class="feature-list">
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Business coaching</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Life coaching</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Marketing consulting</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Social media consulting</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Relationship coaching</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Productivity/time management coaching</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Accountability coaching</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Confidence or public speaking coaching</span>
                        </div>
                    </div>
                </div>
                
                <div class="service-card-footer">
                    <div class="pricing-info">Starting at $125/session</div>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-btn">Get Quote</a>
                </div>
            </div>
            
            <!-- Office & Admin Services -->
            <div class="service-card-enhanced office-service">
                <div class="service-card-header">
                    <div class="service-icon-large">💼</div>
                    <h3 class="service-title">Office & Admin Services</h3>
                    <p class="service-subtitle">Professional administrative support</p>
                </div>
                
                <div class="service-features">
                    <div class="feature-highlight">
                        <span class="feature-icon">📊</span>
                        <span>Streamline your operations</span>
                    </div>
                    <div class="feature-list">
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Virtual assistant</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Data entry</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Email inbox management</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Transcription services</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Online research assistant</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Bookkeeping</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>CRM/data organization setup</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Cold calling or appointment setting</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Customer service outsourcing</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Print-on-demand order management</span>
                        </div>
                    </div>
                </div>
                
                <div class="service-card-footer">
                    <div class="pricing-info">Starting at $45/hour</div>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-btn">Get Quote</a>
                </div>
            </div>
            
            <!-- Selling, Flipping & Setup -->
            <div class="service-card-enhanced setup-service">
                <div class="service-card-header">
                    <div class="service-icon-large">📦</div>
                    <h3 class="service-title">Selling, Flipping & Setup</h3>
                    <p class="service-subtitle">Business setup and selling solutions</p>
                </div>
                
                <div class="service-features">
                    <div class="feature-highlight">
                        <span class="feature-icon">💰</span>
                        <span>Maximize your profits</span>
                    </div>
                    <div class="feature-list">
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Furniture flipping</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Product sourcing for others</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Drop-off eBay/Amazon seller services</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Home office or gaming setup installer</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Party rental setup (tables, chairs, bounce houses)</span>
                        </div>
                    </div>
                </div>
                
                <div class="service-card-footer">
                    <div class="pricing-info">Starting at $150/project</div>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-btn">Get Quote</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Service Process Section -->
<section class="service-process-section">
    <div class="container">
        <div class="process-header">
            <div class="section-badge">⚡ Our Process</div>
            <h2 class="section-title-fancy">How We Deliver <span class="gradient-text">Exceptional Service</span></h2>
            <p class="section-subtitle-fancy">Simple steps to getting the help you need</p>
        </div>
        
        <div class="process-timeline">
            <div class="process-step">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h4>📞 Contact Us</h4>
                    <p>Reach out via phone, email, or our online form to discuss your needs</p>
                </div>
            </div>
            
            <div class="process-step">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h4>💰 Get Quote</h4>
                    <p>Receive a detailed quote tailored to your specific requirements</p>
                </div>
            </div>
            
            <div class="process-step">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h4>📅 Schedule Service</h4>
                    <p>Book your preferred date and time - flexible scheduling available</p>
                </div>
            </div>
            
            <div class="process-step">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h4>✅ Service Delivery</h4>
                    <p>Our professional team arrives on time and completes the work efficiently</p>
                </div>
            </div>
            
            <div class="process-step">
                <div class="step-number">5</div>
                <div class="step-content">
                    <h4>😊 Satisfaction Guaranteed</h4>
                    <p>We ensure you're completely satisfied with our service quality</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-section">
    <div class="container">
        <div class="why-choose-content">
            <div class="why-choose-text">
                <div class="section-badge">🌟 Why Choose Us</div>
                <h2 class="section-title-fancy">What Makes Us <span class="gradient-text">Different</span></h2>
                <p class="section-subtitle-fancy">We go above and beyond to ensure your satisfaction</p>
            </div>
            
            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-icon">🛡️</div>
                    <h4>Licensed & Insured</h4>
                    <p>Complete coverage and professional licensing for your peace of mind</p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">🔍</div>
                    <h4>Background Checked</h4>
                    <p>All team members undergo thorough background verification</p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">⭐</div>
                    <h4>5-Star Service</h4>
                    <p>Consistently rated excellent by our satisfied customers</p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">📞</div>
                    <h4>24/7 Support</h4>
                    <p>Customer support available whenever you need assistance</p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">💯</div>
                    <h4>Satisfaction Guarantee</h4>
                    <p>100% satisfaction guaranteed or we'll make it right</p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">⚡</div>
                    <h4>Quick Response</h4>
                    <p>Fast quotes and flexible scheduling to meet your needs</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="services-cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Get <span class="gradient-text">Started?</span></h2>
            <p>Contact us today for a free consultation and customized quote for any of our services</p>
            <div class="cta-buttons">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="cta-btn primary">
                    <span>Get Free Quote</span>
                    <div class="btn-glow"></div>
                </a>
                <a href="tel:+1234567890" class="cta-btn secondary">
                    <span>📞 Call (123) 456-7890</span>
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<script>
// Service card hover effects
document.addEventListener('DOMContentLoaded', function() {
    const serviceCards = document.querySelectorAll('.service-card-enhanced');
    
    serviceCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
    
    // Process timeline animation
    const processSteps = document.querySelectorAll('.process-step');
    
    const animateSteps = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    };
    
    const observer = new IntersectionObserver(animateSteps, {
        threshold: 0.1
    });
    
    processSteps.forEach(step => {
        step.style.opacity = '0';
        step.style.transform = 'translateY(20px)';
        step.style.transition = 'all 0.6s ease';
        observer.observe(step);
    });
});
</script>

<?php get_footer(); ?>
