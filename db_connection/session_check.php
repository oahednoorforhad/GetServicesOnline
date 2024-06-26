<?php
// session_check.php
session_start();
if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}
if (!$_SESSION['is_admin']) {
    header("Location: user_index.php");
    exit();
}
?>


