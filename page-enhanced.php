<?php
/**
 * Enhanced Page Template
 * Professional page layout with improved header and sections
 * 
 * @package BluePrint_Folder_Theme
 * @version 2.0.0
 */

get_header(); ?>

<div class="site-content">
    <main id="main" class="site-main" role="main">
        
        <?php while (have_posts()) : the_post(); ?>
            
            <!-- Enhanced Page Header -->
            <header class="page-header">
                <div class="container">
                    <div class="page-header-content">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                        
                        <?php if (has_excerpt()) : ?>
                            <div class="page-description">
                                <?php the_excerpt(); ?>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Breadcrumb Navigation -->
                        <?php if (function_exists('blueprint_folder_breadcrumb')) : ?>
                            <nav class="breadcrumb-nav" aria-label="Breadcrumb">
                                <?php blueprint_folder_breadcrumb(); ?>
                            </nav>
                        <?php endif; ?>
                    </div>
                </div>
            </header>

            <!-- Enhanced Page Content -->
            <div class="page-content-wrapper">
                <div class="container">
                    <div class="row">
                        
                        <!-- Main Content Column -->
                        <div class="col-lg-8 col-xl-9">
                            <article id="post-<?php the_ID(); ?>" <?php post_class('page-article'); ?>>
                                
                                <!-- Featured Image Section -->
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="page-featured-image">
                                        <?php the_post_thumbnail('large', array(
                                            'class' => 'img-fluid rounded',
                                            'alt' => get_the_title()
                                        )); ?>
                                    </div>
                                <?php endif; ?>

                                <!-- Page Content -->
                                <div class="page-content">
                                    <?php
                                    the_content();
                                    
                                    wp_link_pages(array(
                                        'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'blueprint-folder') . '</span>',
                                        'after'  => '</div>',
                                        'link_before' => '<span class="page-number">',
                                        'link_after'  => '</span>',
                                    ));
                                    ?>
                                </div>

                                <!-- Page Meta Information -->
                                <footer class="page-meta">
                                    <div class="page-meta-content">
                                        <div class="page-meta-item">
                                            <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                            <span><?php esc_html_e('Last updated:', 'blueprint-folder'); ?></span>
                                            <time datetime="<?php echo esc_attr(get_the_modified_date('c')); ?>">
                                                <?php echo esc_html(get_the_modified_date()); ?>
                                            </time>
                                        </div>
                                        
                                        <?php if (current_user_can('edit_post', get_the_ID())) : ?>
                                            <div class="page-meta-item">
                                                <a href="<?php echo esc_url(get_edit_post_link()); ?>" class="edit-link">
                                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                                    <?php esc_html_e('Edit Page', 'blueprint-folder'); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </footer>

                            </article>

                            <!-- Comments Section -->
                            <?php
                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif;
                            ?>

                        </div>

                        <!-- Sidebar Column -->
                        <div class="col-lg-4 col-xl-3">
                            <aside class="page-sidebar" role="complementary">
                                <?php
                                if (is_active_sidebar('sidebar-1')) {
                                    dynamic_sidebar('sidebar-1');
                                } else {
                                    // Default sidebar content
                                    ?>
                                    <div class="widget widget-default">
                                        <h3 class="widget-title"><?php esc_html_e('About Us', 'blueprint-folder'); ?></h3>
                                        <div class="widget-content">
                                            <p><?php esc_html_e('Learn more about our professional services and how we can help you achieve your goals.', 'blueprint-folder'); ?></p>
                                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-sm">
                                                <?php esc_html_e('Contact Us', 'blueprint-folder'); ?>
                                            </a>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </aside>
                        </div>

                    </div>
                </div>
            </div>

        <?php endwhile; ?>

    </main>
</div>

<!-- Enhanced Page-Specific Styles -->
<style>
.page-header {
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    padding: 4rem 0;
    text-align: center;
    border-bottom: 1px solid #e5e7eb;
    margin-bottom: 3rem;
}

.page-header-content {
    max-width: 800px;
    margin: 0 auto;
}

.page-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1e3a8a;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.page-description {
    font-size: 1.125rem;
    color: #6b7280;
    margin-bottom: 2rem;
    line-height: 1.6;
}

.breadcrumb-nav {
    margin-top: 1.5rem;
}

.page-content-wrapper {
    padding: 2rem 0;
}

.page-article {
    background: #ffffff;
    border-radius: 0.75rem;
    padding: 2.5rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    margin-bottom: 2rem;
}

.page-featured-image {
    margin-bottom: 2rem;
}

.page-featured-image img {
    width: 100%;
    height: auto;
    border-radius: 0.5rem;
}

.page-content {
    font-size: 1.1rem;
    line-height: 1.7;
    color: #374151;
}

.page-content h2,
.page-content h3,
.page-content h4 {
    color: #1e3a8a;
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.page-content h2 {
    font-size: 1.875rem;
    font-weight: 600;
}

.page-content h3 {
    font-size: 1.5rem;
    font-weight: 600;
}

.page-content h4 {
    font-size: 1.25rem;
    font-weight: 600;
}

.page-content p {
    margin-bottom: 1.5rem;
}

.page-content ul,
.page-content ol {
    margin-bottom: 1.5rem;
    padding-left: 2rem;
}

.page-content li {
    margin-bottom: 0.5rem;
}

.page-meta {
    margin-top: 3rem;
    padding-top: 2rem;
    border-top: 1px solid #e5e7eb;
}

.page-meta-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 1rem;
}

.page-meta-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #6b7280;
    font-size: 0.9rem;
}

.page-meta-item i {
    color: #1e40af;
}

.edit-link {
    color: #1e40af;
    text-decoration: none;
    transition: color 0.15s ease;
}

.edit-link:hover {
    color: #1d4ed8;
}

.page-sidebar {
    padding-left: 2rem;
}

.widget {
    background: #ffffff;
    border-radius: 0.75rem;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.widget-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #1e3a8a;
    margin-bottom: 1rem;
}

.widget-content p {
    color: #6b7280;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.page-links {
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 1px solid #e5e7eb;
    text-align: center;
}

.page-links-title {
    font-weight: 600;
    margin-right: 1rem;
    color: #374151;
}

.page-number {
    display: inline-block;
    padding: 0.5rem 1rem;
    margin: 0 0.25rem;
    background: #f3f4f6;
    border-radius: 0.375rem;
    color: #374151;
    text-decoration: none;
    transition: all 0.15s ease;
}

.page-number:hover {
    background: #1e40af;
    color: white;
}

@media (max-width: 991.98px) {
    .page-header {
        padding: 3rem 0;
    }
    
    .page-title {
        font-size: 2rem;
    }
    
    .page-article {
        padding: 2rem;
    }
    
    .page-sidebar {
        padding-left: 0;
        margin-top: 2rem;
    }
    
    .page-meta-content {
        flex-direction: column;
        align-items: flex-start;
    }
}

@media (max-width: 767.98px) {
    .page-header {
        padding: 2rem 0;
    }
    
    .page-title {
        font-size: 1.75rem;
    }
    
    .page-article {
        padding: 1.5rem;
    }
    
    .widget {
        padding: 1.5rem;
    }
}
</style>

<?php get_footer(); ?>
