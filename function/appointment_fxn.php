<?php
include '../actions/get_all_appointments.php';

// Execute the function to get all chores
$appointments = getAllappointment();

// Display the list of chores in a table format
if ($appointments) {
    echo '<style>'.
         'table {'.
         '    width: 100%;'.
         '    border-collapse: collapse;'.
         '    margin-top: 20px;'.
         '}'.
         'th, td {'.
         '    border: 1px solid #ddd;'.
         '    padding: 10px;'.
         '    text-align: left;'.
         '}'.
         'th {'.
         '    background-color: #800080; /* Blue color for header */'.
         '    color: black; /* White text color for header */'.
         '}'.
         'tr:hover {'.
         '    background-color: #f9f9f9;'.
         '}'.
         '.action-buttons button {'.
         '    padding: 5px 10px;'.
         '    margin-right: 5px;'.
         '    border: none;'.
         '    cursor: pointer;'.
         '    color: white;'.
         '    border-radius: 3px;'.
         '    transition: background-color 0.3s;'.
         '}'.
         '.action-buttons button:hover {'.
         '    background-color: #DA70D6;'.
         '}'.
         '.fa {'.
         '    margin-right: 5px;'.
         '}'.
         '</style>';
    echo '<table>'.
         '<tr>'.
         '<th>appointment ID</th>'.
         '<th>appoitment date</th>'.
         '<th>appointment time</th>'.
         '<th>reaason for visit</th>'.
         '</tr>';
    foreach ($appointments as $appointment) {
        echo '<tr>'.
             '<td>'.$appointment["appointment_id"].'</td>'.
             '<td>'.$appointment["appointment_date"].'</td>'.
             '<td>'.$appointment["set_time"].'</td>'.
             '<td>'.$appointment["reasonforvisit"].'</td>'.
             '<td class="action-buttons">'.
             '<button style="color: black;" onclick="editappointment('.$appointment["appointment_id"].')"><i class="fas fa-edit" style="color: purple;"></i>Edit</button>'.
             '<button style="color: black;" onclick="cancelappointment('.$appointment["appointment_id"].')"><i class="fas fa-trash-alt" style="color: purple;"></i>Delete</button>'.
             '</td>'.
             '</tr>';
        }

        echo '</table>';
} else {
    echo 'No appointments found.';
}
?>