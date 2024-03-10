<?php
include '../settings/connection.php';

function getAllappointment() {
    global $conn;

    // SELECT all chores query
    $sql = "SELECT * FROM appointment";

    // Execute the query
    $result = $conn->query($sql);

    // Check if execution worked
    if (!$result) {
        die("Error executing query: " . $conn->error);
    }

    // Check if any record was returned
    if ($result->num_rows > 0) {
        // Fetch records
        $appointments = array();
        while ($row = $result->fetch_assoc()) {
            $appointments[] = $row;
        }

        return $appointments;
    } else {
        return null;
    }
}
?>

