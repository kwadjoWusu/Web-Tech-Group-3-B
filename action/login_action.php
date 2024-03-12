<?php
// Start session
session_start();

// Include the connection file
include '../settings/connection.php'; 

// Collect form data and store in variables
$email = $_POST['email'];
$password = $_POST['password'];

// Write a query to SELECT a record from the People table using the email
$sql = "SELECT * FROM user WHERE email = '$email'";

// Execute the query
$result = $conn->query($sql);

// Check if any row was returned
if ($result->num_rows == 0) {
    echo '<script>
            alert("User email is incorrect or not registered!");
            setTimeout(function() {
                window.location.href = "../g_view/home.php";
            }, 100); // Delay in milliseconds
          </script>';
    exit(); // Make sure to exit after the alert and redirection
}

// If no alert is shown, perform the redirection normally

// Fetch the record
$row = $result->fetch_assoc();

// Verify password user provided against database record
if (password_verify($password, $row['passwd'])) {
    // Create a session for user id and role id
    $_SESSION['user_id'] = $row['UserID']; // Assuming 'pid' is the user id column in the People table
    $_SESSION['role_id'] = $row['roleID']; // Assuming 'rid' is the role id column in the People table

    // Redirect based on role
    if ($_SESSION['role_id'] == 2) { // Father or Mother
        header("Location: ../g_view/dash.php");
        exit();
    } else { // Normal user
        header("Location: ../g_view/admin.php");
        exit();
    }
} else {
    // Incorrect password
    echo '<script>
            alert("Incorrect password!");
            setTimeout(function() {
                window.location.href = "../g_view/home.php";
            }, 100); // Delay in milliseconds
          </script>';
    exit(); // Make sure to exit after the alert and redirection
}

// Close the connection
// $conn->close();


