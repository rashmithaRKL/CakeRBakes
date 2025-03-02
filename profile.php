<?php
require_once 'includes/init.php';

// Require login
requireLogin();

$user = getCurrentUser();

if (isPost()) {
    if (!validateCSRFToken(getPostData('csrf_token'))) {
        redirect('profile.php');
    }

    $userData = [
        'full_name' => getPostData('full_name'),
        'phone' => getPostData('phone'),
        'address' => getPostData('address')
    ];

    $errors = [];

    // Validate phone if provided
    if (!empty($userData['phone']) && !Config::validatePhone($userData['phone'])) {
        $errors[] = 'Invalid phone number format';
    }

    if (empty($errors)) {
        if ($auth->updateProfile($userData)) {
            Session::setFlash('success', 'Profile updated successfully');
            redirect('profile.php');
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
    <title>My Profile - <?php echo Config::SITE_NAME; ?></title>
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
        .profile-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        .profile-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 15px;
            object-fit: cover;
            border: 3px solid #FEA4D4;
        }
        .nav-tabs .nav-link.active {
            color: #FEA4D4;
            border-color: #FEA4D4;
        }
        .nav-tabs .nav-link:hover {
            border-color: #FF6699;
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
        <div class="profile-container">
            <div class="profile-header">
                <img src="images/default-avatar.jpg" alt="Profile Picture" class="img-fluid">
                <h2><?php echo htmlspecialchars($user['username']); ?></h2>
                <p class="text-muted"><?php echo htmlspecialchars($user['email']); ?></p>
            </div>

            <?php echo displayFlashMessages(); ?>

            <ul class="nav nav-tabs mb-4" id="profileTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab">Orders</a>
                </li>
            </ul>

            <div class="tab-content" id="profileTabsContent">
                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                    <form method="POST" action="profile.php">
                        <?php echo csrfField(); ?>

                        <div class="mb-3">
                            <label for="full_name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" 
                                   value="<?php echo htmlspecialchars($user['full_name']); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" 
                                   value="<?php echo htmlspecialchars($user['phone']); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3"><?php echo htmlspecialchars($user['address']); ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>

                <div class="tab-pane fade" id="orders" role="tabpanel">
                    <?php
                    $order = new Order($db);
                    $orders = $order->getUserOrders($user['id'])->fetchAll(PDO::FETCH_ASSOC);
                    
                    if (empty($orders)): ?>
                        <div class="text-center py-5">
                            <h4>No orders yet</h4>
                            <p>Start shopping to see your orders here!</p>
                            <a href="cakes.php" class="btn btn-primary">Browse Products</a>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orders as $order): ?>
                                        <tr>
                                            <td>#<?php echo $order['id']; ?></td>
                                            <td><?php echo formatDate($order['created_at']); ?></td>
                                            <td><?php echo formatPrice($order['total_amount']); ?></td>
                                            <td>
                                                <span class="badge bg-<?php echo $order['status'] === 'completed' ? 'success' : 
                                                    ($order['status'] === 'cancelled' ? 'danger' : 'warning'); ?>">
                                                    <?php echo ucfirst($order['status']); ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="order-details.php?id=<?php echo $order['id']; ?>" 
                                                   class="btn btn-sm btn-outline-primary">View Details</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
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
