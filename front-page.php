<?php
/**
 * BluePrint Folder - Homepage Template
 * Modern, professional layout with engaging sections
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */

get_header(); ?>

<!-- Modern Hero Section -->
<section class="modern-hero-section">
    <div class="hero-background">
        <div class="hero-gradient"></div>
        <div class="hero-pattern"></div>
        <div class="floating-elements">
            <div class="floating-element element-1"></div>
            <div class="floating-element element-2"></div>
            <div class="floating-element element-3"></div>
        </div>
    </div>
    
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6">
                <div class="hero-content">
                    <div class="hero-badge">
                        <i class="fas fa-award me-2"></i>
                        <span>Trusted by 500+ Businesses</span>
                    </div>
                    
                    <h1 class="hero-title">
                        <?php echo get_theme_mod('hero_title', 'Professional Services That <span class="text-primary">Drive Results</span>'); ?>
                    </h1>
                    
                    <p class="hero-description">
                        <?php echo get_theme_mod('hero_subtitle', 'We deliver exceptional business solutions tailored to your unique needs. From consultation to implementation, we\'re your trusted partner for success.'); ?>
                    </p>
                    
                    <div class="hero-actions">
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-lg me-3">
                            <i class="fas fa-rocket me-2"></i>
                            Get Started Today
                        </a>
                        <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-play me-2"></i>
                            View Our Services
                        </a>
                    </div>
                    
                    <!-- Trust Indicators -->
                    <div class="trust-indicators">
                        <div class="trust-item">
                            <i class="fas fa-shield-alt"></i>
                            <span>100% Secure</span>
                        </div>
                        <div class="trust-item">
                            <i class="fas fa-clock"></i>
                            <span>24/7 Support</span>
                        </div>
                        <div class="trust-item">
                            <i class="fas fa-thumbs-up"></i>
                            <span>Satisfaction Guaranteed</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="hero-visual">
                    <div class="hero-image-container">
                        <div class="hero-card card-1">
                            <div class="card-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="card-content">
                                <h4>Growth</h4>
                                <p>500% increase</p>
                            </div>
                        </div>
                        
                        <div class="hero-card card-2">
                            <div class="card-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="card-content">
                                <h4>Clients</h4>
                                <p>1000+ satisfied</p>
                            </div>
                        </div>
                        
                        <div class="hero-card card-3">
                            <div class="card-icon">
                                <i class="fas fa-trophy"></i>
                            </div>
                            <div class="card-content">
                                <h4>Awards</h4>
                                <p>Industry leader</p>
                            </div>
                        </div>
                        
                        <div class="hero-main-visual">
                            <div class="visual-content">
                                <i class="fas fa-cogs fa-3x"></i>
                                <h3>Professional Solutions</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
            <a href="#services-section" class="scroll-btn">
                <i class="fas fa-chevron-down"></i>
            </a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="feature-card h-100">
                    <div class="feature-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3 class="feature-title">Fast Delivery</h3>
                    <p class="feature-description">Quick turnaround times without compromising on quality. We deliver results when you need them.</p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="feature-card h-100">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="feature-title">Secure & Reliable</h3>
                    <p class="feature-description">Your data and projects are protected with enterprise-grade security and reliable processes.</p>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="feature-card h-100">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="feature-title">24/7 Support</h3>
                    <p class="feature-description">Round-the-clock support to ensure your business never stops. We're here when you need us.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section class="about-section py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="about-content">
                    <div class="section-badge">
                        <i class="fas fa-info-circle me-2"></i>
                        About Us
                    </div>
                    
                    <h2 class="section-title">Why Choose BluePrint Folder?</h2>
                    <p class="section-description">With over a decade of experience in providing professional services, BluePrint Folder has established itself as a leader in delivering quality solutions that drive real business results.</p>
                    
                    <div class="about-stats">
                        <div class="row">
                            <div class="col-6">
                                <div class="stat-box">
                                    <div class="stat-number">500+</div>
                                    <div class="stat-label">Projects Completed</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stat-box">
                                    <div class="stat-number">100%</div>
                                    <div class="stat-label">Client Satisfaction</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="about-features">
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary me-2"></i>
                            <span>Expert Team of Professionals</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary me-2"></i>
                            <span>Proven Track Record</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary me-2"></i>
                            <span>Customized Solutions</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-primary me-2"></i>
                            <span>24/7 Customer Support</span>
                        </div>
                    </div>
                    
                    <a href="<?php echo esc_url(home_url('/about')); ?>" class="btn btn-primary btn-lg">
                        <i class="fas fa-arrow-right me-2"></i>
                        Learn More About Us
                    </a>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="about-visual">
                    <div class="about-image-container">
                        <div class="about-image">
                            <div class="image-placeholder">
                                <i class="fas fa-building fa-4x text-primary"></i>
                                <h4>Professional Excellence</h4>
                            </div>
                        </div>
                        
                        <div class="about-badge badge-1">
                            <i class="fas fa-award"></i>
                            <span>Industry Leader</span>
                        </div>
                        
                        <div class="about-badge badge-2">
                            <i class="fas fa-star"></i>
                            <span>5-Star Rated</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services-section" class="services-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-badge">
                <i class="fas fa-cogs me-2"></i>
                Our Services
            </div>
            <h2 class="section-title">Professional Solutions for Every Business Need</h2>
            <p class="section-description">Comprehensive services designed to help your business grow and succeed in today's competitive market.</p>
        </div>
        
        <!-- Services Grid -->
        <div class="row g-4">
            <?php
            // Get services from database
            $services_query = blueprint_folder_get_services('', 6);
            
            // Default services if none exist
            $default_services = array(
                array(
                    'title' => 'Web Development',
                    'description' => 'Custom websites and web applications built with modern technologies and best practices.',
                    'icon' => 'fas fa-laptop-code',
                    'features' => array('Responsive Design', 'SEO Optimized', 'Fast Loading'),
                    'url' => home_url('/service/web-development'),
                    'featured' => false
                ),
                array(
                    'title' => 'Digital Marketing',
                    'description' => 'Comprehensive digital marketing strategies to boost your online presence and drive results.',
                    'icon' => 'fas fa-chart-line',
                    'features' => array('SEO & SEM', 'Social Media', 'Content Marketing'),
                    'url' => home_url('/service/digital-marketing'),
                    'featured' => true
                ),
                array(
                    'title' => 'Business Consulting',
                    'description' => 'Expert guidance to help your business optimize operations and achieve strategic goals.',
                    'icon' => 'fas fa-users-cog',
                    'features' => array('Strategy Planning', 'Process Optimization', 'Growth Analysis'),
                    'url' => home_url('/service/consulting'),
                    'featured' => false
                ),
                array(
                    'title' => 'Mobile Apps',
                    'description' => 'Native and cross-platform mobile applications for iOS and Android devices.',
                    'icon' => 'fas fa-mobile-alt',
                    'features' => array('iOS & Android', 'User-Friendly UI', 'App Store Ready'),
                    'url' => home_url('/service/mobile-apps'),
                    'featured' => false
                ),
                array(
                    'title' => 'Cybersecurity',
                    'description' => 'Comprehensive security solutions to protect your business from digital threats.',
                    'icon' => 'fas fa-shield-alt',
                    'features' => array('Security Audits', 'Threat Monitoring', 'Data Protection'),
                    'url' => home_url('/service/cybersecurity'),
                    'featured' => false
                ),
                array(
                    'title' => 'Cloud Solutions',
                    'description' => 'Scalable cloud infrastructure and migration services for modern businesses.',
                    'icon' => 'fas fa-cloud',
                    'features' => array('Cloud Migration', 'Infrastructure Setup', '24/7 Monitoring'),
                    'url' => home_url('/service/cloud-solutions'),
                    'featured' => false
                )
            );
            
            $services_to_display = array();
            
            if ($services_query->have_posts()) {
                // Use actual services from database
                $count = 0;
                while ($services_query->have_posts() && $count < 6) {
                    $services_query->the_post();
                    $icon = get_post_meta(get_the_ID(), '_service_icon', true) ?: 'fas fa-cog';
                    $features = get_post_meta(get_the_ID(), '_service_features', true);
                    if (!$features) {
                        $features = array('Professional Service', 'Expert Support', 'Quality Results');
                    }
                    
                    $services_to_display[] = array(
                        'title' => get_the_title(),
                        'description' => get_the_excerpt() ?: wp_trim_words(get_the_content(), 20),
                        'icon' => $icon,
                        'features' => is_array($features) ? $features : array($features),
                        'url' => get_permalink(),
                        'featured' => $count === 1 // Make second service featured
                    );
                    $count++;
                }
                wp_reset_postdata();
            } else {
                // Use default services
                $services_to_display = $default_services;
            }
            
            foreach ($services_to_display as $service) :
            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="modern-service-card h-100<?php echo $service['featured'] ? ' featured' : ''; ?>">
                        <?php if ($service['featured']) : ?>
                            <div class="featured-badge">Popular</div>
                        <?php endif; ?>
                        
                        <div class="service-icon">
                            <i class="<?php echo esc_attr($service['icon']); ?>"></i>
                        </div>
                        
                        <h3 class="service-title"><?php echo esc_html($service['title']); ?></h3>
                        <p class="service-description"><?php echo esc_html($service['description']); ?></p>
                        
                        <ul class="service-features">
                            <?php foreach ($service['features'] as $feature) : ?>
                                <li><i class="fas fa-check text-primary me-2"></i><?php echo esc_html($feature); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        
                        <a href="<?php echo esc_url($service['url']); ?>" class="btn <?php echo $service['featured'] ? 'btn-primary' : 'btn-outline-primary'; ?>">
                            Learn More <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-5">
            <a href="<?php echo esc_url(get_post_type_archive_link('service') ?: home_url('/service')); ?>" class="btn btn-primary btn-lg">
                <i class="fas fa-th-large me-2"></i>
                View All Services
            </a>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="process-section py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-badge">
                <i class="fas fa-cogs me-2"></i>
                Our Process
            </div>
            <h2 class="section-title">How We Work</h2>
            <p class="section-description">Our proven 4-step process ensures successful project delivery every time.</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="process-step text-center">
                    <div class="step-number">01</div>
                    <div class="step-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3 class="step-title">Consultation</h3>
                    <p class="step-description">We start by understanding your needs, goals, and challenges through detailed consultation.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-step text-center">
                    <div class="step-number">02</div>
                    <div class="step-icon">
                        <i class="fas fa-drafting-compass"></i>
                    </div>
                    <h3 class="step-title">Planning</h3>
                    <p class="step-description">Our experts create a comprehensive strategy and roadmap tailored to your specific requirements.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-step text-center">
                    <div class="step-number">03</div>
                    <div class="step-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3 class="step-title">Development</h3>
                    <p class="step-description">We implement the solution using best practices and cutting-edge technologies.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-step text-center">
                    <div class="step-number">04</div>
                    <div class="step-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3 class="step-title">Launch</h3>
                    <p class="step-description">We deploy your solution and provide ongoing support to ensure continued success.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-badge">
                <i class="fas fa-quote-left me-2"></i>
                Testimonials
            </div>
            <h2 class="section-title">What Our Clients Say</h2>
            <p class="section-description">Don't just take our word for it - hear from our satisfied clients.</p>
        </div>
        
        <div class="row g-4">
            <?php
            // Get testimonials from database
            $testimonials_query = blueprint_folder_get_testimonials(3);
            
            // Default testimonials if none exist
            $default_testimonials = array(
                array(
                    'content' => 'BluePrint Folder transformed our business with their exceptional web development services. The team was professional, responsive, and delivered beyond our expectations.',
                    'name' => 'Sarah Johnson',
                    'position' => 'CEO, TechStart Inc.',
                    'rating' => 5
                ),
                array(
                    'content' => 'Outstanding digital marketing results! Our online presence increased by 300% within just 3 months. Highly recommend their services.',
                    'name' => 'Michael Chen',
                    'position' => 'Marketing Director, GrowthCo',
                    'rating' => 5
                ),
                array(
                    'content' => 'The consulting services helped us streamline our operations and increase efficiency by 40%. Professional team with excellent expertise.',
                    'name' => 'Emily Rodriguez',
                    'position' => 'Operations Manager, Efficiency Plus',
                    'rating' => 5
                )
            );
            
            $testimonials_to_display = array();
            
            if ($testimonials_query->have_posts()) {
                // Use actual testimonials from database
                while ($testimonials_query->have_posts()) {
                    $testimonials_query->the_post();
                    $client_name = get_post_meta(get_the_ID(), '_testimonial_client_name', true);
                    $client_position = get_post_meta(get_the_ID(), '_testimonial_client_position', true);
                    $client_company = get_post_meta(get_the_ID(), '_testimonial_client_company', true);
                    $rating = get_post_meta(get_the_ID(), '_testimonial_rating', true) ?: 5;
                    
                    $position_text = '';
                    if ($client_position && $client_company) {
                        $position_text = $client_position . ', ' . $client_company;
                    } elseif ($client_position) {
                        $position_text = $client_position;
                    } elseif ($client_company) {
                        $position_text = $client_company;
                    }
                    
                    $testimonials_to_display[] = array(
                        'content' => get_the_content(),
                        'name' => $client_name ?: get_the_title(),
                        'position' => $position_text,
                        'rating' => intval($rating)
                    );
                }
                wp_reset_postdata();
            } else {
                // Use default testimonials
                $testimonials_to_display = $default_testimonials;
            }
            
            foreach ($testimonials_to_display as $testimonial) :
            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="modern-testimonial-card h-100">
                        <div class="testimonial-rating">
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <i class="fas fa-star<?php echo ($i <= $testimonial['rating']) ? '' : ' text-muted'; ?>"></i>
                            <?php endfor; ?>
                        </div>
                        <blockquote class="testimonial-text">
                            "<?php echo esc_html($testimonial['content']); ?>"
                        </blockquote>
                        <div class="testimonial-author">
                            <div class="author-avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="author-info">
                                <h4 class="author-name"><?php echo esc_html($testimonial['name']); ?></h4>
                                <?php if ($testimonial['position']) : ?>
                                    <p class="author-position"><?php echo esc_html($testimonial['position']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Blog Section -->
<section class="blog-section py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-badge">
                <i class="fas fa-newspaper me-2"></i>
                Latest Insights
            </div>
            <h2 class="section-title">News & Industry Updates</h2>
            <p class="section-description">Stay informed with our latest articles, tips, and industry insights.</p>
        </div>
        
        <div class="row g-4">
            <?php
            // Get recent blog posts
            $blog_query = blueprint_folder_get_blog_posts(3);
            
            // Default blog posts if none exist
            $default_posts = array(
                array(
                    'title' => '10 Essential Web Development Trends for 2024',
                    'excerpt' => 'Discover the latest trends shaping the future of web development and how they can benefit your business.',
                    'date' => 'March 15, 2024',
                    'author' => 'John Doe',
                    'category' => 'Web Development',
                    'icon' => 'fas fa-laptop-code',
                    'url' => '#'
                ),
                array(
                    'title' => 'Maximizing ROI with Strategic Digital Marketing',
                    'excerpt' => 'Learn proven strategies to increase your return on investment through targeted digital marketing campaigns.',
                    'date' => 'March 12, 2024',
                    'author' => 'Jane Smith',
                    'category' => 'Digital Marketing',
                    'icon' => 'fas fa-chart-line',
                    'url' => '#'
                ),
                array(
                    'title' => 'Essential Cybersecurity Practices for Small Business',
                    'excerpt' => 'Protect your business with these fundamental cybersecurity measures every small business should implement.',
                    'date' => 'March 10, 2024',
                    'author' => 'Mike Johnson',
                    'category' => 'Cybersecurity',
                    'icon' => 'fas fa-shield-alt',
                    'url' => '#'
                )
            );
            
            $posts_to_display = array();
            
            if ($blog_query->have_posts()) {
                // Use actual blog posts from database
                while ($blog_query->have_posts()) {
                    $blog_query->the_post();
                    $categories = get_the_category();
                    $category_name = !empty($categories) ? $categories[0]->name : 'Blog';
                    
                    // Map category to icon
                    $category_icons = array(
                        'web development' => 'fas fa-laptop-code',
                        'digital marketing' => 'fas fa-chart-line',
                        'cybersecurity' => 'fas fa-shield-alt',
                        'business' => 'fas fa-briefcase',
                        'technology' => 'fas fa-microchip',
                        'design' => 'fas fa-paint-brush'
                    );
                    
                    $icon = 'fas fa-newspaper';
                    foreach ($category_icons as $cat => $cat_icon) {
                        if (stripos($category_name, $cat) !== false) {
                            $icon = $cat_icon;
                            break;
                        }
                    }
                    
                    $posts_to_display[] = array(
                        'title' => get_the_title(),
                        'excerpt' => get_the_excerpt() ?: wp_trim_words(get_the_content(), 20),
                        'date' => get_the_date(),
                        'author' => get_the_author(),
                        'category' => $category_name,
                        'icon' => $icon,
                        'url' => get_permalink()
                    );
                }
                wp_reset_postdata();
            } else {
                // Use default posts
                $posts_to_display = $default_posts;
            }
            
            foreach ($posts_to_display as $post) :
            ?>
                <div class="col-lg-4 col-md-6">
                    <article class="modern-blog-card h-100">
                        <div class="blog-image">
                            <div class="image-placeholder">
                                <i class="<?php echo esc_attr($post['icon']); ?> fa-2x text-primary"></i>
                            </div>
                            <div class="blog-category"><?php echo esc_html($post['category']); ?></div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span class="blog-date">
                                    <i class="fas fa-calendar me-1"></i>
                                    <?php echo esc_html($post['date']); ?>
                                </span>
                                <span class="blog-author">
                                    <i class="fas fa-user me-1"></i>
                                    <?php echo esc_html($post['author']); ?>
                                </span>
                            </div>
                            <h3 class="blog-title">
                                <a href="<?php echo esc_url($post['url']); ?>"><?php echo esc_html($post['title']); ?></a>
                            </h3>
                            <p class="blog-excerpt"><?php echo esc_html($post['excerpt']); ?></p>
                            <a href="<?php echo esc_url($post['url']); ?>" class="btn btn-outline-primary btn-sm">
                                Read More <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-5">
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts')) ?: home_url('/blog')); ?>" class="btn btn-primary btn-lg">
                <i class="fas fa-newspaper me-2"></i>
                View All Articles
            </a>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="modern-cta-section py-5">
    <div class="cta-background">
        <div class="cta-gradient"></div>
        <div class="cta-pattern"></div>
    </div>
    
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="cta-content">
                    <h2 class="cta-title">Ready to Transform Your Business?</h2>
                    <p class="cta-description">Join hundreds of satisfied clients who have achieved remarkable results with our professional services. Let's discuss how we can help you reach your goals.</p>
                    
                    <div class="cta-features">
                        <div class="cta-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Free Consultation</span>
                        </div>
                        <div class="cta-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>No Hidden Fees</span>
                        </div>
                        <div class="cta-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Quick Response</span>
                        </div>
                        <div class="cta-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Expert Team</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="cta-actions">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-light btn-lg btn-block mb-3">
                        <i class="fas fa-envelope me-2"></i>
                        Get Free Consultation
                    </a>
                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_mod('company_phone', '(555) 123-4567'))); ?>" class="btn btn-outline-light btn-lg btn-block">
                        <i class="fas fa-phone me-2"></i>
                        Call Us Now
                    </a>
                    
                    <div class="cta-contact-info">
                        <p class="mb-0">
                            <i class="fas fa-clock me-2"></i>
                            Available 24/7 for support
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
