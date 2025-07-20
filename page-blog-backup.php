<?php
/*
Template Name: Blog Page
*/
get_header(); 

// Enqueue blog layout CSS
wp_enqueue_style('blog-layout-fixes', get_template_directory_uri() . '/css/blog-layout-fixes.css', array(), '2.0');

// Enqueue blog inline styles
wp_enqueue_style('page-blog-inline', get_template_directory_uri() . '/css/page-blog-inline.css', array(), '1.0');

// Enqueue Font Awesome for icons
wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0');
?>

<!-- Blog Header Section -->
<div class="content-section">
    <div class="container">
        <div class="blog-header">
            <div class="blog-header-content">
                <h1>Our Blog</h1>
                <p>Insights, updates, and stories from our team</p>
                
                <!-- Search Box -->
                <div class="blog-search-container">
                    <div class="search-box">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" id="post-search" placeholder="Search articles...">
                    </div>
                </div>
            </div>
        </div>

        <div class="blog-container">
            <!-- Category and Filter Section -->
            <div class="blog-filter-section">
        <div class="filter-categories">
            <button class="filter-btn active" data-filter="all">All Posts</button>
            <button class="filter-btn" data-filter="recent">Recent</button>
            <button class="filter-btn" data-filter="popular">Popular</button>
            <button class="filter-btn" data-filter="featured">Featured</button>
        </div>
        
        <div class="view-options">
            <button class="view-btn active" data-view="grid"><i class="fas fa-th"></i></button>
            <button class="view-btn" data-view="list"><i class="fas fa-list"></i></button>
        </div>
    </div>
    
    <!-- Featured Post (if available) -->
    <?php
    // Get featured post (most recent post with featured tag/category)
    $featured_query = new WP_Query(array(
        'posts_per_page' => 1,
        'meta_key' => '_featured_post',
        'meta_value' => '1',
        'post_status' => 'publish'
    ));
    
    if ($featured_query->have_posts()) :
        while ($featured_query->have_posts()) : $featured_query->the_post();
    ?>
    <div class="featured-post">
        <div class="featured-post-image">
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('desktop-featured'); ?>
                <?php else: ?>
                <img src="https://via.placeholder.com/1200x600/6c5ce7/ffffff?text=<?php echo urlencode(get_the_title()); ?>" alt="<?php the_title(); ?>" />
                <?php endif; ?>
            </a>
        </div>
        
        <div class="featured-post-content">
            <div class="post-meta">
                <span class="featured-label"><i class="fas fa-star"></i> Featured</span>
                <?php if (get_the_category()) : ?>
                    <span class="post-category">
                        <?php the_category(', '); ?>
                    </span>
                <?php endif; ?>
                <span class="post-date">
                    <i class="far fa-calendar-alt"></i> <?php echo get_the_date(); ?>
                </span>
            </div>
            
            <h2 class="featured-post-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            
            <div class="featured-post-excerpt">
                <?php 
                $excerpt = get_the_excerpt();
                if (empty($excerpt)) {
                    $excerpt = wp_trim_words(get_the_content(), 40);
                }
                echo wp_trim_words($excerpt, 40);
                ?>
            </div>
            
            <div class="post-footer">
                <div class="post-author">
                    <?php echo get_avatar(get_the_author_meta('ID'), 32); ?>
                    <span><?php the_author(); ?></span>
                </div>
                
                <a href="<?php the_permalink(); ?>" class="read-more-btn">
                    Read Article <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
    <?php 
        endwhile;
        wp_reset_postdata();
    endif;
    ?>
    
    <!-- Blog Posts Grid -->
    <div class="posts-grid">
        <?php
        // Get all posts
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $posts_query = new WP_Query(array(
            'posts_per_page' => 9,
            'paged' => $paged,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_status' => 'publish',
            // Exclude featured post if it exists
            'meta_query' => array(
                array(
                    'key' => '_featured_post',
                    'compare' => 'NOT EXISTS'
                ),
            )
        ));
        
        if ($posts_query->have_posts()) :
            while ($posts_query->have_posts()) : $posts_query->the_post();
                
                // Calculate reading time
                $content = get_the_content();
                $word_count = str_word_count(strip_tags($content));
                $reading_time = ceil($word_count / 200); // Assuming 200 words per minute
        ?>
            <div class="post-card">
                <div class="post-thumbnail">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('blueprint-thumbnail'); ?>
                        <?php else: ?>
                        <img src="https://via.placeholder.com/600x400/6c5ce7/ffffff?text=<?php echo urlencode(get_the_title()); ?>" alt="<?php the_title(); ?>" />
                        <?php endif; ?>
                    </a>
                    
                    <?php 
                    // Display first category with color
                    $categories = get_the_category();
                    if (!empty($categories)) :
                        $category = $categories[0];
                        // Generate a color based on category ID for consistency
                        $colors = array('#6c5ce7', '#e17055', '#00b894', '#fdcb6e', '#0984e3', '#e84393');
                        $color_index = $category->term_id % count($colors);
                        $category_color = $colors[$color_index];
                    ?>
                    <span class="card-category" data-color="<?php echo $category_color; ?>">
                        <?php echo $category->name; ?>
                    </span>
                    <?php endif; ?>
                </div>
                
                <div class="post-content">
                    <div class="post-meta">
                        <span class="post-date">
                            <i class="far fa-calendar-alt"></i> <?php echo get_the_date(); ?>
                        </span>
                        <span class="reading-time">
                            <i class="far fa-clock"></i> <?php echo $reading_time; ?> min read
                        </span>
                    </div>
                    
                    <h3 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    
                    <div class="post-excerpt">
                        <?php 
                        $excerpt = get_the_excerpt();
                        if (empty($excerpt)) {
                            $excerpt = wp_trim_words(get_the_content(), 20);
                        }
                        echo wp_trim_words($excerpt, 20);
                        ?>
                    </div>
                    
                    <div class="post-footer">
                        <div class="post-author">
                        <!-- Author avatar and name removed for cleaner layout -->
                        </div>
                        
                        <a href="<?php the_permalink(); ?>" class="read-more-btn">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        <?php 
            endwhile;
        else:
        ?>
            <div class="no-posts-message">
                <i class="fas fa-info-circle"></i><br>
                No blog posts found. Please check back later!
            </div>
        <?php
            for ($i = 1; $i <= 6; $i++) :
                // Generate a random color for sample categories
                $colors = array('#6c5ce7', '#e17055', '#00b894', '#fdcb6e', '#0984e3', '#e84393');
                $color_index = $i % count($colors);
                $category_color = $colors[$color_index];
                $categories = array('Technology', 'Business', 'Design', 'Marketing', 'Development', 'News');
                $category = $categories[$i % count($categories)];
        ?>
            <div class="post-card">
                <div class="post-thumbnail">
                    <a href="#">
                        <img src="https://via.placeholder.com/600x400/6c5ce7/ffffff?text=Sample+Blog+Post+<?php echo $i; ?>" alt="Sample Blog Post <?php echo $i; ?>" />
                    </a>
                    <span class="card-category" data-color="<?php echo $category_color; ?>">
                        <?php echo $category; ?>
                    </span>
                </div>
                
                <div class="post-content">
                    <div class="post-meta">
                        <span class="post-date">
                            <i class="far fa-calendar-alt"></i> <?php echo date('F j, Y'); ?>
                        </span>
                        <span class="reading-time">
                            <i class="far fa-clock"></i> 5 min read
                        </span>
                    </div>
                    
                    <h3 class="post-title">
                        <a href="#">Sample Blog Post <?php echo $i; ?></a>
                    </h3>
                    
                    <div class="post-excerpt">
                        This is a sample blog post excerpt. It provides a brief overview of what the full blog post contains and entices readers to click through to read more.
                    </div>
                    
                    <div class="post-footer">
                        <div class="post-author">
                            <img src="https://via.placeholder.com/24x24/6c5ce7/ffffff?text=A" alt="Author" />
                            <span>John Doe</span>
                        </div>
                        
                        <a href="#" class="read-more-btn">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        <?php 
            endfor;
        endif;
        wp_reset_postdata();
        ?>
    </div>
    
    <!-- Pagination -->
    <?php if ($posts_query->max_num_pages > 1) : ?>
        <div class="pagination">
            <?php
            echo paginate_links(array(
                'total' => $posts_query->max_num_pages,
                'current' => $paged,
                'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
            ));
            ?>
        </div>
    <?php endif; ?>
    
    <!-- Newsletter Signup -->
    <div class="blog-newsletter">
        <div class="newsletter-content">
            <h3>Subscribe to Our Newsletter</h3>
            <p>Get the latest posts delivered right to your inbox</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Your email address" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    const postCards = document.querySelectorAll('.post-card');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => {
                btn.classList.remove('active');
            });
            
            // Add active class to clicked button
            this.classList.add('active');
            
            const filter = this.getAttribute('data-filter');
            
            // Simple filtering logic
            if (filter === 'all') {
                postCards.forEach(card => {
                    card.style.display = 'block';
                });
            } else if (filter === 'recent') {
                postCards.forEach((card, index) => {
                    card.style.display = index < 3 ? 'block' : 'none';
                });
            } else if (filter === 'popular') {
                postCards.forEach((card, index) => {
                    card.style.display = index % 2 === 0 ? 'block' : 'none';
                });
            } else if (filter === 'featured') {
                postCards.forEach((card, index) => {
                    card.style.display = index % 3 === 0 ? 'block' : 'none';
                });
            }
        });
    });
    
    // View toggle functionality
    const viewButtons = document.querySelectorAll('.view-btn');
    const postsGrid = document.querySelector('.posts-grid');
    
    viewButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            viewButtons.forEach(btn => {
                btn.classList.remove('active');
            });
            
            // Add active class to clicked button
            this.classList.add('active');
            
            const view = this.getAttribute('data-view');
            
            // Toggle grid/list view
            if (view === 'grid') {
                postsGrid.classList.remove('list-view');
                postsGrid.classList.add('grid-view');
            } else if (view === 'list') {
                postsGrid.classList.remove('grid-view');
                postsGrid.classList.add('list-view');
            }
        });
    });
    
    // Search functionality
    const searchInput = document.getElementById('post-search');
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            
            postCards.forEach(card => {
                const title = card.querySelector('.post-title').textContent.toLowerCase();
                const excerpt = card.querySelector('.post-excerpt').textContent.toLowerCase();
                const category = card.querySelector('.card-category');
                const categoryText = category ? category.textContent.toLowerCase() : '';
                
                if (title.includes(searchTerm) || 
                    excerpt.includes(searchTerm) || 
                    categoryText.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }
});
</script>

<?php get_footer(); ?>
