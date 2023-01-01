<?php
session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MIKoreanFoodStore</title>
    <link rel="icon" type = "image/jpg" href="images/logo1.png">
    <link rel="stylesheet" href="style/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/90b8adf914.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <div class="header"> 
    <div class="container"> 
          <div class="navbar">
              <div class="logo">
              <img src="images/logo1.png" width="125px">
              </div>
              <nav>
                  
                  <ul>
                      
                      <li><a href="index.php">Home</a></li>
                      <li><a href="products.php">Products</a></li>
                      <li class ="about-nav"><a href="aboutus.php">About</a></li>
                      <?php
                      if(!isset($_SESSION['username'])){?>
                      <li><a href="login.php">Log In</a></li> <?php } ?>
                     
                      <?php
                      if(isset($_SESSION['username'])){?>
                      <li><a href = "logout.php?logout">Log out</a></li> <?php } ?> 
                      </ul>
                  </nav>
                      <img src="images/cart.png" width="30px" height="30px">
              </div>
              <div class = "set_header">
                  <?php
                      if(!isset($_SESSION['username'])){
                      ?><a href = "index.php"><?php echo '<h1>Annyeong (안녕)!</h1>';?></a>
                      <?php
                      }
                      if(isset($_SESSION['username'])){ 
                      ?><a href = "index.php">
                      <?php echo '<h1>Annyeong (안녕), '.$_SESSION['username'].'!</h1>';?></a>
                      <?php
                      }
                     if(isset($_SESSION['username'])){?> 
                    <a href="cart.php" class="btn"><i class="fa-solid fa-cart-shopping"></i> GO TO CART &#8594;</a> 
                    <?php 
                    } 
                    if(!isset($_SESSION['username'])){?>
                     <a href = "register.php" class = "btn">Create an account</a> <?php } ?> 
           </div>
    </div>
      </div>
<div class = "aboutus-container">
        <p><i>The <strong>MIKoreanFoodStore</strong> started during the pandemic as an Online Korean food store located in Block 28 Lot 17 Almond drive,</i></p> 
        <p><i>Soldiers hill IV Phase IV, Molino VI, Bacoor City, Cavite. M&I Korean Food Store provides satisfaction of cravings for everyone. They offer online reservation of orders and deliveries.</i></p>
        <br>
        <a href = "https://www.facebook.com/mjgapkoreanfoodstore"><i class="fa-brands fa-square-facebook"></i> Facebook</a>
        <a href = "https://shopee.ph/mjgap_official"><i class="fa-sharp fa-solid fa-cart-shopping"></i> Shopee</a>
        <a href = ""><i class="fa-solid fa-envelope"></i> Email : mjgaptrading@gmail.com</a>
        <a href = ""><i class="fa-solid fa-phone"></i> Phone No. : 0966 895 1660</a>

        </div>
    </body>
</html>