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

<body>
<?php if(isset($_POST['search-price-book'])):

    $xmlFile = simplexml_load_file("books.xml");
    $books = sizeof($xmlFile->book);

    $priceFrom = $_POST['price-search-from'];
    $priceTo = $_POST['price-search-to'];

    if(sizeof($books) > 0){ ?>
        <table width="100%" cellspacing="1" cellpadding="1" border="1">
            <tr>
                <th>Book Title</th>
                <th>Book Year</th>
                <th>Book Price</th>
            </tr>

        <?php
            for($i = 0; $i < $books; $i++){

                if($xmlFile->book[$i]->price >= $priceFrom && $xmlFile->book[$i]->price <= $priceTo){
                    echo "<tr>";
                        echo "<td>" . $xmlFile->book[$i]->title . "</td>";
                        echo "<td>" . $xmlFile->book[$i]->year . "</td>";
                        echo "<td>$" . $xmlFile->book[$i]->price . "</td>";
                    echo "</tr>";
                }

            }
        ?>
        </table>
        <p><a href="http://isit.local/ass7/task3/task3c.php">Back</a></p>
    <?php }
?>

<?php else: ?>
    <div class="container-fluid">
        <div class="container">

            <h1>Price Range Book Search</h1>

            <form action="" method="POST">
                <label>Price Range From</label>
                <input type="text" name="price-search-from" class="form-control" />
                <label>Price Range To</label>
                <input type="text" name="price-search-to" class="form-control" />
                <input type="submit" class="btn btn-control" name="search-price-book" value="Submit" />
            </form>

        </div>
    </div>

<?php endif; ?>
</body>
</html>