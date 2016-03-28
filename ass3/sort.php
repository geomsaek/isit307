<?php

function get_sub_total($index, $array){

	$total = 0;

	for($i = 0; $i < sizeof($array[$index]); $i++){

		$total = $total + $array[$index][$i];
	}
	
	return $total;
}


function insertion_sort(&$a) {

	// Loop through all entries in the array
	$count = count($a);
	$temp;

	for ($i = 0; $i < $count; $i++) {
		// Save the current value which we are going to compare:
		$value = get_sub_total($i, $a);
		$temp = $a[$i];
		
		// Now loop backwards from the current value until we reach the
		// beginning of the array or a value less than our current one
		
		for ($x = $i - 1; ( ($x >= 0) && (get_sub_total($x,$a) > $value) ); $x--) {
			// Swap this value down one place:
			$a[$x + 1] = $a[$x];
		}

		// Now assign our value to its proper sorted position:
		$a[$x + 1] = $temp;
	}
}

// Prepare an array of values:
$values = array();
$values[0] = array(10,20,30,40,50,60); //210
$values[1] = array(23, 242, 12, 44, 93); // 414
$values[2] = array(90 , 34, 43, 55, 76, 79, 11); // 388
$values[3] = array(2, 4, 6, 54, 445, 11, 4032); // 4554
$values[4] = array(9, 33, 34, 223, 939, 49, 1); // 1288

insertion_sort($values);

for($i = 0; $i < sizeof($values); $i++){

	echo "<p>[ " . $i . " ] => </p>";
	for($k = 0; $k < sizeof($values[$i]); $k++){
		echo "<p style='padding-left:25px;'>[ " . $k . " ] => " . $values[$i][$k] . "</p>";
	}
}

?>