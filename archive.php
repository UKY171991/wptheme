<?php get_header(); ?>

<div class="content-section">
    <div class="container">
        <?php if (is_category() || is_tag() || is_archive()) : ?>
            <h1 class="section-title"><?php single_cat_title(); ?></h1>
        <?php elseif (is_search()) : ?>
            <h1 class="section-title">Search Results for: "<?php echo get_search_query(); ?>"</h1>
        <?php else : ?>
            <h1 class="section-title">Blog Posts</h1>
        <?php endif; ?>
        
        <?php if (have_posts()) : ?>
            <div class="posts-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="post-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('service-thumbnail'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="post-content">
                            <h3 class="post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            
                            <div class="post-meta">
                                <span class="post-date"><?php echo get_the_date(); ?></span>
                                <?php if (get_post_type() == 'post') : ?>
                                    <span class="post-category"><?php the_category(', '); ?></span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="post-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                        </div>
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
            <div class="no-posts">
                <h2>No posts found</h2>
                <p>Sorry, no posts were found. Try searching for something else.</p>
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<style>
.posts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.post-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.post-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.post-thumbnail img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.post-content {
    padding: 1.5rem;
}

.post-title a {
    color: #333;
    text-decoration: none;
    font-size: 1.3rem;
    font-weight: bold;
}

.post-title a:hover {
    color: #667eea;
}

.post-meta {
    color: #666;
    font-size: 0.9rem;
    margin: 0.5rem 0;
}

.post-excerpt {
    margin: 1rem 0;
    line-height: 1.6;
}

.read-more {
    color: #667eea;
    text-decoration: none;
    font-weight: bold;
}

.read-more:hover {
    color: #f1c40f;
}

.pagination {
    text-align: center;
    margin: 2rem 0;
}

.pagination a, .pagination span {
    display: inline-block;
    padding: 0.5rem 1rem;
    margin: 0 0.25rem;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-decoration: none;
}

.pagination a:hover {
    background: #667eea;
    color: white;
}

.pagination .current {
    background: #667eea;
    color: white;
}

.no-posts {
    text-align: center;
    padding: 3rem 0;
}
</style>

<?php get_footer(); ?>
