<?php
/**
 * Simple test single services template
 */
get_header(); ?>

<h1>Test Single Service Page</h1>
<p>This is a test to see if the single service template is working.</p>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <div style="background: white; padding: 40px; margin: 20px; border-radius: 10px;">
            <h2><?php the_title(); ?></h2>
            <div><?php the_content(); ?></div>
            <p><strong>Post ID:</strong> <?php echo get_the_ID(); ?></p>
            <p><strong>Post Type:</strong> <?php echo get_post_type(); ?></p>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
