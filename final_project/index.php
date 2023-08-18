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
        header("Location: http://localhost:8888/final_project/index.html");
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
  <script defer src="script.js"></script>
  
  <title>Hobbyist</title>

</head>

<body onload="liveTime()">

	<header class="navbar">
  
		<div class="left-side">
		
			<a href="index.php" class="logo"> <img src="hhhh.png"/></a>
		  
			<div class="dropdown">
				<button class="dropdown-button">Products</button>
				<div class="dropdown-content">
					<a href="store.php">Store</a>
					<a href="subscription.php">Subscription</a>
				</div>
			</div>
		  
			<div class="dropdown">
				<button class="dropdown-button">About</button>
				<div class="dropdown-content">
					<a href="contact.php">Contact us</a>
					<a href="about_us.php">About us</a>
					<a href="partnership.php">Partnerships</a>
					<a href="topic_upload.php">Topic Uploads</a>
				</div>
			</div>
      
		</div>
    
		<div class="empty-middle"></div> <!-- Empty middle section -->
    
		<div class="right-side">
			<div class="search-bar">
				<input type="text" id="search" placeholder="Search" />
				<span class="forward-slash">/</span>
				<span class="search-icon">🔍</span>
			</div>
			
			<div class="login-register">
				<?php if ($loggedIn) : ?>
					<!-- Show logout button if logged in -->
					<a href="logout.php" class="logout-button">Logout</a>
				<?php else : ?>
					<!-- Show login and register buttons if not logged in -->
					<a href="login.html" class="login-button">Login</a>
					<a href="register.html" class="register-button">Register</a>
				<?php endif; ?>
			</div>			
      
		</div>
	
	</header>
  
	<div class="live-clock">
		<h2 id="lt">12:00</h2>
	</div>
  
	<div class="heading">
	
		<h1> Crafting Connections, Fueling Passions. </h1>
		
		<div class="email-box">
		
			<form action="register.html" method="GET">
			
				<input type="email" name="email" id="email" placeholder="Email address">
				<button id="validateButton" onclick="register.html">Sign up for Hobbyist</button>
				
			</form>
			
		</div>
	
	</div>
  
</body>
</html>

<?php
$conn->close();
?>



