<?php 
// Start the session to allow access to session variables
session_start(); 

// Include the database connection file
include "db_conn.php";

// Check if the username and password are provided via POST method
if (isset($_POST['uname']) && isset($_POST['password'])) {

    // Function to validate and sanitize input data
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    // Validate and sanitize the username and password
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    // Check if username is empty
    if (empty($uname)) {
        header("Location: Loginform.php?error=User Name is required");
        exit();
    } else if (empty($pass)) { // Check if password is empty
        header("Location: Loginform.php?error=Password is required");
        exit();
    } else {
        // Hashing the password for security
        $pass = md5($pass);

        // SQL query to fetch user data based on provided username and password
        $sql = "SELECT * FROM user WHERE username='$uname' AND password='$pass'";

        // Execute the SQL query
        $result = mysqli_query($conn, $sql);

        // Check if the query returned exactly one row
        if (mysqli_num_rows($result) === 1) {
            // Fetch the user data
            $row = mysqli_fetch_assoc($result);
            // Check if the provided username and password match the database record
            if ($row['username'] === $uname && $row['password'] === $pass) {
                // Store user information in session variables
                // Assigning values from the database to session variables
                $_SESSION['username'] = $row['username']; // Assigning the username from the database query result to the session variable 'username'
                $_SESSION['First_name'] = $row['First_name']; // Assigning the first name from the database query result to the session variable 'First_name'
                $_SESSION['user_id'] = $row['user_id']; // Assigning the user id from the database query result to the session variable 'user_id'
                // Redirect the user to the home page
                header("Location: home.php");
                exit();
            } else {
                // Redirect with an error message if the username or password is incorrect
                header("Location: Loginform.php?error=Incorrect User name or password");
                exit();
            }
        } else {
            // Redirect with an error message if no user found with provided credentials
            header("Location: Loginform.php?error=Incorrect User name or password");
            exit();
        }
    }
    
} else {
    // Redirect to the index page if username and password are not provided via POST
    header("Location: Loginform.php");
    exit();
}
?>
