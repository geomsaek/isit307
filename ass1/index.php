<!doctype>

<html>
<head>
    <title>Company Page</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script>
        jQuery(document).ready(function(){
            var message = "";

            jQuery('#mort-calc-form').submit(function(){
                if(isNaN(jQuery('#amount').val()) || jQuery('#amount').val() <= 0){
                    if(message.length == 0){
                        message = "Please enter a valid";
                    }
                    message = message + " mortgage amount";
                    jQuery('#error-container').find('h3').text(message);
                    message ="";
                   return false;
                }

                if(isNaN(jQuery('#rate').val()) || jQuery('#rate').val() <= 0){
                    if(message.length == 0){
                        message = "Please enter a valid";
                    }
                    message = message + ", rate";
                    jQuery('#error-container').find('h3').text(message);
                    message ="";
                    return false;
                }

                if(isNaN(jQuery('#years').val()) || jQuery('#years').val() <= 0){
                    if(message.length == 0){
                        message = "Please enter a valid";
                    }
                    message = message + ", year";
                    jQuery('#error-container').find('h3').text(message);
                    message ="";
                    return false;
                }
                message = "";
                return true;
            });

        });

        function isInt(n){
            return Number(n) === n && n % 1 === 0;
        }

        function isFloat(n){
            return Number(n) === n && n % 1 !== 0;
        }

    </script>
</head>

<body>
    <header>
        <div class="container-fluid">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12" id="logo"><img src="images/logo.jpg" /></div>

                </div>

            </div>
        </div>

        <div class="container-fluid banner">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">


                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="images/image1.jpg" alt="Chania">
                    </div>

                    <div class="item">
                        <img src="images/image1.jpg" alt="Chania">
                    </div>
                    <div class="item">
                        <img src="images/image1.jpg" alt="Chania">
                    </div>
                    <div class="item">
                        <img src="images/image1.jpg" alt="Chania">
                    </div>
                    <div class="item">
                        <img src="images/image1.jpg" alt="Chania">
                    </div>

                </div>

            </div>
        </div>
    </header>

    <section>

        <?php if(!isset($_POST['cal-amount'])): ?>

        <div class="container-fluid">
            <div class="container form-container">

                <h3>Mortagage Calculator</h3>

                <form method="POST" action="" id="mort-calc-form" onsubmit="return testVals()">
                    <div id="error-container" class="container-fluid">
                        <h3></h3>
                    </div>
                    <div class="col-sm-12">
                        <label>Mortgage Amount</label>
                        <input type="text" name="mort-amount" class="form-control" id="amount" placeholder="Mortgage Amount">
                    </div>

                    <div class="col-sm-12">
                        <label>Interest Rate</label>
                        <input type="text" name="interest-rate" class="form-control" id='rate' placeholder="Interest Rate">
                    </div>

                    <div class="col-sm-12">
                        <label>Mortage Years</label>
                        <input type="text" name="mortgage-years" class="form-control" id='years' placeholder="Number of Years">
                    </div>

                    <div class="col-sm-12 button">
                        <button type="submit" name='cal-amount' class="btn btn-default">Submit</button>
                    </div>
                </form>

            </div>
        </div>
        <?php else:
            $matches;
            $amount = trim($_POST['mort-amount']);
            $rate = trim($_POST['interest-rate']);
            $year = trim($_POST['mortgage-years']);
            $error = "";

            if(preg_match('/[^\d|^\.]+/',$amount, $matches,PREG_OFFSET_CAPTURE) != 0){
                    $error = "Please enter a correct number";
            }
            if(preg_match('/[^\d|^\.]+/',$rate, $matches,PREG_OFFSET_CAPTURE) != 0){
                if($amount <= 0) {
                    $error = "Please enter a correct number";
                }
            }
            if(preg_match('/[^\d|^\.]+/',$year, $matches,PREG_OFFSET_CAPTURE) != 0){
                if($amount <= 0) {
                    $error = "Please enter a correct number";
                }
            }

            if($amount <= 0 || $rate <= 0 || $year <= 0){
                $error = "Please enter a positive number";
            }

            if(empty($error)):
                $loan = $amount;
                $irate = $rate / 12;
                $payNum = $year * 12;

                $monthPay = $loan * $irate;
                $monthDiv = (1+$irate)^$payNum;
                $temp = 1 / $monthDiv;
                $finalDiv = $monthPay / (1-$temp);

                ?>
                <div class="container-fluid">
                    <div class="container">
                        <div class="col-sm-12">
                            <h3>Monthly Repayment value is: $<?php echo $finalDiv; ?></h3>
                        </div>

                    </div>
                </div>
            <?php else: ?>
                <div class="container-fluid">
                    <div class="container">
                        <div class="col-sm-12">
                            <h3>Please enter a correct number </h3>
                        </div>

                    </div>
                </div>

            <?php endif; ?>
        <?php endif; ?>

    </section>

</body>
</html>