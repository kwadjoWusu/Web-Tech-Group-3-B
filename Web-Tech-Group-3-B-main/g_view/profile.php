<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="../g_css/dash_style.css" />
    <link rel="stylesheet" href="../g_css/profile_style.css" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
  </head>
  <body>
    <div class="container">
      <nav>
        <ul>
          <li>
            <a href="#" class="logo">
              <img src="../g_img/bbg_logo.jpeg" alt="" />
              <span id="name" class="nav-item">HealthLine</span>
            </a>
          </li>
          <li>
            <a href="../g_view/admin.php">
              <i class="fas fa-home"></i>
              <span class="nav-item">Home</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fas fa-user"></i>
              <span class="nav-item">Profile</span>
            </a>
          </li>
          <li>
            <a href="../g_view/appointmentList.php">
              <i class="fas fa-tasks"></i>
              <span class="nav-item">Appointment List</span>
            </a>
          </li>
          <li>
            <a href="#" class="settings">
              <i class="fas fa-cog"></i>
              <span class="nav-item">Change Password</span>
            </a>
          </li>
          <li>
            <a href="../g_view/admi_help.php" class="help">
              <i class="fas fa-question-circle"></i>
              <span class="nav-item">Help</span>
            </a>
          </li>
          <li>
            <a href="../g_view/home.php" class="logout">
              <i class="fas fa-sign-out-alt"></i>
              <span class="nav-item">Log out</span>
            </a>
          </li>
        </ul>
      </nav>

      
      <section class="main">
        <!-- <div class="main-top">
          <h1>DASHBOARD</h1>
            <i class="fas fa-user-cog"></i>
        </div>
          <h1>Schedule Statistics</h1>
        <div class="main-skills">
          
          <a href="#" class="card">
            <i class="fas fa-clock"></i>
            <h3>Appointments</h3>
            <p>14</p>
          </a>
          <a href="#" class="card">
            <i class="fas fa-exclamation"></i>
            <h3>Cancelled</h3>
            <p>3</p>
          </a>
          <a href="#" class="card">
            <i class="fas fa-check"></i>
            <h3>Completed</h3>
            <p>9</p>
          </a>
        </div> -->
        
        <div class="circular-container">
            <img src="../g_img/profile_1.jpeg" alt="Your Image">
          </div>

        <section class="main-task">
            <i class="fa fa-pen fa-xs edit"></i>
                <div class="profile_table">
                    <table>
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td>Dr. Nana  Yaw Anokye</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>happy@ashesi.lie</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td>Sakumono, Accra</td>
                            </tr>
                            <tr>
                                <td>Working hours</td>
                                <td>:</td>
                                <td>6:00 - 18:00</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>        
      </section>
    </div>
  </body>
</html>
