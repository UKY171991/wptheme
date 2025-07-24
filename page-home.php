<?php
/*
Template Name: Home Page
*/
get_header(); ?>

<div class="home-page">
    <!-- Hero Section -->
    <section class="home-hero" style="background: linear-gradient(to right, rgba(11, 17, 51, 0.95) 0%, rgba(11, 17, 51, 0.8) 100%), url('<?php echo get_template_directory_uri(); ?>/images/hero-bg.jpg') center/cover no-repeat; min-height: 85vh; display: flex; align-items: center; position: relative; overflow: hidden; color: white; text-align: center;">
        <!-- Animated Background Elements -->
        <div class="animated-bg" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1; opacity: 0.2;">
            <div class="circle" style="position: absolute; top: 10%; left: 5%; width: 300px; height: 300px; border-radius: 50%; background: linear-gradient(135deg, #ff5f00 0%, rgba(255,95,0,0.3) 100%); filter: blur(50px); animation: float 15s infinite ease-in-out;"></div>
            <div class="circle" style="position: absolute; bottom: 5%; right: 10%; width: 250px; height: 250px; border-radius: 50%; background: linear-gradient(135deg, #0b1133 0%, rgba(11,17,51,0.3) 100%); filter: blur(40px); animation: float 12s infinite ease-in-out reverse;"></div>
            <div class="circle" style="position: absolute; top: 40%; right: 25%; width: 180px; height: 180px; border-radius: 50%; background: linear-gradient(135deg, #ff8c00 0%, rgba(255,140,0,0.3) 100%); filter: blur(35px); animation: float 20s infinite ease-in-out;"></div>
        </div>
        
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px; position: relative; z-index: 2;">
            <div class="hero-content" style="max-width: 800px; margin: 0 auto;">
                <h1 style="font-size: 4rem; margin-bottom: 1.5rem; font-weight: 800; text-shadow: 0 2px 10px rgba(0,0,0,0.3); line-height: 1.2; animation: fadeInUp 1s ease-out;">
                    Transform Your Home & Life
                </h1>
                <p style="font-size: 1.4rem; max-width: 700px; margin: 0 auto 2.5rem; opacity: 0.9; line-height: 1.6; animation: fadeInUp 1s ease-out 0.3s both;">
                    Professional services designed to make your home pristine, your life simpler, and your time your own again.
                </p>
                
                <div class="hero-buttons" style="display: flex; gap: 1.5rem; justify-content: center; margin-bottom: 3rem; animation: fadeInUp 1s ease-out 0.6s both;">
                    <a href="#featured-services" class="cta-button" style="padding: 1.2rem 2.5rem; font-size: 1.1rem; font-weight: 600; background: linear-gradient(135deg, #ff5f00 0%, #ff8c00 100%); border-radius: 50px; border: none; color: white; text-decoration: none; display: inline-block; transition: all 0.3s ease; box-shadow: 0 10px 25px rgba(255,95,0,0.3); text-transform: uppercase; letter-spacing: 1px;">
                        Explore Services
                    </a>
                    <a href="#contact" class="btn btn-secondary" style="padding: 1.2rem 2.5rem; font-size: 1.1rem; font-weight: 600; background: rgba(255,255,255,0.15); border: 2px solid white; border-radius: 50px; color: white; text-decoration: none; display: inline-block; transition: all 0.3s ease; backdrop-filter: blur(5px);">
                        Get Free Quote
                    </a>
                </div>
                
                <div class="hero-highlights" style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap; animation: fadeInUp 1s ease-out 0.9s both;">
                    <div class="highlight" style="display: flex; align-items: center; background: rgba(255,255,255,0.1); padding: 0.7rem 1.5rem; border-radius: 50px; backdrop-filter: blur(5px);">
                        <span style="margin-right: 0.5rem; font-size: 1.2rem;">✓</span>
                        <span>Licensed & Insured</span>
                    </div>
                    <div class="highlight" style="display: flex; align-items: center; background: rgba(255,255,255,0.1); padding: 0.7rem 1.5rem; border-radius: 50px; backdrop-filter: blur(5px);">
                        <span style="margin-right: 0.5rem; font-size: 1.2rem;">✓</span>
                        <span>100% Satisfaction</span>
                    </div>
                    <div class="highlight" style="display: flex; align-items: center; background: rgba(255,255,255,0.1); padding: 0.7rem 1.5rem; border-radius: 50px; backdrop-filter: blur(5px);">
                        <span style="margin-right: 0.5rem; font-size: 1.2rem;">✓</span>
                        <span>5-Star Rated</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Hero Bottom Wave -->
        <div style="position: absolute; bottom: 0; left: 0; width: 100%; height: 150px; overflow: hidden; line-height: 0; z-index: 2;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" style="position: relative; display: block; width: calc(100% + 1.3px); height: 150px;">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" style="fill: #ffffff;"></path>
            </svg>
        </div>
    </section>

    <!-- Featured Services Section -->
    <section id="featured-services" style="padding: 5rem 0; background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <header class="section-header" style="text-align: center; margin-bottom: 3.5rem;">
                <span class="section-tag" style="display: inline-block; background: rgba(255,95,0,0.1); color: #ff5f00; padding: 0.5rem 1.5rem; border-radius: 50px; font-weight: 600; font-size: 0.9rem; margin-bottom: 1rem; text-transform: uppercase; letter-spacing: 1px;">Our Expertise</span>
                <h2 style="font-size: 2.8rem; margin-bottom: 1rem; color: #333; position: relative; display: inline-block;">
                    Professional Services You Can Trust
                    <span style="position: absolute; bottom: -15px; left: 50%; transform: translateX(-50%); width: 80px; height: 4px; background: linear-gradient(to right, #ff5f00, #ff8c00);"></span>
                </h2>
                <p style="color: #666; max-width: 700px; margin: 2rem auto 0; font-size: 1.1rem; line-height: 1.7;">We deliver exceptional, reliable services tailored to your needs with the highest level of professionalism and attention to detail.</p>
            </header>

            <div class="services-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2.5rem; margin-top: 2rem; position: relative;">
                <!-- Decorative elements -->
                <div style="position: absolute; top: -30px; left: -40px; width: 120px; height: 120px; border-radius: 50%; background: rgba(255,95,0,0.03); z-index: -1;"></div>
                <div style="position: absolute; bottom: 50px; right: -60px; width: 150px; height: 150px; border-radius: 50%; background: rgba(255,95,0,0.05); z-index: -1;"></div>
                
                <!-- Service Card 1 -->
                <div class="service-card" style="background: white; border-radius: 20px; box-shadow: 0 15px 40px rgba(0,0,0,0.08); overflow: hidden; transition: all 0.3s ease; position: relative; display: flex; flex-direction: column; border: 1px solid rgba(0,0,0,0.03);">
                    <div class="service-image" style="height: 200px; background: linear-gradient(rgba(11, 17, 51, 0.7), rgba(11, 17, 51, 0.7)), url('<?php echo get_template_directory_uri(); ?>/images/service-cleaning.jpg') center/cover; position: relative;">
                        <div style="position: absolute; top: 20px; right: 20px; width: 70px; height: 70px; background: #ff5f00; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(255,95,0,0.3);">
                            <i class="fas fa-home" style="color: white; font-size: 1.8rem;"></i>
                        </div>
                        <div class="service-tag" style="position: absolute; top: 20px; left: 0; background: #ff5f00; color: white; font-size: 0.8rem; font-weight: 600; padding: 0.5rem 1.2rem; border-radius: 0 20px 20px 0; box-shadow: 2px 2px 10px rgba(0,0,0,0.1);">
                            Popular Choice
                        </div>
                        <div style="position: absolute; bottom: 0; left: 0; width: 100%; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); padding: 25px 20px; color: white;">
                            <h3 style="font-size: 1.8rem; margin-bottom: 0.5rem; font-weight: 700;">Home Cleaning</h3>
                        </div>
                    </div>
                    <div class="service-content" style="padding: 2.5rem; flex-grow: 1; display: flex; flex-direction: column; position: relative;">
                        <div style="width: 50px; height: 3px; background: #ff5f00; margin-bottom: 1.5rem;"></div>
                        <p style="color: #666; margin-bottom: 1.8rem; line-height: 1.7; font-size: 1.05rem; flex-grow: 1;">
                            From regular maintenance to deep cleaning, we'll keep your home spotless and healthy with our eco-friendly products and professional techniques.
                        </p>
                        <div class="service-features" style="margin-bottom: 2rem; background: rgba(248,249,250,0.7); padding: 1.2rem; border-radius: 10px; border-left: 3px solid #ff5f00;">
                            <div class="feature" style="display: flex; align-items: center; margin-bottom: 0.8rem;">
                                <div style="min-width: 24px; margin-right: 0.8rem; color: #ff5f00;"><i class="fas fa-check-circle"></i></div>
                                <span style="color: #444; font-weight: 500;">Regular & Deep Cleaning</span>
                            </div>
                            <div class="feature" style="display: flex; align-items: center; margin-bottom: 0.8rem;">
                                <div style="min-width: 24px; margin-right: 0.8rem; color: #ff5f00;"><i class="fas fa-check-circle"></i></div>
                                <span style="color: #444; font-weight: 500;">Move-in/Move-out Cleaning</span>
                            </div>
                            <div class="feature" style="display: flex; align-items: center;">
                                <div style="min-width: 24px; margin-right: 0.8rem; color: #ff5f00;"><i class="fas fa-check-circle"></i></div>
                                <span style="color: #444; font-weight: 500;">Eco-friendly Options</span>
                            </div>
                        </div>
                        <a href="/services#cleaning" class="btn" style="background: linear-gradient(135deg, #ff5f00 0%, #ff8c00 100%); color: white; padding: 0.9rem 1.8rem; text-align: center; border-radius: 50px; font-weight: 600; text-decoration: none; display: inline-block; transition: all 0.3s ease; box-shadow: 0 5px 15px rgba(255,95,0,0.2); position: relative; overflow: hidden;">
                            <span style="position: relative; z-index: 2;">Learn More</span>
                            <span style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.2) 50%, rgba(255,255,255,0) 100%); transition: all 0.5s ease; z-index: 1;" class="btn-shine"></span>
                        </a>
                    </div>
                </div>
                
                <!-- Service Card 2 -->
                <div class="service-card" style="background: white; border-radius: 20px; box-shadow: 0 15px 40px rgba(0,0,0,0.08); overflow: hidden; transition: all 0.3s ease; position: relative; display: flex; flex-direction: column; border: 1px solid rgba(0,0,0,0.03);">
                    <div class="service-image" style="height: 200px; background: linear-gradient(rgba(11, 17, 51, 0.7), rgba(11, 17, 51, 0.7)), url('<?php echo get_template_directory_uri(); ?>/images/service-repair.jpg') center/cover; position: relative;">
                        <div style="position: absolute; top: 20px; right: 20px; width: 70px; height: 70px; background: #ff5f00; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(255,95,0,0.3);">
                            <i class="fas fa-tools" style="color: white; font-size: 1.8rem;"></i>
                        </div>
                        <div class="service-tag" style="position: absolute; top: 20px; left: 0; background: #3a86ff; color: white; font-size: 0.8rem; font-weight: 600; padding: 0.5rem 1.2rem; border-radius: 0 20px 20px 0; box-shadow: 2px 2px 10px rgba(0,0,0,0.1);">
                            Highly Rated
                        </div>
                        <div style="position: absolute; bottom: 0; left: 0; width: 100%; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); padding: 25px 20px; color: white;">
                            <h3 style="font-size: 1.8rem; margin-bottom: 0.5rem; font-weight: 700;">Home Repairs</h3>
                        </div>
                    </div>
                    <div class="service-content" style="padding: 2.5rem; flex-grow: 1; display: flex; flex-direction: column; position: relative;">
                        <div style="width: 50px; height: 3px; background: #ff5f00; margin-bottom: 1.5rem;"></div>
                        <p style="color: #666; margin-bottom: 1.8rem; line-height: 1.7; font-size: 1.05rem; flex-grow: 1;">
                            Our skilled technicians can handle all your home repair and maintenance needs, from simple fixes to complex installations and improvements.
                        </p>
                        <div class="service-features" style="margin-bottom: 2rem; background: rgba(248,249,250,0.7); padding: 1.2rem; border-radius: 10px; border-left: 3px solid #ff5f00;">
                            <div class="feature" style="display: flex; align-items: center; margin-bottom: 0.8rem;">
                                <div style="min-width: 24px; margin-right: 0.8rem; color: #ff5f00;"><i class="fas fa-check-circle"></i></div>
                                <span style="color: #444; font-weight: 500;">General Handyman Services</span>
                            </div>
                            <div class="feature" style="display: flex; align-items: center; margin-bottom: 0.8rem;">
                                <div style="min-width: 24px; margin-right: 0.8rem; color: #ff5f00;"><i class="fas fa-check-circle"></i></div>
                                <span style="color: #444; font-weight: 500;">Electrical & Plumbing</span>
                            </div>
                            <div class="feature" style="display: flex; align-items: center;">
                                <div style="min-width: 24px; margin-right: 0.8rem; color: #ff5f00;"><i class="fas fa-check-circle"></i></div>
                                <span style="color: #444; font-weight: 500;">Furniture Assembly</span>
                            </div>
                        </div>
                        <a href="/services#repairs" class="btn" style="background: linear-gradient(135deg, #ff5f00 0%, #ff8c00 100%); color: white; padding: 0.9rem 1.8rem; text-align: center; border-radius: 50px; font-weight: 600; text-decoration: none; display: inline-block; transition: all 0.3s ease; box-shadow: 0 5px 15px rgba(255,95,0,0.2); position: relative; overflow: hidden;">
                            <span style="position: relative; z-index: 2;">Learn More</span>
                            <span style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.2) 50%, rgba(255,255,255,0) 100%); transition: all 0.5s ease; z-index: 1;" class="btn-shine"></span>
                        </a>
                    </div>
                </div>
                
                <!-- Service Card 3 -->
                <div class="service-card" style="background: white; border-radius: 20px; box-shadow: 0 15px 40px rgba(0,0,0,0.08); overflow: hidden; transition: all 0.3s ease; position: relative; display: flex; flex-direction: column; border: 1px solid rgba(0,0,0,0.03);">
                    <div class="service-image" style="height: 200px; background: linear-gradient(rgba(11, 17, 51, 0.7), rgba(11, 17, 51, 0.7)), url('<?php echo get_template_directory_uri(); ?>/images/service-landscaping.jpg') center/cover; position: relative;">
                        <div style="position: absolute; top: 20px; right: 20px; width: 70px; height: 70px; background: #ff5f00; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(255,95,0,0.3);">
                            <i class="fas fa-leaf" style="color: white; font-size: 1.8rem;"></i>
                        </div>
                        <div class="service-tag" style="position: absolute; top: 20px; left: 0; background: #2ecc71; color: white; font-size: 0.8rem; font-weight: 600; padding: 0.5rem 1.2rem; border-radius: 0 20px 20px 0; box-shadow: 2px 2px 10px rgba(0,0,0,0.1);">
                            Eco-Friendly
                        </div>
                        <div style="position: absolute; bottom: 0; left: 0; width: 100%; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); padding: 25px 20px; color: white;">
                            <h3 style="font-size: 1.8rem; margin-bottom: 0.5rem; font-weight: 700;">Landscaping</h3>
                        </div>
                    </div>
                    <div class="service-content" style="padding: 2.5rem; flex-grow: 1; display: flex; flex-direction: column; position: relative;">
                        <div style="width: 50px; height: 3px; background: #ff5f00; margin-bottom: 1.5rem;"></div>
                        <p style="color: #666; margin-bottom: 1.8rem; line-height: 1.7; font-size: 1.05rem; flex-grow: 1;">
                            Create and maintain beautiful outdoor spaces with our landscaping services. From lawn care to complete garden transformations.
                        </p>
                        <div class="service-features" style="margin-bottom: 2rem; background: rgba(248,249,250,0.7); padding: 1.2rem; border-radius: 10px; border-left: 3px solid #ff5f00;">
                            <div class="feature" style="display: flex; align-items: center; margin-bottom: 0.8rem;">
                                <div style="min-width: 24px; margin-right: 0.8rem; color: #ff5f00;"><i class="fas fa-check-circle"></i></div>
                                <span style="color: #444; font-weight: 500;">Lawn Maintenance</span>
                            </div>
                            <div class="feature" style="display: flex; align-items: center; margin-bottom: 0.8rem;">
                                <div style="min-width: 24px; margin-right: 0.8rem; color: #ff5f00;"><i class="fas fa-check-circle"></i></div>
                                <span style="color: #444; font-weight: 500;">Garden Design & Planting</span>
                            </div>
                            <div class="feature" style="display: flex; align-items: center;">
                                <div style="min-width: 24px; margin-right: 0.8rem; color: #ff5f00;"><i class="fas fa-check-circle"></i></div>
                                <span style="color: #444; font-weight: 500;">Irrigation & Lighting</span>
                            </div>
                        </div>
                        <a href="/services#landscaping" class="btn" style="background: linear-gradient(135deg, #ff5f00 0%, #ff8c00 100%); color: white; padding: 0.9rem 1.8rem; text-align: center; border-radius: 50px; font-weight: 600; text-decoration: none; display: inline-block; transition: all 0.3s ease; box-shadow: 0 5px 15px rgba(255,95,0,0.2); position: relative; overflow: hidden;">
                            <span style="position: relative; z-index: 2;">Learn More</span>
                            <span style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.2) 50%, rgba(255,255,255,0) 100%); transition: all 0.5s ease; z-index: 1;" class="btn-shine"></span>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="view-all-services" style="text-align: center; margin-top: 4rem; position: relative; z-index: 2;">
                <a href="/services" class="cta-button" style="padding: 1.2rem 3rem; font-size: 1.1rem; font-weight: 600; display: inline-block; background: linear-gradient(135deg, #ff5f00 0%, #ff8c00 100%); border-radius: 50px; color: white; text-decoration: none; box-shadow: 0 10px 25px rgba(255,95,0,0.3); transition: all 0.3s ease; position: relative; overflow: hidden;">
                    <span style="position: relative; z-index: 2;">View All Services <i class="fas fa-arrow-right" style="margin-left: 0.5rem;"></i></span>
                    <span style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.2) 50%, rgba(255,255,255,0) 100%); transition: all 0.5s ease; z-index: 1;" class="btn-shine"></span>
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-us" style="padding: 6rem 0; background: linear-gradient(to right, #0b1133 0%, #1a265c 100%); color: white; position: relative; overflow: hidden;">
        <!-- Background Elements -->
        <div style="position: absolute; top: -100px; right: -100px; width: 300px; height: 300px; border-radius: 50%; background: rgba(255,95,0,0.1); filter: blur(50px);"></div>
        <div style="position: absolute; bottom: -50px; left: -50px; width: 200px; height: 200px; border-radius: 50%; background: rgba(255,95,0,0.1); filter: blur(40px);"></div>
        
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px; position: relative; z-index: 2;">
            <div class="two-columns" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 4rem; align-items: center;">
                <div class="left-column">
                    <span class="section-tag" style="display: inline-block; background: rgba(255,95,0,0.2); color: #ff8c00; padding: 0.5rem 1.5rem; border-radius: 50px; font-weight: 600; font-size: 0.9rem; margin-bottom: 1rem; text-transform: uppercase; letter-spacing: 1px;">Why Choose Us</span>
                    <h2 style="font-size: 2.8rem; margin-bottom: 1.5rem; color: white; line-height: 1.3;">The Premium Service Experience You Deserve</h2>
                    <p style="color: rgba(255,255,255,0.8); margin-bottom: 2rem; line-height: 1.7; font-size: 1.1rem;">
                        We're not just another service provider. We're your partners in creating a better living environment and freeing up your valuable time. Here's why thousands of customers trust us:
                    </p>
                    
                    <div class="stats-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 2rem; margin-top: 3rem;">
                        <div class="stat-box" style="background: rgba(255,255,255,0.1); padding: 1.5rem; border-radius: 15px; backdrop-filter: blur(10px); text-align: center;">
                            <h3 style="font-size: 3rem; margin-bottom: 0.5rem; color: #ff5f00;">98%</h3>
                            <p style="color: rgba(255,255,255,0.9);">Customer Satisfaction</p>
                        </div>
                        <div class="stat-box" style="background: rgba(255,255,255,0.1); padding: 1.5rem; border-radius: 15px; backdrop-filter: blur(10px); text-align: center;">
                            <h3 style="font-size: 3rem; margin-bottom: 0.5rem; color: #ff5f00;">15+</h3>
                            <p style="color: rgba(255,255,255,0.9);">Years Experience</p>
                        </div>
                        <div class="stat-box" style="background: rgba(255,255,255,0.1); padding: 1.5rem; border-radius: 15px; backdrop-filter: blur(10px); text-align: center;">
                            <h3 style="font-size: 3rem; margin-bottom: 0.5rem; color: #ff5f00;">50+</h3>
                            <p style="color: rgba(255,255,255,0.9);">Professional Staff</p>
                        </div>
                        <div class="stat-box" style="background: rgba(255,255,255,0.1); padding: 1.5rem; border-radius: 15px; backdrop-filter: blur(10px); text-align: center;">
                            <h3 style="font-size: 3rem; margin-bottom: 0.5rem; color: #ff5f00;">5K+</h3>
                            <p style="color: rgba(255,255,255,0.9);">Projects Completed</p>
                        </div>
                    </div>
                </div>
                
                <div class="right-column">
                    <div class="features-grid" style="display: grid; grid-template-columns: 1fr; gap: 1.5rem;">
                        <div class="feature-card" style="background: rgba(255,255,255,0.05); padding: 2rem; border-radius: 15px; border-left: 4px solid #ff5f00; display: flex; transition: all 0.3s ease;">
                            <div style="margin-right: 1.5rem; min-width: 60px; height: 60px; background: rgba(255,95,0,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-certificate" style="color: #ff5f00; font-size: 1.5rem;"></i>
                            </div>
                            <div>
                                <h3 style="font-size: 1.3rem; margin-bottom: 0.7rem; color: white;">Certified Professionals</h3>
                                <p style="color: rgba(255,255,255,0.8); line-height: 1.6;">
                                    Our team consists of licensed, insured, and thoroughly vetted professionals with extensive training and experience.
                                </p>
                            </div>
                        </div>
                        
                        <div class="feature-card" style="background: rgba(255,255,255,0.05); padding: 2rem; border-radius: 15px; border-left: 4px solid #ff5f00; display: flex; transition: all 0.3s ease;">
                            <div style="margin-right: 1.5rem; min-width: 60px; height: 60px; background: rgba(255,95,0,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-shield-alt" style="color: #ff5f00; font-size: 1.5rem;"></i>
                            </div>
                            <div>
                                <h3 style="font-size: 1.3rem; margin-bottom: 0.7rem; color: white;">100% Satisfaction Guarantee</h3>
                                <p style="color: rgba(255,255,255,0.8); line-height: 1.6;">
                                    If you're not completely satisfied with our service, we'll make it right or refund your money.
                                </p>
                            </div>
                        </div>
                        
                        <div class="feature-card" style="background: rgba(255,255,255,0.05); padding: 2rem; border-radius: 15px; border-left: 4px solid #ff5f00; display: flex; transition: all 0.3s ease;">
                            <div style="margin-right: 1.5rem; min-width: 60px; height: 60px; background: rgba(255,95,0,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-tasks" style="color: #ff5f00; font-size: 1.5rem;"></i>
                            </div>
                            <div>
                                <h3 style="font-size: 1.3rem; margin-bottom: 0.7rem; color: white;">Customized Service Plans</h3>
                                <p style="color: rgba(255,255,255,0.8); line-height: 1.6;">
                                    We create personalized service plans to meet your specific needs, schedule, and budget requirements.
                                </p>
                            </div>
                        </div>
                        
                        <div class="feature-card" style="background: rgba(255,255,255,0.05); padding: 2rem; border-radius: 15px; border-left: 4px solid #ff5f00; display: flex; transition: all 0.3s ease;">
                            <div style="margin-right: 1.5rem; min-width: 60px; height: 60px; background: rgba(255,95,0,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-leaf" style="color: #ff5f00; font-size: 1.5rem;"></i>
                            </div>
                            <div>
                                <h3 style="font-size: 1.3rem; margin-bottom: 0.7rem; color: white;">Eco-Friendly Practices</h3>
                                <p style="color: rgba(255,255,255,0.8); line-height: 1.6;">
                                    We're committed to environmentally responsible practices using green products and sustainable methods.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section" style="padding: 6rem 0; background: #f8f9fa; position: relative;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <header class="section-header" style="text-align: center; margin-bottom: 4rem;">
                <span class="section-tag" style="display: inline-block; background: rgba(255,95,0,0.1); color: #ff5f00; padding: 0.5rem 1.5rem; border-radius: 50px; font-weight: 600; font-size: 0.9rem; margin-bottom: 1rem; text-transform: uppercase; letter-spacing: 1px;">Testimonials</span>
                <h2 style="font-size: 2.8rem; margin-bottom: 1rem; color: #333; position: relative; display: inline-block;">
                    What Our Customers Say
                    <span style="position: absolute; bottom: -15px; left: 50%; transform: translateX(-50%); width: 80px; height: 4px; background: linear-gradient(to right, #ff5f00, #ff8c00);"></span>
                </h2>
                <p style="color: #666; max-width: 700px; margin: 2rem auto 0; font-size: 1.1rem; line-height: 1.7;">Hear directly from our customers about their experiences with our services.</p>
            </header>

            <div class="testimonials-wrapper" style="position: relative; padding: 0 50px;">
                <div class="testimonials-slider" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                    <!-- Testimonial 1 -->
                    <div class="testimonial-card" style="background: white; padding: 2.5rem; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); position: relative;">
                        <div class="testimonial-rating" style="margin-bottom: 1.5rem; color: #ff5f00;">
                            ★★★★★
                        </div>
                        <p style="color: #666; font-style: italic; margin-bottom: 1.5rem; line-height: 1.7; font-size: 1.05rem;">
                            "I've been using their cleaning services for over a year now, and I couldn't be happier. The team is always professional, thorough, and friendly. My home has never looked better!"
                        </p>
                        <div class="testimonial-author" style="display: flex; align-items: center;">
                            <div style="width: 60px; height: 60px; border-radius: 50%; background: #f0f0f0; overflow: hidden; margin-right: 1rem;">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-1.jpg" alt="Sarah J." style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div>
                                <h4 style="margin-bottom: 0.2rem; color: #333;">Sarah Johnson</h4>
                                <p style="color: #999; font-size: 0.9rem;">Regular Cleaning Client</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 2 -->
                    <div class="testimonial-card" style="background: white; padding: 2.5rem; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); position: relative;">
                        <div class="testimonial-rating" style="margin-bottom: 1.5rem; color: #ff5f00;">
                            ★★★★★
                        </div>
                        <p style="color: #666; font-style: italic; margin-bottom: 1.5rem; line-height: 1.7; font-size: 1.05rem;">
                            "The handyman services were exceptional. They fixed multiple issues in my home in a single visit - from plumbing to electrical to furniture assembly. Prompt, skilled, and reasonably priced."
                        </p>
                        <div class="testimonial-author" style="display: flex; align-items: center;">
                            <div style="width: 60px; height: 60px; border-radius: 50%; background: #f0f0f0; overflow: hidden; margin-right: 1rem;">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-2.jpg" alt="Michael T." style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div>
                                <h4 style="margin-bottom: 0.2rem; color: #333;">Michael Thompson</h4>
                                <p style="color: #999; font-size: 0.9rem;">Home Repair Client</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 3 -->
                    <div class="testimonial-card" style="background: white; padding: 2.5rem; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); position: relative;">
                        <div class="testimonial-rating" style="margin-bottom: 1.5rem; color: #ff5f00;">
                            ★★★★★
                        </div>
                        <p style="color: #666; font-style: italic; margin-bottom: 1.5rem; line-height: 1.7; font-size: 1.05rem;">
                            "The landscaping team transformed our backyard into an oasis. Their attention to detail and creative design exceeded our expectations. We've received so many compliments from neighbors!"
                        </p>
                        <div class="testimonial-author" style="display: flex; align-items: center;">
                            <div style="width: 60px; height: 60px; border-radius: 50%; background: #f0f0f0; overflow: hidden; margin-right: 1rem;">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-3.jpg" alt="Emily R." style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div>
                                <h4 style="margin-bottom: 0.2rem; color: #333;">Emily Rodriguez</h4>
                                <p style="color: #999; font-size: 0.9rem;">Landscaping Client</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="view-all-testimonials" style="text-align: center; margin-top: 3rem;">
                <a href="/testimonials" class="btn btn-secondary" style="padding: 1rem 2rem; font-size: 1.1rem; font-weight: 600; background: white; border: 2px solid #ddd; color: #333; border-radius: 50px; display: inline-block; transition: all 0.3s ease;">
                    View All Testimonials <i class="fas fa-arrow-right" style="margin-left: 0.5rem;"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" style="padding: 5rem 0; background: linear-gradient(135deg, #ff5f00 0%, #ff8c00 100%); color: white; text-align: center; position: relative; overflow: hidden;">
        <!-- Background Elements -->
        <div style="position: absolute; top: -100px; right: -100px; width: 300px; height: 300px; border-radius: 50%; background: rgba(255,255,255,0.1); filter: blur(50px);"></div>
        <div style="position: absolute; bottom: -50px; left: -50px; width: 200px; height: 200px; border-radius: 50%; background: rgba(255,255,255,0.1); filter: blur(40px);"></div>
        
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px; position: relative; z-index: 2;">
            <div style="max-width: 800px; margin: 0 auto;">
                <h2 style="font-size: 3rem; margin-bottom: 1.5rem; font-weight: 700; text-shadow: 0 2px 10px rgba(0,0,0,0.1);">Ready to Transform Your Home?</h2>
                <p style="font-size: 1.2rem; margin-bottom: 2.5rem; opacity: 0.9;">
                    Get started today with a free consultation and estimate. No obligation, just professional advice.
                </p>
                <div class="cta-buttons" style="display: flex; gap: 1.5rem; justify-content: center; flex-wrap: wrap;">
                    <a href="#contact" class="btn" style="padding: 1.2rem 2.5rem; font-size: 1.1rem; font-weight: 600; background: white; color: #ff5f00; border-radius: 50px; text-decoration: none; display: inline-block; transition: all 0.3s ease; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                        Get Free Estimate
                    </a>
                    <a href="tel:+18005551234" class="btn btn-secondary" style="padding: 1.2rem 2.5rem; font-size: 1.1rem; font-weight: 600; background: rgba(255,255,255,0.2); border: 2px solid white; border-radius: 50px; color: white; text-decoration: none; display: inline-block; transition: all 0.3s ease;">
                        Call (800) 555-1234
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section" style="padding: 6rem 0; background: linear-gradient(135deg, #f8f9fa 0%, #f1f3f5 100%);">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <header class="section-header" style="text-align: center; margin-bottom: 4rem;">
                <span class="section-tag" style="display: inline-block; background: rgba(255,95,0,0.1); color: #ff5f00; padding: 0.5rem 1.5rem; border-radius: 50px; font-weight: 600; font-size: 0.9rem; margin-bottom: 1rem; text-transform: uppercase; letter-spacing: 1px;">Contact Us</span>
                <h2 style="font-size: 2.8rem; margin-bottom: 1rem; color: #333; position: relative; display: inline-block;">
                    Get In Touch With Us
                    <span style="position: absolute; bottom: -15px; left: 50%; transform: translateX(-50%); width: 80px; height: 4px; background: linear-gradient(to right, #ff5f00, #ff8c00);"></span>
                </h2>
                <p style="color: #666; max-width: 700px; margin: 2rem auto 0; font-size: 1.1rem; line-height: 1.7;">Have questions or ready to schedule a service? We're here to help with all your needs.</p>
            </header>

            <div class="contact-wrapper" style="display: grid; grid-template-columns: 1fr 1.5fr; gap: 3rem; align-items: stretch; background: white; border-radius: 20px; box-shadow: 0 15px 50px rgba(0,0,0,0.1); overflow: hidden;">
                <div class="contact-info" style="padding: 3rem; background: linear-gradient(135deg, #0b1133 0%, #1a265c 100%); color: white; position: relative;">
                    <div style="position: relative; z-index: 2;">
                        <h3 style="font-size: 1.8rem; margin-bottom: 1.5rem; color: white; font-weight: 600;">How to Reach Us</h3>
                        <p style="color: rgba(255,255,255,0.9); margin-bottom: 2rem; font-size: 1rem; line-height: 1.7;">
                            Our friendly customer service team is ready to answer your questions and schedule your service.
                        </p>
                        
                        <div class="contact-details">
                            <div style="margin-bottom: 1.5rem; display: flex; align-items: center;">
                                <div style="min-width: 50px; height: 50px; border-radius: 50%; background: rgba(255,95,0,0.2); display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                                    <i class="fas fa-phone-alt" style="color: #ff5f00; font-size: 1.2rem;"></i>
                                </div>
                                <div>
                                    <h4 style="font-size: 1.1rem; margin-bottom: 0.3rem; color: rgba(255,255,255,0.8);">Phone</h4>
                                    <p style="font-size: 1.2rem; font-weight: 600;">(800) 555-1234</p>
                                    <p style="font-size: 0.9rem; color: rgba(255,255,255,0.7);">Mon-Fri: 8am-7pm, Sat: 9am-5pm</p>
                                </div>
                            </div>
                            
                            <div style="margin-bottom: 1.5rem; display: flex; align-items: center;">
                                <div style="min-width: 50px; height: 50px; border-radius: 50%; background: rgba(255,95,0,0.2); display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                                    <i class="fas fa-envelope" style="color: #ff5f00; font-size: 1.2rem;"></i>
                                </div>
                                <div>
                                    <h4 style="font-size: 1.1rem; margin-bottom: 0.3rem; color: rgba(255,255,255,0.8);">Email</h4>
                                    <p style="font-size: 1.2rem; font-weight: 600;">info@yourservices.com</p>
                                    <p style="font-size: 0.9rem; color: rgba(255,255,255,0.7);">We'll respond within 24 hours</p>
                                </div>
                            </div>
                            
                            <div style="display: flex; align-items: center;">
                                <div style="min-width: 50px; height: 50px; border-radius: 50%; background: rgba(255,95,0,0.2); display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                                    <i class="fas fa-map-marker-alt" style="color: #ff5f00; font-size: 1.2rem;"></i>
                                </div>
                                <div>
                                    <h4 style="font-size: 1.1rem; margin-bottom: 0.3rem; color: rgba(255,255,255,0.8);">Location</h4>
                                    <p style="font-size: 1.2rem; font-weight: 600;">123 Service St, Your City</p>
                                    <p style="font-size: 0.9rem; color: rgba(255,255,255,0.7);">Serving the greater metropolitan area</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="social-icons" style="display: flex; gap: 1rem; margin-top: 2.5rem;">
                            <a href="#" style="width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;">
                                <i class="fab fa-facebook-f" style="color: white;"></i>
                            </a>
                            <a href="#" style="width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;">
                                <i class="fab fa-twitter" style="color: white;"></i>
                            </a>
                            <a href="#" style="width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;">
                                <i class="fab fa-instagram" style="color: white;"></i>
                            </a>
                            <a href="#" style="width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;">
                                <i class="fab fa-linkedin-in" style="color: white;"></i>
                            </a>
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
                                    <option value="cleaning">Home Cleaning</option>
                                    <option value="repairs">Home Repairs</option>
                                    <option value="landscaping">Landscaping</option>
                                    <option value="moving">Moving Assistance</option>
                                    <option value="pet">Pet Services</option>
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
                        
                        <button type="submit" class="cta-button" style="width: 100%; padding: 1.2rem; cursor: pointer; font-weight: 600; letter-spacing: 0.5px; font-size: 1.1rem; transition: all 0.3s ease; background: linear-gradient(135deg, #ff5f00 0%, #ff8c00 100%); border: none; border-radius: 8px; color: white; text-transform: uppercase; position: relative; overflow: hidden; z-index: 1;">
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
/* Animation Keyframes */
@keyframes float {
    0% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(5deg); }
    100% { transform: translateY(0) rotate(0deg); }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes shineEffect {
    0% { left: -100%; }
    100% { left: 100%; }
}

/* Service Cards Hover Effects */
.service-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.15);
}

.service-card:hover .btn-shine {
    animation: shineEffect 1s forwards;
}

/* Feature Cards Hover Effects */
.feature-card {
    transition: transform 0.3s ease, background 0.3s ease;
}

.feature-card:hover {
    transform: translateX(5px);
    background: rgba(255,255,255,0.1);
}

/* Testimonial Cards Hover Effects */
.testimonial-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.1);
}

/* Button Hover Effects */
.cta-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(255,95,0,0.4);
}

.btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.btn-secondary:hover {
    background: rgba(255,255,255,0.3);
}

/* Social Icons Hover Effects */
.social-icons a:hover {
    background: rgba(255,95,0,0.2);
    transform: translateY(-3px);
}

/* Form Field Focus Styles */
#quoteForm input:focus,
#quoteForm select:focus,
#quoteForm textarea:focus {
    outline: none;
    border-color: #ff5f00;
    box-shadow: 0 0 0 3px rgba(255, 95, 0, 0.1);
    background-color: #fff;
}

#quoteForm button:hover .shine-effect {
    left: 100%;
}

/* Responsive Styles */
@media (max-width: 1200px) {
    .home-hero h1 {
        font-size: 3.5rem;
    }
}

@media (max-width: 992px) {
    .two-columns,
    .contact-wrapper {
        grid-template-columns: 1fr;
    }
    
    .home-hero h1 {
        font-size: 3rem;
    }
    
    .home-hero {
        min-height: auto;
        padding: 5rem 0;
    }
    
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .home-hero h1 {
        font-size: 2.5rem;
    }
    
    .hero-buttons {
        flex-direction: column;
        width: 100%;
    }
    
    .hero-buttons a {
        width: 100%;
    }
    
    .hero-highlights {
        flex-direction: column;
        gap: 1rem;
    }
    
    .testimonials-wrapper {
        padding: 0;
    }
    
    .cta-buttons {
        flex-direction: column;
    }
    
    .cta-buttons a {
        width: 100%;
    }
    
    #quoteForm .form-group,
    #quoteForm div[style*="display: grid"] {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form submission
    const quoteForm = document.getElementById('quoteForm');
    if (quoteForm) {
        quoteForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // Form submission logic would go here
            alert('Thank you for your submission! We\'ll contact you shortly.');
            quoteForm.reset();
        });
    }
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 100, // Offset for fixed header if you have one
                    behavior: 'smooth'
                });
            }
        });
    });
});
</script>

<?php get_footer(); ?>
