@extends('layouts.app')

@section('content')
<section class="hero thankyou-hero" style="background-image: url('{{ asset('images/hero-bg.jpg') }}');">
  <div class="hero-content">
      <h1>Thank You for Your Order!</h1>
      <p id="thankYouText">Your order has been placed successfully and will be processed soon.</p>
      <div class="thankyou-buttons">
          <a href="{{ url('/products') }}" class="btn-primary">Continue Shopping</a>
          <a href="{{ url('/') }}" class="btn-secondary">Back to Home</a>
      </div>
  </div>
</section>

<style>
.thankyou-hero {
    background-size: cover;
    background-position: center;
    padding: 100px 0;
    text-align: center;
    color: white;
}

.hero-content h1 {
    font-size: 2.8rem;
    margin-bottom: 15px;
}

.hero-content p {
    font-size: 1.2rem;
    margin-bottom: 30px;
    color: #e5e7eb;
}

.thankyou-buttons {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.btn-primary, .btn-secondary {
    text-decoration: none;
    padding: 12px 25px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary {
    background-color: #2563eb;
    color: white;
}

.btn-primary:hover {
    background-color: #1e40af;
}

.btn-secondary {
    background-color: transparent;
    color: white;
    border: 2px solid white;
}

.btn-secondary:hover {
    background-color: white;
    color: #2563eb;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const orderData = JSON.parse(localStorage.getItem('orderData'));
    const thankYouText = document.getElementById('thankYouText');

    if (orderData) {
        thankYouText.innerHTML = `
            Thank you, <strong>${orderData.name}</strong>!<br>
            Your order total is <strong>PKR ${orderData.total.toLocaleString()}</strong>.<br>
            We’ll deliver to <strong>${orderData.address}</strong> soon.
        `;
        localStorage.removeItem('orderData');
    }
});
</script>
@endsection
