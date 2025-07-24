<?php 
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 */

get_header(); ?>

<div class="main-content">
    <?php if (is_home() && !is_front_page()) : ?>
        <!-- Blog Index Page -->
        <div class="modern-blog-page">
            <!-- Blog Hero Section -->
            <section class="blog-hero" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 4rem 0 3rem; color: white; text-align: center;">
                <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
                    <h1 style="font-size: clamp(2rem, 4vw, 3rem); margin-bottom: 1rem; font-weight: 700;">
                        Latest Blog Posts
                    </h1>
                    <p style="font-size: 1.1rem; opacity: 0.9; max-width: 500px; margin: 0 auto;">
                        Stay updated with our latest insights and stories.
                    </p>
                </div>
            </section>

            <!-- Blog Content -->
            <main class="blog-main" style="padding: 4rem 0; background: #f8f9fa;">
                <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
                    
                    <?php if (have_posts()) : ?>
                        
                        <!-- Blog Grid -->
                        <div class="blog-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem; margin-bottom: 3rem;">
                            
                            <?php while (have_posts()) : the_post(); ?>
                                
                                <article class="blog-card" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                                    
                                    <!-- Featured Image -->
                                    <div class="blog-card-image" style="height: 200px; background: linear-gradient(135deg, #667eea, #764ba2); position: relative; overflow: hidden;">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('medium', array('style' => 'width: 100%; height: 100%; object-fit: cover;')); ?>
                                        <?php elseif (get_post_meta(get_the_ID(), '_thumbnail_url', true)) : ?>
                                            <img src="<?php echo esc_url(get_post_meta(get_the_ID(), '_thumbnail_url', true)); ?>" 
                                                 alt="<?php the_title_attribute(); ?>" 
                                                 style="width: 100%; height: 100%; object-fit: cover;">
                                        <?php else : ?>
                                            <div style="display: flex; align-items: center; justify-content: center; height: 100%; color: white; font-size: 3rem;">
                                                📄
                                            </div>
                                        <?php endif; ?>
                                        
                                        <!-- Category Badge -->
                                        <div class="category-badge" style="position: absolute; top: 15px; left: 15px; background: rgba(255,255,255,0.9); color: #333; padding: 5px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: 600;">
                                            <?php 
                                            $categories = get_the_category();
                                            if (!empty($categories)) {
                                                echo esc_html($categories[0]->name);
                                            } else {
                                                echo 'Blog';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    
                                    <!-- Card Content -->
                                    <div class="blog-card-content" style="padding: 1.5rem;">
                                        
                                        <!-- Post Meta -->
                                        <div class="post-meta" style="display: flex; align-items: center; gap: 15px; margin-bottom: 1rem; font-size: 0.9rem; color: #666;">
                                            <span class="post-date">
                                                📅 <?php echo get_the_date(); ?>
                                            </span>
                                            <span class="post-author">
                                                👤 <?php the_author(); ?>
                                            </span>
                                        </div>
                                        
                                        <!-- Post Title -->
                                        <h2 class="blog-card-title" style="font-size: 1.3rem; font-weight: 700; margin-bottom: 1rem; line-height: 1.4;">
                                            <a href="<?php the_permalink(); ?>" style="color: #2d3748; text-decoration: none; transition: color 0.3s ease;">
                                                <?php the_title(); ?>
                                            </a>
                                        </h2>
                                        
                                        <!-- Post Excerpt -->
                                        <div class="blog-card-excerpt" style="color: #4a5568; line-height: 1.6; margin-bottom: 1.5rem;">
                                            <?php 
                                            if (has_excerpt()) {
                                                echo wp_trim_words(get_the_excerpt(), 15, '...');
                                            } else {
                                                echo wp_trim_words(get_the_content(), 15, '...');
                                            }
                                            ?>
                                        </div>
                                        
                                        <!-- Read More Button -->
                                        <a href="<?php the_permalink(); ?>" class="read-more-btn" style="display: inline-flex; align-items: center; gap: 8px; background: linear-gradient(135deg, #667eea, #764ba2); color: white; padding: 10px 20px; border-radius: 25px; text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: transform 0.3s ease;">
                                            Read More →
                                        </a>
                                        
                                    </div>
                                </article>
                                
                            <?php endwhile; ?>
                            
                        </div>
                        
                        <!-- Pagination -->
                        <div class="blog-pagination" style="text-align: center; padding: 2rem 0;">
                            <?php
                            the_posts_pagination(array(
                                'mid_size' => 2,
                                'prev_text' => '← Previous',
                                'next_text' => 'Next →',
                            ));
                            ?>
                        </div>
                        
                    <?php else : ?>
                        
                        <!-- No Posts Found -->
                        <div class="no-posts" style="text-align: center; padding: 4rem 2rem; background: white; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                            <div style="font-size: 4rem; margin-bottom: 2rem;">📝</div>
                            <h2 style="font-size: 2rem; margin-bottom: 1rem; color: #4a5568;">No Posts Found</h2>
                            <p style="color: #718096; font-size: 1.1rem; margin-bottom: 2rem;">It looks like there are no blog posts yet. Check back later for fresh content!</p>
                            <a href="<?php echo esc_url(home_url('/')); ?>" style="display: inline-flex; align-items: center; gap: 8px; background: linear-gradient(135deg, #667eea, #764ba2); color: white; padding: 12px 24px; border-radius: 25px; text-decoration: none; font-weight: 600;">
                                🏠 Back to Home
                            </a>
                        </div>
                        
                    <?php endif; ?>
                    
                </div>
            </main>
        </div>
        
    <?php else : ?>
        <!-- Default Content (for other pages) -->
        <main class="site-main">
            <div class="container">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="entry-header">
                                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                            </header>
                            
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>No content found.</p>
                <?php endif; ?>
            </div>
        </main>
    <?php endif; ?>
</div>

<style>
/* Blog Card Hover Effects */
.blog-card:hover {
    transform: translateY(-8px) !important;
    box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
}

.blog-card:hover .blog-card-title a {
    color: #667eea !important;
}

.read-more-btn:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4) !important;
}

/* Responsive Design */
@media (max-width: 768px) {
    .blog-grid {
        grid-template-columns: 1fr !important;
        gap: 1.5rem !important;
    }
    
    .blog-hero {
        padding: 3rem 0 2rem !important;
    }
    
    .blog-main {
        padding: 3rem 0 !important;
    }
    
    .blog-card-content {
        padding: 1.25rem !important;
    }
    
    .post-meta {
        flex-direction: column !important;
        align-items: flex-start !important;
        gap: 8px !important;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 15px !important;
    }
    
    .blog-card-image {
        height: 180px !important;
    }
    
    .blog-card-title {
        font-size: 1.2rem !important;
    }
}

/* Pagination Styling */
.page-numbers {
    display: inline-block;
    padding: 10px 15px;
    margin: 0 5px;
    background: white;
    color: #667eea;
    text-decoration: none;
    border-radius: 8px;
    border: 2px solid #e2e8f0;
    font-weight: 600;
    transition: all 0.3s ease;
}

.page-numbers:hover,
.page-numbers.current {
    background: #667eea;
    color: white;
    border-color: #667eea;
    transform: translateY(-2px);
}

.page-numbers.prev,
.page-numbers.next {
    padding: 10px 20px;
}
</style>

<?php get_footer(); ?>
