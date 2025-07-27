<?php
/**
 * The front page template - Dynamic Homepage
 * 
 * This template creates a dynamic homepage with editable sections
 * for https://blueprintfolder.com/
 *
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */

get_header('rebuilt'); ?>

<main id="main" class="site-main homepage-main">
    
    <!-- Hero Section -->
    <section id="hero" class="hero-section">
        <div class="hero-background">
            <?php
            $hero_image = get_theme_mod('hero_background_image');
            if ($hero_image) {
                echo '<img src="' . esc_url($hero_image) . '" alt="' . esc_attr(get_bloginfo('name')) . '" class="hero-bg-image">';
            }
            ?>
        </div>
        
        <div class="hero-overlay"></div>
        
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">
                        <?php 
                        $hero_title = get_theme_mod('hero_title', 'Professional Digital Solutions');
                        echo esc_html($hero_title);
                        ?>
                    </h1>
                    
                    <p class="hero-subtitle">
                        <?php 
                        $hero_subtitle = get_theme_mod('hero_subtitle', 'We create exceptional digital experiences that drive business growth and success.');
                        echo esc_html($hero_subtitle);
                        ?>
                    </p>
                    
                    <div class="hero-actions">
                        <a href="<?php echo esc_url(get_theme_mod('hero_primary_button_url', '#services')); ?>" class="btn btn-primary btn-lg">
                            <?php echo esc_html(get_theme_mod('hero_primary_button_text', 'Our Services')); ?>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        
                        <a href="<?php echo esc_url(get_theme_mod('hero_secondary_button_url', '#contact')); ?>" class="btn btn-outline btn-lg">
                            <?php echo esc_html(get_theme_mod('hero_secondary_button_text', 'Get Started')); ?>
                            <i class="fas fa-phone"></i>
                        </a>
                    </div>
                </div>
                
                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-number"><?php echo esc_html(get_theme_mod('hero_stat_1_number', '100+')); ?></div>
                        <div class="stat-label"><?php echo esc_html(get_theme_mod('hero_stat_1_label', 'Projects Completed')); ?></div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number"><?php echo esc_html(get_theme_mod('hero_stat_2_number', '50+')); ?></div>
                        <div class="stat-label"><?php echo esc_html(get_theme_mod('hero_stat_2_label', 'Happy Clients')); ?></div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number"><?php echo esc_html(get_theme_mod('hero_stat_3_number', '5+')); ?></div>
                        <div class="stat-label"><?php echo esc_html(get_theme_mod('hero_stat_3_label', 'Years Experience')); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-content">
                        <h2 class="section-title">
                            <?php echo esc_html(get_theme_mod('about_title', 'About Blueprint Folder')); ?>
                        </h2>
                        
                        <div class="about-text">
                            <?php 
                            $about_content = get_theme_mod('about_content', 'We are a team of passionate professionals dedicated to delivering exceptional digital solutions. Our expertise spans web development, design, and digital strategy to help businesses succeed online.');
                            echo wp_kses_post(wpautop($about_content));
                            ?>
                        </div>
                        
                        <div class="about-features">
                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span><?php echo esc_html(get_theme_mod('about_feature_1', 'Expert Team')); ?></span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span><?php echo esc_html(get_theme_mod('about_feature_2', 'Quality Results')); ?></span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span><?php echo esc_html(get_theme_mod('about_feature_3', '24/7 Support')); ?></span>
                            </div>
                        </div>
                        
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>" class="btn btn-primary">
                            <?php esc_html_e('Learn More About Us', 'blueprint-folder'); ?>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="about-image">
                        <?php
                        $about_image = get_theme_mod('about_image');
                        if ($about_image) {
                            echo '<img src="' . esc_url($about_image) . '" alt="About Us" class="img-fluid">';
                        } else {
                            echo '<div class="placeholder-image"><i class="fas fa-image"></i><p>Add About Image in Customizer</p></div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title">
                    <?php echo esc_html(get_theme_mod('services_title', 'Our Services')); ?>
                </h2>
                <p class="section-subtitle">
                    <?php echo esc_html(get_theme_mod('services_subtitle', 'Comprehensive digital solutions tailored to your business needs')); ?>
                </p>
            </div>
            
            <div class="services-grid">
                <?php
                // Get featured services or latest 6 services
                $featured_services = get_theme_mod('featured_services', array());
                
                if (!empty($featured_services)) {
                    $services_query = new WP_Query(array(
                        'post_type' => 'service',
                        'post__in' => $featured_services,
                        'orderby' => 'post__in',
                        'posts_per_page' => 6,
                        'post_status' => 'publish'
                    ));
                } else {
                    $services_query = new WP_Query(array(
                        'post_type' => 'service',
                        'posts_per_page' => 6,
                        'post_status' => 'publish',
                        'meta_query' => array(
                            array(
                                'key' => 'featured_service',
                                'value' => '1',
                                'compare' => '='
                            )
                        )
                    ));
                    
                    // If no featured services, get latest
                    if (!$services_query->have_posts()) {
                        wp_reset_postdata();
                        $services_query = new WP_Query(array(
                            'post_type' => 'service',
                            'posts_per_page' => 6,
                            'post_status' => 'publish'
                        ));
                    }
                }
                
                if ($services_query->have_posts()) :
                    echo '<div class="services-container">';
                    while ($services_query->have_posts()) : $services_query->the_post();
                        get_template_part('template-parts/service-card');
                    endwhile;
                    echo '</div>';
                    wp_reset_postdata();
                else : ?>
                    <div class="no-services">
                        <p><?php esc_html_e('No services found. Please add some services in the admin panel.', 'blueprint-folder'); ?></p>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="text-center">
                <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn-outline btn-lg">
                    <?php esc_html_e('View All Services', 'blueprint-folder'); ?>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials-section">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title">
                    <?php echo esc_html(get_theme_mod('testimonials_title', 'What Our Clients Say')); ?>
                </h2>
                <p class="section-subtitle">
                    <?php echo esc_html(get_theme_mod('testimonials_subtitle', 'Hear from our satisfied clients about their experience working with us')); ?>
                </p>
            </div>
            
            <div class="testimonials-grid">
                <?php
                $testimonials_query = new WP_Query(array(
                    'post_type' => 'testimonial',
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'meta_query' => array(
                        array(
                            'key' => 'featured_testimonial',
                            'value' => '1',
                            'compare' => '='
                        )
                    )
                ));
                
                // If no featured testimonials, get latest
                if (!$testimonials_query->have_posts()) {
                    wp_reset_postdata();
                    $testimonials_query = new WP_Query(array(
                        'post_type' => 'testimonial',
                        'posts_per_page' => 3,
                        'post_status' => 'publish'
                    ));
                }
                
                if ($testimonials_query->have_posts()) :
                    while ($testimonials_query->have_posts()) : $testimonials_query->the_post();
                        $client_name = get_post_meta(get_the_ID(), 'client_name', true);
                        $client_position = get_post_meta(get_the_ID(), 'client_position', true);
                        $client_company = get_post_meta(get_the_ID(), 'client_company', true);
                        $rating = get_post_meta(get_the_ID(), 'rating', true);
                        ?>
                        <div class="testimonial-card">
                            <div class="testimonial-content">
                                <?php if ($rating) : ?>
                                    <div class="testimonial-rating">
                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                            <i class="fas fa-star<?php echo $i <= $rating ? '' : '-o'; ?>"></i>
                                        <?php endfor; ?>
                                    </div>
                                <?php endif; ?>
                                
                                <blockquote class="testimonial-text">
                                    <?php the_content(); ?>
                                </blockquote>
                            </div>
                            
                            <div class="testimonial-author">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="author-avatar">
                                        <?php the_post_thumbnail('testimonial-avatar'); ?>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="author-info">
                                    <h4 class="author-name"><?php echo esc_html($client_name ?: get_the_title()); ?></h4>
                                    <?php if ($client_position || $client_company) : ?>
                                        <p class="author-title">
                                            <?php 
                                            echo esc_html($client_position);
                                            if ($client_position && $client_company) echo ' at ';
                                            echo esc_html($client_company);
                                            ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else : ?>
                    <div class="no-testimonials">
                        <p><?php esc_html_e('No testimonials found. Please add some testimonials in the admin panel.', 'blueprint-folder'); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section id="blog" class="blog-section">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title">
                    <?php echo esc_html(get_theme_mod('blog_title', 'Latest News & Insights')); ?>
                </h2>
                <p class="section-subtitle">
                    <?php echo esc_html(get_theme_mod('blog_subtitle', 'Stay updated with our latest articles and industry insights')); ?>
                </p>
            </div>
            
            <div class="blog-grid">
                <?php
                $blog_query = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'post_status' => 'publish'
                ));
                
                if ($blog_query->have_posts()) :
                    while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                        <article class="blog-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="blog-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('blog-thumb'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <span class="blog-date"><?php echo get_the_date(); ?></span>
                                    <span class="blog-category">
                                        <?php 
                                        $categories = get_the_category();
                                        if ($categories) {
                                            echo esc_html($categories[0]->name);
                                        }
                                        ?>
                                    </span>
                                </div>
                                
                                <h3 class="blog-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                
                                <div class="blog-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <a href="<?php the_permalink(); ?>" class="blog-link">
                                    <?php esc_html_e('Read More', 'blueprint-folder'); ?>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else : ?>
                    <div class="no-posts">
                        <p><?php esc_html_e('No blog posts found. Please add some posts.', 'blueprint-folder'); ?></p>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="text-center">
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn btn-outline btn-lg">
                    <?php esc_html_e('View All Posts', 'blueprint-folder'); ?>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="cta" class="cta-section">
        <div class="container">
            <div class="cta-content text-center">
                <h2 class="cta-title">
                    <?php echo esc_html(get_theme_mod('cta_title', 'Ready to Get Started?')); ?>
                </h2>
                
                <p class="cta-text">
                    <?php echo esc_html(get_theme_mod('cta_text', 'Let\'s discuss your project and see how we can help you achieve your goals.')); ?>
                </p>
                
                <div class="cta-actions">
                    <a href="<?php echo esc_url(get_theme_mod('cta_primary_button_url', '/contact')); ?>" class="btn btn-primary btn-lg">
                        <?php echo esc_html(get_theme_mod('cta_primary_button_text', 'Get In Touch')); ?>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    
                    <a href="<?php echo esc_url(get_theme_mod('cta_secondary_button_url', '/pricing')); ?>" class="btn btn-outline btn-lg">
                        <?php echo esc_html(get_theme_mod('cta_secondary_button_text', 'View Pricing')); ?>
                        <i class="fas fa-tag"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer('rebuilt'); ?>
