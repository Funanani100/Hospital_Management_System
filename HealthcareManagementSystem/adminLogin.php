<?php
session_start();

// Hardcoded default admin credentials
$default_admin_username = "admin";
$default_admin_password = "adminpass"; // Consider hashing for production

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and trim input values
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check if provided credentials match the default credentials
    if ($username === $default_admin_username && $password === $default_admin_password) {
        // Credentials are valid - set session variables
        $_SESSION['admin_username'] = $username;
        $_SESSION['admin_id'] = 1; // You can assign any identifier

        // Redirect to admin dashboard (admin.html)
        header("Location: admin.html");
        exit();
    } else {
        echo "Invalid admin credentials.";
    }
} else {
    echo "Invalid request.";
}
?>
