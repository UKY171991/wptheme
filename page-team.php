<?php
/*
Template Name: Team Page
*/
get_header(); ?>

<div class="team-page">
    <!-- Modern Hero Section -->
    <section class="modern-hero">
        <div class="hero-background"></div>
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge">
                    <span class="badge-icon">👥</span>
                    Meet Our Professional Team
                </div>
                
                <h1 class="hero-title">
                    Our Expert Team
                    <span class="title-highlight">Dedicated Professionals</span>
                </h1>
                
                <p class="hero-description">
                    The passionate professionals behind our exceptional services. Each team member brings 
                    expertise, dedication, and a commitment to exceeding your expectations.
                </p>
                
                <div class="hero-buttons">
                    <a href="#team-members" class="btn-primary">Meet the Team</a>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('careers'))); ?>" class="btn-secondary">Join Our Team</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Culture Section -->
    <section class="team-culture section-padding">
        <div class="container">
            <div class="section-header text-center">
                <h2>Our Culture & Values</h2>
                <p>At the heart of our organization is a commitment to excellence, integrity, and customer satisfaction. We believe that a strong team culture is the foundation of exceptional service.</p>
            </div>
            
            <div class="grid-2-1 items-center gap-xl">
                <div class="culture-text">
                    <p class="text-lg mb-lg">Our team members are carefully selected not only for their professional skills but also for their dedication to our core values. We foster an environment where everyone can thrive and contribute to our collective success.</p>
                    
                    <div class="values-grid grid-2 gap-md mt-xl">
                        <div class="value-card text-center">
                            <div class="value-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <h4>Excellence</h4>
                            <p>We strive for excellence in everything we do</p>
                        </div>
                        
                        <div class="value-card text-center">
                            <div class="value-icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <h4>Integrity</h4>
                            <p>Honesty and transparency in all interactions</p>
                        </div>
                        
                        <div class="value-card text-center">
                            <div class="value-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <h4>Teamwork</h4>
                            <p>Collaborative approach to achieve common goals</p>
                        </div>
                        
                        <div class="value-card text-center">
                            <div class="value-icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            <h4>Compassion</h4>
                            <p>Genuine care for our clients and their needs</p>
                        </div>
                    </div>
                </div>
                
                <div class="culture-image" style="flex: 1; min-width: 300px;">
                    <div style="position: relative; border-radius: 20px; overflow: hidden; box-shadow: 0 15px 30px rgba(0,0,0,0.1);">
                        <img src="<?php echo esc_url(get_theme_mod('team_culture_image', get_template_directory_uri() . '/images/team/team-culture.jpg')); ?>" alt="Team Culture" style="width: 100%; height: auto; display: block;">
                        <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0,0,0,0.7)); padding: 2rem; color: white;">
                            <h3 style="font-size: 1.8rem; margin-bottom: 0.5rem;">We grow together</h3>
                            <p style="opacity: 0.9; font-size: 1rem;">Our team building activities foster collaboration and innovation</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Leadership Team Section -->
    <section class="leadership-team" style="padding: 5rem 0; background: #f8f9fa;">
        <div class="container">
            <header style="text-align: center; margin-bottom: 4rem;">
                <h2 style="font-size: 2.5rem; color: #333; margin-bottom: 1rem;">Leadership Team</h2>
                <p style="color: #666; max-width: 700px; margin: 0 auto;">Meet the visionaries who guide our organization, setting standards of excellence and fostering innovation.</p>
            </header>
            
            <div class="leadership-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2.5rem;">
                <!-- Leadership Member 1 -->
                <div class="leader-card" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                    <div class="leader-image" style="height: 300px; overflow: hidden;">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/team/leader1.jpg" alt="John Davis" style="width: 100%; height: 100%; object-fit: cover; transition: all 0.3s ease;">
                    </div>
                    <div class="leader-info" style="padding: 2rem;">
                        <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #333;">John Davis</h3>
                        <p class="leader-position" style="color: #ff5f00; font-weight: 600; margin-bottom: 1rem;">Chief Executive Officer</p>
                        <p class="leader-bio" style="color: #666; line-height: 1.7; margin-bottom: 1.5rem;">With over 20 years of experience in the service industry, John leads our company with a vision for excellence and innovation.</p>
                        <div class="leader-social" style="display: flex; gap: 1rem;">
                            <a href="#" style="color: #666; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fab fa-linkedin"></i></a>
                            <a href="#" style="color: #666; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fab fa-twitter"></i></a>
                            <a href="#" style="color: #666; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
                
                <!-- Leadership Member 2 -->
                <div class="leader-card" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                    <div class="leader-image" style="height: 300px; overflow: hidden;">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/team/leader2.jpg" alt="Sarah Johnson" style="width: 100%; height: 100%; object-fit: cover; transition: all 0.3s ease;">
                    </div>
                    <div class="leader-info" style="padding: 2rem;">
                        <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #333;">Sarah Johnson</h3>
                        <p class="leader-position" style="color: #ff5f00; font-weight: 600; margin-bottom: 1rem;">Chief Operations Officer</p>
                        <p class="leader-bio" style="color: #666; line-height: 1.7; margin-bottom: 1.5rem;">Sarah ensures that our operations run smoothly and efficiently, maintaining our high standards of service quality.</p>
                        <div class="leader-social" style="display: flex; gap: 1rem;">
                            <a href="#" style="color: #666; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fab fa-linkedin"></i></a>
                            <a href="#" style="color: #666; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fab fa-twitter"></i></a>
                            <a href="#" style="color: #666; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
                
                <!-- Leadership Member 3 -->
                <div class="leader-card" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                    <div class="leader-image" style="height: 300px; overflow: hidden;">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/team/leader3.jpg" alt="Michael Chen" style="width: 100%; height: 100%; object-fit: cover; transition: all 0.3s ease;">
                    </div>
                    <div class="leader-info" style="padding: 2rem;">
                        <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #333;">Michael Chen</h3>
                        <p class="leader-position" style="color: #ff5f00; font-weight: 600; margin-bottom: 1rem;">Chief Technology Officer</p>
                        <p class="leader-bio" style="color: #666; line-height: 1.7; margin-bottom: 1.5rem;">Michael leads our technology initiatives, implementing innovative solutions to enhance service delivery and customer experience.</p>
                        <div class="leader-social" style="display: flex; gap: 1rem;">
                            <a href="#" style="color: #666; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fab fa-linkedin"></i></a>
                            <a href="#" style="color: #666; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fab fa-twitter"></i></a>
                            <a href="#" style="color: #666; font-size: 1.2rem; transition: all 0.3s ease;"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Department Tabs -->
    <section class="department-tabs" style="padding: 5rem 0; background: white;">
        <div class="container">
            <header style="text-align: center; margin-bottom: 4rem;">
                <h2 style="font-size: 2.5rem; color: #333; margin-bottom: 1rem;">Our Departments</h2>
                <p style="color: #666; max-width: 700px; margin: 0 auto;">Each department brings specialized expertise to deliver exceptional service experiences.</p>
            </header>
            
            <div class="tabs-container">
                <!-- Tabs Navigation -->
                <div class="tabs-nav" style="display: flex; flex-wrap: wrap; gap: 0.5rem; justify-content: center; margin-bottom: 2rem;">
                    <button class="tab-btn active" data-tab="cleaning" style="padding: 1rem 2rem; background: #ff5f00; color: white; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Cleaning Services</button>
                    <button class="tab-btn" data-tab="handyman" style="padding: 1rem 2rem; background: #f8f9fa; color: #666; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Handyman Team</button>
                    <button class="tab-btn" data-tab="lawn" style="padding: 1rem 2rem; background: #f8f9fa; color: #666; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Lawn & Garden</button>
                    <button class="tab-btn" data-tab="pet" style="padding: 1rem 2rem; background: #f8f9fa; color: #666; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Pet Services</button>
                    <button class="tab-btn" data-tab="customer" style="padding: 1rem 2rem; background: #f8f9fa; color: #666; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Customer Support</button>
                </div>
                
                <!-- Tabs Content -->
                <div class="tabs-content" style="background: #f8f9fa; border-radius: 15px; overflow: hidden;">
                    <!-- Cleaning Services Tab -->
                    <div class="tab-panel active" id="cleaning" style="padding: 3rem;">
                        <div style="display: flex; flex-wrap: wrap; gap: 3rem; align-items: center;">
                            <div style="flex: 1; min-width: 300px;">
                                <h3 style="font-size: 2rem; color: #333; margin-bottom: 1.5rem;">Cleaning Services Department</h3>
                                <p style="color: #666; line-height: 1.8; margin-bottom: 1.5rem;">Our cleaning specialists are trained in the latest techniques and use eco-friendly products to deliver spotless results for homes and businesses.</p>
                                <ul style="padding-left: 1.5rem; margin-bottom: 2rem; color: #666; line-height: 1.8;">
                                    <li>Certified cleaning professionals</li>
                                    <li>Specialized in residential and commercial cleaning</li>
                                    <li>Eco-friendly cleaning solutions</li>
                                    <li>Customized cleaning plans</li>
                                </ul>
                                <div style="display: flex; gap: 1rem;">
                                    <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-user-tie" style="color: #ff5f00; margin-right: 0.5rem;"></i> 15 Team Members</span>
                                    <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-certificate" style="color: #ff5f00; margin-right: 0.5rem;"></i> Certified</span>
                                    <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-clock" style="color: #ff5f00; margin-right: 0.5rem;"></i> 24/7 Available</span>
                                </div>
                            </div>
                            <div style="flex: 1; min-width: 300px;">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/team/cleaning-team.jpg" alt="Cleaning Team" style="width: 100%; border-radius: 10px; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                            </div>
                        </div>
                        
                        <div class="team-members" style="margin-top: 3rem;">
                            <h4 style="font-size: 1.5rem; color: #333; margin-bottom: 1.5rem;">Meet Some Team Members</h4>
                            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1.5rem;">
                                <!-- Team Member 1 -->
                                <div class="team-member" style="text-align: center;">
                                    <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem;">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/team/team1.jpg" alt="Team Member" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                    <h5 style="font-size: 1.1rem; margin-bottom: 0.25rem; color: #333;">Emma Wilson</h5>
                                    <p style="color: #666; font-size: 0.9rem;">Senior Cleaning Specialist</p>
                                </div>
                                
                                <!-- Team Member 2 -->
                                <div class="team-member" style="text-align: center;">
                                    <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem;">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/team/team2.jpg" alt="Team Member" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                    <h5 style="font-size: 1.1rem; margin-bottom: 0.25rem; color: #333;">Daniel Rodriguez</h5>
                                    <p style="color: #666; font-size: 0.9rem;">Commercial Cleaning Lead</p>
                                </div>
                                
                                <!-- Team Member 3 -->
                                <div class="team-member" style="text-align: center;">
                                    <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem;">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/team/team3.jpg" alt="Team Member" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                    <h5 style="font-size: 1.1rem; margin-bottom: 0.25rem; color: #333;">Sophia Lee</h5>
                                    <p style="color: #666; font-size: 0.9rem;">Eco-Cleaning Specialist</p>
                                </div>
                                
                                <!-- Team Member 4 -->
                                <div class="team-member" style="text-align: center;">
                                    <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem;">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/team/team4.jpg" alt="Team Member" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                    <h5 style="font-size: 1.1rem; margin-bottom: 0.25rem; color: #333;">James Smith</h5>
                                    <p style="color: #666; font-size: 0.9rem;">Deep Cleaning Expert</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Handyman Team Tab -->
                    <div class="tab-panel" id="handyman" style="padding: 3rem; display: none;">
                        <div style="display: flex; flex-wrap: wrap; gap: 3rem; align-items: center;">
                            <div style="flex: 1; min-width: 300px;">
                                <h3 style="font-size: 2rem; color: #333; margin-bottom: 1.5rem;">Handyman Services Team</h3>
                                <p style="color: #666; line-height: 1.8; margin-bottom: 1.5rem;">Our skilled handymen can tackle any repair or improvement project in your home, from plumbing and electrical work to carpentry and painting.</p>
                                <ul style="padding-left: 1.5rem; margin-bottom: 2rem; color: #666; line-height: 1.8;">
                                    <li>Licensed and insured professionals</li>
                                    <li>Experienced in all home repair categories</li>
                                    <li>Quality workmanship guaranteed</li>
                                    <li>Emergency repair services available</li>
                                </ul>
                                <div style="display: flex; gap: 1rem;">
                                    <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-user-tie" style="color: #ff5f00; margin-right: 0.5rem;"></i> 12 Team Members</span>
                                    <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-certificate" style="color: #ff5f00; margin-right: 0.5rem;"></i> Licensed</span>
                                    <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-clock" style="color: #ff5f00; margin-right: 0.5rem;"></i> Emergency Service</span>
                                </div>
                            </div>
                            <div style="flex: 1; min-width: 300px;">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/team/handyman-team.jpg" alt="Handyman Team" style="width: 100%; border-radius: 10px; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                            </div>
                        </div>
                        
                        <!-- Team members for Handyman department would go here -->
                    </div>
                    
                    <!-- Lawn & Garden Tab -->
                    <div class="tab-panel" id="lawn" style="padding: 3rem; display: none;">
                        <div style="display: flex; flex-wrap: wrap; gap: 3rem; align-items: center;">
                            <div style="flex: 1; min-width: 300px;">
                                <h3 style="font-size: 2rem; color: #333; margin-bottom: 1.5rem;">Lawn & Garden Department</h3>
                                <p style="color: #666; line-height: 1.8; margin-bottom: 1.5rem;">Our lawn care specialists and landscapers create and maintain beautiful outdoor spaces that enhance your property's curb appeal and value.</p>
                                <ul style="padding-left: 1.5rem; margin-bottom: 2rem; color: #666; line-height: 1.8;">
                                    <li>Trained horticulturists and landscapers</li>
                                    <li>Seasonal lawn care programs</li>
                                    <li>Landscape design and installation</li>
                                    <li>Organic and eco-friendly options</li>
                                </ul>
                                <div style="display: flex; gap: 1rem;">
                                    <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-user-tie" style="color: #ff5f00; margin-right: 0.5rem;"></i> 18 Team Members</span>
                                    <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-certificate" style="color: #ff5f00; margin-right: 0.5rem;"></i> Certified</span>
                                    <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-leaf" style="color: #ff5f00; margin-right: 0.5rem;"></i> Eco-Friendly</span>
                                </div>
                            </div>
                            <div style="flex: 1; min-width: 300px;">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/team/lawn-team.jpg" alt="Lawn & Garden Team" style="width: 100%; border-radius: 10px; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                            </div>
                        </div>
                        
                        <!-- Team members for Lawn & Garden department would go here -->
                    </div>
                    
                    <!-- Pet Services Tab -->
                    <div class="tab-panel" id="pet" style="padding: 3rem; display: none;">
                        <div style="display: flex; flex-wrap: wrap; gap: 3rem; align-items: center;">
                            <div style="flex: 1; min-width: 300px;">
                                <h3 style="font-size: 2rem; color: #333; margin-bottom: 1.5rem;">Pet Services Department</h3>
                                <p style="color: #666; line-height: 1.8; margin-bottom: 1.5rem;">Our pet care specialists provide loving attention to your furry friends, from daily walks and feeding to overnight care while you're away.</p>
                                <ul style="padding-left: 1.5rem; margin-bottom: 2rem; color: #666; line-height: 1.8;">
                                    <li>Pet first aid certified caregivers</li>
                                    <li>Customized pet care plans</li>
                                    <li>Daily updates and photos</li>
                                    <li>Specialized care for different species</li>
                                </ul>
                                <div style="display: flex; gap: 1rem;">
                                    <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-user-tie" style="color: #ff5f00; margin-right: 0.5rem;"></i> 10 Team Members</span>
                                    <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-certificate" style="color: #ff5f00; margin-right: 0.5rem;"></i> Certified</span>
                                    <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-paw" style="color: #ff5f00; margin-right: 0.5rem;"></i> Pet First Aid</span>
                                </div>
                            </div>
                            <div style="flex: 1; min-width: 300px;">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/team/pet-team.jpg" alt="Pet Services Team" style="width: 100%; border-radius: 10px; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                            </div>
                        </div>
                        
                        <!-- Team members for Pet Services department would go here -->
                    </div>
                    
                    <!-- Customer Support Tab -->
                    <div class="tab-panel" id="customer" style="padding: 3rem; display: none;">
                        <div style="display: flex; flex-wrap: wrap; gap: 3rem; align-items: center;">
                            <div style="flex: 1; min-width: 300px;">
                                <h3 style="font-size: 2rem; color: #333; margin-bottom: 1.5rem;">Customer Support Team</h3>
                                <p style="color: #666; line-height: 1.8; margin-bottom: 1.5rem;">Our customer support specialists are dedicated to ensuring your complete satisfaction, addressing concerns promptly and professionally.</p>
                                <ul style="padding-left: 1.5rem; margin-bottom: 2rem; color: #666; line-height: 1.8;">
                                    <li>24/7 support availability</li>
                                    <li>Multilingual support specialists</li>
                                    <li>Problem resolution experts</li>
                                    <li>Continuous improvement focus</li>
                                </ul>
                                <div style="display: flex; gap: 1rem;">
                                    <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-user-tie" style="color: #ff5f00; margin-right: 0.5rem;"></i> 8 Team Members</span>
                                    <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-headset" style="color: #ff5f00; margin-right: 0.5rem;"></i> 24/7 Support</span>
                                    <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-language" style="color: #ff5f00; margin-right: 0.5rem;"></i> Multilingual</span>
                                </div>
                            </div>
                            <div style="flex: 1; min-width: 300px;">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/team/support-team.jpg" alt="Customer Support Team" style="width: 100%; border-radius: 10px; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                            </div>
                        </div>
                        
                        <!-- Team members for Customer Support department would go here -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Join Our Team CTA -->
    <section class="join-team" style="padding: 5rem 0; background: linear-gradient(135deg, #ff5f00 0%, #ff8c00 100%); color: white; text-align: center;">
        <div class="container">
            <h2 style="font-size: 2.5rem; margin-bottom: 1.5rem;">Join Our Team</h2>
            <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto 2rem; opacity: 0.9;">Are you passionate about helping others and delivering exceptional service? We're always looking for talented individuals to join our growing team.</p>
            <div style="display: flex; flex-wrap: wrap; gap: 1rem; justify-content: center; margin-bottom: 2rem;">
                <div style="background: rgba(255,255,255,0.2); padding: 1.5rem; border-radius: 10px; flex: 1; min-width: 200px; max-width: 250px;">
                    <i class="fas fa-heart" style="font-size: 2.5rem; margin-bottom: 1rem;"></i>
                    <h4 style="margin-bottom: 0.5rem; font-size: 1.2rem;">Meaningful Work</h4>
                    <p style="font-size: 0.9rem; opacity: 0.9;">Make a positive impact in people's lives every day</p>
                </div>
                
                <div style="background: rgba(255,255,255,0.2); padding: 1.5rem; border-radius: 10px; flex: 1; min-width: 200px; max-width: 250px;">
                    <i class="fas fa-users" style="font-size: 2.5rem; margin-bottom: 1rem;"></i>
                    <h4 style="margin-bottom: 0.5rem; font-size: 1.2rem;">Great Culture</h4>
                    <p style="font-size: 0.9rem; opacity: 0.9;">Join a supportive team that values your contributions</p>
                </div>
                
                <div style="background: rgba(255,255,255,0.2); padding: 1.5rem; border-radius: 10px; flex: 1; min-width: 200px; max-width: 250px;">
                    <i class="fas fa-chart-line" style="font-size: 2.5rem; margin-bottom: 1rem;"></i>
                    <h4 style="margin-bottom: 0.5rem; font-size: 1.2rem;">Growth Opportunities</h4>
                    <p style="font-size: 0.9rem; opacity: 0.9;">Develop your skills and advance your career with us</p>
                </div>
                
                <div style="background: rgba(255,255,255,0.2); padding: 1.5rem; border-radius: 10px; flex: 1; min-width: 200px; max-width: 250px;">
                    <i class="fas fa-gift" style="font-size: 2.5rem; margin-bottom: 1rem;"></i>
                    <h4 style="margin-bottom: 0.5rem; font-size: 1.2rem;">Competitive Benefits</h4>
                    <p style="font-size: 0.9rem; opacity: 0.9;">Enjoy comprehensive benefits and competitive pay</p>
                </div>
            </div>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('careers'))); ?>" class="join-btn" style="display: inline-block; background: white; color: #ff5f00; padding: 1rem 2.5rem; font-weight: 600; border-radius: 50px; text-decoration: none; transition: all 0.3s ease;">View Open Positions</a>
        </div>
    </section>
</div>

<style>
.value-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    background: white;
}

.leader-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 30px rgba(0,0,0,0.1);
}

.leader-card:hover .leader-image img {
    transform: scale(1.05);
}

.leader-social a:hover {
    color: #ff5f00;
    transform: translateY(-3px);
}

.tab-btn:hover,
.tab-btn.active {
    background: #ff5f00;
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(255, 95, 0, 0.2);
}

.join-btn:hover {
    background: rgba(255,255,255,0.9);
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(255, 255, 255, 0.3);
}

@media (max-width: 768px) {
    .team-hero h1 {
        font-size: 2.5rem;
    }
    
    .culture-content {
        gap: 2rem;
    }
    
    .values-grid {
        grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
    }
    
    .tab-btn {
        width: 100%;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Department Tabs
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabPanels = document.querySelectorAll('.tab-panel');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Update active button
            tabButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Get selected tab
            const selectedTab = this.getAttribute('data-tab');
            
            // Show selected tab panel
            tabPanels.forEach(panel => {
                if (panel.id === selectedTab) {
                    panel.style.display = 'block';
                } else {
                    panel.style.display = 'none';
                }
            });
        });
    });
});
</script>

<?php get_footer(); ?>
