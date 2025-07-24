<?php
/**
 * Single Post Template
 * Modern design for individual blog posts
 */

get_header(); ?>

<div class="single-post-modern">
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Post Hero Section -->
        <section class="post-hero" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 4rem 0; color: white; position: relative; overflow: hidden;">
            <div class="hero-pattern" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-image: radial-gradient(circle at 25% 25%, rgba(255,255,255,0.1) 0%, transparent 50%), radial-gradient(circle at 75% 75%, rgba(255,255,255,0.1) 0%, transparent 50%);"></div>
            
            <div class="container" style="max-width: 800px; margin: 0 auto; padding: 0 20px; position: relative; z-index: 2;">
                
                <!-- Post Category -->
                <div class="post-category" style="margin-bottom: 1rem;">
                    <?php 
                    $categories = get_the_category();
                    if (!empty($categories)) : ?>
                        <span style="background: rgba(255,255,255,0.2); padding: 8px 16px; border-radius: 20px; font-size: 0.9rem; font-weight: 600;">
                            <?php echo esc_html($categories[0]->name); ?>
                        </span>
                    <?php endif; ?>
                </div>
                
                <!-- Post Title -->
                <h1 style="font-size: clamp(2rem, 5vw, 3.5rem); font-weight: 800; line-height: 1.2; margin-bottom: 1.5rem; text-shadow: 0 2px 4px rgba(0,0,0,0.3);">
                    <?php the_title(); ?>
                </h1>
                
                <!-- Post Meta -->
                <div class="post-meta" style="display: flex; align-items: center; gap: 20px; flex-wrap: wrap; opacity: 0.9;">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span style="font-size: 1.2rem;">📅</span>
                        <span><?php echo get_the_date(); ?></span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span style="font-size: 1.2rem;">👤</span>
                        <span><?php the_author(); ?></span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span style="font-size: 1.2rem;">⏱️</span>
                        <span><?php echo do_shortcode('[rt_reading_time]'); ?><?php echo estimated_reading_time(get_the_content()); ?> min read</span>
                    </div>
                </div>
                
            </div>
        </section>
        
        <!-- Featured Image -->
        <?php if (has_post_thumbnail() || get_post_meta(get_the_ID(), '_thumbnail_url', true)) : ?>
            <section class="post-featured-image" style="margin: -80px auto 0; max-width: 1000px; padding: 0 20px; position: relative; z-index: 3;">
                <div style="border-radius: 15px; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.2);">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: 400px; object-fit: cover;')); ?>
                    <?php elseif (get_post_meta(get_the_ID(), '_thumbnail_url', true)) : ?>
                        <img src="<?php echo esc_url(get_post_meta(get_the_ID(), '_thumbnail_url', true)); ?>" 
                             alt="<?php the_title_attribute(); ?>" 
                             style="width: 100%; height: 400px; object-fit: cover;">
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>
        
        <!-- Post Content -->
        <article class="post-content" style="padding: 6rem 0; background: #f8f9fa;">
            <div class="container" style="max-width: 800px; margin: 0 auto; padding: 0 20px;">
                
                <!-- Content Body -->
                <div class="entry-content" style="background: white; padding: 3rem; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); line-height: 1.8; font-size: 1.1rem; color: #2d3748;">
                    <?php the_content(); ?>
                </div>
                
                <!-- Post Tags -->
                <?php $tags = get_the_tags(); ?>
                <?php if ($tags) : ?>
                    <div class="post-tags" style="margin-top: 3rem; text-align: center;">
                        <h3 style="margin-bottom: 1.5rem; color: #4a5568; font-size: 1.2rem;">Tags</h3>
                        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 10px;">
                            <?php foreach ($tags as $tag) : ?>
                                <a href="<?php echo get_tag_link($tag->term_id); ?>" 
                                   style="display: inline-block; background: linear-gradient(135deg, #667eea, #764ba2); color: white; padding: 8px 16px; border-radius: 20px; text-decoration: none; font-size: 0.9rem; font-weight: 600; transition: transform 0.3s ease;">
                                    #<?php echo esc_html($tag->name); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <!-- Social Share -->
                <div class="social-share" style="margin-top: 3rem; padding: 2rem; background: white; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); text-align: center;">
                    <h3 style="margin-bottom: 1.5rem; color: #4a5568;">Share this post</h3>
                    <div style="display: flex; justify-content: center; gap: 15px; flex-wrap: wrap;">
                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                           target="_blank" 
                           style="display: flex; align-items: center; gap: 8px; background: #1da1f2; color: white; padding: 12px 20px; border-radius: 25px; text-decoration: none; font-weight: 600; transition: transform 0.3s ease;">
                            🐦 Twitter
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                           target="_blank" 
                           style="display: flex; align-items: center; gap: 8px; background: #4267b2; color: white; padding: 12px 20px; border-radius: 25px; text-decoration: none; font-weight: 600; transition: transform 0.3s ease;">
                            📘 Facebook
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" 
                           target="_blank" 
                           style="display: flex; align-items: center; gap: 8px; background: #0077b5; color: white; padding: 12px 20px; border-radius: 25px; text-decoration: none; font-weight: 600; transition: transform 0.3s ease;">
                            💼 LinkedIn
                        </a>
                    </div>
                </div>
                
                <!-- Navigation -->
                <div class="post-navigation" style="margin-top: 3rem; display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    ?>
                    
                    <?php if ($prev_post) : ?>
                        <a href="<?php echo get_permalink($prev_post); ?>" 
                           style="display: block; padding: 2rem; background: white; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); text-decoration: none; color: #2d3748; transition: transform 0.3s ease;">
                            <div style="font-size: 0.9rem; color: #667eea; margin-bottom: 0.5rem;">← Previous Post</div>
                            <div style="font-weight: 600;"><?php echo esc_html($prev_post->post_title); ?></div>
                        </a>
                    <?php else : ?>
                        <div></div>
                    <?php endif; ?>
                    
                    <?php if ($next_post) : ?>
                        <a href="<?php echo get_permalink($next_post); ?>" 
                           style="display: block; padding: 2rem; background: white; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); text-decoration: none; color: #2d3748; transition: transform 0.3s ease; text-align: right;">
                            <div style="font-size: 0.9rem; color: #667eea; margin-bottom: 0.5rem;">Next Post →</div>
                            <div style="font-weight: 600;"><?php echo esc_html($next_post->post_title); ?></div>
                        </a>
                    <?php endif; ?>
                </div>
                
                <!-- Back to Blog -->
                <div style="text-align: center; margin-top: 3rem;">
                    <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" 
                       style="display: inline-flex; align-items: center; gap: 8px; background: linear-gradient(135deg, #667eea, #764ba2); color: white; padding: 15px 30px; border-radius: 25px; text-decoration: none; font-weight: 600; font-size: 1.1rem; transition: transform 0.3s ease;">
                        ← Back to Blog
                    </a>
                </div>
                
            </div>
        </article>
        
    <?php endwhile; ?>
</div>

<style>
/* Single Post Hover Effects */
.social-share a:hover,
.post-navigation a:hover {
    transform: translateY(-3px) !important;
}

.post-tags a:hover {
    transform: translateY(-2px) !important;
}

/* Responsive Design */
@media (max-width: 768px) {
    .post-hero {
        padding: 3rem 0 !important;
    }
    
    .post-featured-image {
        margin-top: -40px !important;
    }
    
    .post-content .entry-content {
        padding: 2rem !important;
    }
    
    .post-navigation {
        grid-template-columns: 1fr !important;
    }
    
    .post-meta {
        flex-direction: column !important;
        align-items: flex-start !important;
        gap: 10px !important;
    }
    
    .social-share > div {
        flex-direction: column !important;
    }
    
    .social-share a {
        justify-content: center !important;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 15px !important;
    }
    
    .post-featured-image img {
        height: 250px !important;
    }
    
    .entry-content {
        font-size: 1rem !important;
    }
}

/* Content Styling */
.entry-content h2 {
    color: #2d3748;
    font-size: 1.8rem;
    font-weight: 700;
    margin: 2rem 0 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 3px solid #667eea;
}

.entry-content h3 {
    color: #4a5568;
    font-size: 1.4rem;
    font-weight: 600;
    margin: 1.5rem 0 1rem;
}

.entry-content ul,
.entry-content ol {
    margin: 1rem 0;
    padding-left: 2rem;
}

.entry-content li {
    margin-bottom: 0.5rem;
}

.entry-content p {
    margin: 1rem 0;
}

.entry-content a {
    color: #667eea;
    text-decoration: underline;
    font-weight: 600;
}

.entry-content a:hover {
    color: #764ba2;
}

.entry-content blockquote {
    background: #f8f9fa;
    border-left: 4px solid #667eea;
    padding: 1rem 1.5rem;
    margin: 2rem 0;
    font-style: italic;
    border-radius: 0 8px 8px 0;
}

.entry-content code {
    background: #e2e8f0;
    padding: 2px 6px;
    border-radius: 4px;
    font-family: 'Courier New', monospace;
    font-size: 0.9em;
}

.entry-content pre {
    background: #2d3748;
    color: #e2e8f0;
    padding: 1rem;
    border-radius: 8px;
    overflow-x: auto;
    margin: 1rem 0;
}

.entry-content pre code {
    background: none;
    padding: 0;
    color: inherit;
}
</style>

<?php
// Function to estimate reading time
function estimated_reading_time($content) {
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // Average reading speed
    return $reading_time;
}
?>

<?php get_footer(); ?>
