<?php
/**
 * Universal Banner Template Part
 * Consistent banner design for all pages
 *
 * @param string $badge_icon - Icon for the badge
 * @param string $badge_text - Text for the badge
 * @param string $title - Main title
 * @param string $highlight - Highlighted part of title
 * @param string $description - Banner description
 * @param array $buttons - Array of buttons with 'text', 'url', 'type' keys
 * @param array $stats - Array of stats with 'number', 'label' keys
 */

// Default values
$badge_icon = $badge_icon ?? '⭐';
$badge_text = $badge_text ?? 'Professional Services';
$title = $title ?? 'Welcome';
$highlight = $highlight ?? '';
$description = $description ?? 'Quality services you can trust.';
$buttons = $buttons ?? [];
$stats = $stats ?? [];?>
<section class="universal-banner">
    <div class="container">
        <div class="banner-content">
            <div class="banner-badge">
                <span class="badge-icon"><?php echo esc_html($badge_icon);?></span>
                <?php echo esc_html($badge_text);?>
            </div>
            <h1 class="banner-title">
                <?php echo esc_html($title);?>
                <?php if ($highlight):?>
                    <span class="title-highlight"><?php echo esc_html($highlight);?></span>
                <?php endif;?>
            </h1>
            <p class="banner-description">
                <?php echo esc_html($description);?>
            </p>
            <?php if (!empty($buttons)):?>
                <div class="banner-buttons">
                    <?php foreach ($buttons as $button):?>
                        <a href="<?php echo esc_url($button['url']);?>"
                           class="<?php echo esc_attr($button['type'] ?? 'btn-primary');?>">
                            <span><?php echo esc_html($button['text']);?></span>
                            <i><?php echo esc_html($button['icon'] ?? '→');?></i>
                        </a>
                    <?php endforeach;?>
                </div>
            <?php endif;?>
            <?php if (!empty($stats)):?>
                <div class="banner-stats">
                    <?php foreach ($stats as $stat):?>
                        <div class="stat-item">
                            <span class="stat-number"><?php echo esc_html($stat['number']);?></span>
                            <span class="stat-label"><?php echo esc_html($stat['label']);?></span>
                        </div>
                    <?php endforeach;?>
                </div>
            <?php endif;?>
        </div>
    </div>
</section>
