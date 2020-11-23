<?php
include "conect.php";
function fill_type($connect)
{
    $output = '';
    $sql = "SELECT * FROM product_type where status= 1";
    $result = mysqli_query($connect, $sql);
    echo json_decode($result);
    while ($row = mysqli_fetch_array($result)) {
        $output .= '<option value="' . $row["product_type_id"] . '">' . $row["product_type_name"] . '</option>';
    }
    return $output;
}
function fill_product($connect, $id)
{
    $output = '';
    if ($id != "") {
        $sql = "SELECT * FROM product where status= 1 and product_type_id = $id";
    } else {
        $sql = "SELECT * FROM product where status= 1";
    }
    $result = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $output .= '<option value="' . $row["product_id"] . '">' . $row["product_name"] . '</option>';
    }
    return $output;
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<h3 class="text-left mb-3">เพิ่มคำสั่งซื้อสินค้า</h3>
<form  method="post" action="addstocksave.php">
  <div class="form-group">
    <label>ประเภทสินค้า</label>
    <select class="form-control" name="type" id="type">
        <option value="0">เลือกประเภทสินค้า</option>
        <?php echo fill_type($mysqli); ?>
    </select>
  </div>
  <div class="form-group">
    <label>สินค้า</label>
    <select class="form-control" name="product" id="product" onchange="myFunction()" >
        <option value="0">เลือกสินค้า</option>
        <?php echo fill_product($mysqli, ""); ?>
    </select>
  </div>
  <div class="form-group">
    <label>จำนวน</label>
    <input  class="form-control" type="number" name="p_stock" id="p_stock" />
  </div>
  <button type="submit" class="btn btn-primary">สั่งซื้อสินค้า</button>
</form>
<script>
    $(document).ready(function() {
        $('#type').change(function() {
            var type_id = $(this).val();
            $.ajax({
                url: "load_product.php",
                method: "POST",
                data: {
                    type_id: type_id
                },
                success: function(data) {
                    $('#product').html(data);
                }
            });
        });
    });
</script>
<script>
    function myFunction() {
    var x = document.getElementById("product").value;
    }
</script>