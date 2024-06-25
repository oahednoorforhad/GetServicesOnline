<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap CDN -->
    <!-- Style Starts -->

    <style>
      nav,
      ul,
      #banner,
      .services {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 40px;
        padding: 10px 100px 0px 100px;
        list-style: none;
      }
      .services {
        border-radius: 7px;
        padding: 40px;
        box-shadow: 1px 1px 7px gray;
      }
      footer,
      #offer {
        text-align: center;
      }
      body {
        font-size: larger;
        font-family: Calibri;
        background: #2980b9; /* fallback for old browsers */
        background: -webkit-linear-gradient(
          to right,
          #ffffff,
          #6dd5fa,
          #2980b9
        ); /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(
          to right,
          #ffffff,
          #6dd5fa,
          #2980b9
        ); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      }
      main {
        padding: 0px 100px 10px 100px;
      }
      .card:hover > p{
    opacity:1;
       transform: scale(1.5)
    top:80%;
    }
    img:hover .card{
            
      
    }
    img, #parent {
        cursor: pointer;
        
    }
    .card:hover > img{
        opacity:1;
          transform: scale(1.1);
    }
    .card header {
        position:absolute;
        top: 120%;
        left: 0%;
        padding: 1px;
        border-radius:  25px;
        width: 450px;
        height: 90px;
        transition: all .5s;
        opacity:0;
    }
    .card:hover > header{
      
        opacity:1;
        width: 350px;
        transform: translateY(-120px);
    }

    .card {
      transition: transform .7s;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      border-radius: 500px;
      margin: auto;
      text-align: center;
      font-family: arial;
      background: white;
      width: 250px;
      height: 250px;
    }
    .card:hover{

      transform: scale(1.08)
    }
      .centeri{ 
      /* position: fixed; */
      top: 50%;
      left: 50%;
      /* bring your own prefixes */
      /* transform: translate(10%, 10%); */
      }
      span{
        
        position: relative;
      }
    </style>
    <!-- Style ends -->
    <title>GetServicesOnline - Home</title>
  </head>
  <body>
    <!-- Header starts -->
    <header>
      <!-- Nav starts -->
      <nav>
        <div>
          <img height="80" src="images/logo.png" alt="logo" />
        </div>
        <div>
          <ul>
            <a href="index.php"><li>Home</li></a>
            <a href="about.html"><li>About Us</li></a>
            <a href="contact.html"><li>Contact Us</li></a>
          </ul>
        </div>
      </nav>
      <!-- Nav ends -->
      <hr />
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
