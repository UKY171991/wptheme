<?php get_header(); ?>

<div class="error-404-section">
    <div class="container">
        <div class="error-404">
            <div class="error-content">
                <div class="error-animation">
                    <div class="error-number">4</div>
                    <div class="error-party-icon">🎉</div>
                    <div class="error-number">4</div>
                </div>
                
                <h1 class="error-title">Oops! Page Not Found</h1>
                <h2 class="error-subtitle">This page seems to have left the party early! 🎪</h2>
                <p class="error-message">
                    Don't worry - even the best party planners sometimes lose track of things. 
                    Let's get you back to the celebration and find what you're looking for!
                </p>
                
                <div class="error-actions">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="error-btn primary">
                        <i class="btn-icon">🏠</i>
                        <span>Go Home</span>
                    </a>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="error-btn secondary">
                        <i class="btn-icon">🎪</i>
                        <span>Browse Rentals</span>
                    </a>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="error-btn secondary">
                        <i class="btn-icon">💬</i>
                        <span>Get Help</span>
                    </a>
                </div>
                
                <div class="search-section">
                    <h3>🔍 Try searching for what you need:</h3>
                    <div class="search-form-wrapper">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
            
            <div class="helpful-links-section">
                <div class="helpful-links-card">
                    <h3>🎉 Popular Event Rentals</h3>
                    <div class="quick-links-grid">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>#tables-chairs" class="quick-link">
                            <span class="link-icon">🪑</span>
                            <span>Tables & Chairs</span>
                        </a>
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>#tents" class="quick-link">
                            <span class="link-icon">🎪</span>
                            <span>Tents & Canopies</span>
                        </a>
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>#entertainment" class="quick-link">
                            <span class="link-icon">🎠</span>
                            <span>Entertainment</span>
                        </a>
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>#lighting" class="quick-link">
                            <span class="link-icon">💡</span>
                            <span>Event Lighting</span>
                        </a>
                    </div>
                </div>
                
                <div class="helpful-links-card">
                    <h3>📞 Need Immediate Help?</h3>
                    <div class="contact-options">
                        <a href="tel:<?php echo esc_attr(str_replace([' ', '-', '(', ')'], '', get_theme_mod('contact_phone', '+919876543210'))); ?>" class="contact-option">
                            <span class="contact-icon">📞</span>
                            <div class="contact-details">
                                <span class="contact-label">Call Us Now</span>
                                <span class="contact-value"><?php echo esc_html(get_theme_mod('contact_phone', '+91 98765 43210')); ?></span>
                            </div>
                        </a>
                        
                        <a href="https://wa.me/<?php echo esc_attr(str_replace(['+', ' ', '-', '(', ')'], '', get_theme_mod('contact_phone', '919876543210'))); ?>" class="contact-option whatsapp">
                            <span class="contact-icon">💬</span>
                            <div class="contact-details">
                                <span class="contact-label">WhatsApp Us</span>
                                <span class="contact-value">Instant Response</span>
                            </div>
                        </a>
                        
                        <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'info@partyprorentals.com')); ?>" class="contact-option">
                            <span class="contact-icon">✉️</span>
                            <div class="contact-details">
                                <span class="contact-label">Email Us</span>
                                <span class="contact-value"><?php echo esc_html(get_theme_mod('contact_email', 'info@partyprorentals.com')); ?></span>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="helpful-links-card">
                    <h3>🎯 Event Planning Resources</h3>
                    <ul class="resource-links">
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('pricing'))); ?>">💰 Pricing & Packages</a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>">ℹ️ About PartyPro</a></li>
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">🏠 Homepage</a></li>
                        <?php if (get_page_by_path('gallery')): ?>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('gallery'))); ?>">📸 Event Gallery</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="error-illustration">
            <div class="floating-elements">
                <div class="floating-balloon">�</div>
                <div class="floating-confetti">🎊</div>
                <div class="floating-party">🎉</div>
                <div class="floating-cake">🎂</div>
            </div>
            <p class="illustration-text">Even our party balloons couldn't find this page!</p>
        </div>
    </div>
</div>

<style>
.error-404-section {
    min-height: 80vh;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 4rem 0;
    position: relative;
}

.error-404 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: start;
    max-width: 1200px;
    margin: 0 auto;
}

.error-content {
    text-align: left;
}

.error-animation {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 2rem;
}

.error-number {
    font-size: 6rem;
    font-weight: bold;
    color: #667eea;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
    animation: bounce 2s infinite;
}

.error-party-icon {
    font-size: 4rem;
    animation: spin 3s linear infinite;
}

.error-title {
    font-size: 2.5rem;
    color: #333;
    margin-bottom: 1rem;
    font-weight: bold;
}

.error-subtitle {
    font-size: 1.5rem;
    color: #667eea;
    margin-bottom: 1rem;
}

.error-message {
    font-size: 1.1rem;
    color: #666;
    line-height: 1.6;
    margin-bottom: 2rem;
    max-width: 500px;
}

.error-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    margin-bottom: 3rem;
}

.error-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem 2rem;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    font-size: 1rem;
}

.error-btn.primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.error-btn.secondary {
    background: white;
    color: #667eea;
    border: 2px solid #667eea;
}

.error-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.search-section {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    margin-bottom: 2rem;
}

.search-section h3 {
    margin-bottom: 1rem;
    color: #333;
    font-size: 1.2rem;
}

.search-form-wrapper form {
    display: flex;
    gap: 0.5rem;
}

.search-form-wrapper input[type="search"] {
    flex: 1;
    padding: 12px 16px;
    border: 2px solid #e1e5e9;
    border-radius: 25px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

.search-form-wrapper input[type="search"]:focus {
    outline: none;
    border-color: #667eea;
}

.search-form-wrapper input[type="submit"] {
    background: #667eea;
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 25px;
    cursor: pointer;
    font-weight: 600;
    transition: background 0.3s ease;
}

.search-form-wrapper input[type="submit"]:hover {
    background: #5a6fd8;
}

.helpful-links-section {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.helpful-links-card {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.helpful-links-card h3 {
    margin-bottom: 1.5rem;
    color: #333;
    font-size: 1.2rem;
}

.quick-links-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}

.quick-link {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem;
    background: #f8f9fa;
    border-radius: 10px;
    text-decoration: none;
    color: #333;
    transition: all 0.3s ease;
    font-weight: 600;
}

.quick-link:hover {
    background: #667eea;
    color: white;
    transform: translateY(-2px);
}

.link-icon {
    font-size: 1.2rem;
}

.contact-options {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.contact-option {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: #f8f9fa;
    border-radius: 10px;
    text-decoration: none;
    color: #333;
    transition: all 0.3s ease;
}

.contact-option:hover {
    background: #667eea;
    color: white;
    transform: translateY(-2px);
}

.contact-option.whatsapp:hover {
    background: #25d366;
}

.contact-icon {
    font-size: 1.5rem;
    flex-shrink: 0;
}

.contact-details {
    display: flex;
    flex-direction: column;
}

.contact-label {
    font-weight: 600;
    font-size: 0.9rem;
}

.contact-value {
    font-size: 0.8rem;
    opacity: 0.8;
}

.resource-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.resource-links li {
    margin-bottom: 0.5rem;
}

.resource-links a {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem;
    text-decoration: none;
    color: #333;
    border-radius: 8px;
    transition: all 0.3s ease;
    font-weight: 500;
}

.resource-links a:hover {
    background: #f8f9fa;
    color: #667eea;
    transform: translateX(5px);
}

.error-illustration {
    text-align: center;
    padding: 2rem;
    position: relative;
}

.floating-elements {
    position: relative;
    height: 200px;
    margin-bottom: 2rem;
}

.floating-elements > div {
    position: absolute;
    font-size: 3rem;
    animation-duration: 4s;
    animation-iteration-count: infinite;
    animation-timing-function: ease-in-out;
}

.floating-balloon {
    top: 20%;
    left: 10%;
    animation-name: float1;
}

.floating-confetti {
    top: 40%;
    right: 15%;
    animation-name: float2;
}

.floating-party {
    top: 60%;
    left: 20%;
    animation-name: float3;
}

.floating-cake {
    top: 30%;
    right: 30%;
    animation-name: float4;
}

.illustration-text {
    color: #666;
    font-style: italic;
    font-size: 1.2rem;
    margin-top: 2rem;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-20px);
    }
    60% {
        transform: translateY(-10px);
    }
}

@keyframes spin {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

@keyframes float1 {
    0%, 100% {
        transform: translateY(0px) rotate(0deg);
    }
    50% {
        transform: translateY(-20px) rotate(5deg);
    }
}

@keyframes float2 {
    0%, 100% {
        transform: translateY(0px) rotate(0deg);
    }
    50% {
        transform: translateY(-15px) rotate(-5deg);
    }
}

@keyframes float3 {
    0%, 100% {
        transform: translateY(0px) rotate(0deg);
    }
    50% {
        transform: translateY(-25px) rotate(3deg);
    }
}

@keyframes float4 {
    0%, 100% {
        transform: translateY(0px) rotate(0deg);
    }
    50% {
        transform: translateY(-18px) rotate(-3deg);
    }
}

@media (max-width: 768px) {
    .error-404 {
        grid-template-columns: 1fr;
        gap: 2rem;
        text-align: center;
    }
    
    .error-content {
        text-align: center;
    }
    
    .error-number {
        font-size: 4rem;
    }
    
    .error-title {
        font-size: 2rem;
    }
    
    .error-subtitle {
        font-size: 1.2rem;
    }
    
    .error-actions {
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }
    
    .error-btn {
        width: 200px;
        justify-content: center;
    }
    
    .search-form-wrapper form {
        flex-direction: column;
        gap: 1rem;
    }
    
    .quick-links-grid {
        grid-template-columns: 1fr;
    }
    
    .floating-elements {
        height: 150px;
    }
    
    .floating-elements > div {
        font-size: 2rem;
    }
}

@media (max-width: 480px) {
    .error-animation {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .error-number {
        font-size: 3rem;
    }
    
    .error-party-icon {
        font-size: 2.5rem;
    }
    
    .helpful-links-card {
        padding: 1.5rem;
    }
}
</style>

<?php get_footer(); ?>
