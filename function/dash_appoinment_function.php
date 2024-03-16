<?php
include '../action/get_all_years.php';
$appointmentsByYear = getDashAllAppointments();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="../g_css/dash_style.css" />
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
</head>
<body>
<div class="container">
    <?php
    foreach ($appointmentsByYear as $year => $appointments) {
        echo "<section class='main-task'>";
        echo "<h1>Consultation History</h1>";
        echo "<div class='event-container'>";
        echo "<h3 class='year'>$year</h3>";

        // Loop through appointments for the current year
        foreach ($appointments as $appointment) {
            $date = date('j', strtotime($appointment['appointment_date']));
            $month = date('M', strtotime($appointment['appointment_date']));
            $time = date('h:i a', strtotime($appointment['appointment_time']));
            $description = $appointment['problemDescription'];

            echo "<div class='event'>";
            echo "<div class='event-left'>";
            echo "<div class='event-date'>";
            echo "<div class='date'>$date</div>";
            echo "<div class='month'>$month</div>";
            echo "</div>";
            echo "</div>";
            echo "<div class='event-right'>";
            echo "<h3 class='event-title'>$description</h3>";
            echo "<div class='event-description'>$description</div>";
            echo "<div class='event-timing'>";
            echo "<img src='images/time.png' alt='' /> $time";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }

        echo "</div>"; // Close event-container div
        echo "</section>";
    }
    ?>

</body>
</html>
