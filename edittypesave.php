<?php
$p_name = $_POST['p_name'];
$p_id = $_POST["p_id"];
include "conect.php";
$strSQL = "UPDATE `product_type` SET `product_type_name` = '$p_name' WHERE `product_type_id` = '$p_id'";
$mysqli->query($strSQL) or die("error=$strsql");
mysqli_close($mysqli);
echo "<script>window.location='home.php?page=type';</script>";
?>