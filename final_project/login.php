<?php

	$un = $_POST["uname"];
	$pwd = $_POST["pwd"];
	
	SELECT * FROM "login" WHERE Username="$un";
	
	$a = "admin";
	$pas = "admin123";
	
	if (($un == $a) && ($pwd == $pas)) {
		
		header("location: http://localhost:8888/final_project/success.html");
		exit();
		
	} else {
		
		echo "Access Denied!";
		
	}

?>