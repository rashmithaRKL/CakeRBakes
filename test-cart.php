<?php
require_once 'includes/init.php';

// Require login
requireLogin();

// Get all products
$product = new Product($db);
$products = $product->getAll()->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Test Cart - <?php echo Config::SITE_NAME; ?></title>
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
        .test-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .product-card {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .product-card:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }
        .product-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <?php require "header.php"; ?>

    <div class="container">
        <div class="test-container">
            <h2 class="mb-4">Test Cart Functionality</h2>

            <?php echo displayFlashMessages(); ?>

            <div class="row">
                <?php foreach ($products as $product): ?>
                    <div class="col-md-6">
                        <div class="product-card">
                            <div class="d-flex align-items-center">
                                <img src="<?php echo $product['image_url']; ?>" 
                                     alt="<?php echo htmlspecialchars($product['name']); ?>" 
                                     class="product-image me-3">
                                <div>
                                    <h5><?php echo htmlspecialchars($product['name']); ?></h5>
                                    <p class="mb-2"><?php echo formatPrice($product['price']); ?></p>
                                    <p class="mb-2">Stock: <?php echo $product['stock']; ?></p>
                                    
                                    <div class="d-flex align-items-center">
                                        <input type="number" 
                                               class="form-control cart-quantity-input me-2" 
                                               value="1" 
                                               min="1" 
                                               max="<?php echo $product['stock']; ?>" 
                                               style="width: 70px;">
                                        <button class="btn btn-primary btn-add-to-cart" 
                                                data-product-id="<?php echo $product['id']; ?>">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="text-center mt-4">
                <a href="cart.php" class="btn btn-primary">View Cart</a>
            </div>
        </div>
    </div>

    <?php require "footer.php"; ?>

    <!-- Scripts -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/cart.js"></script>

    <script>
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    </script>
</body>
</html>
