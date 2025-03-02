<?php
require_once '../includes/init.php';

// Set JSON response header
header('Content-Type: application/json');

// Check if user is logged in
if (!isLoggedIn()) {
    echo json_encode([
        'success' => false,
        'message' => 'Please login to continue',
        'redirect' => 'login.php'
    ]);
    exit;
}

// Validate CSRF token
if (!validateCSRFToken(getPostData('csrf_token'))) {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid security token'
    ]);
    exit;
}

$action = getPostData('action');
$cart = new Cart($db);

switch ($action) {
    case 'add':
        $product_id = getPostData('product_id');
        $quantity = getPostData('quantity') ?? 1;

        if (!$product_id) {
            echo json_encode([
                'success' => false,
                'message' => 'Product ID is required'
            ]);
            exit;
        }

        // Check product stock
        if (!$cart->checkStock($product_id, $quantity)) {
            echo json_encode([
                'success' => false,
                'message' => 'Insufficient stock'
            ]);
            exit;
        }

        $cart->user_id = Session::getUserId();
        $cart->product_id = $product_id;
        $cart->quantity = $quantity;

        if ($cart->addItem()) {
            echo json_encode([
                'success' => true,
                'message' => 'Product added to cart',
                'cartCount' => $cart->getCartCount(Session::getUserId()),
                'cartTotal' => formatPrice($cart->getCartTotal(Session::getUserId()))
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Failed to add product to cart'
            ]);
        }
        break;

    case 'update':
        $product_id = getPostData('product_id');
        $quantity = getPostData('quantity');

        if (!$product_id || !$quantity) {
            echo json_encode([
                'success' => false,
                'message' => 'Product ID and quantity are required'
            ]);
            exit;
        }

        // Check stock
        if (!$cart->checkStock($product_id, $quantity)) {
            echo json_encode([
                'success' => false,
                'message' => 'Insufficient stock'
            ]);
            exit;
        }

        if ($cart->updateQuantity(Session::getUserId(), $product_id, $quantity)) {
            echo json_encode([
                'success' => true,
                'message' => 'Cart updated',
                'cartCount' => $cart->getCartCount(Session::getUserId()),
                'cartTotal' => formatPrice($cart->getCartTotal(Session::getUserId())),
                'itemTotal' => formatPrice($quantity * getProductPrice($product_id))
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Failed to update cart'
            ]);
        }
        break;

    case 'remove':
        $product_id = getPostData('product_id');

        if (!$product_id) {
            echo json_encode([
                'success' => false,
                'message' => 'Product ID is required'
            ]);
            exit;
        }

        if ($cart->removeItem(Session::getUserId(), $product_id)) {
            echo json_encode([
                'success' => true,
                'message' => 'Item removed from cart',
                'cartCount' => $cart->getCartCount(Session::getUserId()),
                'cartTotal' => formatPrice($cart->getCartTotal(Session::getUserId()))
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Failed to remove item from cart'
            ]);
        }
        break;

    case 'clear':
        if ($cart->clearCart(Session::getUserId())) {
            echo json_encode([
                'success' => true,
                'message' => 'Cart cleared',
                'cartCount' => 0,
                'cartTotal' => formatPrice(0)
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Failed to clear cart'
            ]);
        }
        break;

    case 'get_cart':
        $cartItems = $cart->getUserCart(Session::getUserId());
        $cartTotal = $cart->getCartTotal(Session::getUserId());
        $totals = Config::calculateOrderTotal($cartTotal);

        echo json_encode([
            'success' => true,
            'items' => $cartItems,
            'count' => count($cartItems),
            'subtotal' => formatPrice($totals['subtotal']),
            'shipping' => formatPrice($totals['shipping']),
            'tax' => formatPrice($totals['tax']),
            'total' => formatPrice($totals['total'])
        ]);
        break;

    default:
        echo json_encode([
            'success' => false,
            'message' => 'Invalid action'
        ]);
}

// Helper function to get product price
function getProductPrice($product_id) {
    global $db;
    $product = new Product($db);
    $productDetails = $product->getById($product_id);
    return $productDetails ? $productDetails['price'] : 0;
}
?>
