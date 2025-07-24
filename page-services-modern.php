<?php
/**
 * Template Name: Modern Services Page
 */
get_header(); ?>

<main id="main" class="site-main">

<?php
// Universal Banner Configuration
$badge_icon = '🛠️';
$badge_text = 'Professional Home Services';
$title = 'Our Services';
$highlight = 'Quality & Reliability';
$description = 'Comprehensive home services designed to make your life easier. From cleaning to maintenance, we provide professional, reliable solutions you can trust.';
$buttons = [
    [
        'text' => 'Browse Services',
        'url' => '#services-grid',
        'type' => 'btn-primary',
        'icon' => '→'
    ],
    [
        'text' => 'Get Quote',
        'url' => get_permalink(get_page_by_path('contact')),
        'type' => 'btn-secondary',
        'icon' => '📞'
    ]
];

include get_template_directory() . '/template-parts/universal-banner.php';
?>

<!-- Services Grid Section -->
<section id="services-grid" class="services-section">
    <div class="container">
        <div class="services-grid">
            <?php
            $service_categories = get_service_categories();
            $count = 0;
            foreach ($service_categories as $category_name => $category) {
                if ($count >= 6) break; // Show only 6 main categories
                ?>
                <div class="service-card">
                    <div class="service-icon">
                        <?php 
                        $icons = ['🧹', '🔧', '🛍️', '🐶', '👶', '🎨'];
                        echo $icons[$count % count($icons)]; 
                        ?>
                    </div>
                    <h3><?php echo esc_html($category['name']); ?></h3>
                    <p><?php echo esc_html($category['description']); ?></p>
                    <ul class="service-list">
                        <?php 
                        $services = array_slice(array_keys($category['services'] ?? []), 0, 4);
                        foreach ($services as $service_name) {
                            echo '<li>' . esc_html($service_name) . '</li>';
                        }
                        ?>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="service-cta">Get Quote →</a>
                </div>
                <?php
                $count++;
            }
            ?>
        </div>
    </div>
</section>

</main>
                        <span class="stat-number">15,000+</span>
                        <span class="stat-label">Happy Customers</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">20+</span>
                        <span class="stat-label">Services</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">4.9</span>
                        <span class="stat-label">Rating</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">24/7</span>
                        <span class="stat-label">Support</span>
                    </div>
                </div>
                
                <div class="hero-actions">
                    <a href="#services" class="btn-primary">
                        <span>View All Services</span>
                        <i class="fas fa-arrow-down"></i>
                    </a>
                    <a href="#quote" class="btn-secondary">
                        <span>Get Free Quote</span>
                        <i class="fas fa-calculator"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Categories -->
    <section id="services" class="services-categories">
        <div class="container">
            <div class="section-header">
                <h2>Our Professional Services</h2>
                <p>Choose from our comprehensive range of home services, each delivered by trained professionals</p>
            </div>

            <div class="services-filter">
                <button class="filter-btn active" data-category="all">All Services</button>
                <button class="filter-btn" data-category="cleaning">Cleaning</button>
                <button class="filter-btn" data-category="handyman">Handyman</button>
                <button class="filter-btn" data-category="outdoor">Outdoor</button>
                <button class="filter-btn" data-category="specialty">Specialty</button>
            </div>

            <div class="services-grid">
                <!-- Home Cleaning Services -->
                <div class="service-card" data-category="cleaning">
                    <div class="service-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="service-content">
                        <h3>Deep House Cleaning</h3>
                        <p>Comprehensive cleaning service that leaves your home spotless and sanitized.</p>
                        <div class="service-features">
                            <span class="feature">✓ All rooms included</span>
                            <span class="feature">✓ Eco-friendly products</span>
                            <span class="feature">✓ Same-day service</span>
                        </div>
                        <div class="service-meta">
                            <span class="price">Starting at $150</span>
                            <span class="duration">2-4 hours</span>
                        </div>
                        <div class="service-rating">
                            <div class="stars">⭐⭐⭐⭐⭐</div>
                            <span>4.9 (2,847 reviews)</span>
                        </div>
                        <div class="service-actions">
                            <button class="btn-book" data-service="deep-cleaning">Book Now</button>
                            <button class="btn-info" data-service="deep-cleaning">Learn More</button>
                        </div>
                    </div>
                </div>

                <!-- Pressure Washing -->
                <div class="service-card" data-category="outdoor">
                    <div class="service-icon">
                        <i class="fas fa-tint"></i>
                    </div>
                    <div class="service-content">
                        <h3>Pressure Washing</h3>
                        <p>Restore your property's curb appeal with professional pressure washing services.</p>
                        <div class="service-features">
                            <span class="feature">✓ Driveway & walkways</span>
                            <span class="feature">✓ Siding & decks</span>
                            <span class="feature">✓ Commercial grade equipment</span>
                        </div>
                        <div class="service-meta">
                            <span class="price">Starting at $200</span>
                            <span class="duration">1-3 hours</span>
                        </div>
                        <div class="service-rating">
                            <div class="stars">⭐⭐⭐⭐⭐</div>
                            <span>4.8 (1,523 reviews)</span>
                        </div>
                        <div class="service-actions">
                            <button class="btn-book" data-service="pressure-washing">Book Now</button>
                            <button class="btn-info" data-service="pressure-washing">Learn More</button>
                        </div>
                    </div>
                </div>

                <!-- Handyman Services -->
                <div class="service-card" data-category="handyman">
                    <div class="service-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <div class="service-content">
                        <h3>Handyman Services</h3>
                        <p>Expert repairs and installations for all your home maintenance needs.</p>
                        <div class="service-features">
                            <span class="feature">✓ Furniture assembly</span>
                            <span class="feature">✓ Minor repairs</span>
                            <span class="feature">✓ TV mounting</span>
                        </div>
                        <div class="service-meta">
                            <span class="price">Starting at $75</span>
                            <span class="duration">1-2 hours</span>
                        </div>
                        <div class="service-rating">
                            <div class="stars">⭐⭐⭐⭐⭐</div>
                            <span>4.9 (3,156 reviews)</span>
                        </div>
                        <div class="service-actions">
                            <button class="btn-book" data-service="handyman">Book Now</button>
                            <button class="btn-info" data-service="handyman">Learn More</button>
                        </div>
                    </div>
                </div>

                <!-- Lawn Care -->
                <div class="service-card" data-category="outdoor">
                    <div class="service-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <div class="service-content">
                        <h3>Lawn Care & Landscaping</h3>
                        <p>Professional lawn maintenance and landscaping services for beautiful outdoor spaces.</p>
                        <div class="service-features">
                            <span class="feature">✓ Mowing & edging</span>
                            <span class="feature">✓ Fertilization</span>
                            <span class="feature">✓ Seasonal cleanup</span>
                        </div>
                        <div class="service-meta">
                            <span class="price">Starting at $85</span>
                            <span class="duration">1-3 hours</span>
                        </div>
                        <div class="service-rating">
                            <div class="stars">⭐⭐⭐⭐⭐</div>
                            <span>4.7 (987 reviews)</span>
                        </div>
                        <div class="service-actions">
                            <button class="btn-book" data-service="lawn-care">Book Now</button>
                            <button class="btn-info" data-service="lawn-care">Learn More</button>
                        </div>
                    </div>
                </div>

                <!-- Window Cleaning -->
                <div class="service-card" data-category="cleaning">
                    <div class="service-icon">
                        <i class="fas fa-window-maximize"></i>
                    </div>
                    <div class="service-content">
                        <h3>Window Cleaning</h3>
                        <p>Crystal clear windows with streak-free professional cleaning.</p>
                        <div class="service-features">
                            <span class="feature">✓ Interior & exterior</span>
                            <span class="feature">✓ Screen cleaning</span>
                            <span class="feature">✓ Sill cleaning</span>
                        </div>
                        <div class="service-meta">
                            <span class="price">Starting at $120</span>
                            <span class="duration">2-4 hours</span>
                        </div>
                        <div class="service-rating">
                            <div class="stars">⭐⭐⭐⭐⭐</div>
                            <span>4.8 (1,234 reviews)</span>
                        </div>
                        <div class="service-actions">
                            <button class="btn-book" data-service="window-cleaning">Book Now</button>
                            <button class="btn-info" data-service="window-cleaning">Learn More</button>
                        </div>
                    </div>
                </div>

                <!-- Moving Services -->
                <div class="service-card" data-category="specialty">
                    <div class="service-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="service-content">
                        <h3>Moving Services</h3>
                        <p>Stress-free moving with professional packing and transportation.</p>
                        <div class="service-features">
                            <span class="feature">✓ Packing & unpacking</span>
                            <span class="feature">✓ Furniture disassembly</span>
                            <span class="feature">✓ Insurance included</span>
                        </div>
                        <div class="service-meta">
                            <span class="price">Starting at $300</span>
                            <span class="duration">4-8 hours</span>
                        </div>
                        <div class="service-rating">
                            <div class="stars">⭐⭐⭐⭐⭐</div>
                            <span>4.9 (756 reviews)</span>
                        </div>
                        <div class="service-actions">
                            <button class="btn-book" data-service="moving">Book Now</button>
                            <button class="btn-info" data-service="moving">Learn More</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="services-load-more">
                <button class="btn-load-more" id="load-more-services">
                    <span>View All 20+ Services</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="why-choose-us">
        <div class="container">
            <div class="section-header">
                <h2>Why Choose Our Services</h2>
                <p>We're committed to delivering exceptional results that exceed your expectations</p>
            </div>

            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Licensed & Insured</h3>
                    <p>All our professionals are fully licensed, bonded, and insured for your peace of mind.</p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>On-Time Guarantee</h3>
                    <p>We value your time. If we're late, your service is free - that's our promise.</p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <h3>Quality Guarantee</h3>
                    <p>Not satisfied? We'll make it right or refund your money, no questions asked.</p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3>24/7 Support</h3>
                    <p>Our customer support team is available around the clock to assist you.</p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3>Eco-Friendly</h3>
                    <p>We use environmentally safe products and methods in all our services.</p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Easy Booking</h3>
                    <p>Book online or by phone with instant confirmation and real-time updates.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Quote Calculator -->
    <section id="quote" class="quote-calculator">
        <div class="container">
            <div class="quote-wrapper">
                <div class="quote-info">
                    <h2>Get Your Instant Quote</h2>
                    <p>Calculate your service cost in under 30 seconds with our smart pricing tool.</p>
                    
                    <div class="quote-features">
                        <div class="feature">
                            <i class="fas fa-bolt"></i>
                            <span>Instant Results</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-shield-check"></i>
                            <span>No Obligation</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-percentage"></i>
                            <span>Best Prices</span>
                        </div>
                    </div>
                </div>

                <div class="quote-form">
                    <form id="instant-quote-form">
                        <div class="form-step active" data-step="1">
                            <h3>What service do you need?</h3>
                            <div class="service-options">
                                <label class="service-option">
                                    <input type="radio" name="service" value="cleaning" data-base-price="150">
                                    <div class="option-content">
                                        <i class="fas fa-home"></i>
                                        <span>House Cleaning</span>
                                        <small>Starting at $150</small>
                                    </div>
                                </label>
                                <label class="service-option">
                                    <input type="radio" name="service" value="pressure-washing" data-base-price="200">
                                    <div class="option-content">
                                        <i class="fas fa-tint"></i>
                                        <span>Pressure Washing</span>
                                        <small>Starting at $200</small>
                                    </div>
                                </label>
                                <label class="service-option">
                                    <input type="radio" name="service" value="handyman" data-base-price="75">
                                    <div class="option-content">
                                        <i class="fas fa-tools"></i>
                                        <span>Handyman</span>
                                        <small>Starting at $75</small>
                                    </div>
                                </label>
                                <label class="service-option">
                                    <input type="radio" name="service" value="lawn-care" data-base-price="85">
                                    <div class="option-content">
                                        <i class="fas fa-leaf"></i>
                                        <span>Lawn Care</span>
                                        <small>Starting at $85</small>
                                    </div>
                                </label>
                            </div>
                            <button type="button" class="btn-next" onclick="nextStep()">Next</button>
                        </div>

                        <div class="form-step" data-step="2">
                            <h3>Property details</h3>
                            <div class="form-group">
                                <label>Property size</label>
                                <select name="size" required>
                                    <option value="">Select size...</option>
                                    <option value="small" data-multiplier="1">Small (1-2 bedrooms)</option>
                                    <option value="medium" data-multiplier="1.5">Medium (3-4 bedrooms)</option>
                                    <option value="large" data-multiplier="2">Large (5+ bedrooms)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>How often?</label>
                                <select name="frequency" required>
                                    <option value="">Select frequency...</option>
                                    <option value="one-time" data-multiplier="1">One-time service</option>
                                    <option value="weekly" data-multiplier="0.9">Weekly (10% discount)</option>
                                    <option value="bi-weekly" data-multiplier="0.95">Bi-weekly (5% discount)</option>
                                    <option value="monthly" data-multiplier="1">Monthly</option>
                                </select>
                            </div>
                            <div class="form-navigation">
                                <button type="button" class="btn-prev" onclick="prevStep()">Previous</button>
                                <button type="button" class="btn-next" onclick="calculateQuote()">Get Quote</button>
                            </div>
                        </div>

                        <div class="form-step" data-step="3">
                            <h3>Your Estimated Quote</h3>
                            <div class="quote-result">
                                <div class="quote-price">
                                    <span class="price-label">Estimated Cost:</span>
                                    <span class="price-amount" id="calculated-price">$0</span>
                                </div>
                                <div class="quote-breakdown" id="price-breakdown">
                                    <!-- Price breakdown will be populated by JavaScript -->
                                </div>
                                <div class="quote-disclaimer">
                                    <small>*Final price may vary based on specific requirements. This is an estimate only.</small>
                                </div>
                            </div>
                            <div class="quote-actions">
                                <button type="button" class="btn-book-quote">Book This Service</button>
                                <button type="button" class="btn-new-quote" onclick="resetQuote()">New Quote</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="how-it-works">
        <div class="container">
            <div class="section-header">
                <h2>How It Works</h2>
                <p>Simple steps to get the professional service you need</p>
            </div>

            <div class="process-steps">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <div class="step-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3>Book Online</h3>
                    <p>Choose your service, select a time, and book instantly online or by phone.</p>
                </div>

                <div class="process-step">
                    <div class="step-number">2</div>
                    <div class="step-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <h3>Professional Arrives</h3>
                    <p>Our trained, uniformed professional arrives on time with all necessary equipment.</p>
                </div>

                <div class="process-step">
                    <div class="step-number">3</div>
                    <div class="step-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Service Complete</h3>
                    <p>Quality work completed to your satisfaction with a follow-up to ensure happiness.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <h2>What Our Customers Say</h2>
                <p>Real reviews from satisfied customers</p>
            </div>

            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <div class="stars">⭐⭐⭐⭐⭐</div>
                    </div>
                    <p>"Outstanding service! They arrived on time, were professional, and did an amazing job cleaning our home. Will definitely book again."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">SM</div>
                        <div class="author-info">
                            <span class="author-name">Sarah Martinez</span>
                            <span class="author-service">House Cleaning</span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <div class="stars">⭐⭐⭐⭐⭐</div>
                    </div>
                    <p>"The handyman was skilled and efficient. Fixed everything on my list and even gave me helpful tips for maintenance."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">JD</div>
                        <div class="author-info">
                            <span class="author-name">John Davis</span>
                            <span class="author-service">Handyman Services</span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <div class="stars">⭐⭐⭐⭐⭐</div>
                    </div>
                    <p>"Incredible pressure washing service! My driveway looks brand new. Fair pricing and excellent customer service."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">EM</div>
                        <div class="author-info">
                            <span class="author-name">Emily Rodriguez</span>
                            <span class="author-service">Pressure Washing</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="final-cta">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Experience Professional Service?</h2>
                <p>Join thousands of satisfied customers who trust us with their homes</p>
                
                <div class="cta-features">
                    <div class="cta-feature">
                        <i class="fas fa-gift"></i>
                        <span>20% off first service</span>
                    </div>
                    <div class="cta-feature">
                        <i class="fas fa-calendar-check"></i>
                        <span>Same-day booking</span>
                    </div>
                    <div class="cta-feature">
                        <i class="fas fa-shield-alt"></i>
                        <span>100% satisfaction guarantee</span>
                    </div>
                </div>
                
                <div class="cta-actions">
                    <a href="#quote" class="btn-primary">
                        <span>Get Free Quote</span>
                        <i class="fas fa-arrow-up"></i>
                    </a>
                    <a href="tel:555-123-4567" class="btn-secondary">
                        <span>Call Now: (555) 123-4567</span>
                        <i class="fas fa-phone"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
