<?php
/**
 * Archive template for services
 * 
 * @package ServiceBlueprint
 */

get_header(); ?>

<!-- Services Archive Header -->
<section class="archive-header services-archive-header">
    <div class="container">
        <div class="archive-header-content">
            <h1 class="archive-title"><?php esc_html_e('Our Services', 'service-blueprint'); ?></h1>
            <p class="archive-description">
                <?php esc_html_e('Discover our comprehensive range of professional services designed to meet your needs.', 'service-blueprint'); ?>
            </p>
            
            <!-- Service Categories Filter -->
            <div class="services-filter">
                <button class="filter-btn active" data-filter="*">
                    <?php esc_html_e('All Services', 'service-blueprint'); ?>
                </button>
                
                <?php
                $categories = get_terms(array(
                    'taxonomy' => 'service_category',
                    'hide_empty' => true
                ));
                
                if (!is_wp_error($categories) && !empty($categories)) :
                    foreach ($categories as $category) :
                        $icon = get_term_meta($category->term_id, 'category_icon', true);
                ?>
                    <button class="filter-btn" data-filter=".category-<?php echo esc_attr($category->slug); ?>">
                        <?php if ($icon) : ?>
                            <span class="filter-icon"><?php echo esc_html($icon); ?></span>
                        <?php endif; ?>
                        <?php echo esc_html($category->name); ?>
                    </button>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section class="services-archive" role="main">
    <div class="container">
        
        <?php if (have_posts()) : ?>
            
            <!-- Sorting and View Options -->
            <div class="archive-controls">
                <div class="results-count">
                    <?php
                    global $wp_query;
                    $total_posts = $wp_query->found_posts;
                    printf(_n('%d service found', '%d services found', $total_posts, 'service-blueprint'), $total_posts);
                    ?>
                </div>
                
                <div class="archive-options">
                    <div class="view-toggle">
                        <button class="view-btn active" data-view="grid" aria-label="<?php esc_attr_e('Grid view', 'service-blueprint'); ?>">
                            <span class="grid-icon">⊞</span>
                        </button>
                        <button class="view-btn" data-view="list" aria-label="<?php esc_attr_e('List view', 'service-blueprint'); ?>">
                            <span class="list-icon">☰</span>
                        </button>
                    </div>
                    
                    <select class="sort-select" id="services-sort">
                        <option value="title" <?php selected(get_query_var('orderby'), 'title'); ?>>
                            <?php esc_html_e('Title A-Z', 'service-blueprint'); ?>
                        </option>
                        <option value="date" <?php selected(get_query_var('orderby'), 'date'); ?>>
                            <?php esc_html_e('Newest First', 'service-blueprint'); ?>
                        </option>
                        <option value="menu_order" <?php selected(get_query_var('orderby'), 'menu_order'); ?>>
                            <?php esc_html_e('Featured First', 'service-blueprint'); ?>
                        </option>
                    </select>
                </div>
            </div>
            
            <div class="services-grid grid-view" id="services-container">
                <?php while (have_posts()) : the_post();
                    $service_categories = get_the_terms(get_the_ID(), 'service_category');
                    $category_classes = '';
                    
                    if ($service_categories && !is_wp_error($service_categories)) {
                        foreach ($service_categories as $category) {
                            $category_classes .= ' category-' . $category->slug;
                        }
                    }
                ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('service-item' . $category_classes); ?>>
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="service-image">
                                <a href="<?php the_permalink(); ?>" aria-label="<?php printf(esc_attr__('Read more about %s', 'service-blueprint'), get_the_title()); ?>">
                                    <?php the_post_thumbnail('service-thumbnail', array('alt' => get_the_title())); ?>
                                </a>
                                
                                <?php if (get_post_meta(get_the_ID(), 'featured_service', true)) : ?>
                                    <span class="service-badge featured"><?php esc_html_e('Featured', 'service-blueprint'); ?></span>
                                <?php endif; ?>
                                
                                <div class="service-overlay">
                                    <a href="<?php the_permalink(); ?>" class="service-quick-view">
                                        <?php esc_html_e('View Details', 'service-blueprint'); ?>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <div class="service-content">
                            <header class="service-header">
                                <?php if ($service_categories && !is_wp_error($service_categories)) : ?>
                                    <div class="service-categories">
                                        <?php foreach ($service_categories as $category) : 
                                            $icon = get_term_meta($category->term_id, 'category_icon', true);
                                        ?>
                                            <a href="<?php echo esc_url(get_term_link($category)); ?>" class="service-category-tag">
                                                <?php if ($icon) : ?>
                                                    <span class="category-icon"><?php echo esc_html($icon); ?></span>
                                                <?php endif; ?>
                                                <?php echo esc_html($category->name); ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                
                                <h2 class="service-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                            </header>
                            
                            <div class="service-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <footer class="service-footer">
                                <div class="service-meta">
                                    <?php if (get_post_meta(get_the_ID(), 'service_price', true)) : ?>
                                        <span class="service-price">
                                            <?php esc_html_e('From', 'service-blueprint'); ?>
                                            <strong><?php echo esc_html(get_post_meta(get_the_ID(), 'service_price', true)); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                    
                                    <?php if (get_post_meta(get_the_ID(), 'service_duration', true)) : ?>
                                        <span class="service-duration">
                                            <span class="duration-icon">⏱</span>
                                            <?php echo esc_html(get_post_meta(get_the_ID(), 'service_duration', true)); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                
                                <a href="<?php the_permalink(); ?>" class="service-link">
                                    <?php esc_html_e('Learn More', 'service-blueprint'); ?>
                                    <span class="link-arrow">→</span>
                                </a>
                            </footer>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <!-- Pagination -->
            <nav class="archive-pagination" role="navigation" aria-label="<?php esc_attr_e('Services pagination', 'service-blueprint'); ?>">
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
                    <p><?php esc_html_e('We don\'t have any services yet, but check back soon!', 'service-blueprint'); ?></p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                        <?php esc_html_e('Go Home', 'service-blueprint'); ?>
                    </a>
                </div>
            </div>
            
        <?php endif; ?>
    </div>
</section>

<style>
/* Services Archive Styles */
.services-archive-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 80px 0;
    text-align: center;
}

.archive-title {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 700;
    margin-bottom: 20px;
}

.archive-description {
    font-size: 1.2rem;
    margin-bottom: 40px;
    opacity: 0.9;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.services-filter {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: center;
    margin-top: 30px;
}

.filter-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.2);
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.3);
    padding: 10px 20px;
    border-radius: 25px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 500;
    backdrop-filter: blur(10px);
}

.filter-btn:hover,
.filter-btn.active {
    background: white;
    color: #667eea;
    border-color: white;
}

.filter-icon {
    font-size: 1rem;
}

.services-archive {
    padding: 80px 0;
}

.archive-controls {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
    flex-wrap: wrap;
    gap: 20px;
}

.results-count {
    font-weight: 500;
    color: #6b7280;
}

.archive-options {
    display: flex;
    align-items: center;
    gap: 20px;
}

.view-toggle {
    display: flex;
    gap: 5px;
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    overflow: hidden;
}

.view-btn {
    padding: 10px 15px;
    background: white;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 1.1rem;
}

.view-btn.active,
.view-btn:hover {
    background: #2563eb;
    color: white;
}

.sort-select {
    padding: 10px 15px;
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    background: white;
    font-size: 0.95rem;
    cursor: pointer;
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

.services-grid.list-view .service-item {
    display: flex;
    align-items: center;
    gap: 20px;
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 20px;
    transition: all 0.3s ease;
}

.services-grid.list-view .service-item:hover {
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    transform: translateY(-2px);
}

.services-grid.list-view .service-image {
    flex-shrink: 0;
    width: 150px;
}

.services-grid.list-view .service-content {
    flex: 1;
}

.service-item {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.6s ease forwards;
}

.service-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.service-item:nth-child(1) { animation-delay: 0.1s; }
.service-item:nth-child(2) { animation-delay: 0.2s; }
.service-item:nth-child(3) { animation-delay: 0.3s; }
.service-item:nth-child(4) { animation-delay: 0.4s; }
.service-item:nth-child(5) { animation-delay: 0.5s; }
.service-item:nth-child(6) { animation-delay: 0.6s; }

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.service-image {
    position: relative;
    overflow: hidden;
}

.service-image img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.service-item:hover .service-image img {
    transform: scale(1.05);
}

.service-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: #f59e0b;
    color: white;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
}

.service-badge.featured {
    background: #10b981;
}

.service-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(37, 99, 235, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.service-item:hover .service-overlay {
    opacity: 1;
}

.service-quick-view {
    color: white;
    text-decoration: none;
    font-weight: 600;
    padding: 12px 24px;
    border: 2px solid white;
    border-radius: 25px;
    transition: all 0.3s ease;
}

.service-quick-view:hover {
    background: white;
    color: #2563eb;
    text-decoration: none;
}

.service-content {
    padding: 25px;
}

.service-categories {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 15px;
}

.service-category-tag {
    display: flex;
    align-items: center;
    gap: 5px;
    background: #f3f4f6;
    color: #374151;
    padding: 4px 12px;
    border-radius: 20px;
    text-decoration: none;
    font-size: 0.8rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.service-category-tag:hover {
    background: #e5e7eb;
    text-decoration: none;
}

.service-title {
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 15px;
}

.service-title a {
    color: #1f2937;
    text-decoration: none;
}

.service-title a:hover {
    color: #2563eb;
}

.service-excerpt {
    color: #6b7280;
    margin-bottom: 20px;
    line-height: 1.6;
}

.service-footer {
    border-top: 1px solid #f3f4f6;
    padding-top: 20px;
}

.service-meta {
    display: flex;
    gap: 15px;
    margin-bottom: 15px;
    font-size: 0.9rem;
}

.service-price {
    color: #059669;
    font-weight: 600;
}

.service-duration {
    display: flex;
    align-items: center;
    gap: 5px;
    color: #6b7280;
}

.service-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #2563eb;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.service-link:hover {
    color: #1d4ed8;
    text-decoration: none;
}

.link-arrow {
    transition: transform 0.3s ease;
}

.service-link:hover .link-arrow {
    transform: translateX(5px);
}

.archive-pagination {
    margin-top: 60px;
    text-align: center;
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
    .services-filter {
        flex-direction: column;
        align-items: center;
    }
    
    .filter-btn {
        width: 250px;
        justify-content: center;
    }
    
    .archive-controls {
        flex-direction: column;
        align-items: stretch;
    }
    
    .archive-options {
        justify-content: space-between;
    }
    
    .services-grid.grid-view {
        grid-template-columns: 1fr;
    }
    
    .services-grid.list-view .service-item {
        flex-direction: column;
        text-align: center;
    }
    
    .services-grid.list-view .service-image {
        width: 100%;
    }
}

@media (max-width: 480px) {
    .service-meta {
        flex-direction: column;
        gap: 8px;
    }
    
    .archive-options {
        flex-direction: column;
        gap: 15px;
    }
}
</style>

<script>
// Services archive functionality
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterBtns = document.querySelectorAll('.filter-btn');
    const serviceItems = document.querySelectorAll('.service-item');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.dataset.filter;
            
            // Update active state
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Filter items
            serviceItems.forEach(item => {
                if (filter === '*' || item.classList.contains(filter.substring(1))) {
                    item.style.display = 'block';
                    item.style.animation = 'fadeInUp 0.6s ease forwards';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
    
    // View toggle functionality
    const viewBtns = document.querySelectorAll('.view-btn');
    const servicesContainer = document.getElementById('services-container');
    
    viewBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const view = this.dataset.view;
            
            // Update active state
            viewBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Update container class
            servicesContainer.className = `services-grid ${view}-view`;
        });
    });
    
    // Sort functionality
    const sortSelect = document.getElementById('services-sort');
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            const sortBy = this.value;
            const url = new URL(window.location);
            url.searchParams.set('orderby', sortBy);
            window.location = url;
        });
    }
});
</script>

<?php get_footer(); ?>
