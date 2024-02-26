<?php

include('../settings/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["passwd"];

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    echo 'one';
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row["passwd"])) {

                header("Location: ../g_view/dash.html");
                exit();
        } else {
        echo "User not found. Please check your email.";
        }
    }
}

$conn->close();
?>