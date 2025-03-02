<?php
require_once 'includes/init.php';

// Check if user is logged in
if (isLoggedIn()) {
    // Perform logout
    $auth->logout();
}

// Redirect to home page
redirect('index.php');
?>
