<?php
/**
 * The template for displaying all pages
 */

get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    <!-- Page Header -->
    <section class="section-sm bg-light-gray">
        <div class="container">
            <?php blueprint_folder_breadcrumb(); ?>
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                    <?php if (has_excerpt()) : ?>
                        <p class="lead"><?php the_excerpt(); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Page Content -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="page-content">
                        <?php
                        the_content();
                        
                        wp_link_pages(array(
                            'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'blueprint-folder') . '</span>',
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>
                    
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; ?>

<?php get_footer(); ?>
