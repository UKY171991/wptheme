<?php
/**
 * Template for displaying FAQ archive
 */

get_header(); ?>

<main id="main" class="site-main">
    <?php
    // Page Banner
    echo services_pro_get_banner_section(
        'Frequently Asked Questions',
        'Find answers to common questions about our services, policies, and procedures.'
    );
    ?>Template for displaying FAQ archive
 */

get_header(); ?>

<main id="main" class="site-main">
    <?php
    // Hero Section
    echo services_pro_get_hero_section(
        'Frequently Asked Questions',
        'Find answers to common questions about our services, pricing, and policies.'
    );
    ?>

    <!-- FAQ Section -->
    <section class="section">
        <div class="container">
            <?php if (have_posts()) : ?>
                <?php
                // Group FAQs by category
                $faq_categories = get_terms(array(
                    'taxonomy' => 'faq_category',
                    'hide_empty' => true
                ));
                
                if ($faq_categories && !is_wp_error($faq_categories)) :
                    foreach ($faq_categories as $category) :
                        $category_faqs = new WP_Query(array(
                            'post_type' => 'faq',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'faq_category',
                                    'field'    => 'term_id',
                                    'terms'    => $category->term_id,
                                ),
                            ),
                        ));
                        
                        if ($category_faqs->have_posts()) :
                ?>
                    <div class="faq-category mb-5">
                        <h2 class="h3 text-accent mb-4 border-bottom pb-2">
                            <i class="fas fa-folder-open me-2"></i><?php echo esc_html($category->name); ?>
                        </h2>
                        
                        <div class="accordion" id="faqAccordion<?php echo esc_attr($category->term_id); ?>">
                            <?php
                            $faq_counter = 0;
                            while ($category_faqs->have_posts()) : $category_faqs->the_post();
                                $faq_counter++;
                                $collapse_id = 'faq' . $category->term_id . '_' . $faq_counter;
                            ?>
                                <div class="accordion-item border-0 shadow-sm mb-3">
                                    <h3 class="accordion-header" id="heading<?php echo esc_attr($collapse_id); ?>">
                                        <button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($collapse_id); ?>" aria-expanded="false" aria-controls="<?php echo esc_attr($collapse_id); ?>">
                                            <i class="fas fa-question-circle text-accent me-3"></i>
                                            <?php the_title(); ?>
                                        </button>
                                    </h3>
                                    <div id="<?php echo esc_attr($collapse_id); ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo esc_attr($collapse_id); ?>" data-bs-parent="#faqAccordion<?php echo esc_attr($category->term_id); ?>">
                                        <div class="accordion-body bg-white">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php
                        endif;
                        wp_reset_postdata();
                    endforeach;
                else :
                    // Display all FAQs without categories
                ?>
                    <div class="accordion" id="faqAccordionMain">
                        <?php
                        $faq_counter = 0;
                        while (have_posts()) : the_post();
                            $faq_counter++;
                            $collapse_id = 'faq_' . $faq_counter;
                        ?>
                            <div class="accordion-item border-0 shadow-sm mb-3">
                                <h3 class="accordion-header" id="heading<?php echo esc_attr($collapse_id); ?>">
                                    <button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($collapse_id); ?>" aria-expanded="false" aria-controls="<?php echo esc_attr($collapse_id); ?>">
                                        <i class="fas fa-question-circle text-accent me-3"></i>
                                        <?php the_title(); ?>
                                    </button>
                                </h3>
                                <div id="<?php echo esc_attr($collapse_id); ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo esc_attr($collapse_id); ?>" data-bs-parent="#faqAccordionMain">
                                    <div class="accordion-body bg-white">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            <?php else : ?>
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>No FAQs found</h3>
                        <p class="text-muted">Check back soon for helpful answers!</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Contact CTA -->
    <section class="section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="h3 mb-3">Still Have Questions?</h2>
                    <p class="text-muted mb-4">Can't find the answer you're looking for? Our friendly team is here to help.</p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-accent">
                            <i class="fas fa-envelope me-2"></i>Contact Us
                        </a>
                        <a href="tel:+1234567890" class="btn btn-outline-accent">
                            <i class="fas fa-phone me-2"></i>Call Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
