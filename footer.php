    </div><!-- #content -->
</main><!-- #main -->

<footer class="site-footer" role="contentinfo">
    <!-- Newsletter Section -->
    <section class="footer-newsletter" aria-label="<?php esc_attr_e('Newsletter Signup', 'blueprint'); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter-content">
                        <div class="newsletter-text">
                            <h2><?php esc_html_e('Get Business Blueprint Updates', 'blueprint'); ?></h2>
                            <p><?php esc_html_e('Subscribe to receive new blueprint alerts, entrepreneurship tips, and exclusive offers', 'blueprint'); ?></p>
                        </div>
                        <div class="newsletter-form">
                            <form action="#" method="post" class="newsletter-subscribe-form">
                                <div class="form-group">
                                    <label for="newsletter-email" class="visually-hidden"><?php esc_html_e('Email Address', 'blueprint'); ?></label>
                                    <input type="email" id="newsletter-email" name="email" class="form-control" placeholder="<?php esc_attr_e('Your email address', 'blueprint'); ?>" required aria-describedby="newsletter-privacy">
                                    <button type="submit" class="btn btn-primary"><?php esc_html_e('Subscribe', 'blueprint'); ?></button>
                                </div>
                                <div class="form-privacy">
                                    <small id="newsletter-privacy"><?php esc_html_e('We respect your privacy. Unsubscribe at any time.', 'blueprint'); ?></small>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Footer Content -->
    <section class="footer-main">
        <div class="container">
            <div class="footer-content row">
                <!-- Branding Section -->
                <div class="footer-branding col-lg-4 col-md-6 mb-4">
                    <div class="footer-logo">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
                            ?>
                            <h3 class="footer-site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </h3>
                            <?php
                        }
                        ?>
                    </div>
                    <p><?php esc_html_e('Empowering entrepreneurs with proven business blueprints and comprehensive startup guides for sustainable success.', 'blueprint'); ?></p>
                    <div class="footer-social">
                        <a href="#" class="social-link" aria-label="<?php esc_attr_e('Follow us on Facebook', 'blueprint'); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                        </a>
                        <a href="#" class="social-link" aria-label="<?php esc_attr_e('Follow us on Instagram', 'blueprint'); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                        </a>
                        <a href="#" class="social-link" aria-label="<?php esc_attr_e('Follow us on Twitter', 'blueprint'); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                        </a>
                        <a href="#" class="social-link" aria-label="<?php esc_attr_e('Follow us on LinkedIn', 'blueprint'); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links Section -->
                <div class="footer-links-section col-lg-2 col-md-6 mb-4">
                    <h3><?php esc_html_e('Quick Links', 'blueprint'); ?></h3>
                    <?php
                    if (has_nav_menu('footer')) {
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'menu_class'     => 'footer-links',
                            'container'      => false,
                            'depth'          => 1,
                        ));
                    } else {
                        echo '<ul class="footer-links">';
                        echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'blueprint') . '</a></li>';
                        
                        $footer_pages = array('services', 'pricing', 'about', 'contact');
                        foreach ($footer_pages as $page_slug) {
                            $page = get_page_by_path($page_slug);
                            if ($page) {
                                echo '<li><a href="' . esc_url(get_permalink($page)) . '">' . esc_html(get_the_title($page)) . '</a></li>';
                            }
                        }
                        echo '</ul>';
                    }
                    ?>
                </div>
                
                <!-- Business Categories Section -->
                <div class="footer-links-section col-lg-3 col-md-6 mb-4">
                    <h3><?php esc_html_e('Business Categories', 'blueprint'); ?></h3>
                    <?php
                    if (has_nav_menu('footer-secondary')) {
                        wp_nav_menu(array(
                            'theme_location' => 'footer-secondary',
                            'menu_class'     => 'footer-links',
                            'container'      => false,
                            'depth'          => 1,
                        ));
                    } else {
                        ?>
                        <ul class="footer-links">
                            <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('online-digital-blueprints'))); ?>"><?php esc_html_e('Online & Digital', 'blueprint'); ?></a></li>
                            <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('service-based-blueprints'))); ?>"><?php esc_html_e('Service-Based', 'blueprint'); ?></a></li>
                            <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('ecommerce-retail-blueprints'))); ?>"><?php esc_html_e('E-commerce & Retail', 'blueprint'); ?></a></li>
                            <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('food-beverage-blueprints'))); ?>"><?php esc_html_e('Food & Beverage', 'blueprint'); ?></a></li>
                            <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('health-wellness-blueprints'))); ?>"><?php esc_html_e('Health & Wellness', 'blueprint'); ?></a></li>
                            <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('creative-entertainment-blueprints'))); ?>"><?php esc_html_e('Creative & Entertainment', 'blueprint'); ?></a></li>
                        </ul>
                        <?php
                    }
                    ?>
                </div>
                
                <!-- Contact Info Section -->
                <div class="footer-links-section col-lg-3 col-md-6 mb-4">
                    <h3><?php esc_html_e('Contact Info', 'blueprint'); ?></h3>
                    <div class="contact-info">
                        <div class="contact-item">
                            <span class="contact-icon" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                            </span>
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_mod('contact_phone', '+1 (555) 123-4567'))); ?>">
                                <?php echo esc_html(get_theme_mod('contact_phone', '+1 (555) 123-4567')); ?>
                            </a>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            </span>
                            <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'info@blueprintfolder.com')); ?>">
                                <?php echo esc_html(get_theme_mod('contact_email', 'info@blueprintfolder.com')); ?>
                            </a>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            </span>
                            <address><?php echo esc_html(get_theme_mod('contact_address', '123 Business Street, Enterprise City')); ?></address>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            </span>
                            <span><?php esc_html_e('Mon-Fri: 9AM - 6PM EST', 'blueprint'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer Bottom -->
    <section class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <p>&copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'blueprint'); ?></p>
                <nav class="footer-bottom-links" aria-label="<?php esc_attr_e('Footer Legal Links', 'blueprint'); ?>">
                    <a href="#"><?php esc_html_e('Privacy Policy', 'blueprint'); ?></a>
                    <a href="#"><?php esc_html_e('Terms of Service', 'blueprint'); ?></a>
                    <a href="#"><?php esc_html_e('Sitemap', 'blueprint'); ?></a>
                </nav>
            </div>
        </div>
    </section>
</footer>

<!-- Back to top button -->
<button id="back-to-top" class="back-to-top" aria-label="<?php esc_attr_e('Back to top', 'blueprint'); ?>" style="display: none;">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <polyline points="18 15 12 9 6 15"></polyline>
    </svg>
</button>

<?php wp_footer(); ?>
</body>
</html>
