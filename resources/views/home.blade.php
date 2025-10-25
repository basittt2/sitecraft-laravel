@extends('layouts.app')

@section('content')
<section class="hero" style="background-image: url('{{ asset('images/hero-bg.jpg') }}');">
  <div class="hero-content">
      <h1>Welcome to <span>SiteCraft</span></h1>
      <p>Your one-stop digital and creative store for products & services.</p>
      <a href="{{ url('/products') }}" class="btn-primary">Explore Catalog</a>
  </div>
</section>


<section class="features">
    <div class="feature">
        <img src="{{ asset('images/fast-delivery.png') }}" alt="Fast Delivery">
        <h3>Fast Delivery</h3>
        <p>Get your products delivered at lightning speed, anywhere in the country.</p>
    </div>
    <div class="feature">
        <img src="{{ asset('images/secure-payment.png') }}" alt="Secure Payment">
        <h3>Secure Payments</h3>
        <p>All your transactions are safe and encrypted with top-tier security standards.</p>
    </div>
    <div class="feature">
        <img src="{{ asset('images/support.png') }}" alt="Customer Support">
        <h3>24/7 Support</h3>
        <p>We’re here for you round the clock to help with orders and product queries.</p>
    </div>
</section>

<section class="featured-products">
    <h2>Featured Products</h2>
    <div class="product-grid">
        <div class="product-card">
            <img src="{{ asset('images/headphones.jpg') }}" alt="Headphones">
            <h3>Wireless Headphones</h3>
            <p>PKR 14,000</p>
        </div>
        <div class="product-card">
            <img src="{{ asset('images/speaker.jpg') }}" alt="Speaker">
            <h3>Smart Speaker</h3>
            <p>PKR 22,500</p>
        </div>
        <div class="product-card">
            <img src="{{ asset('images/mouse.jpg') }}" alt="Mouse">
            <p>PKR 7,000</p>
            <h3>Ergonomic Mouse</h3>
        </div>
    </div>
</section>
@endsection
