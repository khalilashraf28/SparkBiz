<?php
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or any other page you prefer
echo "<script>alert('Logout Successfully!');</script>";
header("Location: index.html");
exit();
?>
