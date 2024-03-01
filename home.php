<?php
// Start the session to allow access to session variables
session_start();

// Check if user is logged in by verifying session variables
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tag for responsive design -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <!-- Link to Bootstrap CSS file -->
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
    <!-- Center the content vertically and horizontally -->
    <div class="position-absolute top-50 start-50 translate-middle">
        <!-- Display a welcome message using the user's first name from the session -->
        <h1 style="text-align:center">Welcome, <?php echo $_SESSION['First_name']; ?></h1>
        <!-- Logout button -->
        <div class="d-grid gap-2 col-6 mx-auto">
            <!-- Link to logout.php with a button styled using Bootstrap -->
            <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
    </div>
</body>
</html>
<?php
} else {
    // If user is not logged in, redirect to the Loginform.php page
    header("Location: Loginform.php");
    // Exit the script to prevent further execution
    exit();
}
?>
