@extends('layouts.app')

@section('content')
<section class="featured-products">
    <h1 class="page-title">Product Catalog</h1>
    
    <div class="product-grid">
        <div class="product-card">
            <img src="{{ asset('images/headphones.jpg') }}" alt="Wireless Headphones">
            <h3>Wireless Headphones</h3>
            <p>PKR 14,000</p>
            <a href="#" class="btn-primary">Add to Cart</a>
        </div>

        <div class="product-card">
            <img src="{{ asset('images/speaker.jpg') }}" alt="Bluetooth Speaker">
            <h3>Bluetooth Speaker</h3>
            <p>PKR 22,500</p>
            <a href="#" class="btn-primary">Add to Cart</a>
        </div>

        <div class="product-card">
            <img src="{{ asset('images/mouse.jpg') }}" alt="Ergonomic Mouse">
            <h3>Ergonomic Mouse</h3>
            <p>PKR 7,000</p>
            <a href="#" class="btn-primary">Add to Cart</a>
        </div>
    </div>
</section>
@endsection
