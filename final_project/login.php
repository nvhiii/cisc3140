<?php

	// stuff needed to connect
	
	$serverName = "localhost";
	$username = "root";
	$password = "root";
	$dbName = "users";
	
	// Create connection

	$conn = new mysqli($serverName, $username, $password, $dbName);
	
	// Check connection
	
	if ($conn->connect_error) {
		
		die ("Connection failed: " . $conn->connect_error);
	
	}
	
	$un = $_POST["uname"];
	$pwd = $_POST["pwd"];
	
	$sql = "SELECT * FROM login WHERE Username='$un'";
	
	$a = "admin";
	$pas = "admin123";
	
	if (($un == $a) && ($pwd == $pas)) {
		
		header("location: http://localhost:8888/final_project/success.html");
		exit();
		
	} else {
		
		echo "Access Denied!";
		
	}

?>