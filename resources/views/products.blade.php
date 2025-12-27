@extends('layouts.app')

@section('content')
<section class="featured-products">

    <!-- Page Title -->
    <h1 class="page-title">Product Catalog</h1>


    <!-- AJAX Search -->

    <div class="live-search-container">
    <input type="text" id="liveSearch" placeholder="Search by Name or Category...">
    <div class="search-dropdown" id="searchDropdown"></div>
</div>


<!-- Product Grid -->
    <div class="product-grid">
        @foreach($products as $product)
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('images/' . $product->image) }}" 
                         alt="{{ $product->name }}" 
                         loading="lazy">
                </div>
                <div class="product-info">
                    <h3>{{ $product->name }}</h3>
                    <p class="description">{{ $product->description }}</p>
                    <p class="price"><strong>PKR {{ number_format($product->price) }}</strong></p>
                    <button class="btn-add-cart"
                            data-name="{{ $product->name }}"
                            data-price="{{ $product->price }}"
                            data-image="{{ asset('images/' . $product->image) }}">
                        Add to Cart
                    </button>
                </div>
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
    color: #000; /* Make all text black */
}

.dropdown-item {
    padding: 12px;
    display: flex;
    gap: 10px;
    align-items: center;
    cursor: pointer;
    border-bottom: 1px solid #eee;
    color: #000; /* Make text black */
}

.dropdown-item div {
    color: #000; /* Ensure nested text (name/category) is black */
}

.no-result {
    text-align: center;
    padding: 10px;
    color: #000; /* Make no-result text black */
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

/* Highlight selected item */
.dropdown-item.selected {
    background-color: #2563eb; /* blue background */
    color: #fff; /* white text for contrast */
}

/* Highlight selected product card */
.product-card.highlighted {
    border: 2px solid #2563eb;
    box-shadow: 0 4px 15px rgba(37, 99, 235, 0.4);
    transform: scale(1.02);
    transition: all 0.3s ease;
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
    color: #000;
}

.dropdown-item {
    padding: 12px;
    display: flex;
    gap: 10px;
    align-items: center;
    cursor: pointer;
    border-bottom: 1px solid #eee;
    color: #000;
}

.dropdown-item div {
    color: #000;
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
    color: #000;
}

.product-card.highlighted {
    border: 2px solid #2563eb;
    box-shadow: 0 4px 15px rgba(37, 99, 235, 0.4);
    transform: scale(1.02);
    transition: all 0.3s ease;
}

</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Fade-in animation for product cards
    const cards = document.querySelectorAll('.product-card');
    cards.forEach((card, index) => {
        setTimeout(() => card.classList.add('show'), index * 100);
    });
});


document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('liveSearch');
    const dropdown = document.getElementById('searchDropdown');

    searchInput.addEventListener('keyup', function() {
        const query = this.value.trim();

        if(query.length === 0) {
            dropdown.style.display = 'none';
            dropdown.innerHTML = '';
            return;
        }

        fetch(`/products/search?query=${query}`)
            .then(response => response.json())
            .then(data => {
                dropdown.innerHTML = '';

                if(data.length > 0) {
                    data.forEach(item => {
                        const div = document.createElement('div');
                        div.classList.add('dropdown-item');
                        div.innerHTML = `
                            <img src="/images/${item.image}" alt="${item.name}">
                            <div>
                                <strong>${item.name}</strong><br>
                                <small>${item.category}</small>
                            </div>
                        `;
                        div.addEventListener('click', () => {
                            searchInput.value = item.name;
                            dropdown.style.display = 'none';
                        });
                        dropdown.appendChild(div);
                    });
                } else {
                    dropdown.innerHTML = '<div class="no-result">No results found</div>';
                }

                dropdown.style.display = 'block';
            })
            .catch(err => console.error(err));
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!dropdown.contains(e.target) && e.target !== searchInput) {
            dropdown.style.display = 'none';
        }
    });
});


document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('liveSearch');
    const dropdown = document.getElementById('searchDropdown');

    searchInput.addEventListener('keyup', function() {
        const query = this.value.trim();

        if(query.length === 0) {
            dropdown.style.display = 'none';
            dropdown.innerHTML = '';
            return;
        }

        fetch(`/products/search?query=${query}`)
            .then(response => response.json())
            .then(data => {
                dropdown.innerHTML = '';

                if(data.length > 0) {
                    data.forEach(item => {
                        const div = document.createElement('div');
                        div.classList.add('dropdown-item');
                        div.innerHTML = `
                            <img src="/images/${item.image}" alt="${item.name}">
                            <div>
                                <strong>${item.name}</strong><br>
                                <small>${item.category}</small>
                            </div>
                        `;

                        div.addEventListener('click', () => {
                            // Fill input
                            searchInput.value = item.name;
                            dropdown.style.display = 'none';

                            // Remove highlight from all product cards
                            document.querySelectorAll('.product-card').forEach(card => {
                                card.classList.remove('highlighted');
                            });

                            // Highlight all matching product cards
                            document.querySelectorAll('.product-card').forEach(card => {
                                const name = card.querySelector('h3').textContent.trim();
                                const category = card.querySelector('small')?.textContent.trim();
                                if(name === item.name || category === item.category) {
                                    card.classList.add('highlighted');
                                    card.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                }
                            });
                        });

                        dropdown.appendChild(div);
                    });
                } else {
                    dropdown.innerHTML = '<div class="no-result">No results found</div>';
                }

                dropdown.style.display = 'block';
            })
            .catch(err => console.error(err));
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!dropdown.contains(e.target) && e.target !== searchInput) {
            dropdown.style.display = 'none';
        }
    });
});




</script>

@endsection
