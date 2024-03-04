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
    $password = password_hash($_POST["passwd"], PASSWORD_DEFAULT);


    $RoleQuery = "SELECT roleID FROM roles WHERE roleID = '$role'";
    $RoleResult = $conn->query($RoleQuery);


    if ($RoleResult === FALSE) {
        echo "Error: " . $RoleQuery . "<br>" . $conn->error;
    } elseif ($RoleResult->num_rows > 0) {
        $RoleRow = $RoleResult->fetch_assoc();
        $roleID = $RoleRow["roleID"];

        $roleQuery = "SELECT roleID FROM roles WHERE roleID ='$role'";
        $roleResult = $conn->query($roleQuery);


        if ($roleResult === FALSE) {
            echo "Error: " . $roleQuery . "<br>" . $conn->error;
        } elseif ($roleResult->num_rows > 0) {
            $roleRow = $roleResult->fetch_assoc();
            $roleID = $roleRow["roleID"];


        $sql = "INSERT INTO user (fname, lname, gender, major, yeargroup, email, passwd) 
            VALUES ('$fname', '$lname', '$gender', '$major', '$yeargroup', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {

            if ($roleID == 0 || $roleID == 1) {
                header("Location: ../g_view/admin.php");
                exit();
            } elseif ($roleID == 2 ) {
                header("Location: ../view/dash.php");
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
} else {
    echo "Error:  role not found.";
    echo "Error: " . $roleQuery . "<br>" . $conn->error;
}
}

$conn->close();
            

