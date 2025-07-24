<?php
/**
 * 404 Error Page Template
 * 
 * @package ServiceBlueprint
 */

get_header(); ?>

<section class="error-404-section">
    <div class="container">
        <div class="error-404-content">
            <!-- Error illustration -->
            <div class="error-illustration">
                <div class="error-number">404</div>
                <div class="error-icon">🔍</div>
            </div>
            
            <div class="error-text">
                <h1 class="error-title"><?php esc_html_e('Page Not Found', 'service-blueprint'); ?></h1>
                <p class="error-description">
                    <?php esc_html_e('Sorry, we couldn\'t find the page you were looking for. It may have been moved, deleted, or you entered the wrong URL.', 'service-blueprint'); ?>
                </p>
            </div>
            
            <!-- Search form -->
            <div class="error-search">
                <h2><?php esc_html_e('Search for what you need', 'service-blueprint'); ?></h2>
                <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="search-input-group">
                        <input type="search" 
                               class="search-field" 
                               placeholder="<?php esc_attr_e('Search services...', 'service-blueprint'); ?>" 
                               value="<?php echo get_search_query(); ?>" 
                               name="s" 
                               aria-label="<?php esc_attr_e('Search', 'service-blueprint'); ?>" />
                        <button type="submit" class="search-submit">
                            <span class="search-icon">🔍</span>
                            <span class="sr-only"><?php esc_html_e('Search', 'service-blueprint'); ?></span>
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Helpful links -->
            <div class="helpful-links">
                <h2><?php esc_html_e('Or try these popular sections', 'service-blueprint'); ?></h2>
                
                <div class="links-grid">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="helpful-link">
                        <span class="link-icon">🏠</span>
                        <span class="link-text"><?php esc_html_e('Homepage', 'service-blueprint'); ?></span>
                    </a>
                    
                    <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="helpful-link">
                        <span class="link-icon">🛠️</span>
                        <span class="link-text"><?php esc_html_e('All Services', 'service-blueprint'); ?></span>
                    </a>
                    
                    <?php
                    // Get popular service categories
                    $popular_categories = get_terms(array(
                        'taxonomy' => 'service_category',
                        'orderby' => 'count',
                        'order' => 'DESC',
                        'number' => 4,
                        'hide_empty' => true
                    ));
                    
                    if (!is_wp_error($popular_categories) && !empty($popular_categories)) :
                        foreach ($popular_categories as $category) :
                            $icon = get_term_meta($category->term_id, 'category_icon', true);
                    ?>
                        <a href="<?php echo esc_url(get_term_link($category)); ?>" class="helpful-link">
                            <span class="link-icon"><?php echo $icon ? esc_html($icon) : '📋'; ?></span>
                            <span class="link-text"><?php echo esc_html($category->name); ?></span>
                        </a>
                    <?php 
                        endforeach;
                    endif;
                    
                    // Add contact page if it exists
                    $contact_page = get_page_by_title('Contact');
                    if ($contact_page) :
                    ?>
                        <a href="<?php echo esc_url(get_permalink($contact_page)); ?>" class="helpful-link">
                            <span class="link-icon">📞</span>
                            <span class="link-text"><?php esc_html_e('Contact Us', 'service-blueprint'); ?></span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Recent services -->
            <?php
            $recent_services = new WP_Query(array(
                'post_type' => 'service',
                'posts_per_page' => 3,
                'post_status' => 'publish'
            ));
            
            if ($recent_services->have_posts()) :
            ?>
            <div class="recent-services">
                <h2><?php esc_html_e('Latest Services', 'service-blueprint'); ?></h2>
                
                <div class="services-preview">
                    <?php while ($recent_services->have_posts()) : $recent_services->the_post(); ?>
                        <article class="service-preview-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="service-preview-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('thumbnail', array('alt' => get_the_title())); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="service-preview-content">
                                <h3 class="service-preview-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                
                                <div class="service-preview-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                </div>
                                
                                <a href="<?php the_permalink(); ?>" class="service-preview-link">
                                    <?php esc_html_e('Learn More', 'service-blueprint'); ?> →
                                </a>
                            </div>
                        </article>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
            <?php endif; ?>
            
            <!-- Back to home button -->
            <div class="error-actions">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary btn-large">
                    <?php esc_html_e('← Back to Homepage', 'service-blueprint'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<style>
/* 404 Page Styles */
.error-404-section {
    padding: 80px 0;
    min-height: 70vh;
    display: flex;
    align-items: center;
}

.error-404-content {
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
}

.error-illustration {
    margin-bottom: 40px;
    position: relative;
}

.error-number {
    font-size: clamp(6rem, 15vw, 12rem);
    font-weight: 900;
    color: #e5e7eb;
    line-height: 1;
    margin-bottom: 20px;
}

.error-icon {
    font-size: 4rem;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 20%, 53%, 80%, 100% {
        transform: translate(-50%, -50%) translateY(0);
    }
    40%, 43% {
        transform: translate(-50%, -50%) translateY(-10px);
    }
    70% {
        transform: translate(-50%, -50%) translateY(-5px);
    }
    90% {
        transform: translate(-50%, -50%) translateY(-2px);
    }
}

.error-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 20px;
}

.error-description {
    font-size: 1.2rem;
    color: #6b7280;
    margin-bottom: 50px;
    line-height: 1.6;
}

.error-search {
    margin-bottom: 60px;
}

.error-search h2 {
    font-size: 1.5rem;
    margin-bottom: 25px;
    color: #374151;
}

.search-input-group {
    display: flex;
    max-width: 500px;
    margin: 0 auto;
    border: 2px solid #e5e7eb;
    border-radius: 50px;
    overflow: hidden;
    transition: border-color 0.3s ease;
}

.search-input-group:focus-within {
    border-color: #2563eb;
}

.search-field {
    flex: 1;
    padding: 15px 25px;
    border: none;
    outline: none;
    font-size: 1.1rem;
    background: white;
}

.search-submit {
    background: #2563eb;
    color: white;
    border: none;
    padding: 15px 25px;
    cursor: pointer;
    transition: background 0.3s ease;
    font-size: 1.2rem;
}

.search-submit:hover {
    background: #1d4ed8;
}

.helpful-links {
    margin-bottom: 60px;
}

.helpful-links h2 {
    font-size: 1.5rem;
    margin-bottom: 30px;
    color: #374151;
}

.links-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    max-width: 600px;
    margin: 0 auto;
}

.helpful-link {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    padding: 25px 20px;
    background: white;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    text-decoration: none;
    color: #374151;
    transition: all 0.3s ease;
}

.helpful-link:hover {
    border-color: #2563eb;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(37, 99, 235, 0.1);
    text-decoration: none;
}

.link-icon {
    font-size: 2rem;
}

.link-text {
    font-weight: 500;
    text-align: center;
}

.recent-services {
    margin-bottom: 60px;
}

.recent-services h2 {
    font-size: 1.5rem;
    margin-bottom: 30px;
    color: #374151;
}

.services-preview {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
}

.service-preview-card {
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.service-preview-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.service-preview-image img {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.service-preview-content {
    padding: 20px;
}

.service-preview-title {
    font-size: 1.1rem;
    margin-bottom: 10px;
}

.service-preview-title a {
    color: #1f2937;
    text-decoration: none;
}

.service-preview-title a:hover {
    color: #2563eb;
}

.service-preview-excerpt {
    color: #6b7280;
    margin-bottom: 15px;
    font-size: 0.95rem;
    line-height: 1.5;
}

.service-preview-link {
    color: #2563eb;
    text-decoration: none;
    font-weight: 500;
    font-size: 0.95rem;
}

.service-preview-link:hover {
    text-decoration: underline;
}

.error-actions {
    margin-top: 40px;
}

.btn-large {
    padding: 15px 30px;
    font-size: 1.1rem;
    border-radius: 30px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .error-404-section {
        padding: 60px 0;
    }
    
    .error-number {
        font-size: 8rem;
    }
    
    .error-icon {
        font-size: 3rem;
    }
    
    .error-title {
        font-size: 2rem;
    }
    
    .error-description {
        font-size: 1.1rem;
    }
    
    .links-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .services-preview {
        grid-template-columns: 1fr;
    }
    
    .search-input-group {
        flex-direction: column;
        border-radius: 12px;
    }
    
    .search-field,
    .search-submit {
        border-radius: 0;
    }
    
    .search-field {
        border-bottom: 1px solid #e5e7eb;
    }
}

@media (max-width: 480px) {
    .links-grid {
        grid-template-columns: 1fr;
    }
    
    .helpful-link {
        padding: 20px 15px;
    }
    
    .error-number {
        font-size: 6rem;
    }
    
    .error-icon {
        font-size: 2.5rem;
    }
}
</style>

<?php get_footer(); ?>
