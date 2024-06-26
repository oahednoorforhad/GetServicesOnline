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
        echo "<form action='admin_service_detail.php' method='GET'>"; // Updated action to service_detail.php with GET method
        echo "<input type='hidden' name='serviceId' value='" . $row['ServiceID'] . "'>"; // Pass serviceId as a hidden input
        echo "<button type='submit' name='view_details'>View Details</button>"; // Renamed button and changed text
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
