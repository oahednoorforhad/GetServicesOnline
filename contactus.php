<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <style>
      body {
        background-color: #333;
        color: white;
        font-family: sans-serif;
        text-align: center;
      }

      .container2 {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
      }

      .card-container2 {
        display: flex;
        flex-wrap: nowrap;
        justify-content: space-between;
        gap: 20px;
        flex-grow: 1; /* Add this */
      }

      .card2 {
        background-color: #222;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: calc(33.33% - 20px);
        height: 470px;
        transition: transform 0.3s ease-in-out;
      }

      .card2 img {
        width: 350px;
        height: 350px;
        object-fit: cover;
        border-radius: 10px;
      }
      .card2:hover {
        transform: scale(1.08);
      }
      .sir {
        transition: transform 0.3s ease-in-out;
      }
      .sir:hover {
        transform: scale(1.08);
      }

      h2 {
        margin-top: 10px;
      }
      .user-fullname{
        right: 750px;
      }

      .info {
        font-size: 14px;
      }

      .ins {
        margin-top: 10px; /* Add this */
      }
    </style>
  </head>
  <body>
    <?php
      session_start();
      if (isset($_SESSION['fullname'])) {
          $fullname = $_SESSION['fullname'];
      } else {
          // Redirect to login page if the user is not logged in
          header("Location: login.php");
          exit();
      }
    ?>
    <!-- Header starts -->
    <header>
      <!-- Nav starts -->
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
            <div>
              <span class="user-fullname"><?php echo htmlspecialchars($fullname); ?></span> <!-- Display full name -->
            </div>
            <div class="menu-items">
              <li><a href="user_index.php">Home</a></li>
              <li><a href="user_orders.php">Your Orders</a></li>
              <li><a href="aboutus.html">About Us</a></li>
              <li><a href="contactus.php">Contact Us</a></li>
              <li><a href="logout.php">Logout</a></li> <!-- Add this logout link -->
            </div>
          </div>
        </div>
      </nav>
    <div class="container2">
      <h1 style="font-size: 48px">Higher Authority</h1>
      <div class="card-container2">
        <div class="card2">
          <img src="images/1.jpg" alt="Oahed Noor Forhad" />
          <h2>Oahed Noor Forhad</h2>
          <p class="info">CEO and CTO - C213056 <br />oahed@gmail.com</p>
        </div>
        <div class="card2">
          <img src="images/2.jpg" alt="Tohedul Islam Nirzon" />
          <h2>Tohedul Islam Nirzon</h2>
          <p class="info">COO - C213060 <br />nirzon@gmail.com</p>
        </div>
        <div class="card2">
          <img src="images/3.png" alt="Saiful Islam Rumi" />
          <h2>Saiful Islam Rumi</h2>
          <p class="info">M.D. - C211080 <br />rumi@gmail.com</p>
        </div>
      </div>
      <img
        class="sir"
        src="images/sir.jpg"
        alt="Bottom Image"
        style="
          width: 200px;
          height: 200px;
          object-fit: cover;
          border-radius: 50%; /* Add this */
          border: 5px solid #000000;
          margin-top: 40px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        "
      />
      <p class="ins" style="font-size: 24px">
        Cheif Advisor: MOHAMMED ARIF HASNAYEEN <br />Assistant Professor <br />
        Computer Science and Engineering <br />IIUC
      </p>
    </div>
  </body>
</html>
