<?php

// session_start();

function Login_session() {
    if (!isset($_SESSION['user_id'])) {
        // Redirect to the login page
        header("Location: ../g_view/home.php");
        die();
    }
}
