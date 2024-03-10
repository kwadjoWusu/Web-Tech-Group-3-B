<?php
// Including the database connection file
require_once('../settings/connection.php');

// Initialize variables to store the counts
$totalAppointments = 0;
$cancelledAppointments = 0;
$completedAppointments = 0;

// Query to count all appointments
$queryTotal = "SELECT COUNT(*) AS total FROM appointment";
$resultTotal = $conn->query($queryTotal);
if ($row = $resultTotal->fetch_assoc()) {
    $totalAppointments = $row['total'];
}

// // Query to count cancelled appointments
// $queryCancelled = "SELECT COUNT(*) AS cancelled FROM appointment WHERE status = 'Cancelled'";
// $resultCancelled = $conn->query($queryCancelled);
// if ($row = $resultCancelled->fetch_assoc()) {
//     $cancelledAppointments = $row['cancelled'];
// }

// // Query to count completed appointments
// $queryCompleted = "SELECT COUNT(*) AS completed FROM appointment WHERE status = 'Completed'";
// $resultCompleted = $conn->query($queryCompleted);
// if ($row = $resultCompleted->fetch_assoc()) {
//     $completedAppointments = $row['completed'];
// }

$conn->close();
?>
