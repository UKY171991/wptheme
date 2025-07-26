    </div><!-- #content -->

    <!-- Footer -->
    <footer id="footer" class="site-footer" role="contentinfo">
        <div class="footer-main">
            <div class="container">
                <div class="footer-content">
                    <div class="footer-grid">
                        <!-- Company Info -->
                        <div class="footer-section footer-about">
                            <div class="footer-logo">
                                <?php
                                $custom_logo = get_theme_mod('blueprint_folder_logo');
                                if ($custom_logo) : ?>
                                    <img src="<?php echo esc_url($custom_logo); ?>" alt="<?php bloginfo('name'); ?>" class="footer-logo-img">
                                <?php else : ?>
                                    <h3 class="footer-site-title"><?php bloginfo('name'); ?></h3>
                                <?php endif; ?>
                            </div>
                            
                            <div class="footer-description">
                                <?php
                                $description = get_bloginfo('description');
                                if ($description) : ?>
                                    <p><?php echo esc_html($description); ?></p>
                                <?php else : ?>
                                    <p><?php _e('Professional construction and contracting services for residential and commercial projects.', 'blueprint-folder'); ?></p>
                                <?php endif; ?>
                            </div>

                            <!-- Contact Information -->
                            <div class="footer-contact-info">
                                <?php
                                $phone = get_theme_mod('blueprint_folder_phone');
                                $email = get_theme_mod('blueprint_folder_email');
                                $address = get_theme_mod('blueprint_folder_address');
                                ?>

                                <?php if ($phone) : ?>
                                    <div class="contact-item">
                                        <i class="fas fa-phone" aria-hidden="true"></i>
                                        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a>
                                    </div>
                                <?php endif; ?>

                                <?php if ($email) : ?>
                                    <div class="contact-item">
                                        <i class="fas fa-envelope" aria-hidden="true"></i>
                                        <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                                    </div>
                                <?php endif; ?>

                                <?php if ($address) : ?>
                                    <div class="contact-item">
                                        <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                                        <address><?php echo wp_kses_post($address); ?></address>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Social Media Links -->
                            <div class="footer-social">
                                <h4 class="footer-social-title"><?php _e('Follow Us', 'blueprint-folder'); ?></h4>
                                <div class="social-links">
                                    <a href="#" class="social-link facebook" aria-label="<?php esc_attr_e('Follow us on Facebook', 'blueprint-folder'); ?>">
                                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="social-link twitter" aria-label="<?php esc_attr_e('Follow us on Twitter', 'blueprint-folder'); ?>">
                                        <i class="fab fa-twitter" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="social-link instagram" aria-label="<?php esc_attr_e('Follow us on Instagram', 'blueprint-folder'); ?>">
                                        <i class="fab fa-instagram" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="social-link linkedin" aria-label="<?php esc_attr_e('Follow us on LinkedIn', 'blueprint-folder'); ?>">
                                        <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="social-link youtube" aria-label="<?php esc_attr_e('Follow us on YouTube', 'blueprint-folder'); ?>">
                                        <i class="fab fa-youtube" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Links -->
                        <div class="footer-section footer-links">
                            <h4 class="footer-title"><?php _e('Quick Links', 'blueprint-folder'); ?></h4>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer',
                                'menu_class'     => 'footer-menu',
                                'container'      => false,
                                'depth'          => 1,
                                'fallback_cb'    => 'blueprint_folder_footer_menu_fallback',
                            ));
                            ?>
                        </div>

                        <!-- Services -->
                        <div class="footer-section footer-services">
                            <h4 class="footer-title"><?php _e('Our Services', 'blueprint-folder'); ?></h4>
                            <?php
                            $services = blueprint_folder_get_services_by_category('', 6);
                            if ($services->have_posts()) : ?>
                                <ul class="footer-services-list">
                                    <?php while ($services->have_posts()) : $services->the_post(); ?>
                                        <li>
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                                <?php wp_reset_postdata(); ?>
                            <?php else : ?>
                                <ul class="footer-services-list">
                                    <li><a href="<?php echo esc_url(home_url('/services/residential-construction')); ?>"><?php _e('Residential Construction', 'blueprint-folder'); ?></a></li>
                                    <li><a href="<?php echo esc_url(home_url('/services/commercial-construction')); ?>"><?php _e('Commercial Construction', 'blueprint-folder'); ?></a></li>
                                    <li><a href="<?php echo esc_url(home_url('/services/remodeling')); ?>"><?php _e('Remodeling', 'blueprint-folder'); ?></a></li>
                                    <li><a href="<?php echo esc_url(home_url('/services/roofing')); ?>"><?php _e('Roofing', 'blueprint-folder'); ?></a></li>
                                    <li><a href="<?php echo esc_url(home_url('/services/electrical')); ?>"><?php _e('Electrical', 'blueprint-folder'); ?></a></li>
                                    <li><a href="<?php echo esc_url(home_url('/services/plumbing')); ?>"><?php _e('Plumbing', 'blueprint-folder'); ?></a></li>
                                </ul>
                            <?php endif; ?>
                        </div>

                        <!-- Newsletter & Widget Area -->
                        <div class="footer-section footer-newsletter">
                            <h4 class="footer-title"><?php _e('Stay Updated', 'blueprint-folder'); ?></h4>
                            <p><?php _e('Subscribe to our newsletter for the latest construction tips and project updates.', 'blueprint-folder'); ?></p>
                            
                            <!-- Newsletter Form -->
                            <form class="newsletter-form" action="#" method="post">
                                <div class="form-group">
                                    <label for="newsletter-email" class="screen-reader-text"><?php _e('Email Address', 'blueprint-folder'); ?></label>
                                    <input type="email" id="newsletter-email" name="email" placeholder="<?php esc_attr_e('Your email address', 'blueprint-folder'); ?>" required>
                                    <button type="submit" class="btn btn-primary btn-newsletter">
                                        <?php _e('Subscribe', 'blueprint-folder'); ?>
                                    </button>
                                </div>
                            </form>

                            <!-- Business Hours -->
                            <div class="business-hours">
                                <h5><?php _e('Business Hours', 'blueprint-folder'); ?></h5>
                                <ul class="hours-list">
                                    <li><span><?php _e('Monday - Friday:', 'blueprint-folder'); ?></span> <span>8:00 AM - 6:00 PM</span></li>
                                    <li><span><?php _e('Saturday:', 'blueprint-folder'); ?></span> <span>9:00 AM - 4:00 PM</span></li>
                                    <li><span><?php _e('Sunday:', 'blueprint-folder'); ?></span> <span><?php _e('Closed', 'blueprint-folder'); ?></span></li>
                                </ul>
                            </div>

                            <!-- Widget Area -->
                            <?php if (is_active_sidebar('footer-4')) : ?>
                                <div class="footer-widgets">
                                    <?php dynamic_sidebar('footer-4'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-content">
                    <div class="footer-copyright">
                        <p>&copy; <?php echo date('Y'); ?> <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>. <?php _e('All rights reserved.', 'blueprint-folder'); ?></p>
                    </div>

                    <div class="footer-legal">
                        <ul class="legal-links">
                            <li><a href="<?php echo esc_url(home_url('/privacy-policy')); ?>"><?php _e('Privacy Policy', 'blueprint-folder'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/terms-of-service')); ?>"><?php _e('Terms of Service', 'blueprint-folder'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/sitemap')); ?>"><?php _e('Sitemap', 'blueprint-folder'); ?></a></li>
                        </ul>
                    </div>

                    <div class="footer-back-to-top">
                        <button class="back-to-top" aria-label="<?php esc_attr_e('Back to top', 'blueprint-folder'); ?>">
                            <i class="fas fa-arrow-up" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Font Awesome (load from CDN for now) -->
<script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>

</body>
</html>

<?php
/**
 * Footer Menu Fallback
 */
function blueprint_folder_footer_menu_fallback() {
    echo '<ul class="footer-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . __('Home', 'blueprint-folder') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/about')) . '">' . __('About', 'blueprint-folder') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/services')) . '">' . __('Services', 'blueprint-folder') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/projects')) . '">' . __('Projects', 'blueprint-folder') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact')) . '">' . __('Contact', 'blueprint-folder') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/pricing')) . '">' . __('Pricing', 'blueprint-folder') . '</a></li>';
    echo '</ul>';
}
?>
