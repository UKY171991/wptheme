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

<!-- Service Categories Pricing -->
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
            <button class="tab-btn" data-category="selling">📦 Selling</button>
        </div>

        <!-- Cleaning Services Pricing -->
        <div class="pricing-category-content active" id="cleaning">
            <div class="category-header">
                <h2>🧹 Home & Cleaning Services</h2>
                <p>Professional cleaning solutions for every need</p>
            </div>
            
            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>House Cleaning</h3>
                        <div class="price">$75-150</div>
                        <div class="price-unit">per visit</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Regular or deep cleaning</li>
                        <li>All rooms included</li>
                        <li>Eco-friendly products</li>
                        <li>Flexible scheduling</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Move-in/Move-out</h3>
                        <div class="price">$200-400</div>
                        <div class="price-unit">per home</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Complete deep cleaning</li>
                        <li>Inside appliances</li>
                        <li>Windows & baseboards</li>
                        <li>Same-day service available</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Pressure Washing</h3>
                        <div class="price">$100-300</div>
                        <div class="price-unit">per service</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Driveways & walkways</li>
                        <li>Deck & patio cleaning</li>
                        <li>Siding & exterior walls</li>
                        <li>Professional equipment</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Window Cleaning</h3>
                        <div class="price">$8-15</div>
                        <div class="price-unit">per window</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Interior & exterior</li>
                        <li>Screen cleaning included</li>
                        <li>Streak-free guarantee</li>
                        <li>Monthly packages available</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Airbnb Cleaning</h3>
                        <div class="price">$85-180</div>
                        <div class="price-unit">per turnover</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Fast turnaround</li>
                        <li>Inventory checking</li>
                        <li>Restocking essentials</li>
                        <li>Quality photos</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Lawn Maintenance</h3>
                        <div class="price">$45-85</div>
                        <div class="price-unit">per visit</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Mowing & edging</li>
                        <li>Trimming & cleanup</li>
                        <li>Seasonal scheduling</li>
                        <li>Equipment included</li>
                    </ul>
                </div>
            </div>
        </div>
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
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Furniture Assembly</h3>
                        <div class="price">$65-120</div>
                        <div class="price-unit">per hour</div>
                    </div>
                    <ul class="pricing-features">
                        <li>IKEA & other brands</li>
                        <li>Professional tools</li>
                        <li>Cleanup included</li>
                        <li>Same-day service</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>TV Mounting</h3>
                        <div class="price">$95-180</div>
                        <div class="price-unit">per TV</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Wall stud mounting</li>
                        <li>Cable management</li>
                        <li>All hardware included</li>
                        <li>Safety guaranteed</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Handyman Services</h3>
                        <div class="price">$75-95</div>
                        <div class="price-unit">per hour</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Minor repairs</li>
                        <li>Drywall patching</li>
                        <li>Fixture installation</li>
                        <li>2-hour minimum</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Pool Cleaning</h3>
                        <div class="price">$85-140</div>
                        <div class="price-unit">per visit</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Chemical balancing</li>
                        <li>Skimming & vacuuming</li>
                        <li>Filter cleaning</li>
                        <li>Weekly/bi-weekly</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Personal Services Pricing -->
        <div class="pricing-category-content" id="personal">
            <div class="category-header">
                <h2>🛍️ Personal Errands & Concierge</h2>
                <p>Personal assistant services for your convenience</p>
            </div>
            
            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Grocery Shopping</h3>
                        <div class="price">$35-55</div>
                        <div class="price-unit">per hour</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Shopping & delivery</li>
                        <li>Receipt & change</li>
                        <li>Special requests</li>
                        <li>Same-day service</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Moving Assistance</h3>
                        <div class="price">$45-65</div>
                        <div class="price-unit">per hour</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Loading & unloading</li>
                        <li>Packing services</li>
                        <li>Furniture protection</li>
                        <li>2-person minimum</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Personal Assistant</h3>
                        <div class="price">$40-60</div>
                        <div class="price-unit">per hour</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Errands & tasks</li>
                        <li>Waiting services</li>
                        <li>Courier delivery</li>
                        <li>Custom requests</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Decluttering</h3>
                        <div class="price">$50-80</div>
                        <div class="price-unit">per hour</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Organization systems</li>
                        <li>Donation coordination</li>
                        <li>Storage solutions</li>
                        <li>Room transformation</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Pet Services Pricing -->
        <div class="pricing-category-content" id="pets">
            <div class="category-header">
                <h2>🐶 Pet & Animal Services</h2>
                <p>Loving care for your furry family members</p>
            </div>
            
            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Dog Walking</h3>
                        <div class="price">$25-40</div>
                        <div class="price-unit">per walk</div>
                    </div>
                    <ul class="pricing-features">
                        <li>30-60 minute walks</li>
                        <li>Exercise & playtime</li>
                        <li>Photo updates</li>
                        <li>Flexible scheduling</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Pet Sitting</h3>
                        <div class="price">$35-65</div>
                        <div class="price-unit">per visit</div>
                    </div>
                    <ul class="pricing-features">
                        <li>In-home care</li>
                        <li>Feeding & medication</li>
                        <li>Companionship</li>
                        <li>Daily updates</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Pet Grooming</h3>
                        <div class="price">$65-120</div>
                        <div class="price-unit">per session</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Mobile service</li>
                        <li>Bath & brush</li>
                        <li>Nail trimming</li>
                        <li>Basic styling</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Poop Scooping</h3>
                        <div class="price">$20-35</div>
                        <div class="price-unit">per visit</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Yard cleanup</li>
                        <li>Waste disposal</li>
                        <li>Weekly service</li>
                        <li>Deodorizing option</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
            </div>
        </div>
        
        <!-- Family Services Pricing -->
        <div class="pricing-category-content" id="family">
            <div class="category-header">
                <h2>👶 Child & Family Support</h2>
                <p>Trusted support for busy families</p>
            </div>
            
            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Mother's Helper</h3>
                        <div class="price">$20-30</div>
                        <div class="price-unit">per hour</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Childcare assistance</li>
                        <li>Light housework</li>
                        <li>Meal preparation</li>
                        <li>Flexible hours</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Babysitting</h3>
                        <div class="price">$18-25</div>
                        <div class="price-unit">per hour</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Evening & weekend</li>
                        <li>Background checked</li>
                        <li>Activities included</li>
                        <li>References available</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Baby-Proofing</h3>
                        <div class="price">$150-300</div>
                        <div class="price-unit">per home</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Safety assessment</li>
                        <li>Cabinet locks</li>
                        <li>Outlet covers</li>
                        <li>Corner guards</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Party Setup</h3>
                        <div class="price">$100-250</div>
                        <div class="price-unit">per party</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Decoration setup</li>
                        <li>Table arrangement</li>
                        <li>Cleanup service</li>
                        <li>Photo assistance</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
            </div>
        </div>
        
        <!-- Creative Services Pricing -->
        <div class="pricing-category-content" id="creative">
            <div class="category-header">
                <h2>🎨 Creative & Digital Services</h2>
                <p>Professional creative solutions for your business</p>
            </div>
            
            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Graphic Design</h3>
                        <div class="price">$85-200</div>
                        <div class="price-unit">per project</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Logo design</li>
                        <li>Business cards</li>
                        <li>Flyers & brochures</li>
                        <li>2-3 revisions</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Social Media</h3>
                        <div class="price">$300-800</div>
                        <div class="price-unit">per month</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Content creation</li>
                        <li>Daily posting</li>
                        <li>Engagement management</li>
                        <li>Monthly analytics</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Photography</h3>
                        <div class="price">$150-400</div>
                        <div class="price-unit">per session</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Event photography</li>
                        <li>Product photos</li>
                        <li>Basic editing</li>
                        <li>Digital delivery</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Website Setup</h3>
                        <div class="price">$400-1200</div>
                        <div class="price-unit">per site</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Wix/Shopify build</li>
                        <li>Mobile responsive</li>
                        <li>Basic SEO setup</li>
                        <li>Training included</li>
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
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Life Coaching</h3>
                        <div class="price">$125-200</div>
                        <div class="price-unit">per session</div>
                    </div>
                    <ul class="pricing-features">
                        <li>1-hour sessions</li>
                        <li>Goal setting</li>
                        <li>Action planning</li>
                        <li>Email support</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Business Coaching</h3>
                        <div class="price">$175-300</div>
                        <div class="price-unit">per session</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Strategy development</li>
                        <li>Performance analysis</li>
                        <li>Growth planning</li>
                        <li>Resource materials</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Marketing Consulting</h3>
                        <div class="price">$150-250</div>
                        <div class="price-unit">per hour</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Marketing strategy</li>
                        <li>Campaign planning</li>
                        <li>Analytics review</li>
                        <li>Implementation guide</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Productivity Coaching</h3>
                        <div class="price">$100-175</div>
                        <div class="price-unit">per session</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Time management</li>
                        <li>System optimization</li>
                        <li>Habit formation</li>
                        <li>Progress tracking</li>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="pricing-btn">Book Now</a>
                </div>
            </div>
        </div>
        
        <!-- Admin Services Pricing -->
        <div class="pricing-category-content" id="admin">
            <div class="category-header">
                <h2>💼 Office & Admin Services</h2>
                <p>Professional administrative support solutions</p>
            </div>
            
            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Virtual Assistant</h3>
                        <div class="price">$25-45</div>
                        <div class="price-unit">per hour</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Email management</li>
                        <li>Calendar scheduling</li>
                        <li>Data entry</li>
                        <li>Research tasks</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Bookkeeping</h3>
                        <div class="price">$35-65</div>
                        <div class="price-unit">per hour</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Transaction recording</li>
                        <li>Invoice creation</li>
                        <li>Expense tracking</li>
                        <li>Monthly reports</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Transcription</h3>
                        <div class="price">$2-4</div>
                        <div class="price-unit">per minute</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Audio to text</li>
                        <li>Video transcription</li>
                        <li>Fast turnaround</li>
                        <li>Accurate results</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Customer Service</h3>
                        <div class="price">$20-35</div>
                        <div class="price-unit">per hour</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Phone support</li>
                        <li>Email responses</li>
                        <li>Chat management</li>
                        <li>Issue resolution</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Selling Services Pricing -->
        <div class="pricing-category-content" id="selling">
            <div class="category-header">
                <h2>📦 Selling, Flipping & Setup</h2>
                <p>Business setup and selling solutions</p>
            </div>
            
            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Furniture Flipping</h3>
                        <div class="price">$200-600</div>
                        <div class="price-unit">per piece</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Sourcing & purchase</li>
                        <li>Restoration work</li>
                        <li>Photography & listing</li>
                        <li>Revenue sharing</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>eBay/Amazon Selling</h3>
                        <div class="price">20-30%</div>
                        <div class="price-unit">commission</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Item photography</li>
                        <li>Listing creation</li>
                        <li>Customer service</li>
                        <li>Shipping handling</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Home Office Setup</h3>
                        <div class="price">$300-800</div>
                        <div class="price-unit">per setup</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Equipment assembly</li>
                        <li>Cable management</li>
                        <li>Ergonomic layout</li>
                        <li>Testing & training</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Party Rental Setup</h3>
                        <div class="price">$150-400</div>
                        <div class="price-unit">per event</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Equipment delivery</li>
                        <li>Professional setup</li>
                        <li>Event coordination</li>
                        <li>Breakdown service</li>
                    </ul>
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
        </div
        
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
