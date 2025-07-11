<?php get_header(); ?>

<div class="content-section">
    <div class="container">
        <div class="error-404">
            <div class="error-content">
                <h1 class="error-title">404</h1>
                <h2 class="error-subtitle">Oops! Page Not Found</h2>
                <p class="error-message">
                    The page you're looking for seems to have vanished like confetti after a party! 
                    Don't worry, let's get you back to the celebration.
                </p>
                
                <div class="error-actions">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">Go Home</a>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="btn btn-secondary">Browse Services</a>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-secondary">Contact Us</a>
                </div>
                
                <div class="search-section">
                    <h3>Try searching for what you need:</h3>
                    <?php get_search_form(); ?>
                </div>
                
                <div class="helpful-links">
                    <h3>Quick Links:</h3>
                    <ul>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>">Our Services</a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>">Contact Us</a></li>
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">Home Page</a></li>
                        <li><a href="tel:<?php echo esc_attr(get_theme_mod('contact_phone', '+919876543210')); ?>">Call: <?php echo esc_html(get_theme_mod('contact_phone', '+91 98765 43210')); ?></a></li>
                        <li><a href="https://wa.me/<?php echo esc_attr(str_replace(['+', ' ', '-'], '', get_theme_mod('contact_phone', '919876543210'))); ?>">WhatsApp Us</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="error-illustration">
                <div class="party-emoji">🎉</div>
                <div class="sad-emoji">😕</div>
                <p>Even our party balloons couldn't find this page!</p>
            </div>
        </div>
    </div>
</div>

<style>
.error-404 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 3rem;
    align-items: center;
    min-height: 60vh;
    padding: 3rem 0;
}

.error-content {
    text-align: left;
}

.error-title {
    font-size: 6rem;
    font-weight: bold;
    color: #667eea;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
}

.error-subtitle {
    font-size: 2.5rem;
    color: #333;
    margin-bottom: 1rem;
}

.error-message {
    font-size: 1.1rem;
    color: #666;
    line-height: 1.6;
    margin-bottom: 2rem;
}

.error-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    margin-bottom: 3rem;
}

.search-section {
    background: #f8f9fa;
    padding: 2rem;
    border-radius: 15px;
    margin-bottom: 2rem;
}

.search-section h3 {
    margin-bottom: 1rem;
    color: #333;
}

.search-section form {
    display: flex;
    gap: 0.5rem;
}

.search-section input[type="search"] {
    flex: 1;
    padding: 12px;
    border: 2px solid #ddd;
    border-radius: 25px;
    font-size: 1rem;
}

.search-section input[type="submit"] {
    background: #667eea;
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 25px;
    cursor: pointer;
    font-weight: bold;
    transition: background 0.3s ease;
}

.search-section input[type="submit"]:hover {
    background: #5a6fd8;
}

.helpful-links {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.helpful-links h3 {
    margin-bottom: 1rem;
    color: #333;
}

.helpful-links ul {
    list-style: none;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 0.5rem;
}

.helpful-links a {
    color: #667eea;
    text-decoration: none;
    padding: 0.5rem 0;
    display: block;
    border-bottom: 1px solid #eee;
    transition: color 0.3s ease;
}

.helpful-links a:hover {
    color: #f1c40f;
}

.error-illustration {
    text-align: center;
    padding: 2rem;
}

.party-emoji, .sad-emoji {
    font-size: 4rem;
    margin-bottom: 1rem;
}

.party-emoji {
    animation: bounce 2s infinite;
}

.sad-emoji {
    animation: shake 3s infinite;
}

.error-illustration p {
    color: #666;
    font-style: italic;
    font-size: 1.1rem;
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

@keyframes shake {
    0%, 100% {
        transform: translateX(0);
    }
    10%, 30%, 50%, 70%, 90% {
        transform: translateX(-5px);
    }
    20%, 40%, 60%, 80% {
        transform: translateX(5px);
    }
}

@media (max-width: 768px) {
    .error-404 {
        grid-template-columns: 1fr;
        text-align: center;
    }
    
    .error-content {
        text-align: center;
    }
    
    .error-title {
        font-size: 4rem;
    }
    
    .error-subtitle {
        font-size: 2rem;
    }
    
    .error-actions {
        justify-content: center;
    }
    
    .search-section form {
        flex-direction: column;
    }
    
    .helpful-links ul {
        grid-template-columns: 1fr;
    }
}
</style>

<?php get_footer(); ?>
