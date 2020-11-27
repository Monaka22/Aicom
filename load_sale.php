<?php  
include "conect.php";
 $output = '';  
 $start = $_POST["start"];
 $end = $_POST["end"];
//  echo $start;
//  echo $end;
        $sql = "SELECT * FROM orders INNER JOIN users ON users.user_id = orders.order_seller WHERE orders.create_at BETWEEN '$start' AND '$end' ORDER BY create_at DESC"; 
        $result = mysqli_query($mysqli, $sql); 
        $num = mysqli_num_rows($result);
        $total = 0;
            for($i=1;$i<=$num;$i++)
            { 
            $objResult =  mysqli_fetch_assoc($result);
            $output .= '<tr style="text-align: center;">';
            $output .= '<td>'.$i.'</td>';
            $output .= '<td>' . $objResult['order_id'] . '</td>';
            $output .= '<td>' . $objResult['name'] . '</td>';
            $output .= '<td  width="100">' . $objResult['create_at'] . '</td>';
            $output .= '<td>' . $objResult['order_total'] . ' บาท</td>';
            // $output .= '<td><a href="home.php?page=orderdetail&&order_id='.$objResult['order_id'].'>รายละเอียด</a></td>';
            $output .= '<td><a href="home.php?page=orderdetail&&order_id='.$objResult['order_id'].'">รายละเอียด</a></td>';
            $output .= '</tr>';
            $total = $total + $objResult['order_total'];
        }  
            $output .= '<tr style="text-align: center;">';
            $output .= '<td></td>';
            $output .= '<td></td>';
            $output .= '<td></td>';
            $output .= '<td></td>';
            $output .= '<td>รวมเป็นเงินทั้งหมด</td>';
            $output .= '<td>'.$total.' บาท</td>';
            $output .= '</tr>';
        echo $output;  
 ?>  