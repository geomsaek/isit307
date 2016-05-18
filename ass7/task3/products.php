<!doctype>
<html>
<head>
    <title></title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body class="loading">
<?php
require_once('scripts/db.php');
    $db = connect_db();
    $sql = "SELECT * FROM PRODUCTS";
    $results = mysqli_query($db,$sql);

    $prods = array();
    $counter = 0;

    while($row = mysqli_fetch_assoc($results)){
        $prods[$counter] = $row;
        $counter++;
    }
?>
<div class="content">
    <header>
        <?php include('inc/nav.php'); ?>
    </header>

    <div class="container-fluid">
        <div class="container">
            <div class="row" style='overflow-y:scroll;'>

                <?php
                    for($i = 0; $i < sizeof($prods); $i++){
                        echo "<div class='container bar-wrap'>";
                            echo "<div class='name-wrap'>" . $prods[$i]['productname'] . "</div>";
                            $size = ($prods[$i]['qty'] / 2);
                            echo "<div class='bar' style='width:" . $size . ";'></div>" . $prods[$i]['qty'];
                        echo "</div>";
                    }

                ?>
            </div>

        </div>
    </div>
</div>
<script>
    jQuery(window).ready(function(){
        setTimeout(hideLoad, 2000);
    });

    function  hideLoad() {
        jQuery('body').removeClass('loading');
    }
</script>
</body>

</html>