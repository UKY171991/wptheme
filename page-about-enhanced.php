<?php
/**
 * Template Name: Enhanced About Page
 * Professional about page with team, values, and achievements
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.1.0
 */

get_header(); ?>

<main id="main" class="site-main about-enhanced">
    <!-- Enhanced Hero Section -->
    <section class="section bg-gradient-primary text-white position-relative overflow-hidden">
        <div class="hero-pattern"></div>
        <div class="container position-relative">
            <div class="row align-items-center" style="min-height: 60vh;">
                <div class="col-lg-6">
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb bg-transparent p-0 m-0">
                            <li class="breadcrumb-item">
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-white text-decoration-none">
                                    <i class="fas fa-home me-1"></i>Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active text-accent" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                    
                    <div class="fade-in-up">
                        <div class="badge bg-accent text-white px-4 py-3 rounded-pill mb-4 fs-6">
                            <i class="fas fa-users me-2"></i>Our Story
                        </div>
                        
                        <h1 class="display-3 fw-bold mb-4">
                            We're Building
                            <span class="text-accent d-block">Tomorrow's Solutions</span>
                        </h1>
                        
                        <p class="lead mb-5 fs-4">With years of experience and a passion for innovation, we help businesses transform their ideas into reality through cutting-edge technology and strategic thinking.</p>
                        
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#our-story" class="btn btn-accent btn-rounded btn-lg px-5 py-3">
                                <i class="fas fa-book-open me-2"></i>Our Story
                            </a>
                            <a href="#team" class="btn btn-outline-light btn-rounded btn-lg px-5 py-3">
                                <i class="fas fa-users me-2"></i>Meet The Team
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="hero-image-wrapper">
                        <div class="floating-cards">
                            <div class="card floating-card card-1">
                                <div class="card-body text-center">
                                    <i class="fas fa-lightbulb text-warning mb-2" style="font-size: 2rem;"></i>
                                    <h6 class="text-primary">Innovation</h6>
                                </div>
                            </div>
                            <div class="card floating-card card-2">
                                <div class="card-body text-center">
                                    <i class="fas fa-handshake text-success mb-2" style="font-size: 2rem;"></i>
                                    <h6 class="text-primary">Partnership</h6>
                                </div>
                            </div>
                            <div class="card floating-card card-3">
                                <div class="card-body text-center">
                                    <i class="fas fa-rocket text-danger mb-2" style="font-size: 2rem;"></i>
                                    <h6 class="text-primary">Growth</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story Section -->
    <section id="our-story" class="section py-6">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="story-image-wrapper">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/about-story.jpg" 
                             alt="Our Story" class="img-fluid rounded-3 shadow-lg">
                        <div class="experience-badge">
                            <div class="badge-content">
                                <span class="badge-number">10+</span>
                                <span class="badge-text">Years Experience</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="ps-lg-5">
                        <h2 class="display-5 fw-bold text-primary-dark mb-4">Our Journey Started With A Simple Idea</h2>
                        <p class="lead text-muted mb-4">To bridge the gap between innovative technology and real business needs. What started as a small team with big dreams has grown into a trusted partner for businesses worldwide.</p>
                        
                        <div class="story-timeline">
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i class="fas fa-play"></i>
                                </div>
                                <div class="timeline-content">
                                    <h5>2013 - The Beginning</h5>
                                    <p>Founded with a vision to revolutionize digital solutions</p>
                                </div>
                            </div>
                            
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="timeline-content">
                                    <h5>2018 - Major Growth</h5>
                                    <p>Expanded our team and services, serving 100+ clients</p>
                                </div>
                            </div>
                            
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i class="fas fa-trophy"></i>
                                </div>
                                <div class="timeline-content">
                                    <h5>2023 - Industry Recognition</h5>
                                    <p>Awarded "Best Digital Agency" for innovation and service</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="section bg-light py-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center mb-5">
                    <h2 class="display-5 fw-bold text-primary-dark mb-4">Our Core Values</h2>
                    <p class="lead text-muted">The principles that guide everything we do</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="value-card text-center h-100">
                        <div class="value-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Excellence</h4>
                        <p class="text-muted">We strive for perfection in every project, delivering quality that exceeds expectations.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="value-card text-center h-100">
                        <div class="value-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Integrity</h4>
                        <p class="text-muted">Transparency and honesty form the foundation of all our client relationships.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="value-card text-center h-100">
                        <div class="value-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Innovation</h4>
                        <p class="text-muted">We embrace new technologies and creative solutions to solve complex challenges.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="section py-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center mb-5">
                    <h2 class="display-5 fw-bold text-primary-dark mb-4">Meet Our Expert Team</h2>
                    <p class="lead text-muted">Talented professionals dedicated to your success</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="team-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/team-1.jpg" 
                                 alt="Team Member" class="img-fluid">
                            <div class="team-overlay">
                                <div class="social-links">
                                    <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="social-link"><i class="fab fa-github"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-content">
                            <h5 class="fw-bold mb-1">Sarah Johnson</h5>
                            <p class="text-accent mb-2">CEO & Founder</p>
                            <p class="text-muted small">Visionary leader with 15+ years in tech innovation and business strategy.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="team-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/team-2.jpg" 
                                 alt="Team Member" class="img-fluid">
                            <div class="team-overlay">
                                <div class="social-links">
                                    <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="social-link"><i class="fab fa-dribbble"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-content">
                            <h5 class="fw-bold mb-1">Michael Chen</h5>
                            <p class="text-accent mb-2">CTO</p>
                            <p class="text-muted small">Technology architect specializing in scalable solutions and emerging technologies.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="team-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/team-3.jpg" 
                                 alt="Team Member" class="img-fluid">
                            <div class="team-overlay">
                                <div class="social-links">
                                    <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                                    <a href="#" class="social-link"><i class="fab fa-behance"></i></a>
                                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-content">
                            <h5 class="fw-bold mb-1">Emma Rodriguez</h5>
                            <p class="text-accent mb-2">Creative Director</p>
                            <p class="text-muted small">Award-winning designer creating beautiful and functional user experiences.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="team-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/team-4.jpg" 
                                 alt="Team Member" class="img-fluid">
                            <div class="team-overlay">
                                <div class="social-links">
                                    <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-content">
                            <h5 class="fw-bold mb-1">David Park</h5>
                            <p class="text-accent mb-2">Lead Developer</p>
                            <p class="text-muted small">Full-stack developer passionate about clean code and innovative solutions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="section bg-primary-dark text-white py-6">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon mb-3">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="stat-number" data-count="500">0</h3>
                        <p class="stat-label">Happy Clients</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon mb-3">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                        <h3 class="stat-number" data-count="1200">0</h3>
                        <p class="stat-label">Projects Completed</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon mb-3">
                            <i class="fas fa-award"></i>
                        </div>
                        <h3 class="stat-number" data-count="25">0</h3>
                        <p class="stat-label">Awards Won</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon mb-3">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h3 class="stat-number" data-count="15">0</h3>
                        <p class="stat-label">Countries Served</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section py-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-5 fw-bold text-primary-dark mb-4">Ready to Work Together?</h2>
                    <p class="lead text-muted mb-5">Let's discuss your project and discover how we can help you achieve your goals.</p>
                    
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-accent btn-rounded btn-lg px-5 py-3">
                            <i class="fas fa-comments me-2"></i>Start Conversation
                        </a>
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('portfolio'))); ?>" class="btn btn-outline-primary btn-rounded btn-lg px-5 py-3">
                            <i class="fas fa-eye me-2"></i>View Our Work
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
