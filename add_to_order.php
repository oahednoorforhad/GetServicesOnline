<?php
session_start();
include 'db_connection/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buy_now'])) {
    // Assuming you have session management to get user ID
    $userid = $_SESSION['userid'];
    $serviceid = $_POST['service_id'];
    $status = 'Pending'; // Default status for new orders

    // Insert into orders table
    $sql = "INSERT INTO orders (UserID, ServiceID, Status) VALUES ('$userid', '$serviceid', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "Service added to your orders successfully.";
    } else {
        echo "Error adding service to orders: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
