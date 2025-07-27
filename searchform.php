<?php
/**
 * Template for displaying search forms
 */?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/'));?>">
    <div class="input-group">
        <input type="search"
               class="form-control"
               placeholder="<?php echo esc_attr_x('Search articles...', 'placeholder', 'services-pro');?>"
               value="<?php echo get_search_query();?>"
               name="s"
               title="<?php echo esc_attr_x('Search for:', 'label', 'services-pro');?>" />
        <button type="submit" class="btn btn-accent">
            <i class="fas fa-search"></i>
            <span class="screen-reader-text"><?php echo _x('Search', 'submit button', 'services-pro');?></span>
        </button>
    </div>
</form>
