<?php
include 'db_connection.php';

$sql = "SELECT * FROM Services";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='services'>";
        echo "<div><img width='250' src='" . $row['ImagePath'] . "' alt=''></div>";
        echo "<div>";
        echo "<h2>" . $row['ServiceName'] . "</h2>";
        echo "<p>" . $row['Description'] . "</p>";
        echo "<button>Buy Now</button>";
        echo "</div>";
        echo "</div>";
        echo "<br /><br />";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
