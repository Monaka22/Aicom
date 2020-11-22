<link href="style.css" rel="stylesheet" type="text/css"/>
<form id="form1" name="form1" method="post" action="addsave.php" enctype="multipart/form-data">
<table width="450" align="center"  border="0" class="square">
  <tr>
    <th colspan="2" scope="row">เพิ่มสินค้า</th>
	</tr>
	<tr>
	<th width="114" height="27" scope="row">name</th>
	<td width="323"><input type="text" name="p_name" id="p_name" /></td>
	</tr>
	<tr><th scope="row">detail</th>
    <td><textarea name="p_detail" cols="35" rows="5" id="p_detail"></textarea></td>
  </tr>
  	<tr><th scope="row">price</th>
    <td><input type="number" name="p_price" id="p_price" /></td>
  </tr>
  </tr>
  	<tr><th scope="row">stock</th>
    <td><input type="number" name="p_stock" id="p_stock" /></td>
  </tr>
  <tr>
  <th scope="row">category</th>
  <td width="114" height="27">
  <select name="c_id" >
  <?php
	include "conect.php";
	$strSQL = "SELECT * FROM product_type";
	$objQuery = $mysqli->query($strSQL);
	$num =  mysqli_num_rows($objQuery);
	for($i=1;$i<=$num;$i++){
    $objResult = mysqli_fetch_assoc($objQuery); ?>
		<option value="<?php echo $objResult["product_type_id"]?>">
		<?php echo $objResult["product_type_name"]?></option>
		<?php
		}
		?>
  </select>
  </td>
  </tr>
</tr>
  	<tr><th scope="row">image</th>
    <td><input type="file" name="image" id="image" /></td>
  </tr>
  <tr><th colspan="2" scope="row">
    <input type="submit" name="button" value="Submit" /></th>
  </tr>
</table>
</form>