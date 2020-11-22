<?php  
include "conect.php";
 $output = '';  
 if(isset($_POST["type_id"]))  
 {  
      if($_POST["type_id"] != '')  
      {  
           $sql = "SELECT * FROM product WHERE status = 1 and product_type_id = '".$_POST["type_id"]."'";  
      }  
      else  
      {  
           $sql = "SELECT * FROM product status = 1";  
      }  
      $result = mysqli_query($mysqli, $sql);  
      $output .= '<option value="">เลือกสินค้า</option>';
      while($row = mysqli_fetch_array($result))  
      {  
        $output .= '<option value="'.$row["product_id"].'">'.$row["product_name"]." ราคา".$row["product_price"]." บาท".'</option>';  
      }  
      echo $output;  
 }  
 ?>  