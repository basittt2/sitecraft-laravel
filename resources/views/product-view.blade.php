@extends('layouts.app')

@section('content')
<section class="product-view">

    <div class="product-container">

        <!-- Left: Product Image -->
        <div class="product-image">
            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
        </div>

        <!-- Right: Product Details -->
        <div class="product-details">
            <h1 class="product-title">{{ $product->name }}</h1>

            <p class="product-category">
                Category: <span>{{ $product->category }}</span>
            </p>

            <p class="product-price">
                PKR {{ number_format($product->price) }}
            </p>

            <p class="product-description">
                {{ $product->description }}
            </p>

            <button class="add-btn">Add to Cart</button>
        </div>
    </div>

</section>

<style>
.product-view {
    padding: 60px 20px;
    display: flex;
    justify-content: center;
}

.product-container {
    width: 90%;
    max-width: 1100px;
    display: flex;
    gap: 40px;
    align-items: flex-start;
    justify-content: center;
    flex-wrap: wrap;
}

.product-image img {
    width: 380px;
    height: auto;
    border-radius: 14px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.15);
}

.product-details {
    max-width: 500px;
}

.product-title {
    font-size: 2rem;
    margin-bottom: 10px;
}

.product-category span {
    color: #e76f51;
    font-weight: bold;
}

.product-price {
    font-size: 1.6rem;
    margin: 15px 0;
    font-weight: bold;
    color: #2a9d8f;
}

.product-description {
    margin-bottom: 25px;
    line-height: 1.6;
}

.add-btn {
    background: #1d3557;
    color: white;
    padding: 12px 24px;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    cursor: pointer;
    transition: 0.3s;
}

.add-btn:hover {
    background: #457b9d;
}
</style>


@endsection
