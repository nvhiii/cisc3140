<?php

	// 1st method to create numeric arrays

	$cars = array("BMW", "Lambo", "Porsche");
	
	echo $cars[1];
	
	print "<br/>";
	
	// 2nd method to create numeric arrays
	
	$trucks[0] = "Toyota";
	$trucks[1] = "Chevy";
	$trucks[2] = "Ford";
	
	echo "Which truck brand do you prefer?" . " " . $trucks[2] . " or " . $trucks[1];
	
	print "<br/>";
	
	// 1st method to create associative arrays
	
	$dogs = array("Collie"=>25, "GS"=>17, "GR"=>5); // must have arrow with equals sign !! 
	
	echo $dogs["Collie"];

?>