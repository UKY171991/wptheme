<?php
/**
 * Template Name: About Page Enhanced
 * 
 * The template for displaying the about page with enhanced design
 *
 * @package Blueprint
 */

get_header(); ?>

<div class="about-page-wrapper">
    <!-- Hero Section -->
    <section class="about-hero py-5 bg-gradient-primary">
        <div class="container">
            <div class="row align-items-center min-vh-50">
                <div class="col-lg-6">
                    <div class="hero-content text-white">
                        <div class="hero-badge mb-3">
                            <span class="badge bg-white text-primary px-3 py-2 rounded-pill fs-6">
                                <i class="bi bi-people-fill me-2"></i>
                                <?php esc_html_e('About Us', 'blueprint'); ?>
                            </span>
                        </div>
                        <h1 class="display-4 fw-bold mb-4 animate-fade-in">
                            <?php 
                            if (have_posts()) {
                                the_post();
                                the_title();
                                rewind_posts();
                            } else {
                                esc_html_e('About BluePrint', 'blueprint');
                            }
                            ?>
                        </h1>
                        <p class="lead mb-4 animate-fade-in-delay">
                            <?php 
                            $excerpt = get_the_excerpt();
                            if ($excerpt) {
                                echo esc_html($excerpt);
                            } else {
                                esc_html_e('We are passionate about helping businesses succeed through proven strategies, innovative solutions, and comprehensive guidance.', 'blueprint');
                            }
                            ?>
                        </p>
                        <div class="hero-stats row g-4 mt-4">
                            <div class="col-sm-4">
                                <div class="stat-item text-center">
                                    <h3 class="display-6 fw-bold mb-1">500+</h3>
                                    <p class="mb-0 text-white-50"><?php esc_html_e('Happy Clients', 'blueprint'); ?></p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="stat-item text-center">
                                    <h3 class="display-6 fw-bold mb-1">5+</h3>
                                    <p class="mb-0 text-white-50"><?php esc_html_e('Years Experience', 'blueprint'); ?></p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="stat-item text-center">
                                    <h3 class="display-6 fw-bold mb-1">24/7</h3>
                                    <p class="mb-0 text-white-50"><?php esc_html_e('Support', 'blueprint'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image text-center">
                        <div class="image-wrapper position-relative">
                            <div class="bg-shape position-absolute"></div>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/about-hero.jpg'); ?>" 
                                 alt="<?php esc_attr_e('About Us Image', 'blueprint'); ?>" 
                                 class="img-fluid rounded-4 shadow-lg position-relative"
                                 style="max-height: 500px; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="about-content py-5">
        <div class="container">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="content-wrapper">
                                <div class="post-content prose">
                                    <?php
                                    the_content();
                                    
                                    wp_link_pages(array(
                                        'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'blueprint') . '</span>',
                                        'after'  => '</div>',
                                        'link_before' => '<span>',
                                        'link_after'  => '</span>',
                                    ));
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- Our Mission Section -->
    <section class="our-mission py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="mission-content">
                        <div class="section-badge mb-3">
                            <span class="badge bg-primary text-white px-3 py-2 rounded-pill">
                                <i class="bi bi-target me-2"></i>
                                <?php esc_html_e('Our Mission', 'blueprint'); ?>
                            </span>
                        </div>
                        <h2 class="display-5 fw-bold mb-4">
                            <?php esc_html_e('Empowering Business Success', 'blueprint'); ?>
                        </h2>
                        <p class="lead text-muted mb-4">
                            <?php esc_html_e('Our mission is to provide comprehensive business solutions that help entrepreneurs and established companies achieve sustainable growth through proven strategies and innovative approaches.', 'blueprint'); ?>
                        </p>
                        <div class="mission-points">
                            <div class="point-item d-flex mb-3">
                                <div class="point-icon me-3">
                                    <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                </div>
                                <div class="point-content">
                                    <h5 class="mb-1"><?php esc_html_e('Strategic Planning', 'blueprint'); ?></h5>
                                    <p class="text-muted mb-0"><?php esc_html_e('Comprehensive business planning and strategy development', 'blueprint'); ?></p>
                                </div>
                            </div>
                            <div class="point-item d-flex mb-3">
                                <div class="point-icon me-3">
                                    <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                </div>
                                <div class="point-content">
                                    <h5 class="mb-1"><?php esc_html_e('Expert Consultation', 'blueprint'); ?></h5>
                                    <p class="text-muted mb-0"><?php esc_html_e('Professional guidance from industry experts', 'blueprint'); ?></p>
                                </div>
                            </div>
                            <div class="point-item d-flex">
                                <div class="point-icon me-3">
                                    <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                </div>
                                <div class="point-content">
                                    <h5 class="mb-1"><?php esc_html_e('Ongoing Support', 'blueprint'); ?></h5>
                                    <p class="text-muted mb-0"><?php esc_html_e('Continuous support throughout your business journey', 'blueprint'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mission-visual">
                        <div class="visual-grid">
                            <div class="grid-item bg-primary text-white rounded-4 p-4 text-center">
                                <i class="bi bi-lightbulb display-4 mb-3"></i>
                                <h4><?php esc_html_e('Innovation', 'blueprint'); ?></h4>
                            </div>
                            <div class="grid-item bg-success text-white rounded-4 p-4 text-center">
                                <i class="bi bi-graph-up-arrow display-4 mb-3"></i>
                                <h4><?php esc_html_e('Growth', 'blueprint'); ?></h4>
                            </div>
                            <div class="grid-item bg-info text-white rounded-4 p-4 text-center">
                                <i class="bi bi-people display-4 mb-3"></i>
                                <h4><?php esc_html_e('Collaboration', 'blueprint'); ?></h4>
                            </div>
                            <div class="grid-item bg-warning text-white rounded-4 p-4 text-center">
                                <i class="bi bi-award display-4 mb-3"></i>
                                <h4><?php esc_html_e('Excellence', 'blueprint'); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <div class="section-badge mb-3">
                    <span class="badge bg-primary text-white px-3 py-2 rounded-pill">
                        <i class="bi bi-people-fill me-2"></i>
                        <?php esc_html_e('Our Team', 'blueprint'); ?>
                    </span>
                </div>
                <h2 class="display-5 fw-bold mb-3">
                    <?php esc_html_e('Meet Our Experts', 'blueprint'); ?>
                </h2>
                <p class="lead text-muted">
                    <?php esc_html_e('Dedicated professionals committed to your success', 'blueprint'); ?>
                </p>
            </div>
            
            <div class="row g-4">
                <!-- Team Member 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="team-card bg-white rounded-4 shadow-sm p-4 text-center h-100">
                        <div class="team-avatar mb-3">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/team-1.jpg'); ?>" 
                                 alt="<?php esc_attr_e('Team Member', 'blueprint'); ?>" 
                                 class="rounded-circle" width="100" height="100" style="object-fit: cover;">
                        </div>
                        <h5 class="fw-bold mb-1"><?php esc_html_e('Sarah Johnson', 'blueprint'); ?></h5>
                        <p class="text-primary mb-3"><?php esc_html_e('CEO & Founder', 'blueprint'); ?></p>
                        <p class="text-muted small"><?php esc_html_e('Leading business strategist with 10+ years of experience in helping companies scale.', 'blueprint'); ?></p>
                        <div class="team-social">
                            <a href="#" class="btn btn-outline-primary btn-sm me-2">
                                <i class="bi bi-linkedin"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Team Member 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="team-card bg-white rounded-4 shadow-sm p-4 text-center h-100">
                        <div class="team-avatar mb-3">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/team-2.jpg'); ?>" 
                                 alt="<?php esc_attr_e('Team Member', 'blueprint'); ?>" 
                                 class="rounded-circle" width="100" height="100" style="object-fit: cover;">
                        </div>
                        <h5 class="fw-bold mb-1"><?php esc_html_e('Michael Chen', 'blueprint'); ?></h5>
                        <p class="text-primary mb-3"><?php esc_html_e('Senior Consultant', 'blueprint'); ?></p>
                        <p class="text-muted small"><?php esc_html_e('Expert in digital transformation and process optimization for modern businesses.', 'blueprint'); ?></p>
                        <div class="team-social">
                            <a href="#" class="btn btn-outline-primary btn-sm me-2">
                                <i class="bi bi-linkedin"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Team Member 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="team-card bg-white rounded-4 shadow-sm p-4 text-center h-100">
                        <div class="team-avatar mb-3">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/team-3.jpg'); ?>" 
                                 alt="<?php esc_attr_e('Team Member', 'blueprint'); ?>" 
                                 class="rounded-circle" width="100" height="100" style="object-fit: cover;">
                        </div>
                        <h5 class="fw-bold mb-1"><?php esc_html_e('Emily Rodriguez', 'blueprint'); ?></h5>
                        <p class="text-primary mb-3"><?php esc_html_e('Marketing Director', 'blueprint'); ?></p>
                        <p class="text-muted small"><?php esc_html_e('Creative marketing professional specializing in brand development and growth strategies.', 'blueprint'); ?></p>
                        <div class="team-social">
                            <a href="#" class="btn btn-outline-primary btn-sm me-2">
                                <i class="bi bi-linkedin"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="display-6 fw-bold mb-3">
                        <?php esc_html_e('Ready to Transform Your Business?', 'blueprint'); ?>
                    </h3>
                    <p class="lead mb-0">
                        <?php esc_html_e('Let\'s work together to create a customized blueprint for your success.', 'blueprint'); ?>
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-light btn-lg px-4">
                        <i class="bi bi-rocket-takeoff me-2"></i>
                        <?php esc_html_e('Get Started Today', 'blueprint'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
