    <footer class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3><?php bloginfo('name'); ?></h3>
                    <p><?php bloginfo('description'); ?></p>
                    <?php if (get_theme_mod('contact_address')) : ?>
                        <p><strong>Address:</strong><br><?php echo esc_html(get_theme_mod('contact_address')); ?></p>
                    <?php endif; ?>
                </div>
                
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container' => false,
                        'menu_class' => '',
                        'fallback_cb' => 'services_pro_footer_fallback_menu',
                    ));
                    ?>
                </div>
                
                <div class="footer-section">
                    <h3>Contact Info</h3>
                    <?php if (get_theme_mod('contact_phone')) : ?>
                        <p><strong>Phone:</strong> <a href="tel:<?php echo esc_attr(str_replace(array(' ', '(', ')', '-'), '', get_theme_mod('contact_phone'))); ?>"><?php echo esc_html(get_theme_mod('contact_phone')); ?></a></p>
                    <?php endif; ?>
                    <?php if (get_theme_mod('contact_email')) : ?>
                        <p><strong>Email:</strong> <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email')); ?>"><?php echo esc_html(get_theme_mod('contact_email')); ?></a></p>
                    <?php endif; ?>
                </div>
                
                <div class="footer-section">
                    <h3>Business Hours</h3>
                    <ul>
                        <li>Monday - Friday: 8:00 AM - 6:00 PM</li>
                        <li>Saturday: 9:00 AM - 4:00 PM</li>
                        <li>Sunday: Emergency calls only</li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved. | 
                Professional Home Services | Licensed & Insured</p>
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
