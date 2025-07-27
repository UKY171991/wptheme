<?php
/*
Template Name: Blog
*/
get_header(); ?>

<!-- Universal Banner System -->
<section class="universal-banner">
    <div class="container">
        <div class="banner-content">
            <nav class="breadcrumb">
                <a href="<?php echo home_url(); ?>"><i class="fas fa-home"></i> Home</a>
                <span>→</span>
                <span>Blog</span>
            </nav>
            
            <h1 class="banner-title">Blog</h1>
            <p class="banner-subtitle">Our latest articles, tips, and insights.</p>
            
            <div class="banner-buttons">
                <a href="#latest-posts" class="btn btn-primary">
                    <i class="fas fa-book-open"></i>
                    Read Latest Posts
                </a>
                <a href="<?php echo home_url('/contact'); ?>" class="btn btn-secondary">
                    <i class="fas fa-envelope"></i>
                    Get In Touch
                </a>
            </div>
        </div>
    </div>
</section>

<div class="universal-page-content" id="latest-posts">
    <div class="container">
        <div class="content-section">
            <?php if (have_posts()) : ?>
                <div class="blog-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px; margin-bottom: 40px;">
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="blog-card enhanced-blog-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="blog-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium_large', array('style' => 'width: 100%; height: 250px; object-fit: cover;')); ?>
                                    </a>
                                    <div class="blog-category">
                                        <?php 
                                        $categories = get_the_category();
                                        if (!empty($categories)) {
                                            echo '<span>' . esc_html($categories[0]->name) . '</span>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="blog-image placeholder-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="placeholder-content">
                                            <i class="fas fa-newspaper"></i>
                                        </div>
                                    </a>
                                    <div class="blog-category">
                                        <?php 
                                        $categories = get_the_category();
                                        if (!empty($categories)) {
                                            echo '<span>' . esc_html($categories[0]->name) . '</span>';
                                        } else {
                                            echo '<span>Article</span>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <span class="blog-date">
                                        <i class="fas fa-calendar"></i> 
                                        <?php echo get_the_date('M j, Y'); ?>
                                    </span>
                                    <span class="blog-author">
                                        <i class="fas fa-user"></i> 
                                        <?php the_author(); ?>
                                    </span>
                                    <span class="read-time">
                                        <i class="fas fa-clock"></i>
                                        <?php echo max(1, round(str_word_count(get_the_content()) / 200)); ?> min read
                                    </span>
                                </div>
                                
                                <h3 class="blog-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                
                                <div class="blog-excerpt">
                                    <?php 
                                    $excerpt = get_the_excerpt();
                                    if (empty($excerpt)) {
                                        $excerpt = wp_trim_words(get_the_content(), 25);
                                    }
                                    echo wp_trim_words($excerpt, 25);
                                    ?>
                                </div>
                                
                                <div class="blog-footer">
                                    <a href="<?php the_permalink(); ?>" class="read-more-btn">
                                        Read More 
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                    
                                    <div class="blog-tags">
                                        <?php 
                                        $tags = get_the_tags();
                                        if ($tags) {
                                            $tag_count = 0;
                                            foreach ($tags as $tag) {
                                                if ($tag_count >= 2) break;
                                                echo '<span class="tag">' . esc_html($tag->name) . '</span>';
                                                $tag_count++;
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                
                <!-- Pagination -->
                <div class="pagination-wrapper" style="text-align: center; margin-top: 40px;">
                    <?php
                    the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                        'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
                    ));
                    ?>
                </div>
                
            <?php else : ?>
                <div class="no-posts" style="text-align: center; padding: 60px 20px;">
                    <h3>No posts found</h3>
                    <p>Check back soon for new content!</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
                </h1>
                
                <p style="font-size: 1.4rem; max-width: 800px; margin: 0 auto 3rem; opacity: 0; animation: fadeInUp 1s ease-out 0.8s both; line-height: 1.7; color: rgba(255,255,255,0.95);">
                    Dive into a world of expert insights, practical tips, and inspiring content that transforms the way you think about home and lifestyle.
                </p>
                
                <!-- Animated CTA Buttons -->
                <div class="hero-cta" style="display: flex; gap: 1.5rem; justify-content: center; flex-wrap: wrap; opacity: 0; animation: fadeInUp 1s ease-out 1s both;">
                    <a href="#featured" class="cta-primary" style="background: linear-gradient(135deg, #ff5f00, #ff8c00); color: white; padding: 1.2rem 3rem; border-radius: 50px; text-decoration: none; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; position: relative; overflow: hidden; transition: all 0.3s ease; box-shadow: 0 15px 35px rgba(255,95,0,0.4); border: 2px solid transparent;">
                        <span style="position: relative; z-index: 2;">Explore Now</span>
                        <div class="button-ripple" style="position: absolute; top: 50%; left: 50%; width: 0; height: 0; background: rgba(255,255,255,0.3); border-radius: 50%; transition: all 0.6s ease; transform: translate(-50%, -50%);"></div>
                    </a>
                    <a href="#categories" class="cta-secondary" style="background: transparent; color: white; padding: 1.2rem 3rem; border-radius: 50px; text-decoration: none; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; border: 2px solid rgba(255,255,255,0.3); backdrop-filter: blur(10px); transition: all 0.3s ease; position: relative; overflow: hidden;">
                        <span style="position: relative; z-index: 2;">Browse Topics</span>
                    </a>
                </div>
            </div>
            
            <!-- Ultra Fancy Blog Stats with Morphing Cards -->
            <div class="blog-stats" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; margin-top: 4rem; max-width: 900px; margin-left: auto; margin-right: auto;">
                <div class="stat-card" style="background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05)); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.2); border-radius: 25px; padding: 2.5rem 1.5rem; text-align: center; position: relative; overflow: hidden; transition: all 0.5s ease; animation: statsSlideIn 1s ease-out 1.2s both;">
                    <div class="stat-bg" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(135deg, rgba(255,95,0,0.1), rgba(255,140,0,0.05)); opacity: 0; transition: opacity 0.3s ease;"></div>
                    <div class="stat-number" style="font-size: 3rem; font-weight: 900; margin-bottom: 0.5rem; position: relative; z-index: 2; color: #fff;"><?php echo wp_count_posts()->publish; ?></div>
                    <div class="stat-label" style="color: rgba(255,255,255,0.8); font-size: 0.9rem; text-transform: uppercase; letter-spacing: 2px; font-weight: 600; position: relative; z-index: 2;">Articles Published</div>
                    <div class="stat-icon" style="position: absolute; bottom: 1rem; right: 1rem; font-size: 2rem; opacity: 0.3; transition: all 0.3s ease;">📝</div>
                </div>
                
                <div class="stat-card" style="background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05)); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.2); border-radius: 25px; padding: 2.5rem 1.5rem; text-align: center; position: relative; overflow: hidden; transition: all 0.5s ease; animation: statsSlideIn 1s ease-out 1.4s both;">
                    <div class="stat-bg" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(135deg, rgba(0,123,255,0.1), rgba(40,167,69,0.05)); opacity: 0; transition: opacity 0.3s ease;"></div>
                    <div class="stat-number" style="font-size: 3rem; font-weight: 900; margin-bottom: 0.5rem; position: relative; z-index: 2; color: #fff;"><?php echo count(get_categories()); ?>+</div>
                    <div class="stat-label" style="color: rgba(255,255,255,0.8); font-size: 0.9rem; text-transform: uppercase; letter-spacing: 2px; font-weight: 600; position: relative; z-index: 2;">Expert Categories</div>
                    <div class="stat-icon" style="position: absolute; bottom: 1rem; right: 1rem; font-size: 2rem; opacity: 0.3; transition: all 0.3s ease;">📂</div>
                </div>
                
                <div class="stat-card" style="background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05)); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.2); border-radius: 25px; padding: 2.5rem 1.5rem; text-align: center; position: relative; overflow: hidden; transition: all 0.5s ease; animation: statsSlideIn 1s ease-out 1.6s both;">
                    <div class="stat-bg" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(135deg, rgba(255,193,7,0.1), rgba(220,53,69,0.05)); opacity: 0; transition: opacity 0.3s ease;"></div>
                    <div class="stat-number" style="font-size: 3rem; font-weight: 900; margin-bottom: 0.5rem; position: relative; z-index: 2; color: #fff;">
                        <span style="color: #ffc107;">★</span>
                        <span style="color: #ffc107;">★</span>
                        <span style="color: #ffc107;">★</span>
                        <span style="color: #ffc107;">★</span>
                        <span style="color: #ffc107;">★</span>
                    </div>
                    <div class="stat-label" style="color: rgba(255,255,255,0.8); font-size: 0.9rem; text-transform: uppercase; letter-spacing: 2px; font-weight: 600; position: relative; z-index: 2;">Reader Rating</div>
                    <div class="stat-icon" style="position: absolute; bottom: 1rem; right: 1rem; font-size: 2rem; opacity: 0.3; transition: all 0.3s ease;">⭐</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ultra Fancy Featured Post Section -->
    <?php
    $featured_query = new WP_Query(array(
        'posts_per_page' => 1,
        'meta_key' => 'featured_post',
        'meta_value' => 'yes',
        'orderby' => 'date',
        'order' => 'DESC'
    ));
    
    if (!$featured_query->have_posts()) {
        $featured_query = new WP_Query(array(
            'posts_per_page' => 1,
            'orderby' => 'date',
            'order' => 'DESC'
        ));
    }
    
    if ($featured_query->have_posts()) : $featured_query->the_post(); ?>
    <section id="featured" class="featured-post" style="padding: 6rem 0; background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); position: relative; overflow: hidden;">
        <!-- Decorative Background Elements -->
        <div class="featured-bg-elements" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; pointer-events: none;">
            <div style="position: absolute; top: 10%; left: -5%; width: 300px; height: 300px; background: linear-gradient(135deg, rgba(255,95,0,0.03), rgba(255,140,0,0.08)); border-radius: 50%; filter: blur(40px);"></div>
            <div style="position: absolute; bottom: 20%; right: -5%; width: 400px; height: 400px; background: linear-gradient(135deg, rgba(0,123,255,0.03), rgba(40,167,69,0.05)); border-radius: 50%; filter: blur(60px);"></div>
        </div>
        
        <div class="container" style="position: relative; z-index: 2;">
            <!-- Ultra Fancy Featured Badge -->
            <div class="featured-badge" style="text-align: center; margin-bottom: 4rem; animation: badgeFloat 3s infinite ease-in-out;">
                <div style="display: inline-block; position: relative;">
                    <span style="background: linear-gradient(135deg, #ff5f00, #ff8c00); color: white; padding: 1rem 3rem; border-radius: 50px; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; display: inline-flex; align-items: center; gap: 1rem; box-shadow: 0 20px 40px rgba(255,95,0,0.3); position: relative; overflow: hidden;">
                        <span style="font-size: 1.5rem; animation: starSpin 4s infinite linear;">⭐</span>
                        <span style="position: relative; z-index: 2;">Featured Article</span>
                        <span style="font-size: 1.5rem; animation: starSpin 4s infinite linear reverse;">⭐</span>
                        <!-- Animated Shine -->
                        <div style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent); animation: badgeShine 3s infinite ease-in-out;"></div>
                    </span>
                    <!-- Glow Effect -->
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 120%; height: 120%; background: linear-gradient(135deg, rgba(255,95,0,0.2), rgba(255,140,0,0.1)); border-radius: 50px; filter: blur(20px); z-index: -1; animation: pulse 2s infinite ease-in-out;"></div>
                </div>
            </div>
            
            <!-- Enhanced Featured Content Grid -->
            <div class="featured-content" style="display: grid; grid-template-columns: 1fr 1fr; gap: 5rem; align-items: center; max-width: 1400px; margin: 0 auto;">
                <?php if (has_post_thumbnail()) : ?>
                <div class="featured-image" style="position: relative; animation: imageSlideIn 1s ease-out;">
                    <!-- Image Container with Advanced Effects -->
                    <div style="position: relative; border-radius: 30px; overflow: hidden; box-shadow: 0 30px 60px rgba(0,0,0,0.2); transform: perspective(1000px) rotateY(-5deg); transition: all 0.5s ease;">
                        <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: 500px; object-fit: cover; transition: all 0.5s ease;')); ?>
                        
                        <!-- Multiple Overlay Effects -->
                        <div class="image-overlay-gradient" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(135deg, rgba(255,95,0,0.1) 0%, rgba(0,0,0,0.3) 100%); opacity: 0; transition: opacity 0.5s ease;"></div>
                        
                        <!-- Category Badge -->
                        <div style="position: absolute; top: 2rem; left: 2rem;">
                            <?php 
                            $categories = get_the_category();
                            if (!empty($categories)) : 
                            ?>
                                <span style="background: linear-gradient(135deg, rgba(255,95,0,0.95), rgba(255,140,0,0.9)); color: white; padding: 0.8rem 1.5rem; border-radius: 25px; font-size: 0.9rem; font-weight: 700; backdrop-filter: blur(10px); box-shadow: 0 10px 20px rgba(255,95,0,0.3); text-transform: uppercase; letter-spacing: 1px;">
                                    <?php echo esc_html($categories[0]->name); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Reading Time Badge -->
                        <div style="position: absolute; top: 2rem; right: 2rem;">
                            <span style="background: rgba(0,0,0,0.8); color: white; padding: 0.8rem 1.5rem; border-radius: 25px; font-size: 0.9rem; font-weight: 600; backdrop-filter: blur(10px); display: flex; align-items: center; gap: 0.5rem;">
                                <i class="far fa-clock" style="color: #ff5f00;"></i>
                                <?php echo reading_time(); ?> min read
                            </span>
                        </div>
                        
                        <!-- Floating Action Button -->
                        <div style="position: absolute; bottom: 2rem; right: 2rem;">
                            <a href="<?php the_permalink(); ?>" style="width: 60px; height: 60px; background: linear-gradient(135deg, #ff5f00, #ff8c00); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; font-size: 1.2rem; box-shadow: 0 15px 30px rgba(255,95,0,0.4); transition: all 0.3s ease; animation: fabPulse 2s infinite ease-in-out;">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Decorative Elements -->
                    <div style="position: absolute; top: -20px; left: -20px; width: 100px; height: 100px; background: linear-gradient(135deg, rgba(255,95,0,0.1), rgba(255,140,0,0.2)); border-radius: 50%; filter: blur(20px); z-index: -1;"></div>
                    <div style="position: absolute; bottom: -30px; right: -30px; width: 150px; height: 150px; background: linear-gradient(135deg, rgba(0,123,255,0.1), rgba(40,167,69,0.15)); border-radius: 50%; filter: blur(30px); z-index: -1;"></div>
                </div>
                <?php endif; ?>
                
                <!-- Ultra Enhanced Text Content -->
                <div class="featured-text" style="animation: textSlideIn 1s ease-out 0.3s both;">
                    <!-- Article Title with Advanced Typography -->
                    <h2 style="font-size: clamp(2.5rem, 4vw, 3.5rem); margin-bottom: 1.5rem; color: #1a1a1a; line-height: 1.2; font-weight: 800; position: relative;">
                        <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none; transition: all 0.3s ease; background: linear-gradient(135deg, #333 0%, #ff5f00 50%, #333 100%); background-size: 200% 100%; -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; transition: background-position 0.5s ease;">
                            <?php the_title(); ?>
                        </a>
                        <!-- Decorative Line -->
                        <div style="position: absolute; bottom: -10px; left: 0; width: 60px; height: 4px; background: linear-gradient(135deg, #ff5f00, #ff8c00); border-radius: 2px; animation: lineExpand 1s ease-out 0.8s both;"></div>
                    </h2>
                    
                    <!-- Enhanced Meta Information -->
                    <div class="featured-meta" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 1.5rem; margin-bottom: 2rem; padding: 1.5rem; background: linear-gradient(135deg, rgba(248,249,250,0.8), rgba(233,236,239,0.4)); border-radius: 20px; backdrop-filter: blur(10px);">
                        <div style="display: flex; align-items: center; gap: 0.8rem; color: #666; font-size: 0.95rem; font-weight: 600;">
                            <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #ff5f00, #ff8c00); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                <i class="far fa-calendar-alt"></i>
                            </div>
                            <div>
                                <div style="font-size: 0.8rem; color: #999; text-transform: uppercase; letter-spacing: 1px;">Published</div>
                                <div><?php echo get_the_date('M j, Y'); ?></div>
                            </div>
                        </div>
                        
                        <div style="display: flex; align-items: center; gap: 0.8rem; color: #666; font-size: 0.95rem; font-weight: 600;">
                            <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #0d6efd, #0b5ed7); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                <i class="far fa-clock"></i>
                            </div>
                            <div>
                                <div style="font-size: 0.8rem; color: #999; text-transform: uppercase; letter-spacing: 1px;">Read Time</div>
                                <div><?php echo reading_time(); ?> minutes</div>
                            </div>
                        </div>
                        
                        <div style="display: flex; align-items: center; gap: 0.8rem; color: #666; font-size: 0.95rem; font-weight: 600;">
                            <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #198754, #157347); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                <i class="far fa-user"></i>
                            </div>
                            <div>
                                <div style="font-size: 0.8rem; color: #999; text-transform: uppercase; letter-spacing: 1px;">Author</div>
                                <div><?php the_author(); ?></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Enhanced Excerpt -->
                    <div style="color: #555; font-size: 1.2rem; line-height: 1.8; margin-bottom: 3rem; position: relative; padding-left: 2rem;">
                        <div style="position: absolute; left: 0; top: 0; width: 4px; height: 100%; background: linear-gradient(135deg, #ff5f00, #ff8c00); border-radius: 2px;"></div>
                        <?php echo wp_trim_words(get_the_excerpt() ?: get_the_content(), 35, '...'); ?>
                    </div>
                    
                    <!-- Ultra Fancy CTA Section -->
                    <div style="display: flex; justify-content: space-between; align-items: center; gap: 2rem; flex-wrap: wrap;">
                        <!-- Primary CTA -->
                        <a href="<?php the_permalink(); ?>" style="background: linear-gradient(135deg, #ff5f00, #ff8c00); color: white; padding: 1.2rem 3rem; border-radius: 50px; text-decoration: none; font-weight: 700; display: inline-flex; align-items: center; gap: 1rem; transition: all 0.3s ease; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 15px 35px rgba(255,95,0,0.3); position: relative; overflow: hidden;">
                            <span style="position: relative; z-index: 2;">Read Full Story</span>
                            <i class="fas fa-arrow-right" style="font-size: 1.1rem; transition: transform 0.3s ease; position: relative; z-index: 2;"></i>
                            <!-- Hover Effect -->
                            <div style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent); transition: left 0.5s ease;"></div>
                        </a>
                        
                        <!-- Social Actions -->
                        <div class="social-actions" style="display: flex; gap: 1rem; align-items: center;">
                            <span style="color: #666; font-size: 0.9rem; font-weight: 600; margin-right: 0.5rem;">Share:</span>
                            <a href="https://facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" style="width: 45px; height: 45px; background: #1877f2; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 5px 15px rgba(24,119,242,0.3);">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" style="width: 45px; height: 45px; background: #1da1f2; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 5px 15px rgba(29,161,242,0.3);">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" style="width: 45px; height: 45px; background: #0077b5; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 5px 15px rgba(0,119,181,0.3);">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <button class="bookmark-btn" style="width: 45px; height: 45px; background: #dc3545; border: none; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 5px 15px rgba(220,53,69,0.3);">
                                <i class="far fa-bookmark"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php wp_reset_postdata(); endif; ?>

    <!-- Ultra Advanced Blog Content Section -->
    <section class="blog-content" style="padding: 6rem 0; background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 50%, #f8f9fa 100%); position: relative;">
        <!-- Background Decorations -->
        <div class="content-bg-elements" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; pointer-events: none; overflow: hidden;">
            <div style="position: absolute; top: 20%; left: 5%; width: 200px; height: 200px; background: linear-gradient(135deg, rgba(255,95,0,0.05), rgba(255,140,0,0.1)); border-radius: 50%; filter: blur(50px); animation: float 20s infinite ease-in-out;"></div>
            <div style="position: absolute; bottom: 30%; right: 10%; width: 300px; height: 300px; background: linear-gradient(135deg, rgba(0,123,255,0.05), rgba(40,167,69,0.08)); border-radius: 50%; filter: blur(60px); animation: float 25s infinite ease-in-out reverse;"></div>
        </div>
        
        <div class="container" style="position: relative; z-index: 2;">
            <!-- Ultra Fancy Filter Section -->
            <div id="categories" class="blog-filters" style="background: linear-gradient(135deg, rgba(255,255,255,0.9), rgba(248,249,250,0.8)); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.3); border-radius: 25px; padding: 3rem; margin-bottom: 4rem; box-shadow: 0 20px 40px rgba(0,0,0,0.1); position: relative; overflow: hidden;">
                <!-- Filter Background Pattern -->
                <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: url('data:image/svg+xml,<svg width=\"100\" height=\"100\" viewBox=\"0 0 100 100\" xmlns=\"http://www.w3.org/2000/svg\"><g fill=\"none\" fill-rule=\"evenodd\"><g fill=\"%23ff5f00\" fill-opacity=\"0.03\"><circle cx=\"10\" cy=\"10\" r=\"3\"/><circle cx=\"90\" cy=\"90\" r=\"3\"/><circle cx=\"30\" cy=\"70\" r=\"2\"/><circle cx=\"70\" cy=\"30\" r=\"2\"/></g></g></svg>'); opacity: 0.5;"></div>
                
                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 2rem; position: relative; z-index: 2;">
                    <!-- Enhanced Title -->
                    <div class="filter-title" style="text-align: center; flex: 1 1 100%;">
                        <h3 style="margin: 0 0 1rem; color: #333; font-size: 2.5rem; font-weight: 800; background: linear-gradient(135deg, #333 0%, #ff5f00 50%, #333 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                            Browse Our Articles
                        </h3>
                        <p style="color: #666; font-size: 1.1rem; margin: 0; opacity: 0.8;">Discover insights, tips, and expert advice across various topics</p>
                    </div>
                    
                    <!-- Advanced Filter Controls -->
                    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap; gap: 2rem;">
                        <!-- Category Pills -->
                        <div class="category-filters" style="display: flex; gap: 1rem; flex-wrap: wrap; flex: 1;">
                            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="filter-btn active" style="padding: 1rem 2rem; border: 2px solid #ff5f00; background: linear-gradient(135deg, #ff5f00, #ff8c00); color: white; border-radius: 50px; text-decoration: none; font-weight: 700; transition: all 0.3s ease; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 1px; position: relative; overflow: hidden; box-shadow: 0 10px 20px rgba(255,95,0,0.3);">
                                <span style="position: relative; z-index: 2;">All Articles</span>
                                <div style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent); animation: shimmer 2s infinite ease-in-out;"></div>
                            </a>
                            <?php
                            $categories = get_categories(array('hide_empty' => true));
                            foreach (array_slice($categories, 0, 4) as $category) :
                            ?>
                            <a href="<?php echo get_category_link($category->term_id); ?>" class="filter-btn" style="padding: 1rem 2rem; border: 2px solid rgba(255,95,0,0.3); background: linear-gradient(135deg, rgba(255,255,255,0.9), rgba(248,249,250,0.8)); color: #666; border-radius: 50px; text-decoration: none; font-weight: 600; transition: all 0.3s ease; font-size: 0.95rem; backdrop-filter: blur(10px); position: relative; overflow: hidden;">
                                <span style="position: relative; z-index: 2;"><?php echo esc_html($category->name); ?></span>
                            </a>
                            <?php endforeach; ?>
                        </div>
                        
                        <!-- Advanced Search -->
                        <div class="search-container" style="position: relative; min-width: 300px;">
                            <div style="position: relative; background: linear-gradient(135deg, rgba(255,255,255,0.9), rgba(248,249,250,0.8)); border-radius: 50px; padding: 0.5rem; backdrop-filter: blur(10px); border: 2px solid rgba(255,95,0,0.2); box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                                <input type="text" id="blog-search" placeholder="Search articles, tips, guides..." style="width: 100%; padding: 1rem 3.5rem 1rem 2rem; border: none; border-radius: 50px; font-size: 1rem; background: transparent; outline: none; color: #333;">
                                <button style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); background: linear-gradient(135deg, #ff5f00, #ff8c00); border: none; border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: white; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 5px 15px rgba(255,95,0,0.3);">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ultra Advanced Blog Layout -->
            <div class="blog-layout" style="display: grid; grid-template-columns: 2fr 1fr; gap: 5rem;">
                <div class="posts-list">
                    <?php if (have_posts()) : $post_count = 0; ?>
                        <?php while (have_posts()) : the_post(); $post_count++; ?>
                            <article class="ultra-blog-post" style="background: linear-gradient(135deg, rgba(255,255,255,0.95), rgba(248,249,250,0.9)); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.3); border-radius: 30px; overflow: hidden; margin-bottom: 4rem; box-shadow: 0 25px 50px rgba(0,0,0,0.1); transition: all 0.5s ease; animation: postSlideIn 0.8s ease-out <?php echo ($post_count * 0.15); ?>s both; position: relative;">
                                <!-- Post Background Gradient -->
                                <div class="post-bg-gradient" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(135deg, rgba(255,95,0,0.02) 0%, rgba(0,123,255,0.01) 50%, rgba(40,167,69,0.02) 100%); opacity: 0; transition: opacity 0.5s ease;"></div>
                                
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="post-image" style="height: 350px; overflow: hidden; position: relative;">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: 100%; object-fit: cover; transition: all 0.6s ease;')); ?>
                                        </a>
                                        
                                        <!-- Multiple Image Overlays -->
                                        <div class="image-overlay-primary" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(135deg, rgba(12,15,45,0.8), rgba(255,95,0,0.3)); opacity: 0; transition: opacity 0.5s ease;"></div>
                                        <div class="image-overlay-secondary" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: radial-gradient(circle at center, transparent 30%, rgba(0,0,0,0.4) 100%); opacity: 0; transition: opacity 0.5s ease;"></div>
                                        
                                        <!-- Enhanced Post Tags -->
                                        <div class="post-tags" style="position: absolute; top: 1.5rem; left: 1.5rem; display: flex; gap: 0.5rem; flex-wrap: wrap;">
                                            <?php 
                                            $categories = get_the_category();
                                            if (!empty($categories)) : 
                                                foreach (array_slice($categories, 0, 2) as $category) :
                                            ?>
                                                <span style="background: linear-gradient(135deg, rgba(255,95,0,0.95), rgba(255,140,0,0.9)); color: white; padding: 0.5rem 1.2rem; border-radius: 25px; font-size: 0.85rem; font-weight: 700; backdrop-filter: blur(10px); box-shadow: 0 5px 15px rgba(255,95,0,0.3); text-transform: uppercase; letter-spacing: 1px;">
                                                    <?php echo esc_html($category->name); ?>
                                                </span>
                                            <?php 
                                                endforeach;
                                            endif; 
                                            ?>
                                        </div>
                                        
                                        <!-- Reading Time & Date -->
                                        <div class="post-meta-overlay" style="position: absolute; top: 1.5rem; right: 1.5rem; display: flex; flex-direction: column; gap: 0.5rem; align-items: flex-end;">
                                            <span style="background: rgba(0,0,0,0.8); color: white; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600; backdrop-filter: blur(10px); display: flex; align-items: center; gap: 0.5rem;">
                                                <i class="far fa-clock" style="color: #ff5f00;"></i>
                                                <?php echo reading_time(); ?> min
                                            </span>
                                            <span style="background: rgba(255,255,255,0.9); color: #333; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600; backdrop-filter: blur(10px);">
                                                <?php echo get_the_date('M j'); ?>
                                            </span>
                                        </div>
                                        
                                        <!-- Hover Action Button -->
                                        <div class="hover-action" style="position: absolute; bottom: 2rem; right: 2rem; opacity: 0; transform: translateY(20px); transition: all 0.5s ease;">
                                            <a href="<?php the_permalink(); ?>" style="width: 60px; height: 60px; background: linear-gradient(135deg, #ff5f00, #ff8c00); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; font-size: 1.3rem; box-shadow: 0 15px 30px rgba(255,95,0,0.4); transition: all 0.3s ease;">
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- Ultra Enhanced Post Content -->
                                <div class="post-content" style="padding: 3rem; position: relative; z-index: 2;">
                                    <!-- Advanced Meta Grid -->
                                    <div class="post-meta" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 1rem; margin-bottom: 2rem; padding: 1.5rem; background: linear-gradient(135deg, rgba(248,249,250,0.8), rgba(233,236,239,0.6)); border-radius: 20px; backdrop-filter: blur(10px);">
                                        <div style="display: flex; align-items: center; gap: 0.8rem; color: #666; font-size: 0.9rem; font-weight: 600;">
                                            <div style="width: 35px; height: 35px; background: linear-gradient(135deg, #ff5f00, #ff8c00); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                                <i class="far fa-calendar-alt"></i>
                                            </div>
                                            <div>
                                                <div style="font-size: 0.75rem; color: #999; text-transform: uppercase; letter-spacing: 1px;">Published</div>
                                                <div><?php echo get_the_date('M j, Y'); ?></div>
                                            </div>
                                        </div>
                                        
                                        <div style="display: flex; align-items: center; gap: 0.8rem; color: #666; font-size: 0.9rem; font-weight: 600;">
                                            <div style="width: 35px; height: 35px; background: linear-gradient(135deg, #0d6efd, #0b5ed7); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                                <i class="far fa-user"></i>
                                            </div>
                                            <div>
                                                <div style="font-size: 0.75rem; color: #999; text-transform: uppercase; letter-spacing: 1px;">Author</div>
                                                <div>
                                                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" style="color: #666; text-decoration: none; transition: color 0.3s ease;">
                                                        <?php the_author(); ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div style="display: flex; align-items: center; gap: 0.8rem; color: #666; font-size: 0.9rem; font-weight: 600;">
                                            <div style="width: 35px; height: 35px; background: linear-gradient(135deg, #198754, #157347); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                                <i class="far fa-comments"></i>
                                            </div>
                                            <div>
                                                <div style="font-size: 0.75rem; color: #999; text-transform: uppercase; letter-spacing: 1px;">Comments</div>
                                                <div><?php echo get_comments_number(); ?> responses</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Enhanced Title -->
                                    <h2 style="font-size: clamp(1.8rem, 3vw, 2.3rem); margin-bottom: 1.5rem; color: #1a1a1a; font-weight: 800; line-height: 1.3; position: relative;">
                                        <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none; transition: all 0.3s ease; background: linear-gradient(135deg, #333 0%, #ff5f00 50%, #333 100%); background-size: 200% 100%; -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; transition: background-position 0.5s ease;">
                                            <?php the_title(); ?>
                                        </a>
                                        <!-- Decorative Underline -->
                                        <div style="position: absolute; bottom: -8px; left: 0; width: 50px; height: 3px; background: linear-gradient(135deg, #ff5f00, #ff8c00); border-radius: 2px; transition: width 0.5s ease;"></div>
                                    </h2>
                                    
                                    <!-- Enhanced Excerpt -->
                                    <div style="color: #555; font-size: 1.1rem; line-height: 1.8; margin-bottom: 2.5rem; position: relative; padding-left: 1.5rem;">
                                        <div style="position: absolute; left: 0; top: 0; width: 3px; height: 100%; background: linear-gradient(135deg, #ff5f00, #ff8c00); border-radius: 2px;"></div>
                                        <?php echo wp_trim_words(get_the_excerpt() ?: get_the_content(), 28, '...'); ?>
                                    </div>
                                    
                                    <!-- Ultra Fancy Action Bar -->
                                    <div style="display: flex; justify-content: space-between; align-items: center; gap: 2rem; flex-wrap: wrap;">
                                        <!-- Enhanced Read More Button -->
                                        <a href="<?php the_permalink(); ?>" style="background: linear-gradient(135deg, #ff5f00, #ff8c00); color: white; padding: 1rem 2.5rem; border-radius: 50px; text-decoration: none; font-weight: 700; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 1rem; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 10px 25px rgba(255,95,0,0.3); position: relative; overflow: hidden;">
                                            <span style="position: relative; z-index: 2;">Continue Reading</span>
                                            <i class="fas fa-arrow-right" style="transition: transform 0.3s ease; position: relative; z-index: 2;"></i>
                                            <!-- Hover Shine Effect -->
                                            <div style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent); transition: left 0.5s ease;"></div>
                                        </a>
                                        
                                        <!-- Enhanced Social Share -->
                                        <div class="social-share" style="display: flex; gap: 0.8rem; align-items: center;">
                                            <span style="color: #666; font-size: 0.9rem; font-weight: 600; margin-right: 0.5rem;">Share:</span>
                                            <a href="https://facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" style="width: 40px; height: 40px; background: #1877f2; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 5px 15px rgba(24,119,242,0.3);">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" style="width: 40px; height: 40px; background: #1da1f2; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 5px 15px rgba(29,161,242,0.3);">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                            <a href="https://linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" style="width: 40px; height: 40px; background: #0077b5; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 5px 15px rgba(0,119,181,0.3);">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                            <button class="save-post" style="width: 40px; height: 40px; background: #dc3545; border: none; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 5px 15px rgba(220,53,69,0.3);">
                                                <i class="far fa-heart"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <div class="no-posts" style="text-align: center; padding: 4rem 2rem; background: white; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.1);">
                            <div style="font-size: 4rem; margin-bottom: 1rem; opacity: 0.3;">📝</div>
                            <h3 style="font-size: 1.5rem; margin-bottom: 1rem; color: #666;">No Posts Found</h3>
                            <p style="color: #999; margin-bottom: 2rem;">We're working on creating amazing content for you!</p>
                            <a href="<?php echo esc_url(home_url('/')); ?>" style="background: linear-gradient(135deg, #ff5f00, #ff8c00); color: white; padding: 1rem 2rem; border-radius: 25px; text-decoration: none; font-weight: 600;">
                                Return Home
                            </a>
                        </div>
                    <?php endif; ?>

                    <!-- Enhanced Pagination -->
                    <div class="blog-pagination" style="margin-top: 3rem;">
                        <?php
                        echo paginate_links(array(
                            'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                            'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
                            'type' => 'list',
                            'before_page_number' => '<span class="page-number">',
                            'after_page_number' => '</span>'
                        ));
                        ?>
                    </div>
                </div>

                <!-- Sidebar -->
                <aside class="blog-sidebar">
                    <!-- Search Widget -->
                    <div class="sidebar-widget" style="background: white; padding: 2rem; border-radius: 15px; margin-bottom: 2rem; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                        <h3 style="margin-bottom: 1.5rem; color: #333; font-size: 1.3rem; border-bottom: 3px solid #ff5f00; padding-bottom: 0.5rem; display: inline-block;">
                            <i class="fas fa-search" style="color: #ff5f00; margin-right: 0.5rem;"></i>
                            Quick Search
                        </h3>
                        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                            <div style="position: relative;">
                                <input type="search" name="s" placeholder="Search blog posts..." style="width: 100%; padding: 1rem 3rem 1rem 1rem; border: 2px solid #e9ecef; border-radius: 25px; font-size: 1rem; transition: all 0.3s ease;">
                                <button type="submit" style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); background: none; border: none; color: #ff5f00; font-size: 1.2rem; cursor: pointer;">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Categories Widget -->
                    <div class="sidebar-widget" style="background: white; padding: 2rem; border-radius: 15px; margin-bottom: 2rem; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                        <h3 style="margin-bottom: 1.5rem; color: #333; font-size: 1.3rem; border-bottom: 3px solid #ff5f00; padding-bottom: 0.5rem; display: inline-block;">
                            <i class="fas fa-folder" style="color: #ff5f00; margin-right: 0.5rem;"></i>
                            Categories
                        </h3>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <?php
                            $categories = get_categories(array('hide_empty' => true));
                            foreach ($categories as $category) :
                            ?>
                            <li style="margin-bottom: 0.8rem;">
                                <a href="<?php echo get_category_link($category->term_id); ?>" style="display: flex; justify-content: space-between; align-items: center; color: #666; text-decoration: none; padding: 0.8rem; border-radius: 10px; transition: all 0.3s ease; border: 1px solid transparent;">
                                    <span style="display: flex; align-items: center; gap: 0.5rem;">
                                        <i class="fas fa-tag" style="color: #ff5f00; font-size: 0.8rem;"></i>
                                        <?php echo esc_html($category->name); ?>
                                    </span>
                                    <span style="background: #f8f9fa; color: #666; padding: 0.2rem 0.8rem; border-radius: 15px; font-size: 0.8rem; font-weight: 600;">
                                        <?php echo $category->count; ?>
                                    </span>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Newsletter Signup -->
                    <div class="sidebar-widget" style="background: linear-gradient(135deg, #ff5f00, #ff8c00); padding: 2rem; border-radius: 15px; margin-bottom: 2rem; box-shadow: 0 10px 30px rgba(255,95,0,0.3); color: white; text-align: center;">
                        <div style="font-size: 3rem; margin-bottom: 1rem;">📧</div>
                        <h3 style="margin-bottom: 1rem; font-size: 1.3rem; color: white;">
                            Stay Updated!
                        </h3>
                        <p style="margin-bottom: 1.5rem; opacity: 0.9; font-size: 0.95rem;">
                            Get the latest tips and insights delivered to your inbox.
                        </p>
                        <form style="display: flex; flex-direction: column; gap: 1rem;">
                            <input type="email" placeholder="Your email address" style="padding: 1rem; border: none; border-radius: 25px; font-size: 1rem;">
                            <button type="submit" style="background: white; color: #ff5f00; padding: 1rem; border: none; border-radius: 25px; font-weight: 600; font-size: 1rem; cursor: pointer; transition: all 0.3s ease;">
                                Subscribe Now
                            </button>
                        </form>
                    </div>

                    <!-- Service Promotion -->
                    <div class="sidebar-widget" style="background: white; padding: 2rem; border-radius: 15px; margin-bottom: 2rem; box-shadow: 0 10px 30px rgba(0,0,0,0.1); text-align: center;">
                        <div style="font-size: 3rem; margin-bottom: 1rem;">🏠</div>
                        <h3 style="margin-bottom: 1rem; color: #333; font-size: 1.3rem;">
                            Need Our Services?
                        </h3>
                        <p style="color: #666; margin-bottom: 1.5rem; font-size: 0.95rem;">
                            From cleaning to repairs, we're here to help make your life easier.
                        </p>
                        <a href="<?php echo esc_url(home_url('/service')); ?>" style="background: linear-gradient(135deg, #ff5f00, #ff8c00); color: white; padding: 1rem 2rem; border-radius: 25px; text-decoration: none; font-weight: 600; display: inline-block; transition: all 0.3s ease;">
                            View Services
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    
    <!-- Clear any floating elements -->
    <div style="clear: both; height: 0; visibility: hidden;"></div>
</div>

<!-- Ultra Advanced Blog Styles & Animations -->
<style>
/* Advanced Animation Keyframes */
@keyframes float-shape {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    25% { transform: translateY(-20px) rotate(5deg); }
    50% { transform: translateY(-40px) rotate(-5deg); }
    75% { transform: translateY(-20px) rotate(3deg); }
}

@keyframes twinkle {
    0%, 100% { opacity: 0.3; transform: scale(1); }
    50% { opacity: 1; transform: scale(1.2); }
}

@keyframes mesh-shift {
    0%, 100% { transform: translateX(0) translateY(0); }
    25% { transform: translateX(20px) translateY(-10px); }
    50% { transform: translateX(-10px) translateY(20px); }
    75% { transform: translateX(-20px) translateY(-5px); }
}

@keyframes rotate3d {
    0% { transform: rotateY(0deg) rotateX(0deg); }
    25% { transform: rotateY(90deg) rotateX(5deg); }
    50% { transform: rotateY(180deg) rotateX(0deg); }
    75% { transform: rotateY(270deg) rotateX(-5deg); }
    100% { transform: rotateY(360deg) rotateX(0deg); }
}

@keyframes shine {
    0% { transform: translate(-50%, -50%) rotate(-45deg) translateY(-100%); }
    50% { transform: translate(-50%, -50%) rotate(-45deg) translateY(0%); }
    100% { transform: translate(-50%, -50%) rotate(-45deg) translateY(100%); }
}

@keyframes textGlow {
    0%, 100% { filter: brightness(1); }
    50% { filter: brightness(1.2); }
}

@keyframes slideInUp {
    from { opacity: 0; transform: translateY(50px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes statsSlideIn {
    from { opacity: 0; transform: translateY(40px) scale(0.9); }
    to { opacity: 1; transform: translateY(0) scale(1); }
}

@keyframes badgeFloat {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-8px); }
}

@keyframes starSpin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

@keyframes badgeShine {
    0% { left: -100%; }
    50% { left: 100%; }
    100% { left: 100%; }
}

@keyframes pulse {
    0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 0.7; }
    50% { transform: translate(-50%, -50%) scale(1.1); opacity: 0.9; }
}

@keyframes imageSlideIn {
    from { opacity: 0; transform: translateX(-50px) rotateY(-10deg); }
    to { opacity: 1; transform: translateX(0) rotateY(-5deg); }
}

@keyframes textSlideIn {
    from { opacity: 0; transform: translateX(50px); }
    to { opacity: 1; transform: translateX(0); }
}

@keyframes lineExpand {
    from { width: 0; }
    to { width: 60px; }
}

@keyframes fabPulse {
    0%, 100% { transform: scale(1); box-shadow: 0 15px 30px rgba(255,95,0,0.4); }
    50% { transform: scale(1.05); box-shadow: 0 20px 40px rgba(255,95,0,0.6); }
}

@keyframes shimmer {
    0% { left: -100%; }
    100% { left: 100%; }
}

@keyframes postSlideIn {
    from { opacity: 0; transform: translateY(60px) scale(0.95); }
    to { opacity: 1; transform: translateY(0) scale(1); }
}

/* Ultra Advanced Hover Effects */
.ultra-blog-post:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 40px 80px rgba(0,0,0,0.2);
}

.ultra-blog-post:hover .post-bg-gradient {
    opacity: 1;
}

.ultra-blog-post:hover .image-overlay-primary,
.ultra-blog-post:hover .image-overlay-secondary {
    opacity: 1;
}

.ultra-blog-post:hover img {
    transform: scale(1.1);
}

.ultra-blog-post:hover .hover-action {
    opacity: 1;
    transform: translateY(0);
}

.ultra-blog-post:hover h2 a {
    background-position: 100% 0;
}

.ultra-blog-post:hover h2 div {
    width: 80px;
}

.ultra-blog-post:hover .post-content a:first-of-type div {
    left: 0;
}

/* Stat Card Hover Effects */
.stat-card:hover {
    transform: translateY(-10px) scale(1.05);
    box-shadow: 0 30px 60px rgba(0,0,0,0.2);
}

.stat-card:hover .stat-bg {
    opacity: 1;
}

.stat-card:hover .stat-icon {
    opacity: 0.8;
    transform: scale(1.2);
}

/* CTA Button Effects */
.cta-primary:hover {
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 25px 50px rgba(255,95,0,0.6);
}

.cta-primary:hover .button-ripple {
    width: 300px;
    height: 300px;
}

.cta-secondary:hover {
    background: rgba(255,255,255,0.2);
    border-color: rgba(255,255,255,0.6);
    transform: translateY(-5px);
}

/* Filter Button Effects */
.filter-btn:hover {
    background: linear-gradient(135deg, #ff5f00, #ff8c00);
    color: white;
    border-color: #ff5f00;
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(255,95,0,0.4);
}

/* Featured Image Hover Effects */
.featured-image > div:hover {
    transform: perspective(1000px) rotateY(0deg) scale(1.05);
    box-shadow: 0 40px 80px rgba(0,0,0,0.3);
}

.featured-image > div:hover .image-overlay-gradient {
    opacity: 1;
}

/* Social Button Hover Effects */
.social-share a:hover,
.social-actions a:hover {
    transform: translateY(-3px) scale(1.1);
}

.save-post:hover,
.bookmark-btn:hover {
    transform: translateY(-3px) scale(1.1);
}

.save-post:hover i {
    animation: pulse 0.5s ease-in-out;
}

/* Search Enhancement */
.search-container input:focus {
    box-shadow: 0 0 0 3px rgba(255,95,0,0.2);
}

.search-container button:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 20px rgba(255,95,0,0.5);
}

/* Advanced Responsive Design */
@media (max-width: 1200px) {
    .blog-layout {
        grid-template-columns: 1fr;
        gap: 3rem;
    }
    
    .featured-content {
        grid-template-columns: 1fr;
        gap: 3rem;
    }
}

@media (max-width: 768px) {
    .blog-hero {
        min-height: 80vh;
        padding: 6rem 0 4rem;
    }
    
    .hero-content h1 {
        font-size: 2.5rem;
    }
    
    .hero-cta {
        flex-direction: column;
        align-items: center;
    }
    
    .blog-stats {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .blog-filters {
        padding: 2rem;
    }
    
    .category-filters {
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .search-container {
        min-width: 250px;
    }
    
    .ultra-blog-post .post-content {
        padding: 2rem;
    }
    
    .post-meta {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .featured-image > div {
        transform: none !important;
    }
}

@media (max-width: 480px) {
    .hero-content h1 {
        font-size: 2rem;
    }
    
    .hero-content p {
        font-size: 1.1rem;
    }
    
    .blog-filters .filter-title h3 {
        font-size: 2rem;
    }
    
    .ultra-blog-post h2 {
        font-size: 1.5rem;
    }
    
    .search-container {
        min-width: 200px;
    }
}

/* Performance Optimizations */
.ultra-blog-post,
.stat-card,
.featured-image > div {
    will-change: transform;
}

.ultra-blog-post img {
    will-change: transform;
}

/* Accessibility Enhancements */
@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}

/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #ff5f00, #ff8c00);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #e55100, #f57500);
}

/* Ensure proper page structure and footer display */
.enhanced-blog-page {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.site-footer {
    margin-top: auto;
    background: #1a1f3a !important;
    color: white;
    padding: 3rem 0 1rem;
    border-top: 3px solid #ff5f00;
    position: relative;
    z-index: 10;
}

.site-footer .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

.footer-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-bottom: 2rem;
}

.footer-section h3 {
    color: #ff8c00 !important;
    margin-bottom: 1rem;
    font-size: 1.2rem;
}

.footer-section a {
    color: #ccc !important;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-section a:hover {
    color: #ff8c00 !important;
}

.footer-bottom {
    border-top: 1px solid rgba(255,255,255,0.1);
    padding-top: 1rem;
    text-align: center;
    color: #ccc;
}

/* Fix any potential overflow issues */
html, body {
    overflow-x: hidden;
    scroll-behavior: smooth;
}

body {
    margin: 0;
    padding: 0;
}

/* Responsive fixes */
@media (max-width: 768px) {
    .blog-hero {
        min-height: 60vh !important;
        padding: 4rem 0 3rem !important;
    }
    
    .hero-content h1 {
        font-size: clamp(2rem, 8vw, 3rem) !important;
    }
    
    .footer-content {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
}
</style>

<!-- Ultra Advanced Interactive JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Ultra Blog Page Initialized');
    
    // Advanced Scroll Animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const scrollObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationPlayState = 'running';
            }
        });
    }, observerOptions);
    
    // Observe all animated elements
    document.querySelectorAll('.ultra-blog-post, .stat-card, .featured-content').forEach(el => {
        scrollObserver.observe(el);
    });
    
    // Enhanced Search Functionality
    const searchInput = document.getElementById('blog-search');
    if (searchInput) {
        let searchTimeout;
        
        searchInput.addEventListener('input', function(e) {
            clearTimeout(searchTimeout);
            const query = e.target.value.toLowerCase();
            
            searchTimeout = setTimeout(() => {
                const posts = document.querySelectorAll('.ultra-blog-post');
                
                posts.forEach(post => {
                    const title = post.querySelector('h2 a').textContent.toLowerCase();
                    const content = post.querySelector('.post-content > div:last-of-type').textContent.toLowerCase();
                    
                    if (title.includes(query) || content.includes(query) || query === '') {
                        post.style.display = 'block';
                        post.style.animation = 'fadeInUp 0.5s ease-out';
                    } else {
                        post.style.display = 'none';
                    }
                });
                
                // Show "no results" message if needed
                const visiblePosts = Array.from(posts).filter(post => post.style.display !== 'none');
                if (visiblePosts.length === 0 && query !== '') {
                    showNoResultsMessage();
                } else {
                    hideNoResultsMessage();
                }
            }, 300);
        });
    }
    
    // Advanced Hover Effects for Images
    document.querySelectorAll('.ultra-blog-post img').forEach(img => {
        img.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1) rotate(1deg)';
        });
        
        img.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotate(0deg)';
        });
    });
    
    // Smooth Scroll for CTA Buttons
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Advanced Social Share Tracking
    document.querySelectorAll('.social-share a, .social-actions a').forEach(link => {
        link.addEventListener('click', function(e) {
            const platform = this.href.includes('facebook') ? 'Facebook' : 
                           this.href.includes('twitter') ? 'Twitter' : 
                           this.href.includes('linkedin') ? 'LinkedIn' : 'Other';
            
            console.log(`Shared on ${platform}:`, this.href);
            
            // Add ripple effect
            const ripple = document.createElement('div');
            ripple.style.cssText = `
                position: absolute;
                width: 20px;
                height: 20px;
                background: rgba(255,255,255,0.6);
                border-radius: 50%;
                pointer-events: none;
                animation: rippleEffect 0.6s ease-out;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            `;
            
            this.style.position = 'relative';
            this.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
        });
    });
    
    // Save/Bookmark Functionality
    document.querySelectorAll('.save-post, .bookmark-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            
            const icon = this.querySelector('i');
            const isSaved = icon.classList.contains('fas');
            
            if (isSaved) {
                icon.classList.remove('fas');
                icon.classList.add('far');
                this.style.background = '#dc3545';
                console.log('Post unsaved');
            } else {
                icon.classList.remove('far');
                icon.classList.add('fas');
                this.style.background = '#28a745';
                console.log('Post saved');
                
                // Add save animation
                this.style.animation = 'pulse 0.5s ease-in-out';
                setTimeout(() => {
                    this.style.animation = '';
                }, 500);
            }
        });
    });
    
    // Parallax Effect for Background Elements
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const rate = scrolled * -0.5;
        
        document.querySelectorAll('.floating-shapes .shape').forEach((shape, index) => {
            const speed = 0.2 + (index * 0.1);
            shape.style.transform = `translateY(${scrolled * speed}px)`;
        });
        
        document.querySelectorAll('.particle').forEach((particle, index) => {
            const speed = 0.1 + (index * 0.05);
            particle.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });
    
    // Dynamic Reading Progress Bar
    function createReadingProgressBar() {
        const progressBar = document.createElement('div');
        progressBar.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 4px;
            background: linear-gradient(135deg, #ff5f00, #ff8c00);
            z-index: 9999;
            transition: width 0.3s ease;
        `;
        document.body.appendChild(progressBar);
        
        window.addEventListener('scroll', function() {
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrolled = (window.pageYOffset / docHeight) * 100;
            progressBar.style.width = scrolled + '%';
        });
    }
    
    createReadingProgressBar();
    
    // Advanced Filter Animation
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px) scale(1.05)';
        });
        
        btn.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
    
    // No Results Message Functions
    function showNoResultsMessage() {
        let noResultsMsg = document.getElementById('no-results-message');
        if (!noResultsMsg) {
            noResultsMsg = document.createElement('div');
            noResultsMsg.id = 'no-results-message';
            noResultsMsg.innerHTML = `
                <div style="text-align: center; padding: 4rem 2rem; background: linear-gradient(135deg, rgba(255,255,255,0.95), rgba(248,249,250,0.9)); border-radius: 30px; box-shadow: 0 25px 50px rgba(0,0,0,0.1); animation: fadeInUp 0.5s ease-out;">
                    <div style="font-size: 4rem; margin-bottom: 1rem; opacity: 0.3;">🔍</div>
                    <h3 style="font-size: 1.8rem; margin-bottom: 1rem; color: #666;">No Articles Found</h3>
                    <p style="color: #999; margin-bottom: 2rem; font-size: 1.1rem;">Try adjusting your search terms or browse our categories.</p>
                    <button onclick="document.getElementById('blog-search').value=''; document.getElementById('blog-search').dispatchEvent(new Event('input'))" style="background: linear-gradient(135deg, #ff5f00, #ff8c00); color: white; padding: 1rem 2rem; border: none; border-radius: 25px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">
                        Clear Search
                    </button>
                </div>
            `;
            document.querySelector('.posts-list').appendChild(noResultsMsg);
        }
        noResultsMsg.style.display = 'block';
    }
    
    function hideNoResultsMessage() {
        const noResultsMsg = document.getElementById('no-results-message');
        if (noResultsMsg) {
            noResultsMsg.style.display = 'none';
        }
    }
    
    // Add CSS for ripple effect
    const rippleCSS = `
        @keyframes rippleEffect {
            0% {
                width: 20px;
                height: 20px;
                opacity: 1;
            }
            100% {
                width: 60px;
                height: 60px;
                opacity: 0;
            }
        }
    `;
    
    const styleSheet = document.createElement('style');
    styleSheet.textContent = rippleCSS;
    document.head.appendChild(styleSheet);
    
    console.log('Ultra Blog Interactions Loaded Successfully!');
});
</script>

<?php
// Add reading time function if not exists
if (!function_exists('reading_time')) {
    function reading_time() {
        $content = get_post_field('post_content', get_the_ID());
        $word_count = str_word_count(strip_tags($content));
        $reading_time = ceil($word_count / 200); // Average reading speed
        return max(1, $reading_time);
    }
}
?>

<?php get_footer(); ?>
