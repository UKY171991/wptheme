/**
 * Mobile Responsive Testing Suite
 * Comprehensive testing for mobile functionality
 */

class MobileTestingSuite {
    constructor() {
        this.isDebugMode = false;
        this.testResults = [];
        this.init();
    }

    init() {
        // Only run on mobile devices or when debug mode is enabled
        if (window.innerWidth <= 768 || this.isDebugMode) {
            this.createDebugPanel();
            this.createTestingControls();
            this.runAutomaticTests();
            this.setupEventListeners();
        }
    }

    createDebugPanel() {
        const panel = document.createElement('div');
        panel.className = 'mobile-debug-panel';
        panel.innerHTML = `
            <h4>📱 Mobile Debug Info</h4>
            <ul id="debug-results">
                <li>Viewport: ${window.innerWidth}x${window.innerHeight}</li>
                <li>User Agent: ${navigator.userAgent.includes('Mobile') ? 'Mobile' : 'Desktop'}</li>
                <li>Touch Support: ${('ontouchstart' in window) ? 'Yes' : 'No'}</li>
                <li id="overflow-check">Checking overflow...</li>
                <li id="menu-check">Checking menu...</li>
                <li id="form-check">Checking forms...</li>
            </ul>
        `;
        document.body.appendChild(panel);
    }

    createTestingControls() {
        const controls = document.createElement('div');
        controls.className = 'mobile-testing-controls';
        controls.innerHTML = `
            <button onclick="mobileTest.toggleGrid()">🔲 Grid</button>
            <button onclick="mobileTest.testMenu()">📱 Menu</button>
            <button onclick="mobileTest.testForms()">📝 Forms</button>
            <button onclick="mobileTest.testOverflow()">📏 Overflow</button>
            <button onclick="mobileTest.testTouchTargets()">👆 Touch</button>
            <button onclick="mobileTest.exportResults()">📊 Export</button>
        `;
        document.body.appendChild(controls);
    }

    runAutomaticTests() {
        setTimeout(() => {
            this.checkOverflow();
            this.checkMenu();
            this.checkForms();
            this.checkTouchTargets();
            this.checkTextReadability();
            this.updateDebugPanel();
        }, 1000);
    }

    checkOverflow() {
        const body = document.body;
        const html = document.documentElement;
        
        const documentWidth = Math.max(
            body.scrollWidth, body.offsetWidth,
            html.clientWidth, html.scrollWidth, html.offsetWidth
        );
        
        const viewportWidth = window.innerWidth;
        const hasHorizontalScroll = documentWidth > viewportWidth;
        
        const result = {
            test: 'Horizontal Overflow',
            passed: !hasHorizontalScroll,
            details: `Document: ${documentWidth}px, Viewport: ${viewportWidth}px`
        };
        
        this.testResults.push(result);
        
        // Find elements causing overflow
        if (hasHorizontalScroll) {
            const overflowElements = [];
            document.querySelectorAll('*').forEach(el => {
                if (el.scrollWidth > viewportWidth) {
                    overflowElements.push({
                        element: el.tagName + (el.className ? '.' + el.className : ''),
                        width: el.scrollWidth
                    });
                }
            });
            result.overflowElements = overflowElements;
        }
        
        // Update debug panel
        const overflowCheck = document.getElementById('overflow-check');
        if (overflowCheck) {
            overflowCheck.className = hasHorizontalScroll ? 'error' : '';
            overflowCheck.textContent = hasHorizontalScroll ? 
                `Overflow detected: ${documentWidth - viewportWidth}px` : 
                'No horizontal overflow';
        }
    }

    checkMenu() {
        const mobileMenu = document.querySelector('.mobile-menu, .mobile-navigation, #mobile-menu, .hamburger-menu');
        const menuToggle = document.querySelector('.menu-toggle, .hamburger, .mobile-menu-toggle, #menu-toggle');
        
        const result = {
            test: 'Mobile Menu',
            passed: mobileMenu && menuToggle,
            details: {
                menuFound: !!mobileMenu,
                toggleFound: !!menuToggle,
                menuVisible: mobileMenu ? !mobileMenu.classList.contains('hidden') : false
            }
        };
        
        this.testResults.push(result);
        
        // Update debug panel
        const menuCheck = document.getElementById('menu-check');
        if (menuCheck) {
            menuCheck.className = result.passed ? '' : 'warning';
            menuCheck.textContent = result.passed ? 
                'Mobile menu found' : 
                'Mobile menu issues detected';
        }
    }

    checkForms() {
        const forms = document.querySelectorAll('form');
        let formIssues = [];
        
        forms.forEach(form => {
            const inputs = form.querySelectorAll('input, textarea, select');
            inputs.forEach(input => {
                const styles = window.getComputedStyle(input);
                const width = parseFloat(styles.width);
                const parentWidth = parseFloat(window.getComputedStyle(input.parentElement).width);
                
                if (width > parentWidth) {
                    formIssues.push({
                        element: input.tagName + (input.type ? `[${input.type}]` : ''),
                        issue: 'Width exceeds parent'
                    });
                }
                
                if (parseFloat(styles.fontSize) < 16) {
                    formIssues.push({
                        element: input.tagName + (input.type ? `[${input.type}]` : ''),
                        issue: 'Font size too small (causes zoom on iOS)'
                    });
                }
            });
        });
        
        const result = {
            test: 'Form Elements',
            passed: formIssues.length === 0,
            details: formIssues
        };
        
        this.testResults.push(result);
        
        // Update debug panel
        const formCheck = document.getElementById('form-check');
        if (formCheck) {
            formCheck.className = result.passed ? '' : 'warning';
            formCheck.textContent = result.passed ? 
                `${forms.length} forms OK` : 
                `${formIssues.length} form issues`;
        }
    }

    checkTouchTargets() {
        const touchElements = document.querySelectorAll('button, a, input[type="submit"], input[type="button"], .btn');
        let smallTargets = [];
        
        touchElements.forEach(el => {
            const rect = el.getBoundingClientRect();
            if (rect.width < 44 || rect.height < 44) {
                smallTargets.push({
                    element: el.tagName + (el.className ? '.' + el.className.split(' ')[0] : ''),
                    size: `${Math.round(rect.width)}x${Math.round(rect.height)}`
                });
            }
        });
        
        const result = {
            test: 'Touch Targets',
            passed: smallTargets.length === 0,
            details: smallTargets
        };
        
        this.testResults.push(result);
    }

    checkTextReadability() {
        const textElements = document.querySelectorAll('p, span, div, h1, h2, h3, h4, h5, h6');
        let smallText = [];
        
        textElements.forEach(el => {
            const styles = window.getComputedStyle(el);
            const fontSize = parseFloat(styles.fontSize);
            
            if (fontSize < 14 && el.textContent.trim().length > 0) {
                smallText.push({
                    element: el.tagName + (el.className ? '.' + el.className.split(' ')[0] : ''),
                    fontSize: `${fontSize}px`
                });
            }
        });
        
        const result = {
            test: 'Text Readability',
            passed: smallText.length === 0,
            details: smallText
        };
        
        this.testResults.push(result);
    }

    updateDebugPanel() {
        const debugResults = document.getElementById('debug-results');
        if (!debugResults) return;
        
        // Add test summary
        const summary = document.createElement('li');
        const passedTests = this.testResults.filter(r => r.passed).length;
        const totalTests = this.testResults.length;
        
        summary.className = passedTests === totalTests ? '' : 'warning';
        summary.textContent = `Tests: ${passedTests}/${totalTests} passed`;
        debugResults.appendChild(summary);
    }

    // Testing Controls
    toggleGrid() {
        let overlay = document.querySelector('.mobile-test-overlay');
        if (!overlay) {
            overlay = document.createElement('div');
            overlay.className = 'mobile-test-overlay';
            document.body.appendChild(overlay);
        }
        overlay.style.display = overlay.style.display === 'none' ? 'block' : 'none';
    }

    testMenu() {
        document.body.classList.toggle('mobile-menu-test');
        const menuToggle = document.querySelector('.menu-toggle, .hamburger, .mobile-menu-toggle, #menu-toggle');
        if (menuToggle) {
            menuToggle.click();
            setTimeout(() => {
                alert('Menu test:\n✓ Menu should be visible\n✓ Should slide from top/side\n✓ Should close when clicked again\n✓ Links should work');
            }, 500);
        } else {
            alert('No mobile menu toggle found!');
        }
    }

    testForms() {
        document.body.classList.toggle('form-test');
        setTimeout(() => {
            alert('Form test:\n✓ All inputs should be easily tappable\n✓ Font size should be 16px+ (prevents zoom)\n✓ Forms should fit viewport width\n✓ No horizontal scrolling');
        }, 500);
    }

    testOverflow() {
        this.checkOverflow();
        const result = this.testResults[this.testResults.length - 1];
        if (result.overflowElements && result.overflowElements.length > 0) {
            alert('Overflow detected in:\n' + result.overflowElements.map(el => `• ${el.element}: ${el.width}px`).join('\n'));
        } else {
            alert('✓ No horizontal overflow detected!');
        }
    }

    testTouchTargets() {
        this.checkTouchTargets();
        const result = this.testResults[this.testResults.length - 1];
        if (result.details.length > 0) {
            alert('Small touch targets found:\n' + result.details.map(t => `• ${t.element}: ${t.size}`).join('\n'));
        } else {
            alert('✓ All touch targets are properly sized (44px+)!');
        }
    }

    exportResults() {
        const report = {
            timestamp: new Date().toISOString(),
            userAgent: navigator.userAgent,
            viewport: `${window.innerWidth}x${window.innerHeight}`,
            url: window.location.href,
            tests: this.testResults
        };
        
        console.log('Mobile Testing Report:', report);
        
        // Create downloadable report
        const blob = new Blob([JSON.stringify(report, null, 2)], {type: 'application/json'});
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `mobile-test-report-${Date.now()}.json`;
        a.click();
        URL.revokeObjectURL(url);
    }

    setupEventListeners() {
        // Monitor viewport changes
        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                this.testResults = []; // Reset tests
                this.runAutomaticTests();
            }, 250);
        });
        
        // Monitor for navigation changes
        let currentPath = window.location.pathname;
        setInterval(() => {
            if (window.location.pathname !== currentPath) {
                currentPath = window.location.pathname;
                setTimeout(() => {
                    this.testResults = [];
                    this.runAutomaticTests();
                }, 1000);
            }
        }, 1000);
    }
}

// Initialize testing suite
let mobileTest;
document.addEventListener('DOMContentLoaded', () => {
    mobileTest = new MobileTestingSuite();
});

// Global functions for testing controls
window.mobileTest = mobileTest;
