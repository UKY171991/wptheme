<?php
/*
Template Name: Services Page
*/
get_header(); ?>

<div class="services-page">
    <!-- Hero Section -->
    <section class="services-hero">
        <div class="container">
            <h1>Our Professional Services</h1>
            <p>Comprehensive home and lifestyle services delivered with excellence and reliability</p>
            <div class="hero-buttons">
                <a href="#service-categories" class="cta-button">View Services</a>
                <a href="#contact" class="btn btn-secondary">Contact Us</a>
            </div>
        </div>
    </section>

    <!-- Introduction -->
    <section class="services-intro">
        <div class="container">
            <div>
                <h2>How We Can Help You</h2>
                <p>
                    We offer a wide range of professional services to make your life easier. From home maintenance to personal assistance, our trained professionals are ready to deliver exceptional service tailored to your specific needs.
                </p>
                <div class="service-benefits">
                    <div class="benefit">
                        <h3>✓ Professional Staff</h3>
                        <p>Trained and vetted professionals who take pride in their work</p>
                    </div>
                    <div class="benefit">
                        <h3>✓ Quality Guaranteed</h3>
                        <p>Satisfaction guaranteed with all our services</p>
                    </div>
                    <div class="benefit">
                        <h3>✓ Competitive Pricing</h3>
                        <p>Fair and transparent pricing with no hidden fees</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Categories -->
    <section id="service-categories" class="service-categories-section">
        <div class="container">
            <header class="section-header">
                <h2>Our Service Categories</h2>
                <p>Browse our comprehensive range of services designed to meet all your home and lifestyle needs</p>
            </header>

            <div class="services-detailed">
                <?php 
                $service_categories = get_service_categories();
                
                foreach ($service_categories as $category_key => $category) : 
                    $icon = isset($category['icon']) ? $category['icon'] : substr($category_key, 0, 2);
                    $name = isset($category['name']) ? $category['name'] : $category_key;
                ?>
                    <div class="service-category-detailed" style="margin-bottom: 4rem; background: white; padding: 3rem; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
                        <h2 style="display: flex; align-items: center; margin-bottom: 2rem; color: #333; position: relative;">
                            <span style="font-size: 3rem; margin-right: 1rem; display: inline-block; background: rgba(255,95,0,0.1); width: 70px; height: 70px; display: flex; align-items: center; justify-content: center; border-radius: 50%;"><?php echo $icon; ?></span>
                            <?php echo esc_html($name); ?>
                        </h2>
                        
                        <div class="services-grid-detailed" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                            <?php 
                            if (isset($category['services']) && is_array($category['services'])) {
                                foreach ($category['services'] as $service_name => $service_details) : 
                                    // Default values if not provided
                                    $description = isset($service_details['description']) ? $service_details['description'] : 'Professional and reliable service with competitive pricing.';
                                    $price = isset($service_details['price']) ? $service_details['price'] : 'Contact for pricing';
                                    $duration = isset($service_details['duration']) ? $service_details['duration'] : 'Varies';
                                    $features = isset($service_details['features']) ? explode("\n", $service_details['features']) : array();
                            ?>
                                <div class="service-item" style="padding: 1.5rem; background: #f8f9fa; border-radius: 10px; border-left: 4px solid #ff5f00; transition: all 0.3s ease; position: relative; overflow: hidden;">
                                    <h3 style="margin-bottom: 0.7rem; color: #333; font-size: 1.2rem;"><?php echo esc_html($service_name); ?></h3>
                                    <div class="price-duration" style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                                        <span class="price" style="font-weight: 600; color: #ff5f00;"><?php echo esc_html($price); ?></span>
                                        <span class="duration" style="font-size: 0.9rem; color: #666;"><?php echo esc_html($duration); ?></span>
                                    </div>
                                    <p style="color: #666; font-size: 0.9rem; margin-bottom: 1rem; line-height: 1.5;"><?php echo esc_html(wp_trim_words($description, 20)); ?></p>
                                    
                                    <?php if (!empty($features)) : ?>
                                    <div class="features-preview" style="margin-bottom: 1rem;">
                                        <div class="feature-items" style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                                            <?php 
                                            $feature_count = 0;
                                            foreach ($features as $feature) :
                                                if ($feature_count < 3) : // Show only first 3 features
                                            ?>
                                                <span style="font-size: 0.8rem; background: rgba(255,95,0,0.1); color: #ff5f00; padding: 0.2rem 0.5rem; border-radius: 20px;"><?php echo esc_html(trim($feature)); ?></span>
                                            <?php 
                                                endif;
                                                $feature_count++;
                                            endforeach;
                                            
                                            if (count($features) > 3) : // Show "more" indicator if there are more features
                                            ?>
                                                <span style="font-size: 0.8rem; background: rgba(0,0,0,0.05); color: #666; padding: 0.2rem 0.5rem; border-radius: 20px;">+<?php echo (count($features) - 3); ?> more</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <div class="service-actions" style="display: flex; gap: 0.5rem;">
                                        <a href="#contact" class="btn" style="font-size: 0.9rem; padding: 0.5rem 1rem; flex: 1; text-align: center;">Get Quote</a>
                                        <button class="btn btn-secondary service-details-btn" style="font-size: 0.9rem; padding: 0.5rem 1rem; flex: 1; text-align: center; background: transparent; border: 1px solid #ddd; cursor: pointer;" 
                                            data-service="<?php echo esc_attr($service_name); ?>"
                                            data-description="<?php echo esc_attr($description); ?>"
                                            data-price="<?php echo esc_attr($price); ?>"
                                            data-duration="<?php echo esc_attr($duration); ?>"
                                            data-features="<?php echo esc_attr(implode('|', $features)); ?>">
                                            View Details
                                        </button>
                                    </div>
                                    <div class="service-hover-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(255,95,0,0.1) 0%, rgba(255,95,0,0) 100%); opacity: 0; transition: opacity 0.3s ease; pointer-events: none;"></div>
                                </div>
                            <?php 
                                endforeach;
                            }
                            ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Service Details Modal -->
    <div id="serviceModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); z-index: 1000; justify-content: center; align-items: center;">
        <div class="modal-content" style="background: white; max-width: 600px; width: 90%; border-radius: 15px; box-shadow: 0 10px 50px rgba(0,0,0,0.3); position: relative; max-height: 90vh; overflow-y: auto;">
            <button id="closeModal" style="position: absolute; top: 20px; right: 20px; background: none; border: none; font-size: 1.5rem; cursor: pointer; color: #999; z-index: 2;">×</button>
            
            <div class="modal-body" style="padding: 2.5rem;">
                <h3 id="modalTitle" style="font-size: 1.8rem; margin-bottom: 1rem; color: #333; padding-bottom: 0.8rem; border-bottom: 2px solid #ff5f00;"></h3>
                
                <div class="modal-price-duration" style="display: flex; justify-content: space-between; margin-bottom: 1.5rem;">
                    <div class="modal-price-box" style="background: #f8f9fa; padding: 0.8rem 1.2rem; border-radius: 8px; display: inline-block;">
                        <span style="display: block; font-size: 0.9rem; color: #666; margin-bottom: 0.3rem;">Starting Price</span>
                        <span id="modalPrice" style="font-weight: 700; color: #ff5f00; font-size: 1.3rem;"></span>
                    </div>
                    
                    <div class="modal-duration-box" style="background: #f8f9fa; padding: 0.8rem 1.2rem; border-radius: 8px; display: inline-block;">
                        <span style="display: block; font-size: 0.9rem; color: #666; margin-bottom: 0.3rem;">Typical Duration</span>
                        <span id="modalDuration" style="font-weight: 600; color: #333; font-size: 1.1rem;"></span>
                    </div>
                </div>
                
                <div class="modal-description" style="margin-bottom: 1.5rem;">
                    <h4 style="font-size: 1.2rem; margin-bottom: 0.8rem; color: #333;">Service Description</h4>
                    <p id="modalDescription" style="color: #666; line-height: 1.7; font-size: 1rem;"></p>
                </div>
                
                <div class="modal-features">
                    <h4 style="font-size: 1.2rem; margin-bottom: 1rem; color: #333;">What's Included</h4>
                    <ul id="modalFeatures" style="list-style: none; padding: 0; margin: 0;">
                        <!-- Features will be inserted here dynamically -->
                    </ul>
                </div>
                
                <div class="modal-cta" style="margin-top: 2rem; text-align: center;">
                    <a href="#contact" id="modalContactBtn" class="cta-button" style="display: inline-block; padding: 1rem 2rem; width: 100%;">Request This Service</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Service Process -->
    <section class="service-process" style="padding: 5rem 0; background: white;">
        <div class="container">
            <header style="text-align: center; margin-bottom: 4rem;">
                <h2 style="font-size: 2.5rem; margin-bottom: 1rem; color: #333;">How It Works</h2>
                <p style="color: #666; max-width: 700px; margin: 0 auto;">Our simple process to deliver the services you need</p>
            </header>

            <div class="process-steps" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; position: relative;">
                <div class="process-step" style="text-align: center; padding: 2rem; position: relative;">
                    <div class="step-number" style="width: 60px; height: 60px; background: #ff5f00; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 1.5rem; font-weight: bold;">1</div>
                    <h3 style="margin-bottom: 1rem; color: #333;">Request a Quote</h3>
                    <p style="color: #666;">Fill out our simple form with your service needs and we'll get back to you quickly with pricing.</p>
                </div>
                
                <div class="process-step" style="text-align: center; padding: 2rem; position: relative;">
                    <div class="step-number" style="width: 60px; height: 60px; background: #ff5f00; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 1.5rem; font-weight: bold;">2</div>
                    <h3 style="margin-bottom: 1rem; color: #333;">Schedule Service</h3>
                    <p style="color: #666;">Choose a convenient date and time for your service from our available slots.</p>
                </div>
                
                <div class="process-step" style="text-align: center; padding: 2rem; position: relative;">
                    <div class="step-number" style="width: 60px; height: 60px; background: #ff5f00; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 1.5rem; font-weight: bold;">3</div>
                    <h3 style="margin-bottom: 1rem; color: #333;">Service Delivery</h3>
                    <p style="color: #666;">Our professionals arrive on time and complete the service to your satisfaction.</p>
                </div>
                
                <div class="process-step" style="text-align: center; padding: 2rem; position: relative;">
                    <div class="step-number" style="width: 60px; height: 60px; background: #ff5f00; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 1.5rem; font-weight: bold;">4</div>
                    <h3 style="margin-bottom: 1rem; color: #333;">Feedback & Follow-up</h3>
                    <p style="color: #666;">Tell us about your experience and let us know if you need any follow-up service.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials" style="padding: 5rem 0; background: linear-gradient(rgba(11, 17, 51, 0.9), rgba(11, 17, 51, 0.95)), url('data:image/svg+xml,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 1200 400\' fill=\'%23ff5f00\'><circle cx=\'200\' cy=\'100\' r=\'20\' opacity=\'0.2\'/><circle cx=\'400\' cy=\'200\' r=\'15\' opacity=\'0.15\'/><circle cx=\'800\' cy=\'150\' r=\'25\' opacity=\'0.1\'/><circle cx=\'1000\' cy=\'250\' r=\'18\' opacity=\'0.25\'/></svg>'); color: white;">
        <div class="container">
            <header style="text-align: center; margin-bottom: 4rem;">
                <h2 style="font-size: 2.5rem; margin-bottom: 1rem; color: white;">What Our Customers Say</h2>
                <p style="color: rgba(255,255,255,0.8); max-width: 700px; margin: 0 auto;">Hear from our satisfied customers about their experience with our services</p>
            </header>

            <div class="testimonial-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                <div class="testimonial" style="background: rgba(255,255,255,0.1); padding: 2rem; border-radius: 15px; backdrop-filter: blur(10px); position: relative;">
                    <div class="quote" style="font-size: 5rem; position: absolute; top: -15px; right: 20px; opacity: 0.1; font-family: serif;">"</div>
                    <p style="font-style: italic; margin-bottom: 1.5rem; position: relative; z-index: 1;">The house cleaning service exceeded all my expectations! The team was professional, thorough, and friendly. My home has never looked better.</p>
                    <div class="testimonial-author" style="display: flex; align-items: center;">
                        <div class="author-info">
                            <h4 style="margin-bottom: 0.25rem;">Sarah Johnson</h4>
                            <p style="font-size: 0.9rem; opacity: 0.7;">Home Cleaning Customer</p>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial" style="background: rgba(255,255,255,0.1); padding: 2rem; border-radius: 15px; backdrop-filter: blur(10px); position: relative;">
                    <div class="quote" style="font-size: 5rem; position: absolute; top: -15px; right: 20px; opacity: 0.1; font-family: serif;">"</div>
                    <p style="font-style: italic; margin-bottom: 1.5rem; position: relative; z-index: 1;">I've used their handyman services multiple times now. Always on time, fairly priced, and the work is excellent. They've become my go-to for all home repairs.</p>
                    <div class="testimonial-author" style="display: flex; align-items: center;">
                        <div class="author-info">
                            <h4 style="margin-bottom: 0.25rem;">Michael Chen</h4>
                            <p style="font-size: 0.9rem; opacity: 0.7;">Handyman Services Customer</p>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial" style="background: rgba(255,255,255,0.1); padding: 2rem; border-radius: 15px; backdrop-filter: blur(10px); position: relative;">
                    <div class="quote" style="font-size: 5rem; position: absolute; top: -15px; right: 20px; opacity: 0.1; font-family: serif;">"</div>
                    <p style="font-style: italic; margin-bottom: 1.5rem; position: relative; z-index: 1;">Their pet sitting service gave me peace of mind during my vacation. They sent daily updates with photos, and my cats were happy and healthy when I returned home.</p>
                    <div class="testimonial-author" style="display: flex; align-items: center;">
                        <div class="author-info">
                            <h4 style="margin-bottom: 0.25rem;">Emily Rodriguez</h4>
                            <p style="font-size: 0.9rem; opacity: 0.7;">Pet Services Customer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="services-cta" style="padding: 5rem 0; background: white; text-align: center;">
        <div class="container">
            <div style="max-width: 800px; margin: 0 auto;">
                <h2 style="font-size: 2.5rem; margin-bottom: 1.5rem; color: #333;">Ready to Get Started?</h2>
                <p style="font-size: 1.1rem; color: #666; margin-bottom: 2rem;">Contact us today to discuss your service needs and get a free quote</p>
                <div class="cta-buttons" style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="#contact" class="cta-button" style="padding: 1rem 2.5rem;">Request a Quote</a>
                    <a href="tel:+18005551234" class="btn btn-secondary" style="padding: 1rem 2.5rem;">Call Us: (800) 555-1234</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Custom Service Request -->
    <section id="contact" class="custom-service" style="padding: 5rem 0; background: linear-gradient(135deg, #f8f9fa 0%, #f1f3f5 100%);">
        <div class="container">
            <header class="contact-header" style="text-align: center; margin-bottom: 3rem;">
                <h2 style="font-size: 2.5rem; margin-bottom: 1rem; color: #333; position: relative; display: inline-block;">
                    Get in Touch
                    <span style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%); width: 80px; height: 3px; background: #ff5f00;"></span>
                </h2>
                <p style="color: #666; max-width: 700px; margin: 1.5rem auto 0; font-size: 1.1rem;">We're ready to help you with any service need. Request a quote or ask us any questions.</p>
            </header>
            
            <div class="contact-wrapper" style="max-width: 1100px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1.5fr; gap: 3rem; align-items: stretch; background: white; border-radius: 20px; box-shadow: 0 15px 50px rgba(0,0,0,0.1); overflow: hidden;">
                <div class="custom-service-content" style="padding: 3rem; background: linear-gradient(135deg, #0b1133 0%, #1a265c 100%); color: white; position: relative;">
                    <div style="position: relative; z-index: 2;">
                        <h3 style="font-size: 1.8rem; margin-bottom: 1.5rem; color: white; font-weight: 600;">Need a Custom Service?</h3>
                        <p style="color: rgba(255,255,255,0.9); margin-bottom: 2rem; font-size: 1rem; line-height: 1.7;">Don't see exactly what you're looking for? We offer custom solutions tailored to your specific needs.</p>
                        
                        <ul style="list-style: none; margin-bottom: 2.5rem;">
                            <li style="margin-bottom: 1rem; display: flex; align-items: center;">
                                <span style="color: #ff5f00; margin-right: 1rem; background: rgba(255,95,0,0.2); width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">✓</span>
                                <span>Flexible scheduling options</span>
                            </li>
                            <li style="margin-bottom: 1rem; display: flex; align-items: center;">
                                <span style="color: #ff5f00; margin-right: 1rem; background: rgba(255,95,0,0.2); width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">✓</span>
                                <span>Customized service packages</span>
                            </li>
                            <li style="margin-bottom: 1rem; display: flex; align-items: center;">
                                <span style="color: #ff5f00; margin-right: 1rem; background: rgba(255,95,0,0.2); width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">✓</span>
                                <span>Competitive pricing</span>
                            </li>
                            <li style="margin-bottom: 1rem; display: flex; align-items: center;">
                                <span style="color: #ff5f00; margin-right: 1rem; background: rgba(255,95,0,0.2); width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">✓</span>
                                <span>Satisfaction guaranteed</span>
                            </li>
                        </ul>
                        
                        <div class="contact-info">
                            <div style="margin-bottom: 1.5rem; display: flex; align-items: center;">
                                <div style="min-width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                                    <i class="fas fa-phone-alt" style="color: #ff5f00;"></i>
                                </div>
                                <div>
                                    <h4 style="font-size: 1rem; margin-bottom: 0.3rem; color: rgba(255,255,255,0.8);">Call Us</h4>
                                    <p style="font-size: 1.1rem; font-weight: 600;">(800) 555-1234</p>
                                </div>
                            </div>
                            
                            <div style="margin-bottom: 1.5rem; display: flex; align-items: center;">
                                <div style="min-width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                                    <i class="fas fa-envelope" style="color: #ff5f00;"></i>
                                </div>
                                <div>
                                    <h4 style="font-size: 1rem; margin-bottom: 0.3rem; color: rgba(255,255,255,0.8);">Email Us</h4>
                                    <p style="font-size: 1.1rem; font-weight: 600;">info@yourservices.com</p>
                                </div>
                            </div>
                            
                            <div style="display: flex; align-items: center;">
                                <div style="min-width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                                    <i class="fas fa-clock" style="color: #ff5f00;"></i>
                                </div>
                                <div>
                                    <h4 style="font-size: 1rem; margin-bottom: 0.3rem; color: rgba(255,255,255,0.8);">Our Hours</h4>
                                    <p style="font-size: 1.1rem; font-weight: 600;">Mon-Fri: 8am-7pm, Sat: 9am-5pm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div style="position: absolute; bottom: -30px; right: -30px; width: 150px; height: 150px; background: rgba(255,95,0,0.1); border-radius: 50%; z-index: 1;"></div>
                    <div style="position: absolute; top: -20px; left: -20px; width: 100px; height: 100px; background: rgba(255,255,255,0.05); border-radius: 50%; z-index: 1;"></div>
                </div>
                
                <div class="contact-form" style="padding: 3rem;">
                    <h3 style="font-size: 1.8rem; margin-bottom: 1.5rem; color: #333; position: relative; padding-bottom: 0.8rem;">
                        Request a Quote
                        <span style="position: absolute; bottom: 0; left: 0; width: 50px; height: 3px; background: #ff5f00;"></span>
                    </h3>
                    
                    <form id="quoteForm" style="display: grid; gap: 1.5rem;">
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                            <div class="form-group" style="position: relative;">
                                <label for="name" style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 500;">Your Name</label>
                                <input type="text" id="name" name="name" required style="width: 100%; padding: 1rem 1rem 1rem 2.5rem; border: 1px solid #e0e0e0; border-radius: 8px; background-color: #f9f9f9; transition: all 0.3s ease;">
                                <i class="fas fa-user" style="position: absolute; left: 1rem; bottom: 1rem; color: #999;"></i>
                            </div>
                            
                            <div class="form-group" style="position: relative;">
                                <label for="email" style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 500;">Email Address</label>
                                <input type="email" id="email" name="email" required style="width: 100%; padding: 1rem 1rem 1rem 2.5rem; border: 1px solid #e0e0e0; border-radius: 8px; background-color: #f9f9f9; transition: all 0.3s ease;">
                                <i class="fas fa-envelope" style="position: absolute; left: 1rem; bottom: 1rem; color: #999;"></i>
                            </div>
                        </div>
                        
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                            <div class="form-group" style="position: relative;">
                                <label for="phone" style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 500;">Phone Number</label>
                                <input type="tel" id="phone" name="phone" style="width: 100%; padding: 1rem 1rem 1rem 2.5rem; border: 1px solid #e0e0e0; border-radius: 8px; background-color: #f9f9f9; transition: all 0.3s ease;">
                                <i class="fas fa-phone-alt" style="position: absolute; left: 1rem; bottom: 1rem; color: #999;"></i>
                            </div>
                            
                            <div class="form-group" style="position: relative;">
                                <label for="service" style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 500;">Service Needed</label>
                                <select id="service" name="service" style="width: 100%; padding: 1rem 1rem 1rem 2.5rem; border: 1px solid #e0e0e0; border-radius: 8px; background-color: #f9f9f9; appearance: none; transition: all 0.3s ease;">
                                    <option value="">Select a Service</option>
                                    <?php
                                    // Get all service categories
                                    $service_categories = get_terms(array(
                                        'taxonomy' => 'service_category',
                                        'hide_empty' => false,
                                    ));
                                    
                                    // Display them in dropdown
                                    foreach($service_categories as $category) {
                                        echo '<option value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</option>';
                                    }
                                    ?>
                                    <option value="custom">Custom Service</option>
                                </select>
                                <i class="fas fa-concierge-bell" style="position: absolute; left: 1rem; bottom: 1rem; color: #999;"></i>
                                <i class="fas fa-chevron-down" style="position: absolute; right: 1rem; bottom: 1rem; color: #999; pointer-events: none;"></i>
                            </div>
                        </div>
                        
                        <div class="form-group" style="position: relative;">
                            <label for="message" style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 500;">Message</label>
                            <textarea id="message" name="message" rows="4" style="width: 100%; padding: 1rem 1rem 1rem 2.5rem; border: 1px solid #e0e0e0; border-radius: 8px; background-color: #f9f9f9; resize: vertical; min-height: 120px; transition: all 0.3s ease;"></textarea>
                            <i class="fas fa-comment" style="position: absolute; left: 1rem; top: 3rem; color: #999;"></i>
                        </div>
                        
                        <button type="submit" class="cta-button" style="width: 100%; padding: 1rem; cursor: pointer; font-weight: 600; letter-spacing: 0.5px; font-size: 1.1rem; transition: all 0.3s ease; background: linear-gradient(135deg, #ff5f00 0%, #ff8c00 100%); border: none; border-radius: 8px; color: white; text-transform: uppercase; position: relative; overflow: hidden; z-index: 1;">
                            <span style="position: relative; z-index: 2;">Submit Request</span>
                            <span style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.2) 50%, rgba(255,255,255,0) 100%); transition: all 0.5s ease; z-index: 1;" class="shine-effect"></span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.service-category-detailed:hover {
    transform: translateY(-5px);
}

.service-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.service-item:hover .service-hover-overlay {
    opacity: 1;
}

/* Contact Form Enhancements */
#quoteForm input:focus,
#quoteForm select:focus,
#quoteForm textarea:focus {
    outline: none;
    border-color: #ff5f00;
    box-shadow: 0 0 0 3px rgba(255, 95, 0, 0.1);
    background-color: #fff;
}

#quoteForm input:hover,
#quoteForm select:hover,
#quoteForm textarea:hover {
    border-color: #ddd;
    background-color: #fff;
}

#quoteForm button:hover .shine-effect {
    left: 100%;
}

#quoteForm button:hover {
    box-shadow: 0 5px 15px rgba(255, 95, 0, 0.3);
    transform: translateY(-2px);
}

.contact-wrapper {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.contact-wrapper:hover {
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
    transform: translateY(-5px);
}

/* Modal Styles */
#serviceModal {
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, visibility 0.3s ease;
}

#serviceModal.show {
    opacity: 1;
    visibility: visible;
    display: flex !important;
}

.modal-content {
    transform: translateY(30px);
    transition: transform 0.3s ease;
}

#serviceModal.show .modal-content {
    transform: translateY(0);
}

#modalFeatures li {
    padding: 0.5rem 0;
    border-bottom: 1px solid #f0f0f0;
    display: flex;
    align-items: center;
}

#modalFeatures li:last-child {
    border-bottom: none;
}

#modalFeatures li::before {
    content: "✓";
    color: #ff5f00;
    margin-right: 1rem;
    background: rgba(255,95,0,0.1);
    width: 24px;
    height: 24px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

#closeModal:hover {
    color: #ff5f00;
}

@media (max-width: 992px) {
    .contact-wrapper {
        grid-template-columns: 1fr;
    }
    
    .custom-service-content {
        padding: 2rem;
    }
}

@media (max-width: 768px) {
    .services-hero h1 {
        font-size: 2.5rem;
    }
    
    .custom-service > .container > div {
        grid-template-columns: 1fr;
    }
    
    .process-steps {
        gap: 1rem;
    }
    
    .hero-buttons, .cta-buttons {
        flex-direction: column;
    }
    
    .service-benefits {
        gap: 1rem;
    }
    
    #quoteForm .form-group,
    #quoteForm div[style*="display: grid"] {
        grid-template-columns: 1fr;
    }
    
    .modal-price-duration {
        flex-direction: column;
        gap: 1rem;
    }
    
    .modal-price-box, .modal-duration-box {
        width: 100%;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get modal elements
    const modal = document.getElementById('serviceModal');
    const closeBtn = document.getElementById('closeModal');
    const modalTitle = document.getElementById('modalTitle');
    const modalPrice = document.getElementById('modalPrice');
    const modalDuration = document.getElementById('modalDuration');
    const modalDescription = document.getElementById('modalDescription');
    const modalFeatures = document.getElementById('modalFeatures');
    const modalContactBtn = document.getElementById('modalContactBtn');
    
    // Get all detail buttons
    const detailButtons = document.querySelectorAll('.service-details-btn');
    
    // Add click event to all detail buttons
    detailButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Get data from button attributes
            const service = this.getAttribute('data-service');
            const description = this.getAttribute('data-description');
            const price = this.getAttribute('data-price');
            const duration = this.getAttribute('data-duration');
            const features = this.getAttribute('data-features').split('|');
            
            // Populate modal with data
            modalTitle.textContent = service;
            modalPrice.textContent = price;
            modalDuration.textContent = duration;
            modalDescription.textContent = description;
            
            // Clear existing features
            modalFeatures.innerHTML = '';
            
            // Add features to modal
            features.forEach(feature => {
                if (feature.trim() !== '') {
                    const li = document.createElement('li');
                    li.textContent = feature.trim();
                    modalFeatures.appendChild(li);
                }
            });
            
            // Update contact button
            modalContactBtn.setAttribute('data-service', service);
            
            // Show modal
            modal.classList.add('show');
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        });
    });
    
    // Close modal when clicking close button
    closeBtn.addEventListener('click', function() {
        modal.classList.remove('show');
        document.body.style.overflow = ''; // Restore scrolling
    });
    
    // Close modal when clicking outside
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.classList.remove('show');
            document.body.style.overflow = ''; // Restore scrolling
        }
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('show')) {
            modal.classList.remove('show');
            document.body.style.overflow = ''; // Restore scrolling
        }
    });
    
    // Handle the contact button in modal
    modalContactBtn.addEventListener('click', function() {
        const service = this.getAttribute('data-service');
        const serviceSelect = document.getElementById('service');
        
        // Close the modal
        modal.classList.remove('show');
        document.body.style.overflow = '';
        
        // Scroll to contact form
        document.getElementById('contact').scrollIntoView({ behavior: 'smooth' });
        
        // Pre-select the service if possible
        if (serviceSelect) {
            // Find the closest match
            let selectedIndex = 0;
            for (let i = 0; i < serviceSelect.options.length; i++) {
                if (serviceSelect.options[i].text.includes(service)) {
                    selectedIndex = i;
                    break;
                }
            }
            serviceSelect.selectedIndex = selectedIndex;
        }
        
        // Focus on the name field
        setTimeout(() => {
            document.getElementById('name').focus();
        }, 800);
    });
});
</script>

<?php get_footer(); ?>
