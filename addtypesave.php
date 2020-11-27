<?php
$p_name = $_POST['p_name'];
$status = 1;
include "conect.php";
// ตรวจสอบไฟล์ที่แนบมา
	$strSQL = "insert into product_type values (null,'$p_name','$status')";
	$objQuery = $mysqli->query($strSQL) or die("error=$strsql");
	mysqli_close($mysqli);
	echo "<script>window.location='home.php?page=type';</script>";
?>