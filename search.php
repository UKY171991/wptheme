<?php
/**
 * The template for displaying search results pages
 */

get_header(); ?>

<main id="main" class="site-main">
    <!-- Search Results Hero Section -->
    <section class="section bg-primary-dark text-white">
        <div class="overlay-accent"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8 section-content">
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb bg-transparent p-0 m-0 justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-white text-decoration-none">
                                    <i class="fas fa-home me-1"></i>Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active text-accent" aria-current="page">Search Results</li>
                        </ol>
                    </nav>
                    
                    <div class="fade-in-up">
                        <div class="badge bg-accent text-white px-3 py-2 rounded-pill mb-4">
                            <i class="fas fa-search me-2"></i>Search Results
                        </div>
                        
                        <h1 class="display-4 fw-bold mb-4">
                            <?php if (have_posts()) : ?>
                                Search Results
                                <span class="text-accent d-block">for "<?php echo get_search_query(); ?>"</span>
                            <?php else : ?>
                                No Results Found
                                <span class="text-accent d-block">for "<?php echo get_search_query(); ?>"</span>
                            <?php endif; ?>
                        </h1>
                        
                        <p class="lead mb-4">
                            <?php if (have_posts()) : ?>
                                Found <?php echo $wp_query->found_posts; ?> result(s) matching your search
                            <?php else : ?>
                                Sorry, no results were found. Try different keywords or browse our services below.
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Results Content -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php if (have_posts()) : ?>
                        <div class="search-results">
                            <?php while (have_posts()) : the_post(); ?>
                                <article class="card card-hover mb-4 border-0 shadow-sm">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="badge bg-light text-dark me-2">
                                                <?php echo get_post_type_object(get_post_type())->labels->singular_name; ?>
                                            </span>
                                            <small class="text-muted">
                                                <i class="fas fa-calendar me-1"></i>
                                                <?php echo get_the_date(); ?>
                                            </small>
                                        </div>
                                        
                                        <h3 class="h5 card-title mb-3">
                                            <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                        
                                        <div class="card-text text-muted mb-3">
                                            <?php the_excerpt(); ?>
                                        </div>
                                        
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <small class="text-muted">
                                                    <i class="fas fa-user me-1"></i>
                                                    <?php the_author(); ?>
                                                </small>
                                            </div>
                                            <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-accent">
                                                Read More <i class="fas fa-arrow-right ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                        </div>

                        <!-- Pagination -->
                        <div class="row mt-5">
                            <div class="col-12">
                                <?php
                                the_posts_pagination(array(
                                    'mid_size' => 2,
                                    'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                                    'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
                                    'class' => 'pagination justify-content-center'
                                ));
                                ?>
                            </div>
                        </div>

                    <?php else : ?>
                        <div class="no-results text-center py-5">
                            <i class="fas fa-search text-muted mb-4" style="font-size: 4rem;"></i>
                            <h3 class="h4 mb-4">No Results Found</h3>
                            <p class="text-muted mb-4">Sorry, but nothing matched your search terms. Please try again with different keywords.</p>
                            
                            <!-- Alternative Search -->
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-body p-4">
                                    <h5 class="card-title mb-3">Try a Different Search</h5>
                                    <?php get_search_form(); ?>
                                </div>
                            </div>
                            
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-accent btn-rounded">
                                <i class="fas fa-home me-2"></i>Back to Home
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="position-sticky" style="top: 2rem;">
                        <!-- Refine Search -->
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-light border-0">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-filter text-accent me-2"></i>Refine Search
                                </h5>
                            </div>
                            <div class="card-body">
                                <?php get_search_form(); ?>
                            </div>
                        </div>

                        <!-- Popular Services -->
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-light border-0">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-star text-accent me-2"></i>Popular Services
                                </h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2">
                                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="text-decoration-none">
                                            <i class="fas fa-broom me-2 text-accent"></i>House Cleaning
                                        </a>
                                    </li>
                                    <li class="mb-2">
                                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="text-decoration-none">
                                            <i class="fas fa-tools me-2 text-accent"></i>Handyman Services
                                        </a>
                                    </li>
                                    <li class="mb-2">
                                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="text-decoration-none">
                                            <i class="fas fa-leaf me-2 text-accent"></i>Lawn Care
                                        </a>
                                    </li>
                                    <li class="mb-2">
                                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="text-decoration-none">
                                            <i class="fas fa-paw me-2 text-accent"></i>Pet Care
                                        </a>
                                    </li>
                                    <li class="mb-2">
                                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="text-decoration-none">
                                            <i class="fas fa-shopping-bag me-2 text-accent"></i>Personal Shopping
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Contact CTA -->
                        <div class="card border-0 shadow-sm bg-accent text-white">
                            <div class="card-body text-center">
                                <i class="fas fa-question-circle mb-3" style="font-size: 2.5rem;"></i>
                                <h5 class="card-title">Can't Find What You Need?</h5>
                                <p class="card-text mb-4">Contact us directly and we'll help you find the perfect service solution.</p>
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" 
                                   class="btn btn-light btn-rounded w-100">
                                    <i class="fas fa-envelope me-2"></i>Contact Us
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
