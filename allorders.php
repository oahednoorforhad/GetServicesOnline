<?php
include 'db_connection/session_check.php';
include 'db_connection/db_connection.php';

$userid = $_SESSION['userid'];
$sql = "SELECT orders.OrderID, services.ServiceName, orders.OrderDate,
               users.UserID, users.FullName, users.PhoneNumber, users.Address, orders.Status
        FROM orders
        JOIN services ON orders.ServiceID = services.ServiceID
        JOIN users ON orders.UserID = users.UserID"; // Joining users table to get user details

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <div class="navbar">
            <div class="container nav-container">
                <input class="checkbox" type="checkbox" name="" id="" />
                <div class="hamburger-lines">
                    <span class="line line1"></span>
                    <span class="line line2"></span>
                    <span class="line line3"></span>
                </div>  
                <div class="logo">
                    <h1>GetServicesOnline</h1>
                </div>
                <div class="menu-items">
                    <li><a href="admin_index.php">Home</a></li>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="allorders.php">Orders</a></li>
                    <li><a href="aboutus.html">About Us</a></li>
                    <li><a href="contactus.html">Contact Us</a></li>
                    <li><a href="logout.php">Logout</a></li> <!-- Add this logout link -->
                </div>
            </div>
        </div>
    </nav>
    <h2>All Orders</h2>
    <table>
        <tr>
            <th>Order ID</th>
            <th>User ID</th>
            <th>User's Full Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Service Name</th>
            <th>Order Date</th>
            <th>Status</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['OrderID'] . "</td>";
                echo "<td>" . $row['UserID'] . "</td>";
                echo "<td>" . $row['FullName'] . "</td>";
                echo "<td>" . $row['PhoneNumber'] . "</td>";
                echo "<td>" . $row['Address'] . "</td>";
                echo "<td>" . $row['ServiceName'] . "</td>";
                echo "<td>" . $row['OrderDate'] . "</td>";
                echo "<td>";
                echo "<form method='post' action='update_order_status.php'>";
                echo "<input type='hidden' name='order_id' value='" . $row['OrderID'] . "' />";
                echo "<input type='hidden' name='current_status' value='" . $row['Status'] . "' />";
                echo "<button type='submit' name='toggle_status'>" . $row['Status'] . "</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No orders found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
