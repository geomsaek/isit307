<!doctype>
<html>
<head>
    <?php session_start();
    include("scripts/manager.php");
    ?>
    <?php if(!isset($_SESSION['username'])){ header("Location: http://isit.local/ass6/?logout=true"); } ?>
    <title>Enrolments</title>
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
                    <h3>Current Enrolments</h3>
                </div>
                <div class="col-sm-6">
                    <h6 id="logout-button" class="btn btn-primary"><a href="http://isit.local/ass6/?logout=true">Logout</a></h6>
                </div>
            </div>
        </header>

        <section>
            <div class="container">
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