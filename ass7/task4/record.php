<!doctype>
<html>
<head>
    <?php session_start(); ?>

    <?php if(!isset($_SESSION['username'])){ header("Location: http://isit.local/ass7/task4/task4c.php"); } ?>

    <title>My Record</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<header>
    <?php include('inc/nav.php'); ?>
</header>
<body>
<div class="container-fluid">
    <div class="container">
        <?php

            require_once("scripts/db.php");
            $db = connect_db();
            $myres = array();
            $user = $_SESSION['username'];
            $sql = "SELECT * FROM CHECKOUT JOIN BOOKS ON CHECKOUT.bookid=BOOKS.bookid WHERE CHECKOUT.userID='" . $user . "'";

            $result = mysqli_query($db,$sql);
            $row;

            if(!empty($result)): ?>
                <table class="table-striped res-list" width="100%">
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                <?php while($row = mysqli_fetch_assoc($result)): ?>

                    <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['author']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><?php echo $row['checkoutdate']; ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php endif;
        ?>

    </div>
</div>

</body>

</html>
