    </main><!-- #main -->

    <footer class="site-footer" role="contentinfo">
        <div class="footer-content">
            <?php if (is_active_sidebar('footer-widgets')) : ?>
                <div class="footer-widgets">
                    <?php dynamic_sidebar('footer-widgets'); ?>
                </div>
            <?php endif; ?>

            <nav class="footer-navigation" role="navigation" aria-label="<?php esc_attr_e('Footer menu', 'service-blueprint'); ?>">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container' => false,
                    'menu_class' => 'footer-links',
                    'fallback_cb' => false,
                ));
                ?>
            </nav>

            <div class="footer-info">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'service-blueprint'); ?></p>
                <?php if (get_theme_mod('footer_text')) : ?>
                    <p><?php echo esc_html(get_theme_mod('footer_text')); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </footer>

    <!-- Back to top button -->
    <button id="back-to-top" class="back-to-top" aria-label="<?php esc_attr_e('Back to top', 'service-blueprint'); ?>" style="display: none;">
        <span>↑</span>
    </button>

    <?php wp_footer(); ?>
</body>
</html>
