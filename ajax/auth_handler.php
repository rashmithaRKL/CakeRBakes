<?php
require_once '../includes/init.php';

// Set JSON response header
header('Content-Type: application/json');

// Validate CSRF token for all POST requests
if (isPost() && !validateCSRFToken(getPostData('csrf_token'))) {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid security token'
    ]);
    exit;
}

$action = getPostData('action');

switch ($action) {
    case 'login':
        $username = getPostData('username');
        $password = getPostData('password');
        $remember = getPostData('remember') === 'true';

        if (empty($username) || empty($password)) {
            echo json_encode([
                'success' => false,
                'message' => 'Username and password are required'
            ]);
            exit;
        }

        if ($auth->login($username, $password)) {
            // Set remember me cookie if requested
            if ($remember) {
                $token = bin2hex(random_bytes(32));
                setcookie('remember_token', $token, time() + (86400 * 30), '/'); // 30 days
                
                // Store token in session for validation
                Session::set('remember_token', $token);
            }

            echo json_encode([
                'success' => true,
                'message' => 'Login successful',
                'redirect' => 'index.php',
                'user' => [
                    'username' => Session::getUsername(),
                    'cartCount' => getCartCount()
                ]
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Invalid username or password'
            ]);
        }
        break;

    case 'register':
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
                echo json_encode([
                    'success' => true,
                    'message' => 'Registration successful',
                    'redirect' => 'login.php'
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Registration failed. Please try again.'
                ]);
            }
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $errors
            ]);
        }
        break;

    case 'logout':
        $auth->logout();
        echo json_encode([
            'success' => true,
            'message' => 'Logout successful',
            'redirect' => 'index.php'
        ]);
        break;

    case 'check_session':
        echo json_encode([
            'success' => true,
            'loggedIn' => isLoggedIn(),
            'user' => isLoggedIn() ? [
                'username' => Session::getUsername(),
                'cartCount' => getCartCount()
            ] : null
        ]);
        break;

    case 'update_profile':
        if (!isLoggedIn()) {
            echo json_encode([
                'success' => false,
                'message' => 'Please login to continue',
                'redirect' => 'login.php'
            ]);
            exit;
        }

        $userData = [
            'full_name' => getPostData('full_name'),
            'phone' => getPostData('phone'),
            'address' => getPostData('address')
        ];

        if ($auth->updateProfile($userData)) {
            echo json_encode([
                'success' => true,
                'message' => 'Profile updated successfully'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Failed to update profile'
            ]);
        }
        break;

    case 'check_username':
        $username = getPostData('username');
        $user = new User($db);
        $user->username = $username;
        
        echo json_encode([
            'success' => true,
            'exists' => $user->usernameExists()
        ]);
        break;

    case 'check_email':
        $email = getPostData('email');
        $user = new User($db);
        $user->email = $email;
        
        echo json_encode([
            'success' => true,
            'exists' => $user->emailExists()
        ]);
        break;

    default:
        echo json_encode([
            'success' => false,
            'message' => 'Invalid action'
        ]);
}
?>
