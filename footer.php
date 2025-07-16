</main>

<footer class="site-footer footer-responsive">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>BluePrint</h3>
                <p>Empowering entrepreneurs with proven business blueprints and comprehensive startup guides for sustainable success.</p>
                <div class="footer-social">
                    <a href="#" class="social-link" aria-label="Facebook">
                        <span class="social-icon">📘</span>
                    </a>
                    <a href="#" class="social-link" aria-label="Instagram">
                        <span class="social-icon">📷</span>
                    </a>
                    <a href="#" class="social-link" aria-label="WhatsApp">
                        <span class="social-icon">💬</span>
                    </a>
                    <a href="#" class="social-link" aria-label="Twitter">
                        <span class="social-icon">🐦</span>
                    </a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>">All Blueprints</a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('pricing'))); ?>">Pricing</a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>">About</a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>">Contact Us</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Business Categories</h3>
                <ul class="footer-links">
                    <li><a href="#">Online & Digital</a></li>
                    <li><a href="#">Service-Based</a></li>
                    <li><a href="#">E-commerce & Retail</a></li>
                    <li><a href="#">Food & Beverage</a></li>
                    <li><a href="#">Creative & Entertainment</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Contact Info</h3>
                <div class="contact-info">
                    <div class="contact-item">
                        <span class="contact-icon">📞</span>
                        <span><?php echo esc_html(get_theme_mod('contact_phone', '+1 (555) 123-4567')); ?></span>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">✉️</span>
                        <span><?php echo esc_html(get_theme_mod('contact_email', 'info@blueprintfolder.com')); ?></span>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">📍</span>
                        <span><?php echo esc_html(get_theme_mod('contact_address', '123 Business Street, Enterprise City')); ?></span>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">🕒</span>
                        <span>Mon-Fri: 9AM - 6PM EST</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved. | Designed for business blueprint entrepreneurs</p>
        </div>
    </div>
</footer>

<!-- Chat Widget -->
<div class="chat-widget">
    <div class="chat-bubble">
        <span class="chat-icon">💬</span>
        <span class="chat-text">Need blueprint advice? Chat with us!</span>
    </div>
    <div class="chat-panel">
        <div class="chat-header">
            <h4>Business Blueprint Support</h4>
            <p style="margin: 5px 0 0; font-size: 0.8rem; opacity: 0.9;">Get expert advice on starting your business!</p>
        </div>
        <div class="chat-body">
            <div class="chat-messages">
                <div class="chat-message bot-message">
                    Hi! I'm here to help you find the perfect business blueprint. What type of business are you interested in starting?
                </div>
            </div>
            <div class="chat-input">
                <input type="text" placeholder="Type your message...">
                <button type="button">Send</button>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
