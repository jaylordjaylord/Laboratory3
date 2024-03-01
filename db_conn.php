<?php

// Database connection details
$sname= "localhost"; // Server name or IP address
$unmae= "root"; // Username for database access
$password = ""; // Password for database access

// Database name
$db_name = "ipt101";

// Establishing a connection to the database
$conn = mysqli_connect($sname, $unmae, $password, $db_name);

// Check if the connection was successful
if (!$conn) {
    // If connection failed, display an error message
    echo "Connection failed!";
}
?>
