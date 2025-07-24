<?php get_header(); ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1><?php echo esc_html(get_theme_mod('hero_title', 'Professional Home & Cleaning Services')); ?></h1>
            <p><?php echo esc_html(get_theme_mod('hero_subtitle', 'Reliable, professional services for your home and lifestyle needs. From cleaning to maintenance, errands to pet care - we\'ve got you covered!')); ?></p>
            <a href="<?php echo esc_url(get_theme_mod('hero_button_url', '#contact')); ?>" class="cta-button">
                <?php echo esc_html(get_theme_mod('hero_button_text', 'Get Started Today')); ?>
            </a>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section" id="services">
    <div class="container">
        <h2 class="section-title">Our Services</h2>
        <p class="section-subtitle">We offer a comprehensive range of professional services to make your life easier and your home better maintained.</p>
        
        <div class="services-grid">
            <?php 
            $service_categories = get_service_categories_with_icons();
            foreach ($service_categories as $category_key => $category) : 
            ?>
                <div class="service-category">
                    <h3>
                        <span class="service-icon"><?php echo $category['icon']; ?></span>
                        <?php echo esc_html($category['title']); ?>
                    </h3>
                    <ul class="service-list">
                        <?php foreach ($category['services'] as $service) : ?>
                            <li><?php echo esc_html($service); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section" id="about">
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <h2>Why Choose Our Services?</h2>
                <p>We are your trusted local service professionals, dedicated to providing reliable, high-quality services that save you time and give you peace of mind. Our team is experienced, insured, and committed to excellence in every job we undertake.</p>
                
                <ul class="about-features">
                    <li>Licensed & Insured Professionals</li>
                    <li>Flexible Scheduling Options</li>
                    <li>Competitive & Transparent Pricing</li>
                    <li>100% Satisfaction Guarantee</li>
                    <li>Emergency & Same-Day Services Available</li>
                    <li>Eco-Friendly Cleaning Options</li>
                    <li>Background-Checked Team Members</li>
                    <li>Free Estimates & Consultations</li>
                </ul>
                
                <p>Whether you need regular house cleaning, one-time deep cleaning, handyman services, pet care, or personal assistance, we have the expertise and dedication to get the job done right.</p>
            </div>
            
            <div class="about-image">
                <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 400px; border-radius: 15px; display: flex; align-items: center; justify-content: center; color: white; font-size: 4rem;">
                    🏠✨
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section" id="contact">
    <div class="container">
        <h2 class="section-title" style="color: white;">Get In Touch</h2>
        <p class="section-subtitle" style="color: rgba(255,255,255,0.9);">Ready to get started? Contact us today for a free estimate or to schedule your service.</p>
        
        <div class="contact-info">
            <div class="contact-item">
                <h3>📞 Call Us</h3>
                <?php if (get_theme_mod('contact_phone')) : ?>
                    <p><a href="tel:<?php echo esc_attr(str_replace(array(' ', '(', ')', '-'), '', get_theme_mod('contact_phone'))); ?>" style="color: white; font-size: 1.2rem; font-weight: bold;">
                        <?php echo esc_html(get_theme_mod('contact_phone')); ?>
                    </a></p>
                <?php endif; ?>
                <p>Available 7 days a week for consultations</p>
            </div>
            
            <div class="contact-item">
                <h3>✉️ Email Us</h3>
                <?php if (get_theme_mod('contact_email')) : ?>
                    <p><a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email')); ?>" style="color: white; font-size: 1.2rem; font-weight: bold;">
                        <?php echo esc_html(get_theme_mod('contact_email')); ?>
                    </a></p>
                <?php endif; ?>
                <p>We'll respond within 24 hours</p>
            </div>
            
            <div class="contact-item">
                <h3>📍 Service Area</h3>
                <?php if (get_theme_mod('contact_address')) : ?>
                    <p><?php echo esc_html(get_theme_mod('contact_address')); ?></p>
                <?php endif; ?>
                <p>Serving the greater metropolitan area</p>
            </div>
            
            <div class="contact-item">
                <h3>⏰ Quick Response</h3>
                <p><strong>Emergency Services Available</strong></p>
                <p>Same-day service for urgent needs</p>
                <p>Free estimates & consultations</p>
            </div>
        </div>
    </div>
</section>

<!-- Recent Blog Posts (if any) -->
<?php
$recent_posts = new WP_Query(array(
    'posts_per_page' => 3,
    'post_status' => 'publish'
));

if ($recent_posts->have_posts()) :
?>
<section class="blog-section" style="padding: 4rem 0; background: #f8f9fa;">
    <div class="container">
        <h2 class="section-title">Latest News & Tips</h2>
        <div class="blog-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-top: 3rem;">
            <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                <article class="blog-card" style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="blog-image" style="margin-bottom: 1rem;">
                            <?php the_post_thumbnail('medium', array('style' => 'width: 100%; height: 200px; object-fit: cover; border-radius: 10px;')); ?>
                        </div>
                    <?php endif; ?>
                    <h3 style="margin-bottom: 1rem;"><a href="<?php the_permalink(); ?>" style="color: #333; text-decoration: none;"><?php the_title(); ?></a></h3>
                    <p style="color: #666; margin-bottom: 1rem;"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn">Read More</a>
                </article>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php 
wp_reset_postdata();
endif; 
?>

<?php get_footer(); ?>
