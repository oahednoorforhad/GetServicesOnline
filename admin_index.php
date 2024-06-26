<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap CDN -->
    <!-- Style Starts -->
    <link rel="stylesheet" href="styles.css">
    <!-- Style ends -->
    <title>GetServicesOnline - Home</title>
  </head>
  <body>
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
                    <div class="menu-items">
                        <li><a href="admin_index.php">Home</a></li>
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="allorders.php">Orders</a></li>
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
          <i><h1>"Welcome to the world of knowledge"</h1></i>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem
            repudiandae voluptatibus repellat distinctio, dolores porro
            consequatur omnis excepturi! Earum velit neque quidem distinctio
            sed. Ullam dolorum alias placeat magnam nihil! Lorem ipsum dolor sit
            amet consectetur adipisicing elit. Quidem repudiandae voluptatibus
            repellat distinctio, dolores porro consequatur omnis excepturi!
            Earum velit neque quidem distinctio sed. Ullam dolorum alias placeat
            magnam nihil!
          </p>
          <button>Get Service Now!</button>
        </div>
        <div>
          <img width="600" src="images/mascot2.gif" alt="banner" />
        </div>
      </section>
      <!-- Banner starts -->
    </header>
    <!-- Header ends -->
    <!-- Main starts -->
    <main>
      <h1>Services Available:</h1>
      <?php include 'db_connection/services.php'; ?>
      <!-- Book section starts -->
      <div id="offer">
        <div>
          <h2>Special Offer!!</h2>
          <img width="300" src="images/booksale.png" alt="" />
        </div>
      </div>
      <!-- Movie section ends -->
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
    <!-- Footer starts -->
  </body>
</html>
