@extends('layouts.app')

@section('content')
<section class="checkout-hero" style="background-image: url('{{ asset('images/checkout-bg.jpg') }}');">
  <div class="hero-content">
      <h1>Checkout</h1>
      <p>Review your order and complete your purchase.</p>
  </div>
</section>

<section class="checkout-section">
    <div class="checkout-container">
        <!-- Order Summary -->
        <div class="order-summary">
            <h2>Your Order</h2>
            <table id="checkoutTable">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

            <div class="summary-totals">
                <p><strong>Subtotal:</strong> PKR <span id="subtotal">0</span></p>
                <p><strong>Shipping:</strong> Free</p>
                <h3><strong>Grand Total:</strong> PKR <span id="grandTotal">0</span></h3>
            </div>
        </div>

        <!-- Checkout Form -->
        <div class="checkout-form">
            <h2>Billing Details</h2>
            <form id="checkoutForm">
                <label>Full Name</label>
                <input type="text" id="name" required>

                <label>Email</label>
                <input type="email" id="email" required>

                <label>Address</label>
                <textarea id="address" rows="3" required></textarea>

                <label>Payment Method</label>
                <select id="paymentMethod" required>
                    <option value="cod">Cash on Delivery</option>
                    <option value="card">Credit/Debit Card</option>
                </select>

                <button type="submit" class="btn-primary">Place Order</button>
            </form>
        </div>
    </div>
</section>

<style>
.checkout-hero {
    background-size: cover;
    background-position: center;
    padding: 60px 0;
    text-align: center;
    color: white;
}
.checkout-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 30px;
    padding: 50px 10%;
}
.order-summary, .checkout-form {
    flex: 1;
    min-width: 320px;
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}
.order-summary table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 15px;
}
.order-summary th, .order-summary td {
    padding: 12px;
    border-bottom: 1px solid #e5e7eb;
    text-align: center;
    vertical-align: middle;
}
.product-info {
    display: flex;
    align-items: center;
    gap: 12px;
    text-align: left;
}
.product-info img {
    width: 55px;
    height: 55px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #e5e7eb;
}
.summary-totals {
    text-align: right;
    font-size: 16px;
}
.checkout-form label {
    display: block;
    margin-top: 10px;
    font-weight: 600;
}
.checkout-form input, 
.checkout-form textarea,
.checkout-form select {
    width: 100%;
    padding: 10px;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    margin-top: 5px;
}
.btn-primary {
    margin-top: 20px;
    background-color: #2563eb;
    color: white;
    border: none;
    border-radius: 6px;
    padding: 10px 20px;
    cursor: pointer;
    font-weight: 600;
    transition: background 0.3s;
}
.btn-primary:hover {
    background-color: #1e40af;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const tableBody = document.querySelector('#checkoutTable tbody');
    const subtotalEl = document.getElementById('subtotal');
    const grandTotalEl = document.getElementById('grandTotal');
    const checkoutForm = document.getElementById('checkoutForm');

    // Load cart from localStorage
    const cart = JSON.parse(localStorage.getItem('cart')) || [];

    if (cart.length === 0) {
        tableBody.innerHTML = '<tr><td colspan="4">Your cart is empty.</td></tr>';
        document.querySelector('.checkout-form').style.display = 'none';
        return;
    }

    let subtotal = 0;
    cart.forEach(item => {
        const total = item.price * item.quantity;
        subtotal += total;

        const imageUrl = item.image.startsWith('http') 
            ? item.image 
            : `${window.location.origin}/${item.image.replace(/^\/+/, '')}`;

        const row = `
            <tr>
                <td class="product-info">
                    <img src="${imageUrl}" alt="${item.name}">
                    <span>${item.name}</span>
                </td>
                <td>${item.quantity}</td>
                <td>PKR ${item.price.toLocaleString()}</td>
                <td>PKR ${total.toLocaleString()}</td>
            </tr>`;
        tableBody.insertAdjacentHTML('beforeend', row);
    });

    subtotalEl.textContent = subtotal.toLocaleString();
    grandTotalEl.textContent = subtotal.toLocaleString();

    // Handle form submission
    checkoutForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const address = document.getElementById('address').value.trim();
        const payment = document.getElementById('paymentMethod').value;

        // Optionally save order data (for Thank You page)
        const orderData = {
            name,
            email,
            address,
            payment,
            total: subtotal,
        };
        localStorage.setItem('orderData', JSON.stringify(orderData));

        // Clear cart and redirect
        localStorage.removeItem('cart');
        window.location.href = "{{ url('/thankyou') }}";
    });
});
</script>
@endsection
