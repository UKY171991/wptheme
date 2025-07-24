<?php
/**
 * Template Name: Modern Blog
 * Description: A clean, modern blog layout with card grid design
 */

get_header(); ?>

<div class="modern-blog-page">
    <!-- Blog Hero Section -->
    <section class="blog-hero" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 6rem 0 4rem; color: white; text-align: center;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <h1 style="font-size: clamp(2.5rem, 5vw, 4rem); margin-bottom: 1rem; font-weight: 700;">
                Latest Stories & Insights
            </h1>
            <p style="font-size: 1.2rem; opacity: 0.9; max-width: 600px; margin: 0 auto;">
                Discover the latest trends, tips, and insights in web development, design, and technology.
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
                        
                        <article class="blog-card" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; position: relative;">
                            
                            <!-- Featured Image -->
                            <div class="blog-card-image" style="height: 250px; background: linear-gradient(135deg, #667eea, #764ba2); position: relative; overflow: hidden;">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: 100%; object-fit: cover;')); ?>
                                <?php elseif (get_post_meta(get_the_ID(), '_thumbnail_url', true)) : ?>
                                    <img src="<?php echo esc_url(get_post_meta(get_the_ID(), '_thumbnail_url', true)); ?>" 
                                         alt="<?php the_title_attribute(); ?>" 
                                         style="width: 100%; height: 100%; object-fit: cover;">
                                <?php else : ?>
                                    <div style="display: flex; align-items: center; justify-content: center; height: 100%; color: white;">
                                        <svg width="60" height="60" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                                        </svg>
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
                            <div class="blog-card-content" style="padding: 2rem;">
                                
                                <!-- Post Meta -->
                                <div class="post-meta" style="display: flex; align-items: center; gap: 15px; margin-bottom: 1rem; font-size: 0.9rem; color: #666;">
                                    <span class="post-date" style="display: flex; align-items: center; gap: 5px;">
                                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                        </svg>
                                        <?php echo get_the_date(); ?>
                                    </span>
                                    
                                    <span class="post-author" style="display: flex; align-items: center; gap: 5px;">
                                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                        </svg>
                                        <?php the_author(); ?>
                                    </span>
                                </div>
                                
                                <!-- Post Title -->
                                <h2 class="blog-card-title" style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1rem; line-height: 1.4;">
                                    <a href="<?php the_permalink(); ?>" style="color: #2d3748; text-decoration: none; transition: color 0.3s ease;">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                
                                <!-- Post Excerpt -->
                                <div class="blog-card-excerpt" style="color: #4a5568; line-height: 1.6; margin-bottom: 1.5rem;">
                                    <?php 
                                    if (has_excerpt()) {
                                        echo wp_trim_words(get_the_excerpt(), 20, '...');
                                    } else {
                                        echo wp_trim_words(get_the_content(), 20, '...');
                                    }
                                    ?>
                                </div>
                                
                                <!-- Tags -->
                                <?php $tags = get_the_tags(); ?>
                                <?php if ($tags) : ?>
                                    <div class="post-tags" style="margin-bottom: 1.5rem;">
                                        <?php foreach (array_slice($tags, 0, 3) as $tag) : ?>
                                            <span class="tag" style="display: inline-block; background: #e2e8f0; color: #4a5568; padding: 3px 8px; border-radius: 12px; font-size: 0.8rem; margin-right: 8px; margin-bottom: 5px;">
                                                #<?php echo esc_html($tag->name); ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- Read More Button -->
                                <a href="<?php the_permalink(); ?>" class="read-more-btn" style="display: inline-flex; align-items: center; gap: 8px; background: linear-gradient(135deg, #667eea, #764ba2); color: white; padding: 12px 24px; border-radius: 25px; text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                                    Read More
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
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
                    <svg width="80" height="80" fill="#cbd5e0" viewBox="0 0 20 20" style="margin-bottom: 2rem;">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm0 2v8h12V6H4zm2 2h8v2H6V8zm0 4h4v2H6v-2z" clip-rule="evenodd"></path>
                    </svg>
                    <h2 style="font-size: 2rem; margin-bottom: 1rem; color: #4a5568;">No Posts Found</h2>
                    <p style="color: #718096; font-size: 1.1rem; margin-bottom: 2rem;">It looks like there are no blog posts yet. Check back later for fresh content!</p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="home-btn" style="display: inline-flex; align-items: center; gap: 8px; background: linear-gradient(135deg, #667eea, #764ba2); color: white; padding: 12px 24px; border-radius: 25px; text-decoration: none; font-weight: 600;">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Back to Home
                    </a>
                </div>
                
            <?php endif; ?>
            
        </div>
    </main>
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
        padding: 4rem 0 3rem !important;
    }
    
    .blog-main {
        padding: 3rem 0 !important;
    }
    
    .blog-card-content {
        padding: 1.5rem !important;
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
        height: 200px !important;
    }
    
    .blog-card-title {
        font-size: 1.3rem !important;
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
