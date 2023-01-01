<?php 
require_once ('connection.php');
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
      <div class = "information_pass_user">
    
    <?php
    if(isset($_POST['f_submit'])){
        $f_user = $_POST['f_user'];
        $f_s_password = $_POST['f_s_password'];
        $f_email = $_POST['f_email'];
        $f_sql = "SELECT * from customer_info where username = '".$f_user."' AND email = '".$f_email."' AND s_password = '".$f_s_password."' limit 1";
        $f_result = mysqli_query($con, $f_sql);
        if(mysqli_fetch_assoc($f_result)){
          $pass_check = mysqli_query($con,"SELECT * FROM customer_info WHERE username = '$f_user'");
          $pass_num = mysqli_num_rows($pass_check);
          $fetch_pass = mysqli_fetch_assoc($pass_check);
          echo"<div class = 'border_details'>";
          echo"<div class = 'border_info_details'>";
          echo"<h2>Information</h2>";
          echo "<strong>Your Username is: </strong>".$fetch_pass['username'];?> <br> <?php
          echo "<strong>Your Password is: </strong>".$fetch_pass['password'];
          echo"</div>";
          echo"</div>";
        }
      }

?>
                 </div>
    </body>
</html>