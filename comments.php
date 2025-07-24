<?php
/**
 * Comments template
 *
 * @package ServiceBlueprint
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if (1 === $comments_number) {
                printf(
                    /* translators: %s: post title */
                    esc_html__('One thought on &ldquo;%s&rdquo;', 'service-blueprint'),
                    '<span>' . get_the_title() . '</span>'
                );
            } else {
                printf( // WPCS: XSS OK.
                    /* translators: 1: comment count number, 2: title. */
                    esc_html(_nx(
                        '%1$s thought on &ldquo;%2$s&rdquo;',
                        '%1$s thoughts on &ldquo;%2$s&rdquo;',
                        $comments_number,
                        'comments title',
                        'service-blueprint'
                    )),
                    number_format_i18n($comments_number),
                    '<span>' . get_the_title() . '</span>'
                );
            }
            ?>
        </h2>

        <?php the_comments_navigation(); ?>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'      => 'ol',
                'short_ping' => true,
                'callback'   => 'service_blueprint_comment_callback',
            ));
            ?>
        </ol>

        <?php the_comments_navigation(); ?>

        <?php if (!comments_open()) : ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'service-blueprint'); ?></p>
        <?php endif; ?>

    <?php endif; ?>

    <?php comment_form(); ?>

</div>

<style>
.comments-area {
    max-width: 800px;
    margin: 40px auto 0;
    padding: 40px 20px 0;
    border-top: 1px solid #e5e7eb;
}

.comments-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 30px;
}

.comment-navigation {
    margin-bottom: 30px;
}

.comment-navigation .nav-links {
    display: flex;
    justify-content: space-between;
    gap: 20px;
}

.comment-navigation a {
    color: #2563eb;
    text-decoration: none;
    padding: 8px 16px;
    border: 1px solid #2563eb;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.comment-navigation a:hover {
    background: #2563eb;
    color: white;
}

.comment-list {
    list-style: none;
    margin: 0;
    padding: 0;
}

.comment-list .comment {
    margin-bottom: 30px;
    padding: 20px;
    background: #f9fafb;
    border-radius: 8px;
    border-left: 4px solid #e5e7eb;
}

.comment-list .bypostauthor {
    border-left-color: #2563eb;
}

.comment-meta {
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
}

.comment-author {
    font-weight: 600;
    color: #1f2937;
}

.comment-author .avatar {
    border-radius: 50%;
    margin-right: 10px;
}

.comment-metadata {
    font-size: 0.9rem;
    color: #6b7280;
}

.comment-metadata a {
    color: #6b7280;
    text-decoration: none;
}

.comment-metadata a:hover {
    color: #2563eb;
}

.comment-content {
    color: #374151;
    line-height: 1.6;
}

.comment-content p {
    margin-bottom: 1rem;
}

.reply {
    margin-top: 15px;
}

.comment-reply-link {
    color: #2563eb;
    text-decoration: none;
    font-size: 0.9rem;
    padding: 4px 12px;
    border: 1px solid #2563eb;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.comment-reply-link:hover {
    background: #2563eb;
    color: white;
}

.children {
    list-style: none;
    margin-top: 20px;
    padding-left: 30px;
}

.comment-respond {
    background: #f9fafb;
    padding: 30px;
    border-radius: 8px;
    margin-top: 30px;
}

.comment-reply-title {
    font-size: 1.3rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 20px;
}

.comment-form {
    display: grid;
    gap: 20px;
}

.comment-form-comment,
.comment-form-author,
.comment-form-email,
.comment-form-url {
    display: grid;
    gap: 8px;
}

.comment-form label {
    font-weight: 500;
    color: #374151;
}

.comment-form input[type="text"],
.comment-form input[type="email"],
.comment-form input[type="url"],
.comment-form textarea {
    padding: 12px;
    border: 1px solid #d1d5db;
    border-radius: 4px;
    font-family: inherit;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

.comment-form input[type="text"]:focus,
.comment-form input[type="email"]:focus,
.comment-form input[type="url"]:focus,
.comment-form textarea:focus {
    outline: none;
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
}

.comment-form textarea {
    resize: vertical;
    min-height: 120px;
}

.form-submit {
    margin-top: 10px;
}

.form-submit input[type="submit"] {
    background: #2563eb;
    color: white;
    padding: 12px 24px;
    border: none;
    border-radius: 4px;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form-submit input[type="submit"]:hover {
    background: #1d4ed8;
}

.comment-notes {
    font-size: 0.9rem;
    color: #6b7280;
    margin-bottom: 20px;
}

.required {
    color: #ef4444;
}

.no-comments {
    color: #6b7280;
    font-style: italic;
    text-align: center;
    padding: 20px;
}

@media (max-width: 768px) {
    .comments-area {
        padding: 30px 15px 0;
    }
    
    .comment-respond {
        padding: 20px;
    }
    
    .children {
        padding-left: 15px;
    }
    
    .comment-meta {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
}
</style>

<?php
/**
 * Custom comment callback function
 */
function service_blueprint_comment_callback($comment, $args, $depth) {
    if ('div' === $args['style']) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag; ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?> id="comment-<?php comment_ID(); ?>">
    <?php if ('div' != $args['style']) : ?>
        <div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
    <?php endif; ?>
    
    <div class="comment-meta">
        <div class="comment-author vcard">
            <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['avatar_size']); ?>
            <b class="fn"><?php comment_author_link(); ?></b>
        </div>
        
        <div class="comment-metadata">
            <a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>">
                <?php printf(__('%1$s at %2$s', 'service-blueprint'), get_comment_date(), get_comment_time()); ?>
            </a>
            <?php edit_comment_link(__('(Edit)', 'service-blueprint'), '&nbsp;&nbsp;', ''); ?>
        </div>
    </div>

    <?php if ($comment->comment_approved == '0') : ?>
        <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'service-blueprint'); ?></em>
        <br />
    <?php endif; ?>

    <div class="comment-content">
        <?php comment_text(); ?>
    </div>

    <div class="reply">
        <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
    </div>
    
    <?php if ('div' != $args['style']) : ?>
        </div>
    <?php endif; ?>
    <?php
}
