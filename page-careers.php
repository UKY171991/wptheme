<?php
/*
Template Name: Careers Page
*/
get_header(); ?>

<div class="careers-page">
    <!-- Modern Hero Section -->
    <section class="modern-hero">
        <div class="hero-background"></div>
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge">
                    <span class="badge-icon">💼</span>
                    Build Your Career With Us
                </div>
                
                <h1 class="hero-title">
                    Join Our Team
                    <span class="title-highlight">Excellence & Innovation</span>
                </h1>
                
                <p class="hero-description">
                    Build your career with a company that values excellence, integrity, and innovation. 
                    Discover opportunities to grow, learn, and make a meaningful impact.
                </p>
                
                <div class="hero-buttons">
                    <a href="#open-positions" class="btn-primary">View Open Positions</a>
                    <a href="#benefits" class="btn-secondary">Learn About Benefits</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Join Us Section -->
    <section id="benefits" class="why-join-us section-padding bg-light">
        <div class="container">
            <div class="section-header text-center">
                <h2>Why Join Our Team?</h2>
                <p>Discover the benefits of building your career with us and the values that drive our success.</p>
            </div>
            
            <div class="benefits-grid grid-2 gap-lg">
                <!-- Benefit 1 -->
                <div class="benefit-card card text-center">
                    <div class="benefit-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>Competitive Benefits</h3>
                    <p>We offer comprehensive health, dental, and vision insurance, along with paid time off, retirement plans, and professional development opportunities.</p>
                </div>
                
                <!-- Benefit 2 -->
                <div class="benefit-card card text-center">
                    <div class="benefit-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Growth Opportunities</h3>
                    <p>We believe in promoting from within and providing clear career paths for advancement. Your success is our success.</p>
                </div>
                
                <!-- Benefit 3 -->
                <div class="benefit-card card text-center">
                    <div class="benefit-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Supportive Culture</h3>
                    <p>Join a collaborative team that celebrates diversity, encourages innovation, and supports work-life balance.</p>
                </div>
                
                <!-- Benefit 4 -->
                <div class="benefit-card card text-center">
                    <div class="benefit-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <h3>Recognition Programs</h3>
                    <p style="color: #666; line-height: 1.7;">We celebrate achievements through employee recognition programs, performance bonuses, and career milestone celebrations.</p>
                </div>
                
                <!-- Benefit 5 -->
                <div class="benefit-card" style="background: #f8f9fa; padding: 2.5rem; border-radius: 15px; transition: all 0.3s ease; text-align: center;">
                    <div class="benefit-icon" style="font-size: 3rem; color: #ff5f00; margin-bottom: 1.5rem;"><i class="fas fa-graduation-cap"></i></div>
                    <h3 style="font-size: 1.5rem; margin-bottom: 1rem; color: #333;">Training & Development</h3>
                    <p style="color: #666; line-height: 1.7;">Continuous learning is part of our culture, with access to professional certifications, skills training, and educational assistance.</p>
                </div>
                
                <!-- Benefit 6 -->
                <div class="benefit-card" style="background: #f8f9fa; padding: 2.5rem; border-radius: 15px; transition: all 0.3s ease; text-align: center;">
                    <div class="benefit-icon" style="font-size: 3rem; color: #ff5f00; margin-bottom: 1.5rem;"><i class="fas fa-hands-helping"></i></div>
                    <h3 style="font-size: 1.5rem; margin-bottom: 1rem; color: #333;">Community Impact</h3>
                    <p style="color: #666; line-height: 1.7;">Make a difference in the communities we serve through volunteer opportunities and our corporate social responsibility initiatives.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Employee Testimonials -->
    <section class="employee-testimonials" style="padding: 5rem 0; background: #f8f9fa;">
        <div class="container">
            <header style="text-align: center; margin-bottom: 4rem;">
                <h2 style="font-size: 2.5rem; color: #333; margin-bottom: 1rem;">Hear From Our Team</h2>
                <p style="color: #666; max-width: 700px; margin: 0 auto;">Discover what our employees love about working with us.</p>
            </header>
            
            <div class="testimonial-slider" style="position: relative; max-width: 900px; margin: 0 auto;">
                <div class="testimonial-slides" style="display: flex; overflow: hidden;">
                    <!-- Testimonial 1 -->
                    <div class="testimonial-slide active" style="min-width: 100%; padding: 2rem; display: flex; flex-direction: column; align-items: center; text-align: center;">
                        <div class="employee-image" style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; margin-bottom: 2rem; border: 5px solid #ff5f00;">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/careers/employee1.jpg" alt="Employee Testimonial" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <p class="testimonial-quote" style="font-size: 1.2rem; font-style: italic; color: #666; line-height: 1.8; margin-bottom: 2rem; max-width: 800px;">"I've been with the company for over 5 years, and what keeps me here is the incredible team spirit and growth opportunities. I started as a service technician and have advanced to a team lead position with the support of great mentors and training programs."</p>
                        <div class="employee-info">
                            <h4 style="font-size: 1.2rem; margin-bottom: 0.5rem; color: #333;">David Martinez</h4>
                            <p style="color: #ff5f00; font-weight: 600;">Service Team Lead</p>
                            <p style="color: #999; font-size: 0.9rem;">With us since 2018</p>
                        </div>
                    </div>
                    
                    <!-- Testimonial 2 -->
                    <div class="testimonial-slide" style="min-width: 100%; padding: 2rem; display: none; flex-direction: column; align-items: center; text-align: center;">
                        <div class="employee-image" style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; margin-bottom: 2rem; border: 5px solid #ff5f00;">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/careers/employee2.jpg" alt="Employee Testimonial" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <p class="testimonial-quote" style="font-size: 1.2rem; font-style: italic; color: #666; line-height: 1.8; margin-bottom: 2rem; max-width: 800px;">"The work-life balance here is unmatched. As a parent, I appreciate the flexible scheduling and the understanding that family comes first. Beyond that, the skills I've developed and the supportive colleagues make every day enjoyable."</p>
                        <div class="employee-info">
                            <h4 style="font-size: 1.2rem; margin-bottom: 0.5rem; color: #333;">Jessica Kim</h4>
                            <p style="color: #ff5f00; font-weight: 600;">Customer Support Manager</p>
                            <p style="color: #999; font-size: 0.9rem;">With us since 2020</p>
                        </div>
                    </div>
                    
                    <!-- Testimonial 3 -->
                    <div class="testimonial-slide" style="min-width: 100%; padding: 2rem; display: none; flex-direction: column; align-items: center; text-align: center;">
                        <div class="employee-image" style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; margin-bottom: 2rem; border: 5px solid #ff5f00;">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/careers/employee3.jpg" alt="Employee Testimonial" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <p class="testimonial-quote" style="font-size: 1.2rem; font-style: italic; color: #666; line-height: 1.8; margin-bottom: 2rem; max-width: 800px;">"As someone new to the industry, I was worried about the learning curve. The comprehensive training program and mentorship opportunities have been incredible. Everyone is willing to help you succeed, and there's a real sense of camaraderie."</p>
                        <div class="employee-info">
                            <h4 style="font-size: 1.2rem; margin-bottom: 0.5rem; color: #333;">Michael Johnson</h4>
                            <p style="color: #ff5f00; font-weight: 600;">Landscaping Specialist</p>
                            <p style="color: #999; font-size: 0.9rem;">With us since 2022</p>
                        </div>
                    </div>
                </div>
                
                <!-- Slider Controls -->
                <div class="slider-controls" style="display: flex; justify-content: center; gap: 1rem; margin-top: 2rem;">
                    <button class="slider-dot active" data-slide="0" style="width: 12px; height: 12px; border-radius: 50%; background: #ff5f00; border: none; cursor: pointer; transition: all 0.3s ease;"></button>
                    <button class="slider-dot" data-slide="1" style="width: 12px; height: 12px; border-radius: 50%; background: #ddd; border: none; cursor: pointer; transition: all 0.3s ease;"></button>
                    <button class="slider-dot" data-slide="2" style="width: 12px; height: 12px; border-radius: 50%; background: #ddd; border: none; cursor: pointer; transition: all 0.3s ease;"></button>
                </div>
                
                <button class="slider-arrow prev" style="position: absolute; top: 50%; left: -30px; transform: translateY(-50%); background: white; border: none; width: 50px; height: 50px; border-radius: 50%; box-shadow: 0 5px 15px rgba(0,0,0,0.1); font-size: 1.5rem; color: #666; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;"><i class="fas fa-chevron-left"></i></button>
                <button class="slider-arrow next" style="position: absolute; top: 50%; right: -30px; transform: translateY(-50%); background: white; border: none; width: 50px; height: 50px; border-radius: 50%; box-shadow: 0 5px 15px rgba(0,0,0,0.1); font-size: 1.5rem; color: #666; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </section>

    <!-- Company Culture Video -->
    <section class="culture-video" style="padding: 5rem 0; background: white; text-align: center;">
        <div class="container">
            <header style="margin-bottom: 3rem;">
                <h2 style="font-size: 2.5rem; color: #333; margin-bottom: 1rem;">Experience Our Culture</h2>
                <p style="color: #666; max-width: 700px; margin: 0 auto;">Take a glimpse into our company culture and see what makes our team special.</p>
            </header>
            
            <div class="video-container" style="max-width: 900px; margin: 0 auto; position: relative; border-radius: 15px; overflow: hidden; box-shadow: 0 15px 30px rgba(0,0,0,0.1);">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/careers/video-placeholder.jpg" alt="Company Culture Video" style="width: 100%; height: auto; display: block;">
                <div class="video-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.3); display: flex; align-items: center; justify-content: center;">
                    <button class="play-btn" style="background: #ff5f00; color: white; width: 80px; height: 80px; border-radius: 50%; border: none; display: flex; align-items: center; justify-content: center; font-size: 2rem; cursor: pointer; transition: all 0.3s ease;"><i class="fas fa-play"></i></button>
                </div>
            </div>
        </div>
    </section>

    <!-- Open Positions -->
    <section id="open-positions" class="open-positions" style="padding: 5rem 0; background: #f8f9fa;">
        <div class="container">
            <header style="text-align: center; margin-bottom: 4rem;">
                <h2 style="font-size: 2.5rem; color: #333; margin-bottom: 1rem;">Open Positions</h2>
                <p style="color: #666; max-width: 700px; margin: 0 auto;">Explore our current job openings and find the perfect fit for your skills and career goals.</p>
            </header>
            
            <div class="positions-filter" style="display: flex; flex-wrap: wrap; gap: 1rem; justify-content: center; margin-bottom: 3rem;">
                <button class="filter-btn active" data-filter="all" style="padding: 0.75rem 1.5rem; background: #ff5f00; color: white; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">All Departments</button>
                <button class="filter-btn" data-filter="cleaning" style="padding: 0.75rem 1.5rem; background: white; color: #666; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Cleaning Services</button>
                <button class="filter-btn" data-filter="repair" style="padding: 0.75rem 1.5rem; background: white; color: #666; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Home Repair</button>
                <button class="filter-btn" data-filter="landscaping" style="padding: 0.75rem 1.5rem; background: white; color: #666; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Landscaping</button>
                <button class="filter-btn" data-filter="office" style="padding: 0.75rem 1.5rem; background: white; color: #666; border: none; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Office & Support</button>
            </div>
            
            <div class="positions-list">
                <!-- Position 1 -->
                <div class="position-card" data-department="cleaning" style="background: white; border-radius: 15px; padding: 2rem; margin-bottom: 2rem; box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                    <div style="display: flex; justify-content: space-between; flex-wrap: wrap; margin-bottom: 1.5rem;">
                        <div>
                            <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #333;">Senior Cleaning Specialist</h3>
                            <div style="display: flex; flex-wrap: wrap; gap: 1rem; margin-top: 0.5rem;">
                                <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-map-marker-alt" style="color: #ff5f00; margin-right: 0.5rem;"></i> Boston, MA</span>
                                <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-briefcase" style="color: #ff5f00; margin-right: 0.5rem;"></i> Full-time</span>
                                <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-dollar-sign" style="color: #ff5f00; margin-right: 0.5rem;"></i> Competitive Salary</span>
                            </div>
                        </div>
                        <div class="department-badge" style="background: #f8f9fa; color: #666; padding: 0.5rem 1rem; border-radius: 30px; font-size: 0.8rem; font-weight: 600; height: fit-content;">Cleaning Services</div>
                    </div>
                    
                    <p style="color: #666; line-height: 1.7; margin-bottom: 2rem;">We're looking for an experienced cleaning specialist to join our growing team. In this role, you'll lead residential and commercial cleaning projects, train junior staff, and ensure the highest quality standards are maintained.</p>
                    
                    <div style="display: flex; flex-wrap: wrap; gap: 1.5rem; margin-bottom: 2rem;">
                        <div style="flex: 1; min-width: 250px;">
                            <h4 style="font-size: 1.1rem; margin-bottom: 1rem; color: #333;">Responsibilities:</h4>
                            <ul style="padding-left: 1.5rem; color: #666; line-height: 1.7;">
                                <li>Lead cleaning teams on residential and commercial projects</li>
                                <li>Train and mentor junior cleaning staff</li>
                                <li>Ensure all quality standards and safety protocols are followed</li>
                                <li>Communicate with clients to ensure satisfaction</li>
                                <li>Maintain inventory of cleaning supplies and equipment</li>
                            </ul>
                        </div>
                        
                        <div style="flex: 1; min-width: 250px;">
                            <h4 style="font-size: 1.1rem; margin-bottom: 1rem; color: #333;">Qualifications:</h4>
                            <ul style="padding-left: 1.5rem; color: #666; line-height: 1.7;">
                                <li>3+ years of professional cleaning experience</li>
                                <li>Knowledge of cleaning chemicals, supplies, and equipment</li>
                                <li>Experience with specialized cleaning techniques</li>
                                <li>Strong communication and leadership skills</li>
                                <li>Valid driver's license with clean record</li>
                            </ul>
                        </div>
                    </div>
                    
                    <a href="#apply-form" class="apply-btn" style="display: inline-block; background: #ff5f00; color: white; padding: 0.75rem 1.5rem; font-weight: 600; border-radius: 30px; text-decoration: none; transition: all 0.3s ease;">Apply Now</a>
                </div>
                
                <!-- Position 2 -->
                <div class="position-card" data-department="repair" style="background: white; border-radius: 15px; padding: 2rem; margin-bottom: 2rem; box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                    <div style="display: flex; justify-content: space-between; flex-wrap: wrap; margin-bottom: 1.5rem;">
                        <div>
                            <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #333;">Handyman Technician</h3>
                            <div style="display: flex; flex-wrap: wrap; gap: 1rem; margin-top: 0.5rem;">
                                <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-map-marker-alt" style="color: #ff5f00; margin-right: 0.5rem;"></i> Chicago, IL</span>
                                <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-briefcase" style="color: #ff5f00; margin-right: 0.5rem;"></i> Full-time</span>
                                <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-dollar-sign" style="color: #ff5f00; margin-right: 0.5rem;"></i> $25-30/hour</span>
                            </div>
                        </div>
                        <div class="department-badge" style="background: #f8f9fa; color: #666; padding: 0.5rem 1rem; border-radius: 30px; font-size: 0.8rem; font-weight: 600; height: fit-content;">Home Repair</div>
                    </div>
                    
                    <p style="color: #666; line-height: 1.7; margin-bottom: 2rem;">We're seeking skilled handyman technicians to perform a variety of home repair and maintenance tasks. You'll be the go-to person for solving our customers' home repair needs with expertise and professionalism.</p>
                    
                    <div style="display: flex; flex-wrap: wrap; gap: 1.5rem; margin-bottom: 2rem;">
                        <div style="flex: 1; min-width: 250px;">
                            <h4 style="font-size: 1.1rem; margin-bottom: 1rem; color: #333;">Responsibilities:</h4>
                            <ul style="padding-left: 1.5rem; color: #666; line-height: 1.7;">
                                <li>Perform various home repair and maintenance tasks</li>
                                <li>Diagnose and troubleshoot mechanical, electrical, and plumbing issues</li>
                                <li>Install fixtures, appliances, and home improvements</li>
                                <li>Provide accurate time and material estimates</li>
                                <li>Maintain a clean and safe work environment</li>
                            </ul>
                        </div>
                        
                        <div style="flex: 1; min-width: 250px;">
                            <h4 style="font-size: 1.1rem; margin-bottom: 1rem; color: #333;">Qualifications:</h4>
                            <ul style="padding-left: 1.5rem; color: #666; line-height: 1.7;">
                                <li>2+ years of handyman or maintenance experience</li>
                                <li>Knowledge of basic electrical, plumbing, and carpentry</li>
                                <li>Ability to use various hand and power tools</li>
                                <li>Problem-solving skills and attention to detail</li>
                                <li>Valid driver's license and reliable transportation</li>
                            </ul>
                        </div>
                    </div>
                    
                    <a href="#apply-form" class="apply-btn" style="display: inline-block; background: #ff5f00; color: white; padding: 0.75rem 1.5rem; font-weight: 600; border-radius: 30px; text-decoration: none; transition: all 0.3s ease;">Apply Now</a>
                </div>
                
                <!-- Position 3 -->
                <div class="position-card" data-department="landscaping" style="background: white; border-radius: 15px; padding: 2rem; margin-bottom: 2rem; box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                    <div style="display: flex; justify-content: space-between; flex-wrap: wrap; margin-bottom: 1.5rem;">
                        <div>
                            <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #333;">Landscape Designer</h3>
                            <div style="display: flex; flex-wrap: wrap; gap: 1rem; margin-top: 0.5rem;">
                                <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-map-marker-alt" style="color: #ff5f00; margin-right: 0.5rem;"></i> Denver, CO</span>
                                <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-briefcase" style="color: #ff5f00; margin-right: 0.5rem;"></i> Full-time</span>
                                <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-dollar-sign" style="color: #ff5f00; margin-right: 0.5rem;"></i> $55,000-70,000/year</span>
                            </div>
                        </div>
                        <div class="department-badge" style="background: #f8f9fa; color: #666; padding: 0.5rem 1rem; border-radius: 30px; font-size: 0.8rem; font-weight: 600; height: fit-content;">Landscaping</div>
                    </div>
                    
                    <p style="color: #666; line-height: 1.7; margin-bottom: 2rem;">We're looking for a creative landscape designer to create beautiful outdoor spaces for our clients. You'll work closely with clients to understand their vision and transform their outdoor areas into functional and aesthetic landscapes.</p>
                    
                    <div style="display: flex; flex-wrap: wrap; gap: 1.5rem; margin-bottom: 2rem;">
                        <div style="flex: 1; min-width: 250px;">
                            <h4 style="font-size: 1.1rem; margin-bottom: 1rem; color: #333;">Responsibilities:</h4>
                            <ul style="padding-left: 1.5rem; color: #666; line-height: 1.7;">
                                <li>Create landscape designs for residential and commercial clients</li>
                                <li>Conduct site analyses and develop concept plans</li>
                                <li>Select appropriate plants, materials, and hardscape elements</li>
                                <li>Prepare detailed drawings and specifications</li>
                                <li>Collaborate with installation teams to ensure proper execution</li>
                            </ul>
                        </div>
                        
                        <div style="flex: 1; min-width: 250px;">
                            <h4 style="font-size: 1.1rem; margin-bottom: 1rem; color: #333;">Qualifications:</h4>
                            <ul style="padding-left: 1.5rem; color: #666; line-height: 1.7;">
                                <li>Bachelor's degree in Landscape Architecture or related field</li>
                                <li>2+ years of landscape design experience</li>
                                <li>Proficiency in CAD and design software</li>
                                <li>Knowledge of plants, irrigation, and hardscape materials</li>
                                <li>Strong communication and presentation skills</li>
                            </ul>
                        </div>
                    </div>
                    
                    <a href="#apply-form" class="apply-btn" style="display: inline-block; background: #ff5f00; color: white; padding: 0.75rem 1.5rem; font-weight: 600; border-radius: 30px; text-decoration: none; transition: all 0.3s ease;">Apply Now</a>
                </div>
                
                <!-- Position 4 -->
                <div class="position-card" data-department="office" style="background: white; border-radius: 15px; padding: 2rem; margin-bottom: 2rem; box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                    <div style="display: flex; justify-content: space-between; flex-wrap: wrap; margin-bottom: 1.5rem;">
                        <div>
                            <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem; color: #333;">Customer Service Representative</h3>
                            <div style="display: flex; flex-wrap: wrap; gap: 1rem; margin-top: 0.5rem;">
                                <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-map-marker-alt" style="color: #ff5f00; margin-right: 0.5rem;"></i> Remote</span>
                                <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-briefcase" style="color: #ff5f00; margin-right: 0.5rem;"></i> Full-time/Part-time</span>
                                <span style="display: flex; align-items: center; color: #666; font-size: 0.9rem;"><i class="fas fa-dollar-sign" style="color: #ff5f00; margin-right: 0.5rem;"></i> $18-22/hour</span>
                            </div>
                        </div>
                        <div class="department-badge" style="background: #f8f9fa; color: #666; padding: 0.5rem 1rem; border-radius: 30px; font-size: 0.8rem; font-weight: 600; height: fit-content;">Office & Support</div>
                    </div>
                    
                    <p style="color: #666; line-height: 1.7; margin-bottom: 2rem;">We're seeking customer-focused individuals to join our customer service team. You'll be the first point of contact for our clients, handling inquiries, scheduling appointments, and ensuring customer satisfaction.</p>
                    
                    <div style="display: flex; flex-wrap: wrap; gap: 1.5rem; margin-bottom: 2rem;">
                        <div style="flex: 1; min-width: 250px;">
                            <h4 style="font-size: 1.1rem; margin-bottom: 1rem; color: #333;">Responsibilities:</h4>
                            <ul style="padding-left: 1.5rem; color: #666; line-height: 1.7;">
                                <li>Answer phone calls and respond to email inquiries</li>
                                <li>Schedule service appointments and follow up with customers</li>
                                <li>Process service requests and work orders</li>
                                <li>Resolve customer concerns and escalate issues when necessary</li>
                                <li>Maintain accurate customer records in our CRM system</li>
                            </ul>
                        </div>
                        
                        <div style="flex: 1; min-width: 250px;">
                            <h4 style="font-size: 1.1rem; margin-bottom: 1rem; color: #333;">Qualifications:</h4>
                            <ul style="padding-left: 1.5rem; color: #666; line-height: 1.7;">
                                <li>1+ years of customer service experience</li>
                                <li>Excellent communication and interpersonal skills</li>
                                <li>Proficiency with computers and office software</li>
                                <li>Ability to multitask and prioritize effectively</li>
                                <li>Patient and solution-oriented attitude</li>
                            </ul>
                        </div>
                    </div>
                    
                    <a href="#apply-form" class="apply-btn" style="display: inline-block; background: #ff5f00; color: white; padding: 0.75rem 1.5rem; font-weight: 600; border-radius: 30px; text-decoration: none; transition: all 0.3s ease;">Apply Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Application Form -->
    <section id="apply-form" class="application-form" style="padding: 5rem 0; background: white;">
        <div class="container">
            <header style="text-align: center; margin-bottom: 4rem;">
                <h2 style="font-size: 2.5rem; color: #333; margin-bottom: 1rem;">Apply Now</h2>
                <p style="color: #666; max-width: 700px; margin: 0 auto;">Take the first step toward joining our team by submitting your application below.</p>
            </header>
            
            <div class="form-container" style="max-width: 900px; margin: 0 auto; background: #f8f9fa; padding: 3rem; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                <form id="careerForm" style="display: grid; gap: 1.5rem;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                        <div class="form-group" style="position: relative;">
                            <label for="firstName" style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 500;">First Name</label>
                            <input type="text" id="firstName" name="firstName" required style="width: 100%; padding: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; background-color: white; transition: all 0.3s ease;">
                        </div>
                        
                        <div class="form-group" style="position: relative;">
                            <label for="lastName" style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 500;">Last Name</label>
                            <input type="text" id="lastName" name="lastName" required style="width: 100%; padding: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; background-color: white; transition: all 0.3s ease;">
                        </div>
                    </div>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                        <div class="form-group" style="position: relative;">
                            <label for="email" style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 500;">Email Address</label>
                            <input type="email" id="email" name="email" required style="width: 100%; padding: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; background-color: white; transition: all 0.3s ease;">
                        </div>
                        
                        <div class="form-group" style="position: relative;">
                            <label for="phone" style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 500;">Phone Number</label>
                            <input type="tel" id="phone" name="phone" required style="width: 100%; padding: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; background-color: white; transition: all 0.3s ease;">
                        </div>
                    </div>
                    
                    <div class="form-group" style="position: relative;">
                        <label for="position" style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 500;">Position Applying For</label>
                        <select id="position" name="position" required style="width: 100%; padding: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; background-color: white; appearance: none; transition: all 0.3s ease;">
                            <option value="">Select a Position</option>
                            <option value="Senior Cleaning Specialist">Senior Cleaning Specialist</option>
                            <option value="Handyman Technician">Handyman Technician</option>
                            <option value="Landscape Designer">Landscape Designer</option>
                            <option value="Customer Service Representative">Customer Service Representative</option>
                            <option value="Other">Other Position</option>
                        </select>
                        <i class="fas fa-chevron-down" style="position: absolute; right: 1rem; bottom: 1rem; color: #999; pointer-events: none;"></i>
                    </div>
                    
                    <div class="form-group" style="position: relative;">
                        <label for="resume" style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 500;">Upload Resume (PDF or Word)</label>
                        <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required style="width: 100%; padding: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; background-color: white; transition: all 0.3s ease;">
                    </div>
                    
                    <div class="form-group" style="position: relative;">
                        <label for="cover" style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 500;">Cover Letter or Additional Information</label>
                        <textarea id="cover" name="cover" rows="5" style="width: 100%; padding: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; background-color: white; resize: vertical; transition: all 0.3s ease;"></textarea>
                    </div>
                    
                    <div class="form-group" style="position: relative;">
                        <label style="display: block; margin-bottom: 0.5rem; color: #333; font-weight: 500;">Availability</label>
                        <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                                <input type="checkbox" name="availability[]" value="Full-time" style="width: 18px; height: 18px; accent-color: #ff5f00;">
                                <span style="color: #666;">Full-time</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                                <input type="checkbox" name="availability[]" value="Part-time" style="width: 18px; height: 18px; accent-color: #ff5f00;">
                                <span style="color: #666;">Part-time</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                                <input type="checkbox" name="availability[]" value="Weekends" style="width: 18px; height: 18px; accent-color: #ff5f00;">
                                <span style="color: #666;">Weekends</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                                <input type="checkbox" name="availability[]" value="Evenings" style="width: 18px; height: 18px; accent-color: #ff5f00;">
                                <span style="color: #666;">Evenings</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group" style="display: flex; align-items: center; gap: 0.5rem;">
                        <input type="checkbox" id="consent" name="consent" required style="width: 20px; height: 20px; accent-color: #ff5f00;">
                        <label for="consent" style="margin: 0; color: #666;">I consent to having my data processed for recruitment purposes and confirm all information provided is accurate.</label>
                    </div>
                    
                    <button type="submit" style="background: #ff5f00; color: white; padding: 1rem; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">Submit Application</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Hiring Process -->
    <section class="hiring-process" style="padding: 5rem 0; background: #f8f9fa;">
        <div class="container">
            <header style="text-align: center; margin-bottom: 4rem;">
                <h2 style="font-size: 2.5rem; color: #333; margin-bottom: 1rem;">Our Hiring Process</h2>
                <p style="color: #666; max-width: 700px; margin: 0 auto;">Here's what to expect when you apply to join our team.</p>
            </header>
            
            <div class="process-timeline" style="max-width: 900px; margin: 0 auto; position: relative;">
                <!-- Timeline Line -->
                <div class="timeline-line" style="position: absolute; top: 0; bottom: 0; left: 50%; width: 4px; background: #ff5f00; transform: translateX(-50%);"></div>
                
                <!-- Step 1 -->
                <div class="timeline-item" style="display: flex; margin-bottom: 3rem; position: relative;">
                    <div class="timeline-content right" style="width: 45%; padding-right: 2rem; text-align: right; margin-left: auto;">
                        <h3 style="font-size: 1.5rem; margin-bottom: 1rem; color: #333;">1. Application</h3>
                        <p style="color: #666; line-height: 1.7;">Submit your application through our online form with your resume and cover letter. We review all applications carefully.</p>
                    </div>
                    <div class="timeline-dot" style="position: absolute; top: 0; left: 50%; width: 20px; height: 20px; background: #ff5f00; border-radius: 50%; transform: translateX(-50%); z-index: 2;"></div>
                </div>
                
                <!-- Step 2 -->
                <div class="timeline-item" style="display: flex; margin-bottom: 3rem; position: relative;">
                    <div class="timeline-content left" style="width: 45%; padding-left: 2rem;">
                        <h3 style="font-size: 1.5rem; margin-bottom: 1rem; color: #333;">2. Initial Screening</h3>
                        <p style="color: #666; line-height: 1.7;">Our HR team will review your application and conduct a brief phone interview to discuss your experience and the role.</p>
                    </div>
                    <div class="timeline-dot" style="position: absolute; top: 0; left: 50%; width: 20px; height: 20px; background: #ff5f00; border-radius: 50%; transform: translateX(-50%); z-index: 2;"></div>
                </div>
                
                <!-- Step 3 -->
                <div class="timeline-item" style="display: flex; margin-bottom: 3rem; position: relative;">
                    <div class="timeline-content right" style="width: 45%; padding-right: 2rem; text-align: right; margin-left: auto;">
                        <h3 style="font-size: 1.5rem; margin-bottom: 1rem; color: #333;">3. Interview</h3>
                        <p style="color: #666; line-height: 1.7;">Qualified candidates will be invited for an in-person or video interview with the hiring manager and team members.</p>
                    </div>
                    <div class="timeline-dot" style="position: absolute; top: 0; left: 50%; width: 20px; height: 20px; background: #ff5f00; border-radius: 50%; transform: translateX(-50%); z-index: 2;"></div>
                </div>
                
                <!-- Step 4 -->
                <div class="timeline-item" style="display: flex; margin-bottom: 3rem; position: relative;">
                    <div class="timeline-content left" style="width: 45%; padding-left: 2rem;">
                        <h3 style="font-size: 1.5rem; margin-bottom: 1rem; color: #333;">4. Skills Assessment</h3>
                        <p style="color: #666; line-height: 1.7;">Depending on the role, you may be asked to complete a skills assessment or practical demonstration of your abilities.</p>
                    </div>
                    <div class="timeline-dot" style="position: absolute; top: 0; left: 50%; width: 20px; height: 20px; background: #ff5f00; border-radius: 50%; transform: translateX(-50%); z-index: 2;"></div>
                </div>
                
                <!-- Step 5 -->
                <div class="timeline-item" style="display: flex; position: relative;">
                    <div class="timeline-content right" style="width: 45%; padding-right: 2rem; text-align: right; margin-left: auto;">
                        <h3 style="font-size: 1.5rem; margin-bottom: 1rem; color: #333;">5. Offer & Onboarding</h3>
                        <p style="color: #666; line-height: 1.7;">Successful candidates will receive a job offer, followed by a comprehensive onboarding program to set you up for success.</p>
                    </div>
                    <div class="timeline-dot" style="position: absolute; top: 0; left: 50%; width: 20px; height: 20px; background: #ff5f00; border-radius: 50%; transform: translateX(-50%); z-index: 2;"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.hero-btn:hover {
    background: #e55600;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(255, 95, 0, 0.3);
}

.benefit-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    background: white;
}

.slider-arrow:hover {
    background: #ff5f00;
    color: white;
    transform: translateY(-50%) scale(1.1);
}

.slider-dot:hover,
.slider-dot.active {
    background: #ff5f00;
    transform: scale(1.2);
}

.play-btn:hover {
    background: #e55600;
    transform: scale(1.1);
    box-shadow: 0 5px 15px rgba(255, 95, 0, 0.3);
}

.filter-btn:hover,
.filter-btn.active {
    background: #ff5f00;
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(255, 95, 0, 0.2);
}

.position-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
}

.apply-btn:hover {
    background: #e55600;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(255, 95, 0, 0.3);
}

#careerForm input:focus,
#careerForm select:focus,
#careerForm textarea:focus {
    outline: none;
    border-color: #ff5f00;
    box-shadow: 0 0 0 3px rgba(255, 95, 0, 0.1);
}

#careerForm input:hover,
#careerForm select:hover,
#careerForm textarea:hover {
    border-color: #ddd;
}

#careerForm button:hover {
    background: #e55600;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(255, 95, 0, 0.3);
}

@media (max-width: 992px) {
    .timeline-item {
        flex-direction: column;
    }
    
    .timeline-content.left,
    .timeline-content.right {
        width: 100%;
        text-align: left;
        padding: 0 0 0 2rem;
        margin-left: 0;
    }
    
    .timeline-line {
        left: 10px;
    }
    
    .timeline-dot {
        left: 10px;
    }
}

@media (max-width: 768px) {
    .careers-hero h1 {
        font-size: 2.5rem;
    }
    
    .benefits-grid {
        grid-template-columns: 1fr;
    }
    
    .slider-arrow {
        display: none;
    }
    
    .form-container {
        padding: 1.5rem;
    }
    
    #careerForm > div {
        grid-template-columns: 1fr !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Testimonial Slider
    const slides = document.querySelectorAll('.testimonial-slide');
    const dots = document.querySelectorAll('.slider-dot');
    const prevBtn = document.querySelector('.slider-arrow.prev');
    const nextBtn = document.querySelector('.slider-arrow.next');
    let currentSlide = 0;
    
    function showSlide(n) {
        // Hide all slides
        slides.forEach(slide => {
            slide.style.display = 'none';
        });
        
        // Remove active class from all dots
        dots.forEach(dot => {
            dot.classList.remove('active');
        });
        
        // Show current slide and activate current dot
        slides[n].style.display = 'flex';
        dots[n].classList.add('active');
    }
    
    // Next/previous controls
    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }
    
    function prevSlide() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    }
    
    // Event listeners
    if (nextBtn) nextBtn.addEventListener('click', nextSlide);
    if (prevBtn) prevBtn.addEventListener('click', prevSlide);
    
    dots.forEach((dot, index) => {
        dot.addEventListener('click', function() {
            currentSlide = index;
            showSlide(currentSlide);
        });
    });
    
    // Position Filtering
    const filterButtons = document.querySelectorAll('.filter-btn');
    const positionCards = document.querySelectorAll('.position-card');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Get selected filter
            const selectedFilter = this.getAttribute('data-filter');
            
            // Filter positions
            positionCards.forEach(card => {
                if (selectedFilter === 'all' || card.getAttribute('data-department') === selectedFilter) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
    
    // Video Play Button
    const playBtn = document.querySelector('.play-btn');
    const videoContainer = document.querySelector('.video-container');
    
    if (playBtn) {
        playBtn.addEventListener('click', function() {
            // This would typically replace the image with an embedded video
            // For demonstration, we'll just show an alert
            alert('Video player would start here in a real implementation');
        });
    }
    
    // Form Submission
    const careerForm = document.getElementById('careerForm');
    
    if (careerForm) {
        careerForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Here you would typically send the form data to the server
            // For demonstration, we'll just show an alert
            alert('Thank you for your application! Our team will review your information and contact you soon.');
            
            // Reset form
            careerForm.reset();
        });
    }
});
</script>

<?php get_footer(); ?>
