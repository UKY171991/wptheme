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
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-2" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'blueprint'); ?>">
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
                        'menu_class'     => 'navbar-nav ms-auto mb-2 mb-lg-0',
                        'fallback_cb'    => 'blueprint_fallback_menu',
                        'walker'         => new WP_Bootstrap_Navwalker(),
                    ));
                } else {
                    blueprint_fallback_menu();
                }
                ?>
            </div>
        </div>
    </nav>
</header>

<main id="main" class="site-main" role="main">
    <div id="content" class="site-content">

