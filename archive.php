<?php get_header(); ?>

<!-- Enhanced Archive Hero Section -->
<section class="hero-section-advanced archive-hero">
    <div class="hero-overlay"></div>
    <div class="hero-particles"></div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge">
                <?php if (is_category()) : ?>
                    📂 Category
                <?php elseif (is_tag()) : ?>
                    🏷️ Tag
                <?php elseif (is_search()) : ?>
                    🔍 Search Results
                <?php else : ?>
                    📝 Blog Archive
                <?php endif; ?>
            </div>
            <h1 class="hero-title-fancy">
                <?php if (is_category()) : ?>
                    <?php single_cat_title(); ?>
                <?php elseif (is_tag()) : ?>
                    <?php single_tag_title(); ?>
                <?php elseif (is_search()) : ?>
                    Search Results for: "<?php echo get_search_query(); ?>"
                <?php else : ?>
                    Blog <span class="gradient-text">Archive</span>
                <?php endif; ?>
            </h1>
            <p class="hero-subtitle-fancy">
                <?php if (is_category()) : ?>
                    Explore all articles in the <?php single_cat_title(); ?> category
                <?php elseif (is_tag()) : ?>
                    Discover articles tagged with <?php single_tag_title(); ?>
                <?php elseif (is_search()) : ?>
                    Find articles matching your search criteria
                <?php else : ?>
                    Browse through all our articles, tips, and insights
                <?php endif; ?>
            </p>
            
            <?php if (have_posts()) : ?>
                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-number"><?php echo $wp_query->found_posts; ?></div>
                        <div class="stat-label">Articles Found</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number"><?php echo $wp_query->max_num_pages; ?></div>
                        <div class="stat-label">Pages</div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Archive Content Section -->
<section class="services-section-fancy archive-content">
    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="posts-filter">
                <div class="filter-buttons">
                    <button class="filter-btn active" data-filter="all">All Posts</button>
                    <button class="filter-btn" data-filter="recent">Recent</button>
                    <button class="filter-btn" data-filter="popular">Popular</button>
                    <button class="filter-btn" data-filter="featured">Featured</button>
                </div>
                
                <div class="search-box">
                    <input type="text" id="archive-search" placeholder="Search articles...">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            
            <div class="row" id="archive-posts-container">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-md-6 col-lg-4 d-flex">
                        <?php get_template_part('content-archive-card'); ?>
                    </div>
                <?php endwhile; ?>
            </div>
            
            <!-- Enhanced Pagination -->
            <nav class="pagination-enhanced" aria-label="Blog Pagination">
                <ul class="pagination justify-content-center">
                <?php
                $links = paginate_links(array(
                    'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                    'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
                    'type' => 'array',
                    'before_page_number' => '<span class="sr-only">Page </span>'
                ));
                if ($links) {
                    foreach ($links as $link) {
                        echo '<li class="page-item">' . str_replace('page-numbers', 'page-link', $link) . '</li>';
                    }
                }
                ?>
                </ul>
            </nav>
            
        <?php else : ?>
            <div class="no-posts">
                <div class="no-posts-content">
                    <div class="no-posts-icon">📝</div>
                    <h2>No posts found</h2>
                    <p>Sorry, no posts were found matching your criteria. Try searching for something else or browse our categories.</p>
                    <div class="no-posts-actions">
                        <a href="<?php echo home_url(); ?>" class="btn-primary-fancy">
                            <span>Go Home</span>
                            <i class="arrow-right">→</i>
                        </a>
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
/* Archive-specific styles */
.archive-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
}

.archive-content {
    background: var(--light-color);
}

.no-posts {
    text-align: center;
    padding: 5rem 0;
}

.no-posts-content {
    max-width: 500px;
    margin: 0 auto;
}

.no-posts-icon {
    font-size: 4rem;
    margin-bottom: 2rem;
    opacity: 0.5;
}

.no-posts h2 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: var(--text-primary);
}

.no-posts p {
    color: var(--text-secondary);
    margin-bottom: 2rem;
    line-height: 1.6;
}

.no-posts-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

/* Archive search functionality */
#archive-search {
    width: 100%;
    padding: 12px 45px 12px 20px;
    border: 2px solid var(--border-color);
    border-radius: 50px;
    font-size: 0.9rem;
    transition: var(--transition);
}

#archive-search:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

/* Archive filter functionality */
#archive-posts-container .post-card {
    transition: var(--transition);
}

#archive-posts-container .post-card.hidden {
    display: none;
}

@media (max-width: 768px) {
    .no-posts-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .no-posts-icon {
        font-size: 3rem;
    }
    
    .no-posts h2 {
        font-size: 1.5rem;
    }
}
</style>

<script>
// Archive page functionality
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.getElementById('archive-search');
    const postCards = document.querySelectorAll('#archive-posts-container .post-card');
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            
            postCards.forEach(card => {
                const title = card.querySelector('.post-title').textContent.toLowerCase();
                const excerpt = card.querySelector('.post-excerpt').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || excerpt.includes(searchTerm)) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        });
    }
    
    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            const filter = this.getAttribute('data-filter');
            
            // Add your filtering logic here
            // For now, just show all posts
            postCards.forEach(card => {
                card.classList.remove('hidden');
            });
        });
    });
    
    // Animate numbers on scroll
    const statNumbers = document.querySelectorAll('.stat-number');
    
    const animateNumbers = () => {
        statNumbers.forEach(stat => {
            const target = parseInt(stat.textContent);
            const current = parseInt(stat.textContent);
            
            if (current > 0) {
                let count = 0;
                const increment = target / 50;
                const timer = setInterval(() => {
                    count += increment;
                    if (count >= target) {
                        stat.textContent = target;
                        clearInterval(timer);
                    } else {
                        stat.textContent = Math.floor(count);
                    }
                }, 20);
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
});
</script>

<?php get_footer(); ?>
