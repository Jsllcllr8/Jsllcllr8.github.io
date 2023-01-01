<?php
session_start();
require_once ('connection.php');

// Registration
if(isset($_REQUEST['create'])){
    $user = $_REQUEST['Username'];
    $DBuserCh = "SELECT * from customer_info WHERE username = '$user'";
    $userQuery = mysqli_query($con,$DBuserCh);
    $userRow = mysqli_num_rows($userQuery);
    if($userRow == 0){
        if($_REQUEST['Password'] == $_REQUEST['C_Password']){
            $email = $_REQUEST['Email'];
            $DBemaiCh = "SELECT * from customer_info WHERE email = '$email'";
            $emailQuery = mysqli_query($con,$DBemaiCh);
            $emailRow = mysqli_num_rows($emailQuery);
            if($emailRow == 0){
                $getId = "SELECT * from customer_info";
                $idQuery = mysqli_query($con,$getId);
                $id = mysqli_num_rows($idQuery) + 1;
                $firstname = $_REQUEST['F_name'];
                $lastname = $_REQUEST['L_name'];
                $username = $_REQUEST['Username'];
                $password = $_REQUEST['Password'];
                $s_password = $_REQUEST['S_Password'];
                $mobile_no = $_REQUEST['Mobile_no'];
                $email = $_REQUEST['Email'];
                $address = $_REQUEST['Address'];
                $province = $_REQUEST['Province'];
                $city = $_REQUEST['City'];
           
                $insert = "INSERT INTO customer_info VALUES('$id','$firstname','$lastname','$username','$password','$s_password','$mobile_no','$email','$address','$province','$city')"; 
                echo '<script>alert("Register Successful, you are now proceed to log in, we are waiting for you")</script>';
                mysqli_query($con,$insert);
                mysqli_close($con);
                echo("<script>window.location = 'login.php';</script>");
                die();
            }else {
                echo "The email is already taken.";
            }
        } else {
            echo "The passwords do not match.";
        }
    } else {
        echo "The username is already taken.";
    }
}

// Log In
if(isset($_POST['btn-login']))
    {     
            $user = $_POST['Username'];
            $pass = $_POST['Password'];

            $sql = "SELECT * from customer_info where username = '".$user."' AND password = '".$pass."' limit 1";
            $result = mysqli_query ($con,$sql);
            $sqladmin = "SELECT * from admin_acc where username = '".$user."' AND password = '".$pass."' limit 1"; 
            $resultadmin = mysqli_query ($con,$sqladmin);
                    if(mysqli_fetch_assoc($result))
                    {
                    $_SESSION['username']=$_POST['Username'];
                    echo '<script>alert("You have Logged in successfully!")</script>';
                    echo("<script>window.location = 'index.php';</script>");
                        
                    } 
                    else if(mysqli_fetch_assoc($resultadmin))
                    {
                        $_SESSION['username']=$_POST['Username'];
                        echo '<script>alert("You have Logged in successfully!")</script>';
                        echo("<script>window.location = 'admin.php';</script>");
                        
                    } 
                    else{
                        echo'<script>alert("You have Enetered incorrect Password.")</script>';
                        echo("<script>window.location = 'login.php';</script>");
                    }
                   
}

// Admin side - Add product
    if(isset($_POST['add_prod'])){
        $name = $_POST['product_name']; 
        $price = $_POST['product_price'];
        $image = $_FILES['product_image']['name'];
        $image_tmp_name = $_FILES['product_image']['tmp_name'];
        $image_folder = 'uploaded_image/'.$image;   
        $insert_query = mysqli_query($con,"INSERT INTO products(name,price,image) VALUES('$name','$price','$image')") or die('query failed');
    
    
        if($insert_query){
            move_uploaded_file($image_tmp_name,$image_folder);
            echo '<script>alert("Succesfully added product!")</script>';
                            mysqli_close($con);
                            echo("<script>window.location = 'admin.php';</script>");
                            die();
        }else {
            echo '<script>alert("Could not add product!")</script>';
            echo("<script>window.location = 'admin.php';</script>");
        }
    }
// Admin side - Delete
// Admin side - Update product details
    if(isset($_POST['upd_product'])){
        $id = $_POST['upd_id'];
        $name = $_POST['upd_name'];
        $price = $_POST['upd_price'];
        $image = $_FILES['upd_image']['name'];
        $upd_image_tmp = $_FILES['upd_image']['tmp_name'];
        $upd_img_folder = 'uploaded_image/'.$image;
    
        $updateQuery = mysqli_query($con, "UPDATE products SET name = '$name', price = '$price', image = '$image' WHERE id = '$id'"); 
    
        if($updateQuery){
            move_uploaded_file($upd_image_tmp,$upd_img_folder);
            echo '<script>alert("Changes has been made.")</script>';
            header('location:admin.php');
        } else {
            echo '<script>alert("Changes has not been made.")</script>';
            header('location:admin.php');
        }
    }

// Admin side - Cancel update
    if(isset($_POST['cncl_product'])){
        echo("<script>window.location = 'admin.php';</script>");
    }



?>

