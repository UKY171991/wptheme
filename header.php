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

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'services-pro'); ?></a>

    <header id="masthead" class="site-header bg-white shadow-sm position-relative">
        <nav class="navbar navbar-expand-lg navbar-light py-2 py-lg-3">
            <div class="container">
                <!-- Brand/Logo -->
                <div class="site-branding">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        ?>
                        <a class="navbar-brand fw-bold text-primary-dark text-decoration-none" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                            <?php
                            $description = get_bloginfo('description', 'display');
                            if ($description || is_customize_preview()) :
                                ?>
                                <small class="d-block text-muted fw-normal"><?php echo esc_html($description); ?></small>
                            <?php endif; ?>
                        </a>
                        <?php
                    }
                    ?>
                </div>

                <!-- Mobile Toggle Button -->
                <button class="navbar-toggler border-0 p-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'services-pro'); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation Menu -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'navbar-nav ms-auto mb-2 mb-lg-0',
                        'container'      => false,
                        'depth'          => 3,
                        'walker'         => new Bootstrap_Walker_Nav_Menu(),
                        'fallback_cb'    => 'wp_page_menu',
                    ));
                    ?>
                    
                    <!-- CTA Button -->
                    <div class="d-flex ms-lg-3 mt-3 mt-lg-0">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-accent btn-rounded px-4 w-100 w-lg-auto text-center">
                            <i class="fas fa-phone me-2"></i>Get Quote
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main id="primary" class="site-main">
