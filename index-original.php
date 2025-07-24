<?php
/**
 * Homepage Template
 * 
 * @package ServiceBlueprint
 */

get_header(); ?>

<!-- Hero Section -->
<section class="hero-section" role="banner">
    <div class="hero-content">
        <h1 class="hero-title">
            <?php echo esc_html(get_theme_mod('hero_title', 'Welcome to Our Services')); ?>
        </h1>
        <p class="hero-subtitle">
            <?php echo esc_html(get_theme_mod('hero_subtitle', 'Discover our comprehensive range of professional services')); ?>
        </p>
        <a href="<?php echo esc_url(get_theme_mod('hero_cta_url', '#services')); ?>" class="hero-cta">
            <?php echo esc_html(get_theme_mod('hero_cta_text', 'Explore Services')); ?>
        </a>
    </div>
    
    <!-- Animated background elements -->
    <div class="hero-animation">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        <div class="floating-shape shape-3"></div>
    </div>
</section>

<!-- SVG Divider -->
<div class="svg-divider">
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" fill="#f9fafb"></path>
    </svg>
</div>

<!-- Service Categories Grid -->
<section id="services" class="services-grid" role="main">
    <div class="container">
        <h2 class="section-title">Our Service Categories</h2>
        
        <div class="grid">
            <?php
            $service_categories = get_terms(array(
                'taxonomy' => 'service_category',
                'hide_empty' => false,
                'orderby' => 'name',
                'order' => 'ASC'
            ));
            
            if (!is_wp_error($service_categories) && !empty($service_categories)) :
                foreach ($service_categories as $category) :
                    $icon = get_term_meta($category->term_id, 'category_icon', true);
                    $category_link = get_term_link($category);
                    $services_count = $category->count;
            ?>
                <article class="service-card" data-category="<?php echo esc_attr($category->slug); ?>">
                    <?php if ($icon && get_theme_mod('show_category_icons', true)) : ?>
                        <span class="service-icon" aria-hidden="true"><?php echo esc_html($icon); ?></span>
                    <?php endif; ?>
                    
                    <h3><?php echo esc_html($category->name); ?></h3>
                    <p><?php echo esc_html($category->description); ?></p>
                    
                    <div class="service-meta">
                        <span class="services-count">
                            <?php printf(_n('%d service', '%d services', $services_count, 'service-blueprint'), $services_count); ?>
                        </span>
                    </div>
                    
                    <a href="<?php echo esc_url($category_link); ?>" class="service-link" 
                       aria-label="<?php printf(esc_attr__('View %s services', 'service-blueprint'), $category->name); ?>">
                        <?php esc_html_e('View Services', 'service-blueprint'); ?>
                    </a>
                </article>
            <?php 
                endforeach;
            else :
            ?>
                <div class="no-services-message">
                    <p><?php esc_html_e('No service categories found. Please add some services in the admin panel.', 'service-blueprint'); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Parallax Banner -->
<?php if (get_theme_mod('enable_parallax', true)) : ?>
<section class="parallax-banner" style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/images/service-banner-1.jpg'); ?>');" role="img" aria-label="<?php esc_attr_e('Service banner', 'service-blueprint'); ?>">
    <div class="parallax-content">
        <h2><?php esc_html_e('Professional Services You Can Trust', 'service-blueprint'); ?></h2>
        <p><?php esc_html_e('Quality, reliability, and excellence in every service we provide', 'service-blueprint'); ?></p>
    </div>
</section>
<?php endif; ?>

<!-- Testimonials Section -->
<section class="testimonials-section" role="region" aria-labelledby="testimonials-title">
    <div class="container">
        <h2 id="testimonials-title" class="section-title"><?php esc_html_e('What Our Clients Say', 'service-blueprint'); ?></h2>
        
        <div class="testimonials-carousel" data-autoplay="true" data-delay="5000">
            <?php
            // Get testimonials from a custom post type or use static content
            $testimonials = array(
                array(
                    'text' => 'Exceptional service quality and professional staff. They exceeded our expectations in every way.',
                    'author' => 'Sarah Johnson',
                    'role' => 'Homeowner'
                ),
                array(
                    'text' => 'Reliable, efficient, and always on time. I recommend their services to everyone.',
                    'author' => 'Michael Chen',
                    'role' => 'Business Owner'
                ),
                array(
                    'text' => 'Outstanding customer service and attention to detail. Five stars!',
                    'author' => 'Emily Rodriguez',
                    'role' => 'Property Manager'
                )
            );
            
            foreach ($testimonials as $index => $testimonial) :
            ?>
                <div class="testimonial" <?php echo $index === 0 ? 'style="display: block;"' : 'style="display: none;"'; ?>>
                    <blockquote class="testimonial-text">
                        "<?php echo esc_html($testimonial['text']); ?>"
                    </blockquote>
                    <cite class="testimonial-author">
                        <strong><?php echo esc_html($testimonial['author']); ?></strong>
                        <span class="testimonial-role"><?php echo esc_html($testimonial['role']); ?></span>
                    </cite>
                </div>
            <?php endforeach; ?>
            
            <!-- Testimonial navigation -->
            <div class="testimonial-nav">
                <?php for ($i = 0; $i < count($testimonials); $i++) : ?>
                    <button class="testimonial-dot <?php echo $i === 0 ? 'active' : ''; ?>" 
                            data-slide="<?php echo $i; ?>" 
                            aria-label="<?php printf(esc_attr__('Go to testimonial %d', 'service-blueprint'), $i + 1); ?>">
                    </button>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</section>

<!-- Featured Services -->
<section class="featured-services" role="region" aria-labelledby="featured-title">
    <div class="container">
        <h2 id="featured-title" class="section-title"><?php esc_html_e('Featured Services', 'service-blueprint'); ?></h2>
        
        <div class="featured-grid">
            <?php
            $featured_services = new WP_Query(array(
                'post_type' => 'service',
                'posts_per_page' => 6,
                'meta_query' => array(
                    array(
                        'key' => 'featured_service',
                        'value' => '1',
                        'compare' => '='
                    )
                )
            ));
            
            if ($featured_services->have_posts()) :
                while ($featured_services->have_posts()) : $featured_services->the_post();
            ?>
                <article class="featured-service-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="service-image">
                            <a href="<?php the_permalink(); ?>" aria-label="<?php printf(esc_attr__('Read more about %s', 'service-blueprint'), get_the_title()); ?>">
                                <?php the_post_thumbnail('service-thumbnail', array('alt' => get_the_title())); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <div class="service-content">
                        <h3 class="service-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        
                        <div class="service-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <div class="service-categories">
                            <?php
                            $categories = get_the_terms(get_the_ID(), 'service_category');
                            if ($categories && !is_wp_error($categories)) :
                                foreach ($categories as $category) :
                            ?>
                                <span class="service-category-tag">
                                    <?php echo esc_html($category->name); ?>
                                </span>
                            <?php endforeach; endif; ?>
                        </div>
                        
                        <a href="<?php the_permalink(); ?>" class="service-link">
                            <?php esc_html_e('Learn More', 'service-blueprint'); ?>
                        </a>
                    </div>
                </article>
            <?php 
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Another SVG Divider -->
<div class="svg-divider">
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="#667eea"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="#667eea"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="#667eea"></path>
    </svg>
</div>

<!-- Call to Action Section -->
<section class="cta-section" role="region" aria-labelledby="cta-title">
    <div class="container">
        <div class="cta-content">
            <h2 id="cta-title"><?php esc_html_e('Ready to Get Started?', 'service-blueprint'); ?></h2>
            <p><?php esc_html_e('Contact us today to discuss your service needs and get a personalized quote.', 'service-blueprint'); ?></p>
            <div class="cta-buttons">
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn btn-primary">
                    <?php esc_html_e('View All Services', 'service-blueprint'); ?>
                </a>
                <a href="<?php echo esc_url(get_page_link(get_option('page_on_front'))); ?>#contact" class="btn btn-secondary">
                    <?php esc_html_e('Contact Us', 'service-blueprint'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<style>
/* Additional styles for homepage */
.floating-shape {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    animation: float 6s ease-in-out infinite;
}

.shape-1 {
    width: 80px;
    height: 80px;
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.shape-2 {
    width: 120px;
    height: 120px;
    top: 60%;
    right: 15%;
    animation-delay: 2s;
}

.shape-3 {
    width: 60px;
    height: 60px;
    bottom: 20%;
    left: 80%;
    animation-delay: 4s;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

.testimonials-carousel {
    position: relative;
    min-height: 200px;
}

.testimonial-nav {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 30px;
}

.testimonial-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: none;
    background: #d1d5db;
    cursor: pointer;
    transition: background 0.3s ease;
}

.testimonial-dot.active,
.testimonial-dot:hover {
    background: #2563eb;
}

.featured-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-top: 50px;
}

.featured-service-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.featured-service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.service-image img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.service-content {
    padding: 25px;
}

.service-title a {
    color: #1f2937;
    text-decoration: none;
    font-size: 1.2rem;
    font-weight: 600;
}

.service-title a:hover {
    color: #2563eb;
}

.service-categories {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin: 15px 0;
}

.service-category-tag {
    background: #f3f4f6;
    color: #374151;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 500;
}

.cta-section {
    background: linear-gradient(135deg, #1f2937 0%, #374151 100%);
    color: white;
    padding: 80px 0;
    text-align: center;
}

.cta-content h2 {
    font-size: 2.5rem;
    margin-bottom: 20px;
}

.cta-content p {
    font-size: 1.2rem;
    margin-bottom: 40px;
    opacity: 0.9;
}

.cta-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn {
    display: inline-block;
    padding: 15px 30px;
    text-decoration: none;
    border-radius: 30px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary {
    background: #2563eb;
    color: white;
}

.btn-primary:hover {
    background: #1d4ed8;
    transform: translateY(-2px);
}

.btn-secondary {
    background: transparent;
    color: white;
    border: 2px solid white;
}

.btn-secondary:hover {
    background: white;
    color: #2563eb;
}

@media (max-width: 768px) {
    .featured-grid {
        grid-template-columns: 1fr;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .btn {
        width: 250px;
    }
}
</style>

<?php get_footer(); ?>
