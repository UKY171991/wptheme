<?php
/**
 * The template for displaying the footer
 *
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */?>
    </div><!-- #page -->
    <!-- Modern Professional Footer -->
    <footer id="colophon" class="site-footer bg-dark text-white" role="contentinfo" style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);">
        <!-- Main Footer Content -->
        <div class="footer-main py-5">
            <div class="container">
                <div class="row">
                    <!-- Company Info -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="footer-widget">
                            <?php if (has_custom_logo()) :?>
                                <div class="footer-logo mb-4">
                                    <?php the_custom_logo();?>
                                </div>
                            <?php else :?>
                                <h3 class="footer-brand h4 mb-4" style="color: #ffffff; font-weight: 700;">
                                    <a href="<?php echo esc_url(home_url('/'));?>" class="text-white text-decoration-none" style="color: #ffffff !important;">
                                        <?php bloginfo('name');?>
                                    </a>
                                </h3>
                            <?php endif;?>
                            <p class="footer-description mb-4" style="color: #bdc3c7; line-height: 1.6; font-size: 14px;">
                                <?php echo get_theme_mod('footer_description', 'Professional services designed to help your business grow and succeed in today\'s competitive marketplace.');?>
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
                                    if (!empty($url) && $url !== '#') :?>
                                    <a href="<?php echo esc_url($url);?>" class="btn btn-outline-light btn-sm me-3 mb-2" target="_blank" rel="noopener noreferrer"
                                       style="border-color: #3498db; color: #3498db; padding: 8px 12px; border-radius: 25px; transition: all 0.3s ease;">
                                        <i class="fab fa-<?php echo esc_attr($platform);?>"></i>
                                    </a>
                                <?php
                                    endif;
                                endforeach;?>
                            </div>
                        </div>
                    </div>
                    <!-- Quick Links -->
                    <div class="col-lg-2 col-md-6 mb-4">
                        <div class="footer-widget">
                            <h4 class="footer-widget-title h5 mb-4" style="color: #ffffff; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; font-size: 16px;">Quick Links</h4>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer-menu',
                                'container' => false,
                                'menu_class' => 'footer-menu list-unstyled',
                                'fallback_cb' => 'blueprint_folder_footer_fallback_menu',
                                'depth' => 1,
                            ));?>
                        </div>
                    </div>
                    <!-- Services -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="footer-widget">
                            <h4 class="footer-widget-title h5 mb-4" style="color: #ffffff; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; font-size: 16px;">Our Services</h4>
                            <?php
                            // Display recent services
                            $services = get_posts(array(
                                'post_type' => 'service',
                                'posts_per_page' => 5,
                                'post_status' => 'publish'
                            ));

                            if ($services) :?>
                                <ul class="footer-services list-unstyled">
                                    <?php foreach ($services as $service) :?>
                                        <li class="mb-3">
                                            <a href="<?php echo esc_url(get_permalink($service->ID));?>" class="text-decoration-none"
                                               style="color: #bdc3c7; transition: color 0.3s ease; display: flex; align-items: center;">
                                                <i class="fas fa-chevron-right me-3" style="color: #3498db; font-size: 12px;"></i>
                                                <span style="font-size: 14px;"><?php echo esc_html($service->post_title);?></span>
                                            </a>
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                            <?php endif;?>
                        </div>
                    </div>
                    <!-- Contact Info -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="footer-widget">
                            <h4 class="footer-widget-title h5 mb-4" style="color: #ffffff; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; font-size: 16px;">Get In Touch</h4>
                            <div class="footer-contact">
                                <?php if ($address = get_theme_mod('contact_address')) :?>
                                    <div class="contact-item mb-3" style="display: flex; align-items: flex-start;">
                                        <i class="fas fa-map-marker-alt me-3 mt-1" style="color: #3498db; font-size: 14px;"></i>
                                        <span style="color: #bdc3c7; font-size: 14px; line-height: 1.5;"><?php echo esc_html($address);?></span>
                                    </div>
                                <?php endif;?>
                                <?php if ($phone = get_theme_mod('contact_phone')) :?>
                                    <div class="contact-item mb-3" style="display: flex; align-items: center;">
                                        <i class="fas fa-phone me-3" style="color: #3498db; font-size: 14px;"></i>
                                        <a href="tel:<?php echo esc_attr(str_replace(array(' ', '-', '(', ')'), '', $phone));?>"
                                           class="text-decoration-none" style="color: #bdc3c7; font-size: 14px; transition: color 0.3s ease;">
                                            <?php echo esc_html($phone);?>
                                        </a>
                                    </div>
                                <?php endif;?>
                                <?php if ($email = get_theme_mod('contact_email')) :?>
                                    <div class="contact-item mb-3" style="display: flex; align-items: center;">
                                        <i class="fas fa-envelope me-3" style="color: #3498db; font-size: 14px;"></i>
                                        <a href="mailto:<?php echo esc_attr($email);?>"
                                           class="text-decoration-none" style="color: #bdc3c7; font-size: 14px; transition: color 0.3s ease;">
                                            <?php echo esc_html($email);?>
                                        </a>
                                    </div>
                                <?php endif;?>
                                <?php if ($hours = get_theme_mod('business_hours')) :?>
                                    <div class="contact-item mb-3" style="display: flex; align-items: flex-start;">
                                        <i class="fas fa-clock me-3 mt-1" style="color: #3498db; font-size: 14px;"></i>
                                        <span style="color: #bdc3c7; font-size: 14px; line-height: 1.5;"><?php echo esc_html($hours);?></span>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom py-4" style="background: rgba(0,0,0,0.2); border-top: 1px solid rgba(255,255,255,0.1);">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="footer-copyright">
                            <p class="mb-0" style="color: #95a5a6; font-size: 14px;">
                                &copy; <?php echo date('Y');?>
                                <a href="<?php echo esc_url(home_url('/'));?>" class="text-decoration-none" style="color: #3498db; font-weight: 500;">
                                    <?php bloginfo('name');?>
                                </a>.
                                <?php esc_html_e('All rights reserved.', 'blueprint-folder');?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-links text-md-end">
                            <a href="<?php echo esc_url(home_url('/privacy-policy'));?>" class="text-decoration-none me-4"
                               style="color: #95a5a6; font-size: 14px; transition: color 0.3s ease;">
                                <?php esc_html_e('Privacy Policy', 'blueprint-folder');?>
                            </a>
                            <a href="<?php echo esc_url(home_url('/terms-of-service'));?>" class="text-decoration-none"
                               style="color: #95a5a6; font-size: 14px; transition: color 0.3s ease;">
                                <?php esc_html_e('Terms of Service', 'blueprint-folder');?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Back to Top Button -->
    <button id="back-to-top" class="btn position-fixed d-none"
            style="bottom: 30px; right: 30px; z-index: 1000; background: linear-gradient(135deg, #3498db, #2980b9); border: none; border-radius: 50%; width: 50px; height: 50px; box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3); transition: all 0.3s ease;">
        <i class="fas fa-chevron-up" style="color: white; font-size: 16px;"></i>
    </button>
    <?php wp_footer();?>
    <!-- Enhanced Back to Top Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var backToTopBtn = document.getElementById('back-to-top');
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.remove('d-none');
                backToTopBtn.style.opacity = '1';
                backToTopBtn.style.transform = 'scale(1)';
} else {
                backToTopBtn.style.opacity = '0';
                backToTopBtn.style.transform = 'scale(0.8)';
                setTimeout(function() {
                    if (window.pageYOffset <= 300) {
                        backToTopBtn.classList.add('d-none');
}
}, 300);
}
});
        backToTopBtn.addEventListener('click', function() {
            window.scrollTo( {
                top: 0,
                behavior: 'smooth'
});
});
        // Hover effects
        backToTopBtn.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1)';
            this.style.boxShadow = '0 6px 20px rgba(52, 152, 219, 0.4)';
});
        backToTopBtn.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.boxShadow = '0 4px 15px rgba(52, 152, 219, 0.3)';
});
        // Add hover effects to footer links
        var footerLinks = document.querySelectorAll('.footer-services a, .footer-contact a, .footer-links a');
        footerLinks.forEach(function(link) {
            link.addEventListener('mouseenter', function() {
                this.style.color = '#3498db';
});
            link.addEventListener('mouseleave', function() {
                this.style.color = '#bdc3c7';
});
});
        // Add hover effects to social links
        var socialLinks = document.querySelectorAll('.footer-social a');
        socialLinks.forEach(function(link) {
            link.addEventListener('mouseenter', function() {
                this.style.backgroundColor = '#3498db';
                this.style.borderColor = '#3498db';
                this.style.color = 'white';
                this.style.transform = 'translateY(-2px)';
});
            link.addEventListener('mouseleave', function() {
                this.style.backgroundColor = 'transparent';
                this.style.borderColor = '#3498db';
                this.style.color = '#3498db';
                this.style.transform = 'translateY(0)';
});
});
});
    </script>
</body>
</html>
