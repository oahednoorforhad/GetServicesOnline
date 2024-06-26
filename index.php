<?php
// index.php

// Start session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['userid'])) {
    // If logged in, redirect to the appropriate dashboard
    if ($_SESSION['is_admin']) {
        header("Location: admin_index.php");
    } else {
        header("Location: user_index.php");
    }
} else {
    // If not logged in, redirect to the login page
    header("Location: login.php");
}
exit();
?>
