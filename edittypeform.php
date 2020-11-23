<link href="style.css" rel="stylesheet" type="text/css" />
<?php
include"conect.php";
$p_id = $_GET["product_type_id"];
$strSQL="select * from product_type where product_type_id='$p_id'";
$objQuery = $mysqli->query($strSQL);
$objResult = mysqli_fetch_assoc($objQuery);
?>
<h3 class="text-left mb-3">แก้ไขประเภทสินค้า</h3>
<form method="post" action="edittypesave.php">
  <div class="form-group">
    <label>ชื่อประเภทสินค้า</label>
    <input  class="form-control" type="text" name="p_name" id="p_name" value="<?php echo $objResult['product_type_name'] ?>" />
  </div>
  <input name="p_id" type="hidden" id="p_id" value="<?php echo $p_id?>"/>
  <button type="submit" class="btn btn-primary">แก้ไขประเภทสินค้า</button>
</form>