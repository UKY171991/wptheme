    </div><!-- #content -->
</main><!-- #main -->

<footer class="site-footer" role="contentinfo">
    <!-- Main Footer Content -->
    <div class="footer-main bg-dark text-light py-5">
        <div class="container">
            <div class="row gy-4">
                <!-- Company Info -->
                <div class="col-lg-4 col-md-6">
                    <div class="footer-section">
                        <!-- Footer Logo/Brand -->
                        <div class="footer-brand mb-4">
                            <?php if (has_custom_logo()) : ?>
                                <div class="footer-logo">
                                    <?php the_custom_logo(); ?>
                                </div>
                            <?php else : ?>
                                <h3 class="footer-title mb-3">
                                    <span class="text-primary">Blue</span><span class="text-info">Print</span>
                                </h3>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Company Description -->
                        <div class="footer-description mb-4">
                            <p class="text-light-emphasis lh-lg">
                                <?php 
                                $description = get_theme_mod('footer_description', 'Professional blueprint solutions and comprehensive guides for your business success. We provide expert consulting and innovative strategies to help you achieve your goals.');
                                echo esc_html($description);
                                ?>
                            </p>
                        </div>
                        
                        <!-- Contact Information -->
                        <div class="footer-contact">
                            <div class="contact-item mb-3">
                                <i class="bi bi-geo-alt-fill text-primary me-3"></i>
                                <span class="text-light-emphasis">
                                    <?php echo esc_html(get_theme_mod('contact_address', '123 Business Street, Suite 100, City, State 12345')); ?>
                                </span>
                            </div>
                            <div class="contact-item mb-3">
                                <i class="bi bi-telephone-fill text-primary me-3"></i>
                                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_mod('contact_phone', '+1 (555) 123-4567'))); ?>" class="text-light text-decoration-none">
                                    <?php echo esc_html(get_theme_mod('contact_phone', '+1 (555) 123-4567')); ?>
                                </a>
                            </div>
                            <div class="contact-item mb-3">
                                <i class="bi bi-envelope-fill text-primary me-3"></i>
                                <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'info@blueprintfolder.com')); ?>" class="text-light text-decoration-none">
                                    <?php echo esc_html(get_theme_mod('contact_email', 'info@blueprintfolder.com')); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6">
                    <div class="footer-section">
                        <h5 class="footer-heading text-white mb-4"><?php esc_html_e('Quick Links', 'blueprint'); ?></h5>
                        <?php
                        if (has_nav_menu('footer-primary')) {
                            wp_nav_menu(array(
                                'theme_location' => 'footer-primary',
                                'container'      => false,
                                'menu_class'     => 'footer-menu list-unstyled',
                                'depth'          => 1,
                                'fallback_cb'    => false,
                                'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                                'walker'         => new class extends Walker_Nav_Menu {
                                    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
                                        $output .= '<li class="footer-menu-item mb-2">';
                                        $output .= '<a href="' . esc_url($item->url) . '" class="footer-menu-link text-light-emphasis text-decoration-none d-flex align-items-center">';
                                        $output .= '<i class="bi bi-arrow-right text-primary me-2"></i>';
                                        $output .= esc_html($item->title);
                                        $output .= '</a>';
                                    }
                                    function end_el(&$output, $item, $depth = 0, $args = null) {
                                        $output .= '</li>';
                                    }
                                }
                            ));
                        } else {
                            ?>
                            <ul class="footer-menu list-unstyled">
                                <li class="footer-menu-item mb-2">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-menu-link text-light-emphasis text-decoration-none d-flex align-items-center">
                                        <i class="bi bi-arrow-right text-primary me-2"></i>
                                        <?php esc_html_e('Home', 'blueprint'); ?>
                                    </a>
                                </li>
                                <li class="footer-menu-item mb-2">
                                    <a href="<?php echo esc_url(home_url('/about/')); ?>" class="footer-menu-link text-light-emphasis text-decoration-none d-flex align-items-center">
                                        <i class="bi bi-arrow-right text-primary me-2"></i>
                                        <?php esc_html_e('About', 'blueprint'); ?>
                                    </a>
                                </li>
                                <li class="footer-menu-item mb-2">
                                    <a href="<?php echo esc_url(home_url('/services/')); ?>" class="footer-menu-link text-light-emphasis text-decoration-none d-flex align-items-center">
                                        <i class="bi bi-arrow-right text-primary me-2"></i>
                                        <?php esc_html_e('Services', 'blueprint'); ?>
                                    </a>
                                </li>
                                <li class="footer-menu-item mb-2">
                                    <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="footer-menu-link text-light-emphasis text-decoration-none d-flex align-items-center">
                                        <i class="bi bi-arrow-right text-primary me-2"></i>
                                        <?php esc_html_e('Blog', 'blueprint'); ?>
                                    </a>
                                </li>
                                <li class="footer-menu-item mb-2">
                                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="footer-menu-link text-light-emphasis text-decoration-none d-flex align-items-center">
                                        <i class="bi bi-arrow-right text-primary me-2"></i>
                                        <?php esc_html_e('Contact', 'blueprint'); ?>
                                    </a>
                                </li>
                            </ul>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                
                <!-- Services -->
                <div class="col-lg-3 col-md-6">
                    <div class="footer-section">
                        <h5 class="footer-heading text-white mb-4"><?php esc_html_e('Our Services', 'blueprint'); ?></h5>
                        <?php
                        if (has_nav_menu('footer-services')) {
                            wp_nav_menu(array(
                                'theme_location' => 'footer-services',
                                'container'      => false,
                                'menu_class'     => 'footer-menu list-unstyled',
                                'depth'          => 1,
                                'fallback_cb'    => false,
                                'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                                'walker'         => new class extends Walker_Nav_Menu {
                                    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
                                        $output .= '<li class="footer-menu-item mb-2">';
                                        $output .= '<a href="' . esc_url($item->url) . '" class="footer-menu-link text-light-emphasis text-decoration-none d-flex align-items-center">';
                                        $output .= '<i class="bi bi-check-circle text-success me-2"></i>';
                                        $output .= esc_html($item->title);
                                        $output .= '</a>';
                                    }
                                    function end_el(&$output, $item, $depth = 0, $args = null) {
                                        $output .= '</li>';
                                    }
                                }
                            ));
                        } else {
                            ?>
                            <ul class="footer-menu list-unstyled">
                                <li class="footer-menu-item mb-2">
                                    <a href="<?php echo esc_url(home_url('/services/')); ?>" class="footer-menu-link text-light-emphasis text-decoration-none d-flex align-items-center">
                                        <i class="bi bi-check-circle text-success me-2"></i>
                                        <?php esc_html_e('Business Consulting', 'blueprint'); ?>
                                    </a>
                                </li>
                                <li class="footer-menu-item mb-2">
                                    <a href="<?php echo esc_url(home_url('/services/')); ?>" class="footer-menu-link text-light-emphasis text-decoration-none d-flex align-items-center">
                                        <i class="bi bi-check-circle text-success me-2"></i>
                                        <?php esc_html_e('Strategic Planning', 'blueprint'); ?>
                                    </a>
                                </li>
                                <li class="footer-menu-item mb-2">
                                    <a href="<?php echo esc_url(home_url('/services/')); ?>" class="footer-menu-link text-light-emphasis text-decoration-none d-flex align-items-center">
                                        <i class="bi bi-check-circle text-success me-2"></i>
                                        <?php esc_html_e('Digital Solutions', 'blueprint'); ?>
                                    </a>
                                </li>
                                <li class="footer-menu-item mb-2">
                                    <a href="<?php echo esc_url(home_url('/services/')); ?>" class="footer-menu-link text-light-emphasis text-decoration-none d-flex align-items-center">
                                        <i class="bi bi-check-circle text-success me-2"></i>
                                        <?php esc_html_e('Process Optimization', 'blueprint'); ?>
                                    </a>
                                </li>
                                <li class="footer-menu-item mb-2">
                                    <a href="<?php echo esc_url(home_url('/services/')); ?>" class="footer-menu-link text-light-emphasis text-decoration-none d-flex align-items-center">
                                        <i class="bi bi-check-circle text-success me-2"></i>
                                        <?php esc_html_e('Training & Support', 'blueprint'); ?>
                                    </a>
                                </li>
                            </ul>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                
                <!-- Stay Connected -->
                <div class="col-lg-3 col-md-6">
                    <div class="footer-section">
                        <h5 class="footer-heading text-white mb-4"><?php esc_html_e('Stay Connected', 'blueprint'); ?></h5>
                        
                        <!-- Simple Social Media Links -->
                        <div class="social-media">
                            <div class="social-links d-flex gap-3">
                                <a href="#" class="text-light fs-4" aria-label="<?php esc_attr_e('Follow us on Facebook', 'blueprint'); ?>">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="#" class="text-light fs-4" aria-label="<?php esc_attr_e('Follow us on Twitter', 'blueprint'); ?>">
                                    <i class="bi bi-twitter"></i>
                                </a>
                                <a href="#" class="text-light fs-4" aria-label="<?php esc_attr_e('Follow us on LinkedIn', 'blueprint'); ?>">
                                    <i class="bi bi-linkedin"></i>
                                </a>
                                <a href="#" class="text-light fs-4" aria-label="<?php esc_attr_e('Follow us on Instagram', 'blueprint'); ?>">
                                    <i class="bi bi-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer Bottom -->
    <div class="footer-bottom bg-darker text-light py-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="copyright text-light-emphasis">
                        <p class="mb-0">
                            &copy; <?php echo date('Y'); ?> 
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="text-primary text-decoration-none">
                                <?php bloginfo('name'); ?>
                            </a>. 
                            <?php esc_html_e('All rights reserved.', 'blueprint'); ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-legal text-md-end">
                        <?php
                        if (has_nav_menu('footer-legal')) {
                            wp_nav_menu(array(
                                'theme_location' => 'footer-legal',
                                'container'      => false,
                                'menu_class'     => 'legal-menu list-inline mb-0',
                                'depth'          => 1,
                                'fallback_cb'    => false,
                                'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                                'walker'         => new class extends Walker_Nav_Menu {
                                    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
                                        $output .= '<li class="list-inline-item">';
                                        $output .= '<a href="' . esc_url($item->url) . '" class="text-light-emphasis text-decoration-none small">';
                                        $output .= esc_html($item->title);
                                        $output .= '</a>';
                                    }
                                    function end_el(&$output, $item, $depth = 0, $args = null) {
                                        $output .= '</li>';
                                    }
                                }
                            ));
                        } else {
                            ?>
                            <ul class="legal-menu list-inline mb-0">
                                <li class="list-inline-item">
                                    <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" class="text-light-emphasis text-decoration-none small">
                                        <?php esc_html_e('Privacy Policy', 'blueprint'); ?>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <span class="text-light-emphasis mx-2">|</span>
                                </li>
                                <li class="list-inline-item">
                                    <a href="<?php echo esc_url(home_url('/terms-of-service/')); ?>" class="text-light-emphasis text-decoration-none small">
                                        <?php esc_html_e('Terms of Service', 'blueprint'); ?>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <span class="text-light-emphasis mx-2">|</span>
                                </li>
                                <li class="list-inline-item">
                                    <a href="<?php echo esc_url(home_url('/sitemap/')); ?>" class="text-light-emphasis text-decoration-none small">
                                        <?php esc_html_e('Sitemap', 'blueprint'); ?>
                                    </a>
                                </li>
                            </ul>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Back to Top Button -->
    <button type="button" class="back-to-top btn btn-primary btn-floating" id="back-to-top" aria-label="<?php esc_attr_e('Back to top', 'blueprint'); ?>">
        <i class="bi bi-arrow-up"></i>
    </button>
</footer>

<?php wp_footer(); ?>
</body>
</html>
