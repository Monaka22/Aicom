<?php
$p_name = $_POST['p_name'];
$p_detail = $_POST['p_detail'];
$p_stock = $_POST['p_stock'];
$p_price = $_POST['p_price'];
$c_id = $_POST['c_id'];
$p_id = $_POST["p_id"];
include "conect.php";
$strSQL = "UPDATE `product` SET `product_name` = '$p_name',`product_detail` = '$p_detail',`product_stock` = '$p_stock',`product_price` = '$p_price',`product_type_id` = '$c_id' WHERE `product_id` = '$p_id'";
$mysqli->query($strSQL) or die("error=$strsql");
mysqli_close($mysqli);
echo "<script>window.location='index.php?page=product';</script>";
?>