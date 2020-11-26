<?php  
include "conect.php";
 $output = '';  
 $start = $_POST["start"];
 $end = $_POST["end"];
//  echo $start;
//  echo $end;
        $sql = "SELECT *
        FROM stock
        INNER JOIN product
        ON stock.stock_product_id = product.product_id
        WHERE stock.create_at BETWEEN '$start' AND '$end' AND stock_status = 1"; 
        $result = mysqli_query($mysqli, $sql); 
        $num = mysqli_num_rows($result);
        $total = 0;
            for($i=1;$i<=$num;$i++)
            { 
            $objResult =  mysqli_fetch_assoc($result);
            $output .= '<tr style="text-align: center;">';
            $output .= '<td>'.$i.'</td>';
            $output .= '<td><img src="img/'.$objResult['product_id'].'.jpg" width="80" border="0" /></td>';
            $output .= '<td>' . $objResult['product_name'] . '</td>';
            $output .= '<td  width="100">' . $objResult['product_price'] . ' บาท</td>';
            $output .= '<td>' . $objResult['stock_total'] . '</td>';
            $output .= '</tr>';
            $total = $total + $objResult['stock_total'] * $objResult['product_price'];
        }  
            $output .= '<tr style="text-align: center;">';
            $output .= '<td></td>';
            $output .= '<td></td>';
            $output .= '<td></td>';
            $output .= '<td>รวมเป็นเงินทั้งหมด</td>';
            $output .= '<td>'.$total.' บาท</td>';
            $output .= '</tr>';
        echo $output;  
 ?>  