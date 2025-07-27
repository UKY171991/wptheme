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
    <!-- Skip Links for Accessibility -->
    <div class="skip-links" aria-label="<?php esc_attr_e('Skip links', 'blueprint-folder'); ?>">
        <a class="skip-link screen-reader-text" href="#main">
            <?php esc_html_e('Skip to main content', 'blueprint-folder'); ?>
        </a>
        <a class="skip-link screen-reader-text" href="#primary-navigation">
            <?php esc_html_e('Skip to navigation', 'blueprint-folder'); ?>
        </a>
    </div>

    <!-- Enhanced Header Section -->
    <header id="masthead" class="site-header" role="banner" itemscope itemtype="https://schema.org/Organization">
        <nav class="navbar navbar-expand-lg navbar-light bg-white" role="navigation" aria-label="<?php esc_attr_e('Main navigation', 'blueprint-folder'); ?>">
            <div class="container">
                <!-- Enhanced Site Branding -->
                <div class="site-branding" itemscope itemtype="https://schema.org/Brand">
                    <?php if (has_custom_logo()) : ?>
                        <div class="custom-logo-container">
                            <?php 
                            $custom_logo_id = get_theme_mod('custom_logo');
                            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                            if ($logo) : ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="custom-logo-link" itemprop="url">
                                    <img src="<?php echo esc_url($logo[0]); ?>" 
                                         alt="<?php echo esc_attr(get_bloginfo('name')); ?>" 
                                         class="custom-logo" 
                                         itemprop="logo"
                                         width="<?php echo esc_attr($logo[1]); ?>" 
                                         height="<?php echo esc_attr($logo[2]); ?>">
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php else : ?>
                        <div class="text-branding">
                            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home" itemprop="url">
                                <span class="site-title" itemprop="name"><?php bloginfo('name'); ?></span>
                                <?php 
                                $description = get_bloginfo('description', 'display');
                                if ($description || is_customize_preview()) : ?>
                                    <small class="site-description" itemprop="description"><?php echo esc_html($description); ?></small>
                                <?php endif; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Enhanced Mobile Menu Toggle -->
                <button class="navbar-toggler enhanced-mobile-toggle" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#primary-navigation" 
                        aria-controls="primary-navigation" 
                        aria-expanded="false" 
                        aria-label="<?php esc_attr_e('Toggle main navigation menu', 'blueprint-folder'); ?>"
                        data-mobile-menu-trigger>
                    <span class="hamburger-lines" aria-hidden="true">
                        <span class="line line-1"></span>
                        <span class="line line-2"></span>
                        <span class="line line-3"></span>
                    </span>
                    <span class="sr-only"><?php esc_html_e('Menu', 'blueprint-folder'); ?></span>
                </button>

                <!-- Enhanced Primary Navigation -->
                <div class="collapse navbar-collapse enhanced-navigation" id="primary-navigation" data-mobile-menu-panel>
                    <!-- Mobile Menu Header (Hidden on Desktop) -->
                    <div class="mobile-menu-header d-lg-none">
                        <div class="mobile-brand">
                            <?php if (has_custom_logo()) : ?>
                                <?php the_custom_logo(); ?>
                            <?php else : ?>
                                <span class="mobile-site-title"><?php bloginfo('name'); ?></span>
                            <?php endif; ?>
                        </div>
                        <button class="mobile-menu-close" aria-label="<?php esc_attr_e('Close navigation menu', 'blueprint-folder'); ?>" data-mobile-menu-close>
                            <i class="fas fa-times" aria-hidden="true"></i>
                        </button>
                    </div>

                    <!-- Navigation Menu -->
                    <div class="navigation-wrapper" role="menubar">
                        <?php
                        wp_nav_menu(array(
                            'theme_location'    => 'primary',
                            'menu_id'          => 'primary-menu',
                            'menu_class'       => 'navbar-nav ms-auto enhanced-nav-menu',
                            'container'        => false,
                            'depth'            => 3,
                            'fallback_cb'      => 'blueprint_folder_navigation_fallback',
                            'walker'           => new WP_Bootstrap_Navwalker(),
                            'items_wrap'       => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
                        ));
                        ?>
                    </div>
                    
                    <!-- Enhanced CTA Section -->
                    <div class="navbar-actions ms-lg-3">
                        <div class="cta-wrapper">
                            <a href="<?php echo esc_url(blueprint_folder_get_header_cta_url()); ?>" 
                               class="btn btn-primary enhanced-cta-btn" 
                               role="button"
                               aria-describedby="cta-description">
                                <i class="fas fa-envelope me-2" aria-hidden="true"></i>
                                <span class="cta-text"><?php echo esc_html(blueprint_folder_get_header_cta_text()); ?></span>
                            </a>
                            <span id="cta-description" class="sr-only">
                                <?php esc_html_e('Contact us for a free quote on our services', 'blueprint-folder'); ?>
                            </span>
                        </div>
                    </div>

                    <!-- Mobile Menu Footer (Hidden on Desktop) -->
                    <div class="mobile-menu-footer d-lg-none">
                        <div class="mobile-contact-info">
                            <p class="mobile-tagline"><?php echo esc_html(get_bloginfo('description')); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Mobile Menu Backdrop -->
                <div class="mobile-menu-backdrop d-lg-none" data-mobile-menu-backdrop aria-hidden="true"></div>
            </div>
        </nav>
        
        <!-- ARIA Live Region for Screen Reader Announcements -->
        <div class="aria-live-region" aria-live="polite" aria-atomic="true" id="navigation-announcements"></div>
    </header>

    <!-- Main Content Area -->
    <main id="main" class="site-main" role="main">
