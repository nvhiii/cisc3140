<?php

	$name = "Nahi";

	print "<br/>";
	$name2 = "Khan";
	
	echo $name . " " . $name2;
	
	$d = date("D");
	
	print "<br/>";
	
	if ($d == "Fri") {
		
		echo "Awesome it's Friday";
		
	} else {
		
		echo "Damn it isn't Friday";
		
	}
	
	print "<br/>";
	
	$y = 101;
	
	switch ($y) {
		
		case $y > 100:
			
			echo "The number is above 100";
			break; // must add break or the switch will not work. It will be incorrect.
			
		case $y < 100;
		
			echo "The number is below 100";
			break;
			
		case $y == 100;
		
			echo "The number is 100";
			break;
			
	}
	
	// left off on conditional stmnts
	

?>