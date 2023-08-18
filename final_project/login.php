<?php

session_start();

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
	
if ($result->num_rows == 1) {
		
	$row = $result->fetch_assoc();
	$plainTextPasswordFromDB = $row["Password"];

	// Compare the entered password with the password from the database
			
	if ($pwd === $plainTextPasswordFromDB) {
				
		// Set user as logged in using session
        $_SESSION["logged_in"] = true;
        $_SESSION["username"] = $un;
		
		header("Location: second.php");

        // Redirect to the logged-in page
        header("Location: http://localhost:8888/final_project/logged_in.html");
		header("Location: http://localhost:8888/final_project/logged_in.php");
        exit;
				
	} else {
				
		echo "<script>alert('Invalid password'); window.location.href = 'http://localhost:8888/final_project/login.html';</script>";
		exit;
		
	}
		
} else {
    echo "<script>alert('Username not found. Please create an account.'); window.location.href = 'http://localhost:8888/final_project/register.html';</script>";
    exit;
}

$conn->close();
	
?>
