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
    <h3 colspan="2" scope="row">เพิ่มคำสั่งซื้อ</h3>
    <form class="form-inline">
        <input class="form-control mr-sm-2 w-100" type="search" id='search' placeholder="ค้นหาสินค้าจากรหัสสินค้า" aria-label="Search">
    </form>
    <form id="form1" name="form1" method="post" action="addsalesave.php">
            <div class="row">
                <div class="col-6">
                <div class="d-flex flex-row">
                    <div class="p-2"><h4>เลือกประเภทสินค้า</h4></div>
                    <div class="p-2"><select class="form-control" name="type" id="type">
                                    <option value="">เลือกประเภทสินค้า</option>
                                    <?php echo fill_type($mysqli); ?>
                                </select></div>
                        </div>
                    <table class="table">
                        <thead style="background-color: #F4F4F4;" class="thead-dark">
                            <tr>
                                <td align="center"><strong>รูป</strong></td>
                                <td align="center"><strong>ชื่อ</strong></td>
                                <td align="center"><strong>ราคา ( บาท )</strong></td>
                                <td align="center"><strong>สต็อก</strong></td>
                                <td align="center"><strong>เพิ่มเข้าตะกร้า</strong></td>
                            </tr>
                        </thead>
                        <tbody id="product">
                            <?php echo fill_product($mysqli, ""); ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-6">
                    <h4 style="margin-top: 9px;">ตะกร้าสินค้า</h4>
                    <table class="table" style="margin-top: 16px;">
                        <thead>
                            <tr>
                                <td width="100" align="center"><strong>รูป</strong></td>
                                <td width="150" align="center"><strong>ชื่อ</strong></td>
                                <td width="150" align="center"><strong>จำนวน</strong></td>
                                <td width="150" align="center"><strong>ราคา ( บาท )</strong></td>
                                <td width="300" align="center"><strong>ลบจากตระกร้า</strong></td>
                            </tr>
                        </thead>
                        <tbody id="cart">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-right">
                <button class="btn btn-success" type="submit" ><a class="text-white">ขาย</a></button>
            </div>
    </form>
<script>
    $(document).ready(function() {
        $('#type').change(function() {
            var type_id = $(this).val();
            $.ajax({
                url: "load_product_sale.php",
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
    function addcart(id) {
            $.ajax({
                url: "addcart_load.php",
                method: "POST",
                data: {
                    product_id: id
                },
                success: function(data) {
                    $('#cart').html(data);
                }
            });
        }   
    
    function removecart(id) {
        $.ajax({
            url: "removecart_load.php",
            method: "POST",
            data: {
                product_id: id
            },
            success: function(data) {
                $('#cart').html(data);
            }
        });
    }    
</script>
<script>
	$("#search").on("change paste keyup", function() {
		var search = $(this).val();
		$.ajax({
                url: "load_product_sale_search.php",
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