<?php
/**
 * Template Name: About Us - Improved
 * 
 * Modern, comprehensive about page with enhanced content and interactive elements
 */

get_header(); ?>

<!-- Hero Section with Modern Design -->
<section class="modern-hero about-hero-new">
    <div class="hero-background">
        <div class="hero-particles"></div>
    </div>
    <div class="hero-overlay"></div>
    
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge">
                <i class="fas fa-award badge-icon"></i>
                <span>Trusted Since 2004</span>
            </div>
            
            <h1 class="hero-title">
                Transforming Lives Through 
                <span class="title-highlight">Exceptional Service</span>
            </h1>
            
            <p class="hero-description">
                We're more than just a service company - we're your partners in creating a better life. 
                From spotless homes to reliable maintenance, we handle the details so you can focus on what matters most.
            </p>
            
            <div class="hero-buttons">
                <a href="#company-story" class="btn btn-primary">
                    <i class="fas fa-play"></i>
                    Watch Our Story
                </a>
                <a href="<?php echo home_url('/contact'); ?>" class="btn btn-secondary">
                    <i class="fas fa-calendar"></i>
                    Schedule Service
                </a>
            </div>
            
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">25,000+</span>
                    <span class="stat-label">Satisfied Clients</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">20+</span>
                    <span class="stat-label">Years Excellence</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">99.8%</span>
                    <span class="stat-label">Quality Rating</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Emergency Support</span>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="about-page-content">
    <!-- Company Story Section -->
    <section id="company-story" class="story-section">
        <div class="container">
            <div class="story-timeline">
                <div class="section-header">
                    <span class="section-badge">Our Journey</span>
                    <h2>From Humble Beginnings to Industry Leaders</h2>
                    <p>Every great company has a story. Ours is about passion, perseverance, and an unwavering commitment to excellence.</p>
                </div>
                
                <div class="timeline-container">
                    <div class="timeline-item">
                        <div class="timeline-year">2004</div>
                        <div class="timeline-content">
                            <h3>The Beginning</h3>
                            <p>Started as a small family business with just one van and a dream to provide exceptional home cleaning services to our local community.</p>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-year">2008</div>
                        <div class="timeline-content">
                            <h3>Expanding Services</h3>
                            <p>Added maintenance, landscaping, and personal assistance services based on customer demand and feedback.</p>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-year">2012</div>
                        <div class="timeline-content">
                            <h3>Digital Innovation</h3>
                            <p>Launched our online booking platform and mobile app, making it easier than ever for customers to schedule and manage services.</p>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-year">2018</div>
                        <div class="timeline-content">
                            <h3>Eco-Friendly Initiative</h3>
                            <p>Became the first local service company to go 100% eco-friendly with sustainable products and green practices.</p>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-year">2024</div>
                        <div class="timeline-content">
                            <h3>Industry Recognition</h3>
                            <p>Awarded "Service Excellence Award" and recognized as the region's most trusted home service provider.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values & Mission Section -->
    <section class="values-mission-section">
        <div class="container">
            <div class="values-grid">
                <!-- Mission -->
                <div class="value-card mission-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3>Our Mission</h3>
                    </div>
                    <div class="card-content">
                        <p>To transform the way people experience home services by delivering exceptional quality, reliability, and care that exceeds expectations and enhances quality of life.</p>
                        <ul class="mission-goals">
                            <li><i class="fas fa-check"></i> Excellence in every service</li>
                            <li><i class="fas fa-check"></i> Building lasting relationships</li>
                            <li><i class="fas fa-check"></i> Supporting our community</li>
                        </ul>
                    </div>
                </div>

                <!-- Vision -->
                <div class="value-card vision-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3>Our Vision</h3>
                    </div>
                    <div class="card-content">
                        <p>To become the most trusted and innovative home service company in the region, setting new standards for quality and customer satisfaction.</p>
                        <div class="vision-metrics">
                            <div class="metric">
                                <span class="metric-number">2030</span>
                                <span class="metric-label">Carbon Neutral Goal</span>
                            </div>
                            <div class="metric">
                                <span class="metric-number">50k</span>
                                <span class="metric-label">Customers Served</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Values -->
                <div class="value-card values-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3>Our Values</h3>
                    </div>
                    <div class="card-content">
                        <div class="values-list">
                            <div class="value-item">
                                <i class="fas fa-star"></i>
                                <div>
                                    <strong>Excellence</strong>
                                    <span>We strive for perfection in every detail</span>
                                </div>
                            </div>
                            <div class="value-item">
                                <i class="fas fa-handshake"></i>
                                <div>
                                    <strong>Integrity</strong>
                                    <span>Honest, transparent, and reliable</span>
                                </div>
                            </div>
                            <div class="value-item">
                                <i class="fas fa-users"></i>
                                <div>
                                    <strong>Respect</strong>
                                    <span>Treating everyone with dignity and care</span>
                                </div>
                            </div>
                            <div class="value-item">
                                <i class="fas fa-leaf"></i>
                                <div>
                                    <strong>Sustainability</strong>
                                    <span>Protecting our environment for future generations</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- What Makes Us Different -->
    <section class="differentiators-section">
        <div class="container">
            <div class="section-header centered">
                <span class="section-badge">Why Choose Us</span>
                <h2>What Makes Us Different</h2>
                <p>We don't just provide services - we create experiences that exceed expectations</p>
            </div>
            
            <div class="differentiators-grid">
                <div class="diff-card">
                    <div class="diff-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>100% Satisfaction Guarantee</h3>
                    <p>If you're not completely satisfied, we'll make it right or refund your money. No questions asked.</p>
                    <div class="diff-highlight">Money-Back Promise</div>
                </div>
                
                <div class="diff-card">
                    <div class="diff-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <h3>Certified Professionals</h3>
                    <p>All our team members are background-checked, trained, and certified in their specialties.</p>
                    <div class="diff-highlight">Licensed & Insured</div>
                </div>
                
                <div class="diff-card">
                    <div class="diff-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3>Eco-Friendly Solutions</h3>
                    <p>We use only environmentally safe products and sustainable practices to protect your family and planet.</p>
                    <div class="diff-highlight">Green Certified</div>
                </div>
                
                <div class="diff-card">
                    <div class="diff-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Smart Technology</h3>
                    <p>Book, track, and manage services through our award-winning mobile app with real-time updates.</p>
                    <div class="diff-highlight">4.9 Star App Rating</div>
                </div>
                
                <div class="diff-card">
                    <div class="diff-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Flexible Scheduling</h3>
                    <p>Same-day, next-day, or scheduled services available. We work around your busy lifestyle.</p>
                    <div class="diff-highlight">24/7 Emergency</div>
                </div>
                
                <div class="diff-card">
                    <div class="diff-icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <h3>Transparent Pricing</h3>
                    <p>No hidden fees, no surprises. Get upfront pricing with detailed estimates before we start.</p>
                    <div class="diff-highlight">Fixed-Rate Guarantee</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Leadership Team -->
    <section class="leadership-section">
        <div class="container">
            <div class="section-header centered">
                <span class="section-badge">Leadership</span>
                <h2>Meet the People Behind Our Success</h2>
                <p>Our experienced leadership team brings decades of industry expertise and a passion for service excellence</p>
            </div>
            
            <div class="leadership-grid">
                <div class="leader-card featured">
                    <div class="leader-image">
                        <div class="leader-avatar">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="leader-badge">Founder & CEO</div>
                    </div>
                    <div class="leader-info">
                        <h3>Sarah Johnson</h3>
                        <p class="leader-title">Founder & Chief Executive Officer</p>
                        <p class="leader-bio">Sarah founded the company in 2004 with a vision to revolutionize home services. Under her leadership, we've grown from a single-person operation to the region's most trusted service provider. She holds an MBA from State University and is a certified Small Business Leader.</p>
                        <div class="leader-achievements">
                            <span class="achievement">MBA - Business Leadership</span>
                            <span class="achievement">20+ Years Experience</span>
                            <span class="achievement">Industry Innovation Award</span>
                        </div>
                        <div class="leader-quote">
                            <i class="fas fa-quote-left"></i>
                            <p>"Our success isn't measured by our growth, but by the smiles on our customers' faces when they see the results of our work."</p>
                        </div>
                    </div>
                </div>
                
                <div class="leader-card">
                    <div class="leader-image">
                        <div class="leader-avatar">
                            <i class="fas fa-cogs"></i>
                        </div>
                    </div>
                    <div class="leader-info">
                        <h3>Michael Rodriguez</h3>
                        <p class="leader-title">Chief Operations Officer</p>
                        <p class="leader-bio">Michael ensures every service runs smoothly and maintains our high quality standards. With 15 years in operations management, he's the driving force behind our efficiency and customer satisfaction.</p>
                        <div class="leader-stats">
                            <div class="stat">
                                <span class="stat-number">99.8%</span>
                                <span class="stat-label">Quality Score</span>
                            </div>
                            <div class="stat">
                                <span class="stat-number">15</span>
                                <span class="stat-label">Years Experience</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="leader-card">
                    <div class="leader-image">
                        <div class="leader-avatar">
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>
                    <div class="leader-info">
                        <h3>Emily Chen</h3>
                        <p class="leader-title">Customer Experience Director</p>
                        <p class="leader-bio">Emily leads our customer relations team and ensures every client receives personalized attention. Her background in hospitality brings a service-first mindset to everything we do.</p>
                        <div class="leader-stats">
                            <div class="stat">
                                <span class="stat-number">4.9</span>
                                <span class="stat-label">Customer Rating</span>
                            </div>
                            <div class="stat">
                                <span class="stat-number">12</span>
                                <span class="stat-label">Years Experience</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="leader-card">
                    <div class="leader-image">
                        <div class="leader-avatar">
                            <i class="fas fa-leaf"></i>
                        </div>
                    </div>
                    <div class="leader-info">
                        <h3>David Green</h3>
                        <p class="leader-title">Sustainability Director</p>
                        <p class="leader-bio">David leads our environmental initiatives and ensures all our practices align with sustainability goals. He's instrumental in our journey to become carbon neutral by 2030.</p>
                        <div class="leader-stats">
                            <div class="stat">
                                <span class="stat-number">100%</span>
                                <span class="stat-label">Eco-Friendly</span>
                            </div>
                            <div class="stat">
                                <span class="stat-number">8</span>
                                <span class="stat-label">Years Experience</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Community Impact -->
    <section class="community-section">
        <div class="container">
            <div class="section-header centered">
                <span class="section-badge">Community Impact</span>
                <h2>Giving Back to Our Community</h2>
                <p>We believe in supporting the communities that have supported us</p>
            </div>
            
            <div class="community-grid">
                <div class="community-stat">
                    <div class="stat-icon">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <div class="stat-number">$125K+</div>
                    <div class="stat-label">Donated to Local Charities</div>
                </div>
                
                <div class="community-stat">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Volunteer Hours</div>
                </div>
                
                <div class="community-stat">
                    <div class="stat-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="stat-number">150+</div>
                    <div class="stat-label">Free Services for Seniors</div>
                </div>
                
                <div class="community-stat">
                    <div class="stat-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="stat-number">25</div>
                    <div class="stat-label">Scholarships Awarded</div>
                </div>
            </div>
            
            <div class="community-initiatives">
                <div class="initiative-card">
                    <h3>Senior Care Program</h3>
                    <p>Free monthly cleaning services for seniors in need, helping them maintain independence and dignity in their homes.</p>
                </div>
                
                <div class="initiative-card">
                    <h3>Environmental Cleanup</h3>
                    <p>Quarterly community cleanup events where our team volunteers to maintain local parks and public spaces.</p>
                </div>
                
                <div class="initiative-card">
                    <h3>Education Support</h3>
                    <p>Annual scholarships for local students pursuing careers in business, environmental science, or skilled trades.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="about-cta-section">
        <div class="container">
            <div class="cta-content">
                <div class="cta-badge">
                    <i class="fas fa-star"></i>
                    <span>Join 25,000+ Happy Customers</span>
                </div>
                
                <h2>Experience the Difference Today</h2>
                <p>Ready to discover why we're the region's most trusted home service provider? Let us show you what exceptional service really looks like.</p>
                
                <div class="cta-features">
                    <div class="cta-feature">
                        <i class="fas fa-check-circle"></i>
                        <span>Free, No-Obligation Quote</span>
                    </div>
                    <div class="cta-feature">
                        <i class="fas fa-check-circle"></i>
                        <span>Same-Day Service Available</span>
                    </div>
                    <div class="cta-feature">
                        <i class="fas fa-check-circle"></i>
                        <span>100% Satisfaction Guaranteed</span>
                    </div>
                </div>
                
                <div class="cta-buttons">
                    <a href="<?php echo home_url('/contact'); ?>" class="btn btn-primary btn-large">
                        <i class="fas fa-calendar"></i>
                        Schedule Free Consultation
                    </a>
                    <a href="<?php echo home_url('/services'); ?>" class="btn btn-secondary btn-large">
                        <i class="fas fa-list"></i>
                        Explore Our Services
                    </a>
                </div>
                
                <div class="cta-contact">
                    <div class="contact-method">
                        <i class="fas fa-phone"></i>
                        <div>
                            <span class="contact-label">Call Now</span>
                            <span class="contact-value">(555) 123-4567</span>
                        </div>
                    </div>
                    <div class="contact-method">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <span class="contact-label">Email Us</span>
                            <span class="contact-value">hello@company.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
