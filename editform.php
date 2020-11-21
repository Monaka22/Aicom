<link href="style.css" rel="stylesheet" type="text/css" />
<?php
include"conect.php";
$p_id = $_GET["product_id"];
$strSQL="select * from product where product_id='$p_id'";
$objQuery = $mysqli->query($strSQL);
$objResult = mysqli_fetch_assoc($objQuery);
?>
<form id="form1" name="form1" method="post" action="editsave.php" enctype="multipart/form-data">
<table width="450" align="center" border="0" class="square">
<tr>
<th colspan="2" scope="row">แก้ไขสินค้า</th>
</tr>
<tr>
<th width="114" scop="row">name</th>
<td width="323">
<input name="p_name" type="text" value="<?php echo $objResult['product_name'] ?>"/>
</td>
</tr>
<tr>
<th scope="row">detail</th>
<td>
<textarea name="p_detail" cols="35" rows="5"><?php echo $objResult['product_detail']?></textarea>
</td>
</tr>
<tr>
<th scope="row">price</th>
<td width="323">
<input name="p_price" type="number" value="<?php echo $objResult['product_price']?>"/>
</td>
</tr>
<tr>
<th scope="row">stock</th>
<td width="323">
<input name="p_stock" type="number" value="<?php echo $objResult['product_stock']?>"/>
</td>
</tr>
<tr>
<th scope="row">category</th>
<td>
<select name="c_id">
<?php
$strSQLc = "SELECT * FROM product_type";
$objQueryc = $mysqli->query($strSQLc) or die ("error=$strSQLc");
$numc = mysqli_num_rows($objQueryc);
for($i=1;$i<=$numc;$i++)
{
	$objResultc= mysqli_fetch_assoc($objQueryc);
	?>
	<option value="<?php echo $objResultc["product_type_id"] ?>"
	<?php if($objResultc["product_type_id"]==$objResult["product_type_id"]) {echo 'select="selected"';} ?>>
	<?php echo $objResultc["product_type_name"] ?></option>
	<?php } 
	?>
	</select>
	</td>
	</tr>
	<tr>
	<th scope="row">image</th>
	<td>
<?php
if(file_exists("img/{$objResult['product_id']}.jpg"))
{?>
<img src="img/<?php echo $objResult['product_id']?>.jpg" width="80" border="0" />
<?php
}?>
</td>
</tr>
<!-- <tr>
<th scope="row">&nbsp;</th>
<td><input name="image" type="file" id="image" /><td>
</tr> -->
<tr>
<th colspan="2" scope"row">
<input name="p_id" type="hidden" id="p_id" value="<?php echo $p_id?>"/>
<input type="submit" name="button" id="button" value="Submit" />
</th>
</table>
</form>