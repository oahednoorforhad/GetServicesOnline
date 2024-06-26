<?php
// logout.php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to login page after logout
header("Location: login.php");
exit();
?>
