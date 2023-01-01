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
                      
                      <li class = "home-nav"><a href="index.php">Home</a></li>
                      <li><a href="products.php">Products</a></li>
                      <li ><a href="aboutus.php">About</a></li>
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
    <div class="small-container">
        <h2 class="title">Featured Products</h2>
        <div class="row">
          <div class="col-4">  
              <img src="images/Beef%20Bulgogi%20Noodles.png">
              <h4>Beef Bulgogi Noodles</h4>
              <div class="rating">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-half-o" aria-hidden="true"></i>
              </div>
              <p>P190.00</p>
        </div>
            <div class="col-4">  
              <img src="images/Ssamjang.png">
              <h4>Ssamjang</h4>
              <div class="rating">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
              </div>
              <p>P150.00</p>
        </div>
         <div class="col-4">  
          <img src="images/Cheese%20Sauce.png">
              <h4>Cheese Sauce</h4>
              <div class="rating">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
              </div>
              <p>P150.00</p>
        </div>
          <div class="col-4">  
          <img src="images/Daewon%20Fishcake.png">
              <h4>Daewon Fishcake</h4>
              <div class="rating">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
              </div>
              <p>P130.00</p>
            </div>
            <div class="col-4">  
          <img src="images/Woongjin%20Morning%20Sun%20Rice%20Milk.png">
              <h4>Woongjin Morning Sun Rice Milk</h4>
              <div class="rating">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
              </div>
              <p>P155.00</p>
        </div>
        <div class="col-4">  
            <img src="images/Jinro Yakult.png">
                <h4>Jinro Yakult</h4>
                <div class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
                <p>P155.00</p>
          </div>
          <div class="col-4">  
            <img src="images/Good Day Melon.png">
                <h4>Good Day Melon</h4>
                <div class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
                <p>P155.00</p>
          </div>
          <div class="col-4">  
            <img src="images/Good Day Peach.png">
                <h4>Good Day Peach</h4>
                <div class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
                <p>P155.00</p>
          </div>
          <div class="col-4">  
            <img src="images/Kimchi.png">
                <h4>Kimchi</h4>
                <div class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
                <p>P155.00</p>
          </div>
          <div class="col-4">  
            <img src="images/Yopokki Cheese Cup.png">
                <h4>Yopokki Cheese Cup</h4>
                <div class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
                <p>P155.00</p>
          </div>
          <div class="col-4">  
            <img src="images/Ottogi Sesame Oil.png">
                <h4>Ottogi Sesame Oil</h4>
                <div class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
                <p>P155.00</p>
          </div>
          <div class="col-4">  
            <img src="images/Ssamjang.png">
                <h4>Ssamjang</h4>
                <div class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
                <p>P155.00</p>
          </div>    
        </div>
        </div>
        
     
    </body>
    </html>


