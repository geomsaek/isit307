<!DOCTYPE>
<html>
<head>
    <title>Sell your car</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link href="http://isit.local/ass2/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="http://isit.local/ass2/css/style.css">
    <script src="http://isit.local/ass2/js/fileinput.js" type="text/javascript"></script>
    <script type="text/javascript" src="http://isit.local/ass2/js/fileinput_locale_fr.js"></script>
    <script type="text/javascript" src="http://isit.local/ass2/js/fileinput_locale_es.js"></script>
    <script type="text/javascript" src="http://isit.local/ass2/js/lib.js"></script>
</head>

<body>

<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= '/ass2/inc/nav.php';
    include_once($path);
?>
<?php if(isset($_POST['sell-car'])):


    $file = $_FILES['userfile'];
    if($file['size'] > 1000000 || $file['error'] > 0):

        header("Location: http://isit.local/ass2/sell.php?uploaderror=true");
        exit;

    else:
        $fname = $_POST['first-name'];
        $surname = $_POST['surname'];
        $price = $_POST['price'];
        $rego = $_POST['rego'];
        $service = $_POST['service-list'];
        $model = $_POST['model'];
        $year = $_POST['year'];
        $km = $_POST['distance'];
        $phone = $_POST['phone'];
        $owners = $_POST['owners'];

        $loc = "images/" . basename($file['name']);
        move_uploaded_file($file['tmp_name'], $loc);

        $directory = fopen("directory.txt",'a');
        $entry = $fname . ":" . $surname . ":" . $km . ":" . $price . ":" . $phone . ":" . $rego . ":" . $owners . ":" . $service . ":" . $model . ":" . $year . ":" . basename($file['name']) . chr(0x0D) . chr(0x0A);
        fwrite($directory,$entry);
        fclose($directory);
?>

        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1>Thanks for your vehicle registration!</h1>
                        <?php header("Location: http://isit.local/ass2/sell.php/?rego=true"); ?>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>


<?php else: ?>
    <section id="seller-page">

        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">



                        <h1>Sell my car: Register Information</h1>

                        <?php if(isset($_GET['uploaderror'])): ?>
                            <h3 class="error-header">There was an error with your upload. Please ensure the size is 1MB or less</h3>
                        <?php elseif(isset($_GET['rego'])): ?>
                            <h3 class="success-header">Thanks for your vehicle registration!</h3>
                        <?php endif ?>

                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="col-sm-12">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="first-name" id="my-fname" />
                            </div>

                            <div class="col-sm-12">
                                <label>Surname</label>
                                <input type="text" class="form-control" name="surname" id="my-surname" />
                            </div>

                            <div class="col-sm-12">
                                <label>Price</label>
                                <input type="text" class="form-control" name="price" id="my-price" />
                            </div>

                            <div class="col-sm-12">
                                <label>Registration</label>
                                <input type="text" class="form-control" name="rego" id="my-rego" />
                            </div>

                            <div class="col-sm-12">
                                <label>Service List</label>
                                <input type="text" class="form-control" name="service-list" id="my-service" />
                            </div>

                            <div class="col-sm-12">
                                <label>Make/Model</label>
                                <input type="text" class="form-control" name="model" id="my-model" />
                            </div>

                            <div class="col-sm-12">
                                <label>Mileage</label>
                                <input type="text" class="form-control" name="distance" id="my-distance" />
                            </div>

                            <div class="col-sm-12">
                                <label>Year</label>
                                <input type="text" class="form-control" name="year" id="my-year" />
                            </div>

                            <div class="col-sm-12">
                                <label>Contact Number</label>
                                <input type="text" class="form-control" name="phone" id="my-phone" />
                            </div>

                            <div class="col-sm-12">
                                <label>Number of owners</label>

                                <select name="owners" class="form-control">
                                    <?php for($i = 1; $i < 13; $i++): ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>

                            <div class="col-sm-12">
                                <label>Car Image</label>
                                <label class="control-label">Select File</label>
                                <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                                <input id="file-0a" name="userfile" class="file" type="file" data-min-file-count="1">
                                <br>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>

                            <div class="col-sm-12">
                                <input type='submit' class="btn btn-default" name='sell-car' value='Sell My Car' />
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </section>

<?php endif;
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= '/ass2/inc/footer.php';
    include_once($path);
?>
<script type="text/javascript">
    jQuery(document).ready(function(){

        var exp = new RegExp(/[^a-zA-Z\s]+$/);
        var regoexp = new RegExp(/[^a-zA-Z\s0-9]+$/);
        var priceexp = new RegExp(/[^0-9\s\$]+$/);
        var serviceexp = new RegExp(/[^a-zA-Z\s\,0-9]+$/);
        var yearexp = new RegExp(/[^0-9]+$/);
        var phoneexp = new RegExp(/[^0-9\+\s]+$/);

        keyfunc('#my-fname',exp);
        keyfunc('#my-surname',exp);
        keyfunc('#my-price',priceexp);
        keyfunc('#my-rego',regoexp);
        keyfunc('#my-service',serviceexp);
        keyfunc('#my-model',regoexp);
        keyfunc('#my-distance',regoexp);
        keyfunc('#my-year',yearexp);
        keyfunc('#my-phone',phoneexp);

    });

</script>
</body>

</html>