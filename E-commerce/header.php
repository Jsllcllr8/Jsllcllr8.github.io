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
                      <li><a href="aboutus.php">About</a></li>
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