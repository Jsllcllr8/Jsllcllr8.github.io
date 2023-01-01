<?php
session_start();
$userId = $_SESSION['username'];
require_once('connection.php');


if(isset($_GET['remove_user'])){
    $remove_customer = $_GET['remove_user'];
    $remove_query = mysqli_query($con, "DELETE from customer_info WHERE username = '$remove_customer'");
    header("location:user_info.php");
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
                <li><a href="admin.php">Admin</a></li>
                <li class = "user-nav"><a href="user_info.php">Clients Information</a></li>

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
       
                <?php
				if(isset($_SESSION['username'])){
				?><a href = "index.php">
				<?php
				echo '<h1>Annyeong (안녕), '.$_SESSION['username'].'!</h1>'  ;
				?></a>
			    <?php
				}
				?>	
							
          <?php      
          if(isset($_SESSION['username'])){?> 
          <a href="admin.php" class="btn">Add products&#8594;</a> <?php } ?>
      
     </div>
</div>
<div class = "customer-details-list">
            <table class = "customer-table-list">
            <thead>
                <tr>    
                    <td>Name</td>
                    <td>Username</td>
                    <td>Password</td>
                    <td>Secondary Password</td>
                    <td>Mobile Number</td>
                    <td>Email</td>
                    <td>Address</td>
                    <td>Province</td>
                    <td>City</td>       
          </tr>
          </thead>
          <tbody>
            <tr> <?php 
                $list_customer_info = mysqli_query($con, "SELECT * from customer_info");
                if(mysqli_num_rows($list_customer_info)){
                while($customer_details_listing = mysqli_fetch_assoc($list_customer_info)){
                ?>
                <td><?php echo $customer_details_listing['firstname']." ".$customer_details_listing['lastname'];?></td>
                <td><?php echo $customer_details_listing['username'];?></td>
                <td><?php echo $customer_details_listing['password'];?></td>
                <td><?php echo $customer_details_listing['s_password'];?></td>
                <td><?php echo $customer_details_listing['mobile_no'];?></td>
                <td><?php echo $customer_details_listing['email'];?></td>
                <td><?php echo $customer_details_listing['address'];?></td>
                <td><?php echo $customer_details_listing['province'];?></td>
                <td><?php echo $customer_details_listing['city'];?></td>
                <td><a href = "user_info.php?remove_user=<?php echo $customer_details_listing['username'];?>" onclick = "return confirm('Want to delete this customer detail?')"><i class="fa-sharp fa-solid fa-xmark"></i></a></td><br>
                </tr>
                <?php 
                }
                } 
                else {
                            echo'<Script>alert("No customers information available on the database.")</script>';
                            echo("<script>window.location = 'admin.php';</script>");
                }  ?>            
            </tbody>
          </table>
          </div>
    </body>
</html>