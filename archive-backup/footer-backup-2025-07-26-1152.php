        </main><!-- #main -->
    </div><!-- #content -->

    <!-- Footer -->
    <footer id="footer" class="site-footer" role="contentinfo">
        <div class="footer-main">
            <div class="container">
                <div class="footer-content">
                    <!-- Company Info -->
                    <div class="footer-section footer-about">
                        <h3 class="footer-title"><?php bloginfo('name'); ?></h3>
                        <p class="footer-description">
                            <?php 
                            $description = get_bloginfo('description', 'display');
                            echo $description ? esc_html($description) : esc_html__('Professional digital marketing services to help your business grow online.', 'blueprint-folder');
                            ?>
                        </p>
                        
                        <div class="footer-contact">
                            <?php 
                            $phone = get_theme_mod('blueprint_folder_phone', '(555) 123-4567');
                            $email = get_theme_mod('blueprint_folder_email', 'info@blueprintfolder.com');
                            $address = get_theme_mod('blueprint_folder_address', '123 Business Ave, City, State 12345');
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
                        <h3 class="footer-title"><?php _e('Quick Links', 'blueprint-folder'); ?></h3>
                        <ul class="footer-menu">
                            <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'blueprint-folder'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/about')); ?>"><?php _e('About Us', 'blueprint-folder'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/services')); ?>"><?php _e('Services', 'blueprint-folder'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/pricing')); ?>"><?php _e('Pricing', 'blueprint-folder'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/portfolio')); ?>"><?php _e('Portfolio', 'blueprint-folder'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/contact')); ?>"><?php _e('Contact', 'blueprint-folder'); ?></a></li>
                        </ul>
                    </div>

                    <!-- Services -->
                    <div class="footer-section footer-services">
                        <h3 class="footer-title"><?php _e('Our Services', 'blueprint-folder'); ?></h3>
                        <ul class="footer-menu">
                            <?php
                            $services = get_posts(array(
                                'post_type' => 'service',
                                'posts_per_page' => 6,
                                'post_status' => 'publish'
                            ));
                            
                            if ($services) {
                                foreach ($services as $service) {
                                    echo '<li><a href="' . esc_url(get_permalink($service->ID)) . '">' . esc_html($service->post_title) . '</a></li>';
                                }
                            } else {
                                // Fallback services
                                echo '<li><a href="#">' . esc_html__('Digital Marketing', 'blueprint-folder') . '</a></li>';
                                echo '<li><a href="#">' . esc_html__('Web Development', 'blueprint-folder') . '</a></li>';
                                echo '<li><a href="#">' . esc_html__('SEO Services', 'blueprint-folder') . '</a></li>';
                                echo '<li><a href="#">' . esc_html__('Content Creation', 'blueprint-folder') . '</a></li>';
                                echo '<li><a href="#">' . esc_html__('Social Media', 'blueprint-folder') . '</a></li>';
                                echo '<li><a href="#">' . esc_html__('Consulting', 'blueprint-folder') . '</a></li>';
                            }
                            ?>
                        </ul>
                    </div>

                    <!-- Newsletter -->
                    <div class="footer-section footer-newsletter">
                        <h3 class="footer-title"><?php _e('Stay Updated', 'blueprint-folder'); ?></h3>
                        <p class="footer-newsletter-text">
                            <?php _e('Subscribe to our newsletter for the latest updates and industry insights.', 'blueprint-folder'); ?>
                        </p>
                        
                        <form class="newsletter-form" action="#" method="post">
                            <div class="newsletter-input">
                                <input type="email" name="newsletter_email" placeholder="<?php esc_attr_e('Enter your email', 'blueprint-folder'); ?>" required>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane" aria-hidden="true"></i>
                                    <span class="sr-only"><?php _e('Subscribe', 'blueprint-folder'); ?></span>
                                </button>
                            </div>
                        </form>
                        
                        <!-- Social Links -->
                        <div class="footer-social">
                            <h4 class="social-title"><?php _e('Follow Us', 'blueprint-folder'); ?></h4>
                            <div class="social-links">
                                <?php
                                $social_links = array(
                                    'facebook' => get_theme_mod('blueprint_folder_facebook', '#'),
                                    'twitter' => get_theme_mod('blueprint_folder_twitter', '#'),
                                    'linkedin' => get_theme_mod('blueprint_folder_linkedin', '#'),
                                    'instagram' => get_theme_mod('blueprint_folder_instagram', '#'),
                                    'youtube' => get_theme_mod('blueprint_folder_youtube', '#'),
                                );
                                
                                foreach ($social_links as $platform => $url) {
                                    if ($url && $url !== '#') {
                                        echo '<a href="' . esc_url($url) . '" class="social-link social-' . esc_attr($platform) . '" target="_blank" rel="noopener noreferrer" aria-label="' . esc_attr(ucfirst($platform)) . '">';
                                        echo '<i class="fab fa-' . esc_attr($platform) . '" aria-hidden="true"></i>';
                                        echo '</a>';
                                    }
                                }
                                ?>
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
                        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved.', 'blueprint-folder'); ?></p>
                    </div>
                    
                    <div class="footer-legal">
                        <ul class="legal-links">
                            <li><a href="<?php echo esc_url(home_url('/privacy-policy')); ?>"><?php _e('Privacy Policy', 'blueprint-folder'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/terms-of-service')); ?>"><?php _e('Terms of Service', 'blueprint-folder'); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="back-to-top" aria-label="<?php esc_attr_e('Back to top', 'blueprint-folder'); ?>">
        <i class="fas fa-chevron-up" aria-hidden="true"></i>
    </button>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Quick Links -->
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h4 class="h6 text-accent mb-3">Quick Links</h4>
                        <?php
                        if (has_nav_menu('footer')) {
                            wp_nav_menu(array(
                                'theme_location' => 'footer',
                                'container' => false,
                                'menu_class' => 'list-unstyled footer-menu',
                                'depth' => 1,
                            ));
                        } else {
                            echo '<ul class="list-unstyled footer-menu">';
                            echo '<li><a href="' . esc_url(home_url('/')) . '" class="text-light text-decoration-none">Home</a></li>';
                            echo '<li><a href="' . esc_url(home_url('/about/')) . '" class="text-light text-decoration-none">About</a></li>';
                            echo '<li><a href="' . esc_url(home_url('/services/')) . '" class="text-light text-decoration-none">Services</a></li>';
                            echo '<li><a href="' . esc_url(home_url('/contact/')) . '" class="text-light text-decoration-none">Contact</a></li>';
                            echo '</ul>';
                        }
                        ?>
                    </div>
                    
                    <!-- Services -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h4 class="h6 text-accent mb-3">Our Services</h4>
                        <ul class="list-unstyled footer-menu">
                            <li><a href="#" class="text-light text-decoration-none">House Cleaning</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Home Maintenance</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Handyman Services</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Lawn Care</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Emergency Services</a></li>
                        </ul>
                    </div>
                    
                    <!-- Business Hours -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h4 class="h6 text-accent mb-3">Business Hours</h4>
                        <ul class="list-unstyled text-light">
                            <li class="mb-2">
                                <strong>Monday - Friday:</strong><br>
                                8:00 AM - 6:00 PM
                            </li>
                            <li class="mb-2">
                                <strong>Saturday:</strong><br>
                                9:00 AM - 4:00 PM
                            </li>
                            <li class="mb-2">
                                <strong>Sunday:</strong><br>
                                Emergency calls only
                            </li>
                        </ul>
                        
                        <!-- CTA Button -->
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-accent btn-rounded mt-3">
                            <i class="fas fa-phone me-2"></i>Get Free Quote
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Footer Bottom -->
            <div class="border-top border-secondary pt-4 pb-4">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="mb-md-0 text-light small">
                            &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
                        </p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="mb-0 text-light small">
                            Licensed & Insured | Professional Home Services
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Theme JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Add scroll effect to header
    let lastScrollTop = 0;
    const header = document.querySelector('.site-header');
    
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > 100) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
        
        lastScrollTop = scrollTop;
    });
});
</script>

</body>
</html>
            </div>
        </div>
    </footer>

<?php wp_footer(); ?>

<script>
// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Add animation on scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

document.querySelectorAll('.service-category, .about-content, .contact-item').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(20px)';
    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(el);
});
</script>

</div><!-- #page -->
</body>
</html>

<?php
// Footer fallback menu
function services_pro_footer_fallback_menu() {
    echo '<ul>';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    echo '<li><a href="#services">Services</a></li>';
    echo '<li><a href="#about">About</a></li>';
    echo '<li><a href="#contact">Contact</a></li>';
    echo '</ul>';
}
?>
