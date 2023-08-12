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

	$nm = $_POST["personName"];
	$em = $_POST["email"];
	$g = $_POST["gender"];
	$ag = $_POST["age"];
	
	$sql = "INSERT INTO personal (Name, Email, Gender, Age) VALUES ('$nm', '$em', '$g', '$ag')";
	INSERT INTO `personal`(`Name`, `Email`, `Gender`, `Age`) VALUES ('$nm', '$em', '$g', '$ag');
	
	// The below is user/pwd, necessary for future login.
	
	$un = $_POST["uname"];
	$pass = $_POST["pwd"];
	
	$sql = "INSERT INTO login (Username, Password) VALUES ('$un', '$pass')";
	
?>