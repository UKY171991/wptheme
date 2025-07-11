<?php
/*
Template Name: Pricing Page
*/
get_header(); ?>

<!-- Fancy Pricing Hero Section -->
<section class="pricing-hero-section">
    <div class="pricing-hero-bg"></div>
    <div class="container">
        <div class="pricing-hero-content">
            <div class="pricing-hero-badge">💰 Our Pricing</div>
            <h1 class="pricing-hero-title">Transparent <span class="gradient-text">Fair Pricing</span></h1>
            <p class="pricing-hero-subtitle">Quality services at competitive rates. No hidden fees, no surprises - just honest pricing for exceptional service.</p>
            <div class="pricing-hero-features">
                <div class="pricing-feature">
                    <div class="feature-icon">✅</div>
                    <div class="feature-text">No Hidden Fees</div>
                </div>
                <div class="pricing-feature">
                    <div class="feature-icon">🛡️</div>
                    <div class="feature-text">Satisfaction Guaranteed</div>
                </div>
                <div class="pricing-feature">
                    <div class="feature-icon">📞</div>
                    <div class="feature-text">Free Consultations</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Enhanced Pricing Categories -->
<section class="pricing-showcase-section">
    <div class="container">
        <div class="pricing-category-tabs">
            <button class="tab-btn active" data-category="cleaning">🧹 Cleaning</button>
            <button class="tab-btn" data-category="maintenance">🧰 Maintenance</button>
            <button class="tab-btn" data-category="personal">🛍️ Personal</button>
            <button class="tab-btn" data-category="pets">🐶 Pet Care</button>
            <button class="tab-btn" data-category="family">👶 Family</button>
            <button class="tab-btn" data-category="creative">🎨 Creative</button>
            <button class="tab-btn" data-category="coaching">🎓 Coaching</button>
            <button class="tab-btn" data-category="admin">💼 Admin</button>
            <button class="tab-btn" data-category="rentals">🎪 Rentals</button>
        </div>

        <!-- Cleaning Services Pricing -->
        <div class="pricing-category-content active" id="cleaning">
            <div class="category-header">
                <h2>🧹 Home & Cleaning Services</h2>
                <p>Professional cleaning solutions for your home and property</p>
            </div>
            <div class="pricing-grid">
                <div class="pricing-card standard">
                    <div class="pricing-header">
                        <h3>Basic House Cleaning</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">75</span>
                            <span class="period">/visit</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ Kitchen & bathroom cleaning</li>
                        <li>✅ Vacuuming & mopping</li>
                        <li>✅ Dusting surfaces</li>
                        <li>✅ Trash removal</li>
                        <li>✅ Up to 3 bedrooms</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>

                <div class="pricing-card premium">
                    <div class="popularity-badge">Most Popular</div>
                    <div class="pricing-header">
                        <h3>Deep House Cleaning</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">150</span>
                            <span class="period">/visit</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ Everything in basic cleaning</li>
                        <li>✅ Inside appliances</li>
                        <li>✅ Baseboards & window sills</li>
                        <li>✅ Cabinet fronts</li>
                        <li>✅ Light fixtures</li>
                        <li>✅ Up to 5 bedrooms</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>

                <div class="pricing-card enterprise">
                    <div class="pricing-header">
                        <h3>Move-In/Out Cleaning</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">250</span>
                            <span class="period">/service</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ Complete deep cleaning</li>
                        <li>✅ Inside all cabinets</li>
                        <li>✅ All appliances inside/out</li>
                        <li>✅ Carpet shampooing</li>
                        <li>✅ Window cleaning</li>
                        <li>✅ Garage cleaning</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
            </div>

            <div class="additional-services">
                <h4>🧹 Additional Cleaning Services</h4>
                <div class="addon-grid">
                    <div class="addon-item">
                        <span class="addon-name">Pressure Washing</span>
                        <span class="addon-price">$85/hour</span>
                    </div>
                    <div class="addon-item">
                        <span class="addon-name">Gutter Cleaning</span>
                        <span class="addon-price">$125/service</span>
                    </div>
                    <div class="addon-item">
                        <span class="addon-name">Window Cleaning</span>
                        <span class="addon-price">$65/service</span>
                    </div>
                    <div class="addon-item">
                        <span class="addon-name">Carpet Shampooing</span>
                        <span class="addon-price">$45/room</span>
                    </div>
                    <div class="addon-item">
                        <span class="addon-name">Junk Removal</span>
                        <span class="addon-price">$95/hour</span>
                    </div>
                    <div class="addon-item">
                        <span class="addon-name">Yard Maintenance</span>
                        <span class="addon-price">$55/hour</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Maintenance Services Pricing -->
        <div class="pricing-category-content" id="maintenance">
            <div class="category-header">
                <h2>🧰 Home & Property Maintenance</h2>
                <p>Expert handyman and maintenance services</p>
            </div>
            <div class="pricing-grid">
                <div class="pricing-card standard">
                    <div class="pricing-header">
                        <h3>Basic Handyman</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">65</span>
                            <span class="period">/hour</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ Minor repairs</li>
                        <li>✅ Light installation</li>
                        <li>✅ Basic drywall patching</li>
                        <li>✅ Furniture assembly</li>
                        <li>✅ 2-hour minimum</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>

                <div class="pricing-card premium">
                    <div class="popularity-badge">Popular</div>
                    <div class="pricing-header">
                        <h3>TV Mounting & Setup</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">125</span>
                            <span class="period">/service</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ Professional wall mounting</li>
                        <li>✅ Cable management</li>
                        <li>✅ Device setup</li>
                        <li>✅ Safety guaranteed</li>
                        <li>✅ All hardware included</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>

                <div class="pricing-card enterprise">
                    <div class="pricing-header">
                        <h3>Fence Painting</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">15</span>
                            <span class="period">/linear ft</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ Surface preparation</li>
                        <li>✅ Premium paint included</li>
                        <li>✅ 2-coat application</li>
                        <li>✅ Cleanup included</li>
                        <li>✅ 2-year warranty</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
            </div>
        </div>

        <!-- Personal Services Pricing -->
        <div class="pricing-category-content" id="personal">
            <div class="category-header">
                <h2>🛍️ Personal Errands & Concierge</h2>
                <p>Your personal assistant for daily tasks</p>
            </div>
            <div class="pricing-grid">
                <div class="pricing-card standard">
                    <div class="pricing-header">
                        <h3>Basic Errands</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">35</span>
                            <span class="period">/hour</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ Grocery shopping</li>
                        <li>✅ Prescription pickup</li>
                        <li>✅ Basic deliveries</li>
                        <li>✅ Waiting in line</li>
                        <li>✅ 2-hour minimum</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>

                <div class="pricing-card premium">
                    <div class="popularity-badge">Time Saver</div>
                    <div class="pricing-header">
                        <h3>Personal Assistant</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">45</span>
                            <span class="period">/hour</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ Everything in basic</li>
                        <li>✅ Administrative tasks</li>
                        <li>✅ Appointment scheduling</li>
                        <li>✅ Research services</li>
                        <li>✅ Priority booking</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>

                <div class="pricing-card enterprise">
                    <div class="pricing-header">
                        <h3>Moving Assistance</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">85</span>
                            <span class="period">/hour</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ Professional packing</li>
                        <li>✅ Loading/unloading</li>
                        <li>✅ Furniture protection</li>
                        <li>✅ Unpacking service</li>
                        <li>✅ 4-hour minimum</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
            </div>
        </div>

        <!-- Pet Services Pricing -->
        <div class="pricing-category-content" id="pets">
            <div class="category-header">
                <h2>🐶 Pet & Animal Services</h2>
                <p>Loving care for your furry friends</p>
            </div>
            <div class="pricing-grid">
                <div class="pricing-card standard">
                    <div class="pricing-header">
                        <h3>Dog Walking</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">25</span>
                            <span class="period">/walk</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ 30-minute walks</li>
                        <li>✅ GPS tracking</li>
                        <li>✅ Photo updates</li>
                        <li>✅ Fresh water</li>
                        <li>✅ Insured walker</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>

                <div class="pricing-card premium">
                    <div class="popularity-badge">Popular</div>
                    <div class="pricing-header">
                        <h3>Pet Sitting</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">45</span>
                            <span class="period">/day</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ In-home pet care</li>
                        <li>✅ Feeding & medication</li>
                        <li>✅ Playtime & walks</li>
                        <li>✅ Daily photo updates</li>
                        <li>✅ Emergency vet transport</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>

                <div class="pricing-card enterprise">
                    <div class="pricing-header">
                        <h3>Mobile Pet Grooming</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">75</span>
                            <span class="period">/session</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ Bath & brush-out</li>
                        <li>✅ Nail trimming</li>
                        <li>✅ Ear cleaning</li>
                        <li>✅ Professional products</li>
                        <li>✅ At your location</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
            </div>
        </div>

        <!-- Family Services Pricing -->
        <div class="pricing-category-content" id="family">
            <div class="category-header">
                <h2>👶 Child & Family Support</h2>
                <p>Helping families with childcare and organization</p>
            </div>
            <div class="pricing-grid">
                <div class="pricing-card standard">
                    <div class="pricing-header">
                        <h3>Mother's Helper</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">20</span>
                            <span class="period">/hour</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ Child supervision</li>
                        <li>✅ Light housework</li>
                        <li>✅ Meal preparation</li>
                        <li>✅ Activity assistance</li>
                        <li>✅ 3-hour minimum</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>

                <div class="pricing-card premium">
                    <div class="popularity-badge">Flexible</div>
                    <div class="pricing-header">
                        <h3>Babysitting</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">18</span>
                            <span class="period">/hour</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ Responsible childcare</li>
                        <li>✅ Age-appropriate activities</li>
                        <li>✅ Bedtime routines</li>
                        <li>✅ Emergency contact</li>
                        <li>✅ Background checked</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>

                <div class="pricing-card enterprise">
                    <div class="pricing-header">
                        <h3>Party Setup & Hosting</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">125</span>
                            <span class="period">/party</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ Complete party setup</li>
                        <li>✅ Activity coordination</li>
                        <li>✅ Cleanup service</li>
                        <li>✅ Up to 15 children</li>
                        <li>✅ 4-hour service</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
            </div>
        </div>

        <!-- Creative Services Pricing -->
        <div class="pricing-category-content" id="creative">
            <div class="category-header">
                <h2>🎨 Creative & Digital Services</h2>
                <p>Professional design and digital solutions</p>
            </div>
            <div class="pricing-grid">
                <div class="pricing-card standard">
                    <div class="pricing-header">
                        <h3>Logo Design</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">85</span>
                            <span class="period">/project</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ 3 design concepts</li>
                        <li>✅ 2 revision rounds</li>
                        <li>✅ High-res files</li>
                        <li>✅ Web-ready formats</li>
                        <li>✅ 5-day delivery</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>

                <div class="pricing-card premium">
                    <div class="popularity-badge">Best Value</div>
                    <div class="pricing-header">
                        <h3>Social Media Management</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">350</span>
                            <span class="period">/month</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ 12 posts per month</li>
                        <li>✅ Content creation</li>
                        <li>✅ Hashtag research</li>
                        <li>✅ Analytics reporting</li>
                        <li>✅ Community management</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>

                <div class="pricing-card enterprise">
                    <div class="pricing-header">
                        <h3>Website Setup</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">485</span>
                            <span class="period">/project</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ Professional design</li>
                        <li>✅ Mobile responsive</li>
                        <li>✅ SEO optimization</li>
                        <li>✅ Content upload</li>
                        <li>✅ Training included</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
            </div>
        </div>

        <!-- Coaching Services Pricing -->
        <div class="pricing-category-content" id="coaching">
            <div class="category-header">
                <h2>🎓 Coaching & Consulting</h2>
                <p>Personal and professional development services</p>
            </div>
            <div class="pricing-grid">
                <div class="pricing-card standard">
                    <div class="pricing-header">
                        <h3>Life Coaching Session</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">125</span>
                            <span class="period">/hour</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ Goal setting strategies</li>
                        <li>✅ Accountability support</li>
                        <li>✅ Personal action plan</li>
                        <li>✅ Progress tracking</li>
                        <li>✅ Email follow-up</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>

                <div class="pricing-card premium">
                    <div class="popularity-badge">Growth Package</div>
                    <div class="pricing-header">
                        <h3>Business Coaching</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">185</span>
                            <span class="period">/hour</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ Business strategy development</li>
                        <li>✅ Marketing guidance</li>
                        <li>✅ Financial planning</li>
                        <li>✅ Resource recommendations</li>
                        <li>✅ Monthly check-ins</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>

                <div class="pricing-card enterprise">
                    <div class="pricing-header">
                        <h3>Public Speaking Coaching</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">155</span>
                            <span class="period">/session</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ Confidence building</li>
                        <li>✅ Speech preparation</li>
                        <li>✅ Presentation skills</li>
                        <li>✅ Video practice reviews</li>
                        <li>✅ 90-minute sessions</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
            </div>
        </div>

        <!-- Admin Services Pricing -->
        <div class="pricing-category-content" id="admin">
            <div class="category-header">
                <h2>💼 Office & Admin Services</h2>
                <p>Professional administrative support for your business</p>
            </div>
            <div class="pricing-grid">
                <div class="pricing-card standard">
                    <div class="pricing-header">
                        <h3>Virtual Assistant</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">45</span>
                            <span class="period">/hour</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ Email management</li>
                        <li>✅ Calendar scheduling</li>
                        <li>✅ Data entry</li>
                        <li>✅ Research tasks</li>
                        <li>✅ 10-hour minimum</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>

                <div class="pricing-card premium">
                    <div class="popularity-badge">Business Growth</div>
                    <div class="pricing-header">
                        <h3>Customer Service</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">35</span>
                            <span class="period">/hour</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ Phone support</li>
                        <li>✅ Email responses</li>
                        <li>✅ Order processing</li>
                        <li>✅ Issue resolution</li>
                        <li>✅ 20-hour minimum</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>

                <div class="pricing-card enterprise">
                    <div class="pricing-header">
                        <h3>Bookkeeping</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">65</span>
                            <span class="period">/hour</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ Transaction recording</li>
                        <li>✅ Financial reports</li>
                        <li>✅ Expense tracking</li>
                        <li>✅ QuickBooks setup</li>
                        <li>✅ Monthly packages available</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
            </div>
        </div>

        <!-- Rental Services Pricing -->
        <div class="pricing-category-content" id="rentals">
            <div class="category-header">
                <h2>🎪 Party Rental & Setup</h2>
                <p>Complete event rental solutions with professional setup</p>
            </div>
            <div class="pricing-grid">
                <div class="pricing-card standard">
                    <div class="pricing-header">
                        <h3>Basic Party Package</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">275</span>
                            <span class="period">/event</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ Tables & chairs (up to 25 people)</li>
                        <li>✅ Basic sound system</li>
                        <li>✅ Delivery & setup</li>
                        <li>✅ Pickup & cleanup</li>
                        <li>✅ 6-hour rental</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>

                <div class="pricing-card premium">
                    <div class="popularity-badge">Most Popular</div>
                    <div class="pricing-header">
                        <h3>Premium Event Package</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">545</span>
                            <span class="period">/event</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ Everything in basic package</li>
                        <li>✅ Tent (20x20)</li>
                        <li>✅ Lighting package</li>
                        <li>✅ Dance floor</li>
                        <li>✅ Premium sound system</li>
                        <li>✅ Up to 50 people</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>

                <div class="pricing-card enterprise">
                    <div class="pricing-header">
                        <h3>Luxury Wedding Package</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount">1,250</span>
                            <span class="period">/event</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li>✅ Everything in premium</li>
                        <li>✅ Large tent (40x60)</li>
                        <li>✅ Elegant lighting design</li>
                        <li>✅ Premium linens</li>
                        <li>✅ Professional coordination</li>
                        <li>✅ Up to 150 people</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Calculator Section -->
<section class="pricing-calculator-section">
    <div class="container">
        <div class="calculator-header">
            <h2>💰 Service Cost Calculator</h2>
            <p>Get an instant estimate for your project</p>
        </div>
        
        <div class="calculator-container">
            <div class="calculator-form">
                <div class="calc-step">
                    <label>Select Service Category:</label>
                    <select id="calc-category">
                        <option value="">Choose a category...</option>
                        <option value="cleaning">🧹 Cleaning Services</option>
                        <option value="maintenance">🧰 Maintenance</option>
                        <option value="personal">🛍️ Personal Errands</option>
                        <option value="pets">🐶 Pet Care</option>
                        <option value="family">👶 Family Support</option>
                        <option value="creative">🎨 Creative Services</option>
                        <option value="coaching">🎓 Coaching</option>
                        <option value="admin">💼 Admin Services</option>
                        <option value="rentals">🎪 Party Rentals</option>
                    </select>
                </div>
                
                <div class="calc-step">
                    <label>Hours/Units Needed:</label>
                    <input type="number" id="calc-hours" min="1" value="2" placeholder="Enter hours or units">
                </div>
                
                <div class="calc-step">
                    <label>Service Frequency:</label>
                    <select id="calc-frequency">
                        <option value="1">One-time service</option>
                        <option value="0.9">Weekly (10% discount)</option>
                        <option value="0.85">Bi-weekly (15% discount)</option>
                        <option value="0.8">Monthly (20% discount)</option>
                    </select>
                </div>
                
                <button id="calculate-btn" class="calculate-btn">Calculate Cost</button>
            </div>
            
            <div class="calculator-result">
                <div class="result-display">
                    <div class="cost-breakdown">
                        <div class="cost-item">
                            <span>Base Cost:</span>
                            <span id="base-cost">$0</span>
                        </div>
                        <div class="cost-item">
                            <span>Frequency Discount:</span>
                            <span id="discount-amount">$0</span>
                        </div>
                        <div class="cost-total">
                            <span>Total Estimate:</span>
                            <span id="total-cost">$0</span>
                        </div>
                    </div>
                    <p class="result-note">*Final pricing may vary based on specific requirements and location</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Special Offers Section -->
<section class="special-offers-section">
    <div class="container">
        <div class="offers-header">
            <h2>🎉 Special Offers & Packages</h2>
            <p>Save more with our bundle deals and seasonal promotions</p>
        </div>
        
        <div class="offers-grid">
            <div class="offer-card">
                <div class="offer-badge">LIMITED TIME</div>
                <div class="offer-content">
                    <h3>New Customer Special</h3>
                    <div class="offer-discount">25% OFF</div>
                    <p>First-time customers get 25% off any cleaning or maintenance service</p>
                    <div class="offer-code">Code: WELCOME25</div>
                </div>
            </div>
            
            <div class="offer-card">
                <div class="offer-badge">POPULAR</div>
                <div class="offer-content">
                    <h3>Weekly Service Bundle</h3>
                    <div class="offer-discount">Save $50</div>
                    <p>Combine cleaning + pet care + errands for maximum savings</p>
                    <div class="offer-code">Bundle Pricing Available</div>
                </div>
            </div>
            
            <div class="offer-card">
                <div class="offer-badge">SEASONAL</div>
                <div class="offer-content">
                    <h3>Spring Cleaning Special</h3>
                    <div class="offer-discount">Free Add-On</div>
                    <p>Book deep cleaning and get window cleaning or carpet shampooing free</p>
                    <div class="offer-code">Mention: SPRING2025</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing FAQ Section -->
<section class="pricing-faq-section">
    <div class="container">
        <div class="faq-header">
            <h2>❓ Pricing FAQ</h2>
            <p>Common questions about our pricing and services</p>
        </div>
        
        <div class="faq-grid">
            <div class="faq-item">
                <div class="faq-question">Do you charge travel fees?</div>
                <div class="faq-answer">No travel fees within our standard 25-mile service area. Extended delivery available for additional cost.</div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">What's included in the quoted price?</div>
                <div class="faq-answer">All quotes include labor, basic supplies, setup/cleanup, and satisfaction guarantee. Premium materials may cost extra.</div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">Do you offer emergency or same-day service?</div>
                <div class="faq-answer">Yes! Same-day service available for an additional 50% rush fee, subject to availability.</div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">What payment methods do you accept?</div>
                <div class="faq-answer">We accept cash, check, credit cards, and digital payments. Payment due upon service completion.</div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">Are there minimum service requirements?</div>
                <div class="faq-answer">Most services have a 2-hour minimum. Some specialized services may have different minimums as noted.</div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">What if I need to cancel or reschedule?</div>
                <div class="faq-answer">Free cancellation up to 24 hours before service. Same-day cancellations may incur a 50% fee.</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="pricing-cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Get Started?</h2>
            <p>Contact us today for a free consultation and personalized quote</p>
            <div class="cta-buttons">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="cta-btn primary">
                    <span>Get Free Quote</span>
                    <div class="btn-glow"></div>
                </a>
                <a href="tel:+15551234567" class="cta-btn secondary">
                    <span>Call Now: (555) 123-4567</span>
                </a>
            </div>
        </div>
    </div>
</section>

<script>
// Pricing page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    
    // Tab functionality
    const tabBtns = document.querySelectorAll('.tab-btn');
    const categoryContents = document.querySelectorAll('.pricing-category-content');
    
    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            // Remove active class from all tabs and contents
            tabBtns.forEach(tab => tab.classList.remove('active'));
            categoryContents.forEach(content => content.classList.remove('active'));
            
            // Add active class to clicked tab and corresponding content
            this.classList.add('active');
            document.getElementById(category).classList.add('active');
        });
    });
    
    // Pricing calculator
    const calcBtn = document.getElementById('calculate-btn');
    const categorySelect = document.getElementById('calc-category');
    const hoursInput = document.getElementById('calc-hours');
    const frequencySelect = document.getElementById('calc-frequency');
    
    const basePrices = {
        'cleaning': 75,
        'maintenance': 65,
        'personal': 35,
        'pets': 25,
        'family': 20,
        'creative': 85,
        'coaching': 125,
        'admin': 45,
        'rentals': 150
    };
    
    calcBtn.addEventListener('click', function() {
        const category = categorySelect.value;
        const hours = parseInt(hoursInput.value) || 1;
        const frequency = parseFloat(frequencySelect.value);
        
        if (!category) {
            alert('Please select a service category');
            return;
        }
        
        const basePrice = basePrices[category];
        const baseCost = basePrice * hours;
        const discountAmount = baseCost * (1 - frequency);
        const totalCost = baseCost * frequency;
        
        document.getElementById('base-cost').textContent = '$' + baseCost;
        document.getElementById('discount-amount').textContent = '-$' + Math.round(discountAmount);
        document.getElementById('total-cost').textContent = '$' + Math.round(totalCost);
    });
    
    // FAQ accordion
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        const answer = item.querySelector('.faq-answer');
        
        question.addEventListener('click', function() {
            const isActive = item.classList.contains('active');
            
            // Close all other items
            faqItems.forEach(otherItem => {
                otherItem.classList.remove('active');
            });
            
            // Toggle current item
            if (!isActive) {
                item.classList.add('active');
            }
        });
    });
    
    // Pricing card hover effects
    const pricingCards = document.querySelectorAll('.pricing-card');
    
    pricingCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
});
</script>

<?php get_footer(); ?>
