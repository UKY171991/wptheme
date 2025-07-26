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
                        <span class="hamburger"></span>
                        <span class="hamburger"></span>
                        <span class="hamburger"></span>
                    </button>

                    <!-- Navigation Menu -->
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
                                'walker'         => new BluePrint_Folder_Walker_Nav_Menu(),
                            ));
                        } else {
                            blueprint_folder_navigation_fallback();
                        }
                        ?>
                    </div>
                </nav>

                <!-- Header CTA -->
                <div class="header-cta">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">
                        <i class="fas fa-phone" aria-hidden="true"></i>
                        <span>Get Quote</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div id="content" class="site-content">
        <main id="main" class="site-main" role="main">
