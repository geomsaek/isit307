<!doctype>
<html>
<head>
    <?php session_start(); ?>

    <?php if(isset($_SESSION['username'])){ header("Location: http://isit.local/ass5/profile.php"); } ?>
    <title>Welcome</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>

<div class="container-fluid">
    <div class="container">
        <div class="col-sm-6" id="login-square">
            <h1>Log in to your account</h1>
            <?php if(isset($_GET['logout'])):
                    session_destroy();  ?>
                    <h4>You have been logged out</h4>
            <?php endif; ?>

            <form method="POST" action="scripts/user.php">
                <div class="container-fluid">
                    <label>Username</label>
                    <input class="form-control" name="username" type="text" />
                </div>

                <div class="container-fluid">
                    <label>Password</label>
                    <input class="form-control" name="password" type="password" />
                </div>
                <div class="container-fluid">
                    <input class="btn btn-primary" name="login-button" type="submit" value="Submit" />
                </div>
            </form>
        </div>
    </div>
</div>

</body>

</html>