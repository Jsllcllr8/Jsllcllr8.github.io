<?php
session_start();
require_once ('connection.php');
if(isset($_GET['delete'])){
    $deleteId = $_GET['delete'];
    $deleteQuery = mysqli_query($con,"DELETE from products WHERE id = $deleteId");
    if($deleteQuery){
        header('location:admin.php');
        echo '<script>alert("Product already deleted")</script>';
    }else{
        header('location:admin.php');
        echo '<script>alert("Product cannot be deleted")</script>';
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
    <script src="https://kit.fontawesome.com/90b8adf914.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <div class="header"> 
      
    <div class="container"> 
        <div class="navbar">
            <div class="logo"><img src="images/logo1.png" width="125px"></div>
        <nav>
            <ul>
                <li class = "admin-nav"><a href="admin.php">Admin</a></li>
                <li><a href="user_info.php">Clients Information</a></li>

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

<div class = "container_admin">
            <section class = "admin-form">
                <form action = "ControllerUserData.php" method = "post" enctype = "multipart/form-data">
                    <input class = "admin-box" type = "text" placeholder = "NAME OF PRODUCT" name = "product_name" required>
                    <input  class = "admin-box" type = "number" min = "0" placeholder = "PRICE OF PRODUCT" name = "product_price" required>
                    <input class = "admin-box" type = "file" name = "product_image" accept = "image/png, image/jpg, image/jpeg" required>
                    <input class = "admin-add" type = "submit" name = "add_prod" value = "ADD THE PRODUCT">
                </form>
          </section>
</div>
            <section class = "prod_list">
               
                <table>
                    <thead>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        <?php
                            $select_products = mysqli_query($con,"SELECT * FROM products");
                            if(mysqli_num_rows($select_products) > 0){
                                while($row = mysqli_fetch_assoc($select_products)){
                                    ?>
                                     <tr>
                                        <td><img src = "uploaded_image/<?php echo $row['image']; ?>" height = "100" alt=""></td>
                                        <td><?php echo $row ['name']; ?></td>
                                        <td><i class="fa-solid fa-peso-sign"></i><?php echo $row['price'];?>/-</td> 
                                        <td>
                                        <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"><i class="fas fa-trash"></i> delete </a>
                                        <a href="admin.php?update=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
                                        </td>
                                    </tr>
                                    <?php
                            }  
                            }                    
                        ?> 
                    </tbody>
                </table>
          </section>
       <div class = "update_product">
        <?php
        
            if(isset($_GET['update'])){
                $updateId = $_GET['update'];
                $queryId = mysqli_query($con,"SELECT * from products WHERE id = '$updateId'");
                if (mysqli_num_rows($queryId) > 0){
                    while($fetch_update = mysqli_fetch_assoc($queryId)){
                        ?>
                        <div class = "update-border">
                        <form action = "ControllerUserData.php" method = "post" enctype = "multipart/form-data">
                    
                        <h1> UPDATE THE PRODUCT </h1><br>
                        <input type = "hidden" name = "upd_id" value = "<?php echo $fetch_update['id'];?>">
                        <input class = "admin-box" type = "text" name = "upd_name" value = "<?php echo $fetch_update['name']; ?>"> 
                        <input class = "admin-box" type = "number" min = "0" name = "upd_price" value = "<?php echo $fetch_update['price']; ?>">
                        <input class = "admin-box" type = "file" name = "upd_image" accept = "image/png, image/jpg, image/jpeg">
                        <input class = "admin-sub" type = "submit"  name = "upd_product" value = "Update the product">
                        <input class = "admin-sub" type = "reset" id = "cncl_product" value = "Cancel">
                  
                    </form>
                    </div>
    
                    <?php
                    }
                }
                echo "<script>document.querySelector('.update-border').style.display = 'flex';</script>";
            }
                            
        ?>
                       
        </div> 
        <script src="script.js"></script>
</body>
</html>