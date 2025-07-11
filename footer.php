<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>PartyPro Rentals</h3>
                <p>Making your special events unforgettable with premium party rental equipment and professional setup services.</p>
                <div class="social-links mt-4">
                    <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>">Our Services</a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('pricing'))); ?>">Pricing</a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('gallery'))); ?>">Gallery</a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>">Contact Us</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Services</h3>
                <ul>
                    <li><a href="#">Table & Chair Rentals</a></li>
                    <li><a href="#">Tent & Canopy Setup</a></li>
                    <li><a href="#">Bounce House Rentals</a></li>
                    <li><a href="#">Wedding Decorations</a></li>
                    <li><a href="#">Event Lighting</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Contact Info</h3>
                <ul>
                    <li><i class="fas fa-phone"></i> <?php echo esc_html(get_theme_mod('contact_phone', '+91 98765 43210')); ?></li>
                    <li><i class="fas fa-envelope"></i> <?php echo esc_html(get_theme_mod('contact_email', 'info@partyprorentals.com')); ?></li>
                    <li><i class="fas fa-map-marker-alt"></i> <?php echo esc_html(get_theme_mod('contact_address', '123 Party Street, Your City')); ?></li>
                    <li><i class="fas fa-clock"></i> Mon-Sun: 8AM - 8PM</li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved. | Designed for party rental businesses</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
