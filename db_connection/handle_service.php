<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $serviceId = isset($_POST['serviceId']) ? $_POST['serviceId'] : null;

    if (isset($_POST['delete'])) {
        // Handle delete
        $sql = "DELETE FROM Services WHERE ServiceID='$serviceId'";
        if ($conn->query($sql) === TRUE) {
            echo "Service deleted successfully";
        } else {
            echo "Error deleting service: " . $conn->error;
        }
    } elseif ($serviceId && isset($_POST['edit'])) {
        // Fetch the service details for editing
        $sql = "SELECT * FROM Services WHERE ServiceID='$serviceId'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $service = $result->fetch_assoc();
            // Pass the service details to the form via query parameters
            header("Location: ../dashboard.php?serviceId=" . $service['ServiceID'] . "&serviceName=" . urlencode($service['ServiceName']) . "&servicePrice=" . $service['Price'] . "&serviceDescription=" . urlencode($service['Description']) . "&serviceImage=" . urlencode($service['ImagePath']));
            exit();
        }
    } else {
        // Handle add/update
        $serviceName = isset($_POST['serviceName']) ? $_POST['serviceName'] : null;
        $servicePrice = isset($_POST['servicePrice']) ? $_POST['servicePrice'] : null;
        $serviceDescription = isset($_POST['serviceDescription']) ? $_POST['serviceDescription'] : null;
        $serviceImage = isset($_FILES['serviceImage']['name']) ? $_FILES['serviceImage']['name'] : null;

        if ($serviceImage) {
            // Move the uploaded file to the images directory
            move_uploaded_file($_FILES['serviceImage']['tmp_name'], '../images/' . $serviceImage);
        } else {
            // If no new image is uploaded, use the existing image
            $serviceImage = $_POST['existingImage'];
        }

        if ($serviceId) {
            // Update existing service
            $sql = "UPDATE Services SET ServiceName='$serviceName', Price='$servicePrice', Description='$serviceDescription', ImagePath='$serviceImage' WHERE ServiceID='$serviceId'";
            if ($conn->query($sql) === TRUE) {
                echo "Service updated successfully";
            } else {
                echo "Error updating service: " . $conn->error;
            }
        } else {
            // Add new service
            $sql = "INSERT INTO Services (ServiceName, Price, Description, ImagePath) VALUES ('$serviceName', '$servicePrice', '$serviceDescription', '$serviceImage')";
            if ($conn->query($sql) === TRUE) {
                echo "Service added successfully";
            } else {
                echo "Error adding service: " . $conn->error;
            }
        }
    }
}

$conn->close();
header("Location: ../dashboard.php");
exit();
?>
