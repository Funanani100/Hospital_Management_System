<?php
// patients_list.php
include('db_config.php');
$dbName = "lifecare";
$conn->select_db($dbName);

$sql = "SELECT id, first_name, last_name, email, phone, gender, created_at FROM patients ORDER BY created_at DESC";
$result = $conn->query($sql);

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Registered On</th>
      </tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $fullName = htmlspecialchars($row["first_name"] . " " . $row["last_name"]);
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $fullName . "</td>";
        echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["phone"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["gender"]) . "</td>";
        echo "<td>" . $row["created_at"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No patients found.</td></tr>";
}
echo "</table>";

$conn->close();
?>
