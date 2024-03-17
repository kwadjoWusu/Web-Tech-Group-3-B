<?php
include '../settings/connection.php';

function getAllYears() {
    global $conn;

    // SELECT all years query
    $query = "SELECT DISTINCT YEAR(appointment_date) AS appointment_year FROM appointment";
    $result = mysqli_query($conn, $query);

    // Check if execution worked
    if (!$result) {
        die("Error executing query: " . mysqli_error($conn));
    }

    // Fetch and return years
    $years = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $years[] = $row['appointment_year'];
    }
    return $years;
}

function getDashAllAppointments($userId) {
    global $conn;

    $years = getAllYears(); // Retrieve all years

    $appointments = [];
    foreach ($years as $year) {
        // Query to retrieve appointments for the current year
        $query = "SELECT * FROM appointment WHERE YEAR(appointment_date) = $year AND UserID = $userId";
        $result = mysqli_query($conn, $query);

        // Check if execution worked
        if (!$result) {
            die("Error executing query: " . mysqli_error($conn));
        }

        // Fetch records for the current year and add them to appointments array
        while ($row = mysqli_fetch_assoc($result)) {
            $appointments[$year][] = $row;
        }
    }

    return $appointments;
}

?>

