<?php
/**
 * Sidebar template
 *
 * @package ServiceBlueprint
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
    <?php dynamic_sidebar('sidebar-1'); ?>
</aside>

<style>
.widget-area {
    padding: 20px;
    background: #f9fafb;
    border-radius: 8px;
    margin-top: 30px;
}

.widget {
    margin-bottom: 40px;
    padding: 25px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.widget:last-child {
    margin-bottom: 0;
}

.widget-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #2563eb;
}

.widget ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.widget ul li {
    margin-bottom: 10px;
    padding-bottom: 10px;
    border-bottom: 1px solid #f3f4f6;
}

.widget ul li:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.widget ul li a {
    color: #374151;
    text-decoration: none;
    transition: color 0.3s ease;
}

.widget ul li a:hover {
    color: #2563eb;
}

.widget p {
    color: #6b7280;
    line-height: 1.6;
}

.widget .textwidget {
    color: #374151;
    line-height: 1.6;
}

/* Recent Posts Widget */
.widget_recent_entries ul li {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.widget_recent_entries .post-date {
    font-size: 0.85rem;
    color: #9ca3af;
}

/* Categories Widget */
.widget_categories ul li {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.widget_categories .count {
    background: #e5e7eb;
    color: #374151;
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 0.8rem;
}

/* Archive Widget */
.widget_archive ul li {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Tag Cloud Widget */
.widget_tag_cloud .tagcloud a {
    display: inline-block;
    background: #f3f4f6;
    color: #374151;
    padding: 4px 12px;
    margin: 2px;
    border-radius: 15px;
    text-decoration: none;
    font-size: 0.85rem !important;
    transition: all 0.3s ease;
}

.widget_tag_cloud .tagcloud a:hover {
    background: #2563eb;
    color: white;
}

/* Calendar Widget */
.widget_calendar table {
    width: 100%;
    border-collapse: collapse;
}

.widget_calendar th,
.widget_calendar td {
    padding: 8px;
    text-align: center;
    border: 1px solid #e5e7eb;
}

.widget_calendar th {
    background: #f9fafb;
    font-weight: 600;
    color: #374151;
}

.widget_calendar td a {
    color: #2563eb;
    text-decoration: none;
    font-weight: 500;
}

.widget_calendar #today {
    background: #2563eb;
    color: white;
}

/* RSS Widget */
.widget_rss ul li {
    margin-bottom: 15px;
    padding-bottom: 15px;
}

.widget_rss .rss-date,
.widget_rss cite {
    font-size: 0.85rem;
    color: #9ca3af;
}

@media (max-width: 768px) {
    .widget-area {
        margin-top: 20px;
        padding: 15px;
    }
    
    .widget {
        padding: 20px;
    }
}
</style>
