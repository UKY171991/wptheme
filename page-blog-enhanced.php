<?php
/**
 * Template Name: Blog Page
 * 
 * Enhanced blog page with modern design and filtering capabilities
 */

get_header();
?>

<div class="blog-page-wrapper">
    <!-- Hero Section -->
    <section class="blog-hero py-5 bg-gradient-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="hero-content text-white">
                        <div class="hero-badge mb-3">
                            <span class="badge bg-white text-primary px-3 py-2 rounded-pill fs-6">
                                <i class="bi bi-journal-text me-2"></i>
                                <?php esc_html_e('Our Blog', 'blueprint'); ?>
                            </span>
                        </div>
                        <h1 class="display-4 fw-bold mb-4">
                            <?php esc_html_e('Our Blog', 'blueprint'); ?>
                        </h1>
                        <p class="lead mb-4">
                            <?php esc_html_e('Insights, updates, and stories from our team', 'blueprint'); ?>
                        </p>
                        
                        <!-- Search Box -->
                        <div class="blog-search-container">
                            <div class="search-box position-relative">
                                <i class="bi bi-search search-icon"></i>
                                <input type="text" id="post-search" class="form-control" placeholder="<?php esc_attr_e('Search articles...', 'blueprint'); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Content -->
    <section class="py-5">
        <div class="container">
            <!-- Filter Section -->
            <div class="blog-filter-section">
                <div class="filter-categories">
                    <button class="filter-btn active" data-filter="all"><?php esc_html_e('All Posts', 'blueprint'); ?></button>
                    <button class="filter-btn" data-filter="recent"><?php esc_html_e('Recent', 'blueprint'); ?></button>
                    <button class="filter-btn" data-filter="popular"><?php esc_html_e('Popular', 'blueprint'); ?></button>
                    <button class="filter-btn" data-filter="featured"><?php esc_html_e('Featured', 'blueprint'); ?></button>
                </div>
                
                <div class="view-options">
                    <button class="btn btn-outline-primary btn-sm view-btn active" data-view="grid">
                        <i class="bi bi-grid-3x3-gap"></i>
                    </button>
                    <button class="btn btn-outline-primary btn-sm view-btn" data-view="list">
                        <i class="bi bi-list"></i>
                    </button>
                </div>
            </div>

            <?php
            // Get featured post first
            $featured_query = new WP_Query(array(
                'posts_per_page' => 1,
                'meta_key' => '_featured_post',
                'meta_value' => '1',
                'post_status' => 'publish'
            ));

            if ($featured_query->have_posts()) :
                while ($featured_query->have_posts()) : $featured_query->the_post();
            ?>
            <!-- Featured Post -->
            <div class="featured-post-section mb-5">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="featured-post-image">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large', array('class' => 'img-fluid border-radius-custom')); ?>
                                <?php else: ?>
                                    <img src="https://via.placeholder.com/600x400/667eea/ffffff?text=<?php echo urlencode(get_the_title()); ?>" 
                                         alt="<?php the_title_attribute(); ?>" 
                                         class="img-fluid border-radius-custom" />
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="featured-post-content">
                            <div class="post-meta mb-3">
                                <span class="badge bg-warning text-dark me-2">
                                    <i class="bi bi-star-fill me-1"></i>
                                    <?php esc_html_e('Featured', 'blueprint'); ?>
                                </span>
                                <?php if (get_the_category()) : ?>
                                    <span class="post-category me-2">
                                        <?php the_category(', '); ?>
                                    </span>
                                <?php endif; ?>
                                <span class="post-date text-muted">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    <?php echo get_the_date(); ?>
                                </span>
                            </div>
                            
                            <h2 class="h3 fw-bold mb-3">
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            
                            <div class="featured-post-excerpt text-muted mb-4">
                                <?php 
                                $excerpt = get_the_excerpt();
                                if (empty($excerpt)) {
                                    $excerpt = wp_trim_words(get_the_content(), 30);
                                }
                                echo wp_trim_words($excerpt, 30);
                                ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                                <?php esc_html_e('Read More', 'blueprint'); ?>
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>

            <!-- Blog Posts Grid -->
            <div class="blog-posts-container">
                <div class="row g-4" id="blog-posts-grid">
                    <?php
                    // Main blog query
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $blog_query = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 9,
                        'paged' => $paged,
                        'post_status' => 'publish',
                        'meta_query' => array(
                            'relation' => 'OR',
                            array(
                                'key' => '_featured_post',
                                'value' => '1',
                                'compare' => '!='
                            ),
                            array(
                                'key' => '_featured_post',
                                'compare' => 'NOT EXISTS'
                            )
                        )
                    ));

                    if ($blog_query->have_posts()) :
                        while ($blog_query->have_posts()) : $blog_query->the_post();
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <article class="blog-post-card">
                            <!-- Post Image -->
                            <div class="blog-post-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium', array('class' => 'img-fluid')); ?>
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/400x250/667eea/ffffff?text=<?php echo urlencode(get_the_title()); ?>" 
                                             alt="<?php the_title_attribute(); ?>" 
                                             class="img-fluid" />
                                    <?php endif; ?>
                                </a>
                                
                                <!-- Reading Time -->
                                <div class="reading-time position-absolute top-0 end-0 m-3">
                                    <span class="badge bg-dark bg-opacity-75">
                                        <?php 
                                        $word_count = str_word_count(strip_tags(get_the_content()));
                                        $reading_time = ceil($word_count / 200);
                                        echo $reading_time . ' min read';
                                        ?>
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Post Content -->
                            <div class="blog-post-content">
                                <!-- Meta Information -->
                                <div class="post-meta mb-3">
                                    <?php if (get_the_category()) : ?>
                                        <span class="post-category">
                                            <?php 
                                            $categories = get_the_category();
                                            if (!empty($categories)) {
                                                echo '<span class="badge bg-primary">' . esc_html($categories[0]->name) . '</span>';
                                            }
                                            ?>
                                        </span>
                                    <?php endif; ?>
                                    <span class="post-date text-muted small ms-2">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        <?php echo get_the_date(); ?>
                                    </span>
                                </div>
                                
                                <!-- Post Title -->
                                <h3 class="h5 fw-bold mb-3">
                                    <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                
                                <!-- Post Excerpt -->
                                <div class="post-excerpt text-muted mb-3">
                                    <?php 
                                    $excerpt = get_the_excerpt();
                                    if (empty($excerpt)) {
                                        $excerpt = wp_trim_words(get_the_content(), 20);
                                    }
                                    echo wp_trim_words($excerpt, 20);
                                    ?>
                                </div>
                                
                                <!-- Read More Link -->
                                <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary btn-sm">
                                    <?php esc_html_e('Read More', 'blueprint'); ?>
                                    <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </article>
                    </div>
                    <?php
                        endwhile;
                    else :
                    ?>
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="bi bi-journal-x display-4 text-muted mb-3"></i>
                            <h3 class="text-muted"><?php esc_html_e('No posts found', 'blueprint'); ?></h3>
                            <p class="text-muted"><?php esc_html_e('There are no blog posts to display at the moment.', 'blueprint'); ?></p>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Pagination -->
                <?php if ($blog_query->max_num_pages > 1) : ?>
                <div class="blog-pagination mt-5">
                    <nav aria-label="Blog pagination">
                        <?php
                        echo paginate_links(array(
                            'total' => $blog_query->max_num_pages,
                            'current' => $paged,
                            'prev_text' => '<i class="bi bi-chevron-left"></i> ' . __('Previous', 'blueprint'),
                            'next_text' => __('Next', 'blueprint') . ' <i class="bi bi-chevron-right"></i>',
                            'type' => 'list',
                            'end_size' => 2,
                            'mid_size' => 1,
                        ));
                        ?>
                    </nav>
                </div>
                <?php endif; ?>
                
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>

    <!-- Newsletter Subscription -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto text-center">
                    <h2 class="h3 fw-bold mb-3"><?php esc_html_e('Subscribe to Our Newsletter', 'blueprint'); ?></h2>
                    <p class="text-muted mb-4"><?php esc_html_e('Get the latest posts delivered right to your inbox', 'blueprint'); ?></p>
                    
                    <form class="newsletter-form d-flex gap-2" method="post">
                        <input type="email" 
                               class="form-control" 
                               placeholder="<?php esc_attr_e('Enter your email address', 'blueprint'); ?>" 
                               required>
                        <button type="submit" class="btn btn-primary px-4">
                            <?php esc_html_e('Subscribe', 'blueprint'); ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Blog JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.getElementById('post-search');
    const blogPosts = document.querySelectorAll('.blog-post-card');
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            
            blogPosts.forEach(function(post) {
                const postTitle = post.querySelector('h3 a').textContent.toLowerCase();
                const postExcerpt = post.querySelector('.post-excerpt').textContent.toLowerCase();
                
                if (postTitle.includes(searchTerm) || postExcerpt.includes(searchTerm)) {
                    post.closest('.col-lg-4').style.display = 'block';
                } else {
                    post.closest('.col-lg-4').style.display = 'none';
                }
            });
        });
    }
    
    // Filter functionality
    const filterBtns = document.querySelectorAll('.filter-btn');
    
    filterBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            filterBtns.forEach(function(b) {
                b.classList.remove('active');
            });
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Filter logic would go here
            // For now, just show all posts
            blogPosts.forEach(function(post) {
                post.closest('.col-lg-4').style.display = 'block';
            });
        });
    });
    
    // View toggle functionality
    const viewBtns = document.querySelectorAll('.view-btn');
    const blogGrid = document.getElementById('blog-posts-grid');
    
    viewBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            viewBtns.forEach(function(b) {
                b.classList.remove('active');
            });
            
            this.classList.add('active');
            
            const view = this.dataset.view;
            if (view === 'list') {
                blogGrid.classList.remove('row', 'g-4');
                blogGrid.classList.add('list-view');
            } else {
                blogGrid.classList.add('row', 'g-4');
                blogGrid.classList.remove('list-view');
            }
        });
    });
});
</script>

<?php get_footer(); ?>
