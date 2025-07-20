<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Blueprint
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside id="secondary" class="widget-area sidebar" role="complementary" aria-label="<?php esc_attr_e('Sidebar', 'blueprint'); ?>">
    <?php dynamic_sidebar('sidebar-1'); ?>
</aside><!-- #secondary -->
