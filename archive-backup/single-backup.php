<?php get_header(); ?>

<div class="single-post" style="padding: 2rem 0;">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article class="post">
                <header class="post-header" style="text-align: center; margin-bottom: 3rem;">
                    <h1 class="post-title"><?php the_title(); ?></h1>
                    <div class="post-meta" style="color: #666; margin-top: 1rem;">
                        <span>Published on <?php echo get_the_date(); ?></span>
                        <span> • </span>
                        <span>By <?php the_author(); ?></span>
                        <?php if (has_category()) : ?>
                            <span> • </span>
                            <span>In <?php the_category(', '); ?></span>
                        <?php endif; ?>
                    </div>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-featured-image" style="margin-bottom: 2rem; text-align: center;">
                        <?php the_post_thumbnail('large', array('style' => 'max-width: 100%; height: auto; border-radius: 15px;')); ?>
                    </div>
                <?php endif; ?>

                <div class="post-content" style="max-width: 800px; margin: 0 auto; font-size: 1.1rem; line-height: 1.8; color: #333;">
                    <?php the_content(); ?>
                </div>

                <footer class="post-footer" style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid #eee;">
                    <?php if (has_tag()) : ?>
                        <div class="post-tags" style="margin-bottom: 2rem;">
                            <strong>Tags: </strong>
                            <?php the_tags('', ', ', ''); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="post-navigation" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="nav-previous">
                            <?php previous_post_link('%link', '&laquo; %title'); ?>
                        </div>
                        <div class="nav-next">
                            <?php next_post_link('%link', '%title &raquo;'); ?>
                        </div>
                    </div>
                </footer>
            </article>
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>
