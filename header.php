<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Top Contact Bar -->
<div class="top-contact-bar">
    <div class="container">
        <div class="top-contact-content">
            <div class="contact-info-top">
                <span class="contact-item">
                    <i class="fas fa-phone"></i>
                    <a href="tel:<?php echo esc_attr(str_replace([' ', '-', '(', ')'], '', get_theme_mod('contact_phone', '+919876543210'))); ?>">
                        <?php echo esc_html(get_theme_mod('contact_phone', '+91 98765 43210')); ?>
                    </a>
                </span>
                <span class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'info@partyprorentals.com')); ?>">
                        <?php echo esc_html(get_theme_mod('contact_email', 'info@partyprorentals.com')); ?>
                    </a>
                </span>
                <span class="contact-item hours">
                    <i class="fas fa-clock"></i>
                    Mon-Sun: 8AM - 8PM
                </span>
            </div>
            <div class="social-links-top">
                <a href="#" class="social-link" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                <a href="#" class="social-link" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="https://wa.me/<?php echo esc_attr(str_replace(['+', ' ', '-', '(', ')'], '', get_theme_mod('contact_phone', '919876543210'))); ?>" class="social-link whatsapp" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- Main Header -->
<header class="site-header">
    <div class="container">
        <div class="header-content">
            <!-- Logo -->
            <div class="site-logo">
                <a href="<?php echo home_url(); ?>" class="logo-link">
                    <div class="logo-icon">🎉</div>
                    <div class="logo-text">
                        <span class="logo-title"><?php bloginfo('name'); ?></span>
                        <span class="logo-tagline">Premium Party Rentals</span>
                    </div>
                </a>
            </div>
            
            <!-- Navigation -->
            <nav class="main-navigation" id="main-nav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'nav-menu',
                    'fallback_cb' => 'partypro_fallback_menu'
                ));
                ?>
            </nav>
            
            <!-- Header Actions -->
            <div class="header-actions">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="quote-btn">
                    <i class="fas fa-calculator"></i>
                    Get Quote
                </a>
                <a href="tel:<?php echo esc_attr(str_replace([' ', '-', '(', ')'], '', get_theme_mod('contact_phone', '+919876543210'))); ?>" class="call-btn">
                    <i class="fas fa-phone"></i>
                    Call Now
                </a>
            </div>
            
            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" id="mobile-toggle" aria-label="Toggle Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Navigation Overlay -->
<div class="mobile-nav-overlay" id="mobile-overlay">
    <div class="mobile-nav-content">
        <div class="mobile-nav-header">
            <h3>🎉 PartyPro Menu</h3>
            <button class="mobile-close" id="mobile-close">&times;</button>
        </div>
        <nav class="mobile-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'mobile-nav-menu',
                'fallback_cb' => 'partypro_mobile_fallback_menu'
            ));
            ?>
            <div class="mobile-nav-actions">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="mobile-action-btn quote">
                    <i class="fas fa-calculator"></i>
                    Get Free Quote
                </a>
                <a href="tel:<?php echo esc_attr(str_replace([' ', '-', '(', ')'], '', get_theme_mod('contact_phone', '+919876543210'))); ?>" class="mobile-action-btn call">
                    <i class="fas fa-phone"></i>
                    Call <?php echo esc_html(get_theme_mod('contact_phone', '+91 98765 43210')); ?>
                </a>
            </div>
        </nav>
    </div>
</div>

<style>
.top-contact-bar {
    background: #333;
    color: white;
    padding: 0.5rem 0;
    font-size: 0.9rem;
}

.top-contact-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.contact-info-top {
    display: flex;
    gap: 2rem;
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.contact-item a {
    color: white;
    text-decoration: none;
    transition: color 0.3s ease;
}

.contact-item a:hover {
    color: #f1c40f;
}

.social-links-top {
    display: flex;
    gap: 1rem;
}

.social-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 30px;
    height: 30px;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-link:hover {
    background: #f1c40f;
    color: #333;
    transform: translateY(-2px);
}

.social-link.whatsapp:hover {
    background: #25d366;
    color: white;
}

.site-header {
    background: white;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    position: sticky;
    top: 0;
    z-index: 1000;
}

.header-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem 0;
}

.site-logo .logo-link {
    display: flex;
    align-items: center;
    text-decoration: none;
    gap: 1rem;
}

.logo-icon {
    font-size: 2.5rem;
    animation: bounce 2s infinite;
}

.logo-text {
    display: flex;
    flex-direction: column;
}

.logo-title {
    font-size: 1.8rem;
    font-weight: bold;
    color: #333;
    line-height: 1;
}

.logo-tagline {
    font-size: 0.8rem;
    color: #667eea;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.main-navigation .nav-menu {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 2rem;
}

.main-navigation .nav-menu li a {
    text-decoration: none;
    color: #333;
    font-weight: 600;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    transition: all 0.3s ease;
    position: relative;
}

.main-navigation .nav-menu li a:hover {
    background: #667eea;
    color: white;
    transform: translateY(-2px);
}

.header-actions {
    display: flex;
    gap: 1rem;
    align-items: center;
}

.quote-btn,
.call-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.quote-btn {
    background: #f1c40f;
    color: #333;
}

.call-btn {
    background: #667eea;
    color: white;
}

.quote-btn:hover,
.call-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.mobile-menu-toggle {
    display: none;
    flex-direction: column;
    background: none;
    border: none;
    padding: 0.5rem;
    cursor: pointer;
}

.mobile-menu-toggle span {
    width: 25px;
    height: 3px;
    background: #333;
    margin: 2px 0;
    transition: 0.3s;
    border-radius: 2px;
}

.mobile-nav-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.9);
    z-index: 9999;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.mobile-nav-overlay.active {
    opacity: 1;
    visibility: visible;
}

.mobile-nav-content {
    background: white;
    width: 90%;
    max-width: 400px;
    height: 100%;
    margin-left: auto;
    padding: 2rem;
    transform: translateX(100%);
    transition: transform 0.3s ease;
}

.mobile-nav-overlay.active .mobile-nav-content {
    transform: translateX(0);
}

.mobile-nav-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid #eee;
}

.mobile-close {
    background: none;
    border: none;
    font-size: 2rem;
    cursor: pointer;
    color: #333;
}

.mobile-nav-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.mobile-nav-menu li {
    margin-bottom: 1rem;
}

.mobile-nav-menu li a {
    display: block;
    padding: 1rem;
    text-decoration: none;
    color: #333;
    font-weight: 600;
    border-radius: 10px;
    transition: background 0.3s ease;
}

.mobile-nav-menu li a:hover {
    background: #f8f9fa;
    color: #667eea;
}

.mobile-nav-actions {
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 1px solid #eee;
}

.mobile-action-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem;
    margin-bottom: 1rem;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 600;
    text-align: center;
    justify-content: center;
}

.mobile-action-btn.quote {
    background: #f1c40f;
    color: #333;
}

.mobile-action-btn.call {
    background: #667eea;
    color: white;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-10px);
    }
    60% {
        transform: translateY(-5px);
    }
}

@media (max-width: 768px) {
    .top-contact-bar {
        display: none;
    }
    
    .main-navigation,
    .header-actions {
        display: none;
    }
    
    .mobile-menu-toggle {
        display: flex;
    }
    
    .logo-title {
        font-size: 1.5rem;
    }
    
    .contact-info-top {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .contact-item.hours {
        display: none;
    }
}

@media (max-width: 480px) {
    .contact-info-top {
        gap: 1rem;
    }
    
    .logo-title {
        font-size: 1.3rem;
    }
    
    .logo-icon {
        font-size: 2rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileToggle = document.getElementById('mobile-toggle');
    const mobileClose = document.getElementById('mobile-close');
    const mobileOverlay = document.getElementById('mobile-overlay');
    
    mobileToggle.addEventListener('click', function() {
        mobileOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    });
    
    mobileClose.addEventListener('click', function() {
        mobileOverlay.classList.remove('active');
        document.body.style.overflow = '';
    });
    
    mobileOverlay.addEventListener('click', function(e) {
        if (e.target === mobileOverlay) {
            mobileOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }
    });
});
</script>

<?php
// Fallback menu for desktop
function partypro_fallback_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    
    $services_page = get_page_by_path('services');
    if ($services_page) {
        echo '<li><a href="' . esc_url(get_permalink($services_page)) . '">Services</a></li>';
    }
    
    $pricing_page = get_page_by_path('pricing');
    if ($pricing_page) {
        echo '<li><a href="' . esc_url(get_permalink($pricing_page)) . '">Pricing</a></li>';
    }
    
    $about_page = get_page_by_path('about');
    if ($about_page) {
        echo '<li><a href="' . esc_url(get_permalink($about_page)) . '">About</a></li>';
    }
    
    $contact_page = get_page_by_path('contact');
    if ($contact_page) {
        echo '<li><a href="' . esc_url(get_permalink($contact_page)) . '">Contact</a></li>';
    }
    
    echo '</ul>';
}

// Fallback menu for mobile
function partypro_mobile_fallback_menu() {
    echo '<ul class="mobile-nav-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">🏠 Home</a></li>';
    
    $services_page = get_page_by_path('services');
    if ($services_page) {
        echo '<li><a href="' . esc_url(get_permalink($services_page)) . '">🎪 Our Services</a></li>';
    }
    
    $pricing_page = get_page_by_path('pricing');
    if ($pricing_page) {
        echo '<li><a href="' . esc_url(get_permalink($pricing_page)) . '">💰 Pricing</a></li>';
    }
    
    $about_page = get_page_by_path('about');
    if ($about_page) {
        echo '<li><a href="' . esc_url(get_permalink($about_page)) . '">ℹ️ About Us</a></li>';
    }
    
    $contact_page = get_page_by_path('contact');
    if ($contact_page) {
        echo '<li><a href="' . esc_url(get_permalink($contact_page)) . '">📞 Contact</a></li>';
    }
    
    echo '</ul>';
}
?>
