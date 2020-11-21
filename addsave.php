<?php
$p_name = $_POST['p_name'];
$p_detail = $_POST['p_detail'];
$p_price = $_POST['p_price'];
$p_stock = $_POST['p_stock'];
$c_id = $_POST['c_id'];
$image = $_FILES['image'];
$imageinfo = pathinfo($image['name']);
$status = 1;
include "conect.php";
// ตรวจสอบไฟล์ที่แนบมา
if ($image['size']!=0 && $imageinfo['extension']!='jpg' && $imageinfo['extension']!='gif' ) {
	echo "<script>alert('แนบไฟล์ .gif หรือ .jpg เท่านั้น');
	history.back();</script>";
	exit();
}
	$strSQL = "insert into product values (null,'$p_name','$p_detail','$p_stock',$p_price,'$c_id','$status')";
	$objQuery = $mysqli->query($strSQL) or die("error=$strsql");
	// ย้ายรูปเก็บในตำแหน่งที่ต้องการ
	
	if ($image['size']!=0){
		$imagename = mysqli_insert_id($mysqli).".jpg";
		move_uploaded_file($image['tmp_name'],"../Aicom/img/$imagename");
	}
	mysqli_close($mysqli);
	echo "<script>window.location='index.php?page=product';</script>";
?>