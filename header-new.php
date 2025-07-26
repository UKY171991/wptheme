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
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'professional-services'); ?></a>

    <!-- Header -->
    <header id="masthead" class="site-header" role="banner">
        <!-- Top Bar (Contact Info) -->
        <div class="header-top">
            <div class="container">
                <div class="header-top-content">
                    <div class="contact-info">
                        <?php 
                        $phone = get_theme_mod('company_phone', '(555) 123-4567');
                        $email = get_theme_mod('company_email', 'info@company.com');
                        if ($phone): ?>
                            <span class="header-phone">
                                <i class="fas fa-phone" aria-hidden="true"></i>
                                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a>
                            </span>
                        <?php endif; 
                        if ($email): ?>
                            <span class="header-email">
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                                <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                            </span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="social-links">
                        <?php 
                        $facebook = get_theme_mod('social_facebook', '');
                        $twitter = get_theme_mod('social_twitter', '');
                        $linkedin = get_theme_mod('social_linkedin', '');
                        $instagram = get_theme_mod('social_instagram', '');
                        
                        if ($facebook): ?>
                            <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener" aria-label="Facebook">
                                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            </a>
                        <?php endif;
                        if ($twitter): ?>
                            <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener" aria-label="Twitter">
                                <i class="fab fa-twitter" aria-hidden="true"></i>
                            </a>
                        <?php endif;
                        if ($linkedin): ?>
                            <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener" aria-label="LinkedIn">
                                <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                            </a>
                        <?php endif;
                        if ($instagram): ?>
                            <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener" aria-label="Instagram">
                                <i class="fab fa-instagram" aria-hidden="true"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Header -->
        <div class="header-main">
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
                    <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'professional-services'); ?>">
                        <!-- Mobile Menu Toggle -->
                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'professional-services'); ?>">
                            <span class="hamburger-line"></span>
                            <span class="hamburger-line"></span>
                            <span class="hamburger-line"></span>
                            <span class="menu-text"><?php esc_html_e('Menu', 'professional-services'); ?></span>
                        </button>

                        <!-- Navigation Menu -->
                        <div class="nav-menu-wrapper">
                            <?php
                            // Include the navigation walker
                            require_once get_template_directory() . '/inc/navigation-walker-new.php';
                            
                            if (has_nav_menu('primary')) {
                                wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'menu_id'        => 'primary-menu',
                                    'menu_class'     => 'navbar-nav',
                                    'container'      => false,
                                    'depth'          => 3,
                                    'fallback_cb'    => 'professional_services_navigation_fallback',
                                    'walker'         => new Professional_Services_Walker_Nav_Menu(),
                                ));
                            } else {
                                professional_services_navigation_fallback();
                            }
                            ?>
                        </div>
                    </nav>

                    <!-- Header CTA -->
                    <div class="header-cta">
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">
                            <i class="fas fa-phone" aria-hidden="true"></i>
                            <?php esc_html_e('Get Quote', 'professional-services'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Overlay -->
        <div class="mobile-nav-overlay" aria-hidden="true"></div>
    </header>

    <!-- Main Content -->
    <div id="content" class="site-content">
        <main id="main" class="site-main" role="main">
