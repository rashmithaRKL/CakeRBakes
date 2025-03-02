// Add to cart functionality
function addToCart(productId, quantity = 1) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    
    fetch('add-to-cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `product_id=${productId}&quantity=${quantity}&csrf_token=${csrfToken}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update cart count in header
            const cartCountElement = document.querySelector('.cart-count');
            if (cartCountElement) {
                cartCountElement.textContent = data.cartCount;
            }

            // Update cart total if it exists
            const cartTotalElement = document.querySelector('.cart-total');
            if (cartTotalElement) {
                cartTotalElement.textContent = data.cartTotal;
            }

            // Show success message
            showNotification('success', data.message);
        } else {
            // Show error message
            showNotification('error', data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('error', 'An error occurred. Please try again.');
    });
}

// Update cart quantity
function updateCartQuantity(input) {
    const form = input.closest('form');
    if (form) {
        form.submit();
    }
}

// Remove item from cart
function removeCartItem(productId) {
    if (confirm('Are you sure you want to remove this item?')) {
        window.location.href = `cart.php?remove=${productId}`;
    }
}

// Show notification
function showNotification(type, message) {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type} notification`;
    notification.innerHTML = message;
    
    document.body.appendChild(notification);

    // Position the notification
    notification.style.position = 'fixed';
    notification.style.top = '20px';
    notification.style.right = '20px';
    notification.style.zIndex = '9999';
    notification.style.minWidth = '200px';
    notification.style.padding = '15px';
    notification.style.borderRadius = '5px';
    notification.style.animation = 'fadeIn 0.5s';
    notification.style.backgroundColor = type === 'success' ? '#FEA4D4' : '#dc3545';
    notification.style.color = '#fff';
    notification.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.1)';

    // Remove notification after 3 seconds
    setTimeout(() => {
        notification.style.animation = 'fadeOut 0.5s';
        setTimeout(() => {
            notification.remove();
        }, 500);
    }, 3000);
}

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeOut {
        from { opacity: 1; transform: translateY(0); }
        to { opacity: 0; transform: translateY(-20px); }
    }

    .cart-quantity-input {
        width: 70px;
        text-align: center;
        padding: 5px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .cart-quantity-input:focus {
        border-color: #FEA4D4;
        outline: none;
        box-shadow: 0 0 0 0.2rem rgba(254, 164, 212, 0.25);
    }

    .btn-add-to-cart {
        background-color: #FEA4D4;
        border-color: #FEA4D4;
        color: white;
        transition: all 0.3s ease;
    }

    .btn-add-to-cart:hover {
        background-color: #FF6699;
        border-color: #FF6699;
        transform: translateY(-2px);
    }

    .btn-add-to-cart:active {
        transform: translateY(0);
    }

    .cart-item {
        transition: all 0.3s ease;
    }

    .cart-item:hover {
        background-color: #f8f9fa;
    }

    .cart-total {
        font-weight: bold;
        color: #FF6699;
    }
`;

document.head.appendChild(style);

// Initialize quantity inputs
document.addEventListener('DOMContentLoaded', function() {
    // Add event listeners to quantity inputs
    const quantityInputs = document.querySelectorAll('.cart-quantity-input');
    quantityInputs.forEach(input => {
        input.addEventListener('change', function() {
            updateCartQuantity(this);
        });
    });

    // Add event listeners to add-to-cart buttons
    const addToCartButtons = document.querySelectorAll('.btn-add-to-cart');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const productId = this.dataset.productId;
            const quantity = this.closest('form')?.querySelector('.cart-quantity-input')?.value || 1;
            addToCart(productId, quantity);
        });
    });
});
