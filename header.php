<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <!-- Skip to content link for accessibility -->
    <a class="skip-link sr-only" href="#main" aria-label="<?php esc_attr_e('Skip to main content', 'service-blueprint'); ?>">
        <?php esc_html_e('Skip to content', 'service-blueprint'); ?>
    </a>

    <header class="site-header" role="banner">
        <div class="header-container">
            <div class="site-branding">
                <?php if (has_custom_logo()) : ?>
                    <div class="site-logo-container">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home">
                        <?php bloginfo('name'); ?>
                    </a>
                <?php endif; ?>
            </div>

            <nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary menu', 'service-blueprint'); ?>">
                <button class="mobile-menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle mobile menu', 'service-blueprint'); ?>">
                    <span class="hamburger">☰</span>
                    <span class="close">✕</span>
                </button>
                
                <?php
                // Simplified navigation without custom walker for debugging
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id' => 'primary-menu',
                        'container' => false,
                        'fallback_cb' => 'service_blueprint_fallback_menu',
                    ));
                } else {
                    service_blueprint_fallback_menu();
                }
                ?>
            </nav>
        </div>
    </header>

    <main id="main" class="site-main" role="main">
