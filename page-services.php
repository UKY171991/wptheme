<?php
/*
Template Name: Services Page
*/
get_header(); ?>

<!-- Services Hero Section -->
<section class="hero-section-advanced services-hero">
    <div class="hero-overlay"></div>
    <div class="hero-particles"></div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge">🛠️ Complete Service Solutions</div>
            <h1 class="hero-title-fancy">Professional <span class="gradient-text">Services</span> for Every Need</h1>
            <p class="hero-subtitle-fancy">From home cleaning to business consulting, we provide comprehensive services across 9 specialized categories. Quality professionals, transparent pricing, exceptional results.</p>
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number" data-count="50">0</div>
                    <div class="stat-label">+ Services</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="9">0</div>
                    <div class="stat-label">Categories</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="2500">0</div>
                    <div class="stat-label">Happy Clients</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="99">0</div>
                    <div class="stat-label">% Satisfaction</div>
                </div>
            </div>
            <div class="hero-buttons">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-primary-fancy">
                    <span>Get Quote</span>
                    <i class="arrow-right">→</i>
                </a>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('pricing'))); ?>" class="btn-secondary-fancy">
                    <span>View Pricing</span>
                    <i class="price-icon">💰</i>
                </a>
            </div>
        </div>
        <div class="hero-image">
            <div class="floating-card card-1">� Home Services</div>
            <div class="floating-card card-2">💼 Business Solutions</div>
            <div class="floating-card card-3">🐶 Pet Care</div>
            <div class="floating-card card-4">🎨 Creative Services</div>
        </div>
    </div>
</section>

<!-- Quick Service Navigator -->
<section class="service-navigator">
    <div class="container">
        <div class="navigator-wrapper">
            <h3>Jump to Service Category:</h3>
            <div class="navigator-buttons">
                <a href="#home-cleaning" class="nav-btn">🧹 Home & Cleaning</a>
                <a href="#maintenance" class="nav-btn">🧰 Maintenance</a>
                <a href="#errands" class="nav-btn">🛍️ Personal Errands</a>
                <a href="#pets" class="nav-btn">🐶 Pet Services</a>
                <a href="#family" class="nav-btn">👶 Family Support</a>
                <a href="#creative" class="nav-btn">🎨 Creative & Digital</a>
                <a href="#coaching" class="nav-btn">� Coaching</a>
                <a href="#office" class="nav-btn">💼 Office & Admin</a>
                <a href="#selling" class="nav-btn">📦 Selling & Setup</a>
            </div>
        </div>
    </div>
</section>

<!-- Service Categories -->
<section class="services-section-fancy comprehensive-services" id="services">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Complete Service Portfolio</div>
            <h2 class="section-title-fancy">9 Professional <span class="gradient-text">Service Categories</span></h2>
            <p class="section-subtitle-fancy">Comprehensive solutions for your home, business, and personal needs</p>
        </div>
        
        <div class="services-categories-wrapper">
            <!-- Home & Cleaning Services -->
            <div class="service-category-section" id="home-cleaning">
                <div class="category-header-enhanced">
                    <div class="category-icon-large">🧹</div>
                    <div class="category-info">
                        <h3 class="category-title">Home & Cleaning Services</h3>
                        <p class="category-description">Professional cleaning and maintenance for your home</p>
                        <div class="category-stats">
                            <span class="stat-badge">10 Services</span>
                            <span class="stat-badge">$25-$200</span>
                            <span class="stat-badge featured">Most Popular</span>
                        </div>
                        <div class="category-highlights">
                            <div class="highlight-item">
                                <span class="highlight-icon">✨</span>
                                <span>Professional Equipment</span>
                            </div>
                            <div class="highlight-item">
                                <span class="highlight-icon">🏆</span>
                                <span>Satisfaction Guaranteed</span>
                            </div>
                            <div class="highlight-item">
                                <span class="highlight-icon">🔒</span>
                                <span>Fully Insured</span>
                            </div>
                        </div>
                    </div>
                    <div class="category-cta">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="category-btn-primary">Get Quote</a>
                        <div class="quick-info">
                            <span class="info-item">📞 Quick Response</span>
                            <span class="info-item">⚡ Same Day Service</span>
                        </div>
                    </div>
                </div>
                <div class="services-grid-enhanced">
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">🏠</div>
                            <h4>House Cleaning</h4>
                            <span class="service-price">$50-150</span>
                        </div>
                        <p>Regular, deep, and move-in/out cleaning services</p>
                        <div class="service-features">
                            <span class="feature-tag">Weekly/Monthly</span>
                            <span class="feature-tag">Deep Clean</span>
                            <span class="feature-tag">Eco-Friendly</span>
                        </div>
                    </div>
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">💨</div>
                            <h4>Pressure Washing</h4>
                            <span class="service-price">$75-200</span>
                        </div>
                        <p>Exterior cleaning for driveways, decks, and siding</p>
                        <div class="service-features">
                            <span class="feature-tag">Driveway</span>
                            <span class="feature-tag">Deck Cleaning</span>
                            <span class="feature-tag">Siding</span>
                        </div>
                    </div>
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">🪟</div>
                            <h4>Window Cleaning</h4>
                            <span class="service-price">$35-80</span>
                        </div>
                        <p>Interior and exterior window cleaning services</p>
                        <div class="service-features">
                            <span class="feature-tag">Interior</span>
                            <span class="feature-tag">Exterior</span>
                            <span class="feature-tag">Streak-Free</span>
                        </div>
                    </div>
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">🏠</div>
                            <h4>Gutter Cleaning</h4>
                            <span class="service-price">$100-180</span>
                        </div>
                        <p>Safe gutter cleaning and maintenance</p>
                        <div class="service-features">
                            <span class="feature-tag">Safety First</span>
                            <span class="feature-tag">Debris Removal</span>
                            <span class="feature-tag">Inspection</span>
                        </div>
                    </div>
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">🛋️</div>
                            <h4>Carpet Shampooing</h4>
                            <span class="service-price">$60-120</span>
                        </div>
                        <p>Deep carpet cleaning and stain removal</p>
                        <div class="service-features">
                            <span class="feature-tag">Stain Removal</span>
                            <span class="feature-tag">Deep Clean</span>
                            <span class="feature-tag">Fast Dry</span>
                        </div>
                    </div>
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">📦</div>
                            <h4>Organization Services</h4>
                            <span class="service-price">$40-100</span>
                        </div>
                        <p>Garage, attic, and home organization</p>
                        <div class="service-features">
                            <span class="feature-tag">Garage</span>
                            <span class="feature-tag">Attic</span>
                            <span class="feature-tag">Storage</span>
                        </div>
                    </div>
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">🗑️</div>
                            <h4>Junk Removal</h4>
                            <span class="service-price">$80-200</span>
                        </div>
                        <p>Trash hauling and junk removal services</p>
                        <div class="service-features">
                            <span class="feature-tag">Heavy Items</span>
                            <span class="feature-tag">Same Day</span>
                            <span class="feature-tag">Eco Disposal</span>
                        </div>
                    </div>
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">🏨</div>
                            <h4>Airbnb Cleaning</h4>
                            <span class="service-price">$60-120</span>
                        </div>
                        <p>Professional Airbnb turnover and reset</p>
                        <div class="service-features">
                            <span class="feature-tag">Quick Turnover</span>
                            <span class="feature-tag">Guest Ready</span>
                            <span class="feature-tag">Inventory Check</span>
                        </div>
                    </div>
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">🌿</div>
                            <h4>Lawn Maintenance</h4>
                            <span class="service-price">$40-100</span>
                        </div>
                        <p>Mowing, trimming, and yard upkeep</p>
                        <div class="service-features">
                            <span class="feature-tag">Mowing</span>
                            <span class="feature-tag">Trimming</span>
                            <span class="feature-tag">Edging</span>
                        </div>
                    </div>
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">📋</div>
                            <h4>Move-in/out Cleaning</h4>
                            <span class="service-price">$100-200</span>
                        </div>
                        <p>Comprehensive cleaning for relocations</p>
                        <div class="service-features">
                            <span class="feature-tag">Move Ready</span>
                            <span class="feature-tag">Deep Clean</span>
                            <span class="feature-tag">Flexible Schedule</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Home & Property Maintenance -->
            <div class="service-category-section" id="maintenance">
                <div class="category-header-enhanced">
                    <div class="category-icon-large">🧰</div>
                    <div class="category-info">
                        <h3>Home & Property Maintenance</h3>
                        <p>Expert maintenance and repair services for your property needs</p>
                        <div class="category-highlights">
                            <div class="highlight-item">
                                <span class="highlight-icon">🔧</span>
                                <span>Licensed Professionals</span>
                            </div>
                            <div class="highlight-item">
                                <span class="highlight-icon">⏰</span>
                                <span>Same Day Service</span>
                            </div>
                            <div class="highlight-item">
                                <span class="highlight-icon">🛡️</span>
                                <span>Quality Guaranteed</span>
                            </div>
                        </div>
                    </div>
                    <div class="category-cta">
                        <a href="#contact" class="category-btn-primary">Book Maintenance</a>
                        <div class="quick-info">
                            <div class="info-item">10 Service Types</div>
                            <div class="info-item">From $40/service</div>
                            <div class="info-item">Emergency Available</div>
                        </div>
                    </div>
                </div>
                
                <div class="services-grid-enhanced">
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">🛠️</div>
                            <h4>Furniture Assembly</h4>
                            <div class="service-price">$40-100</div>
                        </div>
                        <p>Professional furniture and equipment assembly with proper tools and expertise</p>
                        <div class="service-features">
                            <span class="feature-tag">IKEA Assembly</span>
                            <span class="feature-tag">Office Furniture</span>
                            <span class="feature-tag">Tool Included</span>
                            <span class="feature-tag">Quick Service</span>
                        </div>
                    </div>
                    
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">📺</div>
                            <h4>TV Mounting</h4>
                            <div class="service-price">$60-120</div>
                        </div>
                        <p>Safe and secure TV wall mounting with cable management and optimal viewing angles</p>
                        <div class="service-features">
                            <span class="feature-tag">Wall Mount</span>
                            <span class="feature-tag">Cable Management</span>
                            <span class="feature-tag">All TV Sizes</span>
                            <span class="feature-tag">Perfect Positioning</span>
                        </div>
                    </div>
                    
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">🔨</div>
                            <h4>Handyman Services</h4>
                            <div class="service-price">$50-150</div>
                        </div>
                        <p>Minor, non-structural repairs and fixes for various household maintenance needs</p>
                        <div class="service-features">
                            <span class="feature-tag">Quick Fixes</span>
                            <span class="feature-tag">Multiple Tasks</span>
                            <span class="feature-tag">Professional Tools</span>
                            <span class="feature-tag">Same Day</span>
                        </div>
                    </div>
                    
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">🎨</div>
                            <h4>Fence Painting</h4>
                            <div class="service-price">$80-200</div>
                        </div>
                        <p>Fence painting and exterior touch-ups to enhance your property's appearance</p>
                        <div class="service-features">
                            <span class="feature-tag">Weather Protection</span>
                            <span class="feature-tag">Quality Paint</span>
                            <span class="feature-tag">Prep Work</span>
                            <span class="feature-tag">Clean Finish</span>
                        </div>
                    </div>
                    
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">💡</div>
                            <h4>Light Installation</h4>
                            <div class="service-price">$45-90</div>
                        </div>
                        <p>Light bulb and fixture installation with proper electrical safety procedures</p>
                        <div class="service-features">
                            <span class="feature-tag">Fixture Install</span>
                            <span class="feature-tag">Bulb Replacement</span>
                            <span class="feature-tag">Safety First</span>
                            <span class="feature-tag">LED Upgrade</span>
                        </div>
                    </div>
                    
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">🧱</div>
                            <h4>Drywall Patching</h4>
                            <div class="service-price">$50-120</div>
                        </div>
                        <p>Basic drywall repair and patching for holes, cracks, and surface damage</p>
                        <div class="service-features">
                            <span class="feature-tag">Hole Repair</span>
                            <span class="feature-tag">Crack Fixing</span>
                            <span class="feature-tag">Texture Match</span>
                            <span class="feature-tag">Paint Touch-up</span>
                        </div>
                    </div>
                    
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">📮</div>
                            <h4>Mailbox Installation</h4>
                            <div class="service-price">$60-150</div>
                        </div>
                        <p>Mailbox installation and replacement with proper mounting and positioning</p>
                        <div class="service-features">
                            <span class="feature-tag">Secure Mounting</span>
                            <span class="feature-tag">Post Installation</span>
                            <span class="feature-tag">Code Compliant</span>
                            <span class="feature-tag">Replacement Service</span>
                        </div>
                    </div>
                    
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">🚪</div>
                            <h4>Door Lock Installation</h4>
                            <div class="service-price">$70-140</div>
                        </div>
                        <p>Professional door lock installation and replacement for enhanced security</p>
                        <div class="service-features">
                            <span class="feature-tag">Security Locks</span>
                            <span class="feature-tag">Smart Locks</span>
                            <span class="feature-tag">Professional Install</span>
                            <span class="feature-tag">Key Programming</span>
                        </div>
                    </div>
                    
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">🪟</div>
                            <h4>Window Screen Repair</h4>
                            <div class="service-price">$40-80</div>
                        </div>
                        <p>Window screen repair and replacement for improved ventilation and comfort</p>
                        <div class="service-features">
                            <span class="feature-tag">Screen Repair</span>
                            <span class="feature-tag">Frame Fixing</span>
                            <span class="feature-tag">Custom Fit</span>
                            <span class="feature-tag">Quick Service</span>
                        </div>
                    </div>
                    
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">🔧</div>
                            <h4>Plumbing Assistance</h4>
                            <div class="service-price">$60-130</div>
                        </div>
                        <p>Basic plumbing assistance and minor repairs for common household issues</p>
                        <div class="service-features">
                            <span class="feature-tag">Leak Fixes</span>
                            <span class="feature-tag">Faucet Repair</span>
                            <span class="feature-tag">Toilet Issues</span>
                            <span class="feature-tag">Emergency Help</span>
                        </div>
                    </div>
                </div>
            </div>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🎄</div>
                        <h4>Holiday Light Hanging</h4>
                        <p>Professional holiday decoration installation</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🔑</div>
                        <h4>Lockout Assistance</h4>
                        <p>Emergency lockout help (non-locksmith)</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🏊</div>
                        <h4>Pool Cleaning</h4>
                        <p>Regular pool maintenance and cleaning</p>
                    </div>
                </div>
            </div>

            <!-- Personal Errands & Concierge -->
            <div class="service-category-section" id="personal">
                <div class="category-header-enhanced">
                    <div class="category-icon-large">🛍️</div>
                    <div class="category-info">
                        <h3>Personal Errands & Concierge</h3>
                        <p>Personal assistance and concierge services to make your life easier</p>
                        <div class="category-highlights">
                            <div class="highlight-item">
                                <span class="highlight-icon">⏰</span>
                                <span>Time-Saving Solutions</span>
                            </div>
                            <div class="highlight-item">
                                <span class="highlight-icon">🤝</span>
                                <span>Trusted Professionals</span>
                            </div>
                            <div class="highlight-item">
                                <span class="highlight-icon">📱</span>
                                <span>Real-Time Updates</span>
                            </div>
                        </div>
                    </div>
                    <div class="category-cta">
                        <a href="#contact" class="category-btn-primary">Get Personal Help</a>
                        <div class="quick-info">
                            <div class="info-item">10+ Services</div>
                            <div class="info-item">From $20/task</div>
                            <div class="info-item">Flexible Scheduling</div>
                        </div>
                    </div>
                </div>
                
                <div class="services-grid-enhanced">
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">🛒</div>
                            <h4>Grocery Shopping</h4>
                            <div class="service-price">$25-50</div>
                        </div>
                        <p>Personal shopping and grocery delivery with careful selection and timely delivery</p>
                        <div class="service-features">
                            <span class="feature-tag">Fresh Selection</span>
                            <span class="feature-tag">Same Day</span>
                            <span class="feature-tag">Receipt Photos</span>
                            <span class="feature-tag">Special Requests</span>
                        </div>
                    </div>
                    
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">💊</div>
                            <h4>Prescription Pickup</h4>
                            <div class="service-price">$20-35</div>
                        </div>
                        <p>Pharmacy runs and prescription delivery with secure handling and verification</p>
                        <div class="service-features">
                            <span class="feature-tag">Secure Handling</span>
                            <span class="feature-tag">ID Required</span>
                            <span class="feature-tag">Multiple Pharmacies</span>
                            <span class="feature-tag">Emergency Pickup</span>
                        </div>
                    </div>
                    
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">⏰</div>
                            <h4>Waiting-in-line Service</h4>
                            <div class="service-price">$30-60</div>
                        </div>
                        <p>Professional waiting services for appointments, DMV, and government offices</p>
                        <div class="service-features">
                            <span class="feature-tag">DMV Services</span>
                            <span class="feature-tag">Government Offices</span>
                            <span class="feature-tag">Document Ready</span>
                            <span class="feature-tag">Time Updates</span>
                        </div>
                    </div>
                    
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">👤</div>
                            <h4>Personal Assistant</h4>
                            <div class="service-price">$25-75</div>
                        </div>
                        <p>General personal assistance and errands tailored to your specific needs</p>
                        <div class="service-features">
                            <span class="feature-tag">Custom Tasks</span>
                            <span class="feature-tag">Flexible Hours</span>
                            <span class="feature-tag">Multiple Errands</span>
                            <span class="feature-tag">Regular Service</span>
                        </div>
                    </div>
                    
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">📦</div>
                            <h4>Moving Assistance</h4>
                            <div class="service-price">$40-100</div>
                        </div>
                        <p>Loading, unloading, and moving help for furniture and household items</p>
                        <div class="service-features">
                            <span class="feature-tag">Heavy Lifting</span>
                            <span class="feature-tag">Furniture Moving</span>
                            <span class="feature-tag">Careful Handling</span>
                            <span class="feature-tag">Assembly Help</span>
                        </div>
                    </div>
                    
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">🚚</div>
                            <h4>Courier Services</h4>
                            <div class="service-price">$20-50</div>
                        </div>
                        <p>Local delivery and courier services for documents and packages</p>
                        <div class="service-features">
                            <span class="feature-tag">Same Day</span>
                            <span class="feature-tag">Secure Delivery</span>
                            <span class="feature-tag">Proof of Delivery</span>
                            <span class="feature-tag">Local Area</span>
                        </div>
                    </div>
                    
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">🕐</div>
                            <h4>Appointment Scheduling</h4>
                            <div class="service-price">$25-40</div>
                        </div>
                        <p>Professional appointment coordination and scheduling for busy professionals</p>
                        <div class="service-features">
                            <span class="feature-tag">Calendar Sync</span>
                            <span class="feature-tag">Conflict Resolution</span>
                            <span class="feature-tag">Reminder Service</span>
                            <span class="feature-tag">Follow-up</span>
                        </div>
                    </div>
                    
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">🎁</div>
                            <h4>Gift Shopping</h4>
                            <div class="service-price">$30-75</div>
                        </div>
                        <p>Personalized gift shopping and wrapping for special occasions</p>
                        <div class="service-features">
                            <span class="feature-tag">Personal Touch</span>
                            <span class="feature-tag">Gift Wrapping</span>
                            <span class="feature-tag">Occasion Specific</span>
                            <span class="feature-tag">Budget Conscious</span>
                        </div>
                    </div>
                    
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">📋</div>
                            <h4>Organizing Services</h4>
                            <div class="service-price">$35-80</div>
                        </div>
                        <p>Personal space organization and decluttering services for homes and offices</p>
                        <div class="service-features">
                            <span class="feature-tag">Space Planning</span>
                            <span class="feature-tag">Decluttering</span>
                            <span class="feature-tag">Storage Solutions</span>
                            <span class="feature-tag">Maintenance Plan</span>
                        </div>
                    </div>
                    
                    <div class="service-item-enhanced">
                        <div class="service-header">
                            <div class="service-icon">🍽️</div>
                            <h4>Meal Prep Assistance</h4>
                            <div class="service-price">$40-90</div>
                        </div>
                        <p>Healthy meal preparation and cooking assistance for busy lifestyles</p>
                        <div class="service-features">
                            <span class="feature-tag">Meal Planning</span>
                            <span class="feature-tag">Healthy Options</span>
                            <span class="feature-tag">Dietary Needs</span>
                            <span class="feature-tag">Weekly Prep</span>
                        </div>
                    </div>
                </div>
            </div>
                        <div class="service-icon">🧳</div>
                        <h4>Packing Services</h4>
                        <p>Professional packing and unpacking</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🗂️</div>
                        <h4>Decluttering Service</h4>
                        <p>Home organization and decluttering</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🌱</div>
                        <h4>Plant Care</h4>
                        <p>Plant watering for traveling homeowners</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🐕</div>
                        <h4>Dog Waste Cleanup</h4>
                        <p>Yard waste removal and cleanup</p>
                    </div>
                </div>
            </div>

            <!-- Pet & Animal Services -->
            <div class="service-category-section">
                <div class="category-header">
                    <div class="category-icon-large">🐶</div>
                    <div class="category-info">
                        <h3 class="category-title">Pet & Animal Services</h3>
                        <p class="category-description">Caring services for your furry friends</p>
                        <div class="category-stats">
                            <span class="stat-badge">7 Services</span>
                            <span class="stat-badge">$15-$100</span>
                        </div>
                    </div>
                </div>
                <div class="services-grid-detailed">
                    <div class="service-item-detailed">
                        <div class="service-icon">🚶</div>
                        <h4>Dog Walking</h4>
                        <p>Regular dog walking and exercise services</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🏠</div>
                        <h4>Pet Sitting</h4>
                        <p>In-home pet care and companionship</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🛁</div>
                        <h4>Mobile Pet Grooming</h4>
                        <p>Basic pet grooming and bathing services</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🧹</div>
                        <h4>Pet Waste Cleanup</h4>
                        <p>Regular yard waste scooping service</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🚗</div>
                        <h4>Pet Transportation</h4>
                        <p>Safe transport to vet or groomer</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🐠</div>
                        <h4>Aquarium Cleaning</h4>
                        <p>Professional aquarium maintenance</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🌿</div>
                        <h4>Yard Deodorizing</h4>
                        <p>Pet yard cleaning and deodorizing</p>
                    </div>
                </div>
            </div>

            <!-- Child & Family Support -->
            <div class="service-category-section">
                <div class="category-header">
                    <div class="category-icon-large">👶</div>
                    <div class="category-info">
                        <h3 class="category-title">Child & Family Support</h3>
                        <p class="category-description">Trusted support for busy families</p>
                        <div class="category-stats">
                            <span class="stat-badge">5 Services</span>
                            <span class="stat-badge">$25-$100</span>
                        </div>
                    </div>
                </div>
                <div class="services-grid-detailed">
                    <div class="service-item-detailed">
                        <div class="service-icon">👨‍👩‍👧‍👦</div>
                        <h4>Parent Helper</h4>
                        <p>Mother's helper and family assistance</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">👶</div>
                        <h4>Babysitting</h4>
                        <p>Informal childcare and supervision</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🧸</div>
                        <h4>Toy Organization</h4>
                        <p>Children's room and toy organization</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🔒</div>
                        <h4>Baby-proofing</h4>
                        <p>Home safety and baby-proofing services</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🎉</div>
                        <h4>Party Setup</h4>
                        <p>Birthday party setup and hosting</p>
                    </div>
                </div>
            </div>

            <!-- Creative & Digital Services -->
            <div class="service-category-section">
                <div class="category-header">
                    <div class="category-icon-large">🎨</div>
                    <div class="category-info">
                        <h3 class="category-title">Creative & Digital Services</h3>
                        <p class="category-description">Professional creative and digital solutions</p>
                        <div class="category-stats">
                            <span class="stat-badge">10 Services</span>
                            <span class="stat-badge">$50-$300</span>
                        </div>
                    </div>
                </div>
                <div class="services-grid-detailed">
                    <div class="service-item-detailed">
                        <div class="service-icon">🎨</div>
                        <h4>Graphic Design</h4>
                        <p>Professional graphic design services</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">📱</div>
                        <h4>Social Media Management</h4>
                        <p>Social media strategy and management</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">✍️</div>
                        <h4>Content Writing</h4>
                        <p>Blog writing and content creation</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">📸</div>
                        <h4>Photography</h4>
                        <p>Event and general photography services</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🎥</div>
                        <h4>Videography</h4>
                        <p>Event videography and video production</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🎭</div>
                        <h4>Logo Design</h4>
                        <p>Brand identity and logo creation</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">📄</div>
                        <h4>Resume Writing</h4>
                        <p>Professional resume and CV writing</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🎤</div>
                        <h4>Voiceover Work</h4>
                        <p>Professional voiceover services</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">👕</div>
                        <h4>Merch Design</h4>
                        <p>T-shirt and merchandise design</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🌐</div>
                        <h4>Website Setup</h4>
                        <p>Basic website creation and setup</p>
                    </div>
                </div>
            </div>

            <!-- Coaching & Consulting -->
            <div class="service-category-section">
                <div class="category-header">
                    <div class="category-icon-large">🎓</div>
                    <div class="category-info">
                        <h3 class="category-title">Coaching & Consulting</h3>
                        <p class="category-description">Expert coaching and business consulting</p>
                        <div class="category-stats">
                            <span class="stat-badge">7 Services</span>
                            <span class="stat-badge">$75-$500</span>
                        </div>
                    </div>
                </div>
                <div class="services-grid-detailed">
                    <div class="service-item-detailed">
                        <div class="service-icon">💼</div>
                        <h4>Business Coaching</h4>
                        <p>Strategic business development coaching</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🌟</div>
                        <h4>Life Coaching</h4>
                        <p>Personal development and life coaching</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">📈</div>
                        <h4>Marketing Consulting</h4>
                        <p>Marketing strategy and consultation</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">📱</div>
                        <h4>Social Media Consulting</h4>
                        <p>Social media strategy and consulting</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">💕</div>
                        <h4>Relationship Coaching</h4>
                        <p>Personal relationship coaching</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">⏱️</div>
                        <h4>Productivity Coaching</h4>
                        <p>Time management and productivity coaching</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🎯</div>
                        <h4>Confidence Coaching</h4>
                        <p>Public speaking and confidence coaching</p>
                    </div>
                </div>
            </div>

            <!-- Office & Admin Services -->
            <div class="service-category-section">
                <div class="category-header">
                    <div class="category-icon-large">💼</div>
                    <div class="category-info">
                        <h3 class="category-title">Office & Admin Services</h3>
                        <p class="category-description">Professional administrative support services</p>
                        <div class="category-stats">
                            <span class="stat-badge">10 Services</span>
                            <span class="stat-badge">$25-$150</span>
                        </div>
                    </div>
                </div>
                <div class="services-grid-detailed">
                    <div class="service-item-detailed">
                        <div class="service-icon">💻</div>
                        <h4>Virtual Assistant</h4>
                        <p>Remote administrative assistance</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">⌨️</div>
                        <h4>Data Entry</h4>
                        <p>Accurate data entry and processing</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">📧</div>
                        <h4>Email Management</h4>
                        <p>Inbox organization and management</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">📝</div>
                        <h4>Transcription Services</h4>
                        <p>Audio and video transcription</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🔍</div>
                        <h4>Research Assistant</h4>
                        <p>Online research and data collection</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">📊</div>
                        <h4>Bookkeeping</h4>
                        <p>Basic bookkeeping and record keeping</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">📱</div>
                        <h4>CRM Setup</h4>
                        <p>Customer relationship management setup</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">📞</div>
                        <h4>Cold Calling</h4>
                        <p>Appointment setting and lead generation</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🎧</div>
                        <h4>Customer Service</h4>
                        <p>Outsourced customer service support</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">📦</div>
                        <h4>Order Management</h4>
                        <p>Print-on-demand order processing</p>
                    </div>
                </div>
            </div>

            <!-- Selling, Flipping & Setup -->
            <div class="service-category-section">
                <div class="category-header">
                    <div class="category-icon-large">📦</div>
                    <div class="category-info">
                        <h3 class="category-title">Selling, Flipping & Setup</h3>
                        <p class="category-description">Business setup and selling solutions</p>
                        <div class="category-stats">
                            <span class="stat-badge">5 Services</span>
                            <span class="stat-badge">$100-$800</span>
                        </div>
                    </div>
                </div>
                <div class="services-grid-detailed">
                    <div class="service-item-detailed">
                        <div class="service-icon">🛋️</div>
                        <h4>Furniture Flipping</h4>
                        <p>Furniture restoration and resale</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🛒</div>
                        <h4>Product Sourcing</h4>
                        <p>Product research and sourcing services</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">📱</div>
                        <h4>Online Selling</h4>
                        <p>eBay/Amazon selling on your behalf</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🖥️</div>
                        <h4>Office Setup</h4>
                        <p>Home office and gaming setup installation</p>
                    </div>
                    <div class="service-item-detailed">
                        <div class="service-icon">🎪</div>
                        <h4>Party Rental Setup</h4>
                        <p>Event equipment setup and breakdown</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="how-it-works-section">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Our Process</div>
            <h2 class="section-title-fancy">How We Make <span class="gradient-text">Magic Happen</span></h2>
            <p class="section-subtitle-fancy">Our proven 4-step process ensures your event is perfectly planned and flawlessly executed</p>
        </div>
        
        <div class="steps-grid">
            <div class="step-card">
                <div class="step-number">1</div>
                <h3>Consultation</h3>
                <p>We start with a detailed consultation to understand your vision, requirements, and budget. This helps us create a customized plan that perfectly matches your needs.</p>
                <div class="step-features">
                    <span class="feature-tag">Free Consultation</span>
                    <span class="feature-tag">Vision Mapping</span>
                    <span class="feature-tag">Budget Planning</span>
                </div>
            </div>
            
            <div class="step-card">
                <div class="step-number">2</div>
                <h3>Planning</h3>
                <p>Our team develops a comprehensive event plan, including timeline, vendor selection, and detailed logistics. You'll receive regular updates throughout the planning process.</p>
                <div class="step-features">
                    <span class="feature-tag">Detailed Timeline</span>
                    <span class="feature-tag">Vendor Coordination</span>
                    <span class="feature-tag">Regular Updates</span>
                </div>
            </div>
            
            <div class="step-card">
                <div class="step-number">3</div>
                <h3>Setup</h3>
                <p>On event day, our professional team arrives early to handle all setup, decorations, and final preparations. Everything is ready before your guests arrive.</p>
                <div class="step-features">
                    <span class="feature-tag">Professional Setup</span>
                    <span class="feature-tag">Quality Control</span>
                    <span class="feature-tag">Last-minute Adjustments</span>
                </div>
            </div>
            
            <div class="step-card">
                <div class="step-number">4</div>
                <h3>Execution</h3>
                <p>We manage every aspect of your event, ensuring smooth operations from start to finish. Our team handles all logistics so you can enjoy your special day.</p>
                <div class="step-features">
                    <span class="feature-tag">Event Management</span>
                    <span class="feature-tag">Problem Resolution</span>
                    <span class="feature-tag">Clean-up Service</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Service Highlights -->
<section class="featured-blueprints-section service-highlights">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Why Choose Us</div>
            <h2 class="section-title-fancy">What Makes Us <span class="gradient-text">Different</span></h2>
            <p class="section-subtitle-fancy">Our commitment to excellence and attention to detail sets us apart in the event industry</p>
        </div>
        
        <div class="blueprints-grid highlights-grid">
            <div class="blueprint-category-card highlight-card">
                <div class="category-icon">⭐</div>
                <h3>Premium Quality</h3>
                <p>We use only the finest equipment, decorations, and materials to ensure your event looks and feels luxurious.</p>
                <div class="highlight-features">
                    <div class="feature-item">
                        <span class="feature-icon">✨</span>
                        <span>Top-tier Equipment</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">🏆</span>
                        <span>Award-winning Service</span>
                    </div>
                </div>
            </div>
            
            <div class="blueprint-category-card highlight-card">
                <div class="category-icon">🤝</div>
                <h3>Personal Service</h3>
                <p>Every client receives dedicated attention with a personal event coordinator assigned to your project from start to finish.</p>
                <div class="highlight-features">
                    <div class="feature-item">
                        <span class="feature-icon">👤</span>
                        <span>Dedicated Coordinator</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">💬</span>
                        <span>24/7 Communication</span>
                    </div>
                </div>
            </div>
            
            <div class="blueprint-category-card highlight-card">
                <div class="category-icon">🛡️</div>
                <h3>Fully Insured</h3>
                <p>All our services are fully licensed and insured, giving you peace of mind for your special event.</p>
                <div class="highlight-features">
                    <div class="feature-item">
                        <span class="feature-icon">📋</span>
                        <span>Licensed Business</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">🔒</span>
                        <span>Full Insurance Coverage</span>
                    </div>
                </div>
            </div>
            
            <div class="blueprint-category-card highlight-card">
                <div class="category-icon">💚</div>
                <h3>Eco-Friendly</h3>
                <p>We offer sustainable event solutions with eco-friendly decorations, reusable materials, and waste reduction practices.</p>
                <div class="highlight-features">
                    <div class="feature-item">
                        <span class="feature-icon">🌱</span>
                        <span>Sustainable Materials</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">♻️</span>
                        <span>Waste Reduction</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials-section">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Client Reviews</div>
            <h2 class="section-title-fancy">What Our <span class="gradient-text">Clients Say</span></h2>
            <p class="section-subtitle-fancy">Real experiences from real clients who trusted us with their special moments</p>
        </div>
        
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <div class="testimonial-rating">
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                    </div>
                    <p>"PartyPro made our wedding absolutely perfect! Every detail was handled with care and the team went above and beyond our expectations."</p>
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">👰</div>
                    <div class="author-info">
                        <h4>Jessica & Mark</h4>
                        <p>Wedding Celebration</p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <div class="testimonial-rating">
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                    </div>
                    <p>"Professional, reliable, and creative. Our corporate event was a huge success thanks to their exceptional planning and execution."</p>
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">👨‍💼</div>
                    <div class="author-info">
                        <h4>Robert Chen</h4>
                        <p>Corporate Event</p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <div class="testimonial-rating">
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                    </div>
                    <p>"They transformed our backyard into a magical wonderland for our daughter's birthday. The kids and adults were amazed!"</p>
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">👩‍👧</div>
                    <div class="author-info">
                        <h4>Maria Lopez</h4>
                        <p>Birthday Party</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="cta-section-fancy">
    <div class="container">
        <div class="cta-content-fancy">
            <div class="cta-badge">Ready to Plan?</div>
            <h2 class="cta-title-fancy">Let's Make Your Event <span class="gradient-text">Extraordinary</span></h2>
            <p class="cta-subtitle-fancy">Contact us today for a free consultation and let our experienced team bring your vision to life.</p>
            <div class="cta-buttons-fancy">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-primary-fancy">
                    <span>Get Free Quote</span>
                    <i class="arrow-right">→</i>
                </a>
                <a href="tel:+1234567890" class="btn-secondary-fancy">
                    <span>Call Now</span>
                    <i class="phone-icon">📞</i>
                </a>
            </div>
            <div class="cta-trust-indicators">
                <div class="trust-item">
                    <span class="trust-icon">🆓</span>
                    <span>Free Consultation</span>
                </div>
                <div class="trust-item">
                    <span class="trust-icon">⚡</span>
                    <span>24-Hour Response</span>
                </div>
                <div class="trust-item">
                    <span class="trust-icon">💯</span>
                    <span>Satisfaction Guaranteed</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Service Posts Section (Dynamic, Paginated) -->
<section class="services-section-fancy all-services-posts">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">All Services</div>
            <h2 class="section-title-fancy">Our <span class="gradient-text">Service Offerings</span></h2>
            <p class="section-subtitle-fancy">Browse our complete list of professional services</p>
        </div>
        <div class="posts-grid" id="services-posts-container">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $service_query = new WP_Query(array(
                'post_type' => 'service',
                'posts_per_page' => 12,
                'paged' => $paged,
                'orderby' => 'date',
                'order' => 'DESC'
            ));
            if ($service_query->have_posts()) :
                while ($service_query->have_posts()) : $service_query->the_post();
            ?>
                <article class="post-card service-post-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                            <div class="post-overlay"></div>
                        </div>
                    <?php endif; ?>
                    <div class="post-content">
                        <h3 class="post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <div class="post-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <div class="post-footer">
                            <a href="<?php the_permalink(); ?>" class="read-more-btn">
                                <span>View Details</span>
                                <i class="arrow-right">→</i>
                            </a>
                        </div>
                    </div>
                </article>
            <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
        <!-- Pagination -->
        <?php if ($service_query->max_num_pages > 1) : ?>
            <div class="pagination-enhanced">
                <?php
                $pagination = paginate_links(array(
                    'total' => $service_query->max_num_pages,
                    'current' => $paged,
                    'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                    'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
                    'type' => 'list'
                ));
                if (is_string($pagination)) {
                    echo $pagination;
                }
                ?>
            </div>
        <?php endif; ?>
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

<!-- Call to Action Section -->
<section class="cta-section-fancy services-cta">
    <div class="container">
        <div class="cta-content-fancy">
            <div class="cta-badge">Ready to Get Started?</div>
            <h2 class="cta-title-fancy">Need Any of These <span class="gradient-text">Professional Services?</span></h2>
            <p class="cta-subtitle-fancy">Join thousands of satisfied customers who trust us with their service needs. Get your free consultation and transparent quote today.</p>
            <div class="cta-buttons-fancy">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-primary-fancy">
                    <span>Get Free Quote</span>
                    <i class="arrow-right">→</i>
                </a>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('pricing'))); ?>" class="btn-secondary-fancy">
                    <span>View Pricing</span>
                    <i class="price-icon">💰</i>
                </a>
            </div>
            <div class="cta-trust-indicators">
                <div class="trust-item">
                    <span class="trust-icon">🔒</span>
                    <span>Free Consultation</span>
                </div>
                <div class="trust-item">
                    <span class="trust-icon">⚡</span>
                    <span>Quick Response</span>
                </div>
                <div class="trust-item">
                    <span class="trust-icon">💯</span>
                    <span>Satisfaction Guaranteed</span>
                </div>
                <div class="trust-item">
                    <span class="trust-icon">💰</span>
                    <span>Transparent Pricing</span>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
