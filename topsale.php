<div class="text-center">
	<h3>สินค้าขายดี 5 อันดับแรก</h3>
</div>
<table class="table mt-4">
	<thead style="background-color: #F4F4F4;" class="thead-dark">
		<tr>
		<td width="100" align="center"><strong>ลำดับ</strong></td>
		<td width="200" align="center"><strong>รูป</strong></td>
        <td width="200" align="center"><strong>ชื่อสินค้า</strong></td>
		<td width="100" align="center"><strong>ประเภท</strong></td>
		<td width="100" align="center"><strong>ราคา ( บาท )</strong></td>
		<td width="100" align="center"><strong>ขายได้</strong></td>
		</tr>
	</thead>
	<tbody>
		<?php
		include "conect.php";
		$strSQL = "SELECT * ,SUM(order_detail_total) as order_detail_total FROM order_detail INNER JOIN product ON order_detail.order_detail_product_id = product.product_id GROUP BY order_detail_product_id ORDER BY order_detail_total DESC LIMIT 5";
		$objQuery = $mysqli->query($strSQL);
		$num = mysqli_num_rows($objQuery);
		for($i=1;$i<=$num;$i++)
		{
			$objResult =  mysqli_fetch_assoc($objQuery);
		?>
		<tr style="text-align: center;">
		<td><?php echo $i?></td>
		<td><?php
		if(file_exists("img/{$objResult['product_id']}.jpg"))
		{
		?>
			<img src="img/<?php echo $objResult['product_id']?>.jpg" width="80" border="0"/>
			<?php
			}
			?></td>
		<td><?php echo $objResult['product_name'] ?></td>
		<td align="center"><?php 
		$id = $objResult['product_type_id'];
		$strSQLc = "SELECT * FROM product_type where product_type_id ='$id'";
		$objQueryc = $mysqli->query($strSQLc) or die ("error=$strSQLc");
		$objResultc = mysqli_fetch_assoc($objQueryc);
		echo $objResultc['product_type_name']?></td>
		<td><?php echo $objResult['product_price'] ?></td>
		<td><?php echo $objResult['order_detail_total'] ?> ชิ้น</td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>