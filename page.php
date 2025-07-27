<?php
/**
 * Generic Page Template
 * Used for all standard pages
 */

get_header(); ?>
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <?php while (have_posts()) : the_post();?>
                <article id="post-<?php the_ID();?>" <?php post_class('page-content');?>>
                    <div class="page-body">
                        <?php if (has_post_thumbnail()) :?>
                            <div class="page-featured-image mb-4">
                                <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded'));?>
                            </div>
                        <?php endif;?>
                        <div class="page-content-text">
                            <?php
                            the_content();

                            wp_link_pages(array(
                                'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'blueprint-folder') . '</span>',
                                'after'  => '</div>',
                                'link_before' => '<span>',
                                'link_after'  => '</span>',
                            ));?>
                        </div>
                    </div>
                </article>
                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;?>
            <?php endwhile;?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
