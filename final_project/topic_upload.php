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

        // Redirect to the logged-in page
        header("Location: http://localhost:8888/final_project/topic_upload.html");
        exit;
				
	}
	
}

$loggedIn = isset($_SESSION["logged_in"]) && $_SESSION["logged_in"];
$loggedInUsername = isset($_SESSION["username"]) ? $_SESSION["username"] : '';

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="styles.css">
  
  <title>Topic Upload</title>
  
</head>

<body>

  <header class="navbar">
    <div class="left-side">
      <a href="index.html" class="logo"> <img src="hhhh.png"/></a>
    </div>
    <div class="empty-middle"></div>
    <div class="right-side">
      
		<?php if ($loggedIn) : ?>
			<!-- Show logout button if logged in -->
			<a href="logout.php" class="logout-button">Logout</a>
		<?php else : ?>
			<!-- Show login and register buttons if not logged in -->
			<a href="login.html" class="login-button">Login</a>
			<a href="register.html" class="register-button">Register</a>
		<?php endif; ?>	  
	  
    </div>
  </header>
  
  <div>
    <form id="b3" class="topic-form">
      <label for="topic">Upload a Topic</label>
      <input type="text" id="topic" name="topic" placeholder="Enter topic name" required>
      
      <label for="file">Select a File</label>
      <input type="file" id="file" name="file" accept=".pdf, .doc, .docx" required>
      
      <input type="submit" value="Submit">
    </form>
  </div>
</body>

</html>
