<?php
include '../settings/connection.php';
// session_start();
                          



function getAllappointment() {
    global $conn;

    // SELECT all chores query
    $sql = "SELECT * FROM appointment";


    // $sql2 = "SELECT * FROM status";

    // Execute the query
    $result = $conn->query($sql);
    // $result2 = $conn->query($sql2);

    // Check if execution worked
    if (!$result ) {
        die("Error executing query: " . $conn->error);
    }

    // Check if any record was returned
    if ($result->num_rows > 0) {
        // Fetch records
        $appointments = array();
        while ($row = $result->fetch_assoc()) {
            $appointments[] = $row;
        }

        return $appointments;
    } else {
        return null;
    }
}


function getAllstatus() {
    global $conn;

    
    $sql = "SELECT * FROM status";

    // Execute the query
    $result = $conn->query($sql);
    

    // Check if execution worked
    if (!$result ) {
        die("Error executing query: " . $conn->error);
    }

    // Check if any record was returned
    if ($result->num_rows > 0) {
        // Fetch records
        $status = array();
        while ($row = $result->fetch_assoc()) {
            $status[] = $row;
        }

        return $status;
    } else {
        return null;
    }
}

// $UserID = $_SESSION['user_id'];



function getAppointmentById($UserID) {
    global $conn;
    
    $sql = "SELECT * FROM appointment where UserID = $UserID";

    // Execute the query
    $result = $conn->query($sql);
    

    // Check if execution worked
    if (!$result ) {
        die("Error executing query: " . $conn->error);
    }

    // Check if any record was returned
    if ($result->num_rows > 0) {
        // Fetch records
        $byid = array();
        while ($row = $result->fetch_assoc()) {
            $byid[] = $row;
        }

        return $byid;
    } else {
        return null;
    }
}
?>

