<?php
  $p_id = $_GET['product_id'];
  include "conect.php";
  $strSQL = "UPDATE `product` SET `status` = 0 WHERE `product_id` = '$p_id'";
  $mysqli->query($strSQL) or die("error=$strsql");
  mysqli_close($mysqli);
  echo "<script>window.location='index.php?page=product';</script>";
  ?>