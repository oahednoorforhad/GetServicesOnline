<?php
include 'db_connection/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['toggle_status'])) {
    $orderID = $_POST['order_id'];
    $currentStatus = $_POST['current_status'];
    $newStatus = ($currentStatus === 'Pending') ? 'Completed' : 'Pending';

    // Update status in orders table
    $sql = "UPDATE orders SET Status = '$newStatus' WHERE OrderID = '$orderID'";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to allorders.php after successful update
        header("Location: allorders.php");
        exit();
    } else {
        echo "Error updating status: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
