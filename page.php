<?php get_header(); ?>

<div class="content-section">
    <div class="container">
        <?php if (have_posts()) : ?>
            <h1 class="section-title"><?php the_title(); ?></h1>
            
            <?php while (have_posts()) : the_post(); ?>
                <div class="page-content">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="page-thumbnail mb-4">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
            
        <?php else : ?>
            <h1>Page not found</h1>
            <p>Sorry, the page you are looking for could not be found.</p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
