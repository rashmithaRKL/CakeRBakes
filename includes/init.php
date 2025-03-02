<?php
// Start session
session_start();

// Set error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define root path
define('ROOT_PATH', dirname(__DIR__));

// Load required files
require_once ROOT_PATH . '/includes/Config.php';
require_once ROOT_PATH . '/includes/Session.php';
require_once ROOT_PATH . '/includes/Auth.php';
require_once ROOT_PATH . '/config/database.php';
require_once ROOT_PATH . '/models/User.php';
require_once ROOT_PATH . '/models/Product.php';
require_once ROOT_PATH . '/models/Order.php';
require_once ROOT_PATH . '/models/Cart.php';

// Initialize database connection
$database = new Database();
$db = $database->getConnection();

// Initialize authentication
$auth = Auth::getInstance();

// Set timezone
date_default_timezone_set('Asia/Colombo');

// Helper functions
function redirect($path) {
    header("Location: " . Config::SITE_URL . "/" . $path);
    exit();
}

function isPost() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function isGet() {
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

function getPostData($key = null) {
    if ($key === null) {
        return Config::sanitizeInput($_POST);
    }
    return isset($_POST[$key]) ? Config::sanitizeInput($_POST[$key]) : null;
}

function getQueryData($key = null) {
    if ($key === null) {
        return Config::sanitizeInput($_GET);
    }
    return isset($_GET[$key]) ? Config::sanitizeInput($_GET[$key]) : null;
}

function getCurrentPage() {
    return basename($_SERVER['PHP_SELF']);
}

function isActivePage($page) {
    return getCurrentPage() === $page;
}

function getFlashMessage($key) {
    return Session::getFlash($key);
}

function hasFlashMessage($key) {
    return Session::hasFlash($key);
}

function displayFlashMessages() {
    $types = ['success', 'error', 'info', 'warning'];
    $output = '';
    
    foreach ($types as $type) {
        if (hasFlashMessage($type)) {
            $message = getFlashMessage($type);
            $output .= "<div class='alert alert-{$type}'>{$message}</div>";
        }
    }
    
    return $output;
}

function formatPrice($price) {
    return Config::formatPrice($price);
}

function formatDate($date) {
    return Config::formatDate($date);
}

function formatDateTime($datetime) {
    return Config::formatDateTime($datetime);
}

function isLoggedIn() {
    return Session::isLoggedIn();
}

function getCurrentUser() {
    global $auth;
    return $auth->getCurrentUser();
}

function isAdmin() {
    global $auth;
    return $auth->isAdmin();
}

function requireLogin() {
    global $auth;
    $auth->requireLogin();
}

function requireAdmin() {
    global $auth;
    $auth->requireAdmin();
}

// CSRF Protection
function generateCSRFToken() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function validateCSRFToken($token) {
    if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
        Session::setFlash('error', 'Invalid CSRF token');
        return false;
    }
    return true;
}

function csrfField() {
    return '<input type="hidden" name="csrf_token" value="' . generateCSRFToken() . '">';
}

// Cart helpers
function getCartCount() {
    if (!isLoggedIn()) {
        return 0;
    }
    global $db;
    $cart = new Cart($db);
    return $cart->getCartCount(Session::getUserId());
}

function getCartTotal() {
    if (!isLoggedIn()) {
        return 0;
    }
    global $db;
    $cart = new Cart($db);
    return $cart->getCartTotal(Session::getUserId());
}

// Set common variables for templates
$currentUser = isLoggedIn() ? getCurrentUser() : null;
$cartCount = getCartCount();
$cartTotal = getCartTotal();
?>
