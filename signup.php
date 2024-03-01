<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tag for responsive design -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGNUP</title> 
    <!-- This web utilized bootstrap.css -->
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
    <!-- Container for the sign-up form -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">">
        <!-- Form for user sign-up -->
        <form action="signup-check.php" method="post" class="mt-5 p-4 border" onsubmit="return validateForm()">
            <!-- Sign-up heading -->
            <h2 style="text-align:center">SIGN UP</h2>
            <hr>
            <!-- Display error messages if any -->
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
            <?php } ?>
            <!-- Display success message if sign-up is successful -->
            <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-success"><?php echo $_GET['success']; ?></div>
            <?php } ?>

            <!-- Input fields for user information -->
            <div class="row">
                <label for="Fullname" class="fw-bold">Fullname</label>
                <!-- First Name input field -->
                <div class="col-md-4 mb-3">
                    <label for="First_name" class="fw-bold">First Name</label>
                    <input type="text" id="First_name" name="First_name" class="form-control" placeholder="First Name">
                </div>
                <!-- Middle Name input field -->
                <div class="col-md-4 mb-3">
                    <label for="Middle_name" class="fw-bold">Middle Name</label>
                    <input type="text" id="Middle_name" name="Middle_name" class="form-control" placeholder="Middle Name">
                </div>
                <!-- Last Name input field -->
                <div class="col-md-4 mb-3">
                    <label for="Lastname" class="fw-bold">Last Name</label>
                    <input type="text" id="Lastname" name="Lastname" class="form-control" placeholder="Last Name">
                </div>
            </div>

            <!-- Username input field -->
            <div class="mb-3">
                <label for="uname" class="fw-bold">User Name</label>
                <input type="text" id="uname" name="uname" class="form-control" placeholder="User Name">
            </div>

            <!-- Email input field -->
            <div class="mb-3">
                <label for="email" class="fw-bold">Email</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Ex. email@gmail.com">
                <div id="emailError" class="text-danger"></div>
            </div>

            <!-- Password and Confirm Password input fields -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="password" class="fw-bold">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="re_password" class="fw-bold">Re Password</label>
                    <input type="password" id="re_password" name="re_password" class="form-control" placeholder="Re_Password">
                </div>
            </div>

            <!-- Create account button -->
            <div class="d-grid gap-2 col-6 mx-auto">
                <!-- Styled button for account creation -->
                <button type="submit" class="btn btn-primary">Create account</button>
            </div>
            <hr>

            <!-- If user has account already, they can click 'Login' to be redirected to LOGIN page -->
            <div> Already have an account? <a href="loginform.php">Login! </div>
        </form>
    </div>
    
    <!-- JavaScript function to validate email format -->
    <script>
    // JavaScript function to validate email format
    function validateForm() {
        // Retrieve the email input value
        var email = document.getElementById('email').value;
        // Get the element to display error messages related to email
        var emailError = document.getElementById('emailError');

        // Regular expression to check email format
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Check if email matches the regular expression
        if (!emailRegex.test(email)) {
            // Display error message if email format is invalid
            emailError.innerHTML = "Invalid email format: should contain @, gmail, .com";
            return false;
        } else {
            // Clear error message if email format is valid
            emailError.innerHTML = "";
            return true;
        }
    }
</script>

</body>
</html>
