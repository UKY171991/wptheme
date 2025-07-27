<?php
/**
 * Template Name: Blog
 */

get_header(); ?>

<main id="main" class="site-main">
    <!-- Blog Introduction Section -->
    <section class="blog-intro-section section-sm bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="intro-content">
                        <h2 class="h3 mb-3" style="color: #2c3e50; font-weight: 600;">
                            <i class="fas fa-blog me-3" style="color: #3498db;"></i>
                            Latest Insights & Updates
                        </h2>
                        <p class="lead text-muted mb-4">
                            Stay informed with our latest articles, industry insights, and expert tips to help your business grow and succeed in today's competitive marketplace.
                        </p>
                        <div class="blog-stats d-flex justify-content-center gap-4 flex-wrap">
                            <div class="stat-item">
                                <span class="stat-number h5 text-primary mb-0"><?php echo wp_count_posts()->publish; ?></span>
                                <span class="stat-label small text-muted d-block">Articles Published</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number h5 text-primary mb-0"><?php echo count(get_categories()); ?></span>
                                <span class="stat-label small text-muted d-block">Categories</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number h5 text-primary mb-0"><?php echo date('Y') - 2020; ?>+</span>
                                <span class="stat-label small text-muted d-block">Years Experience</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Posts Section -->
    <section id="blog-posts" class="section">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <?php
                    // Get blog posts
                    $blog_query = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 6,
                        'post_status' => 'publish'
                    ));
                    
                    if ($blog_query->have_posts()) :
                    ?>
                        <div class="row g-4">
                            <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                                <div class="col-md-6">
                                    <article class="card blog-card h-100 shadow-sm border-0">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="card-img-top position-relative overflow-hidden">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail('medium_large', array('class' => 'img-fluid w-100', 'style' => 'height: 200px; object-fit: cover;')); ?>
                                                </a>
                                                <div class="post-date position-absolute top-0 start-0 bg-accent text-white p-2 m-2 rounded">
                                                    <div class="text-center">
                                                        <div class="fw-bold"><?php echo get_the_date('d'); ?></div>
                                                        <div class="small"><?php echo get_the_date('M'); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <div class="card-body p-4">
                                            <div class="post-meta mb-2">
                                                <small class="text-muted">
                                                    <i class="fas fa-calendar me-1"></i><?php echo get_the_date(); ?>
                                                    <span class="mx-2">•</span>
                                                    <i class="fas fa-user me-1"></i><?php the_author(); ?>
                                                </small>
                                            </div>
                                            
                                            <h3 class="card-title h5 mb-3">
                                                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h3>
                                            
                                            <p class="card-text text-muted mb-3">
                                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                            </p>
                                            
                                            <?php
                                            // Display categories
                                            $categories = get_the_category();
                                            if ($categories) :
                                            ?>
                                                <div class="post-categories mb-3">
                                                    <?php foreach ($categories as $category) : ?>
                                                        <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="badge bg-light text-dark text-decoration-none me-1">
                                                            <?php echo esc_html($category->name); ?>
                                                        </a>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                            
                                            <a href="<?php the_permalink(); ?>" class="btn btn-accent btn-sm">
                                                Read More <i class="fas fa-arrow-right ms-1"></i>
                                            </a>
                                        </div>
                                    </article>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="row mt-5">
                            <div class="col-12">
                                <?php
                                the_posts_pagination(array(
                                    'mid_size' => 2,
                                    'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                                    'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
                                    'class' => 'pagination justify-content-center'
                                ));
                                ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="text-center py-5">
                            <div class="bg-light p-5 rounded">
                                <i class="fas fa-newspaper fa-4x text-muted mb-4"></i>
                                <h3 class="h4 mb-3">Blog Posts Coming Soon</h3>
                                <p class="text-muted mb-4">We're working on bringing you valuable content. Check back soon for helpful articles and tips!</p>
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-accent">
                                    <i class="fas fa-envelope me-2"></i>Subscribe for Updates
                                </a>
                            </div>
                        </div>
                    <?php endif; wp_reset_postdata(); ?>
                </div>
                
                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="blog-sidebar">
                        <!-- Search Widget -->
                        <div class="sidebar-widget mb-4">
                            <h4 class="widget-title h6 mb-3">Search Articles</h4>
                            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s" />
                                    <button class="btn btn-accent" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Categories Widget -->
                        <div class="sidebar-widget mb-4">
                            <h4 class="widget-title h6 mb-3">Categories</h4>
                            <div class="categories-list">
                                <?php
                                $categories = get_categories(array('hide_empty' => true));
                                if ($categories) :
                                    foreach ($categories as $category) :
                                ?>
                                    <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="d-flex justify-content-between align-items-center text-decoration-none text-dark p-2 rounded mb-1 category-link">
                                        <span><?php echo esc_html($category->name); ?></span>
                                        <span class="badge bg-light text-dark"><?php echo esc_html($category->count); ?></span>
                                    </a>
                                <?php
                                    endforeach;
                                else :
                                ?>
                                    <p class="text-muted">No categories yet.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <!-- Recent Posts Widget -->
                        <div class="sidebar-widget mb-4">
                            <h4 class="widget-title h6 mb-3">Recent Posts</h4>
                            <?php
                            $recent_posts = new WP_Query(array(
                                'post_type' => 'post',
                                'posts_per_page' => 3,
                                'post_status' => 'publish'
                            ));
                            
                            if ($recent_posts->have_posts()) :
                                while ($recent_posts->have_posts()) : $recent_posts->the_post();
                            ?>
                                <div class="recent-post d-flex mb-3">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="recent-post-image me-3 flex-shrink-0">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('thumbnail', array('class' => 'rounded', 'style' => 'width: 60px; height: 60px; object-fit: cover;')); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="recent-post-content">
                                        <h6 class="mb-1">
                                            <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                                <?php echo wp_trim_words(get_the_title(), 8); ?>
                                            </a>
                                        </h6>
                                        <small class="text-muted"><?php echo get_the_date(); ?></small>
                                    </div>
                                </div>
                            <?php
                                endwhile;
                            else :
                            ?>
                                <p class="text-muted">No recent posts.</p>
                            <?php
                            endif;
                            wp_reset_postdata();
                            ?>
                        </div>
                        
                        <!-- Newsletter Widget -->
                        <div class="sidebar-widget bg-accent text-white p-4 rounded">
                            <h4 class="widget-title h6 mb-3">Stay Updated</h4>
                            <p class="mb-3">Subscribe to our newsletter for the latest tips and updates.</p>
                            <form class="newsletter-form">
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" placeholder="Your email" required>
                                    <button class="btn btn-light text-accent" type="submit">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
.blog-card {
    transition: var(--transition);
}

.blog-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.category-link:hover {
    background-color: var(--light-gray);
}

.sidebar-widget {
    background-color: var(--white);
    border: 1px solid #e9ecef;
    border-radius: var(--border-radius);
    padding: 1.5rem;
}

.widget-title {
    color: var(--primary-dark);
    border-bottom: 2px solid var(--accent);
    padding-bottom: 0.5rem;
    margin-bottom: 1rem;
}
</style>

<?php get_footer(); ?>

    <!-- Blog Posts Section -->
    <section id="blog-posts" class="section">
        <div class="container">
            <div class="row">
                <!-- Blog Content -->
                <div class="col-lg-8">
                    <?php
                    // Query for blog posts
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $blog_query = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 6,
                        'paged' => $paged,
                        'post_status' => 'publish'
                    ));

                    if ($blog_query->have_posts()) :
                    ?>
                        <div class="row g-4">
                            <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                                <div class="col-md-6">
                                    <article class="card card-hover h-100 border-0 shadow-sm">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="card-img-top overflow-hidden" style="height: 200px;">
                                                <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>" 
                                                     alt="<?php the_title_attribute(); ?>" 
                                                     class="w-100 h-100 object-fit-cover">
                                            </div>
                                        <?php endif; ?>
                                        
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <span class="badge bg-light text-dark me-2">
                                                    <?php echo esc_html(get_the_category_list(', ')); ?>
                                                </span>
                                                <small class="text-muted">
                                                    <i class="fas fa-calendar me-1"></i>
                                                    <?php echo esc_html(get_the_date()); ?>
                                                </small>
                                            </div>
                                            
                                            <h3 class="h5 card-title">
                                                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h3>
                                            
                                            <p class="card-text text-muted">
                                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                            </p>
                                            
                                            <div class="d-flex justify-content-between align-items-center mt-3">
                                                <div class="d-flex align-items-center">
                                                    <small class="text-muted">
                                                        <i class="fas fa-user me-1"></i>
                                                        <?php echo esc_html(get_the_author()); ?>
                                                    </small>
                                                </div>
                                                <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-accent">
                                                    Read More <i class="fas fa-arrow-right ms-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            <?php endwhile; ?>
                        </div>

                        <!-- Pagination -->
                        <div class="row mt-5">
                            <div class="col-12">
                                <?php
                                $pagination = paginate_links(array(
                                    'total' => $blog_query->max_num_pages,
                                    'current' => $paged,
                                    'format' => '?paged=%#%',
                                    'show_all' => false,
                                    'end_size' => 2,
                                    'mid_size' => 1,
                                    'prev_next' => true,
                                    'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                                    'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
                                    'type' => 'array'
                                ));

                                if ($pagination) :
                                ?>
                                    <nav aria-label="Blog pagination">
                                        <ul class="pagination justify-content-center">
                                            <?php foreach ($pagination as $link) : ?>
                                                <li class="page-item">
                                                    <?php echo str_replace('page-numbers', 'page-link', $link); ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </nav>
                                <?php endif; ?>
                            </div>
                        </div>

                    <?php else : ?>
                        <div class="text-center py-5">
                            <i class="fas fa-newspaper text-muted mb-3" style="font-size: 4rem;"></i>
                            <h3 class="h4 mb-3">No Posts Yet</h3>
                            <p class="text-muted mb-4">We're working on creating great content for you. Check back soon!</p>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-accent btn-rounded">
                                <i class="fas fa-home me-2"></i>Back to Home
                            </a>
                        </div>
                    <?php 
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="position-sticky" style="top: 2rem;">
                        <!-- Search Widget -->
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-light border-0">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-search text-accent me-2"></i>Search Blog
                                </h5>
                            </div>
                            <div class="card-body">
                                <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="s" 
                                               placeholder="Search articles..." 
                                               value="<?php echo esc_attr(get_search_query()); ?>">
                                        <button type="submit" class="btn btn-accent">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Categories Widget -->
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-light border-0">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-folder text-accent me-2"></i>Categories
                                </h5>
                            </div>
                            <div class="card-body">
                                <?php
                                $categories = get_categories(array(
                                    'orderby' => 'count',
                                    'order' => 'DESC',
                                    'number' => 10
                                ));

                                if ($categories) :
                                ?>
                                    <ul class="list-unstyled mb-0">
                                        <?php foreach ($categories as $category) : ?>
                                            <li class="mb-2">
                                                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" 
                                                   class="text-decoration-none d-flex justify-content-between align-items-center">
                                                    <span><?php echo esc_html($category->name); ?></span>
                                                    <span class="badge bg-light text-dark"><?php echo esc_html($category->count); ?></span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else : ?>
                                    <p class="text-muted mb-0">No categories available.</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Recent Posts Widget -->
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-light border-0">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-clock text-accent me-2"></i>Recent Posts
                                </h5>
                            </div>
                            <div class="card-body">
                                <?php
                                $recent_posts = new WP_Query(array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 5,
                                    'post_status' => 'publish'
                                ));

                                if ($recent_posts->have_posts()) :
                                ?>
                                    <ul class="list-unstyled mb-0">
                                        <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                                            <li class="mb-3 pb-3 border-bottom">
                                                <h6 class="mb-1">
                                                    <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h6>
                                                <small class="text-muted">
                                                    <i class="fas fa-calendar me-1"></i>
                                                    <?php echo esc_html(get_the_date()); ?>
                                                </small>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php else : ?>
                                    <p class="text-muted mb-0">No recent posts available.</p>
                                <?php 
                                endif;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>

                        <!-- Newsletter Widget -->
                        <div class="card border-0 shadow-sm bg-accent text-white">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope-open-text mb-3" style="font-size: 2.5rem;"></i>
                                <h5 class="card-title">Stay Updated</h5>
                                <p class="card-text mb-4">Get our latest tips and news delivered to your inbox.</p>
                                <form>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" placeholder="Your email address" required>
                                    </div>
                                    <button type="submit" class="btn btn-light btn-rounded w-100">
                                        <i class="fas fa-paper-plane me-2"></i>Subscribe
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
