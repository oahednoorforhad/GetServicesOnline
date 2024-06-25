<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $serviceId = isset($_POST['serviceId']) ? $_POST['serviceId'] : null;
    $serviceName = isset($_POST['serviceName']) ? $_POST['serviceName'] : null;
    $servicePrice = isset($_POST['servicePrice']) ? $_POST['servicePrice'] : null;
    $serviceDescription = isset($_POST['serviceDescription']) ? $_POST['serviceDescription'] : null;
    $serviceImage = isset($_FILES['serviceImage']['name']) ? $_FILES['serviceImage']['name'] : null;

    if (isset($_POST['delete'])) {
        // Handle delete
        $sql = "DELETE FROM Services WHERE ServiceID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $serviceId);
        if ($stmt->execute()) {
            echo "Service deleted successfully";
        } else {
            echo "Error deleting service: " . $stmt->error;
        }
        $stmt->close();
    } elseif ($serviceId && isset($_POST['edit'])) {
    // Handle edit

    // Fetch existing data from the database
    $sql = "SELECT * FROM Services WHERE ServiceID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $serviceId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $service = $result->fetch_assoc();

        // Populate form fields with existing data
        $serviceName = $service['ServiceName'];
        $servicePrice = $service['Price'];
        $serviceDescription = $service['Description'];
        // Optionally, you can also fetch and populate the image path if needed
        // $serviceImage = $service['ImagePath'];

        // Echo JavaScript to update form fields
        echo "<script>
                document.getElementById('serviceId').value = '{$service['ServiceID']}';
                document.getElementById('serviceName').value = '{$service['ServiceName']}';
                document.getElementById('servicePrice').value = '{$service['Price']}';
                document.getElementById('serviceDescription').value = '{$service['Description']}';
              </script>";
    } else {
        echo "Service not found";
    }

    $stmt->close();
}
else {
        // Handle add/update
        if ($serviceImage) {
            $targetDir = "images/";
            $targetFile = $targetDir . basename($_FILES['serviceImage']['name']);
            // Move uploaded file
            if (move_uploaded_file($_FILES['serviceImage']['tmp_name'], $targetFile)) {
                // File uploaded successfully
            } else {
                echo "Error uploading file.";
            }
        }

        if ($serviceId) {
            // Update existing service
            $sql = "UPDATE Services SET ServiceName=?, Price=?, Description=?, ImagePath=? WHERE ServiceID=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssi", $serviceName, $servicePrice, $serviceDescription, $serviceImage, $serviceId);
        } else {
            // Add new service
            $sql = "INSERT INTO Services (ServiceName, Price, Description, ImagePath) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $serviceName, $servicePrice, $serviceDescription, $serviceImage);
        }

        if ($stmt->execute()) {
            echo $serviceId ? "Service updated successfully" : "Service added successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

$conn->close();
header("Location: ../dashboard.php");
exit();
?>
