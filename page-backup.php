<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package Blueprint
 */

get_header(); ?>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <?php
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
                    <header class="page-header mb-4">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="page-thumbnail mt-3">
                                <?php the_post_thumbnail('blueprint-featured', array('class' => 'img-fluid rounded')); ?>
                            </div>
                        <?php endif; ?>
                    </header>

                    <div class="page-content">
                        <?php
                        the_content();

                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'blueprint'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>

                    <?php if (comments_open() || get_comments_number()) : ?>
                        <div class="page-comments mt-5">
                            <?php comments_template(); ?>
                        </div>
                    <?php endif; ?>
                </article>
                <?php
            endwhile; // End of the loop.
            ?>
        </div>
    </div>
</div>

<?php
get_footer();
                                echo '<p>Welcome to our Services page. We offer comprehensive party rental services.</p>';
                                break;
                            case 'pricing':
                                echo '<p>Check out our competitive pricing packages for all event sizes.</p>';
                                break;
                            case 'contact':
                                echo '<p>Get in touch with us to plan your perfect event.</p>';
                                break;
                            case 'about':
                                echo '<p>Learn more about our party rental business.</p>';
                                break;
                            default:
                                echo '<p>Welcome to ' . get_the_title() . '</p>';
                        }
                    }
                    ?>
                </div>
            <?php endwhile; ?>
            
        <?php else : ?>
            <h1>Page not found</h1>
            <p>Sorry, the page you are looking for could not be found.</p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
