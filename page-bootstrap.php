<?php
/**
 * Template Name: Bootstrap Page
 * 
 * A clean Bootstrap-based page template
 */

get_header(); ?>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header mb-4">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header>

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>