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

	// these values all use the name attr in html form

	$lnm = $_POST["lastName"];
	$fnm = $_POST["firstName"];

	$em = $_POST["email"];
	
	$g = $_POST["gender"];
	
	$ag = $_POST["age"];
	
	$conn->query("INSERT INTO personal (lastName, firstName, email, gender, age) VALUES ('$lnm', '$fnm', '$em', '$g', '$ag')");
	
	// below info for table for security q
	
	$asq = $_POST["answerSQ"];
	
	$sq = $_POST["sq"];
	
	$conn->query("INSERT INTO security (securityQ, securityANS) VALUES ('$sq', '$asq')"); // dunno whats up, its not getting data
	
	// The below is user/pwd, necessary for future login.
	
	$un = $_POST["uname"];
	
	$pass = $_POST["pwd"];
	
	$conn->query("INSERT INTO login (Username, Password) VALUES ('$un', '$pass')");
	
	header("Location: http://localhost:8888/final_project/login.html");
	
	$conn->close();
	
?>