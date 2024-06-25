<?php
$servername = "localhost";
$username = "root"; // Default username for XAMPP/WAMP/MAMP
$password = ""; // Default password is empty for XAMPP/WAMP/MAMP
$dbname = "GetServicesOnline";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
