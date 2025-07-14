<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="screen-reader-text"><?php esc_html_e('Menu', 'blueprint'); ?></span>
                <span></span>
                <span></span>
                <span></span>
            </button>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary-menu',
                'menu_class' => 'nav-menu',
                'container' => false,
                'fallback_cb' => 'blueprint_fallback_menu',
                'items_wrap' => '<ul id="primary-menu" class="%2$s">%3$s</ul>'
            ));
            ?>
        </nav>
    </div>
</header>

<?php
wp_footer();
?>
</body>
</html>


