<?php
/**
 * Template Name: Front Page - Optimized
 * 
 * @package Blueprint_Folder_Pro
 * @version 1.0.0
 */

get_header('optimized'); ?>

<main id="main" class="site-main front-page" role="main">
    
    <!-- Hero Section -->
    <section class="hero-section" data-aos="fade-in">
        <div class="hero-background">
            <div class="hero-overlay"></div>
        </div>
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">
                        <?php _e('Professional Construction Services', 'blueprint-folder'); ?>
                        <span class="highlight"><?php _e('Built to Last', 'blueprint-folder'); ?></span>
                    </h1>
                    <p class="hero-description">
                        <?php _e('From custom homes to commercial construction, we deliver quality craftsmanship and exceptional service for every project.', 'blueprint-folder'); ?>
                    </p>
                    <div class="hero-actions">
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-lg">
                            <?php _e('Get Free Quote', 'blueprint-folder'); ?>
                        </a>
                        <a href="<?php echo esc_url(home_url('/services')); ?>" class="btn btn-outline btn-lg">
                            <?php _e('Our Services', 'blueprint-folder'); ?>
                        </a>
                    </div>
                </div>
                <div class="hero-stats">
                    <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
                        <span class="stat-number">500+</span>
                        <span class="stat-label"><?php _e('Projects Completed', 'blueprint-folder'); ?></span>
                    </div>
                    <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                        <span class="stat-number">20+</span>
                        <span class="stat-label"><?php _e('Years Experience', 'blueprint-folder'); ?></span>
                    </div>
                    <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
                        <span class="stat-number">98%</span>
                        <span class="stat-label"><?php _e('Client Satisfaction', 'blueprint-folder'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section section-padding">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title" data-aos="fade-up">
                    <?php _e('Why Choose Blueprint Folder', 'blueprint-folder'); ?>
                </h2>
                <p class="section-description" data-aos="fade-up" data-aos-delay="100">
                    <?php _e('We combine years of experience with modern techniques to deliver exceptional results.', 'blueprint-folder'); ?>
                </p>
            </div>

            <div class="features-grid">
                <div class="feature-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3 class="feature-title"><?php _e('Quality Craftsmanship', 'blueprint-folder'); ?></h3>
                    <p class="feature-description">
                        <?php _e('Every project is built with attention to detail and the highest quality materials.', 'blueprint-folder'); ?>
                    </p>
                </div>

                <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="feature-title"><?php _e('On-Time Delivery', 'blueprint-folder'); ?></h3>
                    <p class="feature-description">
                        <?php _e('We understand the importance of deadlines and consistently deliver projects on schedule.', 'blueprint-folder'); ?>
                    </p>
                </div>

                <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="feature-title"><?php _e('Licensed & Insured', 'blueprint-folder'); ?></h3>
                    <p class="feature-description">
                        <?php _e('Fully licensed, bonded, and insured for your peace of mind and protection.', 'blueprint-folder'); ?>
                    </p>
                </div>

                <div class="feature-item" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3 class="feature-title"><?php _e('Customer Focused', 'blueprint-folder'); ?></h3>
                    <p class="feature-description">
                        <?php _e('Your satisfaction is our priority. We work closely with you throughout every project.', 'blueprint-folder'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section section-padding bg-light">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title" data-aos="fade-up">
                    <?php _e('Our Services', 'blueprint-folder'); ?>
                </h2>
                <p class="section-description" data-aos="fade-up" data-aos-delay="100">
                    <?php _e('Comprehensive construction services for residential and commercial projects.', 'blueprint-folder'); ?>
                </p>
            </div>

            <div class="services-grid">
                <?php
                $services = blueprint_folder_get_services_by_category('', 6);
                if ($services->have_posts()) :
                    $delay = 100;
                    while ($services->have_posts()) : $services->the_post();
                        $icon = get_post_meta(get_the_ID(), '_service_icon', true);
                        $price_range = get_post_meta(get_the_ID(), '_service_price_range', true);
                        ?>
                        <div class="service-item" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                            <div class="service-card">
                                <?php if ($icon) : ?>
                                    <div class="service-icon">
                                        <i class="<?php echo esc_attr($icon); ?>"></i>
                                    </div>
                                <?php endif; ?>
                                
                                <h3 class="service-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                
                                <p class="service-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                </p>
                                
                                <?php if ($price_range) : ?>
                                    <div class="service-price">
                                        <span class="price-range"><?php echo esc_html($price_range); ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-sm">
                                    <?php _e('Learn More', 'blueprint-folder'); ?>
                                </a>
                            </div>
                        </div>
                        <?php
                        $delay += 100;
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <div class="text-center" data-aos="fade-up">
                <a href="<?php echo esc_url(home_url('/services')); ?>" class="btn btn-primary">
                    <?php _e('View All Services', 'blueprint-folder'); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Projects Showcase -->
    <section class="projects-section section-padding">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title" data-aos="fade-up">
                    <?php _e('Recent Projects', 'blueprint-folder'); ?>
                </h2>
                <p class="section-description" data-aos="fade-up" data-aos-delay="100">
                    <?php _e('Take a look at some of our completed construction projects.', 'blueprint-folder'); ?>
                </p>
            </div>

            <div class="projects-grid">
                <?php
                $projects = blueprint_folder_get_projects('', 4);
                if ($projects->have_posts()) :
                    $delay = 100;
                    while ($projects->have_posts()) : $projects->the_post();
                        $client = get_post_meta(get_the_ID(), '_project_client', true);
                        $completion_date = get_post_meta(get_the_ID(), '_project_completion_date', true);
                        ?>
                        <div class="project-item" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                            <div class="project-card">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="project-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('project-thumbnail', array('loading' => 'lazy')); ?>
                                        </a>
                                        <div class="project-overlay">
                                            <a href="<?php the_permalink(); ?>" class="project-link">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="project-content">
                                    <h3 class="project-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    
                                    <?php if ($client) : ?>
                                        <p class="project-client">
                                            <strong><?php _e('Client:', 'blueprint-folder'); ?></strong> <?php echo esc_html($client); ?>
                                        </p>
                                    <?php endif; ?>
                                    
                                    <p class="project-excerpt">
                                        <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                    </p>
                                    
                                    <?php if ($completion_date) : ?>
                                        <div class="project-date">
                                            <i class="fas fa-calendar"></i>
                                            <?php echo date('F Y', strtotime($completion_date)); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        $delay += 100;
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <div class="text-center" data-aos="fade-up">
                <a href="<?php echo esc_url(home_url('/projects')); ?>" class="btn btn-primary">
                    <?php _e('View All Projects', 'blueprint-folder'); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section section-padding bg-light">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title" data-aos="fade-up">
                    <?php _e('What Our Clients Say', 'blueprint-folder'); ?>
                </h2>
                <p class="section-description" data-aos="fade-up" data-aos-delay="100">
                    <?php _e('Hear from satisfied customers about their experience working with us.', 'blueprint-folder'); ?>
                </p>
            </div>

            <div class="testimonials-slider" data-aos="fade-up" data-aos-delay="200">
                <?php
                $testimonials = blueprint_folder_get_testimonials(6);
                if ($testimonials->have_posts()) :
                    while ($testimonials->have_posts()) : $testimonials->the_post();
                        $client_name = get_post_meta(get_the_ID(), '_testimonial_client_name', true);
                        $client_position = get_post_meta(get_the_ID(), '_testimonial_client_position', true);
                        $client_company = get_post_meta(get_the_ID(), '_testimonial_client_company', true);
                        $rating = get_post_meta(get_the_ID(), '_testimonial_rating', true);
                        ?>
                        <div class="testimonial-item">
                            <div class="testimonial-card">
                                <div class="testimonial-content">
                                    <div class="testimonial-quote">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    
                                    <?php if ($rating) : ?>
                                        <div class="testimonial-rating">
                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                <i class="fas fa-star<?php echo ($i <= $rating) ? '' : '-o'; ?>"></i>
                                            <?php endfor; ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <p class="testimonial-text">
                                        <?php the_content(); ?>
                                    </p>
                                    
                                    <div class="testimonial-author">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="author-image">
                                                <?php the_post_thumbnail('thumbnail'); ?>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <div class="author-info">
                                            <?php if ($client_name) : ?>
                                                <h4 class="author-name"><?php echo esc_html($client_name); ?></h4>
                                            <?php endif; ?>
                                            
                                            <?php if ($client_position || $client_company) : ?>
                                                <p class="author-title">
                                                    <?php 
                                                    echo esc_html($client_position);
                                                    if ($client_position && $client_company) echo ', ';
                                                    echo esc_html($client_company);
                                                    ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section section-padding">
        <div class="container">
            <div class="cta-content text-center" data-aos="fade-up">
                <h2 class="cta-title">
                    <?php _e('Ready to Start Your Project?', 'blueprint-folder'); ?>
                </h2>
                <p class="cta-description">
                    <?php _e('Get a free consultation and quote for your construction project today.', 'blueprint-folder'); ?>
                </p>
                <div class="cta-actions">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-lg">
                        <?php _e('Get Free Quote', 'blueprint-folder'); ?>
                    </a>
                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_mod('blueprint_folder_phone', '(555) 123-4567'))); ?>" class="btn btn-outline btn-lg">
                        <i class="fas fa-phone"></i>
                        <?php echo esc_html(get_theme_mod('blueprint_folder_phone', '(555) 123-4567')); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer('optimized'); ?>
