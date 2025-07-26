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
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'blueprint-folder'); ?></a>

    <!-- Header -->
    <header id="masthead" class="site-header" role="banner">
        <div class="container">
            <div class="header-content">
                <!-- Site Branding -->
                <div class="site-branding">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        ?>
                        <h1 class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <?php bloginfo('name'); ?>
                            </a>
                        </h1>
                        <?php
                        $description = get_bloginfo('description', 'display');
                        if ($description || is_customize_preview()) {
                            ?>
                            <p class="site-description"><?php echo $description; ?></p>
                            <?php
                        }
                    }
                    ?>
                </div>

                <!-- Primary Navigation -->
                <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'blueprint-folder'); ?>">
                    <!-- Mobile Menu Toggle -->
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'blueprint-folder'); ?>">
                        <span class="hamburger hamburger-1"></span>
                        <span class="hamburger hamburger-2"></span>
                        <span class="hamburger hamburger-3"></span>
                        <span class="sr-only">Menu</span>
                    </button>

                    <!-- Navigation Menu -->
                    <div class="nav-menu-wrapper" id="primary-menu">
                        <?php
                        if (has_nav_menu('primary')) {
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'menu_id'        => 'primary-navigation',
                                'menu_class'     => 'nav-menu primary-nav',
                                'container'      => false,
                                'depth'          => 4,
                                'fallback_cb'    => 'blueprint_folder_navigation_fallback',
                                'walker'         => new BluePrint_Folder_Walker_Nav_Menu(),
                            ));
                        } else {
                            blueprint_folder_navigation_fallback();
                        }
                        ?>
                        
                        <!-- Mobile Contact Info -->
                        <div class="mobile-contact-info">
                            <div class="mobile-contact-item">
                                <i class="fas fa-phone" aria-hidden="true"></i>
                                <a href="tel:<?php echo esc_attr(get_theme_mod('company_phone', '(555) 123-4567')); ?>">
                                    <?php echo esc_html(get_theme_mod('company_phone', '(555) 123-4567')); ?>
                                </a>
                            </div>
                            <div class="mobile-contact-item">
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                                <a href="mailto:<?php echo esc_attr(get_theme_mod('company_email', 'info@blueprintfolder.com')); ?>">
                                    <?php echo esc_html(get_theme_mod('company_email', 'info@blueprintfolder.com')); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Menu Overlay for Mobile -->
                    <div class="menu-overlay"></div>
                </nav>

                <!-- Header CTA -->
                <div class="header-cta">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary header-cta-btn">
                        <i class="fas fa-paper-plane" aria-hidden="true"></i>
                        <span class="cta-text">Get Quote</span>
                        <span class="cta-text-mobile">Quote</span>
                    </a>
                    
                    <!-- Additional Header Actions -->
                    <div class="header-actions">
                        <a href="tel:<?php echo esc_attr(get_theme_mod('company_phone', '(555) 123-4567')); ?>" class="header-phone-link" title="Call Us">
                            <i class="fas fa-phone" aria-hidden="true"></i>
                            <span class="sr-only">Call Us</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div id="content" class="site-content">
        <main id="main" class="site-main" role="main">
