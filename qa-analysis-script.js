// Blueprint Folder Website QA Analysis Script
// This script tests responsiveness, layout, accessibility, and design consistency

console.log('🔍 Starting Blueprint Folder Website QA Analysis...');

const qaResults = {
    homepage: [],
    services: [],
    contact: [],
    pricing: [],
    about: [],
    global: []
};

// Test viewport dimensions
const viewports = [
    { width: 1920, height: 1080, name: 'Desktop Large' },
    { width: 1366, height: 768, name: 'Desktop Standard' },
    { width: 1024, height: 768, name: 'Tablet Landscape' },
    { width: 768, height: 1024, name: 'Tablet Portrait' },
    { width: 414, height: 896, name: 'Mobile Large' },
    { width: 375, height: 667, name: 'Mobile Standard' },
    { width: 320, height: 568, name: 'Mobile Small' }
];

// Typography analysis
function analyzeTypography() {
    const issues = [];
    
    // Check heading consistency
    const headings = {
        h1: document.querySelectorAll('h1'),
        h2: document.querySelectorAll('h2'),
        h3: document.querySelectorAll('h3'),
        h4: document.querySelectorAll('h4'),
        h5: document.querySelectorAll('h5'),
        h6: document.querySelectorAll('h6')
    };
    
    Object.entries(headings).forEach(([tag, elements]) => {
        const sizes = new Set();
        const weights = new Set();
        const lineHeights = new Set();
        
        elements.forEach(el => {
            const styles = window.getComputedStyle(el);
            sizes.add(styles.fontSize);
            weights.add(styles.fontWeight);
            lineHeights.add(styles.lineHeight);
        });
        
        if (sizes.size > 2) {
            issues.push(`❌ ${tag.toUpperCase()} inconsistent font-sizes: ${Array.from(sizes).join(', ')} - standardize to max 2 variants`);
        }
        
        if (weights.size > 2) {
            issues.push(`❌ ${tag.toUpperCase()} inconsistent font-weights: ${Array.from(weights).join(', ')} - limit to 2 weights max`);
        }
    });
    
    // Check body text consistency
    const paragraphs = document.querySelectorAll('p');
    const bodyFontSizes = new Set();
    const bodyLineHeights = new Set();
    
    paragraphs.forEach(p => {
        const styles = window.getComputedStyle(p);
        bodyFontSizes.add(styles.fontSize);
        bodyLineHeights.add(styles.lineHeight);
    });
    
    if (bodyFontSizes.size > 3) {
        issues.push(`❌ Body text inconsistent font-sizes: ${Array.from(bodyFontSizes).join(', ')} - standardize to 2-3 variants max`);
    }
    
    return issues;
}

// Image analysis
function analyzeImages() {
    const issues = [];
    const images = document.querySelectorAll('img');
    
    images.forEach((img, index) => {
        const rect = img.getBoundingClientRect();
        const computedStyle = window.getComputedStyle(img);
        
        // Check for overflow
        const parent = img.parentElement;
        const parentRect = parent.getBoundingClientRect();
        
        if (rect.width > parentRect.width + 5) {
            issues.push(`❌ Image ${index + 1} overflows container by ${Math.round(rect.width - parentRect.width)}px - add max-width:100% to img:nth-child(${index + 1})`);
        }
        
        // Check alt text
        if (!img.alt || img.alt.trim() === '') {
            issues.push(`❌ Image ${index + 1} missing alt text - add descriptive alt attribute for accessibility`);
        }
        
        // Check aspect ratio distortion
        if (img.naturalWidth && img.naturalHeight) {
            const naturalRatio = img.naturalWidth / img.naturalHeight;
            const displayRatio = rect.width / rect.height;
            const distortion = Math.abs(naturalRatio - displayRatio) / naturalRatio;
            
            if (distortion > 0.1) {
                issues.push(`❌ Image ${index + 1} aspect ratio distorted by ${Math.round(distortion * 100)}% - check object-fit property`);
            }
        }
        
        // Check if image is too small
        if (rect.width < 50 || rect.height < 50) {
            issues.push(`⚠️ Image ${index + 1} very small (${Math.round(rect.width)}x${Math.round(rect.height)}) - may not be visible on mobile`);
        }
    });
    
    return issues;
}

// Layout analysis
function analyzeLayout() {
    const issues = [];
    
    // Check for horizontal overflow
    const body = document.body;
    const html = document.documentElement;
    const scrollWidth = Math.max(body.scrollWidth, html.scrollWidth);
    const clientWidth = Math.max(body.clientWidth, html.clientWidth);
    
    if (scrollWidth > clientWidth + 5) {
        issues.push(`❌ Horizontal overflow detected: page is ${scrollWidth - clientWidth}px wider than viewport - check for fixed widths or negative margins`);
    }
    
    // Check for elements extending beyond viewport
    const allElements = document.querySelectorAll('*');
    allElements.forEach((el, index) => {
        const rect = el.getBoundingClientRect();
        if (rect.right > window.innerWidth + 5) {
            const selector = el.tagName.toLowerCase() + 
                           (el.id ? `#${el.id}` : '') + 
                           (el.className ? `.${el.className.split(' ').join('.')}` : '');
            issues.push(`❌ Element extends beyond viewport: ${selector} - right edge at ${Math.round(rect.right)}px vs viewport ${window.innerWidth}px`);
        }
    });
    
    // Check spacing consistency
    const sections = document.querySelectorAll('section');
    const sectionPaddings = new Set();
    
    sections.forEach(section => {
        const styles = window.getComputedStyle(section);
        const paddingTop = styles.paddingTop;
        const paddingBottom = styles.paddingBottom;
        sectionPaddings.add(`${paddingTop}-${paddingBottom}`);
    });
    
    if (sectionPaddings.size > 4) {
        issues.push(`⚠️ Inconsistent section padding: ${sectionPaddings.size} different values - consider standardizing to 3-4 variants`);
    }
    
    return issues;
}

// Navigation analysis
function analyzeNavigation() {
    const issues = [];
    
    // Check menu accessibility
    const menuItems = document.querySelectorAll('.nav-menu a, .menu a');
    menuItems.forEach((item, index) => {
        const rect = item.getBoundingClientRect();
        
        // Check touch target size
        if (rect.width < 44 || rect.height < 44) {
            issues.push(`❌ Menu item ${index + 1} too small for touch (${Math.round(rect.width)}x${Math.round(rect.height)}) - minimum 44x44px required`);
        }
        
        // Check contrast
        const styles = window.getComputedStyle(item);
        // Note: Full contrast checking would require more complex color analysis
    });
    
    // Check mobile menu functionality
    const menuToggle = document.querySelector('.menu-toggle');
    if (menuToggle) {
        const toggleRect = menuToggle.getBoundingClientRect();
        if (toggleRect.width < 44 || toggleRect.height < 44) {
            issues.push(`❌ Mobile menu toggle too small (${Math.round(toggleRect.width)}x${Math.round(toggleRect.height)}) - minimum 44x44px for accessibility`);
        }
    }
    
    // Check for dropdown indicators
    const hasChildrenItems = document.querySelectorAll('.menu-item-has-children');
    hasChildrenItems.forEach((item, index) => {
        const arrow = item.querySelector('::after');
        // Check if arrows are properly hidden as per requirement
        const link = item.querySelector('a');
        const computedStyle = window.getComputedStyle(link, '::after');
        if (computedStyle.display !== 'none') {
            issues.push(`❌ Menu item ${index + 1} still shows dropdown arrow - ensure ::after pseudo-element display is none`);
        }
    });
    
    return issues;
}

// Accessibility analysis
function analyzeAccessibility() {
    const issues = [];
    
    // Check focus indicators
    const focusableElements = document.querySelectorAll('a, button, input, select, textarea, [tabindex]');
    let focusIssues = 0;
    
    focusableElements.forEach((el, index) => {
        el.focus();
        const styles = window.getComputedStyle(el);
        const outline = styles.outline;
        const boxShadow = styles.boxShadow;
        
        if (outline === 'none' && !boxShadow.includes('0 0 0')) {
            focusIssues++;
        }
    });
    
    if (focusIssues > 0) {
        issues.push(`❌ ${focusIssues} focusable elements lack visible focus indicators - add :focus styles with outline or box-shadow`);
    }
    
    // Check heading hierarchy
    const headings = document.querySelectorAll('h1, h2, h3, h4, h5, h6');
    let lastLevel = 0;
    let hierarchyIssues = 0;
    
    headings.forEach(heading => {
        const level = parseInt(heading.tagName.substr(1));
        if (level > lastLevel + 1) {
            hierarchyIssues++;
        }
        lastLevel = level;
    });
    
    if (hierarchyIssues > 0) {
        issues.push(`❌ ${hierarchyIssues} heading hierarchy issues - don't skip heading levels (h1→h3 without h2)`);
    }
    
    // Check form labels
    const inputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="tel"], textarea, select');
    let unlabeledInputs = 0;
    
    inputs.forEach(input => {
        const label = document.querySelector(`label[for="${input.id}"]`) || input.closest('label');
        if (!label && !input.getAttribute('aria-label') && !input.getAttribute('aria-labelledby')) {
            unlabeledInputs++;
        }
    });
    
    if (unlabeledInputs > 0) {
        issues.push(`❌ ${unlabeledInputs} form inputs lack proper labels - add <label> elements or aria-label attributes`);
    }
    
    return issues;
}

// Console error analysis
function analyzeConsoleErrors() {
    const issues = [];
    
    // Check for layout-related console errors
    // Note: This would need to be run in browser context to capture actual console errors
    const errors = [];
    
    // Override console.error to capture errors
    const originalError = console.error;
    console.error = function(...args) {
        errors.push(args.join(' '));
        originalError.apply(console, arguments);
    };
    
    // Check for common CSS errors
    const stylesheets = document.styleSheets;
    try {
        Array.from(stylesheets).forEach((sheet, index) => {
            try {
                if (sheet.cssRules) {
                    // Stylesheet accessible, no CORS issues
                }
            } catch (e) {
                issues.push(`⚠️ Stylesheet ${index + 1} CORS error - may indicate external CSS loading issues`);
            }
        });
    } catch (e) {
        issues.push(`❌ Error accessing stylesheets: ${e.message}`);
    }
    
    return issues;
}

// Main analysis function
function runQAAnalysis() {
    console.log(`🔍 Analyzing: ${window.location.href}`);
    console.log(`📱 Viewport: ${window.innerWidth}x${window.innerHeight}`);
    
    const results = {
        url: window.location.href,
        viewport: `${window.innerWidth}x${window.innerHeight}`,
        timestamp: new Date().toISOString(),
        issues: {
            typography: analyzeTypography(),
            images: analyzeImages(),
            layout: analyzeLayout(),
            navigation: analyzeNavigation(),
            accessibility: analyzeAccessibility(),
            console: analyzeConsoleErrors()
        }
    };
    
    // Count total issues
    const totalIssues = Object.values(results.issues).reduce((sum, issues) => sum + issues.length, 0);
    console.log(`📊 Found ${totalIssues} issues total`);
    
    return results;
}

// Export analysis function for use
window.runQAAnalysis = runQAAnalysis;

// Run analysis immediately
const currentPageResults = runQAAnalysis();
console.log('📋 QA Analysis Results:', currentPageResults);

// Function to test multiple viewports
async function testResponsiveDesign() {
    const results = [];
    
    for (const viewport of viewports) {
        console.log(`📱 Testing ${viewport.name} (${viewport.width}x${viewport.height})`);
        
        // Note: In a real browser environment, you'd resize the viewport here
        // For this script, we'll simulate the analysis
        
        const analysis = runQAAnalysis();
        analysis.viewport = viewport;
        results.push(analysis);
    }
    
    return results;
}

// Check for specific menu issues mentioned in requirements
function checkMenuSpecificIssues() {
    const issues = [];
    
    // Check for dots after menu items
    const menuItems = document.querySelectorAll('.nav-menu li, .menu li');
    menuItems.forEach((item, index) => {
        const computedStyle = window.getComputedStyle(item, '::after');
        const beforeStyle = window.getComputedStyle(item, '::before');
        
        if (computedStyle.content && computedStyle.content !== 'none' && computedStyle.content !== '""') {
            issues.push(`❌ Menu item ${index + 1} has unwanted ::after content: ${computedStyle.content} - set display: none !important`);
        }
        
        if (beforeStyle.content && beforeStyle.content !== 'none' && beforeStyle.content !== '""') {
            issues.push(`❌ Menu item ${index + 1} has unwanted ::before content: ${beforeStyle.content} - set display: none !important`);
        }
    });
    
    // Check submenu arrows
    const submenuItems = document.querySelectorAll('.sub-menu a, .submenu a');
    submenuItems.forEach((item, index) => {
        const afterStyle = window.getComputedStyle(item, '::after');
        if (afterStyle.content && afterStyle.content !== 'none' && afterStyle.content !== '""') {
            issues.push(`❌ Submenu item ${index + 1} shows arrow: ${afterStyle.content} - arrows should be hidden per requirements`);
        }
    });
    
    return issues;
}

// Run menu-specific checks
const menuIssues = checkMenuSpecificIssues();
if (menuIssues.length > 0) {
    console.log('🔍 Menu-specific issues found:', menuIssues);
}

console.log('✅ QA Analysis script loaded. Run runQAAnalysis() to analyze current page.');
