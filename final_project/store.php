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
        header("Location: http://localhost:8888/final_project/store.html");
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
  <title>Storefront</title>
</head>

<body>

	<header class="navbar navbar-sticky">
	
  
		<div class="left-side">
		  <a href="index.php" class="logo"> <img src="hhhh.png"/></a>
		</div>
		
		<div class="empty-middle"></div>
		
		<div class="right-side">
			
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
  
	<div id="cc1">
    
		<div class="storefront">
			<h2 class="storefront-title">Merchandise Store</h2>
			
			<br>
		  
			<div class="merchandise-container">
					
				<div class="card">
				  <img src="rengoku_nice.png" alt="Nice!">
				  <h1>Rengoku Sticker</h1>
				  <p class="price">$3.99</p>
				  <p>High quality vinyl sticker w/ matte finish, better alternative than a donut</p>
				  <p><button>Add to Cart</button></p>
				</div>
				
				<br>
				
				<div class="card">
				  <img src="donut.png" alt="Donut">
				  <h1>Donut Sticker</h1>
				  <p class="price">$3.99</p>
				  <p>High quality vinyl sticker w/ a matte finish.</p>
				  <p><button>Add to Cart</button></p>
				</div>
				
				<!-- Add more merchandise cards -->
			
			</div>
			
		</div>
		
	</div>
	
</body>

</html>
