<?php get_header(); ?>

<!-- Page Banner Section -->
<section class="page-banner default-banner">
    <div class="container">
        <div class="banner-content">
            <div class="breadcrumb">
                <a href="<?php echo home_url(); ?>"><i class="fas fa-home"></i> Home</a> 
                <span class="breadcrumb-separator">→</span> 
                <span><?php the_title(); ?></span>
            </div>
            <h1 class="banner-title"><?php the_title(); ?></h1>
            <?php if (has_excerpt()) : ?>
                <p class="banner-subtitle"><?php the_excerpt(); ?></p>
            <?php else : ?>
                <p class="banner-subtitle">Welcome to our page</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<div class="page-content" style="padding: 4rem 0;">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article class="page">
                <div class="page-content-wrapper" style="max-width: 800px; margin: 0 auto;">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="page-featured-image" style="margin-bottom: 3rem; text-align: center;">
                            <?php the_post_thumbnail('large', array('style' => 'max-width: 100%; height: auto; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);')); ?>
                        </div>
                    <?php endif; ?>

                    <div class="page-content-text" style="font-size: 1.1rem; line-height: 1.8; color: #333;">
                        <?php the_content(); ?>
                    </div>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>
