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
        $output .= '<td><a href="#" onclick="addcart(' . $row['product_id'] . ')">เพิ่ม</a></td>';
        $output .= '</tr>';
    }
    return $output;
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <h3 colspan="2" scope="row">เพิ่มคำสั่งซื้อ</h3>
    <form id="form1" name="form1" method="post" action="addstocksave.php">
            <div class="row">
                <div class="col-6">
                    <h4>เลือกประเภทสินค้า</h4>
                    <select name="type" id="type">
                    <option value="">Show All Product</option>
                    <?php echo fill_type($mysqli); ?>
                    </select>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <td align="center"><strong>รูป</strong></td>
                                <td align="center"><strong>ชื่อ</strong></td>
                                <td align="center"><strong>ราคา</strong></td>
                                <td align="center"><strong>สต็อก</strong></td>
                                <td align="center"><strong>เพิ่มเข้าตะกร้า</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo fill_product($mysqli, ""); ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-6">
                    <h4>ตะกร้าสินค้า</h4>
                    <table class="table" style="margin-top: 33px;">
                        <thead class="thead-dark">
                            <tr>
                                <td align="center"><strong>รูป</strong></td>
                                <td align="center"><strong>ชื่อ</strong></td>
                                <td align="center"><strong>ราคา</strong></td>
                                <td align="center"><strong>สต็อก</strong></td>
                                <td align="center"><strong>ลบจากตระกร้า</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo fill_product($mysqli, ""); ?>
                        </tbody>
                    </table>
                </div>
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
    function myFunction() {
        var x = document.getElementById("product").value;
        console.log(x)
    }

    function addcart(id) {
        console.log(id)
    }
</script>