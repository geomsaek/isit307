<!doctype>

<html>
<head>
    <title>Company Page</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <?php require_once('search.php'); ?>
</head>

<body>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="container-fluid">
                    <div class="row">
                        <form method="POST" action="interest.php">
                            <div class="container-fluid form-row">
                                <h3>Express your interest</h3>
                            </div>
                            <div class="container-fluid form-row">
                                <label>Your Name</label>
                                <input type="text" class="form-control" id="express-name" name="interest-name" />
                            </div>

                            <div class="container-fluid form-row">
                                <label>Plate Number</label>
                                <input type="text" class="form-control" id="express-licence-num" name="interest-lic-num" />
                            </div>

                            <div class="container-fluid form-row">
                                <label>Proposed Price</label>
                                <input type="text" class="form-control" id="express-price" name="interest-price" />
                            </div>

                            <div class="container-fluid form-row">
                                <label>Contact Number</label>
                                <input type="text" class="form-control" id="express-contact" name="interest-contact" />
                            </div>

                            <div class="container-fluid form-row">
                                <input type="submit" name="express-interest" value="Express Interest" class="btn btn-primary" />
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <header>
        <?php if(isset($_GET['enquiry'])): ?>
            <?php if($_GET['enquiry']): ?>
                <div class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2>Thanks! Your enquiry has been submitted!</h2>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

    </header>

    <?php if(isset($_POST['submit-search'])):

        $userSearch = array();
        $userSearch[0] = $_POST['search-lic-num'];
        $userSearch[1] = $_POST['search-owners'];
        $userSearch[2] = $_POST['search-lic-num'];
        $userSearch[3] = false;
        if($_POST['search-type'] != "basic"):
            $userSearch[3] = true;
        endif;


        $results= open_read_file();

        if(sizeof($results) > 0): ?>
            <section>
                <div class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1>Your search results</h1>
                            </div>

                            <div class="col-sm-12">
                                <?php display_results($results, $userSearch); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php else : ?>
            <section>
                <div class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <p>No Search results</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

    <?php else: ?>
            <section>

                <div class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1>Search Cars</h1>

                                <div class="container-fluid">
                                    <p>Please enter the details of your search</p>
                                </div>
                                <form id="car-search-form" action="" method="POST">
                                    <div class="container-fluid">
                                        <label>Licence Plate Number</label>
                                        <input type="text" class="form-control" id="licence-num" name="search-lic-num" />
                                    </div>

                                    <div class="container-fluid">
                                        <label>Owner Count</label>
                                        <input type="text" class="form-control" id="owner-count" name="search-owners" />
                                    </div>

                                    <div class="container-fluid">
                                        <label>Services</label>
                                        <input type="text" class="form-control" id="service-list" name="search-lic-num" />
                                    </div>

                                    <div class="container-fluid">
                                        <label>Search type</label>
                                        <select name="search-type" class="form-control">
                                            <option value="basic">Basic</option>
                                            <option value="Advanced">Advanced</option>
                                        </select>
                                    </div>


                                    <div class="container-fluid">
                                        <input type="submit" name="submit-search" class="btn btn-default" value="Search" />
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
    <?php endif; ?>


    <footer>



    </footer>

</body>
</html>