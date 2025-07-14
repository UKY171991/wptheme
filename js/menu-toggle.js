(function($) {
    'use strict';

    class DynamicMenu {
        constructor() {
            this.menuToggle = $('.menu-toggle');
            this.mainNav = $('.main-navigation');
            this.menuContainer = $('.nav-menu');
            this.body = $('body');
            this.initialized = false;

            this.init();
        }

        init() {
            if (this.initialized) return;

            this.createOverlay();
            this.bindEvents();
            this.initialized = true;
        }

        createOverlay() {
            this.overlay = $('<div class="menu-overlay"></div>');
            $('body').append(this.overlay);
        }

        bindEvents() {
            // Menu toggle click
            this.menuToggle.on('click', (e) => {
                e.preventDefault();
                this.toggleMenu();
            });

            // Submenu handling
            $(document).on('click', '.menu-item-has-children > a', (e) => {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    const $parent = $(e.currentTarget).parent();
                    this.toggleSubmenu($parent);
                }
            });

            // Overlay click
            this.overlay.on('click', () => this.closeMenu());

            // Window resize
            let resizeTimer;
            $(window).on('resize', () => {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(() => {
                    if (window.innerWidth > 768) {
                        this.closeMenu();
                    }
                }, 250);
            });

            // Escape key
            $(document).on('keyup', (e) => {
                if (e.key === 'Escape') {
                    this.closeMenu();
                }
            });

            // Handle click outside
            $(document).on('click', (e) => {
                if (!this.mainNav.is(e.target) && 
                    !this.menuToggle.is(e.target) && 
                    this.mainNav.has(e.target).length === 0 && 
                    this.menuToggle.has(e.target).length === 0) {
                    this.closeMenu();
                }
            });
        }

        toggleMenu() {
            this.menuToggle.toggleClass('active');
            this.mainNav.toggleClass('active');
            this.overlay.toggleClass('active');
            this.body.toggleClass('menu-open');

            const isExpanded = this.menuToggle.hasClass('active');
            this.menuToggle.attr('aria-expanded', isExpanded);

            if (isExpanded && !this.menuLoaded) {
                this.loadMenuItems();
            }
        }

        toggleSubmenu($parent) {
            const $submenu = $parent.children('.sub-menu');
            const $toggle = $parent.children('a').find('.submenu-toggle');
            
            // Close other submenus
            $('.menu-item-has-children').not($parent).removeClass('active')
                .find('.sub-menu').slideUp(200)
                .end()
                .find('.submenu-toggle').removeClass('active');
            
            // Toggle current submenu
            $parent.toggleClass('active');
            $toggle.toggleClass('active');
            $submenu.slideToggle(200);
        }

        closeMenu() {
            this.menuToggle.removeClass('active');
            this.mainNav.removeClass('active');
            this.overlay.removeClass('active');
            this.body.removeClass('menu-open');
            
            $('.menu-item-has-children').removeClass('active')
                .find('.sub-menu').slideUp(200)
                .end()
                .find('.submenu-toggle').removeClass('active');
            
            this.menuToggle.attr('aria-expanded', 'false');
        }

        loadMenuItems() {
            if (this.menuLoaded) return;

            $.ajax({
                url: blueprintMenuData.ajaxurl,
                type: 'POST',
                data: {
                    action: 'blueprint_load_menu',
                    menu: 'primary-menu',
                    nonce: blueprintMenuData.nonce
                },
                success: (response) => {
                    if (response) {
                        this.menuContainer.html(response);
                        this.menuLoaded = true;
                    }
                }
            });
        }
    }

    // Initialize when document is ready
    $(document).ready(() => {
        window.dynamicMenu = new DynamicMenu();
    });

})(jQuery);
