@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-b from-slate-900 to-slate-800 text-white">
    <div class="max-w-7xl mx-auto px-6 py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

            <!-- TEXT -->
            <div>
                <h1 class="text-4xl font-bold mb-4">
                    Welcome to SiteCraft
                </h1>
                <p class="text-gray-300 mb-6">
                    Your one-stop digital and creative store for products & services.
                </p>

                <a href="{{ route('products.index') }}"
                   class="inline-block bg-indigo-600 hover:bg-indigo-700 px-6 py-3 rounded-md font-semibold">
                    Explore Catalog
                </a>
            </div>

            <!-- IMAGE -->
            <div class="flex justify-center">
                <img src="{{ asset('images/delivery.png') }}"
                     class="max-w-sm w-full"
                     alt="Fast Delivery">
            </div>

        </div>
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
            <h3>Wireless Mouse</h3>
        </div>
    </div>
</section>
@endsection
