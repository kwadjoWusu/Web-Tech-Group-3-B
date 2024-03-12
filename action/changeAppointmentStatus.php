<?php

include '../settings/connection.php';

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appointmentId = $_POST['appointmentId'];
    $status = $_POST['s_id'];

    // SQL to update the status of an appointment
    $sql = "UPDATE appointment SET status =? WHERE appointment_id=?";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $appointmentId);
    
    // Execute and check if successful
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method, appointmentId or status not provided.']);
}
?>
