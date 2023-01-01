<?php
	$sname = "localhost";
	$uname = "root";
	$pword = "";
	$dbname = "test";

	$con = mysqli_connect($sname,$uname,$pword,$dbname);

	if ($con ->  connect_error){
		echo "Connection Failed!";
	} $con -> select_db("test");
?>