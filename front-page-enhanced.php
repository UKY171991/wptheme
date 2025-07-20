<?php
/**
 * The front page template file - Enhanced Version
 *
 * Modern homepage with improved design and user experience
 *
 * @package Blueprint
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero-section bg-gradient-primary text-white py-5 position-relative overflow-hidden">
    <div class="container">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-6">
                <div class="hero-content">
                    <div class="hero-badge mb-3">
                        <span class="badge bg-white text-primary px-3 py-2 rounded-pill fs-6">
                            <i class="bi bi-award-fill me-2"></i>
                            <?php esc_html_e('75 Proven Blueprints', 'blueprint'); ?>
                        </span>
                    </div>
                    <h1 class="display-3 fw-bold mb-4 animate-fade-in">
                        <?php
                        $hero_title = get_theme_mod('hero_title', '75 Proven Business Blueprints');
                        echo esc_html($hero_title);
                        ?>
                    </h1>
                    <p class="lead mb-4 animate-fade-in-delay">
                        <?php
                        $hero_subtitle = get_theme_mod('hero_subtitle', 'Discover profitable business opportunities with detailed startup guides, cost analysis, and step-by-step implementation plans.');
                        echo esc_html($hero_subtitle);
                        ?>
                    </p>
                    <div class="hero-actions d-flex flex-wrap gap-3">
                        <?php 
                        $services_page = get_page_by_path('services');
                        if ($services_page) :
                        ?>
                        <a href="<?php echo esc_url(get_permalink($services_page)); ?>" class="btn btn-light btn-lg px-4 py-3 shadow-custom">
                            <i class="bi bi-rocket-takeoff me-2"></i>
                            <?php esc_html_e('Explore Blueprints', 'blueprint'); ?>
                        </a>
                        <?php endif; ?>
                        
                        <?php 
                        $contact_page = get_page_by_path('contact');
                        if ($contact_page) :
                        ?>
                        <a href="<?php echo esc_url(get_permalink($contact_page)); ?>" class="btn btn-outline-light btn-lg px-4 py-3">
                            <i class="bi bi-chat-dots me-2"></i>
                            <?php esc_html_e('Get Started', 'blueprint'); ?>
                        </a>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Trust Indicators -->
                    <div class="trust-indicators mt-5 d-flex align-items-center gap-4 text-white-50">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-people-fill me-2"></i>
                            <span class="small"><?php esc_html_e('10,000+ Entrepreneurs', 'blueprint'); ?></span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-star-fill me-2"></i>
                            <span class="small"><?php esc_html_e('4.9/5 Rating', 'blueprint'); ?></span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-shield-check me-2"></i>
                            <span class="small"><?php esc_html_e('Money-back Guarantee', 'blueprint'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image text-center position-relative">
                    <?php
                    $hero_image = get_theme_mod('hero_image');
                    if ($hero_image) :
                    ?>
                        <img src="<?php echo esc_url($hero_image); ?>" 
                             alt="<?php esc_attr_e('Hero Image', 'blueprint'); ?>" 
                             class="img-fluid border-radius-custom shadow-custom">
                    <?php else : ?>
                        <div class="hero-placeholder bg-white bg-opacity-10 border-radius-custom d-flex align-items-center justify-content-center backdrop-filter-blur" style="height: 500px;">
                            <div class="text-center text-white">
                                <i class="bi bi-graph-up-arrow display-1 mb-3 opacity-75"></i>
                                <h3 class="h5 opacity-75"><?php esc_html_e('Business Success Visualization', 'blueprint'); ?></h3>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Floating Elements -->
    <div class="position-absolute top-0 start-0 w-100 h-100 pointer-events-none">
        <div class="floating-shapes">
            <div class="floating-shape floating-shape-1"></div>
            <div class="floating-shape floating-shape-2"></div>
            <div class="floating-shape floating-shape-3"></div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="display-5 fw-bold mb-3"><?php esc_html_e('Why Choose Our Business Blueprints?', 'blueprint'); ?></h2>
                <p class="lead text-muted"><?php esc_html_e('Everything you need to start your business journey with confidence', 'blueprint'); ?></p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="feature-card bg-white text-center h-100 p-4 border-radius-custom shadow-custom">
                    <div class="feature-icon mb-3">
                        <div class="icon-wrapper bg-gradient-primary text-white d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 70px; height: 70px;">
                            <i class="bi bi-journal-text fs-3"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-3"><?php esc_html_e('Detailed Plans', 'blueprint'); ?></h4>
                    <p class="text-muted"><?php esc_html_e('Comprehensive step-by-step guides with everything you need to know to start your business.', 'blueprint'); ?></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-card bg-white text-center h-100 p-4 border-radius-custom shadow-custom">
                    <div class="feature-icon mb-3">
                        <div class="icon-wrapper bg-gradient-primary text-white d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 70px; height: 70px;">
                            <i class="bi bi-calculator fs-3"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-3"><?php esc_html_e('Cost Analysis', 'blueprint'); ?></h4>
                    <p class="text-muted"><?php esc_html_e('Detailed startup cost breakdowns and financial projections to help you plan your investment.', 'blueprint'); ?></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-card bg-white text-center h-100 p-4 border-radius-custom shadow-custom">
                    <div class="feature-icon mb-3">
                        <div class="icon-wrapper bg-gradient-primary text-white d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 70px; height: 70px;">
                            <i class="bi bi-trophy fs-3"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-3"><?php esc_html_e('Proven Success', 'blueprint'); ?></h4>
                    <p class="text-muted"><?php esc_html_e('All blueprints are based on real, successful businesses with proven track records.', 'blueprint'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section py-5 bg-gradient-primary text-white">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-lg-3 col-sm-6">
                <div class="stat-item">
                    <div class="stat-number display-4 fw-bold" data-target="75">0</div>
                    <div class="stat-label h5"><?php esc_html_e('Business Blueprints', 'blueprint'); ?></div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="stat-item">
                    <div class="stat-number display-4 fw-bold" data-target="10000">0</div>
                    <div class="stat-label h5"><?php esc_html_e('Entrepreneurs Helped', 'blueprint'); ?></div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="stat-item">
                    <div class="stat-number display-4 fw-bold" data-target="95">0</div>
                    <div class="stat-label h5"><?php esc_html_e('Success Rate %', 'blueprint'); ?></div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="stat-item">
                    <div class="stat-number display-4 fw-bold" data-target="50">0</div>
                    <div class="stat-label h5"><?php esc_html_e('Countries Served', 'blueprint'); ?></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Preview Section -->
<section class="services-preview py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="display-5 fw-bold mb-3"><?php esc_html_e('Popular Business Categories', 'blueprint'); ?></h2>
                <p class="lead text-muted"><?php esc_html_e('Explore our most popular business categories and find your perfect opportunity', 'blueprint'); ?></p>
            </div>
        </div>
        <div class="row g-4">
            <?php
            $popular_categories = array(
                array(
                    'icon' => 'bi-house-heart',
                    'title' => 'Home & Cleaning Services',
                    'description' => 'Professional cleaning and home maintenance services',
                    'count' => '10 Services',
                    'link' => home_url('/services/?category=home-cleaning'),
                    'slug' => 'home-cleaning'
                ),
                array(
                    'icon' => 'bi-palette',
                    'title' => 'Creative & Digital Services',
                    'description' => 'Creative and digital solutions for businesses',
                    'count' => '10 Services',
                    'link' => home_url('/services/?category=creative-digital'),
                    'slug' => 'creative-digital'
                ),
                array(
                    'icon' => 'bi-briefcase',
                    'title' => 'Office & Admin Services',
                    'description' => 'Administrative and office support services',
                    'count' => '10 Services',
                    'link' => home_url('/services/?category=office-admin'),
                    'slug' => 'office-admin'
                ),
                array(
                    'icon' => 'bi-heart',
                    'title' => 'Child & Family Support',
                    'description' => 'Supporting families with childcare services',
                    'count' => '5 Services',
                    'link' => home_url('/services/?category=family-support'),
                    'slug' => 'family-support'
                ),
                array(
                    'icon' => 'bi-mortarboard',
                    'title' => 'Coaching & Consulting',
                    'description' => 'Professional coaching and consulting services',
                    'count' => '8 Services',
                    'link' => home_url('/services/?category=coaching-consulting'),
                    'slug' => 'coaching-consulting'
                ),
                array(
                    'icon' => 'bi-paw',
                    'title' => 'Pet & Animal Services',
                    'description' => 'Caring and professional pet services',
                    'count' => '7 Services',
                    'link' => home_url('/services/?category=pet-services'),
                    'slug' => 'pet-services'
                )
            );

            foreach ($popular_categories as $category) :
            ?>
            <div class="col-lg-4 col-md-6">
                <a href="<?php echo esc_url($category['link']); ?>" class="text-decoration-none category-link" data-category="<?php echo esc_attr($category['slug']); ?>">
                    <div class="service-preview-card bg-white border-radius-custom shadow-custom p-4 h-100 category-card">
                        <div class="d-flex align-items-start">
                            <div class="service-icon me-3">
                                <div class="icon-wrapper bg-gradient-primary text-white d-flex align-items-center justify-content-center rounded-circle" style="width: 50px; height: 50px;">
                                    <i class="<?php echo esc_attr($category['icon']); ?> fs-5"></i>
                                </div>
                            </div>
                            <div class="service-content flex-grow-1">
                                <h5 class="fw-bold mb-2 text-dark"><?php echo esc_html($category['title']); ?></h5>
                                <p class="text-muted mb-2"><?php echo esc_html($category['description']); ?></p>
                                <span class="badge bg-light text-primary"><?php echo esc_html($category['count']); ?></span>
                            </div>
                            <div class="service-arrow">
                                <i class="bi bi-arrow-right text-primary"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-5">
            <?php 
            $services_page = get_page_by_path('services');
            if ($services_page) :
            ?>
            <a href="<?php echo esc_url(get_permalink($services_page)); ?>" class="btn btn-primary btn-lg px-4 py-3">
                <i class="bi bi-arrow-right-circle me-2"></i>
                <?php esc_html_e('View All Services', 'blueprint'); ?>
            </a>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Latest Blog Posts -->
<section class="latest-blog py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="display-5 fw-bold mb-3"><?php esc_html_e('Latest Updates', 'blueprint'); ?></h2>
                <p class="lead text-muted"><?php esc_html_e('Stay updated with our latest business insights and blueprint releases', 'blueprint'); ?></p>
            </div>
        </div>
        
        <div class="row g-4">
            <?php
            $latest_posts = new WP_Query(array(
                'posts_per_page' => 3,
                'post_status' => 'publish'
            ));

            if ($latest_posts->have_posts()) :
                while ($latest_posts->have_posts()) : $latest_posts->the_post();
            ?>
            <div class="col-lg-4 col-md-6">
                <article class="blog-preview-card bg-white border-radius-custom shadow-custom overflow-hidden h-100">
                    <div class="blog-image">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', array('class' => 'img-fluid', 'style' => 'height: 200px; object-fit: cover; width: 100%;')); ?>
                            <?php else: ?>
                                <div class="placeholder-image bg-gradient-primary d-flex align-items-center justify-content-center text-white" style="height: 200px;">
                                    <i class="bi bi-journal-text fs-2"></i>
                                </div>
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="blog-content p-4">
                        <div class="blog-meta mb-2">
                            <span class="text-muted small">
                                <i class="bi bi-calendar3 me-1"></i>
                                <?php echo get_the_date(); ?>
                            </span>
                        </div>
                        <h5 class="fw-bold mb-3">
                            <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                <?php the_title(); ?>
                            </a>
                        </h5>
                        <p class="text-muted mb-3">
                            <?php 
                            $excerpt = get_the_excerpt();
                            if (empty($excerpt)) {
                                $excerpt = wp_trim_words(get_the_content(), 15);
                            }
                            echo wp_trim_words($excerpt, 15);
                            ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary btn-sm">
                            <?php esc_html_e('Read More', 'blueprint'); ?>
                            <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </article>
            </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="bi bi-journal-plus display-4 text-muted mb-3"></i>
                    <h5 class="text-muted"><?php esc_html_e('No blog posts available', 'blueprint'); ?></h5>
                    <p class="text-muted"><?php esc_html_e('Blog posts will appear here once published.', 'blueprint'); ?></p>
                </div>
            </div>
            <?php endif; ?>
        </div>
        
        <div class="text-center mt-5">
            <?php 
            $blog_page = get_page_by_path('blog');
            if ($blog_page) :
            ?>
            <a href="<?php echo esc_url(get_permalink($blog_page)); ?>" class="btn btn-outline-primary btn-lg px-4 py-3">
                <i class="bi bi-journal-text me-2"></i>
                <?php esc_html_e('View All Posts', 'blueprint'); ?>
            </a>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="cta-section py-5 bg-gradient-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="display-5 fw-bold mb-3"><?php esc_html_e('Ready to Start Your Business Journey?', 'blueprint'); ?></h2>
                <p class="lead mb-4"><?php esc_html_e('Browse our collection of 75 proven business blueprints and find the perfect opportunity for you.', 'blueprint'); ?></p>
                
                <div class="cta-actions d-flex flex-wrap justify-content-center gap-3">
                    <?php 
                    $services_page = get_page_by_path('services');
                    if ($services_page) :
                    ?>
                    <a href="<?php echo esc_url(get_permalink($services_page)); ?>" class="btn btn-light btn-lg px-4 py-3">
                        <i class="bi bi-collection me-2"></i>
                        <?php esc_html_e('View All Blueprints', 'blueprint'); ?>
                    </a>
                    <?php endif; ?>
                    
                    <?php 
                    $contact_page = get_page_by_path('contact');
                    if ($contact_page) :
                    ?>
                    <a href="<?php echo esc_url(get_permalink($contact_page)); ?>" class="btn btn-outline-light btn-lg px-4 py-3">
                        <i class="bi bi-person-lines-fill me-2"></i>
                        <?php esc_html_e('Get Expert Guidance', 'blueprint'); ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Enhanced JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animated counters
    const counters = document.querySelectorAll('.stat-number');
    const speed = 200;

    counters.forEach(counter => {
        const animate = () => {
            const value = parseInt(counter.getAttribute('data-target'));
            const data = parseInt(counter.innerText);
            const time = value / speed;
            
            if (data < value) {
                counter.innerText = Math.ceil(data + time);
                setTimeout(animate, 1);
            } else {
                counter.innerText = value;
            }
        };
        
        // Start animation when element is in view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animate();
                    observer.unobserve(entry.target);
                }
            });
        });
        
        observer.observe(counter);
    });
    
    // Floating shapes animation
    const shapes = document.querySelectorAll('.floating-shape');
    shapes.forEach((shape, index) => {
        shape.style.animationDelay = `${index * 2}s`;
    });
});
</script>

<style>
.floating-shapes {
    pointer-events: none;
}

.floating-shape {
    position: absolute;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    animation: float 6s ease-in-out infinite;
}

.floating-shape-1 {
    width: 80px;
    height: 80px;
    top: 10%;
    right: 10%;
}

.floating-shape-2 {
    width: 60px;
    height: 60px;
    top: 60%;
    right: 80%;
}

.floating-shape-3 {
    width: 100px;
    height: 100px;
    bottom: 20%;
    left: 5%;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-20px);
    }
}

.min-vh-75 {
    min-height: 75vh;
}

.backdrop-filter-blur {
    backdrop-filter: blur(10px);
}
</style>

<?php get_footer(); ?>
