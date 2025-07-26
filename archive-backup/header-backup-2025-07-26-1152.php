<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#main"><?php _e('Skip to content', 'blueprint-folder'); ?></a>

    <!-- Header -->
    <header id="header" class="site-header" role="banner">
        <!-- Top Bar (Optional Contact Info) -->
        <?php 
        $phone = get_theme_mod('blueprint_folder_phone');
        $email = get_theme_mod('blueprint_folder_email');
        if ($phone || $email): 
        ?>
        <div class="header-top">
            <div class="container">
                <div class="header-top-content">
                    <div class="header-contact">
                        <?php if ($phone): ?>
                            <span class="header-phone">
                                <i class="fas fa-phone" aria-hidden="true"></i>
                                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a>
                            </span>
                        <?php endif; ?>
                        
                        <?php if ($email): ?>
                            <span class="header-email">
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                                <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                            </span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="header-social">
                        <!-- Add social links here if needed -->
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Main Header -->
        <div class="header-main">
            <div class="container">
                <div class="header-content">
                    <!-- Logo -->
                    <div class="site-branding">
                        <?php
                        $custom_logo = get_theme_mod('blueprint_folder_logo');
                        if ($custom_logo) : ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="custom-logo-link" rel="home">
                                <img src="<?php echo esc_url($custom_logo); ?>" alt="<?php bloginfo('name'); ?>" class="custom-logo">
                            </a>
                        <?php else : ?>
                            <h1 class="site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </h1>
                            <?php
                            $description = get_bloginfo('description', 'display');
                            if ($description || is_customize_preview()) : ?>
                                <p class="site-description"><?php echo $description; ?></p>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                    <!-- Navigation -->
                    <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'blueprint-folder'); ?>">
                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'blueprint-folder'); ?>">
                            <span class="menu-toggle-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                            <span class="menu-toggle-text"><?php _e('Menu', 'blueprint-folder'); ?></span>
                        </button>

                        <div class="nav-menu-wrapper">
                            <?php
                            if (has_nav_menu('primary')) {
                                wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'menu_id'        => 'primary-menu',
                                    'menu_class'     => 'nav-menu',
                                    'container'      => false,
                                    'depth'          => 3,
                                    'fallback_cb'    => 'blueprint_folder_navigation_fallback',
                                    'walker'         => new Blueprint_Folder_Walker_Nav_Menu(),
                                ));
                            } else {
                                blueprint_folder_navigation_fallback();
                            }
                            ?>
                        </div>
                    </nav>

                    <!-- CTA Button -->
                    <div class="header-cta">
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-cta">
                            <?php _e('Get Quote', 'blueprint-folder'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Overlay -->
        <div class="mobile-nav-overlay" aria-hidden="true"></div>
    </header>

    <!-- Page Content -->
    <div id="content" class="site-content">
        <main id="main" class="site-main" role="main">
