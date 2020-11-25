<?php  
include "conect.php";
 $output = '';  
 $id = $_POST["type_id"]."";
 if(isset($_POST["type_id"]))  
 {  
      if($id)  
      {  
           $sql = "SELECT * FROM product WHERE status = 1 and product_type_id = '".$id."'";  
      }  
      else  
      {  
           $sql = "SELECT * FROM product WHERE status = 1";  
      }  
      $result = mysqli_query($mysqli, $sql); 
      while($row = mysqli_fetch_array($result))  
      {  
     //    $output .= '<option value="'.$row["product_id"].'">'.$row["product_name"]." ราคา".$row["product_price"]." บาท".'</option>';  
        $output .= '<tr style="text-align: center;">';
        $output .= '<td><img src="img/' . $row['product_id'] . '.jpg" width="80" border="0" /></td>';
        $output .= '<td>' . $row['product_name'] . '</td>';
        $output .= '<td>' . $row['product_price'] . '</td>';
        $output .= '<td>' . $row['product_stock'] . '</td>';
        $output .= '<td><a href="#" onclick="addcart(' . $row['product_id'] . ')">เพิ่ม</a></td>';
        $output .= '</tr>';
      }  
      echo $output;  
 }  
 ?>  