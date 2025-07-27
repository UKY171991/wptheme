<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Preload critical resources -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <!-- Skip link for accessibility -->
    <a class="skip-link" href="#main">
        <?php esc_html_e('Skip to main content', 'blueprint-folder'); ?>
    </a>

    <!-- Header Section -->
    <header id="masthead" class="site-header" role="banner">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container">
                <!-- Site Branding -->
                <div class="site-branding">
                    <?php if (has_custom_logo()) : ?>
                        <div class="custom-logo">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php else : ?>
                        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                            <?php 
                            $description = get_bloginfo('description', 'display');
                            if ($description || is_customize_preview()) : ?>
                                <small class="site-description"><?php echo $description; ?></small>
                            <?php endif; ?>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Mobile Menu Toggle -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primary-navigation" aria-controls="primary-navigation" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'blueprint-folder'); ?>">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Primary Navigation -->
                <div class="collapse navbar-collapse" id="primary-navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location'    => 'primary',
                        'menu_id'          => 'primary-menu',
                        'menu_class'       => 'navbar-nav ms-auto',
                        'container'        => false,
                        'depth'            => 3,
                        'fallback_cb'      => 'blueprint_folder_navigation_fallback',
                        'walker'           => new WP_Bootstrap_Navwalker(),
                    ));
                    ?>
                    
                    <!-- CTA Button -->
                    <div class="navbar-nav ms-3">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-primary">
                            <i class="fas fa-envelope me-2"></i>
                            <?php esc_html_e('Get Quote', 'blueprint-folder'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content Area -->
    <main id="main" class="site-main" role="main">
