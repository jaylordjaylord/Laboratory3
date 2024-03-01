<?php
// Create the 'verify' table (for verification codes)
// and the 'verified_user' table (for verified users)
// ... (database setup code)

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $code = substr(md5(mt_rand()), 0, 15); // Generate a random verification code

    // Insert data into the 'verify' table
    $insert = mysql_query("INSERT INTO verify VALUES ('', '$email', '$pass', '$code')");
    $db_id = mysql_insert_id();

    // Send verification email
    $message = "Your Activation Code is $code";
    $to = $email;
    $subject = "Activation Code for Your Account";
    $from = 'your_email@example.com'; // Replace with your actual email
    $body = "Your Activation Code is $code. Please click on this link to activate your account: <a href=\"verification.php?id=$db_id&code=$code\">Verify</a>";
    $headers = "From: $from";
    mail($to, $subject, $body, $headers);

    echo "An activation code has been sent to your email. Check your inbox!";
}

if (isset($_GET['id']) && isset($_GET['code'])) {
    $id = $_GET['id'];
    $code = $_GET['code'];

    // Verify the code against the database
    $select = mysql_query("SELECT email, password FROM verify WHERE id='$id' AND code='$code'");
    if (mysql_num_rows($select) == 1) {
        // User verified successfully
        while ($row = mysql_fetch_array($select)) {
            $email = $row['email'];
            $password = $row['password'];
        }
        // Insert the user into the 'verified_user' table
        $insert_user = mysql_query("INSERT INTO verified_user VALUES ('', '$email', '$password')");
        // Delete the verification entry from the 'verify' table
        $delete = mysql_query("DELETE FROM verify WHERE id='$id' AND code='$code'");
        echo "Your account has been verified!";
    } else {
        echo "Invalid verification code.";
    }
}
?>
