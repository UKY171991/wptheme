<?php get_header(); ?>

<!-- Enhanced Hero Section for Single Post -->
<section class="blog-hero-section">
    <div class="hero-background-animated"></div>
    <div class="hero-overlay-gradient"></div>
    <div class="container">
        <div class="blog-hero-content">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="blog-hero-badge">
                    <i class="fas fa-newspaper"></i>
                    <?php if (get_post_type() == 'service') : ?>
                        <span>Service</span>
                    <?php else : ?>
                        <span>Blog Post</span>
                    <?php endif; ?>
                </div>
                
                <h1 class="blog-hero-title"><?php the_title(); ?></h1>
                
                <div class="blog-hero-meta">
                    <div class="meta-grid">
                        <div class="meta-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span><?php echo get_the_date('M j, Y'); ?></span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-user-circle"></i>
                            <span><?php the_author(); ?></span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-clock"></i>
                            <span><?php echo get_reading_time(); ?> min read</span>
                        </div>
                        <?php if (get_post_type() == 'service') : ?>
                            <div class="meta-item service-badge">
                                <i class="fas fa-star"></i>
                                <span>Premium Service</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="blog-hero-image">
                        <?php the_post_thumbnail('large', array('class' => 'hero-featured-image')); ?>
                    </div>
                <?php endif; ?>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<!-- Enhanced Main Content -->
<section class="blog-content-section">
    <div class="container">
        <div class="blog-content-wrapper">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="blog-post-enhanced">
                    <!-- Table of Contents for Long Posts -->
                    <?php if (str_word_count(get_the_content()) > 500) : ?>
                        <div class="table-of-contents">
                            <div class="toc-header">
                                <i class="fas fa-list"></i>
                                <h3>Table of Contents</h3>
                            </div>
                            <div class="toc-content" id="toc-content">
                                <!-- Auto-generated TOC will be populated by JavaScript -->
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Enhanced Post Content -->
                    <div class="post-content-enhanced">
                        <div class="content-wrapper">
                            <?php the_content(); ?>
                        </div>
                        
                        <!-- Enhanced Social Sharing -->
                        <div class="social-sharing-enhanced">
                            <h4>Share this post</h4>
                            <div class="sharing-buttons">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                                   class="share-btn facebook" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                    <span>Facebook</span>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                                   class="share-btn twitter" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                    <span>Twitter</span>
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" 
                                   class="share-btn linkedin" target="_blank">
                                    <i class="fab fa-linkedin-in"></i>
                                    <span>LinkedIn</span>
                                </a>
                                <a href="https://wa.me/?text=<?php echo urlencode(get_the_title() . ' - ' . get_permalink()); ?>" 
                                   class="share-btn whatsapp" target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                    <span>WhatsApp</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Enhanced Service Details for Service Posts -->
                    <?php if (get_post_type() == 'service') : ?>
                        <div class="service-details-enhanced">
                            <div class="service-header">
                                <h3 class="service-title">
                                    <i class="fas fa-info-circle"></i>
                                    Service Details
                                </h3>
                                <p class="service-subtitle">Everything you need to know about this service</p>
                            </div>
                            
                            <div class="service-meta-grid">
                                <?php 
                                $price = get_post_meta(get_the_ID(), '_service_price', true);
                                $duration = get_post_meta(get_the_ID(), '_service_duration', true);
                                $capacity = get_post_meta(get_the_ID(), '_service_capacity', true);
                                ?>
                                
                                <?php if ($price) : ?>
                                    <div class="meta-card price-card">
                                        <div class="meta-icon">
                                            <i class="fas fa-tags"></i>
                                        </div>
                                        <div class="meta-info">
                                            <span class="meta-label">Starting Price</span>
                                            <span class="meta-value price-value">₹<?php echo esc_html($price); ?></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($duration) : ?>
                                    <div class="meta-card duration-card">
                                        <div class="meta-icon">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="meta-info">
                                            <span class="meta-label">Duration</span>
                                            <span class="meta-value"><?php echo esc_html($duration); ?></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($capacity) : ?>
                                    <div class="meta-card capacity-card">
                                        <div class="meta-icon">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <div class="meta-info">
                                            <span class="meta-label">Capacity</span>
                                            <span class="meta-value"><?php echo esc_html($capacity); ?></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="service-cta-enhanced">
                                <div class="cta-content">
                                    <h4>Ready to get started?</h4>
                                    <p>Book this service now and experience the difference</p>
                                </div>
                                <div class="cta-buttons">
                                    <a href="/contact" class="cta-button-primary">
                                        <i class="fas fa-calendar-check"></i>
                                        Book Now
                                    </a>
                                    <a href="tel:+1234567890" class="cta-button-secondary">
                                        <i class="fas fa-phone"></i>
                                        Call Us
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Enhanced Post Navigation -->
                    <div class="post-navigation-enhanced">
                        <h3 class="nav-title">Continue Reading</h3>
                        <div class="nav-links">
                            <?php
                            $prev_post = get_previous_post();
                            $next_post = get_next_post();
                            ?>
                            
                            <?php if ($prev_post) : ?>
                                <div class="nav-previous">
                                    <a href="<?php echo get_permalink($prev_post->ID); ?>" class="nav-link">
                                        <div class="nav-direction">
                                            <i class="fas fa-arrow-left"></i>
                                            <span>Previous</span>
                                        </div>
                                        <div class="nav-content">
                                            <h4><?php echo get_the_title($prev_post->ID); ?></h4>
                                            <p><?php echo wp_trim_words(get_the_excerpt($prev_post->ID), 10); ?></p>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($next_post) : ?>
                                <div class="nav-next">
                                    <a href="<?php echo get_permalink($next_post->ID); ?>" class="nav-link">
                                        <div class="nav-direction">
                                            <span>Next</span>
                                            <i class="fas fa-arrow-right"></i>
                                        </div>
                                        <div class="nav-content">
                                            <h4><?php echo get_the_title($next_post->ID); ?></h4>
                                            <p><?php echo wp_trim_words(get_the_excerpt($next_post->ID), 10); ?></p>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<!-- Enhanced Related Posts/Services -->
<?php if (get_post_type() == 'service') : ?>
    <section class="related-services-enhanced">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">
                    <i class="fas fa-star"></i>
                    Related Services
                </h2>
                <p class="section-subtitle">Discover more services that might interest you</p>
            </div>
            
            <div class="services-grid-enhanced">
                <?php
                $related_services = get_posts(array(
                    'post_type' => 'service',
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'orderby' => 'rand'
                ));
                
                foreach ($related_services as $service) : setup_postdata($service);
                ?>
                    <div class="service-card-enhanced">
                        <div class="service-card-header">
                            <div class="service-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="service-badge">Service</div>
                        </div>
                        <div class="service-card-content">
                            <h3 class="service-title"><?php echo get_the_title($service->ID); ?></h3>
                            <p class="service-description">
                                <?php echo wp_trim_words(get_the_content($service->ID), 20); ?>
                            </p>
                        </div>
                        <div class="service-card-footer">
                            <a href="<?php echo get_permalink($service->ID); ?>" class="service-link">
                                Learn More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php else : ?>
    <section class="related-posts-enhanced">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">
                    <i class="fas fa-newspaper"></i>
                    Related Articles
                </h2>
                <p class="section-subtitle">More articles you might find interesting</p>
            </div>
            
            <div class="posts-grid-enhanced">
                <?php
                $related_posts = get_posts(array(
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'orderby' => 'rand'
                ));
                
                foreach ($related_posts as $post) : setup_postdata($post);
                ?>
                    <div class="post-card-enhanced">
                        <?php if (has_post_thumbnail($post->ID)) : ?>
                            <div class="post-image">
                                <?php echo get_the_post_thumbnail($post->ID, 'medium'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="post-content">
                            <h3 class="post-title"><?php echo get_the_title($post->ID); ?></h3>
                            <p class="post-excerpt">
                                <?php echo wp_trim_words(get_the_excerpt($post->ID), 15); ?>
                            </p>
                            <div class="post-meta">
                                <span class="post-date"><?php echo get_the_date('M j, Y', $post->ID); ?></span>
                            </div>
                            <a href="<?php echo get_permalink($post->ID); ?>" class="post-link">
                                Read More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Reading Progress Bar -->
<div class="reading-progress-bar" id="reading-progress"></div>

<!-- Back to Top Button -->
<button class="back-to-top" id="back-to-top">
    <i class="fas fa-chevron-up"></i>
</button>

<script>
// Reading progress bar
window.addEventListener('scroll', function() {
    const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (winScroll / height) * 100;
    document.getElementById('reading-progress').style.width = scrolled + '%';
});

// Back to top button
window.addEventListener('scroll', function() {
    const backToTop = document.getElementById('back-to-top');
    if (window.pageYOffset > 300) {
        backToTop.style.display = 'block';
    } else {
        backToTop.style.display = 'none';
    }
});

document.getElementById('back-to-top').addEventListener('click', function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

// Table of Contents generation
document.addEventListener('DOMContentLoaded', function() {
    const tocContent = document.getElementById('toc-content');
    if (tocContent) {
        const headings = document.querySelectorAll('.post-content-enhanced h2, .post-content-enhanced h3');
        const toc = document.createElement('ul');
        
        headings.forEach((heading, index) => {
            const id = 'heading-' + index;
            heading.id = id;
            
            const li = document.createElement('li');
            const a = document.createElement('a');
            a.href = '#' + id;
            a.textContent = heading.textContent;
            a.className = heading.tagName.toLowerCase();
            
            li.appendChild(a);
            toc.appendChild(li);
        });
        
        tocContent.appendChild(toc);
    }
});

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
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
</script>

<?php
// Helper function to calculate reading time
function get_reading_time() {
    $content = get_the_content();
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // Average reading speed: 200 words per minute
    return $reading_time;
}
?>

<?php get_footer(); ?>
