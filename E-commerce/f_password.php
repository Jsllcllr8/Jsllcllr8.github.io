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
      <div class = "f_password_container">
                    <form action = "find_password.php" method = "post">
                    <p>Find your password</p> 
                  
                  <input type = "text" name = "f_user" class ="f_box" placeholder="Enter your username"><br>
                  <input type = "password" name ="f_s_password" class ="f_box" placeholder ="Enter your second password"><br>
                 <input type = "email" name = "f_email" class ="f_box" placeholder="Enter your email"><br>
                 <input type = "submit" name = "f_submit" class ="f_box" value = "SUBMIT">
                 </form>

                 
                 </div>
    </body>
</html>