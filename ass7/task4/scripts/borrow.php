<?php

session_start();

    require('db.php');

    $db = connect_db();

    $item = $_POST['bookitems'];
    $status = $_POST['user-status'];
    $user = $_SESSION['username'];

    foreach($item as $val) {
        $sql = "INSERT INTO CHECKOUT VALUES('" . $val . "', '" . $user . "', '2016-12-01', '" . $status . "')";
        $db->query($sql);
    }
    header("Location: http://isit.local/ass7/task4/search.php?completed=true");
    exit;
    
?>