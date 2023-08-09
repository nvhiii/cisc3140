<?php

	$nm = $_POST["name"];
	$em = $_POST["email"];
	$g = $_POST["gender"];
	$ag = $_POST["age"];
	
	// The below is user/pwd, necessary for future login.
	
	// add another insert stmnt for another table
	
	$un = $_POST["uname"];
	$pass = $_POST["pwd"];
	
	// MySQL stmnt that inserts the values into the db, cool functionality
	
	// requires conn and sql
	
	INSERT INTO personal (Name, Email, Gender, Age) VALUES ("", "$em", "", "");
	
	/* Have to change all inputs, and change prompts on register page.
	
	 Will Have to Implements A form consisting of Radio (Gender), and Text box for Age, etc.
	 
	*/
	
	 

?>