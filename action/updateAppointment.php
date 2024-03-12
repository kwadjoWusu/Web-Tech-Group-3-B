<?php
// Assuming you have a database connection set up
include '../settings/connection.php';

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appointmentId = $_POST['appointmentId'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $reason = $_POST['reason'];

    // SQL to update an appointment
    $sql = "UPDATE appointment SET appointment_date=?, appointment_time=?, problemDescription=? WHERE appointment_id=?";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $date, $time, $reason, $appointmentId);
    
    // Execute and check if successful
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}
?>
