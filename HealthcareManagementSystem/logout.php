<?php
session_start();       // Start the session
session_unset();       // Unset all session variables
session_destroy();     // Destroy the session

// Redirect to the sign-up panel (or login page)
header("Location: signUp_panel.html");
exit();
?>
