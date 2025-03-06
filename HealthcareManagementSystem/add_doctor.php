<?php
// add_doctor.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('db_config.php');  // Contains connection settings
    $dbName = "lifecare";
    $conn->select_db($dbName);

    // Retrieve and sanitize form inputs
    $doctorName      = $conn->real_escape_string(trim($_POST["doctorName"]));
    $specialization  = $conn->real_escape_string(trim($_POST["specialization"]));
    $email           = $conn->real_escape_string(trim($_POST["email"]));
    $password        = $conn->real_escape_string(trim($_POST["password"]));
    $confirmPassword = $conn->real_escape_string(trim($_POST["confirmPassword"]));
    $consultancyFees = $conn->real_escape_string(trim($_POST["consultancyFees"]));

    // Validate required fields
    if (empty($doctorName) || empty($specialization) || empty($email) || empty($password) || empty($confirmPassword) || empty($consultancyFees)) {
        die("All fields are required.");
    }

    if ($password !== $confirmPassword) {
        die("Passwords do not match.");
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new doctor into the doctors table.
    $sql = "INSERT INTO doctors (doctorName, specialization, email, password, consultancyFees) 
            VALUES ('$doctorName', '$specialization', '$email', '$hashed_password', '$consultancyFees')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Doctor added successfully.";
    } else {
        if ($conn->errno == 1062) {
            echo "A doctor with this email already exists.";
        } else {
            echo "Error: " . $conn->error;
        }
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
