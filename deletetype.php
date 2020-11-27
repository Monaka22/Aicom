<?php
  $p_id = $_GET['product_type_id'];
  include "conect.php";
  $strSQL = "UPDATE `product_type` SET `status` = 0 WHERE `product_type_id` = '$p_id'";
  $mysqli->query($strSQL) or die("error=$strsql");
  mysqli_close($mysqli);
  echo "<script>window.location='home.php?page=type';</script>";
  ?>