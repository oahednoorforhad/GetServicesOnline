<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Management Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="aboutus.html">About Us</a></li>
                        <li><a href="contactus.html">Contact Us</a></li>
                        <li><a href="#">Portfolio</a></li>
                        <li><a href="#">Contact</a></li>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <section id="showcase">
        <div class="container">
            <h1>Manage Your Services</h1>
            <p>Simple dashboard to add, update, and delete services</p>
        </div>
    </section>
    <section id="dashboard" class="container">
        <h2>Service List</h2>
        <?php include 'db_connection/serviceslist.php'; ?>

        <div class="form-container">
            <h2>Add / Update Service</h2>
            <form id="serviceForm" action="db_connection/handle_service.php" method="post" enctype="multipart/form-data">
                <input type="hidden" id="serviceId" name="serviceId">
                <div>
                    <label for="serviceName">Name</label>
                    <input type="text" id="serviceName" name="serviceName" required>
                </div>
                <div>
                    <label for="servicePrice">Price</label>
                    <input type="number" id="servicePrice" name="servicePrice" required>
                </div>
                <div>
                    <label for="serviceDescription">Description</label>
                    <textarea id="serviceDescription" name="serviceDescription" rows="4" required></textarea>
                </div>
                <div>
                    <label for="serviceImage">Image</label>
                    <input type="file" id="serviceImage" name="serviceImage" accept="image/*" required>
                </div>
                <button type="submit" class="btn">Save Service</button>
            </form>
        </div>
    </section>
</body>
</html>
