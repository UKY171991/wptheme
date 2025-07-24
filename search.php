<?php get_header(); ?>

<!-- Search Results Banner Section -->
<section class="page-banner search-banner" style="background: linear-gradient(135deg, rgba(74, 144, 226, 0.9), rgba(126, 58, 242, 0.8));">
    <div class="container">
        <div class="banner-content">
            <div class="breadcrumb">
                <a href="<?php echo home_url(); ?>"><i class="fas fa-home"></i> Home</a> 
                <span class="breadcrumb-separator">→</span> 
                <span>Search Results</span>
            </div>
            <h1 class="banner-title">
                <?php if (have_posts()) : ?>
                    Search Results for "<?php echo get_search_query(); ?>"
                <?php else : ?>
                    No Results Found
                <?php endif; ?>
            </h1>
            <p class="banner-subtitle">
                <?php if (have_posts()) : ?>
                    Found <?php echo $wp_query->found_posts; ?> result(s) for your search
                <?php else : ?>
                    Sorry, no results were found for "<?php echo get_search_query(); ?>". Try different keywords.
                <?php endif; ?>
            </p>
        </div>
    </div>
</section>

<div class="search-results" style="padding: 4rem 0; background: #f8f9fa;">
    <div class="container">

        <?php if (have_posts()) : ?>
            <div class="search-results-list">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="search-result-item" style="background: white; padding: 2rem; margin-bottom: 2rem; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                        <h2 class="result-title" style="margin-bottom: 1rem;">
                            <a href="<?php the_permalink(); ?>" style="color: #333; text-decoration: none; font-size: 1.3rem;">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        
                        <div class="result-meta" style="color: #666; margin-bottom: 1rem; font-size: 0.9rem;">
                            <span><?php echo get_post_type_object(get_post_type())->labels->singular_name; ?></span>
                            <span> • </span>
                            <span><?php echo get_the_date(); ?></span>
                        </div>
                        
                        <div class="result-excerpt" style="color: #666; margin-bottom: 1.5rem; line-height: 1.6;">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <a href="<?php the_permalink(); ?>" class="btn">Read More</a>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <!-- Pagination -->
            <div class="pagination-wrapper" style="margin-top: 3rem; text-align: center;">
                <?php
                the_posts_pagination(array(
                    'prev_text' => '&laquo; Previous',
                    'next_text' => 'Next &raquo;',
                ));
                ?>
            </div>
            
        <?php else : ?>
            <div class="no-results" style="text-align: center; padding: 3rem 0;">
                <h2>Try a Different Search</h2>
                <p style="margin-bottom: 2rem; color: #666;">Here are some suggestions to help you find what you're looking for:</p>
                
                <div class="search-suggestions" style="background: #f8f9fa; padding: 2rem; border-radius: 15px; margin-bottom: 2rem;">
                    <ul style="list-style: none; text-align: left; max-width: 400px; margin: 0 auto;">
                        <li style="margin-bottom: 0.5rem;">• Try different keywords or phrases</li>
                        <li style="margin-bottom: 0.5rem;">• Check your spelling</li>
                        <li style="margin-bottom: 0.5rem;">• Use more general terms</li>
                        <li style="margin-bottom: 0.5rem;">• Try searching for related services</li>
                    </ul>
                </div>
                
                <!-- New search form -->
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" style="max-width: 400px; margin: 0 auto;">
                    <div style="display: flex; gap: 1rem;">
                        <input type="search" name="s" placeholder="Search again..." value="<?php echo get_search_query(); ?>" style="flex: 1; padding: 0.75rem; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                        <button type="submit" class="btn">Search</button>
                    </div>
                </form>
                
                <!-- Popular services -->
                <div class="popular-services" style="margin-top: 3rem;">
                    <h3>Popular Services</h3>
                    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 1rem; margin-top: 1rem;">
                        <a href="<?php echo esc_url(home_url('/#services')); ?>" class="btn btn-secondary">House Cleaning</a>
                        <a href="<?php echo esc_url(home_url('/#services')); ?>" class="btn btn-secondary">Handyman Services</a>
                        <a href="<?php echo esc_url(home_url('/#services')); ?>" class="btn btn-secondary">Pet Care</a>
                        <a href="<?php echo esc_url(home_url('/#services')); ?>" class="btn btn-secondary">Personal Errands</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
