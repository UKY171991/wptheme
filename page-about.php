<?php
/**
 * Template Name: About Page
 * 
 * The template for displaying the about page with enhanced design
 *
 * @package Blueprint
 */

get_header(); ?>

<div class="about-page-wrapper">
    <!-- Hero Section -->
    <section class="about-hero py-5 bg-gradient-primary">
        <div class="container">
            <div class="row align-items-center min-vh-50">
                <div class="col-lg-6">
                    <div class="hero-content text-white">
                        <div class="hero-badge mb-3">
                            <span class="badge bg-white text-primary px-3 py-2 rounded-pill fs-6">
                                <i class="bi bi-people-fill me-2"></i>
                                <?php esc_html_e('About Us', 'blueprint'); ?>
                            </span>
                        </div>
                        <h1 class="display-4 fw-bold mb-4 animate-fade-in">
                            <?php 
                            if (have_posts()) {
                                the_post();
                                the_title();
                                rewind_posts();
                            } else {
                                esc_html_e('About BluePrint', 'blueprint');
                            }
                            ?>
                        </h1>
                        <p class="lead mb-4 animate-fade-in-delay">
                            <?php 
                            $excerpt = get_the_excerpt();
                            if ($excerpt) {
                                echo esc_html($excerpt);
                            } else {
                                esc_html_e('We are passionate about helping businesses succeed through proven strategies, innovative solutions, and comprehensive guidance.', 'blueprint');
                            }
                            ?>
                        </p>
                        <div class="hero-stats row g-4 mt-4">
                            <div class="col-sm-4">
                                <div class="stat-item text-center">
                                    <h3 class="display-6 fw-bold mb-1">500+</h3>
                                    <p class="mb-0 text-white-50"><?php esc_html_e('Happy Clients', 'blueprint'); ?></p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="stat-item text-center">
                                    <h3 class="display-6 fw-bold mb-1">5+</h3>
                                    <p class="mb-0 text-white-50"><?php esc_html_e('Years Experience', 'blueprint'); ?></p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="stat-item text-center">
                                    <h3 class="display-6 fw-bold mb-1">24/7</h3>
                                    <p class="mb-0 text-white-50"><?php esc_html_e('Support', 'blueprint'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image text-center">
                        <div class="image-wrapper position-relative">
                            <div class="bg-shape position-absolute"></div>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/about-hero.jpg'); ?>" 
                                 alt="<?php esc_attr_e('About Us Image', 'blueprint'); ?>" 
                                 class="img-fluid rounded-4 shadow-lg position-relative"
                                 style="max-height: 500px; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="about-content py-5">
        <div class="container">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="content-wrapper">
                                <div class="post-content prose">
                                    <?php
                                    the_content();
                                    
                                    wp_link_pages(array(
                                        'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'blueprint') . '</span>',
                                        'after'  => '</div>',
                                        'link_before' => '<span>',
                                        'link_after'  => '</span>',
                                    ));
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- Our Mission Section -->
    <section class="our-mission py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="mission-content">
                        <div class="section-badge mb-3">
                            <span class="badge bg-primary text-white px-3 py-2 rounded-pill">
                                <i class="bi bi-target me-2"></i>
                                <?php esc_html_e('Our Mission', 'blueprint'); ?>
                            </span>
                        </div>
                        <h2 class="display-5 fw-bold mb-4">
                            <?php esc_html_e('Empowering Business Success', 'blueprint'); ?>
                        </h2>
                        <p class="lead text-muted mb-4">
                            <?php esc_html_e('Our mission is to provide comprehensive business solutions that help entrepreneurs and established companies achieve sustainable growth through proven strategies and innovative approaches.', 'blueprint'); ?>
                        </p>
                        <div class="mission-points">
                            <div class="point-item d-flex mb-3">
                                <div class="point-icon me-3">
                                    <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                </div>
                                <div class="point-content">
                                    <h5 class="mb-1"><?php esc_html_e('Strategic Planning', 'blueprint'); ?></h5>
                                    <p class="text-muted mb-0"><?php esc_html_e('Comprehensive business planning and strategy development', 'blueprint'); ?></p>
                                </div>
                            </div>
                            <div class="point-item d-flex mb-3">
                                <div class="point-icon me-3">
                                    <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                </div>
                                <div class="point-content">
                                    <h5 class="mb-1"><?php esc_html_e('Expert Consultation', 'blueprint'); ?></h5>
                                    <p class="text-muted mb-0"><?php esc_html_e('Professional guidance from industry experts', 'blueprint'); ?></p>
                                </div>
                            </div>
                            <div class="point-item d-flex">
                                <div class="point-icon me-3">
                                    <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                </div>
                                <div class="point-content">
                                    <h5 class="mb-1"><?php esc_html_e('Ongoing Support', 'blueprint'); ?></h5>
                                    <p class="text-muted mb-0"><?php esc_html_e('Continuous support throughout your business journey', 'blueprint'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mission-visual">
                        <div class="visual-grid">
                            <div class="grid-item bg-primary text-white rounded-4 p-4 text-center">
                                <i class="bi bi-lightbulb display-4 mb-3"></i>
                                <h4><?php esc_html_e('Innovation', 'blueprint'); ?></h4>
                            </div>
                            <div class="grid-item bg-success text-white rounded-4 p-4 text-center">
                                <i class="bi bi-graph-up-arrow display-4 mb-3"></i>
                                <h4><?php esc_html_e('Growth', 'blueprint'); ?></h4>
                            </div>
                            <div class="grid-item bg-info text-white rounded-4 p-4 text-center">
                                <i class="bi bi-people display-4 mb-3"></i>
                                <h4><?php esc_html_e('Collaboration', 'blueprint'); ?></h4>
                            </div>
                            <div class="grid-item bg-warning text-white rounded-4 p-4 text-center">
                                <i class="bi bi-award display-4 mb-3"></i>
                                <h4><?php esc_html_e('Excellence', 'blueprint'); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <div class="section-badge mb-3">
                    <span class="badge bg-primary text-white px-3 py-2 rounded-pill">
                        <i class="bi bi-people-fill me-2"></i>
                        <?php esc_html_e('Our Team', 'blueprint'); ?>
                    </span>
                </div>
                <h2 class="display-5 fw-bold mb-3">
                    <?php esc_html_e('Meet Our Experts', 'blueprint'); ?>
                </h2>
                <p class="lead text-muted">
                    <?php esc_html_e('Dedicated professionals committed to your success', 'blueprint'); ?>
                </p>
            </div>
            
            <div class="row g-4">
                <!-- Team Member 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="team-card bg-white rounded-4 shadow-sm p-4 text-center h-100">
                        <div class="team-avatar mb-3">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/team-1.jpg'); ?>" 
                                 alt="<?php esc_attr_e('Team Member', 'blueprint'); ?>" 
                                 class="rounded-circle" width="100" height="100" style="object-fit: cover;">
                        </div>
                        <h5 class="fw-bold mb-1"><?php esc_html_e('Sarah Johnson', 'blueprint'); ?></h5>
                        <p class="text-primary mb-3"><?php esc_html_e('CEO & Founder', 'blueprint'); ?></p>
                        <p class="text-muted small"><?php esc_html_e('Leading business strategist with 10+ years of experience in helping companies scale.', 'blueprint'); ?></p>
                        <div class="team-social">
                            <a href="#" class="btn btn-outline-primary btn-sm me-2">
                                <i class="bi bi-linkedin"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Team Member 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="team-card bg-white rounded-4 shadow-sm p-4 text-center h-100">
                        <div class="team-avatar mb-3">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/team-2.jpg'); ?>" 
                                 alt="<?php esc_attr_e('Team Member', 'blueprint'); ?>" 
                                 class="rounded-circle" width="100" height="100" style="object-fit: cover;">
                        </div>
                        <h5 class="fw-bold mb-1"><?php esc_html_e('Michael Chen', 'blueprint'); ?></h5>
                        <p class="text-primary mb-3"><?php esc_html_e('Senior Consultant', 'blueprint'); ?></p>
                        <p class="text-muted small"><?php esc_html_e('Expert in digital transformation and process optimization for modern businesses.', 'blueprint'); ?></p>
                        <div class="team-social">
                            <a href="#" class="btn btn-outline-primary btn-sm me-2">
                                <i class="bi bi-linkedin"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Team Member 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="team-card bg-white rounded-4 shadow-sm p-4 text-center h-100">
                        <div class="team-avatar mb-3">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/team-3.jpg'); ?>" 
                                 alt="<?php esc_attr_e('Team Member', 'blueprint'); ?>" 
                                 class="rounded-circle" width="100" height="100" style="object-fit: cover;">
                        </div>
                        <h5 class="fw-bold mb-1"><?php esc_html_e('Emily Rodriguez', 'blueprint'); ?></h5>
                        <p class="text-primary mb-3"><?php esc_html_e('Marketing Director', 'blueprint'); ?></p>
                        <p class="text-muted small"><?php esc_html_e('Creative marketing professional specializing in brand development and growth strategies.', 'blueprint'); ?></p>
                        <div class="team-social">
                            <a href="#" class="btn btn-outline-primary btn-sm me-2">
                                <i class="bi bi-linkedin"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="display-6 fw-bold mb-3">
                        <?php esc_html_e('Ready to Transform Your Business?', 'blueprint'); ?>
                    </h3>
                    <p class="lead mb-0">
                        <?php esc_html_e('Let\'s work together to create a customized blueprint for your success.', 'blueprint'); ?>
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-light btn-lg px-4">
                        <i class="bi bi-rocket-takeoff me-2"></i>
                        <?php esc_html_e('Get Started Today', 'blueprint'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
                    <h4>Expert Mentorship Program</h4>
                    <p>Launched one-on-one mentorship program connecting entrepreneurs with industry experts who have successfully implemented our blueprints.</p>
                    <div class="timeline-metrics">
                        <span class="metric">150 Blueprints</span>
                        <span class="metric">800 Entrepreneurs</span>
                        <span class="metric">90% Success Rate</span>
                    </div>
                </div>
            </div>
            <div class="timeline-item" data-year="2023">
                <div class="timeline-icon" aria-hidden="true">🤖</div>
                <div class="timeline-content">
                    <h4>AI-Powered Customization</h4>
                    <p>Introduced AI-powered blueprint customization, allowing entrepreneurs to tailor each plan to their specific market, budget, and goals.</p>
                    <div class="timeline-metrics">
                        <span class="metric">300 Blueprints</span>
                        <span class="metric">1500 Entrepreneurs</span>
                        <span class="metric">92% Success Rate</span>
                    </div>
                </div>
            </div>
            <div class="timeline-item" data-year="2024">
                <div class="timeline-icon" aria-hidden="true">🌟</div>
                <div class="timeline-content">
                    <h4>Complete Business Ecosystem</h4>
                    <p>Today, we offer 500+ blueprints across 12 industries, complete with implementation support, funding guidance, and ongoing business coaching.</p>
                    <div class="timeline-metrics">
                        <span class="metric">500+ Blueprints</span>
                        <span class="metric">2500+ Entrepreneurs</span>
                        <span class="metric">95% Success Rate</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Redesigned Mission & Vision Section -->
<section class="featured-blueprints-section mission-vision redesigned-mission-vision">
    <div class="container">
        <div class="blueprints-grid mission-vision-grid redesigned-mission-vision-grid">
            <div class="blueprint-category-card mission-card redesigned-mission-card">
                <div class="category-icon" aria-hidden="true">🎯</div>
                <h3>Our Mission</h3>
                <p>To democratize entrepreneurship by providing proven business blueprints, expert guidance, and implementation support that transforms innovative ideas into thriving businesses.</p>
                <div class="mission-highlights">
                    <div class="highlight-item">
                        <span class="highlight-icon" aria-hidden="true">✨</span>
                        <span>Proven Blueprints</span>
                    </div>
                    <div class="highlight-item">
                        <span class="highlight-icon" aria-hidden="true">🤝</span>
                        <span>Expert Mentorship</span>
                    </div>
                    <div class="highlight-item">
                        <span class="highlight-icon" aria-hidden="true">💫</span>
                        <span>Business Success</span>
                    </div>
                </div>
            </div>
            <div class="blueprint-category-card vision-card featured redesigned-vision-card">
                <div class="popular-badge">Our Future</div>
                <div class="category-icon" aria-hidden="true">🌟</div>
                <h3>Our Vision</h3>
                <p>To be the world's most trusted platform for business blueprints, empowering millions of entrepreneurs to build successful, sustainable businesses with confidence and clarity.</p>
                <div class="vision-highlights">
                    <div class="highlight-item">
                        <span class="highlight-icon" aria-hidden="true">🌍</span>
                        <span>Global Impact</span>
                    </div>
                    <div class="highlight-item">
                        <span class="highlight-icon" aria-hidden="true">🌿</span>
                        <span>Sustainable Growth</span>
                    </div>
                    <div class="highlight-item">
                        <span class="highlight-icon" aria-hidden="true">🚀</span>
                        <span>Innovation Leadership</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Redesigned Our Values Section -->
<section class="how-it-works-section our-values redesigned-values">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Core Values</div>
            <h2 class="section-title-fancy">What <span class="gradient-text">Drives Us</span></h2>
            <p class="section-subtitle-fancy">The principles that guide every service interaction and shape every client experience</p>
        </div>
        <div class="about-drives-section-fixed">
          <div class="about-drives-grid">
              <div class="about-drives-item">
                  <span class="about-drives-icon" aria-hidden="true">💎</span>
                  <h3>Proven Results</h3>
                  <p>Every blueprint in our library has been tested and refined through real-world implementation. We only share strategies that have proven successful for actual entrepreneurs.</p>
              </div>
              <div class="about-drives-item">
                  <span class="about-drives-icon" aria-hidden="true">🤝</span>
                  <h3>Expert Guidance</h3>
                  <p>Our team of successful entrepreneurs and industry experts provides ongoing support, ensuring you have the knowledge and confidence to execute your chosen blueprint.</p>
              </div>
              <div class="about-drives-item">
                  <span class="about-drives-icon" aria-hidden="true">💰</span>
                  <h3>Transparent Insights</h3>
                  <p>Every blueprint includes detailed cost breakdowns, revenue projections, and realistic timelines. No hidden complexities, no unrealistic promises—just honest, actionable business plans.</p>
              </div>
              <div class="about-drives-item">
                  <span class="about-drives-icon" aria-hidden="true">🌱</span>
                  <h3>Community Driven</h3>
                  <p>Join a thriving community of entrepreneurs who share insights, celebrate successes, and support each other through the challenges of building a business.</p>
              </div>
          </div>
        </div>
    </div>
</section>

<!-- Redesigned Team Section -->
<section class="services-section-fancy team-section redesigned-team">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Our Team</div>
            <h2 class="section-title-fancy">Meet Our <span class="gradient-text">Blueprint Experts</span></h2>
            <p class="section-subtitle-fancy">Successful entrepreneurs and industry experts dedicated to helping you turn your business ideas into profitable ventures</p>
        </div>

        <div class="team-grid redesigned-team-grid">
            <div class="team-member-card redesigned-team-card">
                <div class="member-avatar">
                    <div class="avatar-placeholder" aria-hidden="true">👨‍💼</div>
                </div>
                <div class="member-info">
                    <h4>David Rodriguez</h4>
                    <p class="member-role">Founder & Chief Blueprint Strategist</p>
                    <p class="member-bio">Serial entrepreneur with 15+ years building successful businesses. Created 100+ proven blueprints across multiple industries.</p>
                    <div class="member-expertise">
                        <span class="expertise-tag">Business Strategy</span>
                        <span class="expertise-tag">Startup Blueprints</span>
                        <span class="expertise-tag">Market Research</span>
                    </div>
                </div>
            </div>
            <div class="team-member-card redesigned-team-card">
                <div class="member-avatar">
                    <div class="avatar-placeholder" aria-hidden="true">👩‍💼</div>
                </div>
                <div class="member-info">
                    <h4>Sarah Mitchell</h4>
                    <p class="member-role">Head of Blueprint Development</p>
                    <p class="member-bio">Expert in translating successful business models into actionable blueprints. Specializes in tech and e-commerce strategies.</p>
                    <div class="member-expertise">
                        <span class="expertise-tag">E-commerce</span>
                        <span class="expertise-tag">Tech Startups</span>
                        <span class="expertise-tag">Digital Marketing</span>
                    </div>
                </div>
            </div>
            <div class="team-member-card redesigned-team-card">
                <div class="member-avatar">
                    <div class="avatar-placeholder" aria-hidden="true">👨‍🔧</div>
                </div>
                <div class="member-info">
                    <h4>Marcus Thompson</h4>
                    <p class="member-role">Implementation Specialist</p>
                    <p class="member-bio">Guides entrepreneurs through blueprint execution with hands-on mentorship and practical implementation strategies.</p>
                    <div class="member-expertise">
                        <span class="expertise-tag">Business Implementation</span>
                        <span class="expertise-tag">Operations Setup</span>
                        <span class="expertise-tag">Process Optimization</span>
                    </div>
                </div>
            </div>
            <div class="team-member-card redesigned-team-card">
                <div class="member-avatar">
                    <div class="avatar-placeholder" aria-hidden="true">👩‍🎨</div>
                </div>
                <div class="member-info">
                    <h4>Lisa Wang</h4>
                    <p class="member-role">Creative Industries Expert</p>
                    <p class="member-bio">Specializes in creative business blueprints including design agencies, content creation, and creative services ventures.</p>
                    <div class="member-expertise">
                        <span class="expertise-tag">Creative Businesses</span>
                        <span class="expertise-tag">Brand Development</span>
                        <span class="expertise-tag">Content Strategy</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Redesigned Awards & Recognition Section -->
<section class="featured-blueprints-section awards-section redesigned-awards">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Recognition</div>
            <h2 class="section-title-fancy">Awards & <span class="gradient-text">Recognition</span></h2>
            <p class="section-subtitle-fancy">Our blueprint expertise and entrepreneur success stories have earned industry recognition</p>
        </div>
        <div class="awards-grid redesigned-awards-grid">
            <div class="award-card redesigned-award-card">
                <div class="award-icon" aria-hidden="true">🏆</div>
                <h4>Best Business Blueprint Platform 2024</h4>
                <p>Entrepreneurship Excellence Awards</p>
                <div class="award-year">2024</div>
            </div>
            <div class="award-card redesigned-award-card">
                <div class="award-icon" aria-hidden="true">⭐</div>
                <h4>Top Startup Mentor Program</h4>
                <p>Business Coaching Institute</p>
                <div class="award-year">2023</div>
            </div>
            <div class="award-card redesigned-award-card">
                <div class="award-icon" aria-hidden="true">🌟</div>
                <h4>Entrepreneur's Choice Award</h4>
                <p>Small Business Community</p>
                <div class="award-year">2023</div>
            </div>
            <div class="award-card redesigned-award-card">
                <div class="award-icon" aria-hidden="true">💎</div>
                <h4>Business Excellence Certified</h4>
                <p>Startup Success Institute</p>
                <div class="award-year">2022</div>
            </div>
        </div>
    </div>
</section>

<!-- Redesigned Call to Action -->
<section class="cta-section-fancy redesigned-cta-section">
    <div class="container">
        <div class="cta-content-fancy redesigned-cta-content">
            <div class="cta-badge">READY TO EXPERIENCE EXCELLENCE?</div>
            <h2 class="cta-title-fancy">Start Your <span class="gradient-text cta-gradient-text">Service Journey</span></h2>
            <p class="cta-subtitle-fancy">Join thousands of satisfied clients who trust us with their service needs.</p>
            <div class="cta-buttons-fancy redesigned-cta-buttons">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-primary-fancy">
                    GET STARTED TODAY <span class="btn-icon">→</span>
                </a>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn-secondary-fancy">
                    EXPLORE SERVICES <span class="btn-icon">🛠️</span>
                </a>
            </div>
            <div class="cta-trust-indicators redesigned-cta-trust">
                <div class="trust-item">
                    <span class="trust-icon" aria-hidden="true">🆓</span>
                    <span>Free Consultation</span>
                </div>
                <div class="trust-item">
                    <span class="trust-icon" aria-hidden="true">🔒</span>
                    <span>Fully Insured</span>
                </div>
                <div class="trust-item">
                    <span class="trust-icon" aria-hidden="true">💯</span>
                    <span>Satisfaction Guaranteed</span>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>

<script>
// Enhanced JavaScript for about page
document.addEventListener('DOMContentLoaded', function() {
    // Animate numbers on scroll
    const statNumbers = document.querySelectorAll('.stat-number[data-count]');
    
    const animateNumbers = () => {
        statNumbers.forEach(stat => {
            const target = parseInt(stat.getAttribute('data-count'));
            const current = parseInt(stat.textContent);
            const increment = target / 100;
            
            if (current < target) {
                stat.textContent = Math.ceil(current + increment);
                setTimeout(animateNumbers, 20);
            } else {
                stat.textContent = target;
            }
        });
    };
    
    // Trigger animation when stats are visible
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateNumbers();
                observer.unobserve(entry.target);
            }
        });
    });
    
    const statsSection = document.querySelector('.hero-stats');
    if (statsSection) {
        observer.observe(statsSection);
    }
    
    // Timeline animation
    const timelineItems = document.querySelectorAll('.timeline-item');
    
    const timelineObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    });
    
    timelineItems.forEach(item => {
        timelineObserver.observe(item);
    });
    
    // Team member cards hover effect
    const teamCards = document.querySelectorAll('.team-member-card');
    teamCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.classList.add('hovered');
        });
        
        card.addEventListener('mouseleave', function() {
            this.classList.remove('hovered');
        });
    });
    
    // Award cards animation
    const awardCards = document.querySelectorAll('.award-card');
    const awardObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    });
    
    awardCards.forEach(card => {
        awardObserver.observe(card);
    });
    
    // Value cards interaction
    const valueCards = document.querySelectorAll('.value-card');
    valueCards.forEach(card => {
        card.addEventListener('click', function() {
            // Add click effect
            this.classList.add('clicked');
            setTimeout(() => {
                this.classList.remove('clicked');
            }, 150);
        });
    });
});
</script>

<?php get_footer(); ?>
