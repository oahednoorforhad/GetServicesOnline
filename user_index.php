<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap CDN -->
    <!-- Style Starts -->
    <link rel="stylesheet" href="styles.css">
    <style>
      /* Smooth scrolling */
      html {
        scroll-behavior: smooth;
      }
      
    </style>
    <!-- Style ends -->
    <title>GetServicesOnline - Home</title>
  </head>
  <body>
    <!-- PHP code to start the session and get the user's full name -->
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
              <li><a href="contactus.html">Contact Us</a></li>
              <li><a href="logout.php">Logout</a></li> <!-- Add this logout link -->
            </div>
          </div>
        </div>
      </nav>
      <!-- Nav ends -->
      
      <!-- Banner starts -->
      <section id="banner">
        <div>
          <i><h1>"Welcome to GetServicesOnline - Your Gateway to Quality Services"</h1></i>
          <p>Your one-stop solution for connecting with trusted service providers. Whether you need a plumber, electrician, handyman, or any other service, our platform makes it easy to find and book professionals who meet your needs. At GetServicesOnline, we are committed to offering a seamless and secure experience, ensuring that all our listed providers are thoroughly vetted and verified. Enjoy the convenience of browsing a wide range of services, reading customer reviews, and booking appointments directly through our user-friendly interface. Join our community today and discover how GetServicesOnline can help you get the services you need, when you need them.
          </p>
          <button onclick="scrollToServices()">Get Service Now!</button>
        </div>
        <div>
          <img width="600" src="images/mascot3.gif" alt="banner" />
        </div>
      </section>
      <!-- Banner ends -->
    </header>
    <!-- Header ends -->
    <!-- Main starts -->
    <main>
      <h1 id="offer">Services Available:</h1>
      <?php include 'db_connection/services.php'; ?>
      <!-- services section starts -->
      <div id="offer2">
        <div>
          <h2>Special Offer!!</h2>
          <img width="300" src="images/booksale.png" alt="" />
        </div>
      </div>
      <!-- services section ends -->
    </main>
    <!-- Main ends -->
    <br />
    <!-- Footer starts -->
    <footer>
      <div>
        <img height="80" src="images/logo.png" alt="logo" />
      </div>
      <div>
        <p>All Rights Reserved @Osvision 2024</p>
      </div>
    </footer>
    <!-- Footer ends -->
    <script>
      function scrollToServices() {
        document.getElementById('offer').scrollIntoView({ behavior: 'smooth' });
      }
    </script>
  </body>
</html>
