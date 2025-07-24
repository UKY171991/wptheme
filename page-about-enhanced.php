<?php
/**
 * Template Name: About Us - Enhanced
 */

get_header(); ?>

<!-- Universal Banner System -->
<section class="universal-banner">
    <div class="container">
        <div class="banner-content">
            <nav class="breadcrumb">
                <a href="<?php echo home_url(); ?>"><i class="fas fa-home"></i> Home</a>
                <span>→</span>
                <span>About Us</span>
            </nav>
            
            <h1 class="banner-title">About Our Company</h1>
            <p class="banner-subtitle">Excellence & Trust in Every Service We Provide</p>
            
            <div class="banner-stats">
                <div class="stat-item">
                    <span class="stat-number">15,000+</span>
                    <span class="stat-label">Happy Customers</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">20+</span>
                    <span class="stat-label">Years Experience</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">99%</span>
                    <span class="stat-label">Client Satisfaction</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Support Available</span>
                </div>
            </div>
            
            <div class="banner-buttons">
                <a href="#our-story" class="btn btn-primary">
                    <i class="fas fa-book-open"></i>
                    Our Story
                </a>
                <a href="<?php echo home_url('/contact'); ?>" class="btn btn-secondary">
                    <i class="fas fa-envelope"></i>
                    Get In Touch
                </a>
            </div>
        </div>
    </div>
</section>
    </div>
</section>

<div class="universal-page-content">
    <div class="container">
        <!-- Our Story Section -->
        <section id="our-story" class="about-section">
            <div class="section-header">
                <h2><i class="fas fa-heart"></i> Our Story</h2>
                <p class="section-subtitle">Founded with a mission to provide reliable, professional home services</p>
            </div>
            
            <div class="story-content">
                <div class="story-text">
                    <p>Founded with a mission to provide reliable, professional home services, we have grown to become a trusted name in our community. Our team of experienced professionals is dedicated to making your life easier through quality service and exceptional customer care.</p>
                    
                    <p>What started as a small local business has evolved into a comprehensive service provider, offering everything from home cleaning and maintenance to personal assistance and pet care. We believe that everyone deserves to live in a clean, well-maintained home without the stress of managing it all themselves.</p>
                    
                    <p>Our commitment to excellence and customer satisfaction has earned us thousands of loyal customers who trust us with their most important spaces - their homes and businesses.</p>
                </div>
                
                <div class="story-image">
                    <?php if (file_exists(get_template_directory() . '/images/about.jpg')) : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/about.jpg" 
                             alt="Our Team" 
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                        <div style="display:none; width: 100%; height: 350px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 15px; justify-content: center; align-items: center; color: white; font-size: 1.3rem; font-weight: 600; text-align: center; box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);">
                            <div>
                                <i class="fas fa-users" style="font-size: 2.5rem; margin-bottom: 0.8rem; display: block;"></i>
                                Our Dedicated Team
                            </div>
                        </div>
                    <?php else : ?>
                        <div style="width: 100%; height: 350px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 15px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.3rem; font-weight: 600; text-align: center; box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);">
                            <div>
                                <i class="fas fa-users" style="font-size: 2.5rem; margin-bottom: 0.8rem; display: block;"></i>
                                Our Dedicated Team
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="image-caption">
                        <p>Our dedicated team of professionals</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Choose Us Section -->
        <section class="about-section">
            <div class="section-header">
                <h2><i class="fas fa-star"></i> Why Choose Us</h2>
                <p class="section-subtitle">What sets us apart from the competition</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Licensed & Insured</h3>
                    <p>Fully licensed and insured for your peace of mind. We take responsibility for our work and protect your property.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Experienced Team</h3>
                    <p>Skilled professionals with years of experience in their respective fields. Quality workmanship guaranteed.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Reliable Service</h3>
                    <p>Dependable, punctual service you can count on. We show up when promised and deliver what we commit to.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>Customer Focused</h3>
                    <p>Your satisfaction is our priority. We listen to your needs and customize our services accordingly.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3>Eco-Friendly</h3>
                    <p>We use environmentally safe products and practices whenever possible to protect your family and the planet.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h3>24/7 Support</h3>
                    <p>Round-the-clock customer support for emergencies and questions. We're here when you need us.</p>
                </div>
            </div>
        </section>

        <!-- Our Mission Section -->
        <section class="about-section mission-section">
            <div class="mission-content">
                <div class="mission-text">
                    <h2><i class="fas fa-bullseye"></i> Our Mission</h2>
                    <p class="mission-statement">To provide exceptional home and personal services that enhance our customers' quality of life, delivered with professionalism, reliability, and care.</p>
                    
                    <div class="mission-points">
                        <div class="mission-point">
                            <i class="fas fa-check-circle"></i>
                            <span>Deliver consistent, high-quality service</span>
                        </div>
                        <div class="mission-point">
                            <i class="fas fa-check-circle"></i>
                            <span>Build lasting relationships with our clients</span>
                        </div>
                        <div class="mission-point">
                            <i class="fas fa-check-circle"></i>
                            <span>Continuously improve and expand our services</span>
                        </div>
                        <div class="mission-point">
                            <i class="fas fa-check-circle"></i>
                            <span>Support our local community</span>
                        </div>
                    </div>
                </div>
                
                <div class="mission-visual">
                    <div class="mission-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <p>Making homes and lives better, one service at a time</p>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="about-section team-section">
            <div class="section-header">
                <h2><i class="fas fa-users"></i> Meet Our Team</h2>
                <p class="section-subtitle">Dedicated professionals committed to your satisfaction</p>
            </div>
            
            <div class="team-grid">
                <div class="team-member">
                    <div class="member-photo">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <h3>Sarah Johnson</h3>
                    <p class="member-role">Founder & CEO</p>
                    <p class="member-bio">With over 15 years in the service industry, Sarah leads our team with passion for excellence and customer satisfaction.</p>
                </div>
                
                <div class="team-member">
                    <div class="member-photo">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <h3>Mike Rodriguez</h3>
                    <p class="member-role">Operations Manager</p>
                    <p class="member-bio">Mike ensures every service runs smoothly and our quality standards are maintained across all operations.</p>
                </div>
                
                <div class="team-member">
                    <div class="member-photo">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <h3>Emily Chen</h3>
                    <p class="member-role">Customer Relations</p>
                    <p class="member-bio">Emily manages our customer relationships and ensures every client receives personalized attention and care.</p>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="about-cta">
            <div class="cta-content">
                <h2>Ready to Experience the Difference?</h2>
                <p>Join thousands of satisfied customers who trust us with their home and personal service needs.</p>
                
                <div class="cta-buttons">
                    <a href="<?php echo home_url('/services'); ?>" class="btn btn-primary btn-large">
                        <i class="fas fa-list"></i>
                        View Our Services
                    </a>
                    <a href="<?php echo home_url('/contact'); ?>" class="btn btn-secondary btn-large">
                        <i class="fas fa-phone"></i>
                        Get Free Quote
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>

<?php get_footer(); ?>
