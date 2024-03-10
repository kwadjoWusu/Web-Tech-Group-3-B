<?php
require_once('../settings/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Assuming you already have $user_id from somewhere (e.g., session, form)
    $user_id = 3; // Example, ensure you have this value

    $problemDescription = $_POST['problemDescription'] ?? '';
    $setTime = $_POST['setTime'] ?? '';
    $setDate = $_POST['setDate'] ?? '';
    
    // Step 1: Insert into patient table
    $patientInsertQuery = $conn->prepare("INSERT INTO patient (user_id) VALUES (?)");
    $patientInsertQuery->bind_param("i", $user_id);
    $patientInsertResult = $patientInsertQuery->execute();

    if ($patientInsertResult) {
        // Get the ID of the inserted patient record
        $patient_id = $conn->insert_id;

        // Step 2: Insert into appointment table using the new patient_id
        $appointmentInsertQuery = $conn->prepare("INSERT INTO appointment (patient_id, appointment_date, appointment_time, problemDescription) VALUES (?, ?, ?, ?)");
        $appointmentInsertQuery->bind_param("isss", $patient_id, $setDate, $setTime, $problemDescription);
        $appointmentInsertResult = $appointmentInsertQuery->execute();

        if ($appointmentInsertResult) {
            echo 'Appointment booked successfully.';
            header("Location: ../g_view/manageAppointments.php?status=success");
        } else {
            echo 'Failed to book appointment.';
        }
    } else {
        echo 'Failed to insert patient.';
    }

    $conn->close();
}
?>
