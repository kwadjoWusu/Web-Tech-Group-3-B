<?php
include('../settings/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $gender = $_POST["gender"];
    $major = $_POST["major"];
    $gradclass = $_POST["gradclass"];
    $email = $_POST["email"];
    $password = password_hash($_POST["passwd"], PASSWORD_DEFAULT);


    $sql = "INSERT INTO people (firstname, lastname, gender, major, gradclass, email, passwd) 
            VALUES ('$firstname', '$lastname', '$gender', '$major', '$gradclass', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {

            
        header("Location: ../view/dash.php");
        exit();

               

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

$conn->close();
