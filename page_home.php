<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="style.css" rel="stylesheet" type="text/css"/>
<table width="90%" align="center"  class="square">
  <tr>
    <td colspan="7" align="center"><a href="index.php?page=add">เพิ่มสินค้า</td>
  </tr>
  <tr bgcolor="#cccccc">
	<td width="33" align="center"><strong>ลำดับ</strong></td>
	<td width="121" align="center"><strong>รูป</strong></td>
	<td width="218" align="center"><strong>ชื่อสินค้า</strong></td>
	<td width="59" align="center"><strong>ราคา</strong></td>
	<td width="59" align="center"><strong>สต็อก</strong></td>
	<td width="59" align="center"><strong>ประเภท</strong></td>
	<td width="36" align="center"><strong>edit</strong></td>
	<td width="43" align="center"><strong>delete</strong></td>
	</tr>
	<?php
	include "conect.php";
	$strSQL = "SELECT * FROM product where status = 1 ";
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
	<td><?php echo $objResult['product_price'] ?></td>
	<td><?php echo $objResult['product_stock'] ?></td>
	<td align="center"><?php 
	$id = $objResult['product_type_id'];
	$strSQLc = "SELECT * FROM product_type where product_type_id ='$id'";
	$objQueryc = $mysqli->query($strSQLc) or die ("error=$strSQLc");
	$objResultc = mysqli_fetch_assoc($objQueryc);
	echo $objResultc['product_type_name']?></td>
	<td><a href="index.php?page=editproduct&&product_id=<?php echo $objResult['product_id']?>">edit</a></td>
	<td><a href="delete.php?product_id=<?php echo $objResult['product_id']?>"
	onclick="return confirm('Are you sure??');">delete</a></td>
	</tr>
	<?php
	}
	?>
</table>