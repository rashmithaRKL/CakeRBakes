<?php
require_once 'includes/init.php';

// Redirect if already logged in
if (isLoggedIn()) {
    redirect('index.php');
}

if (isPost()) {
    if (!validateCSRFToken(getPostData('csrf_token'))) {
        redirect('login.php');
    }

    $username = getPostData('username');
    $password = getPostData('password');

    if (empty($username) || empty($password)) {
        Session::setFlash('error', 'Please fill in all fields');
    } else {
        if ($auth->login($username, $password)) {
            // Redirect based on user type
            if ($auth->isAdmin()) {
                redirect('admin/dashboard.php');
            } else {
                redirect('index.php');
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - <?php echo Config::SITE_NAME; ?></title>
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
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-header img {
            max-width: 150px;
            margin-bottom: 20px;
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
        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php require "header.php"; ?>

    <div class="container">
        <div class="login-container">
            <div class="login-header">
                <img src="images/logo.jpg" alt="<?php echo Config::SITE_NAME; ?>" class="img-fluid">
                <h2>Login</h2>
            </div>

            <?php echo displayFlashMessages(); ?>

            <form method="POST" action="login.php">
                <?php echo csrfField(); ?>
                
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required 
                           value="<?php echo getPostData('username'); ?>">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>

                <div class="text-center mt-3">
                    <p>Don't have an account? <a href="register.php">Register here</a></p>
                    <p><a href="forgot-password.php">Forgot your password?</a></p>
                </div>
            </form>
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
