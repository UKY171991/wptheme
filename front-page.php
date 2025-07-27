<?php
/**
 * BluePrint Folder - Homepage Template
 * Modern, professional layout with engaging sections
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */

get_header(); ?>

<!-- Modern Hero Section -->
<section class="modern-hero-section">
    <div class="hero-background">
        <div class="hero-gradient"></div>
        <div class="hero-pattern"></div>
        <div class="floating-elements">
            <div class="floating-element element-1"></div>
            <div class="floating-element element-2"></div>
            <div class="floating-element element-3"></div>
        </div>
    </div>
    
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6">
                <div class="hero-content">
                    <div class="hero-badge">
                        <i class="fas fa-award me-2"></i>
                        <span>Trusted by 500+ Businesses</span>
                    </div>
                    
                    <h1 class="hero-title">
                        <?php echo get_theme_mod('hero_title', 'Professional Services That <span class="text-primary">Drive Results</span>'); ?>
                    </h1>
                    
                    <p class="hero-description">
                        <?php echo get_theme_mod('hero_subtitle', 'We deliver exceptional business solutions tailored to your unique needs. From consultation to implementation, we\'re your trusted partner for success.'); ?>
                    </p>
                    
                    <div class="hero-actions">
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-lg me-3">
                            <i class="fas fa-rocket me-2"></i>
                            Get Started Today
                        </a>
                        <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-play me-2"></i>
                            View Our Services
                        </a>
                    </div>
                    
                    <!-- Trust Indicators -->
                    <div class="trust-indicators">
                        <div class="trust-item">
                            <i class="fas fa-shield-alt"></i>
                            <span>100% Secure</span>
                        </div>
                        <div class="trust-item">
                            <i class="fas fa-clock"></i>
                            <span>24/7 Support</span>
                        </div>
                        <div class="trust-item">
                            <i class="fas fa-thumbs-up"></i>
                            <span>Satisfaction Guaranteed</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="hero-visual">
                    <div class="hero-image-container">
                        <div class="hero-card card-1">
                            <div class="card-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="card-content">
                                <h4>Growth</h4>
                                <p>500% increase</p>
                            </div>
                        </div>
                        
                        <div class="hero-card card-2">
                            <div class="card-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="card-content">
                                <h4>Clients</h4>
                                <p>1000+ satisfied</p>
                            </div>
                        </div>
                        
                        <div class="hero-card card-3">
                            <div class="card-icon">
                                <i class="fas fa-trophy"></i>
                            </div>
                            <div class="card-content">
                                <h4>Awards</h4>
                                <p>Industry leader</p>
                            </div>
                        </div>
                        
                        <div class="hero-main-visual">
                            <div class="visual-content">
                                <i class="fas fa-cogs fa-3x"></i>
                                <h3>Professional Solutions</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
            <a href="#services-section" class="scroll-btn">
                <i class="fas fa-chevron-down"></i>
            </a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="feature-card h-100">
                    <div class="feature-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3 class="feature-title">Fast Delivery</h3>
                    <p class="feature-description">Quick turnaround times without compromising on quality. We deliver results when you need them.</p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="feature-card h-100">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="feature-title">Secure & Reliable</h3>
                    <p class="feature-description">Your data and projects are protected with enterprise-grade security and reliable processes.</p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="feature-card h-100">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="feature-title">24/7 Support</h3>
                    <p class="feature-description">Round-the-clock support to ensure your business never stops. We're here when you need us.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section class="about-section py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="about-content">
                    <div class="section-badge">
                        <i class="fas fa-info-circle me-2"></i>
                        About Us
                    </div>
                    
                    <h2 class="section-title">Why Choose BluePrint Folder?</h2>
                    <p class="section-description">With over a decade of experience in providing professional services, BluePrint Folder has established itself as a leader in delivering quality solutions that drive real business results.</p>
                    
                    <div class="about-stats">
                        <div class="row">
                            <div class="col-6">
                                <div class="stat-box">
                                    <div class="stat-number">500+</div>
                                    <div class="stat-label">Projects Completed</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stat-box">
                                    <div class="stat-number">100%</div>
                                    <div class="stat-label">Client Satisfaction</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="about-features">
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary me-2"></i>
                            <span>Expert Team of Professionals</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary me-2"></i>
                            <span>Proven Track Record</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary me-2"></i>
                            <span>Customized Solutions</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary me-2"></i>
                            <span>24/7 Customer Support</span>
                        </div>
                    </div>
                    
                    <a href="<?php echo esc_url(home_url('/about')); ?>" class="btn btn-primary btn-lg">
                        <i class="fas fa-arrow-right me-2"></i>
                        Learn More About Us
                    </a>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="about-visual">
                    <div class="about-image-container">
                        <div class="about-image">
                            <div class="image-placeholder">
                                <i class="fas fa-building fa-4x text-primary"></i>
                                <h4>Professional Excellence</h4>
                            </div>
                        </div>
                        
                        <div class="about-badge badge-1">
                            <i class="fas fa-award"></i>
                            <span>Industry Leader</span>
                        </div>
                        
                        <div class="about-badge badge-2">
                            <i class="fas fa-star"></i>
                            <span>5-Star Rated</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services-section" class="services-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-badge">
                <i class="fas fa-cogs me-2"></i>
                Our Services
            </div>
            <h2 class="section-title">Professional Solutions for Every Business Need</h2>
            <p class="section-description">Comprehensive services designed to help your business grow and succeed in today's competitive market.</p>
        </div>
        
        <!-- Services Grid -->
        <div class="row g-4">
            <!-- Service 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="modern-service-card h-100">
                    <div class="service-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3 class="service-title">Web Development</h3>
                    <p class="service-description">Custom websites and web applications built with modern technologies and best practices.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check text-primary me-2"></i>Responsive Design</li>
                        <li><i class="fas fa-check text-primary me-2"></i>SEO Optimized</li>
                        <li><i class="fas fa-check text-primary me-2"></i>Fast Loading</li>
                    </ul>
                    <a href="<?php echo esc_url(home_url('/services/web-development')); ?>" class="btn btn-outline-primary">
                        Learn More <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
            
            <!-- Service 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="modern-service-card h-100 featured">
                    <div class="featured-badge">Popular</div>
                    <div class="service-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="service-title">Digital Marketing</h3>
                    <p class="service-description">Comprehensive digital marketing strategies to boost your online presence and drive results.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check text-primary me-2"></i>SEO & SEM</li>
                        <li><i class="fas fa-check text-primary me-2"></i>Social Media</li>
                        <li><i class="fas fa-check text-primary me-2"></i>Content Marketing</li>
                    </ul>
                    <a href="<?php echo esc_url(home_url('/services/digital-marketing')); ?>" class="btn btn-primary">
                        Learn More <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
            
            <!-- Service 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="modern-service-card h-100">
                    <div class="service-icon">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <h3 class="service-title">Business Consulting</h3>
                    <p class="service-description">Expert guidance to help your business optimize operations and achieve strategic goals.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check text-primary me-2"></i>Strategy Planning</li>
                        <li><i class="fas fa-check text-primary me-2"></i>Process Optimization</li>
                        <li><i class="fas fa-check text-primary me-2"></i>Growth Analysis</li>
                    </ul>
                    <a href="<?php echo esc_url(home_url('/services/consulting')); ?>" class="btn btn-outline-primary">
                        Learn More <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
            
            <!-- Service 4 -->
            <div class="col-lg-4 col-md-6">
                <div class="modern-service-card h-100">
                    <div class="service-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="service-title">Mobile Apps</h3>
                    <p class="service-description">Native and cross-platform mobile applications for iOS and Android devices.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check text-primary me-2"></i>iOS & Android</li>
                        <li><i class="fas fa-check text-primary me-2"></i>User-Friendly UI</li>
                        <li><i class="fas fa-check text-primary me-2"></i>App Store Ready</li>
                    </ul>
                    <a href="<?php echo esc_url(home_url('/services/mobile-apps')); ?>" class="btn btn-outline-primary">
                        Learn More <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
            
            <!-- Service 5 -->
            <div class="col-lg-4 col-md-6">
                <div class="modern-service-card h-100">
                    <div class="service-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="service-title">Cybersecurity</h3>
                    <p class="service-description">Comprehensive security solutions to protect your business from digital threats.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check text-primary me-2"></i>Security Audits</li>
                        <li><i class="fas fa-check text-primary me-2"></i>Threat Monitoring</li>
                        <li><i class="fas fa-check text-primary me-2"></i>Data Protection</li>
                    </ul>
                    <a href="<?php echo esc_url(home_url('/services/cybersecurity')); ?>" class="btn btn-outline-primary">
                        Learn More <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
            
            <!-- Service 6 -->
            <div class="col-lg-4 col-md-6">
                <div class="modern-service-card h-100">
                    <div class="service-icon">
                        <i class="fas fa-cloud"></i>
                    </div>
                    <h3 class="service-title">Cloud Solutions</h3>
                    <p class="service-description">Scalable cloud infrastructure and migration services for modern businesses.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check text-primary me-2"></i>Cloud Migration</li>
                        <li><i class="fas fa-check text-primary me-2"></i>Infrastructure Setup</li>
                        <li><i class="fas fa-check text-primary me-2"></i>24/7 Monitoring</li>
                    </ul>
                    <a href="<?php echo esc_url(home_url('/services/cloud-solutions')); ?>" class="btn btn-outline-primary">
                        Learn More <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="<?php echo esc_url(get_post_type_archive_link('service') ?: home_url('/services')); ?>" class="btn btn-primary btn-lg">
                <i class="fas fa-th-large me-2"></i>
                View All Services
            </a>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="process-section py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-badge">
                <i class="fas fa-cogs me-2"></i>
                Our Process
            </div>
            <h2 class="section-title">How We Work</h2>
            <p class="section-description">Our proven 4-step process ensures successful project delivery every time.</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="process-step text-center">
                    <div class="step-number">01</div>
                    <div class="step-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3 class="step-title">Consultation</h3>
                    <p class="step-description">We start by understanding your needs, goals, and challenges through detailed consultation.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-step text-center">
                    <div class="step-number">02</div>
                    <div class="step-icon">
                        <i class="fas fa-drafting-compass"></i>
                    </div>
                    <h3 class="step-title">Planning</h3>
                    <p class="step-description">Our experts create a comprehensive strategy and roadmap tailored to your specific requirements.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-step text-center">
                    <div class="step-number">03</div>
                    <div class="step-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3 class="step-title">Development</h3>
                    <p class="step-description">We implement the solution using best practices and cutting-edge technologies.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-step text-center">
                    <div class="step-number">04</div>
                    <div class="step-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3 class="step-title">Launch</h3>
                    <p class="step-description">We deploy your solution and provide ongoing support to ensure continued success.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-badge">
                <i class="fas fa-quote-left me-2"></i>
                Testimonials
            </div>
            <h2 class="section-title">What Our Clients Say</h2>
            <p class="section-description">Don't just take our word for it - hear from our satisfied clients.</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="modern-testimonial-card h-100">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <blockquote class="testimonial-text">
                        "BluePrint Folder transformed our business with their exceptional web development services. The team was professional, responsive, and delivered beyond our expectations."
                    </blockquote>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <h4 class="author-name">Sarah Johnson</h4>
                            <p class="author-position">CEO, TechStart Inc.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="modern-testimonial-card h-100">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <blockquote class="testimonial-text">
                        "Outstanding digital marketing results! Our online presence increased by 300% within just 3 months. Highly recommend their services."
                    </blockquote>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <h4 class="author-name">Michael Chen</h4>
                            <p class="author-position">Marketing Director, GrowthCo</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="modern-testimonial-card h-100">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <blockquote class="testimonial-text">
                        "The consulting services helped us streamline our operations and increase efficiency by 40%. Professional team with excellent expertise."
                    </blockquote>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <h4 class="author-name">Emily Rodriguez</h4>
                            <p class="author-position">Operations Manager, Efficiency Plus</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Section -->
<section class="blog-section py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-badge">
                <i class="fas fa-newspaper me-2"></i>
                Latest Insights
            </div>
            <h2 class="section-title">News & Industry Updates</h2>
            <p class="section-description">Stay informed with our latest articles, tips, and industry insights.</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <article class="modern-blog-card h-100">
                    <div class="blog-image">
                        <div class="image-placeholder">
                            <i class="fas fa-laptop-code fa-2x text-primary"></i>
                        </div>
                        <div class="blog-category">Web Development</div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="blog-date">
                                <i class="fas fa-calendar me-1"></i>
                                March 15, 2024
                            </span>
                            <span class="blog-author">
                                <i class="fas fa-user me-1"></i>
                                John Doe
                            </span>
                        </div>
                        <h3 class="blog-title">
                            <a href="#">10 Essential Web Development Trends for 2024</a>
                        </h3>
                        <p class="blog-excerpt">Discover the latest trends shaping the future of web development and how they can benefit your business.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm">
                            Read More <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </article>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <article class="modern-blog-card h-100">
                    <div class="blog-image">
                        <div class="image-placeholder">
                            <i class="fas fa-chart-line fa-2x text-primary"></i>
                        </div>
                        <div class="blog-category">Digital Marketing</div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="blog-date">
                                <i class="fas fa-calendar me-1"></i>
                                March 12, 2024
                            </span>
                            <span class="blog-author">
                                <i class="fas fa-user me-1"></i>
                                Jane Smith
                            </span>
                        </div>
                        <h3 class="blog-title">
                            <a href="#">Maximizing ROI with Strategic Digital Marketing</a>
                        </h3>
                        <p class="blog-excerpt">Learn proven strategies to increase your return on investment through targeted digital marketing campaigns.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm">
                            Read More <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </article>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <article class="modern-blog-card h-100">
                    <div class="blog-image">
                        <div class="image-placeholder">
                            <i class="fas fa-shield-alt fa-2x text-primary"></i>
                        </div>
                        <div class="blog-category">Cybersecurity</div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="blog-date">
                                <i class="fas fa-calendar me-1"></i>
                                March 10, 2024
                            </span>
                            <span class="blog-author">
                                <i class="fas fa-user me-1"></i>
                                Mike Johnson
                            </span>
                        </div>
                        <h3 class="blog-title">
                            <a href="#">Essential Cybersecurity Practices for Small Business</a>
                        </h3>
                        <p class="blog-excerpt">Protect your business with these fundamental cybersecurity measures every small business should implement.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm">
                            Read More <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </article>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts')) ?: home_url('/blog')); ?>" class="btn btn-primary btn-lg">
                <i class="fas fa-newspaper me-2"></i>
                View All Articles
            </a>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="modern-cta-section py-5">
    <div class="cta-background">
        <div class="cta-gradient"></div>
        <div class="cta-pattern"></div>
    </div>
    
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="cta-content">
                    <h2 class="cta-title">Ready to Transform Your Business?</h2>
                    <p class="cta-description">Join hundreds of satisfied clients who have achieved remarkable results with our professional services. Let's discuss how we can help you reach your goals.</p>
                    
                    <div class="cta-features">
                        <div class="cta-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Free Consultation</span>
                        </div>
                        <div class="cta-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>No Hidden Fees</span>
                        </div>
                        <div class="cta-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Quick Response</span>
                        </div>
                        <div class="cta-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Expert Team</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="cta-actions">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-light btn-lg btn-block mb-3">
                        <i class="fas fa-envelope me-2"></i>
                        Get Free Consultation
                    </a>
                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_mod('company_phone', '(555) 123-4567'))); ?>" class="btn btn-outline-light btn-lg btn-block">
                        <i class="fas fa-phone me-2"></i>
                        Call Us Now
                    </a>
                    
                    <div class="cta-contact-info">
                        <p class="mb-0">
                            <i class="fas fa-clock me-2"></i>
                            Available 24/7 for support
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
