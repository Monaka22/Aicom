<?php
    $stock_id = $_GET['stock_id'];
    $stock_total = (int)$_GET['stock_total'];
    $product_id = $_GET['product_id'];
    include "conect.php";
    $strSQL = "UPDATE `stock` SET `stock_status` = 1 WHERE `stock_id` = '$stock_id'";
    $mysqli->query($strSQL) or die("error=$strsql");
    $strSQLp = "UPDATE `product` SET product_stock = product_stock + $stock_total WHERE `product_id` = '$product_id'";
    $mysqli->query($strSQLp) or die("error=$strSQLp");
    mysqli_close($mysqli);
    echo "<script>window.location='index.php?page=stock';</script>";
?>