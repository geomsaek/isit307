<!doctype>
<html>
<head>
    <title>Welcome</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<?php


function romanic_number($integer, $upcase = true)
{
    $table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9, 'V'=>5, 'IV'=>4, 'I'=>1);
    $return = '';
    while($integer > 0)
    {
        foreach($table as $rom=>$arb)
        {
            if($integer >= $arb)
            {
                $integer -= $arb;
                $return .= $rom;
                break;
            }
        }
    }

    return $return;
}

?>
<body>
<div class="container-fluid">
    <div class="container" style="padding-top:2%;">
        <h2>Task 2A - Roman Numeral Converter</h2>
        <?php if(!isset($_POST['convert-num'])): ?>
            <form action="" method="POST">
                <div class="container" style="padding-top:2%;">
                    <label>User Value</label>
                    <input type="text" name="user-value" class="form-control"/>
                </div>
                <div class="container" style="padding-top:2%;">
                    <input type="submit" value="Submit" class="btn btn-primary" name="convert-num" />
                </div>
            </form>
        <?php else:

            $user = $_POST['user-value'];
            $rep = preg_replace("/[^0-9]/","",$user);
            $roman = romanic_number($rep);
        ?>
            <h2>Your Roman Number is: </h2>
            <p><?php echo $roman; ?></p>

        <?php endif; ?>
    </div>
</div>

</body>

</html>
