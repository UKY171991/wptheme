<?php
/**
 * Template for displaying single posts
 *
 * @package ServiceBlueprint
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-featured-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <header class="entry-header">
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
                        
                        <?php if (get_the_author()) : ?>
                            <span class="post-author">
                                <i class="fas fa-user" aria-hidden="true"></i>
                                <?php the_author(); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>

                <div class="entry-content">
                    <?php
                    the_content();
                    
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'service-blueprint'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <footer class="entry-footer">
                    <?php if (get_the_tags()) : ?>
                        <div class="post-tags">
                            <i class="fas fa-tags" aria-hidden="true"></i>
                            <?php the_tags('', ', '); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (get_edit_post_link()) : ?>
                        <div class="edit-link">
                            <?php
                            edit_post_link(
                                sprintf(
                                    wp_kses(
                                        /* translators: %s: Name of current post. Only visible to screen readers */
                                        __('Edit <span class="sr-only">%s</span>', 'service-blueprint'),
                                        array(
                                            'span' => array(
                                                'class' => array(),
                                            ),
                                        )
                                    ),
                                    get_the_title()
                                ),
                                '<span class="edit-link">',
                                '</span>'
                            );
                            ?>
                        </div>
                    <?php endif; ?>
                </footer>

            </article>

            <!-- Post Navigation -->
            <nav class="post-navigation" role="navigation">
                <div class="nav-links">
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    ?>
                    
                    <?php if ($prev_post) : ?>
                        <div class="nav-previous">
                            <a href="<?php echo get_permalink($prev_post); ?>" rel="prev">
                                <span class="nav-subtitle"><?php esc_html_e('Previous Post', 'service-blueprint'); ?></span>
                                <span class="nav-title"><?php echo get_the_title($prev_post); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($next_post) : ?>
                        <div class="nav-next">
                            <a href="<?php echo get_permalink($next_post); ?>" rel="next">
                                <span class="nav-subtitle"><?php esc_html_e('Next Post', 'service-blueprint'); ?></span>
                                <span class="nav-title"><?php echo get_the_title($next_post); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </nav>

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>

        <?php endwhile; ?>
    </div>
</main>

<style>
.single-post {
    max-width: 800px;
    margin: 0 auto;
    padding: 60px 20px;
}

.post-featured-image {
    margin-bottom: 40px;
    border-radius: 8px;
    overflow: hidden;
}

.post-featured-image img {
    width: 100%;
    height: auto;
    display: block;
}

.entry-header {
    text-align: center;
    margin-bottom: 40px;
}

.post-meta {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 20px;
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
    font-size: 2.5rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0;
}

.entry-content {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #374151;
}

.entry-content h2,
.entry-content h3,
.entry-content h4 {
    color: #1f2937;
    margin: 2rem 0 1rem;
}

.entry-content h2 {
    font-size: 1.8rem;
}

.entry-content h3 {
    font-size: 1.5rem;
}

.entry-content h4 {
    font-size: 1.3rem;
}

.entry-content p {
    margin-bottom: 1.5rem;
}

.entry-content ul,
.entry-content ol {
    margin: 1.5rem 0;
    padding-left: 2rem;
}

.entry-content li {
    margin-bottom: 0.5rem;
}

.entry-content blockquote {
    background: #f9fafb;
    border-left: 4px solid #2563eb;
    padding: 1.5rem;
    margin: 2rem 0;
    font-style: italic;
}

.entry-content img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 1.5rem 0;
}

.entry-footer {
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 1px solid #e5e7eb;
}

.post-tags {
    margin-bottom: 1rem;
}

.post-tags i {
    margin-right: 8px;
    color: #6b7280;
}

.post-tags a {
    display: inline-block;
    background: #f3f4f6;
    color: #374151;
    padding: 4px 12px;
    margin: 2px;
    border-radius: 20px;
    text-decoration: none;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.post-tags a:hover {
    background: #2563eb;
    color: white;
}

.post-navigation {
    margin: 40px 0;
    padding: 20px 0;
    border-top: 1px solid #e5e7eb;
}

.nav-links {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.nav-previous,
.nav-next {
    padding: 20px;
    background: #f9fafb;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.nav-previous:hover,
.nav-next:hover {
    background: #f3f4f6;
    transform: translateY(-2px);
}

.nav-previous a,
.nav-next a {
    text-decoration: none;
    color: inherit;
    display: block;
}

.nav-next {
    text-align: right;
}

.nav-subtitle {
    display: block;
    font-size: 0.9rem;
    color: #6b7280;
    margin-bottom: 5px;
}

.nav-title {
    display: block;
    font-weight: 600;
    color: #1f2937;
}

.page-links {
    margin-top: 2rem;
    text-align: center;
}

.page-links a {
    display: inline-block;
    padding: 8px 16px;
    margin: 0 4px;
    background: #2563eb;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.page-links a:hover {
    background: #1d4ed8;
}

.edit-link {
    text-align: center;
    margin-top: 1rem;
}

.edit-link a {
    color: #6b7280;
    text-decoration: none;
    font-size: 0.9rem;
}

.edit-link a:hover {
    color: #2563eb;
}

@media (max-width: 768px) {
    .single-post {
        padding: 40px 15px;
    }
    
    .entry-title {
        font-size: 2rem;
    }
    
    .entry-content {
        font-size: 1rem;
    }
    
    .post-meta {
        flex-direction: column;
        gap: 10px;
    }
    
    .nav-links {
        grid-template-columns: 1fr;
    }
    
    .nav-next {
        text-align: left;
    }
}
</style>

<?php get_footer(); ?>
