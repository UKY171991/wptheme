<?php
/**
 * Service Category Archive Template
 * 
 * @package ServiceBlueprint
 */

get_header(); 

$term = get_queried_object();
$category_icon = get_term_meta($term->term_id, 'category_icon', true);
$banner_image = get_term_meta($term->term_id, 'banner_image', true);
?>

<!-- Category Header Banner -->
<section class="category-header" style="background-image: url('<?php echo esc_url($banner_image ?: get_template_directory_uri() . '/images/default-category-banner.jpg'); ?>');">
    <div class="category-header-content">
        <div class="container">
            <!-- Breadcrumb -->
            <nav class="breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb', 'service-blueprint'); ?>">
                <ol class="breadcrumb-list">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'service-blueprint'); ?></a></li>
                    <li><a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>"><?php esc_html_e('Services', 'service-blueprint'); ?></a></li>
                    <li aria-current="page"><?php echo esc_html($term->name); ?></li>
                </ol>
            </nav>
            
            <div class="category-intro">
                <?php if ($category_icon && get_theme_mod('show_category_icons', true)) : ?>
                    <span class="category-icon" aria-hidden="true"><?php echo esc_html($category_icon); ?></span>
                <?php endif; ?>
                
                <h1 class="category-title"><?php echo esc_html($term->name); ?></h1>
                
                <?php if ($term->description) : ?>
                    <p class="category-description"><?php echo esc_html($term->description); ?></p>
                <?php endif; ?>
                
                <div class="category-meta">
                    <span class="service-count">
                        <?php printf(_n('%d service available', '%d services available', $term->count, 'service-blueprint'), $term->count); ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="category-header-overlay"></div>
</section>

<!-- SVG Divider -->
<div class="svg-divider">
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" fill="#ffffff"></path>
    </svg>
</div>

<!-- Services Grid -->
<section class="services-listing" role="main">
    <div class="container">
        <?php if (have_posts()) : ?>
            
            <!-- Filter and Sort Options -->
            <div class="listing-controls">
                <div class="view-options">
                    <button class="view-toggle active" data-view="grid" aria-label="<?php esc_attr_e('Grid view', 'service-blueprint'); ?>">
                        <span class="grid-icon">⊞</span>
                    </button>
                    <button class="view-toggle" data-view="list" aria-label="<?php esc_attr_e('List view', 'service-blueprint'); ?>">
                        <span class="list-icon">☰</span>
                    </button>
                </div>
                
                <div class="sort-options">
                    <label for="sort-services"><?php esc_html_e('Sort by:', 'service-blueprint'); ?></label>
                    <select id="sort-services" name="sort">
                        <option value="title"><?php esc_html_e('Title A-Z', 'service-blueprint'); ?></option>
                        <option value="date"><?php esc_html_e('Newest First', 'service-blueprint'); ?></option>
                        <option value="popular"><?php esc_html_e('Most Popular', 'service-blueprint'); ?></option>
                    </select>
                </div>
            </div>
            
            <div class="services-grid grid-view" id="services-container">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('service-card animated-card'); ?>>
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="service-image">
                                <a href="<?php the_permalink(); ?>" aria-label="<?php printf(esc_attr__('Read more about %s', 'service-blueprint'), get_the_title()); ?>">
                                    <?php the_post_thumbnail('service-thumbnail', array('alt' => get_the_title())); ?>
                                </a>
                                
                                <!-- Service badge if featured -->
                                <?php if (get_post_meta(get_the_ID(), 'featured_service', true)) : ?>
                                    <span class="service-badge featured"><?php esc_html_e('Featured', 'service-blueprint'); ?></span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="service-content">
                            <header class="service-header">
                                <h2 class="service-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                
                                <!-- Service categories -->
                                <div class="service-categories">
                                    <?php
                                    $categories = get_the_terms(get_the_ID(), 'service_category');
                                    if ($categories && !is_wp_error($categories)) :
                                        foreach ($categories as $category) :
                                            if ($category->term_id !== $term->term_id) : // Don't show current category
                                    ?>
                                        <a href="<?php echo esc_url(get_term_link($category)); ?>" class="service-category-tag">
                                            <?php echo esc_html($category->name); ?>
                                        </a>
                                    <?php 
                                            endif;
                                        endforeach; 
                                    endif; ?>
                                </div>
                            </header>
                            
                            <div class="service-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <footer class="service-footer">
                                <!-- Service meta -->
                                <div class="service-meta">
                                    <?php if (get_post_meta(get_the_ID(), 'service_price', true)) : ?>
                                        <span class="service-price">
                                            <?php esc_html_e('From ', 'service-blueprint'); ?>
                                            <?php echo esc_html(get_post_meta(get_the_ID(), 'service_price', true)); ?>
                                        </span>
                                    <?php endif; ?>
                                    
                                    <?php if (get_post_meta(get_the_ID(), 'service_duration', true)) : ?>
                                        <span class="service-duration">
                                            <span class="duration-icon">⏱</span>
                                            <?php echo esc_html(get_post_meta(get_the_ID(), 'service_duration', true)); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="service-actions">
                                    <a href="<?php the_permalink(); ?>" class="service-link btn-primary">
                                        <?php esc_html_e('Learn More', 'service-blueprint'); ?>
                                    </a>
                                    
                                    <?php if (get_post_meta(get_the_ID(), 'quick_quote_enabled', true)) : ?>
                                        <button class="quick-quote-btn" data-service="<?php echo esc_attr(get_the_ID()); ?>">
                                            <?php esc_html_e('Quick Quote', 'service-blueprint'); ?>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </footer>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <!-- Pagination -->
            <nav class="pagination-nav" role="navigation" aria-label="<?php esc_attr_e('Services pagination', 'service-blueprint'); ?>">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('← Previous', 'service-blueprint'),
                    'next_text' => __('Next →', 'service-blueprint'),
                    'screen_reader_text' => __('Services navigation', 'service-blueprint'),
                ));
                ?>
            </nav>
            
        <?php else : ?>
            
            <!-- No services found -->
            <div class="no-services-found">
                <div class="no-services-content">
                    <h2><?php esc_html_e('No services found', 'service-blueprint'); ?></h2>
                    <p><?php esc_html_e('We don\'t have any services in this category yet, but check back soon!', 'service-blueprint'); ?></p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                        <?php esc_html_e('Browse All Categories', 'service-blueprint'); ?>
                    </a>
                </div>
            </div>
            
        <?php endif; ?>
    </div>
</section>

<!-- Related Categories -->
<?php
$related_categories = get_terms(array(
    'taxonomy' => 'service_category',
    'exclude' => array($term->term_id),
    'number' => 6,
    'hide_empty' => true
));

if (!is_wp_error($related_categories) && !empty($related_categories)) :
?>
<section class="related-categories" role="complementary" aria-labelledby="related-title">
    <div class="container">
        <h2 id="related-title" class="section-title"><?php esc_html_e('Explore Other Categories', 'service-blueprint'); ?></h2>
        
        <div class="categories-grid">
            <?php foreach ($related_categories as $category) : 
                $cat_icon = get_term_meta($category->term_id, 'category_icon', true);
            ?>
                <a href="<?php echo esc_url(get_term_link($category)); ?>" class="category-card">
                    <?php if ($cat_icon && get_theme_mod('show_category_icons', true)) : ?>
                        <span class="category-icon" aria-hidden="true"><?php echo esc_html($cat_icon); ?></span>
                    <?php endif; ?>
                    
                    <h3><?php echo esc_html($category->name); ?></h3>
                    <p><?php echo esc_html($category->description); ?></p>
                    
                    <span class="category-count">
                        <?php printf(_n('%d service', '%d services', $category->count, 'service-blueprint'), $category->count); ?>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<style>
/* Category page specific styles */
.category-header {
    position: relative;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 400px;
    display: flex;
    align-items: center;
    color: white;
}

.category-header-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(37, 99, 235, 0.8), rgba(79, 70, 229, 0.6));
    z-index: 1;
}

.category-header-content {
    position: relative;
    z-index: 2;
    width: 100%;
    padding: 60px 0;
}

.breadcrumb {
    margin-bottom: 30px;
}

.breadcrumb-list {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 15px;
    align-items: center;
}

.breadcrumb-list li {
    position: relative;
}

.breadcrumb-list li:not(:last-child)::after {
    content: '→';
    margin-left: 15px;
    opacity: 0.7;
}

.breadcrumb-list a {
    color: rgba(255, 255, 255, 0.9);
    text-decoration: none;
    transition: color 0.3s ease;
}

.breadcrumb-list a:hover {
    color: white;
}

.category-intro {
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
}

.category-icon {
    font-size: 4rem;
    display: block;
    margin-bottom: 20px;
}

.category-title {
    font-size: clamp(2rem, 4vw, 3.5rem);
    font-weight: 700;
    margin-bottom: 20px;
}

.category-description {
    font-size: 1.2rem;
    margin-bottom: 25px;
    opacity: 0.9;
    line-height: 1.6;
}

.category-meta {
    font-size: 1rem;
    opacity: 0.8;
}

.services-listing {
    padding: 80px 0;
}

.listing-controls {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
    flex-wrap: wrap;
    gap: 20px;
}

.view-options {
    display: flex;
    gap: 10px;
}

.view-toggle {
    padding: 10px 15px;
    border: 2px solid #e5e7eb;
    background: white;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 1.1rem;
}

.view-toggle.active,
.view-toggle:hover {
    border-color: #2563eb;
    background: #2563eb;
    color: white;
}

.sort-options {
    display: flex;
    align-items: center;
    gap: 10px;
}

.sort-options select {
    padding: 8px 12px;
    border: 2px solid #e5e7eb;
    border-radius: 6px;
    background: white;
    font-size: 0.95rem;
}

.services-grid.grid-view {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 30px;
}

.services-grid.list-view {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.services-grid.list-view .service-card {
    display: flex;
    align-items: center;
    gap: 20px;
}

.services-grid.list-view .service-image {
    flex-shrink: 0;
    width: 150px;
}

.services-grid.list-view .service-content {
    flex: 1;
}

.animated-card {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.6s ease;
}

.animated-card.animate-in {
    opacity: 1;
    transform: translateY(0);
}

.service-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: #f59e0b;
    color: white;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
}

.service-badge.featured {
    background: #10b981;
}

.service-meta {
    display: flex;
    gap: 15px;
    margin-bottom: 15px;
    font-size: 0.9rem;
    color: #6b7280;
}

.service-price {
    font-weight: 600;
    color: #059669;
}

.service-duration {
    display: flex;
    align-items: center;
    gap: 5px;
}

.service-actions {
    display: flex;
    gap: 10px;
    align-items: center;
}

.quick-quote-btn {
    padding: 8px 16px;
    background: transparent;
    border: 2px solid #2563eb;
    color: #2563eb;
    border-radius: 6px;
    cursor: pointer;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.quick-quote-btn:hover {
    background: #2563eb;
    color: white;
}

.related-categories {
    background: #f9fafb;
    padding: 80px 0;
}

.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
    margin-top: 40px;
}

.category-card {
    background: white;
    padding: 25px;
    border-radius: 12px;
    text-decoration: none;
    color: inherit;
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
    text-align: center;
}

.category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    text-decoration: none;
}

.category-card .category-icon {
    font-size: 2.5rem;
    margin-bottom: 15px;
}

.category-card h3 {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 10px;
    color: #1f2937;
}

.category-card p {
    color: #6b7280;
    margin-bottom: 15px;
    font-size: 0.9rem;
}

.category-count {
    color: #2563eb;
    font-weight: 500;
    font-size: 0.85rem;
}

.no-services-found {
    text-align: center;
    padding: 80px 0;
}

.no-services-content h2 {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #374151;
}

.no-services-content p {
    font-size: 1.1rem;
    color: #6b7280;
    margin-bottom: 30px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .category-header {
        min-height: 300px;
    }
    
    .category-icon {
        font-size: 3rem !important;
    }
    
    .listing-controls {
        flex-direction: column;
        align-items: stretch;
    }
    
    .view-options {
        justify-content: center;
    }
    
    .services-grid.grid-view {
        grid-template-columns: 1fr;
    }
    
    .services-grid.list-view .service-card {
        flex-direction: column;
        text-align: center;
    }
    
    .services-grid.list-view .service-image {
        width: 100%;
    }
    
    .categories-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 480px) {
    .service-actions {
        flex-direction: column;
    }
    
    .service-meta {
        flex-direction: column;
        gap: 8px;
    }
}
</style>

<script>
// Category page functionality
document.addEventListener('DOMContentLoaded', function() {
    // View toggle functionality
    const viewToggles = document.querySelectorAll('.view-toggle');
    const servicesContainer = document.getElementById('services-container');
    
    viewToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const view = this.dataset.view;
            
            // Update active state
            viewToggles.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            
            // Update container class
            servicesContainer.className = `services-grid ${view}-view`;
        });
    });
    
    // Sort functionality
    const sortSelect = document.getElementById('sort-services');
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            const sortBy = this.value;
            const url = new URL(window.location);
            url.searchParams.set('orderby', sortBy);
            window.location = url;
        });
    }
    
    // Quick quote functionality
    const quoteButtons = document.querySelectorAll('.quick-quote-btn');
    quoteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const serviceId = this.dataset.service;
            // Implement quick quote modal or redirect
            console.log('Quick quote for service:', serviceId);
        });
    });
});
</script>

<?php get_footer(); ?>
