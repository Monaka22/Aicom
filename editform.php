<?php
include"conect.php";
$p_id = $_GET["product_id"];
$strSQL="select * from product where product_id='$p_id'";
$objQuery = $mysqli->query($strSQL);
$objResult = mysqli_fetch_assoc($objQuery);
?>
<h3 class="text-left mb-3">แก้ไขสินค้า</h3>
<form method="post" action="editsave.php">
  <div class="form-group">
    <label>ชื่อสินค้า</label>
    <input value="<?php echo $objResult['product_name'] ?>" class="form-control" type="text" name="p_name" id="p_name" />
  </div>
  <div class="form-group">
    <label>รายละเอียดสินค้า</label>
    <textarea  class="form-control" name="p_detail" cols="35" rows="5" id="p_detail"><?php echo $objResult['product_detail']?></textarea>
  </div>
  <div class="form-group">
    <label>ราคา</label>
    <input  class="form-control" type="number" name="p_price" id="p_price" value="<?php echo $objResult['product_price']?>" />
  </div>
  <div class="form-group">
    <label>จำนวน</label>
    <input  class="form-control" type="number" name="p_stock" id="p_stock" value="<?php echo $objResult['product_stock']?>" />
  </div>
  <div class="form-group">
    <label>ประเภทสินค้า</label>
    <select name="c_id" class="form-control">
	<?php
	$strSQLc = "SELECT * FROM product_type WHERE status = 1";
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
  </div>
  <div class="form-group">
  <?php
	if(file_exists("img/{$objResult['product_id']}.jpg"))
	{?>
	<img src="img/<?php echo $objResult['product_id']?>.jpg" width="80" border="0" />
	<?php
	}?>
  </div>
  <input name="p_id" type="hidden" id="p_id" value="<?php echo $p_id?>"/>
  <button type="submit" class="btn btn-primary">แก้ไขสินค้า</button>
</form>