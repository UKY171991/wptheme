<?php
/**
 * Service Meta Boxes
 * 
 * @package ServiceBlueprint
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add custom meta boxes for services
 */
function service_blueprint_add_meta_boxes() {
    add_meta_box(
        'service_details',
        __('Service Details', 'service-blueprint'),
        'service_blueprint_service_details_callback',
        'service',
        'normal',
        'high'
    );
    
    add_meta_box(
        'service_process',
        __('Service Process', 'service-blueprint'),
        'service_blueprint_service_process_callback',
        'service',
        'normal',
        'default'
    );
    
    add_meta_box(
        'service_faq',
        __('FAQ', 'service-blueprint'),
        'service_blueprint_service_faq_callback',
        'service',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'service_blueprint_add_meta_boxes');

/**
 * Service Details Meta Box Callback
 */
function service_blueprint_service_details_callback($post) {
    wp_nonce_field('service_details_nonce_action', 'service_details_nonce');
    
    // Get current values
    $service_price = get_post_meta($post->ID, 'service_price', true);
    $service_duration = get_post_meta($post->ID, 'service_duration', true);
    $service_features = get_post_meta($post->ID, 'service_features', true);
    $featured_service = get_post_meta($post->ID, 'featured_service', true);
    $quick_quote_enabled = get_post_meta($post->ID, 'quick_quote_enabled', true);
    $contact_form_shortcode = get_post_meta($post->ID, 'contact_form_shortcode', true);
    ?>
    
    <table class="form-table">
        <tr>
            <th scope="row">
                <label for="service_price"><?php esc_html_e('Service Price', 'service-blueprint'); ?></label>
            </th>
            <td>
                <input type="text" id="service_price" name="service_price" value="<?php echo esc_attr($service_price); ?>" class="regular-text" />
                <p class="description"><?php esc_html_e('e.g., $50/hour, $200 fixed, Contact for quote', 'service-blueprint'); ?></p>
            </td>
        </tr>
        
        <tr>
            <th scope="row">
                <label for="service_duration"><?php esc_html_e('Service Duration', 'service-blueprint'); ?></label>
            </th>
            <td>
                <input type="text" id="service_duration" name="service_duration" value="<?php echo esc_attr($service_duration); ?>" class="regular-text" />
                <p class="description"><?php esc_html_e('e.g., 2-3 hours, 1 day, Varies', 'service-blueprint'); ?></p>
            </td>
        </tr>
        
        <tr>
            <th scope="row">
                <label for="service_features"><?php esc_html_e('Service Features', 'service-blueprint'); ?></label>
            </th>
            <td>
                <textarea id="service_features" name="service_features" rows="5" class="large-text"><?php echo esc_textarea($service_features); ?></textarea>
                <p class="description"><?php esc_html_e('Enter each feature on a new line. These will be displayed as checkmarks.', 'service-blueprint'); ?></p>
            </td>
        </tr>
        
        <tr>
            <th scope="row">
                <label for="contact_form_shortcode"><?php esc_html_e('Contact Form Shortcode', 'service-blueprint'); ?></label>
            </th>
            <td>
                <input type="text" id="contact_form_shortcode" name="contact_form_shortcode" value="<?php echo esc_attr($contact_form_shortcode); ?>" class="regular-text" />
                <p class="description"><?php esc_html_e('Optional: Enter a contact form shortcode to override the default form.', 'service-blueprint'); ?></p>
            </td>
        </tr>
        
        <tr>
            <th scope="row"><?php esc_html_e('Service Options', 'service-blueprint'); ?></th>
            <td>
                <fieldset>
                    <label for="featured_service">
                        <input type="checkbox" id="featured_service" name="featured_service" value="1" <?php checked($featured_service, '1'); ?> />
                        <?php esc_html_e('Featured Service', 'service-blueprint'); ?>
                    </label>
                    <p class="description"><?php esc_html_e('Featured services appear first in listings and on the homepage.', 'service-blueprint'); ?></p>
                    
                    <br><br>
                    
                    <label for="quick_quote_enabled">
                        <input type="checkbox" id="quick_quote_enabled" name="quick_quote_enabled" value="1" <?php checked($quick_quote_enabled, '1'); ?> />
                        <?php esc_html_e('Enable Quick Quote Button', 'service-blueprint'); ?>
                    </label>
                    <p class="description"><?php esc_html_e('Show a quick quote button on service listings.', 'service-blueprint'); ?></p>
                </fieldset>
            </td>
        </tr>
    </table>
    
    <?php
}

/**
 * Service Process Meta Box Callback
 */
function service_blueprint_service_process_callback($post) {
    wp_nonce_field('service_process_nonce_action', 'service_process_nonce');
    
    $process_steps = get_post_meta($post->ID, 'process_steps', true);
    ?>
    
    <table class="form-table">
        <tr>
            <th scope="row">
                <label for="process_steps"><?php esc_html_e('Process Steps', 'service-blueprint'); ?></label>
            </th>
            <td>
                <textarea id="process_steps" name="process_steps" rows="8" class="large-text"><?php echo esc_textarea($process_steps); ?></textarea>
                <p class="description"><?php esc_html_e('Enter each step of your service process on a new line. These will be displayed as numbered steps.', 'service-blueprint'); ?></p>
            </td>
        </tr>
    </table>
    
    <?php
}

/**
 * Service FAQ Meta Box Callback
 */
function service_blueprint_service_faq_callback($post) {
    wp_nonce_field('service_faq_nonce_action', 'service_faq_nonce');
    
    $faq_items = get_post_meta($post->ID, 'faq_items', true);
    $faq_data = $faq_items ? json_decode($faq_items, true) : array();
    ?>
    
    <div id="faq-container">
        <div id="faq-items">
            <?php
            if (!empty($faq_data)) {
                foreach ($faq_data as $index => $faq) {
                    ?>
                    <div class="faq-item" data-index="<?php echo $index; ?>">
                        <h4><?php printf(__('FAQ #%d', 'service-blueprint'), $index + 1); ?> 
                            <button type="button" class="remove-faq" style="float: right;"><?php esc_html_e('Remove', 'service-blueprint'); ?></button>
                        </h4>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label><?php esc_html_e('Question', 'service-blueprint'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="faq_questions[]" value="<?php echo esc_attr($faq['question']); ?>" class="large-text" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label><?php esc_html_e('Answer', 'service-blueprint'); ?></label>
                                </th>
                                <td>
                                    <textarea name="faq_answers[]" rows="3" class="large-text"><?php echo esc_textarea($faq['answer']); ?></textarea>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        
        <button type="button" id="add-faq" class="button"><?php esc_html_e('Add FAQ', 'service-blueprint'); ?></button>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        let faqIndex = <?php echo count($faq_data); ?>;
        
        $('#add-faq').on('click', function() {
            const faqHtml = `
                <div class="faq-item" data-index="${faqIndex}">
                    <h4><?php printf(__('FAQ #', 'service-blueprint')); ?>${faqIndex + 1} 
                        <button type="button" class="remove-faq" style="float: right;"><?php esc_html_e('Remove', 'service-blueprint'); ?></button>
                    </h4>
                    <table class="form-table">
                        <tr>
                            <th scope="row">
                                <label><?php esc_html_e('Question', 'service-blueprint'); ?></label>
                            </th>
                            <td>
                                <input type="text" name="faq_questions[]" value="" class="large-text" />
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label><?php esc_html_e('Answer', 'service-blueprint'); ?></label>
                            </th>
                            <td>
                                <textarea name="faq_answers[]" rows="3" class="large-text"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            `;
            
            $('#faq-items').append(faqHtml);
            faqIndex++;
            updateFaqNumbers();
        });
        
        $(document).on('click', '.remove-faq', function() {
            $(this).closest('.faq-item').remove();
            updateFaqNumbers();
        });
        
        function updateFaqNumbers() {
            $('#faq-items .faq-item').each(function(index) {
                $(this).find('h4').first().html(`<?php printf(__('FAQ #', 'service-blueprint')); ?>${index + 1} <button type="button" class="remove-faq" style="float: right;"><?php esc_html_e('Remove', 'service-blueprint'); ?></button>`);
            });
        }
    });
    </script>
    
    <style>
    .faq-item {
        border: 1px solid #ddd;
        padding: 15px;
        margin-bottom: 15px;
        background: #f9f9f9;
    }
    .faq-item h4 {
        margin-top: 0;
        padding-bottom: 10px;
        border-bottom: 1px solid #ddd;
    }
    .remove-faq {
        background: #dc3232;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 3px;
    }
    </style>
    
    <?php
}

/**
 * Save custom meta box data
 */
function service_blueprint_save_meta_boxes($post_id) {
    // Check if this is an autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    // Check user permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Save service details
    if (isset($_POST['service_details_nonce']) && wp_verify_nonce($_POST['service_details_nonce'], 'service_details_nonce_action')) {
        $fields = array(
            'service_price',
            'service_duration',
            'service_features',
            'contact_form_shortcode'
        );
        
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, $field, sanitize_textarea_field($_POST[$field]));
            }
        }
        
        // Handle checkboxes
        update_post_meta($post_id, 'featured_service', isset($_POST['featured_service']) ? '1' : '0');
        update_post_meta($post_id, 'quick_quote_enabled', isset($_POST['quick_quote_enabled']) ? '1' : '0');
    }
    
    // Save process steps
    if (isset($_POST['service_process_nonce']) && wp_verify_nonce($_POST['service_process_nonce'], 'service_process_nonce_action')) {
        if (isset($_POST['process_steps'])) {
            update_post_meta($post_id, 'process_steps', sanitize_textarea_field($_POST['process_steps']));
        }
    }
    
    // Save FAQ data
    if (isset($_POST['service_faq_nonce']) && wp_verify_nonce($_POST['service_faq_nonce'], 'service_faq_nonce_action')) {
        if (isset($_POST['faq_questions']) && isset($_POST['faq_answers'])) {
            $questions = $_POST['faq_questions'];
            $answers = $_POST['faq_answers'];
            $faq_data = array();
            
            for ($i = 0; $i < count($questions); $i++) {
                if (!empty($questions[$i]) && !empty($answers[$i])) {
                    $faq_data[] = array(
                        'question' => sanitize_text_field($questions[$i]),
                        'answer' => sanitize_textarea_field($answers[$i])
                    );
                }
            }
            
            update_post_meta($post_id, 'faq_items', json_encode($faq_data));
        }
    }
}
add_action('save_post', 'service_blueprint_save_meta_boxes');

/**
 * Add custom columns to services admin list
 */
function service_blueprint_service_columns($columns) {
    $new_columns = array();
    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        if ($key === 'title') {
            $new_columns['thumbnail'] = __('Image', 'service-blueprint');
            $new_columns['service_price'] = __('Price', 'service-blueprint');
            $new_columns['featured'] = __('Featured', 'service-blueprint');
        }
    }
    return $new_columns;
}
add_filter('manage_service_posts_columns', 'service_blueprint_service_columns');

/**
 * Populate custom columns with data
 */
function service_blueprint_service_column_content($column, $post_id) {
    switch ($column) {
        case 'thumbnail':
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, array(60, 60));
            } else {
                echo '<span style="color: #999;">No image</span>';
            }
            break;
            
        case 'service_price':
            $price = get_post_meta($post_id, 'service_price', true);
            echo $price ? esc_html($price) : '<span style="color: #999;">Not set</span>';
            break;
            
        case 'featured':
            $featured = get_post_meta($post_id, 'featured_service', true);
            if ($featured === '1') {
                echo '<span class="featured-service-indicator">Featured</span>';
            } else {
                echo '<span style="color: #999;">—</span>';
            }
            break;
    }
}
add_action('manage_service_posts_custom_column', 'service_blueprint_service_column_content', 10, 2);

/**
 * Make custom columns sortable
 */
function service_blueprint_service_sortable_columns($columns) {
    $columns['service_price'] = 'service_price';
    $columns['featured'] = 'featured_service';
    return $columns;
}
add_filter('manage_edit-service_sortable_columns', 'service_blueprint_service_sortable_columns');

/**
 * Add dashboard widget for service statistics
 */
function service_blueprint_dashboard_widget() {
    wp_add_dashboard_widget(
        'service_stats_widget',
        __('Service Statistics', 'service-blueprint'),
        'service_blueprint_dashboard_widget_content'
    );
}
add_action('wp_dashboard_setup', 'service_blueprint_dashboard_widget');

/**
 * Dashboard widget content
 */
function service_blueprint_dashboard_widget_content() {
    // Get service statistics
    $total_services = wp_count_posts('service');
    $published_services = $total_services->publish;
    $draft_services = $total_services->draft;
    
    $featured_services = get_posts(array(
        'post_type' => 'service',
        'meta_key' => 'featured_service',
        'meta_value' => '1',
        'posts_per_page' => -1,
        'fields' => 'ids'
    ));
    $featured_count = count($featured_services);
    
    $categories = get_terms(array(
        'taxonomy' => 'service_category',
        'hide_empty' => false
    ));
    $categories_count = is_wp_error($categories) ? 0 : count($categories);
    ?>
    
    <div class="service-stats">
        <div class="service-stat-item">
            <span class="service-stat-number"><?php echo $published_services; ?></span>
            <span class="service-stat-label"><?php esc_html_e('Published', 'service-blueprint'); ?></span>
        </div>
        
        <div class="service-stat-item">
            <span class="service-stat-number"><?php echo $draft_services; ?></span>
            <span class="service-stat-label"><?php esc_html_e('Drafts', 'service-blueprint'); ?></span>
        </div>
        
        <div class="service-stat-item">
            <span class="service-stat-number"><?php echo $featured_count; ?></span>
            <span class="service-stat-label"><?php esc_html_e('Featured', 'service-blueprint'); ?></span>
        </div>
        
        <div class="service-stat-item">
            <span class="service-stat-number"><?php echo $categories_count; ?></span>
            <span class="service-stat-label"><?php esc_html_e('Categories', 'service-blueprint'); ?></span>
        </div>
    </div>
    
    <p style="margin-top: 15px;">
        <a href="<?php echo admin_url('edit.php?post_type=service'); ?>" class="button">
            <?php esc_html_e('Manage Services', 'service-blueprint'); ?>
        </a>
        <a href="<?php echo admin_url('post-new.php?post_type=service'); ?>" class="button button-primary">
            <?php esc_html_e('Add New Service', 'service-blueprint'); ?>
        </a>
    </p>
    
    <?php
}
?>
