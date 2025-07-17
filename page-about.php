<?php
/*
Template Name: About Page
*/
get_header(); ?>

<!-- Redesigned About Hero Section -->
<section class="hero-section-advanced about-hero redesigned-hero" style="position:relative;overflow:hidden;">
    <div class="hero-overlay" style="position:absolute;top:0;left:0;width:100%;height:100%;background:linear-gradient(120deg,#4F8EF7 0%,#6a82fb 100%);opacity:0.08;z-index:1;"></div>
    <div class="container" style="position:relative;z-index:2;">
        <div class="hero-content" style="max-width:700px;margin:auto;text-align:center;">
            <div class="hero-badge" style="display:inline-flex;align-items:center;background:#f0f4fa;padding:0.5rem 1.25rem;border-radius:2rem;font-weight:600;font-size:1rem;margin-bottom:1.5rem;">
                <svg width="24" height="24" fill="none" viewBox="0 0 24 24" aria-hidden="true" style="vertical-align:middle;margin-right:8px;"><rect x="3" y="3" width="18" height="18" rx="4" fill="#4F8EF7"/><path d="M7 7h10v2H7V7zm0 4h10v2H7v-2zm0 4h6v2H7v-2z" fill="#fff"/></svg>
                <span>About BluePrint Business Solutions</span>
            </div>
            <h1 class="hero-title-fancy" style="font-size:2.5rem;font-weight:800;line-height:1.1;margin-bottom:1rem;">Your <span class="gradient-text" style="background:linear-gradient(90deg,#4F8EF7,#6a82fb);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">Business Blueprint</span> Experts</h1>
            <p class="hero-subtitle-fancy" style="font-size:1.25rem;color:#444;margin-bottom:2rem;">Empowering entrepreneurs with proven business blueprints, step-by-step implementation guides, and expert mentorship to turn ideas into profitable ventures.</p>
            <div class="hero-stats redesigned-hero-stats" style="display:grid;grid-template-columns:repeat(4,1fr);gap:1.5rem;margin-bottom:2rem;">
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
            <div class="hero-buttons redesigned-hero-buttons" style="display:flex;gap:1rem;justify-content:center;">
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
        <div class="hero-image redesigned-hero-image" style="position:absolute;right:0;top:0;bottom:0;width:40vw;display:flex;flex-direction:column;align-items:flex-end;justify-content:center;pointer-events:none;">
            <div class="floating-card card-1" style="background:#fff;border-radius:1rem;box-shadow:0 4px 24px rgba(79,142,247,0.10);padding:1rem 2rem;margin-bottom:1rem;font-weight:600;">💡 Innovative</div>
            <div class="floating-card card-2" style="background:#fff;border-radius:1rem;box-shadow:0 4px 24px rgba(79,142,247,0.10);padding:1rem 2rem;margin-bottom:1rem;font-weight:600;">🎯 Proven</div>
            <div class="floating-card card-3" style="background:#fff;border-radius:1rem;box-shadow:0 4px 24px rgba(79,142,247,0.10);padding:1rem 2rem;margin-bottom:1rem;font-weight:600;">⭐ Expert-Backed</div>
            <div class="floating-card card-4" style="background:#fff;border-radius:1rem;box-shadow:0 4px 24px rgba(79,142,247,0.10);padding:1rem 2rem;font-weight:600;">🚀 Launch-Ready</div>
        </div>
    </div>
</section>

<!-- Redesigned Company Story Timeline Section -->
<section class="services-section-fancy company-story redesigned-timeline" style="background:#f8fafd;padding:4rem 0;">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Our Journey</div>
            <h2 class="section-title-fancy">Building <span class="gradient-text">Blueprint Excellence</span></h2>
            <p class="section-subtitle-fancy">From a single business idea to 500+ proven blueprints - our mission to empower entrepreneurs never wavered</p>
        </div>
        <div class="story-timeline redesigned-story-timeline" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:2.5rem;margin-top:2.5rem;position:relative;z-index:2;">
            <div class="timeline-item" data-year="2019" style="background:#fff;border-radius:1.25rem;box-shadow:0 8px 32px rgba(79,142,247,0.10);padding:2.25rem 1.75rem;position:relative;overflow:hidden;min-height:340px;display:flex;flex-direction:column;justify-content:space-between;">
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
            <div class="timeline-item" data-year="2020" style="background:#fff;border-radius:1.25rem;box-shadow:0 8px 32px rgba(79,142,247,0.10);padding:2.25rem 1.75rem;position:relative;overflow:hidden;min-height:340px;display:flex;flex-direction:column;justify-content:space-between;">
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
            <div class="timeline-item" data-year="2021" style="background:#fff;border-radius:1.25rem;box-shadow:0 8px 32px rgba(79,142,247,0.10);padding:2.25rem 1.75rem;position:relative;overflow:hidden;min-height:340px;display:flex;flex-direction:column;justify-content:space-between;">
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
            <div class="timeline-item" data-year="2023" style="background:#fff;border-radius:1.25rem;box-shadow:0 8px 32px rgba(79,142,247,0.10);padding:2.25rem 1.75rem;position:relative;overflow:hidden;min-height:340px;display:flex;flex-direction:column;justify-content:space-between;">
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
            <div class="timeline-item" data-year="2024" style="background:#fff;border-radius:1.25rem;box-shadow:0 8px 32px rgba(79,142,247,0.10);padding:2.25rem 1.75rem;position:relative;overflow:hidden;min-height:340px;display:flex;flex-direction:column;justify-content:space-between;">
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
    <style>
    @media (max-width: 900px) {
      .story-timeline.redesigned-story-timeline {
        grid-template-columns: 1fr;
        overflow-x: auto;
        gap: 1.5rem;
      }
      .timeline-item {
        min-width: 90vw;
        margin: 0 auto;
      }
    }
    @media (max-width: 600px) {
      .timeline-item {
        padding: 1.25rem 0.75rem !important;
        min-width: 98vw;
      }
    }
    </style>
</section>

<!-- Redesigned Mission & Vision Section -->
<section class="featured-blueprints-section mission-vision redesigned-mission-vision" style="padding:4rem 0;background:#fff;">
    <div class="container">
        <div class="blueprints-grid mission-vision-grid redesigned-mission-vision-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:2.5rem;align-items:stretch;">
            <div class="blueprint-category-card mission-card redesigned-mission-card" style="background:#f8fafd;border-radius:1rem;box-shadow:0 4px 24px rgba(79,142,247,0.07);padding:2.5rem 2rem;display:flex;flex-direction:column;justify-content:space-between;">
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
            <div class="blueprint-category-card vision-card featured redesigned-vision-card" style="background:#f8fafd;border-radius:1rem;box-shadow:0 4px 24px rgba(79,142,247,0.07);padding:2.5rem 2rem;display:flex;flex-direction:column;justify-content:space-between;">
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
<section class="how-it-works-section our-values redesigned-values" style="background:#f8fafd;padding:4rem 0;">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Core Values</div>
            <h2 class="section-title-fancy">What <span class="gradient-text">Drives Us</span></h2>
            <p class="section-subtitle-fancy">The principles that guide every service interaction and shape every client experience</p>
        </div>
        <div class="about-drives-section-fixed">
          <div class="about-drives-grid" style="display:grid;grid-template-columns:repeat(2,1fr);gap:2rem;">
              <div class="about-drives-item" style="background:#fff;border-radius:1rem;box-shadow:0 4px 24px rgba(79,142,247,0.07);padding:2rem 1.5rem;display:flex;flex-direction:column;align-items:flex-start;">
                  <span class="about-drives-icon" aria-hidden="true" style="font-size:2.5rem;margin-bottom:1rem;">💎</span>
                  <h3 style="margin-bottom:0.5rem;">Proven Results</h3>
                  <p style="color:#555;">Every blueprint in our library has been tested and refined through real-world implementation. We only share strategies that have proven successful for actual entrepreneurs.</p>
              </div>
              <div class="about-drives-item" style="background:#fff;border-radius:1rem;box-shadow:0 4px 24px rgba(79,142,247,0.07);padding:2rem 1.5rem;display:flex;flex-direction:column;align-items:flex-start;">
                  <span class="about-drives-icon" aria-hidden="true" style="font-size:2.5rem;margin-bottom:1rem;">🤝</span>
                  <h3 style="margin-bottom:0.5rem;">Expert Guidance</h3>
                  <p style="color:#555;">Our team of successful entrepreneurs and industry experts provides ongoing support, ensuring you have the knowledge and confidence to execute your chosen blueprint.</p>
              </div>
              <div class="about-drives-item" style="background:#fff;border-radius:1rem;box-shadow:0 4px 24px rgba(79,142,247,0.07);padding:2rem 1.5rem;display:flex;flex-direction:column;align-items:flex-start;">
                  <span class="about-drives-icon" aria-hidden="true" style="font-size:2.5rem;margin-bottom:1rem;">💰</span>
                  <h3 style="margin-bottom:0.5rem;">Transparent Insights</h3>
                  <p style="color:#555;">Every blueprint includes detailed cost breakdowns, revenue projections, and realistic timelines. No hidden complexities, no unrealistic promises—just honest, actionable business plans.</p>
              </div>
              <div class="about-drives-item" style="background:#fff;border-radius:1rem;box-shadow:0 4px 24px rgba(79,142,247,0.07);padding:2rem 1.5rem;display:flex;flex-direction:column;align-items:flex-start;">
                  <span class="about-drives-icon" aria-hidden="true" style="font-size:2.5rem;margin-bottom:1rem;">🌱</span>
                  <h3 style="margin-bottom:0.5rem;">Community Driven</h3>
                  <p style="color:#555;">Join a thriving community of entrepreneurs who share insights, celebrate successes, and support each other through the challenges of building a business.</p>
              </div>
          </div>
        </div>
    </div>
</section>

<!-- Redesigned Team Section -->
<section class="services-section-fancy team-section redesigned-team" style="background:#fff;padding:4rem 0;">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Our Team</div>
            <h2 class="section-title-fancy">Meet Our <span class="gradient-text">Blueprint Experts</span></h2>
            <p class="section-subtitle-fancy">Successful entrepreneurs and industry experts dedicated to helping you turn your business ideas into profitable ventures</p>
        </div>
        <style>
        .team-grid.redesigned-team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        .team-member-card.redesigned-team-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            padding: 2rem 1.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: box-shadow 0.3s, transform 0.3s;
        }
        .team-member-card .member-avatar {
            margin-bottom: 1rem;
        }
        .team-member-card .avatar-placeholder {
            font-size: 3rem;
        }
        .team-member-card .member-info h4 {
            margin: 0.5rem 0 0.25rem 0;
        }
        .team-member-card .member-role {
            font-size: 0.95rem;
            color: #4F8EF7;
            margin-bottom: 0.5rem;
        }
        .team-member-card .member-bio {
            font-size: 0.95rem;
            color: #555;
            margin-bottom: 0.75rem;
            text-align: center;
        }
        .team-member-card .member-expertise {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            justify-content: center;
        }
        .team-member-card .expertise-tag {
            background: #f0f4fa;
            color: #4F8EF7;
            border-radius: 0.5rem;
            padding: 0.25rem 0.75rem;
            font-size: 0.85rem;
        }
        </style>
        <div class="team-grid redesigned-team-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:2rem;margin-top:2rem;">
            <div class="team-member-card redesigned-team-card" style="background:#f8fafd;border-radius:1rem;box-shadow:0 4px 24px rgba(79,142,247,0.07);padding:2rem 1.5rem;display:flex;flex-direction:column;align-items:center;transition:box-shadow 0.3s,transform 0.3s;">
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
            <div class="team-member-card redesigned-team-card" style="background:#f8fafd;border-radius:1rem;box-shadow:0 4px 24px rgba(79,142,247,0.07);padding:2rem 1.5rem;display:flex;flex-direction:column;align-items:center;transition:box-shadow 0.3s,transform 0.3s;">
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
            <div class="team-member-card redesigned-team-card" style="background:#f8fafd;border-radius:1rem;box-shadow:0 4px 24px rgba(79,142,247,0.07);padding:2rem 1.5rem;display:flex;flex-direction:column;align-items:center;transition:box-shadow 0.3s,transform 0.3s;">
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
            <div class="team-member-card redesigned-team-card" style="background:#f8fafd;border-radius:1rem;box-shadow:0 4px 24px rgba(79,142,247,0.07);padding:2rem 1.5rem;display:flex;flex-direction:column;align-items:center;transition:box-shadow 0.3s,transform 0.3s;">
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
<section class="featured-blueprints-section awards-section redesigned-awards" style="background:#f8fafd;padding:4rem 0;">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Recognition</div>
            <h2 class="section-title-fancy">Awards & <span class="gradient-text">Recognition</span></h2>
            <p class="section-subtitle-fancy">Our blueprint expertise and entrepreneur success stories have earned industry recognition</p>
        </div>
        <div class="awards-grid redesigned-awards-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:2rem;margin-top:2rem;">
            <div class="award-card redesigned-award-card" style="background:#fff;border-radius:1rem;box-shadow:0 4px 24px rgba(79,142,247,0.07);padding:2rem 1.5rem;display:flex;flex-direction:column;align-items:center;">
                <div class="award-icon" aria-hidden="true">🏆</div>
                <h4>Best Business Blueprint Platform 2024</h4>
                <p>Entrepreneurship Excellence Awards</p>
                <div class="award-year">2024</div>
            </div>
            <div class="award-card redesigned-award-card" style="background:#fff;border-radius:1rem;box-shadow:0 4px 24px rgba(79,142,247,0.07);padding:2rem 1.5rem;display:flex;flex-direction:column;align-items:center;">
                <div class="award-icon" aria-hidden="true">⭐</div>
                <h4>Top Startup Mentor Program</h4>
                <p>Business Coaching Institute</p>
                <div class="award-year">2023</div>
            </div>
            <div class="award-card redesigned-award-card" style="background:#fff;border-radius:1rem;box-shadow:0 4px 24px rgba(79,142,247,0.07);padding:2rem 1.5rem;display:flex;flex-direction:column;align-items:center;">
                <div class="award-icon" aria-hidden="true">🌟</div>
                <h4>Entrepreneur's Choice Award</h4>
                <p>Small Business Community</p>
                <div class="award-year">2023</div>
            </div>
            <div class="award-card redesigned-award-card" style="background:#fff;border-radius:1rem;box-shadow:0 4px 24px rgba(79,142,247,0.07);padding:2rem 1.5rem;display:flex;flex-direction:column;align-items:center;">
                <div class="award-icon" aria-hidden="true">💎</div>
                <h4>Business Excellence Certified</h4>
                <p>Startup Success Institute</p>
                <div class="award-year">2022</div>
            </div>
        </div>
    </div>
</section>

<!-- Redesigned Call to Action -->
<section class="cta-section-fancy redesigned-cta-section" style="background:linear-gradient(120deg,#5a7cff 0%,#4F8EF7 50%,#6a82fb 100%);padding:5rem 0 3.5rem 0;padding: 10px;">
    <div class="container">
        <div class="cta-content-fancy redesigned-cta-content" style="max-width:700px;margin:auto;text-align:center;color:#fff;">
            <div class="cta-badge" style="display:inline-block;background:#fff;color:#4F8EF7;padding:0.7rem 2.2rem;border-radius:2rem;font-weight:700;margin-bottom:2.2rem;box-shadow:0 4px 24px rgba(79,142,247,0.13);letter-spacing:0.5px;font-size:1.08rem;">READY TO EXPERIENCE EXCELLENCE?</div>
            <h2 class="cta-title-fancy" style="font-size:2.6rem;font-weight:900;line-height:1.1;margin-bottom:1.2rem;letter-spacing:-1px;">Start Your <span class="gradient-text" style="background:linear-gradient(90deg,#fff,#e0e7ff 80%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">Service Journey</span></h2>
            <p class="cta-subtitle-fancy" style="font-size:1.22rem;margin-bottom:2.5rem;color:rgba(255,255,255,0.96);font-weight:500;text-shadow:0 2px 8px rgba(79,142,247,0.10);">Join thousands of satisfied clients who trust us with their service needs.</p>
            <div class="cta-buttons-fancy redesigned-cta-buttons" style="display:flex;gap:1.5rem;justify-content:center;margin-bottom:2.7rem;flex-wrap:wrap;">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-primary-fancy" style="background:#fff;color:#4F8EF7;font-weight:700;padding:0.9rem 2.2rem;border-radius:2rem;font-size:1.1rem;box-shadow:0 2px 12px rgba(79,142,247,0.10);transition:background 0.2s,color 0.2s;display:inline-flex;align-items:center;gap:0.5rem;">
                    GET STARTED TODAY <span style="font-size:1.3em;">→</span>
                </a>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn-secondary-fancy" style="background:rgba(255,255,255,0.18);color:#fff;font-weight:700;padding:0.9rem 2.2rem;border-radius:2rem;font-size:1.1rem;box-shadow:0 2px 12px rgba(79,142,247,0.10);transition:background 0.2s,color 0.2s;display:inline-flex;align-items:center;gap:0.5rem;backdrop-filter:blur(2px);">
                    EXPLORE SERVICES <span style="font-size:1.3em;">🛠️</span>
                </a>
            </div>
            <div class="cta-trust-indicators redesigned-cta-trust" style="display:flex;gap:2rem;justify-content:center;margin-top:1.5rem;flex-wrap:wrap;">
                <div class="trust-item" style="background:#fff;color:#4F8EF7;display:flex;align-items:center;gap:0.7rem;padding:1.1rem 2rem;border-radius:1.2rem;box-shadow:0 6px 32px rgba(79,142,247,0.13);font-weight:700;font-size:1.13rem;min-width:180px;justify-content:center;">
                    <span class="trust-icon" aria-hidden="true" style="font-size:1.5rem;">🆓</span>
                    <span>Free Consultation</span>
                </div>
                <div class="trust-item" style="background:#fff;color:#4F8EF7;display:flex;align-items:center;gap:0.7rem;padding:1.1rem 2rem;border-radius:1.2rem;box-shadow:0 6px 32px rgba(79,142,247,0.13);font-weight:700;font-size:1.13rem;min-width:180px;justify-content:center;">
                    <span class="trust-icon" aria-hidden="true" style="font-size:1.5rem;">🔒</span>
                    <span>Fully Insured</span>
                </div>
                <div class="trust-item" style="background:#fff;color:#4F8EF7;display:flex;align-items:center;gap:0.7rem;padding:1.1rem 2rem;border-radius:1.2rem;box-shadow:0 6px 32px rgba(79,142,247,0.13);font-weight:700;font-size:1.13rem;min-width:180px;justify-content:center;">
                    <span class="trust-icon" aria-hidden="true" style="font-size:1.5rem;">💯</span>
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
            this.style.transform = 'translateY(-10px)';
            this.style.boxShadow = '0 20px 40px rgba(102, 126, 234, 0.2)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 10px 30px rgba(0, 0, 0, 0.1)';
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
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);
        });
    });
});
</script>

<?php get_footer(); ?>
