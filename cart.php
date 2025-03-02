<?php
require_once 'includes/init.php';

// Require login
requireLogin();

$cart = new Cart($db);
$cartItems = $cart->getUserCart(Session::getUserId());
$cartTotal = $cart->getCartTotal(Session::getUserId());

// Handle quantity updates
if (isPost() && isset($_POST['update_cart'])) {
    if (!validateCSRFToken(getPostData('csrf_token'))) {
        redirect('cart.php');
    }

    $quantities = getPostData('quantity');
    foreach ($quantities as $productId => $quantity) {
        if ($quantity > 0) {
            // Check stock before updating
            if ($cart->checkStock($productId, $quantity)) {
                $cart->updateQuantity(Session::getUserId(), $productId, $quantity);
            } else {
                Session::setFlash('error', 'Some items are out of stock');
            }
        }
    }
    redirect('cart.php');
}

// Handle item removal
if (isGet() && isset($_GET['remove'])) {
    $productId = getQueryData('remove');
    if ($cart->removeItem(Session::getUserId(), $productId)) {
        Session::setFlash('success', 'Item removed from cart');
    }
    redirect('cart.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart - <?php echo Config::SITE_NAME; ?></title>
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
        .cart-container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .product-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }
        .quantity-input {
            width: 70px;
            text-align: center;
        }
        .cart-summary {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
        .btn-primary {
            background-color: #FEA4D4;
            border-color: #FEA4D4;
        }
        .btn-primary:hover {
            background-color: #FF6699;
            border-color: #FF6699;
        }
        .btn-outline-danger {
            color: #FF6699;
            border-color: #FF6699;
        }
        .btn-outline-danger:hover {
            background-color: #FF6699;
            border-color: #FF6699;
        }
    </style>
</head>

<body>
    <?php require "header.php"; ?>

    <div class="container">
        <div class="cart-container">
            <h2 class="mb-4">Shopping Cart</h2>

            <?php echo displayFlashMessages(); ?>

            <?php if (empty($cartItems)): ?>
                <div class="text-center py-5">
                    <h4>Your cart is empty</h4>
                    <p>Add some delicious items to your cart!</p>
                    <a href="cakes.php" class="btn btn-primary mt-3">Browse Products</a>
                </div>
            <?php else: ?>
                <form method="POST" action="cart.php">
                    <?php echo csrfField(); ?>
                    
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cartItems as $item): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?php echo $item['image_url']; ?>" 
                                                     alt="<?php echo htmlspecialchars($item['name']); ?>" 
                                                     class="product-image me-3">
                                                <div>
                                                    <h5 class="mb-0"><?php echo htmlspecialchars($item['name']); ?></h5>
                                                    <?php if ($item['quantity'] > $item['stock']): ?>
                                                        <small class="text-danger">Only <?php echo $item['stock']; ?> available</small>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo formatPrice($item['price']); ?></td>
                                        <td>
                                            <input type="number" name="quantity[<?php echo $item['product_id']; ?>]" 
                                                   value="<?php echo $item['quantity']; ?>" min="1" 
                                                   max="<?php echo $item['stock']; ?>" 
                                                   class="form-control quantity-input">
                                        </td>
                                        <td><?php echo formatPrice($item['price'] * $item['quantity']); ?></td>
                                        <td>
                                            <a href="cart.php?remove=<?php echo $item['product_id']; ?>" 
                                               class="btn btn-outline-danger btn-sm"
                                               onclick="return confirm('Are you sure you want to remove this item?')">
                                                Remove
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="cart-summary">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" name="update_cart" class="btn btn-outline-primary">
                                    Update Cart
                                </button>
                            </div>
                            <div class="col-md-6">
                                <?php
                                $totals = Config::calculateOrderTotal($cartTotal);
                                ?>
                                <table class="table table-borderless">
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

                                <a href="checkout.php" class="btn btn-primary w-100 mt-3">
                                    Proceed to Checkout
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
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
