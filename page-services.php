<?php
/*
Template Name: Services Page
*/
get_header(); ?>

<!-- Fancy Services Hero Section -->
<section class="services-hero-section">
    <div class="services-hero-bg"></div>
    <div class="container">
        <div class="services-hero-content">
            <div class="services-hero-badge">🎪 Our Services</div>
            <h1 class="services-hero-title">Complete <span class="gradient-text">Home & Event Services</span></h1>
            <p class="services-hero-subtitle">From party rentals to home maintenance, cleaning services to personal assistance - we're your one-stop solution for all your home and event needs.</p>
            <div class="services-hero-stats">
                <div class="services-stat">
                    <div class="stat-icon">📦</div>
                    <div class="stat-text">1000+ Items</div>
                </div>
                <div class="services-stat">
                    <div class="stat-icon">🚚</div>
                    <div class="stat-text">Free Setup</div>
                </div>
                <div class="services-stat">
                    <div class="stat-icon">🛡️</div>
                    <div class="stat-text">Insured</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Enhanced Services Grid -->
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
                        <div class="feature-item">🏠 House cleaning</div>
                        <div class="feature-item">📦 Move-in/move-out cleaning</div>
                        <div class="feature-item">💨 Pressure washing</div>
                        <div class="feature-item">🌊 Gutter cleaning</div>
                        <div class="feature-item">🪟 Window cleaning</div>
                        <div class="feature-item">🧽 Carpet shampooing</div>
                        <div class="feature-item">📚 Garage/attic organization</div>
                        <div class="feature-item">🗑️ Trash hauling & junk removal</div>
                        <div class="feature-item">🏨 Airbnb cleaning & reset</div>
                        <div class="feature-item">🌱 Lawn mowing & yard maintenance</div>
                    </div>
                </div>
                
                <div class="service-pricing">
                    <span class="price-from">Starting from</span>
                    <span class="price-amount">$75</span>
                </div>
                
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-btn">Get Quote</a>
            </div>
            
            <!-- Home & Property Maintenance -->
            <div class="service-card-enhanced maintenance-service">
                <div class="service-card-header">
                    <div class="service-icon-large">�</div>
                    <h3 class="service-title">Home & Property Maintenance</h3>
                    <p class="service-subtitle">Expert handyman & maintenance services</p>
                </div>
                
                <div class="service-features">
                    <div class="feature-highlight">
                        <span class="feature-icon">�</span>
                        <span>Professional craftsmanship</span>
                    </div>
                    <div class="feature-list">
                        <div class="feature-item">🪑 Furniture assembly</div>
                        <div class="feature-item">📺 TV mounting</div>
                        <div class="feature-item">🔨 Handyman services (minor repairs)</div>
                        <div class="feature-item">🎨 Fence painting</div>
                        <div class="feature-item">💡 Light bulb/fixture installation</div>
                        <div class="feature-item">🧱 Basic drywall patching</div>
                        <div class="feature-item">📮 Mailbox installation</div>
                        <div class="feature-item">🎄 Holiday light hanging</div>
                        <div class="feature-item">🔑 Lockout assistance</div>
                        <div class="feature-item">🏊 Pool cleaning</div>
                    </div>
                </div>
                
                <div class="service-pricing">
                    <span class="price-from">Starting from</span>
                    <span class="price-amount">$65</span>
                </div>
                
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-btn">Get Quote</a>
            </div>
            
            <!-- Personal Errands & Concierge -->
            <div class="service-card-enhanced concierge-service">
                <div class="service-card-header">
                    <div class="service-icon-large">�️</div>
                    <h3 class="service-title">Personal Errands & Concierge</h3>
                    <p class="service-subtitle">Your personal assistant for daily tasks</p>
                </div>
                
                <div class="service-features">
                    <div class="feature-highlight">
                        <span class="feature-icon">⭐</span>
                        <span>Save time, live better</span>
                    </div>
                    <div class="feature-list">
                        <div class="feature-item">🛒 Grocery shopping/delivery</div>
                        <div class="feature-item">💊 Prescription pickup</div>
                        <div class="feature-item">⏰ Waiting-in-line service</div>
                        <div class="feature-item">👨‍💼 Personal assistant service</div>
                        <div class="feature-item">📦 Moving assistance</div>
                        <div class="feature-item">🚚 Courier/delivery services</div>
                        <div class="feature-item">🐕 Dog waste cleanup</div>
                        <div class="feature-item">📦 Packing/unpacking service</div>
                        <div class="feature-item">🗂️ Decluttering service</div>
                        <div class="feature-item">🌿 Plant watering (travel)</div>
                    </div>
                </div>
                
                <div class="service-pricing">
                    <span class="price-from">Starting from</span>
                    <span class="price-amount">$35</span>
                </div>
                
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-btn">Get Quote</a>
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
                        <div class="feature-item">🐕 Dog walking</div>
                        <div class="feature-item">🏠 Pet sitting</div>
                        <div class="feature-item">🛁 Mobile pet grooming</div>
                        <div class="feature-item">💩 Pet poop scooping service</div>
                        <div class="feature-item">🚗 Pet taxi (vet/groomer transport)</div>
                        <div class="feature-item">🐠 Aquarium cleaning</div>
                        <div class="feature-item">🌬️ Pet yard deodorizing</div>
                    </div>
                </div>
                
                <div class="service-pricing">
                    <span class="price-from">Starting from</span>
                    <span class="price-amount">$25</span>
                </div>
                
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-btn">Get Quote</a>
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
                        <span class="feature-icon">�</span>
                        <span>Safe & trusted family support</span>
                    </div>
                    <div class="feature-list">
                        <div class="feature-item">👥 Parent helper/mother's helper</div>
                        <div class="feature-item">👶 Babysitting (informal)</div>
                        <div class="feature-item">🧸 Toy organization service</div>
                        <div class="feature-item">🔒 Home safety baby-proofing</div>
                        <div class="feature-item">🎉 Birthday party setup & hosting</div>
                    </div>
                </div>
                
                <div class="service-pricing">
                    <span class="price-from">Starting from</span>
                    <span class="price-amount">$20</span>
                </div>
                
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-btn">Get Quote</a>
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
                        <div class="feature-item">🎨 Graphic design</div>
                        <div class="feature-item">📱 Social media management</div>
                        <div class="feature-item">✍️ Content writing/blogging</div>
                        <div class="feature-item">📸 Photography</div>
                        <div class="feature-item">🎥 Videography for events</div>
                        <div class="feature-item">🎯 Logo design</div>
                        <div class="feature-item">📄 Resume writing</div>
                        <div class="feature-item">🎙️ Voiceover work</div>
                        <div class="feature-item">👕 T-shirt & merch design</div>
                        <div class="feature-item">💻 Basic website setup</div>
                    </div>
                </div>
                
                <div class="service-pricing">
                    <span class="price-from">Starting from</span>
                    <span class="price-amount">$85</span>
                </div>
                
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-btn">Get Quote</a>
            </div>
            
            <!-- Coaching & Consulting -->
            <div class="service-card-enhanced coaching-service">
                <div class="service-card-header">
                    <div class="service-icon-large">�</div>
                    <h3 class="service-title">Coaching & Consulting</h3>
                    <p class="service-subtitle">Personal & professional development</p>
                </div>
                
                <div class="service-features">
                    <div class="feature-highlight">
                        <span class="feature-icon">💪</span>
                        <span>Unlock your potential</span>
                    </div>
                    <div class="feature-list">
                        <div class="feature-item">🏢 Business coaching</div>
                        <div class="feature-item">🌟 Life coaching</div>
                        <div class="feature-item">📈 Marketing consulting</div>
                        <div class="feature-item">📱 Social media consulting</div>
                        <div class="feature-item">💕 Relationship coaching</div>
                        <div class="feature-item">⏱️ Productivity/time management</div>
                        <div class="feature-item">✅ Accountability coaching</div>
                        <div class="feature-item">🎤 Confidence/public speaking</div>
                    </div>
                </div>
                
                <div class="service-pricing">
                    <span class="price-from">Starting from</span>
                    <span class="price-amount">$125</span>
                </div>
                
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-btn">Get Quote</a>
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
                        <div class="feature-item">💻 Virtual assistant</div>
                        <div class="feature-item">⌨️ Data entry</div>
                        <div class="feature-item">📧 Email inbox management</div>
                        <div class="feature-item">🎧 Transcription services</div>
                        <div class="feature-item">🔍 Online research assistant</div>
                        <div class="feature-item">📚 Bookkeeping</div>
                        <div class="feature-item">🗂️ CRM/data organization setup</div>
                        <div class="feature-item">☎️ Cold calling/appointment setting</div>
                        <div class="feature-item">🎧 Customer service outsourcing</div>
                        <div class="feature-item">📦 Print-on-demand order management</div>
                    </div>
                </div>
                
                <div class="service-pricing">
                    <span class="price-from">Starting from</span>
                    <span class="price-amount">$45</span>
                </div>
                
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-btn">Get Quote</a>
            </div>
            
            <!-- Party Rental Setup -->
            <div class="service-card-enhanced rental-service">
                <div class="service-card-header">
                    <div class="service-icon-large">🎪</div>
                    <h3 class="service-title">Party Rental & Setup</h3>
                    <p class="service-subtitle">Complete event rental solutions</p>
                </div>
                
                <div class="service-features">
                    <div class="feature-highlight">
                        <span class="feature-icon">🎉</span>
                        <span>Unforgettable celebrations</span>
                    </div>
                    <div class="feature-list">
                        <div class="feature-item">🪑 Furniture flipping</div>
                        <div class="feature-item">🛒 Product sourcing</div>
                        <div class="feature-item">💰 eBay/Amazon seller services</div>
                        <div class="feature-item">🏢 Home office setup</div>
                        <div class="feature-item">🎮 Gaming setup installer</div>
                        <div class="feature-item">🎪 Party rental setup</div>
                        <div class="feature-item">🏰 Bounce house setup</div>
                        <div class="feature-item">🪑 Tables & chairs rental</div>
                    </div>
                </div>
                
                <div class="service-pricing">
                    <span class="price-from">Starting from</span>
                    <span class="price-amount">$150</span>
                </div>
                
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-btn">Get Quote</a>
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
                    <h4>📞 Consultation</h4>
                    <p>Tell us about your vision and we'll help you plan the perfect setup</p>
                </div>
            </div>
            
            <div class="process-step">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h4>💰 Custom Quote</h4>
                    <p>Receive a detailed quote tailored to your specific needs and budget</p>
                </div>
            </div>
            
            <div class="process-step">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h4>📅 Schedule</h4>
                    <p>Book your date and we'll handle all the logistics and coordination</p>
                </div>
            </div>
            
            <div class="process-step">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h4>🚚 Delivery & Setup</h4>
                    <p>Our team arrives early to set up everything perfectly for your event</p>
                </div>
            </div>
            
            <div class="process-step">
                <div class="step-number">5</div>
                <div class="step-content">
                    <h4>🎉 Enjoy Your Event</h4>
                    <p>Relax and enjoy while we handle everything behind the scenes</p>
                </div>
            </div>
            
            <div class="process-step">
                <div class="step-number">6</div>
                <div class="step-content">
                    <h4>🧹 Cleanup</h4>
                    <p>We return to pack up everything, leaving your venue spotless</p>
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
                <p class="section-subtitle-fancy">We go above and beyond to ensure your event is perfect</p>
            </div>
            
            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-icon">🛡️</div>
                    <h4>Fully Insured</h4>
                    <p>Complete liability coverage for your peace of mind</p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">🚚</div>
                    <h4>Free Delivery</h4>
                    <p>No hidden fees - delivery and setup included</p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">🧹</div>
                    <h4>Complete Cleanup</h4>
                    <p>We handle all breakdown and cleanup services</p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">📞</div>
                    <h4>24/7 Support</h4>
                    <p>Emergency support hotline during your event</p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">💯</div>
                    <h4>Quality Guarantee</h4>
                    <p>Premium equipment maintained to highest standards</p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">⚡</div>
                    <h4>Quick Response</h4>
                    <p>Fast quotes and flexible scheduling options</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Service Areas Section -->
<section class="service-areas-section">
    <div class="container">
        <div class="service-areas-content">
            <div class="areas-header">
                <h2>📍 Service Areas</h2>
                <p>We proudly serve the following areas with free delivery and setup</p>
            </div>
            
            <div class="areas-grid">
                <div class="area-item">
                    <div class="area-icon">🏙️</div>
                    <h4>Downtown Metro</h4>
                    <p>Full service area</p>
                </div>
                
                <div class="area-item">
                    <div class="area-icon">🏘️</div>
                    <h4>Suburban Districts</h4>
                    <p>Complete coverage</p>
                </div>
                
                <div class="area-item">
                    <div class="area-icon">🌲</div>
                    <h4>Rural Venues</h4>
                    <p>Extended delivery available</p>
                </div>
                
                <div class="area-item">
                    <div class="area-icon">🏖️</div>
                    <h4>Waterfront Locations</h4>
                    <p>Specialized setup team</p>
                </div>
            </div>
            
            <div class="areas-note">
                <p><strong>Service Radius:</strong> We deliver within 50 miles of our location. Extended delivery available for additional fee.</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="services-cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Start Planning Your <span class="gradient-text">Perfect Event?</span></h2>
            <p>Contact us today for a free consultation and customized quote</p>
            <div class="cta-buttons">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="cta-btn primary">
                    <span>Get Free Quote</span>
                    <div class="btn-glow"></div>
                </a>
                <a href="tel:+15551234567" class="cta-btn secondary">
                    <span>Call (555) 123-4567</span>
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
