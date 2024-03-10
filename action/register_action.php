<?php
include('../settings/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    $role = $_POST["role"];
    $major = $_POST["major"];
    $yeargroup = $_POST["yeargroup"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);


    $RoleQuery = "SELECT roleID FROM roles WHERE roleID = '$role'";
    $RoleResult = $conn->query($RoleQuery);


    if ($RoleResult === FALSE) {
        echo "Error: " . $RoleQuery . "<br>" . $conn->error;
    } elseif ($RoleResult->num_rows > 0) {
        $RoleRow = $RoleResult->fetch_assoc();
        $roleID = $RoleRow["roleID"];


        $sql = "INSERT INTO user (fname, lname, gender, major, yeargroup, email, passwd,roleID,tel) 
            VALUES ('$fname', '$lname', '$gender', '$major', '$yeargroup', '$email', '$password','$roleID','$roleID')";
        if ($conn->query($sql) === TRUE) {

            if ($roleID == 0 || $roleID == 1) {
                header("Location: ../g_view/home_register.php");
                exit();
            } elseif ($roleID == 2 ) {
                header("Location: ../g_view/home_register.php");
                exit();
            } else {
                echo "Invalid role selected.";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Role not found.";
        echo "Error: " . $roleQuery . "<br>" . $conn->error;
    }
}

$conn->close();
            
