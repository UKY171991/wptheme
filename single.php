<?php
/**
 * Template for displaying single blog posts
 */

get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

<!-- Post Header -->
<section class="section-sm bg-light-gray">
    <div class="container">
        <?php blueprint_folder_breadcrumb(); ?>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="post-header text-center">
                    <div class="post-meta mb-3">
                        <span class="post-date text-muted">
                            <i class="fas fa-calendar me-2"></i>
                            <?php echo get_the_date(); ?>
                        </span>
                        
                        <?php if (get_the_category()) : ?>
                            <span class="post-categories ms-3">
                                <i class="fas fa-folder me-2"></i>
                                <?php the_category(', '); ?>
                            </span>
                        <?php endif; ?>
                        
                        <span class="post-author ms-3">
                            <i class="fas fa-user me-2"></i>
                            By <?php the_author(); ?>
                        </span>
                    </div>
                    
                    <h1 class="post-title mb-4"><?php the_title(); ?></h1>
                    
                    <?php if (has_excerpt()) : ?>
                        <p class="lead text-muted"><?php the_excerpt(); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Post Content -->
<section class="section">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-featured-image mb-5">
                            <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded shadow')); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="post-content">
                        <?php the_content(); ?>
                        
                        <?php
                        wp_link_pages(array(
                            'before' => '<div class="page-links mt-4"><span class="page-links-title">Pages:</span>',
                            'after' => '</div>',
                            'link_before' => '<span class="page-number">',
                            'link_after' => '</span>',
                        ));
                        ?>
                    </div>
                    
                    <!-- Post Footer -->
                    <div class="post-footer mt-5 pt-4 border-top">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <?php if (get_the_tags()) : ?>
                                    <div class="post-tags">
                                        <strong class="me-2">Tags:</strong>
                                        <?php the_tags('<span class="badge bg-primary me-2">', '</span><span class="badge bg-primary me-2">', '</span>'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-md-6 text-md-end">
                                <div class="social-share">
                                    <strong class="me-2">Share:</strong>
                                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                                       target="_blank" class="btn btn-sm btn-outline-primary me-2">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                                       target="_blank" class="btn btn-sm btn-outline-primary me-2">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" 
                                       target="_blank" class="btn btn-sm btn-outline-primary">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                
                <!-- Author Bio -->
                <?php if (get_the_author_meta('description')) : ?>
                    <div class="author-bio bg-light-gray p-4 rounded mt-5">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center">
                                <?php echo get_avatar(get_the_author_meta('ID'), 80, '', '', array('class' => 'rounded-circle')); ?>
                            </div>
                            <div class="col-md-10">
                                <h5 class="mb-2">About <?php the_author(); ?></h5>
                                <p class="mb-0"><?php echo get_the_author_meta('description'); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                
                <!-- Post Navigation -->
                <div class="post-navigation mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                            $prev_post = get_previous_post();
                            if ($prev_post) : ?>
                                <div class="nav-previous">
                                    <a href="<?php echo get_permalink($prev_post); ?>" class="btn btn-outline-primary w-100 text-start">
                                        <i class="fas fa-chevron-left me-2"></i>
                                        <strong>Previous Post</strong><br>
                                        <small><?php echo get_the_title($prev_post); ?></small>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="col-md-6">
                            <?php
                            $next_post = get_next_post();
                            if ($next_post) : ?>
                                <div class="nav-next">
                                    <a href="<?php echo get_permalink($next_post); ?>" class="btn btn-outline-primary w-100 text-end">
                                        <strong>Next Post</strong> <i class="fas fa-chevron-right ms-2"></i><br>
                                        <small><?php echo get_the_title($next_post); ?></small>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <!-- Comments -->
                <?php
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="blog-sidebar">
                    <!-- Recent Posts -->
                    <div class="widget mb-4">
                        <h5 class="widget-title">Related Posts</h5>
                        <?php
                        $related_posts = new WP_Query(array(
                            'post_type' => 'post',
                            'posts_per_page' => 4,
                            'post__not_in' => array(get_the_ID()),
                            'category__in' => wp_get_post_categories(get_the_ID())
                        ));
                        
                        if ($related_posts->have_posts()) : ?>
                            <ul class="list-unstyled">
                                <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                                    <li class="mb-3 pb-3 border-bottom">
                                        <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                                            <h6 class="mb-1"><?php the_title(); ?></h6>
                                            <small class="text-muted"><?php echo get_the_date(); ?></small>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Categories -->
                    <?php
                    $categories = get_categories(array('hide_empty' => true));
                    if ($categories) : ?>
                        <div class="widget mb-4">
                            <h5 class="widget-title">Categories</h5>
                            <ul class="list-unstyled">
                                <?php foreach ($categories as $category) : ?>
                                    <li class="mb-2">
                                        <a href="<?php echo get_category_link($category->term_id); ?>" class="text-decoration-none d-flex justify-content-between">
                                            <span><?php echo esc_html($category->name); ?></span>
                                            <span class="badge bg-light text-dark"><?php echo $category->count; ?></span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Newsletter Signup -->
                    <div class="widget bg-primary text-white p-4 rounded">
                        <h5 class="widget-title text-white">Stay Updated</h5>
                        <p class="mb-3">Subscribe to our newsletter for the latest updates and insights.</p>
                        <form class="newsletter-form">
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Your email address" required>
                            </div>
                            <button type="submit" class="btn btn-light w-100">
                                <i class="fas fa-envelope me-2"></i>
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>
