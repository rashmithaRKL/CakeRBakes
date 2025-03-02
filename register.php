<?php
require_once 'includes/init.php';

// Redirect if already logged in
if (isLoggedIn()) {
    redirect('index.php');
}

if (isPost()) {
    if (!validateCSRFToken(getPostData('csrf_token'))) {
        redirect('register.php');
    }

    $userData = [
        'username' => getPostData('username'),
        'email' => getPostData('email'),
        'password' => getPostData('password'),
        'confirm_password' => getPostData('confirm_password'),
        'full_name' => getPostData('full_name'),
        'phone' => getPostData('phone'),
        'address' => getPostData('address')
    ];

    $errors = [];

    // Validate input
    if (empty($userData['username'])) {
        $errors[] = 'Username is required';
    }

    if (empty($userData['email'])) {
        $errors[] = 'Email is required';
    } elseif (!Config::validateEmail($userData['email'])) {
        $errors[] = 'Invalid email format';
    }

    if (empty($userData['password'])) {
        $errors[] = 'Password is required';
    } elseif (strlen($userData['password']) < Config::PASSWORD_MIN_LENGTH) {
        $errors[] = 'Password must be at least ' . Config::PASSWORD_MIN_LENGTH . ' characters';
    }

    if ($userData['password'] !== $userData['confirm_password']) {
        $errors[] = 'Passwords do not match';
    }

    if (!empty($userData['phone']) && !Config::validatePhone($userData['phone'])) {
        $errors[] = 'Invalid phone number format';
    }

    if (empty($errors)) {
        if ($auth->register($userData)) {
            redirect('login.php');
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
    <title>Register - <?php echo Config::SITE_NAME; ?></title>
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
        .register-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .register-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .register-header img {
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
        <div class="register-container">
            <div class="register-header">
                <img src="images/logo.jpg" alt="<?php echo Config::SITE_NAME; ?>" class="img-fluid">
                <h2>Create Account</h2>
            </div>

            <?php echo displayFlashMessages(); ?>

            <form method="POST" action="register.php">
                <?php echo csrfField(); ?>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="username" class="form-label">Username*</label>
                        <input type="text" class="form-control" id="username" name="username" required 
                               value="<?php echo getPostData('username'); ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email*</label>
                        <input type="email" class="form-control" id="email" name="email" required 
                               value="<?php echo getPostData('email'); ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Password*</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <small class="text-muted">Minimum <?php echo Config::PASSWORD_MIN_LENGTH; ?> characters</small>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password*</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" 
                           value="<?php echo getPostData('full_name'); ?>">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" 
                           value="<?php echo getPostData('phone'); ?>">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3"><?php echo getPostData('address'); ?></textarea>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                    <label class="form-check-label" for="terms">
                        I agree to the <a href="terms.php">Terms & Conditions</a>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Register</button>

                <div class="text-center mt-3">
                    <p>Already have an account? <a href="login.php">Login here</a></p>
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
