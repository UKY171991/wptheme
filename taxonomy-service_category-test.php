<?php
/**
 * Simple test taxonomy template
 */
get_header(); ?>

<h1>Test Taxonomy Page</h1>
<p>This is a test to see if the taxonomy template is working.</p>

<?php 
$queried_object = get_queried_object();
if ($queried_object) {
    echo '<p>Category: ' . esc_html($queried_object->name) . '</p>';
    echo '<p>Slug: ' . esc_html($queried_object->slug) . '</p>';
}
?>

<div style="background: white; padding: 40px; margin: 20px; border-radius: 10px;">
    <h2>Services in this category:</h2>
    <?php if (have_posts()) : ?>
        <ul>
        <?php while (have_posts()) : the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
        </ul>
    <?php else : ?>
        <p>No services found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
