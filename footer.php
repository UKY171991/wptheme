    <footer class="site-footer bg-primary-dark text-white">
        <div class="container">
            <div class="section-padding">
                <div class="row">
                    <!-- Company Info -->
                     testing new
                    <div class="col-lg-4 col-md-6 mb-4">
                        <h3 class="h5 text-accent mb-3"><?php bloginfo('name'); ?></h3>
                        <p class="text-light mb-3"><?php bloginfo('description'); ?></p>
                        
                        <?php if (get_theme_mod('contact_address')) : ?>
                            <div class="d-flex align-items-start mb-2">
                                <i class="fas fa-map-marker-alt text-accent me-3 mt-1"></i>
                                <span class="text-light"><?php echo esc_html(get_theme_mod('contact_address')); ?></span>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('contact_phone')) : ?>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-phone text-accent me-3"></i>
                                <a href="tel:<?php echo esc_attr(str_replace(array(' ', '(', ')', '-'), '', get_theme_mod('contact_phone'))); ?>" class="text-light text-decoration-none">
                                    <?php echo esc_html(get_theme_mod('contact_phone')); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('contact_email')) : ?>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-envelope text-accent me-3"></i>
                                <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email')); ?>" class="text-light text-decoration-none">
                                    <?php echo esc_html(get_theme_mod('contact_email')); ?>
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
