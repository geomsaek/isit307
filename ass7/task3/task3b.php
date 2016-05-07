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

    $chunk = array_chunk($prods, 3);
?>
<body class="loading">

    <div class="content">
        <header>
            <?php include('inc/nav.php'); ?>
        </header>

        <div class="container-fluid">
            <div class="container">
                <div class="row">

                    <table class='table-striped' width="100%" cellspacing="2" cellpadding="2" border="1">
                        <tr>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Qty</th>
                        </tr>
                    <?php
                    if(isset($_GET['page'])){
                        $page = $_GET['page'] - 1;

                        for($k = 0; $k < sizeof($chunk[$page]); $k++){
                            echo "<tr>";
                                echo "<td>" . $chunk[$page][$k]['productname'] . "</td>";
                                echo "<td>" . $chunk[$page][$k]['price'] . "</td>";
                                echo "<td>" . $chunk[$page][$k]['qty'] . "</td>";
                            echo "</tr>";
                        }
                    }else {
                        for($k = 0; $k < sizeof($chunk[0]); $k++){
                            echo "<tr>";
                                echo "<td>" . $chunk[0][$k]['productname'] . "</td>";
                                echo "<td>" . $chunk[0][$k]['price'] . "</td>";
                                echo "<td>" . $chunk[0][$k]['qty'] . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid content">
        <div class="container">
            <p>
            <?php
                for($p = 0; $p < sizeof($chunk); $p++){
                    echo "<a href='http://isit.local/ass7/task3/task3b.php/?page=" . ($p + 1) . "'>" . ($p + 1) . "</a>";
                }
            ?>
            </p>
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