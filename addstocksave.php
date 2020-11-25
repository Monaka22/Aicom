<?php
$product = $_POST['product'];
$p_stock = $_POST['p_stock'];
$status = 0;
$date = date("Y-m-d H:i:s");
include "conect.php";
echo $product;
echo $p_stock;
echo date("Y-m-d H:i:s");
	$strSQL = "insert into stock values (null,'$product','$p_stock','$status','$date','$date')";
	$objQuery = $mysqli->query($strSQL) or die("error=$strsql");
	mysqli_close($mysqli);
	echo "<script>window.location='index.php?page=stock';</script>";
?>