<?php
/**
 * The template for displaying the footer
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */
?>

    </div><!-- #page -->

    <!-- Modern Professional Footer -->
    <footer id="colophon" class="site-footer bg-dark text-white" role="contentinfo">
        <!-- Main Footer Content -->
        <div class="footer-main py-5">
            <div class="container">
                <div class="row">
                    <!-- Company Info -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="footer-widget">
                            <?php if (has_custom_logo()) : ?>
                                <div class="footer-logo mb-3">
                                    <?php the_custom_logo(); ?>
                                </div>
                            <?php else : ?>
                                <h3 class="footer-brand h4 mb-3">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" class="text-white text-decoration-none">
                                        <?php bloginfo('name'); ?>
                                    </a>
                                </h3>
                            <?php endif; ?>
                            
                            <p class="footer-description mb-3">
                                <?php echo get_theme_mod('footer_description', 'Professional services designed to help your business grow and succeed in today\'s competitive marketplace.'); ?>
                            </p>
                            
                            <!-- Social Media Links -->
                            <div class="footer-social">
                                <?php
                                $social_links = array(
                                    'facebook' => get_theme_mod('social_facebook', '#'),
                                    'twitter' => get_theme_mod('social_twitter', '#'),
                                    'linkedin' => get_theme_mod('social_linkedin', '#'),
                                    'instagram' => get_theme_mod('social_instagram', '#'),
                                );
                                
                                foreach ($social_links as $platform => $url) :
                                    if (!empty($url) && $url !== '#') :
                                ?>
                                    <a href="<?php echo esc_url($url); ?>" class="btn btn-outline-light btn-sm me-2 mb-2" target="_blank" rel="noopener noreferrer">
                                        <i class="fab fa-<?php echo esc_attr($platform); ?>"></i>
                                    </a>
                                <?php 
                                    endif;
                                endforeach; 
                                ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Quick Links -->
                    <div class="col-lg-2 col-md-6 mb-4">
                        <div class="footer-widget">
                            <h4 class="footer-widget-title h5 mb-3">Quick Links</h4>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer-menu',
                                'container' => false,
                                'menu_class' => 'footer-menu list-unstyled',
                                'fallback_cb' => 'blueprint_folder_footer_fallback_menu',
                                'depth' => 1,
                            ));
                            ?>
                        </div>
                    </div>
                    
                    <!-- Services -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="footer-widget">
                            <h4 class="footer-widget-title h5 mb-3">Our Services</h4>
                            <?php
                            // Display recent services
                            $services = get_posts(array(
                                'post_type' => 'service',
                                'posts_per_page' => 5,
                                'post_status' => 'publish'
                            ));
                            
                            if ($services) :
                            ?>
                                <ul class="footer-services list-unstyled">
                                    <?php foreach ($services as $service) : ?>
                                        <li class="mb-2">
                                            <a href="<?php echo esc_url(get_permalink($service->ID)); ?>" class="text-light text-decoration-none">
                                                <i class="fas fa-arrow-right me-2 text-primary"></i>
                                                <?php echo esc_html($service->post_title); ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Contact Info -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="footer-widget">
                            <h4 class="footer-widget-title h5 mb-3">Get In Touch</h4>
                            <div class="footer-contact">
                                <?php if ($address = get_theme_mod('contact_address')) : ?>
                                    <div class="contact-item mb-3">
                                        <i class="fas fa-map-marker-alt me-2 text-primary"></i>
                                        <span><?php echo esc_html($address); ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($phone = get_theme_mod('contact_phone')) : ?>
                                    <div class="contact-item mb-3">
                                        <i class="fas fa-phone me-2 text-primary"></i>
                                        <a href="tel:<?php echo esc_attr(str_replace(array(' ', '-', '(', ')'), '', $phone)); ?>" class="text-light text-decoration-none">
                                            <?php echo esc_html($phone); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($email = get_theme_mod('contact_email')) : ?>
                                    <div class="contact-item mb-3">
                                        <i class="fas fa-envelope me-2 text-primary"></i>
                                        <a href="mailto:<?php echo esc_attr($email); ?>" class="text-light text-decoration-none">
                                            <?php echo esc_html($email); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($hours = get_theme_mod('business_hours')) : ?>
                                    <div class="contact-item mb-3">
                                        <i class="fas fa-clock me-2 text-primary"></i>
                                        <span><?php echo esc_html($hours); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer Bottom -->
        <div class="footer-bottom py-3 border-top border-secondary">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="footer-copyright">
                            <p class="mb-0 text-muted">
                                &copy; <?php echo date('Y'); ?> 
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-primary text-decoration-none">
                                    <?php bloginfo('name'); ?>
                                </a>. 
                                <?php esc_html_e('All rights reserved.', 'blueprint-folder'); ?>
                            </p>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="footer-links text-md-end">
                            <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>" class="text-muted text-decoration-none me-3">
                                <?php esc_html_e('Privacy Policy', 'blueprint-folder'); ?>
                            </a>
                            <a href="<?php echo esc_url(home_url('/terms-of-service')); ?>" class="text-muted text-decoration-none">
                                <?php esc_html_e('Terms of Service', 'blueprint-folder'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="btn btn-primary position-fixed d-none" style="bottom: 20px; right: 20px; z-index: 1000;">
        <i class="fas fa-chevron-up"></i>
    </button>

    <?php wp_footer(); ?>

    <!-- Back to Top Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var backToTopBtn = document.getElementById('back-to-top');
        
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.remove('d-none');
            } else {
                backToTopBtn.classList.add('d-none');
            }
        });
        
        backToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
    </script>

</body>
</html>
