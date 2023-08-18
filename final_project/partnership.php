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
        header("Location: http://localhost:8888/final_project/partnership.html");
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
  <title>Partnership</title>
</head>

<body>
  <header class="navbar navbar-sticky">
    <div class="left-side">
      <a href="index.php" class="logo"><img src="hhhh.png"/></a>
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
    <div id="b3" class="partnership">
      <h2>Partner with Us</h2>
      
      <div class="partner-section">
        <div class="partner-content">
          <h3>Your Success, Our Priority</h3>
          <p>At Hobbyist, we are committed to building successful partnerships that drive mutual growth and benefit. We provide a platform for you to showcase your products and services to our engaged audience.</p>
        </div>
        <div class="partner-image">
          <!-- Placeholder for an image -->
        </div>
      </div>
      
      <div class="partner-section">
        <div class="partner-image">
          <!-- Placeholder for an image -->
        </div>
        <div class="partner-content">
          <h3>Collaboration and Innovation</h3>
          <p>We believe in collaboration and innovation. By partnering with Hobbyist, you'll have the opportunity to explore unique ways to engage with our community and contribute to the growth of creative hobbies.</p>
        </div>
      </div>
      
      <!-- Add more alternating partner sections with text and images -->
    </div>
  </div>
</body>

</html>
