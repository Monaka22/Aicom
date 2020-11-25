<?php  
include "conect.php";
$id = $_POST["product_id"];
$output = '';  
 if(isset($id) != "")
 {  
        $strSQLu = "UPDATE `carts` SET total = total - 1  WHERE `id` = '$id'";
        $mysqli->query($strSQLu) or die("error=$strSQLu");

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