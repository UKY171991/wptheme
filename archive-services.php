<?php
get_header(); ?>

<!-- ================= HERO SECTION ================= -->
<section class="hero-section-advanced services-hero">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge">Our Services</div>
            <h1 class="hero-title-fancy">Service <span class="gradient-text">Archive</span></h1>
            <p class="hero-subtitle-fancy">Browse our complete list of professional services</p>
        </div>
    </div>
</section>

<!-- ============== SERVICES GRID SECTION ============== -->
<section class="services-section-fancy all-services-posts">
    <div class="container">
        <div class="section-header-fancy">
            <div class="section-badge">All Services</div>
            <h2 class="section-title-fancy">Our <span class="gradient-text">Service Offerings</span></h2>
            <p class="section-subtitle-fancy">Browse our complete list of professional services</p>
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
                <article class="post-card service-post-card">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'medium', array( 'alt' => esc_attr( get_the_title() ) ) ); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="post-content">
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
                            <?php edit_post_link( 'Edit Service', '<span class="edit-link" style="margin-left:10px; color:#d35400; font-weight:bold;">', '</span>' ); ?>
                        </div>
                    </div>
                </article>
            <?php endwhile; else: ?>
                <p>No services found.</p>
            <?php endif; wp_reset_postdata(); ?>
        </div>
        <!-- Pagination -->
        <?php
        if ( $service_query->max_num_pages > 1 ) :
            $big = 999999999; // need an unlikely integer
            $pagination = paginate_links( array(
                'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'    => '?paged=%#%',
                'current'   => max( 1, $paged ),
                'total'     => $service_query->max_num_pages,
                'prev_text' => '<i class="fas fa-chevron-left" aria-hidden="true"></i> Previous',
                'next_text' => 'Next <i class="fas fa-chevron-right" aria-hidden="true"></i>',
                'type'      => 'list',
            ) );
            if ( $pagination ) {
                echo '<div class="pagination-enhanced">' . $pagination . '</div>';
            }
        endif;
        ?>
    </div>
</section>

<!-- ============== CALL TO ACTION SECTION ============== -->
<section class="cta-section-fancy services-cta">
    <div class="container">
        <div class="cta-content-fancy">
            <div class="cta-badge">Ready to Get Started?</div>
            <h2 class="cta-title-fancy">Need a <span class="gradient-text">Professional Service?</span></h2>
            <p class="cta-subtitle-fancy">Contact us today for a free consultation and transparent quote.</p>
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