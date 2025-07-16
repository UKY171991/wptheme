<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta name="format-detection" content="telephone=no">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container header-container">
        <div class="site-branding">
            <?php
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
                ?>
                <h1 class="site-title">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php bloginfo('name'); ?>
                    </a>
                </h1>
                <?php
            }
            ?>
        </div>

        <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'blueprint'); ?>">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle Navigation', 'blueprint'); ?>">
                <span class="screen-reader-text"><?php esc_html_e('Menu', 'blueprint'); ?></span>
                <span></span>
                <span></span>
                <span></span>
            </button>
            <?php wp_nav_menu(array(
                'theme_location' => 'primary-menu',
                'menu_class'     => 'nav-menu',
                'menu_id'        => 'primary-menu',
                'container'      => false,
                'fallback_cb'    => 'wp_page_menu',
                'depth'          => 0,
            )); ?>
        </nav>
    </div>
    
    <!-- Mobile overlay for better UX -->
    <div class="mobile-nav-overlay"></div>
</header>

<main id="main" class="site-main" role="main">


