<?php include('../action/fetchAppointments.php'); 
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>
<link rel="stylesheet" href="../g_css/dash_style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<div class="container">
  <nav>
    <ul>
      <li>
        <a href="admin.php" class="logo">
          <img src="../g_img/bbg_logo.jpeg" alt="">
          <span id="name" class="nav-item">HealthLine</span>
        </a>
      </li>
      <li>
        <a href="../g_view/dash.php">
          <i class="fas fa-home"></i>
          <span class="nav-item">Home</span>
        </a>
      </li>
      <li>
        <a href="../g_view/dash_profile.php">
          <i class="fas fa-user"></i>
          <span class="nav-item">Profile</span>
        </a>
      </li>
      <li>
        <a href="manageAppointments.php">
          <i class="fas fa-tasks"></i>
          <span class="nav-item">Manage Appointments</span>
        </a>
      </li>
      <li>
        <a href="../g_view/setting.php" class="settings">
          <i class="fas fa-cog"></i>
          <span class="nav-item">Change Password</span>
        </a>
      </li>
      <li>
        <a href="../g_view/dash_help.php" class="help">
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
    <section class="create-appointment">
      <h2>Book a New Slot</h2>
      <form id="bookSlotForm" action="../action/manageAppointments_action.php" method = "post">
        <label for="problemDescription">Problem Description:</label>
        <textarea id="problemDescription" name="problemDescription" placeholder="Enter problem description" required></textarea>

        <label for="setTime">Set Time:</label>
        <input type="time" id="setTime" name="setTime" required>

        <label for="setDate">Set Date:</label>
        <input type="date" id="setDate" name="setDate" required>

        <button type="submit" name ="submit" id = "submit">Book Slot</button>
      </form>
    </section>

    <table id="appointmentTable">
      <thead>
        <?php include '../function/appointment_fxn.php';?>
      </thead>
      <tbody id="appointmentContainer">



      
    
</tbody>
    </table>
  </section>


  
</div>




<style>
    .create-appointment {
  width: 300px;
  background-color: #ddd;
  padding: 20px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  border-radius: 10px;
  font-family: 'League Spartan', sans-serif;
}

.create-appointment label {
  font-size: 14px;
  margin-bottom: 5px;
  display: block;
}

.create-appointment textarea,
.create-appointment input[type="time"],
.create-appointment input[type="date"] {
  width: 100%;
  padding: 10px;
  border: none;
  border-radius: 5px;
  margin-bottom: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.create-appointment button[type="submit"] {
  padding: 10px;
  background-color: #64121f;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  display: inline-block;
  margin-top: 10px;
}

.create-appointment button[type="submit"]:hover {
  background-color: #4e0f18;
}
</style>


</body>
</html>

