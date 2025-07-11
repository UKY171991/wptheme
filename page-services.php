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
            <div class="services-hero-badge">🎉 Our Services</div>
            <h1 class="services-hero-title">Complete <span class="gradient-text">Party Rental Solutions</span></h1>
            <p class="services-hero-subtitle">From intimate gatherings to grand celebrations, we provide everything you need to make your event unforgettable. Professional equipment, expert setup, and exceptional service.</p>
            <div class="services-hero-stats">
                <div class="services-stat">
                    <div class="stat-icon">🎪</div>
                    <div class="stat-text">200+ Rental Items</div>
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
            <!-- Tables & Chairs -->
            <div class="service-card-enhanced tables-service" id="tables-chairs">
                <div class="service-card-header">
                    <div class="service-icon-large">🪑</div>
                    <h3 class="service-title">Tables & Chairs</h3>
                    <p class="service-subtitle">Essential seating and dining solutions</p>
                </div>
                
                <div class="service-features">
                    <div class="feature-highlight">
                        <span class="feature-icon">✨</span>
                        <span>Clean, professional setup</span>
                    </div>
                    <div class="feature-list">
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Round tables (48", 60", 72")</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Rectangular tables (6ft, 8ft)</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Cocktail tables (30" & 36")</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Chiavari chairs (gold, silver, white)</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Folding chairs (white, black)</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Specialty seating (lounge, bar stools)</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Table linens and chair covers</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Professional setup and breakdown</span>
                        </div>
                    </div>
                </div>
                
                <div class="service-card-footer">
                    <div class="pricing-info">Starting at $8/table, $3/chair</div>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-btn">Get Quote</a>
                </div>
            </div>
            
            <!-- Tents & Canopies -->
            <div class="service-card-enhanced tents-service" id="tents">
                <div class="service-card-header">
                    <div class="service-icon-large">🎪</div>
                    <h3 class="service-title">Tents & Canopies</h3>
                    <p class="service-subtitle">Weather protection for outdoor events</p>
                </div>
                
                <div class="service-features">
                    <div class="feature-highlight">
                        <span class="feature-icon">☂️</span>
                        <span>Rain or shine protection</span>
                    </div>
                    <div class="feature-list">
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Frame tents (20x20 to 40x80)</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Pole tents (20x30 to 30x60)</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Pop-up canopies (10x10, 10x20)</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Sidewalls and windscreens</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Flooring and subflooring</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Heating and cooling options</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Professional installation</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Permits and site planning</span>
                        </div>
                    </div>
                </div>
                
                <div class="service-card-footer">
                    <div class="pricing-info">Starting at $150 for 20x20</div>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-btn">Get Quote</a>
                </div>
            </div>
            
            <!-- Wedding Packages -->
            <div class="service-card-enhanced wedding-service" id="wedding">
                <div class="service-card-header">
                    <div class="service-icon-large">💍</div>
                    <h3 class="service-title">Wedding Packages</h3>
                    <p class="service-subtitle">Complete wedding reception solutions</p>
                </div>
                
                <div class="service-features">
                    <div class="feature-highlight">
                        <span class="feature-icon">💖</span>
                        <span>Make your day perfect</span>
                    </div>
                    <div class="feature-list">
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Elegant table settings and linens</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Wedding arches and ceremony décor</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Dance floors (indoor/outdoor)</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Uplighting and ambient lighting</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Bridal party lounges</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Ceremony seating and aisle runners</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Photo booth props and backdrops</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Complete coordination service</span>
                        </div>
                    </div>
                </div>
                
                <div class="service-card-footer">
                    <div class="pricing-info">Packages from $800-$2500</div>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('pricing'))); ?>" class="service-btn">View Packages</a>
                </div>
            </div>
            
            <!-- Party Entertainment -->
            <div class="service-card-enhanced entertainment-service" id="entertainment">
                <div class="service-card-header">
                    <div class="service-icon-large">🎠</div>
                    <h3 class="service-title">Party Entertainment</h3>
                    <p class="service-subtitle">Fun activities for all ages</p>
                </div>
                
                <div class="service-features">
                    <div class="feature-highlight">
                        <span class="feature-icon">🎉</span>
                        <span>Endless fun guaranteed</span>
                    </div>
                    <div class="feature-list">
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Bounce houses (various themes)</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Water slides and splash zones</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Obstacle courses</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Carnival games</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Mechanical bull</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Photo booths</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Giant games (Connect 4, Jenga)</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Face painting stations</span>
                        </div>
                    </div>
                </div>
                
                <div class="service-card-footer">
                    <div class="pricing-info">Starting at $200/day</div>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-btn">Get Quote</a>
                </div>
            </div>
            
            <!-- Event Lighting -->
            <div class="service-card-enhanced lighting-service" id="lighting">
                <div class="service-card-header">
                    <div class="service-icon-large">💡</div>
                    <h3 class="service-title">Event Lighting</h3>
                    <p class="service-subtitle">Create the perfect ambiance</p>
                </div>
                
                <div class="service-features">
                    <div class="feature-highlight">
                        <span class="feature-icon">✨</span>
                        <span>Set the perfect mood</span>
                    </div>
                    <div class="feature-list">
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>String lights (Edison, fairy, globe)</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Uplighting (LED color changing)</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Market lights and café lighting</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Chandeliers and pendant lighting</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Spotlights and pin lighting</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Lanterns and specialty lighting</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Professional installation</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Power distribution and safety</span>
                        </div>
                    </div>
                </div>
                
                <div class="service-card-footer">
                    <div class="pricing-info">Starting at $75/package</div>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-btn">Get Quote</a>
                </div>
            </div>
            
            <!-- Audio Visual -->
            <div class="service-card-enhanced av-service" id="audio-visual">
                <div class="service-card-header">
                    <div class="service-icon-large">🎵</div>
                    <h3 class="service-title">Audio Visual</h3>
                    <p class="service-subtitle">Sound and presentation equipment</p>
                </div>
                
                <div class="service-features">
                    <div class="feature-highlight">
                        <span class="feature-icon">🔊</span>
                        <span>Crystal clear sound</span>
                    </div>
                    <div class="feature-list">
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>PA systems and speakers</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Wireless microphones</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>DJ equipment and turntables</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Projectors and screens</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>LED walls and displays</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Mixing boards and controls</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Technical support on-site</span>
                        </div>
                        <div class="feature-item">
                            <span class="check-icon">✓</span>
                            <span>Backup equipment included</span>
                        </div>
                    </div>
                </div>
                
                <div class="service-card-footer">
                    <div class="pricing-info">Starting at $150/day</div>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-btn">Get Quote</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional Services -->
<section class="additional-services-section">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Additional Services</div>
            <h2 class="section-title-fancy">Complete <span class="gradient-text">Event Support</span></h2>
        </div>
        
        <div class="additional-services-grid">
            <div class="additional-service-item">
                <div class="service-icon">🚚</div>
                <h4>Delivery & Setup</h4>
                <p>Professional delivery, setup, and breakdown services included with all rentals</p>
            </div>
            
            <div class="additional-service-item">
                <div class="service-icon">📋</div>
                <h4>Event Planning</h4>
                <p>Free consultation and planning assistance to help design your perfect event</p>
            </div>
            
            <div class="additional-service-item">
                <div class="service-icon">🛡️</div>
                <h4>Insurance & Permits</h4>
                <p>Fully licensed and insured with permit assistance for larger events</p>
            </div>
            
            <div class="additional-service-item">
                <div class="service-icon">🕐</div>
                <h4>Emergency Support</h4>
                <p>24/7 emergency contact for urgent needs during your event</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="services-cta-section">
    <div class="container">
        <div class="services-cta-content">
            <h2>Ready to Start Planning?</h2>
            <p>Contact us today for a free consultation and custom quote for your event</p>
            <div class="services-cta-buttons">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-primary">Get Free Quote</a>
                <a href="tel:<?php echo esc_attr(str_replace([' ', '-', '(', ')'], '', get_theme_mod('contact_phone', '+919876543210'))); ?>" class="btn-secondary">Call Now</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
