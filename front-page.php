<?php
/*
Template Name: Front Page
*/
get_header(); ?>

<main id="main" class="site-main">

<?php
// Universal Banner Configuration
$badge_icon = '⭐';
$badge_text = '#1 Rated Home Services in Your Area';
$title = 'Professional Home Services';
$highlight = 'You Can Trust';
$description = 'From deep cleaning to handyman repairs, we provide reliable, high-quality services that make your life easier. Licensed, insured, and dedicated to your satisfaction.';
$buttons = [
    [
        'text' => 'Explore Services',
        'url' => '#services',
        'type' => 'btn-primary',
        'icon' => '→'
    ],
    [
        'text' => 'Get Free Quote',
        'url' => get_permalink(get_page_by_path('contact')),
        'type' => 'btn-secondary',
        'icon' => '📞'
    ]
];
$stats = [
    ['number' => '500+', 'label' => 'Happy Clients'],
    ['number' => '15+', 'label' => 'Services'],
    ['number' => '24/7', 'label' => 'Support'],
    ['number' => '100%', 'label' => 'Satisfaction']
];

include get_template_directory() . '/template-parts/universal-banner.php';
?>

<!-- Services Preview Section -->
<section class="services-preview" id="services">
    <div class="container">
        <div class="section-header">
            <div class="section-badge">Our Services</div>
            <h2>What We Do Best</h2>
            <p>Professional services designed to save you time and give you peace of mind</p>
        </div>
        
        <div class="services-showcase">
            <div class="service-card">
                <div class="service-icon">🧹</div>
                <h3>Home Cleaning</h3>
                <p>Deep cleaning services that leave your home spotless and fresh</p>
                <ul class="service-highlights">
                    <li>Regular & deep cleaning</li>
                    <li>Move-in/move-out cleaning</li>
                    <li>Post-construction cleanup</li>
                    <li>Eco-friendly products</li>
                </ul>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="service-link">
                    Learn More <span>→</span>
                </a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">🔧</div>
                <h3>Handyman Services</h3>
                <p>Expert repairs and maintenance to keep your home in perfect condition</p>
                <ul class="service-highlights">
                    <li>General repairs</li>
                    <li>Furniture assembly</li>
                    <li>Painting & touch-ups</li>
                    <li>Minor plumbing</li>
                </ul>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="service-link">
                    Learn More <span>→</span>
                </a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">🌿</div>
                <h3>Yard Care</h3>
                <p>Complete landscaping and yard maintenance services</p>
                <ul class="service-highlights">
                    <li>Lawn mowing & care</li>
                    <li>Garden maintenance</li>
                    <li>Pressure washing</li>
                    <li>Seasonal cleanup</li>
                </ul>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="service-link">
                    Learn More <span>→</span>
                </a>
            </div>
        </div>
        
        <div class="services-cta">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn-outline">
                <span>View All Services</span>
                <i>→</i>
            </a>
        </div>
    </div>
</section>

<!-- Trust Section -->
<section class="trust-section">
    <div class="container">
        <div class="trust-grid">
            <div class="trust-content">
                <div class="section-header">
                    <div class="section-badge">Why Choose Us</div>
                    <h2>Trusted by Homeowners Everywhere</h2>
                    <p>We've built our reputation on reliability, quality, and exceptional customer service</p>
                </div>
                
                <div class="trust-features">
                    <div class="trust-feature">
                        <div class="feature-icon">🛡️</div>
                        <div>
                            <h4>Fully Licensed & Insured</h4>
                            <p>Complete protection and peace of mind for every service</p>
                        </div>
                    </div>
                    
                    <div class="trust-feature">
                        <div class="feature-icon">⭐</div>
                        <div>
                            <h4>5-Star Rated Service</h4>
                            <p>Consistently rated excellent by our satisfied customers</p>
                        </div>
                    </div>
                    
                    <div class="trust-feature">
                        <div class="feature-icon">💰</div>
                        <div>
                            <h4>Transparent Pricing</h4>
                            <p>No hidden fees or surprise charges - just honest pricing</p>
                        </div>
                    </div>
                    
                    <div class="trust-feature">
                        <div class="feature-icon">🚀</div>
                        <div>
                            <h4>Quick Response</h4>
                            <p>Fast scheduling and reliable service when you need it</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="trust-visual">
                <div class="trust-image">
                    <div class="trust-image-bg"></div>
                </div>
                <div class="trust-badge">
                    <span class="badge-number">500+</span>
                    <span class="badge-text">Projects Completed</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="process-section">
    <div class="container">
        <div class="section-header">
            <div class="section-badge">How It Works</div>
            <h2>Simple Process, Amazing Results</h2>
            <p>Getting professional service has never been easier</p>
        </div>
        
        <div class="process-steps">
            <div class="process-step">
                <div class="step-number">1</div>
                <div class="step-icon">📞</div>
                <h3>Contact Us</h3>
                <p>Call or message us with your service needs. We'll discuss your requirements and provide a free estimate.</p>
            </div>
            
            <div class="process-step">
                <div class="step-number">2</div>
                <div class="step-icon">📅</div>
                <h3>Schedule Service</h3>
                <p>Choose a convenient time that works for you. We offer flexible scheduling including evenings and weekends.</p>
            </div>
            
            <div class="process-step">
                <div class="step-number">3</div>
                <div class="step-icon">⚡</div>
                <h3>Expert Service</h3>
                <p>Our trained professionals arrive on time with all necessary tools and materials to complete your project.</p>
            </div>
            
            <div class="process-step">
                <div class="step-number">4</div>
                <div class="step-icon">✅</div>
                <h3>Quality Guarantee</h3>
                <p>We ensure your complete satisfaction with our work. If you're not happy, we'll make it right.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section">
    <div class="container">
        <div class="section-header">
            <div class="section-badge">Testimonials</div>
            <h2>What Our Customers Say</h2>
            <p>Real feedback from real customers who trust us with their homes</p>
        </div>
        
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
                <blockquote>
                    "Absolutely fantastic service! They transformed my cluttered garage into an organized space I actually want to use. Professional, efficient, and reasonably priced."
                </blockquote>
                <div class="testimonial-author">
                    <div class="author-avatar">SM</div>
                    <div class="author-info">
                        <h4>Sarah Martinez</h4>
                        <p>Homeowner</p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
                <blockquote>
                    "The team did an amazing deep clean of our entire house. Every surface was spotless and they were incredibly thorough. Will definitely use them again!"
                </blockquote>
                <div class="testimonial-author">
                    <div class="author-avatar">DJ</div>
                    <div class="author-info">
                        <h4>David Johnson</h4>
                        <p>Business Owner</p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
                <blockquote>
                    "Quick response, fair pricing, and excellent work. They fixed several issues around my house that I'd been putting off for months. Highly recommend!"
                </blockquote>
                <div class="testimonial-author">
                    <div class="author-avatar">ER</div>
                    <div class="author-info">
                        <h4>Emily Rodriguez</h4>
                        <p>Property Manager</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA Section -->
<section class="final-cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Get Started?</h2>
            <p>Join hundreds of satisfied customers who trust us with their home service needs</p>
            <div class="cta-buttons">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-primary">
                    <span>Get Free Quote</span>
                    <i>📞</i>
                </a>
                <a href="tel:+1234567890" class="btn-secondary">
                    <span>Call Now</span>
                    <i>☎️</i>
                </a>
            </div>
        </div>
    </div>
</section>

</main><!-- #main -->

<?php get_footer(); ?>
