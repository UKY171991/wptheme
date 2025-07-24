<?php
/**
 * Template for displaying pages
 *
 * @package ServiceBlueprint
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="page-featured-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <header class="entry-header">
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

                <?php if (get_edit_post_link()) : ?>
                    <footer class="entry-footer">
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
                    </footer>
                <?php endif; ?>

            </article>

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
.page-content {
    max-width: 800px;
    margin: 0 auto;
    padding: 60px 20px;
}

.page-featured-image {
    margin-bottom: 40px;
    border-radius: 8px;
    overflow: hidden;
}

.page-featured-image img {
    width: 100%;
    height: auto;
    display: block;
}

.entry-header {
    text-align: center;
    margin-bottom: 40px;
}

.entry-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 20px;
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

.entry-footer {
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 1px solid #e5e7eb;
    text-align: center;
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
    .page-content {
        padding: 40px 15px;
    }
    
    .entry-title {
        font-size: 2rem;
    }
    
    .entry-content {
        font-size: 1rem;
    }
}
</style>

<?php get_footer(); ?>
