<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Preload critical resources -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <!-- Skip Links for Accessibility -->
    <a class="skip-link screen-reader-text" href="#main">
        <?php esc_html_e('Skip to main content', 'blueprint-folder'); ?>
    </a>

    <!-- Professional Header -->
    <header id="masthead" class="site-header" role="banner">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm" role="navigation">
            <div class="container">
                <!-- Brand/Logo -->
                <div class="navbar-brand-wrapper">
                    <?php if (has_custom_logo()) : ?>
                        <div class="custom-logo-container">
                            <?php 
                            $custom_logo_id = get_theme_mod('custom_logo');
                            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                            if ($logo) : ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand" rel="home">
                                    <img src="<?php echo esc_url($logo[0]); ?>" 
                                         alt="<?php echo esc_attr(get_bloginfo('name')); ?>" 
                                         class="logo-img"
                                         width="<?php echo esc_attr($logo[1]); ?>" 
                                         height="<?php echo esc_attr($logo[2]); ?>">
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php else : ?>
                        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <span class="brand-text"><?php bloginfo('name'); ?></span>
                            <?php 
                            $description = get_bloginfo('description', 'display');
                            if ($description) : ?>
                                <small class="brand-tagline d-block"><?php echo esc_html($description); ?></small>
                            <?php endif; ?>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Mobile Menu Toggle -->
                <button class="navbar-toggler" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#primary-navigation" 
                        aria-controls="primary-navigation" 
                        aria-expanded="false" 
                        aria-label="<?php esc_attr_e('Toggle navigation', 'blueprint-folder'); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation Menu -->
                <div class="collapse navbar-collapse" id="primary-navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location'    => 'primary',
                        'menu_id'          => 'primary-menu',
                        'menu_class'       => 'navbar-nav ms-auto me-3',
                        'container'        => false,
                        'depth'            => 3, // Support 3 levels
                        'fallback_cb'      => 'blueprint_folder_navigation_fallback',
                        'walker'           => new WP_Bootstrap_Navwalker(),
                        'items_wrap'       => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    ));
                    ?>
                    
                    <!-- CTA Button -->
                    <div class="navbar-cta">
                        <a href="<?php echo esc_url(blueprint_folder_get_header_cta_url()); ?>" 
                           class="btn btn-primary btn-cta">
                            <i class="fas fa-envelope me-2"></i>
                            <?php echo esc_html(blueprint_folder_get_header_cta_text()); ?>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Professional Banner Section (exclude homepage and single services) -->
    <?php if (!is_front_page() && !(is_single() && get_post_type() === 'service')) : ?>
        <?php get_template_part('template-parts/banner-section'); ?>
    <?php endif; ?>

    <!-- Main Content Area -->
    <main id="main" class="site-main" role="main" id="main-content">