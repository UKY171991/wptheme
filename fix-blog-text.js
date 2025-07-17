/**
 * Fix for the blog display issues and "Blog>" text issue
 * Version 1.4 - Enhanced to fix image display and links
 */

document.addEventListener('DOMContentLoaded', function () {
    // Function to remove all "Blog>" text
    function removeBlogText() {
        // Method 1: Find and remove all text nodes containing "Blog>"
        const walker = document.createTreeWalker(
            document.body,
            NodeFilter.SHOW_TEXT,
            null,
            false
        );

        const textNodes = [];
        let node;
        while (node = walker.nextNode()) {
            if (node.nodeValue.includes('Blog>')) {
                textNodes.push(node);
            }
        }

        textNodes.forEach(node => {
            node.nodeValue = node.nodeValue.replace('Blog>', '');
        });

        // Method 2: Hide elements that might contain "Blog>" text
        document.querySelectorAll('*').forEach(el => {
            if (el.childNodes.length === 1 &&
                el.firstChild.nodeType === Node.TEXT_NODE &&
                el.textContent.trim() === 'Blog>') {
                el.style.display = 'none';
            }
        });

        // Method 3: Hide specific elements that might be breadcrumbs
        const possibleBreadcrumbClasses = [
            'breadcrumb', 'breadcrumbs', 'path', 'navigation-path',
            'blog-path', 'nav-breadcrumb', 'breadcrumb-item'
        ];

        possibleBreadcrumbClasses.forEach(className => {
            document.querySelectorAll(`.${className}`).forEach(el => {
                if (el.textContent.includes('Blog>')) {
                    el.style.display = 'none';
                }
            });
        });

        // Method 4: Hide any links to blog that might be part of breadcrumbs
        document.querySelectorAll('a[href*="blog"]').forEach(link => {
            if (link.textContent.trim() === 'Blog') {
                // Check if next sibling is a text node with ">"
                let next = link.nextSibling;
                if (next && next.nodeType === Node.TEXT_NODE && next.nodeValue.includes('>')) {
                    link.style.display = 'none';
                    next.nodeValue = '';
                }

                // Also check parent element
                if (link.parentElement &&
                    (link.parentElement.textContent.trim() === 'Blog>' ||
                        link.parentElement.textContent.trim().startsWith('Blog>'))) {
                    link.parentElement.style.display = 'none';
                }
            }
        });
    }

    // Function to ensure blog structure is visible and properly styled
    function ensureBlogVisibility() {
        // Force display of blog banner
        const blogBanner = document.querySelector('.blog-banner');
        if (blogBanner) {
            blogBanner.style.display = 'block';
            blogBanner.style.visibility = 'visible';
            blogBanner.style.opacity = '1';
        }

        // Force display of blog container
        const blogContainer = document.querySelector('.blog-container');
        if (blogContainer) {
            blogContainer.style.display = 'block';
            blogContainer.style.visibility = 'visible';
            blogContainer.style.opacity = '1';
            blogContainer.style.maxWidth = '1200px';
            blogContainer.style.margin = '0 auto';
            blogContainer.style.padding = '20px';
        }

        // Force display of posts grid
        const postsGrid = document.querySelector('.posts-grid');
        if (postsGrid) {
            postsGrid.style.display = 'grid';
            postsGrid.style.gridTemplateColumns = 'repeat(auto-fit, minmax(300px, 1fr))';
            postsGrid.style.gap = '30px';
            postsGrid.style.visibility = 'visible';
            postsGrid.style.opacity = '1';
            postsGrid.style.width = '100%';
            postsGrid.style.maxWidth = '1200px';
            postsGrid.style.margin = '0 auto';
            postsGrid.style.padding = '20px 0';
        }

        // Force display of filter tabs
        const filterTabs = document.querySelector('.filter-tabs');
        if (filterTabs) {
            filterTabs.style.display = 'flex';
            filterTabs.style.justifyContent = 'center';
            filterTabs.style.gap = '10px';
            filterTabs.style.marginBottom = '20px';
            filterTabs.style.flexWrap = 'wrap';
        }

        // Force display of search box
        const searchBox = document.querySelector('.search-box');
        if (searchBox) {
            searchBox.style.display = 'block';
            searchBox.style.marginBottom = '30px';
            searchBox.style.maxWidth = '600px';
            searchBox.style.margin = '0 auto 30px auto';
        }
    }

    // Fix blog post display issues
    function fixBlogPostDisplay() {
        // Ensure post cards are visible and properly styled
        const postCards = document.querySelectorAll('.post-card');

        // Check if we have any post cards
        if (postCards.length === 0) {
            console.log('No post cards found, attempting to fix blog structure');
            fixBlogStructure();
            return;
        }

        postCards.forEach(card => {
            // Make sure cards are visible
            card.style.display = 'block';

            // Ensure proper styling
            card.style.background = 'white';
            card.style.borderRadius = '10px';
            card.style.overflow = 'hidden';
            card.style.boxShadow = '0 5px 15px rgba(0,0,0,0.1)';
            card.style.margin = '0';
            card.style.height = 'auto';

            // Fix thumbnail images if they exist
            const thumbnail = card.querySelector('.post-thumbnail img');
            if (thumbnail) {
                thumbnail.style.width = '100%';
                thumbnail.style.height = '100%';
                thumbnail.style.objectFit = 'cover';
            }

            // Ensure post content is visible
            const postContent = card.querySelector('.post-content');
            if (postContent) {
                postContent.style.display = 'block';
                postContent.style.padding = '20px';
            }

            // Ensure post title is visible
            const postTitle = card.querySelector('.post-title');
            if (postTitle) {
                postTitle.style.display = 'block';
                postTitle.style.margin = '0 0 15px 0';
            }

            // Ensure post excerpt is visible
            const postExcerpt = card.querySelector('.post-excerpt');
            if (postExcerpt) {
                postExcerpt.style.display = 'block';
                postExcerpt.style.marginBottom = '20px';
            }
        });

        // Fix posts grid layout
        const postsGrid = document.querySelector('.posts-grid');
        if (postsGrid) {
            postsGrid.style.display = 'grid';
            postsGrid.style.gridTemplateColumns = 'repeat(3, 1fr)';
            postsGrid.style.gap = '30px';
            postsGrid.style.width = '100%';
            postsGrid.style.maxWidth = '1200px';
            postsGrid.style.margin = '0 auto';
            postsGrid.style.visibility = 'visible';
            postsGrid.style.opacity = '1';
        }

        // Fix filter tabs
        const filterTabs = document.querySelector('.filter-tabs');
        if (filterTabs) {
            filterTabs.style.display = 'flex';
            filterTabs.style.gap = '10px';
            filterTabs.style.marginBottom = '20px';
            filterTabs.style.justifyContent = 'center';

            // Ensure filter buttons are properly styled
            const filterButtons = filterTabs.querySelectorAll('.filter-btn');
            filterButtons.forEach(btn => {
                btn.style.background = btn.classList.contains('active') ? '#6c5ce7' : '#f5f6fa';
                btn.style.color = btn.classList.contains('active') ? 'white' : '#333';
                btn.style.border = 'none';
                btn.style.padding = '10px 20px';
                btn.style.borderRadius = '30px';
                btn.style.cursor = 'pointer';
                btn.style.fontWeight = '600';
            });
        }

        // Fix search box
        const searchBox = document.querySelector('.search-box');
        if (searchBox) {
            searchBox.style.display = 'block';
            searchBox.style.marginBottom = '30px';
            searchBox.style.maxWidth = '600px';
            searchBox.style.margin = '0 auto 30px auto';
        }

        // Fix blog container
        const blogContainer = document.querySelector('.blog-container');
        if (blogContainer) {
            blogContainer.style.display = 'block';
            blogContainer.style.maxWidth = '1200px';
            blogContainer.style.margin = '0 auto';
            blogContainer.style.padding = '20px';
            blogContainer.style.visibility = 'visible';
            blogContainer.style.opacity = '1';
        }
    }

    // Function to fix blog structure if posts aren't displaying
    function fixBlogStructure() {
        console.log('Attempting to fix blog structure');

        // Check if we need to create the blog structure
        const blogContainer = document.querySelector('.blog-container');
        if (!blogContainer) {
            console.log('Blog container not found, cannot fix structure');
            return;
        }

        // Check if posts grid exists
        let postsGrid = document.querySelector('.posts-grid');
        if (!postsGrid) {
            console.log('Posts grid not found, creating it');
            postsGrid = document.createElement('div');
            postsGrid.className = 'posts-grid';
            blogContainer.appendChild(postsGrid);
        }

        // Check if we have any posts in the grid
        if (postsGrid.children.length === 0) {
            console.log('No posts found in grid, attempting to find posts elsewhere');

            // Look for posts that might be outside the grid
            const possiblePosts = document.querySelectorAll('article, .post, .type-post');
            if (possiblePosts.length > 0) {
                console.log('Found possible posts outside the grid, moving them');

                possiblePosts.forEach(post => {
                    // Create a post card
                    const postCard = document.createElement('div');
                    postCard.className = 'post-card';

                    // Try to find a thumbnail
                    const thumbnail = post.querySelector('img');
                    if (thumbnail) {
                        const thumbnailDiv = document.createElement('div');
                        thumbnailDiv.className = 'post-thumbnail';
                        const thumbnailLink = document.createElement('a');
                        
                        // Try to find a link for the thumbnail
                        const existingLink = post.querySelector('a');
                        if (existingLink) {
                            thumbnailLink.href = existingLink.href;
                        } else {
                            thumbnailLink.href = '#';
                        }
                        
                        const thumbnailImg = document.createElement('img');
                        thumbnailImg.src = thumbnail.src;
                        thumbnailImg.alt = thumbnail.alt || 'Post thumbnail';
                        thumbnailLink.appendChild(thumbnailImg);
                        thumbnailDiv.appendChild(thumbnailLink);
                        postCard.appendChild(thumbnailDiv);
                    } else {
                        // Create a placeholder thumbnail if none exists
                        const thumbnailDiv = document.createElement('div');
                        thumbnailDiv.className = 'post-thumbnail';
                        const thumbnailLink = document.createElement('a');
                        
                        // Try to find a link for the thumbnail
                        const existingLink = post.querySelector('a');
                        if (existingLink) {
                            thumbnailLink.href = existingLink.href;
                        } else {
                            thumbnailLink.href = '#';
                        }
                        
                        const thumbnailImg = document.createElement('img');
                        thumbnailImg.src = 'https://via.placeholder.com/600x400?text=Blog+Post+Image';
                        thumbnailImg.alt = 'Post thumbnail placeholder';
                        thumbnailLink.appendChild(thumbnailImg);
                        thumbnailDiv.appendChild(thumbnailLink);
                        postCard.appendChild(thumbnailDiv);
                    }

                    // Create post content
                    const postContent = document.createElement('div');
                    postContent.className = 'post-content';

                    // Create post meta
                    const postMeta = document.createElement('div');
                    postMeta.className = 'post-meta';
                    
                    // Add date
                    const postDate = document.createElement('span');
                    postDate.className = 'post-date';
                    postDate.textContent = new Date().toLocaleDateString();
                    postMeta.appendChild(postDate);
                    
                    postContent.appendChild(postMeta);

                    // Try to find a title
                    const title = post.querySelector('h1, h2, h3, .entry-title, .post-title');
                    if (title) {
                        const postTitle = document.createElement('h3');
                        postTitle.className = 'post-title';
                        const titleLink = document.createElement('a');

                        // Try to find a link
                        const existingLink = post.querySelector('a');
                        if (existingLink) {
                            titleLink.href = existingLink.href;
                        } else {
                            titleLink.href = '#';
                        }

                        titleLink.textContent = title.textContent;
                        postTitle.appendChild(titleLink);
                        postContent.appendChild(postTitle);
                    }

                    // Try to find content
                    const content = post.querySelector('p, .entry-content, .post-content');
                    if (content) {
                        const postExcerpt = document.createElement('div');
                        postExcerpt.className = 'post-excerpt';
                        postExcerpt.textContent = content.textContent.substring(0, 100) + '...';
                        postContent.appendChild(postExcerpt);
                    }

                    // Add read more button
                    const postFooter = document.createElement('div');
                    postFooter.className = 'post-footer';

                    const readMoreBtn = document.createElement('a');
                    readMoreBtn.className = 'read-more-btn';
                    readMoreBtn.textContent = 'Read More';

                    // Try to find a link
                    const existingLink = post.querySelector('a');
                    if (existingLink) {
                        readMoreBtn.href = existingLink.href;
                    } else {
                        readMoreBtn.href = '#';
                    }

                    postFooter.appendChild(readMoreBtn);
                    
                    // Add post stats
                    const postStats = document.createElement('div');
                    postStats.className = 'post-stats';
                    
                    const statSpan = document.createElement('span');
                    statSpan.className = 'stat';
                    statSpan.textContent = '0 comments';
                    
                    postStats.appendChild(statSpan);
                    postFooter.appendChild(postStats);
                    
                    postContent.appendChild(postFooter);

                    // Add post content to card
                    postCard.appendChild(postContent);

                    // Add card to grid
                    postsGrid.appendChild(postCard);
                });

                // Hide the original posts
                possiblePosts.forEach(post => {
                    if (!postsGrid.contains(post)) {
                        post.style.display = 'none';
                    }
                });
            } else {
                console.log('No posts found anywhere, creating sample posts');

                // Create sample posts if none are found
                for (let i = 0; i < 6; i++) {
                    const postCard = document.createElement('div');
                    postCard.className = 'post-card';
                    
                    // Create thumbnail with image
                    const thumbnailDiv = document.createElement('div');
                    thumbnailDiv.className = 'post-thumbnail';
                    
                    const thumbnailLink = document.createElement('a');
                    thumbnailLink.href = '#';
                    
                    const thumbnailImg = document.createElement('img');
                    thumbnailImg.src = `https://via.placeholder.com/600x400?text=Blog+Post+${i+1}`;
                    thumbnailImg.alt = `Sample blog post ${i+1} thumbnail`;
                    
                    thumbnailLink.appendChild(thumbnailImg);
                    thumbnailDiv.appendChild(thumbnailLink);
                    postCard.appendChild(thumbnailDiv);

                    // Create post content
                    const postContent = document.createElement('div');
                    postContent.className = 'post-content';
                    
                    // Create post meta
                    const postMeta = document.createElement('div');
                    postMeta.className = 'post-meta';
                    
                    // Add date
                    const postDate = document.createElement('span');
                    postDate.className = 'post-date';
                    postDate.textContent = new Date().toLocaleDateString();
                    postMeta.appendChild(postDate);
                    
                    postContent.appendChild(postMeta);

                    // Create post title
                    const postTitle = document.createElement('h3');
                    postTitle.className = 'post-title';
                    const titleLink = document.createElement('a');
                    titleLink.href = '#';
                    titleLink.textContent = 'Sample Blog Post ' + (i + 1);
                    postTitle.appendChild(titleLink);
                    postContent.appendChild(postTitle);

                    // Create post excerpt
                    const postExcerpt = document.createElement('div');
                    postExcerpt.className = 'post-excerpt';
                    postExcerpt.textContent = 'This is a sample blog post. The actual blog posts will appear here once they are properly loaded.';
                    postContent.appendChild(postExcerpt);

                    // Add read more button and stats
                    const postFooter = document.createElement('div');
                    postFooter.className = 'post-footer';

                    const readMoreBtn = document.createElement('a');
                    readMoreBtn.className = 'read-more-btn';
                    readMoreBtn.href = '#';
                    readMoreBtn.textContent = 'Read More';
                    postFooter.appendChild(readMoreBtn);
                    
                    // Add post stats
                    const postStats = document.createElement('div');
                    postStats.className = 'post-stats';
                    
                    const statSpan = document.createElement('span');
                    statSpan.className = 'stat';
                    statSpan.textContent = '0 comments';
                    
                    postStats.appendChild(statSpan);
                    postFooter.appendChild(postStats);

                    postContent.appendChild(postFooter);

                    // Add post content to card
                    postCard.appendChild(postContent);

                    // Add card to grid
                    postsGrid.appendChild(postCard);
                }
            }
        }

        // Apply styling to the posts grid
        postsGrid.style.display = 'grid';
        postsGrid.style.gridTemplateColumns = 'repeat(3, 1fr)';
        postsGrid.style.gap = '30px';
        postsGrid.style.width = '100%';
    }

    // Implement filter functionality
    function setupFilters() {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const postCards = document.querySelectorAll('.post-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', function () {
                // Remove active class from all buttons
                filterButtons.forEach(btn => {
                    btn.classList.remove('active');
                    btn.style.background = '#f5f6fa';
                    btn.style.color = '#333';
                });

                // Add active class to clicked button
                this.classList.add('active');
                this.style.background = '#6c5ce7';
                this.style.color = 'white';

                const filter = this.getAttribute('data-filter');

                // Simple filtering logic (can be enhanced with actual categories)
                if (filter === 'all') {
                    postCards.forEach(card => {
                        card.style.display = 'block';
                    });
                } else if (filter === 'recent') {
                    // Show only the first 5 posts (assuming they're the most recent)
                    postCards.forEach((card, index) => {
                        card.style.display = index < 5 ? 'block' : 'none';
                    });
                } else if (filter === 'popular') {
                    // For demo purposes, show random posts as "popular"
                    postCards.forEach((card, index) => {
                        card.style.display = index % 2 === 0 ? 'block' : 'none';
                    });
                } else if (filter === 'featured') {
                    // For demo purposes, show every third post as "featured"
                    postCards.forEach((card, index) => {
                        card.style.display = index % 3 === 0 ? 'block' : 'none';
                    });
                }
            });
        });
    }

    // Run all fixes
    removeBlogText();
    ensureBlogVisibility();
    fixBlogPostDisplay();
    setupFilters();

    // Also run after a short delay to catch any dynamically added content
    setTimeout(() => {
        removeBlogText();
        ensureBlogVisibility();
        fixBlogPostDisplay();
        setupFilters();
    }, 500);

    // Run again after a longer delay to ensure everything is loaded
    setTimeout(() => {
        removeBlogText();
        ensureBlogVisibility();
        fixBlogPostDisplay();
        setupFilters();
    }, 1000);

    // Use MutationObserver to catch any dynamically added elements
    const observer = new MutationObserver(() => {
        removeBlogText();
        fixBlogPostDisplay();
    });

    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
});
