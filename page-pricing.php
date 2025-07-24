<?php
/*
Template Name: Pricing Page
*/
get_header(); ?>

<main id="main" class="site-main">

<?php
// Universal Banner Configuration
$badge_icon = '💰';
$badge_text = 'Transparent & Fair Pricing';
$title = 'Our Pricing';
$highlight = 'No Hidden Fees';
$description = 'Simple, honest pricing for premium services. Quality work at competitive rates with 100% satisfaction guarantee.';
$buttons = [
    [
        'text' => 'View Services',
        'url' => get_permalink(get_page_by_path('services')),
        'type' => 'btn-primary',
        'icon' => '→'
    ],
    [
        'text' => 'Get Custom Quote',
        'url' => get_permalink(get_page_by_path('contact')),
        'type' => 'btn-secondary',
        'icon' => '📞'
    ]
];
$stats = [
    ['number' => '100%', 'label' => 'Satisfaction Guarantee'],
    ['number' => '24/7', 'label' => 'Support'],
    ['number' => '500+', 'label' => 'Happy Customers'],
    ['number' => '15+', 'label' => 'Service Categories']
];

include get_template_directory() . '/template-parts/universal-banner.php';
?>

<!-- Pricing Grid Section -->
<section class="pricing-section">
    <div class="container">
        <div class="pricing-grid">
            <div class="pricing-card">
                <h3>Home Cleaning</h3>
                <div class="price">From $150</div>
                <ul>
                    <li>Regular house cleaning</li>
                    <li>Deep cleaning services</li>
                    <li>Move-in/out cleaning</li>
                    <li>Eco-friendly products</li>
                </ul>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-cta">Get Quote</a>
            </div>
            
            <div class="pricing-card featured">
                <div class="featured-badge">Most Popular</div>
                <h3>Home Maintenance</h3>
                <div class="price">From $75/hr</div>
                <ul>
                    <li>Handyman services</li>
                    <li>Furniture assembly</li>
                    <li>Minor repairs</li>
                    <li>TV mounting</li>
                </ul>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-cta">Get Quote</a>
            </div>
            
            <div class="pricing-card">
                <h3>Personal Services</h3>
                <div class="price">From $25</div>
                <ul>
                    <li>Grocery shopping</li>
                    <li>Pet care</li>
                    <li>Errands & delivery</li>
                    <li>Personal assistance</li>
                </ul>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-cta">Get Quote</a>
            </div>
        </div>
    </div>
</section>

</main>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon"><i class="fas fa-shield-alt"></i></span>
                        <div class="feature-text">
                            <strong>100% Guaranteed</strong>
                            <small>Satisfaction or your money back</small>
                        </div>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon"><i class="fas fa-mobile-alt"></i></span>
                        <div class="feature-text">
                            <strong>Smart Tracking</strong>
                            <small>Real-time updates & notifications</small>
                        </div>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon"><i class="fas fa-star"></i></span>
                        <div class="feature-text">
                            <strong>5-Star Experience</strong>
                            <small>Consistently top-rated service</small>
                        </div>
                    </div>
                </div>
                
                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-number" data-count="1500">0</span>
                        <span class="stat-label">Happy Clients</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" data-count="98">0</span>
                        <span class="stat-label">% Client Retention</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" data-count="10">0</span>
                        <span class="stat-label">Min Response Time</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" data-count="365">0</span>
                        <span class="stat-label">Days of Service</span>
                    </div>
                </div>
                
                <!-- Enhanced CTA Buttons -->
                <div class="hero-cta-buttons">
                    <a href="#pricing-plans" class="hero-cta-primary">
                        <i class="fas fa-th-list"></i>
                        <span>View Pricing Plans</span>
                    </a>
                    <a href="#pricing-calculator" class="hero-cta-secondary">
                        <i class="fas fa-calculator"></i>
                        <span>Get Custom Quote</span>
                    </a>
                    <a href="tel:+1234567890" class="hero-cta-tertiary">
                        <i class="fas fa-phone-alt"></i>
                        <span>Speak to an Expert</span>
                    </a>
                </div>
                
                <!-- Trust Indicators -->
                <div class="hero-trust-indicators">
                    <div class="trust-badge">
                        <i class="fas fa-certificate"></i>
                        <span>Certified Professionals</span>
                    </div>
                    <div class="trust-badge">
                        <i class="fas fa-shield-alt"></i>
                        <span>Licensed & Insured</span>
                    </div>
                    <div class="trust-badge">
                        <i class="fas fa-headset"></i>
                        <span>24/7 Customer Support</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Toggle Section -->
    <section class="pricing-toggle-section" id="pricing-plans">
        <div class="container">
            <div class="pricing-toggle">
                <span class="toggle-label">One-Time Service</span>
                <label class="toggle-switch">
                    <input type="checkbox" id="pricing-toggle">
                    <span class="toggle-slider"></span>
                </label>
                <span class="toggle-label">
                    Monthly Plan 
                    <span class="toggle-discount">Save up to 30%</span>
                </span>
            </div>
            
            <!-- Value Proposition Banner -->
            <div class="value-banner">
                <div class="value-item">
                    <i class="fas fa-wallet"></i>
                    <span><strong>Cost Savings:</strong> Up to 30% off with monthly plans</span>
                </div>
                <div class="value-item">
                    <i class="fas fa-calendar-check"></i>
                    <span><strong>Priority Access:</strong> Guaranteed scheduling windows</span>
                </div>
                <div class="value-item">
                    <i class="fas fa-user-tie"></i>
                    <span><strong>Dedicated Team:</strong> Same crew for consistent quality</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Pricing Plans -->
    <section class="pricing-plans">
        <div class="container">
            <div class="section-header">
                <div class="section-badge">Our Packages</div>
                <h2>Simple, Transparent Pricing</h2>
                <p>Choose the perfect plan that fits your needs and budget. All plans include our industry-leading satisfaction guarantee.</p>
            </div>
            
            <div class="pricing-grid">
                <!-- Essential Plan -->
                <div class="pricing-card basic-plan" data-plan="essential">
                    <div class="plan-header">
                        <div class="plan-icon"><i class="fas fa-home"></i></div>
                        <h3>Essential Plan</h3>
                        <p class="plan-subtitle">Perfect for routine maintenance</p>
                        <div class="plan-rating">
                            <div class="stars">★★★★★</div>
                            <span class="rating-text">4.8/5 (180+ reviews)</span>
                        </div>
                    </div>
                    
                    <div class="plan-pricing">
                        <span class="price-amount" data-onetime="149" data-recurring="109">$149</span>
                        <span class="price-period">/ service</span>
                        <div class="price-savings" style="display: none;">
                            <span class="savings-badge">Save $40/mo</span>
                        </div>
                        <div class="price-note">
                            <small>Perfect for homes up to 1,500 sq ft</small>
                        </div>
                    </div>
                    
                    <div class="plan-features">
                        <div class="feature-item">
                            <span class="feature-check"><i class="fas fa-check"></i></span>
                            <span>Complete cleaning (up to 1,500 sq ft)</span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-check"><i class="fas fa-check"></i></span>
                            <span>Kitchen & bathroom deep clean</span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-check"><i class="fas fa-check"></i></span>
                            <span>Vacuum & mop all floors</span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-check"><i class="fas fa-check"></i></span>
                            <span>Dusting of all surfaces</span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-check"><i class="fas fa-check"></i></span>
                            <span>Trash removal & recycling</span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-check"><i class="fas fa-check"></i></span>
                            <span>Eco-friendly cleaning products</span>
                        </div>
                        <div class="feature-item feature-unavailable">
                            <span class="feature-cross"><i class="fas fa-times"></i></span>
                            <span>Inside appliance cleaning</span>
                        </div>
                        <div class="feature-item feature-unavailable">
                            <span class="feature-cross"><i class="fas fa-times"></i></span>
                            <span>Window cleaning</span>
                        </div>
                    </div>
                    
                    <div class="plan-cta">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>?plan=essential" class="btn-plan">
                            <span>Get Started</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <p class="plan-note">Most affordable option</p>
                        <div class="plan-guarantee">
                            <i class="fas fa-shield-alt"></i>
                            <span>30-day satisfaction guarantee</span>
                        </div>
                    </div>
                </div>
                
                <!-- Premium Plan -->
                <div class="pricing-card premium-plan featured-plan" data-plan="premium">
                    <div class="plan-badge">Most Popular</div>
                    <div class="plan-header">
                        <div class="plan-icon"><i class="fas fa-star"></i></div>
                        <h3>Premium Plan</h3>
                        <p class="plan-subtitle">Complete home care solution</p>
                        <div class="plan-rating">
                            <div class="stars">★★★★★</div>
                            <span class="rating-text">4.9/5 (320+ reviews)</span>
                        </div>
                    </div>
                    
                    <div class="plan-pricing">
                        <span class="price-amount" data-onetime="279" data-recurring="199">$279</span>
                        <span class="price-period">/ service</span>
                        <div class="price-savings" style="display: none;">
                            <span class="savings-badge">Save $80/mo</span>
                        </div>
                        <div class="price-note">
                            <small>Ideal for homes up to 2,500 sq ft</small>
                        </div>
                    </div>
                    
                    <div class="plan-features">
                        <div class="feature-item">
                            <span class="feature-check"><i class="fas fa-check"></i></span>
                            <span>All Essential Plan features</span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-check"><i class="fas fa-check"></i></span>
                            <span>Complete sanitization of all surfaces</span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-check"><i class="fas fa-check"></i></span>
                            <span>Inside appliance cleaning</span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-check"><i class="fas fa-check"></i></span>
                            <span>Interior window cleaning</span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-check"><i class="fas fa-check"></i></span>
                            <span>Baseboards and trim cleaning</span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-check"><i class="fas fa-check"></i></span>
                            <span>Minor home maintenance tasks</span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-check"><i class="fas fa-check"></i></span>
                            <span>Priority customer support</span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-check"><i class="fas fa-check"></i></span>
                            <span>Weekend availability</span>
                        </div>
                    </div>
                    
                    <div class="plan-cta">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>?plan=premium" class="btn-plan featured">
                            <span>Get Started</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <p class="plan-note">Best value for most homes</p>
                        <div class="plan-guarantee">
                            <i class="fas fa-shield-alt"></i>
                            <span>60-day satisfaction guarantee</span>
                        </div>
                    </div>
                </div>
                
                <!-- Ultimate Plan -->
                <div class="pricing-card luxury-plan" data-plan="ultimate">
                    <div class="plan-header">
                        <div class="plan-icon"><i class="fas fa-crown"></i></div>
                        <h3>Ultimate Plan</h3>
                        <p class="plan-subtitle">Comprehensive luxury service</p>
                        <div class="plan-rating">
                            <div class="stars">★★★★★</div>
                            <span class="rating-text">5.0/5 (180+ reviews)</span>
                        </div>
                    </div>
                    
                    <div class="plan-pricing">
                        <span class="price-amount" data-onetime="479" data-recurring="359">$479</span>
                        <span class="price-period">/ service</span>
                        <div class="price-savings" style="display: none;">
                            <span class="savings-badge">Save $120/mo</span>
                        </div>
                        <div class="price-note">
                            <small>For luxury homes of any size</small>
                        </div>
                    </div>
                    
                    <div class="plan-features">
                        <div class="feature-item">
                            <span class="feature-check"><i class="fas fa-check"></i></span>
                            <span>All Premium Plan features</span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-check"><i class="fas fa-check"></i></span>
                            <span>No square footage limits</span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-check"><i class="fas fa-check"></i></span>
                            <span>Exterior window cleaning</span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-check"><i class="fas fa-check"></i></span>
                            <span>Carpet deep cleaning</span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-check"><i class="fas fa-check"></i></span>
                            <span>Garage & basement organization</span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-check"><i class="fas fa-check"></i></span>
                            <span>Same-day scheduling</span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-check"><i class="fas fa-check"></i></span>
                            <span>24/7 VIP customer support</span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-check"><i class="fas fa-check"></i></span>
                            <span>Dedicated service manager</span>
                        </div>
                    </div>
                    
                    <div class="plan-cta">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>?plan=ultimate" class="btn-plan">
                            <span>Get Started</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <p class="plan-note">Premium white-glove service</p>
                        <div class="plan-guarantee">
                            <i class="fas fa-shield-alt"></i>
                            <span>90-day satisfaction guarantee</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Plan Comparison Button -->
            <div class="comparison-section">
                <button class="btn-comparison" id="compare-plans-btn">
                    <i class="fas fa-table"></i>
                    <span>Compare All Plans</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Interactive Pricing Calculator -->
    <section class="pricing-calculator" id="pricing-calculator">
        <div class="container">
            <div class="section-header">
                <div class="section-badge">Smart Estimator</div>
                <h2>Get Your Personalized Quote</h2>
                <p>Our interactive calculator provides instant, accurate estimates based on your specific needs and property details</p>
            </div>
            
            <div class="calculator-container">
                <div class="calculator-form">
                    <div class="form-group">
                        <label for="service-type">Service Type</label>
                        <select id="service-type" class="form-control">
                            <option value="standard-cleaning" data-base-rate="0.10">Standard Cleaning</option>
                            <option value="deep-cleaning" data-base-rate="0.15">Deep Cleaning</option>
                            <option value="move-in-out" data-base-rate="0.18">Move-in/Move-out</option>
                            <option value="maintenance" data-base-rate="75">Home Maintenance (hourly)</option>
                            <option value="outdoor" data-base-rate="0.12">Outdoor Services</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="square-footage">Property Size (Square Feet)</label>
                        <div class="range-container">
                            <input type="range" id="square-footage" min="500" max="6000" value="1500" step="100" class="form-range">
                            <div class="range-labels">
                                <span>500</span>
                                <span>3000</span>
                                <span>6000</span>
                            </div>
                        </div>
                        <span class="range-value" id="sqft-value">1,500 sq ft</span>
                    </div>
                    
                    <div class="form-group">
                        <label for="frequency">Service Frequency</label>
                        <select id="frequency" class="form-control">
                            <option value="one-time" data-discount="0">One-time Service</option>
                            <option value="monthly" data-discount="15">Monthly Service (-15%)</option>
                            <option value="biweekly" data-discount="20">Bi-weekly Service (-20%)</option>
                            <option value="weekly" data-discount="30">Weekly Service (-30%)</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="urgency">Service Timing</label>
                        <select id="urgency" class="form-control">
                            <option value="standard" data-multiplier="1">Standard (3-5 days)</option>
                            <option value="priority" data-multiplier="1.15">Priority (1-2 days) +15%</option>
                            <option value="same-day" data-multiplier="1.35">Same-day Service +35%</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Additional Services</label>
                        <div class="checkbox-group">
                            <label class="checkbox-item">
                                <input type="checkbox" value="40" data-service="Interior Windows">
                                <span>Interior Window Cleaning (+$40)</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" value="50" data-service="Appliance Deep Clean">
                                <span>Appliance Deep Clean (+$50)</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" value="60" data-service="Garage Cleaning">
                                <span>Garage Cleaning (+$60)</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" value="45" data-service="Basement Cleaning">
                                <span>Basement Cleaning (+$45)</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" value="35" data-service="Carpet Treatment">
                                <span>Carpet Treatment (+$35/room)</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="special-requests">Special Instructions</label>
                        <textarea id="special-requests" class="form-control" rows="2" placeholder="Any specific requirements or areas that need special attention..."></textarea>
                    </div>
                </div>
                
                <div class="calculator-result">
                    <div class="result-header">
                        <h3>Your Estimate</h3>
                        <div class="estimate-badge">Real-Time Quote</div>
                    </div>
                    
                    <div class="price-breakdown">
                        <div class="base-price">
                            <span>Base Service</span>
                            <span id="base-price">$150.00</span>
                        </div>
                        <div class="size-adjustment">
                            <span>Property Size Adjustment</span>
                            <span id="size-cost">$0.00</span>
                        </div>
                        <div class="urgency-fee" id="urgency-fee" style="display: none;">
                            <span>Timing Premium</span>
                            <span id="urgency-cost">$0.00</span>
                        </div>
                        <div class="additional-services" id="additional-breakdown">
                            <!-- Dynamic content for selected add-ons -->
                        </div>
                        <div class="subtotal">
                            <span>Subtotal</span>
                            <span id="subtotal">$150.00</span>
                        </div>
                        <div class="discount-line" id="discount-line" style="display: none;">
                            <span>Frequency Discount</span>
                            <span id="discount-amount">-$0.00</span>
                        </div>
                        <div class="total-price">
                            <span>Total Estimate</span>
                            <span id="total-price">$150.00</span>
                        </div>
                    </div>
                    
                    <div class="result-actions">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-calculate">
                            <i class="fas fa-calendar-check"></i>
                            <span>Book Now</span>
                        </a>
                        <button class="btn-secondary" id="save-estimate-btn">
                            <i class="fas fa-envelope"></i>
                            <span>Email Quote</span>
                        </button>
                    </div>
                    
                    <div class="calculator-notes">
                        <p><i class="fas fa-info-circle"></i> Prices are estimates and may vary based on site inspection</p>
                        <p><i class="fas fa-calendar"></i> Quotes valid for 30 days</p>
                        <p><i class="fas fa-phone-alt"></i> Need help? Call <a href="tel:+1234567890">(123) 456-7890</a></p>
                    </div>
                </div>
            </div>
            
            <!-- Calculator Benefits -->
            <div class="calculator-benefits">
                <div class="benefit-item">
                    <i class="fas fa-bolt"></i>
                    <h4>Instant Quotes</h4>
                    <p>Get accurate pricing in seconds</p>
                </div>
                <div class="benefit-item">
                    <i class="fas fa-sliders-h"></i>
                    <h4>Fully Customizable</h4>
                    <p>Tailor services to your exact needs</p>
                </div>
                <div class="benefit-item">
                    <i class="fas fa-calendar-alt"></i>
                    <h4>Flexible Scheduling</h4>
                    <p>Book services on your timeline</p>
                </div>
                <div class="benefit-item">
                    <i class="fas fa-lock"></i>
                    <h4>No Commitment</h4>
                    <p>No credit card or signup required</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Individual Services Section -->
    <section class="service-pricing">
        <div class="container">
            <div class="section-header">
                <div class="section-badge">À La Carte Services</div>
                <h2>Individual Service Pricing</h2>
                <p>Need specific services? Choose from our menu of individual options customized to your needs</p>
            </div>
            
            <div class="service-categories">
                <!-- Cleaning Services -->
                <div class="service-category">
                    <div class="category-header">
                        <div class="category-icon"><i class="fas fa-broom"></i></div>
                        <h3>Cleaning Services</h3>
                        <p>Professional cleaning solutions for every area of your home</p>
                        <div class="category-rating">
                            <div class="stars">★★★★★</div>
                            <span>4.9/5 from 400+ reviews</span>
                        </div>
                    </div>
                    
                    <div class="service-list">
                        <div class="service-item">
                            <div class="service-info">
                                <h4>Standard House Cleaning</h4>
                                <p>Complete cleaning of all living areas, bathrooms, and kitchen</p>
                                <div class="service-features">
                                    <span class="feature-tag"><i class="fas fa-check-circle"></i> All surfaces</span>
                                    <span class="feature-tag"><i class="fas fa-check-circle"></i> Floors</span>
                                    <span class="feature-tag"><i class="fas fa-check-circle"></i> Bathrooms</span>
                                </div>
                            </div>
                            <div class="service-price">
                                <span class="price">$0.12/sq ft</span>
                                <span class="min-price">Min $135</span>
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>?service=standard-cleaning" class="btn-service">Book Now</a>
                            </div>
                        </div>
                        
                        <div class="service-item">
                            <div class="service-info">
                                <h4>Deep Cleaning</h4>
                                <p>Intensive cleaning including inside appliances, baseboards, and detail work</p>
                                <div class="service-features">
                                    <span class="feature-tag"><i class="fas fa-check-circle"></i> Appliances</span>
                                    <span class="feature-tag"><i class="fas fa-check-circle"></i> Baseboards</span>
                                    <span class="feature-tag"><i class="fas fa-check-circle"></i> Fixtures</span>
                                </div>
                            </div>
                            <div class="service-price">
                                <span class="price">$0.18/sq ft</span>
                                <span class="min-price">Min $199</span>
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>?service=deep-cleaning" class="btn-service">Book Now</a>
                            </div>
                        </div>
                        
                        <div class="service-item">
                            <div class="service-info">
                                <h4>Move-in/Move-out Cleaning</h4>
                                <p>Thorough cleaning for vacant properties with extra attention to details</p>
                                <div class="service-features">
                                    <span class="feature-tag"><i class="fas fa-check-circle"></i> Complete sanitization</span>
                                    <span class="feature-tag"><i class="fas fa-check-circle"></i> Cabinet cleaning</span>
                                    <span class="feature-tag"><i class="fas fa-check-circle"></i> Detail work</span>
                                </div>
                            </div>
                            <div class="service-price">
                                <span class="price">$0.22/sq ft</span>
                                <span class="min-price">Min $275</span>
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>?service=move-in-out" class="btn-service">Book Now</a>
                            </div>
                        </div>
                        
                        <div class="service-item">
                            <div class="service-info">
                                <h4>Post-Construction Cleanup</h4>
                                <p>Specialized cleaning after renovation or construction work</p>
                                <div class="service-features">
                                    <span class="feature-tag"><i class="fas fa-check-circle"></i> Dust removal</span>
                                    <span class="feature-tag"><i class="fas fa-check-circle"></i> Debris cleanup</span>
                                    <span class="feature-tag"><i class="fas fa-check-circle"></i> Surface restoration</span>
                                </div>
                            </div>
                            <div class="service-price">
                                <span class="price">$0.25/sq ft</span>
                                <span class="min-price">Min $325</span>
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>?service=post-construction" class="btn-service">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    
 
</div>

<script>
// Enhanced Pricing Page Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Animated counters for hero stats
    function animateCounters() {
        const counters = document.querySelectorAll('.stat-number[data-count]');
        
        counters.forEach(counter => {
            const target = parseInt(counter.dataset.count);
            const duration = 2000;
            const increment = target / (duration / 16);
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                counter.textContent = Math.floor(current);
            }, 16);
        });
    }
    
    // Trigger counter animation when hero section is visible
    const heroObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
                heroObserver.unobserve(entry.target);
            }
        });
    });
    
    const heroSection = document.querySelector('.pricing-hero');
    if (heroSection) {
        heroObserver.observe(heroSection);
    }
    
    // Pricing toggle functionality
    const pricingToggle = document.getElementById('pricing-toggle');
    const priceAmounts = document.querySelectorAll('.price-amount');
    const priceSavings = document.querySelectorAll('.price-savings');
    
    if (pricingToggle) {
        pricingToggle.addEventListener('change', function() {
            const isRecurring = this.checked;
            
            priceAmounts.forEach(amount => {
                const onetime = amount.dataset.onetime;
                const recurring = amount.dataset.recurring;
                
                if (isRecurring && recurring) {
                    amount.textContent = '$' + recurring;
                } else if (onetime) {
                    amount.textContent = '$' + onetime;
                }
            });
            
            priceSavings.forEach(saving => {
                if (isRecurring) {
                    saving.style.display = 'block';
                } else {
                    saving.style.display = 'none';
                }
            });
            
            // Add animation effect
            document.querySelectorAll('.pricing-card').forEach(card => {
                card.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    card.style.transform = 'scale(1)';
                }, 150);
            });
        });
    }
    
    // Pricing calculator functionality
    const serviceType = document.getElementById('service-type');
    const squareFootage = document.getElementById('square-footage');
    const frequency = document.getElementById('frequency');
    const additionalServices = document.querySelectorAll('input[type="checkbox"]');
    
    function updateCalculator() {
        if (!serviceType || !squareFootage || !frequency) return;
        
        const baseRates = {
            'basic-cleaning': 0.10,
            'deep-cleaning': 0.15,
            'handyman': 65,
            'outdoor': 200
        };
        
        const sqft = parseInt(squareFootage.value);
        const serviceValue = serviceType.value;
        
        let basePrice = 0;
        if (serviceValue === 'handyman') {
            basePrice = baseRates[serviceValue] * 2; // 2 hour minimum
        } else if (serviceValue === 'outdoor') {
            basePrice = baseRates[serviceValue];
        } else {
            basePrice = Math.max(baseRates[serviceValue] * sqft, serviceValue === 'basic-cleaning' ? 120 : 180);
        }
        
        // Apply frequency discount
        const frequencyDiscounts = {
            'onetime': 0,
            'monthly': 0.10,
            'biweekly': 0.15,
            'weekly': 0.20
        };
        
        const discount = frequencyDiscounts[frequency.value] || 0;
        const discountAmount = basePrice * discount;
        
        // Calculate additional services
        let additionalTotal = 0;
        const additionalBreakdown = document.getElementById('additional-breakdown');
        additionalBreakdown.innerHTML = '';
        
        additionalServices.forEach(service => {
            if (service.checked) {
                const cost = parseInt(service.value);
                additionalTotal += cost;
                
                const div = document.createElement('div');
                div.className = 'additional-service';
                div.innerHTML = `
                    <span>${service.dataset.service}</span>
                    <span>+$${cost}</span>
                `;
                additionalBreakdown.appendChild(div);
            }
        });
        
        const subtotal = basePrice + additionalTotal;
        const total = subtotal - discountAmount;
        
        // Update display
        document.getElementById('base-price').textContent = '$' + Math.round(basePrice);
        
        const discountLine = document.getElementById('discount-line');
        const discountAmountEl = document.getElementById('discount-amount');
        if (discount > 0) {
            discountLine.style.display = 'flex';
            discountAmountEl.textContent = '-$' + Math.round(discountAmount);
        } else {
            discountLine.style.display = 'none';
        }
        
        document.getElementById('total-price').textContent = '$' + Math.round(total);
        
        // Update square footage display
        document.getElementById('sqft-value').textContent = sqft.toLocaleString() + ' sq ft';
    }
    
    // Attach calculator event listeners
    if (serviceType) serviceType.addEventListener('change', updateCalculator);
    if (squareFootage) squareFootage.addEventListener('input', updateCalculator);
    if (frequency) frequency.addEventListener('change', updateCalculator);
    additionalServices.forEach(service => {
        service.addEventListener('change', updateCalculator);
    });
    
    // Initial calculator update
    updateCalculator();
    
    // Smooth scrolling for internal links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Add intersection observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    document.querySelectorAll('.pricing-card, .service-category, .testimonial-item, .faq-item').forEach(el => {
        observer.observe(el);
    });
});

// FAQ toggle functionality
function toggleFaq(faqItem) {
    const content = faqItem.querySelector('.faq-content');
    const toggle = faqItem.querySelector('.faq-toggle');
    
    // Close other open FAQs
    document.querySelectorAll('.faq-item.active').forEach(item => {
        if (item !== faqItem) {
            item.classList.remove('active');
            item.querySelector('.faq-content').style.maxHeight = '0';
            item.querySelector('.faq-toggle').textContent = '+';
        }
    });
    
    // Toggle current FAQ
    faqItem.classList.toggle('active');
    
    if (faqItem.classList.contains('active')) {
        content.style.maxHeight = content.scrollHeight + 'px';
        toggle.textContent = '-';
    } else {
        content.style.maxHeight = '0';
        toggle.textContent = '+';
    }
}

// Comparison table toggle
function toggleComparison() {
    const button = document.querySelector('.btn-comparison');
    const existingTable = document.querySelector('.comparison-table');
    
    if (existingTable) {
        existingTable.remove();
        button.innerHTML = '<i class="fas fa-balance-scale"></i><span>Compare All Plans</span>';
        return;
    }
    
    const comparisonHTML = `
        <div class="comparison-table">
            <table>
                <thead>
                    <tr>
                        <th>Features</th>
                        <th>Basic Care</th>
                        <th>Premium Care</th>
                        <th>Luxury Care</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Price per service</td>
                        <td>$150</td>
                        <td>$275</td>
                        <td>$450</td>
                    </tr>
                    <tr>
                        <td>Coverage area</td>
                        <td>Up to 1,500 sq ft</td>
                        <td>Up to 2,500 sq ft</td>
                        <td>Unlimited sq ft</td>
                    </tr>
                    <tr>
                        <td>Basic cleaning</td>
                        <td>✓</td>
                        <td>✓</td>
                        <td>✓</td>
                    </tr>
                    <tr>
                        <td>Deep cleaning</td>
                        <td>✗</td>
                        <td>✓</td>
                        <td>✓</td>
                    </tr>
                    <tr>
                        <td>Appliance cleaning</td>
                        <td>✗</td>
                        <td>✓</td>
                        <td>✓</td>
                    </tr>
                    <tr>
                        <td>Window cleaning</td>
                        <td>✗</td>
                        <td>Interior only</td>
                        <td>Interior & Exterior</td>
                    </tr>
                    <tr>
                        <td>Priority support</td>
                        <td>✗</td>
                        <td>✓</td>
                        <td>24/7 Support</td>
                    </tr>
                    <tr>
                        <td>Guarantee period</td>
                        <td>30 days</td>
                        <td>60 days</td>
                        <td>90 days</td>
                    </tr>
                </tbody>
            </table>
        </div>
    `;
    
    const comparisonSection = document.querySelector('.comparison-section');
    comparisonSection.insertAdjacentHTML('afterend', comparisonHTML);
    button.innerHTML = '<i class="fas fa-times"></i><span>Hide Comparison</span>';
    
    // Smooth scroll to table
    document.querySelector('.comparison-table').scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
}

// Calculator action functions
function requestQuote() {
    // In a real implementation, this would open a quote request form
    // or redirect to the contact page with pre-filled information
    window.location.href = '/contact?service=quote&estimate=' + document.getElementById('total-price').textContent;
}

function saveEstimate() {
    const estimate = {
        service: document.getElementById('service-type').value,
        sqft: document.getElementById('square-footage').value,
        frequency: document.getElementById('frequency').value,
        total: document.getElementById('total-price').textContent,
        date: new Date().toLocaleDateString()
    };
    
    localStorage.setItem('savedEstimate', JSON.stringify(estimate));
    
    // Show confirmation
    const button = document.querySelector('button[onclick="saveEstimate()"]');
    const originalText = button.innerHTML;
    button.innerHTML = '<i class="fas fa-check"></i>Saved!';
    button.style.background = '#28a745';
    
    setTimeout(() => {
        button.innerHTML = originalText;
        button.style.background = '';
    }, 2000);
}

// Add parallax effect to hero background
window.addEventListener('scroll', function() {
    const scrolled = window.pageYOffset;
    const parallax1 = document.querySelector('.hero-particles');
    const parallax2 = document.querySelector('.cta-particles');
    
    if (parallax1) {
        parallax1.style.transform = `translateY(${scrolled * 0.5}px)`;
    }
    if (parallax2) {
        parallax2.style.transform = `translateY(${scrolled * 0.3}px)`;
    }
});
</script>

<?php get_footer(); ?>
