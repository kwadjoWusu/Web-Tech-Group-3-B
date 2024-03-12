<?php
require_once('../settings/connection.php');

if(isset($_GET['appointment_id'])) {
    $appointment_id = $_GET['appointment_id'];
    
    $query = $conn->prepare("SELECT * FROM appointment WHERE appointment_id = ?");
    $query->bind_param("i", $appointment_id);
    $query->execute();
    $result = $query->get_result();
    if($row = $result->fetch_assoc()) {
        echo json_encode($row); 
    } else {
        echo json_encode(['error' => 'Appointment not found.']);
    }
    $conn->close();
} else {
    echo json_encode(['error' => 'No appointment ID provided.']);
}
?>
