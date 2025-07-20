<?php
/*
Template Name: About Page
*/
get_header(); 

// Enqueue page-about-inline CSS
wp_enqueue_style('page-about-inline', get_template_directory_uri() . '/css/page-about-inline.css', array(), '1.0');
?>

<!-- Redesigned About Hero Section -->
<section class="hero-section-advanced about-hero redesigned-hero">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge">
                <svg width="24" height="24" fill="none" viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="4" fill="#4F8EF7"/><path d="M7 7h10v2H7V7zm0 4h10v2H7v-2zm0 4h6v2H7v-2z" fill="#fff"/></svg>
                <span>About BluePrint Business Solutions</span>
            </div>
            <h1 class="hero-title-fancy">Your <span class="gradient-text">Business Blueprint</span> Experts</h1>
            <p class="hero-subtitle-fancy">Empowering entrepreneurs with proven business blueprints, step-by-step implementation guides, and expert mentorship to turn ideas into profitable ventures.</p>
            <div class="hero-stats redesigned-hero-stats">
                <div class="stat-item">
                    <span class="stat-icon" aria-hidden="true">📘</span>
                    <div class="stat-number" data-count="500">500</div>
                    <div class="stat-label">Business Blueprints</div>
                </div>
                <div class="stat-item">
                    <span class="stat-icon" aria-hidden="true">🏷️</span>
                    <div class="stat-number" data-count="12">12</div>
                    <div class="stat-label">Industry Categories</div>
                </div>
                <div class="stat-item">
                    <span class="stat-icon" aria-hidden="true">⭐</span>
                    <div class="stat-number" data-count="2500">2500+</div>
                    <div class="stat-label">Success Stories</div>
                </div>
                <div class="stat-item">
                    <span class="stat-icon" aria-hidden="true">🎯</span>
                    <div class="stat-number" data-count="95">95%</div>
                    <div class="stat-label">% Launch Rate</div>
                </div>
            </div>
            <div class="hero-buttons redesigned-hero-buttons">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-primary-fancy">
                    <span>Get Your Blueprint</span>
                    <i class="arrow-right">→</i>
                </a>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn-secondary-fancy">
                    <span>Browse Blueprints</span>
                    <i class="services-icon" aria-hidden="true">🛠️</i>
                </a>
            </div>
        </div>
        <div class="hero-image redesigned-hero-image">
            <div class="floating-card card-1">💡 Innovative</div>
            <div class="floating-card card-2">🎯 Proven</div>
            <div class="floating-card card-3">⭐ Expert-Backed</div>
            <div class="floating-card card-4">🚀 Launch-Ready</div>
        </div>
    </div>
</section>

<!-- Redesigned Company Story Timeline Section -->
<section class="services-section-fancy company-story redesigned-timeline">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Our Journey</div>
            <h2 class="section-title-fancy">Building <span class="gradient-text">Blueprint Excellence</span></h2>
            <p class="section-subtitle-fancy">From a single business idea to 500+ proven blueprints - our mission to empower entrepreneurs never wavered</p>
        </div>
        <div class="story-timeline redesigned-story-timeline">
            <div class="timeline-item" data-year="2019">
                <div class="timeline-icon" aria-hidden="true">💡</div>
                <div class="timeline-content">
                    <h4>The Blueprint Vision</h4>
                    <p>Started with the belief that every entrepreneur deserves access to proven business blueprints. Created our first 10 comprehensive business guides.</p>
                    <div class="timeline-metrics">
                        <span class="metric">10 Blueprints</span>
                        <span class="metric">50 Entrepreneurs</span>
                        <span class="metric">80% Success Rate</span>
                    </div>
                </div>
            </div>
            <div class="timeline-item" data-year="2020">
                <div class="timeline-icon" aria-hidden="true">📈</div>
                <div class="timeline-content">
                    <h4>Industry Expansion</h4>
                    <p>Expanded to cover multiple industries including tech, retail, and services. Added detailed cost analysis and market research to each blueprint.</p>
                    <div class="timeline-metrics">
                        <span class="metric">50 Blueprints</span>
                        <span class="metric">300 Entrepreneurs</span>
                        <span class="metric">85% Success Rate</span>
                    </div>
                </div>
            </div>
            <div class="timeline-item" data-year="2021">
                <div class="timeline-icon" aria-hidden="true">🎯</div>
                <div class="timeline-content">
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
