<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Skip to content link for accessibility -->
<a class="skip-link screen-reader-text" href="#main" tabindex="1"><?php esc_html_e('Skip to content', 'blueprint'); ?></a>

<header class="site-header" role="banner">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'blueprint'); ?>">
        <div class="container">
            <!-- Brand/Logo -->
            <div class="navbar-brand-wrapper">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <span class="site-title text-primary fw-bold"><?php bloginfo('name'); ?></span>
                        <?php 
                        $description = get_bloginfo('description', 'display');
                        if ($description || is_customize_preview()) :
                        ?>
                            <span class="site-description visually-hidden"><?php echo $description; ?></span>
                        <?php endif; ?>
                    </a>
                    <?php
                }
                ?>
            </div>
            
            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primary-navigation" aria-controls="primary-navigation" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle Navigation', 'blueprint'); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Navigation Menu -->
            <div class="collapse navbar-collapse" id="primary-navigation">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location'  => 'primary',
                        'depth'          => 3,
                        'container'      => false,
                        'menu_class'     => 'navbar-nav me-auto mb-2 mb-lg-0',
                        'fallback_cb'    => 'blueprint_fallback_menu',
                        'walker'         => new WP_Bootstrap_Navwalker(),
                    ));
                } else {
                    blueprint_fallback_menu();
                }
                ?>
                
                <!-- Header Actions -->
                <div class="navbar-actions d-flex align-items-center">
                    <!-- Search Toggle -->
                    <button class="btn btn-link search-toggle p-2" type="button" aria-expanded="false" aria-controls="search-container" aria-label="<?php esc_attr_e('Toggle Search', 'blueprint'); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <span class="visually-hidden"><?php esc_html_e('Search', 'blueprint'); ?></span>
                    </button>
                    
                    <!-- CTA Button -->
                    <?php 
                    $contact_page = get_page_by_path('contact');
                    if ($contact_page) :
                    ?>
                    <a href="<?php echo esc_url(get_permalink($contact_page)); ?>" class="btn btn-primary ms-3">
                        <?php esc_html_e('Get Started', 'blueprint'); ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Search Container -->
    <div id="search-container" class="search-container bg-light py-4 shadow-sm" style="display: none;" role="search">
        <div class="container">
            <form method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>" role="search">
                <div class="input-group">
                    <label for="search-field" class="visually-hidden"><?php esc_html_e('Search for:', 'blueprint'); ?></label>
                    <input type="search" id="search-field" class="form-control search-field" placeholder="<?php esc_attr_e('Search blueprints, guides, and more...', 'blueprint'); ?>" value="<?php echo get_search_query(); ?>" name="s" required>
                    <button type="submit" class="btn btn-primary search-submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <span class="visually-hidden"><?php esc_html_e('Search', 'blueprint'); ?></span>
                    </button>
                </div>
            </form>
            <button type="button" class="btn-close search-close position-absolute top-0 end-0 m-4" aria-label="<?php esc_attr_e('Close search', 'blueprint'); ?>"></button>
        </div>
    </div>
</header>

<main id="main" class="site-main" role="main">
    <div id="content" class="site-content">

