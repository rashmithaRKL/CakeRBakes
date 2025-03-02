<?php
require_once 'includes/init.php';

// Require login
requireLogin();

// Handle AJAX request
if (isPost()) {
    header('Content-Type: application/json');
    
    if (!validateCSRFToken(getPostData('csrf_token'))) {
        echo json_encode(['success' => false, 'message' => 'Invalid token']);
        exit;
    }

    $product_id = getPostData('product_id');
    $quantity = getPostData('quantity') ?? 1;

    if (!$product_id) {
        echo json_encode(['success' => false, 'message' => 'Product ID is required']);
        exit;
    }

    // Validate quantity
    if (!is_numeric($quantity) || $quantity < 1) {
        echo json_encode(['success' => false, 'message' => 'Invalid quantity']);
        exit;
    }

    // Check if product exists and has enough stock
    $product = new Product($db);
    $productDetails = $product->getById($product_id);

    if (!$productDetails) {
        echo json_encode(['success' => false, 'message' => 'Product not found']);
        exit;
    }

    if ($quantity > $productDetails['stock']) {
        echo json_encode([
            'success' => false, 
            'message' => 'Not enough stock. Available: ' . $productDetails['stock']
        ]);
        exit;
    }

    // Add to cart
    $cart = new Cart($db);
    $cart->user_id = Session::getUserId();
    $cart->product_id = $product_id;
    $cart->quantity = $quantity;

    if ($cart->addItem()) {
        // Get updated cart count
        $cartCount = $cart->getCartCount(Session::getUserId());
        $cartTotal = formatPrice($cart->getCartTotal(Session::getUserId()));

        echo json_encode([
            'success' => true,
            'message' => 'Product added to cart',
            'cartCount' => $cartCount,
            'cartTotal' => $cartTotal
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to add product to cart']);
    }
    exit;
}

// If not POST request, redirect to home
redirect('index.php');
?>
