<?php
include 'db_connection/db_connection.php';

// Check if serviceId is provided via GET request
$serviceId = isset($_GET['serviceId']) ? intval($_GET['serviceId']) : 0;

// Fetch service details from database based on serviceId
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

// Handling form submission to add service to orders
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buy_now'])) {
    session_start();
    include 'db_connection/db_connection.php';

    // Assuming userid is available in session
    $userid = $_SESSION['userid'];
    $serviceId = $_POST['service_id'];

    // Insert the order into the database
    $sql = "INSERT INTO orders (UserID, ServiceID, OrderDate, Status) VALUES (?, ?, NOW(), 'Pending')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $userid, $serviceId);

    if ($stmt->execute()) {
        // Redirect to user_orders.php or any confirmation page
        header("Location: user_orders.php");
        exit();
    } else {
        echo "Error occurred while placing the order.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($service['ServiceName']); ?> - Service Details</title>
    <link rel="stylesheet" href="service_detail.css">
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
                        <li><a href="user_index.php">Home</a></li>
                        <li><a href="user_orders.php">Your Orders</a></li>
                        <li><a href="aboutus.html">About Us</a></li>
                        <li><a href="contactus.html">Contact Us</a></li>
                        <li><a href="logout.php">Logout</a></li> <!-- Add this logout link -->
                    </div>
                </div>
            </div>
        </nav>
    <div class="background-container">
        <section class="product">
            <div class="product__photo">
                <div class="photo-container">
                    <div class="photo-main">
                        <img src="images/<?php echo htmlspecialchars($service['ImagePath']); ?>" alt="<?php echo htmlspecialchars($service['ServiceName']); ?>">
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
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?serviceId=' . $serviceId); ?>" method="POST">
                    <input type="hidden" name="service_id" value="<?php echo $serviceId; ?>">
                    <button type="submit" name="buy_now" class="buy--btn">Order Now</button>
                </form>
            </div>
        </section>
    </div>
</body>
</html>
