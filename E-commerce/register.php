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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>

    <?php include 'header.php';?>
     <div class = "dis-reg"> 
    <div class = "register-cont">
        
        <form action = "ControllerUserData.php" method = "post">
            <h2>CREATE AN ACCOUNT</h2><br>
            <label for = "firstname">First name: </label>
            <input class = "reg-box" type = "text" id = "firstname" name = "F_name" required><br>
            <label for = "lastname">Last name: </label>
            <input class = "reg-box" type = "text" id = "lastname" name = "L_name" required><br>
            <label for = "username">Username: </label>
            <input class = "reg-box" type = "text" id = "username" name = "Username" required><br>
            <label for = "password">Password: </label>
            <input class = "reg-box" type ="password" id = "password" name = "Password" required><br>
            <label for = "c_password">Confirm Password: </label>
            <input class = "reg-box" type = "password" id = "c_password"  name = "C_Password" required><br>
            <label for = "s_password">Second Password: </label>
            <input class = "reg-box" type = "password" id = "s_password" name = "S_Password" required><br>
            <label for = "mobilenumber">Mobile Number: </label>
            <input class = "reg-box" type = "tel" id = "mobilenumber" name = "Mobile_no"  required><br>
            <label for = "email">Email: </label>
            <input class = "reg-box" type = "email" id = "email" name = "Email" required><br>
            <label for = "address">Address: </label>
            <input class = "reg-box" type = "text" id = "address" name = "Address" required><br>
            <label for = "province">Province: </label>
            <input class = "reg-box" type = "text" id = "province" name = "Province" required><br>
            <label for = "city">City: </label>
            <input class = "reg-box" type = "text" id = "city" name = "City" required><br>
            <input class = "reg-btn" type = "submit" name = "create" value = "CREATE"><br>
            
        </form>
        
    </div>
    </div>
   
     </body>
     </html>