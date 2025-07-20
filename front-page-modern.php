<?php
/**
 * Template Name: Modern Home Page
 * 
 * A modern, responsive home page template with enhanced features.
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <span class="hero-badge">Business Blueprints</span>
            <h1 class="hero-title">Discover <span class="text-gradient">75 Proven</span> Business Blueprints</h1>
            <p class="hero-subtitle">Launch your entrepreneurial journey with detailed startup guides, cost analysis, and step-by-step implementation plans.</p>
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number">75+</div>
                    <div class="stat-label">Business Models</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">$1K-50K</div>
                    <div class="stat-label">Startup Range</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">100%</div>
                    <div class="stat-label">Detailed Plans</div>
                </div>
            </div>
            <div class="hero-buttons">
                <a href="#categories" class="btn btn-primary btn-lg">Explore Blueprints</a>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-outline btn-lg">Get Started</a>
            </div>
        </div>
        <div class="hero-image">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/hero-image.svg" alt="Business Blueprint Illustration" class="animate-on-scroll" data-animation="fade-in">
        </div>
    </div>
    <div class="hero-shape"></div>
</section>

<!-- Categories Section -->
<section id="categories" class="categories-section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">Our Categories</span>
            <h2 class="section-title">Business <span class="text-gradient">Blueprint Categories</span></h2>
            <p class="section-subtitle">Explore profitable business opportunities across diverse industries and investment levels</p>
        </div>
        
        <div class="categories-grid">
            <!-- Online & Digital Businesses -->
            <div class="category-card animate-on-scroll" data-animation="slide-up">
                <div class="category-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                </div>
                <h3 class="category-title">Online & Digital</h3>
                <p class="category-description">Low-cost, high-scalability digital business models</p>
                <div class="category-meta">
                    <div class="meta-item">
                        <span class="meta-label">Blueprints:</span>
                        <span class="meta-value">15</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Startup:</span>
                        <span class="meta-value">$500 - $5,000</span>
                    </div>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('online-digital-blueprints'))); ?>" class="btn btn-outline">View Blueprints</a>
            </div>
            
            <!-- Service-Based Businesses -->
            <div class="category-card featured animate-on-scroll" data-animation="slide-up">
                <div class="popular-badge">Most Popular</div>
                <div class="category-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </div>
                <h3 class="category-title">Service-Based</h3>
                <p class="category-description">Skill-based businesses with immediate income potential</p>
                <div class="category-meta">
                    <div class="meta-item">
                        <span class="meta-label">Blueprints:</span>
                        <span class="meta-value">20</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Startup:</span>
                        <span class="meta-value">$1,000 - $10,000</span>
                    </div>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('service-based-blueprints'))); ?>" class="btn btn-primary">View Blueprints</a>
            </div>
            
            <!-- E-commerce & Retail -->
            <div class="category-card animate-on-scroll" data-animation="slide-up">
                <div class="category-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                </div>
                <h3 class="category-title">E-commerce & Retail</h3>
                <p class="category-description">Product-based businesses for the digital marketplace</p>
                <div class="category-meta">
                    <div class="meta-item">
                        <span class="meta-label">Blueprints:</span>
                        <span class="meta-value">12</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Startup:</span>
                        <span class="meta-value">$2,000 - $15,000</span>
                    </div>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('ecommerce-retail-blueprints'))); ?>" class="btn btn-outline">View Blueprints</a>
            </div>
        </div>
        
        <div class="categories-cta">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn btn-primary">View All Categories</a>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="process-section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">How It Works</span>
            <h2 class="section-title">Your Path to <span class="text-gradient">Business Success</span></h2>
            <p class="section-subtitle">Our comprehensive blueprint process takes you from idea to implementation</p>
        </div>
        
        <div class="process-steps">
            <div class="process-step animate-on-scroll" data-animation="fade-in">
                <div class="step-number">1</div>
                <div class="step-content">
                    <div class="step-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </div>
                    <h3>Choose Your Blueprint</h3>
                    <p>Browse 75 detailed business blueprints across various industries and investment levels</p>
                </div>
            </div>
            
            <div class="process-step animate-on-scroll" data-animation="fade-in">
                <div class="step-number">2</div>
                <div class="step-content">
                    <div class="step-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                    </div>
                    <h3>Review Profitability</h3>
                    <p>Get detailed profit analysis, startup costs, and market potential for each business</p>
                </div>
            </div>
            
            <div class="process-step animate-on-scroll" data-animation="fade-in">
                <div class="step-number">3</div>
                <div class="step-content">
                    <div class="step-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    </div>
                    <h3>Follow the Plan</h3>
                    <p>Step-by-step implementation guide with timelines, resources, and milestones</p>
                </div>
            </div>
            
            <div class="process-step animate-on-scroll" data-animation="fade-in">
                <div class="step-number">4</div>
                <div class="step-content">
                    <div class="step-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    </div>
                    <h3>Launch & Scale</h3>
                    <p>Execute your business plan and scale using our proven growth strategies</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Blueprints Section -->
<section class="featured-section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">Featured This Month</span>
            <h2 class="section-title">Top Performing <span class="text-gradient">Business Blueprints</span></h2>
            <p class="section-subtitle">Our most successful and in-demand business models</p>
        </div>
        
        <div class="featured-grid">
            <div class="featured-card animate-on-scroll" data-animation="slide-up">
                <div class="card-badge">Digital</div>
                <h3 class="card-title">Social Media Agency</h3>
                <div class="card-metrics">
                    <div class="metric">
                        <span class="metric-label">Startup Cost</span>
                        <span class="metric-value">$2,500</span>
                    </div>
                    <div class="metric">
                        <span class="metric-label">Monthly Profit</span>
                        <span class="metric-value">$8,000+</span>
                    </div>
                </div>
                <p class="card-description">Help businesses grow their social media presence with proven marketing strategies.</p>
                <ul class="card-features">
                    <li>Low startup costs</li>
                    <li>Remote-friendly business</li>
                    <li>Recurring revenue model</li>
                </ul>
                <a href="#" class="btn btn-outline">View Blueprint</a>
            </div>
            
            <div class="featured-card popular animate-on-scroll" data-animation="slide-up">
                <div class="card-badge popular">Service</div>
                <h3 class="card-title">Home Cleaning Service</h3>
                <div class="card-metrics">
                    <div class="metric">
                        <span class="metric-label">Startup Cost</span>
                        <span class="metric-value">$3,000</span>
                    </div>
                    <div class="metric">
                        <span class="metric-label">Monthly Profit</span>
                        <span class="metric-value">$12,000+</span>
                    </div>
                </div>
                <p class="card-description">Recurring revenue business with high demand and excellent profit margins.</p>
                <ul class="card-features">
                    <li>High profit margins</li>
                    <li>Always in demand</li>
                    <li>Easy to scale</li>
                </ul>
                <a href="#" class="btn btn-primary">View Blueprint</a>
            </div>
            
            <div class="featured-card animate-on-scroll" data-animation="slide-up">
                <div class="card-badge">E-commerce</div>
                <h3 class="card-title">Dropshipping Store</h3>
                <div class="card-metrics">
                    <div class="metric">
                        <span class="metric-label">Startup Cost</span>
                        <span class="metric-value">$1,500</span>
                    </div>
                    <div class="metric">
                        <span class="metric-label">Monthly Profit</span>
                        <span class="metric-value">$6,000+</span>
                    </div>
                </div>
                <p class="card-description">Low-risk e-commerce model with no inventory requirements and global reach.</p>
                <ul class="card-features">
                    <li>No inventory needed</li>
                    <li>Location independent</li>
                    <li>Automated operations</li>
                </ul>
                <a href="#" class="btn btn-outline">View Blueprint</a>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">Success Stories</span>
            <h2 class="section-title">Real Results from <span class="text-gradient">Our Blueprints</span></h2>
            <p class="section-subtitle">See how entrepreneurs transformed their lives with our proven business blueprints</p>
        </div>
        
        <div class="testimonials-slider">
            <div class="testimonial-card animate-on-scroll" data-animation="fade-in">
                <div class="testimonial-rating">
                    <span class="stars">★★★★★</span>
                    <span class="rating-text">5.0</span>
                </div>
                <div class="testimonial-content">
                    <p>"The Social Media Agency blueprint completely changed my life. In just 6 months, I went from unemployed to running a $15K/month business. The step-by-step guide was incredibly detailed and the support was amazing!"</p>
                </div>
                <div class="testimonial-author">
                    <div class="author-image">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/testimonial-1.jpg" alt="Sarah Martinez">
                    </div>
                    <div class="author-info">
                        <h4>Sarah Martinez</h4>
                        <p>Digital Marketing Agency Owner</p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card animate-on-scroll" data-animation="fade-in">
                <div class="testimonial-rating">
                    <span class="stars">★★★★★</span>
                    <span class="rating-text">5.0</span>
                </div>
                <div class="testimonial-content">
                    <p>"I started my cleaning service with their blueprint and now have 50+ recurring clients. The profit projections were spot on and the business model is incredibly solid!"</p>
                </div>
                <div class="testimonial-author">
                    <div class="author-image">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/testimonial-2.jpg" alt="Mike Johnson">
                    </div>
                    <div class="author-info">
                        <h4>Mike Johnson</h4>
                        <p>Cleaning Service Owner</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="testimonials-stats">
            <div class="stat-item animate-on-scroll" data-animation="slide-up">
                <div class="stat-number">150+</div>
                <div class="stat-label">Businesses Launched</div>
            </div>
            <div class="stat-item animate-on-scroll" data-animation="slide-up">
                <div class="stat-number">$2.3M+</div>
                <div class="stat-label">Revenue Generated</div>
            </div>
            <div class="stat-item animate-on-scroll" data-animation="slide-up">
                <div class="stat-number">89%</div>
                <div class="stat-label">Success Rate</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content animate-on-scroll" data-animation="fade-in">
            <h2 class="cta-title">Ready to Start Your <span class="text-gradient">Business Journey?</span></h2>
            <p class="cta-subtitle">Join thousands of successful entrepreneurs who started with our proven business blueprints</p>
            <div class="cta-buttons">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn btn-primary btn-lg">Browse All 75 Blueprints</a>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-outline btn-lg">Get Consultation</a>
            </div>
            <div class="cta-features">
                <div class="feature-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    <span>Proven Profitable</span>
                </div>
                <div class="feature-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    <span>Step-by-Step Guides</span>
                </div>
                <div class="feature-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    <span>Real Success Stories</span>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Modern Home Page Styles */
:root {
    --primary: #4361ee;
    --primary-dark: #3a56d4;
    --secondary: #7209b7;
    --accent: #f72585;
}

/* Hero Section */
.hero-section {
    position: relative;
    padding: 6rem 0;
    background: linear-gradient(135deg, #f8f9ff 0%, #e8f2ff 100%);
    overflow: hidden;
}

.hero-content {
    max-width: 600px;
    position: relative;
    z-index: 2;
}

.hero-badge {
    display: inline-block;
    background: rgba(67, 97, 238, 0.1);
    color: var(--primary);
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 1.5rem;
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 1.5rem;
    color: var(--gray-900);
}

.text-gradient {
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    color: transparent;
}

.hero-subtitle {
    font-size: 1.25rem;
    color: var(--gray-700);
    margin-bottom: 2rem;
    line-height: 1.6;
}

.hero-stats {
    display: flex;
    gap: 2rem;
    margin-bottom: 2rem;
}

.stat-item {
    text-align: center;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 0.9rem;
    color: var(--gray-600);
}

.hero-buttons {
    display: flex;
    gap: 1rem;
}

.hero-image {
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 45%;
    max-width: 600px;
    z-index: 1;
}

.hero-shape {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100px;
    background: #fff;
    clip-path: polygon(0 100%, 100% 100%, 100% 0);
}

/* Categories Section */
.categories-section {
    padding: 6rem 0;
}

.section-header {
    text-align: center;
    margin-bottom: 4rem;
}

.section-badge {
    display: inline-block;
    background: rgba(67, 97, 238, 0.1);
    color: var(--primary);
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 1rem;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 1rem;
    color: var(--gray-900);
}

.section-subtitle {
    font-size: 1.1rem;
    color: var(--gray-700);
    max-width: 700px;
    margin: 0 auto;
}

.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.category-card {
    background: #fff;
    border-radius: 1rem;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.category-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
}

.category-card.featured {
    border: 2px solid var(--primary);
}

.popular-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: var(--primary);
    color: #fff;
    padding: 0.25rem 0.75rem;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 600;
}

.category-icon {
    width: 80px;
    height: 80px;
    background: rgba(67, 97, 238, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
    color: var(--primary);
    transition: all 0.3s ease;
}

.category-card:hover .category-icon {
    transform: scale(1.1) rotate(5deg);
    background: var(--primary);
    color: #fff;
}

.category-title {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 0.75rem;
    color: var(--gray-900);
}

.category-description {
    color: var(--gray-700);
    margin-bottom: 1.5rem;
    line-height: 1.6;
}

.category-meta {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1.5rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid var(--gray-200);
}

.meta-item {
    display: flex;
    flex-direction: column;
}

.meta-label {
    font-size: 0.8rem;
    color: var(--gray-600);
    margin-bottom: 0.25rem;
}

.meta-value {
    font-weight: 600;
    color: var(--gray-900);
}

.categories-cta {
    text-align: center;
}

/* Process Section */
.process-section {
    padding: 6rem 0;
    background: linear-gradient(135deg, #f8f9ff 0%, #e8f2ff 100%);
    position: relative;
}

.process-steps {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
}

.process-step {
    position: relative;
    padding: 2rem;
    background: #fff;
    border-radius: 1rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.process-step:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
}

.step-number {
    position: absolute;
    top: -20px;
    left: 2rem;
    width: 40px;
    height: 40px;
    background: var(--primary);
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.25rem;
}

.step-content {
    text-align: center;
}

.step-icon {
    width: 70px;
    height: 70px;
    background: rgba(67, 97, 238, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: var(--primary);
    transition: all 0.3s ease;
}

.process-step:hover .step-icon {
    transform: scale(1.1);
    background: var(--primary);
    color: #fff;
}

.step-content h3 {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 0.75rem;
    color: var(--gray-900);
}

.step-content p {
    color: var(--gray-700);
    line-height: 1.6;
}

/* Featured Section */
.featured-section {
    padding: 6rem 0;
}

.featured-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.featured-card {
    background: #fff;
    border-radius: 1rem;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    position: relative;
}

.featured-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
}

.featured-card.popular {
    border: 2px solid var(--primary);
}

.card-badge {
    display: inline-block;
    background: rgba(67, 97, 238, 0.1);
    color: var(--primary);
    padding: 0.25rem 0.75rem;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 600;
    margin-bottom: 1rem;
}

.card-badge.popular {
    background: var(--primary);
    color: #fff;
}

.card-title {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: var(--gray-900);
}

.card-metrics {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid var(--gray-200);
}

.card-description {
    color: var(--gray-700);
    margin-bottom: 1rem;
    line-height: 1.6;
}

.card-features {
    list-style: none;
    padding: 0;
    margin: 0 0 1.5rem;
}

.card-features li {
    position: relative;
    padding-left: 1.5rem;
    margin-bottom: 0.5rem;
    color: var(--gray-700);
}

.card-features li::before {
    content: "✓";
    position: absolute;
    left: 0;
    color: var(--primary);
    font-weight: 700;
}

/* Testimonials Section */
.testimonials-section {
    padding: 6rem 0;
    background: linear-gradient(135deg, #f8f9ff 0%, #e8f2ff 100%);
}

.testimonials-slider {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 4rem;
}

.testimonial-card {
    background: #fff;
    border-radius: 1rem;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.testimonial-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
}

.testimonial-rating {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
}

.stars {
    color: #ffc107;
    margin-right: 0.5rem;
}

.rating-text {
    font-weight: 600;
    color: var(--gray-900);
}

.testimonial-content {
    margin-bottom: 1.5rem;
}

.testimonial-content p {
    color: var(--gray-700);
    line-height: 1.6;
    font-style: italic;
}

.testimonial-author {
    display: flex;
    align-items: center;
}

.author-image {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 1rem;
}

.author-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.author-info h4 {
    margin: 0 0 0.25rem;
    font-size: 1rem;
    color: var(--gray-900);
}

.author-info p {
    margin: 0;
    font-size: 0.9rem;
    color: var(--gray-600);
}

.testimonials-stats {
    display: flex;
    justify-content: center;
    gap: 4rem;
    flex-wrap: wrap;
}

/* CTA Section */
.cta-section {
    padding: 6rem 0;
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    color: #fff;
}

.cta-content {
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
}

.cta-title {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 1rem;
}

.cta-subtitle {
    font-size: 1.25rem;
    margin-bottom: 2rem;
    opacity: 0.9;
}

.cta-buttons {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 2rem;
}

.cta-features {
    display: flex;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
}

.feature-item svg {
    color: #fff;
}

/* Responsive Styles */
@media (max-width: 992px) {
    .hero-title {
        font-size: 3rem;
    }
    
    .hero-image {
        width: 40%;
    }
    
    .section-title {
        font-size: 2.25rem;
    }
    
    .cta-title {
        font-size: 2.25rem;
    }
}

@media (max-width: 768px) {
    .hero-section {
        padding: 4rem 0;
    }
    
    .hero-content {
        max-width: 100%;
        text-align: center;
    }
    
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-subtitle {
        font-size: 1.1rem;
    }
    
    .hero-stats {
        justify-content: center;
    }
    
    .hero-buttons {
        justify-content: center;
    }
    
    .hero-image {
        position: relative;
        width: 80%;
        max-width: 400px;
        margin: 3rem auto 0;
        transform: none;
        top: auto;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .cta-title {
        font-size: 2rem;
    }
    
    .cta-buttons {
        flex-direction: column;
    }
}

@media (max-width: 576px) {
    .hero-section {
        padding: 3rem 0;
    }
    
    .hero-title {
        font-size: 2rem;
    }
    
    .hero-subtitle {
        font-size: 1rem;
    }
    
    .hero-stats {
        flex-direction: column;
        gap: 1rem;
    }
    
    .section-title {
        font-size: 1.75rem;
    }
    
    .cta-title {
        font-size: 1.75rem;
    }
    
    .cta-subtitle {
        font-size: 1.1rem;
    }
    
    .cta-features {
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animate elements on scroll
    const animateElements = document.querySelectorAll('.animate-on-scroll');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const animation = entry.target.dataset.animation || 'fade-in';
                entry.target.classList.add(animation);
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    
    animateElements.forEach(element => {
        observer.observe(element);
    });
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                const headerHeight = document.querySelector('.site-header')?.offsetHeight || 0;
                const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
});
</script>

<?php get_footer(); ?>