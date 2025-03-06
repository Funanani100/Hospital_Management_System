<?php
// db_config.php
$servername  = "localhost";
$dbUsername  = "root";   
$dbPassword  = "";           
$dbName      = "lifecare";   

// Create connection to the MySQL server (without selecting a database)
$conn = new mysqli($servername, $dbUsername, $dbPassword);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
