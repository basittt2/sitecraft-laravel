<header>
    <div class="header-container">
        <!-- Logo -->
        <a href="/" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="SiteCraft Logo">
        </a>

        <!-- Nav Links -->
        <nav class="nav-center">
            <ul class="nav-links">
                <li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ url('/products') }}" class="{{ Request::is('products') ? 'active' : '' }}">Products</a></li>
                <li><a href="{{ url('/contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}">Contact</a></li>
                <li>
                    <a href="{{ url('/cart') }}" class="cart-link">
                        🛒 Cart <span id="cart-count">0</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Auth Buttons -->
        <div class="auth-links">
            <a href="{{ route('login') }}" class="{{ Request::is('login') ? 'active' : '' }}">Login</a>
            <a href="{{ route('register') }}" class="{{ Request::is('register') ? 'active' : '' }}">Sign Up</a>
        </div>
    </div>
</header>


<script>
document.addEventListener('DOMContentLoaded', () => {
    const cartCount = document.getElementById('cart-count');

    // ====== INITIAL LOAD ======
    function getCart() {
        return JSON.parse(localStorage.getItem('cart')) || [];
    }

    function updateCartCount() {
        const cart = getCart();
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        cartCount.textContent = totalItems;
    }

    updateCartCount(); // update on page load

    // ====== LISTEN FOR ADD TO CART EVENTS ======
    // Works globally across all pages
    document.addEventListener('cartUpdated', updateCartCount);

    // ====== OPTIONAL: trigger this manually in other scripts when adding to cart ======
    // const event = new Event('cartUpdated');
    // document.dispatchEvent(event);
});
</script>
