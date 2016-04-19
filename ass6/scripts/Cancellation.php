<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 11/04/2016
 * Time: 10:34 PM
 */

require_once("db.php");
require_once("manager.php");
session_start();
if(isset($_POST['enrolment-add'])):
    $db = connect_db();
    $studentid = get_userid($_SESSION['username']);
    $code = $_POST['class-to-enrol-code'];
    $cname = $_POST['class-name-text'];

    $find = "SELECT * FROM ENROLLED WHERE studentid=" . $studentid . " AND classname='" . $cname . "' AND classcode='" . $code . "'";
    $enrolres = exec_state($find);

    if($enrolres->num_rows > 0) {
        $find = "DELETE FROM ENROLLED WHERE studentid=" . $studentid . " AND classname='" . $cname . "' AND classcode='" . $code . "'";

        if($db->query($find) == TRUE):
            header("Location: http://isit.local/ass6/Cancellation.php?update=true");
        endif;

    }else {
        header("Location: http://isit.local/ass6/Cancellation.php?undefined=true");
    }

endif;


?>