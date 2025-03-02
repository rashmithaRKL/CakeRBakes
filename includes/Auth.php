<?php
require_once 'Session.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../config/database.php';

class Auth {
    private static $instance = null;
    private $db;
    private $user;

    private function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function login($username, $password) {
        $result = $this->user->login($username, $password);
        
        if ($result) {
            Session::setUser($result);
            Session::setFlash('success', 'Welcome back, ' . $username . '!');
            return true;
        }
        
        Session::setFlash('error', 'Invalid username or password');
        return false;
    }

    public function register($userData) {
        $this->user->username = $userData['username'];
        $this->user->email = $userData['email'];
        $this->user->password = $userData['password'];
        $this->user->full_name = $userData['full_name'] ?? '';
        $this->user->phone = $userData['phone'] ?? '';
        $this->user->address = $userData['address'] ?? '';

        // Validate username
        if ($this->user->usernameExists()) {
            Session::setFlash('error', 'Username already exists');
            return false;
        }

        // Validate email
        if ($this->user->emailExists()) {
            Session::setFlash('error', 'Email already exists');
            return false;
        }

        // Create user
        if ($this->user->create()) {
            Session::setFlash('success', 'Registration successful! Please login.');
            return true;
        }

        Session::setFlash('error', 'Registration failed. Please try again.');
        return false;
    }

    public function logout() {
        Session::destroy();
        Session::start();
        Session::setFlash('success', 'You have been logged out successfully');
    }

    public function isLoggedIn() {
        return Session::isLoggedIn();
    }

    public function getCurrentUser() {
        if (!$this->isLoggedIn()) {
            return null;
        }

        $userId = Session::getUserId();
        return $this->user->getById($userId);
    }

    public function updateProfile($userData) {
        if (!$this->isLoggedIn()) {
            return false;
        }

        $this->user->id = Session::getUserId();
        $this->user->full_name = $userData['full_name'];
        $this->user->phone = $userData['phone'];
        $this->user->address = $userData['address'];

        if ($this->user->update()) {
            Session::setFlash('success', 'Profile updated successfully');
            return true;
        }

        Session::setFlash('error', 'Failed to update profile');
        return false;
    }

    public function requireLogin() {
        if (!$this->isLoggedIn()) {
            Session::setFlash('error', 'Please login to access this page');
            header('Location: login.php');
            exit();
        }
    }

    public function validatePassword($password) {
        // Password must be at least 8 characters long and contain:
        // - At least one uppercase letter
        // - At least one lowercase letter
        // - At least one number
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
        return preg_match($pattern, $password);
    }

    public function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function generateResetToken() {
        return bin2hex(random_bytes(32));
    }

    public function hashPassword($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function isAdmin() {
        $user = $this->getCurrentUser();
        // You might want to add an 'is_admin' column to your users table
        // For now, we'll just check if the user ID is 1 (first user)
        return $user && $user['id'] == 1;
    }

    public function requireAdmin() {
        if (!$this->isAdmin()) {
            Session::setFlash('error', 'Access denied. Admin privileges required.');
            header('Location: index.php');
            exit();
        }
    }
}
?>
