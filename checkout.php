<?php
require_once 'includes/init.php';

// Require login
requireLogin();

$cart = new Cart($db);
$cartItems = $cart->getUserCart(Session::getUserId());
$cartTotal = $cart->getCartTotal(Session::getUserId());

// Redirect if cart is empty
if (empty($cartItems)) {
    Session::setFlash('error', 'Your cart is empty');
    redirect('cart.php');
}

// Get user details for pre-filling the form
$user = getCurrentUser();

if (isPost()) {
    if (!validateCSRFToken(getPostData('csrf_token'))) {
        redirect('checkout.php');
    }

    $shipping_address = getPostData('shipping_address');
    $payment_method = getPostData('payment_method');

    $errors = [];

    // Validate input
    if (empty($shipping_address)) {
        $errors[] = 'Shipping address is required';
    }

    if (empty($payment_method)) {
        $errors[] = 'Payment method is required';
    }

    // Check minimum order amount
    if ($cartTotal < Config::MIN_ORDER_AMOUNT) {
        $errors[] = 'Minimum order amount is ' . formatPrice(Config::MIN_ORDER_AMOUNT);
    }

    // Check stock availability
    foreach ($cartItems as $item) {
        if ($item['quantity'] > $item['stock']) {
            $errors[] = "'{$item['name']}' has insufficient stock. Available: {$item['stock']}";
        }
    }

    if (empty($errors)) {
        // Calculate totals
        $totals = Config::calculateOrderTotal($cartTotal);

        // Create order
        $order = new Order($db);
        $order->user_id = Session::getUserId();
        $order->total_amount = $totals['total'];
        $order->status = 'pending';
        $order->shipping_address = $shipping_address;
        $order->payment_method = $payment_method;

        // Start transaction
        $db->beginTransaction();

        try {
            if ($order->create()) {
                // Add order items
                $orderItems = [];
                foreach ($cartItems as $item) {
                    $orderItems[] = [
                        'product_id' => $item['product_id'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price']
                    ];
                }

                if ($order->addOrderItems($orderItems)) {
                    // Clear cart
                    $cart->clearCart(Session::getUserId());

                    // Commit transaction
                    $db->commit();

                    Session::setFlash('success', 'Order placed successfully!');
                    redirect('order-details.php?id=' . $order->id);
                } else {
                    throw new Exception('Failed to add order items');
                }
            } else {
                throw new Exception('Failed to create order');
            }
        } catch (Exception $e) {
            // Rollback transaction on error
            $db->rollback();
            Session::setFlash('error', 'Failed to place order. Please try again.');
        }
    } else {
        foreach ($errors as $error) {
            Session::setFlash('error', $error);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout - <?php echo Config::SITE_NAME; ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
    <link href="css/animations.css" rel="stylesheet" />

    <style>
        .checkout-container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .order-summary {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
        }
        .product-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }
        .form-control:focus {
            border-color: #FEA4D4;
            box-shadow: 0 0 0 0.2rem rgba(254, 164, 212, 0.25);
        }
        .btn-primary {
            background-color: #FEA4D4;
            border-color: #FEA4D4;
        }
        .btn-primary:hover {
            background-color: #FF6699;
            border-color: #FF6699;
        }
    </style>
</head>

<body>
    <?php require "header.php"; ?>

    <div class="container">
        <div class="checkout-container">
            <h2 class="mb-4">Checkout</h2>

            <?php echo displayFlashMessages(); ?>

            <div class="row">
                <div class="col-md-8">
                    <form method="POST" action="checkout.php">
                        <?php echo csrfField(); ?>

                        <div class="mb-4">
                            <h4>Shipping Address</h4>
                            <textarea class="form-control" name="shipping_address" rows="3" required><?php 
                                echo htmlspecialchars($user['address']); 
                            ?></textarea>
                        </div>

                        <div class="mb-4">
                            <h4>Payment Method</h4>
                            <?php foreach (Config::getPaymentMethods() as $key => $value): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" 
                                           id="payment_<?php echo $key; ?>" value="<?php echo $key; ?>" required>
                                    <label class="form-check-label" for="payment_<?php echo $key; ?>">
                                        <?php echo $value; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <button type="submit" class="btn btn-primary">Place Order</button>
                        <a href="cart.php" class="btn btn-outline-secondary">Back to Cart</a>
                    </form>
                </div>

                <div class="col-md-4">
                    <div class="order-summary">
                        <h4>Order Summary</h4>
                        
                        <?php foreach ($cartItems as $item): ?>
                            <div class="d-flex align-items-center mb-3">
                                <img src="<?php echo $item['image_url']; ?>" 
                                     alt="<?php echo htmlspecialchars($item['name']); ?>" 
                                     class="product-image me-3">
                                <div>
                                    <h6 class="mb-0"><?php echo htmlspecialchars($item['name']); ?></h6>
                                    <small class="text-muted">
                                        <?php echo $item['quantity']; ?> × <?php echo formatPrice($item['price']); ?>
                                    </small>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <hr>

                        <?php $totals = Config::calculateOrderTotal($cartTotal); ?>
                        <table class="table table-borderless mb-0">
                            <tr>
                                <td>Subtotal:</td>
                                <td class="text-end"><?php echo formatPrice($totals['subtotal']); ?></td>
                            </tr>
                            <tr>
                                <td>Shipping:</td>
                                <td class="text-end"><?php echo formatPrice($totals['shipping']); ?></td>
                            </tr>
                            <tr>
                                <td>Tax (<?php echo Config::TAX_RATE * 100; ?>%):</td>
                                <td class="text-end"><?php echo formatPrice($totals['tax']); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Total:</strong></td>
                                <td class="text-end"><strong><?php echo formatPrice($totals['total']); ?></strong></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require "footer.php"; ?>

    <!-- Scripts -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
