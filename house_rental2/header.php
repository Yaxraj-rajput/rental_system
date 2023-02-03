<?php 

include 'config.php';

session_start();


if (isset( $_SESSION['username'])) {
  $currentuser = $_SESSION['username'];
}

elseif (isset( $_SESSION['ownername'])) {
  $currentuser = $_SESSION['ownername']."*Owner";
}
else{
  $currentuser = "GUEST";
}


?>

<html oncontextmenu="return false">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    />
    <script
      src="https://kit.fontawesome.com/077a52c5d8.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="styles/navbarstyle.css" />
    <link rel="icon" type="image/png" href="images/logo.png" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
    />
  </head>

    <div class="whole" >
      <div class="navbar" id="navbar">
        <div class="logo"><img src="images/logo.png" alt="MATREEX" /></div>
        <div class="nav-contents" id="nav-content">
          <i
            id="hehe"
            class="bi bi-x"
            onclick="navmenuoff()"
            style="color: #fff; font-size: 2rem"
          ></i>
          <ul>
            <a href="home.php"><li>HOME</li></a>
            <a href="about.php"><li>ABOUT</li></a>
            <a href="property.php"><li>PROPERTIES</li></a>
            <a href="contact.php"><li>NEWSLETTER</li></a>

            <a href="logout.php"><button class="install-btn"><?php echo "$currentuser" ?></button></a>
            <button type="button" class="nav-btn">
              <i class="bi bi-person" id="" style="font-size: 2rem"></i>
            </button>
          </ul>
        </div>
                <i
          id="hehe"
          class="bi bi-list"
          onclick="navmenuon()"
          style="font-size: 2rem; margin-top: 17px; color: #fff"
        ></i>
      </div>
</section>

<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>



   
    <!--------------------On scroll navbar start-------------------->

    <script src="./styles/scripts/navbar.js"></script>

  </body>
</html>