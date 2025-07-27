/**
 * Professional 3-Level Navigation Menu JavaScript
 * Handles desktop hover and mobile click interactions
 */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // Initialize navigation
    const Navigation = {
        init: function() {
            this.setupMobileToggle();
            this.setupDropdowns();
            this.setupKeyboardNavigation();
            this.setupClickOutside();
            this.setupWindowResize();
        },

        // Mobile menu toggle
        setupMobileToggle: function() {
            const toggle = document.querySelector('.navbar-toggler');
            const collapse = document.querySelector('.navbar-collapse');

            if (toggle && collapse) {
                toggle.addEventListener('click', function() {
                    const isExpanded = collapse.classList.contains('show');

                    if (isExpanded) {
                        collapse.classList.remove('show');
                        toggle.setAttribute('aria-expanded', 'false');
                    } else {
                        collapse.classList.add('show');
                        toggle.setAttribute('aria-expanded', 'true');
                    }
                });
            }
        },

        // Dropdown functionality
        setupDropdowns: function() {
            const dropdowns = document.querySelectorAll('.dropdown, .dropend');

            dropdowns.forEach(dropdown => {
                const toggle = dropdown.querySelector('.dropdown-toggle');
                const menu = dropdown.querySelector('.dropdown-menu');

                if (toggle && menu) {
                    // Desktop hover behavior
                    if (window.innerWidth >= 992) {
                        this.setupDesktopHover(dropdown, toggle, menu);
                    }

                    // Mobile click behavior
                    this.setupMobileClick(dropdown, toggle, menu);
                }
            });
        },

        // Desktop hover functionality
        setupDesktopHover: function(dropdown, toggle, menu) {
            let hoverTimeout;

            dropdown.addEventListener('mouseenter', () => {
                if (window.innerWidth >= 992) {
                    clearTimeout(hoverTimeout);

                    // Close sibling dropdowns
                    this.closeSiblingDropdowns(dropdown);

                    // Open current dropdown
                    menu.classList.add('show');
                    toggle.setAttribute('aria-expanded', 'true');
                }
            });

            dropdown.addEventListener('mouseleave', () => {
                if (window.innerWidth >= 992) {
                    hoverTimeout = setTimeout(() => {
                        menu.classList.remove('show');
                        toggle.setAttribute('aria-expanded', 'false');

                        // Close all child dropdowns
                        this.closeChildDropdowns(menu);
                    }, 150);
                }
            });

            // Cancel close on menu hover
            menu.addEventListener('mouseenter', () => {
                clearTimeout(hoverTimeout);
            });
        },

        // Mobile click functionality
        setupMobileClick: function(dropdown, toggle, menu) {
            toggle.addEventListener('click', (e) => {
                if (window.innerWidth < 992) {
                    e.preventDefault();
                    e.stopPropagation();

                    const isOpen = menu.classList.contains('show');

                    // Close sibling dropdowns
                    this.closeSiblingDropdowns(dropdown);

                    // Toggle current dropdown
                    if (isOpen) {
                        menu.classList.remove('show');
                        toggle.setAttribute('aria-expanded', 'false');
                        this.closeChildDropdowns(menu);
                    } else {
                        menu.classList.add('show');
                        toggle.setAttribute('aria-expanded', 'true');
                    }
                }
            });
        },

        // Close sibling dropdowns
        closeSiblingDropdowns: function(currentDropdown) {
            const parent = currentDropdown.parentElement;
            if (parent) {
                const siblings = parent.querySelectorAll(':scope > .dropdown, :scope > .dropend');
                siblings.forEach(sibling => {
                    if (sibling !== currentDropdown) {
                        const siblingMenu = sibling.querySelector('.dropdown-menu');
                        const siblingToggle = sibling.querySelector('.dropdown-toggle');

                        if (siblingMenu && siblingToggle) {
                            siblingMenu.classList.remove('show');
                            siblingToggle.setAttribute('aria-expanded', 'false');
                            this.closeChildDropdowns(siblingMenu);
                        }
                    }
                });
            }
        },

        // Close all child dropdowns
        closeChildDropdowns: function(parentMenu) {
            const childDropdowns = parentMenu.querySelectorAll('.dropdown-menu');
            childDropdowns.forEach(childMenu => {
                childMenu.classList.remove('show');
                const childToggle = childMenu.previousElementSibling;
                if (childToggle && childToggle.classList.contains('dropdown-toggle')) {
                    childToggle.setAttribute('aria-expanded', 'false');
                }
            });
        },

        // Keyboard navigation
        setupKeyboardNavigation: function() {
            document.addEventListener('keydown', (e) => {
                const activeElement = document.activeElement;

                // Escape key closes all dropdowns
                if (e.key === 'Escape') {
                    this.closeAllDropdowns();

                    // Focus the toggle if we're in a dropdown
                    const dropdown = activeElement.closest('.dropdown, .dropend');
                    if (dropdown) {
                        const toggle = dropdown.querySelector('.dropdown-toggle');
                        if (toggle) {
                            toggle.focus();
                        }
                    }
                }

                // Arrow key navigation in dropdowns
                if (activeElement.classList.contains('dropdown-item')) {
                    this.handleArrowNavigation(e, activeElement);
                }

                // Enter/Space on dropdown toggles
                if (activeElement.classList.contains('dropdown-toggle')) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        activeElement.click();
                    }
                }
            });
        },

        // Handle arrow key navigation
        handleArrowNavigation: function(e, activeElement) {
            const menu = activeElement.closest('.dropdown-menu');
            if (!menu) return;

            const items = Array.from(menu.querySelectorAll('.dropdown-item'));
            const currentIndex = items.indexOf(activeElement);

            switch (e.key) {
                case 'ArrowDown':
                    e.preventDefault();
                    const nextIndex = (currentIndex + 1) % items.length;
                    items[nextIndex].focus();
                    break;

                case 'ArrowUp':
                    e.preventDefault();
                    const prevIndex = currentIndex === 0 ? items.length - 1 : currentIndex - 1;
                    items[prevIndex].focus();
                    break;

                case 'ArrowRight':
                    // Open submenu if available
                    const submenu = activeElement.nextElementSibling;
                    if (submenu && submenu.classList.contains('dropdown-menu')) {
                        e.preventDefault();
                        submenu.classList.add('show');
                        const firstItem = submenu.querySelector('.dropdown-item');
                        if (firstItem) {
                            firstItem.focus();
                        }
                    }
                    break;

                case 'ArrowLeft':
                    // Go back to parent menu
                    const parentDropdown = menu.closest('.dropdown, .dropend').parentElement.closest('.dropdown, .dropend');
                    if (parentDropdown) {
                        e.preventDefault();
                        const parentToggle = parentDropdown.querySelector('.dropdown-toggle');
                        if (parentToggle) {
                            parentToggle.focus();
                        }
                    }
                    break;
            }
        },

        // Click outside to close dropdowns
        setupClickOutside: function() {
            document.addEventListener('click', (e) => {
                if (!e.target.closest('.dropdown') && !e.target.closest('.dropend')) {
                    this.closeAllDropdowns();
                }
            });
        },

        // Close all open dropdowns
        closeAllDropdowns: function() {
            const openMenus = document.querySelectorAll('.dropdown-menu.show');
            openMenus.forEach(menu => {
                menu.classList.remove('show');
                const toggle = menu.previousElementSibling;
                if (toggle && toggle.classList.contains('dropdown-toggle')) {
                    toggle.setAttribute('aria-expanded', 'false');
                }
            });
        },

        // Handle window resize
        setupWindowResize: function() {
            let resizeTimeout;

            window.addEventListener('resize', () => {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(() => {
                    // Close all dropdowns on resize
                    this.closeAllDropdowns();

                    // Close mobile menu if switching to desktop
                    if (window.innerWidth >= 992) {
                        const collapse = document.querySelector('.navbar-collapse');
                        const toggle = document.querySelector('.navbar-toggler');

                        if (collapse && toggle) {
                            collapse.classList.remove('show');
                            toggle.setAttribute('aria-expanded', 'false');
                        }
                    }

                    // Reinitialize dropdowns for new screen size
                    this.setupDropdowns();
                }, 250);
            });
        }
    };

    // Initialize the navigation
    Navigation.init();

    // Smooth scroll for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                e.preventDefault();
                const headerHeight = document.querySelector('.site-header').offsetHeight;
                const targetPosition = targetElement.offsetTop - headerHeight - 20;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
});

