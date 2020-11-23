<div class="text-center">
	<h3>รายการประเภทสินค้า</h3>
</div>
<div class="text-right">
	<button class="btn btn-success"><a class="text-dark" href="index.php?page=addtype">เพิ่มประเภทสินค้า</a></button>
</div>
<table class="table">
	<thead class="thead-dark">
		<tr>
			<td width="33" align="center"><strong>ลำดับ</strong></td>
			<td width="218" align="center"><strong>ชื่อประเภท</strong></td>
			<td width="100" align="center"><strong>แก้ไข</strong></td>
			<td width="100" align="center"><strong>ลบ</strong></td>
		</tr>
	</thead>
	<tbody>
	<?php
	include "conect.php";
	$strSQL = "SELECT * FROM product_type where status = 1";
	$objQuery = $mysqli->query($strSQL);
	
	$num =  mysqli_num_rows($objQuery);
	if($num > 0){
		for($i=1;$i<=$num;$i++)
		{
			$objResult = mysqli_fetch_assoc($objQuery);
			?>
			<tr style="text-align: center;">
			<td><?=$i?></td>
			<td><?php echo $objResult['product_type_name'] ?></td>
			<td><a href="index.php?page=edittype&&product_type_id=<?php echo $objResult['product_type_id']?>">edit</a></td>
			<td><a href="deletetype.php?product_type_id=<?php echo $objResult['product_type_id']?>"
			onclick="return confirm('Are you sure??');">delete</a></td>
			</tr>
			<?php
		}
	}
	?>
	</tbody>
</table>