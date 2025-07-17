<?php
/*
Template Name: Blog Page
*/
get_header(); 

// Enqueue blog layout fixes CSS
wp_enqueue_style('blog-layout-fixes', get_template_directory_uri() . '/blog-layout-fixes.css');
?>

<!-- Enhanced Blog Hero Section -->
<section class="hero-section-advanced blog-hero" style="background:linear-gradient(120deg,#5a7cff 0%,#4F8EF7 50%,#6a82fb 100%);padding:4.5rem 0 3.5rem 0;position:relative;overflow:hidden;">
    <div class="container" style="position:relative;z-index:2;">
        <div class="blog-archive-header" style="max-width:800px;margin:auto;text-align:center;color:#fff;">
            <div class="blog-archive-badge" style="display:inline-block;background:#fff;color:#4F8EF7;padding:0.7rem 2.2rem;border-radius:2rem;font-weight:700;margin-bottom:2.2rem;box-shadow:0 4px 24px rgba(79,142,247,0.13);letter-spacing:0.5px;font-size:1.08rem;">Complete Blog Archive</div>
            <h1 class="blog-archive-title" style="font-size:2.7rem;font-weight:900;line-height:1.1;margin-bottom:1.2rem;letter-spacing:-1px;">Complete <span class="gradient-text" style="background:linear-gradient(90deg,#fff,#e0e7ff 80%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">Blog Archive</span></h1>
            <p class="blog-archive-subtitle" style="font-size:1.22rem;margin-bottom:2.5rem;color:rgba(255,255,255,0.96);font-weight:500;text-shadow:0 2px 8px rgba(79,142,247,0.10);">Browse through all our articles, tips, and insights</p>
        </div>
    </div>
</section>

<!-- Blog Categories Section -->
<section class="services-section-fancy blog-categories">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Categories</div>
            <h2 class="section-title-fancy">Explore by <span class="gradient-text">Topic</span></h2>
            <p class="section-subtitle-fancy">Find articles that match your interests and needs</p>
        </div>
        
        <div class="categories-grid">
            <?php
            $categories = get_categories(array(
                'orderby' => 'count',
                'order' => 'DESC',
                'number' => 8
            ));
            
            foreach ($categories as $category) :
                $category_link = get_category_link($category->term_id);
                $category_count = $category->count;
            ?>
                <a href="<?php echo esc_url($category_link); ?>" class="category-card">
                    <div class="category-icon">
                        <?php
                        // Assign icons based on category name
                        $icon_map = array(
                            'cleaning' => '🧹',
                            'maintenance' => '🔧',
                            'business' => '💼',
                            'technology' => '💻',
                            'lifestyle' => '🌟',
                            'tips' => '💡',
                            'news' => '📰',
                            'guides' => '📚'
                        );
                        
                        $category_slug = strtolower($category->slug);
                        $icon = '📝'; // default icon
                        
                        foreach ($icon_map as $keyword => $cat_icon) {
                            if (strpos($category_slug, $keyword) !== false) {
                                $icon = $cat_icon;
                                break;
                            }
                        }
                        echo $icon;
                        ?>
                    </div>
                    <h3><?php echo esc_html($category->name); ?></h3>
                    <p class="category-count"><?php echo $category_count; ?> articles</p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Featured Posts Section -->
<section id="featured-posts" class="featured-blueprints-section featured-posts">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Featured</div>
            <h2 class="section-title-fancy">Latest <span class="gradient-text">Articles</span></h2>
            <p class="section-subtitle-fancy">Stay updated with our most recent insights and expert advice</p>
        </div>
        
        <div class="featured-posts-grid">
            <?php
            $featured_posts = new WP_Query(array(
                'posts_per_page' => 6,
                'meta_key' => '_is_featured',
                'meta_value' => 'yes'
            ));
            
            if (!$featured_posts->have_posts()) {
                $featured_posts = new WP_Query(array(
                    'posts_per_page' => 6,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
            }
            
            if ($featured_posts->have_posts()) :
                while ($featured_posts->have_posts()) : $featured_posts->the_post();
            ?>
                <article class="blog-post-card <?php echo ($featured_posts->current_post === 0) ? 'featured' : ''; ?>" style="background:#fff;border-radius:1.25rem;box-shadow:0 8px 32px rgba(79,142,247,0.10);padding:2.25rem 1.75rem;display:flex;flex-direction:column;justify-content:space-between;min-height:420px;overflow:hidden;">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail" style="width:100%;height:220px;overflow:hidden;border-radius:1rem 1rem 0 0;margin-bottom:1.2rem;background:#f8fafd;display:flex;align-items:center;justify-content:center;">
                            <a href="<?php the_permalink(); ?>" style="display:block;width:100%;height:100%;">
                                <?php the_post_thumbnail('medium_large', array('style'=>'width:100%;height:100%;object-fit:cover;object-position:center;')); ?>
                            </a>
                            <div class="post-overlay"></div>
                        </div>
                    <?php endif; ?>
                    
                    <div class="post-content" style="flex:1;display:flex;flex-direction:column;justify-content:space-between;">
                        <div class="post-meta" style="font-size:0.98rem;color:#4F8EF7;margin-bottom:0.7rem;display:flex;gap:1.2rem;flex-wrap:wrap;align-items:center;">
                            <span class="post-date">
                                <i class="fas fa-calendar"></i>
                                <?php echo get_the_date(); ?>
                            </span>
                            <span class="post-author">
                                <i class="fas fa-user"></i>
                                <?php the_author(); ?>
                            </span>
                            <?php if (get_the_category()) : ?>
                                <span class="post-category">
                                    <i class="fas fa-folder"></i>
                                    <?php the_category(', '); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        
                        <h3 class="post-title" style="font-size:1.35rem;font-weight:700;margin:0.5rem 0 0.7rem 0;line-height:1.3;">
                            <a href="<?php the_permalink(); ?>" style="color:#222;text-decoration:none;transition:color 0.2s;"><?php the_title(); ?></a>
                        </h3>
                        
                        <div class="post-excerpt" style="color:#555;font-size:1.05rem;line-height:1.7;margin-bottom:1.1rem;">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <div class="post-footer" style="display:flex;align-items:center;justify-content:space-between;margin-top:auto;">
                            <a href="<?php the_permalink(); ?>" class="read-more-btn" style="color:#4F8EF7;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:0.3rem;transition:color 0.2s;">
                                <span>Read More</span>
                                <i class="arrow-right">→</i>
                            </a>
                            <div class="post-stats" style="display:flex;gap:1.1rem;font-size:0.98rem;color:#888;">
                                <span class="stat">
                                    <i class="fas fa-eye"></i>
                                    <?php echo get_post_views(get_the_ID()); ?>
                                </span>
                                <span class="stat">
                                    <i class="fas fa-comment"></i>
                                    <?php echo get_comments_number(); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </article>
            <?php 
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<!-- All Posts Section -->
<section class="services-section-fancy all-posts">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">All Articles</div>
            <h2 class="section-title-fancy">Complete <span class="gradient-text">Blog Archive</span></h2>
            <p class="section-subtitle-fancy">Browse through all our articles, tips, and insights</p>
        </div>
        
        <div class="posts-filter">
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">All Posts</button>
                <button class="filter-btn" data-filter="recent">Recent</button>
                <button class="filter-btn" data-filter="popular">Popular</button>
                <button class="filter-btn" data-filter="featured">Featured</button>
            </div>
            
            <div class="search-box">
                <input type="text" id="post-search" placeholder="Search articles...">
                <i class="fas fa-search"></i>
            </div>
        </div>
        
        <div class="posts-grid" id="posts-container">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $posts_query = new WP_Query(array(
                'posts_per_page' => 12,
                'paged' => $paged,
                'orderby' => 'date',
                'order' => 'DESC'
            ));
            
            if ($posts_query->have_posts()) :
                while ($posts_query->have_posts()) : $posts_query->the_post();
            ?>
                <article class="post-card" data-category="<?php echo get_the_category_list(',', '', get_the_ID()); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                            <div class="post-overlay"></div>
                        </div>
                    <?php endif; ?>
                    
                    <div class="post-content">
                        <div class="post-meta">
                            <span class="post-date">
                                <i class="fas fa-calendar"></i>
                                <?php echo get_the_date(); ?>
                            </span>
                            <?php if (get_the_category()) : ?>
                                <span class="post-category">
                                    <i class="fas fa-folder"></i>
                                    <?php the_category(', '); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        
                        <h3 class="post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        
                        <div class="post-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <div class="post-footer">
                            <a href="<?php the_permalink(); ?>" class="read-more-btn">
                                <span>Read More</span>
                                <i class="arrow-right">→</i>
                            </a>
                            <div class="post-stats">
                                <span class="stat">
                                    <i class="fas fa-eye"></i>
                                    <?php echo get_post_views(get_the_ID()); ?>
                                </span>
                                <span class="stat">
                                    <i class="fas fa-comment"></i>
                                    <?php echo get_comments_number(); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </article>
            <?php 
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
        
        <!-- Pagination -->
        <?php if ($posts_query->max_num_pages > 1) : ?>
            <div class="pagination-enhanced">
                <?php
                echo paginate_links(array(
                    'total' => $posts_query->max_num_pages,
                    'current' => $paged,
                    'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                    'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
                    'type' => 'array'
                ));
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Newsletter Section -->
<section id="newsletter" class="cta-section-fancy newsletter-section">
    <div class="container">
        <div class="cta-content-fancy">
            <div class="cta-badge">Stay Updated</div>
            <h2 class="cta-title-fancy">Subscribe to Our <span class="gradient-text">Newsletter</span></h2>
            <p class="cta-subtitle-fancy">Get the latest articles, tips, and industry insights delivered directly to your inbox. No spam, just valuable content.</p>
            
            <form class="newsletter-form" action="#" method="post">
                <div class="form-group">
                    <input type="email" name="email" placeholder="Enter your email address" required>
                    <button type="submit" class="btn-primary-fancy">
                        <span>Subscribe</span>
                        <i class="arrow-right">→</i>
                    </button>
                </div>
                <div class="form-checkbox">
                    <input type="checkbox" id="newsletter-consent" required>
                    <label for="newsletter-consent">I agree to receive email updates and newsletters</label>
                </div>
            </form>
            
            <div class="newsletter-benefits">
                <div class="benefit-item">
                    <span class="benefit-icon">📅</span>
                    <span>Weekly Updates</span>
                </div>
                <div class="benefit-item">
                    <span class="benefit-icon">🎯</span>
                    <span>Expert Tips</span>
                </div>
                <div class="benefit-item">
                    <span class="benefit-icon">🚀</span>
                    <span>Industry Insights</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Popular Tags Section -->
<section class="services-section-fancy popular-tags">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Tags</div>
            <h2 class="section-title-fancy">Popular <span class="gradient-text">Topics</span></h2>
            <p class="section-subtitle-fancy">Explore articles by popular tags and topics</p>
        </div>
        
        <div class="tags-cloud">
            <?php
            $tags = get_tags(array(
                'orderby' => 'count',
                'order' => 'DESC',
                'number' => 20
            ));
            
            if ($tags) :
                foreach ($tags as $tag) :
                    $tag_link = get_tag_link($tag->term_id);
            ?>
                <a href="<?php echo esc_url($tag_link); ?>" class="tag-item">
                    <span class="tag-name"><?php echo esc_html($tag->name); ?></span>
                    <span class="tag-count"><?php echo $tag->count; ?></span>
                </a>
            <?php 
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<script>
// Enhanced JavaScript for blog page
document.addEventListener('DOMContentLoaded', function() {
    // Animate numbers on scroll
    const statNumbers = document.querySelectorAll('.stat-number[data-count]');
    
    const animateNumbers = () => {
        statNumbers.forEach(stat => {
            const target = parseInt(stat.getAttribute('data-count'));
            const current = parseInt(stat.textContent);
            const increment = target / 100;
            
            if (current < target) {
                stat.textContent = Math.ceil(current + increment);
                setTimeout(animateNumbers, 20);
            } else {
                stat.textContent = target;
            }
        });
    };
    
    // Trigger animation when stats are visible
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateNumbers();
                observer.unobserve(entry.target);
            }
        });
    });
    
    const statsSection = document.querySelector('.hero-stats');
    if (statsSection) {
        observer.observe(statsSection);
    }
    
    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    const postsContainer = document.getElementById('posts-container');
    const postCards = document.querySelectorAll('.post-card');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            const filter = this.getAttribute('data-filter');
            
            // Show/hide posts based on filter
            postCards.forEach(card => {
                if (filter === 'all') {
                    card.style.display = 'block';
                } else {
                    // Add your filtering logic here
                    card.style.display = 'block';
                }
            });
        });
    });
    
    // Search functionality
    const searchInput = document.getElementById('post-search');
    
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        postCards.forEach(card => {
            const title = card.querySelector('.post-title').textContent.toLowerCase();
            const excerpt = card.querySelector('.post-excerpt').textContent.toLowerCase();
            
            if (title.includes(searchTerm) || excerpt.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
    
    // Blog post cards hover effect
    const blogCards = document.querySelectorAll('.blog-post-card, .post-card');
    blogCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
            this.style.boxShadow = '0 20px 40px rgba(102, 126, 234, 0.2)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 10px 30px rgba(0, 0, 0, 0.1)';
        });
    });
    
    // Category cards interaction
    const categoryCards = document.querySelectorAll('.category-card');
    categoryCards.forEach(card => {
        card.addEventListener('click', function() {
            // Add click effect
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);
        });
    });
    
    // Newsletter form submission
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = this.querySelector('input[type="email"]').value;
            const consent = this.querySelector('input[type="checkbox"]').checked;
            
            if (email && consent) {
                // Add your newsletter subscription logic here
                alert('Thank you for subscribing to our newsletter!');
                this.reset();
            } else {
                alert('Please fill in all required fields.');
            }
        });
    }
    
    // Tag items interaction
    const tagItems = document.querySelectorAll('.tag-item');
    tagItems.forEach(tag => {
        tag.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
        });
        
        tag.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
});

// Helper function to get post views (you'll need to implement this)
function get_post_views(post_id) {
    // This is a placeholder - implement your view counting logic
    return Math.floor(Math.random() * 1000) + 100;
}
</script>

<?php get_footer(); ?> 