<link href="style.css" rel="stylesheet" type="text/css" />
<?php
include"conect.php";
$p_id = $_GET["product_type_id"];
$strSQL="select * from product_type where product_type_id='$p_id'";
$objQuery = $mysqli->query($strSQL);
$objResult = mysqli_fetch_assoc($objQuery);
?>
<form id="form1" name="form1" method="post" action="edittypesave.php"">
<table width="450" align="center" border="0" class="square">
<tr>
<th colspan="2" scope="row">แก้ไขประเภทสินค้า</th>
</tr>
<tr>
<th width="114" scop="row">name</th>
<td width="323">
<input name="p_name" type="text" value="<?php echo $objResult['product_type_name'] ?>"/>
</td>
</tr>
<th colspan="2" scope"row">
<input name="p_id" type="hidden" id="p_id" value="<?php echo $p_id?>"/>
<input type="submit" name="button" id="button" value="Submit" />
</th>
</table>
</form>