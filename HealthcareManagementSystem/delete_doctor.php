<?php
// delete_doctor.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('db_config.php');
    $dbName = "lifecare";
    $conn->select_db($dbName);

    // Sanitize input
    $email = $conn->real_escape_string(trim($_POST["email"]));

    if (empty($email)) {
        die("Email ID is required.");
    }

    // Check if a doctor with the given email exists
    $checkSql = "SELECT id FROM doctors WHERE email = '$email'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows == 0) {
        echo "No doctor found with this Email ID.";
    } else {
        // Delete the doctor
        $deleteSql = "DELETE FROM doctors WHERE email = '$email'";
        if ($conn->query($deleteSql) === TRUE) {
            echo "Doctor with email $email has been deleted successfully.";
        } else {
            echo "Error deleting doctor: " . $conn->error;
        }
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
