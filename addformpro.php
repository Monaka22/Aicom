<h3 class="text-left mb-3">เพิ่มสินค้า</h3>
<form method="post" action="addsave.php" enctype="multipart/form-data">
  <div class="form-group">
    <label>ชื่อสินค้า</label>
    <input class="form-control" type="text" name="p_name" id="p_name" required/>
  </div>
  <div class="form-group">
    <label>รายละเอียดสินค้า</label>
    <textarea class="form-control" name="p_detail" cols="35" rows="5" id="p_detail" required></textarea>
  </div>
  <div class="form-group">
    <label>ราคา ( บาท )</label>
    <input class="form-control" type="number" name="p_price" id="p_price" required/>
  </div>
  <div class="form-group">
    <label>จำนวน</label>
    <input class="form-control" type="number" name="p_stock" id="p_stock" required/>
  </div>
  <div class="form-group">
    <label>ประเภทสินค้า</label>
    <select class="form-control" name="c_id"required >
    <?php
    include "conect.php";
    $strSQL = "SELECT * FROM product_type where status =1";
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
  </div>
  <div class="form-group">
    <label>รูปสินค้า</label>
    <input class="form-control" type="file" name="image" id="image" required />
  </div>
  <button type="submit" class="btn btn-primary">เพิ่มสินค้า</button>
</form>