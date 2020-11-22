<?php
    $stock_id = $_GET['stock_id'];
    include "conect.php";
    $strSQL = "UPDATE `stock` SET `stock_status` = 2 WHERE `stock_id` = '$stock_id'";
    $mysqli->query($strSQL) or die("error=$strsql");
    mysqli_close($mysqli);
    echo "<script>window.location='index.php?page=stock';</script>";
?>