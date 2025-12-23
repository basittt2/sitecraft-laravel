console.log("SiteCraft loaded!");

// ===== SIMPLE LOCAL STORAGE CART HANDLER (SHARED ACROSS PAGES) =====
document.addEventListener('DOMContentLoaded', () => {
    function getCart() {
        return JSON.parse(localStorage.getItem('cart')) || [];
    }

    function saveCart(cart) {
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    function addToCart(item) {
        const cart = getCart();
        const existing = cart.find(i => i.name === item.name);
        if (existing) {
            existing.quantity += 1;
        } else {
            cart.push({ ...item, quantity: 1 });
        }
        saveCart(cart);

        // Let header/cart counter update
        document.dispatchEvent(new Event('cartUpdated'));
    }

    // Attach handler for product cards on catalog page
    document.querySelectorAll('.btn-add-cart').forEach(btn => {
        btn.addEventListener('click', () => {
            const name = btn.dataset.name;
            const price = parseFloat(btn.dataset.price);
            const image = btn.dataset.image;

            addToCart({ name, price, image });
        });
    });

    // Attach handler for single product view
    const singleAddBtn = document.querySelector('.add-btn');
    if (singleAddBtn) {
        singleAddBtn.addEventListener('click', () => {
            const container = document.querySelector('.product-details');
            const name = container?.querySelector('.product-title')?.textContent?.trim() || 'Product';
            const priceText = container?.querySelector('.product-price')?.textContent || '';
            const price = parseFloat(priceText.replace(/[^\d]/g, '')) || 0;
            const imgEl = document.querySelector('.product-image img');
            const image = imgEl ? imgEl.src : '';

            addToCart({ name, price, image });
        });
    }
});