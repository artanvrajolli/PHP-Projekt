<?php   
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header("location: /index"); //to redirect back to "index.php" after logging out
exit();
?>