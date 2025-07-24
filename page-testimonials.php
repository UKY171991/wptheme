<?php
/*
Template Name: Testimonials Page
*/
get_header(); ?>

<div class="testimonials-page">
    <!-- Hero Section -->
    <section class="testimonials-hero" style="background: linear-gradient(rgba(11, 17, 51, 0.8), rgba(11, 17, 51, 0.9)), url('data:image/svg+xml,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 1200 400\' fill=\'%23ff5f00\'><circle cx=\'200\' cy=\'100\' r=\'20\' opacity=\'0.2\'/><circle cx=\'400\' cy=\'200\' r=\'15\' opacity=\'0.15\'/><circle cx=\'800\' cy=\'150\' r=\'25\' opacity=\'0.1\'/><circle cx=\'1000\' cy=\'250\' r=\'18\' opacity=\'0.25\'/></svg>'); padding: 4rem 0; text-align: center; color: white;">
        <div class="container">
            <h1 style="font-size: 3.5rem; margin-bottom: 1.5rem; font-weight: 700;">Customer Testimonials</h1>
            <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto 2rem; opacity: 0.9;">See what our satisfied customers have to say about our services</p>
        </div>
    </section>

    <!-- Testimonial Stats -->
    <section class="testimonial-stats" style="padding: 3rem 0; background: white;">
        <div class="container">
            <div class="stats-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; text-align: center;">
                <div class="stat-item" style="padding: 2rem; background: #f8f9fa; border-radius: 10px; transition: all 0.3s ease;">
                    <div class="stat-icon" style="font-size: 2.5rem; color: #ff5f00; margin-bottom: 1rem;"><i class="fas fa-star"></i></div>
                    <div class="stat-number" style="font-size: 2.5rem; font-weight: 700; margin-bottom: 0.5rem; color: #333;"><?php echo esc_html(get_theme_mod('testimonial_stats_rating', '4.9')); ?></div>
                    <div class="stat-label" style="color: #666;">Average Rating</div>
                </div>
                
                <div class="stat-item" style="padding: 2rem; background: #f8f9fa; border-radius: 10px; transition: all 0.3s ease;">
                    <div class="stat-icon" style="font-size: 2.5rem; color: #ff5f00; margin-bottom: 1rem;"><i class="fas fa-users"></i></div>
                    <div class="stat-number" style="font-size: 2.5rem; font-weight: 700; margin-bottom: 0.5rem; color: #333;"><?php echo esc_html(get_theme_mod('testimonial_stats_customers', '500+')); ?></div>
                    <div class="stat-label" style="color: #666;">Happy Customers</div>
                </div>
                
                <div class="stat-item" style="padding: 2rem; background: #f8f9fa; border-radius: 10px; transition: all 0.3s ease;">
                    <div class="stat-icon" style="font-size: 2.5rem; color: #ff5f00; margin-bottom: 1rem;"><i class="fas fa-check-circle"></i></div>
                    <div class="stat-number" style="font-size: 2.5rem; font-weight: 700; margin-bottom: 0.5rem; color: #333;"><?php echo esc_html(get_theme_mod('testimonial_stats_satisfaction', '99%')); ?></div>
                    <div class="stat-label" style="color: #666;">Satisfaction Rate</div>
                </div>
                
                <div class="stat-item" style="padding: 2rem; background: #f8f9fa; border-radius: 10px; transition: all 0.3s ease;">
                    <div class="stat-icon" style="font-size: 2.5rem; color: #ff5f00; margin-bottom: 1rem;"><i class="fas fa-redo"></i></div>
                    <div class="stat-number" style="font-size: 2.5rem; font-weight: 700; margin-bottom: 0.5rem; color: #333;"><?php echo esc_html(get_theme_mod('testimonial_stats_return', '85%')); ?></div>
                    <div class="stat-label" style="color: #666;">Return Customers</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Filters -->
    <section class="testimonial-filters" style="padding: 2rem 0; background: #f8f9fa;">
        <div class="container">
            <div class="filter-buttons" style="display: flex; flex-wrap: wrap; gap: 1rem; justify-content: center;">
                <button class="filter-btn active" data-filter="all" style="padding: 0.75rem 1.5rem; background: #ff5f00; color: white; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">All Testimonials</button>
                <button class="filter-btn" data-filter="cleaning" style="padding: 0.75rem 1.5rem; background: white; color: #666; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Cleaning Services</button>
                <button class="filter-btn" data-filter="handyman" style="padding: 0.75rem 1.5rem; background: white; color: #666; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Handyman Services</button>
                <button class="filter-btn" data-filter="lawn" style="padding: 0.75rem 1.5rem; background: white; color: #666; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Lawn & Garden</button>
                <button class="filter-btn" data-filter="pet" style="padding: 0.75rem 1.5rem; background: white; color: #666; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Pet Services</button>
            </div>
        </div>
    </section>

    <!-- Testimonials Grid -->
    <section class="testimonials-grid-section" style="padding: 4rem 0 5rem; background: #f8f9fa;">
        <div class="container">
            <div class="testimonials-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem;">
                <!-- Testimonial 1 -->
                <div class="testimonial-card" data-category="cleaning" style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); position: relative; transition: all 0.3s ease;">
                    <div class="quote-icon" style="position: absolute; top: 1rem; right: 1.5rem; font-size: 3rem; color: rgba(255,95,0,0.1); font-family: serif;">"</div>
                    <div class="rating" style="margin-bottom: 1rem; color: #ff5f00;">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text" style="font-style: italic; margin-bottom: 1.5rem; color: #666; line-height: 1.7;">The house cleaning service exceeded all my expectations! The team was professional, thorough, and friendly. My home has never looked better. I've scheduled recurring service and couldn't be happier.</p>
                    <div class="testimonial-author" style="display: flex; align-items: center;">
                        <div class="author-avatar" style="width: 50px; height: 50px; border-radius: 50%; background: #f0f0f0; overflow: hidden; margin-right: 1rem;">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/testimonials/person1.jpg" alt="Sarah Johnson" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="author-info">
                            <h4 style="margin-bottom: 0.25rem; color: #333;">Sarah Johnson</h4>
                            <p style="font-size: 0.9rem; color: #999;">Home Cleaning Customer</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="testimonial-card" data-category="handyman" style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); position: relative; transition: all 0.3s ease;">
                    <div class="quote-icon" style="position: absolute; top: 1rem; right: 1.5rem; font-size: 3rem; color: rgba(255,95,0,0.1); font-family: serif;">"</div>
                    <div class="rating" style="margin-bottom: 1rem; color: #ff5f00;">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text" style="font-style: italic; margin-bottom: 1.5rem; color: #666; line-height: 1.7;">I've used their handyman services multiple times now. Always on time, fairly priced, and the work is excellent. They fixed several issues around my house including plumbing, electrical, and carpentry. They've become my go-to for all home repairs.</p>
                    <div class="testimonial-author" style="display: flex; align-items: center;">
                        <div class="author-avatar" style="width: 50px; height: 50px; border-radius: 50%; background: #f0f0f0; overflow: hidden; margin-right: 1rem;">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/testimonials/person2.jpg" alt="Michael Chen" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="author-info">
                            <h4 style="margin-bottom: 0.25rem; color: #333;">Michael Chen</h4>
                            <p style="font-size: 0.9rem; color: #999;">Handyman Services Customer</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="testimonial-card" data-category="pet" style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); position: relative; transition: all 0.3s ease;">
                    <div class="quote-icon" style="position: absolute; top: 1rem; right: 1.5rem; font-size: 3rem; color: rgba(255,95,0,0.1); font-family: serif;">"</div>
                    <div class="rating" style="margin-bottom: 1rem; color: #ff5f00;">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text" style="font-style: italic; margin-bottom: 1.5rem; color: #666; line-height: 1.7;">Their pet sitting service gave me peace of mind during my vacation. They sent daily updates with photos, and my cats were happy and healthy when I returned home. I will definitely use their services again for my next trip.</p>
                    <div class="testimonial-author" style="display: flex; align-items: center;">
                        <div class="author-avatar" style="width: 50px; height: 50px; border-radius: 50%; background: #f0f0f0; overflow: hidden; margin-right: 1rem;">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/testimonials/person3.jpg" alt="Emily Rodriguez" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="author-info">
                            <h4 style="margin-bottom: 0.25rem; color: #333;">Emily Rodriguez</h4>
                            <p style="font-size: 0.9rem; color: #999;">Pet Services Customer</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 4 -->
                <div class="testimonial-card" data-category="lawn" style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); position: relative; transition: all 0.3s ease;">
                    <div class="quote-icon" style="position: absolute; top: 1rem; right: 1.5rem; font-size: 3rem; color: rgba(255,95,0,0.1); font-family: serif;">"</div>
                    <div class="rating" style="margin-bottom: 1rem; color: #ff5f00;">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="testimonial-text" style="font-style: italic; margin-bottom: 1.5rem; color: #666; line-height: 1.7;">The lawn care team has transformed my yard completely. From regular mowing to seasonal landscaping, they've made my outdoor space beautiful and manageable. Very professional and the attention to detail is impressive.</p>
                    <div class="testimonial-author" style="display: flex; align-items: center;">
                        <div class="author-avatar" style="width: 50px; height: 50px; border-radius: 50%; background: #f0f0f0; overflow: hidden; margin-right: 1rem;">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/testimonials/person4.jpg" alt="David Wilson" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="author-info">
                            <h4 style="margin-bottom: 0.25rem; color: #333;">David Wilson</h4>
                            <p style="font-size: 0.9rem; color: #999;">Lawn Care Customer</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 5 -->
                <div class="testimonial-card" data-category="cleaning" style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); position: relative; transition: all 0.3s ease;">
                    <div class="quote-icon" style="position: absolute; top: 1rem; right: 1.5rem; font-size: 3rem; color: rgba(255,95,0,0.1); font-family: serif;">"</div>
                    <div class="rating" style="margin-bottom: 1rem; color: #ff5f00;">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text" style="font-style: italic; margin-bottom: 1.5rem; color: #666; line-height: 1.7;">I hired them for a deep cleaning before hosting a family gathering, and I was blown away by the results. Every corner was spotless, and they even cleaned areas I hadn't thought to mention. Worth every penny!</p>
                    <div class="testimonial-author" style="display: flex; align-items: center;">
                        <div class="author-avatar" style="width: 50px; height: 50px; border-radius: 50%; background: #f0f0f0; overflow: hidden; margin-right: 1rem;">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/testimonials/person5.jpg" alt="Jennifer Taylor" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="author-info">
                            <h4 style="margin-bottom: 0.25rem; color: #333;">Jennifer Taylor</h4>
                            <p style="font-size: 0.9rem; color: #999;">Deep Cleaning Customer</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 6 -->
                <div class="testimonial-card" data-category="handyman" style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); position: relative; transition: all 0.3s ease;">
                    <div class="quote-icon" style="position: absolute; top: 1rem; right: 1.5rem; font-size: 3rem; color: rgba(255,95,0,0.1); font-family: serif;">"</div>
                    <div class="rating" style="margin-bottom: 1rem; color: #ff5f00;">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text" style="font-style: italic; margin-bottom: 1.5rem; color: #666; line-height: 1.7;">After a storm damaged part of my roof, their emergency repair team came out quickly and fixed the issue before any water damage could occur. Professional, fast, and reasonably priced - I highly recommend their services.</p>
                    <div class="testimonial-author" style="display: flex; align-items: center;">
                        <div class="author-avatar" style="width: 50px; height: 50px; border-radius: 50%; background: #f0f0f0; overflow: hidden; margin-right: 1rem;">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/testimonials/person6.jpg" alt="Robert Brown" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="author-info">
                            <h4 style="margin-bottom: 0.25rem; color: #333;">Robert Brown</h4>
                            <p style="font-size: 0.9rem; color: #999;">Emergency Repair Customer</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 7 -->
                <div class="testimonial-card" data-category="lawn" style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); position: relative; transition: all 0.3s ease;">
                    <div class="quote-icon" style="position: absolute; top: 1rem; right: 1.5rem; font-size: 3rem; color: rgba(255,95,0,0.1); font-family: serif;">"</div>
                    <div class="rating" style="margin-bottom: 1rem; color: #ff5f00;">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text" style="font-style: italic; margin-bottom: 1.5rem; color: #666; line-height: 1.7;">Their landscape design team helped me reimagine my backyard. They took my rough ideas and created a beautiful, functional outdoor space that my family enjoys year-round. The execution was flawless.</p>
                    <div class="testimonial-author" style="display: flex; align-items: center;">
                        <div class="author-avatar" style="width: 50px; height: 50px; border-radius: 50%; background: #f0f0f0; overflow: hidden; margin-right: 1rem;">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/testimonials/person7.jpg" alt="Amanda Lopez" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="author-info">
                            <h4 style="margin-bottom: 0.25rem; color: #333;">Amanda Lopez</h4>
                            <p style="font-size: 0.9rem; color: #999;">Landscaping Customer</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 8 -->
                <div class="testimonial-card" data-category="pet" style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); position: relative; transition: all 0.3s ease;">
                    <div class="quote-icon" style="position: absolute; top: 1rem; right: 1.5rem; font-size: 3rem; color: rgba(255,95,0,0.1); font-family: serif;">"</div>
                    <div class="rating" style="margin-bottom: 1rem; color: #ff5f00;">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text" style="font-style: italic; margin-bottom: 1.5rem; color: #666; line-height: 1.7;">My dog absolutely loves their daily walking service! The pet care specialists are knowledgeable, caring, and always go the extra mile. I've noticed significant improvements in my dog's behavior and happiness.</p>
                    <div class="testimonial-author" style="display: flex; align-items: center;">
                        <div class="author-avatar" style="width: 50px; height: 50px; border-radius: 50%; background: #f0f0f0; overflow: hidden; margin-right: 1rem;">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/testimonials/person8.jpg" alt="Thomas Garcia" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="author-info">
                            <h4 style="margin-bottom: 0.25rem; color: #333;">Thomas Garcia</h4>
                            <p style="font-size: 0.9rem; color: #999;">Dog Walking Customer</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 9 -->
                <div class="testimonial-card" data-category="cleaning" style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); position: relative; transition: all 0.3s ease;">
                    <div class="quote-icon" style="position: absolute; top: 1rem; right: 1.5rem; font-size: 3rem; color: rgba(255,95,0,0.1); font-family: serif;">"</div>
                    <div class="rating" style="margin-bottom: 1rem; color: #ff5f00;">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <p class="testimonial-text" style="font-style: italic; margin-bottom: 1.5rem; color: #666; line-height: 1.7;">As a busy professional, their weekly cleaning service has been a lifesaver. It's wonderful to come home to a clean house after a long day. The team is reliable and consistent with their quality.</p>
                    <div class="testimonial-author" style="display: flex; align-items: center;">
                        <div class="author-avatar" style="width: 50px; height: 50px; border-radius: 50%; background: #f0f0f0; overflow: hidden; margin-right: 1rem;">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/testimonials/person9.jpg" alt="Jessica Kim" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="author-info">
                            <h4 style="margin-bottom: 0.25rem; color: #333;">Jessica Kim</h4>
                            <p style="font-size: 0.9rem; color: #999;">Regular Cleaning Customer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Submit Testimonial Section -->
    <section class="submit-testimonial" style="padding: 5rem 0; background: linear-gradient(135deg, #ff5f00 0%, #ff8c00 100%); color: white; text-align: center;">
        <div class="container">
            <h2 style="font-size: 2.5rem; margin-bottom: 1.5rem;">Share Your Experience</h2>
            <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto 2rem; opacity: 0.9;">We value your feedback! If you've used our services, we'd love to hear about your experience.</p>
            <a href="#testimonial-form" class="submit-btn" style="display: inline-block; background: white; color: #ff5f00; padding: 1rem 2.5rem; font-weight: 600; border-radius: 50px; text-decoration: none; transition: all 0.3s ease;">Submit Your Testimonial</a>
        </div>
    </section>

    <!-- Testimonial Form -->
    <section id="testimonial-form" class="testimonial-form" style="padding: 5rem 0; background: #f8f9fa;">
        <div class="container">
            <header style="text-align: center; margin-bottom: 3rem;">
                <h2 style="font-size: 2.5rem; margin-bottom: 1rem; color: #333;">Submit Your Testimonial</h2>
                <p style="color: #666; max-width: 700px; margin: 0 auto;">Tell us about your experience with our services. Your feedback helps us improve and lets others know what to expect.</p>
            </header>
            
            <div class="form-container" style="max-width: 800px; margin: 0 auto; background: white; padding: 3rem; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                <form id="testimonialForm" style="display: grid; gap: 1.5rem;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                        <div class="form-group" style="position: relative;">
                            <label for="name" style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 500;">Your Name</label>
                            <input type="text" id="name" name="name" required style="width: 100%; padding: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; background-color: #f9f9f9; transition: all 0.3s ease;">
                        </div>
                        
                        <div class="form-group" style="position: relative;">
                            <label for="email" style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 500;">Email Address</label>
                            <input type="email" id="email" name="email" required style="width: 100%; padding: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; background-color: #f9f9f9; transition: all 0.3s ease;">
                        </div>
                    </div>
                    
                    <div class="form-group" style="position: relative;">
                        <label for="service" style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 500;">Service Used</label>
                        <select id="service" name="service" required style="width: 100%; padding: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; background-color: #f9f9f9; appearance: none; transition: all 0.3s ease;">
                            <option value="">Select a Service</option>
                            <option value="cleaning">Home Cleaning</option>
                            <option value="handyman">Handyman Services</option>
                            <option value="lawn">Lawn & Garden</option>
                            <option value="pet">Pet Services</option>
                            <option value="other">Other Services</option>
                        </select>
                        <i class="fas fa-chevron-down" style="position: absolute; right: 1rem; bottom: 1rem; color: #999; pointer-events: none;"></i>
                    </div>
                    
                    <div class="form-group" style="position: relative;">
                        <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 500;">Your Rating</label>
                        <div class="rating-select" style="display: flex; gap: 0.5rem;">
                            <div class="rating-option" style="flex: 1; text-align: center;">
                                <input type="radio" id="star5" name="rating" value="5" checked style="display: none;">
                                <label for="star5" style="display: block; padding: 0.75rem; border: 1px solid #e0e0e0; border-radius: 8px; cursor: pointer; transition: all 0.3s ease;">
                                    <i class="fas fa-star" style="color: #ff5f00; margin-bottom: 0.5rem;"></i>
                                    <span style="display: block; font-size: 0.9rem; color: #333;">5 - Excellent</span>
                                </label>
                            </div>
                            
                            <div class="rating-option" style="flex: 1; text-align: center;">
                                <input type="radio" id="star4" name="rating" value="4" style="display: none;">
                                <label for="star4" style="display: block; padding: 0.75rem; border: 1px solid #e0e0e0; border-radius: 8px; cursor: pointer; transition: all 0.3s ease;">
                                    <i class="fas fa-star" style="color: #ff5f00; margin-bottom: 0.5rem;"></i>
                                    <span style="display: block; font-size: 0.9rem; color: #333;">4 - Very Good</span>
                                </label>
                            </div>
                            
                            <div class="rating-option" style="flex: 1; text-align: center;">
                                <input type="radio" id="star3" name="rating" value="3" style="display: none;">
                                <label for="star3" style="display: block; padding: 0.75rem; border: 1px solid #e0e0e0; border-radius: 8px; cursor: pointer; transition: all 0.3s ease;">
                                    <i class="fas fa-star" style="color: #ff5f00; margin-bottom: 0.5rem;"></i>
                                    <span style="display: block; font-size: 0.9rem; color: #333;">3 - Good</span>
                                </label>
                            </div>
                            
                            <div class="rating-option" style="flex: 1; text-align: center;">
                                <input type="radio" id="star2" name="rating" value="2" style="display: none;">
                                <label for="star2" style="display: block; padding: 0.75rem; border: 1px solid #e0e0e0; border-radius: 8px; cursor: pointer; transition: all 0.3s ease;">
                                    <i class="fas fa-star" style="color: #ff5f00; margin-bottom: 0.5rem;"></i>
                                    <span style="display: block; font-size: 0.9rem; color: #333;">2 - Fair</span>
                                </label>
                            </div>
                            
                            <div class="rating-option" style="flex: 1; text-align: center;">
                                <input type="radio" id="star1" name="rating" value="1" style="display: none;">
                                <label for="star1" style="display: block; padding: 0.75rem; border: 1px solid #e0e0e0; border-radius: 8px; cursor: pointer; transition: all 0.3s ease;">
                                    <i class="fas fa-star" style="color: #ff5f00; margin-bottom: 0.5rem;"></i>
                                    <span style="display: block; font-size: 0.9rem; color: #333;">1 - Poor</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group" style="position: relative;">
                        <label for="testimonial" style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 500;">Your Testimonial</label>
                        <textarea id="testimonial" name="testimonial" rows="5" required style="width: 100%; padding: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; background-color: #f9f9f9; resize: vertical; transition: all 0.3s ease;"></textarea>
                    </div>
                    
                    <div class="form-group" style="display: flex; align-items: center; gap: 0.5rem;">
                        <input type="checkbox" id="consent" name="consent" required style="width: 20px; height: 20px; accent-color: #ff5f00;">
                        <label for="consent" style="margin: 0; color: #666;">I consent to having my testimonial and name displayed on the website.</label>
                    </div>
                    
                    <button type="submit" style="background: #ff5f00; color: white; padding: 1rem; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Submit Testimonial</button>
                </form>
            </div>
        </div>
    </section>
</div>

<style>
.stat-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    background: white;
}

.filter-btn:hover,
.filter-btn.active {
    background: #ff5f00;
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(255, 95, 0, 0.2);
}

.testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15);
}

.submit-btn:hover {
    background: rgba(255,255,255,0.9);
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(255, 255, 255, 0.3);
}

#testimonialForm input:focus,
#testimonialForm select:focus,
#testimonialForm textarea:focus {
    outline: none;
    border-color: #ff5f00;
    box-shadow: 0 0 0 3px rgba(255, 95, 0, 0.1);
    background-color: #fff;
}

#testimonialForm input:hover,
#testimonialForm select:hover,
#testimonialForm textarea:hover {
    border-color: #ddd;
    background-color: #fff;
}

#testimonialForm button:hover {
    background: #e55600;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(255, 95, 0, 0.3);
}

.rating-option label:hover,
.rating-option input:checked + label {
    background: rgba(255,95,0,0.1);
    border-color: #ff5f00;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

@media (max-width: 992px) {
    .rating-select {
        flex-wrap: wrap;
    }
    
    .rating-option {
        flex: 1 0 45%;
        margin-bottom: 0.5rem;
    }
}

@media (max-width: 768px) {
    .testimonials-hero h1 {
        font-size: 2.5rem;
    }
    
    .filter-buttons {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .filter-btn {
        width: 100%;
    }
    
    .form-container {
        padding: 1.5rem;
    }
    
    #testimonialForm > div {
        grid-template-columns: 1fr !important;
    }
    
    .rating-option {
        flex: 1 0 100%;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Testimonial Filtering
    const filterButtons = document.querySelectorAll('.filter-btn');
    const testimonialCards = document.querySelectorAll('.testimonial-card');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Get selected filter
            const selectedFilter = this.getAttribute('data-filter');
            
            // Filter testimonials
            testimonialCards.forEach(card => {
                if (selectedFilter === 'all' || card.getAttribute('data-category') === selectedFilter) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
    
    // Testimonial Form Submission
    const testimonialForm = document.getElementById('testimonialForm');
    
    if (testimonialForm) {
        testimonialForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const service = document.getElementById('service').value;
            const rating = document.querySelector('input[name="rating"]:checked').value;
            const testimonial = document.getElementById('testimonial').value;
            
            // Here you would typically send this data to the server
            // For demo purposes, we'll just show a success message
            alert(`Thank you, ${name}! Your testimonial has been submitted successfully. We appreciate your feedback.`);
            
            // Reset form
            testimonialForm.reset();
        });
    }
});
</script>

<?php get_footer(); ?>
