<?php
/**
 * Template Name: All Services Overview
 * 
 * Main services page showing all 9 service categories
 * Path: /services/
 */

get_header(); ?>

<main id="main" class="site-main">
    <!-- Hero Section -->
    <section class="services-hero" style="background: linear-gradient(135deg, rgba(255,95,0,0.95), rgba(255,140,0,0.9)), url('<?php echo get_template_directory_uri(); ?>/images/services-hero-bg.jpg'); background-size: cover; background-position: center; padding: 6rem 0; color: white; text-align: center;">
        <div class="container">
            <div class="hero-content">
                <h1 style="font-size: 4rem; margin-bottom: 1.5rem; font-weight: 700;">Our Professional Services</h1>
                <p style="font-size: 1.4rem; max-width: 700px; margin: 0 auto 2rem; opacity: 0.95;">Comprehensive solutions for your home, business, and personal needs. From cleaning and maintenance to creative services and consulting.</p>
                
                <!-- Service Stats -->
                <div class="hero-stats" style="display: flex; justify-content: center; gap: 3rem; margin: 3rem 0; flex-wrap: wrap;">
                    <div class="stat-item" style="text-align: center;">
                        <div style="font-size: 3rem; font-weight: 700; margin-bottom: 0.5rem;">9</div>
                        <div style="font-size: 1rem; opacity: 0.9;">Service Categories</div>
                    </div>
                    <div class="stat-item" style="text-align: center;">
                        <div style="font-size: 3rem; font-weight: 700; margin-bottom: 0.5rem;">80+</div>
                        <div style="font-size: 1rem; opacity: 0.9;">Professional Services</div>
                    </div>
                    <div class="stat-item" style="text-align: center;">
                        <div style="font-size: 3rem; font-weight: 700; margin-bottom: 0.5rem;">100%</div>
                        <div style="font-size: 1rem; opacity: 0.9;">Satisfaction Guaranteed</div>
                    </div>
                </div>
                
                <!-- CTA Buttons -->
                <div class="hero-cta" style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="#service-categories" class="btn-primary" style="background: white; color: #ff5f00; padding: 1.2rem 2.5rem; border-radius: 50px; text-decoration: none; font-weight: 600; font-size: 1.1rem; transition: all 0.3s ease;">
                        Browse Services
                    </a>
                    <a href="<?php echo home_url('/contact'); ?>" class="btn-secondary" style="background: rgba(255,255,255,0.1); color: white; padding: 1.2rem 2.5rem; border-radius: 50px; text-decoration: none; font-weight: 600; font-size: 1.1rem; border: 2px solid white; transition: all 0.3s ease;">
                        Get Quote
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Categories Grid -->
    <section id="service-categories" class="service-categories-section" style="padding: 6rem 0; background: #f8f9fa;">
        <div class="container">
            <div class="section-header" style="text-align: center; margin-bottom: 4rem;">
                <h2 style="font-size: 3rem; margin-bottom: 1rem; color: #333;">Service Categories</h2>
                <p style="font-size: 1.2rem; color: #666; max-width: 700px; margin: 0 auto;">Choose from our comprehensive range of professional services, organized by category for your convenience.</p>
            </div>

            <?php 
            // Get all service categories
            $service_categories = get_service_categories();
            ?>

            <div class="categories-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 2.5rem;">
                <?php foreach ($service_categories as $category_key => $category) : ?>
                <div class="category-card" style="background: white; border-radius: 20px; padding: 2.5rem; box-shadow: 0 15px 35px rgba(0,0,0,0.1); transition: all 0.4s ease; border: 1px solid #e9ecef; position: relative; overflow: hidden;">
                    <!-- Category Background Pattern -->
                    <div style="position: absolute; top: -50px; right: -50px; width: 150px; height: 150px; background: linear-gradient(135deg, rgba(255,95,0,0.1), rgba(255,140,0,0.05)); border-radius: 50%; z-index: 1;"></div>
                    
                    <!-- Category Content -->
                    <div style="position: relative; z-index: 2;">
                        <!-- Category Header -->
                        <div class="category-header" style="margin-bottom: 2rem; text-align: center;">
                            <div class="category-icon" style="font-size: 4rem; margin-bottom: 1rem;">
                                <?php 
                                // Extract emoji from category name
                                preg_match('/[\x{1F000}-\x{1F9FF}]|[\x{2600}-\x{26FF}]|[\x{2700}-\x{27BF}]/u', $category['name'], $matches);
                                echo isset($matches[0]) ? $matches[0] : '🔧';
                                ?>
                            </div>
                            <h3 style="font-size: 1.8rem; margin-bottom: 0.8rem; color: #333; font-weight: 700;">
                                <?php 
                                // Remove emoji from name for title
                                echo esc_html(preg_replace('/[\x{1F000}-\x{1F9FF}]|[\x{2600}-\x{26FF}]|[\x{2700}-\x{27BF}]/u', '', $category['name']));
                                ?>
                            </h3>
                            <p style="color: #666; font-size: 1rem; line-height: 1.6;">
                                <?php echo esc_html($category['description']); ?>
                            </p>
                        </div>

                        <!-- Service Count -->
                        <div class="service-count" style="text-align: center; margin-bottom: 2rem;">
                            <span style="background: linear-gradient(135deg, #ff5f00, #ff8c00); color: white; padding: 0.8rem 1.5rem; border-radius: 25px; font-weight: 600; font-size: 0.95rem;">
                                <?php echo count($category['services']); ?> Professional Services
                            </span>
                        </div>

                        <!-- Featured Services Preview -->
                        <div class="featured-services" style="margin-bottom: 2rem;">
                            <h4 style="font-size: 1.1rem; margin-bottom: 1rem; color: #333; font-weight: 600;">Featured Services:</h4>
                            <ul style="list-style: none; padding: 0; margin: 0;">
                                <?php 
                                $service_count = 0;
                                foreach ($category['services'] as $service_name => $service_data) : 
                                    if ($service_count < 4) : // Show only 4 services
                                ?>
                                <li style="color: #666; margin-bottom: 0.6rem; font-size: 0.95rem; display: flex; align-items: center;">
                                    <span style="color: #28a745; margin-right: 0.7rem; font-weight: 600;">✓</span>
                                    <?php echo esc_html($service_name); ?>
                                    <span style="margin-left: auto; color: #ff5f00; font-weight: 600; font-size: 0.85rem;">
                                        <?php echo esc_html($service_data['price']); ?>
                                    </span>
                                </li>
                                <?php 
                                    endif;
                                    $service_count++;
                                endforeach; 
                                ?>
                                <?php if (count($category['services']) > 4) : ?>
                                <li style="color: #999; font-size: 0.9rem; font-style: italic; margin-top: 0.5rem;">
                                    + <?php echo count($category['services']) - 4; ?> more services available
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <!-- Category Actions -->
                        <div class="category-actions" style="display: flex; gap: 1rem;">
                            <a href="<?php echo home_url('/'); ?>category/<?php echo esc_attr($category['slug']); ?>" class="btn-view-category" style="flex: 1; background: #ff5f00; color: white; padding: 1rem 1.5rem; border-radius: 10px; text-decoration: none; font-weight: 600; text-align: center; transition: all 0.3s ease; font-size: 0.95rem;">
                                View All Services
                            </a>
                            <a href="<?php echo home_url('/contact'); ?>?category=<?php echo urlencode($category['name']); ?>" class="btn-quote-category" style="flex: 1; background: transparent; color: #ff5f00; padding: 1rem 1.5rem; border-radius: 10px; text-decoration: none; font-weight: 600; text-align: center; border: 2px solid #ff5f00; transition: all 0.3s ease; font-size: 0.95rem;">
                                Get Quote
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="how-it-works" style="padding: 6rem 0; background: white;">
        <div class="container">
            <div class="section-header" style="text-align: center; margin-bottom: 4rem;">
                <h2 style="font-size: 2.8rem; margin-bottom: 1rem; color: #333;">How It Works</h2>
                <p style="font-size: 1.1rem; color: #666;">Simple steps to get the professional services you need</p>
            </div>

            <div class="process-steps" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
                <div class="step-item" style="text-align: center; padding: 2rem;">
                    <div class="step-number" style="width: 60px; height: 60px; background: linear-gradient(135deg, #ff5f00, #ff8c00); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: 700; margin: 0 auto 1.5rem;">1</div>
                    <h3 style="font-size: 1.4rem; margin-bottom: 1rem; color: #333;">Choose Service</h3>
                    <p style="color: #666; line-height: 1.6;">Browse our service categories and select what you need for your home or business.</p>
                </div>
                
                <div class="step-item" style="text-align: center; padding: 2rem;">
                    <div class="step-number" style="width: 60px; height: 60px; background: linear-gradient(135deg, #ff5f00, #ff8c00); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: 700; margin: 0 auto 1.5rem;">2</div>
                    <h3 style="font-size: 1.4rem; margin-bottom: 1rem; color: #333;">Get Quote</h3>
                    <p style="color: #666; line-height: 1.6;">Contact us for a free quote. We'll provide transparent pricing with no hidden fees.</p>
                </div>
                
                <div class="step-item" style="text-align: center; padding: 2rem;">
                    <div class="step-number" style="width: 60px; height: 60px; background: linear-gradient(135deg, #ff5f00, #ff8c00); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: 700; margin: 0 auto 1.5rem;">3</div>
                    <h3 style="font-size: 1.4rem; margin-bottom: 1rem; color: #333;">Book Service</h3>
                    <p style="color: #666; line-height: 1.6;">Schedule your service at a time that works for you. We offer flexible scheduling.</p>
                </div>
                
                <div class="step-item" style="text-align: center; padding: 2rem;">
                    <div class="step-number" style="width: 60px; height: 60px; background: linear-gradient(135deg, #ff5f00, #ff8c00); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: 700; margin: 0 auto 1.5rem;">4</div>
                    <h3 style="font-size: 1.4rem; margin-bottom: 1rem; color: #333;">Enjoy Results</h3>
                    <p style="color: #666; line-height: 1.6;">Relax while our professionals deliver exceptional results with guaranteed satisfaction.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-us" style="padding: 6rem 0; background: #f8f9fa;">
        <div class="container">
            <div class="section-header" style="text-align: center; margin-bottom: 4rem;">
                <h2 style="font-size: 2.8rem; margin-bottom: 1rem; color: #333;">Why Choose Our Services?</h2>
                <p style="font-size: 1.1rem; color: #666;">We're committed to delivering exceptional results across all service categories</p>
            </div>

            <div class="benefits-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2.5rem;">
                <div class="benefit-item" style="background: white; border-radius: 15px; padding: 2.5rem; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                    <div style="font-size: 3.5rem; margin-bottom: 1.5rem;">🛡️</div>
                    <h3 style="font-size: 1.5rem; margin-bottom: 1rem; color: #333;">Fully Licensed & Insured</h3>
                    <p style="color: #666; line-height: 1.6;">Complete licensing and comprehensive insurance coverage for your peace of mind on every service.</p>
                </div>
                
                <div class="benefit-item" style="background: white; border-radius: 15px; padding: 2.5rem; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                    <div style="font-size: 3.5rem; margin-bottom: 1.5rem;">⭐</div>
                    <h3 style="font-size: 1.5rem; margin-bottom: 1rem; color: #333;">Quality Guaranteed</h3>
                    <p style="color: #666; line-height: 1.6;">100% satisfaction guarantee on all our services with professional results you can count on.</p>
                </div>
                
                <div class="benefit-item" style="background: white; border-radius: 15px; padding: 2.5rem; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                    <div style="font-size: 3.5rem; margin-bottom: 1.5rem;">💰</div>
                    <h3 style="font-size: 1.5rem; margin-bottom: 1rem; color: #333;">Transparent Pricing</h3>
                    <p style="color: #666; line-height: 1.6;">Fair, upfront pricing with detailed quotes and no hidden fees or surprise charges.</p>
                </div>
                
                <div class="benefit-item" style="background: white; border-radius: 15px; padding: 2.5rem; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                    <div style="font-size: 3.5rem; margin-bottom: 1.5rem;">🚀</div>
                    <h3 style="font-size: 1.5rem; margin-bottom: 1rem; color: #333;">Fast & Reliable</h3>
                    <p style="color: #666; line-height: 1.6;">Quick response times and dependable service delivery when you need it most.</p>
                </div>
                
                <div class="benefit-item" style="background: white; border-radius: 15px; padding: 2.5rem; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                    <div style="font-size: 3.5rem; margin-bottom: 1.5rem;">👥</div>
                    <h3 style="font-size: 1.5rem; margin-bottom: 1rem; color: #333;">Expert Professionals</h3>
                    <p style="color: #666; line-height: 1.6;">Skilled, background-checked professionals with expertise in their respective fields.</p>
                </div>
                
                <div class="benefit-item" style="background: white; border-radius: 15px; padding: 2.5rem; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                    <div style="font-size: 3.5rem; margin-bottom: 1.5rem;">📞</div>
                    <h3 style="font-size: 1.5rem; margin-bottom: 1rem; color: #333;">24/7 Support</h3>
                    <p style="color: #666; line-height: 1.6;">Round-the-clock customer support to answer questions and address any concerns.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="final-cta" style="padding: 5rem 0; background: linear-gradient(135deg, #ff5f00, #ff8c00); color: white; text-align: center;">
        <div class="container">
            <h2 style="font-size: 3rem; margin-bottom: 1.5rem;">Ready to Get Started?</h2>
            <p style="font-size: 1.3rem; margin-bottom: 2.5rem; opacity: 0.95; max-width: 600px; margin-left: auto; margin-right: auto;">Choose from our comprehensive range of professional services and experience the difference quality makes.</p>
            
            <div class="cta-buttons" style="display: flex; gap: 1.5rem; justify-content: center; flex-wrap: wrap;">
                <a href="<?php echo home_url('/contact'); ?>" class="btn-cta" style="background: white; color: #ff5f00; padding: 1.2rem 3rem; border-radius: 50px; text-decoration: none; font-weight: 600; font-size: 1.2rem; transition: all 0.3s ease;">
                    <i class="fas fa-comment-dots" style="margin-right: 0.7rem;"></i> Get Free Quote
                </a>
                <a href="tel:+1234567890" class="btn-cta-secondary" style="background: rgba(255,255,255,0.1); color: white; padding: 1.2rem 3rem; border-radius: 50px; text-decoration: none; font-weight: 600; font-size: 1.2rem; border: 2px solid white; transition: all 0.3s ease;">
                    <i class="fas fa-phone-alt" style="margin-right: 0.7rem;"></i> Call (555) 123-4567
                </a>
            </div>
        </div>
    </section>
</main>

<style>
/* Enhanced Hover Effects */
.category-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.15) !important;
}

.category-card:hover .category-icon {
    transform: scale(1.1);
    transition: transform 0.3s ease;
}

.btn-view-category:hover {
    background: #e55100 !important;
    transform: translateY(-2px);
}

.btn-quote-category:hover {
    background: #ff5f00 !important;
    color: white !important;
    transform: translateY(-2px);
}

.benefit-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
}

.step-item:hover .step-number {
    transform: scale(1.1);
    transition: transform 0.3s ease;
}

.btn-cta:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(255,95,0,0.3);
}

.btn-cta-secondary:hover {
    background: rgba(255,255,255,0.2) !important;
    transform: translateY(-3px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .services-hero h1 {
        font-size: 2.8rem !important;
    }
    
    .hero-stats {
        flex-direction: column !important;
        gap: 1.5rem !important;
    }
    
    .hero-cta {
        flex-direction: column !important;
        align-items: center !important;
    }
    
    .categories-grid {
        grid-template-columns: 1fr !important;
        gap: 2rem !important;
    }
    
    .category-actions {
        flex-direction: column !important;
        gap: 1rem !important;
    }
    
    .process-steps {
        grid-template-columns: 1fr !important;
        gap: 1.5rem !important;
    }
    
    .benefits-grid {
        grid-template-columns: 1fr !important;
        gap: 1.5rem !important;
    }
    
    .cta-buttons {
        flex-direction: column !important;
        align-items: center !important;
    }
    
    .section-header h2 {
        font-size: 2.2rem !important;
    }
    
    .final-cta h2 {
        font-size: 2.3rem !important;
    }
}

@media (max-width: 480px) {
    .category-card {
        padding: 2rem !important;
    }
    
    .benefit-item {
        padding: 2rem !important;
    }
    
    .step-item {
        padding: 1.5rem !important;
    }
}
</style>

<?php get_footer(); ?>
