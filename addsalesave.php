<?php
session_start();
include "conect.php";
$date = date("Y-m-d H:i:s");
$sqlcs = "SELECT * FROM carts where total > 0";  
$resultcs = mysqli_query($mysqli, $sqlcs);
$total = 0;
    while($rows = mysqli_fetch_array($resultcs))  
    {  
        $total =  $total + $rows['total']*$rows['price'];
    }
    $strSQL = "insert into orders values (null,'".$_SESSION["user_id"]."','$total','$date','$date')";
    $objQuery = $mysqli->query($strSQL) or die("error=$strSQL");
    $id = mysqli_insert_id($mysqli);
    $sqlcsd = "SELECT * FROM carts where total > 0";  
    $resultcsd = mysqli_query($mysqli, $sqlcsd);
    while($rowsd = mysqli_fetch_array($resultcsd))  
    {  
        $strSQLs = "insert into order_detail values (null,'".$rowsd["id"]."','$id','".$rowsd["total"]."')";
        $objQuerys = $mysqli->query($strSQLs) or die("error=$strSQLs");
        $total_p = (int)$rowsd["total"];
        $id_p = $rowsd["id"];
        // "UPDATE `carts` SET total = total + 1  WHERE `id` = '$id'";
        // "UPDATE `product` SET `product_name` = '$p_name',`product_detail` = '$p_detail',`product_stock` = '$p_stock',`product_price` = '$p_price',`product_type_id` = '$c_id' WHERE `product_id` = '$p_id'";
        $strSQLp = "UPDATE product SET product_stock = product_stock - '$total_p' WHERE `product_id` = '$id_p'";
        $objQueryp = $mysqli->query($strSQLp) or die("error=$strSQLp");
    }
    $strSQLd = "DELETE FROM `carts`";
    $objQueryd = $mysqli->query($strSQLd) or die("error=$strSQLd");
    echo "<script>window.location='home.php?page=home';</script>";
?>