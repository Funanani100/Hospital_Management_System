<?php
session_start();
include('db_config.php');  // Contains your DB connection info
$dbName = "lifecare";
$conn->select_db($dbName);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize inputs
    $username = $conn->real_escape_string(trim($_POST['username']));
    $password = $conn->real_escape_string(trim($_POST['password']));
    
    if (empty($username) || empty($password)) {
        die("Username and Password are required.");
    }
    
    // Retrieve the doctor's record from the database
    $sql = "SELECT * FROM doctors WHERE username = '$username'";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // Verify the password using PHP’s password_verify function
        if (password_verify($password, $row['password'])) {
            // Successful login: set session variables
            $_SESSION['doctor_id']       = $row['id'];
            $_SESSION['doctor_username'] = $username;
            
            // Redirect to the doctor dashboard page
            header("Location: doctorDashboard.php");
            exit();
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Invalid username or password.";
    }
}

$conn->close();
?>
