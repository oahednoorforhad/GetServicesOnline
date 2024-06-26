<?php
// login.php
session_start();

// Check if user is already logged in, redirect to dashboard if true
if(isset($_SESSION['userid'])) {
    if ($_SESSION['is_admin']) {
        header("Location: admin_index.php");
    } else {
        header("Location: user_index.php");
    }
    exit();
}

include 'db_connection/db_connection.php';

$error_message = '';

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch the user from the database
    $sql = "SELECT * FROM users WHERE Email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($password == $user['Password']) { // Verify hashed password
            // Set session variables
            $_SESSION['userid'] = $user['UserID'];
            $_SESSION['fullname'] = $user['FullName'];
            $_SESSION['is_admin'] = $user['IsAdmin']; // Assuming there is an IsAdmin column in the users table

            // Redirect based on user role
            if ($user['IsAdmin']) {
                header("Location: admin_index.php"); // Redirect admin to admin dashboard
            } else {
                header("Location: user_index.php"); // Redirect user to user dashboard
            }
            exit();
        } else {
            $error_message = "Invalid username or password";
        }
    } else {
        $error_message = "Invalid username or password";
    }
    $stmt->close();
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page with Video Background</title>
    <!-- <link rel="stylesheet" href="styles.css" /> -->
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

      .login-container {
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

      .login-container h2 {
        margin-bottom: 20px;
        font-size: 24px;
        color: #333;
      }

      .login-container label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #555;
      }

      .login-container input[type="text"],
      .login-container input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
      }

      .login-container button {
        width: 100%;
        padding: 10px;
        background: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
      }

      .login-container button:hover {
        background: #45a049;
      }

      .login-container p {
        margin-top: 20px;
        font-size: 14px;
      }

      .login-container a {
        color: #3498db;
        text-decoration: none;
      }

      .login-container a:hover {
        text-decoration: underline;
      }

      .error-message {
        color: red;
        margin-bottom: 20px;
      }
    </style>
</head>
<body>
    <video autoplay muted loop id="video-bg">
        <source src="images/bg3.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="login-container">
        <h2>Service Provider Login</h2>
        <?php if (!empty($error_message)) : ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form id="loginForm" method="POST" action="">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php" id="signup-link">Sign Up</a></p>
    </div>
</body>
</html>
