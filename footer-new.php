        </main><!-- #main -->
    </div><!-- #content -->

    <!-- Footer -->
    <footer id="footer" class="site-footer" role="contentinfo">
        <div class="footer-main">
            <div class="container">
                <div class="footer-content">
                    <!-- Company Info -->
                    <div class="footer-section footer-about">
                        <div class="footer-logo">
                            <?php
                            if (has_custom_logo()) {
                                the_custom_logo();
                            } else {
                                ?>
                                <h3 class="footer-site-title"><?php bloginfo('name'); ?></h3>
                                <?php
                            }
                            ?>
                        </div>
                        
                        <div class="footer-description">
                            <?php
                            $description = get_bloginfo('description');
                            if ($description) {
                                echo '<p>' . esc_html($description) . '</p>';
                            } else {
                                echo '<p>' . esc_html__('Professional business services to help your company grow and succeed.', 'professional-services') . '</p>';
                            }
                            ?>
                        </div>
                        
                        <div class="footer-contact">
                            <?php 
                            $phone = get_theme_mod('company_phone', '(555) 123-4567');
                            $email = get_theme_mod('company_email', 'info@company.com');
                            $address = get_theme_mod('company_address', '123 Business St, City, State 12345');
                            ?>
                            
                            <?php if ($address): ?>
                                <div class="contact-item">
                                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                                    <span><?php echo esc_html($address); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($phone): ?>
                                <div class="contact-item">
                                    <i class="fas fa-phone" aria-hidden="true"></i>
                                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>">
                                        <?php echo esc_html($phone); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($email): ?>
                                <div class="contact-item">
                                    <i class="fas fa-envelope" aria-hidden="true"></i>
                                    <a href="mailto:<?php echo esc_attr($email); ?>">
                                        <?php echo esc_html($email); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="footer-section footer-links">
                        <h4 class="footer-title"><?php esc_html_e('Quick Links', 'professional-services'); ?></h4>
                        
                        <?php
                        if (has_nav_menu('footer')) {
                            wp_nav_menu(array(
                                'theme_location' => 'footer',
                                'menu_class'     => 'footer-menu',
                                'container'      => false,
                                'depth'          => 1,
                            ));
                        } else {
                            ?>
                            <ul class="footer-menu">
                                <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'professional-services'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/about')); ?>"><?php esc_html_e('About', 'professional-services'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/services')); ?>"><?php esc_html_e('Services', 'professional-services'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/pricing')); ?>"><?php esc_html_e('Pricing', 'professional-services'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/projects')); ?>"><?php esc_html_e('Projects', 'professional-services'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Contact', 'professional-services'); ?></a></li>
                            </ul>
                            <?php
                        }
                        ?>
                    </div>

                    <!-- Our Services -->
                    <div class="footer-section footer-services">
                        <h4 class="footer-title"><?php esc_html_e('Our Services', 'professional-services'); ?></h4>
                        
                        <?php
                        $services = get_services_by_category('', 6);
                        if ($services->have_posts()) {
                            ?>
                            <ul class="footer-services-list">
                                <?php
                                while ($services->have_posts()) {
                                    $services->the_post();
                                    ?>
                                    <li>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </li>
                                    <?php
                                }
                                wp_reset_postdata();
                                ?>
                            </ul>
                            <?php
                        } else {
                            ?>
                            <ul class="footer-services-list">
                                <li><a href="#"><?php esc_html_e('Web Design', 'professional-services'); ?></a></li>
                                <li><a href="#"><?php esc_html_e('Digital Marketing', 'professional-services'); ?></a></li>
                                <li><a href="#"><?php esc_html_e('SEO Services', 'professional-services'); ?></a></li>
                                <li><a href="#"><?php esc_html_e('Content Creation', 'professional-services'); ?></a></li>
                                <li><a href="#"><?php esc_html_e('Social Media', 'professional-services'); ?></a></li>
                                <li><a href="#"><?php esc_html_e('Consulting', 'professional-services'); ?></a></li>
                            </ul>
                            <?php
                        }
                        ?>
                    </div>

                    <!-- Newsletter -->
                    <div class="footer-section footer-newsletter">
                        <h4 class="footer-title"><?php esc_html_e('Stay Updated', 'professional-services'); ?></h4>
                        <p class="newsletter-text">
                            <?php esc_html_e('Subscribe to our newsletter for the latest updates and insights.', 'professional-services'); ?>
                        </p>
                        
                        <form class="newsletter-form" action="#" method="post">
                            <div class="newsletter-input">
                                <input type="email" name="newsletter_email" placeholder="<?php esc_attr_e('Enter your email', 'professional-services'); ?>" required>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane" aria-hidden="true"></i>
                                    <span class="sr-only"><?php esc_html_e('Subscribe', 'professional-services'); ?></span>
                                </button>
                            </div>
                        </form>
                        
                        <!-- Social Links -->
                        <div class="footer-social">
                            <h5 class="social-title"><?php esc_html_e('Follow Us', 'professional-services'); ?></h5>
                            <div class="social-links">
                                <?php 
                                $facebook = get_theme_mod('social_facebook', '');
                                $twitter = get_theme_mod('social_twitter', '');
                                $linkedin = get_theme_mod('social_linkedin', '');
                                $instagram = get_theme_mod('social_instagram', '');
                                $youtube = get_theme_mod('social_youtube', '');
                                
                                if ($facebook): ?>
                                    <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener" class="social-link facebook" aria-label="Facebook">
                                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                    </a>
                                <?php endif;
                                if ($twitter): ?>
                                    <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener" class="social-link twitter" aria-label="Twitter">
                                        <i class="fab fa-twitter" aria-hidden="true"></i>
                                    </a>
                                <?php endif;
                                if ($linkedin): ?>
                                    <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener" class="social-link linkedin" aria-label="LinkedIn">
                                        <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                                    </a>
                                <?php endif;
                                if ($instagram): ?>
                                    <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener" class="social-link instagram" aria-label="Instagram">
                                        <i class="fab fa-instagram" aria-hidden="true"></i>
                                    </a>
                                <?php endif;
                                if ($youtube): ?>
                                    <a href="<?php echo esc_url($youtube); ?>" target="_blank" rel="noopener" class="social-link youtube" aria-label="YouTube">
                                        <i class="fab fa-youtube" aria-hidden="true"></i>
                                    </a>
                                <?php endif; ?>
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
                        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'professional-services'); ?></p>
                    </div>
                    
                    <div class="footer-legal">
                        <ul class="legal-links">
                            <li><a href="<?php echo esc_url(home_url('/privacy-policy')); ?>"><?php esc_html_e('Privacy Policy', 'professional-services'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/terms-of-service')); ?>"><?php esc_html_e('Terms of Service', 'professional-services'); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="back-to-top" aria-label="<?php esc_attr_e('Back to top', 'professional-services'); ?>">
        <i class="fas fa-chevron-up" aria-hidden="true"></i>
    </button>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
