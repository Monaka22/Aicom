<?php  
include "conect.php";
 $output = '';  
 $search = "%".$_POST["search"]."%";
 if(isset($_POST["search"]))  
 {  
      if($_POST["search"] != "")  
      {  
           $sql = "SELECT * FROM product where product_name LIKE '$search' and status = 1";  
      }  
      else  
      {  
           $sql = "SELECT * FROM product WHERE status = 1";  
      }  
      $result = mysqli_query($mysqli, $sql); 
      $num = mysqli_num_rows($result);
      if($num > 0){
        for($i=1;$i<=$num;$i++)
		{ 
            $objResult =  mysqli_fetch_assoc($result);
     //    $output .= '<option value="'.$row["product_id"].'">'.$row["product_name"]." ราคา ( บาท )".$row["product_price"]." บาท".'</option>';  
            $output .= '<tr style="text-align: center;">';
            $output .= '<td>'.$i.'</td>';
            $output .= '<td><img src="img/' .$objResult['product_id'] . '.jpg" width="80" border="0" /></td>';
            $output .= '<td>' . $objResult['product_name'] . '</td>';
            $output .= '<td>' . $objResult['product_price'] . '</td>';
            $output .= '<td>' . $objResult['product_stock'] . '</td>';
            $id = $objResult['product_type_id'];
            $strSQLc = "SELECT * FROM product_type where product_type_id ='$id'";
            $objQueryc = $mysqli->query($strSQLc) or die ("error=$strSQLc");
            $objResultc = mysqli_fetch_assoc($objQueryc);
            $type = $objResultc['product_type_name'];
            $onclickText = "ต้องการลบสินค้าชนิดนี้ ?";
            $output .= '<td align="center">' . $type . '</td>';
            $output .= '<td><a href="index.php?page=editproduct&&product_id='.$objResult['product_id'].'">แก้ไข</a></td>';
            $output .= '<td><a href="delete.php?product_id='.$objResult['product_id'].'" onclick="return confirm('.$onclickText.');">ลบ</a></td>';
            $output .= '</tr>';
        }  
      }
      echo $output;  
 }
