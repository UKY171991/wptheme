<?php
/**
 * Template Name: Home & Property Maintenance
 * 
 * Template for the Home & Property Maintenance category page
 * Path: /home-maintenance/
 */

get_header(); ?>

<main id="main" class="site-main">
    <!-- Hero Section for Home & Property Maintenance -->
    <section class="service-category-hero" style="background: linear-gradient(135deg, rgba(255,95,0,0.9), rgba(255,140,0,0.8)), url('<?php echo get_template_directory_uri(); ?>/images/maintenance-hero-bg.jpg'); background-size: cover; background-position: center; padding: 6rem 0; color: white; text-align: center;">
        <div class="container">
            <div class="hero-content">
                <div class="category-icon" style="font-size: 4rem; margin-bottom: 1rem;">🧰</div>
                <h1 style="font-size: 3.5rem; margin-bottom: 1rem; font-weight: 700;">Home & Property Maintenance</h1>
                <p style="font-size: 1.3rem; max-width: 600px; margin: 0 auto 2rem; opacity: 0.95;">Expert maintenance services to keep your property in perfect condition, from assembly to installations and repairs.</p>
                
                <!-- Service Count and Features -->
                <div class="hero-stats" style="display: flex; justify-content: center; gap: 2rem; margin: 2rem 0; flex-wrap: wrap;">
                    <div class="stat-item" style="text-align: center;">
                        <div style="font-size: 2rem; font-weight: 700;">10+</div>
                        <div style="font-size: 0.9rem; opacity: 0.9;">Maintenance Services</div>
                    </div>
                    <div class="stat-item" style="text-align: center;">
                        <div style="font-size: 2rem; font-weight: 700;">Licensed</div>
                        <div style="font-size: 0.9rem; opacity: 0.9;">& Insured</div>
                    </div>
                    <div class="stat-item" style="text-align: center;">
                        <div style="font-size: 2rem; font-weight: 700;">Same Day</div>
                        <div style="font-size: 0.9rem; opacity: 0.9;">Service Available</div>
                    </div>
                </div>
                
                <!-- CTA Buttons -->
                <div class="hero-cta" style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="#services-list" class="btn-primary" style="background: white; color: #ff5f00; padding: 1rem 2rem; border-radius: 50px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                        View All Services
                    </a>
                    <a href="<?php echo home_url('/contact'); ?>" class="btn-secondary" style="background: rgba(255,255,255,0.1); color: white; padding: 1rem 2rem; border-radius: 50px; text-decoration: none; font-weight: 600; border: 2px solid white; transition: all 0.3s ease;">
                        Get Free Estimate
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Grid Section -->
    <section id="services-list" class="services-grid-section" style="padding: 5rem 0; background: #f8f9fa;">
        <div class="container">
            <div class="section-header" style="text-align: center; margin-bottom: 4rem;">
                <h2 style="font-size: 2.5rem; margin-bottom: 1rem; color: #333;">Our Maintenance Services</h2>
                <p style="font-size: 1.1rem; color: #666; max-width: 600px; margin: 0 auto;">Professional handyman and maintenance services to keep your home and property in excellent condition.</p>
            </div>

            <?php 
            // Get services data for Home & Property Maintenance category
            $maintenance_services = get_service_categories()['🧰 Home & Property Maintenance']['services'];
            ?>

            <div class="services-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem;">
                <?php foreach ($maintenance_services as $service_name => $service_data) : ?>
                <div class="service-card" style="background: white; border-radius: 15px; padding: 2rem; box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s ease; border: 1px solid #e9ecef;">
                    <!-- Service Header -->
                    <div class="service-header" style="margin-bottom: 1.5rem;">
                        <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #333; font-weight: 600;"><?php echo esc_html($service_name); ?></h3>
                        <div class="service-meta" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                            <span class="price" style="font-size: 1.1rem; font-weight: 700; color: #ff5f00;"><?php echo esc_html($service_data['price']); ?></span>
                            <span class="duration" style="font-size: 0.9rem; color: #666; background: #f8f9fa; padding: 0.3rem 0.8rem; border-radius: 15px;">⏱️ <?php echo esc_html($service_data['duration']); ?></span>
                        </div>
                    </div>
                    
                    <!-- Service Description -->
                    <div class="service-description" style="margin-bottom: 1.5rem;">
                        <p style="color: #666; line-height: 1.6; font-size: 0.95rem;"><?php echo esc_html($service_data['description']); ?></p>
                    </div>
                    
                    <!-- Service Features -->
                    <div class="service-features" style="margin-bottom: 1.5rem;">
                        <h4 style="font-size: 1rem; margin-bottom: 0.8rem; color: #333; font-weight: 600;">What's Included:</h4>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <?php 
                            $features = explode("\n", $service_data['features']);
                            foreach ($features as $feature) : 
                            ?>
                            <li style="color: #666; margin-bottom: 0.5rem; font-size: 0.9rem; display: flex; align-items: center;">
                                <span style="color: #28a745; margin-right: 0.5rem; font-weight: 600;">✓</span>
                                <?php echo esc_html(trim($feature)); ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    
                    <!-- Service Actions -->
                    <div class="service-actions" style="display: flex; gap: 1rem;">
                        <a href="<?php echo home_url('/contact'); ?>" class="btn-book" style="flex: 1; background: #ff5f00; color: white; padding: 0.8rem 1.5rem; border-radius: 8px; text-decoration: none; font-weight: 600; text-align: center; transition: all 0.3s ease;">
                            Book Now
                        </a>
                        <a href="<?php echo home_url('/contact'); ?>?service=<?php echo urlencode($service_name); ?>" class="btn-quote" style="flex: 1; background: transparent; color: #ff5f00; padding: 0.8rem 1.5rem; border-radius: 8px; text-decoration: none; font-weight: 600; text-align: center; border: 2px solid #ff5f00; transition: all 0.3s ease;">
                            Get Quote
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-us" style="padding: 5rem 0; background: white;">
        <div class="container">
            <div class="section-header" style="text-align: center; margin-bottom: 3rem;">
                <h2 style="font-size: 2.5rem; margin-bottom: 1rem; color: #333;">Why Choose Our Maintenance Services?</h2>
                <p style="font-size: 1.1rem; color: #666;">Professional expertise and quality workmanship for all your home maintenance needs.</p>
            </div>

            <div class="benefits-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
                <div class="benefit-item" style="text-align: center; padding: 2rem;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🔧</div>
                    <h3 style="font-size: 1.3rem; margin-bottom: 1rem; color: #333;">Expert Technicians</h3>
                    <p style="color: #666; line-height: 1.6;">Our skilled professionals bring years of experience and the right tools for every job.</p>
                </div>
                
                <div class="benefit-item" style="text-align: center; padding: 2rem;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🛡️</div>
                    <h3 style="font-size: 1.3rem; margin-bottom: 1rem; color: #333;">Licensed & Insured</h3>
                    <p style="color: #666; line-height: 1.6;">Full licensing and comprehensive insurance coverage for your peace of mind.</p>
                </div>
                
                <div class="benefit-item" style="text-align: center; padding: 2rem;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">💯</div>
                    <h3 style="font-size: 1.3rem; margin-bottom: 1rem; color: #333;">Quality Guarantee</h3>
                    <p style="color: #666; line-height: 1.6;">We stand behind our work with a satisfaction guarantee on all maintenance services.</p>
                </div>
                
                <div class="benefit-item" style="text-align: center; padding: 2rem;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🚀</div>
                    <h3 style="font-size: 1.3rem; margin-bottom: 1rem; color: #333;">Fast & Reliable</h3>
                    <p style="color: #666; line-height: 1.6;">Quick response times and reliable service when you need repairs or installations.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Emergency Services CTA -->
    <section class="emergency-cta" style="padding: 3rem 0; background: #2c3e50; color: white; text-align: center;">
        <div class="container">
            <div style="display: flex; align-items: center; justify-content: center; gap: 2rem; flex-wrap: wrap;">
                <div style="flex: 1; min-width: 300px;">
                    <h3 style="font-size: 1.8rem; margin-bottom: 0.5rem; color: #ecf0f1;">Need Emergency Repairs?</h3>
                    <p style="color: #bdc3c7; margin-bottom: 0;">Available for urgent maintenance and repair needs</p>
                </div>
                <div style="flex-shrink: 0;">
                    <a href="tel:+1234567890" class="btn-emergency" style="background: #e74c3c; color: white; padding: 1rem 2rem; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 1.1rem; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-phone-alt"></i> Call Now: (555) 123-4567
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" style="padding: 4rem 0; background: linear-gradient(135deg, #ff5f00, #ff8c00); color: white; text-align: center;">
        <div class="container">
            <h2 style="font-size: 2.5rem; margin-bottom: 1rem;">Ready to Maintain Your Property?</h2>
            <p style="font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.95;">Contact us today for professional maintenance services and free estimates.</p>
            
            <div class="cta-buttons" style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="<?php echo home_url('/contact'); ?>" class="btn-cta" style="background: white; color: #ff5f00; padding: 1rem 2.5rem; border-radius: 50px; text-decoration: none; font-weight: 600; font-size: 1.1rem; transition: all 0.3s ease;">
                    <i class="fas fa-wrench" style="margin-right: 0.5rem;"></i> Get Free Estimate
                </a>
                <a href="<?php echo home_url('/about'); ?>" class="btn-cta-secondary" style="background: rgba(255,255,255,0.1); color: white; padding: 1rem 2.5rem; border-radius: 50px; text-decoration: none; font-weight: 600; font-size: 1.1rem; border: 2px solid white; transition: all 0.3s ease;">
                    <i class="fas fa-users" style="margin-right: 0.5rem;"></i> Meet Our Team
                </a>
            </div>
        </div>
    </section>
</main>

<style>
/* Hover Effects for Service Cards */
.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
}

.service-card .btn-book:hover {
    background: #e55100 !important;
    transform: translateY(-2px);
}

.service-card .btn-quote:hover {
    background: #ff5f00 !important;
    color: white !important;
}

.benefit-item:hover {
    transform: translateY(-5px);
}

.btn-cta:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 30px rgba(255,95,0,0.3);
}

.btn-cta-secondary:hover {
    background: rgba(255,255,255,0.2) !important;
    transform: translateY(-3px);
}

.btn-emergency:hover {
    background: #c0392b !important;
    transform: translateY(-2px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-content h1 {
        font-size: 2.5rem !important;
    }
    
    .hero-stats {
        flex-direction: column !important;
        gap: 1rem !important;
    }
    
    .hero-cta {
        flex-direction: column !important;
        align-items: center !important;
    }
    
    .services-grid {
        grid-template-columns: 1fr !important;
        gap: 1.5rem !important;
    }
    
    .service-actions {
        flex-direction: column !important;
        gap: 0.8rem !important;
    }
    
    .benefits-grid {
        grid-template-columns: 1fr !important;
        gap: 1.5rem !important;
    }
    
    .cta-buttons {
        flex-direction: column !important;
        align-items: center !important;
    }
    
    .emergency-cta > div > div {
        flex-direction: column !important;
        text-align: center !important;
        gap: 1.5rem !important;
    }
}
</style>

<?php get_footer(); ?>
