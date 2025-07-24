<?php
/**
 * Search Results Template
 * 
 * @package ServiceBlueprint
 */

get_header(); ?>

<section class="search-results-header">
    <div class="container">
        <div class="search-header-content">
            <?php if (have_posts()) : ?>
                <h1 class="search-title">
                    <?php
                    printf(
                        esc_html__('Search Results for: %s', 'service-blueprint'),
                        '<span class="search-query">"' . get_search_query() . '"</span>'
                    );
                    ?>
                </h1>
                <p class="search-description">
                    <?php
                    global $wp_query;
                    $total_results = $wp_query->found_posts;
                    printf(
                        _n('Found %d result', 'Found %d results', $total_results, 'service-blueprint'),
                        $total_results
                    );
                    ?>
                </p>
            <?php else : ?>
                <h1 class="search-title">
                    <?php
                    printf(
                        esc_html__('No results for: %s', 'service-blueprint'),
                        '<span class="search-query">"' . get_search_query() . '"</span>'
                    );
                    ?>
                </h1>
                <p class="search-description">
                    <?php esc_html_e('Sorry, no results were found. Please try a different search term.', 'service-blueprint'); ?>
                </p>
            <?php endif; ?>
            
            <!-- Search form -->
            <form role="search" method="get" class="search-form-header" action="<?php echo esc_url(home_url('/')); ?>">
                <div class="search-input-group">
                    <input type="search" 
                           class="search-field" 
                           placeholder="<?php esc_attr_e('Try a different search...', 'service-blueprint'); ?>" 
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
    </div>
</section>

<section class="search-results-content" role="main">
    <div class="container">
        
        <?php if (have_posts()) : ?>
            
            <!-- Search filters -->
            <div class="search-filters">
                <div class="filter-group">
                    <label for="search-filter"><?php esc_html_e('Filter by:', 'service-blueprint'); ?></label>
                    <select id="search-filter" class="filter-select">
                        <option value="all" <?php selected(get_query_var('post_type'), ''); ?>>
                            <?php esc_html_e('All Content', 'service-blueprint'); ?>
                        </option>
                        <option value="service" <?php selected(get_query_var('post_type'), 'service'); ?>>
                            <?php esc_html_e('Services Only', 'service-blueprint'); ?>
                        </option>
                        <option value="page" <?php selected(get_query_var('post_type'), 'page'); ?>>
                            <?php esc_html_e('Pages Only', 'service-blueprint'); ?>
                        </option>
                        <option value="post" <?php selected(get_query_var('post_type'), 'post'); ?>>
                            <?php esc_html_e('Blog Posts Only', 'service-blueprint'); ?>
                        </option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="search-sort"><?php esc_html_e('Sort by:', 'service-blueprint'); ?></label>
                    <select id="search-sort" class="filter-select">
                        <option value="relevance" <?php selected(get_query_var('orderby'), ''); ?>>
                            <?php esc_html_e('Relevance', 'service-blueprint'); ?>
                        </option>
                        <option value="date" <?php selected(get_query_var('orderby'), 'date'); ?>>
                            <?php esc_html_e('Newest First', 'service-blueprint'); ?>
                        </option>
                        <option value="title" <?php selected(get_query_var('orderby'), 'title'); ?>>
                            <?php esc_html_e('Title A-Z', 'service-blueprint'); ?>
                        </option>
                    </select>
                </div>
            </div>
            
            <div class="search-results-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('search-result-item'); ?>>
                        
                        <!-- Post type indicator -->
                        <div class="result-type">
                            <?php
                            $post_type = get_post_type();
                            switch ($post_type) {
                                case 'service':
                                    echo '<span class="type-badge service">🛠️ ' . esc_html__('Service', 'service-blueprint') . '</span>';
                                    break;
                                case 'page':
                                    echo '<span class="type-badge page">📄 ' . esc_html__('Page', 'service-blueprint') . '</span>';
                                    break;
                                case 'post':
                                    echo '<span class="type-badge post">📝 ' . esc_html__('Blog Post', 'service-blueprint') . '</span>';
                                    break;
                                default:
                                    echo '<span class="type-badge default">📋 ' . esc_html(get_post_type_object($post_type)->labels->singular_name) . '</span>';
                            }
                            ?>
                        </div>
                        
                        <div class="result-content">
                            <header class="result-header">
                                <h2 class="result-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                
                                <!-- Post meta -->
                                <div class="result-meta">
                                    <?php if (get_post_type() === 'service') : ?>
                                        <?php
                                        $service_categories = get_the_terms(get_the_ID(), 'service_category');
                                        if ($service_categories && !is_wp_error($service_categories)) :
                                        ?>
                                            <div class="result-categories">
                                                <?php foreach ($service_categories as $category) : ?>
                                                    <a href="<?php echo esc_url(get_term_link($category)); ?>" class="category-tag">
                                                        <?php echo esc_html($category->name); ?>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if (get_post_meta(get_the_ID(), 'service_price', true)) : ?>
                                            <span class="result-price">
                                                <?php esc_html_e('From', 'service-blueprint'); ?>
                                                <strong><?php echo esc_html(get_post_meta(get_the_ID(), 'service_price', true)); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <span class="result-date">
                                            <?php echo get_the_date(); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </header>
                            
                            <!-- Thumbnail -->
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="result-thumbnail">
                                    <a href="<?php the_permalink(); ?>" aria-label="<?php printf(esc_attr__('Read more about %s', 'service-blueprint'), get_the_title()); ?>">
                                        <?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Excerpt with search term highlighting -->
                            <div class="result-excerpt">
                                <?php
                                $excerpt = get_the_excerpt();
                                $search_query = get_search_query();
                                
                                if ($search_query) {
                                    $highlighted_excerpt = preg_replace(
                                        '/(' . preg_quote($search_query, '/') . ')/i',
                                        '<mark>$1</mark>',
                                        $excerpt
                                    );
                                    echo $highlighted_excerpt;
                                } else {
                                    echo $excerpt;
                                }
                                ?>
                            </div>
                            
                            <footer class="result-footer">
                                <a href="<?php the_permalink(); ?>" class="result-link">
                                    <?php 
                                    if (get_post_type() === 'service') {
                                        esc_html_e('View Service', 'service-blueprint');
                                    } else {
                                        esc_html_e('Read More', 'service-blueprint');
                                    }
                                    ?>
                                    <span class="link-arrow">→</span>
                                </a>
                            </footer>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <!-- Pagination -->
            <nav class="search-pagination" role="navigation" aria-label="<?php esc_attr_e('Search results pagination', 'service-blueprint'); ?>">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('← Previous', 'service-blueprint'),
                    'next_text' => __('Next →', 'service-blueprint'),
                    'screen_reader_text' => __('Search results navigation', 'service-blueprint'),
                ));
                ?>
            </nav>
            
        <?php else : ?>
            
            <!-- No results found -->
            <div class="no-search-results">
                <div class="no-results-content">
                    <div class="no-results-icon">🔍</div>
                    <h2><?php esc_html_e('No results found', 'service-blueprint'); ?></h2>
                    <p><?php esc_html_e('We couldn\'t find anything matching your search. Here are some suggestions:', 'service-blueprint'); ?></p>
                    
                    <ul class="search-suggestions">
                        <li><?php esc_html_e('Check your spelling', 'service-blueprint'); ?></li>
                        <li><?php esc_html_e('Try different keywords', 'service-blueprint'); ?></li>
                        <li><?php esc_html_e('Use more general terms', 'service-blueprint'); ?></li>
                        <li><?php esc_html_e('Browse our service categories below', 'service-blueprint'); ?></li>
                    </ul>
                    
                    <!-- Popular service categories -->
                    <?php
                    $popular_categories = get_terms(array(
                        'taxonomy' => 'service_category',
                        'orderby' => 'count',
                        'order' => 'DESC',
                        'number' => 6,
                        'hide_empty' => true
                    ));
                    
                    if (!is_wp_error($popular_categories) && !empty($popular_categories)) :
                    ?>
                    <div class="popular-categories">
                        <h3><?php esc_html_e('Popular Service Categories', 'service-blueprint'); ?></h3>
                        <div class="categories-grid">
                            <?php foreach ($popular_categories as $category) : 
                                $icon = get_term_meta($category->term_id, 'category_icon', true);
                            ?>
                                <a href="<?php echo esc_url(get_term_link($category)); ?>" class="category-card">
                                    <?php if ($icon) : ?>
                                        <span class="category-icon"><?php echo esc_html($icon); ?></span>
                                    <?php endif; ?>
                                    <span class="category-name"><?php echo esc_html($category->name); ?></span>
                                    <span class="category-count">
                                        <?php printf(_n('%d service', '%d services', $category->count, 'service-blueprint'), $category->count); ?>
                                    </span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="no-results-actions">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                            <?php esc_html_e('Go to Homepage', 'service-blueprint'); ?>
                        </a>
                        <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="btn btn-secondary">
                            <?php esc_html_e('Browse All Services', 'service-blueprint'); ?>
                        </a>
                    </div>
                </div>
            </div>
            
        <?php endif; ?>
    </div>
</section>

<style>
/* Search Results Styles */
.search-results-header {
    background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
    padding: 60px 0;
    text-align: center;
}

.search-title {
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 700;
    margin-bottom: 15px;
    color: #1f2937;
}

.search-query {
    color: #2563eb;
}

.search-description {
    font-size: 1.1rem;
    color: #6b7280;
    margin-bottom: 30px;
}

.search-form-header {
    max-width: 500px;
    margin: 0 auto;
}

.search-input-group {
    display: flex;
    border: 2px solid #d1d5db;
    border-radius: 25px;
    overflow: hidden;
    background: white;
    transition: border-color 0.3s ease;
}

.search-input-group:focus-within {
    border-color: #2563eb;
}

.search-field {
    flex: 1;
    padding: 12px 20px;
    border: none;
    outline: none;
    font-size: 1rem;
}

.search-submit {
    background: #2563eb;
    color: white;
    border: none;
    padding: 12px 20px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.search-submit:hover {
    background: #1d4ed8;
}

.search-results-content {
    padding: 60px 0;
}

.search-filters {
    display: flex;
    gap: 20px;
    margin-bottom: 40px;
    align-items: end;
    flex-wrap: wrap;
}

.filter-group {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.filter-group label {
    font-size: 0.9rem;
    font-weight: 500;
    color: #374151;
}

.filter-select {
    padding: 8px 12px;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    background: white;
    font-size: 0.95rem;
    cursor: pointer;
}

.search-results-grid {
    display: grid;
    gap: 30px;
}

.search-result-item {
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease;
    display: grid;
    grid-template-columns: auto 1fr;
    gap: 20px;
    padding: 25px;
}

.search-result-item:hover {
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    transform: translateY(-2px);
}

.result-type {
    display: flex;
    align-items: flex-start;
}

.type-badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    white-space: nowrap;
}

.type-badge.service {
    background: #dbeafe;
    color: #1d4ed8;
}

.type-badge.page {
    background: #f3e8ff;
    color: #7c3aed;
}

.type-badge.post {
    background: #ecfdf5;
    color: #059669;
}

.type-badge.default {
    background: #f3f4f6;
    color: #374151;
}

.result-content {
    flex: 1;
}

.result-header {
    margin-bottom: 15px;
}

.result-title {
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 10px;
}

.result-title a {
    color: #1f2937;
    text-decoration: none;
}

.result-title a:hover {
    color: #2563eb;
}

.result-meta {
    display: flex;
    gap: 15px;
    align-items: center;
    flex-wrap: wrap;
}

.result-categories {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.category-tag {
    background: #f3f4f6;
    color: #374151;
    padding: 3px 10px;
    border-radius: 12px;
    text-decoration: none;
    font-size: 0.8rem;
    font-weight: 500;
    transition: background 0.3s ease;
}

.category-tag:hover {
    background: #e5e7eb;
    text-decoration: none;
}

.result-price {
    color: #059669;
    font-weight: 600;
    font-size: 0.9rem;
}

.result-date {
    color: #6b7280;
    font-size: 0.9rem;
}

.result-thumbnail {
    float: left;
    margin: 0 20px 15px 0;
    max-width: 150px;
}

.result-thumbnail img {
    width: 100%;
    height: auto;
    border-radius: 8px;
}

.result-excerpt {
    color: #374151;
    line-height: 1.6;
    margin-bottom: 20px;
}

.result-excerpt mark {
    background: #fef3c7;
    color: #92400e;
    padding: 1px 3px;
    border-radius: 3px;
}

.result-footer {
    clear: both;
}

.result-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #2563eb;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.result-link:hover {
    color: #1d4ed8;
    text-decoration: none;
}

.link-arrow {
    transition: transform 0.3s ease;
}

.result-link:hover .link-arrow {
    transform: translateX(3px);
}

.search-pagination {
    margin-top: 50px;
    text-align: center;
}

/* No Results Styles */
.no-search-results {
    text-align: center;
    padding: 40px 0;
}

.no-results-icon {
    font-size: 4rem;
    margin-bottom: 20px;
    opacity: 0.5;
}

.no-results-content h2 {
    font-size: 1.8rem;
    margin-bottom: 15px;
    color: #374151;
}

.no-results-content p {
    font-size: 1.1rem;
    color: #6b7280;
    margin-bottom: 25px;
}

.search-suggestions {
    text-align: left;
    max-width: 400px;
    margin: 0 auto 40px;
    padding: 0;
    list-style: none;
}

.search-suggestions li {
    padding: 8px 0;
    color: #6b7280;
    position: relative;
    padding-left: 25px;
}

.search-suggestions li::before {
    content: '•';
    color: #2563eb;
    font-weight: bold;
    position: absolute;
    left: 0;
}

.popular-categories {
    margin: 40px 0;
}

.popular-categories h3 {
    font-size: 1.3rem;
    margin-bottom: 25px;
    color: #374151;
}

.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    max-width: 600px;
    margin: 0 auto;
}

.category-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    padding: 20px 15px;
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    text-decoration: none;
    color: inherit;
    transition: all 0.3s ease;
}

.category-card:hover {
    border-color: #2563eb;
    transform: translateY(-2px);
    text-decoration: none;
}

.category-icon {
    font-size: 1.5rem;
}

.category-name {
    font-weight: 500;
    color: #1f2937;
}

.category-count {
    font-size: 0.8rem;
    color: #6b7280;
}

.no-results-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
    margin-top: 30px;
    flex-wrap: wrap;
}

/* Responsive Design */
@media (max-width: 768px) {
    .search-result-item {
        grid-template-columns: 1fr;
        gap: 15px;
        padding: 20px;
    }
    
    .result-type {
        justify-content: center;
    }
    
    .result-thumbnail {
        float: none;
        margin: 0 0 15px 0;
        max-width: 100%;
    }
    
    .search-filters {
        flex-direction: column;
        align-items: stretch;
    }
    
    .filter-group {
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }
    
    .categories-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .no-results-actions {
        flex-direction: column;
        align-items: center;
    }
}

@media (max-width: 480px) {
    .categories-grid {
        grid-template-columns: 1fr;
    }
    
    .result-meta {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
    
    .search-input-group {
        flex-direction: column;
        border-radius: 12px;
    }
    
    .search-field,
    .search-submit {
        border-radius: 0;
    }
}
</style>

<script>
// Search page functionality
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterSelect = document.getElementById('search-filter');
    const sortSelect = document.getElementById('search-sort');
    
    if (filterSelect) {
        filterSelect.addEventListener('change', function() {
            updateSearchUrl();
        });
    }
    
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            updateSearchUrl();
        });
    }
    
    function updateSearchUrl() {
        const url = new URL(window.location);
        const filterValue = filterSelect ? filterSelect.value : '';
        const sortValue = sortSelect ? sortSelect.value : '';
        
        if (filterValue && filterValue !== 'all') {
            url.searchParams.set('post_type', filterValue);
        } else {
            url.searchParams.delete('post_type');
        }
        
        if (sortValue && sortValue !== 'relevance') {
            url.searchParams.set('orderby', sortValue);
        } else {
            url.searchParams.delete('orderby');
        }
        
        window.location = url;
    }
});
</script>

<?php get_footer(); ?>
