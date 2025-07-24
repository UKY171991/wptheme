<?php
/**
 * Template Name: Team Page
 */

get_header(); ?>

<main id="main" class="site-main">
    <!-- Team Hero Section -->
    <section class="section bg-primary-dark text-white">
        <div class="overlay-accent"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8 section-content">
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb bg-transparent p-0 m-0 justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-white text-decoration-none">
                                    <i class="fas fa-home me-1"></i>Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active text-accent" aria-current="page">Team</li>
                        </ol>
                    </nav>
                    
                    <div class="fade-in-up">
                        <div class="badge bg-accent text-white px-3 py-2 rounded-pill mb-4">
                            <i class="fas fa-users me-2"></i>Meet Our Professionals
                        </div>
                        
                        <h1 class="display-4 fw-bold mb-4">
                            Our Expert Team
                            <span class="text-accent d-block">Dedicated Professionals</span>
                        </h1>
                        
                        <p class="lead mb-4">The passionate professionals behind our exceptional services. Each team member brings expertise, dedication, and a commitment to exceeding your expectations.</p>
                        
                        <div class="d-flex flex-wrap gap-3 justify-content-center">
                            <a href="#team-members" class="btn btn-accent btn-rounded btn-lg">
                                <i class="fas fa-users me-2"></i>Meet the Team
                            </a>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('careers'))); ?>" class="btn btn-outline-light btn-rounded btn-lg">
                                <i class="fas fa-briefcase me-2"></i>Join Our Team
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Culture & Values -->
    <section class="section bg-light">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h2 class="section-title">Our Culture & Values</h2>
                <p class="section-subtitle">At the heart of our organization is a commitment to excellence, integrity, and customer satisfaction.</p>
            </div>
            
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <p class="lead mb-4">Our team members are carefully selected not only for their professional skills but also for their dedication to our core values. We foster an environment where everyone can thrive and contribute to our collective success.</p>
                    
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="text-center p-3">
                                <div class="icon-circle bg-accent text-white mb-3">
                                    <i class="fas fa-star"></i>
                                </div>
                                <h5 class="h6 fw-bold">Excellence</h5>
                                <p class="text-muted small">We strive for excellence in everything we do</p>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="text-center p-3">
                                <div class="icon-circle bg-accent text-white mb-3">
                                    <i class="fas fa-handshake"></i>
                                </div>
                                <h5 class="h6 fw-bold">Integrity</h5>
                                <p class="text-muted small">Honesty and transparency in all interactions</p>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="text-center p-3">
                                <div class="icon-circle bg-accent text-white mb-3">
                                    <i class="fas fa-users"></i>
                                </div>
                                <h5 class="h6 fw-bold">Teamwork</h5>
                                <p class="text-muted small">Collaborative approach to achieve common goals</p>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="text-center p-3">
                                <div class="icon-circle bg-accent text-white mb-3">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <h5 class="h6 fw-bold">Compassion</h5>
                                <p class="text-muted small">Genuine care for our clients and their needs</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="position-relative">
                        <img src="<?php echo esc_url(get_theme_mod('team_culture_image', get_template_directory_uri() . '/images/team/team-culture.jpg')); ?>" 
                             alt="Team Culture" class="img-fluid rounded-4 shadow">
                        <div class="position-absolute bottom-0 start-0 end-0 bg-gradient-overlay p-4 rounded-bottom-4 text-white">
                            <h5 class="mb-2">We grow together</h5>
                            <p class="mb-0 small opacity-75">Our team building activities foster collaboration and innovation</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Leadership Team -->
    <section class="section bg-white">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h2 class="section-title">Leadership Team</h2>
                <p class="section-subtitle">Meet the visionaries who guide our organization, setting standards of excellence and fostering innovation.</p>
            </div>
            
            <div class="row g-4">
                <!-- Leadership Member 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="position-relative overflow-hidden">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/team/leader1.jpg" 
                                 alt="John Davis" class="card-img-top" style="height: 300px; object-fit: cover;">
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge bg-accent">CEO</span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title">John Davis</h5>
                            <h6 class="text-accent mb-3">Chief Executive Officer</h6>
                            <p class="card-text text-muted">With over 20 years of experience in the service industry, John leads our company with a vision for excellence and innovation.</p>
                            <div class="d-flex gap-2">
                                <a href="#" class="text-muted hover-accent"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="text-muted hover-accent"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="text-muted hover-accent"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Leadership Member 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="position-relative overflow-hidden">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/team/leader2.jpg" 
                                 alt="Sarah Johnson" class="card-img-top" style="height: 300px; object-fit: cover;">
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge bg-accent">COO</span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title">Sarah Johnson</h5>
                            <h6 class="text-accent mb-3">Chief Operations Officer</h6>
                            <p class="card-text text-muted">Sarah ensures that our operations run smoothly and efficiently, maintaining our high standards of service quality.</p>
                            <div class="d-flex gap-2">
                                <a href="#" class="text-muted hover-accent"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="text-muted hover-accent"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="text-muted hover-accent"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Leadership Member 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="position-relative overflow-hidden">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/team/leader3.jpg" 
                                 alt="Michael Chen" class="card-img-top" style="height: 300px; object-fit: cover;">
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge bg-accent">CTO</span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title">Michael Chen</h5>
                            <h6 class="text-accent mb-3">Chief Technology Officer</h6>
                            <p class="card-text text-muted">Michael leads our technology initiatives, implementing innovative solutions to enhance service delivery and customer experience.</p>
                            <div class="d-flex gap-2">
                                <a href="#" class="text-muted hover-accent"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="text-muted hover-accent"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="text-muted hover-accent"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Members Section -->
    <section class="section bg-primary-dark text-white" id="team-members">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h2 class="section-title text-white">Our Amazing Team</h2>
                <p class="section-subtitle text-light">The dedicated professionals who make exceptional service possible every day.</p>
            </div>
            
            <div class="row g-4">
                <!-- Team Member 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover text-center">
                        <div class="position-relative">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/team/member1.jpg" 
                                 alt="Emma Wilson" class="card-img-top rounded-circle mx-auto mt-4" 
                                 style="width: 120px; height: 120px; object-fit: cover;">
                        </div>
                        <div class="card-body p-4">
                            <h6 class="card-title">Emma Wilson</h6>
                            <p class="text-accent small mb-2">Cleaning Specialist</p>
                            <p class="card-text text-muted small">5+ years of experience in residential and commercial cleaning services.</p>
                            <div class="d-flex justify-content-center gap-2">
                                <span class="badge bg-light text-dark">Residential</span>
                                <span class="badge bg-light text-dark">Commercial</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover text-center">
                        <div class="position-relative">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/team/member2.jpg" 
                                 alt="David Rodriguez" class="card-img-top rounded-circle mx-auto mt-4" 
                                 style="width: 120px; height: 120px; object-fit: cover;">
                        </div>
                        <div class="card-body p-4">
                            <h6 class="card-title">David Rodriguez</h6>
                            <p class="text-accent small mb-2">Handyman Expert</p>
                            <p class="card-text text-muted small">Skilled craftsman with expertise in repairs, maintenance, and installations.</p>
                            <div class="d-flex justify-content-center gap-2">
                                <span class="badge bg-light text-dark">Repairs</span>
                                <span class="badge bg-light text-dark">Maintenance</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover text-center">
                        <div class="position-relative">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/team/member3.jpg" 
                                 alt="Lisa Park" class="card-img-top rounded-circle mx-auto mt-4" 
                                 style="width: 120px; height: 120px; object-fit: cover;">
                        </div>
                        <div class="card-body p-4">
                            <h6 class="card-title">Lisa Park</h6>
                            <p class="text-accent small mb-2">Pet Care Specialist</p>
                            <p class="card-text text-muted small">Certified pet care professional with a passion for animal welfare and safety.</p>
                            <div class="d-flex justify-content-center gap-2">
                                <span class="badge bg-light text-dark">Pet Sitting</span>
                                <span class="badge bg-light text-dark">Dog Walking</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Member 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover text-center">
                        <div class="position-relative">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/team/member4.jpg" 
                                 alt="James Thompson" class="card-img-top rounded-circle mx-auto mt-4" 
                                 style="width: 120px; height: 120px; object-fit: cover;">
                        </div>
                        <div class="card-body p-4">
                            <h6 class="card-title">James Thompson</h6>
                            <p class="text-accent small mb-2">Lawn Care Expert</p>
                            <p class="card-text text-muted small">Landscape professional specializing in lawn maintenance and garden care.</p>
                            <div class="d-flex justify-content-center gap-2">
                                <span class="badge bg-light text-dark">Lawn Care</span>
                                <span class="badge bg-light text-dark">Landscaping</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="section bg-accent text-white">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold mb-4">Join Our Team</h2>
                    <p class="lead mb-4">We're always looking for passionate professionals to join our growing team. Discover exciting career opportunities with us.</p>
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('careers'))); ?>" class="btn btn-light btn-rounded btn-lg">
                            <i class="fas fa-briefcase me-2"></i>View Careers
                        </a>
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-outline-light btn-rounded btn-lg">
                            <i class="fas fa-envelope me-2"></i>Get In Touch
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
