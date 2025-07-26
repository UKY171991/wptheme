        </main><!-- #main -->
    </div><!-- #content -->

    <!-- Footer -->
    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="footer-main">
            <div class="container">
                <div class="footer-content">
                    <!-- Company Info -->
                    <div class="footer-section footer-company">
                        <h4 class="footer-title">BluePrint Folder</h4>
                        <p class="footer-description">
                            Professional services provider offering quality solutions for your business needs. 
                            Trusted by clients nationwide for over a decade.
                        </p>
                        
                        <div class="footer-contact">
                            <?php 
                            $phone = get_theme_mod('company_phone', '(555) 123-4567');
                            $email = get_theme_mod('company_email', 'info@blueprintfolder.com');
                            $address = get_theme_mod('company_address', '123 Business St, City, State 12345');
                            
                            if ($phone): ?>
                                <div class="contact-item">
                                    <i class="fas fa-phone" aria-hidden="true"></i>
                                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a>
                                </div>
                            <?php endif;
                            
                            if ($email): ?>
                                <div class="contact-item">
                                    <i class="fas fa-envelope" aria-hidden="true"></i>
                                    <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                                </div>
                            <?php endif;
                            
                            if ($address): ?>
                                <div class="contact-item">
                                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                                    <span><?php echo esc_html($address); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="footer-section footer-links">
                        <h4 class="footer-title">Quick Links</h4>
                        <?php
                        if (has_nav_menu('footer')) {
                            wp_nav_menu(array(
                                'theme_location' => 'footer',
                                'menu_class'     => 'footer-menu',
                                'container'      => false,
                                'depth'          => 1,
                            ));
                        } else {
                            echo '<ul class="footer-menu">';
                            echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
                            echo '<li><a href="' . esc_url(home_url('/about')) . '">About</a></li>';
                            echo '<li><a href="' . esc_url(get_post_type_archive_link('service')) . '">Services</a></li>';
                            echo '<li><a href="' . esc_url(home_url('/pricing')) . '">Pricing</a></li>';
                            echo '<li><a href="' . esc_url(home_url('/contact')) . '">Contact</a></li>';
                            echo '<li><a href="' . esc_url(home_url('/privacy-policy')) . '">Privacy Policy</a></li>';
                            echo '</ul>';
                        }
                        ?>
                    </div>

                    <!-- Services -->
                    <div class="footer-section footer-services">
                        <h4 class="footer-title">Our Services</h4>
                        <?php
                        $service_categories = get_terms(array(
                            'taxonomy' => 'service_category',
                            'hide_empty' => false,
                            'number' => 6,
                        ));
                        
                        if (!empty($service_categories) && !is_wp_error($service_categories)) {
                            echo '<ul class="footer-services-list">';
                            foreach ($service_categories as $category) {
                                echo '<li><a href="' . esc_url(get_term_link($category)) . '">' . esc_html($category->name) . '</a></li>';
                            }
                            echo '</ul>';
                        }
                        ?>
                    </div>

                    <!-- Newsletter & Social -->
                    <div class="footer-section footer-newsletter">
                        <h4 class="footer-title">Stay Connected</h4>
                        <p>Subscribe to our newsletter for updates and special offers.</p>
                        
                        <form class="newsletter-form" action="#" method="post">
                            <div class="newsletter-input">
                                <input type="email" placeholder="Your email address" required aria-label="Email for newsletter">
                                <button type="submit" aria-label="Subscribe to newsletter">
                                    <i class="fas fa-paper-plane" aria-hidden="true"></i>
                                </button>
                            </div>
                        </form>

                        <div class="footer-social">
                            <h5 class="social-title">Follow Us</h5>
                            <div class="social-links">
                                <?php 
                                $social_networks = array(
                                    'facebook' => 'fab fa-facebook-f',
                                    'twitter' => 'fab fa-twitter',
                                    'linkedin' => 'fab fa-linkedin-in',
                                    'instagram' => 'fab fa-instagram',
                                    'youtube' => 'fab fa-youtube'
                                );
                                
                                foreach ($social_networks as $network => $icon_class) {
                                    $url = get_theme_mod("social_{$network}", '');
                                    if ($url): ?>
                                        <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener" class="social-link" aria-label="Follow us on <?php echo esc_attr(ucfirst($network)); ?>">
                                            <i class="<?php echo esc_attr($icon_class); ?>" aria-hidden="true"></i>
                                        </a>
                                    <?php endif;
                                } ?>
                            </div>
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
                        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
                    </div>
                    
                    <div class="footer-legal">
                        <ul class="legal-links">
                            <li><a href="<?php echo esc_url(home_url('/privacy-policy')); ?>">Privacy Policy</a></li>
                            <li><a href="<?php echo esc_url(home_url('/terms-of-service')); ?>">Terms of Service</a></li>
                            <li><a href="<?php echo esc_url(home_url('/sitemap')); ?>">Sitemap</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button class="back-to-top" aria-label="Back to top" style="display: none;">
        <i class="fas fa-chevron-up" aria-hidden="true"></i>
    </button>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
