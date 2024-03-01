<!DOCTYPE html>
<html>
<head>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <!-- the href attrubute used to apply icons from bootstrap-icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> 
    <!-- This web utilized bootstrap.css -->
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style= "min-height: 100vh">
                <!-- Login form -->
                <form class="mt-5 p-4 border" style="width: 500px" action="Index.php" method="post">
                    <!-- Login title -->
                    <h2 style="text-align:center">LOGIN</h2>
                    <hr>
                    <?php if (isset($_GET['error'])) { ?>
                        <!-- Display error message if provided via GET parameter -->
                        <div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
                    <?php } ?>
                    <!-- This line used to have user icon beside a username input-->
                    <div class="input-group mb-3">
                        <!-- <i class="bi bi-person"> used to display an person icon -->
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                    <input type="text" class="form-control" name="uname" placeholder="Username" >
                    </div>

                    <!-- input-group mb-3 used to set the input field have an icon and a text field -->
                    <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock"></i></span> 
                    <input type="password" class="form-control" name="password" placeholder="Password" >
                    </div>

                    <!-- This button will submit use's credentials -->
                    <div class="d-grid gap-2 col-6 mx-auto">
                    <!-- the button set to btn btn-dark to make it black -->
                    <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <hr>                   
                    <!-- If user has no account yet, they can click 'Create an Account' to be redirect to SIGNUP page  -->
                    <div>
                    Don't have an account? <a href="signup.php">Create an Account</ 
                    </div>

                </form>
        </div>
    </div>

</body>
</html>
