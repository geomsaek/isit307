<!doctype>
<html>
<head>
    <?php session_start(); ?>
    <?php if(!isset($_SESSION['username'])){ header("Location: http://isit.local/ass5/?logout=true"); } ?>
    <title>Professor Search</title>
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
        <header>

            <?php include('inc/nav.php'); ?>
            <div class="row">
                <div class="col-sm-6">
                    <h3>School Search</h3>
                </div>
                <div class="col-sm-6">
                    <h6 id="logout-button" class="btn btn-primary"><a href="http://isit.local/ass5/?logout=true">Logout</a></h6>
                </div>
            </div>
        </header>
        <section>
            <?php if(!isset($_POST['school-go'])): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <p>Please type in the name of the school you wish to see the professors of</p>
                    </div>
                    <div class="col-sm-12">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>School Name</label>
                                <input type="text" name="school-name" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="submit" name='school-go' class="btn btn-primary" value="Search School" />
                            </div>

                        </form>
                    </div>
                </div>
            <?php else: ?>
                <div class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <?php
                                include("scripts/manager.php");

                                $result = check_professors($_POST['school-name']);
                                ?>

                                <?php if(empty($result)): ?>
                                    <p>No results matched</p>
                                    <p><a href="http://isit.local/ass5/professors.php">Perform a new search</a></p>
                                <?php else: ?>
                                    <h2>Displaying <?php echo sizeof($result); ?> results<br />
                                    School Name: <?php echo $_POST['school-name']; ?></h2>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Professor First Name</th>
                                            <th>Professor Surname</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        for($i = 0; $i < sizeof($result);$i++){
                                            echo "<tr>";
                                            echo "<td>" . $result[$i]['fname'] . "</td>";
                                            echo "<td>" . $result[$i]['sname'] . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endif; ?>
    </div>
</div>
</body>

</html>