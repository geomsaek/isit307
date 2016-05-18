<?php

	function getLowest($arr, &$smallest)
	{
		if (is_array($arr))
		{
			foreach ($arr as $key => $value)
			{
				if(is_array($value))
				{
					getLowest($value, $smallest);
				}
				else if (is_numeric($value))
				{
					if ($smallest > $value)
					{
						$smallest = $value;
					}
				}
			}
		}
	}
	
	$arr1 = array(0, array(1,2,3), array(-9,6,array(3,-1112), 3));
	
	$smallestOne = PHP_INT_MAX;
	getLowest($arr1, $smallestOne);
	print_r($arr1);
	echo "<p>Smallest: " . $smallestOne . "</p>";
	
	$arr2 = array(123, 34,2,42,2,4,421,0, array(1,3921,9438), array(array(1,3,4), array(382,2)),232);
	$smallestTwo = PHP_INT_MAX;
	getLowest($arr2, $smallestTwo);
	print_r($arr2);
	echo "<p>Smallest: " . $smallestTwo . "</p>";
	
	$arr3 = array(1,23,23,2,4,4,3,2,23244,2, -33205402,232, array(23,235, array(1,3,4,5, array(32,-233,2454, -99999))));
	$smallestThree = PHP_INT_MAX;
	getLowest($arr3, $smallestThree);
	print_r($arr3);
	echo "<p>Smallest: " . $smallestThree . "</p>";
	
	
?>