<?php
/**
 * The template for displaying the footer
 *
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */?>
    </div><!-- #page -->
    
    <!-- Enhanced Professional Footer -->
    <footer id="colophon" class="site-footer" role="contentinfo">
        <!-- Newsletter Section -->
        <div class="footer-newsletter py-5" style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%); color: white;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <h3 class="h4 mb-2" style="color: white; font-weight: 600;">Stay Updated</h3>
                        <p class="mb-0" style="color: #bdc3c7;">Subscribe to our newsletter for the latest updates, tips, and exclusive offers.</p>
                    </div>
                    <div class="col-lg-6">
                        <form class="newsletter-form d-flex gap-2">
                            <input type="email" class="form-control flex-grow-1" placeholder="Enter your email address" required 
                                   style="border: none; border-radius: 25px; padding: 12px 20px; background: rgba(255,255,255,0.1); color: white; backdrop-filter: blur(10px);">
                            <button type="submit" class="btn btn-primary px-4" style="border-radius: 25px; background: #3498db; border: none; font-weight: 600;">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Footer Content -->
        <div class="footer-main py-5" style="background: linear-gradient(135deg, #34495e 0%, #2c3e50 100%); color: white;">
            <div class="container">
                <div class="row g-4">
                    <!-- Company Info -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="footer-widget">
                            <?php if (has_custom_logo()) :?>
                                <div class="footer-logo mb-4">
                                    <?php the_custom_logo();?>
                                </div>
                            <?php else :?>
                                <h3 class="footer-brand h3 mb-4" style="color: #ffffff; font-weight: 700;">
                                    <a href="<?php echo esc_url(home_url('/'));?>" class="text-white text-decoration-none">
                                        <?php bloginfo('name');?>
                                    </a>
                                </h3>
                            <?php endif;?>
                            <p class="footer-description mb-4" style="color: #bdc3c7; line-height: 1.7; font-size: 15px;">
                                <?php echo get_theme_mod('footer_description', 'Professional services designed to help your business grow and succeed in today\'s competitive marketplace.');?>
                            </p>
                            
                            <!-- Company Stats -->
                            <div class="company-stats mb-4">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <div class="stat-item text-center p-3" style="background: rgba(255,255,255,0.1); border-radius: 12px; backdrop-filter: blur(10px);">
                                            <div class="stat-number h4 mb-1" style="color: #3498db; font-weight: 700;">250+</div>
                                            <div class="stat-label" style="color: #bdc3c7; font-size: 12px;">Projects</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="stat-item text-center p-3" style="background: rgba(255,255,255,0.1); border-radius: 12px; backdrop-filter: blur(10px);">
                                            <div class="stat-number h4 mb-1" style="color: #3498db; font-weight: 700;">5+</div>
                                            <div class="stat-label" style="color: #bdc3c7; font-size: 12px;">Years</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Social Media Links -->
                            <div class="footer-social">
                                <h5 class="h6 mb-3" style="color: white; font-weight: 600;">Follow Us</h5>
                                <div class="social-links d-flex gap-2">
                                    <?php
                                    $social_links = array(
                                        'facebook' => array('url' => get_theme_mod('social_facebook', '#'), 'color' => '#1877f2'),
                                        'twitter' => array('url' => get_theme_mod('social_twitter', '#'), 'color' => '#1da1f2'),
                                        'linkedin' => array('url' => get_theme_mod('social_linkedin', '#'), 'color' => '#0a66c2'),
                                        'instagram' => array('url' => get_theme_mod('social_instagram', '#'), 'color' => '#e4405f'),
                                        'youtube' => array('url' => get_theme_mod('social_youtube', '#'), 'color' => '#ff0000'),
                                    );

                                    foreach ($social_links as $platform => $data) :
                                        if (!empty($data['url']) && $data['url'] !== '#') :?>
                                        <a href="<?php echo esc_url($data['url']);?>" 
                                           class="social-link d-flex align-items-center justify-content-center" 
                                           target="_blank" rel="noopener noreferrer"
                                           style="width: 45px; height: 45px; background: rgba(255,255,255,0.1); color: white; border-radius: 12px; text-decoration: none; transition: all 0.3s ease; backdrop-filter: blur(10px);"
                                           data-color="<?php echo esc_attr($data['color']);?>">
                                            <i class="fab fa-<?php echo esc_attr($platform);?>" style="font-size: 18px;"></i>
                                        </a>
                                    <?php
                                        endif;
                                    endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Quick Links -->
                    <div class="col-lg-2 col-md-6 mb-4">
                        <div class="footer-widget">
                            <h4 class="footer-widget-title h5 mb-4" style="color: #ffffff; font-weight: 600; position: relative;">
                                Quick Links
                                <div class="title-underline" style="width: 30px; height: 3px; background: #3498db; margin-top: 8px; border-radius: 2px;"></div>
                            </h4>
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
                            <h4 class="footer-widget-title h5 mb-4" style="color: #ffffff; font-weight: 600; position: relative;">
                                Our Services
                                <div class="title-underline" style="width: 30px; height: 3px; background: #3498db; margin-top: 8px; border-radius: 2px;"></div>
                            </h4>
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
                                            <a href="<?php echo esc_url(get_permalink($service->ID));?>" 
                                               class="footer-service-link text-decoration-none d-flex align-items-center"
                                               style="color: #bdc3c7; transition: all 0.3s ease; padding: 8px 0; border-radius: 6px;">
                                                <div class="service-icon me-3 d-flex align-items-center justify-content-center" 
                                                     style="width: 32px; height: 32px; background: rgba(255,255,255,0.1); border-radius: 8px; flex-shrink: 0;">
                                                    <i class="fas fa-cog" style="color: #3498db; font-size: 14px;"></i>
                                                </div>
                                                <span style="font-size: 14px; line-height: 1.4;"><?php echo esc_html($service->post_title);?></span>
                                            </a>
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                            <?php else: ?>
                                <ul class="footer-services list-unstyled">
                                    <li class="mb-3">
                                        <a href="#" class="footer-service-link text-decoration-none d-flex align-items-center" style="color: #bdc3c7; transition: all 0.3s ease; padding: 8px 0;">
                                            <div class="service-icon me-3 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; background: rgba(255,255,255,0.1); border-radius: 8px;">
                                                <i class="fas fa-laptop-code" style="color: #3498db; font-size: 14px;"></i>
                                            </div>
                                            <span style="font-size: 14px;">Web Development</span>
                                        </a>
                                    </li>
                                    <li class="mb-3">
                                        <a href="#" class="footer-service-link text-decoration-none d-flex align-items-center" style="color: #bdc3c7; transition: all 0.3s ease; padding: 8px 0;">
                                            <div class="service-icon me-3 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; background: rgba(255,255,255,0.1); border-radius: 8px;">
                                                <i class="fas fa-chart-line" style="color: #3498db; font-size: 14px;"></i>
                                            </div>
                                            <span style="font-size: 14px;">Digital Marketing</span>
                                        </a>
                                    </li>
                                    <li class="mb-3">
                                        <a href="#" class="footer-service-link text-decoration-none d-flex align-items-center" style="color: #bdc3c7; transition: all 0.3s ease; padding: 8px 0;">
                                            <div class="service-icon me-3 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; background: rgba(255,255,255,0.1); border-radius: 8px;">
                                                <i class="fas fa-handshake" style="color: #3498db; font-size: 14px;"></i>
                                            </div>
                                            <span style="font-size: 14px;">Consulting</span>
                                        </a>
                                    </li>
                                </ul>
                            <?php endif;?>
                        </div>
                    </div>
                    <!-- Contact Info & Newsletter -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="footer-widget">
                            <h4 class="footer-widget-title h5 mb-4" style="color: #ffffff; font-weight: 600; position: relative;">
                                Get In Touch
                                <div class="title-underline" style="width: 30px; height: 3px; background: #3498db; margin-top: 8px; border-radius: 2px;"></div>
                            </h4>
                            <div class="footer-contact">
                                <div class="contact-item mb-3 d-flex align-items-center">
                                    <div class="contact-icon me-3 d-flex align-items-center justify-content-center" 
                                         style="width: 40px; height: 40px; background: rgba(255,255,255,0.1); border-radius: 10px; flex-shrink: 0;">
                                        <i class="fas fa-map-marker-alt" style="color: #3498db; font-size: 16px;"></i>
                                    </div>
                                    <div>
                                        <div style="color: #bdc3c7; font-size: 14px; line-height: 1.5;">
                                            <?php echo get_theme_mod('contact_address', '123 Business Street<br>City, State 12345'); ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="contact-item mb-3 d-flex align-items-center">
                                    <div class="contact-icon me-3 d-flex align-items-center justify-content-center" 
                                         style="width: 40px; height: 40px; background: rgba(255,255,255,0.1); border-radius: 10px; flex-shrink: 0;">
                                        <i class="fas fa-phone" style="color: #3498db; font-size: 16px;"></i>
                                    </div>
                                    <div>
                                        <a href="tel:<?php echo esc_attr(str_replace(array(' ', '-', '(', ')'), '', get_theme_mod('contact_phone', '(123) 456-7890')));?>"
                                           class="text-decoration-none" style="color: #bdc3c7; font-size: 14px; transition: color 0.3s ease;">
                                            <?php echo get_theme_mod('contact_phone', '(123) 456-7890'); ?>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="contact-item mb-3 d-flex align-items-center">
                                    <div class="contact-icon me-3 d-flex align-items-center justify-content-center" 
                                         style="width: 40px; height: 40px; background: rgba(255,255,255,0.1); border-radius: 10px; flex-shrink: 0;">
                                        <i class="fas fa-envelope" style="color: #3498db; font-size: 16px;"></i>
                                    </div>
                                    <div>
                                        <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'info@blueprintfolder.com'));?>"
                                           class="text-decoration-none" style="color: #bdc3c7; font-size: 14px; transition: color 0.3s ease;">
                                            <?php echo get_theme_mod('contact_email', 'info@blueprintfolder.com'); ?>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="contact-item mb-4 d-flex align-items-center">
                                    <div class="contact-icon me-3 d-flex align-items-center justify-content-center" 
                                         style="width: 40px; height: 40px; background: rgba(255,255,255,0.1); border-radius: 10px; flex-shrink: 0;">
                                        <i class="fas fa-clock" style="color: #3498db; font-size: 16px;"></i>
                                    </div>
                                    <div>
                                        <div style="color: #bdc3c7; font-size: 14px; line-height: 1.5;">
                                            <?php echo get_theme_mod('business_hours', 'Mon-Fri: 9:00 AM - 5:00 PM<br>Weekend: Closed'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Quick CTA -->
                            <div class="footer-cta">
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact')));?>" 
                                   class="btn btn-primary w-100" 
                                   style="background: #3498db; border: none; border-radius: 12px; padding: 12px; font-weight: 600; transition: all 0.3s ease;">
                                    <i class="fas fa-arrow-right me-2"></i>Get Free Quote
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom py-4" style="background: rgba(0,0,0,0.3); border-top: 1px solid rgba(255,255,255,0.1);">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 mb-3 mb-md-0">
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
                                <i class="fas fa-shield-alt me-1"></i>
                                <?php esc_html_e('Privacy Policy', 'blueprint-folder');?>
                            </a>
                            <a href="<?php echo esc_url(home_url('/terms-of-service'));?>" class="text-decoration-none"
                               style="color: #95a5a6; font-size: 14px; transition: color 0.3s ease;">
                                <i class="fas fa-file-contract me-1"></i>
                                <?php esc_html_e('Terms of Service', 'blueprint-folder');?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Enhanced Back to Top Button -->
    <button id="back-to-top" class="btn position-fixed d-none"
            style="bottom: 30px; right: 30px; z-index: 1000; background: linear-gradient(135deg, #3498db, #2980b9); border: none; border-radius: 50%; width: 60px; height: 60px; box-shadow: 0 8px 25px rgba(52, 152, 219, 0.3); transition: all 0.3s ease;">
        <i class="fas fa-chevron-up" style="color: white; font-size: 18px;"></i>
    </button>
    
    <?php wp_footer();?>
    
    <!-- Enhanced Footer JavaScript -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Back to Top Button
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
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
        // Enhanced hover effects for back to top
        backToTopBtn.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1) translateY(-2px)';
            this.style.boxShadow = '0 12px 35px rgba(52, 152, 219, 0.4)';
        });
        
        backToTopBtn.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.boxShadow = '0 8px 25px rgba(52, 152, 219, 0.3)';
        });

        // Enhanced social media hover effects
        var socialLinks = document.querySelectorAll('.social-link');
        socialLinks.forEach(function(link) {
            link.addEventListener('mouseenter', function() {
                var color = this.getAttribute('data-color');
                this.style.background = color;
                this.style.transform = 'translateY(-3px) scale(1.1)';
                this.style.boxShadow = '0 8px 20px rgba(0,0,0,0.2)';
            });
            
            link.addEventListener('mouseleave', function() {
                this.style.background = 'rgba(255,255,255,0.1)';
                this.style.transform = 'translateY(0) scale(1)';
                this.style.boxShadow = 'none';
            });
        });

        // Footer service links hover effects
        var serviceLinks = document.querySelectorAll('.footer-service-link');
        serviceLinks.forEach(function(link) {
            link.addEventListener('mouseenter', function() {
                this.style.color = '#3498db';
                this.style.background = 'rgba(255,255,255,0.05)';
                this.style.paddingLeft = '12px';
            });
            
            link.addEventListener('mouseleave', function() {
                this.style.color = '#bdc3c7';
                this.style.background = 'transparent';
                this.style.paddingLeft = '0px';
            });
        });

        // Newsletter form handling
        var newsletterForm = document.querySelector('.newsletter-form');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', function(e) {
                e.preventDefault();
                var email = this.querySelector('input[type="email"]').value;
                if (email) {
                    // Add your newsletter signup logic here
                    alert('Thank you for subscribing! We\'ll be in touch soon.');
                    this.reset();
                }
            });
        }

        // Enhanced footer links hover effects
        var footerLinks = document.querySelectorAll('.footer-contact a, .footer-links a');
        footerLinks.forEach(function(link) {
            link.addEventListener('mouseenter', function() {
                this.style.color = '#3498db';
            });
            
            link.addEventListener('mouseleave', function() {
                this.style.color = '#95a5a6';
            });
        });

        // Newsletter input focus effects
        var newsletterInput = document.querySelector('.newsletter-form input[type="email"]');
        if (newsletterInput) {
            newsletterInput.addEventListener('focus', function() {
                this.style.background = 'rgba(255,255,255,0.15)';
                this.style.transform = 'scale(1.02)';
            });
            
            newsletterInput.addEventListener('blur', function() {
                this.style.background = 'rgba(255,255,255,0.1)';
                this.style.transform = 'scale(1)';
            });
        }
    });
    </script>
</body>
</html>
