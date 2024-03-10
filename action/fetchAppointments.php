<?php
require_once('../settings/connection.php');

// Prepare an SQL query to fetch all appointments
$query = "SELECT * FROM appointment ORDER BY appointment_date DESC, appointment_time DESC";
$result = $conn->query($query);

// Initialize an array to store the fetched appointments
$appointments = [];

// Check if the query returned any results
if ($result->num_rows > 0) {
    // Fetch all appointments
    while($row = $result->fetch_assoc()) {
        $appointments[] = $row;
    }
} else {
    echo "No appointments found.";
}

$conn->close();
?>
