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
	
	$asq = $_POST["answerSQ"];
	
	$conn->query("INSERT INTO personal (lastName, firstName, email, gender, age, security) VALUES ('$lnm', '$fnm', '$em', '$g', '$ag', '$asq')");
	
	// The below is user/pwd, necessary for future login.
	
	$un = $_POST["uname"];
	
	$pass = $_POST["pwd"];
	
	$conn->query("INSERT INTO login (Username, Password) VALUES ('$un', '$pass')");
	
	// use multi query
	
	
?>