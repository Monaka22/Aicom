<?php
// echo 'Hello ' . htmlspecialchars($_POST["Uname"]) . '!';
session_start();
include "conect.php";
$strSQL="SELECT * FROM users WHERE username='".$_POST["Uname"]."'
and password= '".$_POST["Pass"]."'";
$objQuery = $mysqli->query($strSQL);
$objResult = mysqli_fetch_assoc($objQuery);
if(!$objResult){
	echo "Username and Password Incorrect!!";
	}
	else{
		$_SESSION["user_id"] = $objResult["user_id"];
		session_write_close();
			header("location:index.php");
		}
	mysqli_close($mysqli);
?>