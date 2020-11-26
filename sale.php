<div class="text-center">
	<h3>รายการขาย</h3>
</div>
<div class="text-right">
	<button class="btn btn-success"><a class="text-white" href="index.php?page=addsale">เพิ่มการขายสินค้า</a></button>
</div>
<table class="table mt-4">
    <thead style="background-color: #F4F4F4;" class="thead-dark">
		<tr>
            <td width="100" align="center"><strong>ลำดับ</strong></td>
            <td width="150" align="center"><strong>หมายเลขการขาย</strong></td>
            <td width="150" align="center"><strong>พนักงานขาย</strong></td>
            <td width="150" align="center"><strong>จำนวนเงิน</strong></td>
            <td width="150" align="center"><strong>ดูรายละเอียด</strong></td>
		</tr>
	</thead>
    <?php
    include "conect.php";
    $strSQL = "SELECT *
    FROM orders
    INNER JOIN users
    ON users.user_id = orders.order_seller
    ORDER BY create_at DESC
    ;";
    $objQuery = $mysqli->query($strSQL);
    $num = mysqli_num_rows($objQuery);
    for ($i = 1; $i <= $num; $i++) {
        $objResult =  mysqli_fetch_assoc($objQuery);
    ?>
    <tbody>
        <tr style="text-align: center;">
            <td><?php echo $i ?></td>
            <td><?php echo $objResult['order_id'] ?></td>
            <td><?php echo $objResult['name'] ?></td>
            <td><?php echo $objResult['order_total'] ?> บาท</td>
            <td><a href="index.php?page=orderdetail&&order_id=<?php echo $objResult['order_id'] ?>">รายละเอียด</a></td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>