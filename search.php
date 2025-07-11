<?php get_header(); ?>

<div class="content-section">
    <div class="container">
        <h1 class="section-title">Search Results</h1>
        
        <?php if (have_posts()) : ?>
            <p class="search-results-info">
                Search results for: <strong>"<?php echo get_search_query(); ?>"</strong>
                (<?php echo $wp_query->found_posts; ?> results found)
            </p>
            
            <div class="search-results">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="search-result-item">
                        <h3 class="result-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        
                        <div class="result-meta">
                            <span class="result-type"><?php echo get_post_type(); ?></span>
                            <span class="result-date"><?php echo get_the_date(); ?></span>
                        </div>
                        
                        <div class="result-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <a href="<?php the_permalink(); ?>" class="result-link">Read More →</a>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <!-- Pagination -->
            <div class="pagination">
                <?php
                echo paginate_links(array(
                    'prev_text' => __('« Previous'),
                    'next_text' => __('Next »'),
                ));
                ?>
            </div>
            
        <?php else : ?>
            <div class="no-results">
                <h2>No results found</h2>
                <p>Sorry, no results were found for "<strong><?php echo get_search_query(); ?></strong>". Try searching for something else.</p>
                
                <div class="search-suggestions">
                    <h3>Search Suggestions:</h3>
                    <ul>
                        <li>Try different keywords</li>
                        <li>Check your spelling</li>
                        <li>Use more general terms</li>
                        <li>Try searching for "party rentals", "wedding services", or "event planning"</li>
                    </ul>
                </div>
                
                <?php get_search_form(); ?>
                
                <div class="popular-services mt-4">
                    <h3>Popular Services:</h3>
                    <div class="service-links">
                        <a href="<?php echo home_url('/services'); ?>" class="btn btn-primary">Our Services</a>
                        <a href="<?php echo home_url('/contact'); ?>" class="btn btn-secondary">Contact Us</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<style>
.search-results-info {
    background: #f8f9fa;
    padding: 1rem;
    border-radius: 8px;
    margin-bottom: 2rem;
    color: #666;
}

.search-results {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.search-result-item {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.search-result-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.result-title a {
    color: #333;
    text-decoration: none;
    font-size: 1.5rem;
    font-weight: bold;
}

.result-title a:hover {
    color: #667eea;
}

.result-meta {
    display: flex;
    gap: 1rem;
    margin: 0.5rem 0 1rem;
    font-size: 0.9rem;
    color: #666;
}

.result-type {
    background: #667eea;
    color: white;
    padding: 0.25rem 0.5rem;
    border-radius: 12px;
    font-size: 0.8rem;
    text-transform: capitalize;
}

.result-excerpt {
    color: #666;
    line-height: 1.6;
    margin-bottom: 1rem;
}

.result-link {
    color: #667eea;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

.result-link:hover {
    color: #f1c40f;
}

.no-results {
    text-align: center;
    padding: 3rem 0;
}

.no-results h2 {
    color: #333;
    margin-bottom: 1rem;
}

.search-suggestions {
    background: #f8f9fa;
    padding: 2rem;
    border-radius: 15px;
    margin: 2rem 0;
    text-align: left;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}

.search-suggestions h3 {
    color: #333;
    margin-bottom: 1rem;
}

.search-suggestions ul {
    list-style-position: inside;
    color: #666;
}

.search-suggestions li {
    margin-bottom: 0.5rem;
}

.popular-services h3 {
    margin-bottom: 1rem;
    color: #333;
}

.service-links {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.pagination {
    text-align: center;
    margin: 3rem 0;
}

.pagination a, .pagination span {
    display: inline-block;
    padding: 0.75rem 1rem;
    margin: 0 0.25rem;
    border: 1px solid #ddd;
    border-radius: 8px;
    text-decoration: none;
    color: #666;
    transition: all 0.3s ease;
}

.pagination a:hover {
    background: #667eea;
    color: white;
    border-color: #667eea;
}

.pagination .current {
    background: #667eea;
    color: white;
    border-color: #667eea;
}

@media (max-width: 768px) {
    .result-meta {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .service-links {
        flex-direction: column;
        align-items: center;
    }
    
    .service-links .btn {
        width: 200px;
    }
}
</style>

<?php get_footer(); ?>
