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
	
	$sql = "SELECT Password FROM login WHERE Username='$un'";
	$result = $conn->query($sql);
	
	if ($result === $pwd) {
		
		header("location: http://localhost:8888/final_project/logged_in.html");
		exit();
	
	} elseif ($result === NULL) {
		
		header("location: http://localhost:8888/final_project/register.html");
		exit();
		
	} else {
		
		for ($x = 0; $x <= 3; x++) {
			
			echo '<script>alert("Failed to login. Please answer the following security question or check email to reset password")';
			
		}
		exit();
		
	}
	
	// only select stmnts can use this sql syntax
	

	// If the user does not exist, prompt register page
	// Otherwise, if there is a user match, then make sure the corresponding pwd matches
	// if pass matches to the one in db, then allow login
	// if pass does not match, prompt security question or email for reset pwd

	/*

	$pas = "admin123";
	
	if (($un == $a) && ($pwd == $pas)) {
		
		header("location: http://localhost:8888/final_project/success.html");
		exit();
		
	} else {
		
		echo "Access Denied!";
		
	}
	
	$conn->close();
	
	*/

?>