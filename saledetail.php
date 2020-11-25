<?PHP
$order_id = $_GET["order_id"];
  if ($_SESSION["user_id"] == "") {
    echo "Please login!";
    exit();
  }
  include "conect.php";
  $strSQLc = "SELECT *
    FROM orders
    INNER JOIN users
    ON users.user_id = orders.order_seller
    WHERE order_id = '$order_id'";
  $objQueryc =  $mysqli->query($strSQLc);
  $ObjResultc = mysqli_fetch_assoc($objQueryc);
  ?>
<div class="text-left">
	<h3>รายการขายที่ #<?= $order_id?></h3>
</div>
<div class="text-left">
	<h4 style="color: #b6b6b6;">พนักงานขาย <?= $ObjResultc['name'];?></h4 style="color: #b6b6b6;">
</div>
<table class="table">
    <thead class="thead-dark">
		<tr>
            <td width="100" align="center"><strong>ลำดับ</strong></td>
            <td width="150" align="center"><strong>ชื่อสินค้า</strong></td>
            <td width="150" align="center"><strong>จำนวน</strong></td>
            <td width="150" align="center"><strong>ราคา</strong></td>
		</tr>
	</thead>
    <?php
    include "conect.php";
    $strSQL = "SELECT *
    FROM order_detail
    INNER JOIN product
    ON order_detail.order_detail_product_id = product.product_id
    WHERE order_detail.order_detail_order_id = '$order_id'
    ;";
    $objQuery = $mysqli->query($strSQL);
    $num = mysqli_num_rows($objQuery);
    for ($i = 1; $i <= $num; $i++) {
        $objResult =  mysqli_fetch_assoc($objQuery);
    ?>
    <tbody>
        <tr style="text-align: center;">
            <td><?php echo $i ?></td>
            <td><?php echo $objResult['product_name'] ?></td>
            <td><?php echo $objResult['order_detail_total'] ?></td>
            <td><?php echo $objResult['product_price'] ?> บาท</td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>
<div class="text-right">
    <h5>รวมเป็นจำนวนเงิน <?= $ObjResultc['order_total'];?> บาท</h4>
</div>