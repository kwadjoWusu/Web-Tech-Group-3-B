<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
header('Content-Type: application/json');
include '../settings/connection.php'; // Adjust this path as necessary



$sql = "SELECT appointment_date, appointment_id, problemDescription FROM appointment";
$result = $conn->query($sql);

$appointments = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $appointments[] = [
            'date' => $row['appointment_date'],
            'title' => $row['problemDescription'],
            'a_id' => $row['appointment_id'] 
           
        ];
    }
    
    header('/home');
}

echo json_encode($appointments);
$conn->close();
?>
