<?php

include '../action/get_all_appointments.php';

if(!isset($_SESSION)){
     session_start();
}

$UserID = $_SESSION['user_id'];
$roleID = $_SESSION['role_id'];

$appointments = getAllAppointment();
// $appointmentsById = getAppointmentById($UserID);
$status = getAllstatus() ;

if ($roleID != 1) {
     // echo $roleID;
     $appointments = getAppointmentById($UserID);
     // print_r($appointments);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Appointments</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../g_css/editModal.css">
</head>
<body>

<table>
    <tr>
        <th>Appointment ID</th>
        <th>Set Date</th>
        <th>Set Time</th>
        <th>Reason for Visit</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php 
    
    if(is_array($appointments)&& !empty($appointments)){
    foreach ($appointments as $appointment):
          $k =$status[$appointment["status"]-1];
          $st = $k["status_name"];
            
          
     ?>
    <tr>
        <td><?= $appointment["appointment_id"] ?></td>
        <td><?= $appointment["appointment_date"] ?></td>
        <td><?= $appointment["appointment_time"] ?></td>
        <td><?= $appointment["problemDescription"] ?></td>
        <td><?= $st ?></td>
        <td>
            <button onclick="editAppointment(<?= $appointment['appointment_id'] ?>)">Edit</button>
            <button onclick="deleteAppointment(<?= $appointment['appointment_id'] ?>)">Delete</button>
            <div class="status-dropdown">
        <button class="status-dropbtn">Change Status</button>
          <div class="status-dropdown-content">
               <?php foreach ($status as $stat): ?>
                    
                    <a href="#" onclick="changeAppointmentStatus(<?= $appointment['appointment_id'] ?>, '<?= $stat['s_id'] ?>')"><?= $stat['status_name'] ?></a>
          
               <?php endforeach; ?>
          </div>
    </div>
        </td>
    </tr>
    <?php endforeach;} ?>
    
     
</table>

<!-- Edit Modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <h2>Edit Appointment</h2>
        <form id="editAppointmentForm">
            <input type="hidden" id="editAppointmentId">
            <label for="editDate">Date:</label>
            <input type="date" id="editDate" name="date"><br>
            <label for="editTime">Time:</label>
            <input type="time" id="editTime" name="time"><br>
            <label for="editReason">Reason:</label>
            <textarea id="editReason" name="reason"></textarea><br>
            <button type="button" onclick="updateAppointment()">Save Changes</button>
        </form>
    </div>
</div>

<script>
// Define the function to open the modal and populate it with data
function editAppointment(appointmentId) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../action/fetchAppointmentById.php?appointment_id=' + appointmentId, true);
    xhr.onload = function() {
        if (this.status == 200) {
            try {
                var appointment = JSON.parse(this.responseText);
                document.getElementById("editAppointmentId").value = appointmentId;
                document.getElementById("editDate").value = appointment.appointment_date;
                document.getElementById("editTime").value = appointment.appointment_time;
                document.getElementById("editReason").value = appointment.problemDescription;
                document.getElementById("editModal").style.display = "block";
            } catch (e) {
                alert('Error parsing appointment details.');
            }
        } else {
            alert('Failed to fetch appointment details.');
        }
    };
    xhr.onerror = function() {
        alert('Request failed.');
    };
    xhr.send();
}

// Define the function to close the modal
function closeModal() {
    document.getElementById("editModal").style.display = "none";
}

// Define the function to update the appointment
function updateAppointment() {
    var appointmentId = document.getElementById("editAppointmentId").value;
    var date = document.getElementById("editDate").value;
    var time = document.getElementById("editTime").value;
    var reason = document.getElementById("editReason").value;

    var formData = new FormData();
    formData.append("appointmentId", appointmentId);
    formData.append("date", date);
    formData.append("time", time);
    formData.append("reason", reason);

    var xhr = new XMLHttpRequest();
    
    xhr.open("POST", "../action/updateAppointment.php", true);
    xhr.onload = function() {
        if (this.status == 200) {
          console.log(xhr.responseText);
            var response = JSON.parse(this.responseText);
            if (response.success) {
               //  alert("Appointment updated successfully.");
                closeModal();
                location.reload();
                
                // Optionally refresh the appointments list here
            } else {
               alert("Failed to update appointment.");
            }
        } else {
            alert("Failed to send request.");
        }
    };
    xhr.send(formData);
}

// Event listeners for modal close actions
document.getElementsByClassName("close-button")[0].onclick = closeModal;
window.onclick = function(event) {
    if (event.target == document.getElementById("editModal")) {
        closeModal();
    }
};



function deleteAppointment(appointmentId) {
    if (confirm('Are you sure you want to delete this appointment?')) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../action/deleteAppointment.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (this.status == 200) {
                var response = JSON.parse(this.responseText);
                if (response.success) {
                    alert("Appointment deleted successfully.");
                    location.reload(); // Reload the page to reflect the changes
                } else {
                    alert("Failed to delete appointment.");
                }
            } else {
                alert("Failed to send request.");
            }
        };
        xhr.send("appointmentId=" + appointmentId);
    }
}

// Define the function to change the status of an appointment
function changeAppointmentStatus(appointmentId, newStatus) {
    
    console.log(`Changing appointment ${appointmentId} status to ${newStatus}`);
    
    var formData = new FormData();
    formData.append('appointmentId', appointmentId);
    formData.append('s_id', newStatus);
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../action/changeAppointmentStatus.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Successfully updated status
          //   alert('Status updated successfully.');
            location.reload(); 
        } else {
            alert('An error occurred while updating the status.');
        }
    };
    xhr.send(formData);
}

</script>

</body>
</html>
