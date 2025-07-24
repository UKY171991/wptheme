<?php
/**
 * Template for displaying the blog home page
 *
 * @package ServiceBlueprint
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
    <div class="container">
        <header class="blog-header">
            <h1 class="blog-title"><?php esc_html_e('Latest News & Updates', 'service-blueprint'); ?></h1>
            <p class="blog-description"><?php esc_html_e('Stay updated with our latest insights, tips, and company news.', 'service-blueprint'); ?></p>
        </header>

        <?php if (have_posts()) : ?>
            <!-- Featured Post -->
            <?php
            $featured_posts = new WP_Query(array(
                'posts_per_page' => 1,
                'meta_query' => array(
                    array(
                        'key' => 'featured_post',
                        'value' => '1',
                        'compare' => '='
                    )
                )
            ));
            
            if ($featured_posts->have_posts()) :
                while ($featured_posts->have_posts()) : $featured_posts->the_post();
            ?>
                <article class="featured-post">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="featured-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <div class="featured-content">
                        <span class="featured-label"><?php esc_html_e('Featured', 'service-blueprint'); ?></span>
                        
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

                        <h2 class="featured-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>

                        <div class="featured-excerpt">
                            <?php the_excerpt(); ?>
                        </div>

                        <a href="<?php the_permalink(); ?>" class="featured-link">
                            <?php esc_html_e('Read Full Article', 'service-blueprint'); ?>
                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>

            <!-- Regular Posts Grid -->
            <div class="posts-section">
                <h2 class="section-title"><?php esc_html_e('Recent Posts', 'service-blueprint'); ?></h2>
                
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
                                    <h3 class="entry-title">
                                        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                    </h3>
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
                <h2><?php esc_html_e('No posts found', 'service-blueprint'); ?></h2>
                <p><?php esc_html_e('It looks like no posts have been published yet. Check back soon!', 'service-blueprint'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<style>
.blog-header {
    text-align: center;
    margin-bottom: 60px;
    padding: 60px 20px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 12px;
}

.blog-title {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 20px;
}

.blog-description {
    font-size: 1.2rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
}

.featured-post {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    margin-bottom: 80px;
    padding: 40px;
    background: white;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
}

.featured-thumbnail {
    position: relative;
    overflow: hidden;
    border-radius: 12px;
}

.featured-thumbnail img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.featured-post:hover .featured-thumbnail img {
    transform: scale(1.05);
}

.featured-content {
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.featured-label {
    display: inline-block;
    background: #2563eb;
    color: white;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 15px;
    align-self: flex-start;
}

.featured-title {
    font-size: 2rem;
    font-weight: 700;
    margin: 15px 0 20px;
}

.featured-title a {
    color: #1f2937;
    text-decoration: none;
    transition: color 0.3s ease;
}

.featured-title a:hover {
    color: #2563eb;
}

.featured-excerpt {
    color: #6b7280;
    line-height: 1.6;
    margin-bottom: 25px;
    font-size: 1.1rem;
}

.featured-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #2563eb;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.featured-link:hover {
    color: #1d4ed8;
    transform: translateX(3px);
}

.posts-section {
    margin-top: 60px;
}

.section-title {
    font-size: 2rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 40px;
    text-align: center;
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

@media (max-width: 968px) {
    .featured-post {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .featured-thumbnail img {
        height: 250px;
    }
}

@media (max-width: 768px) {
    .posts-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .blog-header {
        padding: 40px 15px;
    }
    
    .blog-title {
        font-size: 2.5rem;
    }
    
    .featured-post {
        padding: 30px 20px;
    }
    
    .featured-title {
        font-size: 1.8rem;
    }
    
    .post-content {
        padding: 20px;
    }
    
    .entry-footer {
        flex-direction: column;
        gap: 10px;
        align-items: flex-start;
    }
}

@media (max-width: 480px) {
    .blog-title {
        font-size: 2rem;
    }
    
    .featured-title {
        font-size: 1.5rem;
    }
    
    .post-meta {
        flex-direction: column;
        gap: 8px;
    }
}
</style>

<?php get_footer(); ?>
