<?php
include 'db_connection.php';

$serviceId = isset($_GET['serviceId']) ? intval($_GET['serviceId']) : 0;

if ($serviceId > 0) {
    $sql = "SELECT * FROM services WHERE ServiceID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $serviceId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $service = $result->fetch_assoc();
    } else {
        echo "Service not found.";
        exit();
    }

    $stmt->close();
} else {
    echo "Invalid service ID.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($service['ServiceName']); ?> - Service Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="background-container">
        <section class="product">
            <div class="product__photo">
                <div class="photo-container">
                    <div class="photo-main">
                        <img src="images/<?php echo htmlspecialchars($service['ImagePath']); ?>" alt="<?php echo htmlspecialchars($service['ServiceName']); ?>">
                    </div>
                    <div class="photo-album">
                        <ul>
                            <!-- Optionally add other service images if available -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="product__info">
                <div class="title">
                    <h1><?php echo htmlspecialchars($service['ServiceName']); ?></h1>
                </div>
                <div class="price">
                    $ <span><?php echo htmlspecialchars(number_format($service['Price'], 2)); ?></span>
                </div>
                <div class="description">
                    <h3>Description</h3>
                    <p>
                        <?php echo nl2br(htmlspecialchars($service['Description'])); ?>
                    </p>
                </div>
                <button class="buy--btn">Order Now</button>
            </div>
        </section>
    </div>
</body>
</html>
