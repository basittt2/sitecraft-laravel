@extends('layouts.app')

@section('content')
<section class="hero" style="background-image: url('{{ asset('images/cart-hero-bg.jpg') }}');">
  <div class="hero-content">
      <h1>Your <span>Shopping Cart</span></h1>
      <p>Review your selected items before checkout.</p>
  </div>
</section>

<style>
/* ===== CART PAGE THEME ===== */
.cart-section {
  padding: 60px 10%;
  background: #fafafa;
}

.cart-container h2 {
  font-size: 2rem;
  margin-bottom: 30px;
  color: #222;
  text-align: center;
}

.cart-table {
  width: 100%;
  border-collapse: collapse;
  background: #fff;
  box-shadow: 0 2px 10px rgba(0,0,0,0.05);
  border-radius: 10px;
  overflow: hidden;
}

.cart-table th {
  background: #111827;
  color: #fff;
  padding: 15px;
  text-align: left;
  font-weight: 500;
}

.cart-table td {
  padding: 15px;
  border-bottom: 1px solid #eee;
  vertical-align: middle;
}

.cart-product {
  display: flex;
  align-items: center;
  gap: 15px;
}

.cart-product img {
  width: 60px;
  height: 60px;
  border-radius: 10px;
  object-fit: cover;
}

.qty-input {
  width: 60px;
  text-align: center;
  padding: 5px;
  border: 1px solid #ddd;
  border-radius: 6px;
}

.btn-remove {
  background: none;
  border: none;
  color: #ef4444;
  cursor: pointer;
  font-weight: 500;
  transition: 0.2s;
}

.btn-remove:hover {
  color: #b91c1c;
}

.cart-summary {
  margin-top: 40px;
  background: #fff;
  padding: 25px;
  border-radius: 12px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.05);
  max-width: 400px;
  margin-left: auto;
}

.cart-summary h3 {
  margin-bottom: 15px;
}

.cart-summary p {
  font-size: 1rem;
  margin: 8px 0;
}

.empty-cart {
  text-align: center;
  padding: 60px 0;
}

.empty-cart img {
  width: 150px;
  opacity: 0.8;
}

.empty-cart h3 {
  margin-top: 20px;
  font-size: 1.6rem;
}

.btn-primary {
  background: #2563eb;
  color: white;
  padding: 12px 25px;
  border-radius: 8px;
  text-decoration: none;
  font-weight: 600;
  transition: 0.3s;
  display: inline-block;
}

.btn-primary:hover {
  background: #1e40af;
}

.features {
  margin-top: 80px;
  padding: 40px 10%;
  display: flex;
  justify-content: space-between;
  gap: 20px;
  background: #fff;
}

.feature {
  text-align: center;
  flex: 1;
}

.feature img {
  width: 60px;
  margin-bottom: 10px;
}

.feature h3 {
  margin: 10px 0;
  font-size: 1.1rem;
  color: #111827;
}

.feature p {
  font-size: 0.9rem;
  color: #555;
}
</style>

<section class="cart-section">
    <div class="cart-container">
        <h2>Your Items</h2>

        <table class="cart-table" id="cartTable" style="display:none;">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="cartBody"></tbody>
        </table>

        <div class="empty-cart" id="emptyCart">
            <img src="{{ asset('images/empty-cart.png') }}" alt="Empty Cart">
            <h3>Your cart is empty!</h3>
            <p>Looks like you haven’t added anything yet.</p>
            <a href="{{ url('/products') }}" class="btn-primary">Shop Now</a>
        </div>

        <div class="cart-summary" id="cartSummary" style="display:none;">
            <h3>Cart Summary</h3>
            <p><strong>Subtotal:</strong> PKR <span id="subtotalValue">0</span></p>
            <p><strong>Shipping:</strong> Free</p>
            <p><strong>Total:</strong> PKR <span id="totalValue">0</span></p>
            <a href="{{ url('/checkout') }}" class="btn-primary">Proceed to Checkout</a>
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
        <p>Your transactions are safe and encrypted with top-tier security standards.</p>
    </div>
    <div class="feature">
        <img src="{{ asset('images/support.png') }}" alt="Customer Support">
        <h3>24/7 Support</h3>
        <p>We’re always here to help with your orders and product queries.</p>
    </div>
</section>

<script>
// ===== LOCAL STORAGE CART LOGIC =====

document.addEventListener('DOMContentLoaded', () => {
    const cartBody = document.getElementById('cartBody');
    const cartTable = document.getElementById('cartTable');
    const emptyCart = document.getElementById('emptyCart');
    const cartSummary = document.getElementById('cartSummary');
    const subtotalEl = document.getElementById('subtotalValue');
    const totalEl = document.getElementById('totalValue');

    function getCart() {
        return JSON.parse(localStorage.getItem('cart')) || [];
    }

    function saveCart(cart) {
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    function renderCart() {
        const cart = getCart();
        cartBody.innerHTML = '';

        if (cart.length === 0) {
            cartTable.style.display = 'none';
            cartSummary.style.display = 'none';
            emptyCart.style.display = 'block';
            return;
        }

        cartTable.style.display = 'table';
        cartSummary.style.display = 'block';
        emptyCart.style.display = 'none';

        let subtotal = 0;

        cart.forEach((item, index) => {
            const total = item.price * item.quantity;
            subtotal += total;

            const row = document.createElement('tr');
            row.innerHTML = `
                <td class="cart-product">
                    <img src="${item.image}" alt="${item.name}">
                    <span>${item.name}</span>
                </td>
                <td>PKR ${item.price.toLocaleString()}</td>
                <td>
                    <input type="number" min="1" value="${item.quantity}" class="qty-input" data-index="${index}">
                </td>
                <td>PKR ${(total).toLocaleString()}</td>
                <td><button class="btn-remove" data-index="${index}">Remove</button></td>
            `;
            cartBody.appendChild(row);
        });

        subtotalEl.textContent = subtotal.toLocaleString();
        totalEl.textContent = subtotal.toLocaleString();

        attachEvents();
    }

    function attachEvents() {
        // Quantity change
        document.querySelectorAll('.qty-input').forEach(input => {
            input.addEventListener('change', e => {
                const index = e.target.dataset.index;
                const cart = getCart();
                cart[index].quantity = parseInt(e.target.value) || 1;
                saveCart(cart);
                document.dispatchEvent(new Event('cartUpdated'));

                renderCart();
            });
        });

        // Remove item
        document.querySelectorAll('.btn-remove').forEach(btn => {
            btn.addEventListener('click', e => {
                const index = e.target.dataset.index;
                const cart = getCart();
                cart.splice(index, 1);
                saveCart(cart);
                
                renderCart();
            });
        });
    }

    renderCart();
});
</script>
@endsection
