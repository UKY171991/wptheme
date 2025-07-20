/**
 * Modern Scripts - Enhanced interactivity for Blueprint theme
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all components
    initStickyHeader();
    initMobileMenu();
    initDropdownMenus();
    initSmoothScroll();
    initLazyLoading();
    initAnimations();
    initSearchAutocomplete();
    initAccessibility();
});

/**
 * Sticky header with scroll effects
 */
function initStickyHeader() {
    const header = document.querySelector('.site-header');
    if (!header) return;
    
    let lastScrollTop = 0;
    const scrollThreshold = 100;
    
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Add shadow and background when scrolling down
        if (scrollTop > scrollThreshold) {
            header.classList.add('header-scrolled');
        } else {
            header.classList.remove('header-scrolled');
        }
        
        // Hide header when scrolling down, show when scrolling up
        if (scrollTop > lastScrollTop && scrollTop > 300) {
            // Scrolling down
            header.classList.add('header-hidden');
        } else {
            // Scrolling up
            header.classList.remove('header-hidden');
        }
        
        lastScrollTop = scrollTop;
    });
}

/**
 * Mobile menu functionality
 */
function initMobileMenu() {
    const menuToggle = document.querySelector('.menu-toggle');
    const navigation = document.querySelector('.main-navigation');
    const overlay = document.querySelector('.mobile-nav-overlay');
    const body = document.body;
    
    if (!menuToggle || !navigation) return;
    
    menuToggle.addEventListener('click', function() {
        navigation.classList.toggle('active');
        body.classList.toggle('menu-open');
    });
    
    if (overlay) {
        overlay.addEventListener('click', function() {
            navigation.classList.remove('active');
            body.classList.remove('menu-open');
        });
    }
    
    // Handle submenu toggles on mobile
    const hasChildrenItems = document.querySelectorAll('.menu-item-has-children');
    
    hasChildrenItems.forEach(function(item) {
        // Create submenu toggle button
        const submenuToggle = document.createElement('button');
        submenuToggle.className = 'submenu-toggle';
        submenuToggle.setAttribute('aria-expanded', 'false');
        submenuToggle.innerHTML = '<span class="screen-reader-text">Toggle submenu</span>';
        
        // Insert after the link
        const link = item.querySelector('a');
        if (link) {
            link.parentNode.insertBefore(submenuToggle, link.nextSibling);
        }
        
        // Add click event
        submenuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const expanded = this.getAttribute('aria-expanded') === 'true' || false;
            this.setAttribute('aria-expanded', !expanded);
            
            item.classList.toggle('active');
            
            // Find the submenu
            const submenu = item.querySelector('.sub-menu');
            if (submenu) {
                if (!expanded) {
                    // Open submenu
                    const height = submenu.scrollHeight;
                    submenu.style.height = height + 'px';
                    setTimeout(() => {
                        submenu.style.height = 'auto';
                    }, 300);
                } else {
                    // Close submenu
                    const height = submenu.scrollHeight;
                    submenu.style.height = height + 'px';
                    setTimeout(() => {
                        submenu.style.height = '0';
                    }, 10);
                }
            }
        });
    });
}

/**
 * Enhanced dropdown menus
 */
function initDropdownMenus() {
    const menuItems = document.querySelectorAll('.menu-item-has-children');
    
    menuItems.forEach(function(item) {
        const link = item.querySelector('a');
        const submenu = item.querySelector('.sub-menu');
        
        if (!link || !submenu) return;
        
        // Add aria attributes
        link.setAttribute('aria-haspopup', 'true');
        link.setAttribute('aria-expanded', 'false');
        
        // Add unique ID to submenu
        const submenuId = 'submenu-' + Math.random().toString(36).substr(2, 9);
        submenu.setAttribute('id', submenuId);
        link.setAttribute('aria-controls', submenuId);
        
        // Handle hover events for desktop
        if (window.innerWidth > 992) {
            item.addEventListener('mouseenter', function() {
                link.setAttribute('aria-expanded', 'true');
                submenu.classList.add('active');
            });
            
            item.addEventListener('mouseleave', function() {
                link.setAttribute('aria-expanded', 'false');
                submenu.classList.remove('active');
            });
        }
        
        // Handle keyboard navigation
        link.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                
                const expanded = link.getAttribute('aria-expanded') === 'true' || false;
                link.setAttribute('aria-expanded', !expanded);
                
                if (!expanded) {
                    submenu.classList.add('active');
                    
                    // Focus first item in submenu
                    const firstItem = submenu.querySelector('a');
                    if (firstItem) {
                        setTimeout(() => {
                            firstItem.focus();
                        }, 100);
                    }
                } else {
                    submenu.classList.remove('active');
                }
            }
        });
    });
}

/**
 * Smooth scroll for anchor links
 */
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]:not([href="#"])').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                e.preventDefault();
                
                const headerHeight = document.querySelector('.site-header')?.offsetHeight || 0;
                const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Update URL without scrolling
                history.pushState(null, null, targetId);
            }
        });
    });
}

/**
 * Lazy loading for images and videos
 */
function initLazyLoading() {
    // Check if browser supports Intersection Observer
    if ('IntersectionObserver' in window) {
        const lazyImages = document.querySelectorAll('img[data-src], video[data-src]');
        
        const lazyObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const lazyElement = entry.target;
                    
                    if (lazyElement.dataset.src) {
                        lazyElement.src = lazyElement.dataset.src;
                        lazyElement.removeAttribute('data-src');
                    }
                    
                    if (lazyElement.dataset.srcset) {
                        lazyElement.srcset = lazyElement.dataset.srcset;
                        lazyElement.removeAttribute('data-srcset');
                    }
                    
                    lazyObserver.unobserve(lazyElement);
                    
                    // Add fade-in animation
                    lazyElement.classList.add('fade-in');
                }
            });
        }, {
            rootMargin: '200px 0px'
        });
        
        lazyImages.forEach(function(lazyElement) {
            lazyObserver.observe(lazyElement);
        });
    } else {
        // Fallback for browsers that don't support Intersection Observer
        const lazyImages = document.querySelectorAll('img[data-src], video[data-src]');
        
        lazyImages.forEach(function(lazyElement) {
            if (lazyElement.dataset.src) {
                lazyElement.src = lazyElement.dataset.src;
                lazyElement.removeAttribute('data-src');
            }
            
            if (lazyElement.dataset.srcset) {
                lazyElement.srcset = lazyElement.dataset.srcset;
                lazyElement.removeAttribute('data-srcset');
            }
        });
    }
}

/**
 * Scroll animations
 */
function initAnimations() {
    // Check if browser supports Intersection Observer
    if ('IntersectionObserver' in window) {
        const animatedElements = document.querySelectorAll('.animate-on-scroll');
        
        const animationObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    
                    // Get animation type from data attribute
                    const animationType = element.dataset.animation || 'fade-in';
                    element.classList.add(animationType);
                    
                    animationObserver.unobserve(element);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        animatedElements.forEach(function(element) {
            animationObserver.observe(element);
        });
    } else {
        // Fallback for browsers that don't support Intersection Observer
        const animatedElements = document.querySelectorAll('.animate-on-scroll');
        
        animatedElements.forEach(function(element) {
            const animationType = element.dataset.animation || 'fade-in';
            element.classList.add(animationType);
        });
    }
}

/**
 * Search autocomplete functionality
 */
function initSearchAutocomplete() {
    const searchInput = document.querySelector('.search-field');
    if (!searchInput) return;
    
    // Create autocomplete container
    const autocompleteContainer = document.createElement('div');
    autocompleteContainer.className = 'search-autocomplete';
    searchInput.parentNode.appendChild(autocompleteContainer);
    
    // Add event listeners
    searchInput.addEventListener('input', debounce(function() {
        const query = this.value.trim();
        
        if (query.length < 2) {
            autocompleteContainer.innerHTML = '';
            autocompleteContainer.classList.remove('active');
            return;
        }
        
        // Fetch search results via AJAX
        fetchSearchResults(query)
            .then(results => {
                displaySearchResults(results, autocompleteContainer);
            })
            .catch(error => {
                console.error('Search error:', error);
            });
    }, 300));
    
    // Close autocomplete on click outside
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !autocompleteContainer.contains(e.target)) {
            autocompleteContainer.innerHTML = '';
            autocompleteContainer.classList.remove('active');
        }
    });
}

/**
 * Fetch search results via AJAX
 * @param {string} query - Search query
 * @returns {Promise} - Promise with search results
 */
function fetchSearchResults(query) {
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        
        xhr.open('GET', `${blueprintData.ajaxUrl}?action=blueprint_search_autocomplete&query=${encodeURIComponent(query)}&nonce=${blueprintData.nonce}`, true);
        
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                try {
                    const response = JSON.parse(xhr.responseText);
                    resolve(response.data);
                } catch (e) {
                    reject(e);
                }
            } else {
                reject(new Error(xhr.statusText));
            }
        };
        
        xhr.onerror = function() {
            reject(new Error('Network error'));
        };
        
        xhr.send();
    });
}

/**
 * Display search results in autocomplete container
 * @param {Array} results - Search results
 * @param {HTMLElement} container - Autocomplete container
 */
function displaySearchResults(results, container) {
    container.innerHTML = '';
    
    if (results.length === 0) {
        container.innerHTML = '<div class="no-results">No results found</div>';
        container.classList.add('active');
        return;
    }
    
    const resultsList = document.createElement('ul');
    resultsList.className = 'search-results-list';
    
    results.forEach(result => {
        const resultItem = document.createElement('li');
        resultItem.className = 'search-result-item';
        
        resultItem.innerHTML = `
            <a href="${result.url}" class="search-result-link">
                ${result.thumbnail ? `<div class="result-thumbnail"><img src="${result.thumbnail}" alt="${result.title}"></div>` : ''}
                <div class="result-content">
                    <h4 class="result-title">${result.title}</h4>
                    <p class="result-excerpt">${result.excerpt}</p>
                </div>
            </a>
        `;
        
        resultsList.appendChild(resultItem);
    });
    
    container.appendChild(resultsList);
    container.classList.add('active');
}

/**
 * Accessibility enhancements
 */
function initAccessibility() {
    // Add skip link
    if (!document.querySelector('.skip-link')) {
        const skipLink = document.createElement('a');
        skipLink.className = 'skip-link screen-reader-text';
        skipLink.href = '#main';
        skipLink.textContent = 'Skip to content';
        
        document.body.insertBefore(skipLink, document.body.firstChild);
    }
    
    // Add ARIA labels to elements that need them
    document.querySelectorAll('nav:not([aria-label])').forEach(nav => {
        nav.setAttribute('aria-label', 'Navigation');
    });
    
    document.querySelectorAll('button:not([aria-label]):not([type])').forEach(button => {
        button.setAttribute('type', 'button');
    });
    
    // Ensure all interactive elements are keyboard accessible
    document.querySelectorAll('a[href="#"], a[href="javascript:void(0)"]').forEach(link => {
        if (!link.getAttribute('role')) {
            link.setAttribute('role', 'button');
        }
        
        if (!link.getAttribute('tabindex')) {
            link.setAttribute('tabindex', '0');
        }
        
        // Add keyboard event listener
        link.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                link.click();
            }
        });
    });
}

/**
 * Debounce function to limit function calls
 * @param {Function} func - Function to debounce
 * @param {number} wait - Wait time in milliseconds
 * @returns {Function} - Debounced function
 */
function debounce(func, wait) {
    let timeout;
    
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func.apply(this, args);
        };
        
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}