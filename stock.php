<div class="text-center">
	<h3>รายการคำสั่งซื้อ</h3>
</div>
<div class="text-right">
	<button class="btn btn-success"><a class="text-white" href="index.php?page=addstock">เพิ่มคำสั่งซื้อ</a></button>
</div>
<table class="table">
    <thead class="thead-dark">
		<tr>
        <td width="50" align="center"><strong>ลำดับ</strong></td>
        <td width="150" align="center"><strong>รูป</strong></td>
        <td width="150" align="center"><strong>ชื่อสินค้า</strong></td>
        <td width="150" align="center"><strong>ราคา</strong></td>
        <td width="150" align="center"><strong>จำนวน</strong></td>
        <td width="100" align="center"><strong>สถานนะ</strong></td>
        <td width="150" align="center"><strong>ยืนยัน</strong></td>
        <td width="150" align="center"><strong>ยกเลิก</strong></td>
		</tr>
	</thead>
    <?php
    include "conect.php";
    $strSQL = "SELECT *
    FROM stock
    INNER JOIN product
    ON stock.stock_product_id = product.product_id
    ORDER BY stock_status ASC
    ;";
    $objQuery = $mysqli->query($strSQL);
    $num = mysqli_num_rows($objQuery);
    for ($i = 1; $i <= $num; $i++) {
        $objResult =  mysqli_fetch_assoc($objQuery);
    ?>
    <tbody>
        <tr style="text-align: center;">
            <td><?php echo $i ?></td>
            <td><?php
                if (file_exists("img/{$objResult['product_id']}.jpg")) {
                ?>
                    <img src="img/<?php echo $objResult['product_id'] ?>.jpg" width="80" border="0" />
                <?php
                }
                ?></td>
            <td><?php echo $objResult['product_name'] ?></td>
            <td><?php echo $objResult['product_price'] ?></td>
            <td><?php echo $objResult['stock_total'] ?></td>
            <td><?php
                if ($objResult['stock_status'] === "1") {
                    ?>
                    <span style="color: green;">สำเร็จ</span>
                    <?php
                } else if ($objResult['stock_status'] === "2") {
                    ?>
                    <span style="color: red;">ยกเลิก</span>
                    <?php
                } else {
                    echo "รอดำเนินการ";
                }
                ?></td>
            <td>
                <?php
                if ($objResult['stock_status'] !== "0") {
                    echo "ยืนยัน";
                } else {
                ?>
                    <a href="confirmstock.php?stock_id=<?=$objResult['stock_id'] ?>&&stock_total=<?=$objResult['stock_total'] ?>&&product_id=<?=$objResult['product_id'] ?>" onclick="return confirm('ยืนยันว่าได้สินค้านี้แล้ว?');">ยืนยัน</a>
                <?php
                }
                ?>
            </td>
            <td>
            <?php
                if ($objResult['stock_status'] !== "0") {
                    echo "ยกเลิก";
                } else {
                ?>
                    <a href="cancelstock.php?stock_id=<?php echo $objResult['stock_id'] ?>" onclick="return confirm('ยกเลิกการสั่งซื้อ?');">ยกเลิก</a></td>
                <?php
                }
            ?> 
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>