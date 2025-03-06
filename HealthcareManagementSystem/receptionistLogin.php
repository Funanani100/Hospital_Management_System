<?php
// receptionistLogin.php
include('db_config.php');
$dbName = "lifecare";
$conn->select_db($dbName);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $conn->real_escape_string(trim($_POST['username']));
    $password = $conn->real_escape_string(trim($_POST['password']));
    
    if (empty($username) || empty($password)) {
        die("Username and Password are required.");
    }
    
    // Retrieve the receptionist record by username
    $sql = "SELECT * FROM receptionists WHERE username = '$username'";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $row['password'])) {
            echo "Receptionist login successful!";
            // Start session and redirect as needed
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Invalid username or password.";
    }
}

$conn->close();
?>
