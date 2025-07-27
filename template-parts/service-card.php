<?php
/**
 * Template part for displaying service cards
 * Used in archive-service.php and AJAX responses
 *
 * @package BluePrint_Folder_Theme
 */

global $post;
$service_categories = get_the_terms($post->ID, 'service_category');
$category_names = array();
$category_slugs = array();

if ($service_categories && !is_wp_error($service_categories)) {
    foreach ($service_categories as $category) {
        $category_names[] = $category->name;
        $category_slugs[] = $category->slug;
    }
}
?>

<article class="service-card" data-categories="<?php echo esc_attr(implode(' ', $category_slugs)); ?>">
    <div class="service-card-inner">
        <?php if (has_post_thumbnail()) : ?>
            <div class="service-image">
                <?php the_post_thumbnail('service-card', array('alt' => get_the_title())); ?>
                <div class="service-overlay">
                    <a href="<?php the_permalink(); ?>" class="service-link" aria-label="<?php printf(esc_attr__('Read more about %s', 'blueprint-folder'), get_the_title()); ?>">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        <?php endif; ?>
        
        <div class="service-content">
            <?php if (!empty($category_names)) : ?>
                <div class="service-categories">
                    <?php foreach ($service_categories as $category) : ?>
                        <a href="<?php echo esc_url(get_term_link($category)); ?>" class="service-category-link">
                            <?php echo esc_html($category->name); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <h3 class="service-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            
            <div class="service-excerpt">
                <?php 
                if (has_excerpt()) {
                    the_excerpt();
                } else {
                    echo wp_trim_words(get_the_content(), 25, '...');
                }
                ?>
            </div>
            
            <div class="service-footer">
                <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                    <?php esc_html_e('Learn More', 'blueprint-folder'); ?>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</article>
