<?php
session_start();
$userId = $_SESSION['username'];
require_once('connection.php');


if(isset($_GET['checkout'])){
    $check_product = $_GET['checkout'];
    $cart_query = mysqli_query($con,"SELECT * from cart WHERE user_id = '$userId'");
    if(mysqli_num_rows($cart_query) > 0){ 
        header('location: checkout.php');
    } else {
        echo '<script>alert("No products listed")</script>';
    }
}
if(isset($_POST['update_cart_submit'])){
    $upd_quantity = $_POST['update_cart_quantity'];
    $upd_id = $_POST['update_cart_id'];
    $upd_quantity_query = mysqli_query($con,"UPDATE cart SET quantity = '$upd_quantity' WHERE id = '$upd_id'");
    if($upd_quantity_query){
        header('location:cart.php');
    }

} 
if(isset($_GET['remove'])){
    $delete_product = $_GET['remove'];
    mysqli_query($con,"DELETE from cart WHERE id = '$delete_product'");
    header('location:cart.php');
}
if(isset($_GET['delete_all'])){
    mysqli_query($con,"DELETE from cart WHERE user_id = '$userId'");
    header('location:cart.php');
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

    <?php include 'header.php';?>
    <div class = "cart-container">
<section class = "cart-table">
    <table>
        <thead>
            <tr>
                    <td>Product</td>
                    <td>Product Name</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total Price</td>
            </tr>
        </thead>
        <tbody>
                <?php 
                    $select_user = mysqli_query($con, "SELECT * from customer_info WHERE username = '$userId'");
                    if(mysqli_num_rows($select_user)> 0){
                        $fetch_user = mysqli_fetch_assoc($select_user);
                    }
                ?>
                <?php
        
                    $select_cart = mysqli_query($con, "SELECT * from cart WHERE user_id = '$userId'");
                    $grand_total = 0;
                    if(mysqli_num_rows($select_cart) > 0){
                        while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                            ?>
                 <tr>
                    <td><img src ="uploaded_image/<?php echo $fetch_cart['image']; ?>" height = "100" alt = ""></td>
                    <td><?php echo $fetch_cart['name']; ?></td>
                    <td><i class="fa-solid fa-peso-sign"><?php echo number_format($fetch_cart['price']); ?></i></td>
                    <td><form action = "" method ="post">
                            <input type = "hidden" name = "update_cart_id" value = <?php echo $fetch_cart['id'];?>>
                            <input type = "number" class = "input-num-cart" min = "1" name = "update_cart_quantity" value ="<?php echo $fetch_cart['quantity']; ?>">
                            <input type = "submit" class = "input-sub-cart" name = "update_cart_submit" value = "Update">
                        </form>
                    </td>
                    <td><i class="fa-solid fa-peso-sign"><?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?> </td>
                    <td><a href = "cart.php?remove=<?php echo $fetch_cart['id'];?>" onclick = "return confirm('Are you sure you want to remove the product from the cart?')" class = "delete_product_btn"><i class="fa-sharp fa-solid fa-xmark"></i></a></td>
                    </tr>
                    <?php
                    $grand_total += $sub_total;
                        }
                    } ?>
                    <tr class = "table_btm">
                    <td><a href="products.php" class="option-btn">continue shopping</a></td>
                            <td>Grand Total</td>
                            <td><i class="fa-solid fa-peso-sign"><?php echo $grand_total; ?></td>
                            <td><a href= "cart.php?checkout" onclick ="return confirm('Do you want to proceed to check out?');" class = "checkout-button <?= ($grand_total > 0)?'':'disabled';?>"><i class="fa-solid fa-bag-shopping"></i> Check Out</a></td>
                            <td><a href = "cart.php?delete_all" onclick ="return confirm('Do you wish to delete the products?');" class = "delete-products-cart"><i class="fas fa-trash"></i>  DELETE ALL </a></td>
                    </tr>   
                <?php
             ?>    
        </tbody>
    </table>
                </section> 
                
</div>
</body>
</html>