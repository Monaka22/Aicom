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
        $output .= '<tr style="text-align: center;">';
        $output .= '<td><img src="img/' . $row['product_id'] . '.jpg" width="80" border="0" /></td>';
        $output .= '<td>' . $row['product_name'] . '</td>';
        $output .= '<td>' . $row['product_price'] . '</td>';
        $output .= '<td>' . $row['product_stock'] . '</td>';
        $output .= '<td><a href="#" onclick="addcart('.$row['product_id'].')">เพิ่ม</a></td>';
        $output .= '</tr>';
    }
    return $output;
}
function check($id) {
    return $id;
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<div class="text-center">
	<h3>รายการสินค้า</h3>
</div>
<div class="d-flex">
  <div class="mr-auto">
  <div class="d-flex flex-row">
  <div><h4>เลือกประเภทสินค้า</h4></div>
  <div class="ml-2"><select class="form-control" name="type" id="type">
				<option value="">เลือกประเภทสินค้า</option>
				<?php echo fill_type($mysqli); ?>
			</select></div>
	</div>
  </div>
  <div><button class="btn btn-success"><a class="text-white" href="index.php?page=add">เพิ่มสินค้า</a></button></div>
</div>
  <form class="form-inline mt-4 mb-4">
    <input class="form-control mr-sm-2 w-100" type="search" id='search' placeholder="ค้นหาสินค้าจากชื่อสินค้า" aria-label="Search">
  </form>
<table class="table mt-4">
	<thead style="background-color: #F4F4F4;" class="thead-dark">
		<tr>
		<td width="100" align="center"><strong>ลำดับ</strong></td>
		<td width="200" align="center"><strong>รูป</strong></td>
		<td width="200" align="center"><strong>ชื่อสินค้า</strong></td>
		<td width="100" align="center"><strong>ราคา ( บาท )</strong></td>
		<td width="100" align="center"><strong>สต็อก</strong></td>
		<td width="100" align="center"><strong>ประเภท</strong></td>
		<td width="100" align="center"><strong>แก้ไข</strong></td>
		<td width="100" align="center"><strong>ลบ</strong></td>
		</tr>
	</thead>
	<tbody id="product">
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
		onclick="return confirm('ต้องการลบสินค้าชนิดนี้ ?');">delete</a></td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>
<script>
    $(document).ready(function() {
        $('#type').change(function() {
            var type_id = $(this).val();
            $.ajax({
                url: "load_product_home.php",
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
	$("#search").on("change paste keyup", function() {
		var search = $(this).val();
		$.ajax({
                url: "load_product_search.php",
                method: "POST",
                data: {
                    search: search
                },
                success: function(data) {
                    $('#product').html(data);
                }
            });
		document.getElementById("cform").reset();
	});
</script>