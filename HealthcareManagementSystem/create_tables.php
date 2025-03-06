<?php
// create_tables.php
include('db_config.php');

// Create the database if it does not exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbName";
if ($conn->query($sql) === TRUE) {
    echo "Database '$dbName' created or already exists.<br>";
} else {
    die("Error creating database: " . $conn->error);
}

// Close the initial connection and reconnect using the new database
$conn->close();
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Patients Table (for registration)
$sql = "CREATE TABLE IF NOT EXISTS patients (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    gender ENUM('male', 'female') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'patients' created or already exists.<br>";
} else {
    echo "Error creating 'patients' table: " . $conn->error . "<br>";
}

// Create Doctors Table (for login)
$sql = "CREATE TABLE IF NOT EXISTS doctors (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'doctors' created or already exists.<br>";
} else {
    echo "Error creating 'doctors' table: " . $conn->error . "<br>";
}

// Create Receptionists Table (for login)
$sql = "CREATE TABLE IF NOT EXISTS receptionists (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'receptionists' created or already exists.<br>";
} else {
    echo "Error creating 'receptionists' table: " . $conn->error . "<br>";
}

$conn->close();
?>
