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
<link rel="stylesheet" type="text/css" href="print.css" media="print">
<div class="text-left">
	<h3>รายการขายที่ #<?= $order_id?></h3>
</div>
<div class="text-left">
	<p style="color: #737373;">พนักงานขาย <?= $ObjResultc['name'];?></p style="color: #737373;">
</div>
<div class="text-left">
	<p style="color: #737373;">วันที่ขาย <?= $ObjResultc['create_at'];?></p style="color: #737373;">
</div>
<table class="table">
    <thead class="thead-dark">
		<tr>
            <td width="100" align="center"><strong>ลำดับ</strong></td>
            <td width="150" align="center"><strong>ชื่อสินค้า</strong></td>
            <td width="150" align="center"><strong>จำนวน</strong></td>
            <td width="150" align="center"><strong>ราคา ( บาท )</strong></td>
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
<div class="text-right">
    <h5>Vat 7%  <?= $ObjResultc['order_total']+($ObjResultc['order_total']*(7/100));?> บาท</h4>
</div>
<div class="text-right">
	<button id="print-btn" onclick="window.print();" class="btn btn-success mt-2">พิมพ์คำสั่งซื้อ</button>
</div>