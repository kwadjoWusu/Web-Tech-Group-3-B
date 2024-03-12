<?php

include '../settings/connection.php';

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['appointmentId'])) {
    $appointmentId = $_POST['appointmentId'];

    // SQL to delete an appointment
    $sql = "DELETE FROM appointment WHERE appointment_id=?";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $appointmentId);
    
    // Execute and check if successful
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method or appointmentId not provided.']);
}
?>
