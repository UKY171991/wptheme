<?php
/**
 * Template Name: Testimonials
 */

get_header(); ?>
<main id="main" class="site-main">
    <!-- Testimonials Hero Section -->
    <section class="section bg-primary-dark text-white">
        <div class="overlay-accent"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8 section-content">
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb bg-transparent p-0 m-0 justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="<?php echo esc_url(home_url('/'));?>" class="text-white text-decoration-none">
                                    <i class="fas fa-home me-1"></i>Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active text-accent" aria-current="page">Testimonials</li>
                        </ol>
                    </nav>
                    <div class="fade-in-up">
                        <div class="badge bg-accent text-white px-3 py-2 rounded-pill mb-4">
                            <i class="fas fa-quote-left me-2"></i>Customer Reviews
                        </div>
                        <h1 class="display-4 fw-bold mb-4">
                            What Our Customers Say
                            <span class="text-accent d-block">Real Reviews, Real Results</span>
                        </h1>
                        <p class="lead mb-4">See why thousands of customers trust us with their home service needs. These genuine testimonials reflect our commitment to excellence.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Statistics Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="card-body p-4">
                            <i class="fas fa-star text-accent mb-3 icon-lg"></i>
                            <h3 class="h2 fw-bold text-primary-dark mb-2">4.9</h3>
                            <p class="text-muted mb-0">Average Rating</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="card-body p-4">
                            <i class="fas fa-users text-accent mb-3 icon-lg"></i>
                            <h3 class="h2 fw-bold text-primary-dark mb-2">500+</h3>
                            <p class="text-muted mb-0">Happy Customers</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="card-body p-4">
                            <i class="fas fa-check-circle text-accent mb-3 icon-lg"></i>
                            <h3 class="h2 fw-bold text-primary-dark mb-2">99%</h3>
                            <p class="text-muted mb-0">Satisfaction Rate</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="card-body p-4">
                            <i class="fas fa-redo text-accent mb-3 icon-lg"></i>
                            <h3 class="h2 fw-bold text-primary-dark mb-2">85%</h3>
                            <p class="text-muted mb-0">Return Customers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Testimonials -->
    <section class="section bg-white">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h2 class="section-title">Featured Reviews</h2>
                <p class="section-subtitle">Hear directly from our satisfied customers</p>
            </div>
            <div class="row g-4">
                <!-- Testimonial 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="card-body p-4">
                            <div class="d-flex mb-3">
                                <?php for ($i = 0; $i < 5; $i++) :?>
                                    <i class="fas fa-star text-warning"></i>
                                <?php endfor;?>
                            </div>
                            <blockquote class="mb-4">
                                <p class="fst-italic">"Absolutely fantastic service! The cleaning team was professional, thorough, and left my house spotless. I couldn't be happier with the results."</p>
                            </blockquote>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-accent text-white d-flex align-items-center justify-content-center me-3 avatar-sm">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Sarah Johnson</h6>
                                    <small class="text-muted">House Cleaning Service</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="card-body p-4">
                            <div class="d-flex mb-3">
                                <?php for ($i = 0; $i < 5; $i++) :?>
                                    <i class="fas fa-star text-warning"></i>
                                <?php endfor;?>
                            </div>
                            <blockquote class="mb-4">
                                <p class="fst-italic">"The handyman service exceeded my expectations. Quick, reliable, and reasonably priced. I'll definitely use them again!"</p>
                            </blockquote>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-accent text-white d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Mike Chen</h6>
                                    <small class="text-muted">Handyman Services</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="card-body p-4">
                            <div class="d-flex mb-3">
                                <?php for ($i = 0; $i < 5; $i++) :?>
                                    <i class="fas fa-star text-warning"></i>
                                <?php endfor;?>
                            </div>
                            <blockquote class="mb-4">
                                <p class="fst-italic">"Their pet care service is amazing! My dog loves them, and I have complete peace of mind when I'm away. Highly recommended!"</p>
                            </blockquote>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-accent text-white d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Emily Rodriguez</h6>
                                    <small class="text-muted">Pet Care Service</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="card-body p-4">
                            <div class="d-flex mb-3">
                                <?php for ($i = 0; $i < 5; $i++) :?>
                                    <i class="fas fa-star text-warning"></i>
                                <?php endfor;?>
                            </div>
                            <blockquote class="mb-4">
                                <p class="fst-italic">"Lawn care service is top-notch. My yard has never looked better. Professional, reliable, and great value for money."</p>
                            </blockquote>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-accent text-white d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">David Thompson</h6>
                                    <small class="text-muted">Lawn Care Service</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 5 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="card-body p-4">
                            <div class="d-flex mb-3">
                                <?php for ($i = 0; $i < 5; $i++) :?>
                                    <i class="fas fa-star text-warning"></i>
                                <?php endfor;?>
                            </div>
                            <blockquote class="mb-4">
                                <p class="fst-italic">"Personal shopping service saved me so much time! Efficient, thoughtful, and they got everything I needed. Excellent service!"</p>
                            </blockquote>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-accent text-white d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Lisa Park</h6>
                                    <small class="text-muted">Personal Shopping</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 6 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 card-hover">
                        <div class="card-body p-4">
                            <div class="d-flex mb-3">
                                <?php for ($i = 0; $i < 5; $i++) :?>
                                    <i class="fas fa-star text-warning"></i>
                                <?php endfor;?>
                            </div>
                            <blockquote class="mb-4">
                                <p class="fst-italic">"The elderly care service for my mother has been a blessing. Compassionate, professional, and trustworthy. Thank you so much!"</p>
                            </blockquote>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-accent text-white d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Robert Wilson</h6>
                                    <small class="text-muted">Elderly Care Service</small>
                                </div>
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
                    <h2 class="display-5 fw-bold mb-4">Join Our Happy Customers</h2>
                    <p class="lead mb-4">Experience the same level of service that our customers rave about. Get started today!</p>
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact')));?>" class="btn btn-light btn-rounded btn-lg">
                            <i class="fas fa-envelope me-2"></i>Get Your Quote
                        </a>
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('services')));?>" class="btn btn-outline-light btn-rounded btn-lg">
                            <i class="fas fa-tools me-2"></i>View Services
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
