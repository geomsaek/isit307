<!doctype>
<html>
<head>
    <?php session_start(); ?>

    <?php if(isset($_SESSION['username'])){ header("Location: http://isit.local/ass7/task4/profile.php"); } ?>
    <title>Welcome</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<?php 

function hanoi($plates, $from, $to, &$moves) { 
    while($plates > 0) { 
        $using = 6 - ($from + $to); 
        hanoi(--$plates, $from, $using, $moves); 
        $from = $using; 
        $moves++;
    } 
} 

?>


<body>

<div class="container-fluid">
    <div class="container">
    
    	<?php if(isset($_POST['solution'])):    	
	    	$moves = 0;
			hanoi($_POST['user-input'], 1, 3, $moves); 
			echo "<h1>Total moves for " . $_POST['user-input'] . " disks = " . $moves . "</h1>";
    	?>
    	
    	<?php else: ?>
    		
    		<h1>Towers of Hanoi</h1>
    		
    		<form action="" method="POST">
    			<label>Enter the amount of plates for the Towers of Hanoi problem</label>
    			<input type='text' name='user-input' />
    			<input type='submit' name='solution' value='Submit' class='btn btn-control' />
    		</form>
    	<?php endif; ?>
    
    </div>
</div>

</body>
</html>