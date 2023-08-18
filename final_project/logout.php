<!DOCTYPE html>
<html>
<body>
 
<?php
 
    echo "Logged out successfully";
 
    session_start();
    session_destroy();
	header("Location: http://localhost:8888/final_project/index.html");
 
?>
 
</body>
</html>