<!doctype>
<html>
<head>
    <?php session_start(); ?>
    <?php if(!isset($_SESSION['username'])){ header("Location: http://isit.local/ass5/?logout=true"); } ?>
    <title>Course Students</title>
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
                    <h3>Course Student Search</h3>
                </div>
                <div class="col-sm-6">
                    <h6 id="logout-button" class="btn btn-primary"><a href="http://isit.local/ass5/?logout=true">Logout</a></h6>
                </div>
            </div>
        </header>
        <section>
            <?php if(!isset($_POST['course-go'])): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <p>Please select the name of the course you wish to display students for</p>
                    </div>
                    <div class="col-sm-12">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Course Name</label>

                                <input type="text" name="course-name-val" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="submit" name='course-go' class="btn btn-primary" value="Search Course" />
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
                                    $val = $_POST['course-name-val'];
                                    $result = check_course_students($val);
                                ?>

                                <?php if(empty($result)): ?>
                                    <p>No results matched</p>
                                    <p><a href="http://isit.local/ass5/course-students.php">Perform a new search</a></p>
                                <?php else: ?>
                                    <h2>Displaying students enrolled in: <?php echo $val; ?></h2>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Surname</th>
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
        </section>
    </div>
</div>
</body>

</html>