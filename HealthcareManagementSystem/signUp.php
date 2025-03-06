<?php
// signUp.php
include('db_config.php');

// Select the database
$dbName = "lifecare";
$conn->select_db($dbName);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and retrieve form data
    $first_name       = $conn->real_escape_string(trim($_POST['first_name']));
    $last_name        = $conn->real_escape_string(trim($_POST['last_name']));
    $email            = $conn->real_escape_string(trim($_POST['email']));
    $phone            = $conn->real_escape_string(trim($_POST['phone']));
    $password         = $conn->real_escape_string(trim($_POST['password']));
    $confirm_password = $conn->real_escape_string(trim($_POST['confirm_password']));
    $gender           = $conn->real_escape_string(trim($_POST['gender']));
    
    // Ensure all fields are filled
    if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($password) || empty($confirm_password) || empty($gender)) {
        die("All fields are required.");
    }
    
    // Verify that the passwords match
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }
    
    // Hash the password securely
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert the new patient into the patients table
    $sql = "INSERT INTO patients (first_name, last_name, email, phone, password, gender)
            VALUES ('$first_name', '$last_name', '$email', '$phone', '$hashed_password', '$gender')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        // You might want to redirect the user instead:
        // header("Location: patients-panel-login.html");
    } else {
        // Example error handling for duplicate emails
        if ($conn->errno == 1062) {
            echo "An account with this email already exists.";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$conn->close();
?>
