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

        if($enrolres->num_rows == 0) {

            $sql = "SELECT COUNT(*) AS Total FROM ENROLLED WHERE classname='" . $cname . "' AND classcode='" . $code . "'";
            $total = 0;
            $countres = exec_state($sql);

            while($row = mysqli_fetch_assoc($countres)){
               $total = $row['Total'];
            }

            if($total < 5) {

                $sql = "INSERT INTO ENROLLED VALUES(" . $studentid . ",'" . $cname . "','" . $code . "')";
                if ($db->query($sql) == TRUE) {
                    header("Location: http://isit.local/ass6/Enrolment.php?update=true");
                } else {
                    header("Location: http://isit.local/ass6/Enrolment.php?update=false");
                }
            }else {
                header("Location: http://isit.local/ass6/Enrolment.php?defined=true");
            }
        }else {
            header("Location: http://isit.local/ass6/Enrolment.php?defined=true");
        }

    endif;


?>