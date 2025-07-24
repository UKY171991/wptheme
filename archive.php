<?php
/**
 * Template for displaying archive pages
 *
 * @package ServiceBlueprint
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
    <div class="container">
        <header class="page-header">
            <?php
            the_archive_title('<h1 class="page-title">', '</h1>');
            the_archive_description('<div class="archive-description">', '</div>');
            ?>
        </header>

        <?php if (have_posts()) : ?>
            <div class="posts-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="post-content">
                            <div class="post-meta">
                                <span class="post-date">
                                    <i class="fas fa-calendar" aria-hidden="true"></i>
                                    <?php echo get_the_date(); ?>
                                </span>
                                
                                <?php if (get_the_category()) : ?>
                                    <span class="post-categories">
                                        <i class="fas fa-folder" aria-hidden="true"></i>
                                        <?php the_category(', '); ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <header class="entry-header">
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                </h2>
                            </header>

                            <div class="entry-summary">
                                <?php the_excerpt(); ?>
                            </div>

                            <footer class="entry-footer">
                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    <?php esc_html_e('Read More', 'service-blueprint'); ?>
                                    <i class="fas fa-arrow-right" aria-hidden="true"></i>
                                </a>
                                
                                <?php if (get_the_author()) : ?>
                                    <span class="post-author">
                                        <i class="fas fa-user" aria-hidden="true"></i>
                                        <?php the_author(); ?>
                                    </span>
                                <?php endif; ?>
                            </footer>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php
            // Pagination
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => __('Previous', 'service-blueprint'),
                'next_text' => __('Next', 'service-blueprint'),
            ));
            ?>

        <?php else : ?>
            <div class="no-posts">
                <h2><?php esc_html_e('Nothing here', 'service-blueprint'); ?></h2>
                <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'service-blueprint'); ?></p>
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<style>
.page-header {
    text-align: center;
    margin-bottom: 50px;
    padding: 40px 20px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 8px;
}

.page-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 15px;
}

.archive-description {
    font-size: 1.1rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
}

.posts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 30px;
    margin-bottom: 50px;
}

.post-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
}

.post-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.post-thumbnail {
    position: relative;
    overflow: hidden;
}

.post-thumbnail img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.post-card:hover .post-thumbnail img {
    transform: scale(1.05);
}

.post-content {
    padding: 25px;
}

.post-meta {
    display: flex;
    gap: 15px;
    margin-bottom: 15px;
    font-size: 0.9rem;
    color: #6b7280;
    flex-wrap: wrap;
}

.post-meta span {
    display: flex;
    align-items: center;
    gap: 5px;
}

.post-meta i {
    font-size: 0.8rem;
}

.post-meta a {
    color: #6b7280;
    text-decoration: none;
}

.post-meta a:hover {
    color: #2563eb;
}

.entry-title {
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 15px;
}

.entry-title a {
    color: #1f2937;
    text-decoration: none;
    transition: color 0.3s ease;
}

.entry-title a:hover {
    color: #2563eb;
}

.entry-summary {
    color: #6b7280;
    line-height: 1.6;
    margin-bottom: 20px;
}

.entry-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 15px;
    border-top: 1px solid #f3f4f6;
}

.read-more {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #2563eb;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.read-more:hover {
    color: #1d4ed8;
    transform: translateX(3px);
}

.post-author {
    font-size: 0.9rem;
    color: #6b7280;
    display: flex;
    align-items: center;
    gap: 5px;
}

.no-posts {
    text-align: center;
    padding: 60px 20px;
}

.no-posts h2 {
    font-size: 2rem;
    color: #1f2937;
    margin-bottom: 15px;
}

.no-posts p {
    color: #6b7280;
    margin-bottom: 30px;
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    margin-top: 50px;
}

.pagination .page-numbers {
    display: inline-block;
    padding: 10px 15px;
    color: #374151;
    text-decoration: none;
    border: 1px solid #d1d5db;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.pagination .page-numbers:hover,
.pagination .page-numbers.current {
    background: #2563eb;
    color: white;
    border-color: #2563eb;
}

.pagination .page-numbers.prev,
.pagination .page-numbers.next {
    font-weight: 500;
}

@media (max-width: 768px) {
    .posts-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .page-header {
        padding: 30px 15px;
    }
    
    .page-title {
        font-size: 2rem;
    }
    
    .post-content {
        padding: 20px;
    }
    
    .entry-footer {
        flex-direction: column;
        gap: 10px;
        align-items: flex-start;
    }
    
    .pagination {
        flex-wrap: wrap;
    }
}

@media (max-width: 480px) {
    .post-meta {
        flex-direction: column;
        gap: 8px;
    }
}
</style>

<?php get_footer(); ?>
