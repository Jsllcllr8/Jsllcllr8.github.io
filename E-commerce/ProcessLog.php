<?php include('connection.php');

    session_start();
    $UserEmail = $_POST['user'];
    $SelLog = "SELECT * FROM teacher WHERE email = '$UserEmail'";
    $SelectLog = mysqli_query($ClassConnDB,$SelLog);
    $countLog = mysqli_num_rows($SelectLog);
    if($UserEmail == "")
        header( "location: login.php?EmptyEmailInp= Please type email access ");
    else if ($countLog == 1){
        while($getPass = mysqli_fetch_array($SelectLog)){
            $Pass = $getPass['password'];
            $ProfName = $getPass['fname'];
        }
        if($_POST['pass'] == "")
        header( "location: login.php?EmptyPassInp= Please type a password");
        else if($Pass == $_POST['pass']){
            $_SESSION['ProfName'] = $ProfName;
            header( "location: index.php");
        }else
            header( "location: login.php?IncPass= Incorrect Password please try again ");
        
    }else
         header( "location: login.php?NotEmail= Sorry This email was not exist please try another ");
    mysqli_close($ClassConnDB);
?>