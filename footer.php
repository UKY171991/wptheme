</main>

<footer class="footer">
    <!-- Newsletter Section -->
    <div class="footer-newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter-content">
                        <div class="newsletter-text">
                            <h3>Get Business Blueprint Updates</h3>
                            <p>Subscribe to receive new blueprint alerts, entrepreneurship tips, and exclusive offers</p>
                        </div>
                        <div class="newsletter-form">
                            <form action="#" method="post" class="newsletter-subscribe-form">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Your email address" required aria-label="Email">
                                    <button type="submit" class="btn btn-primary">Subscribe</button>
                                </div>
                                <div class="form-privacy">
                                    <small>We respect your privacy. Unsubscribe at any time.</small>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Footer Content -->
    <div class="footer-main">
        <div class="container">
            <div class="footer-content">
                <!-- Branding Section -->
                <div class="footer-branding">
                    <div class="footer-logo">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
                            ?>
                            <h3 class="footer-site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </h3>
                            <?php
                        }
                        ?>
                    </div>
                    <p>Empowering entrepreneurs with proven business blueprints and comprehensive startup guides for sustainable success.</p>
                    <div class="footer-social">
                        <a href="#" class="social-link" aria-label="Facebook">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                        </a>
                        <a href="#" class="social-link" aria-label="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                        </a>
                        <a href="#" class="social-link" aria-label="Twitter">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                        </a>
                        <a href="#" class="social-link" aria-label="LinkedIn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links Section -->
                <div class="footer-links-section">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>">All Blueprints</a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('pricing'))); ?>">Pricing</a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>">About</a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>">Contact Us</a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('blog'))); ?>">Blog</a></li>
                    </ul>
                </div>
                
                <!-- Business Categories Section -->
                <div class="footer-links-section">
                    <h3>Business Categories</h3>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('online-digital-blueprints'))); ?>">Online & Digital</a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('service-based-blueprints'))); ?>">Service-Based</a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('ecommerce-retail-blueprints'))); ?>">E-commerce & Retail</a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('food-beverage-blueprints'))); ?>">Food & Beverage</a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('health-wellness-blueprints'))); ?>">Health & Wellness</a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('creative-entertainment-blueprints'))); ?>">Creative & Entertainment</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info Section -->
                <div class="footer-links-section">
                    <h3>Contact Info</h3>
                    <div class="contact-info">
                        <div class="contact-item">
                            <span class="contact-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                            </span>
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_mod('contact_phone', '+1 (555) 123-4567'))); ?>">
                                <?php echo esc_html(get_theme_mod('contact_phone', '+1 (555) 123-4567')); ?>
                            </a>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            </span>
                            <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'info@blueprintfolder.com')); ?>">
                                <?php echo esc_html(get_theme_mod('contact_email', 'info@blueprintfolder.com')); ?>
                            </a>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            </span>
                            <address><?php echo esc_html(get_theme_mod('contact_address', '123 Business Street, Enterprise City')); ?></address>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            </span>
                            <span>Mon-Fri: 9AM - 6PM EST</span>
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
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
                <div class="footer-bottom-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">Sitemap</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Chat Widget -->
<div class="chat-widget">
    <button class="chat-toggle" aria-expanded="false" aria-controls="chat-panel">
        <span class="chat-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
        </span>
        <span class="chat-text">Need blueprint advice?</span>
    </button>
    <div id="chat-panel" class="chat-panel">
        <div class="chat-header">
            <h4>Business Blueprint Support</h4>
            <p>Get expert advice on starting your business!</p>
            <button class="chat-close" aria-label="Close chat">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>
        <div class="chat-body">
            <div class="chat-messages">
                <div class="chat-message bot-message">
                    <div class="message-content">
                        Hi! I'm here to help you find the perfect business blueprint. What type of business are you interested in starting?
                    </div>
                    <div class="message-time">Just now</div>
                </div>
            </div>
            <div class="chat-input">
                <form class="chat-form">
                    <input type="text" placeholder="Type your message..." aria-label="Type your message">
                    <button type="submit" aria-label="Send message">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Back to top button -->
<button id="back-to-top" class="back-to-top" aria-label="Back to top">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg>
</button>

<?php wp_footer(); ?>

<script>
    // Initialize search functionality
    document.addEventListener('DOMContentLoaded', function() {
        const searchToggle = document.querySelector('.search-toggle');
        const searchContainer = document.getElementById('search-container');
        const searchClose = document.querySelector('.search-close');
        
        if (searchToggle && searchContainer && searchClose) {
            searchToggle.addEventListener('click', function() {
                const expanded = this.getAttribute('aria-expanded') === 'true' || false;
                this.setAttribute('aria-expanded', !expanded);
                searchContainer.classList.toggle('active');
                
                if (!expanded) {
                    setTimeout(() => {
                        searchContainer.querySelector('.search-field').focus();
                    }, 100);
                }
            });
            
            searchClose.addEventListener('click', function() {
                searchToggle.setAttribute('aria-expanded', 'false');
                searchContainer.classList.remove('active');
            });
        }
        
        // Initialize chat widget
        const chatToggle = document.querySelector('.chat-toggle');
        const chatPanel = document.getElementById('chat-panel');
        const chatClose = document.querySelector('.chat-close');
        
        if (chatToggle && chatPanel && chatClose) {
            chatToggle.addEventListener('click', function() {
                const expanded = this.getAttribute('aria-expanded') === 'true' || false;
                this.setAttribute('aria-expanded', !expanded);
                chatPanel.classList.toggle('active');
            });
            
            chatClose.addEventListener('click', function() {
                chatToggle.setAttribute('aria-expanded', 'false');
                chatPanel.classList.remove('active');
            });
        }
        
        // Initialize back to top button
        const backToTop = document.getElementById('back-to-top');
        
        if (backToTop) {
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTop.classList.add('visible');
                } else {
                    backToTop.classList.remove('visible');
                }
            });
            
            backToTop.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
    });
</script>
</body>
</html>
