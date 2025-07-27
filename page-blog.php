<?php
/**
 * Template Name: Blog
 */

get_header(); ?>
<main id="main" class="site-main">
    <!-- Blog Introduction Section -->
    <section class="blog-intro-section py-5 bg-light">
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
                        <div class="blog-stats d-flex justify-content-center gap-4 flex-wrap mb-4">
                            <div class="stat-item text-center p-3 bg-white rounded shadow-sm">
                                <span class="stat-number h4 text-primary mb-0 d-block"><?php echo wp_count_posts()->publish;?></span>
                                <span class="stat-label small text-muted">Articles Published</span>
                            </div>
                            <div class="stat-item text-center p-3 bg-white rounded shadow-sm">
                                <span class="stat-number h4 text-primary mb-0 d-block"><?php echo count(get_categories());?></span>
                                <span class="stat-label small text-muted">Categories</span>
                            </div>
                            <div class="stat-item text-center p-3 bg-white rounded shadow-sm">
                                <span class="stat-number h4 text-primary mb-0 d-block"><?php echo date('Y') - 2020;?>+</span>
                                <span class="stat-label small text-muted">Years Experience</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Posts Section -->
    <section id="blog-posts" class="py-5">
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

                    if ($blog_query->have_posts()) :?>
                        <div class="row g-4">
                            <?php while ($blog_query->have_posts()) : $blog_query->the_post();?>
                                <div class="col-md-6">
                                    <article class="card blog-card h-100 shadow-sm border-0">
                                        <?php if (has_post_thumbnail()) :?>
                                            <div class="card-img-top position-relative overflow-hidden">
                                                <a href="<?php the_permalink();?>">
                                                    <?php the_post_thumbnail('medium_large', array('class' => 'img-fluid w-100', 'style' => 'height: 200px; object-fit: cover;'));?>
                                                </a>
                                                <div class="post-date position-absolute top-0 start-0 bg-primary text-white p-2 m-2 rounded">
                                                    <div class="text-center">
                                                        <div class="fw-bold"><?php echo get_the_date('d');?></div>
                                                        <div class="small"><?php echo get_the_date('M');?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif;?>
                                        <div class="card-body p-4">
                                            <div class="post-meta mb-2">
                                                <small class="text-muted">
                                                    <i class="fas fa-calendar me-1"></i><?php echo get_the_date();?>
                                                    <span class="mx-2">•</span>
                                                    <i class="fas fa-user me-1"></i><?php the_author();?>
                                                </small>
                                            </div>
                                            <h3 class="card-title h5 mb-3">
                                                <a href="<?php the_permalink();?>" class="text-decoration-none text-dark">
                                                    <?php the_title();?>
                                                </a>
                                            </h3>
                                            <p class="card-text text-muted mb-3">
                                                <?php echo wp_trim_words(get_the_excerpt(), 20);?>
                                            </p>
                                            <?php
                                            // Display categories
                                            $categories = get_the_category();
                                            if ($categories) :?>
                                                <div class="post-categories mb-3">
                                                    <?php foreach ($categories as $category) :?>
                                                        <a href="<?php echo esc_url(get_category_link($category->term_id));?>" class="badge bg-light text-dark text-decoration-none me-1">
                                                            <?php echo esc_html($category->name);?>
                                                        </a>
                                                    <?php endforeach;?>
                                                </div>
                                            <?php endif;?>
                                            <a href="<?php the_permalink();?>" class="btn btn-primary btn-sm">
                                                Read More <i class="fas fa-arrow-right ms-1"></i>
                                            </a>
                                        </div>
                                    </article>
                                </div>
                            <?php endwhile;?>
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
                                ));?>
                            </div>
                        </div>
                    <?php else :?>
                        <div class="text-center py-5">
                            <div class="bg-light p-5 rounded">
                                <i class="fas fa-newspaper fa-4x text-muted mb-4"></i>
                                <h3 class="h4 mb-3">Blog Posts Coming Soon</h3>
                                <p class="text-muted mb-4">We're working on bringing you valuable content. Check back soon for helpful articles and tips!</p>
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact')));?>" class="btn btn-primary">
                                    <i class="fas fa-envelope me-2"></i>Subscribe for Updates
                                </a>
                            </div>
                        </div>
                    <?php endif; wp_reset_postdata();?>
                </div>
                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="blog-sidebar">
                        <!-- Search Widget -->
                        <div class="sidebar-widget mb-4">
                            <h4 class="widget-title h6 mb-3">Search Articles</h4>
                            <form role="search" method="get" action="<?php echo esc_url(home_url('/'));?>">
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="Search..." value="<?php echo get_search_query();?>" name="s" />
                                    <button class="btn btn-primary" type="submit">
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
                                    foreach ($categories as $category) :?>
                                    <a href="<?php echo esc_url(get_category_link($category->term_id));?>" class="d-flex justify-content-between align-items-center text-decoration-none text-dark p-2 rounded mb-1 category-link">
                                        <span><?php echo esc_html($category->name);?></span>
                                        <span class="badge bg-light text-dark"><?php echo esc_html($category->count);?></span>
                                    </a>
                                <?php
                                    endforeach;
                                else :?>
                                    <p class="text-muted">No categories yet.</p>
                                <?php endif;?>
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
                                while ($recent_posts->have_posts()) : $recent_posts->the_post();?>
                                <div class="recent-post d-flex mb-3">
                                    <?php if (has_post_thumbnail()) :?>
                                        <div class="recent-post-image me-3 flex-shrink-0">
                                            <a href="<?php the_permalink();?>">
                                                <?php the_post_thumbnail('thumbnail', array('class' => 'rounded', 'style' => 'width: 60px; height: 60px; object-fit: cover;'));?>
                                            </a>
                                        </div>
                                    <?php endif;?>
                                    <div class="recent-post-content">
                                        <h6 class="mb-1">
                                            <a href="<?php the_permalink();?>" class="text-decoration-none text-dark">
                                                <?php echo wp_trim_words(get_the_title(), 8);?>
                                            </a>
                                        </h6>
                                        <small class="text-muted"><?php echo get_the_date();?></small>
                                    </div>
                                </div>
                            <?php
                                endwhile;
                            else :?>
                                <p class="text-muted">No recent posts.</p>
                            <?php
                            endif;
                            wp_reset_postdata();?>
                        </div>
                        
                        <!-- Newsletter Widget -->
                        <div class="sidebar-widget bg-primary text-white">
                            <h4 class="widget-title h6 mb-3 text-white border-bottom border-light">Stay Updated</h4>
                            <p class="mb-3">Subscribe to our newsletter for the latest tips and updates.</p>
                            <form class="newsletter-form">
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" placeholder="Your email" required>
                                    <button class="btn btn-light text-primary" type="submit">
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

    <!-- Call to Action Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="mb-3">Ready to Get Started?</h2>
                    <p class="lead mb-4">
                        Don't wait – reach out today and let's discuss how we can help you achieve your goals with our professional services.
                    </p>
                    <div class="d-flex flex-column flex-md-row justify-content-center gap-3">
                        <a href="tel:+1234567890" class="btn btn-light btn-lg">
                            <i class="fas fa-phone me-2"></i>
                            Call (123) 456-7890
                        </a>
                        <a href="mailto:info@blueprintfolder.com" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-envelope me-2"></i>
                            Email Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
/* Blog Page Specific Styles */
.blog-intro-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.stat-item {
    min-width: 120px;
    transition: all 0.3s ease;
}

.stat-item:hover {
    transform: translateY(-2px);
}

.blog-card {
    transition: all 0.3s ease;
    border-radius: 12px;
    overflow: hidden;
}

.blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
}

.blog-card .card-img-top {
    border-radius: 0;
}

.post-date {
    border-radius: 8px !important;
    font-size: 0.75rem;
    min-width: 50px;
}

.category-link:hover {
    background-color: #f8f9fa !important;
    transform: translateX(5px);
}

.sidebar-widget {
    background-color: white;
    border: 1px solid #e9ecef;
    border-radius: 12px;
    padding: 1.5rem;
    transition: all 0.3s ease;
}

.sidebar-widget:hover {
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.widget-title {
    color: #2c3e50;
    border-bottom: 2px solid #007bff;
    padding-bottom: 0.5rem;
    margin-bottom: 1rem;
    font-weight: 600;
}

.sidebar-widget.bg-primary .widget-title {
    border-bottom-color: rgba(255, 255, 255, 0.3);
}

.recent-post {
    transition: all 0.3s ease;
    padding: 0.5rem;
    border-radius: 8px;
}

.recent-post:hover {
    background-color: #f8f9fa;
}

.newsletter-form .btn {
    border-radius: 0 6px 6px 0;
}

/* Responsive improvements */
@media (max-width: 768px) {
    .blog-stats {
        flex-direction: column;
        align-items: center;
    }
    
    .stat-item {
        margin-bottom: 1rem;
        min-width: 200px;
    }
    
    .blog-card {
        margin-bottom: 2rem;
    }
}

/* Pagination styling */
.pagination {
    border-radius: 8px;
}

.pagination .page-link {
    border-radius: 6px;
    margin: 0 2px;
    border: none;
    color: #007bff;
}

.pagination .page-link:hover {
    background-color: #007bff;
    color: white;
}

.pagination .page-item.active .page-link {
    background-color: #007bff;
    border-color: #007bff;
}
</style>

<?php get_footer(); ?>