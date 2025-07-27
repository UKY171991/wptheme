<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Preload critical resources -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- DNS prefetch for performance -->
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <!-- Skip link for accessibility -->
    <a class="skip-link screen-reader-text" href="#main" tabindex="1">
        <?php esc_html_e('Skip to main content', 'blueprint-folder'); ?>
    </a>

    <!-- Header Section -->
    <header id="masthead" class="site-header" role="banner">
        <div class="container-fluid">
            <div class="header-wrapper">
                <div class="container">
                    <div class="header-content">
                        
                        <!-- Site Branding -->
                        <div class="site-branding">
                            <?php if (has_custom_logo()) : ?>
                                <div class="custom-logo-container">
                                    <?php the_custom_logo(); ?>
                                </div>
                            <?php else : ?>
                                <div class="site-title-container">
                                    <h1 class="site-title">
                                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php bloginfo('name'); ?> - Go to homepage">
                                            <?php bloginfo('name'); ?>
                                        </a>
                                    </h1>
                                    <?php
                                    $description = get_bloginfo('description', 'display');
                                    if ($description || is_customize_preview()) :
                                    ?>
                                        <p class="site-description"><?php echo esc_html($description); ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Main Navigation -->
                        <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'blueprint-folder'); ?>">
                            
                            <!-- Mobile Menu Toggle -->
                            <button 
                                class="menu-toggle" 
                                aria-controls="primary-menu" 
                                aria-expanded="false" 
                                aria-label="<?php esc_attr_e('Toggle main menu', 'blueprint-folder'); ?>"
                                type="button"
                            >
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                                <span class="menu-text">
                                    <span class="menu-text-open"><?php esc_html_e('Menu', 'blueprint-folder'); ?></span>
                                    <span class="menu-text-close"><?php esc_html_e('Close', 'blueprint-folder'); ?></span>
                                </span>
                            </button>

                            <!-- WordPress Standard Navigation Menu -->
                            <div class="menu-wrapper" id="primary-menu">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location'  => 'primary',
                                    'menu_id'         => 'primary-menu',
                                    'menu_class'      => 'menu nav-menu',
                                    'container'       => false,
                                    'depth'           => 0,
                                    'fallback_cb'     => 'blueprint_folder_navigation_fallback',
                                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                ));
                                ?>
                                
                                <!-- Mobile Contact Information -->
                                <div class="mobile-contact-info">
                                    <div class="mobile-contact-section">
                                        <h3 class="mobile-contact-title"><?php esc_html_e('Get In Touch', 'blueprint-folder'); ?></h3>
                                        
                                        <?php 
                                        $phone = get_theme_mod('company_phone', '(555) 123-4567');
                                        $email = get_theme_mod('company_email', 'info@blueprintfolder.com');
                                        if ($phone) : 
                                        ?>
                                            <div class="mobile-contact-item">
                                                <a href="tel:<?php echo esc_attr($phone); ?>" class="mobile-contact-link">
                                                    <i class="fas fa-phone" aria-hidden="true"></i>
                                                    <span><?php echo esc_html($phone); ?></span>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ($email) : ?>
                                            <div class="mobile-contact-item">
                                                <a href="mailto:<?php echo esc_attr($email); ?>" class="mobile-contact-link">
                                                    <i class="fas fa-envelope" aria-hidden="true"></i>
                                                    <span><?php echo esc_html($email); ?></span>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <!-- Mobile Social Links -->
                                    <?php if (get_theme_mod('social_facebook') || get_theme_mod('social_twitter') || get_theme_mod('social_linkedin')) : ?>
                                        <div class="mobile-social-section">
                                            <h4 class="mobile-social-title"><?php esc_html_e('Follow Us', 'blueprint-folder'); ?></h4>
                                            <div class="mobile-social-links">
                                                <?php if (get_theme_mod('social_facebook')) : ?>
                                                    <a href="<?php echo esc_url(get_theme_mod('social_facebook')); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if (get_theme_mod('social_twitter')) : ?>
                                                    <a href="<?php echo esc_url(get_theme_mod('social_twitter')); ?>" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
                                                        <i class="fab fa-twitter"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if (get_theme_mod('social_linkedin')) : ?>
                                                    <a href="<?php echo esc_url(get_theme_mod('social_linkedin')); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                                                        <i class="fab fa-linkedin-in"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <!-- Menu Overlay for Mobile -->
                            <div class="menu-overlay" aria-hidden="true"></div>
                        </nav>

                        <!-- Header Actions -->
                        <div class="header-actions">
                            
                            <!-- Phone Link (Desktop) -->
                            <?php 
                            $phone = get_theme_mod('company_phone', '(555) 123-4567');
                            if ($phone) : 
                            ?>
                                <a href="tel:<?php echo esc_attr($phone); ?>" class="header-phone-link d-none d-md-flex" aria-label="<?php esc_attr_e('Call us', 'blueprint-folder'); ?>">
                                    <i class="fas fa-phone" aria-hidden="true"></i>
                                    <span class="phone-text d-none d-lg-inline"><?php echo esc_html($phone); ?></span>
                                </a>
                            <?php endif; ?>
                            
                            <!-- Primary CTA Button -->
                            <div class="header-cta">
                                <?php 
                                $cta_text = get_theme_mod('header_cta_text', 'Get Quote');
                                $cta_url = get_theme_mod('header_cta_url', home_url('/contact'));
                                ?>
                                <a href="<?php echo esc_url($cta_url); ?>" class="btn btn-primary header-cta-btn">
                                    <i class="fas fa-paper-plane" aria-hidden="true"></i>
                                    <span class="cta-text"><?php echo esc_html($cta_text); ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <div id="content" class="site-content">
        <main id="main" class="site-main" role="main">
