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
	
	// Assign php var to html form vals for 'personal' table gotten via POST

	// these values all use the name attr

	$lnm = $_POST["lastName"];
	$fnm = $_POST["firstName"];

	$em = $_POST["email"];
	
	$g = $_POST["gender"];
	
	$ag = $_POST["age"];
	
	$sq = $_POST["answerSQ"];
	
	$sql = INSERT INTO personal (lastName, firstName, email, gender, age, security) VALUES ("$lnm", "$fnm", "$em", "$g", "$ag", "$sq");
	
	header("location: http://localhost:8888/final_project/success.html");
	
	// The below is user/pwd, necessary for future login.
	
	/*
	
	$un = $_POST["uname"];
	$pass = $_POST["pwd"];
	
	$sql = INSERT INTO login (Username, Password) VALUES ('$un', '$pass');
	
	*/
?>