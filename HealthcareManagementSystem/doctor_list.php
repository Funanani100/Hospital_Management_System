<?php
// doctor_list.php

// Include your database configuration file
include('db_config.php');
$dbName = "lifecare";
$conn->select_db($dbName);

// Query to fetch all doctors (adjust column names as needed)
$sql = "SELECT id, doctorName, specialization, email, consultancyFees, created_at 
        FROM doctors 
        ORDER BY created_at DESC";
$result = $conn->query($sql);

// Start the HTML table output
echo "<table border='1' cellpadding='5' cellspacing='0' style='width:100%; text-align:left;'>";
echo "<tr>
        <th>ID</th>
        <th>Doctor Name</th>
        <th>Specialization</th>
        <th>Email</th>
        <th>Consultancy Fees</th>
        <th>Added On</th>
      </tr>";

// Loop through the results and output table rows
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . htmlspecialchars($row["doctorName"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["specialization"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
        echo "<td>" . $row["consultancyFees"] . "</td>";
        echo "<td>" . $row["created_at"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No doctors found.</td></tr>";
}
echo "</table>";

$conn->close();
?>
