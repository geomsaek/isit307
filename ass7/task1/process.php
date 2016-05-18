<?php
$title = "Process";
$page = "";
session_start();
require_once('include/header.php');
require_once('include/navbar.php');


function standardize_credit($num){
    return preg_replace('/[^0-9]/', '', $num);
}

function validate_credit($num, $type){
    $len = strlen($num);
    $d2 = substr($num, 0, 2);

    if ((($type == 'v') && (($num{0} != 4) ||
                !(($len == 13) || ($len == 16)))) ||

        (($type == 'm') && (($d2 < 51) ||
                ($d2 > 56) || ($len != 16))) ||

        (($type == 'a') && (!(($d2 == 34) || ($d2 == 37)) || ($len != 15))) ||

        (($type == 'd') && ((substr($num, 0, 4) != 6011) || ($len != 16)))
    ) {

        return false;
    }

    $digits = str_split($num);

    $digits = array_reverse($digits);

    foreach (range(1, count($digits) - 1, 2) as $x) {
        $digits[$x] *= 2;

        if ($digits[$x] > 9) {
            $digits[$x] = ($digits[$x] - 10) + 1;
        }
    }

    $checksum = array_sum($digits);

    return (($checksum % 10) == 0) ? true : false;
}

?>
<div class="container">
    <div class = "page-header">
        <h3>Thank you</h3>
    </div>
    <?php

    if (!isset($_SESSION['validsubmit']) || !$_SESSION['validsubmit']) {
        echo "ERROR:  Invalid form submission, or form already submitted!";
    } else {
        if (isset($_POST['card_number']) && isset($_POST['type']) && validate_credit(standardize_credit($_POST['card_number']), $_POST['type'])) {

            $_SESSION['validsubmit'] = false;
            echo "Your card is ok";
        } else {
            echo "Invalid card";
        }
    }

    ?>

</div>

