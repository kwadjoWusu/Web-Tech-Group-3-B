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
            <form class="form" method="POST">
                <h2>Register</h2>
                <input type="text" name="firstname" placeholder="Enter your first name" required>
                <input type="text" name="lastname" placeholder="Enter your last name" required>
                
                <div class="gender">
                    <input type="radio" name="gender" id="male" value="0" required>
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="female" value="1" required>
                    <label for="female">Female</label>
                </div>
                
                <select name="major" required>
                    <option value="">Select your major</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Computer Engineering">Computer Engineering</option>
                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                    <option value="Electrical Engineering">Electrical Engineering</option>
                    <option value="Economics">Economics</option>
                    <option value="Management Information Systems">Management Information Systems</option>
                    <option value="Business Administration">Business Administration</option>
                    <option value="Mechatronic Engineering">Mechatronic Engineering</option>
                </select>

                <input type="number" name="gradclass" placeholder="Enter your class" required min="2000" max="2025">

                <input type="email" name="email" placeholder="Enter Email Here" required>
                <input type="password" name="password" placeholder="Enter Password Here" required pattern="^(?=.*[!@#$%^&*])(?=.*[0-9])(?=.*[A-Z]).{8,}$">
                <input type="password" name="confirmpassword" placeholder="Retype your password" required pattern="^(?=.*[!@#$%^&*])(?=.*[0-9])(?=.*[A-Z]).{8,}$">

                <!-- Security Questions -->
                <p class="security-question">What is your mother's maiden name?</p>
                <input type="text" name="security_answer_1" placeholder="Enter your answer" required>

                <p class="security-question">In what city were you born?</p>
                <input type="text" name="security_answer_2" placeholder="Enter your answer" required>

                <p class="security-question">What is the name of your first elementary school?</p>
                <input type="text" name="security_answer_3" placeholder="Enter your answer" required>

                <button type="submit" class="btnn">Register</button>
            
                <p class="link">Already have an account?<br>
                    Sign in<a href="../g_view/home.html"> here</a> </p>
                <p class="liw">OR register with</p>
            
                <div class="icons">
                    <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
                </div>
            </form>
        </div>
    </div>

    <script src="../g_js/home_register_script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

