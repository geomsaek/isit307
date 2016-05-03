<!doctype>
<html>
<head>
    <title>Task 4B</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css" />

</head>
<body>
<?php


 $lib = array(
    "double" => create_function('$a', 'return 2 * $a;'),
    "lower" => create_function('$a', 'return strtolower($a);'),
    "md5" => create_function('$a', 'return md5("$a");'),
    "ord" => create_function('$a', 'return ord($a);'),
    "mod" => create_function('$a', 'return $a % 2;'),
 );

if (count($_POST) > 0) {

    if(is_numeric($_POST['value'])){ ?>

        <div class="container-fluid">
            <div class="container">
                <h1>Results</h1>
                <h2>Double function</h2>
                <?php $double = $lib['double']($_POST['value']); echo $_POST['value'] . "* 2 = " . $double; ?>

                <h2>Even Function Test: Mod by 2</h2>
                <?php $mod = $lib['mod']($_POST['value']); echo $_POST['value'] . "% 2 = " . $mod; ?>

            </div>
        </div>

    <?php }else { ?>

        <div class="container-fluid">
            <div class="container">
                <h1>Results</h1>
                <h2>Lower Case</h2>
                <?php $lower = $lib['lower']($_POST['value']); echo $_POST['value'] . " = " . $lower; ?>

                <h2>MD5</h2>
                <?php $md = $lib['md5']($_POST['value']); echo $_POST['value'] . " = " . $md; ?>

                <h2>Ord</h2>
                <?php $ord = $lib['ord']($_POST['value']); echo $_POST['value'] . " = " . $ord; ?>
            </div>
        </div>

    <?php }

}else {

?>

<div class="container-fluid">
    <div class="container">
        <h2>Task 4B</h2>
        <form method="post" action="">
            <fieldset style="margin-top:15px;">
                <label>Value</label>
                <input type="text" value="" class="form-control" name="value" />
            </fieldset>
            <fieldset style="margin-top:15px;">
                <input type="submit" class="btn btn-primary" value="Submit" />
            </fieldset>
        </form>
    </div>
</div>
<?php } ?>

</body>
</html>