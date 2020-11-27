<?php  
include "conect.php";
 $output = '';  
 if(isset($_POST["type_id"]))  
 {  
      if($_POST["type_id"] != "0")  
      {  
           $sql = "SELECT * FROM product WHERE status = 1 and product_type_id = '".$_POST["type_id"]."'";  
      }  
      else  
      {  
           $sql = "SELECT * FROM product where status = 1";  
      }  
      $result = mysqli_query($mysqli, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
        $output .= '<div class="col-lg-4 col-md-6 mb-4">';
        $output .= '<div class="card h-100">';
        $output .= '<img class="card-img-top" src="img/'.$row['product_id'].'.jpg" alt="">';
        $output .= '<div class="card-body">';
        $output .= '<h4 class="card-title">';
        $output .= '<span href="#">'.$row['product_name'].'</span>';
        $output .= '</h4>';
        $output .= '<p class="card-text">'.$row['product_detail'].'</p>';
        $output .= '</div>';
        $output .= '<div class="card-footer">';
        $output .= '<small class="text-muted">';
        $output .= '<h5>'.$row['product_price'].' บาท</h5></small>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';
      }  
      echo $output;  
 }  
 ?>  