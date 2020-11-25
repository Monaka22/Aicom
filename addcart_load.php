<?php  
include "conect.php";
session_start();
$id = $_POST["product_id"];
$sqlc = "SELECT * FROM carts WHERE id = '".$id."'";  
$resultc = mysqli_query($mysqli, $sqlc); 
if (mysqli_num_rows($resultc)) {
  $numc = mysqli_num_rows($resultc);
}else{
  $numc = 0;
}
$arr = array();
$output = '';  
 if(isset($id) != "")
 {  
      if($numc > 0){
        $strSQLu = "UPDATE `carts` SET total = total + 1  WHERE `id` = '$id'";
        $mysqli->query($strSQLu) or die("error=$strSQLu");
      }else{
        $sql = "SELECT * FROM product WHERE status = 1 and product_id = '".$id."'";  
        $result = mysqli_query($mysqli, $sql);  
        $row = mysqli_fetch_array($result);
            $arr[] = array(
                'id' => $row["product_id"],
                'name' => $row["product_name"],
                'price' => $row["product_price"],
                'total' => 1,
            );
            $rowid = $row["product_id"];
            $rowname = $row["product_name"];
            $rowtotal = 1;
            $rowprice = $row["product_price"];
            $strSQL = "insert into carts values ('$rowid','$rowname','$rowprice','$rowtotal')";
            $objQuery = $mysqli->query($strSQL) or die("error=$strsql");
      }
        $sqlcs = "SELECT * FROM carts where total > 0";  
        $resultcs = mysqli_query($mysqli, $sqlcs);
        $total = 0;
        while($rows = mysqli_fetch_array($resultcs))  
        {  
          $output .= '<tr style="text-align: center;">';
          $output .= '<td width="100"><img src="img/' . $rows['id'] . '.jpg" width="80" border="0" /></td>';
          $output .= '<td width="150">' . $rows['name'] . '</td>';
          $output .= '<td width="150">' . $rows['total'] . '</td>';
          $output .= '<td width="150">' . $rows['total']*$rows['price'] . '</td>';
          $output .= '<td width="300"><a href="#" onclick="removecart(' . $rows['id'] . ')">ลบ</a></td>';
          $output .= '</tr>';
          $total =  $total + $rows['total']*$rows['price'];
        }  
          $output .= '<tr style="text-align: center;">';
          $output .= '<td width="300">รวมเป็นเงินทั้งหมด</td>';
          $output .= '<td width="150"></td>';
          $output .= '<td width="150"></td>';
          $output .= '<td width="150"></td>';
          $output .= '<td width="300">'.$total.' บาท</td>';
          $output .= '</tr>';
          echo $output;  
 }  
 ?>  