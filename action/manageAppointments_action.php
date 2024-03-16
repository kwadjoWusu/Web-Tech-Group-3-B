<?php

session_start();

require_once('../settings/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you already have $user_id from somewhere (e.g., session, form)
    $user_id = $_SESSION['user_id'];

    $problemDescription = $_POST['problemDescription'] ?? '';
    $setTime = $_POST['setTime'] ?? '';
    $setDate = $_POST['setDate'] ?? '';
    $status = 1;
    
    // Prevent bookings in the past
    $currentDateTime = new DateTime();
    $appointmentDateTime = new DateTime($setDate . ' ' . $setTime); 

    if ($appointmentDateTime < $currentDateTime) {
        echo "Bookings cannot be made in the past.";
        error_log("Attempted to make a booking in the past.");
        header("Location: ../g_view/manageAppointments.php");
        exit();
    }

    //  HH:MM:SS 
    $startTime = date('H:i:s', strtotime('-30 minutes', strtotime($setTime)));
    $endTime = date('H:i:s', strtotime('+30 minutes', strtotime($setTime)));

    
    $sql9 = "SELECT appointment_id FROM appointment WHERE appointment_date = ? AND (appointment_time BETWEEN ? AND ?)";

    $appointmentCheckQuery = $conn->prepare($sql9);
    $appointmentCheckQuery->bind_param("sss", $setDate, $startTime, $endTime);
    $appointmentCheckQuery->execute();

    $conflictResult = $appointmentCheckQuery->get_result();
    if ($conflictResult->num_rows > 0) {
        echo "An appointment already exists within 30 minutes of this time slot.";
        error_log("An appointment already exists within 30 minutes of this time slot.");
        header("Location: ../g_view/manageAppointments.php");
        exit();
    }
    




    // $patientInsertQuery = $conn->prepare("INSERT INTO patient (user_id) VALUES (?)");
    // $patientInsertQuery->bind_param("i", $user_id);
    // $patientInsertResult = $patientInsertQuery->execute();

    
    // Get the ID of the inserted patient record
    $patient_id = $conn->insert_id;

    echo $user_id;

    // Step 2: Insert into appointment table using the new patient_id
    $appointmentInsertQuery = $conn->prepare("INSERT INTO appointment (UserID, appointment_date, appointment_time, problemDescription, status) VALUES (?, ?, ?, ?,?)");
    $appointmentInsertQuery->bind_param("isssi", $user_id, $setDate, $setTime, $problemDescription, $status);
    $appointmentInsertResult = $appointmentInsertQuery->execute();

    if ($appointmentInsertResult) {
        echo 'Appointment booked successfully.';
        header("Location: ../g_view/manageAppointments.php?status=success");
    } else {
        echo 'Failed to book appointment.';
    }
    

    $conn->close();
}
?>
