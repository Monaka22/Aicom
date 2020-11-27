<!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<!-- Include Date Range Picker -->
<link rel="stylesheet" type="text/css" href="print.css" media="print">
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<div class="text-left mb-4">
    <h3 id="title">รายการขายสินค้า</h3>
    <h3 style="display: none;" id="print-title"></h3>
</div>

<div style="display: none;" id="print-title"> 
    <p id='date-text' style="text-align: right;"></p>
</div>

<input style="
    width: 20%;
    text-align :center;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-c" 
    type="text" 
    name="daterange" 
    placeholder="click"
    id="title" />
<script type="text/javascript">
    function formatDate() {
        var d = new Date(),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) 
            month = '0' + month;
        if (day.length < 2) 
            day = '0' + day;

        return [year, month, day].join('-');
    }
$('input[name="daterange"]').daterangepicker(
{
    locale: {
      format: 'YYYY-MM-DD'
    },
    startDate: formatDate(),
    endDate: formatDate()
}, 

function(start, end, label) {
    console.log(start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
}
);
</script>
<button style="margin-bottom: 5px;margin-left:10px;" onclick="postdata();" name="save" id="print-btn" class="btn btn-info">ค้นหารายงานการซื้อสินค้า</button>
<table class="table mt-4">
    <thead style="background-color: #F4F4F4;" class="thead-dark">
		<tr id="none-print">
            <td width="50" align="center"><strong>ลำดับ</strong></td>
            <td width="150" align="center"><strong>รูป</strong></td>
            <td width="150" align="center"><strong>ชื่อสินค้า</strong></td>
            <td width="150" align="center"><strong>วันที่สั่งซื้อ</strong></td>
            <td width="150" align="center"><strong>ราคา ( บาท )</strong></td>
            <td width="150" align="center"><strong>จำนวน</strong></td>
        </tr>
        <tr style="display: none;" id="is-print">
        <td width="50" align="center"><strong>ลำดับ</strong></td>
            <td width="150" align="center"><strong>รูป</strong></td>
            <td width="150" align="center"><strong>ชื่อสินค้า</strong></td>
            <td width="150" align="center"><strong>วันที่สั่งซื้อ</strong></td>
            <td width="150" align="center"><strong>ราคา ( บาท )</strong></td>
            <td width="150" align="center"><strong>จำนวน</strong></td>
		</tr>
	</thead>
    <tbody id="stock">

    </tbody>
</table>
<div class="text-right">
	<button id="print-btn" onclick="window.print();" class="btn btn-success mt-2">พิมพ์ยอดซื้อสินค้า</button>
</div>
<script>
    function postdata() {
        var rangeDate = $('input[name="daterange"]').val()
        var res = rangeDate.split(" - ");
        $.ajax({
                url: "load_stock.php",
                method: "POST",
                data: {
                    start: res[0],
                    end : res[1]
                },
                success: function(data) {
                $('#stock').html(data);
            }
        });
        $.ajax({
                url: "load_stock_report.php",
                method: "POST",
                data: {
                    start: res[0],
                    end : res[1]
                },
                success: function(data) {
                $('#report').html(data);
            }
        });
        $('#print-title').text('ยอดซื้อสินค้าวันที่ '+rangeDate)
}
</script>
<script>
    function formatDate() {
    var d = new Date(),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}
document.getElementById("date-text").innerHTML = "วันที่ออกใบเสร็จ : "+formatDate();
</script>