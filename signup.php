<?php
// signup.php
include 'db_connection/db_connection.php';

// Initialize variables for form data
$fullname = $email = $password = $phone = $address = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Prepare and execute SQL query to insert user data into database
    $sql = "INSERT INTO users (FullName, Email, Password, PhoneNumber, Address) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $fullname, $email, $password, $phone, $address);

    if ($stmt->execute()) {
        // Redirect to login page upon successful registration
        header("Location: login.php");
        exit();
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
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
    <title>GetServicesOnline</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
        }

        #video-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .signup-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
            background: rgba(255, 255, 255, 0.7);
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .signup-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .signup-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        .signup-container input[type="text"],
        .signup-container input[type="password"],
        .signup-container input[type="email"],
        .signup-container input[type="tel"],
        .signup-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .signup-container button {
            width: 100%;
            padding: 10px;
            background: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .signup-container button:hover {
            background: #45a049;
        }

        .signup-container p {
            margin-top: 20px;
            font-size: 14px;
        }

        .signup-container a {
            color: #3498db;
            text-decoration: none;
        }

        .signup-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <video autoplay muted loop id="video-bg">
        <source src="images/bg3.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="signup-container">
        <h2>Create an Account</h2>
        <form id="signupForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($fullname); ?>" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>" required>
            <label for="address">Address</label>
            <textarea id="address" name="address" rows="4" required><?php echo htmlspecialchars($address); ?></textarea>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.html" id="login-link">Login</a></p>
    </div>

    <script>
        document.getElementById("login-link").addEventListener("click", function () {
            window.location.href = "login.html"; // Update this to the correct path to your login page
        });
    </script>
</body>
</html>
