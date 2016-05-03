<!doctype>
<html>
<head>
    <?php session_start(); ?>

    <?php if(!isset($_SESSION['username'])){ header("Location: http://isit.local/ass7/task4/task4c.php"); } ?>

    <title>Welcome</title>
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
        <?php if(isset($_GET['completed'])): ?>
            <h3>Transaction completed successfully</h3>
        <?php endif; ?>
        <?php if(!isset($_POST['search-book-submit'])): ?>
            <h1>Search Books</h1>
            <form action="" method="POST">

                <div class="container">
                    <div class="row">
                        <div class="col-sm-12" style="margin-bottom:2%;">
                            <label>Book Title</label>
                            <input type="text" name="book-title" class="form-control" />
                        </div>

                        <div class="col-sm-12" style="margin-bottom:2%;">
                            <label>Author</label>
                            <input type="text" name="book-author" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="container">
                    <input type="submit" name="search-book-submit" class="btn btn-primary" value="Search Books" />
                </div>
            </form>

        <?php else: ?>

            <?php
                require_once("scripts/db.php");
                $db = connect_db();
                $myres = array();
                $sql = "SELECT * FROM BOOKS WHERE title LIKE '%" . $_POST['book-title'] . "%'";

                if(strlen($_POST['book-author']) > 0){
                    $sql = $sql . " OR author LIKE '%" . $_POST['book-author'] . "%'";
                }

                $result = mysqli_query($db,$sql);
                $row;

                if(!empty($result)):

                    $counter = 0;

                    while($row = mysqli_fetch_assoc($result)){

                        $booksql = "SELECT checkoutdate, status FROM CHECKOUT WHERE bookid='" . $row['bookid'] . "'";

                        $bresult = mysqli_query($db,$booksql);
                        $brow;

                        $myres[$counter]['bookid'] = $row['bookid'];
                        $myres[$counter]['title'] = $row['title'];
                        $myres[$counter]['author'] = $row['author'];
                        $myres[$counter]['location'] = $row['location'];

                        if(!empty($bresult)){

                            while($brow = mysqli_fetch_assoc($bresult)){
                                $myres[$counter]['checkoutdate'] = $brow['checkoutdate'];
                                $myres[$counter]['status'] = $brow['status'];
                                break;
                            }
                        }

                        $counter++;
                    }
                endif;
            ?>

            <h2>Search Results</h2>
            <form action="scripts/borrow.php" id="book-enrol" method="POST">
                <table class="table-striped res-list">
                    <tr>
                        <th>Action</th>
                        <th>Book ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Return Date/Hold Date Expire</th>
                        <th>Status</th>
                        <th>Location</th>
                    </tr>
                <?php for($i = 0; $i < sizeof($myres); $i++): ?>
                    <div class="container">
                        <tr>
                            <?php if(empty($myres[$i]['status'])): ?>
                                <div class="wrapper">
                                <td><input name="bookaction[]" type="checkbox" class="action-box-check"/></td>
                                <td><?php echo $myres[$i]['bookid']; ?><input class='book-id-field' type="text" hidden="hidden" name="bookid[]" value="<?php echo $myres[$i]['bookid']; ?>" /></td>
                                </div>
                            <?php else: ?>
                                <td></td>
                                <td><?php echo $myres[$i]['bookid']; ?></td>
                            <?php endif; ?>

                            <td><?php echo $myres[$i]['title']; ?></td>
                            <td><?php echo $myres[$i]['author']; ?></td>
                            <?php if(!empty($myres[$i]['checkoutdate'])): ?>
                                <td><?php echo $myres[$i]['checkoutdate']; ?></td>
                            <?php else: ?>
                                <td>Available</td>
                            <?php endif; ?>

                            <?php if(!empty($myres[$i]['status'])): ?>
                                <td><?php echo $myres[$i]['status']; ?></td>
                            <?php else: ?>
                                <td>Available</td>
                            <?php endif; ?>
                            <td><?php echo $myres[$i]['location']; ?></td>

                        </tr>
                    </div>

                <?php endfor;  ?>
                </table>
                <div class="container" style="padding-top:2%;padding-bottom:2%;">
                    <label>Borrow/Hold</label>
                    <select name="user-status" class="form-control">
                        <option value="borrowed">Borrow</option>
                        <option value="hold">Hold</option>
                    </select>

                </div>

                <div id="book-select"></div>

                <div class="container">
                    <input type="submit" name="action-book" class="btn btn-primary" value="Checkout" />
                </div>
            </form>

        <?php endif; ?>

    </div>
</div>

<script>
    jQuery(document).ready(function(){

        jQuery('.action-box-check').each(function(){
            jQuery(this).change(function(){
                var id = jQuery(this).parent().parent().find('.book-id-field').val()
                if(jQuery(this).is(':checked')){

                    var field = '<input name="bookitems[]" type="text" class="item" id="' + id + '" value="' + id + '" />';
                    jQuery('#book-select').append(field);
                }else {
                    jQuery('#book-select').find('#' + id).remove();

                }
            })

        });

    });

</script>
</body>

</html>
