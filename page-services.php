<?php
/*
Template Name: Services Page
*/
get_header(); ?>

<!-- ================= HERO SECTION ================= -->
<section class="hero-section-advanced services-hero">
    <div class="hero-overlay"></div>
    <div class="hero-particles"></div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge">🛠️ Our Services</div>
            <h1 class="hero-title-fancy">Professional <span class="gradient-text">Services</span></h1>
            <p class="hero-subtitle-fancy">Discover our comprehensive range of professional services designed to make your life easier and your business more successful.</p>
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number" data-count="50">0</div>
                    <div class="stat-label">+ Services</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="9">0</div>
                    <div class="stat-label">Categories</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="2500">0</div>
                    <div class="stat-label">Happy Clients</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="99">0</div>
                    <div class="stat-label">% Satisfaction</div>
                </div>
            </div>
            <div class="hero-buttons">
                <a href="#featured-services" class="btn-primary-fancy">
                    <span>Explore Services</span>
                    <i class="arrow-right">→</i>
                </a>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-secondary-fancy">
                    <span>Get Quote</span>
                    <i class="phone-icon">📞</i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Service Categories Section -->
<section class="services-section-fancy blog-categories service-categories">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Categories</div>
            <h2 class="section-title-fancy">Service <span class="gradient-text">Categories</span></h2>
            <p class="section-subtitle-fancy">Browse our services by category to find exactly what you need</p>
        </div>
        
        <div class="categories-grid">
            <?php
            // Get service categories (you can customize this based on your taxonomy)
            $service_categories = array(
                array(
                    'name' => 'Home Cleaning',
                    'icon' => '🏠',
                    'count' => '12',
                    'description' => 'Professional home cleaning services'
                ),
                array(
                    'name' => 'Business Consulting',
                    'icon' => '💼',
                    'count' => '8',
                    'description' => 'Strategic business advice and consulting'
                ),
                array(
                    'name' => 'IT Support',
                    'icon' => '💻',
                    'count' => '15',
                    'description' => 'Technology solutions and support'
                ),
                array(
                    'name' => 'Maintenance',
                    'icon' => '🔧',
                    'count' => '10',
                    'description' => 'Property and equipment maintenance'
                ),
                array(
                    'name' => 'Marketing',
                    'icon' => '📈',
                    'count' => '6',
                    'description' => 'Digital marketing and promotion'
                ),
                array(
                    'name' => 'Design',
                    'icon' => '🎨',
                    'count' => '9',
                    'description' => 'Creative design and branding'
                )
            );
            
            foreach ($service_categories as $category) :
            ?>
                <a href="#all-services" class="category-card">
                    <div class="category-icon">
                        <?php echo $category['icon']; ?>
                    </div>
                    <h3><?php echo esc_html($category['name']); ?></h3>
                    <p class="category-count"><?php echo $category['count']; ?> services</p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Latest Services Highlight Section -->
<?php
$latest_services = new WP_Query(array(
    'post_type' => 'service',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC',
    'date_query' => array(
        array(
            'after' => '30 days ago'
        )
    )
));

if ($latest_services->have_posts()) :
?>
<section class="latest-services-highlight">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">🔥 Just Added</div>
            <h2 class="section-title-fancy">Latest <span class="gradient-text">Services</span></h2>
            <p class="section-subtitle-fancy">Check out our newest service offerings added this month</p>
        </div>
        
        <div class="latest-services-grid">
            <?php while ($latest_services->have_posts()) : $latest_services->the_post(); 
                $post_date = get_the_date('U');
                $current_date = current_time('timestamp');
                $days_diff = ($current_date - $post_date) / (60 * 60 * 24);
            ?>
                <article class="latest-service-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="latest-service-image">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium_large'); ?>
                            </a>
                            <div class="latest-overlay"></div>
                            <span class="days-ago"><?php echo ceil($days_diff); ?> days ago</span>
                        </div>
                    <?php endif; ?>
                    
                    <div class="latest-service-content">
                        <h3 class="latest-service-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <div class="latest-service-meta">
                            <span class="service-price">
                                <i class="fas fa-tag"></i>
                                <?php echo get_post_meta(get_the_ID(), 'service_price', true) ?: 'Quote on request'; ?>
                            </span>
                            <span class="service-category">
                                <i class="fas fa-folder"></i>
                                <?php echo get_post_meta(get_the_ID(), 'service_category', true) ?: 'General'; ?>
                            </span>
                        </div>
                        <div class="latest-service-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="latest-service-btn">
                            <span>Learn More</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Featured Services Section -->
<section id="featured-services" class="featured-blueprints-section featured-posts featured-services">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Featured</div>
            <h2 class="section-title-fancy">Popular <span class="gradient-text">Services</span></h2>
            <p class="section-subtitle-fancy">Our most requested and highly-rated professional services</p>
        </div>
        
        <div class="featured-posts-grid">
            <?php
            $featured_services = new WP_Query(array(
                'post_type' => 'service',
                'posts_per_page' => 6,
                'meta_key' => '_is_featured',
                'meta_value' => 'yes',
                'orderby' => 'date',
                'order' => 'DESC'
            ));
            
            if (!$featured_services->have_posts()) {
                $featured_services = new WP_Query(array(
                    'post_type' => 'service',
                    'posts_per_page' => 6,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
            }
            
            if ($featured_services->have_posts()) :
                while ($featured_services->have_posts()) : $featured_services->the_post();
            ?>
                <article class="blog-post-card service-post-card <?php echo ($featured_services->current_post === 0) ? 'featured' : ''; ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium_large'); ?>
                            </a>
                            <div class="post-overlay"></div>
                        </div>
                    <?php endif; ?>
                    
                    <div class="post-content">
                        <div class="post-meta">
                            <span class="service-price">
                                <i class="fas fa-dollar-sign"></i>
                                Starting at $99
                            </span>
                            <span class="service-duration">
                                <i class="fas fa-clock"></i>
                                2-4 hours
                            </span>
                            <span class="service-rating">
                                <i class="fas fa-star"></i>
                                4.9/5
                            </span>
                        </div>
                        
                        <h3 class="post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        
                        <div class="post-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <div class="post-footer">
                            <a href="<?php the_permalink(); ?>" class="read-more-btn">
                                <span>View Details</span>
                                <i class="arrow-right">→</i>
                            </a>
                            <div class="post-stats">
                                <span class="stat">
                                    <i class="fas fa-users"></i>
                                    250+ clients
                                </span>
                                <span class="stat">
                                    <i class="fas fa-thumbs-up"></i>
                                    98% satisfied
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

<!-- ============== ALL SERVICES SECTION ============== -->
<section id="all-services" class="services-section-fancy all-posts all-services-posts">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">All Services</div>
            <h2 class="section-title-fancy">Complete <span class="gradient-text">Service Directory</span></h2>
            <p class="section-subtitle-fancy">Browse through all our professional services and find the perfect solution for your needs</p>
            
            <!-- Latest Services Summary -->
            <div class="latest-services-summary">
                <?php
                $recent_services_count = get_posts(array(
                    'post_type' => 'service',
                    'posts_per_page' => -1,
                    'date_query' => array(
                        array(
                            'after' => '30 days ago'
                        )
                    ),
                    'fields' => 'ids'
                ));
                $recent_count = count($recent_services_count);
                
                $new_services_count = get_posts(array(
                    'post_type' => 'service',
                    'posts_per_page' => -1,
                    'date_query' => array(
                        array(
                            'after' => '7 days ago'
                        )
                    ),
                    'fields' => 'ids'
                ));
                $new_count = count($new_services_count);
                ?>
                <div class="summary-stats">
                    <div class="summary-item">
                        <span class="summary-number"><?php echo $service_query->found_posts; ?></span>
                        <span class="summary-label">Total Services</span>
                    </div>
                    <?php if ($recent_count > 0) : ?>
                    <div class="summary-item latest">
                        <span class="summary-number"><?php echo $recent_count; ?></span>
                        <span class="summary-label">Latest Services</span>
                        <span class="summary-badge">Recent</span>
                    </div>
                    <?php endif; ?>
                    <?php if ($new_count > 0) : ?>
                    <div class="summary-item new">
                        <span class="summary-number"><?php echo $new_count; ?></span>
                        <span class="summary-label">New This Week</span>
                        <span class="summary-badge">New</span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="posts-filter">
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">All Services</button>
                <button class="filter-btn" data-filter="popular">Popular</button>
                <button class="filter-btn" data-filter="recent">New</button>
                <button class="filter-btn" data-filter="featured">Featured</button>
            </div>
            
            <div class="search-box">
                <input type="text" id="service-search" placeholder="Search services...">
                <i class="fas fa-search search-icon"></i>
            </div>
        </div>
        
        <div class="posts-grid" id="services-posts-container">
            <?php
            $paged = max( 1, get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' ) );
            $service_query = new WP_Query( array(
                'post_type'      => 'service',
                'posts_per_page' => 12,
                'paged'          => $paged,
                'orderby'        => array(
                    'date' => 'DESC',
                    'modified' => 'DESC'
                ),
                'order'          => 'DESC',
                'post_status'    => 'publish',
                'meta_query'     => array(
                    'relation' => 'OR',
                    array(
                        'key'     => '_is_latest',
                        'value'   => 'yes',
                        'compare' => '='
                    ),
                    array(
                        'key'     => '_is_latest',
                        'compare' => 'NOT EXISTS'
                    )
                )
            ) );
            if ( $service_query->have_posts() ) :
                while ( $service_query->have_posts() ) : $service_query->the_post();
                    // Calculate if post is recent
                    $post_date = get_the_date('U');
                    $current_date = current_time('timestamp');
                    $days_diff = ($current_date - $post_date) / (60 * 60 * 24);
                    $is_recent = $days_diff <= 30;
                    $is_new = $days_diff <= 7;
            ?>
                <article class="post-card service-post-card" 
                         data-category="<?php echo get_post_meta(get_the_ID(), 'service_category', true); ?>"
                         data-post-date="<?php echo get_the_date('Y-m-d'); ?>"
                         data-recent="<?php echo $is_recent ? 'true' : 'false'; ?>"
                         data-new="<?php echo $is_new ? 'true' : 'false'; ?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'medium', array( 'alt' => esc_attr( get_the_title() ) ) ); ?>
                            </a>
                            <div class="post-overlay"></div>
                            <?php 
                            // Add "Latest" badge for posts from last 30 days
                            $post_date = get_the_date('U');
                            $current_date = current_time('timestamp');
                            $days_diff = ($current_date - $post_date) / (60 * 60 * 24);
                            
                            if ($days_diff <= 30) : ?>
                                <span class="latest-badge">Latest</span>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="post-thumbnail no-image">
                            <div class="placeholder-icon">
                                <i class="fas fa-cogs"></i>
                            </div>
                            <?php 
                            // Add "Latest" badge for posts from last 30 days
                            $post_date = get_the_date('U');
                            $current_date = current_time('timestamp');
                            $days_diff = ($current_date - $post_date) / (60 * 60 * 24);
                            
                            if ($days_diff <= 30) : ?>
                                <span class="latest-badge">Latest</span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="post-content">
                        <div class="post-meta">
                            <span class="service-price">
                                <i class="fas fa-dollar-sign"></i>
                                <?php echo get_post_meta(get_the_ID(), 'service_price', true) ?: 'Contact for quote'; ?>
                            </span>
                            <span class="service-duration">
                                <i class="fas fa-clock"></i>
                                <?php echo get_post_meta(get_the_ID(), 'service_duration', true) ?: '1-2 hours'; ?>
                            </span>
                            <?php 
                            // Show "New" label for recent posts
                            $post_date = get_the_date('U');
                            $current_date = current_time('timestamp');
                            $days_diff = ($current_date - $post_date) / (60 * 60 * 24);
                            
                            if ($days_diff <= 7) : ?>
                                <span class="service-new">
                                    <i class="fas fa-star"></i>
                                    New Service
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
                                <span>View Details</span>
                                <i class="arrow-right" aria-hidden="true">→</i>
                            </a>
                            <div class="post-stats">
                                <span class="stat">
                                    <i class="fas fa-star"></i>
                                    4.8/5
                                </span>
                                <span class="stat">
                                    <i class="fas fa-check"></i>
                                    Available
                                </span>
                            </div>
                            <?php edit_post_link( 'Edit Service', '<span class="edit-link" style="margin-left:10px; color:#d35400; font-weight:bold;">', '</span>' ); ?>
                        </div>
                    </div>
                </article>
            <?php endwhile; else: ?>
                <div class="no-services-message">
                    <h3>No Services Available</h3>
                    <p>We're currently updating our service offerings. Please check back soon or contact us directly for assistance.</p>
                    <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contact' ) ) ); ?>" class="btn-primary-fancy">
                        <span>Contact Us</span>
                        <i class="arrow-right" aria-hidden="true">→</i>
                    </a>
                </div>
            <?php endif; wp_reset_postdata(); ?>
        </div>
        
        <!-- Pagination -->
        <?php
        if ( $service_query->max_num_pages > 1 ) :
            $big = 999999999; // need an unlikely integer
            $pagination_links = paginate_links( array(
                'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'    => '?paged=%#%',
                'current'   => max( 1, $paged ),
                'total'     => $service_query->max_num_pages,
                'prev_text' => '<i class="fas fa-chevron-left" aria-hidden="true"></i> Previous',
                'next_text' => 'Next <i class="fas fa-chevron-right" aria-hidden="true"></i>',
                'type'      => 'array',
            ) );
            if ( $pagination_links ) {
                echo '<div class="pagination-enhanced">';
                foreach ( $pagination_links as $link ) {
                    echo $link;
                }
                echo '</div>';
            }
        endif;
        ?>
    </div>
</section>

<!-- ============== SERVICE NEWSLETTER SECTION ============== -->
<section class="cta-section-fancy newsletter-section service-newsletter">
    <div class="container">
        <div class="cta-content-fancy">
            <div class="cta-badge">Stay Informed</div>
            <h2 class="cta-title-fancy">Get Service <span class="gradient-text">Updates</span></h2>
            <p class="cta-subtitle-fancy">Be the first to know about new services, special offers, and exclusive deals. Join our newsletter for insider access to our latest offerings.</p>
            
            <form class="newsletter-form" action="#" method="post">
                <div class="form-group">
                    <input type="email" name="email" placeholder="Enter your email address" required>
                    <button type="submit" class="btn-primary-fancy">
                        <span>Subscribe</span>
                        <i class="arrow-right">→</i>
                    </button>
                </div>
                <div class="form-checkbox">
                    <input type="checkbox" id="service-newsletter-consent" required>
                    <label for="service-newsletter-consent">I agree to receive service updates and promotional emails</label>
                </div>
            </form>
            
            <div class="newsletter-benefits">
                <div class="benefit-item">
                    <span class="benefit-icon">🔔</span>
                    <span>New Services</span>
                </div>
                <div class="benefit-item">
                    <span class="benefit-icon">💰</span>
                    <span>Special Offers</span>
                </div>
                <div class="benefit-item">
                    <span class="benefit-icon">⭐</span>
                    <span>Exclusive Deals</span>
                </div>
                <div class="benefit-item">
                    <span class="benefit-icon">�</span>
                    <span>Service Tips</span>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
