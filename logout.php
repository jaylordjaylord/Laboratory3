<?php 
// Start the session to allow access to session variables
session_start();

// Unset all session variables
session_unset();

// Destroy the session data
session_destroy();

// Redirect the user to the index.php page
header("Location: Loginform.php");
