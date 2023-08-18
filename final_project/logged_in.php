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
        header("Location: http://localhost:8888/final_project/logged_in.html");
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
    <title>Logged In Page</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
</head>

<body>
    <div id="head-login">
        <a href="index.php" id="l1"><img src="hhhh.png" alt="Logo"></a>
    </div>

    <span class="nav-icon" onclick="openNav()">&#9776;</span>
	
    <div class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        
        <!-- Products Topic Header -->
		<span class="topic-header">Products</span>
		<a class="topic-item" href="store.php">Store</a>
		<a class="topic-item" href="subscription.php">Subscription</a>
		<hr class="topic-separator">
        
        <!-- About Topic Header -->
		<span class="topic-header">About</span>
		<a class="topic-item" href="contact.php">Contact Us</a>
		<a class="topic-item" href="about_us.php">About Us</a>
		<a class="topic-item" href="partnership.php">Partnerships</a>
		<a class="topic-item" href="topic_upload.php">Topic Uploads</a>
		<hr class="topic-separator">
        
        <a href="">Forums</a>
		
		<div class="empty-space"></div> <!-- Empty space at the top of the sidenav -->
		
		<div class="bottom-buttons">
			
			<a href="profile.html"><button class="bottom-button profile-button">Profile</button></a>
			
			<button class="bottom-button post-button">Post</button>
			
			<a href="index.php"><button class="bottom-button home-button">Home</button></a>
			
		</div>
		
    </div>
	
	<div class="forum-container">
        <div class="forum-left">
            <?php if ($loggedIn) : ?>
                <span class="user-greeting">Welcome, <br><?php echo $loggedInUsername; ?></span>
                <a href="logout.php"><button class="logout-button" id="l5">Logout</button></a>
            <?php else : ?>
                <a href="login.html"><button class="header-button">Login</button></a>
            <?php endif; ?>
		</div>		
		
        <div class="forum-column">
            <div id="post-section">
			<!-- This is where the user can create a post -->
			</div>
        </div>
		
        <div class="forum-column forum-right">
            <div class="floating-box search-box">
                <input type="text" id="search" placeholder="Search">
            </div>
			
            <div class="floating-box subscribe-box">
                <h2>Subscribe to Premium</h2>
                <a class="subscribe-button" href="subscription.html">Subscribe</a>
            </div>
			
            <div class="floating-box news-box">
                <h2>Current News</h2>
                <p>News content here...</p>
            </div>
			
            <div class="floating-box users-box">
                <h2>Random Users</h2>
                <ul class="user-list">
                    <li><span class="username">User1</span><button class="follow-button">Follow</button></li>
                    <li><span class="username">User2</span><button class="follow-button">Follow</button></li>
                    <!-- Add more users as needed -->
                </ul>
            </div>
        </div>
    </div>
    
</body>

</html>

<?php
$conn->close();
?>
