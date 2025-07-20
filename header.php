<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Skip to content link for accessibility -->
<a class="skip-link screen-reader-text" href="#main" tabindex="1"><?php esc_html_e('Skip to content', 'blueprint'); ?></a>

<header class="site-header" role="banner">
    <!-- Top Bar with Contact Info -->
    <div class="top-bar bg-dark text-light py-2 d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="contact-info d-flex align-items-center">
                        <span class="me-4">
                            <i class="bi bi-telephone me-2"></i>
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_mod('contact_phone', '+1 (555) 123-4567'))); ?>" class="text-light text-decoration-none">
                                <?php echo esc_html(get_theme_mod('contact_phone', '+1 (555) 123-4567')); ?>
                            </a>
                        </span>
                        <span class="me-4">
                            <i class="bi bi-envelope me-2"></i>
                            <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'info@blueprintfolder.com')); ?>" class="text-light text-decoration-none">
                                <?php echo esc_html(get_theme_mod('contact_email', 'info@blueprintfolder.com')); ?>
                            </a>
                        </span>
                        <span>
                            <i class="bi bi-clock me-2"></i>
                            <?php esc_html_e('Mon-Fri: 9AM - 6PM EST', 'blueprint'); ?>
                        </span>
                    </div>
                </div>
                <div class="col-md-4 text-end">
                    <div class="social-links">
                        <a href="#" class="text-light me-3" aria-label="<?php esc_attr_e('Follow us on Facebook', 'blueprint'); ?>">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="text-light me-3" aria-label="<?php esc_attr_e('Follow us on Twitter', 'blueprint'); ?>">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="#" class="text-light me-3" aria-label="<?php esc_attr_e('Follow us on LinkedIn', 'blueprint'); ?>">
                            <i class="bi bi-linkedin"></i>
                        </a>
                        <a href="#" class="text-light" aria-label="<?php esc_attr_e('Follow us on Instagram', 'blueprint'); ?>">
                            <i class="bi bi-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'blueprint'); ?>">
        <div class="container">
            <!-- Brand/Logo -->
            <div class="navbar-brand-wrapper">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <a class="navbar-brand fw-bold fs-2" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <span class="text-primary">Blue</span><span class="text-secondary">Print</span>
                    </a>
                    <?php
                }
                ?>
            </div>
            
            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#primary-navigation" aria-controls="primary-navigation" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle Navigation', 'blueprint'); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Navigation Menu -->
            <div class="collapse navbar-collapse" id="primary-navigation">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location'  => 'primary',
                        'depth'          => 3,
                        'container'      => false,
                        'menu_class'     => 'navbar-nav mx-auto mb-2 mb-lg-0',
                        'fallback_cb'    => 'blueprint_fallback_menu',
                        'walker'         => new WP_Bootstrap_Navwalker(),
                    ));
                } else {
                    blueprint_fallback_menu();
                }
                ?>
                
                <!-- Header Actions -->
                <div class="navbar-actions d-flex align-items-center">
                    <!-- Search Toggle -->
                    <button class="btn btn-outline-primary me-3 search-toggle" type="button" aria-expanded="false" aria-controls="search-container" aria-label="<?php esc_attr_e('Toggle Search', 'blueprint'); ?>">
                        <i class="bi bi-search me-2"></i>
                        <span class="d-none d-sm-inline"><?php esc_html_e('Search', 'blueprint'); ?></span>
                    </button>
                    
                    <!-- CTA Button -->
                    <?php 
                    $contact_page = get_page_by_path('contact');
                    if ($contact_page) :
                    ?>
                    <a href="<?php echo esc_url(get_permalink($contact_page)); ?>" class="btn btn-primary btn-lg">
                        <i class="bi bi-rocket-takeoff me-2"></i>
                        <?php esc_html_e('Get Started', 'blueprint'); ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Search Container -->
    <div id="search-container" class="search-container bg-light py-4 shadow-sm" style="display: none;" role="search">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form method="get" class="search-form position-relative" action="<?php echo esc_url(home_url('/')); ?>" role="search">
                        <label for="search-field" class="visually-hidden"><?php esc_html_e('Search for:', 'blueprint'); ?></label>
                        <input type="search" id="search-field" class="form-control form-control-lg search-field pe-5" placeholder="<?php esc_attr_e('Search blueprints, guides, and more...', 'blueprint'); ?>" value="<?php echo get_search_query(); ?>" name="s" required>
                        <button type="submit" class="btn btn-primary position-absolute top-50 end-0 translate-middle-y me-2 search-submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>
            </div>
            <button type="button" class="btn-close search-close position-absolute top-0 end-0 m-3" aria-label="<?php esc_attr_e('Close search', 'blueprint'); ?>"></button>
        </div>
    </div>
</header>

<main id="main" class="site-main" role="main">
    <div id="content" class="site-content">

