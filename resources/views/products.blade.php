@extends('layouts.app')

@section('content')
<section class="featured-products">
    <h1 class="page-title">Product Catalog</h1>

    <!-- 🔍 Search Bar -->
    <div class="search-bar">
        <input type="text" id="searchInput" placeholder="Search products or services...">
    </div>

    <!-- 🗂 Category Filter -->
    <div class="category-buttons">
        <button class="filter-btn active" data-category="all">All</button>
        <button class="filter-btn" data-category="product">Products</button>
        <button class="filter-btn" data-category="service">Services</button>
    </div>

    <!-- 🔤 Sort Dropdown -->
    <div class="sort-container">
        <label for="sortSelect">Sort:</label>
       <select id="sortSelect">
         <option value="az">Name: A - Z</option>
         <option value="za">Name: Z - A</option>
         <option value="low-high">Price: Low - High</option>
         <option value="high-low">Price: High - Low</option>
</select>

    </div>

    <!-- 🛍 Product Grid -->
    <div class="product-grid" id="productGrid">
        @foreach($products as $product)
            <div class="product-card" data-category="{{ strtolower($product->category) }}">
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <p><strong>PKR {{ number_format($product->price) }}</strong></p>
            </div>
        @endforeach
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const buttons = document.querySelectorAll('.filter-btn');
    const cards = document.querySelectorAll('.product-card');
    const sortSelect = document.getElementById('sortSelect');
    const grid = document.getElementById('productGrid');

    // 🔍 Search Function
    searchInput.addEventListener('keyup', function() {
        const query = this.value.toLowerCase();
        cards.forEach(card => {
            const title = card.querySelector('h3').textContent.toLowerCase();
            card.style.display = title.includes(query) ? 'block' : 'none';
        });
    });

    // 🗂 Category Filter
    buttons.forEach(btn => {
        btn.addEventListener('click', function() {
            buttons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const category = this.getAttribute('data-category');
            cards.forEach(card => {
                card.style.display =
                    category === 'all' || card.dataset.category === category
                        ? 'block'
                        : 'none';
            });
        });
    });

    // 🔤 Sort Function (A-Z / Z-A / Price)
sortSelect.addEventListener('change', function() {
    const order = this.value;
    const cardsArray = Array.from(cards);

    const sorted = cardsArray.sort((a, b) => {
        const nameA = a.querySelector('h3').textContent.trim().toLowerCase();
        const nameB = b.querySelector('h3').textContent.trim().toLowerCase();
        const priceA = parseFloat(a.querySelector('strong').textContent.replace(/[^\d.]/g, ''));
        const priceB = parseFloat(b.querySelector('strong').textContent.replace(/[^\d.]/g, ''));

        if (order === 'az') return nameA.localeCompare(nameB);
        if (order === 'za') return nameB.localeCompare(nameA);
        if (order === 'low-high') return priceA - priceB;
        if (order === 'high-low') return priceB - priceA;
    });

    sorted.forEach(card => grid.appendChild(card));
});

});
</script>
@endsection
