<?php
	
	
	$multiOne = array(
		array(40,230, 201, array(10,12,102,11,1210,1221,122),),
		
		array(50,30,10, array(6848,23899,1220, array(120, 11, array(1,2,3,4,5,6),),),),
		
		array(2,22,211,392,232,2380,192,930, array(1,346,236,52,6,2,35,345,57),2223,2434,543,345),
		array(223,2,4,465,567,364,35,634,576,58,58),
	);

	
	
	function findLowest($array){
		
		$lowest = 999999999999;
		$temp = 999999999999;
		
		if(gettype($array) == "array"){
		
			return findLowest($array[0]);
		}else {
		
			for($i = 0; $i < sizeof($array); $i++){
				return findLowest($array[$i]);
			}
		}
		
		return $lowest;
	}
	
	echo findLowest($multiOne);


?>