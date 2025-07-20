<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this template will be used.
 *
 * @package Blueprint
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1 class="display-4 fw-bold mb-4">
                        <?php
                        $hero_title = get_theme_mod('hero_title', '75 Proven Business Blueprints');
                        echo esc_html($hero_title);
                        ?>
                    </h1>
                    <p class="lead mb-4">
                        <?php
                        $hero_subtitle = get_theme_mod('hero_subtitle', 'Discover profitable business opportunities with detailed startup guides, cost analysis, and step-by-step implementation plans.');
                        echo esc_html($hero_subtitle);
                        ?>
                    </p>
                    <div class="hero-actions">
                        <?php 
                        $services_page = get_page_by_path('services');
                        if ($services_page) :
                        ?>
                        <a href="<?php echo esc_url(get_permalink($services_page)); ?>" class="btn btn-light btn-lg me-3">
                            <?php esc_html_e('Explore Blueprints', 'blueprint'); ?>
                        </a>
                        <?php endif; ?>
                        
                        <?php 
                        $contact_page = get_page_by_path('contact');
                        if ($contact_page) :
                        ?>
                        <a href="<?php echo esc_url(get_permalink($contact_page)); ?>" class="btn btn-outline-light btn-lg">
                            <?php esc_html_e('Get Started', 'blueprint'); ?>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image text-center">
                    <?php
                    $hero_image = get_theme_mod('hero_image');
                    if ($hero_image) :
                    ?>
                        <img src="<?php echo esc_url($hero_image); ?>" alt="<?php esc_attr_e('Hero Image', 'blueprint'); ?>" class="img-fluid rounded">
                    <?php else : ?>
                        <div class="placeholder-image bg-light rounded d-flex align-items-center justify-content-center" style="height: 400px;">
                            <span class="text-muted"><?php esc_html_e('Hero Image Placeholder', 'blueprint'); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="section-title"><?php esc_html_e('Why Choose Our Business Blueprints?', 'blueprint'); ?></h2>
                <p class="section-subtitle text-muted"><?php esc_html_e('Everything you need to start your business journey with confidence', 'blueprint'); ?></p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card text-center h-100 p-4">
                    <div class="feature-icon mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14,2 14,8 20,8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10,9 9,9 8,9"></polyline>
                        </svg>
                    </div>
                    <h4><?php esc_html_e('Detailed Plans', 'blueprint'); ?></h4>
                    <p class="text-muted"><?php esc_html_e('Comprehensive step-by-step guides with everything you need to know to start your business.', 'blueprint'); ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card text-center h-100 p-4">
                    <div class="feature-icon mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary">
                            <line x1="12" y1="1" x2="12" y2="23"></line>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                    </div>
                    <h4><?php esc_html_e('Cost Analysis', 'blueprint'); ?></h4>
                    <p class="text-muted"><?php esc_html_e('Detailed startup cost breakdowns and financial projections to help you plan your investment.', 'blueprint'); ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card text-center h-100 p-4">
                    <div class="feature-icon mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary">
                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                        </svg>
                    </div>
                    <h4><?php esc_html_e('Proven Success', 'blueprint'); ?></h4>
                    <p class="text-muted"><?php esc_html_e('All blueprints are based on real, successful businesses with proven track records.', 'blueprint'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (have_posts()) : ?>
<!-- Latest Posts Section -->
<section class="latest-posts-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="section-title"><?php esc_html_e('Latest Updates', 'blueprint'); ?></h2>
                <p class="section-subtitle text-muted"><?php esc_html_e('Stay updated with our latest business insights and blueprint releases', 'blueprint'); ?></p>
            </div>
        </div>
        <div class="row g-4">
            <?php
            $front_page_posts = new WP_Query(array(
                'posts_per_page' => 3,
                'post_status' => 'publish'
            ));
            
            if ($front_page_posts->have_posts()) :
                while ($front_page_posts->have_posts()) :
                    $front_page_posts->the_post();
                    ?>
                    <div class="col-md-4">
                        <article class="post-card h-100">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('blueprint-thumbnail', array('class' => 'img-fluid')); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="post-content p-4">
                                <h5 class="post-title">
                                    <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                                        <?php the_title(); ?>
                                    </a>
                                </h5>
                                <p class="post-excerpt text-muted">
                                    <?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?>
                                </p>
                                <div class="post-meta text-muted small">
                                    <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                        <?php echo esc_html(get_the_date()); ?>
                                    </time>
                                </div>
                            </div>
                        </article>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- CTA Section -->
<section class="cta-section py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="mb-3"><?php esc_html_e('Ready to Start Your Business Journey?', 'blueprint'); ?></h3>
                <p class="mb-0"><?php esc_html_e('Browse our collection of 75 proven business blueprints and find the perfect opportunity for you.', 'blueprint'); ?></p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <?php 
                $services_page = get_page_by_path('services');
                if ($services_page) :
                ?>
                <a href="<?php echo esc_url(get_permalink($services_page)); ?>" class="btn btn-light btn-lg">
                    <?php esc_html_e('View All Blueprints', 'blueprint'); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
