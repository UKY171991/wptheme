<?php
get_header(); ?>

<!-- ================= HERO SECTION ================= -->
<section class="hero-section-advanced services-hero">
    <div class="hero-overlay"></div>
    <div class="hero-particles"></div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge">🛠️ Service Archive</div>
            <h1 class="hero-title-fancy">All <span class="gradient-text">Services</span></h1>
            <p class="hero-subtitle-fancy">Browse our complete directory of professional services and find the perfect solution for your needs</p>
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
                    <div class="stat-number" data-count="24">0</div>
                    <div class="stat-label">/7 Support</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============== ALL SERVICES SECTION ============== -->
<section class="services-section-fancy all-posts all-services-posts">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">Service Directory</div>
            <h2 class="section-title-fancy">Professional <span class="gradient-text">Services</span></h2>
            <p class="section-subtitle-fancy">Discover all our available services with detailed information and transparent pricing</p>
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
                'orderby'        => 'date',
                'order'          => 'DESC',
            ) );
            if ( $service_query->have_posts() ) :
                while ( $service_query->have_posts() ) : $service_query->the_post();
            ?>
                <article class="post-card service-post-card" data-category="<?php echo get_post_meta(get_the_ID(), 'service_category', true); ?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'medium', array( 'alt' => esc_attr( get_the_title() ) ) ); ?>
                            </a>
                            <div class="post-overlay"></div>
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

<!-- ============== SERVICE CTA SECTION ============== -->
<section class="cta-section-fancy services-cta">
    <div class="container">
        <div class="cta-content-fancy">
            <div class="cta-badge">Ready to Get Started?</div>
            <h2 class="cta-title-fancy">Need a <span class="gradient-text">Professional Service?</span></h2>
            <p class="cta-subtitle-fancy">Contact us today for a free consultation and transparent quote. We're here to help you succeed.</p>
            <div class="cta-buttons-fancy">
                <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contact' ) ) ); ?>" class="btn-primary-fancy">
                    <span>Get Free Quote</span>
                    <i class="arrow-right" aria-hidden="true">→</i>
                </a>
                <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'pricing' ) ) ); ?>" class="btn-secondary-fancy">
                    <span>View Pricing</span>
                    <i class="price-icon" aria-hidden="true">💰</i>
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>