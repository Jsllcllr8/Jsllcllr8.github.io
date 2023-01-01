
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

<div class = "container-log">
<div class = "login-form">
<form action = "ControllerUserData.php" method = "post">

    <label for = "username" >Username: </label>
        <input class = "login-box" type = "text" id = "username" name = "Username" placeholder = "USERNAME"/><br>
    <label for = "password"> Password: </label>
        <input class = "login-box" type = "password"id = "password" name = "Password" placeholder = "PASSWORD"/><br>
    <div class = "f_pass"><a href = "f_password.php">Forgot your password?</a></div><br>
    <input class = "login-btn" type = "submit" name = "btn-login" value = "LOGIN"/>

    
</form>


</div> 
</div>

</body>
</head>