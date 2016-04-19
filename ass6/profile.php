<!doctype>
<html>
<head>
    <?php session_start();
        include("scripts/manager.php");
        $info = get_user_info();
    ?>

    <?php if(!isset($_SESSION['username'])){ header("Location: http://isit.local/ass6/?logout=true"); } ?>
    <title>Welcome <?php echo $_GET['name']; ?></title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>

    <div class="container-fluid">
        <div class="container">
            <header>
                <?php include('inc/nav.php'); ?>

                <div class="col-sm-6">
                    <h3>Welcome <?php echo $info['fname']; ?></h3>
                </div>

                <div class="col-sm-6">
                    <h6 id="logout-button" class="btn btn-primary"><a href="http://isit.local/ass6/?logout=true">Logout</a></h6>
                </div>
            </header>
        </div>
    </div>

    <div class="container-fluid banner" style="padding:0;margin-top:25px;margin-bottom:50px;">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">


            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="images/image1.jpg" alt="Chania" style="display: block;width:100%;float:left;">
                </div>

                <div class="item">
                    <img src="images/image1.jpg" alt="Chania" style="display: block;width:100%;float:left;">
                </div>
                <div class="item">
                    <img src="images/image1.jpg" alt="Chania" style="display: block;width:100%;float:left;">
                </div>
                <div class="item">
                    <img src="images/image1.jpg" alt="Chania" style="display: block;width:100%;float:left;">
                </div>
                <div class="item">
                    <img src="images/image1.jpg" alt="Chania" style="display: block;width:100%;float:left;">
                </div>

            </div>

        </div>
    </div>

    <div class="container-fluid banner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam mollis semper libero ac vehicula. Curabitur aliquam non turpis at malesuada. Aliquam vehicula auctor venenatis. Quisque sem odio, interdum eu ex id, dictum scelerisque augue. Donec ac aliquet turpis, ac lacinia odio. Phasellus metus lacus, congue eget est at, consectetur fringilla dui. Ut metus turpis, lobortis non mattis gravida, ultricies sit amet risus. Ut ultricies, turpis nec porttitor ullamcorper, augue felis vehicula quam, sit amet pharetra massa dolor a nisi. Donec finibus facilisis orci ut mollis. Praesent aliquam felis risus, non finibus nisi interdum eu. Donec et velit pretium, eleifend dolor vitae, fringilla felis. Integer non imperdiet urna.</p>

                    <p>Donec ut vulputate felis. Etiam pellentesque dolor nec nibh congue sagittis. Maecenas aliquam lorem at scelerisque aliquet. Fusce sodales aliquam sapien, id egestas diam. Mauris sed nunc nec nibh gravida ornare tempor sed velit. In dignissim accumsan diam, ut dapibus ligula. Donec non congue elit. Morbi vulputate mattis diam eget tempor. Vestibulum sed nibh accumsan, vestibulum dui eu, cursus eros. Nullam consectetur dolor tortor. Vestibulum dapibus leo et urna posuere mattis.</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>