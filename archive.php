<?php
/**
 * The template for displaying archive pages
 */

get_header(); ?>

<main id="main" class="site-main">
    <!-- Archive Hero Section -->
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
                            <li class="breadcrumb-item active text-accent" aria-current="page">
                                <?php
                                if (is_category()) {
                                    echo 'Category: ' . single_cat_title('', false);
                                } elseif (is_tag()) {
                                    echo 'Tag: ' . single_tag_title('', false);
                                } elseif (is_author()) {
                                    echo 'Author: ' . get_the_author();
                                } elseif (is_day()) {
                                    echo 'Daily Archives: ' . get_the_date();
                                } elseif (is_month()) {
                                    echo 'Monthly Archives: ' . get_the_date('F Y');
                                } elseif (is_year()) {
                                    echo 'Yearly Archives: ' . get_the_date('Y');
                                } else {
                                    echo 'Archives';
                                }
                                ?>
                            </li>
                        </ol>
                    </nav>
                    
                    <div class="fade-in-up">
                        <div class="badge bg-accent text-white px-3 py-2 rounded-pill mb-4">
                            <i class="fas fa-archive me-2"></i>
                            <?php
                            if (is_category()) {
                                echo 'Category';
                            } elseif (is_tag()) {
                                echo 'Tag';
                            } elseif (is_author()) {
                                echo 'Author';
                            } elseif (is_date()) {
                                echo 'Date';
                            } else {
                                echo 'Archive';
                            }
                            ?>
                        </div>
                        
                        <h1 class="display-4 fw-bold mb-4">
                            <?php
                            if (is_category()) {
                                echo single_cat_title('', false);
                                echo '<span class="text-accent d-block">Category Archives</span>';
                            } elseif (is_tag()) {
                                echo single_tag_title('', false);
                                echo '<span class="text-accent d-block">Tag Archives</span>';
                            } elseif (is_author()) {
                                echo get_the_author();
                                echo '<span class="text-accent d-block">Author Archives</span>';
                            } elseif (is_day()) {
                                echo get_the_date();
                                echo '<span class="text-accent d-block">Daily Archives</span>';
                            } elseif (is_month()) {
                                echo get_the_date('F Y');
                                echo '<span class="text-accent d-block">Monthly Archives</span>';
                            } elseif (is_year()) {
                                echo get_the_date('Y');
                                echo '<span class="text-accent d-block">Yearly Archives</span>';
                            } else {
                                echo 'Archives';
                            }
                            ?>
                        </h1>
                        
                        <?php if (is_category() && category_description()) : ?>
                            <p class="lead mb-4"><?php echo category_description(); ?></p>
                        <?php elseif (is_tag() && tag_description()) : ?>
                            <p class="lead mb-4"><?php echo tag_description(); ?></p>
                        <?php elseif (is_author() && get_the_author_meta('description')) : ?>
                            <p class="lead mb-4"><?php echo get_the_author_meta('description'); ?></p>
                        <?php else : ?>
                            <p class="lead mb-4">Browse through our archived content below.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Archive Content -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php if (have_posts()) : ?>
                        <div class="row g-4">
                            <?php while (have_posts()) : the_post(); ?>
                                <div class="col-md-6">
                                    <article id="post-<?php the_ID(); ?>" <?php post_class('card card-hover h-100 border-0 shadow-sm'); ?>>
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="card-img-top overflow-hidden" style="height: 200px;">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail('medium', array('class' => 'w-100 h-100 object-fit-cover')); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <span class="badge bg-light text-dark me-2">
                                                    <?php echo get_post_type_object(get_post_type())->labels->singular_name; ?>
                                                </span>
                                                <small class="text-muted">
                                                    <i class="fas fa-calendar me-1"></i>
                                                    <?php echo get_the_date(); ?>
                                                </small>
                                            </div>
                                            
                                            <h3 class="h5 card-title">
                                                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h3>
                                            
                                            <p class="card-text text-muted">
                                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                            </p>
                                            
                                            <div class="d-flex justify-content-between align-items-center mt-3">
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
                                </div>
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
                        <div class="text-center py-5">
                            <i class="fas fa-archive text-muted mb-3" style="font-size: 4rem;"></i>
                            <h3 class="h4 mb-3">No Posts Found</h3>
                            <p class="text-muted mb-4">Sorry, but there are no posts in this archive. Try browsing other sections.</p>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-accent btn-rounded">
                                <i class="fas fa-home me-2"></i>Back to Home
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
