<!DOCTYPE html>
<html lang="en">
<head>
    <title>HealthLine</title>
    <link rel="stylesheet" href="../g_css/home_style.css">
</head>
<body>
    <div class="pictures"> <img src="../g_img/bbg_2.jpeg" alt="Doctor 1" width="100%" height="100%"></div>
    <div class="overlay"></div>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">HealthLine</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="../about.php">ABOUT</a></li>
                    <li><a href="../contact.php">CONTACT</a></li>
                </ul>
            </div>

        </div> 
        <div class="content">
            <h1>Healthcare Scheduling <br><span>Platform</span></h1>
            <p class="par">Welcome to our healthcare scheduling platform! Easily manage appointments, 
                <br>track patient records, and optimize your clinic's workflow. 
                <br>With intuitive features and seamless integration, 
                <br>we ensure smooth operation and efficient patient care. 
                <br>Get started today and experience the convenience of modern healthcare scheduling.</p>


                <a href="../g_view/home_register.php"><button class="cn">JOIN US</button></a>

                <form class="form" action="../action/login_action.php" method="POST">
                    <h2>Login Here</h2>
                    <input type="email" name="email" placeholder="Enter Email Here">
                    <input type="password" name="password" placeholder="Enter Password Here">
                    <button type="submit" class="btnn">Login</button>

                    <p class="link">
                        <a href="../g_view/home_forgotten_password.php">Forgotten password </a></p>

                    <p class="link">Don't have an account<br>
                    <a href="home_register.php">Sign up </a> here</a></p>

                </form>
                    </div>
                </div>
        </div>
    </div>
    <script src= "../g_js/home_script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
