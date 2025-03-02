<?php
require_once 'includes/init.php';

// Require login
requireLogin();

// Get order ID from URL
$orderId = getQueryData('id');
if (!$orderId) {
    Session::setFlash('error', 'Invalid order ID');
    redirect('profile.php');
}

// Get order details
$order = new Order($db);
$orderDetails = $order->getById($orderId);

// Check if order exists and belongs to current user
if (!$orderDetails || $orderDetails['user_id'] != Session::getUserId()) {
    Session::setFlash('error', 'Order not found');
    redirect('profile.php');
}

// Get order items
$orderItems = $order->getOrderItems($orderId);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Details - <?php echo Config::SITE_NAME; ?></title>
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
        .order-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .order-header {
            border-bottom: 1px solid #eee;
            margin-bottom: 20px;
            padding-bottom: 20px;
        }
        .order-status {
            font-size: 1.1em;
            padding: 5px 15px;
            border-radius: 20px;
        }
        .product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
        }
        .order-summary {
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
    </style>
</head>

<body>
    <?php require "header.php"; ?>

    <div class="container">
        <div class="order-container">
            <div class="order-header">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2>Order #<?php echo $orderDetails['id']; ?></h2>
                        <p class="text-muted mb-0">
                            Placed on <?php echo formatDateTime($orderDetails['created_at']); ?>
                        </p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <span class="order-status badge bg-<?php 
                            echo $orderDetails['status'] === 'completed' ? 'success' : 
                                ($orderDetails['status'] === 'cancelled' ? 'danger' : 'warning'); 
                        ?>">
                            <?php echo ucfirst($orderDetails['status']); ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="order-items">
                <h4 class="mb-3">Order Items</h4>
                <?php foreach ($orderItems as $item): ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="<?php echo $item['image_url']; ?>" 
                                         alt="<?php echo htmlspecialchars($item['name']); ?>" 
                                         class="product-image">
                                </div>
                                <div class="col-md-4">
                                    <h5 class="card-title mb-0"><?php echo htmlspecialchars($item['name']); ?></h5>
                                </div>
                                <div class="col-md-2 text-center">
                                    <span class="text-muted">Quantity:</span>
                                    <br>
                                    <?php echo $item['quantity']; ?>
                                </div>
                                <div class="col-md-2 text-center">
                                    <span class="text-muted">Price:</span>
                                    <br>
                                    <?php echo formatPrice($item['price']); ?>
                                </div>
                                <div class="col-md-2 text-end">
                                    <span class="text-muted">Total:</span>
                                    <br>
                                    <?php echo formatPrice($item['price'] * $item['quantity']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="order-summary">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Shipping Address</h4>
                        <p><?php echo nl2br(htmlspecialchars($orderDetails['shipping_address'])); ?></p>
                        
                        <h4 class="mt-4">Payment Method</h4>
                        <p><?php echo ucfirst($orderDetails['payment_method']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <h4>Order Summary</h4>
                        <?php
                        $totals = Config::calculateOrderTotal($orderDetails['total_amount']);
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
                                <td>Tax:</td>
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

            <div class="text-center mt-4">
                <a href="profile.php" class="btn btn-primary">Back to Profile</a>
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
