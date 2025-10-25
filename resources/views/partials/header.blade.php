<header>
    <div class="header-container">
        <a href="/" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="SiteCraft Logo">
        </a>

        <nav class="nav-center">
            <ul class="nav-links">
                <li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ url('/products') }}" class="{{ Request::is('products') ? 'active' : '' }}">Products</a></li>
                <li><a href="{{ url('/contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}">Contact</a></li>
            </ul>
        </nav>

        <div class="auth-links">
            <a href="{{ route('login') }}" class="{{ Request::is('login') ? 'active' : '' }}">Login</a>
            <a href="{{ route('register') }}" class="{{ Request::is('register') ? 'active' : '' }}">Sign Up</a>
        </div>
    </div>
</header>
