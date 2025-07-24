<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>

<main id="main" class="site-main">
    <!-- 404 Hero Section -->
    <section class="section bg-primary-dark text-white">
        <div class="overlay-accent"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8 section-content">
                    <div class="fade-in-up">
                        <div class="mb-4" style="font-size: 8rem;">
                            <i class="fas fa-exclamation-triangle text-accent"></i>
                        </div>
                        
                        <h1 class="display-1 fw-bold mb-4">404</h1>
                        
                        <h2 class="h3 mb-4">
                            Oops! Page Not Found
                            <span class="text-accent d-block">But We're Here to Help</span>
                        </h2>
                        
                        <p class="lead mb-5">The page you're looking for doesn't exist, but don't worry! Our home services are still available to make your life easier.</p>
                        
                        <div class="d-flex flex-wrap gap-3 justify-content-center">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-accent btn-rounded btn-lg">
                                <i class="fas fa-home me-2"></i>Go Home
                            </a>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn btn-outline-light btn-rounded btn-lg">
                                <i class="fas fa-tools me-2"></i>View Services
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center mb-5">
                        <h3 class="h4 mb-3">Search Our Site</h3>
                        <p class="text-muted">Try searching for what you were looking for</p>
                    </div>
                    
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Services Section -->
    <section class="section">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h3 class="section-title">Popular Services</h3>
                <p class="section-subtitle">Maybe one of these is what you were looking for?</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="card card-hover h-100 border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <i class="fas fa-broom text-accent mb-3" style="font-size: 3rem;"></i>
                            <h5 class="card-title mb-3">House Cleaning</h5>
                            <p class="card-text text-muted mb-4">Professional cleaning services for your home</p>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn btn-outline-accent">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="card card-hover h-100 border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <i class="fas fa-tools text-accent mb-3" style="font-size: 3rem;"></i>
                            <h5 class="card-title mb-3">Handyman Services</h5>
                            <p class="card-text text-muted mb-4">Expert repairs and maintenance for your home</p>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn btn-outline-accent">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="card card-hover h-100 border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <i class="fas fa-paw text-accent mb-3" style="font-size: 3rem;"></i>
                            <h5 class="card-title mb-3">Pet Care</h5>
                            <p class="card-text text-muted mb-4">Reliable pet sitting and walking services</p>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn btn-outline-accent">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="card card-hover h-100 border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <i class="fas fa-shopping-bag text-accent mb-3" style="font-size: 3rem;"></i>
                            <h5 class="card-title mb-3">Personal Shopping</h5>
                            <p class="card-text text-muted mb-4">Convenient shopping and errand services</p>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn btn-outline-accent">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Help Section -->
    <section class="section bg-accent text-white">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h3 class="h4 mb-4">Still Need Help?</h3>
                    <p class="lead mb-4">Our customer service team is ready to assist you with any questions or service needs.</p>
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-light btn-rounded">
                            <i class="fas fa-envelope me-2"></i>Contact Us
                        </a>
                        <a href="tel:+1234567890" class="btn btn-outline-light btn-rounded">
                            <i class="fas fa-phone me-2"></i>Call Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
