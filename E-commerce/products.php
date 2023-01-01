<?php
session_start();

require_once('connection.php');
    if(isset($_SESSION['username'])){
        $userId = $_SESSION['username'];
    if(isset($_POST['add_to_cart'])){
    $name = $_POST['prod_name'];
    $price = $_POST['prod_price'];
    $image = $_POST['prod_image'];
    $quantity = 1;

    $select_prod = mysqli_query($con, "SELECT * from cart WHERE name = '$name' AND user_id = '$userId'");

    if(mysqli_num_rows($select_prod) > 0){
        echo'<script>alert("The product is already in the cart")</script>';
        echo("<script>window.location = 'products.php';</script>");
    } else {
        $insert_prod = mysqli_query($con,"INSERT INTO cart(user_id,name,price,image,quantity) VALUES('$userId','$name','$price','$image','$quantity')");
        echo '<script>alert("The product is added to the cart successfully")</script>';
        echo("<script>window.location = 'products.php';</script>");
    }

}
} else if(!isset($_SESSION['username'])){
        if(isset($_POST['add_to_cart'])){
    echo ("<script>window.location = 'login.php';</script>");
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MIKoreanFoodStore</title>
    <link rel="icon" type = "image/jpg" href="images/logo1.png">
    <link rel="stylesheet" href="style/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                      <li class = "products-nav"><a href="products.php">Products</a></li>
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
<div class = "box-cont-prod">
                <?php
                 if(isset($_SESSION['username'])){
                     $userId = $_SESSION['username'];
                    $select_user = mysqli_query($con, "SELECT * from customer_info WHERE username = '$userId'");
                    if(mysqli_num_rows($select_user)> 0){
                        $fetch_user = mysqli_fetch_assoc($select_user);
                    }
                }
                ?>
            <?php
                $select_prod = mysqli_query($con, "SELECT * from products");
                if(mysqli_num_rows($select_prod) > 0){
                while($fetch_prod = mysqli_fetch_assoc($select_prod)){
            ?>
                <form action ="" method= "post">
                <div class = "product-box">
                    <img src = "uploaded_image/<?php echo $fetch_prod['image']; ?>" alt = "" width= "180px">
                    <h3><?php echo $fetch_prod['name'];?></h3>
                    <div class = "price"><i class="fa-solid fa-peso-sign"></i><?php echo $fetch_prod['price']; ?></div>
                    <input type = "hidden" name = "prod_name" value = "<?php echo $fetch_prod['name']; ?>">
                    <input type = "hidden" name = "prod_price" value = "<?php echo $fetch_prod['price']; ?>">
                    <input type = "hidden" name = "prod_image" value = "<?php echo $fetch_prod['image']; ?>">
                    <input type = "submit" class = "cart-btn" name = "add_to_cart" value = "ADD TO CART">
                </div>
                </form>
                <?php
                }
            }
            ?>
        
</div>
<?php
?>
            </body>
            </html> 