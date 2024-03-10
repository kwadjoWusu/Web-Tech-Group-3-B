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
                <br><label for="gender">Gender:</label><br>
                    <select name="gender" id="gender" required>
                        <option value="">Select Gender</option>
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                    </select>
                </div>
                <div></div>


                <div class="role">
                <br><label for="role">Role:</label><br>
                    <select name="role" id="role" required>
                    <option value="">Select Role</option>
                        <option value="0">Doctor</option>
                        <option value="1">Admin</option>
                        <option value="2">Patient</option>
                    </select>
                    <br>
                </div>
                <div class="major">
                <label for="major">Major:</label>
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
                <select name="yeargroup" required>
                    <option value="">Select Year Group</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                </select>
                </div>
                
                <div>
                <input type="text" name="telephone" placeholder="Enter your telephone number" required>
                </div>
                <div>
                <input type="email" name="email" placeholder="Enter Email Here" required>
                </div>

                <div>
                <input type="password" name="password" placeholder="Enter Password Here"  required>
                </div>
                <div>
                    <input type="password" name="confirmPassword" placeholder="Re-enter Password" required>
                </div>

                <div>
                <button class="btnn" type="submit" >Register </button>
                </div>

                <p class="link">Already have an account?<br>
                <a href="home.php">Sign in</a> here</p>
                <p class="liw">Register with</p>
            
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

        
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script scr= "../g_js/home_register_script.js"></script>
</body>
</html>
