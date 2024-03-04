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
                <input type="text" name="fname" placeholder="Enter your first name">
                <input type="text" name="lname" placeholder="Enter your last name">
                
                <div class="gender">
                    <input type="radio" name="gender" id="male" value="0">
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="female" value="1">
                    <label for="female">Female</label>
                </div>

                <div class="gender">
                    <input type="radio" name="role" id="doctor" value="0">
                    <label for="male">Doctor</label>
                    <input type="radio" name="role" id="Admin" value="1">
                    <label for="female">Admin</label>
                    <input type="radio" name="role" id="patient" value="1">
                    <label for="female">Patient</label>
                </div>
                
                <input type="text" name="major" placeholder="Enter your major">
                <input type="text" name="yeargroup" placeholder="Enter your class">
                <input type="email" name="email" placeholder="Enter Email Here">
                <input type="password" name="password" placeholder="Enter Password Here">
                <input type="password" name="confirmpassword" placeholder="Retype your password">
                <button class="btnn"><a href="#">Register</a></button>
            
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
    <div>
        
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>