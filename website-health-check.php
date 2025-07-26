<?php
/**
 * BluePrint Folder Website Health Check
 * Comprehensive diagnostic script to identify and report issues
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

class BlueprintWebsiteHealthCheck {
    
    private $issues = array();
    private $warnings = array();
    private $success = array();
    
    public function __construct() {
        echo "<h1>BluePrint Folder Website Health Check</h1>\n";
        echo "<style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            .success { color: #10b981; background: #f0f9ff; padding: 10px; margin: 5px 0; border-left: 4px solid #10b981; }
            .warning { color: #f59e0b; background: #fffbeb; padding: 10px; margin: 5px 0; border-left: 4px solid #f59e0b; }
            .error { color: #ef4444; background: #fef2f2; padding: 10px; margin: 5px 0; border-left: 4px solid #ef4444; }
            .section { margin: 20px 0; padding: 15px; border: 1px solid #e5e7eb; }
        </style>\n";
    }
    
    public function runAllChecks() {
        $this->checkTemplateFiles();
        $this->checkFunctions();
        $this->checkPostTypes();
        $this->checkMenus();
        $this->checkImages();
        $this->generateReport();
    }
    
    private function checkTemplateFiles() {
        echo "<div class='section'><h2>Template Files Check</h2>\n";
        
        $required_templates = array(
            'page-services.php' => 'Services page template',
            'page-pricing-enhanced.php' => 'Enhanced pricing page template',
            'archive-service.php' => 'Service archive template',
            'single-service.php' => 'Single service template',
            'inc/template-functions.php' => 'Template functions file'
        );
        
        foreach ($required_templates as $file => $description) {
            if (file_exists($file)) {
                $this->success[] = "✓ {$description} exists";
                echo "<div class='success'>✓ {$description} exists</div>\n";
            } else {
                $this->issues[] = "✗ Missing {$description}: {$file}";
                echo "<div class='error'>✗ Missing {$description}: {$file}</div>\n";
            }
        }
        echo "</div>\n";
    }
    
    private function checkFunctions() {
        echo "<div class='section'><h2>Functions Check</h2>\n";
        
        $required_functions = array(
            'services_pro_get_banner_section' => 'Banner section function',
            'services_pro_get_section_heading' => 'Section heading function',
            'services_pro_display_service_categories' => 'Service categories display function',
            'services_pro_display_services' => 'Services display function'
        );
        
        foreach ($required_functions as $func => $description) {
            if (function_exists($func)) {
                $this->success[] = "✓ {$description} is available";
                echo "<div class='success'>✓ {$description} is available</div>\n";
            } else {
                $this->issues[] = "✗ Missing {$description}: {$func}()";
                echo "<div class='error'>✗ Missing {$description}: {$func}()</div>\n";
            }
        }
        echo "</div>\n";
    }
    
    private function checkPostTypes() {
        echo "<div class='section'><h2>Post Types & Taxonomies Check</h2>\n";
        
        // Check if running in WordPress context
        if (function_exists('post_type_exists')) {
            $post_types = array('service', 'pricing_plan');
            $taxonomies = array('service_category');
            
            foreach ($post_types as $post_type) {
                if (post_type_exists($post_type)) {
                    $this->success[] = "✓ Post type '{$post_type}' exists";
                    echo "<div class='success'>✓ Post type '{$post_type}' exists</div>\n";
                } else {
                    $this->issues[] = "✗ Missing post type: {$post_type}";
                    echo "<div class='error'>✗ Missing post type: {$post_type}</div>\n";
                }
            }
            
            foreach ($taxonomies as $taxonomy) {
                if (taxonomy_exists($taxonomy)) {
                    $this->success[] = "✓ Taxonomy '{$taxonomy}' exists";
                    echo "<div class='success'>✓ Taxonomy '{$taxonomy}' exists</div>\n";
                } else {
                    $this->issues[] = "✗ Missing taxonomy: {$taxonomy}";
                    echo "<div class='error'>✗ Missing taxonomy: {$taxonomy}</div>\n";
                }
            }
        } else {
            $this->warnings[] = "⚠ Cannot check post types - not in WordPress context";
            echo "<div class='warning'>⚠ Cannot check post types - not in WordPress context</div>\n";
        }
        echo "</div>\n";
    }
    
    private function checkMenus() {
        echo "<div class='section'><h2>Navigation & Menus Check</h2>\n";
        
        if (function_exists('has_nav_menu')) {
            if (has_nav_menu('primary')) {
                $this->success[] = "✓ Primary menu is set";
                echo "<div class='success'>✓ Primary menu is set</div>\n";
            } else {
                $this->warnings[] = "⚠ Primary menu not set";
                echo "<div class='warning'>⚠ Primary menu not set</div>\n";
            }
        } else {
            $this->warnings[] = "⚠ Cannot check menus - not in WordPress context";
            echo "<div class='warning'>⚠ Cannot check menus - not in WordPress context</div>\n";
        }
        echo "</div>\n";
    }
    
    private function checkImages() {
        echo "<div class='section'><h2>Images & Assets Check</h2>\n";
        
        $image_dirs = array('images/', 'css/', 'js/');
        
        foreach ($image_dirs as $dir) {
            if (is_dir($dir)) {
                $this->success[] = "✓ Directory '{$dir}' exists";
                echo "<div class='success'>✓ Directory '{$dir}' exists</div>\n";
            } else {
                $this->warnings[] = "⚠ Directory '{$dir}' missing";
                echo "<div class='warning'>⚠ Directory '{$dir}' missing</div>\n";
            }
        }
        echo "</div>\n";
    }
    
    private function generateReport() {
        echo "<div class='section'><h2>Health Check Summary</h2>\n";
        
        $total_checks = count($this->success) + count($this->warnings) + count($this->issues);
        $success_rate = round((count($this->success) / $total_checks) * 100, 1);
        
        echo "<h3>Overall Health Score: {$success_rate}%</h3>\n";
        echo "<p><strong>✓ Passed:</strong> " . count($this->success) . "</p>\n";
        echo "<p><strong>⚠ Warnings:</strong> " . count($this->warnings) . "</p>\n";
        echo "<p><strong>✗ Issues:</strong> " . count($this->issues) . "</p>\n";
        
        if (count($this->issues) > 0) {
            echo "<h4>Critical Issues to Fix:</h4>\n";
            foreach ($this->issues as $issue) {
                echo "<div class='error'>{$issue}</div>\n";
            }
        }
        
        if (count($this->warnings) > 0) {
            echo "<h4>Recommendations:</h4>\n";
            foreach ($this->warnings as $warning) {
                echo "<div class='warning'>{$warning}</div>\n";
            }
        }
        
        echo "</div>\n";
        
        // Generate action plan
        $this->generateActionPlan();
    }
    
    private function generateActionPlan() {
        echo "<div class='section'><h2>Recommended Action Plan</h2>\n";
        
        if (count($this->issues) > 0) {
            echo "<h3>🔥 Critical Fixes Needed:</h3>\n";
            echo "<ol>\n";
            echo "<li>Add missing template functions to inc/template-functions.php</li>\n";
            echo "<li>Ensure all template files are properly structured</li>\n";
            echo "<li>Register missing post types and taxonomies in functions.php</li>\n";
            echo "<li>Test all page templates for PHP errors</li>\n";
            echo "</ol>\n";
        }
        
        echo "<h3>🚀 Next Steps for Optimization:</h3>\n";
        echo "<ol>\n";
        echo "<li>Test services page (/services/) to ensure it loads properly</li>\n";
        echo "<li>Verify pricing page (/pricing/) displays correctly</li>\n";
        echo "<li>Check all navigation links work properly</li>\n";
        echo "<li>Test responsive design on mobile devices</li>\n";
        echo "<li>Validate all forms and interactive features</li>\n";
        echo "</ol>\n";
        
        echo "</div>\n";
    }
}

// Run the health check
$health_check = new BlueprintWebsiteHealthCheck();
$health_check->runAllChecks();

echo "<p style='margin-top: 30px; text-align: center; color: #6b7280;'>Health check completed at " . date('Y-m-d H:i:s') . "</p>\n";
?>
