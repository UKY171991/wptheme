<?php
/**
 * Template for displaying single FAQ
 */

get_header(); ?>
<main id="main" class="site-main">
    <?php while (have_posts()) : the_post();?>
        <!-- Hero Section -->
        <section class="hero-section bg-primary-dark text-white py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <nav aria-label="breadcrumb" class="mb-3">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item">
                                    <a href="<?php echo esc_url(home_url('/'));?>" class="text-white-50">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="<?php echo esc_url(get_post_type_archive_link('faq'));?>" class="text-white-50">FAQs</a>
                                </li>
                                <li class="breadcrumb-item active text-white" aria-current="page">FAQ</li>
                            </ol>
                        </nav>
                        <h1 class="display-5 fw-bold mb-3">
                            <i class="fas fa-question-circle me-3"></i><?php the_title();?>
                        </h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- FAQ Content -->
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="faq-content bg-white p-4 rounded shadow-sm">
                            <div class="answer-content">
                                <?php the_content();?>
                            </div>
                            <?php
                            // Display FAQ category
                            $categories = get_the_terms(get_the_ID(), 'faq_category');
                            if ($categories && !is_wp_error($categories)) :?>
                                <div class="faq-meta mt-4 pt-4 border-top">
                                    <h6 class="text-muted mb-2">Category:</h6>
                                    <?php foreach ($categories as $category) :?>
                                        <a href="<?php echo esc_url(get_term_link($category));?>" class="badge bg-accent text-white text-decoration-none me-1">
                                            <?php echo esc_html($category->name);?>
                                        </a>
                                    <?php endforeach;?>
                                </div>
                            <?php endif;?>
                        </div>
                        <!-- Back to FAQs -->
                        <div class="text-center mt-4">
                            <a href="<?php echo esc_url(get_post_type_archive_link('faq'));?>" class="btn btn-outline-accent">
                                <i class="fas fa-arrow-left me-2"></i>Back to All FAQs
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related FAQs -->
        <?php
        $related_faqs = new WP_Query(array(
            'post_type' => 'faq',
            'posts_per_page' => 3,
            'post__not_in' => array(get_the_ID()),
            'orderby' => 'rand'
        ));

        if ($related_faqs->have_posts()) :?>
            <section class="section bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center mb-4">
                            <h2 class="h4">Other Frequently Asked Questions</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="accordion" id="relatedFaqAccordion">
                                <?php
                                $counter = 0;
                                while ($related_faqs->have_posts()) : $related_faqs->the_post();
                                    $counter++;
                                    $collapse_id = 'relatedFaq_' . $counter;?>
                                    <div class="accordion-item border-0 shadow-sm mb-3">
                                        <h3 class="accordion-header" id="heading<?php echo esc_attr($collapse_id);?>">
                                            <button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($collapse_id);?>" aria-expanded="false" aria-controls="<?php echo esc_attr($collapse_id);?>">
                                                <i class="fas fa-question-circle text-accent me-3"></i>
                                                <?php the_title();?>
                                            </button>
                                        </h3>
                                        <div id="<?php echo esc_attr($collapse_id);?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo esc_attr($collapse_id);?>" data-bs-parent="#relatedFaqAccordion">
                                            <div class="accordion-body bg-white">
                                                <?php the_content();?>
                                                <div class="mt-3">
                                                    <a href="<?php the_permalink();?>" class="btn btn-sm btn-outline-accent">
                                                        Read Full Answer <i class="fas fa-arrow-right ms-1"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        endif;
        wp_reset_postdata();?>
    <?php endwhile;?>
</main>
<?php get_footer(); ?>
