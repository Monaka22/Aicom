<link href="style.css" rel="stylesheet" type="text/css" />
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
<form id="form1" name="form1" method="post" action="addstocksave.php">
    <table width="450" align="center" border="0" class="square">
        <tr>
            <th colspan="2" scope="row">เพิ่มคำสั่งซื้อ</th>
        </tr>
        <tr>
            <th scope="row">category</th>
            <td width="114" height="27">
                <select name="type" id="type">
                    <option value="">Show All Product</option>
                    <?php echo fill_type($mysqli); ?>
                </select>
            </td>
        </tr>
        <tr>
            <th scope="row">product</th>
            <td width="114" height="27">
                <select name="product" id="product" onchange="myFunction()" >
                    <option value="">เลือกสินค้า</option>
                    <?php echo fill_product($mysqli, ""); ?>
                </select>
            </td>
        </tr>
        <p id="demo"></p>
        <tr>
            <th scope="row">จำนวน</th>
            <td><input type="number" name="p_stock" id="p_stock" /></td>
        </tr>
        <tr>
            <th colspan="2" scope="row">
                <input type="submit" name="button" value="สั่งซื้อ" /></th>
        </tr>
    </table>
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
    console.log(x)
    }
</script>