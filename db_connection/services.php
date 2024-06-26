<?php
include 'db_connection.php';

$sql = "SELECT * FROM Services";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='services'>";
        echo "<div class='centeri'>";
        echo "<div class='card'>";
        echo "<img src='images/" . $row['ImagePath'] . "' class='foto' style='width:100%' alt='" . $row['ServiceName'] . "' />";
        echo "</div>";
        echo "</div>";
        echo "<div>";
        echo "<h2>" . $row['ServiceName'] . "</h2>";
        echo "<p>" . $row['Description'] . "</p>";
        echo "<h4>Price: $" . $row['Price'] . "</h4>";
        echo "<form action='add_to_order.php' method='POST'>";
        echo "<input type='hidden' name='service_id' value='" . $row['ServiceID'] . "'>";
        echo "<button type='submit' name='buy_now'>Buy Now</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "<br /><br />";
    }
} else {
    echo "No services available.";
}

$conn->close();
?>
