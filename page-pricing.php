<?php
/*
Template Name: Pricing Page
*/
get_header(); ?>

<!-- Enhanced Pricing Hero Section -->
<section class="hero-section-advanced pricing-hero">
    <div class="hero-overlay"></div>
    <div class="hero-particles"></div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge">💰 Transparent Pricing</div>
            <h1 class="hero-title-fancy">Service <span class="gradient-text">Pricing</span></h1>
            <p class="hero-subtitle-fancy">Transparent rates for every service category. No hidden fees, no surprises - just honest pricing for exceptional service.</p>
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number" data-count="0">0</div>
                    <div class="stat-label">Hidden Fees</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="100">0</div>
                    <div class="stat-label">% Transparent</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="50">0</div>
                    <div class="stat-label">+ Services</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="9">0</div>
                    <div class="stat-label">Categories</div>
                </div>
            </div>
            <div class="hero-buttons">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-primary-fancy">
                    <span>Get Quote</span>
                    <i class="arrow-right">→</i>
                </a>
                <a href="#pricing-categories" class="btn-secondary-fancy">
                    <span>View Pricing</span>
                    <i class="scroll-icon">📋</i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Enhanced Service Categories & Pricing -->
<section class="services-section-fancy pricing-categories-section" id="pricing-categories">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Service Categories</div>
            <h2 class="section-title-fancy">Choose Your <span class="gradient-text">Service Category</span></h2>
            <p class="section-subtitle-fancy">Browse our comprehensive range of services organized by category</p>
        </div>
        
        <div class="blueprints-grid categories-grid">
            <!-- Enhanced Home & Cleaning Services -->
            <div class="blueprint-category-card category-card">
                <div class="category-icon">🧹</div>
                <h3 class="category-title">Home & Cleaning Services</h3>
                <p class="category-description">Professional cleaning and maintenance for your home</p>
                <ul class="service-list">
                    <li><span class="service-item">House cleaning</span></li>
                    <li><span class="service-item">Move-in/move-out cleaning</span></li>
                    <li><span class="service-item">Pressure washing</span></li>
                    <li><span class="service-item">Gutter cleaning</span></li>
                    <li><span class="service-item">Window cleaning</span></li>
                    <li><span class="service-item">Carpet shampooing</span></li>
                    <li><span class="service-item">Garage/attic organization</span></li>
                    <li><span class="service-item">Trash hauling & junk removal</span></li>
                    <li><span class="service-item">Airbnb cleaning & reset services</span></li>
                    <li><span class="service-item">Lawn mowing and yard maintenance</span></li>
                </ul>
                <div class="category-pricing">
                    <span class="price-range">$25 - $200</span>
                    <span class="price-unit">per service</span>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="category-btn">Get Quote</a>
            </div>

            <!-- Enhanced Home & Property Maintenance -->
            <div class="blueprint-category-card category-card">
                <div class="category-icon">🧰</div>
                <h3 class="category-title">Home & Property Maintenance</h3>
                <p class="category-description">Expert maintenance and repair services</p>
                <ul class="service-list">
                    <li><span class="service-item">Furniture assembly</span></li>
                    <li><span class="service-item">TV mounting</span></li>
                    <li><span class="service-item">Handyman services (minor, non-structural repairs)</span></li>
                    <li><span class="service-item">Fence painting</span></li>
                    <li><span class="service-item">Light bulb/fixture installation</span></li>
                    <li><span class="service-item">Basic drywall patching</span></li>
                    <li><span class="service-item">Mailbox installation</span></li>
                    <li><span class="service-item">Holiday light hanging</span></li>
                    <li><span class="service-item">Lockout assistance (not locksmithing)</span></li>
                    <li><span class="service-item">Pool cleaning</span></li>
                </ul>
                <div class="category-pricing">
                    <span class="price-range">$40 - $150</span>
                    <span class="price-unit">per hour</span>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="category-btn">Get Quote</a>
            </div>

            <!-- Enhanced Personal Errands & Concierge -->
            <div class="blueprint-category-card category-card">
                <div class="category-icon">🛍️</div>
                <h3 class="category-title">Personal Errands & Concierge</h3>
                <p class="category-description">Personal assistance and concierge services</p>
                <ul class="service-list">
                    <li><span class="service-item">Grocery shopping/delivery</span></li>
                    <li><span class="service-item">Prescription pickup</span></li>
                    <li><span class="service-item">Waiting-in-line service</span></li>
                    <li><span class="service-item">Personal assistant service</span></li>
                    <li><span class="service-item">Moving assistance (loading/unloading, not truck rental)</span></li>
                    <li><span class="service-item">Courier/delivery services</span></li>
                    <li><span class="service-item">Dog waste cleanup</span></li>
                    <li><span class="service-item">Packing/unpacking service</span></li>
                    <li><span class="service-item">Decluttering service</span></li>
                    <li><span class="service-item">Plant watering (for traveling homeowners)</span></li>
                </ul>
                <div class="category-pricing">
                    <span class="price-range">$20 - $75</span>
                    <span class="price-unit">per hour</span>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="category-btn">Get Quote</a>
            </div>

            <!-- Enhanced Pet & Animal Services -->
            <div class="blueprint-category-card category-card">
                <div class="category-icon">🐶</div>
                <h3 class="category-title">Pet & Animal Services</h3>
                <p class="category-description">Caring services for your furry friends</p>
                <ul class="service-list">
                    <li><span class="service-item">Dog walking</span></li>
                    <li><span class="service-item">Pet sitting</span></li>
                    <li><span class="service-item">Mobile pet grooming (if not cutting hair professionally)</span></li>
                    <li><span class="service-item">Pet poop scooping service</span></li>
                    <li><span class="service-item">Pet taxi (transporting pets to vet/groomer)</span></li>
                    <li><span class="service-item">Aquarium cleaning</span></li>
                    <li><span class="service-item">Pet yard deodorizing</span></li>
                </ul>
                <div class="category-pricing">
                    <span class="price-range">$15 - $100</span>
                    <span class="price-unit">per service</span>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="category-btn">Get Quote</a>
            </div>

            <!-- Enhanced Child & Family Support -->
            <div class="blueprint-category-card category-card">
                <div class="category-icon">👶</div>
                <h3 class="category-title">Child & Family Support</h3>
                <p class="category-description">Trusted support for busy families</p>
                <ul class="service-list">
                    <li><span class="service-item">Parent helper/mother's helper</span></li>
                    <li><span class="service-item">Babysitting (unlicensed, informal, often under hourly limits)</span></li>
                    <li><span class="service-item">Toy organization service</span></li>
                    <li><span class="service-item">Home safety baby-proofing</span></li>
                    <li><span class="service-item">Birthday party setup & hosting</span></li>
                </ul>
                <div class="category-pricing">
                    <span class="price-range">$15 - $250</span>
                    <span class="price-unit">per hour/service</span>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="category-btn">Get Quote</a>
            </div>

            <!-- Enhanced Creative & Digital Services -->
            <div class="blueprint-category-card category-card">
                <div class="category-icon">🎨</div>
                <h3 class="category-title">Creative & Digital Services</h3>
                <p class="category-description">Professional creative and digital solutions</p>
                <ul class="service-list">
                    <li><span class="service-item">Graphic design</span></li>
                    <li><span class="service-item">Social media management</span></li>
                    <li><span class="service-item">Content writing/blogging</span></li>
                    <li><span class="service-item">Photography (no certification required for general use)</span></li>
                    <li><span class="service-item">Videography for events</span></li>
                    <li><span class="service-item">Logo design</span></li>
                    <li><span class="service-item">Resume writing</span></li>
                    <li><span class="service-item">Voiceover work</span></li>
                    <li><span class="service-item">T-shirt & merch design</span></li>
                    <li><span class="service-item">Basic website setup (Wix/Shopify)</span></li>
                </ul>
                <div class="category-pricing">
                    <span class="price-range">$50 - $500</span>
                    <span class="price-unit">per project</span>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="category-btn">Get Quote</a>
            </div>

            <!-- Enhanced Coaching & Consulting -->
            <div class="blueprint-category-card category-card">
                <div class="category-icon">🎓</div>
                <h3 class="category-title">Coaching & Consulting</h3>
                <p class="category-description">Professional coaching and consulting services</p>
                <ul class="service-list">
                    <li><span class="service-item">Business coaching</span></li>
                    <li><span class="service-item">Life coaching</span></li>
                    <li><span class="service-item">Marketing consulting</span></li>
                    <li><span class="service-item">Social media consulting</span></li>
                    <li><span class="service-item">Relationship coaching</span></li>
                    <li><span class="service-item">Productivity/time management coaching</span></li>
                    <li><span class="service-item">Accountability coaching</span></li>
                    <li><span class="service-item">Confidence or public speaking coaching</span></li>
                </ul>
                <div class="category-pricing">
                    <span class="price-range">$75 - $300</span>
                    <span class="price-unit">per session</span>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="category-btn">Get Quote</a>
            </div>

            <!-- Enhanced Office & Admin Services -->
            <div class="blueprint-category-card category-card">
                <div class="category-icon">💼</div>
                <h3 class="category-title">Office & Admin Services</h3>
                <p class="category-description">Professional administrative support</p>
                <ul class="service-list">
                    <li><span class="service-item">Virtual assistant</span></li>
                    <li><span class="service-item">Data entry</span></li>
                    <li><span class="service-item">Email inbox management</span></li>
                    <li><span class="service-item">Transcription services</span></li>
                    <li><span class="service-item">Online research assistant</span></li>
                    <li><span class="service-item">Bookkeeping (note: CPA not required unless advertising as accountant)</span></li>
                    <li><span class="service-item">CRM/data organization setup</span></li>
                    <li><span class="service-item">Cold calling or appointment setting</span></li>
                    <li><span class="service-item">Customer service outsourcing</span></li>
                    <li><span class="service-item">Print-on-demand order management</span></li>
                </ul>
                <div class="category-pricing">
                    <span class="price-range">$15 - $60</span>
                    <span class="price-unit">per hour</span>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="category-btn">Get Quote</a>
            </div>

            <!-- Enhanced Selling, Flipping & Setup -->
            <div class="blueprint-category-card category-card">
                <div class="category-icon">📦</div>
                <h3 class="category-title">Selling, Flipping & Setup</h3>
                <p class="category-description">Business setup and selling solutions</p>
                <ul class="service-list">
                    <li><span class="service-item">Furniture flipping</span></li>
                    <li><span class="service-item">Product sourcing for others</span></li>
                    <li><span class="service-item">Drop-off eBay/Amazon seller (you sell items for others)</span></li>
                    <li><span class="service-item">Home office or gaming setup installer</span></li>
                    <li><span class="service-item">Party rental setup (tables, chairs, bounce houses – no operator)</span></li>
                </ul>
                <div class="category-pricing">
                    <span class="price-range">$100 - $800</span>
                    <span class="price-unit">per project</span>
                </div>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="category-btn">Get Quote</a>
            </div>
        </div>
    </div>
</section>

<!-- Enhanced FAQ Section -->
<section class="featured-blueprints-section faq-section">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Common Questions</div>
            <h2 class="section-title-fancy">Pricing <span class="gradient-text">FAQs</span></h2>
            <p class="section-subtitle-fancy">Get answers to the most frequently asked questions about our pricing</p>
        </div>
        
        <div class="faq-grid">
            <?php
            // Query Pricing FAQ posts
            $pricing_faq_query = new WP_Query(array(
                'post_type' => 'pricing-faq',
                'posts_per_page' => -1,
                'post_status' => 'publish',
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'meta_query' => array(
                    'relation' => 'OR',
                    array(
                        'key' => 'pricing_faq_category',
                        'value' => 'pricing',
                        'compare' => 'LIKE'
                    ),
                    array(
                        'key' => 'pricing_faq_category',
                        'value' => 'payment',
                        'compare' => 'LIKE'
                    ),
                    array(
                        'key' => 'pricing_faq_category',
                        'compare' => 'NOT EXISTS'
                    )
                )
            ));

            if ($pricing_faq_query->have_posts()) :
                while ($pricing_faq_query->have_posts()) : $pricing_faq_query->the_post(); ?>
                    <div class="faq-item">
                        <div class="faq-question">
                            <h4><?php the_title(); ?></h4>
                            <span class="faq-toggle">+</span>
                        </div>
                        <div class="faq-answer">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile;
            else : ?>
                <!-- Fallback FAQ content if no Pricing FAQ posts exist -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>How do you determine pricing for each service?</h4>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Our pricing is based on factors like service complexity, time required, materials needed, and market rates. We provide transparent quotes before any work begins.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Are there any hidden fees?</h4>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>No, we believe in complete transparency. All costs are clearly outlined in your quote, including any travel fees, materials, or additional charges.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Do you offer package deals or discounts?</h4>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes! We offer discounts for recurring services, multiple service bookings, and seasonal promotions. Contact us to learn about current offers.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>What payment methods do you accept?</h4>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>We accept cash, credit cards, debit cards, and digital payments like Venmo, PayPal, and Zelle for your convenience.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Is there a minimum service charge?</h4>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Some services have minimum charges to cover travel time and setup. These are clearly communicated during the quote process.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Can I get a custom quote for services not listed?</h4>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Absolutely! We're happy to provide custom quotes for unique services or special requests. Just contact us with your specific needs.</p>
                    </div>
                </div>

                <!-- Admin notice for Pricing FAQ management -->
                <?php if (current_user_can('manage_options')) : ?>
                    <div class="col-12">
                        <div class="alert alert-info mt-4" role="alert">
                            <i class="bi bi-info-circle me-2"></i>
                            <strong>Admin Notice:</strong>
                            No Pricing FAQ posts found. You can add pricing FAQ content from the
                            <a href="<?php echo admin_url('edit.php?post_type=pricing-faq'); ?>" class="alert-link">Pricing FAQ admin panel</a>.
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<!-- Enhanced Call to Action -->
<section class="cta-section-fancy">
    <div class="container">
        <div class="cta-content-fancy">
            <div class="cta-badge">Ready to Get Started?</div>
            <h2 class="cta-title-fancy">Get Your <span class="gradient-text">Free Quote Today</span></h2>
            <p class="cta-subtitle-fancy">Contact us now for a personalized quote tailored to your specific service needs.</p>
            <div class="cta-buttons-fancy">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-primary-fancy">
                    <span>Get Free Quote</span>
                    <i class="arrow-right">→</i>
                </a>
                <a href="tel:+1234567890" class="btn-secondary-fancy">
                    <span>Call for Pricing</span>
                    <i class="phone-icon">📞</i>
                </a>
            </div>
            <div class="cta-trust-indicators">
                <div class="trust-item">
                    <span class="trust-icon">🆓</span>
                    <span>Free Consultation</span>
                </div>
                <div class="trust-item">
                    <span class="trust-icon">🔒</span>
                    <span>Fixed Pricing</span>
                </div>
                <div class="trust-item">
                    <span class="trust-icon">💯</span>
                    <span>No Hidden Fees</span>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Enhanced JavaScript for pricing page
document.addEventListener('DOMContentLoaded', function() {
    // FAQ accordion functionality
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        const toggle = item.querySelector('.faq-toggle');
        
        if (question) {
            question.addEventListener('click', function() {
                const isActive = item.classList.contains('active');
                
                // Close all other items
                faqItems.forEach(otherItem => {
                    otherItem.classList.remove('active');
                    const otherToggle = otherItem.querySelector('.faq-toggle');
                    if (otherToggle) otherToggle.textContent = '+';
                });
                
                // Toggle current item
                if (!isActive) {
                    item.classList.add('active');
                    if (toggle) toggle.textContent = '-';
                } else {
                    if (toggle) toggle.textContent = '+';
                }
            });
        }
    });
    
    // Smooth scrolling for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
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
    
    // Add hover effects to category cards
    const categoryCards = document.querySelectorAll('.category-card');
    categoryCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>

<?php get_footer(); ?>
