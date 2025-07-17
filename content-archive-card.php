<article id="post-<?php the_ID(); ?>" <?php post_class('card h-100 mb-4 shadow-sm'); ?> aria-label="Blog post: <?php the_title_attribute(); ?>">
    <header class="card-header bg-white border-0 p-0">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" tabindex="-1">
                <?php the_post_thumbnail('medium', [
                    'class' => 'card-img-top img-fluid',
                    'loading' => 'lazy',
                    'alt' => get_the_title() ? esc_attr(get_the_title()) : esc_attr(get_bloginfo('name'))
                ]); ?>
            </a>
        <?php endif; ?>
    </header>
    <div class="card-body d-flex flex-column">
        <div class="mb-2 text-muted small">
            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                <i class="far fa-calendar-alt"></i> <?php echo get_the_date(); ?>
            </time>
            <?php $categories = get_the_category();
            if ($categories) : ?>
                <span class="ml-2">
                    <i class="far fa-folder"></i> <?php echo esc_html($categories[0]->name); ?>
                </span>
            <?php endif; ?>
        </div>
        <h2 class="h5 card-title mb-2">
            <a href="<?php the_permalink(); ?>" class="stretched-link text-dark" aria-label="Read more: <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
        </h2>
        <div class="card-text mb-3">
            <?php the_excerpt(); ?>
        </div>
        <div class="mt-auto d-flex justify-content-between align-items-center">
            <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary btn-sm" aria-label="Read more: <?php the_title_attribute(); ?>">
                Read More <span class="sr-only">about <?php the_title_attribute(); ?></span>
            </a>
            <div class="text-muted small">
                <span class="mr-2"><i class="far fa-eye"></i> <?php echo function_exists('get_post_views') ? get_post_views(get_the_ID()) : '0'; ?></span>
                <span><i class="far fa-comment"></i> <?php echo get_comments_number(); ?></span>
            </div>
        </div>
    </div>
</article>
