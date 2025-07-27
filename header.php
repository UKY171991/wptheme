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

                <!-- Primary Navigation -->
                <div class="collapse navbar-collapse" id="primary-navigation">
                    <!-- Navigation Menu -->
                        <?php
                        wp_nav_menu(array(
                            'theme_location'    => 'primary',
                            'menu_id'          => 'primary-menu',
                            'menu_class'       => 'navbar-nav',
                            'container'        => false,
                            'depth'            => 2,
                            'fallback_cb'      => 'blueprint_folder_navigation_fallback',
                            'walker'           => new WP_Bootstrap_Navwalker(),
                            'items_wrap'       => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        ));
                        ?>
                    
                    <!-- CTA Button -->
                    <div class="d-flex ms-3">
                        <a href="<?php echo esc_url(blueprint_folder_get_header_cta_url()); ?>" 
                           class="btn btn-primary">
                            <?php echo esc_html(blueprint_folder_get_header_cta_text()); ?>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        
        <!-- ARIA Live Region for Screen Reader Announcements -->
        <div class="aria-live-region" aria-live="polite" aria-atomic="true" id="navigation-announcements"></div>
    </header>

    <!-- Main Content Area -->
    <main id="main" class="site-main" role="main">
