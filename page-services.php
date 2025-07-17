<?php
/*
Template Name: All Blueprints Page
*/
get_header(); ?>

<!-- ================= HERO SECTION ================= -->
<section class="hero-section-advanced services-hero redesigned-hero">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge">
                <svg width="24" height="24" fill="none" viewBox="0 0 24 24" aria-hidden="true" style="vertical-align:middle;margin-right:8px;"><rect x="3" y="3" width="18" height="18" rx="4" fill="#4F8EF7"/><path d="M7 7h10v2H7V7zm0 4h10v2H7v-2zm0 4h6v2H7v-2z" fill="#fff"/></svg>
                <span>Business Blueprints</span>
            </div>
            <h1 class="hero-title-fancy">75 Proven <span class="gradient-text">Business Blueprints</span></h1>
            <p class="hero-subtitle-fancy">Discover profitable business opportunities with detailed startup guides, cost analysis, and step-by-step implementation plans for each blueprint.</p>
            <div class="hero-stats redesigned-hero-stats">
                <div class="stat-item">
                    <span class="stat-icon" aria-hidden="true">📘</span>
                    <div class="stat-number" data-count="75">75</div>
                    <div class="stat-label">Business Blueprints</div>
                </div>
                <div class="stat-item">
                    <span class="stat-icon" aria-hidden="true">🏷️</span>
                    <div class="stat-number" data-count="12">12</div>
                    <div class="stat-label">Industry Categories</div>
                </div>
                <div class="stat-item">
                    <span class="stat-icon" aria-hidden="true">⭐</span>
                    <div class="stat-number" data-count="2500">2500+</div>
                    <div class="stat-label">Success Stories</div>
                </div>
                <div class="stat-item">
                    <span class="stat-icon" aria-hidden="true">🎯</span>
                    <div class="stat-number" data-count="95">95%</div>
                    <div class="stat-label">% Success Rate</div>
                </div>
            </div>
            <div class="hero-buttons redesigned-hero-buttons">
                <a href="#featured-blueprints" class="btn-primary-fancy">
                    <span>Browse Blueprints</span>
                    <i class="arrow-right">→</i>
                </a>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-secondary-fancy">
                    <span>Get Consultation</span>
                    <i class="phone-icon" aria-hidden="true">📞</i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Service Categories Section -->
<section class="services-section-fancy blog-categories service-categories redesigned-categories">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Categories</div>
            <h2 class="section-title-fancy">Service <span class="gradient-text">Categories</span></h2>
            <p class="section-subtitle-fancy">Browse our services by category to find exactly what you need</p>
        </div>
        <div class="categories-grid redesigned-categories-grid">
            <?php
            $service_categories = array(
                array(
                    'name' => 'Home Cleaning',
                    'icon' => '<svg width="32" height="32" fill="none" viewBox="0 0 32 32"><rect x="4" y="8" width="24" height="16" rx="4" fill="#4F8EF7"/><path d="M8 20h16v2H8v-2z" fill="#fff"/></svg>',
                    'count' => '12',
                    'description' => 'Professional home cleaning services'
                ),
                array(
                    'name' => 'Business Consulting',
                    'icon' => '<svg width="32" height="32" fill="none" viewBox="0 0 32 32"><circle cx="16" cy="16" r="12" fill="#F7B32B"/><path d="M12 20h8v2h-8v-2z" fill="#fff"/></svg>',
                    'count' => '8',
                    'description' => 'Strategic business advice and consulting'
                ),
                array(
                    'name' => 'IT Support',
                    'icon' => '<svg width="32" height="32" fill="none" viewBox="0 0 32 32"><rect x="6" y="10" width="20" height="12" rx="3" fill="#4FC3F7"/><path d="M10 22h12v2H10v-2z" fill="#fff"/></svg>',
                    'count' => '15',
                    'description' => 'Technology solutions and support'
                ),
                array(
                    'name' => 'Maintenance',
                    'icon' => '<svg width="32" height="32" fill="none" viewBox="0 0 32 32"><rect x="8" y="8" width="16" height="16" rx="4" fill="#81C784"/><path d="M12 20h8v2h-8v-2z" fill="#fff"/></svg>',
                    'count' => '10',
                    'description' => 'Property and equipment maintenance'
                ),
                array(
                    'name' => 'Marketing',
                    'icon' => '<svg width="32" height="32" fill="none" viewBox="0 0 32 32"><rect x="6" y="12" width="20" height="8" rx="4" fill="#FF8A65"/><path d="M10 20h12v2H10v-2z" fill="#fff"/></svg>',
                    'count' => '6',
                    'description' => 'Digital marketing and promotion'
                ),
                array(
                    'name' => 'Design',
                    'icon' => '<svg width="32" height="32" fill="none" viewBox="0 0 32 32"><circle cx="16" cy="16" r="12" fill="#BA68C8"/><path d="M12 20h8v2h-8v-2z" fill="#fff"/></svg>',
                    'count' => '9',
                    'description' => 'Creative design and branding'
                )
            );
            foreach ($service_categories as $category) :
            ?>
                <a href="#all-services" class="category-card redesigned-category-card" title="<?php echo esc_attr($category['description']); ?>">
                    <div class="category-icon" aria-hidden="true">
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
<section class="latest-services-highlight redesigned-latest-services">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">🔥 Just Added</div>
            <h2 class="section-title-fancy">Latest <span class="gradient-text">Services</span></h2>
            <p class="section-subtitle-fancy">Check out our newest service offerings added this month</p>
        </div>
        <div class="latest-services-grid redesigned-latest-services-grid">
            <?php while ($latest_services->have_posts()) : $latest_services->the_post(); 
                $post_date = get_the_date('U');
                $current_date = current_time('timestamp');
                $days_diff = ($current_date - $post_date) / (60 * 60 * 24);
            ?>
                <article class="latest-service-card redesigned-latest-service-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="latest-service-image">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium_large'); ?>
                            </a>
                            <div class="latest-overlay"></div>
                            <span class="days-ago">Added <?php echo ceil($days_diff); ?> days ago</span>
                        </div>
                    <?php endif; ?>
                    <div class="latest-service-content">
                        <h3 class="latest-service-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <div class="latest-service-meta">
                            <span class="service-price badge-pill">
                                <i class="fas fa-tag"></i>
                                <?php echo get_post_meta(get_the_ID(), 'service_price', true) ?: 'Quote on request'; ?>
                            </span>
                            <span class="service-category badge-pill">
                                <i class="fas fa-folder"></i>
                                <?php echo get_post_meta(get_the_ID(), 'service_category', true) ?: 'General'; ?>
                            </span>
                        </div>
                        <div class="latest-service-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="latest-service-btn btn-primary-fancy">
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

<!-- ============== ALL SERVICES SECTION ============== -->
<section id="all-services" class="services-section-fancy all-posts all-services-posts redesigned-all-services">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">All Services</div>
            <h2 class="section-title-fancy">Complete <span class="gradient-text">Service Directory</span></h2>
            <p class="section-subtitle-fancy">Browse through all our professional services and find the perfect solution for your needs</p>
            <!-- Latest Services Summary -->
            <div class="latest-services-summary redesigned-summary-stats">
                <?php
                $total_services_query = new WP_Query(array(
                    'post_type' => 'service',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'fields' => 'ids'
                ));
                $total_services = $total_services_query->found_posts;
                wp_reset_postdata();
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
                <div class="summary-stats redesigned-summary-stats">
                    <div class="summary-item">
                        <span class="summary-icon" aria-hidden="true">📋</span>
                        <span class="summary-number"><?php echo $total_services; ?></span>
                        <span class="summary-label">Total Services</span>
                    </div>
                    <?php if ($recent_count > 0) : ?>
                    <div class="summary-item latest">
                        <span class="summary-icon" aria-hidden="true">🆕</span>
                        <span class="summary-number"><?php echo $recent_count; ?></span>
                        <span class="summary-label">Latest Services</span>
                        <span class="summary-badge">Recent</span>
                    </div>
                    <?php endif; ?>
                    <?php if ($new_count > 0) : ?>
                    <div class="summary-item new">
                        <span class="summary-icon" aria-hidden="true">✨</span>
                        <span class="summary-number"><?php echo $new_count; ?></span>
                        <span class="summary-label">New This Week</span>
                        <span class="summary-badge">New</span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="posts-filter redesigned-posts-filter">
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">All Services</button>
                <button class="filter-btn" data-filter="popular">Popular</button>
                <button class="filter-btn" data-filter="recent">New</button>
                <button class="filter-btn" data-filter="featured">Featured</button>
            </div>
            <div class="search-box">
                <input type="text" id="service-search" placeholder="Search services...">
                <i class="fas fa-search search-icon" aria-hidden="true"></i>
            </div>
        </div>
        <div class="posts-grid redesigned-posts-grid" id="services-posts-container">
            <?php
            $paged = max( 1, get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' ) );
            $service_query = new WP_Query( array(
                'post_type'      => 'service',
                'posts_per_page' => 12,
                'paged'          => $paged,
                'orderby'        => 'date',
                'order'          => 'DESC',
                'post_status'    => 'publish'
            ) );
            if ( !$service_query->have_posts() ) :
                $demo_services = array(
                    array(
                        'title' => 'Professional House Cleaning',
                        'excerpt' => 'Complete home cleaning service with eco-friendly products and professional staff.',
                        'price' => '$99',
                        'duration' => '2-3 hours',
                        'category' => 'Home Cleaning'
                    ),
                    array(
                        'title' => 'Business Consultation',
                        'excerpt' => 'Strategic business advice to help your company grow and succeed in competitive markets.',
                        'price' => '$150/hour',
                        'duration' => '1-2 hours',
                        'category' => 'Consulting'
                    ),
                    array(
                        'title' => 'IT Support & Maintenance',
                        'excerpt' => 'Professional IT support for small businesses including network setup and maintenance.',
                        'price' => '$120/hour',
                        'duration' => '1-4 hours',
                        'category' => 'Technology'
                    ),
                    array(
                        'title' => 'Garden Landscaping',
                        'excerpt' => 'Transform your outdoor space with professional landscaping and garden design services.',
                        'price' => '$200',
                        'duration' => '1 day',
                        'category' => 'Landscaping'
                    ),
                    array(
                        'title' => 'Web Design & Development',
                        'excerpt' => 'Modern, responsive websites that help your business stand out and attract customers.',
                        'price' => '$500+',
                        'duration' => '1-2 weeks',
                        'category' => 'Design'
                    ),
                    array(
                        'title' => 'Marketing Strategy',
                        'excerpt' => 'Comprehensive marketing plans to boost your brand visibility and customer engagement.',
                        'price' => '$300',
                        'duration' => '2-4 hours',
                        'category' => 'Marketing'
                    )
                );
                foreach ($demo_services as $index => $demo_service) :
                    $is_recent = $index < 2;
                    $is_new = $index < 1;
            ?>
                <article class="post-card service-post-card demo-service redesigned-service-card" 
                         data-category="<?php echo $demo_service['category']; ?>"
                         data-post-date="<?php echo date('Y-m-d', strtotime('-' . $index . ' days')); ?>"
                         data-recent="<?php echo $is_recent ? 'true' : 'false'; ?>"
                         data-new="<?php echo $is_new ? 'true' : 'false'; ?>">
                    <div class="post-thumbnail no-image">
                        <div class="placeholder-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <?php if ($is_recent) : ?>
                            <span class="latest-badge">Latest</span>
                        <?php endif; ?>
                    </div>
                    <div class="post-content">
                        <div class="post-meta">
                            <span class="service-price badge-pill">
                                <i class="fas fa-dollar-sign"></i>
                                <?php echo $demo_service['price']; ?>
                            </span>
                            <span class="service-duration badge-pill">
                                <i class="fas fa-clock"></i>
                                <?php echo $demo_service['duration']; ?>
                            </span>
                            <?php if ($is_new) : ?>
                                <span class="service-new">
                                    <i class="fas fa-star"></i>
                                    New Service
                                </span>
                            <?php endif; ?>
                        </div>
                        <h3 class="post-title">
                            <a href="#"><?php echo $demo_service['title']; ?></a>
                        </h3>
                        <div class="post-excerpt">
                            <?php echo $demo_service['excerpt']; ?>
                        </div>
                        <div class="post-footer">
                            <a href="#" class="read-more-btn btn-primary-fancy">
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
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
                <div class="pagination-wrapper redesigned-pagination">
                    <div class="pagination-info">
                        Showing <strong>1-6</strong> of <strong>6</strong> demo services
                    </div>
                    <div class="pagination-enhanced">
                        <span class="page-numbers current">1</span>
                        <a href="#" class="page-numbers">2</a>
                        <a href="#" class="page-numbers">3</a>
                        <a href="#" class="page-numbers next">Next <i class="fas fa-chevron-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            <?php else: ?>
                <?php while ( $service_query->have_posts() ) : $service_query->the_post();
                    $post_date = get_the_date('U');
                    $current_date = current_time('timestamp');
                    $days_diff = ($current_date - $post_date) / (60 * 60 * 24);
                    $is_recent = $days_diff <= 30;
                    $is_new = $days_diff <= 7;
            ?>
                <article class="post-card service-post-card redesigned-service-card" 
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
                            <?php if ($days_diff <= 30) : ?>
                                <span class="latest-badge">Latest</span>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="post-thumbnail no-image">
                            <div class="placeholder-icon">
                                <i class="fas fa-cogs"></i>
                            </div>
                            <?php if ($days_diff <= 30) : ?>
                                <span class="latest-badge">Latest</span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="post-content">
                        <div class="post-meta">
                            <span class="service-price badge-pill">
                                <i class="fas fa-dollar-sign"></i>
                                <?php echo get_post_meta(get_the_ID(), 'service_price', true) ?: 'Contact for quote'; ?>
                            </span>
                            <span class="service-duration badge-pill">
                                <i class="fas fa-clock"></i>
                                <?php echo get_post_meta(get_the_ID(), 'service_duration', true) ?: '1-2 hours'; ?>
                            </span>
                            <?php if ($days_diff <= 7) : ?>
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
                            <a href="<?php the_permalink(); ?>" class="read-more-btn btn-primary-fancy">
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
            <?php endwhile; ?>
                <?php
                if ( $service_query->max_num_pages > 1 ) :
                    $current_page = max( 1, $paged );
                    $total_pages = $service_query->max_num_pages;
                    $total_posts = $service_query->found_posts;
                    $posts_per_page = $service_query->query_vars['posts_per_page'];
                    $start_post = ( $current_page - 1 ) * $posts_per_page + 1;
                    $end_post = min( $current_page * $posts_per_page, $total_posts );
                ?>
                    <div class="pagination-wrapper redesigned-pagination">
                        <div class="pagination-info">
                            Showing <strong><?php echo $start_post; ?>-<?php echo $end_post; ?></strong> of <strong><?php echo $total_posts; ?></strong> services
                        </div>
                        <?php
                        $big = 999999999;
                        $pagination_links = paginate_links( array(
                            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                            'format'    => '?paged=%#%',
                            'current'   => $current_page,
                            'total'     => $total_pages,
                            'prev_text' => '<i class="fas fa-chevron-left" aria-hidden="true"></i> Previous',
                            'next_text' => 'Next <i class="fas fa-chevron-right" aria-hidden="true"></i>',
                            'mid_size'  => 2,
                            'end_size'  => 1,
                            'type'      => 'array',
                            'add_args'  => false,
                        ) );
                        if ( $pagination_links ) {
                            echo '<div class="pagination-enhanced">';
                            foreach ( $pagination_links as $link ) {
                                $link = str_replace( 'page-numbers', 'page-numbers', $link );
                                $link = str_replace( 'prev page-numbers', 'page-numbers prev', $link );
                                $link = str_replace( 'next page-numbers', 'page-numbers next', $link );
                                $link = str_replace( 'dots', 'page-numbers dots', $link );
                                echo $link;
                            }
                            echo '</div>';
                        }
                        ?>
                    </div>
                <?php endif; ?>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<!-- ============== CTA / AWARDS SECTION ============== -->
<section class="cta-awards-section redesigned-cta-awards">
    <div class="container">
        <div class="cta-awards-content">
            <div class="cta-block">
                <h2 class="cta-title">Ready to Experience Excellence?</h2>
                <p class="cta-desc">Join thousands of satisfied clients who trust us with their service needs. Get started with a free consultation or explore our award-winning blueprints.</p>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn-primary-fancy cta-btn">
                    <span>Get Your Free Consultation</span>
                    <i class="arrow-right">→</i>
                </a>
            </div>
            <div class="awards-block">
                <div class="awards-list">
                    <div class="award-item">
                        <span class="award-icon" aria-hidden="true">🏆</span>
                        <span class="award-title">Best Business Blueprint Platform 2024</span>
                    </div>
                    <div class="award-item">
                        <span class="award-icon" aria-hidden="true">⭐</span>
                        <span class="award-title">Top Startup Mentor Program 2023</span>
                    </div>
                    <div class="award-item">
                        <span class="award-icon" aria-hidden="true">🌟</span>
                        <span class="award-title">Entrepreneur's Choice Award 2023</span>
                    </div>
                    <div class="award-item">
                        <span class="award-icon" aria-hidden="true">💎</span>
                        <span class="award-title">Business Excellence Certified 2022</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
