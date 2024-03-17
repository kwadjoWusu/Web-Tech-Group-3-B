<?php

include('../action/fetchQuestion.php');

$questions = getAllquestions();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>HealthLine</title>
    <link rel="stylesheet" href="../g_css/home_register_style.css">
</head>
<body>
    <div class="pictures"> <img src="../g_img/bbg_2.jpeg" alt="Doctor 1" width="100%" height="100%"></div>
    <div class="overlay"></div>

    <div class="main">
        <div class="register" id="register-form">
            <form action="../action/register_action.php" method="POST" class="form">
                <h2>Register</h2>
                <input type="text" name="fname" placeholder="Enter your first name" required>
                <input type="text" name="lname" placeholder="Enter your last name" required>
                
                <div class="gender">
                    <select name="gender" id="gender" required>
                        <option value="">Select Gender</option>
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                    </select>
                </div>
                <div class="major">
                <select name="major" id="major" required>
                    <option value="">Select Major</option>
                    <option value="computer_science">Computer Science</option>
                    <option value="business_administration">Business Administration</option>
                    <option value="mechanical_engineering">Mechanical Engineering</option>
                    <option value="computer_engineering">Computer Engineering</option>
                    <option value="electrical_engineering">Electrical Engineering</option>
                    <option value="mechatronics_engineering">Mechatronics Engineering</option>
                    </select>
                </div>

                <div>
                <select name="yeargroup" class = "yeargroup" required>
                    <option value="">Select Year Group</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                </select>
                </div>

                <input type="email" name="email" placeholder="Enter Email Here" required>
                <input type="password" name="password" placeholder="Enter Password Here" required pattern="^(?=.*[!@#$%^&*])(?=.*[0-9])(?=.*[A-Z]).{8,}$">
                <input type="password" name="confirmpassword" placeholder="Retype your password" required pattern="^(?=.*[!@#$%^&*])(?=.*[0-9])(?=.*[A-Z]).{8,}$">

                <!-- Security Questions -->

                <?php foreach ($questions as $question): ?>
                    <div class="security-question-item">
                        <p class="security-question"><?= htmlspecialchars($question['question']) ?></p>
                        <input type="hidden" name="question_id[]" value="<?= htmlspecialchars($question['q_id']) ?>">
                        <input type="text" name="security_answer[]" placeholder="Enter your answer" required>
                    </div>
                <?php endforeach; ?>

                <button type="submit" class="btnn">Register</button>
                <!-- <input type="submit" class="btnn" value="Register"> -->
            
                <p class="link">Already have an account?<br>
                    Sign in<a href="../g_view/home.php"> here</a> </p>
            
        </div>
    </div>

    <!-- <script src="../g_js/home_register_script.js"></script> -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

