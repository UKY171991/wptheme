<?php
/**
 * Search form template
 *
 * @package ServiceBlueprint
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="search-field" class="sr-only">
        <?php esc_html_e('Search for:', 'service-blueprint'); ?>
    </label>
    
    <div class="search-input-wrapper">
        <input 
            type="search" 
            id="search-field" 
            class="search-field" 
            placeholder="<?php esc_attr_e('Search...', 'service-blueprint'); ?>" 
            value="<?php echo get_search_query(); ?>" 
            name="s" 
            autocomplete="off"
        />
        
        <button type="submit" class="search-submit">
            <i class="fas fa-search" aria-hidden="true"></i>
            <span class="sr-only"><?php esc_html_e('Search', 'service-blueprint'); ?></span>
        </button>
    </div>
</form>

<style>
.search-form {
    position: relative;
    max-width: 400px;
    margin: 0 auto;
}

.search-input-wrapper {
    position: relative;
    display: flex;
    background: white;
    border-radius: 25px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    border: 1px solid #e5e7eb;
}

.search-field {
    flex: 1;
    padding: 12px 20px;
    border: none;
    background: transparent;
    font-size: 1rem;
    color: #374151;
    outline: none;
}

.search-field::placeholder {
    color: #9ca3af;
}

.search-submit {
    background: #2563eb;
    border: none;
    padding: 12px 20px;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.search-submit:hover {
    background: #1d4ed8;
}

.search-submit i {
    font-size: 1rem;
}

/* Compact version for sidebars */
.widget .search-form {
    max-width: none;
}

.widget .search-input-wrapper {
    border-radius: 6px;
}

.widget .search-field {
    padding: 10px 15px;
    font-size: 0.9rem;
}

.widget .search-submit {
    padding: 10px 15px;
}

/* Header search version */
.header-search .search-form {
    max-width: 300px;
}

.header-search .search-input-wrapper {
    border-radius: 20px;
    box-shadow: none;
    border: 1px solid #d1d5db;
}

.header-search .search-field {
    padding: 8px 15px;
    font-size: 0.9rem;
}

.header-search .search-submit {
    padding: 8px 15px;
}

@media (max-width: 768px) {
    .search-form {
        max-width: 100%;
    }
    
    .search-field {
        font-size: 16px; /* Prevents zoom on iOS */
    }
}
</style>
