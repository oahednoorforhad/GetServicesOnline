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
        echo "<button>Buy Now</button>";
        echo "</div>";
        echo "</div>";
        echo "<br /><br />";
    }
} else {
    echo "No services available.";
}

$conn->close();
?>
