<?php
session_start();
$userId = $_SESSION['username'];
include 'connection.php';
if(isset($_GET['reload'])){
    mysqli_query($con,"DELETE from cart WHERE user_id = '$userId'");    
    header('location:index.php');
}
if(isset($_POST['checkout-btn'])){
    $customer_details = mysqli_query($con,"SELECT * from customer_info WHERE username = '$userId'");
    if(mysqli_num_rows($customer_details)> 0){
    $customer_infos = mysqli_fetch_assoc($customer_details);
    $userId = $_SESSION['username'];
    $fname = $customer_infos['firstname'];
    $lname = $customer_infos['lastname'];
    $address = $customer_infos['address'];
    $province = $customer_infos['province'];
    $city = $customer_infos['city'];
    $method = $_POST['method'];
    
    $checkout_query = mysqli_query($con, "SELECT * from cart WHERE user_id = '$userId'");
    $price_total = 0;

    if  (mysqli_num_rows($checkout_query)> 0){
        while($product_info = mysqli_fetch_assoc($checkout_query)){
            $product_name[] = $product_info['name'] .' ('. $product_info['quantity'] .') ' ;
            $product_total = number_format($product_info['price'] * $product_info['quantity']);
            $price_total += $product_total;
        }
    } else {
        echo "No products available";
    }
  
     $total_product= implode(',',$product_name);
    $customer_detail = mysqli_query($con, "INSERT INTO customer_info_checkout (user_id,firstname,lastname,address,province,city,method) VALUES ('$userId','$fname','$lname','$address','$province','$city','$method')");
    
    if($checkout_query && $customer_detail){ 
       
        echo "
        <div class='checkout-message-container'>
        <div class='message-container'>
           <h3>Thank you for buying, ".$customer_infos['username']."".'!'."</h3>
           
              <span>".$total_product."</span>
              <span class='total'> Total : $".$price_total."/-  </span>
              <p> Name : <span>".$customer_infos['firstname']." ".$customer_infos['lastname']."</span> </p>
              <p> Address : <span>".$customer_infos['address'].", ".$customer_infos['province'].", ".$customer_infos['city']."</span> </p>
              <p> Payment Method : <span>".$method."</span> </p>
           
              <a href='checkout.php?reload' class='done-btn'>continue shopping</a>
           </div>
        </div>
        ";
         } 
     
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
    <?php include 'header.php';?>
<div class = "check-cont">
    <section class = "address-info">
    <div class = "payment-method"> 
        <form action = "" method = "post">
        <h1> Deliver Address </h1>
        <?php 
        if(isset($_SESSION['username'])){
        $select_customer_info = mysqli_query($con,"SELECT * from customer_info WHERE username = '$userId'");
        if(mysqli_num_rows($select_customer_info)> 0){
            $get_info = mysqli_fetch_assoc($select_customer_info)
                ?>
                <?php echo $get_info['firstname'] ." ". $get_info['lastname']; ?> <br>
                <?php echo $get_info['mobile_no']; ?> <br>
                <?php echo $get_info['address']; ?> <br>
                <?php echo $get_info['province'] ." ". $get_info['city'];?> <br>
                <?php   
        }
        } ?>
        
        <?php
            $product_info = mysqli_query($con,"SELECT * from cart WHERE user_id = '$userId'");
            $grand_total = 0;
            
            if(mysqli_num_rows($product_info)> 0){
                while($product_get = mysqli_fetch_assoc($product_info)){
                    $total_price = number_format($product_get['price'] * $product_get['quantity']);
                    $grand_total += $total_price;
                ?>
                           <img src = "uploaded_image/<?php echo $product_get['image']; ?>" height = "100";>
                              <?php echo $product_get['name'];?>
                           <i class="fa-solid fa-peso-sign"></i><?php echo $product_get['price'];?><br>
                      
            <?php  
        }
    }?> <br>
     <?php echo "<strong>Total Price : <strong>"?><i class="fa-solid fa-peso-sign"></i><?php echo $grand_total;?><br>
        <?php echo "Payment Method: "; ?>
        <select class = "payment_method" name = "method">
                <option value="Cash on delivery">Cash on delivery</option>
               <option value="GCash">Gcash</option>
               <option value="Paypal">Paypal</option>
        </select><br>
        <input type = "submit" value = "Check out" name = "checkout-btn" class = "checkout-btn">
</form>
    </div>
</div>

</body>
</html>