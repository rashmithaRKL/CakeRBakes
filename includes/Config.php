<?php
class Config {
    // Database configuration
    const DB_HOST = 'localhost';
    const DB_NAME = 'cakerbakes_db';
    const DB_USER = 'root';
    const DB_PASS = '';

    // Application settings
    const SITE_NAME = 'CakesRBakes';
    const SITE_URL = 'http://localhost:8000/CakeRBakes';
    const ADMIN_EMAIL = 'admin@cakerbakes.com';
    
    // File upload settings
    const UPLOAD_PATH = 'uploads/';
    const ALLOWED_IMAGE_TYPES = ['image/jpeg', 'image/png', 'image/gif'];
    const MAX_FILE_SIZE = 5242880; // 5MB in bytes

    // Pagination settings
    const ITEMS_PER_PAGE = 12;
    const ORDERS_PER_PAGE = 10;

    // Shopping cart settings
    const MIN_ORDER_AMOUNT = 500;
    const SHIPPING_COST = 200;
    const TAX_RATE = 0.10; // 10%

    // Session settings
    const SESSION_LIFETIME = 7200; // 2 hours in seconds

    // Security settings
    const PASSWORD_MIN_LENGTH = 8;
    const LOGIN_MAX_ATTEMPTS = 5;
    const LOGIN_LOCKOUT_TIME = 900; // 15 minutes in seconds

    // Error reporting
    public static function initErrorReporting() {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        ini_set('log_errors', 1);
        ini_set('error_log', __DIR__ . '/../logs/error.log');
    }

    // URL helpers
    public static function getBaseUrl() {
        return self::SITE_URL;
    }

    public static function getAssetsUrl() {
        return self::SITE_URL . '/assets';
    }

    public static function getUploadsUrl() {
        return self::SITE_URL . '/' . self::UPLOAD_PATH;
    }

    // File upload helpers
    public static function validateImageUpload($file) {
        $errors = [];

        if (!isset($file['error']) || is_array($file['error'])) {
            $errors[] = 'Invalid file parameters.';
            return $errors;
        }

        switch ($file['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                $errors[] = 'File size exceeds limit.';
                break;
            case UPLOAD_ERR_NO_FILE:
                $errors[] = 'No file uploaded.';
                break;
            default:
                $errors[] = 'Unknown upload error.';
                break;
        }

        if ($file['size'] > self::MAX_FILE_SIZE) {
            $errors[] = 'File size exceeds limit of ' . (self::MAX_FILE_SIZE / 1024 / 1024) . 'MB.';
        }

        if (!in_array($file['type'], self::ALLOWED_IMAGE_TYPES)) {
            $errors[] = 'Invalid file type. Allowed types: JPG, PNG, GIF.';
        }

        return $errors;
    }

    public static function uploadImage($file, $customName = null) {
        $uploadDir = __DIR__ . '/../' . self::UPLOAD_PATH;
        
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileInfo = pathinfo($file['name']);
        $fileName = $customName ? $customName . '.' . $fileInfo['extension'] : 
                   uniqid() . '_' . time() . '.' . $fileInfo['extension'];
        
        $destination = $uploadDir . $fileName;

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return self::UPLOAD_PATH . $fileName;
        }

        return false;
    }

    // Format helpers
    public static function formatPrice($price) {
        return 'Rs. ' . number_format($price, 2);
    }

    public static function formatDate($date) {
        return date('F j, Y', strtotime($date));
    }

    public static function formatDateTime($datetime) {
        return date('F j, Y g:i A', strtotime($datetime));
    }

    // Validation helpers
    public static function sanitizeInput($data) {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = self::sanitizeInput($value);
            }
        } else {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
        }
        return $data;
    }

    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function validatePhone($phone) {
        return preg_match('/^[0-9]{10}$/', $phone);
    }

    // Order status helpers
    public static function getOrderStatuses() {
        return [
            'pending' => 'Pending',
            'processing' => 'Processing',
            'completed' => 'Completed',
            'cancelled' => 'Cancelled'
        ];
    }

    // Payment methods
    public static function getPaymentMethods() {
        return [
            'cash' => 'Cash on Delivery',
            'card' => 'Credit/Debit Card',
            'bank' => 'Bank Transfer'
        ];
    }

    // Calculate order totals
    public static function calculateOrderTotal($subtotal) {
        $tax = $subtotal * self::TAX_RATE;
        $total = $subtotal + $tax + self::SHIPPING_COST;
        return [
            'subtotal' => $subtotal,
            'tax' => $tax,
            'shipping' => self::SHIPPING_COST,
            'total' => $total
        ];
    }
}

// Initialize error reporting
Config::initErrorReporting();
?>
