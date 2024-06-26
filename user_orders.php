<?php
// include 'db_connection/session_check.php';
include 'db_connection/db_connection.php';
session_start();

$userid = $_SESSION['userid'];
$sql = "SELECT orders.OrderID, services.ServiceName, orders.OrderDate, orders.Status
        FROM orders
        JOIN services ON orders.ServiceID = services.ServiceID
        WHERE orders.UserID = '$userid'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Orders</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Your Orders</h2>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Service Name</th>
            <th>Order Date</th>
            <th>Status</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['OrderID'] . "</td>";
                echo "<td>" . $row['ServiceName'] . "</td>";
                echo "<td>" . $row['OrderDate'] . "</td>";
                echo "<td>" . $row['Status'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No orders found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
