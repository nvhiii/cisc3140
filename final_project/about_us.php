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
        header("Location: http://localhost:8888/final_project/about_us.html");
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
  <title>About Us</title>
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
    <div id="b3" class="about-us">
      <h2>About Us</h2>
      <blockquote class="ceo-quote">
        "Our journey is driven by the belief that every individual has the power to make a positive impact."
      </blockquote>
      <p class="ceo-ambition">
        As the CEO, my ambition is to empower individuals to pursue their passions and achieve greatness.
      </p>
      
      <!-- Filler content for scrolling -->
      <div class="filler-content">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Curabitur tincidunt eros vel justo lacinia, eu fringilla velit sodales. Nullam venenatis mauris eu tortor fermentum cursus. Donec volutpat odio non risus auctor venenatis. Suspendisse potenti.</p>
        <p>Phasellus in libero vitae justo gravida fringilla ut quis nunc. In bibendum ipsum nec tincidunt euismod. Sed vel odio quis ex lacinia faucibus vel a erat. Sed at scelerisque nisi, eu rhoncus nisl.</p>
        <!-- Add more filler content as needed -->
      </div>
    </div>
  </div>
</body>

</html>
