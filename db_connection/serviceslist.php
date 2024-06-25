<?php
include 'db_connection.php';

$sql = "SELECT * FROM Services";
$result = $conn->query($sql);

echo "<table id='serviceTable'>";
echo "<thead>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Name</th>";
echo "<th>Price</th>";
echo "<th>Description</th>";
echo "<th>Image</th>";
echo "<th>Actions</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['ServiceID'] . "</td>";
        echo "<td>" . $row['ServiceName'] . "</td>";
        echo "<td>$" . $row['Price'] . "</td>";
        echo "<td>" . $row['Description'] . "</td>";
        echo "<td><img src='images/" . $row['ImagePath'] . "' alt='" . $row['ServiceName'] . "' style='width:100px;'></td>";
        echo "<td>
                <form action='db_connection/handle_service.php' method='post' style='display:inline-block;'>
                    <input type='hidden' name='serviceId' value='" . $row['ServiceID'] . "'>
                    <button type='submit' name='edit' value='edit'>Edit</button>
                </form>
                <form action='db_connection/handle_service.php' method='post' style='display:inline-block;'>
                    <input type='hidden' name='serviceId' value='" . $row['ServiceID'] . "'>
                    <button type='submit' name='delete' value='delete'>Delete</button>
                </form>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No services available.</td></tr>";
}

echo "</tbody>";
echo "</table>";

$conn->close();
?>
