<?php
/**
 * Template Name: About Page
 * Template for displaying the About page
 */

get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

<!-- About Content -->
<section class="section">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <div class="about-content">
                    <?php the_content(); ?>
                </div>
            </div>
            
            <div class="col-lg-6">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="about-image">
                        <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded shadow')); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Our Story -->
<section class="section bg-light-gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2>Our Story</h2>
                <p class="lead">Founded with a vision to help businesses thrive in the digital world, Blueprint Folder has grown from a small startup to a trusted partner for companies of all sizes.</p>
                <p>We believe in the power of innovative solutions, creative design, and strategic thinking to transform businesses and drive growth. Our team combines years of experience with cutting-edge technology to deliver results that exceed expectations.</p>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2>Our Values</h2>
                <p class="lead">The principles that guide everything we do</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="value-card text-center h-100">
                    <div class="value-icon mb-4">
                        <i class="fas fa-lightbulb fa-3x text-primary"></i>
                    </div>
                    <h4>Innovation</h4>
                    <p>We continuously explore new technologies and methodologies to deliver cutting-edge solutions that keep our clients ahead of the competition.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="value-card text-center h-100">
                    <div class="value-icon mb-4">
                        <i class="fas fa-handshake fa-3x text-primary"></i>
                    </div>
                    <h4>Partnership</h4>
                    <p>We build long-term relationships with our clients, working as an extension of their team to achieve shared goals and mutual success.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="value-card text-center h-100">
                    <div class="value-icon mb-4">
                        <i class="fas fa-award fa-3x text-primary"></i>
                    </div>
                    <h4>Excellence</h4>
                    <p>We maintain the highest standards in everything we do, from project planning to final delivery, ensuring exceptional quality and results.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="value-card text-center h-100">
                    <div class="value-icon mb-4">
                        <i class="fas fa-shield-alt fa-3x text-primary"></i>
                    </div>
                    <h4>Integrity</h4>
                    <p>We operate with transparency, honesty, and ethical practices in all our business relationships and project deliveries.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="value-card text-center h-100">
                    <div class="value-icon mb-4">
                        <i class="fas fa-users fa-3x text-primary"></i>
                    </div>
                    <h4>Collaboration</h4>
                    <p>We believe in the power of teamwork, both within our organization and with our clients, to achieve extraordinary results.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="value-card text-center h-100">
                    <div class="value-icon mb-4">
                        <i class="fas fa-rocket fa-3x text-primary"></i>
                    </div>
                    <h4>Growth</h4>
                    <p>We're committed to continuous learning and improvement, helping both our team and our clients grow and evolve.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="section bg-light-gray">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <h3 class="stat-number text-primary mb-2">150+</h3>
                    <p class="stat-label">Projects Completed</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <h3 class="stat-number text-primary mb-2">50+</h3>
                    <p class="stat-label">Happy Clients</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <h3 class="stat-number text-primary mb-2">5+</h3>
                    <p class="stat-label">Years Experience</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <h3 class="stat-number text-primary mb-2">24/7</h3>
                    <p class="stat-label">Support Available</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php endwhile; ?>

<!-- Team Section -->
<section class="team-section section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="mb-3" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-users me-3" style="color: #3498db;"></i>
                    Meet Our Team
                </h2>
                <p class="lead text-muted">
                    Our experienced professionals are dedicated to delivering exceptional results and building lasting partnerships with our clients.
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <!-- Team Member 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="team-member-card h-100">
                    <div class="team-member-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/about.jpg" 
                             alt="Team Member" class="img-fluid w-100" style="height: 300px; object-fit: cover;">
                        <div class="team-social text-center">
                            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" aria-label="Email"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                    <div class="team-member-info p-4 text-center">
                        <h4 class="h5 mb-1" style="color: #2c3e50;">John Smith</h4>
                        <p class="text-primary mb-2 small font-weight-medium">Founder & CEO</p>
                        <p class="text-muted small">Leading our team with vision and strategic expertise to deliver exceptional business solutions.</p>
                    </div>
                </div>
            </div>
            
            <!-- Team Member 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="team-member-card h-100">
                    <div class="team-member-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/about.jpg" 
                             alt="Team Member" class="img-fluid w-100" style="height: 300px; object-fit: cover;">
                        <div class="team-social text-center">
                            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" aria-label="Email"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                    <div class="team-member-info p-4 text-center">
                        <h4 class="h5 mb-1" style="color: #2c3e50;">Sarah Johnson</h4>
                        <p class="text-primary mb-2 small font-weight-medium">Creative Director</p>
                        <p class="text-muted small">Bringing creative vision and innovative design solutions to every project we undertake.</p>
                    </div>
                </div>
            </div>
            
            <!-- Team Member 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="team-member-card h-100">
                    <div class="team-member-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/about.jpg" 
                             alt="Team Member" class="img-fluid w-100" style="height: 300px; object-fit: cover;">
                        <div class="team-social text-center">
                            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" aria-label="Email"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                    <div class="team-member-info p-4 text-center">
                        <h4 class="h5 mb-1" style="color: #2c3e50;">Mike Chen</h4>
                        <p class="text-primary mb-2 small font-weight-medium">Technical Lead</p>
                        <p class="text-muted small">Ensuring technical excellence and innovative solutions that drive business success.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Team Stats -->
        <div class="team-stats mt-5">
            <div class="row text-center">
                <div class="col-md-3 col-6">
                    <div class="stat-box p-3">
                        <h3 class="h2 text-primary mb-2">50+</h3>
                        <p class="text-muted mb-0">Projects Completed</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-box p-3">
                        <h3 class="h2 text-primary mb-2">5+</h3>
                        <p class="text-muted mb-0">Years Experience</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-box p-3">
                        <h3 class="h2 text-primary mb-2">30+</h3>
                        <p class="text-muted mb-0">Happy Clients</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-box p-3">
                        <h3 class="h2 text-primary mb-2">99%</h3>
                        <p class="text-muted mb-0">Client Satisfaction</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Process Section -->
<section class="process-section section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="mb-3" style="color: #2c3e50; font-weight: 600;">
                    <i class="fas fa-route me-3" style="color: #3498db;"></i>
                    Our Process
                </h2>
                <p class="lead text-muted">
                    We follow a proven methodology to ensure every project delivers exceptional results and exceeds client expectations.
                </p>
            </div>
        </div>
        
        <div class="process-timeline">
            <div class="row g-4">
                <!-- Step 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="process-step text-center">
                        <div class="process-number">
                            <span class="step-number">1</span>
                        </div>
                        <div class="process-icon mb-3">
                            <i class="fas fa-comments" style="font-size: 2.5rem; color: #3498db;"></i>
                        </div>
                        <h4 class="h5 mb-3" style="color: #2c3e50; font-weight: 600;">Discovery</h4>
                        <p class="text-muted">We start by understanding your goals, challenges, and requirements through detailed consultation.</p>
                    </div>
                </div>
                
                <!-- Step 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="process-step text-center">
                        <div class="process-number">
                            <span class="step-number">2</span>
                        </div>
                        <div class="process-icon mb-3">
                            <i class="fas fa-drafting-compass" style="font-size: 2.5rem; color: #3498db;"></i>
                        </div>
                        <h4 class="h5 mb-3" style="color: #2c3e50; font-weight: 600;">Planning</h4>
                        <p class="text-muted">We create a comprehensive strategy and detailed project plan tailored to your specific needs.</p>
                    </div>
                </div>
                
                <!-- Step 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="process-step text-center">
                        <div class="process-number">
                            <span class="step-number">3</span>
                        </div>
                        <div class="process-icon mb-3">
                            <i class="fas fa-cogs" style="font-size: 2.5rem; color: #3498db;"></i>
                        </div>
                        <h4 class="h5 mb-3" style="color: #2c3e50; font-weight: 600;">Execution</h4>
                        <p class="text-muted">Our expert team implements the solution using industry best practices and cutting-edge tools.</p>
                    </div>
                </div>
                
                <!-- Step 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="process-step text-center">
                        <div class="process-number">
                            <span class="step-number">4</span>
                        </div>
                        <div class="process-icon mb-3">
                            <i class="fas fa-rocket" style="font-size: 2.5rem; color: #3498db;"></i>
                        </div>
                        <h4 class="h5 mb-3" style="color: #2c3e50; font-weight: 600;">Launch</h4>
                        <p class="text-muted">We deliver the final solution and provide ongoing support to ensure continued success.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section bg-primary">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="text-white mb-4">Ready to Work Together?</h2>
                <p class="text-white-50 mb-4 lead">
                    Let's discuss how we can help transform your business and achieve your goals.
                </p>
                <div class="cta-buttons">
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-light btn-lg me-3">
                        <i class="fas fa-envelope me-2"></i>
                        Get In Touch
                    </a>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-eye me-2"></i>
                        View Our Services
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
