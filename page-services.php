<?php
/**
 * Template Name: Services
 */

get_header(); ?>

<main id="main" class="site-main">
    <!-- Services Categories Section -->
    <section id="services-categories" class="section">
        <div class="container">
            <?php echo services_pro_get_section_heading(
                'Service Categories',
                'Explore our comprehensive range of professional home services'
            ); ?>
            
            <!-- Service Categories Display -->
            <div class="service-categories-content">
                <?php services_pro_display_service_categories(); ?>
            </div>
        </div>
    </section>

    <!-- Individual Services Section -->
    <section id="services-grid" class="section bg-light">
        <div class="container">
            <?php echo services_pro_get_section_heading(
                'Featured Services',
                'Our most popular professional services'
            ); ?>
            
            <!-- Services Display -->
            <div class="services-content">
                <?php services_pro_display_services(6); ?>
            </div>
            
            <div class="text-center mt-5">
                <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn-accent btn-lg px-5">
                    <i class="fas fa-list me-2"></i>View All Services
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="section bg-light">
        <div class="container">
            <?php echo services_pro_get_section_heading(
                'Why Choose Our Services',
                'We are committed to providing exceptional service quality'
            ); ?>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-shield-alt text-accent" style="font-size: 3rem;"></i>
                        </div>
                        <h4 class="h5 mb-3">Licensed & Insured</h4>
                        <p class="text-muted">Fully licensed and insured for your peace of mind and protection.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-clock text-accent" style="font-size: 3rem;"></i>
                        </div>
                        <h4 class="h5 mb-3">24/7 Availability</h4>
                        <p class="text-muted">Emergency services available around the clock for urgent needs.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-thumbs-up text-accent" style="font-size: 3rem;"></i>
                        </div>
                        <h4 class="h5 mb-3">Satisfaction Guarantee</h4>
                        <p class="text-muted">100% satisfaction guarantee on all our services and workmanship.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <?php echo services_pro_get_cta_section(
        'Ready to Get Started?',
        'Contact us today for a free consultation and personalized quote for your service needs.',
        'Get Free Quote',
        get_permalink(get_page_by_path('contact'))
    ); ?>
</main>

<?php get_footer(); ?>