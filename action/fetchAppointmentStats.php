<?php
// Assuming '../../settings/conection.php' connects to your database
require_once('../../settings/conection.php');

$stats = [
    'totalAppointments' => 0,
    'cancelledAppointments' => 0,
    'completedAppointments' => 0,
];

$result = $conn->query("SELECT COUNT(*) AS total FROM appointment");
if ($row = $result->fetch_assoc()) {
    $stats['totalAppointments'] = $row['total'];
}

$result = $conn->query("SELECT COUNT(*) AS cancelled FROM appointment WHERE status='Cancelled'");
if ($row = $result->fetch_assoc()) {
    $stats['cancelledAppointments'] = $row['cancelled'];
}

$result = $conn->query("SELECT COUNT(*) AS completed FROM appointment WHERE status='Completed'");
if ($row = $result->fetch_assoc()) {
    $stats['completedAppointments'] = $row['completed'];
}

$conn->close();

echo json_encode($stats);
?>
