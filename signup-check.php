<?php
// Start the session to allow access to session variables
session_start();

// Include the database connection file
include "db_conn.php";

/**
 * Function to validate and sanitize input data
 * 
 * @param string $data Input data to be validated and sanitized
 * @return string Validated and sanitized data
 */
function validate($data)
{
    // Trim whitespace from the beginning and end of the string
    $data = trim($data);
    // Unquote or strip slashes from the string
    $data = stripslashes($data);
    // Convert special characters to HTML entities
    $data = htmlspecialchars($data);
    return $data;
}

// Check if all required form fields are set in the POST data
if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['First_name']) && isset($_POST['re_password'])) {

    // Validate and sanitize form inputs
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $re_pass = validate($_POST['re_password']);
    $name = validate($_POST['First_name']);
    $Lastname = validate($_POST['Lastname']);
    $Middle_name = validate($_POST['Middle_name']);
    $email = validate($_POST['email']);

    // Construct user data for error redirection
    $user_data = 'uname=' . $uname . '&First_name=' . $name;

    // Check for empty fields
    if (empty($uname)) {
        // Redirect to signup.php with an error message if username is empty
        header("Location: signup.php?error=User Name is required&$user_data");
        exit();
    } else if (empty($pass)) {
        // Redirect to signup.php with an error message if password is empty
        header("Location: signup.php?error=Password is required&$user_data");
        exit();
    } else if (empty($re_pass)) {
        // Redirect to signup.php with an error message if re-entered password is empty
        header("Location: signup.php?error=Re Password is required&$user_data");
        exit();
    } else if (empty($name)) {
        // Redirect to signup.php with an error message if first name is empty
        header("Location: signup.php?error=First Name is required&$user_data");
        exit();
    } else if ($pass !== $re_pass) {
        // Redirect to signup.php with an error message if passwords do not match
        header("Location: signup.php?error=The confirmation password does not match&$user_data");
        exit();
    } else {
        // Hash the password for security
        $pass = md5($pass);

        // Check if the username is already taken
        $sql = "SELECT * FROM user WHERE username='$uname' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Redirect to signup.php with an error message if username is already taken
            header("Location: signup.php?error=The username is taken, try another&$user_data");
            exit();
        } else {
            // Insert user data into the database
            $sql2 = "INSERT INTO user(username, password, Lastname, First_name, Middle_name, email) VALUES('$uname', '$pass', '$Lastname', '$name', '$Middle_name', '$email')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                // Redirect to signup.php with a success message if account creation is successful
                header("Location: signup.php?success=Your account has been created successfully");
                exit();
            } else {
                // Redirect to signup.php with an error message if an unknown error occurred during account creation
                header("Location: signup.php?error=Unknown error occurred&$user_data");
                exit();
            }
        }
    }
} else {
    // Redirect to signup.php if form fields are not properly set
    header("Location: signup.php");
    exit();
}
?>
