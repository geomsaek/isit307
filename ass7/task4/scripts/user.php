<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 6/04/2016
 * Time: 4:15 PM
 */


require_once("db.php");

$db = connect_db();
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM MEMBERS WHERE userID='" . $username . "' AND password='" . $password . "'";
$result=mysqli_query($db,$sql);
$result;

if(!empty($result)) {
    // Associative array
    $row = mysqli_fetch_assoc($result);

    print_r($row);
    session_start();
    $_SESSION['username'] = $row['userID'];
    $_SESSION['fname'] = $row['fname'];
    $_SESSION['surname'] = $row['surname'];

    header("Location: http://isit.local/ass7/task4/profile.php");
    exit;
}else {
    header("Location: http://isit.local//ass7/task4/task4c.php?loginerror=false");
    exit;
}



?>