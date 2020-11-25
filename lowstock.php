<div class="text-center">
	<h3>สินค้าที่มีน้อยกว่า 10 ชิ้น</h3>
</div>
<table class="table">
	<thead class="thead-dark">
		<tr>
		<td width="100" align="center"><strong>ลำดับ</strong></td>
		<td width="200" align="center"><strong>รูป</strong></td>
        <td width="200" align="center"><strong>ชื่อสินค้า</strong></td>
		<td width="100" align="center"><strong>ประเภท</strong></td>
		<td width="100" align="center"><strong>ราคา</strong></td>
		<td width="150" align="center"><strong>สต็อก</strong></td>
		</tr>
	</thead>
	<tbody>
		<?php
		include "conect.php";
		$strSQL = "SELECT * FROM product where status = 1 and product_stock < 10";
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
		<td>เหลือ <?php echo $objResult['product_stock'] ?> ชิ้น</td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>