<div class="top-part-header sticky-top">
    <!-- Main Navbar -->
    <nav class="navbar navbar-height-part navbar-expand-lg">
        <div class="container">
            @if(isset($all_view['setting']->logo))
                <a href="{{route('site.index')}}">
                    <img class="logo-part" src="{{ asset($all_view['setting']->logo) }}" alt="Logo">
                </a>
            @endif

            <!-- Mobile Toggler Button to Open Offcanvas -->
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Desktop Menu (visible above 992px) -->
            <div class="collapse navbar-collapse d-none d-lg-flex" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if(isset($data['menu']))
                        @foreach($data['menu'] as $row)
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ url($row['url']) }}">
                                    {{ $row['menu_name'] }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>

                <!-- Desktop Search Icon with Enhanced Button -->
                <div class="d-none d-lg-block ">
                    <div class="d-flex align-items-center gap-2">
                         {{-- <a class="text-decoration-none" href="https://emart.nehantechsolution.com/" target="_blank"> <button class="btn btn-search-icon " type="button">
                        
                        <span class="search-text">Online Shop</span>
                    </button></a> --}}
                    <button class="btn btn-search-icon search-toggle" type="button">
                        <i class="bi bi-search"></i>
                        <span class="search-text">Search</span>
                    </button>
                    </div>
                  
                </div>
            </div>
        </div>
    </nav>
</div>

<!-- Offcanvas Mobile Menu -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
    <div class="offcanvas-header" style="background-color: #000000">
        <h5 class="offcanvas-title" id="mobileMenuLabel">
            @if(isset($all_view['setting']->logo))
                <a href="{{route('site.index')}}">
                    <img src="{{ asset($all_view['setting']->logo) }}" alt="Logo" style="height: 60px; width: 90px;">
                </a>
            @endif
        </h5>
        <button type="button" class="btn-close text-reset bg-light" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" style="background:#2b2b2b;">
        <!-- Mobile Navigation Links -->
        <ul class="navbar-nav mb-3">
            @if(isset($data['menu']))
                @foreach($data['menu'] as $row)
                    <li class="nav-item">
                        <a class="nav-link text-white" style="border-bottom: 2px solid #797979;" href="{{ url($row['url']) }}">
                            {{ $row['menu_name'] }}
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>

        <!-- Mobile Search Icon -->
        <div class="mb-3">
            <button class="btn btn-link text-dark search-toggle" type="button">
                <i class="bi bi-search text-white" style="font-size: 1.5rem;"></i>
            </button>
        </div>

        <!-- Mobile Social Icons -->
        <div class="d-flex">
            <a href="{{ $all_view['setting']->social_profile_fb }}" class="me-2 icon-home">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="{{ $all_view['setting']->social_profile_insta }}" class="me-2 icon-home">
                <i class="bi bi-instagram"></i>
            </a>
            <a href="{{ $all_view['setting']->social_profile_youtube }}" class="me-2 icon-home">
                <i class="bi bi-youtube"></i>
            </a>
            <a href="{{ $all_view['setting']->social_profile_tiktok }}" class="me-2 icon-home">
                <i class="bi bi-tiktok"></i>
            </a>
            <a href="#" class="icon-home">
                <i class="bi bi-whatsapp"></i>
            </a>
        </div>
    </div>
</div>

<!-- Enhanced Search Overlay -->
<div id="fullSearchBar" class="search-overlay">
    <div class="search-overlay__inner">
        <div class="search-overlay__header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-10 col-lg-8 mx-auto">
                        <form action="#" class="search-form" id="searchForm">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="bi bi-search"></i>
                                    </span>
                                </div>
                                <input type="text" 
                                       class="form-control search-input" 
                                       placeholder="What are you looking for?" 
                                       autocomplete="off"
                                       id="searchInput">
                                <div class="input-group-append">
                                    <button class="btn btn-search-clear" type="button" id="clearSearch">
                                        <i class="bi bi-x"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="search-tags mt-3">
                                <span class="search-tags__label">Trending:</span>
                                <a href="#" class="search-tag" data-search="web design">Web Design</a>
                                <a href="#" class="search-tag" data-search="development">Development</a>
                                <a href="#" class="search-tag" data-search="marketing">Marketing</a>
                                <a href="#" class="search-tag" data-search="seo">SEO</a>
                                <a href="#" class="search-tag" data-search="ecommerce">E-commerce</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="search-overlay__body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto">
                        <!-- Search Results Container -->
                        <div class="search-results" id="searchResults">
                            <div class="search-placeholder">
                                <div class="search-placeholder__icon">
                                    <i class="bi bi-search"></i>
                                </div>
                                <div class="search-placeholder__text">
                                    <h4>Start typing to search</h4>
                                    <p>Type keywords to find what you're looking for</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="search-overlay__footer">
            <button class="btn btn-close-search" id="closeSearch">
                <i class="bi bi-arrow-down"></i>
                <span>Close Search</span>
            </button>
        </div>
    </div>
</div>

<style>
/* Enhanced Search Styling */
.btn-search-icon {
    background: linear-gradient(45deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    border-radius: 30px;
    padding: 8px 20px;
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.2);
}

.btn-search-icon:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(102, 126, 234, 0.3);
    color: white;
}

.search-text {
    font-size: 0.9rem;
}

/* Enhanced Search Overlay */
.search-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(15, 23, 42, 0.98);
    backdrop-filter: blur(10px);
    z-index: 9999;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-100%);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.search-overlay.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.search-overlay__inner {
    height: 100%;
    display: flex;
    flex-direction: column;
}

.search-overlay__header {
    padding-top: 80px;
    padding-bottom: 30px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.search-form {
    position: relative;
}

.input-group {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    border: 2px solid rgba(255, 255, 255, 0.2);
    overflow: hidden;
    transition: all 0.3s ease;
}

.input-group:focus-within {
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
    transform: translateY(-2px);
}

.input-group-text {
    background: transparent;
    border: none;
    color: #fff;
    font-size: 1.2rem;
    padding: 15px 20px;
}

.search-input {
    background: transparent;
    border: none;
    color: white;
    font-size: 1.1rem;
    padding: 15px 0;
    height: auto;
}

.search-input::placeholder {
    color: rgba(255, 255, 255, 0.6);
}

.search-input:focus {
    background: transparent;
    color: white;
    box-shadow: none;
}

.btn-search-clear {
    background: transparent;
    border: none;
    color: rgba(255, 255, 255, 0.6);
    font-size: 1.2rem;
    padding: 15px 20px;
    transition: color 0.3s ease;
}

.btn-search-clear:hover {
    color: white;
    background: transparent;
}

.search-tags {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
}

.search-tags__label {
    color: rgba(255, 255, 255, 0.6);
    font-size: 0.9rem;
}

.search-tag {
    background: rgba(255, 255, 255, 0.1);
    color: rgba(255, 255, 255, 0.8);
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 0.85rem;
    text-decoration: none;
    transition: all 0.3s ease;
}

.search-tag:hover {
    background: #667eea;
    color: white;
    transform: translateY(-2px);
    text-decoration: none;
}

/* Search Body */
.search-overlay__body {
    flex: 1;
    padding: 40px 0;
    overflow-y: auto;
}

.search-placeholder {
    text-align: center;
    padding: 60px 20px;
    opacity: 0.6;
}

.search-placeholder__icon {
    font-size: 4rem;
    color: rgba(255, 255, 255, 0.3);
    margin-bottom: 20px;
}

.search-placeholder__text h4 {
    color: white;
    margin-bottom: 10px;
}

.search-placeholder__text p {
    color: rgba(255, 255, 255, 0.6);
}

/* Search Results */
.search-results {
    display: none;
}

.search-results.active {
    display: block;
}

.search-result-item {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 15px;
    border-left: 3px solid #667eea;
    transition: all 0.3s ease;
    cursor: pointer;
}

.search-result-item:hover {
    background: rgba(255, 255, 255, 0.1);
    transform: translateX(5px);
}

.search-result-item__title {
    color: white;
    font-size: 1.1rem;
    margin-bottom: 5px;
    display: block;
    text-decoration: none;
}

.search-result-item__description {
    color: rgba(255, 255, 255, 0.6);
    font-size: 0.9rem;
    margin-bottom: 0;
}

/* Loading animation */
.search-loading {
    text-align: center;
    padding: 40px 20px;
}

.search-loading__spinner {
    width: 40px;
    height: 40px;
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    border-top-color: #667eea;
    animation: spin 1s ease-in-out infinite;
    margin: 0 auto 20px;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

.search-loading__text {
    color: rgba(255, 255, 255, 0.6);
}

/* Search Footer */
.search-overlay__footer {
    padding: 20px 0;
    text-align: center;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.btn-close-search {
    color: rgba(255, 255, 255, 0.8);
    background: #FF5722;
    border: none;
    border-radius: 25px;
    padding: 10px 30px;
    font-size: 0.95rem;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.btn-close-search:hover {
    background: rgba(15, 2, 2, 0.2);
    color: white;
    transform: translateY(-2px);
}

/* Animation for search results */
@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.search-result-item {
    animation: slideUp 0.3s ease forwards;
}

/* Mobile responsiveness */
@media (max-width: 768px) {
    .search-overlay__header {
        padding-top: 40px;
    }
    
    .search-input {
        font-size: 1rem;
        padding: 12px 0;
    }
    
    .search-tags {
        justify-content: center;
    }
    
    .btn-search-icon {
        padding: 6px 15px;
    }
    
    .search-text {
        display: none;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchOverlay = document.getElementById('fullSearchBar');
    const searchInput = document.getElementById('searchInput');
    const searchForm = document.getElementById('searchForm');
    const closeSearchBtn = document.getElementById('closeSearch');
    const clearSearchBtn = document.getElementById('clearSearch');
    const searchResults = document.getElementById('searchResults');
    const searchTags = document.querySelectorAll('.search-tag');
    
    // Base URL for search
    const baseUrl = window.location.origin;
    
    // Toggle search overlay
    document.querySelectorAll('.search-toggle').forEach(button => {
        button.addEventListener('click', function() {
            searchOverlay.classList.add('active');
            searchInput.focus();
            document.body.style.overflow = 'hidden';
        });
    });
    
    // Close search overlay
    closeSearchBtn.addEventListener('click', closeSearch);
    
    // Close on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeSearch();
        }
    });
    
    // Clear search input
    clearSearchBtn.addEventListener('click', function() {
        searchInput.value = '';
        searchInput.focus();
        hideSearchResults();
    });
    
    // Search input functionality with debouncing
    let searchTimeout;
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const query = this.value.trim();
        
        if (query.length === 0) {
            hideSearchResults();
            return;
        }
        
        // Only search if at least 2 characters
        if (query.length < 2) {
            showMinCharsMessage();
            return;
        }
        
        searchTimeout = setTimeout(() => {
            performSearch(query);
        }, 300);
    });
    
    // Search form submission
    searchForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const query = searchInput.value.trim();
        if (query && query.length >= 2) {
            // Redirect to search results page or stay in overlay
            performSearch(query);
        }
    });
    
    // Search tag click
    searchTags.forEach(tag => {
        tag.addEventListener('click', function(e) {
            e.preventDefault();
            const searchTerm = this.getAttribute('data-search');
            searchInput.value = searchTerm;
            performSearch(searchTerm);
        });
    });
    
    // Close search function
    function closeSearch() {
        searchOverlay.classList.remove('active');
        searchInput.value = '';
        hideSearchResults();
        document.body.style.overflow = 'auto';
    }
    
    // Perform dynamic AJAX search
    function performSearch(query) {
        if (!query || query.length < 2) return;
        
        // Show loading state
        searchResults.innerHTML = `
            <div class="search-loading">
                <div class="search-loading__spinner"></div>
                <div class="search-loading__text">
                    <h4>Searching for "${query}"</h4>
                    <p>Finding the best results...</p>
                </div>
            </div>
        `;
        
        searchResults.classList.add('active');
        
        // Make AJAX request to your search endpoint
        // Note: Your controller expects 'search' parameter, not 'query'
        fetch(`/search?search=${encodeURIComponent(query)}&ajax=1`, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            displaySearchResults(data, query);
        })
        .catch(error => {
            console.error('Search error:', error);
            showError('An error occurred while searching. Please try again.');
        });
    }
    
    // Display search results
    function displaySearchResults(results, query) {
        if (!results || results.length === 0) {
            searchResults.innerHTML = `
                <div class="search-placeholder">
                    <div class="search-placeholder__icon">
                        <i class="bi bi-search"></i>
                    </div>
                    <div class="search-placeholder__text">
                        <h4>No results found for "${query}"</h4>
                        <p>Try different keywords or check your spelling</p>
                    </div>
                </div>
            `;
            return;
        }
        
        let resultsHTML = `
            <div class="search-results__header mb-4">
                <h5 class="text-white mb-3">Found ${results.length} result(s) for "${query}"</h5>
            </div>
            <div class="search-results__list">
        `;
        
        results.forEach((result, index) => {
            // Check the structure of your result data
            // Based on your controller, it should have: id, title, post_unique_id, type
            const title = result.title || 'No Title';
            const postId = result.post_unique_id || result.id;
            
            // Create URL based on your blog route structure
            // Adjust this based on your actual route
            const url = `/post/${postId}`;
            
            resultsHTML += `
                <div class="search-result-item" style="animation-delay: ${index * 0.05}s"
                     onclick="window.location.href='${url}'">
                    <div class="search-result-item__title">
                        <i class="bi bi-file-text me-2"></i>${title}
                    </div>
                    <div class="search-result-item__description mt-2">
                        <span class="badge bg-primary">Blog Post</span>
                        <small class="text-muted ms-2">
                            <i class="bi bi-hash"></i> ${postId}
                        </small>
                    </div>
                </div>
            `;
        });
        
        resultsHTML += `</div>`;
        
        searchResults.innerHTML = resultsHTML;
    }
    
    // Show minimum characters message
    function showMinCharsMessage() {
        searchResults.innerHTML = `
            <div class="search-placeholder">
                <div class="search-placeholder__icon">
                    <i class="bi bi-keyboard"></i>
                </div>
                <div class="search-placeholder__text">
                    <h4>Type at least 2 characters</h4>
                    <p>Please enter more characters to start searching</p>
                </div>
            </div>
        `;
        searchResults.classList.add('active');
    }
    
    // Show error message
    function showError(message) {
        searchResults.innerHTML = `
            <div class="search-placeholder">
                <div class="search-placeholder__icon text-warning">
                    <i class="bi bi-exclamation-triangle"></i>
                </div>
                <div class="search-placeholder__text">
                    <h4 class="text-warning">Search Error</h4>
                    <p>${message}</p>
                </div>
            </div>
        `;
        searchResults.classList.add('active');
    }
    
    // Hide search results
    function hideSearchResults() {
        searchResults.classList.remove('active');
        searchResults.innerHTML = `
            <div class="search-placeholder">
                <div class="search-placeholder__icon">
                    <i class="bi bi-search"></i>
                </div>
                <div class="search-placeholder__text">
                    <h4>Start typing to search</h4>
                    <p>Type keywords to find what you're looking for</p>
                </div>
            </div>
        `;
    }
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('.top-part-header');
    
    if (header) {
        // Listen for scroll events
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                // Add scrolled class when scrolled down 50px
                header.classList.add('scrolled');
            } else {
                // Remove scrolled class when at top
                header.classList.remove('scrolled');
            }
        });
        
        // Check initial scroll position
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        }
    }
});
</script>