<!doctype>
<html>
<head>
    <?php session_start();
        include("scripts/manager.php");
    ?>
    <?php if(!isset($_SESSION['username'])){ header("Location: http://isit.local/ass5/?logout=true"); } ?>
    <title>Enrolments and Variations</title>
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
                    <h3>Enrol in Class</h3>
                </div>
                <div class="col-sm-6">
                    <h6 id="logout-button" class="btn btn-primary"><a href="http://isit.local/ass5/?logout=true">Logout</a></h6>
                </div>
            </div>
        </header>
        <section>
            <?php
                if(isset($_GET['update'])):

                    if($_GET['update'] == "false"){
                        echo "<h3 style='margin-bottom:2%;'>An error occurred in your update. Please try again.</h3>";
                    }else if($_GET['update'] == "true"){
                        echo "<h3 style='margin-bottom:2%;'>You were successfully enrolled!</h3>";
                    }

                endif;
                if(isset($_GET['defined'])):
                    if($_GET['defined'] == "true"){
                        echo "<h3 style='margin-bottom:2%;'>An error occurred in your update. Please make sure you are not already enrolled in that subject</h3>";
                    }
                endif;
            ?>
            <form action="scripts/Enrolment.php" method="POST">

                <div class="container">
                    <div class="row">
                        <div class="col-sm-12" style="margin-bottom:2%;">
                            <label>Select Class</label>
                            <select name="class-to-enrol-code" id="sub-code" class="form-control">
                                <?php $vals = output_class_code();
                                    for($i = 0; $i < sizeof($vals); $i++){
                                        echo "<option value='" . $vals[$i]['classcode'] . "'>" . $vals[$i]['classcode'] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="col-sm-12" style="margin-bottom:2%;">
                            <label>Class Name</label>
                            <select id='sub-name' name="class-to-enrol-name" class="form-control" disabled="disabled">
                                <?php $vals = output_class_code();
                                for($i = 0; $i < sizeof($vals); $i++){
                                    echo "<option value='" . strtolower($vals[$i]['classname']) . "'>" . $vals[$i]['classname'] . "</option>";
                                }
                                ?>
                            </select>
                            <input type="text" class="hide" name="class-name-text" id="class-name-text-field" value="<?php echo $vals[0]['classname']; ?>" />
                        </div>
                        <div class="col-sm-12" style="margin-bottom:2%;">
                            <select id="enrol-type-action" name="enrol-action" class="form-control">
                                <option value="enrol">Enrol</option>
                                <option value="remove">Remove</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <input type="submit" name="enrolment-add" class="btn btn-primary" value="Submit Enrolment" />
                </div>
            </form>
        </section>

        <section>
            <div class="container">
                <h3>Current Enrolments</h3>
                <?php $res = get_enrolments($_SESSION['username']); ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Class Name</th>
                        <th>Class Code</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php for($i = 0; $i < sizeof($res); $i++){
                        echo "<tr><td>" . $res[$i]['classname'] . "</td>";
                        echo "<td>" . $res[$i]['classcode'] . "</td></tr>";
                    }
                ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
<script>
    jQuery(document).ready(function(){
        jQuery('#sub-code').change(function(){
            var curIndex = jQuery('#sub-code option:selected').index();
            jQuery('#sub-name').find('option').removeAttr('selected');
            jQuery('#sub-name option:eq(' + curIndex + ') ').attr('selected', 'selected');
            jQuery('#class-name-text-field').attr('value',jQuery('#sub-name option:selected').text());
        });
    });
</script>
</body>

</html>