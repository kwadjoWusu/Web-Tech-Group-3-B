<?php
include('../settings/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    
    $major = $_POST["major"];
    $yeargroup = $_POST["yeargroup"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    
    $questionIds = $_POST['question_id'];
    $answers = $_POST['security_answer'];
    
    if (count($questionIds) !== count($answers)) {
        die("Error: Mismatch between the number of questions and answers.");
    }

    $roleID = 2;

    // Check if there is already a user with the same email
    $checkEmailQuery = "SELECT email FROM user WHERE email = ?";
    $stmt = $conn->prepare($checkEmailQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // User with the same email already exists
        echo "A user with this email already exists.";
        error_log("User with the same email already exists");
        header("Location: ../g_view/home_register.php");
        exit();
    }

    // If no user with the same email exists, proceed to insert new user
    $insertUserQuery = "INSERT INTO user (fname, lname, gender, major, yeargroup, email, passwd, roleID) 
                        VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertUserQuery);
    $stmt->bind_param("sssssssi", $fname, $lname, $gender, $major, $yeargroup, $email, $password, $roleID);
    if ($stmt->execute()) {
        $UserID = $stmt->insert_id;

        // Insert answers and relations
        foreach ($answers as $index => $answer) {
            $sanitizedAnswer = htmlspecialchars(strip_tags($answer));
            $q_id = $questionIds[$index];

            // Insert the answer
            $stmt = $conn->prepare("INSERT INTO answers (answer) VALUES (?)");
            $stmt->bind_param("s", $sanitizedAnswer);
            $stmt->execute();
            $answerId = $conn->insert_id;

            // Insert the relation
            $stmt = $conn->prepare("INSERT INTO q_arelation (UserID, q_id, ans_id) VALUES (?, ?, ?)");
            $stmt->bind_param("iii", $UserID, $q_id, $answerId);
            $stmt->execute();
        }

        header("Location: ../g_view/home.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
        header("Location: ../g_view/home_register.php");
        exit();
    }
}

$conn->close();
?>
