@extends('layouts.app')

@section('content')
<section class="featured-products">

    <!-- Page Title -->
    <h1 class="page-title">Product Catalog</h1>

    <!-- LIVE SEARCH -->
    <div class="live-search-container">
    <input type="text" id="liveSearch" placeholder="Search by name or category...">
    <button id="searchBtn" class="search-button">Search</button>
    <div id="searchResults" class="search-dropdown"></div>
</div>

    <!-- Category Filter -->
    <div class="category-buttons">
        <button class="filter-btn active" data-category="all">All</button>
        <button class="filter-btn" data-category="product">Products</button>
        <button class="filter-btn" data-category="service">Services</button>
    </div>

    <!-- Sort Dropdown -->
    <div class="sort-container">
        <label for="sortSelect">Sort:</label>
        <select id="sortSelect">
            <option value="az">Name: A - Z</option>
            <option value="za">Name: Z - A</option>
            <option value="low-high">Price: Low - High</option>
            <option value="high-low">Price: High - Low</option>
        </select>
    </div>

    <!-- Product Grid -->
    <div class="product-grid" id="productGrid">
        @foreach($products as $product)
            <div class="product-card" data-category="{{ strtolower($product->category) }}">
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <p><strong>PKR {{ number_format($product->price) }}</strong></p>
                <button class="btn-add-cart"
                        data-name="{{ $product->name }}"
                        data-price="{{ $product->price }}"
                        data-image="{{ asset('images/' . $product->image) }}">
                    Add to Cart
                </button>
            </div>
        @endforeach
    </div>

</section>

<style>
/* PAGE TITLE */
.page-title {
    text-align: center;
    font-size: 2.3rem;
    font-weight: 700;
    margin-bottom: 25px;
}

/* SEARCH BAR */
.live-search-container {
    width: 60%;
    margin: 0 auto 25px auto;
    position: relative;
}

#liveSearch {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    border: 1px solid #ccc;
    font-size: 16px;
    outline: none;
}

/* SEARCH DROPDOWN */
.search-dropdown {
    position: absolute;
    top: 48px;
    left: 0;
    width: 100%;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    max-height: 250px;
    overflow-y: auto;
    display: none;
    z-index: 999;
}

.dropdown-item {
    padding: 12px;
    display: flex;
    gap: 10px;
    align-items: center;
    cursor: pointer;
    border-bottom: 1px solid #eee;
}

.dropdown-item img {
    width: 40px;
    height: 40px;
    object-fit: cover;
    border-radius: 6px;
}

.dropdown-item:hover {
    background: #f7f7f7;
}

.no-result {
    text-align: center;
    padding: 10px;
    color: #777;
}

/* CATEGORY BUTTONS */
.category-buttons {
    text-align: center;
    margin-bottom: 20px;
}

.filter-btn {
    padding: 8px 15px;
    border: none;
    background: #e5e7eb;
    color: #111827;
    border-radius: 6px;
    margin: 0 5px;
    cursor: pointer;
    font-weight: 500;
}

.filter-btn.active,
.filter-btn:hover {
    background: #2563eb;
    color: white;
}

/* SORTING */
.sort-container {
    text-align: center;
    margin-bottom: 20px;
    font-size: 16px;
}

/* PRODUCT GRID */
.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 25px;
    padding: 0 10%;
}

.product-card {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    text-align: center;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    transition: transform 0.2s;
}

.product-card img {
    width: 100%;
    height: 180px;
    border-radius: 10px;
    object-fit: cover;
}

.product-card:hover {
    transform: translateY(-5px);
}

/* BUTTON */
.btn-add-cart {
    background: #2563eb;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
}

.btn-add-cart:hover {
    background: #1e40af;
}

/* ADDED MESSAGE */
.added-msg {
    position: fixed;
    top: 20px;
    right: 20px;
    background: #16a34a;
    color: #fff;
    padding: 12px 20px;
    border-radius: 8px;
    opacity: 0;
    transform: translateY(-10px);
    transition: all 0.4s ease;
}
.added-msg.show {
    opacity: 1;
    transform: translateY(0);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {

    /* ------------ AJAX LIVE SEARCH ------------ */
    const searchInput = document.getElementById('liveSearch');
    const resultsBox = document.getElementById('searchResults');

    searchInput.addEventListener('keyup', function () {
        const query = this.value.trim();

        if (query.length === 0) {
            resultsBox.style.display = "none";
            resultsBox.innerHTML = "";
            return;
        }

        fetch(`/ajax-search?query=${query}`)
            .then(res => res.json())
            .then(data => {
                let html = "";

                if (data.length > 0) {
                    html = data.map(item => `
                        <div class="dropdown-item">
                            <img src="/images/${item.image}">
                            <span><strong>${item.name}</strong> (${item.category})</span>
                        </div>
                    `).join('');
                } else {
                    html = `<div class="dropdown-item no-result">No results found</div>`;
                }

                resultsBox.innerHTML = html;
                resultsBox.style.display = "block";
            });
    });

    /* ------------ CATEGORY FILTER ------------ */
    const buttons = document.querySelectorAll('.filter-btn');
    const cards = document.querySelectorAll('.product-card');

    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            buttons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const category = btn.dataset.category;

            cards.forEach(card => {
                card.style.display =
                    category === 'all' || card.dataset.category === category
                        ? 'block'
                        : 'none';
            });
        });
    });

    /* ------------ SORTING ------------ */
    const sortSelect = document.getElementById('sortSelect');
    const grid = document.getElementById('productGrid');

    sortSelect.addEventListener('change', () => {
        const order = sortSelect.value;
        const items = Array.from(grid.children);

        items.sort((a, b) => {
            const nameA = a.querySelector('h3').textContent.toLowerCase();
            const nameB = b.querySelector('h3').textContent.toLowerCase();

            const priceA = parseFloat(a.querySelector('strong').textContent.replace(/[^\d]/g, ""));
            const priceB = parseFloat(b.querySelector('strong').textContent.replace(/[^\d]/g, ""));

            if (order === 'az') return nameA.localeCompare(nameB);
            if (order === 'za') return nameB.localeCompare(nameA);
            if (order === 'low-high') return priceA - priceB;
            if (order === 'high-low') return priceB - priceA;
        });

        items.forEach(item => grid.appendChild(item));
    });

});

document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('liveSearch');
    const resultsBox = document.getElementById('searchResults');
    const searchBtn = document.getElementById('searchBtn');

    function runSearch() {
        const query = searchInput.value.trim();

        if (query.length === 0) {
            resultsBox.style.display = "none";
            resultsBox.innerHTML = "";
            return;
        }

        fetch(`/ajax-search?query=${query}`)
            .then(res => res.json())
            .then(data => {
                let html = "";

                if (data.length > 0) {
                    html = data.map(item => `
                        <div class="dropdown-item">
                            <img src="/images/${item.image}">
                            <span><strong>${item.name}</strong> (${item.category})</span>
                        </div>
                    `).join('');
                } else {
                    html = `<div class="dropdown-item no-result">No results found</div>`;
                }

                resultsBox.innerHTML = html;
                resultsBox.style.display = "block";
            });
    }

    // 🔘 Button click triggers search
    searchBtn.addEventListener('click', runSearch);

    // ⌨️ Optional: pressing ENTER also triggers search
    searchInput.addEventListener('keyup', function (e) {
        if (e.key === 'Enter') {
            runSearch();
        }
    });
});

</script>

@endsection
